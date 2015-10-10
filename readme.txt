=== Launchstack Theme Bundle ===
Contributors: johnstonphilip
Donate link: http://mintplugins.com/
Tags: page, builder, stacks, bricks
Requires at least: 3.5
Tested up to: 4.3
Stable tag: 1.0.0.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A bundle of Stack Templates, Plugins, a Theme, and everything needed for the Launchstack Theme Experience.

== Description ==

A bundle of Stack Templates, Plugins, a Theme, and everything needed for the Launchstack Theme Experience.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the ‘launchstack-theme-bundle’ folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

See full instructions at http://mintplugins.com/doc/launchstack-theme-bundle

== Screenshots ==


== Changelog ==

= 1.0.0.7 = October 10, 2015
* Parent Plugin Class now checks for required plugins between page redirects to the plugin installer page.
* Exit after wp_redirect in standard-install-functions page

= 1.0.0.6 = October 8, 2015
* Changed Template Preview image path to use plugins_url
* Separated installation functions between standardized and custom and removed on install.php file which is replaced by standard-installfunctions.php and custom-install-functions.php
* Added call to mp-customizer-backups plugin and do backup upon install of theme mods automatically. It no longer asks the user to do this.

= 1.0.0.5 = September 21, 2015
* Added check for "allow_url_fopen" before install
* Bring Plugin Installer up to date with MP Core 1.0.2.1

= 1.0.0.4 = May 17, 2015
* Bring plugin checker files up to date with MP Core.
* Make footer widget create its sidebar id based on the time.

= 1.0.0.3 = March 7, 2015
* Added new Stack Template for “Works”.

= 1.0.0.2 = March 2, 2015
* Make sure default pages get set up even if the user decides to keep their current customizer.
* Better Homepage Preview video (now uses setup tutorial)
* Removed old launchstack-homepage template (replaced with launchstack-home)

= 1.0.0.1 = March 1, 2015
* Change some stack template titles
* Blog Archive -> Blog
* EDD Download -> EDD Product
* EDD Archive -> EDD Store


= 1.0.0.0 = March 1, 2015
* Original release
