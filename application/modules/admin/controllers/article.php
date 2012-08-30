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
class Article extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('comment_model');
    }

    public function index() {
        $uri = $this->uri->segment(4);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 10;
        $article_data = $this->article_model->page($per_page, $offset);
        $total = count($this->article_model->find_all());
        $this->load->library('pagination');
        $data['articles'] = $article_data;
        $config = array();
        $config['uri_segment'] = '4';
        $config['base_url'] = site_url('admin/article/index');
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

    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|is_unique[article.title]');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean');
        $this->form_validation->set_rules('content', 'Content', 'trim|xss_clean');
        $this->form_validation->set_rules('summary', 'Summary', 'trim|xss_clean');
        $data['action'] = 'admin/article/create';
        if ($this->form_validation->run() == FALSE) {
            $article_data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'summary' => $this->input->post('summary'),
                'image_url' => $this->input->post('image_url'),
                'thumb' => $this->input->post('thumb'),
                'tags' => $this->input->post('tags'),
                'is_linked' => $this->input->post('linked'),
                'status' => $this->input->post('status')
            );
            $data['article_data'] = $article_data;
            $this->view('article/form', $data);
        } else {
            $article_data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'image_url' => $this->input->post('image_url'),
                'thumb' => $this->input->post('thumb'),
                'summary' => $this->input->post('summary'),
                'tags' => $this->input->post('tags'),
                'is_linked' => $this->input->post('linked'),
                'status' => $this->input->post('status'),
                'link' => $this->_strip($this->input->post('title')) . '-' . date('Y-m-d'),
                'create_date' => date('Y-m-d h:i:s T'),
                'update_date' => date('Y-m-d h:i:s T'),
                'author' => 'admin'
            );
            $id = $this->article_model->create($article_data);
            redirect(site_url('admin/article/detail/' . $id));
        }
    }

    public function edit($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean');
        $this->form_validation->set_rules('content', 'Content', 'trim|xss_clean');
        $this->form_validation->set_rules('summary', 'Summary', 'trim|xss_clean');
        $article = $this->article_model->find_by_id($id);
        $data['action'] = 'admin/article/edit/' . $id;
        if ($this->form_validation->run() == FALSE) {
            $article_data = array(
                'title' => $article->title,
                'content' => $article->content,
                'summary' => $article->summary,
                'tags' => $article->tags,
                'is_linked' => $article->is_linked,
                'status' => $article->status,
                'image_url' => $article->image_url,
                'thumb' => $article->thumb,
            );
            $data['article_data'] = $article_data;
            $this->view('article/form', $data);
        } else {
            $article_data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'image_url' => $this->input->post('image_url'),
                'thumb' => $this->input->post('thumb'),
                'summary' => $this->input->post('summary'),
                'tags' => $this->input->post('tags'),
                'is_linked' => $this->input->post('linked'),
                'status' => $this->input->post('status'),
                'update_date' => date('Y-m-d h:i:s T')
            );
            $this->article_model->update($id, $article_data);
            redirect(site_url('admin/article/detail/' . $id));
        }
    }

    public function detail($id) {
        $article = $this->article_model->find_by_id($id);
        $comments = $this->comment_model->find_by_article_id($id);
        $data['article'] = $article;
        $data['comments'] = $comments;
        $this->view('article/detail', $data);
    }

    public function delete_comment($id) {
        $article_id=  $this->comment_model->find_by_id($id)->article_id;
        $this->comment_model->delete($id);
        redirect(site_url('admin/article/detail/' . $article_id));
    }

    public function delete($id) {
        $this->article_model->delete($id);
        redirect(site_url('admin/article'));
    }

}
