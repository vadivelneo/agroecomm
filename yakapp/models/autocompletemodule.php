<?php
Class Autocompletemodule extends CI_Model
{
	
	//** Get all Vendor Related Auto search **//
	
	public function autosearch_vendor_code($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_code', $q);
    $query = $this->db->get('vendors');
	
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['vendor_code']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
	
  }
	
	public function autosearch_vendor_name($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_name', $q);
    $query = $this->db->get('vendors');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['vendor_name']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_vendor_mob($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_phone', $q);
    $query = $this->db->get('vendors');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['vendor_phone']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_phone']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_vendor_email($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_email', $q);
    $query = $this->db->get('vendors');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['vendor_email']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_email']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_customer_code($q)
  {
    $this->db->select('*');
    $this->db->like('customer_code', $q);
	$this->db->where('customer_status' ,'active');
    $query = $this->db->get('customers');
	
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['customer_code']));
        $new_row['value']=htmlentities(stripslashes($row['customer_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
	
  }
	
	public function autosearch_customer_name($q)
  {
    $this->db->select('*');
    $this->db->like('customer_name', $q);
	$this->db->where('customer_status' ,'active');
    $query = $this->db->get('customers');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['customer_name']));
        $new_row['value']=htmlentities(stripslashes($row['customer_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_customer_mob($q)
  {
    $this->db->select('*');
    $this->db->like('customer_mobile', $q);
	$this->db->where('customer_status' ,'active');
    $query = $this->db->get('customers');
	
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['customer_mobile']));
        $new_row['value']=htmlentities(stripslashes($row['customer_mobile']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_customer_email($q)
  {
    $this->db->select('*');
    $this->db->like('customer_email', $q);
	$this->db->where('customer_status' ,'active');
    $query = $this->db->get('customers');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['customer_email']));
        $new_row['value']=htmlentities(stripslashes($row['customer_email']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_customer_category($q)
  {
    $this->db->select('*');
    $this->db->like('customer_category', $q);
	$this->db->where('customer_status' ,'active');
	$this->db->limit(10);
    $query = $this->db->get('customers');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['customer_category']));
        $new_row['value']=htmlentities(stripslashes($row['customer_category']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
   public function autosearch_item_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_code', $q);
	$this->db->where('product_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('products');
	
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_code']));
        $new_row['value']=htmlentities(stripslashes($row['product_code']));
		$row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_item_partnumber($q)
  {
    $this->db->select('*');
    $this->db->like('product_mfr_part_number', $q);
	$this->db->where('product_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('products');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $new_row['value']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
   public function autosearch_item_name($q)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
	$this->db->where('product_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('products');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
   
  //MAsters Uom  Name Module
  public function autosearch_uom_name($q)
  {
    $this->db->select('*');
    $this->db->like('uom_name', $q);
	$this->db->where('uom_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('uom');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['uom_name']));
        $new_row['value']=htmlentities(stripslashes($row['uom_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  //PRoduct Type
   
   public function autosearch_product_type($q)
  {
    $this->db->select('*');
    $this->db->like('products_type_name', $q);
	$this->db->where('products_type_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('products_type');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['products_type_name']));
        $new_row['value']=htmlentities(stripslashes($row['products_type_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_product_prefix($q)
  {
    $this->db->select('*');
    $this->db->like('products_type_prefix', $q);
	$this->db->where('products_type_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('products_type');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['products_type_prefix']));
        $new_row['value']=htmlentities(stripslashes($row['products_type_prefix']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_pro_group_name($q)
  {
    $this->db->select('*');
    $this->db->like('products_group_name', $q);
	$this->db->where('products_group_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('products_groups');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['products_group_name']));
        $new_row['value']=htmlentities(stripslashes($row['products_group_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_country_name($q)
  {
    $this->db->select('*');
    $this->db->like('country_name', $q);
	$this->db->where('country_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('country');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['country_name']));
        $new_row['value']=htmlentities(stripslashes($row['country_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
   public function autosearch_country_code($q)
  {
    $this->db->select('*');
    $this->db->like('country_code', $q);
	$this->db->where('country_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('country');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['country_code']));
        $new_row['value']=htmlentities(stripslashes($row['country_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_state_name($q)
  {
    $this->db->select('*');
    $this->db->like('state_name', $q);
	$this->db->where('state_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('state');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['state_name']));
        $new_row['value']=htmlentities(stripslashes($row['state_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_state_code($q)
  {
    $this->db->select('*');
    $this->db->like('state_code', $q);
	$this->db->where('state_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('state');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['state_code']));
        $new_row['value']=htmlentities(stripslashes($row['state_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_city_name($q)
  {
    $this->db->select('*');
    $this->db->like('city_name', $q);
	$this->db->where('city_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('city');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['city_name']));
        $new_row['value']=htmlentities(stripslashes($row['city_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  public function autosearch_city_code($q)
  {
    $this->db->select('*');
    $this->db->like('city_code', $q);
	$this->db->where('city_status' ,'enable');
	$this->db->limit(10);
    $query = $this->db->get('city');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['city_code']));
        $new_row['value']=htmlentities(stripslashes($row['city_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  //USER DETIALS
  public function autosearch_user_first_name($q)
  {
    $this->db->select('*');
    $this->db->like('user_first_name', $q);
	$this->db->where('user_status','enable');
	$this->db->where('user_display_status','1');
	$this->db->limit(10);
    $query = $this->db->get('users');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['user_first_name']));
        $new_row['value']=htmlentities(stripslashes($row['user_first_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_user_last_name($q)
  {
    $this->db->select('*');
    $this->db->like('user_last_name', $q);
	$this->db->where('user_status','enable');
	$this->db->where('user_display_status','1');
	$this->db->limit(10);
    $query = $this->db->get('users');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['user_last_name']));
        $new_row['value']=htmlentities(stripslashes($row['user_last_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_user_name($q)
  {
    $this->db->select('*');
    $this->db->like('user_name', $q);
	$this->db->where('user_status','enable');
	$this->db->where('user_display_status','1');
	$this->db->limit(10);
    $query = $this->db->get('users');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['user_name']));
        $new_row['value']=htmlentities(stripslashes($row['user_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_user_group_name($q)
  {
    $this->db->select('*');
    $this->db->like('group_name', $q);
	$this->db->where('status','enable');
	$this->db->limit(10);
    $query = $this->db->get('user_groups');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['group_name']));
        $new_row['value']=htmlentities(stripslashes($row['group_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_user_email($q)
  {
    $this->db->select('*');
    $this->db->like('user_email', $q);
	$this->db->where('user_status','enable');
	$this->db->where('user_display_status','1');
	$this->db->limit(10);
    $query = $this->db->get('users');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['user_email']));
        $new_row['value']=htmlentities(stripslashes($row['user_email']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_emp_name($q)
  {
    $this->db->select('*');
    $this->db->like('emp_name', $q);
	$this->db->limit(10);
    $query = $this->db->get('employee_master');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['emp_name']));
        $new_row['value']=htmlentities(stripslashes($row['emp_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_emp_code($q)
  {
    $this->db->select('*');
    $this->db->like('emp_code', $q);
	$this->db->limit(10);
    $query = $this->db->get('employee_master');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['emp_code']));
        $new_row['value']=htmlentities(stripslashes($row['emp_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_emp_designation($q)
  {
    $this->db->select('*');
    $this->db->like('desig_type', $q);
	$this->db->limit(10);
	$this->db->where('desig_id !=',1);
    $query = $this->db->get('employee_designation');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['desig_type']));
        $new_row['value']=htmlentities(stripslashes($row['desig_type']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
 public function autosearch_lot_no($q)
  {
    $this->db->select('*');
    $this->db->like('lot_no', $q);
	$this->db->limit(10);
    $query = $this->db->get('lotmanagement');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['lot_no']));
        $new_row['value']=htmlentities(stripslashes($row['lot_no']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_product_name($q)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
	$this->db->limit(10);
    $query = $this->db->get('lotmanagement');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_scheme_code($q)
  {
    $this->db->select('*');
    $this->db->like('scheme_code', $q);
	$this->db->limit(10);
    $query = $this->db->get('scheme_management');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['scheme_code']));
        $new_row['value']=htmlentities(stripslashes($row['scheme_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_scheme_name($q)
  {
    $this->db->select('*');
    $this->db->like('scheme_name', $q);
	$this->db->limit(10);
    $query = $this->db->get('scheme_management');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['scheme_name']));
        $new_row['value']=htmlentities(stripslashes($row['scheme_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
    }
  }
  
  
  public function autosearch_product_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_mfr_part_number', $q);
	$this->db->limit(10);
    $query = $this->db->get('products');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $new_row['sku']=htmlentities(stripslashes($row['product_mfr_part_number']));
		$new_row['name']=htmlentities(stripslashes($row['product_name']));
		$new_row['skuid']=htmlentities(stripslashes($row['product_id']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
    }
  }
  
    public function autosearch_sales_return_product_code($q)
  {
    $this->db->select('*');
    $this->db->like('sku_name', $q);
	$this->db->limit(10);
    $query = $this->db->get('scheme_lot_assign');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['sku_name']));
        $new_row['sku']=htmlentities(stripslashes($row['sku_name']));
		$new_row['name']=htmlentities(stripslashes($row['product_name']));
		$new_row['skuid']=htmlentities(stripslashes($row['product_id']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
    }
  }
  
  public function autosearch_scheme_lot_no($q)
  {
    $this->db->select('*');
    $this->db->like('lot_no', $q);
	$this->db->limit(10);
    $query = $this->db->get('scheme_lot_assign');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['lot_no']));
        $new_row['value']=htmlentities(stripslashes($row['lot_no']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
   public function autosearch_lot_product_name($q)
  
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
	$this->db->limit(10);
    $query = $this->db->get('scheme_lot_assign');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_bom_product_name($q)
  
  {
    /*	SELECT * FROM `vsoft_products` A WHERE NOT EXISTS (SELECT bom_product_id FROM vsoft_bom B WHERE A.product_id = 								        B.bom_product_id) AND A.product_type_id = 2 AND (A.product_name LIKE '%69 HP-15`S CAPSULES%')*/
	
	$this->db->select('PRO.*')
				->from('products as PRO')
				->join('bom as BOM','PRO.product_id = BOM.bom_product_id','left')
				->or_where('BOM.bom_product_id',NULL)
				->like('PRO.product_name', $q)
				->where('PRO.product_type_id', '2')
				->limit(15);
	$query = $this->db->get();

    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
		$new_row['material_id']=htmlentities(stripslashes($row['product_id']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
    }
  }
  
   public function autosearch_stock_product_name($q,$material_store_division_id)
  
  {
   
	$this->db->select('PRO.*')
				->from('products as PRO')
				->like('PRO.product_name', $q)
				->where('PRO.material_store_division_id',$material_store_division_id)
				->limit(15);
	$query = $this->db->get();

    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
		$new_row['material_id']=htmlentities(stripslashes($row['product_id']));
		$new_row['material_store_id']=htmlentities(stripslashes($row['material_store_id']));
		
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
    }
  }
  
   public function autosearch_stock_to_product_name($q,$material_store_to_division_id)
  
  {
   
	$this->db->select('PRO.*')
				->from('products as PRO')
				->like('PRO.product_name', $q)
				->where('PRO.material_store_division_id',$material_store_to_division_id)
				->limit(15);
	$query = $this->db->get();

    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
		$new_row['material_id']=htmlentities(stripslashes($row['product_id']));
		$new_row['material_store_id']=htmlentities(stripslashes($row['material_store_id']));
		
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
    }
  }
  
  public function autosearch_mr_product_name($q)
  {
   	$this->db->select('BOM.*')
				->from('bom as BOM')
				//->join('bom_items as BMI','BOM.bom_id = BMI.bom_item_ref_id','left')
				
				->like('BOM.bom_product_name', $q)
				->where('BOM.bom_status', 'enable')
				//->group_by('BOM.bom_product_id')
				->limit(15);
	$query = $this->db->get();

    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['bom_product_name']));
        $new_row['value']=htmlentities(stripslashes($row['bom_product_name']));
		$new_row['bom_product_id']=htmlentities(stripslashes($row['bom_product_id']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data //
	  
	      }
  }
  
   public function autosearch_bom_pdtname($q)
  {
    $this->db->select('*');
    $this->db->like('bom_product_name', $q);
	$this->db->where('bom_status', 'enable');
	$this->db->limit(10);
    $query = $this->db->get('bom');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['bom_product_name']));
        $new_row['value']=htmlentities(stripslashes($row['bom_product_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
   public function autosearch_batch_no($q)
  {
    $this->db->select('*');
    $this->db->like('met_req_batch_no', $q);
	$this->db->where('met_req_status', 'enable');
	$this->db->limit(10);
    $query = $this->db->get('meterial_request_new');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['met_req_batch_no']));
        $new_row['value']=htmlentities(stripslashes($row['met_req_batch_no']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
}
	