jQuery(function($){
    /*
     * действие при нажатии на кнопку загрузки изображения
     * вы также можете привязать это действие к клику по самому изображению
     */
    $('.upload_image_button').click(function(){
        frame = wp.media({
            title : 'Загрузка изображения',
            multiple : true,
            library : { type : 'image' },
            button : { text : 'Загрузить' }
        });

        getSelection = function() {
            return frame.state().get('selection').toJSON();
        }
        var button = $(this);

        frame.on('select', function() {
            attachs = getSelection();
            for (var i = attachs.length - 1; i >= 0; i--) {
                attach = attachs[i];

                $('.galery-container').append(`
                    <div class="galery-elem">     
                       <img src="` + attach['url'] +  `" width="auto" height="100px" />
                       <span style="position:absolute; top:0;left:0">
                           <button onclick="DeliteEl(this); return false;" class="remove_image_button_new button">&times;</button>
                       </span>
                       <input type="hidden" value="`+ attach['id'] + `" name="imgs[]"/>
                    </div>
                    `);                
                console.log(attach);
            };    
        });

        frame.open();
        return false;    
    });

    DeliteEl = function (e) {
        el = $(e);
        $(el).closest('.galery-elem').remove();
    };


      $( ".galery-container" ).sortable();


});