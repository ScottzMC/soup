<?php 

	class Food extends CI_Controller{

		// Food

		public function dashboard(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Food'){
			   $data['all_foods'] = $this->Food_Model->display_all_foods();
			   $data['order_count_status'] = $this->Food_Model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Food_Model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Food_Model->display_all_food_orders_count_by_delivered(); 
			   
			   $this->load->view('food/navigation/nav');
			   $this->load->view('food/dashboard', $data);
			   $this->load->view('food/navigation/footer', $data);
			}else{
			   redirect('home');
			}	
		}

		public function upload(){
			$data['order_count_status'] = $this->Food_Model->display_all_food_orders_count_by_orders();
			$data['order_count_delivering'] = $this->Food_Model->display_all_food_orders_count_by_delivering();
			$data['order_count_delivered'] = $this->Food_Model->display_all_food_orders_count_by_delivered();

			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			$this->form_validation->set_rules('title', 'Food Title', 'trim|required');
      		$this->form_validation->set_rules('price', 'Food Price', 'trim|required');
      		$this->form_validation->set_rules('type', 'Food Type', 'trim|required');

      		$form_valid = $this->form_validation->run();
			$submit_upload = $this->input->post('uploadBtn');

			if(!empty($email) && $user_status == 'Food'){
				if($form_valid == FALSE){
				  $this->load->view('food/navigation/nav');
			   	  $this->load->view('food/dashboard_upload');
			   	  $this->load->view('food/navigation/footer', $data);	
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

		          $add_food = $this->Food_Model->insert_food_item($add_food_array);

		          if($add_food){
		            redirect('admin/food');
		          }else{
		            $msgError = '<div class="alert alert-danger>Upload Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('food/navigation/nav');
			   	  	$this->load->view('food/dashboard_upload_food');
			   	  	$this->load->view('food/navigation/footer', $data);
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

			if(!empty($email) && $user_status == 'Food'){
			   $data['order_count_status'] = $this->Food_Model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Food_Model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Food_Model->display_all_food_orders_count_by_delivered();
			   $data['food_title'] = $this->Food_Model->display_food_by_title($food_title);
			   
			   if($form_valid == FALSE){
			   	$this->load->view('food/navigation/nav');
			    $this->load->view('food/dashboard_edit_food', $data);
			    $this->load->view('food/navigation/footer', $data);
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

		          $update_food = $this->Food_Model->update_food_item($update_food_array, $food_title);

		          if($update_food){
		            redirect('admin/food');
		          }else{
		            $msgError = '<div class="alert alert-danger>Update Failed</div>';
		            $this->session->set_flashdata('msgError', $msgError);
		            $this->load->view('food/navigation/nav');
			   	  	$this->load->view('food/dashboard_edit_food', $data);
			   	  	$this->load->view('food/navigation/footer', $data);
		          }
			   }
			}else{
			   redirect('home');
			}
		}

		public function deliver_food(){
		$id = $this->input->post('delv_id');
	    $this->Food_Model->update_deliver_food_item($id);

	    redirect('food/orders');
	  }

	  public function cancel_food(){
	  	$id = $this->input->post('can_id');
	  	$this->Food_Model->update_cancel_food_item($id);

	  	redirect('food/orders');
	  }

	  public function delete_order(){
	  	$id = $this->input->post('del_id');
	  	$this->Food_Model->delete_food_order($id);

	  	redirect('food/orders');
	  }

	  public function delete_food(){
		$id = $this->input->post('del_id');
	    $this->Food_Model->delete_food_item($id);

	    redirect('food/dashboard');
	  }

		public function orders(){
			$email = $this->session->userdata('uemail');
			$user_status = $this->session->userdata('ustatus');

			if(!empty($email) && $user_status == 'Food'){
			   $data['order_details'] = $this->Food_Model->display_all_food_orders();
 			   $data['order_count_status'] = $this->Food_Model->display_all_food_orders_count_by_orders();
			   $data['order_count_delivering'] = $this->Food_Model->display_all_food_orders_count_by_delivering();
			   $data['order_count_delivered'] = $this->Food_Model->display_all_food_orders_count_by_delivered();

			   $this->load->view('food/navigation/nav');
			   $this->load->view('food/dashboard_orders', $data);
			   $this->load->view('food/navigation/footer', $data);
			}else{
			   redirect('home');
			}
		}

		// End of Food
	}

?>