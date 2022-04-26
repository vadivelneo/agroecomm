<?php ob_start();
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->model('accountmodule');
		  $this->load->model('purchasemodule');
		  $this->load->model('mastersmodule');
		  $this->load->model('salesinvoicemodel');
		  $this->load->model('purchaseinvoicemodule');
		  $this->load->model('purchasereturnmodel');
		  $this->load->helper('security');
		  $this->load->library('pagination');
		  
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
		redirect('accounts/invoice_recp_list');
	}
	
	public function search_invoice_recp_list($sort_order='invoice_receipt_id',$sort_by='desc')
	{ 
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$rcpt_no = $this->security->xss_clean($this->input->post('search_inc_rcpt_no'));
			$cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
			$status = $this->security->xss_clean($this->input->post('search_status'));
			$from_date = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date));
			$to_date = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date));
			$inc_rec_search= array(
					'search_inc_rcpt_no' => $rcpt_no,
					'search_cus_name' =>$cus_name,
					 
					'search_status' => $status,
					'from_date' => $from_date,
					'to_date' => $to_date,
					);	
			$this->session->set_userdata('inc_rec_data',$inc_rec_search);
		}
			$search_data = $this->session->userdata('inc_rec_data');
			$search_inc_rcpt_no = $search_data['search_inc_rcpt_no'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
		  	$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result = $this->accountmodule->search_get_inv_recp($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_inc_rcpt_no,$search_cus_name,$search_status,$from_date,$to_date);
			$this->data["inv_recp_list"] = $Result['rows'];
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/search_invoice_recp_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "Invoice Receipt";
			$this->keywords = "Invoice Receipt";
			$this->_render('pages/accounts/inv_recp/invoice_recp_list');
	}

	public function invoice_recp_list($sort_order='invoice_receipt_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->accountmodule->get_inv_recp($limit,$page,$sort_order,$sort_by);
		$this->data["inv_recp_list"] = $Result['rows'];
		$this->session->unset_userdata('inc_rec_data');

			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/invoice_recp_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		
		$this->title = "Invoice Receipt";
		$this->keywords = "Invoice Receipt";

		$this->_render('pages/accounts/inv_recp/invoice_recp_list');	
	}
	
	/****************** Add Invoice Receipt *******************/
	
	public function add_inv_recp()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$prefix = $this->accountmodule->getprefix('14');
		
		$inv_recp_Prefix = $prefix->prefix_name;

		$code = $this->accountmodule->getlast_inv_rep_id();
		
		
		if(!empty($code))
		{
			
			$last_inv_recp_Code = $code->invoice_receipt_number;
			
			$lengthPrefix = strlen($inv_recp_Prefix);
			$strSplit = str_split($last_inv_recp_Code, $lengthPrefix);
			$Inv_recp_Lastdigit = $strSplit[0];
			
			$explode = explode($Inv_recp_Lastdigit,$last_inv_recp_Code);
			$Inv_recp_Lastnumber = $explode[1];
			
			if($Inv_recp_Lastdigit == $inv_recp_Prefix)
			{
				$inv_recp_code = $Inv_recp_Lastnumber+1;
				
				$digits = sprintf ('%04d', $inv_recp_code);
				$inv_recp_codewithPrefix = $inv_recp_Prefix.$digits;
			}
			else
			{
				$inv_recp_codewithPrefix = $inv_recp_Prefix.'0001';
			}
		}
		else
		{
			
			$inv_recp_codewithPrefix = $inv_recp_Prefix.'0001';
		}
		
		
		$this->data['inv_recp_code'] = $inv_recp_codewithPrefix;
		$this->data['inv_recp_Prefix'] = $inv_recp_Prefix;
			
		$randomstring = $inv_recp_codewithPrefix;
		
		if(isset($_POST['add_inv_recp']))
		{
			
			$inv_recp_no = $this->security->xss_clean($this->input->post('inv_recp_no'));
			$inv_recp_date = $this->security->xss_clean($this->input->post('inv_recp_date'));
			
			if($this->input->post('inv_recp_date') != "")
			{
				$inv_recp_date = date('Y-m-d', strtotime($this->input->post('inv_recp_date')));
			}
			else
			{
				$inv_recp_date = "0000-00-00";
			}

			$cus_inc_amt = $this->security->xss_clean($this->input->post('cus_inc_amt'));
			$inv_recp_customer_name = $this->security->xss_clean($this->input->post('inv_recp_customer_name'));
			$inv_recp_customer_code = $this->security->xss_clean($this->input->post('inv_recp_customer_code'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			$inv_recp_amount = $this->security->xss_clean($this->input->post('inv_recp_amount'));
			$inv_recp_status = $this->security->xss_clean($this->input->post('inv_recp_status'));
			$inv_recp_descp = $this->security->xss_clean($this->input->post('inv_recp_descp'));
			
			$inv_recp_payment_mode = $this->security->xss_clean($this->input->post('inv_recp_payment_mode'));
			$inv_recp_bank = $this->security->xss_clean($this->input->post('inv_recp_bank'));
			$inv_recp_chk_no = $this->security->xss_clean($this->input->post('inv_recp_chk_no'));
			$inv_recp_chk_date = $this->security->xss_clean($this->input->post('inv_recp_chk_date'));
			
			if($this->input->post('inv_recp_chk_date') != "")
			{
				$inv_recp_chk_date = date('Y-m-d', strtotime($this->input->post('inv_recp_chk_date')));
			}
			else
			{
				$inv_recp_chk_date = "0000-00-00";
			}

			
				$inv_recp_valid = $this->accountmodule->inv_recp_vaildation($so_customer_id);
			
				if($inv_recp_valid== 1)
				{
					$inv_recp_details = array(
					'invoice_receipt_number' => $inv_recp_no,
					'invoice_receipt_date' => $inv_recp_date,
					'invoice_receipt_customer_id' => $so_customer_id,
					'invoice_receipt_amount' => $inv_recp_amount,
					'invoice_receipt_balance_amount' => $inv_recp_amount,
					'invoice_incentive_amount' => $cus_inc_amt,
					'invoice_receipt_status' => 'draft',
					'invoice_receipt_descrption' => $inv_recp_descp,
					'invoice_receipt_payment_mode_id' => $inv_recp_payment_mode,
					'invoice_receipt_payment_bank' => $inv_recp_bank,
					'invoice_receipt_payment_check_dd_number' => $inv_recp_chk_no,
					'invoice_receipt_payment_check_dd_date' => $inv_recp_chk_date,
					'invoice_receipt_added_date'=> date('Y-m-d h:i:s'),
					'invoice_receipt_created_by'=>$sess_user,
					'invoice_receipt_updated_by' =>$sess_user,
					'invoice_receipt_active_status' => 'active');
					
					$this->accountmodule->add_inv_recp_details($inv_recp_details);

					

					$this->session->set_flashdata('message', 'Invoice Receipt Added Successfully');
					redirect('accounts/invoice_recp_list');
				}
				else
				{
					$this->session->set_flashdata('message', 'Customer Not Exist');
					redirect('accounts/add_inv_recp');
				}
			
		}
		
		$this->title = "Invoice Receipt";
		$this->keywords = "Invoice Receipt";
		
		$this->data["paymentmode"] = $this->accountmodule->get_all_pay_mode();

		$this->_render('pages/accounts/inv_recp/add_invoice_recp');
		
	}
	
	public function edit_inv_recp($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
			if(isset($_POST['add_inv_recp']))
			{
			
			$inv_recp_no = $this->security->xss_clean($this->input->post('inv_recp_no'));
			$inv_recp_date = $this->security->xss_clean($this->input->post('inv_recp_date'));
			
			if($this->input->post('inv_recp_date') != "")
			{
				$inv_recp_date = date('Y-m-d', strtotime($this->input->post('inv_recp_date')));
			}
			else
			{
				$inv_recp_date = "0000-00-00";
			}

			$cus_inc_amt = $this->security->xss_clean($this->input->post('cus_inc_amt'));
			$inv_recp_id = $this->security->xss_clean($this->input->post('inv_recp_id'));
			$inv_recp_customer_name = $this->security->xss_clean($this->input->post('inv_recp_customer_name'));
			$inv_recp_customer_code = $this->security->xss_clean($this->input->post('inv_recp_customer_code'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			$inv_recp_amount = $this->security->xss_clean($this->input->post('inv_recp_amount'));
			$inv_recp_status = $this->security->xss_clean($this->input->post('inv_recp_status'));
			$inv_recp_descp = $this->security->xss_clean($this->input->post('inv_recp_descp'));
			
			$inv_recp_payment_mode = $this->security->xss_clean($this->input->post('inv_recp_payment_mode'));
			$inv_recp_bank = $this->security->xss_clean($this->input->post('inv_recp_bank'));
			$inv_recp_chk_no = $this->security->xss_clean($this->input->post('inv_recp_chk_no'));
			$inv_recp_chk_date = $this->security->xss_clean($this->input->post('inv_recp_chk_date'));
			
			if($this->input->post('inv_recp_chk_date') != "")
			{
				$inv_recp_chk_date = date('Y-m-d', strtotime($this->input->post('inv_recp_chk_date')));
			}
			else
			{
				$inv_recp_chk_date = "0000-00-00";
			}
			
			//$inv_recp_valid = $this->accountmodule->inv_recp_edit_vaildation($inv_recp_customer_name);
			
					$inv_recp_details = array(
					'invoice_receipt_number' => $inv_recp_no,
					'invoice_receipt_date' => $inv_recp_date,
					'invoice_receipt_customer_id' => $so_customer_id,
					'invoice_receipt_amount' => $inv_recp_amount,
					'invoice_receipt_balance_amount' => $inv_recp_amount,
					'invoice_incentive_amount' => $cus_inc_amt,
					'invoice_receipt_status' => $inv_recp_status,
					'invoice_receipt_descrption' => $inv_recp_descp,
					'invoice_receipt_payment_mode_id' => $inv_recp_payment_mode,
					'invoice_receipt_payment_bank' => $inv_recp_bank,
					'invoice_receipt_payment_check_dd_number' => $inv_recp_chk_no,
					'invoice_receipt_payment_check_dd_date' => $inv_recp_chk_date,
					'invoice_receipt_updated_date'=> date('Y-m-d h:i:s'),
					'invoice_receipt_updated_by' =>$sess_user,
					);
					//echo $inv_recp_payment_mode; exit;
				if ($inv_recp_status == 'approved')
				{	
					$servername = $this->db->hostname;
					$username = $this->db->username;
					$password = $this->db->password;
					$dbname = $this->db->database;
					$connection = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);
					//$connection = mysqli_connect("localhost", "neoindzg_agro", "agro*123$", "neoindzg_agro_ecomm");

					$sql_wallet_amt = "INSERT INTO vsoft_incentive_details (SO_ID,SO_NO,OFCR_ID,OFCR_NAME,USR_LEVEL_VALUE,OFCR_USR_VALUE,OFCR_TRE_SPNCR_ID,INCENTIVE_PERCENT,TOTAL_INCENTIVE_AMT,USR_INCENTIVE_AMT, USR_REDEEM_AMT, PAYMENT_STATUS, CREATED_DATE) VALUES ('$inv_recp_id','$inv_recp_no','$so_customer_id','$inv_recp_customer_name','','$inv_recp_customer_code','$inv_recp_customer_code','','','','$inv_recp_amount','$inv_recp_payment_mode',curdate())";	
					
					mysqli_query($connection, $sql_wallet_amt);;	
					
					
					// Add Invoice Receipt amount to Customer Accounts Debit Amount/
				}
					
				
			
				$this->accountmodule->update_inv_recp_details($inv_recp_details, $id);
				$this->session->set_flashdata('message', 'Invoice Receipt Updated Successfully');
				redirect('accounts/invoice_recp_list');

		}
			else
		{
		
			$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
			$this->data['editinv_recp'] = $this->accountmodule->getsingle_inv_recp($id);
			$this->_render('pages/accounts/inv_recp/edit_invoice_recp');
		}
	}
	public function view_inv_recp($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
		$this->data['editinv_recp'] = $this->accountmodule->getsingle_inv_recp($id);
		
		$this->data["credit_details"] = $this->accountmodule->get_credit_inv_cus_view($id);
		
			
		$this->_render('pages/accounts/inv_recp/view_invoice_recp');
		
	}
	
	public function print_inv_recp($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
		$this->data['editinv_recp'] = $this->accountmodule->getsingle_inv_recp($id);
		//echo"<pre>";print_r($this->data['editinv_recp']);exit;
		$cus_id=$this->data['editinv_recp']->invoice_receipt_customer_id;
		$this->data["cus_det"]=$this->salesinvoicemodel->get_cus_namee($cus_id);
		$this->data["cus_name"]=$this->data["cus_det"]->customer_name;
		$this->data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
		$this->data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id);
		
		$this->data["compny_det"] = $this->salesinvoicemodel->compny_details($sess_company);

		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->load->view('pages/accounts/inv_recp/print_invoice_recp',$this->data);
		 
		
	}
	
	public function delete_inv_recp($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$inv_recpdata = array(
						'invoice_receipt_active_status' => $changeStatus,
						'invoice_receipt_updated_date' => date('Y-m-d h:i:s'),
						'invoice_receipt_updated_by'=>$userid,
						);
						
		$this->accountmodule->update_inv_recp_status($inv_recpdata,$id);
		 
		$this->session->set_flashdata('message', 'Invoice Receipt Deleted Successfully');
		redirect('accounts/invoice_recp_list');
	}
	
	
	
	
	
	/**************   payment Receipts ******************/


	public function search_payment_recp_list($sort_order='payment_receipt_id',$sort_by='desc')
	{ 
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$rcpt_no = $this->security->xss_clean($this->input->post('search_pay_rcpt_no'));
			$ven_name = $this->security->xss_clean($this->input->post('search_ven_name'));
			 
			$status = $this->security->xss_clean($this->input->post('search_status'));
			$from_date = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date));
			$to_date = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date));
			$inc_rec_search= array(
					'search_pay_rcpt_no' => $rcpt_no,
					'search_ven_name' =>$ven_name,
					'search_status' => $status,
					'from_date' => $from_date,
					'to_date' => $to_date,
					);	
			$this->session->set_userdata('pay_rec_data',$inc_rec_search);
		}
			$search_data = $this->session->userdata('pay_rec_data');
						
			$search_pay_rcpt_no = $search_data['search_pay_rcpt_no'];
			$search_ven_name = $search_data['search_ven_name'];
		 	$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
	
		  	$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result = $this->accountmodule->search_get_pay_recp($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_pay_rcpt_no,$search_ven_name,$search_status,$from_date,$to_date);
			$this->data["pay_recp_list"] = $Result['rows'];
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/search_payment_recp_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "Payment Receipt";
			$this->keywords = "Payment Receipt";	
			$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
			$this->_render('pages/accounts/payment_recp/payment_recp_list');
	}
	
	public function payment_recp_list($sort_order='payment_receipt_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->accountmodule->get_pay_recp($limit,$page,$sort_order,$sort_by);
		$this->data["pay_recp_list"] = $Result['rows'];
		$this->session->unset_userdata('pay_rec_data');

			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/payment_recp_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
	
		$this->title = "Payment Receipt";
		$this->keywords = "Payment Receipt";	
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
		$this->_render('pages/accounts/payment_recp/payment_recp_list');	
	}
	
	public function add_payment_recp()
	{	
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		
		$prefix = $this->accountmodule->getprefix_pay_recp('15');
		
		$pay_recpPrefix = $prefix->prefix_name;

		$code = $this->accountmodule->getlastid_pay_recp();
		
		
		if(!empty($code))
		{
			
			$last_pay_recp_Code = $code->payment_receipt_number;
			
			$lengthPrefix = strlen($pay_recpPrefix);
			$strSplit = str_split($last_pay_recp_Code, $lengthPrefix);
			$pay_recp_Lastdigit = $strSplit[0];
			
			$explode = explode($pay_recp_Lastdigit,$last_pay_recp_Code);
			$Lastnumber = $explode[1];
			
			if($pay_recp_Lastdigit == $pay_recpPrefix)
			{
				$pay_recp_code = $Lastnumber+1;
				
				$digits = sprintf ('%04d', $pay_recp_code);
				$pay_recp_codewithPrefix = $pay_recpPrefix.$digits;
			}
			else
			{
				$pay_recp_codewithPrefix = $pay_recpPrefix.'0001';
			}
		}
		else
		{
			
			$pay_recp_codewithPrefix = $pay_recpPrefix.'0001';
		}
		
		
		$this->data['pay_recp_code'] = $pay_recp_codewithPrefix;
		$this->data['pay_recpPrefix'] = $pay_recpPrefix;
			
		$randomstring = $pay_recp_codewithPrefix;
			

		if(isset($_POST['pay_receipt_add']))
		{
			$pay_recp_no = $this->security->xss_clean($this->input->post('pay_recp'));
			$pay_recp_date = $this->security->xss_clean($this->input->post('pay_recp_date'));
			
			if($this->input->post('pay_recp_date') != "")
			{
				$pay_recp_date = date('Y-m-d', strtotime($this->input->post('pay_recp_date')));
			}
			else
			{
				$pay_recp_date = "0000-00-00";
			}
			$vendor_name = $this->security->xss_clean($this->input->post('vdrquo_vendor_name'));
			$vendor_id = $this->security->xss_clean($this->input->post('vdrquo_vendor_id'));
			$vendor_code = $this->security->xss_clean($this->input->post('vdrquo_vendor_code'));
			$pay_recp_amount = $this->security->xss_clean($this->input->post('pay_recp_amount'));
			$pay_recp_status = $this->security->xss_clean($this->input->post('pay_recp_status'));
			$pay_recp_descp = $this->security->xss_clean($this->input->post('pay_recp_descp'));
			$payment_mode = $this->security->xss_clean($this->input->post('pay_recp_payment_mode'));
			$bank_name = $this->security->xss_clean($this->input->post('bank_name'));
			$chk_no = $this->security->xss_clean($this->input->post('chk_no'));
			$chk_date = $this->security->xss_clean($this->input->post('chk_date'));

			if($this->input->post('chk_date') != "")
			{
				$chk_date = date('Y-m-d', strtotime($this->input->post('chk_date')));
			}
			else
			{
				$chk_date = "0000-00-00";
			}

			
					$pay_recp_details = array(
					'payment_receipt_number' => $pay_recp_no,
					'payment_receipt_date' => $pay_recp_date,
					'payment_receipt_vendor_id' => $vendor_id,
					'payment_receipt_amount' => $pay_recp_amount,
					'payment_receipt_balance_amount' => $pay_recp_amount,
					'payment_receipt_status' => 'draft',
					'payment_receipt_descrption' => $pay_recp_descp,
					'payment_receipt_payment_mode_id' => $payment_mode,
					'payment_receipt_payment_bank' => $bank_name,
					'payment_receipt_payment_check_dd_number' => $chk_no,
					'payment_receipt_payment_check_dd_date' => $chk_date,
					'payment_receipt_added_date'=> date('Y-m-d h:i:s'),
					'payment_receipt_created_by'=>$sess_user,
					'payment_receipt_updated_by' =>$sess_user,
					'payment_receipt_active_status' => 'active'
					);

					//echo"<pre>";print_r($pay_recp_details);exit;
					
				$this->accountmodule->add_pay_recp_details($pay_recp_details);
				$this->session->set_flashdata('message', 'Payment Receipt Added Successfully');
				redirect('accounts/payment_recp_list');

		}
		else
		{
			$this->title = "Payment Receipt";
			$this->keywords = "Payment Receipt";
		
			$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();

			$this->_render('pages/accounts/payment_recp/add_payment_recp');
		}
	}
	
	public function edit_pay_recp($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];

		if(isset($_POST['pay_receipt_edit']))
		{
			$pay_recp_no = $this->security->xss_clean($this->input->post('pay_recp'));
			$pay_recp_date = $this->security->xss_clean($this->input->post('pay_recp_date'));
			
			if($this->input->post('pay_recp_date') != "")
			{
				$pay_recp_date = date('Y-m-d', strtotime($this->input->post('pay_recp_date')));
			}
			else
			{
				$pay_recp_date = "0000-00-00";
			}
			$vendor_name = $this->security->xss_clean($this->input->post('vdrquo_vendor_name'));
			$vendor_id = $this->security->xss_clean($this->input->post('vdrquo_vendor_id'));
			$vendor_code = $this->security->xss_clean($this->input->post('vdrquo_vendor_code'));
			$pay_recp_amount = $this->security->xss_clean($this->input->post('pay_recp_amount'));
			$pay_recp_status = $this->security->xss_clean($this->input->post('pay_recp_status'));
			$pay_recp_descp = $this->security->xss_clean($this->input->post('pay_recp_descp'));
			$payment_mode = $this->security->xss_clean($this->input->post('pay_recp_payment_mode'));
			$bank_name = $this->security->xss_clean($this->input->post('bank_name'));
			$chk_no = $this->security->xss_clean($this->input->post('chk_no'));
			$chk_date = $this->security->xss_clean($this->input->post('chk_date'));
			//echo "pay_recp_amount".$pay_recp_amount; exit;
			if($this->input->post('chk_date') != "")
			{
				$chk_date = date('Y-m-d', strtotime($this->input->post('chk_date')));
			}
			else
			{
				$chk_date = "0000-00-00";
			}

			
					$pay_recp_details = array(
					'payment_receipt_number' => $pay_recp_no,
					'payment_receipt_date' => $pay_recp_date,
					'payment_receipt_vendor_id' => $vendor_id,
					'payment_receipt_amount' => $pay_recp_amount,
					'payment_receipt_balance_amount' => $pay_recp_amount,
					'payment_receipt_status' => $pay_recp_status,
					'payment_receipt_descrption' => $pay_recp_descp,
					'payment_receipt_payment_mode_id' => $payment_mode,
					'payment_receipt_payment_bank' => $bank_name,
					'payment_receipt_payment_check_dd_number' => $chk_no,
					'payment_receipt_payment_check_dd_date' => $chk_date,
					'payment_receipt_added_date'=> date('Y-m-d h:i:s'),
					'payment_receipt_created_by'=>$sess_user,
					'payment_receipt_updated_by' =>$sess_user,
					'payment_receipt_active_status' => 'active'
					);

					$this->accountmodule->update_pay_recp_details($pay_recp_details,$id);
					
				if($pay_recp_status == 'approved')
				{
							/*Vendor Debit And Credit calculations */
					
				//	$get_ven_accounts = $this->purchasereturnmodel->verify_ven($ven_id);
					$get_ven_accounts = $this->accountmodule->ven_det($vendor_id);
					
					if(!empty($get_ven_accounts))
					{
						
							$deb_amt= $get_ven_accounts->vendors_accounts_debit;
							$cred_amt= $get_ven_accounts->vendors_accounts_credit;
							
										
							if($cred_amt == '0.00')
							{
									$accounts_total = $pay_recp_amount + $deb_amt;
									
									$ven_acc_data = array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_debit'=>$accounts_total,
										'vendors_accounts_credit'=>'0.00'					
										);
									
							$ven_acc_update = $this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);

							 
							}
							else
							{
								
								if($cred_amt < $pay_recp_amount)
								{
									$accounts_total = $pay_recp_amount - $cred_amt;
									 
									$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>'0.00',
										'vendors_accounts_debit'=>$accounts_total					
									);
										
								}
								else
								{
									$accounts_total = $cred_amt - $pay_recp_amount;
									
									$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>$accounts_total,
										'vendors_accounts_debit'=>'0.00'					
									);
										
							

								}
								$ven_acc_update = $this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
							}
					}
					else
					{
						$ven_acc_data=array(
							'vendors_accounts_vendor_id'=>$vendor_id,
							'vendors_accounts_credit'=>'0.00',
							'vendors_accounts_debit'=>$pay_recp_amount
						);
							
						$ven_acc_insert = $this->accountmodule->ven_acc_insert($ven_acc_data);
		 
					}
							
				}
						
				
				
				$this->session->set_flashdata('message', 'Payment Receipt Update Successfully');
				redirect('accounts/payment_recp_list');
			
		}
			else
			{
				$this->title = "Edit Payment Receipt";
				$this->keywords = "Edit Payment Receipt";

				$this->data['editpay_recp'] = $this->accountmodule->getsingle_pay_recp($id);
				$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
				$this->_render('pages/accounts/payment_recp/edit_payment_recp');
			}
	}
	
	public function getvendorpopup()
	{
		$this->data["vendors"] = $this->accountmodule->getvendors_for_popup_grid();
		
		$result = $this->load->view("pages/accounts/payment_recp/vendor_popup", $this->data, true);
				
		echo $result; exit;
	}

	public function searchvendardetails()
	{
		 
		$vendor_code=$this->security->xss_clean($this->input->post('vendor_code'));
		$vendor_name=$this->security->xss_clean($this->input->post('vendor_name'));
		$ven_mobile=$this->security->xss_clean(trim($this->input->post('ven_mobile')));
		$ven_email=$this->security->xss_clean($this->input->post('ven_email'));
		
		$this->data['vendors'] = $this->accountmodule->getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email);
		
		$result = $this->load->view("pages/accounts/payment_recp/searchvendor_popup", $this->data, true);
				
		echo $result; exit;
		
	}

	
	
	public function print_payment_recp($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
		$this->data['editpay_recp'] = $this->accountmodule->getsingle_pay_recp($id);
		
		$ven_id=$this->data['editpay_recp']->payment_receipt_vendor_id;
		$this->data["ven_det"]=$this->purchaseinvoicemodule->get_ven_namee($ven_id);
		$this->data["ven_name"]=$this->data["ven_det"]->vendor_name;
		$this->data["bill"] = $this->purchaseinvoicemodule->getven_bill_det($ven_id);
		
		$this->data["ship"] = $this->purchaseinvoicemodule->getven_ship_det($ven_id);
		
		$this->data["compny_det"] = $this->salesinvoicemodel->compny_details($sess_company);

		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->load->view('pages/accounts/payment_recp/print_payment_recp',$this->data);
	}

	public function view_pay_recp($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$this->data["credit_details"] = $this->accountmodule->get_pay_ven_view($id);
		$this->data['editpay_recp'] = $this->accountmodule->getsingle_pay_recp($id);
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();
		$this->_render('pages/accounts/payment_recp/view_payment_recp');
		
		
	}

	public function delete_pay_recp($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$pay_recpdata = array(
						'payment_receipt_active_status' => $changeStatus,
						'payment_receipt_updated_date' => date('Y-m-d h:i:s'),
						'payment_receipt_updated_by'=>$userid,
						);
						
		$this->accountmodule->update_pay_recp_status($pay_recpdata,$id);
		 
		$this->session->set_flashdata('message', 'Payment Receipt Deleted Successfully');
		redirect('accounts/payment_recp_list');
	}
