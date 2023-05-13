[![Magenizr Plus](https://images2.imgbox.com/11/6b/yVOOloaA_o.gif)](https://account.magenizr.com)
---

# Hide Shipping Method
Hide Shipping Method allows admin users to hide one or multiple shipping methods on the cart and checkout page. This can be limited to specific weekdays, by start and end-date or customer sessions. 

![Magenizr HideShippingMethod - Backend](https://images2.imgbox.com/8a/8b/Hxas4E4z_o.gif)

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
* Magento 2.3.x, 2.4.x
* PHP 5.x, 7.x

## Installation (Composer 2)

1. Update your composer.json `composer require "magenizr/magento2-hideshippingmethod":"1.0.2" --no-update`
2. Use `composer update magenizr/magento2-hideshippingmethod --no-install` to update your composer.lock file.

```
Updating dependencies
Lock file operations: 1 install, 1 update, 0 removals
  - Locking magenizr/magento2-hideshippingmethod (1.0.2)
```

3. And then `composer install` to install the package.

```
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 1 install, 0 update, 0 removals
  - Installing magenizr/magento2-hideshippingmethod (1.0.2): Extracting archive
```

4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_HideShippingMethod --clear-static-content
```

## Installation (Manually)
1. Download the latest version of the source code.
2. Extract the downloaded tar.gz file. Example: `tar -xzf Magenizr_HideShippingMethod_1.0.2.tar.gz`.
3. Copy the code into `./app/code/Magenizr/HideShippingMethod/`.
4. Enable the module and clear static content.

```
php bin/magento module:enable Magenizr_HideShippingMethod --clear-static-content
php bin/magento setup:upgrade
```

## Support
If you have any issues with this extension, open an issue on [Github](https://github.com/magenizr/Magenizr_HideShippingMethod/issues).

## Contact
Follow us on [GitHub](https://github.com/magenizr), [Twitter](https://twitter.com/magenizr) and [Facebook](https://www.facebook.com/magenizr).

## History
===== 1.0.2 =====
* Problem with timezones (strtotime) fixed
* Datepicker fixed
* Cleanup various files to follow coding standard (EQP, ECG)

===== 1.0.1 =====
* Magento 2.4.x compatibility added
* Composer.json cleanup
* Add method code to dropdown option

===== 1.0.0 =====
* Stable version

## License
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)
