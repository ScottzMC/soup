<?php

  class Register extends CI_Controller{

    public function index(){
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');

      $form_valid = $this->form_validation->run();
			$submit_register = $this->input->post('registerBtn');

      if($form_valid == FALSE){
        if (!$this->cart->contents()){
          $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
      }else{
          $data['message'] = $this->session->flashdata('message');
      }

      $this->load->view('navigation/nav', $data);
        $this->load->view('account/register');
        $this->load->view('navigation/footer');
			}else if(isset($submit_register)){
        $email = $this->input->post('email');
				$password = $this->input->post('password');
        $hashed_password = $this->bcrypt->hash_password($password);
        $status = "User";
        $time = time();
        $date = date('Y-m-d H:i:s');

        $add_user_array = array(
          'email' => $email,
          'password' => $hashed_password,
          'status' => $status,
          'subscribe' => 'Unsubscribed',
          'created_time' => $time,
          'created_date' => $date
        );

        $add_user = $this->Model->create_user($add_user_array);
        $add_checkout_details = $this->Model->create_checkout_details($email, $time, $date);

        if($add_user && $add_checkout_details){
          $statusMsg = '<div class="alert alert-success>Registration Was Successful</div>';
          $this->session->set_flashdata('msgSuccess', $statusMsg);
          redirect('login');
        }else{
          $statusMsg = '<div class="alert alert-danger>Registration Failed</div>';
          $this->session->set_flashdata('msgError', $statusMsg);
          $this->load->view('navigation/nav', $data);
          $this->load->view('account/register');
          $this->load->view('navigation/footer');
        }
      }
    }

  }

?>
