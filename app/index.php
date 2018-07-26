<?php get_header() ?>

	<section class="s-banner <?php echo get_preview_class('banner_image') ?> " style="background-image: url(<?php echo get_theme_mod('banner_image',g('banner.jpg')) ?>);">
		<div class="container banner-section t-sm-center">
			<h1 class="c-white banner-title t-sm-center"><?php echo get_text_mod('banner_title',"Строим дома
ИЗ СУХОГО БРЕВНА
«под ключ»") ?></h1>

			<div class="contact-form-header t-center">

				<?php echo do_shortcode(get_theme_mod('banner_shortcode','')) ?>
			</div>

		</div>
	</section>
	<?php
	if(get_theme_mod('special_offer_show',true)){
		?>
		<section class="s-section t-center c-white <?php echo get_preview_class('special_offer_bg')?>" style="background-image: url( <?php echo get_theme_mod('special_offer_bg',g('bg-2.png'))?>);">
			<h2 class="text-up circle-white">акция!</h2>
			<div class="borded-bottom"></div>
			<h1><?php echo get_text_mod('special_offer_text','Закажи дом - получи проект в подарок!')?></h1>	
		</section>
		<?php
	}
	?>
	<style>
		.mfp-fade.mfp-bg {
		  opacity: 0;
			
		  -webkit-transition: all 0.1s ease-out;
		  -moz-transition: all 0.1s ease-out;
		  transition: all 0.1s ease-out;
		}
		/* overlay animate in */
		.mfp-fade.mfp-bg.mfp-ready {
		  opacity: 0.8;
		}
		/* overlay animate out */
		.mfp-fade.mfp-bg.mfp-removing {
		  opacity: 0;
		}

		/* content at start */
		.mfp-fade.mfp-wrap .mfp-content {
		  opacity: 0;
		  -webkit-transition: all 0.01s ease-out;
		  -moz-transition: all 0.01s ease-out;
		  transition: all 0.01s ease-out;
		}
		/* content animate it */
		.mfp-fade.mfp-wrap.mfp-ready .mfp-content {
		  opacity: 1;
		}
		/* content animate out */
		.mfp-fade.mfp-wrap.mfp-removing .mfp-content {
		  opacity: 0;
		}
	</style>
	<section id="about-us" class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border">о нас</h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<p class="t-left"><?php echo get_text_mod('about_us_text','Дома века - это высококачественные, экологичные и долговеч-ные здания для комфортной жизни. Для строительства исполь-зуется древесина из северных лесов Кировской области и республики Коми и полностью соответствует высоким стандартам качества. Работает собственная производственная база, где сырье обрабатывается на высокоточном оборудовании по проверенным технологиям.') ?></p>
					<div class="advantage t-left">
						<h3 class="title-border text-up"><?php echo get_text_mod('about_us_why','ПОЧЕМУ СТОИТ РАБОТАТЬ С НАМИ:') ?></h3>
						<ul>
							<li class="adv-el <?php echo get_preview_class('about_us_card0_img') ?>" style="background-image: url(<?php echo get_theme_mod('about_us_card0_img',g('icon-1.png')) ?>)"><?php echo get_text_mod('about_us_card0_text','500м3 в год') ?></li>
							<li class="adv-el <?php echo get_preview_class('about_us_card1_img') ?>" style="background-image: url(<?php echo get_theme_mod('about_us_card1_img',g('icon-2.png')) ?>)"><?php echo get_text_mod('about_us_card1_text','5 домов в месяц') ?></li>
							<li class="adv-el <?php echo get_preview_class('about_us_card2_img') ?>" 

							style="background-image: url(<?php echo get_theme_mod('about_us_card2_img',g('icon-3.png')) ?>)"><?php echo get_text_mod('about_us_card2_text','в ТОП5 по качеству производимых домов из бревна') ?></li>
							<li class="adv-el <?php echo get_preview_class('about_us_card3_img') ?>" style="background-image: url(<?php echo get_theme_mod('about_us_card3_img',g('icon-4.png')) ?>)"><?php echo get_text_mod('about_us_card3_text','комплекс услуг «под ключ» - от рубки бреван - до отделки дома') ?></li>
							<li class="adv-el <?php echo get_preview_class('about_us_card4_img') ?>" style="background-image: url(<?php echo get_theme_mod('about_us_card4_img','') ?>) ?>)"><?php echo get_text_mod('about_us_card4_text','') ?></li>
							<li class="adv-el <?php echo get_preview_class('about_us_card5_img') ?>" style="background-image: url(<?php echo get_theme_mod('about_us_card5_img','') ?>) ?>)"><?php echo get_text_mod('about_us_card5_text','') ?></li>
						</ul>
						<h4><?php echo get_text_mod('about_us_lead','Ваш дом - нашими руками с любовью и стараниями!') ?></h4>
					</div>
				</div>
				
				<div class="col-sm-6">
					<img class="about-us-img <?php echo get_preview_class('about_us_image') ?>" src="<?php echo get_theme_mod('about_us_image',g('house_about.jpg'))?>" alt="">
				</div>
			</div>
		</div>
		<div class="borded-bottom borded-bottom-gray mb-50 mt-50"></div>
	</section>
	<section class="s-section" style="background-image: url( <?php eg('bg-3.jpg')?>";>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block-target" id="index_banner_title">
						<?php echo apply_filters( 'the_content', get_text_mod('index_banner_title',tf('index_banner_title'))) ?>
						
					</div>
				</div>
			</div>
		</div>	
	</section>
	<section class="s-section t-center section-big" style="background-color: #f1f1f1">
		<h2 class="text-up c-brown circle-brown title-border"><?php echo get_text_mod('circles_title','плюсы сухого оцилиндрованного бревна') ?></h2>
		<div class="borded-bottom borded-bottom-white mb-50"></div>
		<div class="container card-circles">

			<div class="card-description-wraper">
				<div class="card-description">
					<h4 class="text-up">Экологичнисть</h4>
					<div class="descr-text"><p>В отличие от сходного по свойствам клееного бруса, сухое оцилиндрованное бревно, в первую очередь, обладает способностью пропускать в жилое помещение воздух - естественная циркуляция воздуха и микроклимат в помещении не нарушается, что особенно для детей, астматиков и всех тех, кто бережно относится к своему здоровью и здраво подходит к выбору помещения, в котором он будет жить на протяжении длительного времени.. Те дом и люди, которые в нем живут, дышат не клеем (зачастую сомнительного производства) . Во вторых, и самое главное, дерево - самый экологичный продукт по умолчанию. в том числе в сравнении с арболитом, кирпичом и тд</p></div>
					<a class="close-popup" href=""><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
				</div>	
			</div>
			<?php 
			$cur = 0;
			$len = 12;
			while($cur < $len){
				$x = 0;
				?>
				<div class="row fix">
					<?php
					while($cur < $len && $x < 4 ){
						$x++;
						?>
						<div class="col-sm-3 col-xs-6">
							<div class="card <?php echo 'card-'.$cur ?>">
								<a href="" class="card-top <?php echo get_preview_class('circle'.$cur.'_image')?>" style="background-color: #fff; background-image: url( <?php echo get_theme_mod('circle'.$cur.'_image',tf('circle'.$cur.'_image')) ?>);">
								</a>
								<h4 class="card-bottom text-up"><?php echo get_text_mod('circle'.$cur.'_title',tf('circle'.$cur.'_title')) ?></h4>
								<div class="card-text"><p><?php echo get_text_mod('circle'.$cur.'_text',tf('circle'.$cur.'_text')) ?></p></div>
							</div>	
						</div>
						<?php						
						$cur++;
					}
					?>					
				</div>
				<?php
			}
			?>
		</div>	
	</section>
	<section id="advantages" class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border">наши приемущества</h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="excellence-block t-left" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/icon-11.png);">
						<h5 class="text-up">выгодно</h5>
						<p>Высокое качество производства и строительства по конкурентноспособной цене</p>
					</div>
					<div class="excellence-block t-left" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/icon-12.png);">
						<h5 class="text-up">удобно</h5>
						<p>Богатая производственная база и опятный 
