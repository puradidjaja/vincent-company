<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Statistic
 *
 * @author satriaprayoga
 */
class Statistic {

    var $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    public function log_activity() {
        $data['ip'] = $this->ci->input->ip_address();
        $data['section'] = $this->ci->router->class;
        $data['action'] = $this->ci->router->method;
        $data['uri'] = uri_string();
        $data['date_time'] = date('Y-m-d h:i:s T');
        //kalo admin ga usah di itung kalee
        if (strncmp($data['uri'], 'admin', strlen('admin')) != 0 && strncmp($data['uri'], 
                'member', strlen('member')) != 0) {

            if (!isset($_COOKIE['page_visit'])) {
                setcookie('page_visit', $data['ip'], time() + 86400);
                $this->ci->load->model('statistic_model');
                $this->ci->statistic_model->create($data);
                $out = array();
                if (($match = preg_match_all('/article\/(.*)/', $data['uri'], $out, PREG_SET_ORDER)) > 0) {
                    $link = $out[0][1];
                    $this->ci->load->model('article_model');
                    $article = $this->ci->article_model->find_by_link($link);
                    if (!empty($article)) {
                        if (!isset($_COOKIE['article_show'])) {
                            setcookie('article_show', $data['ip'], time() + 86400);
                        }

                        $article_id = $article->id;
                        if (!isset($_COOKIE['article_show'][$article_id])) {
                            $count = $article->counter;
                            $this->article_model->update($article_id, array('counter' => $count + 1));
                            setcookie('article_show[' . $article_id . ']', 'read', time() + 86400);
                        }
                    }
                }
            }
        }
    }

}
