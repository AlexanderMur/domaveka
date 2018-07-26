<?php
$post_thumb_url = get_the_post_thumbnail_url('medium');
if(!$post_thumb_url){
	$id = get_post_meta($post->ID,'imgs',true)[0];
	$post_thumb_url = wp_get_attachment_image_src($id,'medium')[0];
}
?>

<div class="col-sm-3 col-xs-6">
	<div class="product-block t-left">
		<img src="<?php echo $post_thumb_url ?>" alt="">
		<h5 class="title-product"><?php the_title() ?></h5>
		<p class="area"><?php echo get_post_meta($post->ID,'area',true) ?> м<sup>2</sup></p>
		<p class="price">от <strong><?php echo num_format(get_post_meta($post->ID,'price',true), 0,',','.') ?></strong> руб.</p>
		<a class="btn btn-green openProj" href="<?php echo get_the_permalink() ?>">Посмотреть проект <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
	</div>
</div>