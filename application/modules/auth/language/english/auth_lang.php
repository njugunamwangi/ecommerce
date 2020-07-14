<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Please login with your email/username and password below.';
$lang['login_identity_label']  = 'Email/Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Remember Me:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Forgot your password?';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'Below is a list of the users.';
$lang['index_fname_th']          = 'First Name';
$lang['index_lname_th']          = 'Last Name';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Active';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_create_user_link']  = 'Create a new user';
$lang['index_create_group_link'] = 'Create a new group';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';

// Create User
$lang['create_user_heading']                           = 'Create User';
$lang['create_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'First Name:';
$lang['create_user_lname_label']                       = 'Last Name:';
$lang['create_user_company_label']                     = 'Company Name:';
$lang['create_user_identity_label']                    = 'Identity:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Confirm Password:';
$lang['create_user_submit_btn']                        = 'Create User';
$lang['create_user_validation_fname_label']            = 'First Name';
$lang['create_user_validation_lname_label']            = 'Last Name';
$lang['create_user_validation_identity_label']         = 'Identity';
$lang['create_user_validation_email_label']            = 'Email Address';
$lang['create_user_validation_phone_label']            = 'Phone';
$lang['create_user_validation_company_label']          = 'Company Name';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone_label']            = 'Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_identity_label'] = 'Identity';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';
$lang['forgot_password_identity_not_found']         = 'No record of that username.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

$lang['admin_dashboard_heading']		= 'Admin Dashboard';
$lang['admin_access_only']				= 'You must be an administrator to view this page';

// Product Categories
$lang['publish_category_heading']								= 'Publish Category';
$lang['publish_category_validation_category_label']				= 'Category';
$lang['publish_parent_category_validation_subcategory_label']	= 'Parent Category';
$lang['form_error_message']										= 'Your form appears to have some errors';
$lang['list_categories_heading']								= 'Categories';
$lang['category_does_not_exist']								= 'The category does not exist';
$lang['edit_category_category_validation_label']				= 'Category';
$lang['edit_category_parennt_category_validation_label']		= 'Parent Category';

// Product Tags
$lang['publish_tag_heading']					= 'Publish Tag';
$lang['publish_tag_validation_tag_label']		= 'Tag';
$lang['product_tag_added']						= 'Product Tag Added Successfully';

// Publish Product
$lang['publish_product_heading']							= 'Publish Product';
$lang['publish_product_validation_name_label']				= 'Name of Product';
$lang['publish_product_validation_snippet_label']			= 'Short Description';
$lang['publish_product_validation_description_label']		= 'Description';
$lang['publish_product_validation_categories_label']		= 'Categories';
$lang['publish_product_validation_tags_label']				= 'Tags';
$lang['publish_product_validation_colors_label']			= 'Colors';
$lang['publish_product_validation_sizes_label']				= 'Sizes';
$lang['publish_product_validation_regular_price_label']		= 'Regular Price';
$lang['publish_product_validation_sale_price_label']		= 'Sale Price';
$lang['publish_product_validation_wholesale_price_label']	= 'Wholesale Price';
$lang['publish_product_validation_available_from_label']	= 'Available From';
$lang['publish_product_validation_available_to_label']		= 'Available To';
$lang['publish_product_validation_status_to_label'] 		= 'Status';
$lang['product_added_successfully']							= 'Product added Successfully';
$lang['error_adding_product']								= 'Error adding product';
$lang['product_successfully_saved_as_draft']				= 'Product saved as draft!';
$lang['product_not_updated']								= 'Product not updated';
$lang['product_successfully_saved_as_published']			= 'Product saved as published!';
$lang['search_products_heading']							= 'Search Products';

// Edit product
$lang['edit_product_heading']								= 'Edit';
$lang['edit_product_name_of_product_validation_label']		= 'Name of Product';
$lang['edit_product_snippet_validation_label']				= 'Snippet';
$lang['edit_product_desciption_validation_label']			= 'Description';
$lang['edit_product_categories_validation_label']			= 'Categories';
$lang['edit_product_tags_validation_label']					= 'Tags';
$lang['edit_product_colors_validation_label']				= 'Colors';
$lang['edit_product_sizes_validation_label']				= 'Sizes';
$lang['edit_product_regular_price_validation_label']		= 'Regular Price';
$lang['regular_price_should_differ_sale_price']				= 'Regular Price should differ Sale Price';
$lang['edit_product_sale_price_validation_label']			= 'Sale Price';
$lang['sale_price_should_differ_wholesale_price']			= 'Sale Price should differ Wholesale Price';
$lang['edit_product_wholesale_price_validation_label']		= 'Wholesale Price';
$lang['edit_product_status_validation_label']				= 'Status';
$lang['product_updated_successfully']						= 'Product updated Successfully';
$lang['product_update_failed']								= 'Product update failed';

// Products
$lang['list_products_heading']					= 'Products';
$lang['product_doesnt_exist']					= 'The product does not exist';
$lang['product_successfully_deleted']			= 'Product successfully deleted';
$lang['product_not_deleted']					= 'Product not deleted';

// Shipment
$lang['add_shipment_heading']					= 'Add Shipment';
$lang['list_shipments_heading']					= 'List Shipments';
$lang['add_shipment_validation_ship_to_label']	= 'Ship To';
$lang['add_shipment_validation_fee_label']		= 'Fee';
$lang['shipment_successfully_added']			= 'Shipment Successfully Added';

// Register
$lang['register_account_heading']				= 'Create Account';
$lang['email_already_registered']				= 'Email address already registered, please use a different email';
$lang['use_valid_email']						= 'Please use a valid email';

// Orders
$lang['orders_heading']							= 'Orders';
$lang['order_successfully_cancelled']			= 'Order successfully cancelled';
$lang['order_not_cancelled']					= 'Order not cancelled';
$lang['order_successfully_processed']			= 'Order successfully processed';
$lang['order_not_processed']					= 'Order not processed';
$lang['order_successfully_in_transit']			= 'Order in Transit';
$lang['order_not_in_transit']					= 'Order not transit';
$lang['order_successfully_pending']				= 'Order successfully pending';
$lang['order_not_pending']						= 'Order not pending';
$lang['order_successfully_delivered']			= 'Order successfully delivered and closed';
$lang['order_not_delivered']					= 'Order not delivered';
$lang['search_orders_heading']					= 'Search Orders';
$lang['order_does_not_exist']					= 'Order does not exist';
$lang['product_order_made_available']			= 'Product order available';
$lang['product_order_not_available']			= 'Product order not available';

// settings
$lang['general_settings_heading']					= 'General Settings';
$lang['m_pesa_credentials_heading']					= 'M-Pesa Credentials';
$lang['settings']									= 'Settings';
$lang['add_field_name_validation_label']			= 'Field';
$lang['add_name_of_store_validation_label']			= 'Name of Store';
$lang['add_store_email_validation_label']			= 'Store Email';
$lang['add_store_phone_number_validation_label']	= 'Store Phone Number';
$lang['add_store_currency_validation_label']		= 'Store Currency';
$lang['add_store_location_validation_label']		= 'Store Location';
$lang['name_of_store_updated_successfully']			= 'Name of store successfully updated';
$lang['name_of_store_update_failed']				= 'Name of store update failed';
$lang['store_phone_number_updated_successfully']	= 'Store Phone Number successfully updated';
$lang['store_phone_number_update_failed']			= 'tore Phone Number update failed';
$lang['store_email_updated_successfully']			= 'Store Email successfully updated';
$lang['store_email_update_failed']					= 'Store email update failed';
$lang['store_location_updated_successfully']		= 'Store location successfully updated';
$lang['store_location_update_failed']				= 'Store location update failed';
$lang['store_currency_updated_successfully']		= 'Store currency successfully updated';
$lang['store_currency_update_failed']				= 'Store currency update failed';
$lang['edit_consumer_key_validation_label']			= 'Consumer Key';
$lang['consumer_key_updated_successfully']			= 'Consumer Key successfully updated';
$lang['consumer_key_update_failed']					= 'Consumer Key update failed';
$lang['edit_consumer_secret_validation_label']		= 'Consumer Secret';
$lang['consumer_secret_updated_successfully']		= 'Consumer Secret successfully updated';
$lang['consumer_secret_update_failed']				= 'Consumer Secret update failed';
$lang['edit_till_number_validation_label']			= 'Till Number';
$lang['till_number_updated_successfully']			= 'Till Number successfully updated';
$lang['till_number_update_failed']					= 'Till Number update failed';
$lang['edit_pass_key_validation_label']				= 'Pass Key';
$lang['pass_key_updated_successfully']				= 'Pass Key successfully updated';
$lang['pass_key_update_failed']						= 'Pass Key update failed';

// Users
$lang['users']						= 'Users';
$lang['list_users_heading']			= 'Users Listing';
$lang['edit_user']					= 'Edit';
$lang['deactivate_an_active_user']	= 'Deactivate';
$lang['activate_a_suspended_user']	= 'Activate';
$lang['make_admin']					= 'Make Admin';
$lang['login_as_an_admin']			= 'Login as admin';
$lang['user_never_logged_in']		= 'Never logged in';
$lang['make_wholesaler']			= 'Make Wholesaler';

// Products
$lang['purchased_product']			= 'Product has been purchased';
$lang['pending_processing']			= 'Pending Processing';
$lang['processed']					= 'Processed';
$lang['pending_delivery']			= 'Pending Delivery';
$lang['order_cancelled']			= 'Order was cancelled';
$lang['delivery_closed']			= 'Product was delivered';

// User Groups
$lang['list_user_groups_heading']	= 'User Groups';
$lang['delete_group']				= 'Delete Group';

// New order
$lang['new_order_heading']										= 'New Order';
$lang['confirm_order_customer_id_validation_label']				= 'Customer';
$lang['confirm_order_shipping_address_validation_label']		= 'Shipping Address';
$lang['confirm_order_shipping_postal_code_validation_label']	= 'Shipping Postal Code';
$lang['confirm_order_shipping_subcounty_validation_label']		= 'Shipping Town';
$lang['confirm_order_shipping_county_validation_county']		= 'Shipping County';
$lang['confirm_order_method_of_payment_validation_label']		= 'Method of Payment';

// View user
$lang['view_user_heading']					= 'View User';

// Reviews
$lang['review_approved']				= 'Review Approved';
$lang['review_not_approved']			= 'Review not Approved';
$lang['review_rejected']				= 'Review Rejected';
$lang['review_not_rejected']			= 'Review not Rejected';

// Account Settings
$lang['account_settings_heading']				= 'Account Settings';
$lang['profile_picture_successfully_updated']	= 'Profile picture updated successfully';
$lang['profile_picture_not_updated']			= 'Profile picture not updated';

// Mode of payments
$lang['add_mode_of_payment_title']							= 'Add Mode of Payment';
$lang['add_mode_of_payment_validation_mode_of_payment']		= 'Mode of Payment';
$lang['list_modes_of_payments']								= 'Modes of Payments';
$lang['add_mode_of_payment_validation_status']				= 'Status';
$lang['mode_of_payment_successfully_added']					= 'Mode of Payment successfully addded';
$lang['mode_of_payment_not_added']							= 'Mode of Payment not addded';
