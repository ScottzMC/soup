<?php 

	class Publishing_Model extends CI_Model{

		public function display_all_food_orders_count_by_orders(){
			$query = $this->db->query("SELECT COUNT(status) AS total_orders FROM order_details")->result();
			return $query;
		}

		public function display_all_food_orders_count_by_delivering(){
			$query = $this->db->query("SELECT COUNT(status) AS total_delivering FROM order_details WHERE status = 'Delivering'")->result();
			return $query;
		}

		public function display_all_food_orders_count_by_delivered(){
			$query = $this->db->query("SELECT COUNT(status) AS total_delivered FROM order_details WHERE status = 'Delivered'")->result();
			return $query;
		}

		// Blog 

		public function display_all_blogs(){
			$query = $this->db->get('blog')->result();
			return $query;
		}

		public function insert_blog_post($data){
			$escape_data = $this->db->escape_str($data);
			$query = $this->db->insert('blog', $escape_data);
			return $query;
		}

		public function update_blog_post($data, $title){
			$escape_data = $this->db->escape_str($data);
			$this->db->where('title', $title);
			$query = $this->db->update('blog', $escape_data);
			return $query;
		}

		public function display_blog_by_title($title){
			$this->db->where('title', $title);
			$query = $this->db->get('blog')->result();
			return $query;
		}

		public function delete_blog_post($id){
			$escape_id = $this->db->escape_str($id);
			$query = $this->db->query("DELETE FROM blog WHERE id = '$escape_id' ");
			return $query;
		}

		// End of Blog

		// User Grid 

		public function display_all_users_count(){
			$query = $this->db->query("SELECT COUNT(email) AS total FROM users")->result();
			return $query;
		}

		public function display_all_users_count_by_status(){
			$query = $this->db->query("SELECT COUNT(status) AS total_status, status FROM users GROUP BY status")->result();
			return $query;
		}

		public function display_all_users(){
			$this->db->order_by('status', 'ASC');
			$query = $this->db->query("SELECT checkout_details.email, checkout_details.firstname, checkout_details.surname, checkout_details.telephone, users.email, users.status, users.created_time, users.created_date FROM checkout_details INNER JOIN users ON checkout_details.email = users.email ")->result();
			return $query; 
		}

		// End of User Grid

		// Newsletter 

		public function display_all_subscribed(){
			$this->db->where('subscribe', 'Subscribed');
			$query = $this->db->get('users')->result();
			return $query;
		}

		// End of Newsletter
	}

?>