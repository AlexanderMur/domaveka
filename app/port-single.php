<div class="container">
	<div class="col-md-8 col-sm-12 mb-20 t-left">
		<img class="big-img" src="<?php echo get_the_post_thumbnail_url( $post, 'medium_large' ) ?>"" alt="">
	</div>
	<div class="col-md-4 col-sm-12">
		<div class="gakery-block t-left">
			<h5 class="title-product "><?php the_title() ?></h5>
			<p class="area c-green"><?php echo get_post_meta($post->ID,'area',true) ?> м<sup>2</sup></p>
			<p class="mb-20"><?php echo get_post_meta($post->ID,'rooms',true) ?></p>
			<div class="block-small-img">
				<?php
				$imgs = get_post_meta($post->ID,'imgs',true);
				$i = 0;
				foreach ($imgs as $key => $value) {
					$i++;
					if($i % 2){
						?>
						<div class="small-img-block">
							<img src="<?php echo wp_get_attachment_image_src( $value['src'], 'medium_large' )[0] ?>" alt="">
							<span><?php echo $value['title'] ?></span>
						</div>
						<?php
					} else {
						?>
						<div class="small-img-block">
							<span><?php echo $value['title'] ?></span>
							<img src="<?php echo wp_get_attachment_image_src( $value['src'], 'medium_large' )[0] ?>" alt="">
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>	
	</div>
</div>