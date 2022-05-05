<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('reportmodule');
		  $this->load->model('mastersmodule');		  
		  $this->load->model('locationmodel');
		  $this->load->model('accountmodule');
		  $this->load->library('session');
		  $this->load->library('email');
		  $this->load->library('pagination');
		  $this->load->library('pdf');
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
		redirect('reports/purchaseorder_list');
	}
	
	// Auto complete search for vendor name
	public function report_search_vendor_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_vendor_name($q);
		}
	}
	
	public function enrollment($sort_order='OFCR_TRE_ID',$sort_by='desc')
	{
		$session=$this->session->userdata('userlogin');
		//echo "<pre>"; print_r($session); exit;
		$parentid=$session['user_code'];

		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->reportmodule->get_all_first_level($limit,$page,$sort_order,$sort_by,$parentid);
		$Result_count = $this->reportmodule->get_all_first_level_count($limit,$page,$sort_order,$sort_by,$parentid);
		$this->data["subuser_data"] = $Result['rows'];
		$this->data["level_count"] = $Result_count['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('reports/enrollment/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;	
		$this->title = "AGRO FARM";
		$this->keywords = "AGRO FARM";
		$this->_render('pages/reports/enrollmentreport');
	}
	
	public function search_direct_downline($sort_order='OFCR_TRE_ID',$sort_by='desc')
	{
		$session=$this->session->userdata('userlogin');
		//echo "<pre>"; print_r($session); exit;
		$parentid=$session['user_code'];
		
		if(isset($_POST['search']))
		{
			$search_cus_id = $this->security->xss_clean($this->input->post('search_cus_id'));
			$search_cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
			$search_cus_phone = $this->security->xss_clean($this->input->post('search_cus_phone'));
		
			$level_search= array(
					'search_cus_id' => $search_cus_id,
					'search_cus_name' => $search_cus_name,
					'search_cus_phone' =>$search_cus_phone,
 				
					);	
			$this->session->set_userdata('level_data',$level_search);
		}
			$search_data = $this->session->userdata('level_data');
						
			
			$search_cus_id = $search_data['search_cus_id'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_cus_phone = $search_data['search_cus_phone'];
		
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->reportmodule->get_all_first_level_search($limit,$page,$sort_order,$sort_by,$parentid,$search_cus_id,$search_cus_name,$search_cus_phone);
		$Result_count = $this->reportmodule->get_all_first_level_count($limit,$page,$sort_order,$sort_by,$parentid);
		$this->data["subuser_data"] = $Result['rows'];
		$this->data["level_count"] = $Result_count['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('reports/search_direct_downline/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;	
		$this->title = "AGRO FARM";
		$this->keywords = "AGRO FARM";
		$this->_render('pages/reports/enrollmentreport');
	}
	
	public function report_search_store_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_store_name($q);
		}
	}
	
	public function report_search_division_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_division_name($q);
		}
	}
	
	public function report_search_material_type()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_material_type($q);
		}
	}
	
	// Auto complete search for Item name
	public function report_search_item_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_item_name($q);
		}
	}
	// Auto complete search for Item Code
	public function report_search_item_code()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_item_code($q);
		}
	}
	// Auto complete search for Item Mfg Part No
	public function report_search_item_mfgpartno()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_item_mfg($q);
		}
	}
	// Auto complete search for Customer
	public function report_search_customer()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_customer_name($q);
		}
	}
	// Auto complete search for Vendor
	public function report_search_vendor()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_vendor_name($q);
		}
	}
	
	// Purchase Order Report List
	public function purchaseorder_list()
   	{
   		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/reports/purchase_order_reports');
	}
	
	public function enrollement_report()
   	{
   		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->title = "Enrollement Report";
		$this->keywords = "Enrollement Report";
		$this->_render('pages/reports/enrollement_report');
	}
	
	
	public function enrollement_reportsearch()
    {
    	$sessionData = $this->session->userdata('userlogin');
		//echo "<pre>"; print_r($sessionData); exit;
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$user_code=$sessionData['user_code'];
		
		$report_officer = $this->security->xss_clean($this->input->post('report_officer'));
		
		
		$this->data["po_list"] = $this->reportmodule->get_enrollement_reportsearch($sess_company,$user_code, $report_officer);
		
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/enrollement_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Enrollement Report";
			$this->keywords = "Enrollement Report";
			$this->_render('pages/reports/enrollement_report');
		}
		else
		{
			redirect('reports/enrollement_report');
		}
		
		
	}
	
	public function view_enrollement_report()
	{
		$id = $this->input->post('search_id');
		$search_key = $this->input->post('search_key');
		
		$this->data["editenrollement_report"] = $this->reportmodule->getenrollement_report($id, $search_key);
	
		//** Get Single PO Indent Item Details **//
		$this->title = "Enrollement Report";
		$this->keywords = "Enrollement Report";
		$this->data["search_key"] = $search_key;
		$this->load->view('pages/reports/view_enrollement_report_export',$this->data);
	}
	
	public function purchaseorder_pending()
   	{
   		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/reports/po_pending_report');
	}
	
	public function po_pendingsearch($sort_order='po_po_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$search_item_status = $this->security->xss_clean($this->input->post('search_item_status'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$store_name =$this->security->xss_clean($this->input->post('report_store'));
		$report_item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$report_item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$material_type_id =$this->security->xss_clean($this->input->post('material_type_id'));
		$material_type =$this->security->xss_clean($this->input->post('material_type'));
		$division_name =$this->security->xss_clean($this->input->post('division_name'));
		$division_id =$this->security->xss_clean($this->input->post('division_id'));
		//echo $search_item_status; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["po_list"] = $this->reportmodule->get_po_pending_report($sess_company,$report_from,$report_to,$vendor_id,$store_name,$report_item_name,$search_item_status,$division_name,$material_type,$division_id);
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		$this->data["search_item_status"] =$search_item_status; 
		$this->data["store_name"] =$store_name; 
		$this->data["report_item_id"] =$report_item_id; 
		$this->data["report_item_name"] =$report_item_name; 
		$this->data["division_name"] = $division_name;
		$this->data["division_id"] = $division_id;
		$this->data["material_type"] = $material_type;
		$this->data["material_type_id"] = $material_type_id;
		
		
		if(isset($_POST['export']))
		{
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->load->view('pages/reports/pdf/po_pending_report', $this->data);
		}
		else if($_POST['generate'])
		{
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/reports/po_pending_report');
		}
		else
		{
			redirect('reports/purchaseorder_pending');
		}
		
		
	}
	
	public function purchaseorder_excess()
   	{
   		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/reports/po_excess_report');
	}
	
	
	public function po_excesssearch()
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$search_item_status = $this->security->xss_clean($this->input->post('search_item_status'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$store_name =$this->security->xss_clean($this->input->post('report_store'));
		$report_item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$report_item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$material_type_id =$this->security->xss_clean($this->input->post('material_type_id'));
		$material_type =$this->security->xss_clean($this->input->post('material_type'));
		$division_name =$this->security->xss_clean($this->input->post('division_name'));
		$division_id =$this->security->xss_clean($this->input->post('division_id'));
		
		//echo $search_item_status; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["po_list"] = $this->reportmodule->get_po_excess_report($sess_company,$report_from,$report_to,$vendor_id,$store_name,$report_item_name,$search_item_status,$division_name,$material_type,$division_id);
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		$this->data["search_item_status"] =$search_item_status; 
		$this->data["store_name"] =$store_name; 
		$this->data["report_item_id"] =$report_item_id; 
		$this->data["report_item_name"] =$report_item_name; 
		$this->data["division_name"] = $division_name;
		$this->data["division_id"] = $division_id;
		$this->data["material_type"] = $material_type;
		$this->data["material_type_id"] = $material_type_id;	
		
		
		if(isset($_POST['export']))
		{
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->load->view('pages/reports/pdf/po_excess_report', $this->data);
		}
		else if($_POST['generate'])
		{
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		$this->_render('pages/reports/po_excess_report');
		}
		else
		{
			redirect('reports/po_excesssearch');
		}
		
		
	}
	
	// Purchase Order Search Report List
	public function purchase_ordersearch()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$search_item_status = $this->security->xss_clean($this->input->post('search_item_status'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$store_name =$this->security->xss_clean($this->input->post('report_store'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["po_list"] = $this->reportmodule->get_report_purchase_order($sess_company,$report_from,$report_to,$vendor_id,$store_name,$search_item_status);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		$this->data["search_item_status"] =$search_item_status; 
		$this->data["store_name"] =$store_name; 
		
	
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/purchase_order_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Purchase Order";
			$this->keywords = "Purchase Order";
			$this->_render('pages/reports/purchase_order_reports');
		}
		else
		{
			redirect('reports/purchase_ordersearch');
		}
		
		
		
	}
	
	
	 public function purchase_generate_flow_report()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["po_list"] = $this->reportmodule->get_purchase_flow_report($sess_company,$report_from,$report_to,$vendor_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/reports/purchase_flow_report');
	}
	public function export_purchase_order()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["sess_company"] =$sess_company;
		
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$store_name =$this->security->xss_clean($this->input->post('report_name'));
		$search_item_status = $this->security->xss_clean($this->input->post('search_item_status'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["po_list"] = $this->reportmodule->get_report_purchase_order($sess_company,$report_from,$report_to,$vendor_id,$store_name,$search_item_status);
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		
		/*Ex-cel Genrations*/
	   $this->load->view('pages/reports/pdf/purchase_order_reports', $this->data);
	 }
	 
	public function reports_list()
    { 
		$this->title = "Purchase Invoice";
		$this->keywords = "Purchase Invoice";
		$this->_render('pages/reports/purchase_invoice_reports');
	}
	
	public function reportssearch()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		 
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
	   
		$this->data["invoice_list"] = $this->reportmodule->get_report_purchase_invoice($sess_company,$report_from,$report_to,$vendor_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
 		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		
		$this->title = "Purchase Invoice";
		$this->keywords = "Purchase Invoice";
		$this->_render('pages/reports/purchase_invoice_reports');
	 }
	 
	 
	public function export_purchase_invoice()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
	   
		$this->data["invoice_list"] = $this->reportmodule->get_report_purchase_invoice($sess_company,$report_from,$report_to,$vendor_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
 		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;

		/*Ex-cel Genrations*/
	   $this->load->view('pages/reports/pdf/purchase_invoice_reports', $this->data);
	 }
	 
	 public function po_indent_list()
   	 {
		$Result_loc = $this->reportmodule->get_all_indent_loc();
		$this->data["loc_list"] = $Result_loc['rows'];
		
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		$this->_render('pages/reports/purchase_indent_report');
	 }
	
	 public function po_indent_search()
     {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$Result_loc = $this->reportmodule->get_all_indent_loc();
		$this->data["loc_list"] = $Result_loc['rows'];
		
		$location = $this->security->xss_clean($this->input->post('location'));
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$search_item_status = $this->security->xss_clean($this->input->post('search_item_status'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$store_name =$this->security->xss_clean($this->input->post('store_name'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		  
		$this->data["po_ind_list"] = $this->reportmodule->get_report_purchase_indent($sess_company,$report_from,$report_to,$vendor_id,$location,$store_name,$search_item_status);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
 		$this->data["vendor_id"] =$vendor_id;
		$this->data["vendor_name"] =$vendor_name;
		$this->data["store_name"] =$store_name;
		$this->data["location"] =$location;  
		$this->data["search_item_status"] =$search_item_status;  

		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/purchase_indent_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Purchase Order";
			$this->keywords = "Purchase Order";
			$this->_render('pages/reports/purchase_indent_report');
		}
		else
		{
			redirect('reports/po_indent_search');
		}
	 }
	 
	 public function export_po_indent()
     {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;
		
		$location = $this->security->xss_clean($this->input->post('location'));
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$store_name =$this->security->xss_clean($this->input->post('store_name'));
		$search_item_status = $this->security->xss_clean($this->input->post('search_item_status'));
		
		//echo "<pre>"; print_r(); exit;
		
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["po_ind_list"] = $this->reportmodule->get_report_purchase_indent($sess_company,$report_from,$report_to,$vendor_id,$location,$store_name,$search_item_status);

		//echo "<pre>"; print_r($this->data["po_ind_list"]); exit;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
 		$this->data["vendor_id"] =$vendor_id;
		$this->data["store_name"] =$store_name;
		$this->data["vendor_name"] =$vendor_name;
		$this->data["location"] =$location;
		$this->data["search_item_status"] =$search_item_status;
		
	   	$this->load->view('pages/reports/pdf/purchase_indent_report', $this->data);
       
	 }
	 
	 // Auto complete search for Product Group
	public function report_search_product_group()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_product_group($q);
		}
	}
	 
	 // Auto complete search for Customer name
	public function report_search_customer_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_enroll_name($q);
		}
	}
	
	// Auto complete search for Region name
	public function report_search_region_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_region_name($q);
		}
	}
	
	// Auto complete search for Zone name
	public function report_search_zone_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_zone_name($q);
		}
	}
	
	// Auto complete search for area name
	public function report_search_area_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_area_name($q);
		}
	}
	
	// Auto complete search for salesman name
	public function report_search_salesman_name()
	{
		if (isset($_GET['term']))
		{
		  $q = strtolower($_GET['term']);
		  $this->reportmodule->report_autosearch_salesman_name($q);
		}
	}
	
	public function salesorder_list()
   	{
		$sessionData = $this->session->userdata('userlogin');
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->_render('pages/reports/sales_order_repotrs');
	}
	 
	public function sales_ordersearch()
    {
		
    	$sessionData = $this->session->userdata('userlogin');
		//echo "<pre>"; print_r($sessionData); exit;
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$region_id = $this->security->xss_clean($this->input->post('report_region_id'));
		$region_name = $this->security->xss_clean($this->input->post('report_region_name'));
		$zone_id = $this->security->xss_clean($this->input->post('report_zone_id'));
		$zone_name = $this->security->xss_clean($this->input->post('report_zone_name'));
		$area_id = $this->security->xss_clean($this->input->post('report_area_id'));
		$area_name = $this->security->xss_clean($this->input->post('report_area_name'));
		$salesman_id = $this->security->xss_clean($this->input->post('report_salesman_id'));
		$salesman_name = $this->security->xss_clean($this->input->post('report_salesman_name'));
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["so_list"] = $this->reportmodule->get_report_sales_order($sess_user,$report_from,$report_to,$customer_id,$region_id,$zone_id,$area_id,$salesman_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		$this->data["region_id"] = $region_id;
		$this->data["region_name"] = $region_name;
		$this->data["zone_id"] = $zone_id;
		$this->data["zone_name"] = $zone_name;
		$this->data["area_id"] = $area_id;
		$this->data["area_name"] = $area_name;
		$this->data["salesman_id"] = $salesman_id;
		$this->data["salesman_name"] = $salesman_name;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_order_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Order Report";
			$this->keywords = "Sales Order Report";
			$this->_render('pages/reports/sales_order_repotrs');
		}
		else
		{
			redirect('reports/salesorder_list');
		}
		
		
	}
	
	public function purchaseinvoice_summary_report()
   	{
		$this->title = "Purchase Invoice Summary Report";
		$this->keywords = "Purchase Invoice Summary Report";
		$this->_render('pages/reports/purchase_invoice_summary_reports');
	}
	
	public function purchaseinvoice_collection_report()
   	{
		$this->title = "Purchase Invoice Summary Report";
		$this->keywords = "Purchase Invoice Summary Report";
		$this->_render('pages/reports/purchase_invoice_collection_reports');
	}
	
	public function salesinvoice_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->data['sess_user_group'] = $sess_group;
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->_render('pages/reports/sales_invoice_reports');
	}
	public function salesreturn_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->data['sess_user_group'] = $sess_group;
		$this->title = "Sales Return";
		$this->keywords = "Sales Return";
		$this->_render('pages/reports/sales_return_report');
	}
	public function sales_invoice_incentive_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales Invoice Incentive Report";
		$this->keywords = "Sales Invoice Incentive Report";
		$this->_render('pages/reports/sales_invoice_incentive_report');
	}
	
	public function sales_incentive_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		
		$this->data["sess_user"] = $sess_user;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales  Incentive Report";
		$this->keywords = "Sales  Incentive Report";
		$this->_render('pages/reports/sales_incentive_report');
	}
	
	public function sales_transaction_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		
		$this->data["sess_user"] = $sess_user;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales  Incentive Report";
		$this->keywords = "Sales  Incentive Report";
		$this->_render('pages/reports/sales_transaction_report');
	}
	
	public function level_report_count()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		
		$this->data["sess_user"] = $sess_user;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Level Report";
		$this->keywords = "Level Report";
		$this->_render('pages/reports/level_report_count');
	}
	
	public function awards_rewards_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		
		$this->data["sess_user"] = $sess_user;
		
		$this->title = "Awards and Rewards";
		$this->keywords = "Awards and Rewards";
		$this->_render('pages/reports/awards_rewards_report');
	}
	
	public function awards_rewards_report_user()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		
		$this->data["sess_user"] = $sess_user;
		
		$this->title = "Awards and Rewards";
		$this->keywords = "Awards and Rewards";
		$this->_render('pages/reports/awards_rewards_report_user');
	}
	
