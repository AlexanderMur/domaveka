
<div class="container mfp-fade">
	<div class="popup-view">
			<span class="close-popup" href=""><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
			<div class="row">
				<div class="col-sm-8 col-sm-push-4 p-relative">
					<h1 class="popup-title"><?php the_title() ?></h1>
					<p class="t-bold mb-10"><?php echo get_post_meta($post->ID,'description',true) ?></p>
					<?php
					$imgs = array();
					$post_thumb = get_post_thumbnail_id($post->ID);
					$ids =  get_post_meta($post->ID,'imgs',true);
					if($post_thumb){
						$imgs[] = $post_thumb;
					} else {
						$post_thumb = $ids[0];
					}
					if($ids){
						$imgs = array_merge($imgs,$ids);
					}
					?>
					<?php if(!empty($post_thumb)){ ?>
						<div class="swiper-container gallery-top">
						  <div class="swiper-wrapper">
						  	<?php
						  	foreach ($imgs as $key => $id) {
						  		$full_url = wp_get_attachment_image_src($id,'medium_large')[0];
						  		?>
						  		<div class="swiper-slide swiper-lazy" data-background="<?php echo $full_url ?>">
						  		  <div class="swiper-lazy-preloader"></div>
						  		</div>
						  		<?php	
						  	}
						  	?> 
						  </div>
						  <!-- Add Arrows -->
						</div>
					<?php } ?>
					<?php if(!empty($imgs)){ ?>
						<div class="thumbs-padding">
							<div class="swiper-container gallery-thumbs">
								<div class="swiper-wrapper">
									<div class="border"></div>
									<?php
									foreach ($imgs as $key => $id) {
										$thumb_url = wp_get_attachment_image_src($id,'thumbnail')[0];
										?>
									    <div class="swiper-slide" style="background-image:url(<?php echo $thumb_url ?>)"></div>
										<?php	
									}
									?>					    
								</div>
							</div>
							<button class="prev"><i class="fa fa-chevron-left"></i></button>
							<button class="next"><i class="fa fa-chevron-right"></i></button>
						</div>
					<?php } else echo '<div style="height: 113px"></div>'?>
					
				</div>
				<div class="col-sm-4 mt-sm-30 col-sm-pull-8 p-relative">
					<p class="mb-10 popup-option">Площадь: <b class="popup-option-area"><?php echo get_post_meta($post->ID,'area',true) ?>м<sup>2</sup></b></p>
					<p class="mb-10 popup-option">Количество комнат:<br><b><?php echo get_post_meta($post->ID,'rooms',true) ?></b></p>
					<div class="borded-bottom borded-bottom-gray mb-10"></div>
					<p class="t-sm-center">Строительство «под отделку»:</p>
					<p class="text-up c-brown popup-price mb-10 t-sm-center"><?php echo num_format(get_post_meta($post->ID,'price',true),0,',',' ') ?> ₽</p>
					<div class="contact-form-header contact-form-popup t-center">
						<?php echo do_shortcode( get_theme_mod('projects_popup_shortcode') ) ?>
					</div>
				</div>
			</div>
		<section class="s-section">
			<div class="t-center">
				<h2 class="text-up c-brown circle-brown title-border">Описание</h2>
				<div class="borded-bottom borded-bottom-gray"></div>
			</div>
			<div class="popup-content">
				<?php echo apply_filters( 'the_content', $post->post_content ) ?>
			</div>
		</section>
		<section class="s-section">
			<div class="t-center">
				<h2 class="text-up c-brown circle-brown title-border">Комплектация</h2>
				<div class="borded-bottom borded-bottom-gray"></div>
			</div>
			<div class="popup-content">
				<?php echo get_post_meta($post->ID,'equipment',true); ?>
			</div>
		</section>
	</div>
</div>