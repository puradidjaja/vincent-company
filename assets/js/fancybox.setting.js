/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function init_fancybox(uri){
    $("#setImage").fancybox({

            'width'				: '60%',

            'height'			: '80%',

            'hideOnOverlayClick': false, 

            'autoScale'			: false,

            'transitionIn'		: 'elastic',

            'transitionOut'		: 'elastic',

            'type'				: 'iframe',

            'href' : uri

        });
        $("#logo_thumb").change(function () {
            $('#preview-thumb').html("<img src='"+$('#logo_thumb').val()+"' class='thumbnail'/>");
        }).change();
}