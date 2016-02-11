# Portfolio Post Type and Fields


This plugin creates a custom post type for portfolio items with custom display fields. 
## Description
 This plugin creates a custom post type for portfolio items with custom display fields. You will need to edit your theme to display the custom fields. This plugin was created to maintain a portfolio custom post type that could be utilized by other plugin like for example the: Go Portfolio &#45; WordPress Plugin. It creates a new interface to manage your portfolio posts separate from blog posts and web pages.


## Requirements
* WordPress 4.2 , tested up to 4.3

## Installation
Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

## Customization

The custom fields were created with ACF and imported into the plugin.
Some features are dependent on ACF Pro modules like the gallery field.
You will need to purchase the Pro version and install it for the gallery field to work. 

Otherwise try the free version: 

*	https://wordpress.org/plugins/advanced-custom-fields/

Refer to the ACF documentation for displaying custom values in your theme:

*	http://www.advancedcustomfields.com/resources/displaying-custom-field-values-in-your-theme/

__Refer to the documentation of your theme and ACF if you have questions.__

__Code Sample:__ _Custom field code you will need to edit into your theme for the custom fields to display._

~~~html

<!--Edit: these fields in to your template above the content-->	
			
			<?php //the_field('thumb-nail-image');
			$thumb_nail_image = get_field('thumb-nail-image');
			if( $thumb_nail_image ): ?> <!-- If there is content client_name get it and format-->
				<a href="<?php the_field("thumb-nail-image"); ?>">
					<img class="alignnone size-thumbnail wp-image-6" width="150" height="150" src="<?php the_field("thumb-nail-image"); ?>">
				</a><br><br>
			<?php endif; ?> <!-- End loop on thumb_nail_image -->


			<?php //the_field('client_name');
			$client_name = get_field('client_name');
			if( $client_name ): ?> <!-- If there is content client_name get it and format-->
				<span class="cat-links">Client: <i><?php the_field('client_name'); ?></i></span><br>
			<?php endif; ?> <!-- End loop on client_name -->

			<?php //the_field('development_role');
			$development_role = get_field('development_role');
			if( $development_role ): ?> <!-- If there is content development_role get it and format-->
				<span class="cat-links">Roles : <i><?php the_field('development_role'); ?></i></span><br>
			<?php endif; ?> <!-- End loop on development_role -->

			<?php //the_field('site_url');
			$site_url = get_field('site_url');
			if( $site_url ): ?> <!-- If there is content site_url get it and format-->
				<span class="cat-links">WebSite : <i><a href='http://<?php the_field("site_url"); ?>'><?php the_field("site_url"); ?></a></i></span><br>

			<?php endif; ?> <!-- End loop on site_url -->
			
			
	<!--Edit: Your content loop goes here-->	
			
	<!--Edit: this field in below your content loop-->	
            
            	<!--<h3>Work Flow Examples</h3>-->
			<?php
			$images = get_field('work_flow_examples'); 
				if( $images ): ?> <!-- This is the gallery field slug -->
				
				<h3>Project Examples</h3>			
				<?php foreach( $images as $image ): ?>
				<dl class="gallery-item">
					<dt class="gallery-icon portrait">
						<a href="<?php echo $image['url']; ?>"> <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
					</dt>
				</dl>
					
				<?php endforeach; ?>
					 <!-- Image Code -->
				<?php endif; ?> <!-- This is where the gallery loop ends -->
~~~

## Frequently Asked Questions


 


### Why did you make this plugin?


I started this plugin as a custom functions plugin for my site only, to reduce my dependency on themes or plugins to maintain my portfolio.
It is also a way for me to dive deeper into my understanding of custom post types and their arguments and plugins development  __and learn by doing__.


### Are all the bugs worked out?
__No__ all the bug are not worked out. I created the post type to use the site wide categories and tags. It doesn&#39;t quite work like I expected it too. ~~I also need to re-write the slug to pull a more SEO friendly title.~~
### Are there other plugins that create a portfolio post type?


Yes take a look at two great professional plugins :smile_cat:
 * https://github.com/devinsays/portfolio-post-type
 * https://github.com/justintadlock/custom-content-portfolio

##Changelog 
##1.1
* Re-write slug on custom post type:
Exchange the _underscore in the slug for`portfolio-item`
*  Re-write archive:
Change archive slug from bool to string:plural `portfolio-items` 
*  Change admin dash image to WordPress Dashicon.

## Upgrade Notice 
##1.1
*	Re-write slug on custom post type:
Current slug is not SEO friendly. Google will not read an underscore as a space between words.You will need to update your permalink's by resaving in the dash admin.The change in the portfolio slug may also require you to update your theme templates.
For example in my case: `single-portfolio_item.php` simply needed to be re-named `single-portfolio.php`

*  Re-write archive:
Change archive slug from bool to string:plural `portfolio-items` .Update your permalink's by resaving in the dash admin.



## Credits , Copyright and License

2013-2015 &copy; [Lisa E. A. Dickerson](http://www.aliaslead.com/)

This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

#####Discalimer
This program is __WITHOUT WARRANTY__ as per the GNU General Public License, and very much a work in progress.:octocat:




