<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends MX_Controller
{
	// public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation', 'upload', 'parser']);
		$this->load->helper(['url', 'language', 'date', 'url_helper', 'array']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index() {
		$data['title'] = $this->lang->line('admin_dashboard_heading');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}
		else
		{	
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$data['users'] = $this->ion_auth->users()->result();

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['total_orders'] = $this->get_total_orders();

			$data['total_sales_amount'] = $this->total_sales();

			$data['last_ten_orders'] = $this->last_ten_orders();

			// $data['total_shipments'] = $this->total_shipments();
			
			//USAGE NOTE - you can do more complicated queries like this
			//$data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
			
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$data['name_of_store'] = $this->nameofstore();

			$data['currency'] = $this->storecurrency();

			$data['products'] = $this->ion_auth_model->get_products();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$data['completed_orders'] = $this->completed_orders();

			$data['pending_orders'] = $this->pending_orders();

			$data['rejected_orders'] = $this->rejected_orders();

			$this->_render_page('templates/header');
			$this->_render_page('auth/index', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * Log the user in
	 */
	public function login()
	{
		$data['title'] = $this->lang->line('login_heading');

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				if ($this->ion_auth->is_admin()) {
					
					// if the user is an admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('admin', 'refresh');

				} elseif ($this->ion_auth->is_customer()) {
					
					// if the user is a customer
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('/', 'refresh');
				} elseif ($this->ion_auth->is_wholesaler()) {
					
					// if the user is a customer
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('/', 'refresh');
				} else {
					
					// if the user is a vendor
					$vendor_id = $this->ion_auth->user()->row()->created_on;
					$domain_arr = explode('.', $_SERVER['HTTP_HOST'], 3);
					$domain_name = $domain_arr[0].'.'.$domain_arr[1];
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect(prep_url($vendor_id.'.'.$domain_name.'/vendor'), 'refresh');
				}
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];

			$data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
			];

			$data['name_of_store'] = $this->nameofstore();

			$data['store_phone_number'] = $this->storephonenumber();

			$data['store_email'] = $this->storeemailaddress();
			
			$data['store_location'] = $this->storelocation();

			$this->_render_page('auth/login', $data);
		}
	}

	/**
	 * login the user from the checkout page
	 */
	public function checkout_login() {
		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE) {
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {

				//if the login is successful
				//redirect them back to the checkout page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('checkout', 'refresh');
			} else {

				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} else {
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];

			$data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
			];
		}
	}

	/**
	 * create account from the checkout page
	 */
	public function checkout_register() {
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required|is_unique[users.phone]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
			];
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("checkout", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			];
			$data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			];
			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];
			$data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			];
			$data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			];
			$data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			];
			$data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			];

			$data['name_of_store'] = $this->nameofstore();
			$data['store_phone_number'] = $this->storephonenumber();
			$data['store_email'] = $this->storeemailaddress();

			$this->_render_page('pages/checkout', $data);
		}
	}

	public function register() {
		$data['title'] = $this->lang->line('register_account_heading');

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email', 
				[
					'valid_email' => $this->lang->line('use_valid_email')
				]);
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]', 
				[
					'is_unique' => $this->lang->line('email_already_registered'),
					'valid_email' => $this->lang->line('use_valid_email')
				]);
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required|is_unique[users.phone]|min_length[10]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
			];
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("login", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			];
			$data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			];
			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];
			$data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			];
			$data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			];
			$data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			];
			$data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			];

			$data['name_of_store'] = $this->nameofstore();
			$data['store_phone_number'] = $this->storephonenumber();
			$data['store_email'] = $this->storeemailaddress();
			$data['store_location'] = $this->storelocation();
		}

		$this->_render_page('pages/register', $data);
	}

	public function register_customer() {
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email', 
				[
					'valid_email' => $this->lang->line('use_valid_email')
				]);
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]', 
				[
					'is_unique' => $this->lang->line('email_already_registered'),
					'valid_email' => $this->lang->line('use_valid_email')
				]);
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required|is_unique[users.phone]|min_length[10]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
			];
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect(base_url().'admin/orders/new#checkout');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			];
			$data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			];
			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];
			$data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			];
			$data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			];
			$data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			];
			$data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			];

			$data['name_of_store'] = $this->nameofstore();
			$data['store_phone_number'] = $this->storephonenumber();
			$data['store_email'] = $this->storeemailaddress();
		}

		redirect(base_url().'admin/orders/new#register');
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$data['title'] = "Logout";

		// log the user out
		$this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('/', 'refresh');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$data['old_password'] = [
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			];
			$data['new_password'] = [
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
			];
			$data['new_password_confirm'] = [
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
			];
			$data['user_id'] = [
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			];

			// render
			$this->_render_page('auth/change-password', $data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		$data['title'] = $this->lang->line('forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
			];

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth/forgot-password', $data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$data['title'] = $this->lang->line('reset_password_heading');
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = [
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
				];
				$data['new_password_confirm'] = [
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $data['min_password_length'] . '}.*$',
				];
				$data['user_id'] = [
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				];
				$data['csrf'] = $this->_get_csrf_nonce();
				$data['code'] = $code;

				// render
				$this->_render_page('auth/reset-password', $data);
			}
			else
			{
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($identity);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		$activation = FALSE;

		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$data['csrf'] = $this->_get_csrf_nonce();
			$data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth/deactivate-user', $data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			];
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("admin/users", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			];
			$data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			];
			$data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			];
			$data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			];
			$data['company'] = [
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			];
			$data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			];
			$data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			];
			$data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			];

			$data['name_of_store'] = $this->nameofstore();

			$data['user_account'] = $this->ion_auth->user()->row();

			$this->_render_page('templates/header');
			$this->_render_page('auth/create-user', $data);
			$this->_render_page('templates/footer');
		}
	}
	/**
	* Redirect a user checking if is admin
	*/
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			redirect('admin', 'refresh');
		}
		redirect('/', 'refresh');
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();
			
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = [
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				];

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$this->ion_auth->remove_from_group('', $id);
					
					$groupData = $this->input->post('groups');
					if (isset($groupData) && !empty($groupData))
					{
						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->redirectUser();

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->redirectUser();

				}

			}
		}

		// display the edit user form
		$data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$data['user'] = $user;
		$data['groups'] = $groups;
		$data['currentGroups'] = $currentGroups;

		$data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		];
		$data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		];
		$data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		];
		$data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		];

		$this->_render_page('auth/edit-user', $data);
	}

	/**
	 * List users
	 */
	public function users() {
		$data['title'] = $this->lang->line('list_users_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			redirect('login', 'refresh');

		} elseif (!$this->ion_auth->is_admin()) {
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['name_of_store'] = $this->nameofstore();

			$data['users'] = $this->ion_auth->users()->result();
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('templates/header');
			$this->_render_page('auth/list-users', $data);
			$this->_render_page('templates/footer');
		}
	}

	public function list_vendors() {
			$this->_render_page('templates/header');
			$this->_render_page('auth/list-vendors');
			$this->_render_page('templates/footer');
	}

	/**
	 * view user
	 */
	public function view_user($id) {
		// login check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to login page
			redirect('login');
		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in
			// but not an admin
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['user'] = $this->ion_auth->user($id)->row();
			$data['user_account'] = $this->ion_auth->user()->row();
			$data['name_of_store'] = $this->nameofstore();
			$data['user_groups'] = $this->ion_auth->get_users_groups($id)->result();
			$data['currency'] = $this->storecurrency();
			$this->_render_page('templates/header');
			$this->_render_page('auth/view-user', $data);
			$this->_render_page('templates/footer');
		}
			
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$data['group_name'] = [
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			];
			$data['description'] = [
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			];

			$this->_render_page('auth/create-group', $data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'trim|required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], array(
					'description' => $_POST['group_description']
				));

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$data['group'] = $group;

		$data['group_name'] = [
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
		];
		if ($this->config->item('admin_group', 'ion_auth') === $group->name) {
			$data['group_name']['readonly'] = 'readonly';
		}
		
		$data['group_description'] = [
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		];

		$this->_render_page('auth/edit-group', $data);
	}

	/**
	 * list groups
	 *
	 * @return user groups
	 *
	 * @param string
	 */
	public function list_groups() {
		$data['title'] = $this->lang->line('list_user_groups_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['groups'] = $this->ion_auth->groups()->result();

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['name_of_store'] = $this->nameofstore();

			$this->_render_page('templates/header');
			$this->_render_page('auth/list-groups', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * publish product category
	 */
	public function publish_category() {
		$head['title'] = $this->lang->line('publish_category_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in and is not an admin
			// show error
			show_error('You must be an administrator to view this page');
		} else {

			// load page is user is both admin and is logged in
			// validate form input
			$this->form_validation->set_rules('category', $this->lang->line('publish_category_validation_category_label'), 'trim|required|is_unique[categories.category]');

			if ($this->form_validation->run() === TRUE) {
				
				$slug = url_title($this->input->post('category'), 'dash', TRUE);

				$data = [
					'category' => $this->input->post('category'),
					'parent_category' => $this->input->post('parent_category'),
					'slug' => $slug
				];
			}

			if ($this->form_validation->run() === TRUE && $this->db->insert('categories', $data)) {
				
				// check whether we are creating a new category
				// on submit redirect to categories page
				redirect('admin/products/categories', 'refresh');
			} else {

				$data['category'] = [
					'name' => 'category',
					'type' => 'text',
					'id' => 'category',
					'value' => $this->form_validation->set_value('category')
				];

				$data['user_account'] = $this->ion_auth->user()->row();

				$data['categories'] = $this->ion_auth_model->get_categories();

				$data['name_of_store'] = $this->nameofstore();

				$this->_render_page('templates/header', $head);
				$this->_render_page('auth/publish-category', $data);
				$this->_render_page('templates/footer');
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
	public function categories() {
		$head['title'] = $this->lang->line('list_categories_heading');

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {

			# if the user is not logged in
			// redirect to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in but not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['name_of_store'] = $this->nameofstore();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$data['user_account'] = $this->ion_auth->user()->row();

			$this->_render_page('templates/header', $head);
			$this->_render_page('auth/list-categories', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * view category
	 *
	 * @return category
	 *
	 * @param string
	 */
	public function view_category($slug) {
		$data['category'] = $this->ion_auth_model->get_categories($slug);

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {

			# if the user is not logged in
			// redirect to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in but not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {
			// check whether the category exists
			if (empty($data['category'])) {
				// if the category does not exist
				// show error
				show_error($this->lang->line('category_does_not_exist'));
			} else {
				$head['title'] = $data['category']->category;

				$data['name_of_store'] = $this->nameofstore();

				$data['user_account'] = $this->ion_auth->user()->row();

				$this->_render_page('templates/header', $head);
				$this->_render_page('auth/view-category', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	/**
	 * edit category
	 *
	 * @return category
	 *
	 * @param string
	 */
	public function edit_category($slug) {
		$data['category'] = $this->ion_auth_model->get_categories($slug);

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {

			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {

			show_error($this->lang->line('admin_access_only'));
		} else {
			// check whether the category exists
			if (empty($data['category'])) {
				// if the category does not exist
				// show error
				show_error($this->lang->line('category_does_not_exist'));
			} else {
				// form vlidation
				$this->form_validation->set_rules('category', $this->lang->line('edit_category_category_validation_label'), 'required');
				$this->form_validation->set_rules('parent_category', $this->lang->line('edit_category_parennt_category_validation_label'));

				if ($this->form_validation->run() === TRUE) {
					$this->ion_auth_model->update_category($data['category']->id);
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect('admin/products/categories', 'refresh');
				} else {
					$head['title'] = $data['category']->category;

					$data['name_of_store'] = $this->nameofstore();

					$data['user_account'] = $this->ion_auth->user()->row();

					$data['categories'] = $this->ion_auth_model->get_categories();

					$this->_render_page('templates/header', $head);
					$this->_render_page('auth/edit-category', $data);
					$this->_render_page('templates/footer');
				}
			}
		}
	}

	/**
	 * @return publish product category from modal
	 */
	public function add_category() {
		$data['categories'] = $this->ion_auth_model->get_categories();

		// form validation 
		$this->form_validation->set_rules('pd_category', $this->lang->line('publish_category_validation_category_label'), 'trim|required');
		$this->form_validation->set_rules('pd_parent_category', $this->lang->line('publish_parent_category_validation_subcategory_label'), 'trim');

		if ($this->form_validation->run() === TRUE) {
			$slug = url_title($this->input->post('pd_category'), 'dash', TRUE);

			$data = [
				'category' => $this->input->post('pd_category'),
				'parent_category' => $this->input->post('pd_parent_category'),
				'slug' => $slug
			];

			$this->db->insert('categories', $data);
			redirect('admin/products/publish');
		} else {
			// echo $this->lang->line('form_error_message');
			redirect(base_url().'/admin/products/publish#stack2');
		}
	}

	/**
	 * @return publish product tag
	 */
	public function publish_tag() {
		$head['title'] = $this->lang->line('publish_tag_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {

			// validate form input
			$this->form_validation->set_rules('tag', $this->lang->line('publish_tag_validation_tag_label'), 'trim|required|is_unique[pd_tags.tag]');

			if ($this->form_validation->run() === TRUE) {
				$slug = url_title($this->input->post('tag'), 'dash', TRUE);

				$data = [
					'tag' => $this->input->post('tag'),
					'slug' => $slug
				];
			}

			if ($this->form_validation->run() === TRUE && $this->db->insert('pd_tags', $data)) {

				// check whether we're creating a new tag
				// redirect to tags page
				redirect('admin/products/tags');
			} else {

				$data['tag'] = [
					'name' => 'tag',
					'type' => 'text',
					'id' => 'tag',
					'value' => $this->form_validation->set_value('tag')
				];

				$data['user_account'] = $this->ion_auth->user()->row();

				$data['name_of_store'] = $this->db->get_where('info', ['field' => 'name-of-store'])->row()->value;

				$this->_render_page('templates/header', $head);
				$this->_render_page('auth/publish-tag', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	/**
	 * @return publish product tag from modal
	 */
	public function add_tag() {
		// form validation
		$this->form_validation->set_rules('pd_tag', $this->lang->line('publish_tag_validation_tag_label'), 'trim|required|is_unique[pd_tags.tag]');

		if ($this->form_validation->run() === TRUE) {
			$slug = url_title($this->input->post('pd_tag'), 'dash', TRUE);

			$tag = [
				'tag' => $this->input->post('pd_tag'),
				'slug' => $slug
			];

			$this->db->insert('pd_tags', $tag);
			redirect('admin/products/publish');
		} else {
			redirect(base_url().'/admin/products/publish#stack3');
		}
	}

	/**
	 * @return publish product
	 */
	public function publish_product() {
		$head['title'] = $this->lang->line('publish_product_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in but is not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {

			$config['upload_path']		= './public/attachments/products';
			$config['allowed_types']	= 'gif|jpg|jpeg|png';
			$config['max_size']			= 2048;
			$this->upload->initialize($config);

			// validate form input
			$this->form_validation->set_rules('name', $this->lang->line('publish_product_validation_name_label'), 'trim|required|is_unique[products.name]');
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
					$file_type = $upload_data['file_type'];
					$file_size = $upload_data['file_size'];
				} else {
					$upload_error = $this->upload->display_errors();
				}

				$this->ion_auth_model->set_product($file_name);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			} else {

				// if the form doesn't pass the form validations

				$data['name'] = [
					'name' => 'name',
					'type' => 'text', 
					'id' => 'name', 
					'value' => $this->form_validation->set_value('name')
				];

				$data['snippet'] = [
					'name' => 'snippet',
					'type' => 'text', 
					'id' => 'snippet', 
					'value' => $this->form_validation->set_value('snippet')
				];

				$data['description'] = [
					'name' => 'description',
					'type' => 'text', 
					'id' => 'description', 
					'value' => $this->form_validation->set_value('description')
				];

				$data['categories'] = [
					'name' => 'categories',
					'type' => 'text', 
					'id' => 'categories', 
					'value' => $this->form_validation->set_value('categories')
				];

				$data['tags'] = [
					'name' => 'tags',
					'type' => 'text', 
					'id' => 'tags', 
					'value' => $this->form_validation->set_value('tags')
				];

				$data['regular_price'] = [
					'name' => 'regular_price',
					'type' => 'text', 
					'id' => 'regular_price', 
					'value' => $this->form_validation->set_value('regular_price')
				];

				$data['sale_price'] = [
					'name' => 'sale_price',
					'type' => 'text', 
					'id' => 'sale_price', 
					'value' => $this->form_validation->set_value('sale_price')
				];

				$data['wholesale_price'] = [
					'name' => 'wholesale_price',
					'type' => 'text', 
					'id' => 'wholesale_price', 
					'value' => $this->form_validation->set_value('wholesale_price')
				];

				$data['available_from'] = [
					'name' => 'available_from',
					'type' => 'text', 
					'id' => 'available_from', 
					'value' => $this->form_validation->set_value('available_from')
				];

				$data['available_to'] = [
					'name' => 'available_to',
					'type' => 'text', 
					'id' => 'available_to', 
					'value' => $this->form_validation->set_value('available_to')
				];

				$data['categories'] = $this->ion_auth_model->get_categories();

				$data['tags'] = $this->ion_auth_model->get_tags();

				$data['user_account'] = $this->ion_auth->user()->row();

				$data['name_of_store'] = $this->nameofstore();

				$this->_render_page('templates/header', $head);
				$this->_render_page('auth/publish-product', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	/**
	 * @return products
	 *
	 * param string
	 */
	public function list_products() {
		$data['title'] = $this->lang->line('list_products_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect them to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in but is not an admin
			// show admin access only error
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['products'] = $this->ion_auth_model->get_products();

			$data['categories'] = $this->ion_auth_model->get_categories();

			$data['name_of_store'] = $this->nameofstore();

			$data['currency'] = $this->storecurrency();

			$this->_render_page('templates/header');
			$this->_render_page('auth/list-products', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * search products
	 *
	 * @return products as per search criteria
	 *
	 * @param int|string
	 */
	public function search_products() {
		$name = $this->input->post('product_name');
		$category = $this->input->post('category');
		$status = $this->input->post('status');

		$data['title'] = $this->lang->line('search_products_heading');

		$data['user_account'] = $this->ion_auth->user()->row();

		$data['products'] = $this->ion_auth_model->search_products($name, $category, $status);

		$data['categories'] = $this->ion_auth_model->get_categories();

		$data['name_of_store'] = $this->nameofstore();

		$data['currency'] = $this->storecurrency();

		$this->_render_page('templates/header');
		$this->_render_page('auth/list-products', $data);
		$this->_render_page('templates/footer');
	}

	/**
	 * edit product
	 */
	public function edit_product($id = NULL) {
		if (!$this->ion_auth->logged_in()) {
			
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['product'] = $this->ion_auth_model->get_products($id);

			if (empty($data['product'])) {
				show_404();
			} 
			$data['title'] = $this->lang->line('edit_product_heading');

			// form validation
			$this->form_validation->set_rules('name', $this->lang->line('edit_product_name_of_product_validation_label'), 'trim|required');
			$this->form_validation->set_rules('snippet', $this->lang->line('edit_product_snippet_validation_label'), 'trim|required');
			$this->form_validation->set_rules('description', $this->lang->line('edit_product_desciption_validation_label'), 'trim|required');
			$this->form_validation->set_rules('categories[]', $this->lang->line('edit_product_categories_validation_label'), 'trim|required');
			$this->form_validation->set_rules('tags[]', $this->lang->line('edit_product_tags_validation_label'), 'trim|required');
			$this->form_validation->set_rules('colors[]', $this->lang->line('edit_product_colors_validation_label'), 'trim');
			$this->form_validation->set_rules('sizes[]', $this->lang->line('edit_product_sizes_validation_label'), 'trim');
			$this->form_validation->set_rules('regular_price', $this->lang->line('edit_product_regular_price_validation_label'), 'required|differs[sale_price]|numeric', 
				[
					'differs' => $this->lang->line('regular_price_should_differ_sale_price')
				]
			);
			$this->form_validation->set_rules('sale_price', $this->lang->line('edit_product_sale_price_validation_label'), 'required|differs[wholesale_price]|numeric', 
				[
					'differs' => $this->lang->line('sale_price_should_differ_wholesale_price')
				]
			);
			$this->form_validation->set_rules('wholesale_price', $this->lang->line('edit_product_wholesale_price_validation_label'), 'required|numeric');
			$this->form_validation->set_rules('status', $this->lang->line('edit_product_status_validation_label'), 'trim|required');

			if ($this->form_validation->run() === TRUE) {
				
				$this->ion_auth_model->update_product();
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			} else {
				$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

				$data['name_of_store'] = $this->nameofstore();

				$data['user_account'] = $this->ion_auth->user()->row();

				$data['categories'] = $this->ion_auth_model->get_categories();

				$this->_render_page('templates/header');
				$this->_render_page('auth/edit-product', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	/**
	 * view product
	 *
	 * @return product information
	 *
	 * @param string
	 */
	public function view_product($id = NULL) {
		// login & user credential check
		if (!$this->ion_auth->logged_in()) {
			
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// show error 
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['product'] = $this->ion_auth_model->get_products($id);

			if (empty($data['product'])) {
				show_404();
			}
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$data['title'] = $data['product']->name;
			$data['name_of_store'] = $this->nameofstore();
			$data['user_account'] = $this->ion_auth->user()->row();
			$data['orders'] = $this->ion_auth_model->get_orders();
			$data['product_sales'] = $this->db->get_where('orders_summary', ['product_id' => $id])->result();
			$data['currency'] = $this->storecurrency();

			$this->_render_page('templates/header');
			$this->_render_page('auth/view-product', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * delete product
	 *
	 * @return bool
	 *
	 * @param int
	 */
	public function delete_product($id) {
		$data['product'] = $this->ion_auth_model->get_products($id);

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect then to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show access restriction error
			show_error($this->lang->line('admin_access_only'));
		} else {
			// check whether the product exists
			if (empty($data['product'])) {
				// if the product does not exist
				// show error
				show_error($this->lang->line('product_doesnt_exist'));
			} else {
				$this->ion_auth_model->_delete_product($id);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			}
		}
	}

	/**
	 * unpublish product | save it as draft 
	 *
	 * @param int
	 *
	 * @return product's status as draft
	 */
	public function unpublish($id = NULL) {
		$data['product'] = $this->ion_auth_model->get_products($id);

		if (empty($data['product'])) {
			// if the product does not exist
			// whoops, we dont have this product
			show_404();
		} else {
			// login and user credentials check
			if (!$this->ion_auth->logged_in()) {
				// if the user is not logged in
				// redirect the to the login page
				redirect('login', 'refresh');
			} elseif (!$this->ion_auth->is_admin()) {
				// if the user is logged in
				// but is not an admin, show error
				show_error($this->lang->line('admin_access_only'));
			} else {
				$id = $data['product']->id;
				$this->ion_auth_model->_unpublish_product($id);
    			$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			}
		}
	}

	/**
	 * approve product | save it as published 
	 *
	 * @param int
	 *
	 * @return product's status as published
	 */
	public function approve($id = NULL) {
		$data['product'] = $this->ion_auth_model->get_products($id);

		if (empty($data['product'])) {
			// if the product does not exist
			// whoops, we dont have this product
			show_404();
		} else {
			// login and user credentials check
			if (!$this->ion_auth->logged_in()) {
				// if the user is not logged in
				// redirect the to the login page
				redirect('login', 'refresh');
			} elseif (!$this->ion_auth->is_admin()) {
				// if the user is logged in
				// but is not an admin, show error
				show_error($this->lang->line('admin_access_only'));
			} else {
				$id = $data['product']->id;
				$this->ion_auth_model->_publish_product($id);
    			$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			}
		}
	}

	/**
	 * publish product | save it as published 
	 *
	 * @param int
	 *
	 * @return product's status as published
	 */
	public function publish($id = NULL) {
		$data['product'] = $this->ion_auth_model->get_products($id);

		if (empty($data['product'])) {
			// if the product does not exist
			// whoops, we dont have this product
			show_404();
		} else {
			// login and user credentials check
			if (!$this->ion_auth->logged_in()) {
				// if the user is not logged in
				// redirect the to the login page
				redirect('login', 'refresh');
			} elseif (!$this->ion_auth->is_admin()) {
				// if the user is logged in
				// but is not an admin, show error
				show_error($this->lang->line('admin_access_only'));
			} else {
				$id = $data['product']->id;
				$this->ion_auth_model->_publish_product($id);
    			$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			}
		}
	}

	/**
	 * export products to excel
	 *
	 * @param int |string
	 *
	 * @return products xls file
	 */
	public function export_products_to_excel() {
		echo 'done';
	}

	/**
	 * approve review
	 *
	 * @param int 
	 *
	 * @return bool
	 */
	public function approve_review($id = NULL) {
		$data['review'] = $this->ion_auth_model->get_reviews($id);

		if (empty($data['review'])) {
			// if the review does not exist
			// whoops, we dont have this review
			show_404();
		} else {
			// login and user credentials check
			if (!$this->ion_auth->logged_in()) {
				// if the user is not logged in
				// redirect the to the login page
				redirect('login', 'refresh');
			} elseif (!$this->ion_auth->is_admin()) {
				// if the user is logged in
				// but is not an admin, show error
				show_error($this->lang->line('admin_access_only'));
			} else {
				$id = $data['review']->id;
				$this->ion_auth_model->_approve_review($id);
    			$this->session->set_flashdata('message', $this->ion_auth->messages());
    			redirect('admin/products', 'refresh');
			}
		}
	}

	/**
	 * reject review
	 *
	 * @param int 
	 *
	 * @return bool
	 */
	public function reject_review($id = NULL) {
		$data['review'] = $this->ion_auth_model->get_reviews($id);

		if (empty($data['review'])) {
			// if the review does not exist
			// whoops, we dont have this review
			show_404();
		} else {
			// login and user credentials check
			if (!$this->ion_auth->logged_in()) {
				// if the user is not logged in
				// redirect the to the login page
				redirect('login', 'refresh');
			} elseif (!$this->ion_auth->is_admin()) {
				// if the user is logged in
				// but is not an admin, show error
				show_error($this->lang->line('admin_access_only'));
			} else {
				$id = $data['review']->id;
				$this->ion_auth_model->_reject_review($id);
    			$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/products', 'refresh');
			}
		}
	}

	/**
	 * add shipment
	 */
	public function add_shipment() {
		$data['title'] = $this->lang->line('add_shipment_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in but is not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {

			// validate form input
			$this->form_validation->set_rules('ship_to', $this->lang->line('add_shipment_validation_ship_to_label'), 'trim|required|is_unique[shipment.ship_to]');
			$this->form_validation->set_rules('fee', $this->lang->line('add_shipment_validation_fee_label'), 'trim|required|numeric');

			if ($this->form_validation->run() === TRUE) {
				$slug = url_title($this->input->post('ship_to'), 'dash', TRUE);

				$data = [
					'ship_to' => $this->input->post('ship_to'),
					'fee' => $this->input->post('fee'),
					'slug' => $slug
				];
			}

			if ($this->form_validation->run() === TRUE && $this->db->insert('shipment', $data)) {
				// check whether we are creating a new shipment
				// redirect to shipment listings page
				redirect('admin/shipments');
			} else {

				$data['ship_to[]'] = [
					'name' => 'ship_to',
					'type' => 'text',
					'id' => 'ship_to',
					'value' => $this->form_validation->set_value('ship_to')
				];

				$data['fee[]'] = [
					'name' => 'fee',
					'type' => 'text',
					'id' => 'fee',
					'value' => $this->form_validation->set_value('fee')
				];

				$data['user_account'] = $this->ion_auth->user()->row();

				$data['name_of_store'] = $this->db->get_where('info', ['field' => 'name-of-store'])->row()->value;

				$this->_render_page('templates/header');
				$this->_render_page('auth/add-shipment', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	/**
	 * @return shipment location page
	 */
	public function list_shipments() {
		$data['title'] = $this->lang->line('list_shipments_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect them to login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is not an admin
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['user_account'] = $this->ion_auth->user()->row();

			$data['shipments'] = $this->ion_auth_model->get_shipments();

			$data['name_of_store'] = $this->nameofstore();

			$data['currency'] = $this->storecurrency();

			$this->_render_page('templates/header');
			$this->_render_page('auth/list-shipments', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * @return total number of orders
	 */
	public function get_total_orders() {
		$this->db->where('status', 4);
		$query = $this->db->get('orders')->num_rows();
		return $query;
	}

	/**
	 *@return orders page
	 */
	public function list_orders() {
		$data['title'] = $this->lang->line('orders_heading');

		// login and user level(user group) check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect them to the log in page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the logged in user is not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['orders'] = $this->ion_auth_model->get_orders();

			$data['name_of_store'] = $this->nameofstore();

			$data['store_currency'] = $this->storecurrency();

			$data['customers'] = $this->ion_auth->users()->result();

			$data['shipments'] = $this->ion_auth_model->get_shipments();

			$this->_render_page('templates/header');
			$this->_render_page('auth/list-orders', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * search orders
	 *
	 * @return orders from search criteria
	 *
	 * @param string
	 */
	public function search_orders() {
		$order_id = $this->input->post('order_id');
		$customer_id = $this->input->post('customer');
		$ship_to = $this->input->post('ship_to');
		$status = $this->input->post('status');

		$data['title'] = $this->lang->line('search_orders_heading');

		$data['orders'] = $this->ion_auth_model->search_orders($order_id, $customer_id, $ship_to, $status);

		$data['user_account'] = $this->ion_auth->user()->row();

		$data['name_of_store'] = $this->nameofstore();

		$data['store_currency'] = $this->storecurrency();

		$data['customers'] = $this->ion_auth->users()->result();

		$data['shipments'] = $this->ion_auth_model->get_shipments();

		$this->_render_page('templates/header');
		$this->_render_page('auth/list-orders', $data);
		$this->_render_page('templates/footer');
	}

	/**
	 * @return view single order
	 */
	public function view_order($slug = NULL) {
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect to the login page
			redirect('login', 'refresh');
		} elseif (!$this ->ion_auth->is_admin()) {
			
			// if the user is logged in but is not an admin
			// show admin access only error
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['order'] = $this->ion_auth_model->get_orders($slug);

			if (empty($data['order'])) {
				show_404();
			}
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['title'] = $data['order']->order_id;

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['name_of_store'] = $this->nameofstore();

			$data['store_currency'] = $this->storecurrency();

			$data['order_details'] = $this->db->get_where('orders_summary', ['order_id' => $data['order']->id])->result();

			$this->_render_page('templates/header');
			$this->_render_page('auth/view-order', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * make product order available
	 *
	 * @return bool
	 *
	 * @param int
	 */
	public function make_available($id) {
		$data['order'] = $this->ion_auth_model->get_orders_summary($id);

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect them to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in 
			// but is not an admin, show error
			show_error($this->lang->line('admin_access_only'));
		} else {
			// check if the order exists
			if (empty($data['order'])) {
				
				// if the order does not exist, show error
				show_error($this->lang->line('order_does_not_exist')); 
			} else {
				$slug = $this->db->get_where('orders', ['id' => $data['order']->order_id])->row()->slug;
				$this->ion_auth_model->_make_available($data['order']->id);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/order/'.$slug, 'refresh');
			}
		}
	}

	/**
	 * make product order unavailable
	 *
	 * @return bool
	 *
	 * @param int
	 */
	public function make_unavailable($id) {
		$data['order'] = $this->ion_auth_model->get_orders_summary($id);

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {
			
			// if the user is not logged in
			// redirect them to the login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in 
			// but is not an admin, show error
			show_error($this->lang->line('admin_access_only'));
		} else {
			// check if the order exists
			if (empty($data['order'])) {
				
				// if the order does not exist, show error
				show_error($this->lang->line('order_does_not_exist')); 
			} else {
				$slug = $this->db->get_where('orders', ['id' => $data['order']->order_id])->row()->slug;
				$this->ion_auth_model->_make_unavailable($data['order']->id);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/order/'.$slug, 'refresh');
			}
		}
	}

	/**
	 * @return last 10 orders
	 */
	public function last_ten_orders() {
		$this->db->limit(10);
		$this->db->order_by('orders.order_id', 'desc');
		return $this->db->get('orders')->result();
	}

	/**
	 * completed orders
	 *
	 * @return delivered and closed orders
	 */
	public function completed_orders() {
		$this->db->where('status', 4);
		$this->db->order_by('orders.order_id', 'desc');
		$orders = $this->db->get('orders')->result();
		return $orders;
	}

	/**
	 * completed orders
	 *
	 * @return delivered and closed orders
	 */
	public function pending_orders() {
		$this->db->where('status', 0);
		$this->db->order_by('orders.order_id', 'desc');
		$orders = $this->db->get('orders')->result();
		return $orders;
	}

	/**
	 * completed orders
	 *
	 * @return delivered and closed orders
	 */
	public function rejected_orders() {
		$this->db->where('status', 3);
		$this->db->order_by('orders.order_id', 'desc');
		$orders = $this->db->get('orders')->result();
		return $orders;
	}

	/**
	 * set new order
	 *
	 * @return string
	 */
	public function new_order() {
		$data['title'] = $this->lang->line('new_order_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {

			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) {
			
			// if the user is logged in but not an admin
			// show error
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['categories'] = $this->ion_auth->get_categories();
			$data['store_currency'] = $this->storecurrency();
			$data['user_account'] = $this->ion_auth->user()->row();
			$data['name_of_store'] = $this->nameofstore();
			$data['cart_items'] = $this->cart->contents();
			$data['products'] = $this->ion_auth_model->get_products();
			$data['customers'] = $this->ion_auth->users()->result();
			$data['subcounties'] = $this->ion_auth_model->get_shipments();
			$data['counties'] = $this->ion_auth_model->get_counties();

			$this->_render_page('templates/header');
			$this->_render_page('auth/new-order', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * add product to cart
	 *
	 * @return string
	 */
	public function add_to_cart() {
		$product = $this->ion_auth_model->get($this->input->post('id'));

		$data = [
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'vendor_id' => $product->vendor_id,
			'price' => $product->sale_price,
			'name' => $product->name,
			'image' => $product->image,
			'slug' => $product->slug
		];

		$this->cart->insert($data);
		redirect('admin/orders/new');
	}

	/**
	 * clear cart
	 */
	public function clearcart() {
		$this->cart->destroy();
		redirect('admin/orders/new');
	}

	/**
	 * remove product from cart
	 */
	public function remove($rowid) {
    	$this->cart->update([
    		'rowid' => $rowid,
    		'qty' => 0
    	]);

    	redirect('admin/orders/new');
    }

    /**
     * confirm order
     *
     * @param int|string
     */
    public function confirm_order() {
    	// form validation
    	$this->form_validation->set_rules('customer_id', $this->lang->line('confirm_order_customer_id_validation_label'), 'required');
    	$this->form_validation->set_rules('address', $this->lang->line('confirm_order_shipping_address_validation_label'), 'required|trim');
    	$this->form_validation->set_rules('postal_code', $this->lang->line('confirm_order_shipping_postal_code_validation_label'), 'required|numeric');
    	$this->form_validation->set_rules('subcounty', $this->lang->line('confirm_order_shipping_subcounty_validation_label'), 'required');
    	$this->form_validation->set_rules('county', $this->lang->line('confirm_order_shipping_county_validation_county'), 'required');
    	$this->form_validation->set_rules('method_of_payment', $this->lang->line('confirm_order_method_of_payment_validation_label'), 'required');

    	if ($this->form_validation->run() === TRUE) {
    		$this->ion_auth_model->set_order();
    		$this->cart->destroy();
    		$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/orders', 'refresh');
    	} else {
    		redirect(base_url().'admin/orders/new#checkout');
    	}
    }

	/**
	 * settings
	 */
	public function general_settings() {
		$data['title'] = $this->lang->line('general_settings_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');

		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show admin access only message
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['name_of_store'] = $this->nameofstore();

			$data['store_email'] = $this->storeemailaddress();

			$data['store_phone_number'] = $this->storephonenumber();

			$data['store_currency'] = $this->storecurrency();

			$data['store_location'] = $this->storelocation();

			$data['favicon'] = $this->get_favicon();

			$this->_render_page('templates/header');
			$this->_render_page('auth/general-settings', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * m-pesa credentials
	 *
	 * @return bool
	 */
	public function m_pesa_credentials() {
		$data['title'] = $this->lang->line('m_pesa_credentials_heading');

		// login check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');

		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show admin access only message
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['name_of_store'] = $this->nameofstore();

			$data['consumer_key'] = $this->consumer_key();

			$data['consumer_secret'] = $this->consumer_secret();

			$data['till_number'] = $this->till_number();

			$data['pass_key'] = $this->pass_key();

			$this->_render_page('templates/header');
			$this->_render_page('auth/m-pesa-credentials', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * @param int
	 *
	 * @return total sales
	 */
	public function total_sales() {
		$this->db->where('status', 4);
		$this->db->select_sum('total_orders');
		$result =  $this->db->get('orders')->row();
		return $result->total_orders;
	}

	/**
	 * @param int
	 *
	 * @return total shipments
	 */
	public function total_shipments() {
		$shipments = $this->db->get('orders')->result();
		foreach ($shipments as $shipment) {
			$this->db->where('ship_to', $shipment->subcounty);
			$shippings = $this->db->get('shipment')->result();
			foreach ($shippings as $shipping) {
				echo '<pre>';
				echo $shipping->fee;
			}
		}
	}

	/**
	 * add field
	 */
	public function add_field() {
		// validate form input
		$this->form_validation->set_rules('field', $this->lang->line('add_field_name_validation_label'), 'required|is_unique[info.field]');

		if ($this->form_validation->run() === TRUE) {
			$field = url_title($this->input->post('field'), 'dash', TRUE);
			$data = ['field' => $field];
		}

		if ($this->form_validation->run() === TRUE && $this->db->insert('info', $data)) {
			redirect('admin/settings/general');
		} else {
			echo 'error';
		}
	}

	/**
	 * @return name of store
	 */
	public function nameofstore() {
		return $this->db->get_where('info', ['field' => 'name-of-store'])->row()->value;
	}

	/**
	 * @return store currency
	 */
	public function storecurrency() {
		return $this->db->get_where('info', ['field' => 'currency'])->row()->value;
	}

	/**
	 * @return store phone number
	 */
	public function storephonenumber() {
		return $this->db->get_where('info', ['field' => 'phone-number'])->row()->value;
	}

	/**
	 * @return store email address
	 */
	public function storeemailaddress() {
		return $this->db->get_where('info', ['field' => 'email-address'])->row()->value;
	}

	/**
	 * @return store fav icon
	 */
	public function get_favicon() {
		return $this->db->get_where('info', ['field' => 'favicon'])->row()->value;
	}

	/**
	 * @return store location
	 */
	public function storelocation() {
		return $this->db->get_where('info', ['field' => 'location'])->row()->value;
	}

	/**
	 * @return consumer key
	 */
	public function consumer_key() {
		return $this->db->get_where('info', ['field' => 'consumer-key'])->row()->value;
	}

	/**
	 * @return consumer secret
	 */
	public function consumer_secret() {
		return $this->db->get_where('info', ['field' => 'consumer-secret'])->row()->value;
	}

	/**
	 * @return till number
	 */
	public function till_number() {
		return $this->db->get_where('info', ['field' => 'till-number'])->row()->value;
	}

	/**
	 * @return till number
	 */
	public function pass_key() {
		return $this->db->get_where('info', ['field' => 'pass-key'])->row()->value;
	}

	/**
	 * add name of store
	 */
	public function name_of_store() {
		// form validation
		$this->form_validation->set_rules('name_of_store', $this->lang->line('add_name_of_store_validation_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_name_of_store();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/general', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * add store email
	 */
	public function store_email() {
		// form validation
		$this->form_validation->set_rules('store_email', $this->lang->line('add_store_email_validation_label'), 'required|valid_email');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_store_email();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/general', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * add store phone number
	 */
	public function store_phone_number() {
		// form validation
		$this->form_validation->set_rules('store_phone_number', $this->lang->line('add_store_phone_number_validation_label'), 'required|numeric');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_store_phone_number();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/general', 'refresh');
		}
	}

	/**
	 * add store currency
	 */
	public function store_currency() {
		// form validation
		$this->form_validation->set_rules('store_currency', $this->lang->line('add_store_currency_validation_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_store_currency();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/general', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * add store location
	 */
	public function store_location() {
		// form validation
		$this->form_validation->set_rules('store_location', $this->lang->line('add_store_location_validation_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_store_location();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/general', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * update consumer key
	 */
	public function edit_consumer_key() {
		// form validation
		$this->form_validation->set_rules('consumer_key', $this->lang->line('edit_consumer_key_validation_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_consumer_key();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/m-pesa-credentials', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * update consumer key
	 */
	public function edit_consumer_secret() {
		// form validation
		$this->form_validation->set_rules('consumer_secret', $this->lang->line('edit_consumer_secret_validation_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_consumer_secret();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/m-pesa-credentials', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * update till number
	 */
	public function edit_till_number() {
		// form validation
		$this->form_validation->set_rules('till_number', $this->lang->line('edit_till_number_validation_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_till_number();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/m-pesa-credentials', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * update till number
	 */
	public function edit_pass_key() {
		// form validation
		$this->form_validation->set_rules('pass_key', $this->lang->line('edit_pass_key_validation_label'), 'required');

		if ($this->form_validation->run() === TRUE) {
			$this->ion_auth_model->set_pass_key();
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/settings/m-pesa-credentials', 'refresh');
		} else {
			echo 'error';
		}
	}

	/**
	 * account settings
	 *
	 * @return account info
	 *
	 */
	public function account_settings() {
		$data['title'] = $this->lang->line('account_settings_heading');

		// login and user  credendtials check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');

		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show admin access only message
			show_error($this->lang->line('admin_access_only'));
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['user_account'] = $this->ion_auth->user()->row();

			$data['name_of_store'] = $this->nameofstore();

			$data['store_email'] = $this->storeemailaddress();

			$data['store_phone_number'] = $this->storephonenumber();

			$data['store_currency'] = $this->storecurrency();

			$data['store_location'] = $this->storelocation();

			$this->_render_page('templates/header');
			$this->_render_page('auth/account-settings', $data);
			$this->_render_page('templates/footer');
		}
	}

	/**
	 * upload profile picture
	 *
	 * @return profile picture
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
		redirect('admin/account#profile_picture', 'refresh');
	}

	/**
	 * cancel order
	 *
	 * @return order status
	 */
	public function cancel_order($id) {
		$this->ion_auth_model->_cancel_order($id);
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/orders', 'refresh');
	}

	/**
	 * process order
	 *
	 * @return order status
	 */
	public function process_order($id) {
		$this->ion_auth_model->_process_order($id);
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/orders', 'refresh');
	}

	/**
	 * order in transit
	 *
	 * @return order status
	 */
	public function in_transit($id) {
		$this->ion_auth_model->_in_transit($id);
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/orders', 'refresh');
	}

	/**
	 * order pending
	 *
	 * @return order status
	 */
	public function order_pending($id) {
		$this->ion_auth_model->_order_pending($id);
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/orders', 'refresh');
	}

	/**
	 * order in transit
	 *
	 * @return order status
	 */
	public function deliver_order($id) {
		$this->ion_auth_model->_deliver_order($id);
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/orders', 'refresh');
	}

	/**
	 * add mode of payment
	 *
	 * @return bool
	 */
	public function add_mode_of_payment() {
		$data['title'] = $this->lang->line('add_mode_of_payment_title');

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');

		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show admin access only message
			show_error($this->lang->line('admin_access_only'));
		} else {
			$config['upload_path']		= './public/attachments/modes_of_payment';
			$config['allowed_types']	= 'gif|jpg|jpeg|png|JPEG|JPG|PNG';
			$config['max_size']			= 2048;
			$this->upload->initialize($config);

			// form validation
			$this->form_validation->set_rules('mode_of_payment', $this->lang->line('add_mode_of_payment_validation_mode_of_payment'), 'required');
			$this->form_validation->set_rules('status', $this->lang->line('add_mode_of_payment_validation_status'));

			$this->upload->do_upload('image');
			$upload_data = $this->upload->data();

			if ($this->form_validation->run() === TRUE) {
				$file_name = '';
				if ($upload_data) {
					$file_name = $upload_data['file_name'];
					$file_type = $upload_data['file_type'];
					$file_size = $upload_data['file_size'];
				} else {
					$upload_error = $this->upload->display_errors();
				}

				$this->ion_auth_model->set_mode_of_payment($file_name);
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin', 'refresh');
			} else {
				$data['categories'] = $this->ion_auth_model->get_categories();

				$data['tags'] = $this->ion_auth_model->get_tags();

				$data['user_account'] = $this->ion_auth->user()->row();

				$data['name_of_store'] = $this->nameofstore();

				$this->_render_page('templates/header');
				$this->_render_page('auth/add-mode-of-payment', $data);
				$this->_render_page('templates/footer');
			}
		}
	}

	public function modes_of_payments() {
		$data['title'] = $this->lang->line('list_modes_of_payments');

		// login and user credentials check
		if (!$this->ion_auth->logged_in()) {
			// if the user is not logged in
			// redirect to login page
			redirect('login', 'refresh');

		} elseif (!$this->ion_auth->is_admin()) {
			// if the user is logged in but not an admin
			// show admin access only message
			show_error($this->lang->line('admin_access_only'));
		} else {
			
		}
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
