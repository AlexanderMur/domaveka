<?php 

add_action('wp_ajax_get_project', 'ajax_get_project');
add_action('wp_ajax_nopriv_get_project', 'ajax_get_project');

function ajax_get_project(){
	$basename = wp_basename( $_POST['link'] );
	$post = get_page_by_path( $basename, OBJECT, 'project' ) ;
	$GLOBALS['post'] = $post;
	get_template_part('template-parts/content-single');
	die();
}
add_action('wp_ajax_load_project', 'ajax_load_project');
add_action('wp_ajax_nopriv_load_project', 'ajax_load_project');

function ajax_load_project(){
	$post = get_post($_GET['id']);
	$GLOBALS['post'] = $post;
	get_template_part('port','single');
	die();
}
add_action('wp_ajax_load_projects', 'ajax_load_projects');
add_action('wp_ajax_nopriv_load_projects', 'ajax_load_projects');

function ajax_load_projects(){
	$paged = +$_GET['paged'];
	set_query_var( 'paged', $paged );
	get_template_part('template-parts/project','loop'.$_GET['type']);
	die();
}
add_action('wp_ajax_load_ports', 'ajax_load_ports');
add_action('wp_ajax_nopriv_load_ports', 'ajax_load_ports');

function ajax_load_ports(){
	$paged = +$_GET['paged'];
	$query = new WP_Query(array(
		'post_type' => 'port',
		'posts_per_page' => 4,
		'paged' => $_GET['paged'],
	));
	$cur = 0;
	$len = count($query->posts);
	while($cur < $len){
		$x = 0;
		?>
		<div class="row">
			<?php
			while($cur < $len && $x < 4 ){
				$x++;
				$cur++;
				$query->the_post();
				get_template_part( 'port','loop');
			}
			?>					
		</div>
		<?php
	}
	die();
}
?>