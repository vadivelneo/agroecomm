<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_autocomplete extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('purchase_autocompletemodule');
		  $sessionData = $this->session->userdata('userlogin');
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
	}
	
	public function index()
	{
	}
	 // smart search for met_req_no
	 public function get_met_req_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_met_req_no($q);
		}
	 }
	  // smart search for met_req_type
	 public function get_Req_type()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_Req_type($q);
		}
	 }
	 public function met_search_req_for()
	{
		
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_met_search_req_for($q);
		}
	 } 
	public function met_search_met_status()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_met_status($q);
		}
	 } 
	 
	 public function search_vq_order()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_vq_order($q);
		}
	 } 
	 
	public function search_vend_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_vend_name($q);
		}
	 } 
	 
	 public function search_div_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_div_name($q);
		}
	 } 
	 
	  public function search_str_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_str_code($q);
		}
	 } 
	 
	 public function search_str_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_str_name($q);
		}
	 } 
	 
	public function search_ven_qut_status()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_ven_qut_status($q);
		}
	 } 
	 
	public function search_pur_order()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_pur_order($q);
		}
	 } 
	 
	 public function search_store_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_str_name($q);
		}
	 } 
	 
	public function search_po_status()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_po_status($q);
		}
	 } 
	 
	public function search_ind_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_ind_no($q);
		}
	 } 
	 
	 public function search_location()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_location($q);
		}
	 } 
	  
	 public function search_inv_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_inv_no($q);
		}
	 } 
	
	 public function search_ret_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->purchase_autocompletemodule->autosearch_ret_no($q);
		}
	 } 
	
	
	
}

