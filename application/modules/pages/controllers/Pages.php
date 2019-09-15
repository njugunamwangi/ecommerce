<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		$data['store_location'] = $this->store_location();
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->load->view('pages/home', $data);
	}

	public function cart() {
		$cart = (array)$this->cart->contents();

		echo '<pre>';
		print_r($cart);
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
		$data['categories'] = $this->pages_model->get_categories();
		$data['name_of_store'] = $this->name_of_store();
		$data['store_email'] = $this->store_email();
		$data['store_phone_number'] = $this->store_phone_number();
		$data['store_currency'] = $this->store_currency();
		$data['store_location'] = $this->store_location();

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
		$data['store_location'] = $this->store_location();
		
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
		$data['store_location'] = $this->store_location();

		$this->load->view('pages/subcategory', $data);
	}

	/**
	 * add product to cart
	 */
	public function add() {
		$product = $this->pages_model->get($this->input->post('id'));
		if ($this->ion_auth->is_wholesaler()) {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 5,
				'vendor_id' => $product->vendor_id,
				'price' => $product->wholesale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		} else {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 1,
				'vendor_id' => $product->vendor_id,
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
				'vendor_id' => $product->vendor_id,
				'price' => $product->wholesale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		} else {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 1,
				'vendor_id' => $product->vendor_id,
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
	 * clear cart
	 */
	public function clearcart() {
		$this->cart->destroy();
		redirect('/');
	}

	/**
	 * add product to cart from product page
	 */
	public function add_product() {
		$slug = $this->input->post('slug');
		$data = [
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'vendor_id' => $this->input->post('vendor_id'),
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
		$data['store_location'] = $this->store_location();

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
		$data['store_location'] = $this->store_location();

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
		$data['store_location'] = $this->store_location();

		$this->_render_page('pages/my-account', $data);
	}

	/**
	 * @return my-orders history
	 */
	public function my_orders() {
		if (!$this->ion_auth->logged_in()) {
			redirect('login', 'refresh');
		} else {
			$data['title'] = $this->lang->line('my_orders_heading');
			$data['name_of_store'] = $this->name_of_store();
			$data['store_email'] = $this->store_email();
			$data['store_phone_number'] = $this->store_phone_number();
			$data['store_currency'] = $this->store_currency();
			$data['cart_items'] = $this->cart->contents();
			$data['user_account'] = $this->ion_auth->user()->row();
			$data['my_orders'] = $this->pages_model->my_orders();
			$data['store_location'] = $this->store_location();
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->_render_page('pages/my-orders', $data);
		}
	}

	/**
	 * @return each order
	 */
	public function view_order($order_id = NULL) {
		if (!$this->ion_auth->logged_in()) {
			redirect('login', 'refresh');
		} else {
			$data['my_order'] = $this->pages_model->my_orders($order_id);

			if (empty($data['my_order'])) {
				show_404();
			}

			$data['title'] = $data['my_order']->order_id;
			$data['name_of_store'] = $this->name_of_store();
			$data['store_email'] = $this->store_email();
			$data['store_phone_number'] = $this->store_phone_number();
			$data['store_currency'] = $this->store_currency();
			$data['cart_items'] = $this->cart->contents();
			$data['user_account'] = $this->ion_auth->user()->row();
			$data['store_location'] = $this->store_location();

			$this->_render_page('pages/view-order', $data);
		}
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
			
			$this->ion_auth_model->set_order();
			$this->cart->destroy();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('/my-account/orders', 'refresh');
		} else {
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$data['name_of_store'] = $this->name_of_store();
			$data['store_email'] = $this->store_email();
			$data['store_phone_number'] = $this->store_phone_number();
			$data['store_currency'] = $this->store_currency();
			$data['cart_items'] = $this->cart->contents();
			$data['user_account'] = $this->ion_auth->user()->row();

			$this->_render_page('checkout', $data);
		} 
	}

	/**
	 * add product to wishlist
	 */
	public function add_to_wishlist() {
		// form validaton
		$this->form_validation->set_rules('wishlist_code', $this->lang->line('wishlist_code_validation_label'), 'required|is_unique[wishlist.wishlist_code]');

		if ($this->form_validation->run() === TRUE) {
			$data = [
				'customer_id' => $this->input->post('customer_id'),
				'product_id' => $this->input->post('product_id'),
				'wishlist_code' => $this->input->post('wishlist_code'),
				'time' => time()
			];
		}
		
		if ($this->form_validation->run() === TRUE && $this->db->insert('wishlist', $data)) {
			$data['success_message'] = $this->lang->line('product_added_to_wishlist');
			redirect('/');
		} else {
			$data['error_message'] = $this->lang->line('product_in_wishlist');
			redirect('/');
		}	
	}

	/**
	 * @return wishlist page
	 */
	public function my_wishlist() {
		if (!$this->ion_auth->logged_in()) {
			redirect('login', 'redirect');
		} else {
			$data['title'] = $this->lang->line('my_wishlist_heading');
			$data['name_of_store'] = $this->name_of_store();
			$data['store_email'] = $this->store_email();
			$data['store_phone_number'] = $this->store_phone_number();
			$data['store_currency'] = $this->store_currency();
			$data['cart_items'] = $this->cart->contents();
			$data['user_account'] = $this->ion_auth->user()->row();
			$data['wishlists'] = $this->pages_model->my_wishlist();
			$data['store_location'] = $this->store_location();

			$this->_render_page('pages/my-wishlist', $data);
		}
	}

	/**
	 * remove product from wishlist
	 */
	public function remove_from_wishlist() {
		$id = $this->input->post('id');
		$this->db->delete('wishlist', ['id' => $id]);
		redirect('my-account/wishlist');
	}

	/**
	 * add product to cart from wishlist
	 */
	public function addtocart() {
		$product = $this->pages_model->get($this->input->post('id'));
		if ($this->ion_auth->is_wholesaler()) {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 5,
				'vendor_id' => $product->vendor_id,
				'price' => $product->wholesale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		} else {
			$data = [
				'id' => $this->input->post('id'),
				'qty' => 1,
				'vendor_id' => $product->vendor_id,
				'price' => $product->sale_price,
				'name' => $product->name,
				'image' => $product->image,
				'slug' => $product->slug
			];
		}

		if ($this->cart->insert($data)) {
			$id = $this->input->post('id');
			$this->db->delete('wishlist', ['id' => $id]);
			redirect('my-account/wishlist');
		}
	}

	/**
	 * edit account information
	 */
	public function edit_account() {
		$data['title'] = $this->lang->line('edit_account_infomation_heading');

		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			redirect('login', 'refresh');
		} else {
			$user_id = $this->ion_auth->user()->row()->id;
			$user_email = $this->ion_auth->user()->row()->email;
			$user_phone = $this->ion_auth->user()->row()->phone;

			// form validation
			$this->form_validation->set_rules('first_name', $this->lang->line('edit_account_first_name_validation_label'), 'trim|required');
			$this->form_validation->set_rules('last_name', $this->lang->line('edit_account_last_name_validation_label'), 'trim|required');
			if ($user_id === 'id') {
				$this->form_validation->set_rules('phone', $this->lang->line('edit_account_phone_validation_label'), 'trim|required|min_length[10]|max_length[12]|is_unique[users.phone]', 
					[
						'is_unique' => $this->lang->line('phone_already_registered')
					]
				);
				$this->form_validation->set_rules('email', $this->lang->line('edit_account_email_validation_label'), 'trim|required|valid_email|is_unique[users.email]',
					[
						'valid_email' => $this->lang->line('enter_valid_email'),
						'is_unique' => $this->lang->line('email_already_registered')
					]
				);
			} else {
				$this->form_validation->set_rules('phone', $this->lang->line('edit_account_phone_validation_label'), 'trim|required|min_length[10]|max_length[12]');
				$this->form_validation->set_rules('email', $this->lang->line('edit_account_email_validation_label'), 'trim|required|valid_email',
					[
						'valid_email' => $this->lang->line('enter_valid_email')
					]
				);
			}
				

			if ($this->form_validation->run() === TRUE) {
				$email = strtolower($this->input->post('email'));
				$username_arr = explode('@', $email, 2);
				$username = $username_arr[0];

				$data = [
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $email,
					'username' => $email,
					'phone' => $this->input->post('phone')
				];
			}

			if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user_id, $data)) {
				redirect('my-account', 'refresh');
			} else {
				$data['name_of_store'] = $this->name_of_store();
				$data['store_email'] = $this->store_email();
				$data['store_phone_number'] = $this->store_phone_number();
				$data['store_currency'] = $this->store_currency();
				$data['cart_items'] = $this->cart->contents();
				$data['user_account'] = $this->ion_auth->user()->row();
				$data['store_location'] = $this->store_location();

				$this->_render_page('pages/edit-account', $data);
			}
		}
	}

	/**
	 * reset account password
	 */ 
	public function reset_password() {
		$data['title'] = $this->lang->line('reset_password_heading');

		// check if the user is logged in
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect them to the login page
			redirect('login', 'refresh');
		} else {
			$user_id = $this->ion_auth->user()->row()->id;

			// form validation
			$this->form_validation->set_rules('password', $this->lang->line('reset_password_validation_password_label', 'required|min_length['.$this->config->item('min_password_length', 'ion_auth').']|matches[password_confirm]'));
			$this->form_validation->set_rules('password_confirm', $this->lang->line('reset_password_validation_password_confirm_label'));

			if ($this->form_validation->run() === TRUE) {
				$password = $this->ion_auth_model->hash_password($this->input->post('password'));
				$data = ['password' => $password];
			}

			if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user_id, $data)) {
				$this->session->session_destroy();
				redirect('login', 'refresh');
			} else {
				$data['name_of_store'] = $this->name_of_store();
				$data['store_email'] = $this->store_email();
				$data['store_phone_number'] = $this->store_phone_number();
				$data['store_currency'] = $this->store_currency();
				$data['cart_items'] = $this->cart->contents();
				$data['user_account'] = $this->ion_auth->user()->row();
				$data['store_location'] = $this->store_location();

				$this->_render_page('pages/reset-password', $data);
			}
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
	 * @return store location
	 */
	public function store_location() {
		return $this->db->get_where('info', ['field' => 'location'])->row()->value;
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