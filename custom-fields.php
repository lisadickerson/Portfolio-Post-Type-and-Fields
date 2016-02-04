  	<!--Edit these fields in to your template above the content-->	
			
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
			
			
	<!--Edit Your content loop goes here-->	
			
	<!--Edit this field in below your content loop-->	
            
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