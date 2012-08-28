<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists('youtube_player')) {

    function youtube_player($settings = array()) {
        $width = $settings['width'];
        $height = $settings['height'];
        $src = $settings['src'];
        $video = <<<VID
   <object width="$width" height="$height">
                <param name="movie"
                       value="http://www.youtube.com/v/$src?version=3&theme=light&color=white"></param>
                <param name="allowScriptAccess" value="always"></param>
                <param name="allowFullScreen" value="true"></param>
                <embed src="http://www.youtube.com/v/$src?version=3&theme=light&color=white"
                       type="application/x-shockwave-flash"
                       allowscriptaccess="always"
                       width="$width" height="$height"></embed>
            </object>
VID;
        return $video;
    }

}
?>
