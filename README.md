ecommerce is a web template focused on helping the user set up an online shop. 

Coded in PHP and codeigniter framework, it provides four different user levels, namely:

1. Admin
2. Wholesaler
3. Retailer/Customer
4. Vendor

The login credentials are as follows

Admin
	username: testaccount1@gmail.com
	password: 0700010203

Wholesaler
	username: testaccount4@gmail.com
	password: 0704040404

Customer/Retailer
	username: testaccount2@gmail.com
	password: 0700020202

Vendor
	username: testaccount3@gmail.com
	password: 0703030303

How to install

	1. Download the project from my repository https://github.com/njugunamwangi/ecommerce

	2. Since the project is virtually hosted, you'll need to do some adjustments

	3. If youre using xampp, navigate to C:/xampp/apache/conf/httpd.conf and add the following lines	

		<VirtualHost *:80>
		    DocumentRoot "/xampp/htdocs/<name-of-project-as-you-would-like-to-name-it>"
		    ServerName <name-of-project-as-you-would-like-to-name-it>.com
		    ServerAlias <name-of-project-as-you-would-like-to-name-it>.com
		 
		    <Directory "/xampp/htdocs/<name-of-project-as-you-would-like-to-name-it>">
		        Options -Indexes 
		        Options FollowSymLinks
		        AllowOverride All
		    </Directory>
		</VirtualHost>

		<VirtualHost *:80>
		    DocumentRoot "/xampp/htdocs/<name-of-project-as-you-would-like-to-name-it>"
		    ServerName <name-of-project-as-you-would-like-to-name-it>.com
		    ServerAlias *.<name-of-project-as-you-would-like-to-name-it>.com
		 
		    <Directory "/xampp/htdocs/<name-of-project-as-you-would-like-to-name-it>">
		        Options -Indexes 
		        Options FollowSymLinks
		        AllowOverride All
		    </Directory>
		</VirtualHost>

	4. Then navigate to C:/Windows/System32/drivers/etc/hosts.file
		Uncomment the following lines
			127.0.0.1       localhost
			::1             localhost
		Then add the following lines
			127.0.0.1	ecommerce.com
			127.0.0.1	1563557036.ecommerce.com

	5. Restart both apache and mysql

	6. Create a database named ecommerce and import the ecommerce.sql file at the root of the project

	7. Enjoy