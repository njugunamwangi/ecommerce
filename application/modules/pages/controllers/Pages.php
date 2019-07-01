<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*ob_start();*/

class Pages extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(['form_validation', 'cart', 'session', 'ion_auth']);
		$this->load->helper(['url', 'language', 'cookie', 'date', 'array']);
		$this->lang->load('pages');
		$this->load->model('pages_model');
	}

	/**
	 * @return product pages
	 */
	public function home() {
		$data['title'] = $this->lang->line('home_heading');
		$data['products'] = $this->pages_model->get_products();
		$data['new_products'] = $this->pages_model->get_newproducts();
		$data['categories'] = $this->pages_model->get_categories();
		$data['cart_items'] = $this->cart->contents();
		$data['user_account'] = $this->ion_auth->user()->row();
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();

		$this->load->view('pages/home', $data);
	}

	/**
	 * @return categories page
	 */
	public function product($slug = NULL) {
		$data['product'] = $this->pages_model->get_products($slug);
		if (empty($data['product'])) {	
			show_404();
		}
		$data['title'] = $data['product']->name;
		$data['user_account'] = $this->ion_auth->user()->row();
		$data['cart_items'] = $this->cart->contents();
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();

		$this->load->view('pages/product', $data);
	}

	/**
	 * @return search results
	 */
	public function search_product() {
		$product = $this->input->post('product');
		$data['products'] = $this->pages_model->search($product);
		$data['user_account'] = $this->ion_auth->user()->row();
		$data['cart_items'] = $this->cart->contents();
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();
		
		$this->load->view('pages/search', $data);
	}

	/**
	 * @return subcategories page with products
	 */
	public function categories($slug = NULL) {
		$data['subcategory'] = $this->pages_model->get_subcategories($slug);
		if (empty($data['subcategory'])) {
			show_404();
		}
		$data['title'] = $data['subcategory']->subcategory;
		$data['user_account'] = $this->ion_auth->user()->row();
		$data['cart_items'] = $this->cart->contents();
		$data['name_of_store'] = $this->name_of_store();

		$this->load->view('pages/subcategory', $data);
	}

	public function add() {

		$product = $this->pages_model->get($this->input->post('id'));
		if ($this->ion_auth->is_wholesaler()) {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 5,
				'price' => $product->wholesale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		} else {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 1,
				'price' => $product->sale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		}
		
		$this->cart->insert($data);
		redirect('/');
	}

	/**
	 * add product from search
	 */
	public function add_from_search() {
		$product = $this->pages_model->get($this->input->post('id'));
		if ($this->ion_auth->is_wholesaler()) {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 5,
				'price' => $product->wholesale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		} else {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 1,
				'price' => $product->sale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		}
		$this->cart->insert($data);
		redirect('/cart');
	}

	/**
	 * add product to cart from product page
	 */
	public function add_product() {
		$slug = $this->input->post('slug');
		$data = [
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('name'),
			'image' => $this->input->post('image'),
			'slug' => $this->input->post('slug')
		];
		$this->cart->insert($data);
		redirect($slug);
	}

	/**
	 * add product review
	 */
	public function add_review() {
		// validate form input
		$this->form_validation->set_rules('name', $this->lang->line('add_review_validation_name_label'), 'required|trim');
		$this->form_validation->set_rules('email', $this->lang->line('add_review_validation_email_label'), 'required|valid_email');
		$this->form_validation->set_rules('review', $this->lang->line('add_review_validation_review_label'), 'required');
		$this->form_validation->set_rules('ratings', $this->lang->line('add_review_validation_ratings_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			
			$data = [
				'product_id' => $this->input->post('product_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'review' => $this->input->post('review'),
				'date_created' => time(),
				'ratings' => $this->input->post('ratings')
			];
		}

		$slug = $this->input->post('slug');

		if ($this->form_validation->run() === TRUE && $this->db->insert('reviews', $data)) {
			redirect($slug);
		} else {
			
			echo 'error';
		}
	}

	/**
	 * subscribe to newsletter
	 */
	public function newsletter() {
		// validate form input
		$this->form_validation->set_rules('email', $this->lang->line('subscribe_newsletter_validation_email_label'), 'required|valid_email|is_unique[newsletter.email]');

		if ($this->form_validation->run() === TRUE) {
			
			// check whether user is subscribing to the newsletter
			$email = strtolower($this->input->post('email'));
			$data = [
				'email' => $email
			];
		}

		if ($this->form_validation->run() === TRUE && $this->db->insert('newsletter', $data)) {
			redirect('/');
		}
	}

	/**
	 * clear cart
	 */
	public function clearcart() {
		$this->cart->destroy();
		redirect('/');
	}

	public function show() {
        $cart = $this->cart->contents();

        echo '<pre>';
        print_r($cart);
    } 

	/**
	 * @return shopping cart page
	 */
	public function shopping_cart() {
		$data['title'] = $this->lang->line('shopping_cart_heading');
		$data['cart_items'] = $this->cart->contents();
		$data['user_account'] = $this->ion_auth->user()->row();
		$data['shipments'] = $this->pages_model->get_shipments();
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();

		$this->load->view('pages/shopping_cart', $data);
	}

	/**
	 * @return checkout page
	 */
	public function checkout() {
		$data['title'] = $this->lang->line('checkout_heading');
		$data['cart_items'] = $this->cart->contents();
		$data['shipments'] = $this->pages_model->get_shipments();
		$data['user_account'] = $this->ion_auth->user()->row();
		$data['counties'] = $this->pages_model->get_counties();
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();

		$this->_render_page('pages/checkout', $data);
	}

	/**
	 * @return my account page
	 */
	public function my_account() {
		$data['title'] = $this->lang->line('my_account_heading');
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();
		$data['cart_items'] = $this->cart->contents();
		$data['user_account'] = $this->ion_auth->user()->row();

		$this->_render_page('pages/my-account', $data);
	}

	/**
	 * confirm order
	 */
	public function confirm_order() {
		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('confirm_order_validation_first_name_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('confirm_order_validation_last_name_label'), 'trim|required');
		$this->form_validation->set_rules('email', $this->lang->line('confirm_order_validation_email_label'), 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', $this->lang->line('confirm_order_validation_phone_label'), 'trim|required');
		$this->form_validation->set_rules('address', $this->lang->line('confirm_order_validation_address_label'), 'required');
		$this->form_validation->set_rules('postal_code', $this->lang->line('confirm_order_validation_postal_code_label'), 'required');
		$this->form_validation->set_rules('subcounty', $this->lang->line('confirm_order_validation_subcounty_label'), 'required');
		$this->form_validation->set_rules('county', $this->lang->line('confirm_order_validation_county_label'), 'required');
		$this->form_validation->set_rules('payment_method', $this->lang->line('confirm_order_validation_payment_method_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			
			$cart_items = $this->cart->contents();
			$customer_id = $this->ion_auth->user()->row()->id;
			$method_of_payment = $this->input->post('payment_method');
			$status = 0;

			$data = [
				'customer_id' => $customer_id,
				'order_id' => time(),
				'orders' => json_encode($cart_items),
				'total_orders' => $this->cart->total(),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'), 
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'postal_code' => $this->input->post('postal_code'),
				'subcounty' => $this->input->post('subcounty'),
				'county' => $this->input->post('county'),
				'method_of_payment' => $method_of_payment,
				'status' => $status,
				'slug' => time()
			];
		}

		if ($this->form_validation->run() === TRUE && $this->db->insert('orders', $data)) {
			
			$this->cart->destroy();
			redirect('/', 'refresh');
		} else {
			redirect('checkout');
		}
	}

	/**
	 * @return store phone number
	 */
	public function store_phone_number() {
		return $this->db->get_where('info', ['field' => 'phone-number'])->row()->value;
	}

	/**
	 * @return store currency
	 */
	public function store_currency() {
		return $this->db->get_where('info', ['field' => 'currency'])->row()->value;
	}

	/**
	 * @return store email
	 */
	public function store_email() {
		return $this->db->get_where('info', ['field' => 'email-address'])->row()->value;
	}

	/**
	 * @return name of store
	 */
	public function name_of_store() {
		return $this->db->get_where('info', ['field' => 'name-of-store'])->row()->value;
	}

	public function destroy() {
        $this->cart->destroy();
        echo 'destroy() called';
    }

    public function remove($rowid) {
    	$this->cart->update([
    		'rowid' => $rowid,
    		'qty' => 0
    	]);

    	redirect('cart');
    }

    public function updateadd($rowid) {
    	$this->cart->insert([
    		'rowid' => $rowid,
    		'qty' => 1
    	]);

    	redirect('cart');
    }

    public function removefromhome($rowid) {
    	$this->cart->update([
    		'rowid' => $rowid,
    		'qty' => 0
    	]);

    	redirect('/');
    }

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return [$key => $value];
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$viewdata = (empty($data)) ? $data : $data;

		$view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}
}