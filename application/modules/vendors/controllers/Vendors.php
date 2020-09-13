<?php
// defined('BASEPATH') or exit('No direct script access allowed');

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
	 * vendor's info
	 *
	 * @return vendor's info 
	 */
	public function _vendor_info() {
		$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2); // creates the various parts

		$subdomain_name = $subdomain_arr[0]; // assigns the first part

		$this->db->from('users')->where('created_on', $subdomain_name);

		return $this->db->get()->row();
	}

	/**
	 * login
	 *
	 * @return login page
	 */
	public function _login() {
		$baseurlinfo = explode('.', $_SERVER['HTTP_HOST'], 3); // creates th first part

		$base_url = $baseurlinfo[1].'.'.$baseurlinfo[2]; // assign the second and third parts

		redirect(prep_url($base_url.'/login'));
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
			$this->_login();

		} else {
			$data['vendor_info'] = $this->_vendor_info();

			$data['name_of_store'] = $this->name_of_store();

			$data['currency'] = $this->store_currency();

			$data['total_sales_amount'] = $this->total_sales();

			$data['total_products'] = $this->total_products();

			$data['page_id'] = 1;

			$data['products'] = $this->ion_auth_model->get_products();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$data['users'] = $this->ion_auth->users()->result();

			$data['last_ten_orders'] = $this->last_ten_orders();
			
			$this->_render_page('vtemplates/header', $data);
			$this->_render_page('vendors/index', $data);
			$this->_render_page('vtemplates/footer', $data);
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
		$vendor_id = $this->_vendor_info()->created_on;
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
			
			// if the user is neither logged in neither permitted
			// redirect them to login login page 
			$this->_login();
		} else {
			$data['vendor_info'] = $this->_vendor_info();

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

				$data['categories'] = $this->ion_auth_model->get_categories();

				$data['tags'] = $this->ion_auth_model->get_tags();

				$data['page_id'] = 7;

				$this->_render_page('vtemplates/header', $data);
				$this->_render_page('vendors/publish-product', $data);
				$this->_render_page('vtemplates/footer', $data);
			}
		}
	}

	/**
	 * list products
	 */
	public function list_products() {
		$data['title'] = $this->lang->line('list_products_heading');

		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in neither permitted
			// redirect them to the login page
			$this->_login();
		} else {

			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['vendor_info'] = $this->_vendor_info();

			$data['name_of_store'] = $this->name_of_store();

			$data['currency'] = $this->store_currency();

			$data['products'] = $this->ion_auth_model->get_products();

			$data['page_id'] = 4;

			$data['categories'] = $this->ion_auth_model->get_categories();

			$this->_render_page('vtemplates/header', $data);
			$this->_render_page('vendors/list-products', $data);
			$this->_render_page('vtemplates/footer', $data);
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
		$data['product'] = $this->ion_auth_model->get_products($slug);

		// login & user credential check
		if (!$this->ion_auth->logged_in() &&(!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in nor permitted
			// redirect them to the login page
			$this->_login();
		}  else {
			// check whether the product exists
			if (empty($data['product'])) {
				
				// if the product does not exist
				// show error
				show_error($this->lang->line('product_does_not_exist'));
			} else {
				$data['title'] = $data['product']->name;

				$data['name_of_store'] = $this->name_of_store();

				$data['vendor_info'] = $this->_vendor_info();

				$data['orders'] = $this->ion_auth_model->get_orders();

				$data['currency'] = $this->store_currency();

				$data['page_id'] = 3;

				$data['categories'] = $this->ion_auth_model->get_categories();

				$this->_render_page('vtemplates/header', $data);
				$this->_render_page('vendors/view-product', $data);
				$this->_render_page('vtemplates/footer', $data);
			}
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
	 * list orders
	 *
	 * @return orders
	 *
	 * @param string
	 */
	public function orders() {
		$data['title'] = $this->lang->line('list_orders_heading');

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			// if the user is neither logged in nor an admon or a vendor
			// redirect them to the login page
			$this->_login();
		} else {
			$data['vendor_info'] = $this->_vendor_info();

			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['name_of_store'] = $this->name_of_store();

			$data['currency'] = $this->store_currency();

			$data['orders'] = $this->ion_auth_model->vendor_orders();

			$data['page_id'] = 2;

			$data['customers'] = $this->ion_auth->users()->result();

			$data['products'] = $this->ion_auth_model->get_products();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$this->_render_page('vtemplates/header', $data);
			$this->_render_page('vendors/list-orders', $data);
			$this->_render_page('vtemplates/footer', $data);
		}
	}

	/**
	 * last ten orders
	 *
	 * @return orders
	 *
	 * @param string
	 */	
	public function last_ten_orders() {
		$vendor_id = $this->_vendor_info()->created_on;
		$this->db->limit(10);
		$this->db->order_by('orders_summary.id', 'desc');
		$this->db->where('vendor_id', $vendor_id);
		return $this->db->get('orders_summary')->result();
	}

	/**
	 * make product order available
	 *
	 * @return bool
	 */
	public function make_available($id) {
		$data['product_order'] = $this->ion_auth_model->vendor_orders($id);

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in nor an admin or a vendor
			// redirect them to the login page
			$this->_login();
		} else {
			// check if the product product order exists
			if (empty($data['product_order'])) {
				// if the product order does not exist
				show_error($this->lang->line('product_order_does_not_exist'));
			} elseif ($data['product_order']->vendor_id != $this->_vendor_info()->created_on) {
				// if the product's order vendor id does not match the product's vendor id
				// show error
				show_error($this->lang->line('you_caanot_alter_the_status'));
			} else {
				$this->ion_auth_model->_make_available($data['product_order']->id);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('vendor/orders', 'refresh');
			}
		}
	}

	/**
	 * make product order unavailable
	 *
	 * @return bool
	 */
	public function make_unavailable($id) {
		$data['product_order'] = $this->ion_auth_model->vendor_orders($id);

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in nor an admin or a vendor
			// redirect them to the login page
			$this->_login();
		} else {
			// check if the product product order exists
			if (empty($data['product_order'])) {
				// if the product order does not exist
				show_error($this->lang->line('product_order_does_not_exist'));
			} elseif ($data['product_order']->vendor_id != $this->_vendor_info()->created_on) {
				// if the product's order vendor id does not match the product's vendor id
				// show error
				show_error($this->lang->line('you_caanot_alter_the_status'));
			} else {
				$this->ion_auth_model->_make_unavailable($data['product_order']->id);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('vendor/orders', 'refresh');
			}
		}
	}

	/**
	 * search orders
	 *
	 * @return orders
	 *
	 * @param string
	 */
	public function search_orders() {
		$data['title'] = $this->lang->line('search_orders_heading');

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in neither permitted
			// redirect them to the login page
			$this->_login();
		} else {
			$product = $this->input->post('product');
			$customer = $this->input->post('customer');
			$status = $this->input->post('status');

			$data['orders'] = $this->ion_auth_model->_search_orders($product, $customer, $status);

			$data['vendor_info'] = $this->_vendor_info();

			$data['name_of_store'] = $this->name_of_store();

			$data['currency'] = $this->store_currency();

			$data['page_id'] = 2;

			$data['customers'] = $this->ion_auth->users()->result();

			$data['products'] = $this->ion_auth_model->get_products();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$this->_render_page('vtemplates/header', $data);
			$this->_render_page('vendors/list-orders', $data);
			$this->_render_page('vtemplates/footer', $data);
		}
	}

	/**
	 * add category
	 *
	 * @return categories
	 *
	 * @param string
	 */
	public function add_category() {
		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {

			// if the user is neither logged in neither permitted
			// redirect them to the login page
			$this->_login();
		} else {
			// form validation
			$this->form_validation->set_rules('pd_category', $this->lang->line('add_category_validation_category_label'), 'required|is_unique[categories.category]', [
					'required' => 'The category field is required',
					'is_unique' => 'The category already exists'
				]
			);
			$this->form_validation->set_rules('pd_parent_category', $this->lang->line('add_category_validation_parent_category_label'));

			if ($this->form_validation->run() === TRUE) {
				$this->ion_auth_model->_add_category();
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('vendor/products/categories', 'refresh');
			}
		}
	}

	/**
	 * list categories
	 *
	 * @return categories
	 *
	 * @param string
	 */
	public function list_categories() {
		$data['title'] = $this->lang->line('list_categories_heading');

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {

			// if the user is neither logged in neither permitted
			// redirect them to the login page
			$this->_login();
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['vendor_info'] = $this->_vendor_info();

			$data['name_of_store'] = $this->name_of_store();

			$data['currency'] = $this->store_currency();

			$data['page_id'] = 5;

			$data['categories'] = $this->ion_auth_model->get_categories();

			$this->_render_page('vtemplates/header', $data);
			$this->_render_page('vendors/list-categories', $data);
			$this->_render_page('vtemplates/footer', $data);
		}
	}

	/**
	 * add tag
	 *
	 * @return tags
	 *
	 * @param string
	 */
	public function add_tag() {
		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in nor permitted
			// redirect them to the login page
			$this->_login();
		} else {
			//form validation
			$this->form_validation->set_rules('pd_tag', $this->lang->line('add_tag_validation_tag_label'), 'required|is_unique[tags.tag]', 
				[
					'is_unique' => 'The tag already exists'
				]
			);

			if ($this->form_validation->run() === TRUE) {
				$this->ion_auth_model->_add_tag();
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('vendor/products/tags', 'refresh');
			}
		}
	}

	/**
	 * list tags
	 *
	 * @return tags
	 *
	 * @param string
	 */
	public function list_tags() {
		$data['title'] = $this->lang->line('list_tags_heading');

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in nor permitted
			// redirect them to the login page
			$this->_login(); 
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['vendor_info'] = $this->_vendor_info();

			$data['tags'] = $this->ion_auth_model->get_tags();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$data['name_of_store'] = $this->name_of_store();

			$data['page_id'] = 6;

			$this->_render_page('vtemplates/header', $data);
			$this->_render_page('vendors/list-tags', $data);
			$this->_render_page('vtemplates/footer', $data);
		}
	}

	/**
	 * account settings
	 *
	 * @return account details
	 */
	public function account_settings() {
		$data['title'] = $this->lang->line('account_settings_heading');

		// login and user credentials check
		if (!$this->ion_auth->logged_in() && (!$this->ion_auth->is_admin() || !$this->ion_auth->is_vendor())) {
			
			// if the user is neither logged in nor permitted
			// redirect them to the login page
			$this->_login(); 
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['vendor_info'] = $this->_vendor_info();

			$data['page_id'] = 8;

			$data['categories'] = $this->ion_auth_model->get_categories();

			$data['name_of_store'] = $this->name_of_store();

			$this->_render_page('templates/header');
			$this->_render_page('vendors/account-settings', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * upload profile picture
	 *
	 * @return bool
	 *
	 * @param string
	 */
	public function upload_profile_picture() {
		$config['upload_path'] = './public/attachments/users';
		$config['allowed_types'] = 'jpeg|jpg|png|gif';
		$config['max_size'] = 2048;
		$this->upload->initialize($config);

		$this->upload->do_upload('profile_picture');
		$upload_data = $this->upload->data();

		$file_name = '';
		if ($upload_data) {
			$file_name = $upload_data['file_name'];
			$file_type = $upload_data['file_type'];
			$file_size = $upload_data['file_size'];
		} else {
			$upload_error = $this->upload->display_errors();
		}

		$this->ion_auth_model->upload_profile_picture($file_name);
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('vendor/account-settings#profile_picture', 'refresh');
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