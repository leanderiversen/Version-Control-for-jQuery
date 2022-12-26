# Version Control for jQuery
Version Control for jQuery is one of the easiest ways to control the version of jQuery used on your website.

- Contributors: leanderiversen
- Tags: jquery, core, migrate, javascript, update, control, version
- Requires at least: 5.0
- Tested up to: 6.1.1
- Stable tag: 3.1.1
- Requires PHP: 7.4
- License: GPLv2 or later
- License URI: https://www.gnu.org/licenses/gpl-2.0.html

## Description
Version Control for jQuery is one of the easiest ways to control the version of jQuery used on your website. Whether you just want to run a stable WordPress website, or if you are a developer and want to validate compatibility on your website with the various version of jQuery, the plugin will always have the latest minified version of jQuery ready for you. By default, the files will be loaded from the fast jQuery CDN, but you will also have the option to choose cdnjs, Google CDN or jsDelivr.

Please notice that no files are replaced, therefore deactivation of this plugin returns your site to its original state.

## Installation
1. Upload `version-control-for-jquery/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Sit back and enjoy, or select your desired version of jQuery

## Changelog
### 3.2
* Added CDN support for jQuery Migrate, meaning that it will be loaded from your preferred CDN if the selected version is hosted.

### 3.1
* Added jsDelivr to the list of preferred CDNs. If the selected version is not hosted by this provider, it will default to the jQuery CDN.
* Added jQuery Core version 3.6.2.

### 3.0.3
* Fixed a bug that could cause the wrong version of jQuery Migrate to appear as the selected version on the settings page.

### 3.0.2
* Fixed a bug that could cause an error if the settings were left untouched following installation of the plugin.

### 3.0.1
* Fixed a bug where the 'vcfj_core_disable' array key could be undefined.

### 3.0
* Added support to set cdnjs and Google as your preferred CDN. If the selected version is not hosted by these providers, it will fall back to the jQuery CDN.
* Added support to disable jQuery Core.
* Support for PHP 5.6 has been dropped. To continue using the plugin, please upgrade to PHP 7.4 or above.

### 2.1
* jQuery Core version 3.6.1 has been added.
* jQuery Migrate version 3.4.0 has been added.
* Support for WordPress 4 has been dropped. To continue using the plugin, please upgrade to WordPress 5.0 or above.

### 2.0.3
* jQuery Core version 3.6.0 has been added.
* jQuery Migrate version 3.3.2 has been added.

### 2.0.2
* Smaller improvements.

### 2.0.1
* Added option to disable jQuery Migrate.

### 2.0
* Complete rewrite of the plugin to facilitate future features.
* Added latest versions of jQuery Core and jQuery Migrate.

### 1.0.8
* jQuery Core versions 3.3.0 and 3.3.1 have been added.
* Minor adjustments.

### 1.0.7
* Minor adjustments.
* Support for WordPress 4.9.

### 1.0.6
* jQuery Migrate version 3.0.1 has been added.

### 1.0.5
* A bug that caused jQuery Core and jQuery Migrate to be dequeued while logged in to the admin area has now been resolved.

### 1.0.4
* Added the pre-versions of jQuery Core version 3.2.2 and jQuery Migrate version 3.0.1, in case you want to test your website with the upcoming versions of jQuery. The plugin still defaults to the latest stable version of jQuery.

### 1.0.3
* jQuery Core versions 3.2.0 and 3.2.1 have been added.

### 1.0.2
* Corrected the way of requiring the "Settings" page. Thanks to Ivaylo Draganov for noticing!
* Minor adjustments.

### 1.0.1
* jQuery Core version 3.1.1 has been added.
* The plugin now supports the Norwegian language.

### 1.0
* Initial release

## Like the plugin?
If you like the plugin, please review it! Every review is highly appreciated, but if you want to suggest something, please send an email to info@carpe-noctem.no.
