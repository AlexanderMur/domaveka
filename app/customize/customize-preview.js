theme_mods = [
	'header_button_text',
	'header_phone_number',
	'banner_image',
	'banner_title',
	'special_offer_bg',
	'special_offer_text',
	'about_us_image',
	'about_us_text',
	'about_us_why',
	'about_us_lead',
	'about_us_card0_img',
	'about_us_card0_text',
	'about_us_card1_img',
	'about_us_card1_text',
	'about_us_card2_img',
	'about_us_card2_text',
	'about_us_card3_img',
	'about_us_card3_text',
	'about_us_card4_img',
	'about_us_card4_text',
	'about_us_card5_img',
	'about_us_card5_text',
	'index_banner_title',
	'circles_title',
	'circle0_image',
	'circle0_title',
	'circle0_text',
	'circle1_image',
	'circle1_title',
	'circle1_text',
	'circle2_image',
	'circle2_title',
	'circle2_text',
	'circle3_image',
	'circle3_title',
	'circle3_text',
	'circle4_image',
	'circle4_title',
	'circle4_text',
	'circle5_image',
	'circle5_title',
	'circle5_text',
	'circle6_image',
	'circle6_title',
	'circle6_text',
	'circle7_image',
	'circle7_title',
	'circle7_text',
	'circle8_image',
	'circle8_title',
	'circle8_text',
	'circle9_image',
	'circle9_title',
	'circle9_text',
	'circle10_image',
	'circle10_title',
	'circle10_text',
	'circle11_image',
	'circle11_title',
	'circle11_text',
	'column0_image',
	'column0_text',
	'column1_image',
	'column1_text',
	'footer_logo',
	'company_info',
	'footer_button_text',
	'copyright',
	'copyright_bg',
	'phone_number',
	'map_title'
]
bind = function(theme_mod){
	console.log(theme_mod)
	wp.customize(theme_mod,function(e){
		e.bind(function(b){
			console.log('.preview_'+theme_mod)
			elems = $('.preview_'+theme_mod)
			console.log('.preview_'+theme_mod)
			firstElem = document.querySelector('.preview_'+theme_mod)
			if(firstElem){
				if(firstElem.tagName == 'SPAN'){
					elems.html(b)
				} else if( firstElem.tagName == 'IMG'){
					elems.attr('src',b)
				} else {
					firstElem.style.backgroundImage = 'url('+b+')'
				}
			} else {
				console.log('.preview_'+theme_mod,'elem not found!')
			}
			
		})
	})
}
for (var i = theme_mods.length - 1; i >= 0; i--) {
	theme_mod = theme_mods[i]
	bind(theme_mod)
}