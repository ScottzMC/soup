<?php 


	class Food_Model extends CI_Model{

		// Food 

		public function display_all_food_count(){
			$query = $this->db->query("SELECT COUNT(title) AS total_food FROM menu_food")->result();
			return $query;
		}

		public function display_all_foods(){
			$this->db->order_by('created_date', 'DESC');
			$query = $this->db->get('menu_food')->result();
			return $query;
		}

		public function display_all_food_orders_count(){
			$query = $this->db->query("SELECT COUNT(title) AS total_order FROM order_details")->result();
			return $query;
		}

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

		public function display_all_food_orders(){
			$query = $this->db->query("SELECT checkout_details.email, checkout_details.firstname, checkout_details.surname, checkout_details.telephone, checkout_details.address, order_details.customer_email, order_details.id, order_details.order_id, order_details.title, order_details.price, order_details.type, order_details.quantity, order_details.image, order_details.delivery_time, order_details.payment_type, order_details.status, order_details.created_time, order_details.created_date FROM checkout_details INNER JOIN order_details ON checkout_details.email = order_details.customer_email")->result();
			return $query;
		}

		public function display_sales(){
			$query = $this->db->query("SELECT SUM(price) AS total FROM order_details WHERE status = 'Delivered' ")->result();
			return $query;
		}

		public function display_food_by_title($title){
			$this->db->where('title', $title);
			$query = $this->db->get('menu_food')->result();
			return $query;
		}

		public function insert_food_item($data){
			$escape_data = $this->db->escape_str($data);
			$query = $this->db->insert('menu_food', $escape_data);
			return $query;
		}

		public function update_food_item($data, $title){
			$escape_data = $this->db->escape_str($data);
			$this->db->where('title', $title);
      		$query = $this->db->update('menu_food', $escape_data);
      		return $query;
		}

		public function update_deliver_food_item($id){
			$escape_id = $this->db->escape_str($id);
			$this->db->where('id', $escape_id);
			$this->db->set('status', 'Delivered');
			$query = $this->db->update('order_details');
			return $query;
		}

		public function update_cancel_food_item($id){
			$escape_id = $this->db->escape_str($id);
			$this->db->where('id', $escape_id);
			$this->db->set('status', 'Cancelled');
			$query = $this->db->update('order_details');
			return $query;
		}

		public function delete_food_item($id){
			$escape_id = $this->db->escape_str($id);
			$query = $this->db->query("DELETE FROM menu_food WHERE id = '$escape_id' ");
			return $query;
		}

		public function delete_food_order($id){
			$escape_id = $this->db->escape_str($id);
			$query = $this->db->query("DELETE FROM order_details WHERE id = '$escape_id' ");
			return $query;
		}

		// End of Food 
	}

?>