public function level_reportsearch()
    {
    	$sessionData = $this->session->userdata('userlogin');
		//echo "<pre>"; print_r($sessionData); exit;
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$user_code=$sessionData['user_code'];
		
		$report_officer = $this->security->xss_clean($this->input->post('report_officer'));
		
		
		$this->data["po_list"] = $this->reportmodule->get_enrollement_reportsearch($sess_company,$user_code, $report_officer);
		
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/level_report_count', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Level Report";
			$this->keywords = "Level Report";
			$this->_render('pages/reports/level_report_count');
		}
		else
		{
			redirect('reports/level_report_count');
		}
		
		
	}
	
	public function awards_rewardssearch()
    {
    	$sessionData = $this->session->userdata('userlogin');
		//echo "<pre>"; print_r($sessionData); exit;
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$user_code=$sessionData['user_code'];
		
		$report_officer = $this->security->xss_clean($this->input->post('report_officer'));
		
		
		$this->data["po_list"] = $this->reportmodule->get_enrollement_reportsearch($sess_company,$user_code, $report_officer);
		
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/awards_rewards_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Awards and Rewards";
			$this->keywords = "Awards and Rewards";
			$this->_render('pages/reports/awards_rewards_report');
		}
		else
		{
			redirect('reports/awards_rewards_report');
		}
		
		
	}
	
	public function salesinvoice_collection_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales Invoice Collection Report";
		$this->keywords = "Sales Invoice Collection Report";
		$this->_render('pages/reports/sales_invoice_collection_reports');
	}
	
	public function sales_reportssearch($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$region_id = $this->security->xss_clean($this->input->post('report_region_id'));
		$region_name = $this->security->xss_clean($this->input->post('report_region_name'));
		$zone_id = $this->security->xss_clean($this->input->post('report_zone_id'));
		$zone_name = $this->security->xss_clean($this->input->post('report_zone_name'));
		$area_id = $this->security->xss_clean($this->input->post('report_area_id'));
		$area_name = $this->security->xss_clean($this->input->post('report_area_name'));
		$salesman_id = $this->security->xss_clean($this->input->post('report_salesman_id'));
		$salesman_name = $this->security->xss_clean($this->input->post('report_salesman_name'));
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_invoice($sess_group,$sess_company,$report_from,$report_to,$customer_id,$region_id,$zone_id,$area_id,$salesman_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		$this->data["region_id"] = $region_id;
		$this->data["region_name"] = $region_name;
		$this->data["zone_id"] = $zone_id;
		$this->data["zone_name"] = $zone_name;
		$this->data["area_id"] = $area_id;
		$this->data["area_name"] = $area_name;
		$this->data["salesman_id"] = $salesman_id;
		$this->data["salesman_name"] = $salesman_name;
		$this->data["sess_user_group"] = $sess_group;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_invoice_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/sales_invoice_reports');
		}
		else
		{
			redirect('reports/salesinvoice_report');
		}
		
		
	 }
	 public function sales_returnsearch($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$region_id = $this->security->xss_clean($this->input->post('report_region_id'));
		$region_name = $this->security->xss_clean($this->input->post('report_region_name'));
		$zone_id = $this->security->xss_clean($this->input->post('report_zone_id'));
		$zone_name = $this->security->xss_clean($this->input->post('report_zone_name'));
		$area_id = $this->security->xss_clean($this->input->post('report_area_id'));
		$area_name = $this->security->xss_clean($this->input->post('report_area_name'));
		$salesman_id = $this->security->xss_clean($this->input->post('report_salesman_id'));
		$salesman_name = $this->security->xss_clean($this->input->post('report_salesman_name'));
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_return($sess_group,$sess_company,$report_from,$report_to,$customer_id,$region_id,$zone_id,$area_id,$salesman_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		$this->data["region_id"] = $region_id;
		$this->data["region_name"] = $region_name;
		$this->data["zone_id"] = $zone_id;
		$this->data["zone_name"] = $zone_name;
		$this->data["area_id"] = $area_id;
		$this->data["area_name"] = $area_name;
		$this->data["salesman_id"] = $salesman_id;
		$this->data["salesman_name"] = $salesman_name;
		$this->data["sess_user_group"] = $sess_group;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_return_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Return";
			$this->keywords = "Sales Return";
			$this->_render('pages/reports/sales_return_report');
		}
		else
		{
			redirect('reports/salesreturn_report');
		}
		
		
	 }
	 public function sales_invoice_incentive_details($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		
		//echo $sess_group; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_incentive($sess_group,$sess_user,$report_from,$report_to,$customer_id);
		//echo "<pre>"; print_r($this->data["invoice_list"]); exit;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_invoice_incentive_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/sales_invoice_incentive_report');
		}
		else
		{
			redirect('reports/salesinvoice_summary_report');
		}
		
		
	 }
	 
	 public function view_summary_salesincentive()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["incentive_item"]=$this->reportmodule->get_sales_incentive($id);
		
		$this->title = "Sales Incentive";
		$this->keywords = "Sales Incentive";
		$this->load->view('pages/reports/view_summary_salesincentive', $this->data);
		
	}
	
	public function view_officer_salesincentive()
	{	
		$id = $this->input->post('search_id');
		$report_from_date = $this->input->post('report_from');
		$report_to_date = $this->input->post('report_to');
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["incentive_item"]=$this->reportmodule->get_officer_incentive($id,$report_from,$report_to);
		
		$this->title = "Sales Incentive";
		$this->keywords = "Sales Incentive";
		$this->load->view('pages/reports/view_summary_salesincentive', $this->data);
		
	}
	
	
	public function view_officer_salesredeem()
	{	
		$id = $this->input->post('search_id');
		$report_from_date = $this->input->post('report_from');
		$report_to_date = $this->input->post('report_to');
		$payment_status =$this->security->xss_clean($this->input->post('payment_status'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["incentive_item"]=$this->reportmodule->get_officer_redeem($id,$report_from,$report_to,$payment_status);
		
		$this->title = "Sales Incentive";
		$this->keywords = "Sales Incentive";
		$this->load->view('pages/reports/view_summary_salesredeem', $this->data);
		
	}
	
	public function sales_incentive_details($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		
		//echo $customer_id; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_usr_sales_incentive($sess_group,$sess_user,$report_from,$report_to,$customer_id);
		//echo "<pre>"; print_r($this->data["invoice_list"]); exit;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		$this->data["sess_user"] = $sess_user;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_incentive_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/sales_incentive_report');
		}
		else
		{
			redirect('reports/sales_incentive_report');
		}
		
		
	 }
	 
	 public function sales_transaction_details($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$payment_status =$this->security->xss_clean($this->input->post('payment_status'));
		
		//echo $payment_status; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_usr_sales_transaction($sess_group,$sess_user,$report_from,$report_to,$customer_id,$payment_status);
		//echo "<pre>"; print_r($this->data["invoice_list"]); exit;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		$this->data["sess_user"] = $sess_user;
		
		$saletransaction_search= array(
					'report_from' => $report_from,
					'report_to' => $report_to,
					'payment_status' =>$payment_status,
 					
					);	
			$this->session->set_userdata('sales_order_data',$saletransaction_search);
			//echo "ss".$search_so['payment_status']; exit;
			$search_data = $this->session->userdata('sales_order_data');
						
			$search_so_order = $search_data['payment_status'];
		
			
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_transaction_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/sales_transaction_report');
		}
		else
		{
			redirect('reports/sales_transaction_report');
		}
		
		
	 }
	 
	 public function customer_incentive_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		
		$this->data["sess_user"] = $sess_user;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales  Incentive Report";
		$this->keywords = "Sales  Incentive Report";
		$this->_render('pages/reports/customer_incentive_report');
	}
	
	 public function customer_incentive_details($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		$this->data["invoice_list"] = $this->reportmodule->get_customer_incentive($sess_group,$sess_user,$customer_id);
		//echo "<pre>"; print_r($this->data["invoice_list"]); exit;
		
		
		if(isset($_POST['incentive_sms']))
		{
			//echo "<pre>"; print_r($this->data["invoice_list"]); exit;
					foreach($this->data["invoice_list"] as $SI)
					{
						$usr_incentive_total = $SI['incentive_amt'] - $SI['redeem_amt'];
						// echo $usr_incentive_total;
						 
						 if($usr_incentive_total >= 100)
						 {
						//SMS Integration
						//For Sms---------------------------------------------------------------------------------
						/* $strmsg = "Hi ".$SI['OFCR_NAME']." [".$SI['OFCR_USR_VALUE']."] ";
						$strmsg .= "you have Rs. ".$usr_incentive_total."/- in your AGRO WALLET now you can redeem it for your next purchase."." ";
						$strmsg .= "Visit :http://agroreforming.com/"." ";
						//echo $strmsg; exit;

						 $url='http://smsserver9.creativepoint.in/api.php?username=agro&password=605649&to='.$SI['OFCR_MOB'].'&from=INAGRO&message='.urlencode($strmsg).'';
						$ch = curl_init($url);
						$get_url=$url;
						curl_setopt($ch, CURLOPT_POST,0);
						curl_setopt($ch, CURLOPT_URL, $get_url);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
						curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
						$return_val = curl_exec($ch);
						//echo $return_val;	
						$sms_details = array(
						'user_id' => $SI['OFCR_USR_VALUE'],
						'phone_no' => $SI['OFCR_MOB'],
						'message' => $strmsg,
						'created_date' => date('Y-m-d'),
						'response' => $return_val,
						);

						$this->reportmodule->insertSMSDetails($sms_details); 
						*/
						
						 }
					}
					redirect('reports/customer_incentive_report');
			
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/customer_incentive_report');
		}
		else
		{
			redirect('reports/customer_incentive_report');
		}
		
		
	 }
	 
	public function sales_collection_reportssearch($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_collection($sess_company,$report_from,$report_to,$customer_id);
		
		$this->data["total_values"] = $this->reportmodule->get_total_sales_collection($sess_company,$report_from,$report_to,$customer_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_invoice_collection_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/sales_invoice_collection_reports');
		}
		else
		{
			redirect('reports/salesinvoice_collection_report');
		}
	 }
	 
	 public function salesinvoice_due_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		//$company_tax=$sessionData['company_tax'];
		//echo $company_tax ; exit;
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Sales Invoice Collection Report";
		$this->keywords = "Sales Invoice Collection Report";
		$this->_render('pages/reports/sales_invoice_due_reports');
	}
	
	public function sales_due_reportssearch($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_due($sess_company,$report_from,$report_to,$customer_id);
		
		$this->data["total_values"] = $this->reportmodule->get_total_sales_due($sess_company,$report_from,$report_to,$customer_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/sales_invoice_due_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/reports/sales_invoice_due_reports');
		}
		else
		{
			redirect('reports/salesinvoice_due_report');
		}
	 }
	 
	public function view_sales_invoice_income_receipt()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["receipt"] = $this->reportmodule->get_sales_invoice_income($id);
		
		$this->load->view('pages/reports/view_sales_invoice_collections', $this->data);
		
	}
	 
	public function purchase_summary_reportssearch($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$vendor = $this->security->xss_clean($this->input->post('vendor'));
		$report_vendor = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_purchase_invoice($sess_company,$report_from,$report_to,$vendor);
		//$this->data["invoice_list_summary"] = $this->reportmodule->get_item_invoice_summary($sess_company,$report_from,$report_to,$vendor);
		
		//$this->data["invoice_list"] = $this->reportmodule->get_report_sales_invoice($sess_company,$report_from,$report_to,$customer_id,$region_id,$zone_id,$area_id,$salesman_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["vendor"] = $vendor;
		$this->data["report_vendor"] = $report_vendor;
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/purchase_invoice_summary_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Purchase Invoice";
			$this->keywords = "Purchase Invoice";
			$this->_render('pages/reports/purchase_invoice_summary_reports');
		}
		else
		{
			redirect('reports/purchaseinvoice_summary_report');
		}
		
		
	 }
	  public function purchase_collection_reportssearch($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$vendor = $this->security->xss_clean($this->input->post('vendor'));
		$report_vendor = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_purchase_collection($sess_company,$report_from,$report_to
		,$vendor);
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["vendor"] = $vendor;
		$this->data["report_vendor"] = $report_vendor;
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/purchase_invoice_collection_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Purchase  Collection Report";
			$this->keywords = "Purchase  Collection";
			$this->_render('pages/reports/purchase_invoice_collection_reports');
		}
		else
		{
			redirect('reports/purchaseinvoice_collection_report');
		}
		
		
	 }
	 
	public function dc_list()
   	{
		$this->title = "Delivery Challan";
		$this->keywords = "Delivery Challan";
		$this->_render('pages/reports/delivery_challan_repotrs');
	}
	 
	public function dc_search()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$region_id = $this->security->xss_clean($this->input->post('report_region_id'));
		$region_name = $this->security->xss_clean($this->input->post('report_region_name'));
		$zone_id = $this->security->xss_clean($this->input->post('report_zone_id'));
		$zone_name = $this->security->xss_clean($this->input->post('report_zone_name'));
		$area_id = $this->security->xss_clean($this->input->post('report_area_id'));
		$area_name = $this->security->xss_clean($this->input->post('report_area_name'));
		$salesman_id = $this->security->xss_clean($this->input->post('report_salesman_id'));
		$salesman_name = $this->security->xss_clean($this->input->post('report_salesman_name'));
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["dc_list"] = $this->reportmodule->get_report_delivery_challan($sess_company,$report_from,$report_to,$customer_id,$region_id,$zone_id,$area_id,$salesman_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		$this->data["region_id"] = $region_id;
		$this->data["region_name"] = $region_name;
		$this->data["zone_id"] = $zone_id;
		$this->data["zone_name"] = $zone_name;
		$this->data["area_id"] = $area_id;
		$this->data["area_name"] = $area_name;
		$this->data["salesman_id"] = $salesman_id;
		$this->data["salesman_name"] = $salesman_name;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/delivery_challan_repotrs', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Delivery Challan";
			$this->keywords = "Delivery Challan";
			$this->_render('pages/reports/delivery_challan_repotrs');
		}
		else
		{
			redirect('reports/dc_list');
		}
	 }
	 
	 
	
	 
	public function export_stock_report()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;

		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$report_to =date("Y-m-d", strtotime($report_to_date));
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$Result = $this->reportmodule->get_all_stock_export($sess_company,$report_from,$report_to);
		$this->data["stock_list"] = $Result['rows'];
		// echo "<PRE>";print_r($this->data["si_list"]);exit;
		$this->title = "Stock Reports";
		$this->keywords = "Sales Invoice";
		/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/stock_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_stock_reports.pdf");
	 }
	 
	public function salesman_report_list()
   	{
   		$this->data["sales_man"] = $this->reportmodule->get_sales_person();
    	
		$this->title = "Salesman Report";
		$this->keywords = "Salesman Report";
		$this->_render('pages/reports/salesman_order_repotrs');
	}
	
	public function salesman_search($sort_order='sales_order_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

    	$this->data["sales_man"] = $this->reportmodule->get_sales_person();
    	
		$limit =10;
		if($this->uri->segment(7)== "")
		 {
		  $sales_man = $this->security->xss_clean($this->input->post('sales_man'));
		  $report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		  $report_from =  date("Y-m-d", strtotime($report_from_date));
		  $report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		  $report_to =date("Y-m-d", strtotime($report_to_date));
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $Result = $this->reportmodule->get_all_so_man($sess_company,$limit,$page,$sort_order,$sort_by,$report_from,$report_to,$sales_man);
		  $config['base_url'] = site_url('reports/salesman_search').'/'.$sort_order.'/'.$sort_by.'/'.$report_from.'/'.$report_to.'/'.$sales_man;
		  $this->data["report_from"] =$report_from;
		  $this->data["report_to"] =$report_to;
		  $this->data["sales_man"] =$sales_man;
		 }
		else
		 {
		  $report_from=$this->uri->segment(5);
		  $report_to=$this->uri->segment(6);
		  $sales_man=$this->uri->segment(7);
		  $page = $this->uri->segment(8) ? $this->uri->segment(8) : 0;
		  $Result = $this->reportmodule->search_all_so_man($sess_company,$limit,$page,$sort_order,$sort_by);
		  $config['base_url'] = site_url('reports/salesman_search').'/'.$sort_order.'/'.$sort_by.'/'.$report_from.'/'.$report_to.'/'.$sales_man;
		  $this->data["report_from"] =$report_from;
		  $this->data["report_to"] =$report_to;
		  $this->data["sales_man"] =$sales_man;
		 }
		  //echo "<PRE>";print_r( $Result);exit;
		$this->data["so_list"] = $Result['rows'];
		$config['uri_segment']=8;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->_render('pages/reports/salesman_order_repotrs');
	 }
	 
	public function export_salesman_report()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["sess_company"] =$sess_company;
		$this->data["sales_man"] = $this->reportmodule->get_sales_person();

		$sales_man = $this->security->xss_clean($this->input->post('sales_man'));
		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$report_to =date("Y-m-d", strtotime($report_to_date));
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$Result = $this->reportmodule->get_all_so_man_export($sess_company,$report_from,$report_to,$sales_man);
		$this->data["so_list"] = $Result['rows'];
		$this->title = "Slaes Man";
		$this->keywords = "Sales Man";
		/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/salesman_order_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_sales_man_reports.pdf");
	 }
	 
	public function daily_report_list_sales()
   	{
		$this->title = "Daily Sales Invoice";
		$this->keywords = "Daily Sales Invoice";
		$this->_render('pages/reports/daily_sales_invoice_reports');
	}
	
	public function daily_reports_sales($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$limit =10;
		if($this->uri->segment(6)== "")
		 {
		  $report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		  $report_from =  date("Y-m-d", strtotime($report_from_date));
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $Result = $this->reportmodule->search_get_all_SI_today($sess_company,$limit,$page,$sort_order,$sort_by,$report_from);
		  $config['base_url'] = site_url('reports/sales_reportssearch').'/'.$sort_order.'/'.$sort_by.'/'.$report_from;
		  $this->data["report_from"] =$report_from;
		 }
		else
		 {
		  $report_from=$this->uri->segment(5);
		  $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
		  $Result = $this->reportmodule->search_all_SI_today($sess_company,$limit,$page,$sort_order,$sort_by);
		  $config['base_url'] = site_url('reports/sales_reportssearch').'/'.$sort_order.'/'.$sort_by.'/'.$report_from;
		  $this->data["report_from"] =$report_from;
		 }
		$this->data["invoice_list"] = $Result['rows'];
		$config['uri_segment']=6;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Daily Sales Invoice";
		$this->keywords = "Daily Sales Invoice";
		$this->_render('pages/reports/daily_sales_invoice_reports');
	}
	 
	public function export_daily_reports_sales()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$this->data["report_from"] =$report_from;
		$Result = $this->reportmodule->get_all_SI_export_today($sess_company,$report_from);
		$this->data["si_list"] = $Result['rows'];
		 //echo "<PRE>";print_r($this->data["si_list"]);exit;
		$this->title = "Daily Sales Invoice";
		$this->keywords = "Daily Sales Invoice";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/daily_sales_invoice_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_daily_sales_invoice_reports.pdf");
	 }
	
	public function purchase_flow_report()
   	{
   		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/reports/purchase_flow_report');
	}
	
	public function daily_report_list_purchase()
	{ 
		$this->title = "Daily Purchase Invoice";
		$this->keywords = "Daily Purchase Invoice";
		$this->_render('pages/reports/daily_purchase_invoice_reports');
	}
	
	public function daily_reports_purchase($sort_order='po_invoice_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$limit =10;
		if($this->uri->segment(6)== "")
		{
		  $report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		  $report_from =  date("Y-m-d", strtotime($report_from_date));
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $Result = $this->reportmodule->get_po_invoice_today($sess_company,$limit,$page,$sort_order,$sort_by,$report_from);
		  $config['base_url'] = site_url('reports/reportssearch').'/'.$sort_order.'/'.$sort_by.'/'.$report_from;
		  $this->data["report_from"] =$report_from;
		 }
		 else
		  {
			  $report_from=$this->uri->segment(5);
			  $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			  $Result = $this->reportmodule->get_po_invoice_search_today($sess_company,$limit,$page,$sort_order,$sort_by);
			  $config['base_url'] = site_url('reports/reportssearch').'/'.$sort_order.'/'.$sort_by.'/'.$report_from;
			  $this->data["report_from"] =$report_from;
		   }
		
		$this->data["invoice_list"] = $Result['rows'];
		$config['uri_segment']=6;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Daily Purchase Invoice";
		$this->keywords = "Daily Purchase Invoice";
		$this->_render('pages/reports/daily_purchase_invoice_reports');
		 
	 }
	 
	public function export_daily_reports_purchase()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$this->data["report_from"] =$report_from;
		$Result = $this->reportmodule->get_all_PI_export_today($sess_company,$report_from);
		$this->data["pi_list"] = $Result['rows'];
		 //echo "<PRE>";print_r($this->data["pi_list"]);exit;
		$this->title = "Daily Purchase Invoice";
		$this->keywords = "Daily Purchase Invoice";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/daily_purchase_invoice_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_daily_purchase_invoice_reports.pdf");
	 }

	 
	 

	public function cus_acc_list($sort_order='customer_id',$sort_by='desc')
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result = $this->reportmodule->search_get_customer($limit,$page,$sort_order,$sort_by);
			$this->data["customer_list"] = $Result['rows'];
			//echo "<pre>"; print_r($this->data["customer_list"]);exit;
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('reports/cus_acc_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		
		$this->title = "Customer Accounts";
		$this->keywords = "Customer Accounts";
		$this->_render('pages/reports/customer_accounts');
	}

	public function export_cus_account()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["sess_company"] =$sess_company;
		
		$Result = $this->reportmodule->get_all_customer_export();
		$this->data["cus_list"] = $Result['rows'];
		//echo "<PRE>";print_r($this->data["so_list"]);exit;
		$this->title = "Customer Accounts";
		$this->keywords = "Customer Accounts";
		/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/customer_accounts_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_customer_accounts_reports.pdf");
	 }

	public function vendor_acc_list($sort_order='vendor_id',$sort_by='desc')
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result = $this->reportmodule->search_get_vendor($limit,$page,$sort_order,$sort_by);
			$this->data["vendor_list"] = $Result['rows'];
			//echo "<pre>"; print_r($this->data["vendor_list"]);exit;
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('reports/vendor_acc_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		
		$this->title = "Customer Accounts";
		$this->keywords = "Customer Accounts";
		$this->_render('pages/reports/vendor_accounts');
	}

	public function export_ven_account()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["sess_company"] =$sess_company;
		
		$Result = $this->reportmodule->get_all_vendor_export();
		$this->data["ven_list"] = $Result['rows'];
		//echo "<PRE>";print_r($this->data["so_list"]);exit;
		$this->title = "Customer Accounts";
		$this->keywords = "Customer Accounts";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/vendor_accounts_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_vendor_accounts_reports.pdf");
	 }
	 
	 
