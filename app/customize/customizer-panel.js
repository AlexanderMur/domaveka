( function( $ ) {
    wp.customizerCtrlEditor = {

        init: function() {

            $(window).load(function(){

                $('textarea.wp-editor-area').each(function(){
                    var tArea = $(this),
                        id = tArea.attr('id'),
                        editor = tinyMCE.get(id),
                        setChange,
                        content;

                    if(editor){
                        editor.onChange.add(function (ed, e) {
                            ed.save();
                            content = editor.getContent();
                            clearTimeout(setChange);
                            setChange = setTimeout(function(){
                                tArea.val(content).trigger('change');
                            });
                        });
                        editor.onKeyDown.add(function (ed, e) {
                            ed.save();
                            clearTimeout(setChange);
                            setChange = setTimeout(function(){
                                tArea.val(editor.getContent()).trigger('change');
                            });
                        });
                    }

                    tArea.css({
                        visibility: 'visible'
                    })[0].onkeyup = function(){
                        content = tArea.val();
                        clearTimeout(setChange);
                        setChange = setTimeout(function(){
                            content.trigger('change');
                        });
                    };
                });
            });
        }

    };

    wp.customizerCtrlEditor.init();

} )( jQuery );