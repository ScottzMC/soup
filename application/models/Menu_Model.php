<?php 

	class Menu_Model extends CI_Model{

	// Menu

    public function display_menu_types(){
      $this->db->order_by('type', 'ASC');
      $query = $this->db->get('menu_food_type')->result();
      return $query;
    }

    public function display_menu_list(){
      $query = $this->db->query("SELECT menu_food_type.type, menu_food_type.banner, menu_food.type, menu_food.title, menu_food.price, menu_food.image
      FROM menu_food_type INNER JOIN menu_food ON menu_food_type.type = menu_food.type")->result();
      return $query;
    }

    public function display_menu_by_type($type){
      $this->db->where('type', $type);
      $query = $this->db->get('menu_food')->result();
      return $query;
    }

    // End of Menu	

	// Type 

		// Declare variables
     private $_limit;
     private $_pageNumber;
     private $_offset;
     // setter getter function
     public function setLimit($limit) {
         $this->_limit = $limit;
     }

     public function setPageNumber($pageNumber) {
         $this->_pageNumber = $pageNumber;
     }

     public function setOffset($offset) {
         $this->_offset = $offset;
     }
     // Count all record of table "employee" in database.
     public function get_all_menu_type_count() {
         $this->db->from('menu_food');
         return $this->db->count_all_results();
     }
     // Fetch data according to per_page limit.

     public function menu_type($type) {
         $this->db->limit($this->_pageNumber);
         $this->db->where('type', $type);
         $this->db->order_by('created_date', 'DESC');
         $query = $this->db->get('menu_food');
         return $query->result();
     }

	// End of Type 	

	}

?>