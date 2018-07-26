
<div class="col-sm-3 col-xs-6">
	<div class="product-block t-left" data-id="<?php the_ID() ?>">
		<img src="<?php echo get_the_post_thumbnail_url($post,'medium') ?>" alt=" ">
		<h5 class="title-product"><?php the_title() ?></h5>
		<p class="area"><?php echo get_post_meta($post->ID,'area',true) ?><sup>2</sup></p>
		<p class="price">от <strong><?php echo num_format(get_post_meta($post->ID,'price',true), 0, ',', '.') ?></strong> руб.</p>
	</div>
</div>