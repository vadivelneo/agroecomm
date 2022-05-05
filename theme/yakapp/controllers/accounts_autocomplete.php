<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts_autocomplete extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('accounts_autocompletemodule');
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
	 public function get_inc_rcpt_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->accounts_autocompletemodule->autosearch_inc_rcpt_no($q);
		}
	 }
	 
	public function get_cus_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->accounts_autocompletemodule->autosearch_cus_name($q);
		}
	 }
	 
	public function get_cus_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->accounts_autocompletemodule->autosearch_cus_no($q);
		}
	 }
	 
	 
	 public function get_pay_rcpt_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->accounts_autocompletemodule->autosearch_pay_rcpt_no($q);
		}
	 }
	 
	public function get_ven_no()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->accounts_autocompletemodule->autosearch_ven_no($q);
		}
	 }
 
 
	public function get_ven_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->accounts_autocompletemodule->autosearch_ven_name($q);
		}
	 }
 
 
}

