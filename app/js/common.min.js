get = function(href){
	var xhr = new XMLHttpRequest()
	xhr.open('GET',href,true)
	xhr.send()
	return xhr
}
post = function(href,data){
	var xhr = new XMLHttpRequest();
	xhr.open('POST', href, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.send(data);
	return xhr
}
hidePopup = function(){
	layer.hide()
	$('body').removeClass('single-show')
	$('body').removeClass('pointer')
	setTimeout(function(){
		$('.popup-wrapper').html('')
	},300)
}
showPopup = function(){
	layer.show()
	$('body').addClass('single-show')
}
pushState = function(obj,str,url){

	history.pushState(obj,str,url.replace(/https:|http:/g,location.protocol ))
}
fetchAndInsert = function(href){
	if(href == domaveka.home_url){
		$.magnificPopup.close()
		return
	}
	popupProject('ajax',href)
}
loadProject = function(id){
	$('.project-gallery').addClass('loading')
	get(domaveka.ajax_url + '/?action=load_project&id='+id).onload = function(){
		$('.project-gallery').html(this.response)
		$('.project-gallery').removeClass('loading')
	}
}
layer = {
	show: function(){
		self = this
		$('.popup-bg').addClass('layer-show')[0].onclick = function(){
			self.hide()
		}
	},
	hide: function(){
		$('.popup-bg').removeClass('layer-show')
	}
}
mySlider = {
	curTarget: '',
	init: function(slider,params){
		self = this

		var slider = slider.lightSlider(params);
		slider.on('mousedown',function(e){
			self.curTarget = this
			startX = e.pageX
			$(this).data('down',true)
			this.onmousemove = function(e){
				if(startX != e.pageX && !$(this).data('moved') && $(this).data('down')){
					$(this).trigger('dragstart')
					$('body').addClass('drag')
					$(this).data('moved',true)
				}
			}
		})
		document.onmouseup = function(e){				
			if(self.curTarget){
				if($(self.curTarget).data('moved')){
					$(self.curTarget).trigger('dragEnd')
					$('body').removeClass('drag')
					$(self.curTarget).data('moved',false)
				}
				$(self.curTarget)[0].onmousemove = null
				$(self.curTarget).data('down',false)
				self.curTarget = ''
			}
		}
		slider.on('mouseup','.lslide',function(){
			if(!$(this).parent().data('moved') && $(this).parent().data('down')){
				$(this).trigger('itemClick',this)
				
			}
		})
		return slider
	},
	popupSliderInit: function(){
		var slider = this.init($('#lightSlider'),{
			loop: false,
			pager: false,
			autoWidth: true,
			gallery: true,
			marginSlide: 0
		}).on('itemClick',function(e,item){
			viewImg = document.getElementById('viewImg')
			viewImg.style.backgroundImage = 'url('+item.dataset.full+')'
		})
		$('.prev').click(function(){
			slider.goToPrevSlide()
		})
		$('.next').click(function(){
			slider.goToNextSlide()
		})
	}
}
function truncate(n, len) {
    var ext = n.substring(n.lastIndexOf(".") + 1, n.length).toLowerCase();
    var filename = n.replace('.' + ext,'');
    if(filename.length <= len) {
        return n;
    }
    filename = filename.substr(0, len) + (n.length > len ? '...' : '');
    return filename + '.' + ext;
};
contactFormFileInit = function(){
	$('.wpcf7-form input[type=file]').each(function(){
		this.onchange = function(){
			if(this.files[0]) {

				this.parentNode.previousElementSibling.innerHTML = truncate(this.files[0].name,7)
			} else  {
				this.parentNode.previousElementSibling.innerHTML = 'Прикрепить файл'
			}	
		}
	})
}
openCirclePopup = function(title,mes){
	elem = $('.card-circles .card-description-wraper')
	elem.find('.text-up').html(title)
	elem.find('.descr-text').html(mes)
	elem.fadeIn()
	elem.find('.close-popup')[0].onclick = function(e){
		e.stopPropagation()
		e.preventDefault()
		closeCirclePopup()
	}
}
closeCirclePopup = function(){
	$('.card-circles .card-description-wraper').fadeOut()
}
popupProject = function(type,item){
	$.magnificPopup.open({
		items:{
			type:type,
			src: type == 'inline' && item
		},		
		ajax: type != 'inline' && {
			settings:{
				url: domaveka.ajax_url + '?action=get_project',
				type: 'POST',
				data: {
					link: item
				}
			}
		},
	    closeOnBgClick: false,
		mainClass: 'mfp-fade',
		removalDelay: 100,
		callbacks: {
			open: function() {
				var init = function(){
					classList = this.container[0].classList
					if(classList.contains('mfp-s-ready')){
						popupInit()
					} else if(!classList.contains('mfp-s-error')){
						setTimeout(init)
					}
				}.bind(this)
				init()
				el = this
		        this._mousedownHandler = event => {
		            this.mousedownOutside = event.target.contains(this.content[0]);
		        };
		        this._mouseupHandler = event => {
		        	if(this.mousedownOutside){
		        		this.close()
		        	}
		        }
		        $(document).on('mousedown', this._mousedownHandler);
		        $(document).on('mouseup', this._mouseupHandler);
			},
			close: function() {
				history.pushState({},'',domaveka.home_url)
			    $(document).off('mousedown', this._mousedownHandler);
		        $(document).off('mouseup', this._mouseup);
			}
        }
	})
}
popupInit = function(){
	galleryThumbs = {
		virtualSize: 0
	}
	galleryTop = new Swiper('.gallery-top', {
	  spaceBetween: 10,
	  // effect: 'coverflow',
	  // preloadImages: false,
	  lazy: {
	    loadPrevNext: true,
	    loadPrevNextAmount: 2,
	  },
	  on: {			    
	    slideChangeTransitionStart: function(){
	    	galleryThumbs.select(this.activeIndex)
	    },
	  },
	  navigation: {
	    nextEl: '.next',
	    prevEl: '.prev',
	  },
	});
	galleryThumbs = new Swiper('.gallery-thumbs', {
	  freeMode: true,
	  spaceBetween: 10,
	  slidesPerView: 4,
	  touchRatio: 1,
	  slideToClickedSlide: true,
	  on: {
	  	init: function(){
	  		setTimeout(function(){
	  			this.select(0)
	  		}.bind(this))
	  	},
	  	tap: function(){
	  		console.log(this.snapSlides)
	  		if(this.clickedSlide){
	  			this.select(this.clickedIndex - 1)
	  		}
	  	},

	  },
      roundLengths: true,      
      breakpoints: {
          480: {
              slidesPerView: 2,
          },
          768: {
              slidesPerView: 3,
          },
      },
	});
	galleryThumbs.select = function(index){
		console.log(this)
		$('.border')[0].style.transform = 'translate3d('+this.slides[index].offsetLeft+'px,0,0)'
		$('.border')[0].style.width = this.slides[index].offsetWidth+'px'
		galleryTop.slideTo(index)
  		$(this.slides).removeClass('selected')
  		$(this.slides[index]).addClass('selected')
  		this.slideTo(index - 1)			
	}
	if(window.wpcf7){
		wpcf7.initForm($(".popup-view .wpcf7-form"))
		contactFormFileInit()
	}
}
$(function() {
	if(window.wpcf7){
		contactFormFileInit()
	}

		
	overlayDown = false
	window.onpopstate = function(){
		fetchAndInsert(location.href)
	}
	$(document).ready(function($){
		// $('.project-loop').on('click','.openProj',function(e){
		// 	pushState({},'',this.href)
		// 	fetchAndInsert(this.href)
		// 	e.preventDefault()
		// })
		$('.popup-wrapper').mousedown(function(e){
			if(this == e.target && e.pageX < this.scrollWidth){
				overlayDown = true
			}
		})
		$('.popup-wrapper').mouseup(function(e){
			if(this == e.target && overlayDown){
				pushState({},'',domaveka.home_url)
				hidePopup()
				overlayDown = false
			} else {
				overlayDown = false
			}
		})
		$('.popup-wrapper').mousemove(function(e){
			if(this == e.target){
				$('body').addClass('pointer')
			} else {
				$('body').removeClass('pointer')
			}
		})

		$(document).on('click','.close-popup',function(){
			$.magnificPopup.close()
		})
		if($('body').hasClass('single-show')){
			mySlider.popupSliderInit()
		}

		$('.card-circles').on('click','.card',function(e){
			e.stopPropagation()
			e.preventDefault()
			title = $(this).find('.card-bottom').html()
			text = $(this).find('.card-text').html()
			openCirclePopup(title,text)
		})


		$('.btn-contact').click(function(e){
			e.preventDefault()
			layer.show()
			setTimeout(function(){
				$('.contact-form-footer').fadeIn(250)
			})
		})
		$(document).click(function(e){
			elem = $('.contact-form-footer')

			if(elem.css('display') == 'block' && !elem[0].contains(e.target)){
				elem.fadeOut()
				layer.hide()
			}
		})
		$('.popup-bg, .close-popup').click(function(){
			$('.contact-form-footer').fadeOut(250)
			layer.hide()
		})

		$('#completed-projects').on('click','.product-block',function(){
			loadProject(this.dataset.id)
		})
		$('.loadProjects').click(function(){
			this.disabled = true
			button = this
			get(domaveka.ajax_url + '/?action=load_projects&type=' + this.dataset.type+'&paged='+this.dataset.nextpage).onload = function(){
				button.previousElementSibling.insertAdjacentHTML('beforeend',this.response)
				button.dataset.nextpage++
				button.disabled = false
				if(button.dataset.nextpage > button.dataset.limit){
					button.remove()
				}
			}
		})
		$('.loadPorts').click(function(){
			this.disabled = true
			button = this
			get(domaveka.ajax_url + '/?action=load_ports&paged='+this.dataset.nextpage).onload = function(){
				button.insertAdjacentHTML('beforeBegin',this.response)
				button.dataset.nextpage++
				button.disabled = false
				if(button.dataset.nextpage > button.dataset.limit){
					button.remove()
				}
			}
		})


        function getTransform(el) {
            var values = el.style.transform.split(/\w+\(|\);?/);
            if (!values[1] || !values[1].length) {
                return [];
            }
            return values[1].split(/,\s?/g);
        }

		mySwiper = new Swiper(".revs", {
		    slidesPerView: 2,
		    autoHeight: true,
		    slidesPerGroup: 2,
		    centerSlider: true,
		    breakpoints: {
		        966: {
		            slidesPerView: 1,
		            slidesPerGroup: 1,
		        },
		    },
		    pagination: {
		        el: '.pagination',
		        clickable: true
		    },

		})
		
		$('.project-loop').on('click','.openProj',function(e){
			popupProject('ajax',this.href)
			history.pushState({},'',this.href)
			return false
		})

	})


	var h_hght = $('.header')[0].getBoundingClientRect().height; // высота шапки
	var top_menu = '#top-menu';
	curView = ''
	$(document).ready(function () {

		// при изменении окна браузера, убераем/добавляем меню
		function windowSize(){
		    if ($(window).width() > '768'){
		        $('#top-menu ul').css('display', 'flex');
		    } else {
		        $('#toggle-menu').removeClass('is-active');
		        $('#top-menu ul').css('display', 'none');
		    }
		}

		// изменение активной ссылки при прокрутке страницы


		// при изменении окна браузера, убераем/добавляем меню
		$(window).on('load resize',windowSize);

		// изменение активной ссылки при прокрутке страницы

		// плавный переход
		$('nav a').on('click', function(e){
		    e.preventDefault();
		    document.onscroll = function(){return false}
		    if ($('#toggle-menu').hasClass('is-active')) {
		    	$('#toggle-menu').removeClass('is-active');
		    	$('#top-menu ul').slideToggle();
		    }
		    var t = 1000;
		    var d = $(this).attr('href');
		    $('html,body').stop().animate({ scrollTop: $(d).offset().top - 120 }, t, function() {
		    	document.onscroll = null
		    });
		});

		$('#toggle-menu').on('click', function(e){
			e.preventDefault();
			$(this).toggleClass('is-active');
			$('#top-menu ul').slideToggle();
		});

	});
	domaveka.ajax_url = domaveka.ajax_url.replace(/https:|http:/g,location.protocol )
	domaveka.home_url = domaveka.home_url.replace(/https:|http:/g,location.protocol )
});
