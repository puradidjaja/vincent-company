function init_wysiwyg(){
    $("#wysiwygImage").fancybox({

        'width'				: '80%',

        'height'			: '80%',

        'hideOnOverlayClick': false, 

        'autoScale'			: true,

        'transitionIn'		: 'elastic',

        'transitionOut'		: 'elastic',

        'type'				: 'iframe',

        'href' : site_url+'admin/image/upload_form/1/1'

    });
    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        theme : 'ribbon',
        content_css : site_url+'assets/js/tiny_mce/themes/ribbon/skins/default/content.css',
  
        convert_urls : false, 
        plugins : 'bestandsbeheer,tabfocus,advimagescale,loremipsum,image_tools,embed,tableextras,style,table,inlinepopups,searchreplace,contextmenu,paste,wordcount,advlist,autosave',
        inlinepopups_skin : 'ribbon_popup',
    

        theme_ribbon_tab1 : {
            title : "Start",
            items : [
            ["paste"], 
            ["justifyleft,justifycenter,justifyright,justifyfull",
            "bullist,numlist",
            "|",
            "bold,italic,underline",
            "outdent,indent", "hr"], 
            ["paragraph", "heading1", "heading2", "heading3"],
            ["embed"],
            ["link", "|", "unlink", "|", "anchor"],
            ]
        },
                                      
            
        theme_ribbon_tab2 : {  
            title : "Image",
            bind :  "img",
            items : [["image_float_left", "image_float_right", "image_float_none"],
            ["image_alt"],
            ["image_width_plus", "|", "image_width_min", "|", "image_width_original", "|", "image_remove"],     
            ]
        }


    });


}
