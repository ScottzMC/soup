<?php 

	class Blog_Model extends CI_Model{

	// Blog

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
     public function get_all_blog_count() {
         $this->db->from('blog');
         return $this->db->count_all_results();
     }
     // Fetch data according to per_page limit.

     public function blog_post() {
         $this->db->limit($this->_pageNumber, $this->_offset);
         $this->db->order_by('created_date', 'DESC');
         $query = $this->db->get('blog');
         return $query->result();
     }

     public function blog_detail($title){
       $this->db->where('title', $title);
       $query = $this->db->get('blog')->result();
       return $query;
     }

     public function blog_comment($title){
       $this->db->where('blog_title', $title);
       $this->db->order_by('created_date', 'DESC');
       $query = $this->db->get('blog_comment')->result();
       return $query;
     }

     public function insert_comment_blog_post($data){
       $escape_data = $this->db->escape_str($data);
       $query = $this->db->insert('blog_comment', $escape_data);
       return $query;
     }

    // End of Blog	

	}

?>