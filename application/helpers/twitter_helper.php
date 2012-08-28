<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!function_exists('tweet'))
{
    function tweet($config = array()) {
    $user=$config['user'];
    $shell_bg=$config['shell_bg'];
    $shell_color=$config['shell_color'];
    $tweets_bg=$config['tweets_bg'];
    $tweets_color=$config['tweets_color'];
    $link=$config['link'];
    $tweet = <<<BLA
<!--/* OpenX Interstitial or Floating DHTML Tag v2.8.7 */-->
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
                <script>
                    user='$user';
                    new TWTR.Widget({
                        version: 2,
                        type: 'profile',
                        rpp: 4,
                        interval: 30000,
                        width:300,
                        height: 200,
                        theme: {
                            shell: {
                                background: '$shell_bg',
                                color: '$shell_color'
                            },
                            tweets: {
                                background: '$tweets_bg',
                                color: '$tweets_color',
                                links: '$link'
                            }
                        },
                        features: {
                            scrollbar: true,
                            loop: false,
                            live: false,
                            behavior: 'all'
                        }
                    }).render().setUser(user).start();
                </script>
BLA;
    return $tweet;
}
    
}
