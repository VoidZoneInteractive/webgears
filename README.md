Aggregate Vouchers - A task for Webgears recruitment process
============================================================

1. General information
----------------------

### 1.1 Technologies, software and tools used to create this project ###
* PHP 5.5.9
* Symfony 2.7.5
* PHPStorm 8
* MySQL 5.5
* Vagrant 1.7.4
* POSTman 3.0.24

### 1.2 Links to download various parts of the project ###
* [Vagrant](https://www.vagrantup.com/downloads.html) - development environment
* [POSTman](https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop) - For request testing

### 1.3 Installation ###

#### 1.3.1 Using Vagrant ####
* Download and install Vagrant
* Download vagrant configuration: [https://github.com/VoidZoneInteractive/vagrant_webgears/archive/master.zip](https://github.com/VoidZoneInteractive/vagrant_webgears/archive/master.zip)
* Unpack configuration
* Navigate to directory where you have configuration and run `vagrant up` *(Note: you may have to choose your network adapter depending on configuration)*
* Navigate to [http://192.168.1.117/admin/voucher](http://192.168.1.117/admin/voucher)

#### 1.3.2 Without using Vagrant ####
* Install symfony 2.7.5
* Configure your symfony 2.7.5 *(database)*
* Download repository
* Move repository to symfony dir
* Run `php app/console doctrine:schema:update --force`
* The app will be available on **/admin/voucher**

### 1.4 About ###
A Symfony project created on October 12, 2015, 06:56 pm.
Author: **Gregory Gurzeda**
