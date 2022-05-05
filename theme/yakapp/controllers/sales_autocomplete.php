<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_autocomplete extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('sales_autocompletemodule');
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
	public function get_sale_qut_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_sale_qut_no($q);
		}
	 }
	 
	public function get_cus_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_cus_name($q);
		}
	 }

	 	public function get_price_book_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_price_book_name($q);
		}
	 }
	 public function get_item_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_item_code($q);
		}
	 }
	 
	public function get_cus_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_cus_code($q);
		}
	 }
	 
	public function get_sale_order_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_sale_order_no($q);
		}
	 } 
	 
	 	public function get_po_ref_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_po_ref_no($q);

		 	}
	 } 
	 
	public function get_sale_dc_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_sale_dc_no($q);
		}
	 } 
	public function get_sale_SI_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_sale_si_no($q);
		}
	 } 
	
	public function get_sale_ret_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->sales_autocompletemodule->autosearch_sale_ret_no($q);
		}
	 } 
	
}

