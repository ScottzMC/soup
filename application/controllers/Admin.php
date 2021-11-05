<?php 

	class Admin extends CI_Controller{

		public function dashboard(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			date_default_timezone_set('Africa/Lagos');
            $date = date('M Y');

			if(!empty($email) && $user_status == 'Admin'){
			   $data['user_count'] = $this->Admin_model->display_all_users_count();	
			   $data['food_count'] = $this->Admin_model->display_all_food_count();
			   $data['order_count'] = $this->Admin_model->display_all_food_orders_count();
			   $data['blog_count'] = $this->Admin_model->display_all_blog_count();

			   $data['blog_comment'] = $this->Admin_model->display_all_blog_comment();

			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered(); 

			   $data['order_sales'] = $this->Admin_model->display_sales();

			   $data['all_subscribe'] = $this->Admin_model->display_all_subscribed(); 
 	
			   $this->load->view('admin/navigation/nav', $data);
			   $this->load->view('admin/dashboard', $data);
			   $this->load->view('admin/navigation/footer', $data);
			}else{
			   redirect('home');
			}
		}

		// Food

		public function food(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Admin'){
			   $data['all_foods'] = $this->Admin_model->display_all_foods();
			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered(); 
			   
			   $this->load->view('admin/navigation/nav');
			   $this->load->view('admin/ecommerce/dashboard_food', $data);
			   $this->load->view('admin/navigation/footer', $data);
			}else{
			   redirect('home');
			}	
		}

		public function upload(){
			$data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			$data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			$data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			$this->form_validation->set_rules('title', 'Food Title', 'trim|required');
      		$this->form_validation->set_rules('price', 'Food Price', 'trim|required');
      		$this->form_validation->set_rules('type', 'Food Type', 'trim|required');

      		$form_valid = $this->form_validation->run();
			$submit_upload = $this->input->post('uploadBtn');

			if(!empty($email) && $user_status == 'Admin'){
				if($form_valid == FALSE){
				  $this->load->view('admin/navigation/nav');
			   	  $this->load->view('admin/ecommerce/dashboard_upload_food');
			   	  $this->load->view('admin/navigation/footer', $data);	
				}else if(isset($submit_upload)){
					$title = $this->input->post('title');
					$str_title = str_replace(' ', '-', $title);

					$price = $this->input->post('price');
					$type = $this->input->post('type');

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
		                  'upload_path'   => "./uploads/menu/foods/",
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

		          $add_food_array = array(
		          	'title' => $str_title,
		          	'price' => $price,
		          	'type' => $type,
		          	'image' => $fileName,
		          	'created_time' => $time,
		          	'created_date' => $date
		          );

		          $add_food = $this->Admin_model->insert_food_item($add_food_array);

		          if($add_food){
		            redirect('admin/food');
		          }else{
		            $msgError = '<div class="alert alert-danger>Upload Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('admin/navigation/nav');
			   	  	$this->load->view('admin/ecommerce/dashboard_upload_food');
			   	  	$this->load->view('admin/navigation/footer', $data);
		          }

				}
			}else{
			   redirect('home');
			}
		}

		public function edit_food($food_title){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			$this->form_validation->set_rules('edit_title', 'Food Title', 'trim|required');
      		$this->form_validation->set_rules('edit_price', 'Food Price', 'trim|required');
      		$this->form_validation->set_rules('edit_type', 'Food Type', 'trim|required');

      		$form_valid = $this->form_validation->run();
			$submit_edit = $this->input->post('editBtn');

			if(!empty($email) && $user_status == 'Admin'){
			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();
			   $data['food_title'] = $this->Admin_model->display_food_by_title($food_title);
			   
			   if($form_valid == FALSE){
			   	$this->load->view('admin/navigation/nav');
			    $this->load->view('admin/ecommerce/dashboard_edit_food', $data);
			    $this->load->view('admin/navigation/footer', $data);
			   }else if(isset($submit_edit)){
			   	    $title = $this->input->post('edit_title');
					$str_title = str_replace(' ', '-', $title);

					$price = $this->input->post('edit_price');
					$type = $this->input->post('edit_type');

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
		                  'upload_path'   => "./uploads/menu/foods/",
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

		          $update_food_array = array(
		          	'title' => $str_title,
		          	'price' => $price,
		          	'type' => $type,
		          	'image' => $fileName,
		          	'created_time' => $time,
		          	'created_date' => $date
		          );

		          $update_food = $this->Admin_model->update_food_item($update_food_array, $food_title);

		          if($update_food){
		            redirect('admin/food');
		          }else{
		            $msgError = '<div class="alert alert-danger>Update Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('admin/navigation/nav');
			   	  	$this->load->view('admin/ecommerce/dashboard_edit_food', $data);
			   	  	$this->load->view('admin/navigation/footer', $data);
		          }
			   }
			}else{
			   redirect('home');
			}
		}

		public function deliver_food(){
		$id = $this->input->post('delv_id');
	    $this->Admin_model->update_deliver_food_item($id);

	    redirect('admin/orders');
	  }

	  public function cancel_food(){
	  	$id = $this->input->post('can_id');
	  	$this->Admin_model->update_cancel_food_item($id);

	  	redirect('admin/orders');
	  }

	  public function delete_order(){
	  	$id = $this->input->post('del_id');
	  	$this->Admin_model->delete_food_order($id);

	  	redirect('admin/orders');
	  }

		public function delete_food(){
		$id = $this->input->post('del_id');
	    $this->Admin_model->delete_food_item($id);

	    redirect('admin/food');
	  }

		public function orders(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Admin'){
			   $data['order_details'] = $this->Admin_model->display_all_food_orders();
 			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

			   $this->load->view('admin/navigation/nav');
			   $this->load->view('admin/ecommerce/dashboard_orders', $data);
			   $this->load->view('admin/navigation/footer', $data);
			}else{
			   redirect('home');
			}
		}

		// End of Food

		// User Grid 

		public function user_grid(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Admin'){
			   $data['user_count'] = $this->Admin_model->display_all_users_count();	
			   $data['user_status_count'] = $this->Admin_model->display_all_users_count_by_status();
			   $data['user_grid'] = $this->Admin_model->display_all_users(); 
			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();
			   	
			   $this->load->view('admin/navigation/nav');
			   $this->load->view('admin/ecommerce/dashboard_user_grid', $data);
			   $this->load->view('admin/navigation/footer', $data);
			}else{
			   redirect('home');
			}
		}

		// End of User Grid

		// Blog 

		public function blog(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Admin'){
			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

			   $data['all_blogs'] = $this->Admin_model->display_all_blogs(); 

			   $this->load->view('admin/navigation/nav');
			   $this->load->view('admin/publishing/dashboard_blog', $data);
			   $this->load->view('admin/navigation/footer', $data);
			}else{
				redirect('home');
			}
		}

		public function add_blog(){
			$data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			$data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			$data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			$this->form_validation->set_rules('title', 'Blog Title', 'trim|required');
      		$this->form_validation->set_rules('body', 'Blog Body', 'trim|required');

      		$form_valid = $this->form_validation->run();
			$submit_upload = $this->input->post('uploadBtn');

			if(!empty($email) && $user_status == 'Admin'){
				if($form_valid == FALSE){
				  $this->load->view('admin/navigation/nav');
			   	  $this->load->view('admin/publishing/dashboard_add_blog');
			   	  $this->load->view('admin/navigation/footer', $data);	
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

		          $add_blog = $this->Admin_model->insert_blog_post($add_blog_array);

		          if($add_food){
		            redirect('admin/blog');
		          }else{
		            $msgError = '<div class="alert alert-danger>Upload Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('admin/navigation/nav');
			   	  	$this->load->view('admin/publishing/dashboard_add_blog');
			   	  	$this->load->view('admin/navigation/footer', $data);
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

			if(!empty($email) && $user_status == 'Admin'){
			   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

			   $data['blog_title'] = $this->Admin_model->display_blog_by_title($blog_title);
			   
			   if($form_valid == FALSE){
			   	$this->load->view('admin/navigation/nav');
			    $this->load->view('admin/publishing/dashboard_edit_blog', $data);
			    $this->load->view('admin/navigation/footer', $data);
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

		          $update_blog = $this->Admin_model->update_blog_post($update_blog_array, $blog_title);

		          if($update_blog){
		            redirect('admin/blog');
		          }else{
		            $msgError = '<div class="alert alert-danger>Update Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('admin/navigation/nav');
			   	  	$this->load->view('admin/publishing/dashboard_edit_blog', $data);
			   	  	$this->load->view('admin/navigation/footer', $data);
		          }
			   }
			}else{
			   redirect('home');
			}
		}

		public function delete_blog(){
		$id = $this->input->post('del_id');
	    $this->Admin_model->delete_blog_post($id);

	    redirect('admin/blog');
	  }

		// End of Blog

	  // Newsletter 

	  public function newsletter(){
	  	$email = $this->session->userdata('uemail');
		$user_status = $this->session->userdata('ustatus');

		if(!empty($email) && $user_status == 'Admin'){
		   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
		   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
		   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

		   $data['all_subscribe'] = $this->Admin_model->display_all_subscribed(); 
		   $data['user_count'] = $this->Admin_model->display_all_users_count();	
		   $data['user_status_count'] = $this->Admin_model->display_all_users_count_by_status();

		   $this->load->view('admin/navigation/nav');
		   $this->load->view('admin/publishing/dashboard_newsletter', $data);
		   $this->load->view('admin/navigation/footer', $data);
		}else{
			redirect('home');
		}
	  }

	  public function add_newsletter(){
	  	$email = $this->session->userdata('uemail');
		$user_status = $this->session->userdata('ustatus');

		if(!empty($email) && $user_status == 'Admin'){
		   $data['order_count_status'] = $this->Admin_model->display_all_food_orders_count_by_orders();
		   $data['order_count_delivering'] = $this->Admin_model->display_all_food_orders_count_by_delivering();
		   $data['order_count_delivered'] = $this->Admin_model->display_all_food_orders_count_by_delivered();

		   $data['all_subscribe'] = $this->Admin_model->display_all_subscribed(); 
		   $data['user_count'] = $this->Admin_model->display_all_users_count();	
		   $data['user_status_count'] = $this->Admin_model->display_all_users_count_by_status();

		   $this->load->view('admin/navigation/nav');
		   $this->load->view('admin/publishing/dashboard_add_newsletter', $data);
		   $this->load->view('admin/navigation/footer', $data);
		}else{
			redirect('home');
		}
	  }

	  // End of Newsletter 

	}

?>