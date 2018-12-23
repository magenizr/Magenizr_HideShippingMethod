# Magenizr Hide Shipping Method
Hide Shipping Method allows admin users to hide one or multiple shipping methods on the cart and checkout page. This can be limited to specific weekdays, by start and end-date or customer sessions. 

![Magenizr HideShippingMethod - Intro](http://download.magenizr.com/pub/magenizr_hideshippingmethod/all/intro.png)

![Magenizr HideShippingMethod - Backend](http://download.magenizr.com/pub/magenizr_hideshippingmethod/all/product_01.png)

![Magenizr HideShippingMethod - Backend](http://download.magenizr.com/pub/magenizr_hideshippingmethod/all/product_02.png)

## Features
* With the option `Customers Only` the functionality can be restricted to logged in customers only.
* The option `Weekdays`, `Start Date` and `End Date` allows you to enable or disable shopping methods during a specific time window only.
* The functionality can be restricted to specific roles via `System > Permissions > User Roles`. The ACL resource is `Stores > Configuration > Hide Shipping Method`.
* The configuration can be found in `Stores > Configuration > Sales > Checkout > Hide Shipping Method`.

## Usage
Go to `Stores > Configuration > Sales > Checkout > Hide Shipping Method`, enable the feature and select at least one shipping method in section `Hide Shipping Method(s)`. Once the feature is enabled, the changes should have affect on the cart and checkout page.

## Purchase
This module is available for free on [GitHub](https://github.com/magenizr) or [Magento Marketplace](https://marketplace.magento.com/partner/magenizr).

## System Requirements
* Magento 2.1.x, 2.2.x
* PHP 5.x, 7.x

## Installation (Composer)

1. Add this extension to your repository `composer config repositories.magenizr/magento2-hideshippingmethod git https://github.com/magenizr/Magenizr_HideShippingMethod.git`
2. Update your composer.json `composer require "magenizr/magento2-hideshippingmethod":"1.0.0"`

```
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)              
Package operations: 1 install, 0 updates, 0 removals
  - Installing magenizr/magento2-hideshippingmethod (1.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
```

3. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_HideShippingMethod --clear-static-content
php bin/magento setup:upgrade
```

## Installation (Manually)
1. Download the latest version of the source code.
2. Extract the downloaded tar.gz file. Example: `tar -xzf Magenizr_HideShippingMethod_1.0.0.tar.gz`.
3. Copy the code into `./app/code/Magenizr/HideShippingMethod/`.
4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_HideShippingMethod --clear-static-content
php bin/magento setup:upgrade
```

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/magenizr/Magenizr_HideShippingMethod/issues). For a custom build, don't hesitate to contact us on [Magento Marketplace](https://marketplace.magento.com/partner/magenizr).

## Contact
Follow us on [GitHub](https://github.com/magenizr), [Twitter](https://twitter.com/magenizr) and [Facebook](https://www.facebook.com/magenizr).

## History
===== 1.0.0 =====
* Stable version

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)
