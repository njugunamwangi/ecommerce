<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MX_Controller {

	// include_once base_url().'/vendor/masterpass/mpasscoresdk/MasterCardCoreSDK.phar';
	// include_once base_url().'/vendor/masterpass/merchantcheckoutsdk/MastercardMerchantCheckout.phar';

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
		$data['error'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('error')));

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
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->load->view('pages/product', $data);
	}

	public function stripe() {
		$this->_render_page('pages/stripe');
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
		$this->form_validation->set_rules('review', $this->lang->line('add_review_validation_review_label'), 'required');
		$this->form_validation->set_rules('ratings', $this->lang->line('add_review_validation_ratings_label'), 'required');

		$slug = $this->input->post('slug');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->add_review();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect($slug);
		} else {
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect($slug);
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
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$data['modes_of_payment'] = $this->pages_model->get_modes_of_payment();

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
		require_once('\vendor\stripe\stripe-php\init.php');

		$this->load->library('pagination');
		$data['user_account'] = $this->ion_auth->user()->row();

		$config['base_url'] = base_url().'my-account/orders';
		$config['total_rows'] = $this->db->get_where('orders', ['customer_id' => $data['user_account']->id])->num_rows();
		$config['per_page'] = 2;
		$this->pagination->initialize($config);

		if (!$this->ion_auth->logged_in()) {
			redirect('login', 'refresh');
		} else {
			$data['title'] = $this->lang->line('my_orders_heading');
			$data['name_of_store'] = $this->name_of_store();
			$data['store_email'] = $this->store_email();
			$data['store_phone_number'] = $this->store_phone_number();
			$data['store_currency'] = $this->store_currency();
			$data['cart_items'] = $this->cart->contents();
			$data['orders'] = $this->pages_model->my_orders();
			$data['store_location'] = $this->store_location();
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$data['pagination_links'] = $this->pagination->create_links();
			$data['publishable_key'] = $this->db->get_where('info', ['field' => 'stripe-publishable-key'])->row()->value;
			$data['secret_key'] = (string)$this->db->get_where('info', ['field' => 'stripe-secret-key'])->row()->value;

			\Stripe\Stripe::setApiKey($data['secret_key']);

			$this->_render_page('pages/my-orders', $data);
		}
	}

	public function confirmStripePayment($order_id) {
		require_once('\vendor\stripe\stripe-php\init.php');

		\Stripe\Stripe::setVerifySslCerts(false);

		// Token is created using Checkout or Elements!
		// Get the payment token ID submitted by the form:
		// $order_id = 

		if (!isset($_POST['stripeToken']) || !isset($order_id)) {
			// header("Location: pricing.php");
			exit();
		}

		$token = $_POST['stripeToken'];
		$email = $_POST["stripeEmail"];

		$order = $this->db->get_where('orders', ['order_id' => $order_id])->row();

		$shipment = $this->db->get_where('shipment', ['ship_to' => $order->subcounty])->row()->fee;

		$price = ($order->total_orders+$shipment)*100;

		// Charge the user's card:
		$charge = \Stripe\Charge::create(array(
			"amount" => $price,
			"currency" => "usd",
			"description" => $order_id,
			"source" => $token,
		));

		//send an email
		//store information to the database
		echo 'Success! You have been charged $' . $price/100;
	}

	/**
	 * @return each order
	 */
	public function view_order($order_id = NULL) {
		$data['my_order'] = $this->pages_model->my_orders($order_id);

		// check whether the order exists
		if (empty($data['my_order'])) {
			// if the order does not exist
			// show error
			show_error('This order does not exist');
		} else {
			// login check
			if (!$this->ion_auth->logged_in()) {
				// if the user is not logged in
				// redirect them to the login page
				redirect('login', 'refresh');
			} else {
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
	}

	/**
	 * Cancel order
	 *
	 * @return bool
	 */
	public function cancel_order($order_id) {
		$data['my_order'] = $this->pages_model->my_orders($order_id);
		$user_id = $this->ion_auth->user()->row()->id;

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to log in page
			redirect('login', 'refresh');  
		} elseif ($data['my_order']->customer_id != $user_id) {
			// if the user did not place the order
			// show error
			show_error($this->lang->line('you_cannot_cancel_this_order'));
		} else {
			$this->ion_auth_model->_cancel_order($order_id);
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('/my-account/orders', 'refresh');
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

			$method_of_payment = $this->input->post('payment_method');
			
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

	public function lipa_na_mpesa() {
		// access token
	    $consumerKey = (string)$this->db->get_where('info', ['field' => 'consumer-key'])->row()->value;
	    $consumerSecret = (string)$this->db->get_where('info', ['field' => 'consumer-secret'])->row()->value;

	    $headers = ['Content-Type: application/json; charset=utf8'];

	    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

	    $curl = curl_init($access_token_url);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	    curl_setopt($curl, CURLOPT_HEADER, FALSE);

	    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);

	    $result = curl_exec($curl);
	    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	    $result = json_decode($result);
	    $access_token = $result->access_token;
	    curl_close($curl);

	    // initiate the transaction

	    // define the variables
	    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

	    $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

	    $BusinessShortCode = (string)$this->db->get_where('info', ['field' => 'till-number'])->row()->value;
	    $Timestamp = date('YmdHis');
	    $PartyA = (string)$this->input->post('phone');
	    $CallBackURL = 'https://test.rabaii.co.ke/callback_url.php';
	    $AccountReference = (string)$this->input->post('order_id');
	    $TransactionDesc = 'Checkout';
	    $Amount = (string)$this->input->post('amount');
	    $PassKey = (string)$this->db->get_where('info', ['field' => 'pass-key'])->row()->value;
	    $Password = base64_encode($BusinessShortCode.$PassKey.$Timestamp);

	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $initiate_url);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header


	    $curl_post_data = array(
	    //Fill in the request parameters with valid values
	    'BusinessShortCode' => $BusinessShortCode,
	    'Password' => $Password,
	    'Timestamp' => $Timestamp,
	    'TransactionType' => 'CustomerPayBillOnline',
	    'Amount' => $Amount,
	    'PartyA' => $PartyA,
	    'PartyB' => $BusinessShortCode,
	    'PhoneNumber' => $PartyA,
	    'CallBackURL' => $CallBackURL,
	    'AccountReference' => $AccountReference,
	    'TransactionDesc' => $TransactionDesc
	    );

	    $data_string = json_encode($curl_post_data);

	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	    $curl_response = curl_exec($curl);
	    print_r($curl_response);

	    echo $curl_response;
	}

	public function paywithstripe() {

	}

	public function paywithpaypal() {

	}

	public function handler() { 
		$this->_render_page('pages/handler'); 
	}

	/**
	 * add product to wishlist
	 */
	public function add_to_wishlist() {
		// form validaton
		$this->form_validation->set_rules('wishlist_code', $this->lang->line('wishlist_code_validation_label'), 'required|is_unique[wishlist.wishlist_code]');
		
		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->add_to_wishlist();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('/');
		} else {
			$this->session->set_flashdata('error', $this->ion_auth->errors());
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
    	// $i = 1;
    	// $data = [
    	// 	'rowid' => $rowid,
    	// 	'qty' => $i++,
    	// 	'price' => 20
    	// ];

    	// $this->cart->update($data);

    	// redirect('cart');
    	echo $rowid;
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