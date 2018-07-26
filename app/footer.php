</main>
<footer>
    <section class="s-section t-center" style="background-color: #6ea903">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="logo-footer t-left t-md-center">
                        <img class="mb-20 <?php echo get_preview_class('footer_logo') ?>"
                             src="<?php echo get_theme_mod('footer_logo', g('logo_footer.png')) ?>" alt="">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 t-md-center">
                    <p class="phone"><?php echo get_text_mod('phone_number', '8 (8332) 560-198') ?></p>

                </div>
                <div class="col-md-4 col-sm-6 t-right t-md-center">
                    <a class="mail"
                       href="mailto:<?php echo get_option('admin_email') ?>"><?php echo get_option('admin_email', 'domaveka_43@mail.ru') ?></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 t-left t-md-center">
                    <?php echo get_text_mod('company_info', '©Дома века, 2017 Россия, 610000, г. Киров, ул. Ленила, 11, оф. 11') ?>
                </div>
                <div class="col-md-4 col-sm-12 t-center">
                    <a class="btn btn-large text-up btn-contact"
                       href=""><?php echo get_text_mod('footer_button_text', 'ОТПРАВИТЬ ЗАЯВКУ НА ПРОЕКТ ДОМА') ?></a>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-form-footer contact-form-header t-center">
        <span class="close-popup" href=""><i aria-hidden="true">×</i></span>
        <?php echo do_shortcode(get_theme_mod('footer_shortcode')) ?>
    </div>
    <section id="contacts" class="s-section t-center <?php echo get_preview_class('copyright_bg') ?> "
             style="background-image: url(<?php echo get_theme_mod('copyright_bg', g('bg-6.jpg')) ?>);">
        <div class="container">
            <p class="t-right"><?php echo get_text_mod('copyright', 'копирайт') ?></p>
        </div>
    </section>
</footer>


<?php wp_footer() ?>
<script>
  if (window.single) {
    popupProject('inline', single.template)
  }
</script>
<style>
    .swiper-wrapper{
        height: auto
    }
</style>
</body>
</html>

