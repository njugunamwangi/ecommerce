<?php
/**
 * Name:    Ion Auth Model
 * Author:  Ben Edmunds
 *           ben.edmunds@gmail.com
 * @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization. This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Ion Auth Model
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class Ion_auth_model extends CI_Model
{
	/**
	 * Max cookie lifetime constant
	 */
	const MAX_COOKIE_LIFETIME = 63072000; // 2 years = 60*60*24*365*2 = 63072000 seconds;

	/**
	 * Max password size constant
	 */
	const MAX_PASSWORD_SIZE_BYTES = 4096;

	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 */
	public $tables = [];

	/**
	 * activation code
	 * 
	 * Set by deactivate() function
	 * Also set on register() function, if email_activation 
	 * option is activated
	 * 
	 * This is the value devs should give to the user 
	 * (in an email, usually)
	 * 
	 * It contains the *user* version of the activation code
	 * It's a value of the form "selector.validator" 
	 * 
	 * This is not the same activation_code as the one in DB.
	 * The DB contains a *hashed* version of the validator
	 * and a selector in another column.
	 * 
	 * THe selector is not private, and only used to lookup
	 * the validator.
	 * 
	 * The validator is private, and to be only known by the user
	 * So in case of DB leak, nothing could be actually used.
	 * 
	 * @var string
	 */
	public $activation_code;

	/**
	 * new password
	 *
	 * @var string
	 */
	public $new_password;

	/**
	 * Identity
	 *
	 * @var string
	 */
	public $identity;

	/**
	 * Where
	 *
	 * @var array
	 */
	public $_ion_where = [];

	/**
	 * Select
	 *
	 * @var array
	 */
	public $_ion_select = [];

	/**
	 * Like
	 *
	 * @var array
	 */
	public $_ion_like = [];

	/**
	 * Limit
	 *
	 * @var string
	 */
	public $_ion_limit = NULL;

	/**
	 * Offset
	 *
	 * @var string
	 */
	public $_ion_offset = NULL;

	/**
	 * Order By
	 *
	 * @var string
	 */
	public $_ion_order_by = NULL;

	/**
	 * Order
	 *
	 * @var string
	 */
	public $_ion_order = NULL;

	/**
	 * Hooks
	 *
	 * @var object
	 */
	protected $_ion_hooks;

	/**
	 * Response
	 *
	 * @var string
	 */
	protected $response = NULL;

	/**
	 * message (uses lang file)
	 *
	 * @var string
	 */
	protected $messages;

	/**
	 * error message (uses lang file)
	 *
	 * @var string
	 */
	protected $errors;

	/**
	 * error start delimiter
	 *
	 * @var string
	 */
	protected $error_start_delimiter;

	/**
	 * error end delimiter
	 *
	 * @var string
	 */
	protected $error_end_delimiter;

	/**
	 * caching of users and their groups
	 *
	 * @var array
	 */
	public $_cache_user_in_group = [];

	/**
	 * caching of groups
	 *
	 * @var array
	 */
	protected $_cache_groups = [];

	/**
	 * Database object
	 *
	 * @var object
	 */
	protected $db;

	public function __construct()
	{
		$this->config->load('ion_auth', TRUE);
		$this->load->helper('cookie', 'date', 'array', 'url_helper');
		$this->lang->load('ion_auth');

		// initialize the database
		$group_name = $this->config->item('database_group_name', 'ion_auth');
		if (empty($group_name)) 
		{
			// By default, use CI's db that should be already loaded
			$CI =& get_instance();
			$this->db = $CI->db;
		}
		else
		{
			// For specific group name, open a new specific connection
			$this->db = $this->load->database($group_name, TRUE, TRUE);
		}   

		// initialize db tables data
		$this->tables = $this->config->item('tables', 'ion_auth');

		// initialize data
		$this->identity_column = $this->config->item('identity', 'ion_auth');
		$this->join = $this->config->item('join', 'ion_auth');

		// initialize hash method options (Bcrypt)
		$this->hash_method = $this->config->item('hash_method', 'ion_auth');

		// initialize messages and error
		$this->messages    = [];
		$this->errors      = [];
		$delimiters_source = $this->config->item('delimiters_source', 'ion_auth');

		// load the error delimeters either from the config file or use what's been supplied to form validation
		if ($delimiters_source === 'form_validation')
		{
			// load in delimiters from form_validation
			// to keep this simple we'll load the value using reflection since these properties are protected
			$this->load->library('form_validation');
			$form_validation_class = new ReflectionClass("CI_Form_validation");

			$error_prefix = $form_validation_class->getProperty("_error_prefix");
			$error_prefix->setAccessible(TRUE);
			$this->error_start_delimiter = $error_prefix->getValue($this->form_validation);
			$this->message_start_delimiter = $this->error_start_delimiter;

			$error_suffix = $form_validation_class->getProperty("_error_suffix");
			$error_suffix->setAccessible(TRUE);
			$this->error_end_delimiter = $error_suffix->getValue($this->form_validation);
			$this->message_end_delimiter = $this->error_end_delimiter;
		}
		else
		{
			// use delimiters from config
			$this->message_start_delimiter = $this->config->item('message_start_delimiter', 'ion_auth');
			$this->message_end_delimiter = $this->config->item('message_end_delimiter', 'ion_auth');
			$this->error_start_delimiter = $this->config->item('error_start_delimiter', 'ion_auth');
			$this->error_end_delimiter = $this->config->item('error_end_delimiter', 'ion_auth');
		}

		// initialize our hooks object
		$this->_ion_hooks = new stdClass;

		$this->trigger_events('model_constructor');
	}

	/**
	 * Getter to the DB connection used by Ion Auth
	 * May prove useful for debugging
	 *
	 * @return object
	 */
	public function db()
	{
		return $this->db;
	}

	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @param string $password
	 * @param string $identity
	 *
	 * @return false|string
	 * @author Mathew
	 */
	public function hash_password($password, $identity = NULL)
	{
		// Check for empty password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || strpos($password, "\0") !== FALSE ||
			strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return FALSE;
		}

		$algo = $this->_get_hash_algo();
		$params = $this->_get_hash_parameters($identity);

		if ($algo !== FALSE && $params !== FALSE)
		{
			return password_hash($password, $algo, $params);
		}

		return FALSE;
	}

	/**
	 * This function takes a password and validates it
	 * against an entry in the users table.
	 *
	 * @param string	$password
	 * @param string	$hash_password_db
	 * @param string	$identity			optional @deprecated only for BC SHA1
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function verify_password($password, $hash_password_db, $identity = NULL)
	{
		// Check for empty id or password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || empty($hash_password_db) || strpos($password, "\0") !== FALSE
			|| strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return FALSE;
		}

		// password_hash always starts with $
		if (strpos($hash_password_db, '$') === 0)
		{
			return password_verify($password, $hash_password_db);
		}
		else
		{
			// Handle legacy SHA1 @TODO to delete in later revision
			return $this->_password_verify_sha1_legacy($identity, $password, $hash_password_db);
		}
	}

	/**
	 * Check if password needs to be rehashed
	 * If true, then rehash and update it in DB
	 *
	 * @param string $hash
	 * @param string $identity
	 * @param string $password
	 *
	 */
	public function rehash_password_if_needed($hash, $identity, $password)
	{
		$algo = $this->_get_hash_algo();
		$params = $this->_get_hash_parameters($identity);

		if ($algo !== FALSE && $params !== FALSE)
		{
			if (password_needs_rehash($hash, $algo, $params))
			{
				if ($this->_set_password_db($identity, $password))
				{
					$this->trigger_events(['rehash_password', 'rehash_password_successful']);
				}
				else
				{
					$this->trigger_events(['rehash_password', 'rehash_password_unsuccessful']);
				}
			}
		}
	}

	/**
	 * Get a user by its activation code
	 *
	 * @param bool       $user_code	the activation code 
	 * 								It's the *user* one, containing "selector.validator"
	 * 								the one you got in activation_code member
	 *
	 * @return    bool|object
	 * @author Indigo
	 */
	public function get_user_by_activation_code($user_code)
	{
		// Retrieve the token object from the code
		$token = $this->_retrieve_selector_validator_couple($user_code);
	
		// Retrieve the user according to this selector
		$user = $this->where('activation_selector', $token->selector)->users()->row();

		if ($user)
		{
			// Check the hash against the validator
			if ($this->verify_password($token->validator, $user->activation_code))
			{
				return $user;
			}
		}

		return FALSE;
	}

	/**
	 * Validates and removes activation code.
	 *
	 * @param int|string $id		the user identifier
	 * @param bool       $code		the *user* activation code 
	 * 								if omitted, simply activate the user without check
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function activate($id, $code = FALSE)
	{
		$this->trigger_events('pre_activate');

		if ($code !== FALSE) {
			$user = $this->get_user_by_activation_code($code);
		}

		// Activate if no code is given
		// Or if a user was found with this code, and that it matches the id
		if ($code === FALSE || ($user && $user->id === $id))
		{
			$data = [
			    'activation_selector' => NULL,
			    'activation_code' => NULL,
			    'active'          => 1
			];

			$this->trigger_events('extra_where');
			$this->db->update($this->tables['users'], $data, ['id' => $id]);

			if ($this->db->affected_rows() === 1)
			{
				$this->trigger_events(['post_activate', 'post_activate_successful']);
				$this->set_message('activate_successful');
				return TRUE;
			}
		}

		$this->trigger_events(['post_activate', 'post_activate_unsuccessful']);
		$this->set_error('activate_unsuccessful');
		return FALSE;
	}


	/**
	 * Updates a users row with an activation code.
	 *
	 * @param int|string|null $id
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function deactivate($id = NULL)
	{
		$token = $this->_generate_selector_validator_couple(20, 40);
		$this->activation_code = $token->user_code;

		$data = [
		    'activation_selector' => $token->selector,
		    'activation_code' => $token->validator_hashed,
		    'active'          => 0
		];

		$this->trigger_events('extra_where');
		$this->db->update($this->tables['users'], $data, ['id' => $id]);

		$return = $this->db->affected_rows() == 1;
		if ($return)
		{
			$this->set_message('deactivate_successful');
		}
		else
		{
			$this->set_error('deactivate_unsuccessful');
		}

		return $return;
	}

	/**
	 * Clear the forgotten password code for a user
	 *
	 * @param string $identity
	 *
	 * @return bool Success
	 */
	public function clear_forgotten_password_code($identity) {

		if (empty($identity))
		{
			return FALSE;
		}

		$data = [
			'forgotten_password_selector' => NULL,
			'forgotten_password_code' => NULL,
			'forgotten_password_time' => NULL
		];

		$this->db->update($this->tables['users'], $data, [$this->identity_column => $identity]);

		return TRUE;
	}

	/**
	 * Clear the remember code for a user
	 *
	 * @param string $identity
	 *
	 * @return bool Success
	 */
	public function clear_remember_code($identity) {

		if (empty($identity))
		{
			return FALSE;
		}

		$data = [
			'remember_selector' => NULL,
			'remember_code' => NULL
		];

		$this->db->update($this->tables['users'], $data, [$this->identity_column => $identity]);

		return TRUE;
	}

	/**
	 * Reset password
	 *
	 * @param    string $identity
	 * @param    string $new
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function reset_password($identity, $new) {
		$this->trigger_events('pre_change_password');

		if (!$this->identity_check($identity)) {
			$this->trigger_events(['post_change_password', 'post_change_password_unsuccessful']);
			return FALSE;
		}

		$return = $this->_set_password_db($identity, $new);

		if ($return)
		{
			$this->trigger_events(['post_change_password', 'post_change_password_successful']);
			$this->set_message('password_change_successful');
		}
		else
		{
			$this->trigger_events(['post_change_password', 'post_change_password_unsuccessful']);
			$this->set_error('password_change_unsuccessful');
		}

		return $return;
	}

	/**
	 * Change password
	 *
	 * @param    string $identity
	 * @param    string $old
	 * @param    string $new
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function change_password($identity, $old, $new)
	{
		$this->trigger_events('pre_change_password');

		$this->trigger_events('extra_where');

		$query = $this->db->select('id, password')
		                  ->where($this->identity_column, $identity)
		                  ->limit(1)
		                  ->order_by('id', 'desc')
		                  ->get($this->tables['users']);

		if ($query->num_rows() !== 1)
		{
			$this->trigger_events(['post_change_password', 'post_change_password_unsuccessful']);
			$this->set_error('password_change_unsuccessful');
			return FALSE;
		}

		$user = $query->row();

		if ($this->verify_password($old, $user->password, $identity))
		{
			$result = $this->_set_password_db($identity, $new);

			if ($result)
			{
				$this->trigger_events(['post_change_password', 'post_change_password_successful']);
				$this->set_message('password_change_successful');
			}
			else
			{
				$this->trigger_events(['post_change_password', 'post_change_password_unsuccessful']);
				$this->set_error('password_change_unsuccessful');
			}

			return $result;
		}

		$this->set_error('password_change_unsuccessful');
		return FALSE;
	}

	/**
	 * Checks username
	 *
	 * @param string $username
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function username_check($username = '')
	{
		$this->trigger_events('username_check');

		if (empty($username))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');

		return $this->db->where('username', $username)
						->limit(1)
						->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * Checks email
	 *
	 * @param string $email
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function email_check($email = '')
	{
		$this->trigger_events('email_check');

		if (empty($email))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');

		return $this->db->where('email', $email)
						->limit(1)
						->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * Identity check
	 *
	 * @param $identity string
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function identity_check($identity = '')
	{
		$this->trigger_events('identity_check');

		if (empty($identity))
		{
			return FALSE;
		}

		return $this->db->where($this->identity_column, $identity)
						->limit(1)
						->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * Get user ID from identity
	 *
	 * @param $identity string
	 *
	 * @return bool|int
	 */
	public function get_user_id_from_identity($identity = '')
	{
		if (empty($identity))
		{
			return FALSE;
		}

		$query = $this->db->select('id')
						  ->where($this->identity_column, $identity)
						  ->limit(1)
						  ->get($this->tables['users']);

		if ($query->num_rows() !== 1)
		{
			return FALSE;
		}

		$user = $query->row();

		return $user->id;
	}

	/**
	 * Insert a forgotten password key.
	 *
	 * @param    string $identity
	 *
	 * @return    bool|string
	 * @author  Mathew
	 * @updated Ryan
	 */
	public function forgotten_password($identity)
	{
		if (empty($identity))
		{
			$this->trigger_events(['post_forgotten_password', 'post_forgotten_password_unsuccessful']);
			return FALSE;
		}

		// Generate random token: smaller size because it will be in the URL
		$token = $this->_generate_selector_validator_couple(20, 80);

		$update = [
			'forgotten_password_selector' => $token->selector,
			'forgotten_password_code' => $token->validator_hashed,
			'forgotten_password_time' => time()
		];

		$this->trigger_events('extra_where');
		$this->db->update($this->tables['users'], $update, [$this->identity_column => $identity]);

		if ($this->db->affected_rows() === 1)
		{
			$this->trigger_events(['post_forgotten_password', 'post_forgotten_password_successful']);
			return $token->user_code;
		}
		else
		{
			$this->trigger_events(['post_forgotten_password', 'post_forgotten_password_unsuccessful']);
			return FALSE;
		}
	}

	/**
	 * Get a user from a forgotten password key.
	 *
	 * @param    string $user_code
	 *
	 * @return    bool|object
	 * @author  Mathew
	 * @updated Ryan
	 */
	public function get_user_by_forgotten_password_code($user_code)
	{
		// Retrieve the token object from the code
		$token = $this->_retrieve_selector_validator_couple($user_code);

		// Retrieve the user according to this selector
		$user = $this->where('forgotten_password_selector', $token->selector)->users()->row();

		if ($user)
		{
			// Check the hash against the validator
			if ($this->verify_password($token->validator, $user->forgotten_password_code))
			{
				return $user;
			}
		}

		return FALSE;
	}

	/**
	 * Register
	 *
	 * @param    string $identity
	 * @param    string $password
	 * @param    string $email
	 * @param    array  $additional_data
	 * @param    array  $groups
	 *
	 * @return    bool
	 * @author    Mathew
	 */
	public function register($identity, $password, $email, $additional_data = [], $groups = [])
	{
		$this->trigger_events('pre_register');

		$manual_activation = $this->config->item('manual_activation', 'ion_auth');

		if ($this->identity_check($identity))
		{
			$this->set_error('account_creation_duplicate_identity');
			return FALSE;
		}
		else if (!$this->config->item('default_group', 'ion_auth') && empty($groups))
		{
			$this->set_error('account_creation_missing_default_group');
			return FALSE;
		}

		// check if the default set in config exists in database
		$query = $this->db->get_where($this->tables['groups'], ['name' => $this->config->item('default_group', 'ion_auth')], 1)->row();
		if (!isset($query->id) && empty($groups))
		{
			$this->set_error('account_creation_invalid_default_group');
			return FALSE;
		}

		// capture default group details
		$default_group = $query;

		// IP Address
		$ip_address = $this->input->ip_address();

		// Do not pass $identity as user is not known yet so there is no need
		$password = $this->hash_password($password);

		if ($password === FALSE)
		{
			$this->set_error('account_creation_unsuccessful');
			return FALSE;
		}

		// Users table.
		$data = [
			$this->identity_column => $identity,
			'username' => $identity,
			'password' => $password,
			'email' => $email,
			'ip_address' => $ip_address,
			'created_on' => time(),
			'active' => ($manual_activation === FALSE ? 1 : 0)
		];

		// filter out any data passed that doesnt have a matching column in the users table
		// and merge the set user data and the additional data
		$user_data = array_merge($this->_filter_data($this->tables['users'], $additional_data), $data);

		$this->trigger_events('extra_set');

		$this->db->insert($this->tables['users'], $user_data);

		$id = $this->db->insert_id($this->tables['users'] . '_id_seq');

		// add in groups array if it doesn't exists and stop adding into default group if default group ids are set
		if (isset($default_group->id) && empty($groups))
		{
			$groups[] = $default_group->id;
		}

		if (!empty($groups))
		{
			// add to groups
			foreach ($groups as $group)
			{
				$this->add_to_group($group, $id);
			}
		}

		$this->trigger_events('post_register');

		return (isset($id)) ? $id : FALSE;
	}

	/**
	 * login
	 *
	 * @param    string $identity
	 * @param    string $password
	 * @param    bool   $remember
	 *
	 * @return    bool
	 * @author    Mathew
	 */
	public function login($identity, $password, $remember=FALSE)
	{
		$this->trigger_events('pre_login');

		if (empty($identity) || empty($password))
		{
			$this->set_error('login_unsuccessful');
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$query = $this->db->select($this->identity_column . ', email, id, password, active, last_login')
						  ->where($this->identity_column, $identity)
						  ->limit(1)
						  ->order_by('id', 'desc')
						  ->get($this->tables['users']);

		if ($this->is_max_login_attempts_exceeded($identity))
		{
			// Hash something anyway, just to take up time
			$this->hash_password($password);

			$this->trigger_events('post_login_unsuccessful');
			$this->set_error('login_timeout');

			return FALSE;
		}

		if ($query->num_rows() === 1)
		{
			$user = $query->row();

			if ($this->verify_password($password, $user->password, $identity))
			{
				if ($user->active == 0)
				{
					$this->trigger_events('post_login_unsuccessful');
					$this->set_error('login_unsuccessful_not_active');

					return FALSE;
				}

				$this->set_session($user);

				$this->update_last_login($user->id);

				$this->set_login($user->id);

				$this->clear_login_attempts($identity);
				$this->clear_forgotten_password_code($identity);

				if ($this->config->item('remember_users', 'ion_auth'))
				{
					if ($remember)
					{
						$this->remember_user($identity);
					}
					else
					{
						$this->clear_remember_code($identity);
					}
				}
				
				// Rehash if needed
				$this->rehash_password_if_needed($user->password, $identity, $password);

				// Regenerate the session (for security purpose: to avoid session fixation)
				$this->session->sess_regenerate(FALSE);

				$this->trigger_events(['post_login', 'post_login_successful']);
				$this->set_message('login_successful');

				return TRUE;
			}
		}

		// Hash something anyway, just to take up time
		$this->hash_password($password);

		$this->increase_login_attempts($identity);

		$this->trigger_events('post_login_unsuccessful');
		$this->set_error('login_unsuccessful');

		return FALSE;
	}

	/**
	 * Verifies if the session should be rechecked according to the configuration item recheck_timer. If it does, then
	 * it will check if the user is still active
	 * @return bool
	 */
	public function recheck_session()
	{
		if (empty($this->session->userdata('identity')))
		{
			return FALSE;
		}

		$recheck = (NULL !== $this->config->item('recheck_timer', 'ion_auth')) ? $this->config->item('recheck_timer', 'ion_auth') : 0;

		if ($recheck !== 0)
		{
			$last_login = $this->session->userdata('last_check');
			if ($last_login + $recheck < time())
			{
				$query = $this->db->select('id')
								  ->where([
									  $this->identity_column => $this->session->userdata('identity'),
									  'active' => '1'
								  ])
								  ->limit(1)
								  ->order_by('id', 'desc')
								  ->get($this->tables['users']);
				if ($query->num_rows() === 1)
				{
					$this->session->set_userdata('last_check', time());
				}
				else
				{
					$this->trigger_events('logout');

					$identity = $this->config->item('identity', 'ion_auth');

					$this->session->unset_userdata([$identity, 'id', 'user_id']);

					return FALSE;
				}
			}
		}

		return (bool)$this->session->userdata('identity');
	}

	/**
	 * is_max_login_attempts_exceeded
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity   user's identity
	 * @param string|null $ip_address IP address
	 *                                Only used if track_login_ip_address is set to TRUE.
	 *                                If NULL (default value), the current IP address is used.
	 *                                Use get_last_attempt_ip($identity) to retrieve a user's last IP
	 *
	 * @return boolean
	 */
	public function is_max_login_attempts_exceeded($identity, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			$max_attempts = $this->config->item('maximum_login_attempts', 'ion_auth');
			if ($max_attempts > 0)
			{
				$attempts = $this->get_attempts_num($identity, $ip_address);
				return $attempts >= $max_attempts;
			}
		}
		return FALSE;
	}

	/**
	 * Get number of login attempts for the given IP-address or identity
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity   User's identity
	 * @param string|null $ip_address IP address
	 *                                Only used if track_login_ip_address is set to TRUE.
	 *                                If NULL (default value), the current IP address is used.
	 *                                Use get_last_attempt_ip($identity) to retrieve a user's last IP
	 *
	 * @return int
	 */
	public function get_attempts_num($identity, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			$this->db->select('1', FALSE);
			$this->db->where('login', $identity);
			if ($this->config->item('track_login_ip_address', 'ion_auth'))
			{
				if (!isset($ip_address))
				{
					$ip_address = $this->input->ip_address();
				}
				$this->db->where('ip_address', $ip_address);
			}
			$this->db->where('time >', time() - $this->config->item('lockout_time', 'ion_auth'), FALSE);
			$qres = $this->db->get($this->tables['login_attempts']);
			return $qres->num_rows();
		}
		return 0;
	}

	/**
	 * Get the last time a login attempt occurred from given identity
	 *
	 * @param string      $identity   User's identity
	 * @param string|null $ip_address IP address
	 *                                Only used if track_login_ip_address is set to TRUE.
	 *                                If NULL (default value), the current IP address is used.
	 *                                Use get_last_attempt_ip($identity) to retrieve a user's last IP
	 *
	 * @return int The time of the last login attempt for a given IP-address or identity
	 */
	public function get_last_attempt_time($identity, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			$this->db->select('time');
			$this->db->where('login', $identity);
			if ($this->config->item('track_login_ip_address', 'ion_auth'))
			{
				if (!isset($ip_address))
				{
					$ip_address = $this->input->ip_address();
				}
				$this->db->where('ip_address', $ip_address);
			}
			$this->db->order_by('id', 'desc');
			$qres = $this->db->get($this->tables['login_attempts'], 1);

			if ($qres->num_rows() > 0)
			{
				return $qres->row()->time;
			}
		}

		return 0;
	}

	/**
	 * Get the IP address of the last time a login attempt occurred from given identity
	 *
	 * @param string $identity User's identity
	 *
	 * @return string
	 */
	public function get_last_attempt_ip($identity)
	{
		if ($this->config->item('track_login_attempts', 'ion_auth') && $this->config->item('track_login_ip_address', 'ion_auth'))
		{
			$this->db->select('ip_address');
			$this->db->where('login', $identity);
			$this->db->order_by('id', 'desc');
			$qres = $this->db->get($this->tables['login_attempts'], 1);

			if ($qres->num_rows() > 0)
			{
				return $qres->row()->ip_address;
			}
		}

		return '';
	}

	/**
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * Note: the current IP address will be used if track_login_ip_address config value is TRUE
	 *
	 * @param string $identity User's identity
	 *
	 * @return bool
	 */
	public function increase_login_attempts($identity)
	{
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			$data = ['ip_address' => '', 'login' => $identity, 'time' => time()];
			if ($this->config->item('track_login_ip_address', 'ion_auth'))
			{
				$data['ip_address'] = $this->input->ip_address();
			}
			return $this->db->insert($this->tables['login_attempts'], $data);
		}
		return FALSE;
	}

	/**
	 * clear_login_attempts
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity                   User's identity
	 * @param int         $old_attempts_expire_period In seconds, any attempts older than this value will be removed.
	 *                                                It is used for regularly purging the attempts table.
	 *                                                (for security reason, minimum value is lockout_time config value)
	 * @param string|null $ip_address                 IP address
	 *                                                Only used if track_login_ip_address is set to TRUE.
	 *                                                If NULL (default value), the current IP address is used.
	 *                                                Use get_last_attempt_ip($identity) to retrieve a user's last IP
	 *
	 * @return bool
	 */
	public function clear_login_attempts($identity, $old_attempts_expire_period = 86400, $ip_address = NULL)
	{
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			// Make sure $old_attempts_expire_period is at least equals to lockout_time
			$old_attempts_expire_period = max($old_attempts_expire_period, $this->config->item('lockout_time', 'ion_auth'));

			$this->db->where('login', $identity);
			if ($this->config->item('track_login_ip_address', 'ion_auth'))
			{
				if (!isset($ip_address))
				{
					$ip_address = $this->input->ip_address();
				}
				$this->db->where('ip_address', $ip_address);
			}
			// Purge obsolete login attempts
			$this->db->or_where('time <', time() - $old_attempts_expire_period, FALSE);

			return $this->db->delete($this->tables['login_attempts']);
		}
		return FALSE;
	}

	/**
	 * @param int $limit
	 *
	 * @return static
	 */
	public function limit($limit)
	{
		$this->trigger_events('limit');
		$this->_ion_limit = $limit;

		return $this;
	}

	/**
	 * @param int $offset
	 *
	 * @return static
	 */
	public function offset($offset)
	{
		$this->trigger_events('offset');
		$this->_ion_offset = $offset;

		return $this;
	}

	/**
	 * @param array|string $where
	 * @param null|string  $value
	 *
	 * @return static
	 */
	public function where($where, $value = NULL)
	{
		$this->trigger_events('where');

		if (!is_array($where))
		{
			$where = [$where => $value];
		}

		array_push($this->_ion_where, $where);

		return $this;
	}

	/**
	 * @param string      $like
	 * @param string|null $value
	 * @param string      $position
	 *
	 * @return static
	 */
	public function like($like, $value = NULL, $position = 'both')
	{
		$this->trigger_events('like');

		array_push($this->_ion_like, [
			'like'     => $like,
			'value'    => $value,
			'position' => $position
		]);

		return $this;
	}

	/**
	 * @param array|string $select
	 *
	 * @return static
	 */
	public function select($select)
	{
		$this->trigger_events('select');

		$this->_ion_select[] = $select;

		return $this;
	}

	/**
	 * @param string $by
	 * @param string $order
	 *
	 * @return static
	 */
	public function order_by($by, $order='desc')
	{
		$this->trigger_events('order_by');

		$this->_ion_order_by = $by;
		$this->_ion_order    = $order;

		return $this;
	}

	/**
	 * @return object|mixed
	 */
	public function row()
	{
		$this->trigger_events('row');

		$row = $this->response->row();

		return $row;
	}

	/**
	 * @return array|mixed
	 */
	public function row_array()
	{
		$this->trigger_events(['row', 'row_array']);

		$row = $this->response->row_array();

		return $row;
	}

	/**
	 * @return mixed
	 */
	public function result()
	{
		$this->trigger_events('result');

		$result = $this->response->result();

		return $result;
	}

	/**
	 * @return array|mixed
	 */
	public function result_array()
	{
		$this->trigger_events(['result', 'result_array']);

		$result = $this->response->result_array();

		return $result;
	}

	/**
	 * @return int
	 */
	public function num_rows()
	{
		$this->trigger_events(['num_rows']);

		$result = $this->response->num_rows();

		return $result;
	}

	/**
	 * users
	 *
	 * @param array|null $groups
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function users($groups = NULL)
	{
		$this->trigger_events('users');

		if (isset($this->_ion_select) && !empty($this->_ion_select))
		{
			foreach ($this->_ion_select as $select)
			{
				$this->db->select($select);
			}

			$this->_ion_select = [];
		}
		else
		{
			// default selects
			$this->db->select([
			    $this->tables['users'].'.*',
			    $this->tables['users'].'.id as id',
			    $this->tables['users'].'.id as user_id'
			]);
		}

		// filter by group id(s) if passed
		if (isset($groups))
		{
			// build an array if only one group was passed
			if (!is_array($groups))
			{
				$groups = [$groups];
			}

			// join and then run a where_in against the group ids
			if (isset($groups) && !empty($groups))
			{
				$this->db->distinct();
				$this->db->join(
				    $this->tables['users_groups'],
				    $this->tables['users_groups'].'.'.$this->join['users'].'='.$this->tables['users'].'.id',
				    'inner'
				);
			}

			// verify if group name or group id was used and create and put elements in different arrays
			$group_ids = [];
			$group_names = [];
			foreach($groups as $group)
			{
				if(is_numeric($group)) $group_ids[] = $group;
				else $group_names[] = $group;
			}
			$or_where_in = (!empty($group_ids) && !empty($group_names)) ? 'or_where_in' : 'where_in';
			// if group name was used we do one more join with groups
			if(!empty($group_names))
			{
				$this->db->join($this->tables['groups'], $this->tables['users_groups'] . '.' . $this->join['groups'] . ' = ' . $this->tables['groups'] . '.id', 'inner');
				$this->db->where_in($this->tables['groups'] . '.name', $group_names);
			}
			if(!empty($group_ids))
			{
				$this->db->{$or_where_in}($this->tables['users_groups'].'.'.$this->join['groups'], $group_ids);
			}
		}

		$this->trigger_events('extra_where');

		// run each where that was passed
		if (isset($this->_ion_where) && !empty($this->_ion_where))
		{
			foreach ($this->_ion_where as $where)
			{
				$this->db->where($where);
			}

			$this->_ion_where = [];
		}

		if (isset($this->_ion_like) && !empty($this->_ion_like))
		{
			foreach ($this->_ion_like as $like)
			{
				$this->db->or_like($like['like'], $like['value'], $like['position']);
			}

			$this->_ion_like = [];
		}

		if (isset($this->_ion_limit) && isset($this->_ion_offset))
		{
			$this->db->limit($this->_ion_limit, $this->_ion_offset);

			$this->_ion_limit  = NULL;
			$this->_ion_offset = NULL;
		}
		else if (isset($this->_ion_limit))
		{
			$this->db->limit($this->_ion_limit);

			$this->_ion_limit  = NULL;
		}

		// set the order
		if (isset($this->_ion_order_by) && isset($this->_ion_order))
		{
			$this->db->order_by($this->_ion_order_by, $this->_ion_order);

			$this->_ion_order    = NULL;
			$this->_ion_order_by = NULL;
		}

		$this->response = $this->db->get($this->tables['users']);

		return $this;
	}

	/**
	 * user
	 *
	 * @param int|string|null $id
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function user($id = NULL)
	{
		$this->trigger_events('user');

		// if no id was passed use the current users id
		$id = isset($id) ? $id : $this->session->userdata('user_id');

		$this->limit(1);
		$this->order_by($this->tables['users'].'.id', 'desc');
		$this->where($this->tables['users'].'.id', $id);

		$this->users();

		return $this;
	}

	/**
	 * get_users_groups
	 *
	 * @param int|string|bool $id
	 *
	 * @return CI_DB_result
	 * @author Ben Edmunds
	 */
	public function get_users_groups($id = FALSE)
	{
		$this->trigger_events('get_users_group');

		// if no id was passed use the current users id
		$id || $id = $this->session->userdata('user_id');

		return $this->db->select($this->tables['users_groups'].'.'.$this->join['groups'].' as id, '.$this->tables['groups'].'.name, '.$this->tables['groups'].'.description')
		                ->where($this->tables['users_groups'].'.'.$this->join['users'], $id)
		                ->join($this->tables['groups'], $this->tables['users_groups'].'.'.$this->join['groups'].'='.$this->tables['groups'].'.id')
		                ->get($this->tables['users_groups']);
	}

	/**
	 * @param int|string|array $check_group group(s) to check
	 * @param int|string|bool  $id          user id
	 * @param bool             $check_all   check if all groups is present, or any of the groups
	 *
	 * @return bool Whether the/all user(s) with the given ID(s) is/are in the given group
	 * @author Phil Sturgeon
	 **/
	public function in_group($check_group, $id = FALSE, $check_all = FALSE)
	{
		$this->trigger_events('in_group');

		$id || $id = $this->session->userdata('user_id');

		if (!is_array($check_group))
		{
			$check_group = [$check_group];
		}

		if (isset($this->_cache_user_in_group[$id]))
		{
			$groups_array = $this->_cache_user_in_group[$id];
		}
		else
		{
			$users_groups = $this->get_users_groups($id)->result();
			$groups_array = [];
			foreach ($users_groups as $group)
			{
				$groups_array[$group->id] = $group->name;
			}
			$this->_cache_user_in_group[$id] = $groups_array;
		}
		foreach ($check_group as $key => $value)
		{
			$groups = (is_numeric($value)) ? array_keys($groups_array) : $groups_array;

			/**
			 * if !all (default), in_array
			 * if all, !in_array
			 */
			if (in_array($value, $groups) xor $check_all)
			{
				/**
				 * if !all (default), true
				 * if all, false
				 */
				return !$check_all;
			}
		}

		/**
		 * if !all (default), false
		 * if all, true
		 */
		return $check_all;
	}

	/**
	 * add_to_group
	 *
	 * @param array|int|float|string $group_ids
	 * @param bool|int|float|string  $user_id
	 *
	 * @return int
	 * @author Ben Edmunds
	 */
	public function add_to_group($group_ids, $user_id = FALSE)
	{
		$this->trigger_events('add_to_group');

		// if no id was passed use the current users id
		$user_id || $user_id = $this->session->userdata('user_id');

		if(!is_array($group_ids))
		{
			$group_ids = [$group_ids];
		}

		$return = 0;

		// Then insert each into the database
		foreach ($group_ids as $group_id)
		{
			// Cast to float to support bigint data type
			if ($this->db->insert($this->tables['users_groups'],
								  [ $this->join['groups'] => (float)$group_id,
									$this->join['users']  => (float)$user_id  ]))
			{
				if (isset($this->_cache_groups[$group_id]))
				{
					$group_name = $this->_cache_groups[$group_id];
				}
				else
				{
					$group = $this->group($group_id)->result();
					$group_name = $group[0]->name;
					$this->_cache_groups[$group_id] = $group_name;
				}
				$this->_cache_user_in_group[$user_id][$group_id] = $group_name;

				// Return the number of groups added
				$return++;
			}
		}

		return $return;
	}

	/**
	 * remove_from_group
	 *
	 * @param array|int|float|string|bool $group_ids
	 * @param int|float|string|bool $user_id
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function remove_from_group($group_ids = FALSE, $user_id = FALSE)
	{
		$this->trigger_events('remove_from_group');

		// user id is required
		if (empty($user_id))
		{
			return FALSE;
		}

		// if group id(s) are passed remove user from the group(s)
		if (!empty($group_ids))
		{
			if (!is_array($group_ids))
			{
				$group_ids = [$group_ids];
			}

			foreach ($group_ids as $group_id)
			{
				// Cast to float to support bigint data type
				$this->db->delete(
					$this->tables['users_groups'],
					[$this->join['groups'] => (float)$group_id, $this->join['users'] => (float)$user_id]
				);
				if (isset($this->_cache_user_in_group[$user_id]) && isset($this->_cache_user_in_group[$user_id][$group_id]))
				{
					unset($this->_cache_user_in_group[$user_id][$group_id]);
				}
			}

			$return = TRUE;
		}
		// otherwise remove user from all groups
		else
		{
			// Cast to float to support bigint data type
			if ($return = $this->db->delete($this->tables['users_groups'], [$this->join['users'] => (float)$user_id]))
			{
				$this->_cache_user_in_group[$user_id] = [];
			}
		}
		return $return;
	}

	/**
	 * groups
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function groups()
	{
		$this->trigger_events('groups');

		// run each where that was passed
		if (isset($this->_ion_where) && !empty($this->_ion_where))
		{
			foreach ($this->_ion_where as $where)
			{
				$this->db->where($where);
			}
			$this->_ion_where = [];
		}

		if (isset($this->_ion_limit) && isset($this->_ion_offset))
		{
			$this->db->limit($this->_ion_limit, $this->_ion_offset);

			$this->_ion_limit  = NULL;
			$this->_ion_offset = NULL;
		}
		else if (isset($this->_ion_limit))
		{
			$this->db->limit($this->_ion_limit);

			$this->_ion_limit  = NULL;
		}

		// set the order
		if (isset($this->_ion_order_by) && isset($this->_ion_order))
		{
			$this->db->order_by($this->_ion_order_by, $this->_ion_order);
		}

		$this->response = $this->db->get($this->tables['groups']);

		return $this;
	}

	/**
	 * group
	 *
	 * @param int|string|null $id
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function group($id = NULL)
	{
		$this->trigger_events('group');

		if (isset($id))
		{
			$this->where($this->tables['groups'].'.id', $id);
		}

		$this->limit(1);
		$this->order_by('id', 'desc');

		return $this->groups();
	}

	/**
	 * update
	 *
	 * @param int|string $id
	 * @param array      $data
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 */
	public function update($id, array $data)
	{
		$this->trigger_events('pre_update_user');

		$user = $this->user($id)->row();

		$this->db->trans_begin();

		if (array_key_exists($this->identity_column, $data) && $this->identity_check($data[$this->identity_column]) && $user->{$this->identity_column} !== $data[$this->identity_column])
		{
			$this->db->trans_rollback();
			$this->set_error('account_creation_duplicate_identity');

			$this->trigger_events(['post_update_user', 'post_update_user_unsuccessful']);
			$this->set_error('update_unsuccessful');

			return FALSE;
		}

		// Filter the data passed
		$data = $this->_filter_data($this->tables['users'], $data);

		if (array_key_exists($this->identity_column, $data) || array_key_exists('password', $data) || array_key_exists('email', $data))
		{
			if (array_key_exists('password', $data))
			{
				if( ! empty($data['password']))
				{
					$data['password'] = $this->hash_password($data['password'], $user->{$this->identity_column});
					if ($data['password'] === FALSE)
					{
						$this->db->trans_rollback();
						$this->trigger_events(['post_update_user', 'post_update_user_unsuccessful']);
						$this->set_error('update_unsuccessful');

						return FALSE;
					}
				}
				else
				{
					// unset password so it doesn't effect database entry if no password passed
					unset($data['password']);
				}
			}
		}

		$this->trigger_events('extra_where');
		$this->db->update($this->tables['users'], $data, ['id' => $user->id]);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			$this->trigger_events(['post_update_user', 'post_update_user_unsuccessful']);
			$this->set_error('update_unsuccessful');
			return FALSE;
		}

		$this->db->trans_commit();

		$this->trigger_events(['post_update_user', 'post_update_user_successful']);
		$this->set_message('update_successful');
		return TRUE;
	}

	/**
	 * delete_user
	 *
	 * @param int|string $id
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 */
	public function delete_user($id)
	{
		$this->trigger_events('pre_delete_user');

		$this->db->trans_begin();

		// remove user from groups
		$this->remove_from_group(NULL, $id);

		// delete user from users table should be placed after remove from group
		$this->db->delete($this->tables['users'], ['id' => $id]);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$this->trigger_events(['post_delete_user', 'post_delete_user_unsuccessful']);
			$this->set_error('delete_unsuccessful');
			return FALSE;
		}

		$this->db->trans_commit();

		$this->trigger_events(['post_delete_user', 'post_delete_user_successful']);
		$this->set_message('delete_successful');
		return TRUE;
	}

	/**
	 * update_last_login
	 *
	 * @param int|string $id
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function update_last_login($id)
	{
		$this->trigger_events('update_last_login');

		$this->load->helper('date');

		$this->trigger_events('extra_where');

		$this->db->update($this->tables['users'], ['last_login' => time()], ['id' => $id]);

		return $this->db->affected_rows() == 1;
	}

	/**
	 * set_login
	 *
	 * @param string
	 *
	 * @author Desmond Njuguna
	 */
	public function set_login($id) {
		$this->load->helper('date');

		$ip_address = $this->input->ip_address();

		$data = [
			'customer_id' => $id,
			'ip_address' => $ip_address,
			'time' => time()
		];

		$this->db->insert('logins', $data);

		return $this->db->affected_rows() == 1;
	}

	/**
	 * set_lang
	 *
	 * @param string $lang
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function set_lang($lang = 'en')
	{
		$this->trigger_events('set_lang');

		// if the user_expire is set to zero we'll set the expiration two years from now.
		if($this->config->item('user_expire', 'ion_auth') === 0)
		{
			$expire = self::MAX_COOKIE_LIFETIME;
		}
		// otherwise use what is set
		else
		{
			$expire = $this->config->item('user_expire', 'ion_auth');
		}

		set_cookie([
			'name'   => 'lang_code',
			'value'  => $lang,
			'expire' => $expire
		]);

		return TRUE;
	}

	/**
	 * set_session
	 *
	 * @param object $user
	 *
	 * @return bool
	 * @author jrmadsen67
	 */
	public function set_session($user)
	{
		$this->trigger_events('pre_set_session');

		$session_data = [
		    'identity'             => $user->{$this->identity_column},
		    $this->identity_column => $user->{$this->identity_column},
		    'email'                => $user->email,
		    'user_id'              => $user->id, //everyone likes to overwrite id so we'll use user_id
		    'old_last_login'       => $user->last_login,
		    'last_check'           => time(),
		];

		$this->session->set_userdata($session_data);

		$this->trigger_events('post_set_session');

		return TRUE;
	}

	/**
	 * Set a user to be remembered
	 *
	 * Implemented as described in
	 * https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
	 *
	 * @param string $identity
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function remember_user($identity)
	{
		$this->trigger_events('pre_remember_user');

		if (!$identity)
		{
			return FALSE;
		}

		// Generate random tokens
		$token = $this->_generate_selector_validator_couple();

		if ($token->validator_hashed)
		{
			$this->db->update($this->tables['users'],
								[ 'remember_selector' => $token->selector,
								  'remember_code' => $token->validator_hashed ],
								[ $this->identity_column => $identity ]);

			if ($this->db->affected_rows() > -1)
			{
				// if the user_expire is set to zero we'll set the expiration two years from now.
				if($this->config->item('user_expire', 'ion_auth') === 0)
				{
					$expire = self::MAX_COOKIE_LIFETIME;
				}
				// otherwise use what is set
				else
				{
					$expire = $this->config->item('user_expire', 'ion_auth');
				}

				set_cookie([
					'name'   => $this->config->item('remember_cookie_name', 'ion_auth'),
					'value'  => $token->user_code,
					'expire' => $expire
				]);

				$this->trigger_events(['post_remember_user', 'remember_user_successful']);
				return TRUE;
			}
		}

		$this->trigger_events(['post_remember_user', 'remember_user_unsuccessful']);
		return FALSE;
	}

	/**
	 * Login automatically a user with the "Remember me" feature
	 * Implemented as described in
	 * https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function login_remembered_user()
	{
		$this->trigger_events('pre_login_remembered_user');

		// Retrieve token from cookie
		$remember_cookie = get_cookie($this->config->item('remember_cookie_name', 'ion_auth'));
		$token = $this->_retrieve_selector_validator_couple($remember_cookie);

		if ($token === FALSE)
		{
			$this->trigger_events(['post_login_remembered_user', 'post_login_remembered_user_unsuccessful']);
			return FALSE;
		}

		// get the user with the selector
		$this->trigger_events('extra_where');
		$query = $this->db->select($this->identity_column . ', id, email, remember_code, last_login')
						  ->where('remember_selector', $token->selector)
						  ->where('active', 1)
						  ->limit(1)
						  ->get($this->tables['users']);

		// Check that we got the user
		if ($query->num_rows() === 1)
		{
			// Retrieve the information
			$user = $query->row();

			// Check the code against the validator
			$identity = $user->{$this->identity_column};
			if ($this->verify_password($token->validator, $user->remember_code, $identity))
			{
				$this->update_last_login($user->id);

				$this->set_session($user);

				$this->clear_forgotten_password_code($identity);

				// extend the users cookies if the option is enabled
				if ($this->config->item('user_extend_on_login', 'ion_auth'))
				{
					$this->remember_user($identity);
				}

				// Regenerate the session (for security purpose: to avoid session fixation)
				$this->session->sess_regenerate(FALSE);

				$this->trigger_events(['post_login_remembered_user', 'post_login_remembered_user_successful']);
				return TRUE;
			}
		}
		delete_cookie($this->config->item('remember_cookie_name', 'ion_auth'));

		$this->trigger_events(['post_login_remembered_user', 'post_login_remembered_user_unsuccessful']);
		return FALSE;
	}


	/**
	 * create_group
	 *
	 * @param string|bool $group_name
	 * @param string      $group_description
	 * @param array       $additional_data
	 *
	 * @return int|bool The ID of the inserted group, or FALSE on failure
	 * @author aditya menon
	 */
	public function create_group($group_name = FALSE, $group_description = '', $additional_data = [])
	{
		// bail if the group name was not passed
		if(!$group_name)
		{
			$this->set_error('group_name_required');
			return FALSE;
		}

		// bail if the group name already exists
		$existing_group = $this->db->get_where($this->tables['groups'], ['name' => $group_name])->num_rows();
		if($existing_group !== 0)
		{
			$this->set_error('group_already_exists');
			return FALSE;
		}

		$data = ['name'=>$group_name,'description'=>$group_description];

		// filter out any data passed that doesnt have a matching column in the groups table
		// and merge the set group data and the additional data
		if (!empty($additional_data)) $data = array_merge($this->_filter_data($this->tables['groups'], $additional_data), $data);

		$this->trigger_events('extra_group_set');

		// insert the new group
		$this->db->insert($this->tables['groups'], $data);
		$group_id = $this->db->insert_id($this->tables['groups'] . '_id_seq');

		// report success
		$this->set_message('group_creation_successful');
		// return the brand new group id
		return $group_id;
	}

	/**
	 * update_group
	 *
	 * @param int|string|bool $group_id
	 * @param string|bool     $group_name
	 * @param array    $additional_data
	 *
	 * @return bool
	 * @author aditya menon
	 */
	public function update_group($group_id = FALSE, $group_name = FALSE, $additional_data = [])
	{
		if (empty($group_id))
		{
			return FALSE;
		}

		$data = [];

		if (!empty($group_name))
		{
			// we are changing the name, so do some checks

			// bail if the group name already exists
			$existing_group = $this->db->get_where($this->tables['groups'], ['name' => $group_name])->row();
			if (isset($existing_group->id) && $existing_group->id != $group_id)
			{
				$this->set_error('group_already_exists');
				return FALSE;
			}

			$data['name'] = $group_name;
		}

		// restrict change of name of the admin group
		$group = $this->db->get_where($this->tables['groups'], ['id' => $group_id])->row();
		if ($this->config->item('admin_group', 'ion_auth') === $group->name && $group_name !== $group->name)
		{
			$this->set_error('group_name_admin_not_alter');
			return FALSE;
		}

		// filter out any data passed that doesnt have a matching column in the groups table
		// and merge the set group data and the additional data
		if (!empty($additional_data))
		{
			$data = array_merge($this->_filter_data($this->tables['groups'], $additional_data), $data);
		}

		$this->db->update($this->tables['groups'], $data, ['id' => $group_id]);

		$this->set_message('group_update_successful');

		return TRUE;
	}

	/**
	 * delete_group
	 *
	 * @param int|string|bool $group_id
	 *
	 * @return bool
	 * @author aditya menon
	 */
	public function delete_group($group_id = FALSE)
	{
		// bail if mandatory param not set
		if(!$group_id || empty($group_id))
		{
			return FALSE;
		}
		$group = $this->group($group_id)->row();
		if($group->name == $this->config->item('admin_group', 'ion_auth'))
		{
			$this->trigger_events(['post_delete_group', 'post_delete_group_notallowed']);
			$this->set_error('group_delete_notallowed');
			return FALSE;
		}

		$this->trigger_events('pre_delete_group');

		$this->db->trans_begin();

		// remove all users from this group
		$this->db->delete($this->tables['users_groups'], [$this->join['groups'] => $group_id]);
		// remove the group itself
		$this->db->delete($this->tables['groups'], ['id' => $group_id]);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$this->trigger_events(['post_delete_group', 'post_delete_group_unsuccessful']);
			$this->set_error('group_delete_unsuccessful');
			return FALSE;
		}

		$this->db->trans_commit();

		$this->trigger_events(['post_delete_group', 'post_delete_group_successful']);
		$this->set_message('group_delete_successful');
		return TRUE;
	}

	/**
	 * @param string $event
	 * @param string $name
	 * @param string $class
	 * @param string $method
	 * @param array $arguments
	 */
	public function set_hook($event, $name, $class, $method, $arguments)
	{
		$this->_ion_hooks->{$event}[$name] = new stdClass;
		$this->_ion_hooks->{$event}[$name]->class     = $class;
		$this->_ion_hooks->{$event}[$name]->method    = $method;
		$this->_ion_hooks->{$event}[$name]->arguments = $arguments;
	}

	/**
	 * @param string $event
	 * @param string $name
	 */
	public function remove_hook($event, $name)
	{
		if (isset($this->_ion_hooks->{$event}[$name]))
		{
			unset($this->_ion_hooks->{$event}[$name]);
		}
	}

	/**
	 * @param string $event
	 */
	public function remove_hooks($event)
	{
		if (isset($this->_ion_hooks->$event))
		{
			unset($this->_ion_hooks->$event);
		}
	}

	/**
	 * @param string $event
	 * @param string $name
	 *
	 * @return bool|mixed
	 */
	protected function _call_hook($event, $name)
	{
		if (isset($this->_ion_hooks->{$event}[$name]) && method_exists($this->_ion_hooks->{$event}[$name]->class, $this->_ion_hooks->{$event}[$name]->method))
		{
			$hook = $this->_ion_hooks->{$event}[$name];

			return call_user_func_array([$hook->class, $hook->method], $hook->arguments);
		}

		return FALSE;
	}

	/**
	 * @param string|array $events
	 */
	public function trigger_events($events)
	{
		if (is_array($events) && !empty($events))
		{
			foreach ($events as $event)
			{
				$this->trigger_events($event);
			}
		}
		else
		{
			if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events))
			{
				foreach ($this->_ion_hooks->$events as $name => $hook)
				{
					$this->_call_hook($events, $name);
				}
			}
		}
	}

	/**
	 * set_message_delimiters
	 *
	 * Set the message delimiters
	 *
	 * @param string $start_delimiter
	 * @param string $end_delimiter
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function set_message_delimiters($start_delimiter, $end_delimiter)
	{
		$this->message_start_delimiter = $start_delimiter;
		$this->message_end_delimiter   = $end_delimiter;

		return TRUE;
	}

	/**
	 * set_error_delimiters
	 *
	 * Set the error delimiters
	 *
	 * @param string $start_delimiter
	 * @param string $end_delimiter
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function set_error_delimiters($start_delimiter, $end_delimiter)
	{
		$this->error_start_delimiter = $start_delimiter;
		$this->error_end_delimiter   = $end_delimiter;

		return TRUE;
	}

	/**
	 * set_message
	 *
	 * Set a message
	 *
	 * @param string $message The message
	 *
	 * @return string The given message
	 * @author Ben Edmunds
	 */
	public function set_message($message)
	{
		$this->messages[] = $message;

		return $message;
	}

	/**
	 * messages
	 *
	 * Get the messages
	 *
	 * @return string
	 * @author Ben Edmunds
	 */
	public function messages()
	{
		$_output = '';
		foreach ($this->messages as $message)
		{
			$messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
			$_output .= $this->message_start_delimiter . $messageLang . $this->message_end_delimiter;
		}

		return $_output;
	}

	/**
	 * messages as array
	 *
	 * Get the messages as an array
	 *
	 * @param bool $langify
	 *
	 * @return array
	 * @author Raul Baldner Junior
	 */
	public function messages_array($langify = TRUE)
	{
		if ($langify)
		{
			$_output = [];
			foreach ($this->messages as $message)
			{
				$messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
				$_output[] = $this->message_start_delimiter . $messageLang . $this->message_end_delimiter;
			}
			return $_output;
		}
		else
		{
			return $this->messages;
		}
	}

	/**
	 * clear_messages
	 *
	 * Clear messages
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function clear_messages()
	{
		$this->messages = [];

		return TRUE;
	}

	/**
	 * set_error
	 *
	 * Set an error message
	 *
	 * @param string $error The error to set
	 *
	 * @return string The given error
	 * @author Ben Edmunds
	 */
	public function set_error($error)
	{
		$this->errors[] = $error;

		return $error;
	}

	/**
	 * errors
	 *
	 * Get the error message
	 *
	 * @return string
	 * @author Ben Edmunds
	 */
	public function errors()
	{
		$_output = '';
		foreach ($this->errors as $error)
		{
			$errorLang = $this->lang->line($error) ? $this->lang->line($error) : '##' . $error . '##';
			$_output .= $this->error_start_delimiter . $errorLang . $this->error_end_delimiter;
		}

		return $_output;
	}

	/**
	 * errors as array
	 *
	 * Get the error messages as an array
	 *
	 * @param bool $langify
	 *
	 * @return array
	 * @author Raul Baldner Junior
	 */
	public function errors_array($langify = TRUE)
	{
		if ($langify)
		{
			$_output = [];
			foreach ($this->errors as $error)
			{
				$errorLang = $this->lang->line($error) ? $this->lang->line($error) : '##' . $error . '##';
				$_output[] = $this->error_start_delimiter . $errorLang . $this->error_end_delimiter;
			}
			return $_output;
		}
		else
		{
			return $this->errors;
		}
	}

	/**
	 * clear_errors
	 *
	 * Clear Errors
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function clear_errors()
	{
		$this->errors = [];

		return TRUE;
	}

	/**
	 * Internal function to set a password in the database
	 *
	 * @param string $identity
	 * @param string $password
	 *
	 * @return bool
	 */
	protected function _set_password_db($identity, $password)
	{
		$hash = $this->hash_password($password, $identity);

		if ($hash === FALSE)
		{
			return FALSE;
		}

		// When setting a new password, invalidate any other token
		$data = [
			'password' => $hash,
			'remember_code' => NULL,
			'forgotten_password_code' => NULL,
			'forgotten_password_time' => NULL
		];

		$this->trigger_events('extra_where');

		$this->db->update($this->tables['users'], $data, [$this->identity_column => $identity]);

		return $this->db->affected_rows() == 1;
	}

	/**
	 * @param string $table
	 * @param array  $data
	 *
	 * @return array
	 */
	protected function _filter_data($table, $data)
	{
		$filtered_data = [];
		$columns = $this->db->list_fields($table);

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $data))
					$filtered_data[$column] = $data[$column];
			}
		}

		return $filtered_data;
	}


	/** Generate a random token
	 * Inspired from http://php.net/manual/en/function.random-bytes.php#118932
	 *
	 * @param int $result_length
	 * @return string
	 */
	protected function _random_token($result_length = 32)
	{
		if(!isset($result_length) || intval($result_length) <= 8 ){
			$result_length = 32;
		}

		// Try random_bytes: PHP 7
		if (function_exists('random_bytes')) {
			return bin2hex(random_bytes($result_length / 2));
		}

		// Try mcrypt
		if (function_exists('mcrypt_create_iv')) {
			return bin2hex(mcrypt_create_iv($result_length / 2, MCRYPT_DEV_URANDOM));
		}

		// Try openssl
		if (function_exists('openssl_random_pseudo_bytes')) {
			return bin2hex(openssl_random_pseudo_bytes($result_length / 2));
		}

		// No luck!
		return FALSE;
	}

	/** Retrieve hash parameter according to options
	 *
	 * @param string	$identity
	 *
	 * @return array|bool
	 */
	protected function _get_hash_parameters($identity = NULL)
	{
		// Check if user is administrator or not
		$is_admin = FALSE;
		if ($identity)
		{
			$user_id = $this->get_user_id_from_identity($identity);
			if ($user_id && $this->in_group($this->config->item('admin_group', 'ion_auth'), $user_id))
			{
				$is_admin = TRUE;
			}
		}

		$params = FALSE;
		switch ($this->hash_method)
		{
			case 'bcrypt':
				$params = [
					'cost' => $is_admin ? $this->config->item('bcrypt_admin_cost', 'ion_auth')
										: $this->config->item('bcrypt_default_cost', 'ion_auth')
				];
				break;

			case 'argon2':
				$params = $is_admin ? $this->config->item('argon2_admin_params', 'ion_auth')
									: $this->config->item('argon2_default_params', 'ion_auth');
				break;

			default:
				// Do nothing
		}

		return $params;
	}

	/** Retrieve hash algorithm according to options
	 *
	 * @return string|bool
	 */
	protected function _get_hash_algo()
	{
		$algo = FALSE;
		switch ($this->hash_method)
		{
			case 'bcrypt':
				$algo = PASSWORD_BCRYPT;
				break;

			case 'argon2':
				$algo = PASSWORD_ARGON2I;
				break;

			default:
				// Do nothing
		}

		return $algo;
	}

	/**
	 * Generate a random selector/validator couple
	 * This is a user code
	 *
	 * @param $selector_size int	size of the selector token
	 * @param $validator_size int	size of the validator token
	 *
	 * @return object
	 * 			->selector			simple token to retrieve the user (to store in DB)
	 * 			->validator_hashed	token (hashed) to validate the user (to store in DB)
	 * 			->user_code			code to be used user-side (in cookie or URL)
	 */
	protected function _generate_selector_validator_couple($selector_size = 40, $validator_size = 128)
	{
		// The selector is a simple token to retrieve the user
		$selector = $this->_random_token($selector_size);

		// The validator will strictly validate the user and should be more complex
		$validator = $this->_random_token($validator_size);

		// The validator is hashed for storing in DB (avoid session stealing in case of DB leaked)
		$validator_hashed = $this->hash_password($validator);

		// The code to be used user-side
		$user_code = "$selector.$validator";

		return (object) [
			'selector' => $selector,
			'validator_hashed' => $validator_hashed,
			'user_code' => $user_code,
		];
	}

	/**
	 * Retrieve remember cookie info
	 *
	 * @param $user_code string	A user code of the form "selector.validator"
	 *
	 * @return object
	 * 			->selector		simple token to retrieve the user in DB
	 * 			->validator		token to validate the user (check against hashed value in DB)
	 */
	protected function _retrieve_selector_validator_couple($user_code)
	{
		// Check code
		if ($user_code)
		{
			$tokens = explode('.', $user_code);

			// Check tokens
			if (count($tokens) === 2)
			{
				return (object) [
					'selector' => $tokens[0],
					'validator' => $tokens[1]
				];
			}
		}

		return FALSE;
	}

	/**
	 * Handle legacy sha1 password
	 *
	 * We expect the configuration to still have:
	 *		store_salt
	 *		salt_length
	 *
	 * @TODO to be removed in later version
	 *
	 * @param string	$identity
	 * @param string	$password
	 * @param string	$hashed_password_db
	 *
	 * @return bool
	 **/
	protected function _password_verify_sha1_legacy($identity, $password, $hashed_password_db)
	{
		$this->trigger_events('pre_sha1_password_migration');

		if ($this->config->item('store_salt', 'ion_auth'))
		{
			// Salt is store at the side, retrieve it
			$query = $this->db->select('salt')
							  ->where($this->identity_column, $identity)
							  ->limit(1)
							  ->get($this->tables['users']);

			$salt_db = $query->row();

			if ($query->num_rows() !== 1)
			{
				$this->trigger_events(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
				return FALSE;
			}

			$hashed_password = sha1($password . $salt_db->salt);
		}
		else
		{
			// Salt is stored along with password
			$salt_length = $this->config->item('salt_length', 'ion_auth');

			if (!$salt_length)
			{
				$this->trigger_events(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
				return FALSE;
			}

			$salt = substr($hashed_password_db, 0, $salt_length);

			$hashed_password =  $salt . substr(sha1($salt . $password), 0, -$salt_length);
		}

		// Now we can compare them
		if($hashed_password === $hashed_password_db)
		{
			// Password is good, migrate it to latest
			$result = $this->_set_password_db($identity, $password);

			if ($result)
			{
				$this->trigger_events(['post_sha1_password_migration', 'post_sha1_password_migration_successful']);
			}
			else
			{
				$this->trigger_events(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
			}

			return $result;
		}
		else
		{
			// Password mismatch, we cannot migrate...
			$this->trigger_events(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
			return FALSE;
		}
	}

	/**
	 * @return categories
	 *
	 * @param string
	 */
	public function get_categories($slug = FALSE) {
		if ($slug === FALSE) {
            $this->db->order_by('categories.category', 'asc');
            $query = $this->db->get('categories');
            return $query->result();
        }

        $query = $this->db->get_where('categories', ['slug' => $slug]);
        return $query->row();
	}

	/**
	 * update category
	 *
	 * @return categories
	 *
	 * @param string
	 */
	public function update_category($id) {
		
	}

	/**
	 * @return product tags as a string
	 */
	public function get_tags($slug = FALSE) {
		if ($slug === FALSE) {
            $this->db->order_by('tags.tag', 'asc');
            $query = $this->db->get_where('tags', ['slug' => $slug]);
            return $query->result();
        }

        $query = $this->db->get_where('tags', ['slug' => $slug]);
        return $query->row();
	}

	/**
	 * @return products 
	 *
	 * @param string
	 */
	public function get_products($id = FALSE) {
        if ($id === FALSE) {
            $this->db->order_by('products.name', 'asc');
            $query = $this->db->get('products')->result();
            return $query;
        }

        $query = $this->db->get_where('products', ['id' => $id]);
        return $query->row();
	}

	/**
	 * @return orders as a string
	 */
	public function get_orders($slug = FALSE) {
		if ($slug === FALSE) {
            $this->db->order_by('orders.order_id', 'asc');
            $query = $this->db->get('orders')->result();
            return $query;
        }

        $query = $this->db->get_where('orders', ['slug' => $slug])->row();
        return $query;
	}

	/**
	 * get orders summary
	 *
	 * @return orders summary
	 *
	 * @param int
	 */
	public function get_orders_summary($id) {
		$query = $this->db->get_where('orders_summary', ['id' => $id])->row();
		return $query;
	}

	/**
	 * make product order available
	 *
	 * @return bool
	 *
	 * @param int
	 */
	public function _make_available($id) {
		$data = ['status' => 2];

		$this->db->where('id', $id);
		$this->db->update('orders_summary', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('product_order_made_available');
			return TRUE;
		} else {
			$this->set_error('product_order_not_available');
			return FALSE;
		}
	}

	/**
	 * make product order unavailable
	 *
	 * @return bool
	 *
	 * @param int
	 */
	public function _make_unavailable($id) {
		$data = ['status' => 1];

		$this->db->where('id', $id);
		$this->db->update('orders_summary', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('product_order_not_available');
			return TRUE;
		} else {
			$this->set_error('product_order_not_made_available');
			return FALSE;
		}
	}


	/**
	 * @return shipments
	 * 
	 * @param string
	 */
	public function get_shipments($slug = FALSE) {
		if ($slug === FALSE) {
			$this->db->order_by('shipment.ship_to', 'asc');
			$query = $this->db->get('shipment')->result();
			return $query;
		}

		$query = $this->db->get_where('shipment', ['slug' => $slug])->row();
		return $query;
	}

	/**
	 * @return shipments
	 * 
	 * @param string
	 */
	public function get_counties($slug = FALSE) {
		if ($slug === FALSE) {
			$this->db->order_by('counties.county_code', 'asc');
			$query = $this->db->get('counties')->result();
			return $query;
		}

		$query = $this->db->get_where('counties', ['slug' => $slug])->row();
		return $query;
	}

	/**
	 * set product 
	 *
	 * @return products
	 *
	 * @param string
	 */
	public function set_product($filename = '') {
		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		$vendor_id = $this->ion_auth->user()->row()->created_on;

		$data = [
			'vendor_id' => $vendor_id,
			'image' => $filename,
			'name' => $this->input->post('name'),
			'snippet' => $this->input->post('snippet'),
			'description' => $this->input->post('description'),
			'categories' => json_encode($this->input->post('categories[]')),
			'tags' => json_encode($this->input->post('tags[]')),
			'colors' => json_encode($this->input->post('colors[]')),
			'sizes' => json_encode($this->input->post('sizes[]')),
			'regular_price' => $this->input->post('regular_price'),
			'sale_price' => $this->input->post('sale_price'),
			'wholesale_price' => $this->input->post('wholesale_price'),
			'date_created' => time(),
			'available_from' => $this->input->post('available_from'),
			'available_to' => $this->input->post('available_to'),
			'status' => $this->input->post('status'),
			'slug' => $slug
		];

		$this->db->insert('products', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('product_added_successfully');
			return TRUE;
		} else {
			$this->set_error('error_adding_product');
			return FALSE;
		}
	}

	/**
	 * update product info
	 *
	 * @return product update
	 *
	 * @param string
	 */
	public function update_product() {
		$slug = url_title($this->input->post('name'), 'dash', TRUE);

		$date_updated = time();

		$product_id = $this->input->post('id');

		$data = [
			'name' => $this->input->post('name'),
			'snippet' => $this->input->post('snippet'),
			'description' => $this->input->post('description'),
			'categories' => json_encode($this->input->post('categories')),
			'tags' => json_encode($this->input->post('tags')),
			'colors' => json_encode($this->input->post('colors')),
			'sizes' => json_encode($this->input->post('sizes')),
			'regular_price' => $this->input->post('regular_price'),
			'sale_price' => $this->input->post('sale_price'),
			'wholesale_price' => $this->input->post('wholesale_price'),
			'date_updated' => $date_updated,
			'slug' => $slug,
			'status' => $this->input->post('status')
		];

		$this->db->where('id', $product_id);
		$this->db->update('products', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('product_updated_successfully');
			return TRUE;
		} else {
			$this->set_error('product_update_failed');
			return FALSE;
		}
	}

	/**
	 * set name of the store
	 *
	 * @param string
	 *
	 * @return string
	 */
	public function set_name_of_store() {
		$this->db->where('id', 2);
		$data = ['value' => $this->input->post('name_of_store')];

		$this->db->update('info', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('name_of_store_updated_successfully');
			return TRUE;
		} else {
			$this->set_error('name_of_store_update_failed');
			return FALSE;
		}
	}

	/**
	 * set store phone number
	 *
	 * @param string
	 *
	 * @return string
	 */
	public function set_store_phone_number() {
		$this->db->where('id', 3);
		$data = ['value' => $this->input->post('store_phone_number')];

		$this->db->update('info', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('store_phone_number_updated_successfully');
			return TRUE;
		} else {
			$this->set_error('store_phone_number_update_failed');
			return FALSE;
		}
	}

	/**
	 * set store email
	 *
	 * @param string
	 *
	 * @return string
	 */
	public function set_store_email() {
		$this->db->where('id', 4);
		$data = ['value' => $this->input->post('store_email')];

		$this->db->update('info', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('store_email_updated_successfully');
			return TRUE;
		} else {
			$this->set_error('store_email_update_failed');
			return FALSE;
		}
	}

	/**
	 * set store location
	 *
	 * @param string
	 *
	 * @return string
	 */
	public function set_store_location() {
		$this->db->where('id', 5);
		$data = ['value' => $this->input->post('store_location')];

		$this->db->update('info', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('store_location_updated_successfully');
			return TRUE;
		} else {
			$this->set_error('store_location_update_failed');
			return FALSE;
		}
	}

	/**
	 * set store currency
	 *
	 * @param string
	 *
	 * @return string
	 */
	public function set_store_currency() {
		$this->db->where('id', 7);
		$data = ['value' => $this->input->post('store_currency')];

		$this->db->update('info', $data);

		if ($this->db->affected_rows() === 1) {
			$this->set_message('store_currency_updated_successfully');
			return TRUE;
		} else {
			$this->set_error('store_currency_update_failed');
			return FALSE;
		}
	}

	/**
	 * get product id
	 *
	 * @return int
	 */
	public function get($id) {

		$results = $this->db->get_where('products', ['id' => $id])->result();

		$result = $results[0];

		return $result;
	}

	/**
	 * get customer info
	 *
	 * @return int
	 */
	public function get_customerinfo($id) {

		$results = $this->db->get_where('users', ['id' => $id])->result();

		$result = $results[0];

		return $result;
	}

	/**
	 * set order
	 *
	 * @return int
	 */
	public function set_order() {
		$customer_info = $this->ion_auth_model->get_customerinfo($this->input->post('customer_id'));
		$cart_items = $this->cart->contents();
		$first_name = $customer_info->first_name;
		$last_name = $customer_info->last_name;
		$email = $customer_info->email;
		$phone = $customer_info->phone;
		$method_of_payment = $this->input->post('method_of_payment');
		$status = 0;

		$data = [
			'customer_id' => $this->input->post('customer_id'),
			'order_id' => time(),
			'orders' => json_encode($cart_items),
			'total_orders' => $this->cart->total(),
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email, 
			'phone' => $phone,
			'address' => $this->input->post('address'),
			'postal_code' => $this->input->post('postal_code'),
			'subcounty' => $this->input->post('subcounty'),
			'county' => $this->input->post('county'),
			'method_of_payment' => $method_of_payment,
			'status' => $status,
			'slug' => time()
		];

		$this->db->insert('orders', $data);
		$order_id = $this->db->insert_id();
		$cart = $this->cart->contents();
		$i = 0;
		foreach ($cart as $item) {
			$data = [
				'order_id' => $order_id,
				'customer_id' => $this->input->post('customer_id'),
				'product_id' => $item['id'],
				'vendor_id' => $item['vendor_id'],
				'qty' => $item['qty'],
				'price' => $item['price'],
				'subtotal' => $item['subtotal']
			];

			$this->db->insert('orders_summary', $data);
			$i++;
		}

		if ($this->db->affected_rows() === 1) {
			$this->set_message('order_set_successfully');
			return TRUE;
		} else {
			$this->set_error('order_not_set');
			return FALSE;
		}
	}

	/**
	 * unpublish product
	 *
	 * @param int | id
	 *
	 * @return bool
	 */
	public function _unpublish_product($id) {
		$data = [
			'status' => 2,
			'date_updated' => time()
		];

		$this->db->where('id', $id);
		$this->db->update('products', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('product_successfully_saved_as_draft');
			return TRUE;
		} else {
			$this->set_error('product_not_updated');
			return FALSE;
		}
	}

	/**
	 * unpublish product
	 *
	 * @param int => id
	 *
	 * @return bool
	 */
	public function _publish_product($id) {
		$data = [
			'status' => 1,
			'date_updated' => time()
		];

		$this->db->where('id', $id);
		$this->db->update('products', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('product_successfully_saved_as_published');
			return TRUE;
		} else {
			$this->set_error('product_not_updated');
			return FALSE;
		}
	}


	/**
	 * reviews
	 *
	 * @param int | string
	 *
	 * @return reviews
	 */
	public function get_reviews($id = FALSE) {
		if ($id === FALSE) {
			$query = $this->db->get('reviews')->result();
			return $query;
		} else {
			$query = $this->db->get_where('reviews', ['id' => $id])->row();
			return $query;
		}
	}

	/**
	 * approve review
	 *
	 * @param int => id
	 *
	 * @return bool
	 */
	public function _approve_review($id) {
		$data = ['status' => 1];

		$this->db->where('id', $id);
		$this->db->update('reviews', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('review_approved');
			return TRUE;
		} else {
			$this->set_error('review_not_approved');
			return FALSE;
		}
	}

	/**
	 * reject review
	 *
	 * @param int => id
	 *
	 * @return bool
	 */
	public function _reject_review($id) {
		$data = ['status' => 2];

		$this->db->where('id', $id);
		$this->db->update('reviews', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('review_rejected');
			return TRUE;
		} else {
			$this->set_error('review_not_rejected');
			return FALSE;
		}
	}

	/**
	 * upload profile picture
	 *
	 * @param string
	 *
	 * @return bool
	 */
	public function upload_profile_picture($filename = '') {
		$id = $this->ion_auth->user()->row()->id;

		$this->db->where('id', $id);
		$data = ['image' => $filename];

		$this->db->update('users', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('profile_picture_successfully_updated');
			return TRUE;
		} else {
			$this->set_message('profile_picture_not_updated');
			return FALSE;
		}
	}

	/**
	 * cancel order
	 *
	 * @param int
	 *
	 * @return bool
	 */
	public function _cancel_order($id) {
		$data = ['status' => 3];
		$this->db->where('id', $id);
		$this->db->update('orders', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('order_successfully_cancelled');
			return TRUE;
		} else {
			$this->set_error('order_not_cancelled');
			return FALSE;
		}
	}

	/**
	 * process order
	 *
	 * @param int
	 *
	 * @return bool
	 */
	public function _process_order($id) {
		$data = ['status' => 1];
		$this->db->where('id', $id);
		$this->db->update('orders', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('order_successfully_processed');
			return TRUE;
		} else {
			$this->set_error('order_not_processed');
			return FALSE;
		}
	}

	/**
	 * order in transit
	 *
	 * @param int
	 *
	 * @return bool
	 */
	public function _in_transit($id) {
		$data = ['status' => 2];
		$this->db->where('id', $id);
		$this->db->update('orders', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('order_successfully_in_transit');
			return TRUE;
		} else {
			$this->set_error('order_not_in_transit');
			return FALSE;
		}
	}

	/**
	 * order pending
	 *
	 * @param int
	 *
	 * @return bool
	 */
	public function _order_pending($id) {
		$data = ['status' => 0];
		$this->db->where('id', $id);
		$this->db->update('orders', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('order_successfully_pending');
			return TRUE;
		} else {
			$this->set_error('order_not_pending');
			return FALSE;
		}
	}

	/**
	 * order pending
	 *
	 * @param int
	 *
	 * @return bool
	 */
	public function _deliver_order($id) {
		$data = ['status' => 4];
		$this->db->where('id', $id);
		$this->db->update('orders', $data);

		if ($this->db->affected_rows()) {
			$this->set_message('order_successfully_delivered');
			return TRUE;
		} else {
			$this->set_error('order_not_delivered');
			return FALSE;
		}
	}

	/**
	 * search orders
	 *
	 * @param string
	 *
	 * @return orders as per criteria
	 */
	public function search_orders($order_id, $customer_id, $ship_to, $status) {
		$order = ['order_id' => $order_id, 'customer_id' => $customer_id, 'subcounty' => $ship_to, 'status' => $status];
		$this->db->like($order);
		$query = $this->db->get('orders')->result();
		return $query;
	}

	/**
	 * search products
	 *
	 * @param string
	 *
	 * @return products as per search criteria
	 */
	public function search_products($name, $category, $status) {
		$product = ['name' => $name, 'categories' => $category, 'status' => $status];
		$this->db->like($product);
		$query = $this->db->get('products')->result();
		return $query;
	}
}
