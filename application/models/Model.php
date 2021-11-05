<?php

  class Model extends CI_Model{

    // Login

    function validate($email, $password){
	    	$escape_email = $this->db->escape_str($email);
	      	$escape_password = $this->db->escape_str($password);

	  	  	$this->db->where('email', $escape_email);
	  		//$this->db->where('password', $escape_password);
	      	$query = $this->db->get('users');

	      	if($query->num_rows() > 0){
	        	$result = $query->row_array();
	        	if($this->bcrypt->check_password($escape_password, $result['password'])){
	  		    	return $query->result();
	        	}else{
	          		return array();
	        	}
	      	}else{
	        	return NULL;
	      	}
    	}

      function get_user($email, $password){
    		$this->db->where('email', $email);
    		$this->db->where('password', $password);
        $query = $this->db->get('users');
    		return $query->result();
    	}

    // End of Login

    // Register

    function create_user($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('users', $escape_data);
      return $query;
    }

    function create_checkout_details($email, $time, $date){
      $escape_email = $this->db->escape_str($email);
      $escape_time = $this->db->escape_str($time);
      $escape_date = $this->db->escape_str($date);

      $query = $this->db->query("INSERT INTO checkout_details(email, created_time, created_date) VALUES('$escape_email', '$escape_time', '$escape_date')");
      return $query;
    }

    // End of Register

    // Home 

    public function display_home_menu(){
      $this->db->limit('6');
      $this->db->order_by('created_date', 'DESC');
      $query = $this->db->get('menu_food')->result();
      return $query;
    }

    // End of Home 

    // Cart

    function update_cart($rowid, $qty, $price, $amount) {
      $rowid = $this->db->escape_str($rowid);
      $qty = $this->db->escape_str($qty);
      $price = $this->db->escape_str($price);
      $amount = $this->db->escape_str($amount);
      $data = $this->db->escape_str($data);

       $data = array(
         'rowid'   => $rowid,
         'qty'     => $qty,
         'price'   => $price,
         'amount'  => $amount
     );

      $this->cart->update($data);
    }

    function insert_order($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('order_details', $escape_data);
      return $query;
    }

    function update_checkout_details($data, $email){
      $escape_data = $this->db->escape_str($data);
      $this->db->where('email', $email);
      $query = $this->db->update('checkout_details', $escape_data);
      return $query;
    }

  public function cancel_order($id, $status){
    $id = $this->db->escape($id);
    $status = $this->db->escape($status);

    $query = $this->db->query("UPDATE order_detail SET status = '$status' WHERE id = '$id' ");
  }

    // End of Cart

    // Checkout 

    public function display_checkout_details_by_email($email){
      $this->db->where('email', $email);
      $query = $this->db->get('checkout_details')->result();
      return $query;
    }

   // End of Checkout 

  }

?>
