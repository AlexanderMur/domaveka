<?php

add_action( 'customize_register', function($wp_customize){
	class Text_Editor_Custom_Control extends WP_Customize_Control
	{
	    public $type = 'textarea';
	    /**
	    ** Render the content on the theme customizer page
	    */
	    public function render_content() { ?>
	        <label>
	          <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	          <?php
	            $settings = array(
	              );
	            $this->filter_editor_setting_link();
	            wp_editor($this->value(), $this->id, $settings );
	          ?>
	        </label>
	    <?php
	        do_action('admin_footer');
	        do_action('admin_print_footer_scripts');
	    }
	    private function filter_editor_setting_link() {
	        add_filter( 'the_editor', function( $output ) { return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); } );
	    }
	}

	/*Theme mods:
		header_button_text
		header_button_link
		banner_image
		banner_title
		banner_shortcode
		special_offer_bg
		special_offer_text
		special_offer_show
		about_us_image
		about_us_text
		about_us_why
		about_us_lead
		about_us_card0_img
		about_us_card0_text
		about_us_card1_img
		about_us_card1_text
		about_us_card2_img
		about_us_card2_text
		about_us_card3_img
		about_us_card3_text
		about_us_card4_img
		about_us_card4_text
		about_us_card5_img
		about_us_card5_text
		index_banner_title
		circles_title
		circle0_image
		circle0_title
		circle0_text
		circle1_image
		circle1_title
		circle1_text
		circle2_image
		circle2_title
		circle2_text
		circle3_image
		circle3_title
		circle3_text
		circle4_image
		circle4_title
		circle4_text
		circle5_image
		circle5_title
		circle5_text
		circle6_image
		circle6_title
		circle6_text
		circle7_image
		circle7_title
		circle7_text
		circle8_image
		circle8_title
		circle8_text
		circle9_image
		circle9_title
		circle9_text
		circle10_image
		circle10_title
		circle10_text
		circle11_image
		circle11_title
		circle11_text
		column0_image
		column0_text
		column1_image
		column1_text
		projects_shortcode
		projects_popup_shortcode
		map_title
		map_script
		footer_logo
		company_info
		footer_button_text
		footer_shortcode
		copyright
		copyright_bg
		phone_number
	*/
	$wp_customize->add_panel( 'index_panel', array(
		'title'      => 'Настройки темы',
		'capability' => 'edit_theme_options'
	));
		$wp_customize->add_section( 'header_section' , array(
		    'title'      => 'Хедер',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'header_button_text' , array(
				'default'    => 'ПЕСКОСТРУЙНАЯ ОБРАБОТКА СРУБОВ',
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('header_button_text', array(
				'label'      => 'Текст',
				'section'    => 'header_section',
			));
			$wp_customize->add_setting( 'header_button_link' , array(
				'default'    => 'http://google.com',
				'transport'  => 'refresh',
			));
			$wp_customize->add_control('header_button_link', array(
				'label'      => 'Ссылка',
				'section'    => 'header_section',
			));
			$wp_customize->add_setting( 'header_phone_number' , array(
				'default'    => '8 (8332) <font color="#6ea903">560-198</font>',
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('header_phone_number', array(
				'label'      => 'номер телефона',
				'section'    => 'header_section',
			));
		$wp_customize->add_section( 'banner_options' , array(
		    'title'      => 'Баннер',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'banner_image' , array(
				'transport'  => 'postMessage',
				'default' 	=> g('banner.jpg')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'banner_image', array(
				'label'      => 'Картинка',
				'section'    => 'banner_options'
			)));
			$wp_customize->add_setting( 'banner_title' , array(
				'default'    => "Строим
<span class='text-up'>из сухого бревна</span>
«под ключ»",
				'transport'  => 'postMessage',
			));		
			$wp_customize->add_control('banner_title', array(
				'label'      => 'Заголовок баннера',
				'section'    => 'banner_options',
				'type'       => 'textarea'
			));
			$wp_customize->add_setting( 'banner_shortcode' , array(
				'transport'  => 'refresh',
				'default'	=> 'Настройки темы > баннер > Шорткод формы'
			));
			$wp_customize->add_control('banner_shortcode', array(
				'label'      => 'Шорткод формы',
				'section'    => 'banner_options',
			));

		$wp_customize->add_section( 'special_offer_options' , array(
		    'title'      => 'Акция',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'special_offer_bg' , array(
				'transport'  => 'postMessage',
				'default' 	=>  g('bg-2.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'special_offer_bg', array(
				'label'      => 'Картинка',
				'section'    => 'special_offer_options'
			)));
			$wp_customize->add_setting( 'special_offer_text' , array(
				'transport'  => 'postMessage',
				'default' => 'Закажи дом - получи проект в подарок!'
			));			
			$wp_customize->add_control('special_offer_text', array(
				'label'      => 'Текст',
				'section'    => 'special_offer_options'
			));
			$wp_customize->add_setting( 'special_offer_show' , array(
				'transport'  => 'refresh',
				'default' => true
			));			
			$wp_customize->add_control('special_offer_show', array(
				'label'      => 'Показывать акцию',
				'section'    => 'special_offer_options',
				'type'       => 'checkbox'
			));
		$wp_customize->add_section( 'about_us_section' , array(
		    'title'      => 'О нас',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'about_us_image' , array(
				'transport'  => 'postMessage',
				'default'	=> g('house_about.jpg')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_image', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_text' , array(
				'transport'  => 'postMessage',
				'default' => 'Дома века - это высококачественные, экологичные и долговеч-ные здания для комфортной жизни. Для строительства исполь-зуется древесина из северных лесов Кировской области 
и республики Коми и полностью соответствует высоким 
стандартам качества. Работает собственная производственная база, где сырье обрабатывается на высокоточном оборудовании 
по проверенным технологиям.'
			));			
			$wp_customize->add_control('about_us_text', array(
				'label'      => 'Текст',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_why' , array(
				'transport'  => 'postMessage',
				'default' => 'ПОЧЕМУ СТОИТ РАБОТАТЬ С НАМИ:'
			));			
			$wp_customize->add_control('about_us_why', array(
				'label'      => 'Заголовок к картинкам',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_lead' , array(
				'transport'  => 'postMessage',
				'default' => 'Ваш дом - нашими руками с любовью и стараниями!'
			));			
			$wp_customize->add_control('about_us_lead', array(
				'label'      => 'Текст под картинками',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_card0_img' , array(
				'transport'  => 'postMessage',
				'default'	=> g('icon-1.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_card0_img', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_card0_text' , array(
				'transport'  => 'postMessage',
				'default' => '500м3 в год'
			));			
			$wp_customize->add_control('about_us_card0_text', array(
				'label'      => 'Текст у картинки',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_card1_img' , array(
				'transport'  => 'postMessage',
				'default'	=> g('icon-2.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_card1_img', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_card1_text' , array(
				'transport'  => 'postMessage',
				'default' => '5 домов в месяц'
			));			
			$wp_customize->add_control('about_us_card1_text', array(
				'label'      => 'Текст у картинки',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_card2_img' , array(
				'transport'  => 'postMessage',
				'default'	=> g('icon-3.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_card2_img', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_card2_text' , array(
				'transport'  => 'postMessage',
				'default' => 'в ТОП5 по качеству производимых домов из бревна'
			));			
			$wp_customize->add_control('about_us_card2_text', array(
				'label'      => 'Текст у картинки',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_card3_img' , array(
				'transport'  => 'postMessage',
				'default'	=> g('icon-4.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_card3_img', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_card3_text' , array(
				'transport'  => 'postMessage',
				'default' => 'комплекс услуг «под ключ» - от рубки бреван - до отделки дома'
			));			
			$wp_customize->add_control('about_us_card3_text', array(
				'label'      => 'Текст у картинки',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_card4_img' , array(
				'transport'  => 'postMessage',
				'default'	=> ''
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_card4_img', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_card4_text' , array(
				'transport'  => 'postMessage',
				'default' => ''
			));			
			$wp_customize->add_control('about_us_card4_text', array(
				'label'      => 'Текст у картинки',
				'section'    => 'about_us_section'
			));
			$wp_customize->add_setting( 'about_us_card5_img' , array(
				'transport'  => 'postMessage',
				'default'	=> ''
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'about_us_card5_img', array(
				'label'      => 'Картинка',
				'section'    => 'about_us_section'
			)));
			$wp_customize->add_setting( 'about_us_card5_text' , array(
				'transport'  => 'postMessage',
				'default' => ''
			));			
			$wp_customize->add_control('about_us_card5_text', array(
				'label'      => 'Текст у картинки',
				'section'    => 'about_us_section'
			));
		$wp_customize->add_section( 'banner_section' , array(
		    'title'      => '2 секция',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'index_banner_title' , array(
				'default'    => tf('index_banner_title'),
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Text_Editor_Custom_Control($wp_customize,'index_banner_title', array(
				'label'      => 'Текст',
				'section'    => 'banner_section',
			)));

		$wp_customize->add_section( 'circles_section' , array(
		    'title'      => 'Преимущества',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'circles_title' , array(
				'default'    => 'ПЛЮСЫ СУХОГО ОЦИЛИНДРОВАННОГО БРЕВНА',
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circles_title', array(
				'label'      => 'Название секции',
				'section'    => 'circles_section',
				'type'       => 'text'
			));

			$wp_customize->add_setting( 'circle0_image' , array(
				'default'    => get_template_directory_uri() . '/img/icon-'.(0%5+5).'.png',
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle0_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle0_title' , array(
				'default'    => tf('circle0_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle0_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle0_text' , array(
				'default'    => tf('circle0_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle0_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle1_image' , array(
				'default'    =>tf('circle1_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle1_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle1_title' , array(
				'default'    => tf('circle1_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle1_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle1_text' , array(
				'default'    => tf('circle1_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle1_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle2_image' , array(
				'default'    =>tf('circle2_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle2_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle2_title' , array(
				'default'    => tf('circle2_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle2_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle2_text' , array(
				'default'    => tf('circle2_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle2_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle3_image' , array(
				'default'    =>tf('circle3_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle3_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle3_title' , array(
				'default'    => tf('circle3_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle3_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle3_text' , array(
				'default'    => tf('circle3_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle3_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle4_image' , array(
				'default'    =>tf('circle4_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle4_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle4_title' , array(
				'default'    => tf('circle4_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle4_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle4_text' , array(
				'default'    => tf('circle4_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle4_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle5_image' , array(
				'default'    =>tf('circle5_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle5_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle5_title' , array(
				'default'    => tf('circle5_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle5_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle5_text' , array(
				'default'    => tf('circle5_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle5_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle6_image' , array(
				'default'    =>tf('circle6_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle6_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle6_title' , array(
				'default'    => tf('circle6_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle6_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle6_text' , array(
				'default'    => tf('circle6_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle6_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle7_image' , array(
				'default'    =>tf('circle7_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle7_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle7_title' , array(
				'default'    => tf('circle7_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle7_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle7_text' , array(
				'default'    => tf('circle7_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle7_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle8_image' , array(
				'default'    =>tf('circle8_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle8_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle8_title' , array(
				'default'    => tf('circle8_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle8_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle8_text' , array(
				'default'    => tf('circle8_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle8_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle9_image' , array(
				'default'    =>tf('circle9_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle9_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle9_title' , array(
				'default'    => tf('circle9_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle9_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle9_text' , array(
				'default'    => tf('circle9_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle9_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle10_image' , array(
				'default'    =>tf('circle10_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle10_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle10_title' , array(
				'default'    => tf('circle10_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle10_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle10_text' , array(
				'default'    => tf('circle10_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle10_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

			$wp_customize->add_setting( 'circle11_image' , array(
				'default'    =>tf('circle11_image'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'circle11_image', array(
				'label'      => 'Картинка',
				'section'    => 'circles_section'
			)));
			$wp_customize->add_setting( 'circle11_title' , array(
				'default'    => tf('circle11_title'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle11_title', array(
				'label'      => 'Название',
				'section'    => 'circles_section',
				'type'       => 'text'
			));
			$wp_customize->add_setting( 'circle11_text' , array(
				'default'    => tf('circle11_text'),
				'transport'  => 'postMessage',
			));
			$wp_customize->add_control('circle11_text', array(
				'label'      => 'Текст',
				'section'    => 'circles_section',
				'type'       => 'textarea'
			));

		$wp_customize->add_section( 'production' , array(
		    'title'      => 'Производство',
		    'panel'		 => 'index_panel'
		));
		
			$wp_customize->add_setting( 'column0_image' , array(
				'transport'  => 'postMessage',
				'default'	 => g('i1.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'column0_image', array(
				'label'      => 'Картинка',
				'section'    => 'production'
			)));
			$wp_customize->add_setting( 'column0_text' , array(
				'transport'  => 'postMessage',
				'default'	 => tf('column0_text')
			));
			$wp_customize->add_control(new Text_Editor_Custom_Control($wp_customize,'column0_text', array(
				'label'      => 'Текст',
				'section'    => 'production',
			)));

			$wp_customize->add_setting( 'column1_image' , array(
				'transport'  => 'postMessage',
				'default'	 => g('i2.png')
			));			
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'column1_image', array(
				'label'      => 'Картинка',
				'section'    => 'production'
			)));
			$wp_customize->add_setting( 'column1_text' , array(
				'transport'  => 'postMessage',
				'default'	 => tf('column1_text')
			));
			$wp_customize->add_control(new Text_Editor_Custom_Control($wp_customize,'column1_text', array(
				'label'      => 'Текст',
				'section'    => 'production',
			)));

		$wp_customize->add_section( 'projects' , array(
		    'title'      => 'Проекты',
		    'panel'		 => 'index_panel'
		));		
			$wp_customize->add_setting( 'projects_shortcode' , array(
				'transport'  => 'refresh',
			));			
			$wp_customize->add_control('projects_shortcode', array(
				'label'      => 'Шорткод формы между проектами',
				'section'    => 'projects'
			));
			$wp_customize->add_setting( 'projects_popup_shortcode' , array(
				'transport'  => 'refresh',
			));			
			$wp_customize->add_control('projects_popup_shortcode', array(
				'label'      => 'Шорткод формы во всплывающем окне проекта',
				'section'    => 'projects'
			));
		$wp_customize->add_section( 'map' , array(
		    'title'      => 'Карта',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'map_title' , array(
				'transport'  => 'postMessage',
				'default' => 'Наша география'
			));			
			$wp_customize->add_control('map_title', array(
				'label'      => 'Заголовок карты',
				'section'    => 'map'
			));
			$wp_customize->add_setting( 'map_script' , array(
				'transport'  => 'refresh',
				'default' => map_default()
			));			
			$wp_customize->add_control('map_script', array(
				'label'      => 'Javascript карты',
				'section'    => 'map'
			));
		$wp_customize->add_section( 'footer_options' , array(
		    'title'      => 'Футер',
		    'panel'		 => 'index_panel'
		));
			$wp_customize->add_setting( 'footer_logo' , array(
				'transport'  => 'postMessage',
				'default' => g('logo_footer.png')
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'footer_logo', array(
				'label'      => 'Лого',
				'section'    => 'footer_options',
			)));
			$wp_customize->add_setting( 'company_info' , array(
				'transport'  => 'postMessage',
				'default' => '©Дома века, 2017 Россия, 610000, г. Киров, ул. Ленила, 11, оф. 11'
			));
			$wp_customize->add_control('company_info', array(
				'label'      => 'Дополнительная информация',
				'section'    => 'footer_options',
				'type'		 => 'textarea'
			));
			$wp_customize->add_setting( 'footer_button_text' , array(
				'transport'  => 'postMessage',
				'default' => 'ОТПРАВИТЬ ЗАЯВКУ НА ПРОЕКТ ДОМА'
			));
			$wp_customize->add_control('footer_button_text', array(
				'label'      => 'Текст кнопки',
				'section'    => 'footer_options',
				'type'		 => 'text'
			));
			$wp_customize->add_setting( 'phone_number' , array(
				'transport'  => 'postMessage',
				'default' => '8 (8332) 560-198'
			));
			$wp_customize->add_control('phone_number', array(
				'label'      => 'Номер телефона',
				'section'    => 'footer_options',
			));
			$wp_customize->add_setting( 'footer_shortcode' , array(
				'transport'  => 'refresh',
				'default' => 'Шорткод из админки'
			));
			$wp_customize->add_control('footer_shortcode', array(
				'label'      => 'Шорткод формы',
				'section'    => 'footer_options',
				'type'		 => 'text'
			));
			$wp_customize->add_setting( 'copyright' , array(
				'transport'  => 'postMessage',
				'default' => 'копирайт'
			));
			$wp_customize->add_control('copyright', array(
				'label'      => 'Копирайт',
				'section'    => 'footer_options',
			));
			$wp_customize->add_setting( 'copyright_bg' , array(
				'transport'  => 'postMessage',
				'default'	 => g('bg-6.jpg')
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'copyright_bg', array(
				'label'      => 'Бг для копирайта',
				'section'    => 'footer_options',
			)));

});


function editor_customizer_script() {
    wp_enqueue_script( 'wp-editor-customizer', get_template_directory_uri() . '/customize/customizer-panel.js', array( 'jquery' ), rand(), true );
}
add_action( 'customize_controls_enqueue_scripts', 'editor_customizer_script' );

add_action('customize_preview_init',function(){
	wp_enqueue_script('domaveka_customize-preview', get_template_directory_uri() . '/customize/customize-preview.js',array( 'jquery' ), rand(), true );
});
?>