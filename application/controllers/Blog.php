<?php

  class Blog extends CI_Controller{

    public function index(){
      $config['total_rows'] = $this->Blog_Model->get_all_blog_count();
      $data['total_count'] = $config['total_rows'];
      $config['suffix'] = '';

      if($config['total_rows'] > 0) {
        $page_number = $this->uri->segment(3);
        $config['base_url'] = base_url().'blog/index';
        if(empty($page_number)){
          $page_number = 1;
        }

        $offset = ($page_number - 1) * $this->pagination->per_page;
        $this->Blog_Model->setPageNumber($this->pagination->per_page);
        $this->Blog_Model->setOffset($offset);

        $this->pagination->cur_page = $offset;
        $this->pagination->initialize($config);

        $data['page_links'] = $this->pagination->create_links();
        $data['blog_post'] = $this->Blog_Model->blog_post();
     }

      if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
      $this->load->view('blog/blog', $data);
      $this->load->view('navigation/footer');
    }

    public function detail($title){
      $data['detail'] = $this->Blog_Model->blog_detail($title);
      $data['detail_comment'] = $this->Blog_Model->blog_comment($title);

      $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|min_length[5]');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
      $this->form_validation->set_rules('comment', 'Comments', 'trim|required');

      $form_valid = $this->form_validation->run();
			$submit_comment = $this->input->post('commentBtn');

      if($form_valid == FALSE){
        if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

        $this->load->view('navigation/nav', $data);
        $this->load->view('blog/blog_detail', $data);
        $this->load->view('navigation/footer');
      }else if(isset($submit_comment)){
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $comment = $this->input->post('comment');
        $time = time();
        $date = date('Y-m-d H:i:s');

        $comment_post_array = array(
          'blog_title' => $title,
          'fullname' => $fullname,
          'email' => $email,
          'comment' => $comment,
          'created_time' => $time,
          'created_date' => $date
        );

        $comment_post = $this->Blog_Model->insert_comment_blog_post($comment_post_array);

        if($comment_post){
          redirect('blog/detail/'.strtolower($title));
        }else{
          $statusMsg = '<div class="alert alert-danger>Comment Failed</div>';
          $this->session->set_flashdata('msgError', $statusMsg);
          $this->load->view('navigation/nav', $data);
          $this->load->view('blog/blog_detail', $data);
          $this->load->view('navigation/footer');
        }

      }
    }

  }

?>
