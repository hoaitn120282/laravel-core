# BASE CMS
This is an implementation of Content Management System based on [Laravel 5.2](http://laravel.com/) 

## System Requirements
CMS is designed to run on a machine with PHP 5.5.9 and MySQL 5.5.

* PHP >= 5.5.9 with
    * OpenSSL PHP Extension
    * PDO PHP Extension
    * Mbstring PHP Extension
    * Tokenizer PHP Extension
* [Composer](https://getcomposer.org/) installed to load the dependencies of Base CMS.

## Installing
Please check the system requirements before installing Base CMS.

* You may install by cloning from github, or via composer.
    * Github:
        * git clone https://github.com/hoaitn120282/laravel-core.git
        * From a command line open in the folder, run: composer install/update.    
* Enter your database details in .env file on root folder.
	* run: php artisan key:generate	
* Publish and seed	
    * php artisan migrate --seed to setup your database.
* You can contigure mail server details in config/mail.php.
* You can configure the site in the config folder before production.
* Finally, setup an Apache VirtualHost to point to the "public" folder.
* For development, you can simply run: php artisan serve
## Main Features
* Content management:
- Category multi level
- Pages, Post, Tags
- Build all content with multi language
* Menu management
* Widget management
* Theme management
* Gallery management
* Role & permission management
* User management
* Setting
* Multi language
* Authentication
* Contact management
* Media management
* Integrate API modules for each outputs

## Administrator Panel
* Url: Your-Host/admin
* Superuser : 
    *  Username : henry.tran.lsvn@gmail.com
    *  Password : Admin@123456!

## License

Base CMS is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
