<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('like_comment')) {

    function like_comment($config = array()) {
        $url=$config['url'];
        $width=$config['width'];
        $fb=<<<BLA
   <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-href="$url" 
                     data-send="false" data-layout="button-count" 
                     data-width="$width" data-show-faces="true">
                </div>
                <div class="fb-comments" data-href="$url" 
                     data-num-posts="100" data-width="$width" data-colorscheme="dark">
                </div>
BLA;
        return $fb;
        
    }

}
