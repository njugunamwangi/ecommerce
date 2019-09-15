<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendors extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->config->load('vendors/ion_auth', TRUE);
		$this->load->library(['ion_auth', 'form_validation', 'upload', 'pagination']);
		$this->load->model(['vendors/ion_auth_model']);
		$this->lang->load('vendors');
		$this->load->helper(['url']);

		// get subdomain details
		$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); // creates the various parts
		$subdomain_name = $subdomain_arr[0]; // assigns the first part

		$this->db->from('users')->where('created_on', $subdomain_name);
		$query = $this->db->get();
	}

	/**
	 * index page
	 *
	 * @return vendors summary 
	 */
	public function index() {
		$data['title'] = $this->lang->line('vendors_dashboard_heading');

		// login check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			// if the user is not logged in
			// neither are they an admin nor a vendor
			$baseurl = base_url();
			$baseurlinfo = explode('.', $_SERVER['HTTP_HOST'], 3);
			$base_url = $baseurlinfo[1].'.'.$baseurlinfo[2];
			redirect(prep_url($base_url.'/login'));

		} else {
			$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); // creates the various parts
			$subdomain_name = $subdomain_arr[0]; // assigns the first part

			$this->db->from('users')->where('created_on', $subdomain_name);
			$data['vendor_info'] = $this->db->get()->row();
			$data['name_of_store'] = $this->name_of_store();
			$data['currency'] = $this->store_currency();
			$data['total_sales_amount'] = $this->total_sales();
			$data['total_products'] = $this->total_products();
			
			$this->_render_page('templates/header');
			$this->_render_page('vendors/index', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * total sales amount
	 *
	 * @return total_sales
	 *
	 * @param int
	 */
	public function total_sales() {
		$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); // creates the various parts
		$subdomain_name = $subdomain_arr[0]; // assigns the first part

		$this->db->from('users')->where('created_on', $subdomain_name);
		$vendor_id = $this->db->get()->row()->created_on;
		$this->db->where('vendor_id', $vendor_id);
		$this->db->select_sum('subtotal');
		$result =  $this->db->get('orders_summary')->row();
		return $result->subtotal;
	}

	/**
	 * publish product page
	 *
	 * @return publish product
	 */
	public function publish_product() {
		$data['title'] = $this->lang->line('publish_product_heading');

		// login check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// redirect to login page if not logged in
			redirect('login', 'refresh');
		} else {
			$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); // creates the various parts
			$subdomain_name = $subdomain_arr[0]; // assigns the first part

			$this->db->from('users')->where('created_on', $subdomain_name);
			$data['vendor_info'] = $this->db->get()->row();
			$data['name_of_store'] = $this->name_of_store();

			$config['upload_path'] = './public/attachments/products';
			$config['allowed_types'] = 'gif|png|jpg|jpeg';
			$config['max_size'] = 2048;
			$this->upload->initialize($config);

			// form validation
			$this->form_validation->set_rules('name', $this->lang->line('publish_product_name_validation_label'), 'trim|required|is_unique[products.name]', 
				[
					'is_unique' => $this->lang->line('product_already_exists')
				]
			);
			$this->form_validation->set_rules('snippet', $this->lang->line('publish_product_validation_snippet_label'), 'trim|required');
			$this->form_validation->set_rules('description', $this->lang->line('publish_product_validation_description_label'), 'trim|required');
			$this->form_validation->set_rules('categories[]', $this->lang->line('publish_product_validation_categories_label'), 'trim|required');
			$this->form_validation->set_rules('tags[]', $this->lang->line('publish_product_validation_tags_label'), 'trim|required');
			$this->form_validation->set_rules('colors[]', $this->lang->line('publish_product_validation_colors_label'), 'trim');
			$this->form_validation->set_rules('sizes[]', $this->lang->line('publish_product_validation_sizes_label'), 'trim');
			$this->form_validation->set_rules('regular_price', $this->lang->line('publish_product_validation_regular_price_label'), 'trim|required|numeric');
			$this->form_validation->set_rules('sale_price', $this->lang->line('publish_product_validation_sale_price_label'), 'trim|required|numeric|differs[regular_price]');
			$this->form_validation->set_rules('wholesale_price', $this->lang->line('publish_product_validation_wholesale_price_label', 'trim|required|differs[sale_price]'));
			$this->form_validation->set_rules('available_from', $this->lang->line('publish_product_validation_available_from_label'), 'integer');
			$this->form_validation->set_rules('available_to', $this->lang->line('publish_product_validation_available_to_label'), 'integer');
			$this->form_validation->set_rules('status', $this->lang->line('publish_product_validation_status_to_label'), 'integer');

			$this->upload->do_upload('image');
			$upload_data = $this->upload->data();

			if ($this->form_validation->run() === TRUE) {
				$file_name = '';
				if ($upload_data) {
					$file_name = $upload_data['file_name'];
					$file_size = $upload_data['file_size'];
					$file_type = $upload_data['file_type'];
				} else {
					$upload_error = $this->upload->display_errors();
				} 

				$this->ion_auth_model->publish_product($file_name);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('vendor/products', 'refresh');
			} else {
				$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

				$data['name_of_store'] = $this->name_of_store();

				$data['categories'] = $this->db->get('categories')->result();

				$this->_render_page('templates/header');
				$this->_render_page('vendors/publish-product', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	/**
	 * list products
	 */
	public function list_products() {
		$data['title'] = $this->lang->line('list_products_heading');

		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			//redirect to login
			redirect('login', 'refresh');
		} else {

			$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
			$subdomain_name = $subdomain_arr[0];

			$this->db->from('users')->where('created_on', $subdomain_name);
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['vendor_info'] = $this->db->get()->row();

			$data['name_of_store'] = $this->name_of_store();

			$data['currency'] = $this->store_currency();

			$data['products'] = $this->ion_auth_model->get_products();

			$this->_render_page('templates/header');
			$this->_render_page('vendors/list-products', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * view product
	 *
	 * @return product information
	 *
	 * @param string
	 */
	public function view_product($slug = NULL) {
		// login & user credential check
		if (!$this->ion_auth->logged_in() &&(!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			redirect('login', 'refresh');
		}  else {
			$data['product'] = $this->ion_auth_model->get_products($slug);

			if (empty($data['product'])) {
				show_404();
			}

			$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
			$subdomain_name = $subdomain_arr[0];

			$this->db->from('users')->where('created_on', $subdomain_name);

			$data['title'] = $data['product']->name;
			$data['name_of_store'] = $this->name_of_store();
			$data['vendor_info'] = $this->ion_auth->user()->row();
			$data['orders'] = $this->ion_auth_model->get_orders();
			$data['currency'] = $this->store_currency();

			$this->_render_page('templates/header');
			$this->_render_page('vendors/view-product', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * total products
	 *
	 * @return total_products
	 *
	 * @param int
	 */
	public function total_products() {
		$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); // creates the various parts
		$subdomain_name = $subdomain_arr[0]; // assigns the first part

		$this->db->from('users')->where('created_on', $subdomain_name);
		$vendor_id = $this->db->get()->row()->created_on;
		$this->db->where('vendor_id', $vendor_id);
		$result =  $this->db->get('products')->num_rows();
		return $result;
	}

	/**
	 * name of store
	 */
	public function name_of_store() {
		return $this->db->get_where('info', ['field' => 'name-of-store'])->row()->value;
	}

	/**
	 * store currency
	 */
	public function store_currency() {
		return $this->db->get_where('info', ['field' => 'currency'])->row()->value;
	}

	public function _render_page($view, $data = NULL, $returnhtml = FALSE) {

        $this->viewdata = (empty($data)) ? $data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        // This will return html on 3rd argument being true
        if ($returnhtml)
        {
                return $view_html;
        }
    }
}