/////********************************************Payment AdjustMent********************************************////////////////////////////////////


	/*public function payment_adj_list()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->title = "Payment Receipt";
		$this->keywords = "Payment Receipt";
	
		$this->data["locationdata"] = $this->accountmodule->get_alllocation();
		$this->data["paymentmode"] = $this->accountmodule->get_all_pay_mode();
		$this->data["users"] =$this->accountmodule->users_list($sess_group,$sess_company);
		$this->data['userid'] = $sess_user;
		$this->_render('pages/accounts/payment_adj/payment_adj_list');
		
	}*/
	
	public function payment_adj_list()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["paymentmode"] = $this->accountmodule->get_all_pay_adj();
		$this->title = "Payment Receipt";
		$this->keywords = "Payment Receipt";
		$this->_render('pages/accounts/payment_adj/payment_adjment');
		
	}
	
	
	
	public function add_payment_adjustment()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		if(isset($_POST['pay_adj_add']))
		{
		  $pay_adj_type = $this->security->xss_clean($this->input->post('pay_adj_type'));
		 
		  $recp_no = $this->security->xss_clean($this->input->post('recp_no'));
		  $receipt_id = $this->security->xss_clean($this->input->post('receipt_id'));
		  //$party_name = $this->security->xss_clean($this->input->post('party_name'));
		  $recp_party_id = $this->security->xss_clean($this->input->post('recp_party_id'));
		  $amount = $this->security->xss_clean($this->input->post('amount'));
		  $recp_loc = $this->security->xss_clean($this->input->post('recp_loc'));
		  $recp_date = $this->security->xss_clean($this->input->post('recp_date'));
		  $recp_appr = $this->security->xss_clean($this->input->post('recp_appr'));
		  $pay_adj_status = $this->security->xss_clean($this->input->post('pay_adj_status'));
		  $inv_id = $this->security->xss_clean($this->input->post('inv_id'));
		  $inv_no = $this->security->xss_clean($this->input->post('inv_no'));
		  $party_name = $this->security->xss_clean($this->input->post('party_name'));
		  $party_id = $this->security->xss_clean($this->input->post('party_id'));
		  $recp_amt = $this->security->xss_clean($this->input->post('recp_amt'));
		  $payable_amt = $this->security->xss_clean($this->input->post('payable_amt'));
		  $paid_amt = $this->security->xss_clean($this->input->post('paid_amt'));
		  $due_amt = $this->security->xss_clean($this->input->post('due_amt'));
		  $adj_amt = $this->security->xss_clean($this->input->post('adj_amt'));
		  $payment_status = $this->security->xss_clean($this->input->post('invoice_status'));
		  $receiptAmount = $this->security->xss_clean($this->input->post('receiptAmount'));
		  
		 
		  if($pay_adj_type == "invoicereceipt")
		   {
			$pay_adj_cus_details = array(
				'invoice_pay_adj_customer_id'=>$recp_party_id,
				'invoice_pay_adj_receipt_id'=>$receipt_id,
				'invoice_pay_adj_date'=>$recp_date,
				'invoice_pay_adj_location_id'=>$recp_loc,
				'invoice_pay_adj_approved_by'=>$recp_appr,
				'invoice_pay_adj_status'=>$pay_adj_status,
				'invoice_pay_adj_amount'=>$amount,
				'invoice_pay_adj_added_date'=> date('Y-m-d h:i:s'),
				'invoice_pay_adj_updated_date'=> date('Y-m-d h:i:s'),
				'invoice_pay_adj_created_by'=>$sess_user,
				'invoice_pay_adj_updated_by' =>$sess_user
				);
		
			
		$pay_adj_id=$this->accountmodule->add_pay_adj_ir_details($pay_adj_cus_details);
			  if(!empty ($inv_id))
				{
				  $result=count($inv_id);
				  for($i=1; $i<=$result; $i++)
				  {
					  if($adj_amt[$i] != '0.00')
						{
						
						  $paid_amount[$i]=$paid_amt[$i] + $adj_amt[$i];
						  
						  $pay_adj_inv_items=array(
											  'invoice_payment_invoice_id'=>$inv_id[$i],
											  'invoice_payment_customer_id'=>$party_id[$i],
											  'invoice_payment_invoice_amount'=>$recp_amt[$i],
											  'invoice_payment_paid_amount'=>$paid_amount[$i],
											  'invoice_payment_due_amount'=>$due_amt[$i],
											  'invoice_payment_adjusted_amount'=>$adj_amt[$i],
											  'invoice_payment_payment_status'=>$payment_status[$i],
											   );
						
						  $this->accountmodule->add_pay_adj_ir_pay_details($pay_adj_inv_items,$inv_id[$i]);
						  
						  $pay_adj_payment_summary=array(
												'receipt_id'=>$receipt_id,
												'invoice_id'=>$inv_id[$i],
												'amount'=>$adj_amt[$i],
												);
							
							$this->accountmodule->add_pay_adj_invoice_summary($pay_adj_payment_summary);
							
							///Update The Status Of Sales Invoice Payment Status
							
							$sales_invoice_payment_status=array(
												'sale_invoice_payment_status'=>$payment_status[$i],
												);
						
							$this->accountmodule->update_sales_inv_pay_status($sales_invoice_payment_status,$inv_id[$i]);
						}
					}	
				}
				
						$receipt_balance = array(
									'invoice_receipt_balance_amount'=>$receiptAmount,
									);
		
						$this->accountmodule->update_invoice_receipt_balance($receipt_id,$receipt_balance);
						redirect('accounts/add_payment_adjustment');
		}
		 
		}
	  else 
	   {
		  $this->title = "Payment Receipt";
		  $this->keywords = "Payment Receipt";
		  $this->data["locationdata"] = $this->accountmodule->get_alllocation();
		  $this->data["paymentmode"] = $this->accountmodule->get_all_pay_mode();
		  $this->data["users"] =$this->accountmodule->users_list($sess_group,$sess_company);
		  $this->data['userid'] = $sess_user;
		  $this->_render('pages/accounts/payment_adj/payment_adj_list');
		 }
	}
	
	public function add_payment_adjustment_vendor()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		if(isset($_POST['pay_adj_add']))
		{
		
		  $pay_adj_type = $this->security->xss_clean($this->input->post('pay_adj_type'));
		 
		  $recp_no = $this->security->xss_clean($this->input->post('recp_no'));
		  $receipt_id = $this->security->xss_clean($this->input->post('receipt_id'));
		  //$party_name = $this->security->xss_clean($this->input->post('party_name'));
		  $recp_party_id = $this->security->xss_clean($this->input->post('recp_party_id'));
		  $amount = $this->security->xss_clean($this->input->post('amount'));
		  $recp_loc = $this->security->xss_clean($this->input->post('recp_loc'));
		  $recp_date = $this->security->xss_clean($this->input->post('recp_date'));
		  $recp_appr = $this->security->xss_clean($this->input->post('recp_appr'));
		  $pay_adj_status = $this->security->xss_clean($this->input->post('pay_adj_status'));
		  $inv_id = $this->security->xss_clean($this->input->post('inv_id'));
		  $inv_no = $this->security->xss_clean($this->input->post('inv_no'));
		  $party_name = $this->security->xss_clean($this->input->post('party_name'));
		  $party_id = $this->security->xss_clean($this->input->post('party_id'));
		  $recp_amt = $this->security->xss_clean($this->input->post('recp_amt'));
		  $payable_amt = $this->security->xss_clean($this->input->post('payable_amt'));
		  $paid_amt = $this->security->xss_clean($this->input->post('paid_amt'));
		  $due_amt = $this->security->xss_clean($this->input->post('due_amt'));
		  $adj_amt = $this->security->xss_clean($this->input->post('adj_amt'));
		  $payment_status = $this->security->xss_clean($this->input->post('invoice_status'));
		  $receiptAmount = $this->security->xss_clean($this->input->post('receiptAmount'));
		  
	
		  if($pay_adj_type == "paymentreceipt")
		   {
				$pay_adj_ven_details = array(
					'payment_pay_adj_vendor_id'=>$recp_party_id,
					'payment_pay_adj_receipt_id'=>$receipt_id,
					'payment_pay_adj_date'=>$recp_date,
					'payment_pay_adj_location_id'=>$recp_loc,
					'payment_pay_adj_approved_by'=>$recp_appr,
					'payment_pay_adj_status'=>$pay_adj_status,
					'payment_pay_adj_amount'=>$amount,
					'payment_pay_adj_updated_date'=> date('Y-m-d h:i:s'),
					'payment_pay_adj_created_by'=>$sess_user,
					'payment_pay_adj_updated_by' =>$sess_user
					);
			
				$pay_adj_id= $this->accountmodule->add_pay_adj_pr_details($pay_adj_ven_details);
				
				if(!empty ($inv_id))
				{
					$result=count($inv_id);
					for($i=1; $i<=$result; $i++)
					{
						if($adj_amt[$i] != '0.00')
						{
								$paid_amount[$i]=$paid_amt[$i] + $adj_amt[$i];
						
						
							$pay_adj_inv_items=array(
								'payment_payment_invoice_id'=>$inv_id[$i],
								'payment_payment_vendor_id'=>$party_id[$i],
								'payment_payment_invoice_amount'=>$recp_amt[$i],
								'payment_payment_paid_amount'=>$paid_amount[$i],
								'payment_payment_due_amount'=>$due_amt[$i],
								'payment_payment_adjusted_amount'=>$adj_amt[$i],
								'payment_payment_status'=>$payment_status[$i],
								);
							
							$this->accountmodule->add_pay_adj_pr_pay_details($pay_adj_inv_items,$inv_id[$i]);
							$pay_adj_invoice_summary=array(
								'receipt_id'=>$receipt_id,
								'invoice_id'=>$inv_id[$i],
								'amount'=>$adj_amt[$i],
								);
						
							$this->accountmodule->add_pay_adj_payment_summary($pay_adj_invoice_summary);	
							
							$purchase_invoice_payment_status=array(
												'po_invoice_payment_status'=>$payment_status[$i],
												);
						
							$this->accountmodule->update_purchase_inv_pay_status($purchase_invoice_payment_status,$inv_id[$i]);
							
						}
					}
				}
				  
					$receipt_balance = array(
						'payment_receipt_balance_amount'=>$receiptAmount,
						);
					
					$this->accountmodule->update_payment_receipt_balance($receipt_id,$receipt_balance);
					redirect('accounts/add_payment_adjustment_vendor');
			}
		}
	  else 
	   {
		  $this->title = "Payment Receipt";
		  $this->keywords = "Payment Receipt";
		  $this->data["locationdata"] = $this->accountmodule->get_alllocation();
		  $this->data["paymentmode"] = $this->accountmodule->get_all_pay_mode();
		  $this->data["users"] =$this->accountmodule->users_list($sess_group,$sess_company);
		  $this->data['userid'] = $sess_user;
		  $this->_render('pages/accounts/payment_adj/payment_adj_list_vendor');
		 }
	}
	
	public function get_receipt_popup()
	{
		$receipt_type = $this->input->post('receipt_type');
		
		if($receipt_type == "invoicereceipt")
		{	
			$this->data["invoice_receipt"] = $this->accountmodule->get_invrecp_for_popup_grid();
		
			$result = $this->load->view("pages/accounts/payment_adj/invoice_recp_popup", $this->data, true);
				
			echo $result; 
		}
		else if($receipt_type == "paymentreceipt")
		{
			$this->data["payment_receipt"] = $this->accountmodule->get_payrecp_for_popup_grid();
		
			$result = $this->load->view("pages/accounts/payment_adj/payment_recp_popup", $this->data, true);
				
			echo $result; 
		}
		exit;
	}
	
	public function getinvoice_recp_customer()
	{
		$invrecp_id=$this->input->post('invrecp_id');
		$cus_id=$this->input->post('cus_id');
		
		$this->data["sales_invoice"] = $this->accountmodule->get_so_invoice_detils($cus_id,$invrecp_id);
		
		$sales_invoice_list=$this->data["sales_invoice"]['invoice'];
		
		
		$data['view_order'] =$this->load->view('pages/accounts/payment_adj/invoice_recp_append_popup.php',$this->data,true);
				
		$data['table_count'] = count($sales_invoice_list);
		
		$result = json_encode($data);
		
		echo $result; 
		
	//	echo $this->load->view('pages/accounts/payment_adj/invoice_recp_append_popup.php',$this->data,true);
		
		exit;
	}

	
	public function getpayment_recp_vendor()
	{
		$payrecp_id=$this->input->post('payrecp_id');
		$ven_id=$this->input->post('ven_id');
	
		$this->data["purchase_invoice"] = $this->accountmodule->get_po_invoice_detils($ven_id, $payrecp_id);
		
		$purchase_invoice_list=$this->data["purchase_invoice"]['invoice'];
		
		
		$data['view_order'] =$this->load->view('pages/accounts/payment_adj/payment_recp_append_popup.php',$this->data,true);
				
		$data['table_count'] = count($purchase_invoice_list);
		
		$result = json_encode($data);
		
		echo $result; 
		
		
		//echo $this->load->view('pages/accounts/payment_adj/payment_recp_append_popup.php',$this->data,true);
		exit;
	}
	
	public function getpayment_recp_vendor_test()
	{
		
		$ven_id= '8';
		$payrecp_id = '11';
		
		$this->data["sales_invoice"] = $this->accountmodule->get_po_invoice_detils($ven_id,$payrecp_id);
		
		//echo "<pre>";print_r($sales_invoice);exit;
		
		$this->_render('pages/accounts/payment_adj/invoice_recp_append');
		
		
	//	echo $this->load->view('pages/accounts/payment_adj/invoice_recp_append_popup.php',$this->data,true);
		
	
	}


