<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_autocomplete extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('inventory_autocompletemodule');
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
	 public function search_stock_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  
		  $this->inventory_autocompletemodule->search_stock_code($q);
		}
	 }
	 
	public function search_item_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  
		  $this->inventory_autocompletemodule->search_item_code($q);
		}
	 }
	 
	 public function search_item_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  
		  $this->inventory_autocompletemodule->search_item_name($q);
		}
	 }
	 
	 
	public function search_mft_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  
		  $this->inventory_autocompletemodule->search_mft_code($q);
		}
	 }
	 
	public function search_adj_stock_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  
		  $this->inventory_autocompletemodule->search_adj_stock_code($q);
		}
	 } 
 
}

