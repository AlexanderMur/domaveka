jQuery(document).ready(function($){
	frame = wp.media({
		title : 'титл',
		multiple : true,
		library : { type : 'image' },
		button : { text : 'кнопка' }
	})
	frame.on('select',function(){
		imgs = frame.state().get('selection').toJSON()
		console.log(imgs)
		for (var i = imgs.length - 1,text=''; i >= 0; i--) {
			img = imgs[i]
			text += '<img src="'+img.url+'" alt="" />'
			text += '<input type="hidden" name="imgs[]" value="'+img.id+'"/>'
		}
		imgContainer.innerHTML = text
	})

})