/////////////////////////CREDIT NOTE////////////////////////////////////////////
	
	public function creditnotes($accounts='Customer',$sort_order='',$sort_by='desc')
	{	

		if($accounts == "Customer")
		{	
		if($sort_order==""){
			$sort_order ="customer_accounts_id";
		}
			$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			$limit =10;
			$Result = $this->accountmodule->get_credit_cus_grid($limit,$page,$sort_order,$sort_by);
			$this->data["credit_details"]=$Result['rows'];
			$this->session->unset_userdata('credit_cus_search');

			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/creditnotes/Customer').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=6;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
		}
		else if($accounts == "Vendor")
		{
			if($sort_order==""){
			$sort_order ="vendors_accounts_id";
			}
			$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			$limit =10;
			$Result =  $this->accountmodule->get_credit_ven_grid($limit,$page,$sort_order,$sort_by);
			$this->data["credit_details"] = $Result['rows'];
			$this->session->unset_userdata('credit_ven_search');
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/creditnotes/Vendor').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by; 	
			
		}
			
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/credit_notes_list');
	}
	
	
	public function creditnotes_ven($accounts='Vendor',$sort_order='',$sort_by='desc')
	{	

		if($accounts == "Vendor")
		{
			if($sort_order==""){
			$sort_order ="vendors_accounts_id";
			}
			$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			$limit =10;
			$Result =  $this->accountmodule->get_credit_ven_grid($limit,$page,$sort_order,$sort_by);
			$this->data["credit_details"] = $Result['rows'];
			$this->session->unset_userdata('credit_ven_search');
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/creditnotes/Vendor').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by; 	
			
		}
			
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/credit_notes_list_ven');
	}
	 	
	public function search_cus_credit_node_list($sort_order ='customer_accounts_id',$sort_by = 'desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_cus_no = $this->security->xss_clean($this->input->post('search_cus_no'));
			$search_cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
			 $search_status = $this->security->xss_clean($this->input->post('search_status'));
			$credit_cus_search= array(
					'search_cus_no' => $search_cus_no,
					'search_cus_name' =>$search_cus_name,
					'search_status' =>$search_status,
					);	
			$this->session->set_userdata('credit_cus_search',$credit_cus_search);
		}
			$search_data = $this->session->userdata('credit_cus_search');
						
			$search_cus_no = $search_data['search_cus_no'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_status = $search_data['search_status'];
		 	 
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		
		$Result = $this->accountmodule->search_credit_cus_grid($limit,$page,$sort_order,$sort_by,$search_cus_no,$search_cus_name,$search_status);
		$this->data["credit_details"]=$Result['rows'];

		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('accounts/creditnotes/Customer').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/credit_notes_list');
	}
	
	/** search_ven_credit_node_list **/
	
	public function search_ven_credit_node_list($sort_order ='vendors_accounts_id',$sort_by = 'desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_ven_no = $this->security->xss_clean($this->input->post('search_ven_no'));
			$search_ven_name = $this->security->xss_clean($this->input->post('search_ven_name'));
			 $search_status = $this->security->xss_clean($this->input->post('search_status'));
  
			$credit_ven_search= array(
					'search_ven_no' => $search_ven_no,
					'search_ven_name' =>$search_ven_name,
					'search_status' =>$search_status,
					);	
			$this->session->set_userdata('credit_ven_search',$credit_ven_search);
		}
			$search_data = $this->session->userdata('credit_ven_search');
 			$search_ven_no = $search_data['search_ven_no'];
			$search_ven_name = $search_data['search_ven_name'];
		 	$search_status = $search_data['search_status'];
			 
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		
		$Result = $this->accountmodule->search_credit_ven_grid($limit,$page,$sort_order,$sort_by,$search_ven_no,$search_ven_name,$search_status);
		$this->data["credit_details"]=$Result['rows'];
 //echo "<pre>"; print_r($this->data["credit_details"]); exit;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('accounts/creditnotes/Vendor').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/credit_notes_list');
	}
	
	/** search_ven_debit_node_list **/
	
	public function search_ven_debit_node_list($sort_order ='vendors_accounts_id',$sort_by = 'desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_ven_no = $this->security->xss_clean($this->input->post('search_ven_no'));
			$search_ven_name = $this->security->xss_clean($this->input->post('search_ven_name'));
			$search_status = $this->security->xss_clean($this->input->post('search_status'));
			  
			$debit_ven_search= array(
					'search_ven_no' => $search_ven_no,
					'search_ven_name' =>$search_ven_name,
					'search_status' =>$search_status,
					);	
			$this->session->set_userdata('debit_ven_search',$debit_ven_search);
		}
			$search_data = $this->session->userdata('debit_ven_search');
						
			$search_ven_no = $search_data['search_ven_no'];
			$search_ven_name = $search_data['search_ven_name'];
			$search_status = $search_data['search_status'];
		 	 
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		
		$Result = $this->accountmodule->search_debit_ven_grid($limit,$page,$sort_order,$sort_by,$search_ven_no,$search_ven_name,$search_status);
		$this->data["credit_details"]=$Result['rows'];
 
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('accounts/debitnotes/Vendor').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/debit_notes_list');
	}
	
	public function search_cus_debit_node_list($sort_order ='customer_accounts_id',$sort_by = 'desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_cus_no = $this->security->xss_clean($this->input->post('search_cus_no'));
			$search_cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
			$search_status = $this->security->xss_clean($this->input->post('search_status'));
			
			$credit_cus_search= array(
					'search_cus_no' => $search_cus_no,
					'search_cus_name' =>$search_cus_name,
					'search_status' =>$search_status,
					);	
			$this->session->set_userdata('debit_cus_search',$credit_cus_search);
		}
			$search_data = $this->session->userdata('debit_cus_search');
						
			$search_cus_no = $search_data['search_cus_no'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_status = $search_data['search_status'];
		 	 
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		
		$Result = $this->accountmodule->search_debit_cus_grid($limit,$page,$sort_order,$sort_by,$search_cus_no,$search_cus_name,$search_status);
		$this->data["credit_details"]=$Result['rows'];
//echo "<pre>"; print_r($this->data["credit_details"]); exit;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('accounts/creditnotes/Customer').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/debitnotes/debit_notes_list');
	}


	/******************* View Credit Customer Note **************/

	public function viewcredit_cus($id)
	{	
		$this->data["credit_details"] = $this->accountmodule->get_sales_return_credit_cus_view($id);
		//echo "<pre>"; print_r($this->data["credit_details"]); exit;
		
		$customer= $this->accountmodule->get_credit_cus($id);
		
		$customer_code = $customer[0]['customer_code'];		
		$customer_name = $customer[0]['customer_name'];
		//echo $customer_name;exit;

		$this->data['customer_code'] = $customer_code;
		$this->data['customer_name'] = $customer_name;

		//print_r($this->data['customer_code']);exit;


		//echo "<pre>"; print_r($this->data["credit_details"]); exit;	
		$this->data["credit_account"] = $this->accountmodule->get_credit_cus_accounts_view($id);

		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/view_credit_notes_cus');
	}



	/******************* View Credit Vendor Note **************/

	public function viewcredit_ven($id)
	{	
		
		$this->data["credit_details"] = $this->accountmodule->get_credit_ven_view($id);

		$vendor= $this->accountmodule->get_credit_ven($id);
		
		$vendor_code = $vendor[0]['vendor_code'];		
		$vendor_name = $vendor[0]['vendor_name'];
		//echo $customer_name;exit;

		$this->data['vendor_code'] = $vendor_code;
		$this->data['vendor_name'] = $vendor_name;
			
		$this->data["credit_account"] = $this->accountmodule->get_credit_ven_accounts_view($id);
		
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/view_credit_notes_ven');
	}


	/******************* Add Credit Note **************/

	public function add_credit_note()
	{

		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['add_credit']))
		{
			$account_user_id = $this->security->xss_clean($this->input->post('user_id'));
			$account_for = $this->security->xss_clean($this->input->post('account_for'));
			$account_type = $this->security->xss_clean($this->input->post('account_type'));
			$account_amount = $this->security->xss_clean($this->input->post('amount'));
			$description = $this->security->xss_clean($this->input->post('description'));

				$credit_data=array(
							'account_user_id'=>$account_user_id,
							'account_for'=>$account_for,
							'account_type'=>$account_type,
							'account_amount'=>$account_amount,
							'account_description'=>$description,
							'account_updated_by'=>$sess_user,
							'account_created_by'=>$sess_user,
							'account_add_date'=>date('Y-m-d h:i:s'),
							'account_update_date'=>date('Y-m-d h:i:s'),
							'account_status'=>'active',
							);
				
				$this->accountmodule->add_credit($credit_data);
				
				
					/*Start Custmoer Debit And Credit calculations */
				if($account_for == 'customer')
				{
					$cus_id = $account_user_id;
					$get_cus_accounts = $this->accountmodule->get_cus_accounts($cus_id);	


					if(!empty($get_cus_accounts))
					{

					$deb_amt= $get_cus_accounts->customer_accounts_debit;
					$cred_amt= $get_cus_accounts->customer_accounts_credit;

					if($deb_amt == '0.00')
					{
							$accounts_total = $account_amount + $cred_amt;
							
							$so_customer_accounts_details = array(
								'customers_accounts_customer_id'=>$cus_id,
								'customer_accounts_credit'=>$accounts_total,
								'customer_accounts_debit'=>'0.00'					
								);
						
						$this->accountmodule->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
					}
					else
					{
						
						if($deb_amt < $account_amount)
						{
							$remaining_bill_amount = $account_amount - $deb_amt;
							$accounts_total = $remaining_bill_amount + $cred_amt;
								
							$accounts_total = $account_amount - $deb_amt;
							
							$so_customer_accounts_details=array(
								'customers_accounts_customer_id'=>$cus_id,
								'customer_accounts_credit'=>$accounts_total,
								'customer_accounts_debit'=>'0.00',					
							);
							
						}
						else
						{
							$accounts_total = $deb_amt - $account_amount;
							
							$so_customer_accounts_details=array(
								'customers_accounts_customer_id'=>$cus_id,
								'customer_accounts_credit'=>'0.00',
								'customer_accounts_debit'=>$accounts_total					
								);
								
						}
						
						$this->accountmodule->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
					}
					}
					else
					{
					$so_customer_accounts_details=array(
						'customers_accounts_customer_id'=>$cus_id,
						'customer_accounts_credit'=>$account_amount,
						'customer_accounts_debit'=>'0.00'
					);

					$this->accountmodule->add_so_customer_accounts_details($so_customer_accounts_details);	
					}
				
				}
				/*End Custmoer Debit And Credit calculations*/
				if($account_for == 'vendor')
				{
					 ///////////Vendor Accounts Starts here//////////
					 
					 
					$vendor_id= $account_user_id;
					 
					$get_ven_accounts=$this->accountmodule->ven_det($vendor_id);	
						
						if(!empty($get_ven_accounts))
						{
											
							$deb_amt= $get_ven_accounts->vendors_accounts_debit;
							$cred_amt= $get_ven_accounts->vendors_accounts_credit;
							
							if($deb_amt != '0')
							{
								if($deb_amt < $account_amount)
								{
									$accounts_total=$account_amount - $deb_amt;
									$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>$accounts_total,
										'vendors_accounts_debit'=>'0.00'					
										);
									
										
									$this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
									
								}
								else
								{
									$accounts_total= $deb_amt - $account_amount ;
									$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>'0.00',
										'vendors_accounts_debit'=>$accounts_total					
										);
										
										
									$this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
								
								}
							}
							
							else
							{
								$accounts_total=$cred_amt + $account_amount;
								$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>$accounts_total					
										);
									
								$this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
						
							}
							
						
						}
						else
						{
							$ven_acc_data=array(
								'vendors_accounts_vendor_id'=>$vendor_id,
								'vendors_accounts_credit'=>$account_amount
								);
							
							$this->accountmodule->ven_acc_insert($ven_acc_data);	
						
						}
				
				///////////Vendor Accounts Ends here//////////
				
				}
				
				$this->session->set_flashdata('message', 'Credit Note Created Sucessfully');
				redirect('accounts/creditnotes');
		}
		else
		{
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/add_credit_note');
		}
	}
	
	
	public function add_credit_note_ven()
	{

		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['add_credit']))
		{
			$account_user_id = $this->security->xss_clean($this->input->post('user_id'));
			$account_for = $this->security->xss_clean($this->input->post('account_for'));
			$account_type = $this->security->xss_clean($this->input->post('account_type'));
			$account_amount = $this->security->xss_clean($this->input->post('amount'));
			$description = $this->security->xss_clean($this->input->post('description'));

				$credit_data=array(
							'account_user_id'=>$account_user_id,
							'account_for'=>$account_for,
							'account_type'=>$account_type,
							'account_amount'=>$account_amount,
							'account_description'=>$description,
							'account_updated_by'=>$sess_user,
							'account_created_by'=>$sess_user,
							'account_add_date'=>date('Y-m-d h:i:s'),
							'account_update_date'=>date('Y-m-d h:i:s'),
							'account_status'=>'active',
							);
				
				$this->accountmodule->add_credit($credit_data);
				
				
					/*Start Custmoer Debit And Credit calculations */
			
				if($account_for == 'vendor')
				{
					 ///////////Vendor Accounts Starts here//////////
					 
					 
					$vendor_id= $account_user_id;
					 
					$get_ven_accounts=$this->accountmodule->ven_det($vendor_id);	
						
						if(!empty($get_ven_accounts))
						{
											
							$deb_amt= $get_ven_accounts->vendors_accounts_debit;
							$cred_amt= $get_ven_accounts->vendors_accounts_credit;
							
							if($deb_amt != '0')
							{
								if($deb_amt < $account_amount)
								{
									$accounts_total=$account_amount - $deb_amt;
									$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>$accounts_total,
										'vendors_accounts_debit'=>'0.00'					
										);
									
										
									$this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
									
								}
								else
								{
									$accounts_total= $deb_amt - $account_amount ;
									$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>'0.00',
										'vendors_accounts_debit'=>$accounts_total					
										);
										
										
									$this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
								
								}
							}
							
							else
							{
								$accounts_total=$cred_amt + $account_amount;
								$ven_acc_data=array(
										'vendors_accounts_vendor_id'=>$vendor_id,
										'vendors_accounts_credit'=>$accounts_total					
										);
									
								$this->accountmodule->ven_acc_update($ven_acc_data,$vendor_id);
						
							}
							
						
						}
						else
						{
							$ven_acc_data=array(
								'vendors_accounts_vendor_id'=>$vendor_id,
								'vendors_accounts_credit'=>$account_amount
								);
							
							$this->accountmodule->ven_acc_insert($ven_acc_data);	
						
						}
				
				///////////Vendor Accounts Ends here//////////
				
				}
				
				$this->session->set_flashdata('message', 'Credit Note Created Sucessfully');
				redirect('accounts/creditnotes_ven');
		}
		else
		{
		$this->title = "Credit Notes";
		$this->keywords = "Credit Notes";
		$this->_render('pages/accounts/creditnotes/add_credit_note_ven');
		}
	}


	/*********** Get Credit Popup based on Account Type *********/

	public function get_credit_popup()
	{
		$credit_type = $this->input->post('credit_type');
		
		if($credit_type == "customer")
		{	
			$this->data["customer_data"] = $this->accountmodule->getcustomerdetail_for_popup_grid();
		
			$result = $this->load->view("pages/accounts/creditnotes/customer_popup", $this->data, true);
				
			echo $result; 
		}
		else if($credit_type == "vendor")
		{
			$this->data["vendors"] = $this->accountmodule->getvendors_for_popup_grid();
		
			$result = $this->load->view("pages/accounts/creditnotes/vendor_popup", $this->data, true);
				
			echo $result; 
		}
		exit;
	}

	public function get_debit_popup()
	{
		$debit_type = $this->input->post('debit_type');
		
		if($debit_type == "customer")
		{	
			$this->data["customer_data"] = $this->accountmodule->getcustomerdetail_for_popup_grid();
		
			$result = $this->load->view("pages/accounts/creditnotes/customer_popup", $this->data, true);
				
			echo $result; 
		}
		else if($debit_type == "vendor")
		{
			$this->data["vendors"] = $this->accountmodule->getvendors_for_popup_grid();
		
			$result = $this->load->view("pages/accounts/creditnotes/vendor_popup", $this->data, true);
				
			echo $result; 
		}
		exit;
	}

	public function searchcustomer()
	{
		$cus_code=$this->security->xss_clean($this->input->post('cus_code'));
		$cus_name=$this->security->xss_clean($this->input->post('cus_name'));
		$cus_mobile=$this->security->xss_clean(trim($this->input->post('cus_mobile')));
		$cus_email=$this->security->xss_clean($this->input->post('cus_email'));
		
		$this->data['customer_data'] = $this->accountmodule->getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email);
		
		
		$result = $this->load->view("pages/accounts/creditnotes/searchcustomer_popup", $this->data, true);
				
		echo $result; exit;
		
	}

	public function searchvendar()
	{
		 
		$vendor_code=$this->security->xss_clean($this->input->post('vendor_code'));
		$vendor_name=$this->security->xss_clean($this->input->post('vendor_name'));
		$ven_mobile=$this->security->xss_clean(trim($this->input->post('ven_mobile')));
		$ven_email=$this->security->xss_clean($this->input->post('ven_email'));
		
		$this->data['vendors'] = $this->accountmodule->getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email);
		
		$result = $this->load->view("pages/accounts/creditnotes/searchvendor_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	
	
	public function debitnotes($accounts="Customer",$sort_order ='',$sort_by = 'desc')
	{	
		if($accounts == "Customer")
		{	
			if($sort_order == ""){
			$sort_order ='customer_accounts_id';
			}
			$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			$limit =10;
			$Result = $this->accountmodule->get_credit_cus_grid($limit,$page,$sort_order,$sort_by);
			$this->data["credit_details"]  = $Result['rows'];
			
			$this->session->unset_userdata('debit_cus_search');
	
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/debitnotes/Customer/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=6;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
		}
		
		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/debit_notes_list');
	}
	
		public function customer_debit_notes()
    {
		
    	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
	//var_dump($sales_order_id); exit;

		
		$Result = $this->accountmodule->get_credit_cus_details();
		
		$this->data["credit_details"]  = $Result['rows'];
		$this->data["debit_count"]  = $Result['debit_total'];
		$this->data["credit_count"]  = $Result['credit_total'];
		
		//echo $this->data["credit_count"]; exit;
		
		
		if(isset($_POST['export']))
		{
			$this->load->view('pages/accounts/export_credit_debit', $this->data);
		}
		
		
	}
	public function debitnotes_ven($accounts="Vendor",$sort_order ='',$sort_by = 'desc')
	{	
		if($accounts == "Vendor")
		{
			if($sort_order == ""){
			$sort_order ='vendors_accounts_id';
			}
			$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			$limit =10;
			$Result =  $this->accountmodule->get_credit_ven_grid($limit,$page,$sort_order,$sort_by);
			$this->data["credit_details"] = $Result['rows'];
			$this->session->unset_userdata('debit_ven_search');

			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('accounts/debitnotes_ven/Vendor/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=6;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		}
		
		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/debit_notes_list_ven');
	}

	/******************* View Debit Customer Note **************/

	public function viewdebit_cus($id)
	{	
		$this->data["credit_details"] = $this->accountmodule->get_debit_cus_view($id);

		$customer= $this->accountmodule->get_credit_cus($id);

		$customer_code = $customer[0]['customer_code'];		
		$customer_name = $customer[0]['customer_name'];

		$this->data['customer_code'] = $customer_code;
		$this->data['customer_name'] = $customer_name;
			
		$this->data["credit_account"] = $this->accountmodule->get_debit_cus_accounts_view($id);

		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/view_debit_notes_cus');
	}



	/******************* View Debit Vendor Note **************/

	public function viewdebit_ven($id)
	{	
		
		$this->data["credit_details"] = $this->accountmodule->get_purchase_return_debit_ven_view($id);

		$vendor= $this->accountmodule->get_credit_ven($id);
		
		$vendor_code = $vendor[0]['vendor_code'];		
		$vendor_name = $vendor[0]['vendor_name'];
		//echo $customer_name;exit;

		$this->data['vendor_code'] = $vendor_code;
		$this->data['vendor_name'] = $vendor_name;
			
		$this->data["credit_account"] = $this->accountmodule->get_debit_ven_accounts_view($id);
		
		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/view_debit_notes_ven');
	}



	/******************* Add Debit Note **************/
	
	public function add_debit_note()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		if(isset($_POST['add_debit']))
		{
			$account_user_id = $this->security->xss_clean($this->input->post('user_id'));
			$account_for = $this->security->xss_clean($this->input->post('account_for'));
			$account_type = $this->security->xss_clean($this->input->post('account_type'));
			$account_amount = $this->security->xss_clean($this->input->post('amount'));
			$description = $this->security->xss_clean($this->input->post('description'));

				$debit_data=array(
							'account_user_id'=>$account_user_id,
							'account_for'=>$account_for,
							'account_type'=>$account_type,
							'account_amount'=>$account_amount,
							'account_description'=>$description,
							'account_updated_by'=>$sess_user,
							'account_created_by'=>$sess_user,
							'account_add_date'=>date('Y-m-d h:i:s'),
							'account_update_date'=>date('Y-m-d h:i:s'),
							'account_status'=>'active',
							);
				
				$this->accountmodule->add_debit($debit_data);
				
					/////////////////////CUSTOMER SALES ACCOUNTS///////////////////////////////
		if($account_for == 'customer')
		{
			$cus_id = $account_user_id;
			$get_cus_accounts=$this->accountmodule->get_cus_accounts($cus_id);	
					
			if(!empty($get_cus_accounts))
			{
										
				$deb_amt= $get_cus_accounts->customer_accounts_debit;
				$cred_amt= $get_cus_accounts->customer_accounts_credit;
							
				if($cred_amt != '0')
				{
					if($cred_amt < $account_amount)
					{
						$remaining_invoice_amount = $account_amount - $cred_amt;
						$accounts_total=$remaining_invoice_amount + $deb_amt;
						$so_customer_accounts_details=array(
							'customers_accounts_customer_id'=>$cus_id,
							'customer_accounts_debit'=>$accounts_total,
							'customer_accounts_credit'=>'0.00',					
						);
						//	echo "<pre>";print_r($so_customer_accounts_details);
					$this->accountmodule->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
					}
					else
					{
						$accounts_total= $cred_amt - $account_amount ;
						$so_customer_accounts_details=array(
							'customers_accounts_customer_id'=>$cus_id,
							'customer_accounts_debit'=>'0.00',
							'customer_accounts_credit'=>$accounts_total,					
						);
							//echo "<pre>";print_r($so_customer_accounts_details);
						$this->accountmodule->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
								
					}
				}
				else
				{
					$accounts_total = $deb_amt + $account_amount;
								
					$so_customer_accounts_details=array(
						'customers_accounts_customer_id'=>$cus_id,
						'customer_accounts_debit'=>$accounts_total,
						'customer_accounts_credit'=>'0.00',					
					);
										
					//echo "<pre>";print_r($so_customer_accounts_details);
					$this->accountmodule->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
						
				}
			}
			else
			{
							
				$so_customer_accounts_details=array(
					'customers_accounts_customer_id'=>$cus_id,
					'customer_accounts_debit'=>$account_amount,
					'customer_accounts_credit'=>'0.00',
				);
					//echo "<pre>";print_r($so_customer_accounts_details);
				$this->accountmodule->add_so_customer_accounts_details($so_customer_accounts_details);	
			}
		}
		
		//////////////////////////CUSTOMER SALES ACCOUT CLOSES HERE ////////////////////////////////////////
		
		//////////////////////////Vendor Debit And Credit calculations ////////////
		if($account_for == 'vendor')
		{
			$ven_id= $account_user_id;
			
			$get_ven_accounts = $this->accountmodule->ven_det($ven_id);
				
				
				if(!empty($get_ven_accounts))
				{
				
					$deb_amt= $get_ven_accounts->vendors_accounts_debit;
					$cred_amt= $get_ven_accounts->vendors_accounts_credit;
					
									
					if($cred_amt == '0.00')
					{
							$accounts_total = $account_amount + $deb_amt;
							
							$ven_acc_data = array(
								'vendors_accounts_vendor_id'=>$ven_id,
								'vendors_accounts_debit'=>$accounts_total,
								'vendors_accounts_credit'=>'0.00'					
								);
							
					$ven_acc_update = $this->accountmodule->ven_acc_update($ven_acc_data,$ven_id);

					 
					}
					else
					{
						
						if($cred_amt < $account_amount)
						{
							$accounts_total = $account_amount - $cred_amt;
							 
							$ven_acc_data=array(
								'vendors_accounts_vendor_id'=>$ven_id,
								'vendors_accounts_credit'=>'0.00',
								'vendors_accounts_debit'=>$accounts_total					
							);
							
						}
						else
						{
							$accounts_total = $cred_amt - $account_amount;
							
							$ven_acc_data=array(
								'vendors_accounts_vendor_id'=>$ven_id,
								'vendors_accounts_credit'=>$accounts_total,
								'vendors_accounts_debit'=>'0.00'					
							);
							
						}
					$ven_acc_update = $this->accountmodule->ven_acc_update($ven_acc_data,$ven_id);

					}
				}
				else
				{
					$ven_acc_data=array(
						'vendors_accounts_vendor_id'=>$ven_id,
						'vendors_accounts_credit'=>'0.00',
						'vendors_accounts_debit'=>$account_amount
					);
					
				 $ven_acc_insert = $this->accountmodule->ven_acc_insert($ven_acc_data);
	 
				}
		
		}
				//////////////////////////Vendor Debit And Credit calculations Closes Here ////////////
		
				$this->session->set_flashdata('message', 'Debit Note Created Sucessfully');
				redirect('accounts/debitnotes');
		}
		else
		{
		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/add_debit_note');
		}
	}
	
	
	public function add_debit_note_ven()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		if(isset($_POST['add_debit']))
		{
			$account_user_id = $this->security->xss_clean($this->input->post('user_id'));
			$account_for = $this->security->xss_clean($this->input->post('account_for'));
			$account_type = $this->security->xss_clean($this->input->post('account_type'));
			$account_amount = $this->security->xss_clean($this->input->post('amount'));
			$description = $this->security->xss_clean($this->input->post('description'));

				$debit_data=array(
							'account_user_id'=>$account_user_id,
							'account_for'=>$account_for,
							'account_type'=>$account_type,
							'account_amount'=>$account_amount,
							'account_description'=>$description,
							'account_updated_by'=>$sess_user,
							'account_created_by'=>$sess_user,
							'account_add_date'=>date('Y-m-d h:i:s'),
							'account_update_date'=>date('Y-m-d h:i:s'),
							'account_status'=>'active',
							);
				
				$this->accountmodule->add_debit($debit_data);
				
		
		
		//////////////////////////CUSTOMER SALES ACCOUT CLOSES HERE ////////////////////////////////////////
		
		//////////////////////////Vendor Debit And Credit calculations ////////////
		if($account_for == 'vendor')
		{
			$ven_id= $account_user_id;
			
			$get_ven_accounts = $this->accountmodule->ven_det($ven_id);
				
				
				if(!empty($get_ven_accounts))
				{
				
					$deb_amt= $get_ven_accounts->vendors_accounts_debit;
					$cred_amt= $get_ven_accounts->vendors_accounts_credit;
					
									
					if($cred_amt == '0.00')
					{
							$accounts_total = $account_amount + $deb_amt;
							
							$ven_acc_data = array(
								'vendors_accounts_vendor_id'=>$ven_id,
								'vendors_accounts_debit'=>$accounts_total,
								'vendors_accounts_credit'=>'0.00'					
								);
							
					$ven_acc_update = $this->accountmodule->ven_acc_update($ven_acc_data,$ven_id);

					 
					}
					else
					{
						
						if($cred_amt < $account_amount)
						{
							$accounts_total = $account_amount - $cred_amt;
							 
							$ven_acc_data=array(
								'vendors_accounts_vendor_id'=>$ven_id,
								'vendors_accounts_credit'=>'0.00',
								'vendors_accounts_debit'=>$accounts_total					
							);
							
						}
						else
						{
							$accounts_total = $cred_amt - $account_amount;
							
							$ven_acc_data=array(
								'vendors_accounts_vendor_id'=>$ven_id,
								'vendors_accounts_credit'=>$accounts_total,
								'vendors_accounts_debit'=>'0.00'					
							);
							
						}
					$ven_acc_update = $this->accountmodule->ven_acc_update($ven_acc_data,$ven_id);

					}
				}
				else
				{
					$ven_acc_data=array(
						'vendors_accounts_vendor_id'=>$ven_id,
						'vendors_accounts_credit'=>'0.00',
						'vendors_accounts_debit'=>$account_amount
					);
					
				 $ven_acc_insert = $this->accountmodule->ven_acc_insert($ven_acc_data);
	 
				}
		
		}
				//////////////////////////Vendor Debit And Credit calculations Closes Here ////////////
		
				$this->session->set_flashdata('message', 'Debit Note Created Sucessfully');
				redirect('accounts/debitnotes_ven/Vendor');
		}
		else
		{
		$this->title = "Debit Notes";
		$this->keywords = "Debit Notes";
		$this->_render('pages/accounts/debitnotes/add_debit_note_ven');
		}
	}
	
	public function customerpopup()
	{
		$this->data["customer_data"] = $this->accountmodule->getcustomerdetail_for_popup_grid();
		$result = $this->load->view("pages/accounts/inv_recp/customer_popup", $this->data, true);
		echo $result; exit;
	}
	
	public function searchcustomerdetails()
	{
		$cus_code=$this->security->xss_clean($this->input->post('cus_code'));
		$cus_name=$this->security->xss_clean($this->input->post('cus_name'));
		$cus_mobile=$this->security->xss_clean(trim($this->input->post('cus_mobile')));
		$cus_email=$this->security->xss_clean($this->input->post('cus_email'));
		
		$this->data['customer_data'] = $this->accountmodule->getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email);
		
		$result = $this->load->view("pages/accounts/inv_recp/searchcustomer_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */