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

---

## About [Magenizr](https://www.magenizr.com.au/)

Built and maintained by [Magenizr](https://www.magenizr.com.au/) — an Australian [Adobe Commerce & Magento development agency](https://www.magenizr.com.au/services/adobe-commerce/) based in Bendigo, Victoria. We build custom Magento modules, handle platform migrations, and provide ongoing support for businesses across [Melbourne](https://www.magenizr.com.au/web-development-melbourne/), Sydney, Brisbane and the DACH region.

- [Our Services](https://www.magenizr.com.au/services/adobe-commerce/) — Custom modules, migrations, support
- [Book a Free Consultation](https://www.magenizr.com.au/book/) — 30-minute call, no obligation
- [All Open-Source Modules](https://github.com/magenizr) — Our full collection on GitHub

## Über [Magenizr](https://www.magenizr.com.au/de/)

Entwickelt und gepflegt von [Magenizr](https://www.magenizr.com.au/de/) — einer australischen [Magento & Adobe Commerce Agentur](https://www.magenizr.com.au/de/services/adobe-commerce/) mit Fokus auf die DACH-Region. Wir entwickeln individuelle Magento-Module, übernehmen Plattform-Migrationen und bieten laufenden Support für Unternehmen in Berlin, Hamburg, München, Frankfurt, Köln, Stuttgart, Düsseldorf, Wien, Graz, Salzburg, Zürich, Basel und Bern.

- [Unsere Leistungen](https://www.magenizr.com.au/de/services/adobe-commerce/) — Module, Migrationen, Support
- [Kostenlose Erstberatung](https://www.magenizr.com.au/de/book/) — 30 Minuten, unverbindlich
- [Alle Open-Source-Module](https://github.com/magenizr) — Unsere komplette Sammlung auf GitHub
