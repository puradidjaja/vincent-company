<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author satriaprayoga
 */
class Article extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('comment_model');
        $this->load->helper(array('fb', 'twitter', 'youtube'));
    }

    public function index() {
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 6;
        $article_data = $this->article_model->page($per_page, $offset);
        $total = count($this->article_model->find_all());
        $this->load->library('pagination');
        $data['articles'] = $article_data;
        $config = array();
        $config['base_url'] = site_url('article/index');
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = '&larr; First';
        $config['last_link'] = 'Last &rarr;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 4;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $this->view('article/index', $data);
    }

    public function show($link) {
        $article = $this->article_model->find_by_link($link);
        $comments = $this->comment_model->find_by_article_id($article->id);
        $data['article'] = $article;
        $data['comments'] = $comments;
        if (!isset($_COOKIE['article_show'])) {
            setcookie('article_show', $this->input->ip_address(), time() + 86400);
        }

        $article_id = $article->id;
        if (!isset($_COOKIE['article_show'][$article_id])) {
            $count = $article->counter;
            $this->article_model->update($article_id, array('counter' => $count + 1));
            setcookie('article_show[' . $article_id . ']', 'read', time() + 86400);
        }
        $this->view('article/detail', $data);
    }

    public function post_comment($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() === FALSE) {
            $article = $this->article_model->find_by_id($id);
            $comments = $this->comment_model->find_by_article_id($id);
            $data['article'] = $article;
            $data['comments'] = $comments;
            $data['errors'] = $this->form_validation->error();
            $this->load->view('news', $data);
        } else {
            $comment_data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'content' => $this->input->post('content'),
                'article_id' => $id,
                'comment_date' => date('Y-m-d h:i:s A')
            );
            $this->comment_model->create($comment_data);
            $article = $this->article_model->find_by_id($id);
            redirect(site_url('article/' . $article->link));
        }
    }

}