/*montnly  purchase Reports */	 

	public function monthly_report_list_purchase()
	{ 
		$this->title = "Monthly Purchase Invoice";
		$this->keywords = "Monthly Purchase Invoice";
		$this->_render('pages/reports/monthly_purchase_invoice_reports');
	}
	
	public function monthly_reports_purchase($sort_order='po_invoice_id',$sort_by='desc')
    
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$limit =10;
		if($this->uri->segment(6) == "")
		{
		
		  $month = $this->security->xss_clean($this->input->post('month'));
		  $year = $this->security->xss_clean($this->input->post('year'));
		   
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  
		  $Result = $this->reportmodule->get_po_invoice_month($sess_company,$limit,$page,$sort_order,$sort_by,$month,$year);
		  
		  $config['base_url'] = site_url('reports/monthly_reports_purchase').'/'.$sort_order.'/'.$sort_by.'/'.$month.'/'.$year;
		  $this->data["month"] =$month;
		  $this->data["year"] =$year;

		 }
		 else
		  {
			   
			  $month=$this->uri->segment(5);
	 		  $year=$this->uri->segment(6);
				
			  $page = $this->uri->segment(7) ? $this->uri->segment(7) : 0;
			  $Result = $this->reportmodule->get_po_invoice_search_month($sess_company,$limit,$page,$sort_order,$sort_by);
			  $config['base_url'] = site_url('reports/monthly_reports_purchase').'/'.$sort_order.'/'.$sort_by.'/'.$month.'/'.$year;
			  $this->data["month"] =$month;
		      $this->data["year"] =$year;
		   }
		
		$this->data["invoice_list"] = $Result['rows'];
		$config['uri_segment']=7;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Monthly Purchase Invoice";
		$this->keywords = "Monthly Purchase Invoice";
		$this->_render('pages/reports/monthly_purchase_invoice_reports');
		 
	 }
	 
 	public function export_monthly_reports_purchase()
    {
		//echo "test";exit;
		
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

	 	$month = $this->security->xss_clean($this->input->post('month'));
		$year = $this->security->xss_clean($this->input->post('year'));
		$this->data["month"] =$month;
		$this->data["year"] =$year;
		  
		$Result = $this->reportmodule->get_all_PI_export_month($sess_company,$month,$year);
		$this->data["pi_list"] = $Result['rows'];
		
		 //echo "<PRE>";print_r($this->data["pi_list"]);exit;
		$this->title = "Monthly Purchase Invoice";
		$this->keywords = "Monthly Purchase Invoice";
 
	   $this->pdf->load_view('pages/reports/pdf/monthly_purchase_invoice_reports', $this->data);
       $date = date('m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_Monthly_purchase_invoice_reports.pdf");
	 } 
	 
	 
	/*yearly  purchase  invoice  Reports */	 

	public function yearly_report_list_purchase()
	{ 
		$this->title = "Yearly Purchase Invoice";
		$this->keywords = "Yearly Purchase Invoice";
		$this->_render('pages/reports/yearly_purchase_invoice_reports');
	}
	
	public function yearly_reports_purchase($sort_order='po_invoice_id',$sort_by='desc')
    
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$limit =10;
		if($this->uri->segment(5) == "")
		{  
		  $year = $this->security->xss_clean($this->input->post('year'));
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $Result = $this->reportmodule->get_po_invoice_year($sess_company,$limit,$page,$sort_order,$sort_by,$year);
		  $config['base_url'] = site_url('reports/yearly_reports_purchase').'/'.$sort_order.'/'.$sort_by.'/'.$year;
		  $this->data["year"] =$year;

		 }
		 else
		  {
			 $year=$this->uri->segment(5);
			 
			 $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			 $Result = $this->reportmodule->get_po_invoice_search_year($sess_company,$limit,$page,$sort_order,$sort_by);
			 $config['base_url'] = site_url('reports/yearly_reports_purchase').'/'.$sort_order.'/'.$sort_by.'/'.$year;
			 $this->data["year"] =$year;
		   }
		
		$this->data["invoice_list"] = $Result['rows'];
		$config['uri_segment']=6;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Yearly Purchase Invoice";
		$this->keywords = "Yearly Purchase Invoice";
		$this->_render('pages/reports/yearly_purchase_invoice_reports');
		 
	 }
	 
 	 public function export_yearly_reports_purchase()
    {
		//echo "test";exit;
		
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

	 	 
		$year = $this->security->xss_clean($this->input->post('year'));
		 
		$this->data["year"] =$year;
		  
		$Result = $this->reportmodule->get_all_PI_export_year($sess_company,$year);
		$this->data["pi_list"] = $Result['rows'];
		
		 //echo "<PRE>";print_r($this->data["pi_list"]);exit;
		$this->title = "Yearly Purchase Invoice";
		$this->keywords = "Yearly Purchase Invoice";
 
	   $this->pdf->load_view('pages/reports/pdf/yearly_purchase_invoice_reports', $this->data);
       $date = date('Y');
       $this->pdf->render();
       $this->pdf->stream($date."_Yearly_purchase_invoice_reports.pdf");
	 }  
	  
	/*Monthly Sales Invoise Report*/ 
	 
	 public function monthly_report_list_sales()
   	{
		$this->title = "Monthly Sales Invoice";
		$this->keywords = "Monthly Sales Invoice";
		$this->_render('pages/reports/monthly_sales_invoice_reports');
	}	 
	
	public function monthly_reports_sales($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$limit =10;
		if($this->uri->segment(6)== "")
		 {
		 $month = $this->security->xss_clean($this->input->post('month'));
		 $year = $this->security->xss_clean($this->input->post('year'));
		   
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $Result = $this->reportmodule->search_get_all_SI_month($sess_company,$limit,$page,$sort_order,$sort_by,$month,$year); 
		  $config['base_url'] = site_url('reports/sales_reportssearch').'/'.$sort_order.'/'.$sort_by.'/'.$month.'/'.$year;
		  $this->data["month"] =$month;
		  $this->data["year"] =$year;
		 }
		else
		 {
		   $month=$this->uri->segment(5);
	 		  $year=$this->uri->segment(6);
			  
		  $page = $this->uri->segment(7) ? $this->uri->segment(7) : 0;
		  $Result = $this->reportmodule->search_all_SI_month($sess_company,$limit,$page,$sort_order,$sort_by);
		  $config['base_url'] = site_url('reports/sales_reportssearch').'/'.$sort_order.'/'.$sort_by.'/'.$month.'/'.$year;
		  $this->data["month"] =$month;
		  $this->data["year"] =$year;
		 }
		$this->data["invoice_list"] = $Result['rows'];
		$config['uri_segment']=7;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Daily Sales Invoice";
		$this->keywords = "Daily Sales Invoice";
		$this->_render('pages/reports/monthly_sales_invoice_reports');
	 } 
	 
	 public function export_monthly_reports_sales()
    {
		//echo "test";exit;
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

		 $month = $this->security->xss_clean($this->input->post('month'));
		$year = $this->security->xss_clean($this->input->post('year'));
		$this->data["month"] =$month;
		$this->data["year"] =$year;
		$Result = $this->reportmodule->get_all_SI_export_month($sess_company,$month,$year);
		$this->data["si_list"] = $Result['rows'];
		//echo "<PRE>";print_r($this->data["si_list"]);exit;
		$this->title = "Monthly Sales Invoice";
		$this->keywords = "Monthly Sales Invoice";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/monthly_sales_invoice_reports', $this->data);
       $date = date('m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_Monthly_sales_invoice_reports.pdf");
	 }
	 
	 /*Yearly Sales Invoice report*/
	 
	  public function yearly_report_list_sales()
   	{
		$this->title = "Yearly Sales Invoice";
		$this->keywords = "Yearly Sales Invoice";
		$this->_render('pages/reports/yearly_sales_invoice_reports');
	}	 
	
	public function yearly_reports_sales($sort_order='sale_invoice_id',$sort_by='desc')
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$limit =10;
		if($this->uri->segment(5)== "")
		 {
		 
		 $year = $this->security->xss_clean($this->input->post('year'));
		   
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $Result = $this->reportmodule->search_get_all_SI_year($sess_company,$limit,$page,$sort_order,$sort_by,$year); 
		  $config['base_url'] = site_url('reports/yearly_reports_sales').'/'.$sort_order.'/'.$sort_by.'/'.$year;
		  
		  $this->data["year"] =$year;
		 }
		else
		 {
		  $year=$this->uri->segment(5);
			  
		  $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
		  $Result = $this->reportmodule->search_all_SI_year($sess_company,$limit,$page,$sort_order,$sort_by);
		  $config['base_url'] = site_url('reports/yearly_reports_sales').'/'.$sort_order.'/'.$sort_by.'/'.$year;
		  
		  $this->data["year"] =$year;
		 }
		$this->data["invoice_list"] = $Result['rows'];
		$config['uri_segment']=6;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Yearly Sales Invoice";
		$this->keywords = "Yearly Sales Invoice";
		$this->_render('pages/reports/yearly_sales_invoice_reports');
	 } 
	 
	 public function export_yearly_reports_sales()
    {
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;
		$year = $this->security->xss_clean($this->input->post('year'));
		$this->data["year"] =$year;
		$Result = $this->reportmodule->get_all_SI_export_year($sess_company,$year);
		$this->data["si_list"] = $Result['rows'];
		$this->title = "Yearly Sales Invoice";
		$this->keywords = "Yearly Sales Invoice";
	   $this->pdf->load_view('pages/reports/pdf/yearly_sales_invoice_reports', $this->data);
       $date = date('Y');
       $this->pdf->render();
       $this->pdf->stream($date."_Yearly_sales_invoice_reports.pdf");
	 }
	 public function invoice_recp_list()
	 {
		$sessionData = $this->session->userdata('userlogin');
		/*$Result_cus = $this->reportmodule->get_all_customer_export();
		$this->data["customer_list"] = $Result_cus['rows'];*/
		$this->data['tax_value'] = $sessionData['company_tax'];
		$this->title = "Income Reports";
		$this->keywords = "Income Reports";
		$this->_render('pages/reports/income_reports');
		
	 }
	 public function income_search($sort_order='invoice_receipt_id',$sort_by='desc')
	 {
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
				
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
				
		$this->data["income_list"] = $this->reportmodule->search_get_all_income($sess_company,$report_from,$report_to,$customer_id);
		//echo "<pre>"; print_r($this->data["income_list"]); exit;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/income_reports', $this->data);
		}
		else if($_POST['generate'])
		{
		$this->title = "Income Reports";
		$this->keywords = "Income Reports";
		$this->_render('pages/reports/income_reports');
		}
		else
		{
			redirect('reports/invoice_recp_list');
		}
	}
	
	public function view_income_receipt_items()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["credit_details"] = $this->reportmodule->get_income_cus_items($id);
		//echo "<pre>"; print_r($this->data["credit_details"]); exit;
		$this->title = "Income receipt";
		$this->keywords = "Income receipt";
		$this->load->view('pages/reports/view_income_receipt_items', $this->data);
		
	}
	  
	public function payment_recp_list()
	{
		$sessionData = $this->session->userdata('userlogin');
		
		$this->data['tax_value'] = $sessionData['company_tax'];
		
		$this->title = "Payment Reports";
		$this->keywords = "Payment Reports";
		$this->_render('pages/reports/payment_reports');
	} 
	
	public function payment_recp_search($sort_order='payment_receipt_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['tax_value'] = $sessionData['company_tax'];
		
		$vendor_id = $this->security->xss_clean($this->input->post('vendor'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_vendor'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		 
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		$this->data["payment_list"] = $this->reportmodule->get_pay_vendor_invoice($sess_company,$report_from,$report_to,$vendor_id);
		//echo "<pre>"; print_r($this->data["payment_list"]);  exit;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["vendor_id"] = $vendor_id;
		$this->data["vendor_name"] = $vendor_name;
		  
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/payment_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Payment Receipt Reports";
			$this->keywords = "Payment Receipt Reports";
			$this->_render('pages/reports/payment_reports');
		}
		else
		{
			redirect('reports/payment_recp_list');
		} 
	 }
	 
	public function view_payment_receipt_items()
	{	
		$id = $this->input->post('search_id');
		$this->data["receipt_summary"] = $this->reportmodule->get_pay_ven_items($id);
		$this->load->view('pages/reports/view_payment_receipt_items', $this->data);
	}
	 
	public function export_payment_recp()
    {
		 
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$report_to =date("Y-m-d", strtotime($report_to_date));
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$Result = $this->reportmodule->get_pay_rec_export($sess_company,$report_from,$report_to);
		$this->data["pay_list"] = $Result['rows'];
		//  echo "<PRE>";print_r($this->data["pay_list"]);exit;
		$this->title = "Purchase Invoice";
		$this->keywords = "Purchase Invoice";
	 
	   $this->pdf->load_view('pages/reports/pdf/payment_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_payment_reports.pdf");
	 }
	 
	 public function export_ven_payment_recp()
    {
		 
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] =$sess_company;

		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$report_to =date("Y-m-d", strtotime($report_to_date));
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$vendor = $this->security->xss_clean($this->input->post('vendor'));
		$this->data["vendor"] =$vendor;
		
		$Result = $this->reportmodule->get_ven_pay_rec_export($sess_company,$report_from,$report_to,$vendor);
		$this->data["pay_list"] = $Result['rows'];
		//  echo "<PRE>";print_r($this->data["pay_list"]);exit;
		$this->title = "Purchase Invoice";
		$this->keywords = "Purchase Invoice";
	 
	   $this->pdf->load_view('pages/reports/pdf/payment_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_payment_reports.pdf");
	 }
	 
	 
	public function item_sales_report()
   	{
		$this->title = "Sales Reports";
		$this->keywords = "Sales Reports";
		$this->_render('pages/reports/item_sales_report');
	}
	public function items_general_report()
   	{
		$this->title = "General Reports";
		$this->keywords = "General Reports";
		$this->_render('pages/reports/item_general_report');
	}
	
	public function items_general_salesreturn_report()
   	{
		$this->title = "General Reports";
		$this->keywords = "General Reports";
		$this->_render('pages/reports/item_general_salesreturn_report');
	}
	
	public function item_sales_generate_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$item_code =$this->security->xss_clean($this->input->post('report_item_code'));
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$item_mfg =$this->security->xss_clean($this->input->post('report_item_mfg'));
		$customer =$this->security->xss_clean($this->input->post('report_customer'));
		$cus_id =$this->security->xss_clean($this->input->post('report_cus_id'));
		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		//echo $item_id;
		$this->data["sales_item_list"] = $this->reportmodule->get_all_item_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$cus_id,$report_from,$report_to);
		$this->data["product_id"] =$item_id;
		$this->data["customer_id"] =$cus_id;
		$this->data["customer_name"] =$customer;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		
		$this->title = "Sales Report";
		$this->keywords = "Sales Report";
		$this->_render('pages/reports/item_sales_report');
	
    	
	}
	
	
	
	public function item_wise_general_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$item_code =$this->security->xss_clean($this->input->post('report_item_code'));
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$item_mfg =$this->security->xss_clean($this->input->post('report_item_mfg'));
		$customer =$this->security->xss_clean($this->input->post('report_customer'));
		$cus_id =$this->security->xss_clean($this->input->post('report_cus_id'));
		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
			
		$this->data["sales_item_list"] = $this->reportmodule->get_all_item_general_report_new($sess_company,$item_name,$item_code,$item_id,$item_mfg,$cus_id,$report_from,$report_to);
		$this->data["product_id"] =$item_id;
		$this->data["customer_id"] =$cus_id;
		$this->data["customer_name"] =$customer;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		
		//$this->title = "Sales Report";
		//$this->keywords = "Sales Report";
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/item_general_summary_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Summary Report";
			$this->keywords = "Sales Summary Report";
			$this->_render('pages/reports/item_general_report');
		}
		else
		{
			$this->_render('pages/reports/item_general_report');
		}
	
    	
	}
	
	public function itemwise_general_salereturn_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$item_code =$this->security->xss_clean($this->input->post('report_item_code'));
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$item_mfg =$this->security->xss_clean($this->input->post('report_item_mfg'));
		$customer =$this->security->xss_clean($this->input->post('report_customer'));
		$cus_id =$this->security->xss_clean($this->input->post('report_cus_id'));
		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
			
		$this->data["sales_item_list"] = $this->reportmodule->item_general_salesreturn_report_new($sess_company,$item_name,$item_code,$item_id,$item_mfg,$cus_id,$report_from,$report_to);
		$this->data["product_id"] =$item_id;
		$this->data["customer_id"] =$cus_id;
		$this->data["customer_name"] =$customer;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		
		//$this->title = "Sales Report";
		//$this->keywords = "Sales Report";
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/item_general_summary_salesreturn_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "SalesReturn Summary Report";
			$this->keywords = "SalesReturn Summary Report";
			$this->_render('pages/reports/item_general_salesreturn_report');
		}
		else
		{
			$this->_render('pages/reports/item_general_salesreturn_report');
		}
	
    	
	}
	
	
	public function item_sales_export_report()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;

		$item_id = $this->security->xss_clean($this->input->post('report_item_id'));
		$cus_id =$this->security->xss_clean($this->input->post('report_cus_id'));
		$vendor =$this->security->xss_clean($this->input->post('report_ven_name'));
		$itm_name =$this->security->xss_clean($this->input->post('itm_name'));
		$itm_code =$this->security->xss_clean($this->input->post('itm_code'));
		$itm_mfg =$this->security->xss_clean($this->input->post('itm_mfg'));
		$tot_qty =$this->security->xss_clean($this->input->post('tot_qty'));
		$tot_amt =$this->security->xss_clean($this->input->post('tot_amt'));
		
		$report_from_date = $this->security->xss_clean($this->input->post('from_date'));
		$report_from =  date("Y-m-d", strtotime($report_from_date));
		$report_to_date =$this->security->xss_clean($this->input->post('to_date'));
		$report_to =date("Y-m-d", strtotime($report_to_date));
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		$Result = $this->reportmodule->get_all_sales_item_export($sess_company,$item_id,$cus_id,$report_from,$report_to);
		//echo "<pre>";print_r($Result);exit;

		$this->data["list_items"] = $Result;
		$this->data["product_id"] =$item_id;
		$this->data["customer_id"] =$cus_id;
		$this->data["itm_name"] =$itm_name;
		$this->data["itm_code"] =$itm_code;
		$this->data["itm_mfg"] =$itm_mfg;
		$this->data["tot_qty"] =$tot_qty;
		$this->data["tot_amt"] =$tot_amt;
		
		
		
		$this->title = "Purchase Reports";
		$this->keywords = "Purchase Reports";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/itemwise_sales_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_itemwise_sales_reports.pdf");
	}
 	
	
	
	public function item_purchase_report()
   	{
		$this->title = "Purchase Reports";
		$this->keywords = "Purchase Reports";
		$this->_render('pages/reports/item_purchase_report');
	}
	
	
	
	public function item_purchase_generate_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$item_code =$this->security->xss_clean($this->input->post('report_item_code'));
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$item_mfg =$this->security->xss_clean($this->input->post('report_item_mfg'));
		$vendor =$this->security->xss_clean($this->input->post('report_vendor'));
		$ven_id =$this->security->xss_clean($this->input->post('report_ven_id'));
		$report_from_date =$this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
			
		$this->data["purchase_item_list"] = $this->reportmodule->get_all_item_purchase_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$ven_id,$report_from,$report_to);
		//$this->data["total_values"] = $this->reportmodule->get_all_item_purchase_total($sess_company,$item_name,$item_code,$item_id,$item_mfg,$ven_id);
		$this->data["product_id"] =$item_id;
		$this->data["vendor_id"] =$ven_id;
		$this->data["vendor_name"] =$vendor;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		$this->title = "Purchase Report";
		$this->keywords = "Purchase Report";
		$this->_render('pages/reports/item_purchase_report');
	    	
	}
	
	public function item_pricelist_report()
   	{
		$this->title = "GR Pricelist Reports";
		$this->keywords = "GR Pricelist Reports";
		$this->_render('pages/reports/item_pricelist_report');
	}
	
	public function item_pricelist_generate_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$report_ven_id =$this->security->xss_clean($this->input->post('report_ven_id'));
		$report_from_date =$this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		//echo "<pre>";
		//print_r($report_ven_id); exit;
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
			
		$this->data["purchase_item_list"] = $this->reportmodule->get_all_item_goods_received($sess_company,$item_id,$report_ven_id,$report_from,$report_to);
		
		$this->data["product_id"] =$item_id;
		$this->data["vendor_id"] =$report_ven_id;
		//$this->data["vendor_name"] =$vendor;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		$this->title = "GR Priselist Report";
		$this->keywords = "GR Priselist Report";
		$this->_render('pages/reports/item_grn_pricelist_report');
	    	
	}
	
	public function item_purchase_pricelist_export_report()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$report_ven_id =$this->security->xss_clean($this->input->post('report_ven_id'));
		$report_from_date =$this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		//echo "<pre>";
		//print_r($report_ven_id); exit;
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
			
		$this->data["purchase_item_list"] = $this->reportmodule->get_all_item_goods_received($sess_company,$item_id,$report_ven_id,$report_from,$report_to);
		
		$this->data["product_id"] =$item_id;
		$this->data["vendor_id"] =$report_ven_id;
		//$this->data["vendor_name"] =$vendor;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		
		$this->title = "GR Priselist Report";
		$this->keywords = "GR Priselist Report";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/itemwise_gr_priselist_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_itemwise_gr_priselist_reports.pdf");
	}
	
	public function item_purchase_export_report()
    {
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;

		$item_id = $this->security->xss_clean($this->input->post('report_item_id'));
		$ven_id =$this->security->xss_clean($this->input->post('report_ven_id'));
		$itm_name =$this->security->xss_clean($this->input->post('itm_name'));
		$itm_code =$this->security->xss_clean($this->input->post('itm_code'));
		$itm_mfg =$this->security->xss_clean($this->input->post('itm_mfg'));
		$tot_qty =$this->security->xss_clean($this->input->post('tot_qty'));
		$tot_amt =$this->security->xss_clean($this->input->post('tot_amt'));
		
		$report_from_date =$this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$Result = $this->reportmodule->get_all_purchase_item_export($sess_company,$item_id,$ven_id,$report_from,$report_to);
		$this->data["list_items"] = $Result;
		$this->data["product_id"] =$item_id;
		$this->data["vendor_id"] =$ven_id;
		$this->data["itm_name"] =$itm_name;
		$this->data["itm_code"] =$itm_code;
		$this->data["itm_mfg"] =$itm_mfg;
		$this->data["tot_qty"] =$tot_qty;
		$this->data["tot_amt"] =$tot_amt;
		
		
		$this->title = "Purchase Reports";
		$this->keywords = "Purchase Reports";
	/*PDF Genrations*/
	   $this->pdf->load_view('pages/reports/pdf/itemwise_purchase_reports', $this->data);
       $date = date('d-m-y');
       $this->pdf->render();
       $this->pdf->stream($date."_itemwise_purchase_reports.pdf");
	}
	
	public function itemwise_analysis()
   	{
		$this->title = "Analysis Reports";
		$this->keywords = "Analysis Reports";
		$this->_render('pages/reports/itemwise_analysis');
	}
		public function customer_credit_note()
   	{
		$this->title = "Customer Debit Report";
		$this->keywords = "Customer Debit Report";
		$this->_render('pages/reports/customer_credit_note');
	}
	public function customer_debit_note()
   	{
		$this->title = "Customer Debit Report";
		$this->keywords = "Customer Debit Report";
		$this->_render('pages/reports/customer_debit_note');
	}
	public function item_analysis_generate_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$item_code =$this->security->xss_clean($this->input->post('report_item_code'));
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$item_mfg =$this->security->xss_clean($this->input->post('report_item_mfg'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
			
		$this->data["sales_item_list"] = $this->reportmodule->get_all_item_analysis_sales_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$report_from,$report_to);
		$this->data["purchase_item_list"] = $this->reportmodule->get_all_item_analysis_purchase_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$report_from,$report_to);
				
		
		$this->title = "Item Analysis Report";
		$this->keywords = "Item Analysis Report";
		$this->_render('pages/reports/itemwise_analysis');
	    	
	}
	public function customer_debit_note_search()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_collection($sess_company,$report_from,$report_to,$customer_id);
		$this->data["total_values"] = $this->reportmodule->get_total_sales_collection($sess_company,$report_from,$report_to,$customer_id);	
		$this->data["debit_note"] = $this->reportmodule->get_cust_debitnotes($customer_id);
		$this->data["total_debit"] = $this->reportmodule->get_cust_debit_total($customer_id);
		//$this->data["debit_note_debit_total"] = $this->reportmodule->get_cust_debit_total($customer_id);
		//$this->data["debit_note_credit_total"] = $this->reportmodule->get_cust_credit_total($customer_id);
		
		//echo "<pre>";
		//print_r($this->data["total_debit"]); exit;
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		
		//echo $_POST['generate']; exit;
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/customer_debit_note', $this->data);
		}
		else if(isset($_POST['generate']))
		{
			//echo "fdhg"; exit;
		$this->title = "Customer Debit";
		$this->keywords = "Customer Debit";
		$this->_render('pages/reports/customer_debit_note');
		}
		else
		{
			redirect('reports/customer_debit_note');
		}
		
		
	    	
	}
	
	public function customer_credit_note_search()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$customer_id = $this->security->xss_clean($this->input->post('report_customer_id'));
		$customer_name = $this->security->xss_clean($this->input->post('report_customer_name'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		$this->data["invoice_list"] = $this->reportmodule->get_report_sales_report($sess_company,$report_from,$report_to,$customer_id);
		$this->data["total_values"] = $this->reportmodule->get_total_sales_report($sess_company,$report_from,$report_to,$customer_id);	
		$this->data["credit_note"] = $this->reportmodule->get_cust_credittnotes($customer_id);
		$this->data["credit_note_total"] = $this->reportmodule->get_cust_credit_total($customer_id);
		//$this->data["debit_note_debit_total"] = $this->reportmodule->get_cust_debit_total($customer_id);
		//$this->data["debit_note_credit_total"] = $this->reportmodule->get_cust_credit_total($customer_id);
		
		//echo "<pre>";
		//print_r($this->data["total_values"]); exit;
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["customer_id"] = $customer_id;
		$this->data["customer_name"] = $customer_name;
		
		//echo $_POST['generate']; exit;
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/customer_credit_note', $this->data);

		}
		else if(isset($_POST['generate']))
		{
			//echo "fdhg"; exit;
		$this->title = "Customer Debit";
		$this->keywords = "Customer Debit";
		$this->_render('pages/reports/customer_credit_note');
		}
		else
		{
			redirect('reports/customer_credit_note');
		}   	
	}
	
		public function sales_summary_report()
   	{
		$this->title = "Sales Summary Report";
		$this->keywords = "Sales Summary Report";
		$this->_render('pages/reports/items_sales_summary_report');
	}
	
	public function items_sales_summary_report()
    {
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$item_code =$this->security->xss_clean($this->input->post('report_item_code'));
		$item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		$item_mfg =$this->security->xss_clean($this->input->post('report_item_mfg'));
		$customer =$this->security->xss_clean($this->input->post('report_customer'));
		$cus_id =$this->security->xss_clean($this->input->post('report_cus_id'));
		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
			
		$this->data["sales_item_list"] = $this->reportmodule->get_all_items_total($sess_company,$item_id,$report_from,$report_to);
		$this->data["product_id"] =$item_id;
		$this->data["customer_id"] =$cus_id;
		$this->data["customer_name"] =$customer;
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/reports/pdf/items_sales_summary_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Sales Summary Report";
			$this->keywords = "Sales Summary Report";
			$this->_render('pages/reports/items_sales_summary_report');
		}
		else
		{
			redirect('reports/sales_summary_report');
		}
	
	}
	
	public function stock_reprot_list()
   	{
		$this->title = "Stock Reports";
		$this->keywords = "Stock Reports";
		$this->_render('pages/reports/stock_report_list');
	}
	
	public function stock_report_detailed_list()
   	{
		$this->title = "Stock Reports";
		$this->keywords = "Stock Reports";
		$this->_render('pages/reports/stock_report_detailed_list');
	}
	
	public function QM_Intimation_Report()
   	{
		$this->title = "QM Intimation Report";
		$this->keywords = "QM Intimation Report";
		$this->_render('pages/reports/qm_intimation_report');
	}
	
	public function GRN_Sampling_Report()
   	{
		$this->title = "GRN Sampling Report";
		$this->keywords = "GRN Sampling Report";
		$this->_render('pages/reports/grn_sampling_report');
	}
	
	public function GRN_Test_Report()
   	{
		$this->title = "GRN Test Report";
		$this->keywords = "GRN Test Report";
		$this->_render('pages/reports/grn_test_report');
	}
	
	public function stock_report_details()
   	{
		$this->title = "Stock Reports";
		$this->keywords = "Stock Reports";
		$this->_render('pages/reports/stock_report_details');
	}
	
	
	// If some want Pagination for stock search use this function  
	
	
	
	public function stock_search()
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$product_group_id = $this->security->xss_clean($this->input->post('report_products_group_id'));
		$product_group_name = $this->security->xss_clean($this->input->post('report_products_group_name'));
		$search_item_status =$this->security->xss_clean($this->input->post('search_item_status'));
		$material_type_id =$this->security->xss_clean($this->input->post('material_type_id'));
		$material_type =$this->security->xss_clean($this->input->post('material_type'));
		$division_name =$this->security->xss_clean($this->input->post('division_name'));
		$division_id =$this->security->xss_clean($this->input->post('division_id'));
		
		//echo $product_group_id; echo $product_group_name; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->get_report_stock_list($sess_company,$search_item_status,$item_name,$division_id,$material_type_id);
		
		/*$this->data["stock_list"] = $this->reportmodule->get_report_stock_purchase_list($sess_company,$report_from,$report_to,$product_group_id);
		
		echo "<pre>"; print_r($this->data["stock_list"]); exit;*/
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["product_group_id"] = $product_group_id;
		$this->data["product_name"] = $item_name;
		$this->data["search_item_status"] = $search_item_status;
		$this->data["division_name"] = $division_name;
		$this->data["division_id"] = $division_id;
		$this->data["material_type"] = $material_type;
		$this->data["material_type_id"] = $material_type_id;
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/stock_reports', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/stock_report_list');
		}
		else
		{
			redirect('reports/stock_reprot_list');
		}
		
		
	}
	
	
	public function stock_detailed_search($sort_order='inventory_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));	
		$control_no =$this->security->xss_clean($this->input->post('report_control_no'));		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$product_group_id = $this->security->xss_clean($this->input->post('report_products_group_id'));
		$product_group_name = $this->security->xss_clean($this->input->post('report_products_group_name'));
		$search_item_status =$this->security->xss_clean($this->input->post('search_item_status'));
		$material_type_id =$this->security->xss_clean($this->input->post('material_type_id'));
		$material_type =$this->security->xss_clean($this->input->post('material_type'));
		$division_name =$this->security->xss_clean($this->input->post('division_name'));
		$division_id =$this->security->xss_clean($this->input->post('division_id'));
		
		
		//echo $product_group_id; echo $product_group_name; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d h:i:s", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d h:i:s", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->get_report_detailed_stock($sess_company,$search_item_status,$item_name,$control_no,$division_id,$material_type_id);
		
		/*$this->data["stock_list"] = $this->reportmodule->get_report_stock_purchase_list($sess_company,$report_from,$report_to,$product_group_id);
		
		echo "<pre>"; print_r($this->data["stock_list"]); exit;*/
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["product_group_id"] = $product_group_id;
		$this->data["product_name"] = $item_name;
		$this->data["control_no"] = $control_no;
		$this->data["search_item_status"] = $search_item_status;
		$this->data["division_name"] = $division_name;
		$this->data["division_id"] = $division_id;
		$this->data["material_type"] = $material_type;
		$this->data["material_type_id"] = $material_type_id;
		
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/stock_detailed_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/stock_report_detailed_list');
		}
		else
		{
			redirect('reports/stock_report_detailed_list');
		}
		
		
	}
	
		public function view_stock_report_search()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		//$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$report_from = $this->input->post('report_from');
		$report_to =$this->input->post('report_to');
		$id = $this->input->post('search_id');
		
		$report_from = date("Y-m-d", strtotime($report_from));
		$report_to = date("Y-m-d", strtotime($report_to));
		
		$this->data["report_from"] = date("Y-m-d", strtotime($report_from));
		$this->data["report_to"] = date("Y-m-d", strtotime($report_to));
		
		$this->data["grn_details"] = $this->reportmodule->get_qm_intimation_ledger($sess_company,$report_from,$report_to,$id);
		
		//echo "<pre>"; print_r($this->data["inventory_stock"]); exit;
		//** Get Single PO Indent Item Details **//
		$this->title = "Stock Ledger";
		$this->keywords = "Stock Ledger";
		
		$this->load->view('pages/reports/stock_ledger_report',$this->data);
	}
	
	public function stock_report_search($sort_order='inventory_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		$product_group_id = $this->security->xss_clean($this->input->post('report_products_group_id'));
		$product_group_name = $this->security->xss_clean($this->input->post('report_products_group_name'));
		$search_item_status =$this->security->xss_clean($this->input->post('search_item_status'));
		
		
		//echo $product_group_id; echo $product_group_name; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->get_report_stock_details($sess_company,$report_from,$report_to,$item_name,$product_group_id,$search_item_status);
		
		/*$this->data["stock_list"] = $this->reportmodule->get_report_stock_purchase_list($sess_company,$report_from,$report_to,$product_group_id);
		
		echo "<pre>"; print_r($this->data["stock_list"]); exit;*/
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["product_name"] =$item_name;
		$this->data["product_group_id"] = $product_group_id;
		$this->data["product_group_name"] = $product_group_name;
		$this->data["search_item_status"] = $search_item_status;
		
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/stock_reports_details', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/stock_report_details');
		}
		else
		{
			redirect('reports/stock_report_details');
		}
		
		
	}
	
	
	
	public function stock_ledger_report()
   	{
		$this->title = "Stock Ledger Report";
		$this->keywords = "Stock Ledger Report";
		$this->_render('pages/reports/stock_list');
	}
	
	public function stock_ledger_report_search($sort_order='inventory_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		$item_name =$this->security->xss_clean($this->input->post('report_item_name'));
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		
		
		//echo $product_group_id; echo $product_group_name; exit;
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->ledger_inventory_list($sess_company,$report_from,$report_to,$item_name);
		
		/*$this->data["stock_list"] = $this->reportmodule->get_report_stock_purchase_list($sess_company,$report_from,$report_to,$product_group_id);
		
		echo "<pre>"; print_r($this->data["stock_list"]); exit;*/
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["product_name"] =$item_name;
		
		
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/stock_ledger_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/stock_list');
		}
		else
		{
			redirect('reports/stock_ledger_report');
		}
		
		
	}
	
	/// GRN TEST
