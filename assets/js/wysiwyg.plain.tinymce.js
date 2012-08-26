function init_plain(){
    tinyMCE.init({
      
    editor_selector : "mceEditor",
    theme : "advanced",
    skin : "o2k7",
    mode : "textareas",
    plugins : "fullpage",
    height: 300,
    width : 600,
    theme_advanced_buttons3_add : "fullpage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_resizing : true


});
}