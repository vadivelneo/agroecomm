<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends MY_Controller {

	public function __construct()
	{
		  
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('sales_popup_model');
		  $this->load->model('autocompletemodule');
		  
		  $sessionData = $this->session->userdata('userlogin');
		 
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
	
	}
	
	public function index()
	{
		
	}
	
	//** Single Item Pop-up **//
	
	public function get_product_manufacturer()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
		//** Get all Product Details **//
		$this->data["product_list"] = $this->sales_popup_model->get_allproductsdetails($producttype);
		$result = $this->load->view("pages/popup/sales_singleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	
	
	 // smart search for vendor code in masters
	 public function get_vendor_code()
	{
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_vendor_code($q);
		}
	 }
	 public function get_vendor_name()
	{
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_vendor_name($q);
		}
	 }
	 public function get_vendor_mobile()
	{
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_vendor_mob($q);
		}
	 }
	 public function get_vendor_email()
	{
		
		if (isset($_GET['term'])){
		
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_vendor_email($q);
		}
		
	}
	
	// Customer Details auto complete
	  public function get_customer_code()
	{
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_customer_code($q);
		}
	 }
	 public function get_customer_name()
	{
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_customer_name($q);
		}
	 }
	 public function get_customer_mobile()
	{
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_customer_mob($q);
		}
	 }
	 public function get_customer_email()
	{
		
		if (isset($_GET['term'])){
		
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_customer_email($q);
		}
		
	 }
	 public function get_customer_category()
	{
		
		if (isset($_GET['term'])){
		
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_customer_category($q);
		}
		
	}
	
	// smart search for multiple item code in sales
	public function get_item_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_item_code($q);
		}
	 }
	 
	 // smart search for multiple item partnumber in sales
	 public function get_item_partnumber()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_item_partnumber($q);
		}
	 }
	 
	  // smart search for multiple item name in sales
	 public function get_item_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_item_name($q);
		}
	}
	
	///////////////MASTERS AUTO COMPLETE
	
	// UOM name
	
	public function get_uom_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_uom_name($q);
		}
	}
	
	//Product Type
	
	public function get_product_type()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_product_type($q);
		}
	}
	
	public function get_product_prefix()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_product_prefix($q);
		}
	}
	
	//Product Group name
	public function get_product_group_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_pro_group_name($q);
		}
	}
	
	// Country Name
	public function get_country_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_country_name($q);
		}
	}
	public function get_country_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_country_code($q);
		}
	}
	public function get_state_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_state_name($q);
		}
	}
	public function get_state_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_state_code($q);
		}
	}
	
	//CITY DETAILS
	public function get_city_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_city_name($q);
		}
	}
	public function get_city_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_city_code($q);
		}
	}
	///USER DETAILS
	public function get_user_first_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_user_first_name($q);
		}
	}
	
	public function get_user_last_name()
	
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_user_last_name($q);
		}
	}
	
	public function get_user_name()
	
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_user_name($q);
		}
	}
	
	public function get_user_group_name()
	
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_user_group_name($q);
		}
	}
	
	public function get_user_email()
	
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_user_email($q);
		}
	}
	
	public function get_emp_name()
	
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_emp_name($q);
		}
	}
	
	public function get_emp_code()
	
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_emp_code($q);
		}
	}
	
	public function get_emp_designation()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_emp_designation($q);
		}
	}
	
	public function get_lot_no()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_lot_no($q);
		}
	}
	
	public function get_product_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_product_name($q);
		}
	}
	
	public function get_scheme_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_scheme_code($q);
		}
	}
	
	public function get_scheme_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_scheme_name($q);
		}
	}
	
	public function get_product_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_product_code($q);
		}
	}


	public function get_sales_return_product_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_sales_return_product_code($q);
		}
	}
	
	public function get_scheme_lot_no()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_scheme_lot_no($q);
		}
	}
	
	public function get_lot_product_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_lot_product_name($q);
		}
	}
	
	public function bom_product_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_bom_product_name($q);
		}
	 }

public function stock_product_name()
	{
		$material_store_division_id = $_GET['material_store_division_id'];
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_stock_product_name($q,$material_store_division_id);
		}
	 } 	 
	 
	 public function stock_to_product_name()
	{
		$material_store_to_division_id = $_GET['material_store_to_division_id'];
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_stock_to_product_name($q,$material_store_to_division_id);
		}
	 } 	 
	 
	 public function mr_product_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_mr_product_name($q);
		}
	 } 
	 
	public function search_bom_pdtname()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_bom_pdtname($q);
		}
	 } 
   
   public function get_item_batch()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->autocompletemodule->autosearch_batch_no($q);
		}
	 } 

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */