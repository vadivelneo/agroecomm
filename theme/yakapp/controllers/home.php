<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		  
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('mastersmodule');
		  $this->load->model('homemodule');

		  $sessionData = $this->session->userdata('userlogin');
		 
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
		 else
		{	
			$userLogin = $this->session->userdata('userlogin');
			$type = $userLogin['group_id'];
			
			
			if($type)
			{
				$roles= $this->mastersmodule->getroletype($type);
				
				foreach ($roles as $ro) 
				{
					$module=$ro->module_id;
					
					if($module == '1'){
						$this->data['vendor']=$ro;
					}elseif ($module == '2') {
						$this->data['customer']=$ro;
					}elseif ($module == '3') {
						$this->data['materialrequest']=$ro;
					}elseif ($module == '4') {
						$this->data['vendorquote']=$ro;
					}elseif ($module == '5') {
						$this->data['salesquote']=$ro;
					}elseif ($module == '6') {
						$this->data['purchaseorder']=$ro;
					}elseif ($module == '7') {
						$this->data['purchaseindent']=$ro;
					}elseif ($module == '8') {
						$this->data['purchaseinvoice']=$ro;
					}elseif ($module == '9') {
						$this->data['salesorder']=$ro;
					}elseif ($module == '10') {
						$this->data['deliverychallan']=$ro;
					}elseif ($module == '11') {
						$this->data['pricebook']=$ro;
					}elseif ($module == '12') {
						$this->data['salesinvoice']=$ro;
					}elseif ($module == '13') {
						$this->data['openingstock']=$ro;
					}elseif ($module == '14') {
						$this->data['invoicereceipt']=$ro;
					}elseif ($module == '15') {
						$this->data['paymentreceipt']=$ro;
					}elseif ($module == '16') {
						$this->data['stockadjustment']=$ro;
					}elseif ($module == '17') {
						$this->data['creditnote']=$ro;
					}elseif ($module == '18') {
						$this->data['debitnote']=$ro;
					}elseif ($module == '19') {
						$this->data['stockwastages']=$ro;
					}elseif ($module == '20') {
						$this->data['salesreturn']=$ro;
					}elseif ($module == '21') {
						$this->data['mastermodule']=$ro;
					}elseif($module == '22'){
						$this->data['leads']=$ro;
					}elseif ($module == '23') {
						$this->data['organization']=$ro;
					}elseif ($module == '24') {
						$this->data['contacts']=$ro;
					}elseif ($module == '25') {
						$this->data['opportunity']=$ro;
					}elseif ($module == '26') {
						$this->data['paymentadjustments']=$ro;
					}elseif ($module == '27') {
						$this->data['reports']=$ro;
					}elseif ($module == '28') {
						$this->data['products']=$ro;
					}
					
				}
			}
		}
	}
	
	public function index()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//echo $sess_user; exit;
		if($sess_user ==1)
		{
		redirect('home/home_list');
		}
		else
		{
		redirect('home/user_dashboard');
		}
		
	}
	
	public function test()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//echo $sess_user; exit;
		
		$this->_render('pages/test');
		
	}
	
	public function home_list()
	{
		$this->data["officer_count"] = $this->homemodule->officer_count(); 
		$this->data["vendor_count"] = $this->homemodule->vendor_count(); 
		$this->data["purchase_amount"] = $this->homemodule->purchase_amount(); 
		$this->data["sales_amount"] = $this->homemodule->sales_amount(); 
		$this->data["cus_incentive"] = $this->homemodule->cus_incentive(); 
		$this->data["comp_incentive"] = $this->homemodule->comp_incentive(); 
		//echo "<pre>";print_r($this->data["officer_count"]); 
		$this->title = "Home";
		$this->keywords = "Home";
		$this->load->view('pages/dashboard');
	}
	
	public function user_dashboard()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//echo $sess_user; exit;
		$this->data["count_downline_user"] = $this->homemodule->count_downline_user($sess_user); 
		$this->data["downline_user_details"] = $this->homemodule->downline_user_details($sess_user); 
		$this->data["self_purchase_amount_user"] = $this->homemodule->self_purchase_amount_user($sess_user); 
		$this->data["incentive_amount_user"] = $this->homemodule->incentive_amount_user($sess_user); 
		$this->data["redeem_amount_user"] = $this->homemodule->redeem_amount_user($sess_user); 
		$this->data["wallet_amount_user"] = $this->homemodule->wallet_amount_user($sess_user); 
		$this->data["user_details"] = $this->homemodule->user_details($sess_user); 
		//echo "<pre>";print_r($this->data["downline_user_details"]); 
		$this->title = "Home";
		$this->keywords = "Home";
		$this->_render('pages/user_dashboard');
	}
	
	 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */