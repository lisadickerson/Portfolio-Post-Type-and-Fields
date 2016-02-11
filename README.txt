=== Plugin Name ===
Contributors: lisaDkrsn
Donate link: aliaslead.com
Tags: portfolio, collection, samples, examples, work samples
Requires at least: 3.0.1
Tested up to: 4.2
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
This plugin creates a custom post type for portfolio items with custom display fields.


== Description ==

This plugin creates a custom post type for portfolio items with custom display fields. You will need to edit your theme to display the custom fields. This plugin was created to maintain a portfolio custom post type that could be utilized by other plugin like for example the: Go Portfolio - WordPress Plugin. It creates a new interface to manage your portfolio posts separate from blog posts and web pages.


== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.


== Customization

The custom fields were created with ACF and imported into the plugin.
Some features are dependent on ACF Pro modules like the gallery field.
You will need to purchase the Pro version and install it for the gallery field to work.

Otherwise try the free version:

*	https://wordpress.org/plugins/advanced-custom-fields/

Refer to the ACF documentation for displaying custom values in your theme:

*	http://www.advancedcustomfields.com/resources/displaying-custom-field-values-in-your-theme/

**Refer to the documentation of your theme and ACF if you have questions.**

**Code Sample:** *Custom field code you will need to edit into your theme for the custom fields to display.*
Sample field code provided in the plugin folder:custom-fields.php

== Frequently Asked Questions

= Why did you make this plugin?


I started this plugin as a custom functions plugin for my site only, to reduce my dependency on themes or plugins to maintain my portfolio.
It is also a way for me to dive deeper into my understanding of custom post types and their arguments and plugins development by **and learn by doing**.


= Are all the bugs worked out?
**No** all the bug are not worked out. I created the post type to use the site wide categories and tags. It doesn&#39;t quite work like I expected it too. ~~I also need to re-write the slug to pull a more SEO friendly title.~~
= Are there other plugins that create a portfolio post type?


Yes take a look at two great professional plugins :smile_cat:
 * https://github.com/devinsays/portfolio-post-type
 * https://github.com/justintadlock/custom-content-portfolio

== Screenshots ==

1. Portfolio management in admin screen.
2. Edit portfolio item in admin screen.
3. Custom project fields in Edit
4. Custom Developer roles,Url and WorkFlow Example in fields in Edit
5. Front end display of custom fields.


== Changelog ==

== 1.1 ==
* Re-write slug on custom post type:
Exchange the _underscore in the slug for`portfolio-item`
*  Re-write archive:
Change archive slug from bool to string:plural `portfolio-items`
*  Change admin dash image to WordPress Dashicon.

== Upgrade Notice ==
== 1.1 ==
*	Re-write slug on custom post type:
Current slug is not SEO friendly. Google will not read an underscore as a space between words.You will need to update your permalink's by resaving in the dash admin.The change in the portfolio slug may also require you to update your theme templates.
For example in my case: `single-portfolio_item.php` simply needed to be re-named `single-portfolio.php`

*  Re-write archive:
Change archive slug from bool to string:plural `portfolio-items` .Update your permalink's by resaving in the dash admin.

