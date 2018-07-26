<?php
$query = new WP_Query(array(
	'post_type' => 'project',
	'orderby' => 'post_date',
	'paged'   => $paged,
	'posts_per_page' => 8,
	'meta_query' => array(
		'relation' => 'AND',
		array(
	        'key' => 'area',
	        'value' => 100,
	        'compare' => '>',
	        'type' => 'NUMERIC'
		),
		array(
	        'key' => 'area',
	        'value' => 150,
	        'compare' => '<=',
	        'type' => 'NUMERIC'
		)
	)

));
$cur = 0;
$len = count($query->posts);
$GLOBALS['max_num_pages'] = $query->max_num_pages;
if(!$query->have_posts()){
	echo 'Проекты не найдены';
}
while($cur < $len){
	$x = 0;
	?>
	<div class="row fix">
		<?php
		while($cur < $len && $x < 4 ){
			$x++;
			$cur++;
			$query->the_post();
			get_template_part( 'template-parts/content-project');
		}
		?>					
	</div>
	<?php
}
wp_reset_query();
?>