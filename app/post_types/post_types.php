<?php
add_action( 'init', function() {
	add_theme_support( 'post-thumbnails'  );
	$labels = array(
		'name'               => __( 'Проекты', 'text-domain' ),
		'singular_name'      => __( 'Проект', 'text-domain' ),
		'add_new'            => _x( 'Add New Проект', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Проект', 'text-domain' ),
		'edit_item'          => __( 'Edit Проект', 'text-domain' ),
		'new_item'           => __( 'New Проект', 'text-domain' ),
		'view_item'          => __( 'View Проект', 'text-domain' ),
		'search_items'       => __( 'Search Проекты', 'text-domain' ),
		'not_found'          => __( 'No Проекты found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Проекты found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Проект:', 'text-domain' ),
		'menu_name'          => __( 'Проекты', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'supports'			  => array('thumbnail','title','editor')
	);
	register_post_type( 'project', $args );
});
add_action( 'init', function() {
	$labels = array(
		'name'               => __( 'Отзывы', 'text-domain' ),
		'singular_name'      => __( 'Отзыв', 'text-domain' ),
		'add_new'            => _x( 'Add New Отзыв', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Отзыв', 'text-domain' ),
		'edit_item'          => __( 'Edit Отзыв', 'text-domain' ),
		'new_item'           => __( 'New Отзыв', 'text-domain' ),
		'view_item'          => __( 'View Отзыв', 'text-domain' ),
		'search_items'       => __( 'Search Отзывы', 'text-domain' ),
		'not_found'          => __( 'No Отзывы found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Отзывы found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Отзыв:', 'text-domain' ),
		'menu_name'          => __( 'Отзывы', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => false,
		'publicly_queryable'  => false,
		'supports'			  => array('thumbnail','title','editor')
	);
	register_post_type( 'testimonial', $args );
});
add_action( 'init', function() {
	$labels = array(
		'name'               => __( 'Фото работ', 'text-domain' ),
		'singular_name'      => __( 'Фото работ', 'text-domain' ),
		'add_new'            => _x( 'Add New Фото работ', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Фото работ', 'text-domain' ),
		'edit_item'          => __( 'Edit Фото работ', 'text-domain' ),
		'new_item'           => __( 'New Фото работ', 'text-domain' ),
		'view_item'          => __( 'View Фото работ', 'text-domain' ),
		'search_items'       => __( 'Search Фото работ', 'text-domain' ),
		'not_found'          => __( 'No Фото работ found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Фото работ found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Фото работ:', 'text-domain' ),
		'menu_name'          => __( 'Фото работ', 'text-domain' ),
	);
	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => false,
		'supports'			  => array('thumbnail','title','editor')
	);
	register_post_type( 'port', $args );
});

add_action('admin_enqueue_scripts',function($hook){
    $screen = get_current_screen();
	if ( $hook == 'post.php' && ($screen->post_type == 'project' || $screen->post_type == 'port') ) {
		wp_enqueue_script( 'media-project',get_template_directory_uri() . '/post_types/media-project.js');
    }
});

add_action('save_post', 'save_fields', 10, 2);
function save_fields($post_id, $post){
	if ($post->post_type == 'project') {
		if (isset($_POST['floor']) && $_POST['floor'] != '') {
			update_post_meta($post_id, 'floor', $_POST['floor']);
		}
		if (isset($_POST['description']) && $_POST['description'] != '') {
			update_post_meta($post_id, 'description', $_POST['description']);
		}
		if (isset($_POST['equipment']) && $_POST['equipment'] != '') {
			update_post_meta($post_id, 'equipment', $_POST['equipment']);
		}
		if (isset($_POST['bathrooms']) && $_POST['bathrooms'] != '') {
			update_post_meta($post_id, 'bathrooms', $_POST['bathrooms']);
		}
		if(isset($_GET['bulk_edit'])){
			if (isset($_GET['area']) && $_GET['area'] != '') {
				update_post_meta( $post_id, 'area', $_GET['area'] );
			}
			if (isset($_GET['description']) && $_GET['description'] != '') {
				update_post_meta( $post_id, 'description', $_GET['description'] );
			}
			if (isset($_GET['price']) && $_GET['price'] != '') {
				update_post_meta( $post_id, 'price', $_GET['price'] );
			}
		}
	}

	if (isset($_POST['price']) && $_POST['price'] != '') {
		update_post_meta($post_id, 'price', $_POST['price']);
	}
	if (isset($_POST['area']) && $_POST['area'] != '') {
		update_post_meta($post_id, 'area', $_POST['area']);
	}
	if (isset($_POST['rooms']) && $_POST['rooms'] != '') {
		update_post_meta($post_id, 'rooms', $_POST['rooms']);
	}
	if (isset($_POST['imgs']) && $_POST['imgs'] != '') {
		update_post_meta($post_id, 'imgs', $_POST['imgs']);
	}
	if (isset($_POST['client']) && $_POST['client'] != '') {
		update_post_meta($post_id, 'client', $_POST['client']);
	}
	if (isset($_POST['town']) && $_POST['town'] != '') {
		update_post_meta($post_id, 'town', $_POST['town']);
	}
}

add_action('admin_enqueue_scripts',function($hook){
    $screen = get_current_screen();
	if ( ($hook == 'post.php' || $hook == 'post-new.php') && ($screen->post_type == 'project' )) {
		wp_enqueue_script( 'multiupload',get_template_directory_uri() . '/post_types/multiupload.js');
    }
	if ( ($hook == 'post.php' || $hook == 'post-new.php') && ($screen->post_type == 'port') ) {
		wp_enqueue_script( 'multiupload',get_template_directory_uri() . '/post_types/multiupload_test.js');
    }
});

add_action( 'add_meta_boxes', function(){

	add_meta_box(  
	    'equip_meta_box',
	    'Описание Комплектации',
	    'my_meta_editor', 
	    array('project'), 
	    'normal',
	    'high');
}); 

function my_meta_editor($post) {

    $content = get_post_meta($post->ID, 'equipment', true);

    $editor = 'equipment';

    $editor_settings = array();

    wp_editor( $content, $editor, $editor_settings);

}
/*Добавление галереи*/

function metaimage_meta_box() {  
    add_meta_box(  
        'metaimage_meta_box', // Идентификатор(id)
        'Галерея изображений', // Заголовок области с мета-полями(title)
        'show_my_metaimage_meta_box', // Вызов(callback)
        'project', // где будет отображаться, post означает в форме стандартного добавления записи
        'normal',
        'high');
} 
add_action('add_meta_boxes', 'metaimage_meta_box'); // Запускаем функцию
function show_my_metaimage_meta_box() {

    ?>
    <style>
        .galery-elem {
             position: relative;
             float: left; 
        }
        .galery-container::after {
         display: table;
         content: '';
         clear: both;
        }
    </style>
    <?php

    global $post;
    $w = 100;
    $h = 100;

    $values = get_post_meta($post->ID, 'imgs',true);
        echo '<div class="galery-container">';
    if ($values) {
        foreach ($values as $key => $value) {
           $image_attributes = wp_get_attachment_image_src( $value, 'full' );
			?>
			<div class="galery-elem">     
				<img src="<?php echo $image_attributes[0] ?> " width="auto" height="<?php echo $h ?>px" />
				<span style="position:absolute; top:0;left:0">
					<button onclick="DeliteEl(this); return false;" type="submit" class="remove_image_button button">&times;</button>
				</span>
				<input type="hidden" value="<?php echo $value ?>name="imgs[]"/>
			</div>
			<?php
        }
    }
    ?>
    </div>
    <div>
		<div>
			<button type="submit" class="upload_image_button button">Загрузить</button>
		</div>
    </div>
    <?php
};
add_action('add_meta_boxes', 'metaimage_port_meta_box'); // Запускаем функцию
function metaimage_port_meta_box() {  
    add_meta_box(  
        'metaimage_port_meta_box', // Идентификатор(id)
        'Галерея изображений', // Заголовок области с мета-полями(title)
        'show_port_metaimage_meta_box', // Вызов(callback)
        'port', // где будет отображаться, post означает в форме стандартного добавления записи
        'normal',
        'high');
} 
function show_port_metaimage_meta_box($post) {

    ?>
    <style>
        .galery-elem {
             position: relative;
             float: left; 
        }
        .galery-container::after {
         display: table;
         content: '';
         clear: both;
        }
    </style>
    <?php

    $values = get_post_meta($post->ID, 'imgs',true);
    ?>
    <div class="galery-container">
    	<?php
	    if ($values) {
	        foreach ($values as $key => $value) {
				$image_attributes = wp_get_attachment_image_src( $value['src'], 'full' );
				?>
				<div class="galery-elem">     
					<img src="<?php echo $image_attributes[0] ?> " width="auto" height="100px" />
					<br>
					<input type="text" name="imgs[<?php echo $key ?>][title]" value="<?php echo $value['title'] ?>">
					<span style="position:absolute; top:0;left:0">
						<button onclick="DeliteEl(this); return false;" type="submit" class="remove_image_button button">&times;</button>
					</span>
					<input type="hidden" value="<?php echo $value['src'] ?>" name="imgs[<?php echo $key ?>][src]"/>
				</div>
				<?php
	        }
	    }
	    ?>
    </div>
    <div>
		<div>
			<button type="submit" class="upload_image_button button">Загрузить</button>
		</div>
    </div>
    <?php
};
add_action('add_meta_boxes', function(){
	add_meta_box('project_meta_box', 'Project Details', 'display_project_box', ['project','port'], 'normal', 'high');
});
function display_project_box($post) {
	?>
	<table>
		<tr>
			<td>
				<label>
					Цена, руб<br>
					<input type="text" name="price" value="<?php echo get_post_meta($post->ID,"price",true) ?>">
				</label>
			</td>
			<td>
				<label>
					Площадь, м<sup>2</sup><br>
					<input type="text" name="area" value="<?php echo get_post_meta($post->ID,"area",true) ?>">
				</label>
			</td>
			<td>
				<label>
					Этажность<br>
					<select name="floor" id="">
						<option value="1">1-этажный</option>
						<option value="2">2-этажный</option>
						<option value="2">3-этажный</option>
					</select>
				</label>
			</td>
			<td>
				<label>
					Краткое описание<br>
					<textarea  name="description"><?php echo get_post_meta($post->ID,"description",true) ?></textarea>
				</label>
			</td>
			<td>
				<label>
					Описание Количество комнат<br>
					<textarea  name="rooms"><?php echo get_post_meta($post->ID,"rooms",true) ?></textarea>
				</label>
			</td>
		</tr>
	</table>
	<?php
}
add_action('add_meta_boxes', function(){
	add_meta_box('testimonial_meta_box', 'testimonial Details', 'display_testimonial_box', 'testimonial', 'normal', 'high');
});
function display_testimonial_box($post) {
	?>
	<table>
		<tr>
			<td>
				<label>
					Клиент<br>
					<input type="text" name="client" value="<?php echo get_post_meta($post->ID,"client",true) ?>">
				</label>
			</td>
			<td>
				<label>
					Город<br>
					<input type="text" name="town" value="<?php echo get_post_meta($post->ID,"town",true) ?>">
				</label>
			</td>
		</tr>
	</table>
	<?php
}
add_filter( 'manage_project_posts_columns', function($columns){
	$columns['area'] = 'Площадь';
	return $columns;
},10, 1 );
add_filter( 'manage_edit-project_sortable_columns', function ( $columns ) {
    $columns['area'] = 'slice';
    return $columns;
} );

add_action( 'pre_get_posts', function ( $query ) {
    if( ! is_admin() )
		return;
 
    $orderby = $query->get( 'orderby');
 
    if( 'slice' == $orderby ) {
        $query->set('meta_key','area');
        $query->set('orderby','meta_value_num');
    }
} );

add_filter( 'manage_project_posts_custom_column', function($columns){
	global $post;
	echo get_post_meta($post->ID,'area',true) . 'м<sup>2</sup>';
},10, 1 );
add_action( 'bulk_edit_custom_box', function($e,$b){
	?>
	<fieldset class="inline-edit-col-right"><div class="inline-edit-col">		
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Плошадь</span>
				<input type="text" name="area">
			</label>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Описание</span>
				<input type="text" name="description">
			</label>
		</div>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Цена</span>
				<input type="text" name="price">
			</label>
		</div>
		</div>		
	</div></fieldset>
	<?php
}, 10, 2 );
add_action( 'quick_edit_custom_box', function($e,$b){
	?>
	<fieldset class="inline-edit-col-right"><div class="inline-edit-col">		
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Плошадь</span>
				<input type="text" name="area">
			</label>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Описание</span>
				<input type="text" name="description">
			</label>
		</div>
		<div class="inline-edit-group wp-clearfix">
			<label class="inline-edit-status alignleft">
				<span class="title">Цена</span>
				<input type="text" name="price">
			</label>
		</div>
		</div>		
	</div></fieldset>
	<?php
}, 10, 2 );
?>