коллектив специалистов позволяет выполнить полный спектр услуг от заключения договора 
до сдачи проекта</p>
					</div>
					<div class="excellence-block t-left" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/icon-13.png);">
						<h5 class="text-up">надежно</h5>
						<p>Компания «Дома века» успешно трудится на строительном рынке малоэтажного загородного жилья</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="excellence-block t-left" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/icon-14.png);">
						<h5 class="text-up">качество</h5>
						<p>Компания возьмет на себя все дальнейшее гарантийное обслуживание</p>
					</div>
					<div class="excellence-block t-left" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/icon-15.png);">
						<h5 class="text-up">современно</h5>
						<p>Благодаря постоянному изучению новинок на строительных рынке, мы соответствуем последним технологическим достижениям</p>
					</div>
					<div class="excellence-block t-left" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/icon-16.png);">
						<h5 class="text-up">индивидуально</h5>
						<p>Мы разработаем и реализуем любой проект «под ключ» специально для вас</p>
					</div>
				</div>
			</div>
		</div>	
	</section>
	<section id="production" class="s-section t-center section-big" style="background-color: #f1f1f1">
		<h2 class="text-up c-brown circle-brown title-border">производство</h2>
		<div class="borded-bottom borded-bottom-white mb-50"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<img class="product-img <?php echo get_preview_class('column0_image') ?>" src="<?php echo get_theme_mod( 'column0_image',g('i1.png')) ?>" alt="">
					<?php echo get_text_mod( 'column0_text',tf('column0_text')) ?>
				</div>
				<div class="col-sm-6">
					<img class="product-img <?php echo get_preview_class('column1_image') ?>" src="<?php echo get_theme_mod( 'column1_image',g('i2.png')) ?>" alt="">
					<?php echo get_text_mod( 'column1_text',tf('column1_text')) ?>
				</div>
			</div>
		</div>	
	</section>
	<section id="projects" class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border">проекты домов до 100м<sup>2</sup></h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container project-loop" >
			<?php
			$paged = 0;
			get_template_part('template-parts/project','loop1');
			?>
		</div>
		<?php if($max_num_pages >= 2){ ?>		
			<button class="loadProjects" data-type="1" data-nextpage="2" data-limit="<?php echo $max_num_pages ?>">Загрузить еще</button>
		<?php } ?>
	</section>
	<section class="s-section section-contact t-center" style="background-color: #6ea903">
		<div class="contact-form-section">
			<?php echo do_shortcode(get_theme_mod('projects_shortcode')) ?>
		</div>
	</section>
	<section class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border">проекты домов от 100м<sup>2</sup> до 150м<sup>2</sup></h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container project-loop" >
			<?php
			$paged = 0;
			get_template_part('template-parts/project','loop2');
			?>
		</div>
		<?php if($max_num_pages >= 2){ ?>
			<button class="loadProjects" data-type="2" data-nextpage="2" data-limit="<?php echo $max_num_pages ?>">Загрузить еще</button>
		<?php } ?>
	</section>
	<section class="s-section section-contact t-center" style="background-color: #6ea903">
		<div class="contact-form-section">
			<?php echo do_shortcode(get_theme_mod('projects_shortcode')) ?>
		</div>	
	</section>
	<section class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border">проекты домов от 150м<sup>2</sup></h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container project-loop" >
			<?php
			$paged = 0;
			get_template_part('template-parts/project','loop3')
			?>
		</div>
		<?php if($max_num_pages >= 2){ ?>
			<button class="loadProjects" data-type="3" data-nextpage="2" data-limit="<?php echo $max_num_pages ?>">Загрузить еще</button>
		<?php } ?>
	</section>
	<section class="s-section section-contact t-center" style="background-color: #6ea903">
		<div class="contact-form-section">
			<?php echo do_shortcode(get_theme_mod('projects_shortcode')) ?>
		</div>
	</section>
	<section class="s-section t-center gradient section-big">
		<h2 class="text-up c-brown circle-brown title-border">как мы работаем</h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="stage">
						<img src="<?php echo $template_directory_uri . '/' ?>img/s1.png" alt="">
						<p class="t-left stage-header">Вы оставляете заявку на сайте<br>или в нашем офисе</p>
						<div class="stage-bottom text-up t-left">
							<span class="stage-steps">1 шаг</span>
							<span class="stage-description">подача заявки</span>
						</div>	
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="stage">
						<img src="<?php echo $template_directory_uri . '/' ?>img/s2.png" alt="">
						<p class="t-left stage-header">Мы составляем предварительный<br>расчет стоимости дома</p>
						<div class="stage-bottom text-up t-left">
							<span class="stage-steps">2 шаг</span>
							<span class="stage-description">расчеты сметы</span>
						</div>	
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="stage">
						<img src="<?php echo $template_directory_uri . '/' ?>img/s3.png" alt="">
						<p class="t-left stage-header">Вы выбираете из готовых проектов<br>или мы для вас разрабатываем<br>новый индивидуальный проект дома</p>
						<div class="stage-bottom text-up t-left">
							<span class="stage-steps">3 шаг</span>
							<span class="stage-description">проектирование</span>
						</div>	
					</div>
				</div>

				<div class="col-md-4 col-sm-6">
					<div class="stage">
						<img src="<?php echo $template_directory_uri . '/' ?>img/s4.png" alt="">
						<p class="t-left stage-header">Подписываем договор</p>
						<div class="stage-bottom text-up t-left">
							<span class="stage-steps">4 шаг</span>
							<span class="stage-description">договор</span>
						</div>	
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="stage">
						<img src="<?php echo $template_directory_uri . '/' ?>img/s5.png" alt="">
						<p class="t-left stage-header">Мы занимаемся производством дома</p>
						<div class="stage-bottom text-up t-left">
							<span class="stage-steps">5 шаг</span>
							<span class="stage-description">производство дома</span>
						</div>	
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="stage">
						<img src="<?php echo $template_directory_uri . '/' ?>img/s6.png" alt="">
						<p class="t-left stage-header c-white">Мы строим дом на вашем<br>земельном участке</p>
						<div class="stage-bottom text-up t-left">
							<span class="stage-steps">6 шаг</span>
							<span class="stage-description">строительство дома</span>
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
	<section class="s-section section-contact t-center" style="background-image: url( <?php echo $template_directory_uri . '/' ?>img/bg-4.jpg);">
		<div class="contact-form-section contact-form-green">
			<?php echo do_shortcode(get_theme_mod('projects_shortcode')) ?>
		</div>	
	</section>
	<section id="completed-projects" class="s-section t-center completed-projects section-big">
		<h2 class="text-up c-brown circle-brown title-border">реализованные проекты</h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="completed_projects_loop"  >
			<div class="container" >
				<?php 
				$query = new WP_Query(array(
					'post_type' => 'port',
					'posts_per_page' => 4,
					'paged' => 0,
				));
				$cur = 0;
				$len = count($query->posts);
				while($cur < $len){
					$x = 0;
					?>
					<div class="row fix">
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
				?>			
				<?php if($query->max_num_pages >= 2){ ?>
					<button class="loadPorts" data-nextpage="2" data-limit="<?php echo $query->max_num_pages ?>">Загрузить еще</button>
				<?php } ?>
			</div>			
		</div>
			<div class="project-gallery">
				<div class="container">
					<?php
					$post = $query->posts[0];
					get_template_part('port','single');
					?>
				</div>
			</div>	
			<?php wp_reset_query() ?>
	</section>
	<section id="our_geography" class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border"><?php echo get_text_mod('map_title','наша география') ?></h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<?php echo get_map() ?>
	</section>
	<section id="reviews" class="s-section t-center section-big">
		<h2 class="text-up c-brown circle-brown title-border">отзывы</h2>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>
		<div class="container container-md-fluid">
			<div class="revs swiper-container">
			    <div class="swiper-wrapper">
			    	<?php 
			    	$query = new WP_Query('post_type=testimonial');
			    	while($query->have_posts()){
			    		$query->the_post();
			    		?>
			    		<div class="swiper-slide reviews">
			    			<div class="img-reviews t-center">
			    				<img src="<?php echo get_the_post_thumbnail_url()?>" alt="">
			    				<h5><?php the_title() ?></h5>
			    				<p><?php echo get_post_meta($post->ID,'town',true) ?></p>	
			    			</div>
			    			<div class="reviews-text-block">
			    				<?php the_content() ?>
			    				<p class="t-right"><?php echo get_post_meta($post->ID,'client',true) ?></p>	
			    			</div>
			    		</div>
			    		<?php
			    	}
			    	wp_reset_query();
			    	?>
			    </div>
				<div class="pagination"></div>
			</div>
		</div>
		<div class="borded-bottom borded-bottom-gray mb-50"></div>	
	</section>
	<div class="popup-bg"></div>
<?php get_footer() ?>