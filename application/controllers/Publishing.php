<?php 

	class Publishing extends CI_Controller{ 

		// Blog 

		public function dashboard(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Publishing'){
			   $data['order_count_status'] = $this->Publishing_Model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Publishing_Model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Publishing_Model->display_all_food_orders_count_by_delivered();

			   $data['all_blogs'] = $this->Publishing_Model->display_all_blogs(); 

			   $this->load->view('publishing/navigation/nav');
			   $this->load->view('publishing/dashboard', $data);
			   $this->load->view('publishing/navigation/footer', $data);
			}else{
				redirect('home');
			}
		}

		public function add_blog(){
			$data['order_count_status'] = $this->Publishing_Model->display_all_food_orders_count_by_orders();
			$data['order_count_delivering'] = $this->Publishing_Model->display_all_food_orders_count_by_delivering();
			$data['order_count_delivered'] = $this->Publishing_Model->display_all_food_orders_count_by_delivered();

			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			$this->form_validation->set_rules('title', 'Blog Title', 'trim|required');
      		$this->form_validation->set_rules('body', 'Blog Body', 'trim|required');

      		$form_valid = $this->form_validation->run();
			$submit_upload = $this->input->post('uploadBtn');

			if(!empty($email) && $user_status == 'Publishing'){
				if($form_valid == FALSE){
				  $this->load->view('publishing/navigation/nav');
			   	  $this->load->view('publishing/dashboard_add_blog');
			   	  $this->load->view('publishing/navigation/footer', $data);	
				}else if(isset($submit_upload)){
					$title = $this->input->post('title');
					$str_title = str_replace(' ', '-', $title);

					$body = $this->input->post('body');

					$time = time();
        			$date = date('Y-m-j H:i:s');

        			$files = $_FILES;
		          //$images = array();
		          $cpt = count($_FILES['fileToUpload']['name']);
		              for($i=0; $i<$cpt; $i++){
		              $_FILES['fileToUpload']['name']= $files['fileToUpload']['name'][$i];
		              $_FILES['fileToUpload']['type']= $files['fileToUpload']['type'][$i];
		              $_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'][$i];
		              $_FILES['fileToUpload']['error']= $files['fileToUpload']['error'][$i];
		              $_FILES['fileToUpload']['size']= $files['fileToUpload']['size'][$i];

		              $config = array(
		                  'upload_path'   => "./uploads/blog/",
		                  'allowed_types' => "gif|jpg|png|jpeg",
		                  'overwrite'     => TRUE,
		                  'max_size'      => "5000",  // Can be set to particular file size
		                  //'max_height'    => "768",
		                  //'max_width'     => "1024"
		              );

		              $this->load->library('upload', $config);
		              $this->upload->initialize($config);

		              $this->upload->do_upload('fileToUpload');
		              $fileName = $_FILES['fileToUpload']['name'];
		              $images[] = $fileName;
		          }

		          $add_blog_array = array(
		          	'title' => $str_title,
		          	'body' => $body,
		          	'image' => $fileName,
		          	'created_time' => $time,
		          	'created_date' => $date
		          );

		          $add_blog = $this->Publishing_Model->insert_blog_post($add_blog_array);

		          if($add_food){
		            redirect('admin/blog');
		          }else{
		            $msgError = '<div class="alert alert-danger>Upload Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('publishing/navigation/nav');
			   	  	$this->load->view('publishing/dashboard_add_blog');
			   	  	$this->load->view('publishing/navigation/footer', $data);
		          }

				}
			}else{
			   redirect('home');
			}
		}

		public function edit_blog($blog_title){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			$this->form_validation->set_rules('edit_title', 'Blog Title', 'trim|required');
      		$this->form_validation->set_rules('edit_body', 'Blog Body', 'trim|required');

      		$form_valid = $this->form_validation->run();
			$submit_edit = $this->input->post('editBtn');

			if(!empty($email) && $user_status == 'Publishing'){
			   $data['order_count_status'] = $this->Publishing_Model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Publishing_Model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Publishing_Model->display_all_food_orders_count_by_delivered();

			   $data['blog_title'] = $this->Publishing_Model->display_blog_by_title($blog_title);
			   
			   if($form_valid == FALSE){
			   	$this->load->view('publishing/navigation/nav');
			    $this->load->view('publishing/dashboard_edit_blog', $data);
			    $this->load->view('publishing/navigation/footer', $data);
			   }else if(isset($submit_edit)){
			   	    $title = $this->input->post('edit_title');
					$str_title = str_replace(' ', '-', $title);

					$body = $this->input->post('edit_body');

					$time = time();
        			$date = date('Y-m-j H:i:s');

        			$files = $_FILES;
		          //$images = array();
		          $cpt = count($_FILES['fileToUpload']['name']);
		              for($i=0; $i<$cpt; $i++){
		              $_FILES['fileToUpload']['name']= $files['fileToUpload']['name'][$i];
		              $_FILES['fileToUpload']['type']= $files['fileToUpload']['type'][$i];
		              $_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'][$i];
		              $_FILES['fileToUpload']['error']= $files['fileToUpload']['error'][$i];
		              $_FILES['fileToUpload']['size']= $files['fileToUpload']['size'][$i];

		              $config = array(
		                  'upload_path'   => "./uploads/blog/",
		                  'allowed_types' => "gif|jpg|png|jpeg",
		                  'overwrite'     => TRUE,
		                  'max_size'      => "5000",  // Can be set to particular file size
		                  //'max_height'    => "768",
		                  //'max_width'     => "1024"
		              );

		              $this->load->library('upload', $config);
		              $this->upload->initialize($config);

		              $this->upload->do_upload('fileToUpload');
		              $fileName = $_FILES['fileToUpload']['name'];
		              $images[] = $fileName;
		          }

		          $update_blog_array = array(
		          	'title' => $str_title,
		          	'body' => $body,
		          	'image' => $fileName,
		          	'created_time' => $time,
		          	'created_date' => $date
		          );

		          $update_blog = $this->Publishing_Model->update_blog_post($update_blog_array, $blog_title);

		          if($update_blog){
		            redirect('admin/blog');
		          }else{
		            $msgError = '<div class="alert alert-danger>Update Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('publishing/navigation/nav');
			   	  	$this->load->view('publishing/dashboard_edit_blog', $data);
			   	  	$this->load->view('publishing/navigation/footer', $data);
		          }
			   }
			}else{
			   redirect('home');
			}
		}

		public function delete_blog(){
		$id = $this->input->post('del_id');
	    $this->Publishing_Model->delete_blog_post($id);

	    redirect('publishing/dashboard');
	  }

		// End of Blog

	  // Newsletter 

	  public function newsletter(){
	  	$email = $this->session->userdata('uemail');
		$user_status = $this->session->userdata('ustatus');

		if(!empty($email) && $user_status == 'Publishing'){
		   $data['order_count_status'] = $this->Publishing_Model->display_all_food_orders_count_by_orders();
		   $data['order_count_delivering'] = $this->Publishing_Model->display_all_food_orders_count_by_delivering();
		   $data['order_count_delivered'] = $this->Publishing_Model->display_all_food_orders_count_by_delivered();

		   $data['all_subscribe'] = $this->Publishing_Model->display_all_subscribed(); 
		   $data['user_count'] = $this->Publishing_Model->display_all_users_count();	
		   $data['user_status_count'] = $this->Publishing_Model->display_all_users_count_by_status();

		   $this->load->view('publishing/navigation/nav');
		   $this->load->view('publishing/dashboard_newsletter', $data);
		   $this->load->view('publishing/navigation/footer', $data);
		}else{
			redirect('home');
		}
	  }

	  public function add_newsletter(){
	  	$email = $this->session->userdata('uemail');
		$user_status = $this->session->userdata('ustatus');

		if(!empty($email) && $user_status == 'Publishing'){
		   $data['order_count_status'] = $this->Publishing_Model->display_all_food_orders_count_by_orders();
		   $data['order_count_delivering'] = $this->Publishing_Model->display_all_food_orders_count_by_delivering();
		   $data['order_count_delivered'] = $this->Publishing_Model->display_all_food_orders_count_by_delivered();

		   $data['all_subscribe'] = $this->Publishing_Model->display_all_subscribed(); 
		   $data['user_count'] = $this->Publishing_Model->display_all_users_count();	
		   $data['user_status_count'] = $this->Publishing_Model->display_all_users_count_by_status();

		   $this->load->view('publishing/navigation/nav');
		   $this->load->view('publishing/dashboard_add_newsletter', $data);
		   $this->load->view('publishing/navigation/footer', $data);
		}else{
			redirect('home');
		}
	  }

	  // End of Newsletter 
	}

?>