public function qm_grn_test_report_search($sort_order='qm_intin_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		$report_item_id =$this->security->xss_clean($this->input->post('report_item_id'));
		
		//echo"<pre>"; print_r($qc_id); exit;
		$report_item_name =$this->security->xss_clean($this->input->post('report_item_name'));		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->get_report_grn_test($sess_company,$report_from,$report_to,$report_item_name,$report_item_id);
		//echo"<pre>"; print_r($this->data["stock_list"]); exit;
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["product_name"] =$report_item_name;
		$this->data["report_item_id"] = $report_item_id;
		
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/grn_test_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/grn_test_report');
		}
		else
		{
			redirect('reports/grn_test_report');
		}
		
		
	}
	
	/////GRN Sampling
	
	public function grn_report_report_search($sort_order='samp_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		$report_division =$this->security->xss_clean($this->input->post('report_division'));
		//echo"<pre>"; print_r($report_item_id); exit;
		$report_item_name =$this->security->xss_clean($this->input->post('report_item_name'));		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->get_report_grn_sampling($sess_company,$report_from,$report_to,$report_division);
		
		//echo"<pre>"; print_r($this->data["stock_list"]); exit;
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["report_division"] =$report_division;
		
		
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/qm_intimation_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/grn_sampling_report');
		}
		else
		{
			redirect('reports/grn_sampling_report');
		}
		
		
	}
	
	/////Quality intimation
	
	public function qm_intimation_report_search($sort_order='qm_intin_id',$sort_by='desc')
   	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		$report_division =$this->security->xss_clean($this->input->post('report_division'));
		//echo"<pre>"; print_r($report_division); exit;
		$report_item_name =$this->security->xss_clean($this->input->post('report_item_name'));		
		$report_from_date = $this->security->xss_clean($this->input->post('report_from'));
		$report_to_date =$this->security->xss_clean($this->input->post('report_to'));
		
		
		
		if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
		
		
		$this->data["stock_list"] = $this->reportmodule->get_report_qm_intimation($sess_company,$report_from,$report_to,$report_division);
		//echo"<pre>"; print_r($this->data["stock_list"]); exit;
		
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] = $report_to;
		$this->data["report_division"] =$report_division;
		//$this->data["report_item_id"] = $report_item_id;
		
		
		if(isset($_POST['export']))
		{
			
			$this->load->view('pages/reports/pdf/qm_intimation_report', $this->data);
		}
		else if($_POST['generate'])
		{
			$this->title = "Stock Reports";
			$this->keywords = "Stock Reports";
			$this->_render('pages/reports/qm_intimation_report');
		}
		else
		{
			redirect('reports/QM_Intimation_Report');
		}
		
		
	}
	
	public function view_summary_intimation()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["invoice_item"]=$this->reportmodule->get_item_qm_intimation($id);
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->load->view('pages/reports/view_summary_intimation', $this->data);
		
	}
	
	public function view_summary_grn_test()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["invoice_item"]=$this->reportmodule->get_item_grn_test($id);
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->load->view('pages/reports/view_summary_grn_test', $this->data);
		
	}
	public function view_summary_grn_sam()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["invoice_item"]=$this->reportmodule->get_item_grn_sam($id);
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->load->view('pages/reports/view_summary_grn_sampling', $this->data);
		
	}
	
	
}



?>