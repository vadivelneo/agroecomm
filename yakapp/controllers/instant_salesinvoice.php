<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instant_salesinvoice extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('locationmodel');
		  $this->load->library('pagination');
		  $this->load->model('salesinvoicemodel');
		  $this->load->model('productmodule'); 
		  $this->load->model('locationmodel');
		  $this->load->model('mastersmodule');
		  $this->load->model('organizationsmodel');
		  $this->load->model('customermodule');
		  $this->load->model('instantsalesinvoicemodel');
		  
		  $sessionData = $this->session->userdata('userlogin');
		 
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
		 else
		{	
			$this->data['login_user_id'] = $sessionData['user_id'];
			$this->data['login_company_id'] = $sessionData['company_id'];
			$this->data['login_group_id'] = $sessionData['group_id'];
			$this->data['tax_value'] = $sessionData['company_tax'];
			
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
		redirect('instant_salesinvoice/salesinvoice_list');
	}
	
	public function search_salesinvoice($sort_order='sale_invoice_id',$sort_by='desc')
	{

		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
		$si_no = $this->security->xss_clean($this->input->post('search_si_no'));
		$so_no = $this->security->xss_clean($this->input->post('search_so_no'));
		$cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
		$status = $this->security->xss_clean($this->input->post('status'));
		$from_date = $this->security->xss_clean($this->input->post('from_date'));
		$from_date =date("Y-m-d", strtotime($from_date));
		$to_date = $this->security->xss_clean($this->input->post('to_date'));
		$to_date =date("Y-m-d", strtotime($to_date));
		 
		$salesinvoice_search= array(
				'search_si_no' => $si_no,
				'search_so_no' =>$so_no,
				'search_cus_name' => $cus_name,
				'search_status' => $status,
 				'from_date' => $from_date,
				'to_date' => $to_date,
				
				);	
		$this->session->set_userdata('sales_invoice_data',$salesinvoice_search);
		}
			$search_data = $this->session->userdata('sales_invoice_data');			
			$search_si_no = $search_data['search_si_no'];
			$search_so_no = $search_data['search_so_no'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
			
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->instantsalesinvoicemodel->search_get_all_SI($sess_group,$sess_company,$search_si_no,$search_so_no,$search_status,$limit,$page,$sort_order,$sort_by,$search_cus_name,$from_date,$to_date);
		$this->data["invoice_list"] = $Result['rows'];
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('instant_salesinvoice/search_salesinvoice/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
			
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->_render('pages/instant_salesinvoice/salesinvoice_list');
	}
	
	public function salesinvoice_list($sort_order='sale_invoice_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->session->unset_userdata('sales_invoice_data');
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->instantsalesinvoicemodel->get_all_SI($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["invoice_list"] = $Result['rows'];
		//echo"<pre>"; print_r($this->data["invoice_list"]); exit;
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('instant_salesinvoice/salesinvoice_list/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
			
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->_render('pages/instant_salesinvoice/salesinvoice_list');
	}

	public function add_instant_salesinvoice()
	{
			$sessionData = $this->session->userdata('userlogin');
			$sess_user=$sessionData['user_id'];
			$sess_company=$sessionData['company_id'];

			///***    Sales Invoice Prefix ***///

			$prefix_si = $this->instantsalesinvoicemodel->getprefix('12');
			$Siprefix = $prefix_si->prefix_name;
			$code_si = $this->instantsalesinvoicemodel->getlastid_si();
			$companycode = $this->instantsalesinvoicemodel->getlastidwithcompany($sess_company);
			
			if(!empty($companycode))
			{
					$lastSiwithcompanyCode = $companycode->sale_invoice_no;
					//echo $lastSiwithcompanyCode;
				
				$lengthPrefix = strlen($Siprefix);
				$strcompanySplit = str_split($lastSiwithcompanyCode, $lengthPrefix);
				$SIcompanyLastdigit = $strcompanySplit[0];
				$companyexplode = explode($SIcompanyLastdigit,$lastSiwithcompanyCode);
				$SIcompanyLastnumber = $companyexplode[1];
				if($SIcompanyLastdigit == $Siprefix)
				{
					$sicompanycode = $SIcompanyLastnumber+1;
					$companydigits = sprintf ('%04d', $sicompanycode);
					//$SOcompanycodewithPrefix = $Siprefix.$companydigits;
					
			$SOcompanycodewithPrefix = $Siprefix.$companydigits;
			
				}
				else
				{
			$SOcompanycodewithPrefix = $Siprefix.'0001';
				}
			}
			else
			{	
			$SOcompanycodewithPrefix = $Siprefix.'0001';
			}
			
			$this->data['sicode'] = $SOcompanycodewithPrefix;
			$this->data['Siprefix'] = $Siprefix;
			
			$randomstring_SI = $SOcompanycodewithPrefix; 


		if(isset($_POST['save']))
		{ 
	
			$si_invoice_num = $this->security->xss_clean($this->input->post('si_invoice_num'));
			$sales_invoice_date = $this->security->xss_clean($this->input->post('sales_invoice_date'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
		    $so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$so_customer_code = $this->security->xss_clean($this->input->post('so_customer_code'));
			$sale_invoice_amount = $this->security->xss_clean($this->input->post('sale_invoice_amount'));
			
			$sale_invoice_qty = $this->security->xss_clean($this->input->post('sale_invoice_qty'));
			$sale_invoice_weight = $this->security->xss_clean($this->input->post('sale_invoice_weight'));
			$sale_invoice_value = $this->security->xss_clean($this->input->post('sale_invoice_value'));
			$sale_invoice_freight = $this->security->xss_clean($this->input->post('sale_invoice_freight'));
			$sale_invoice_tax = $this->security->xss_clean($this->input->post('sale_invoice_tax'));
			$sale_invoice_company = $this->security->xss_clean($this->input->post('sale_invoice_company'));
			
			//Validating Sales Invoice Invoice number exist or nor ao that SO & SI will not be created
			$so_status = $this->security->xss_clean($this->input->post('so_status'));
			$sales_invo_courier_type = $this->security->xss_clean($this->input->post('sales_invo_courier_type'));
			$sale_invoice_shipper = $this->security->xss_clean($this->input->post('sale_invoice_shipper'));
			$sale_invoice_receiver = $this->security->xss_clean($this->input->post('sale_invoice_receiver'));
			$si_payment_mode = $this->security->xss_clean($this->input->post('si_payment_mode'));
			$sales_invo_terms_conditions= $this->security->xss_clean($this->input->post('sales_invo_terms_conditions'));
			$valid_si= $this->salesinvoicemodel->si_vaildation($si_invoice_num); //** Vendor Validation **//
			
			if($valid_si == 0)
			{
				
			//////***** Add Sales Invoice *****//////
			
			 $si_data=array(
								'sale_invoice_no'=>$si_invoice_num,
								'sale_invoice_company_id'=>$sess_company,								
								'sale_invoice_date'=>date("Y-m-d", strtotime($sales_invoice_date )),
								'sale_invoice_customer_id'=>$so_customer_id,
								'sale_invoice_amount'=>$sale_invoice_amount ,
								'sale_invoice_qty'=>$sale_invoice_qty ,
								'sale_invoice_weight'=>$sale_invoice_weight ,
								'sale_invoice_value'=>$sale_invoice_value ,
								'sale_invoice_freight'=>$sale_invoice_freight ,
								'sale_invoice_tax'=>$sale_invoice_tax ,
								'sale_invoice_company'=>$sale_invoice_company ,
								'sale_invoice_status'=>$so_status ,
								'sales_invo_courier_type'=>$sales_invo_courier_type,
								'sale_invoice_shipper'=>$sale_invoice_shipper ,
								'sale_invoice_receiver'=>$sale_invoice_receiver ,
								'sale_invoice_payment_mode'=>$si_payment_mode ,
								'sale_invoice_term_condition'=>$sales_invo_terms_conditions,
								'sale_invoice_added_by'=>$sess_user,
								'sale_invoice_updated_by'=>$sess_user,
								'sale_invoice_add_date'=>date('Y-m-d h:i:s'),
								'sale_invoice_active_status'=>'active', 
								);
                       // echo"<pre>"; print_r($si_data); exit;
						
			$si_id = $this->instantsalesinvoicemodel->add_so_invoice($si_data);
			

			 	$this->session->set_flashdata('message', 'Sale Invoice Added Sucessfully');
			 	redirect('instant_salesinvoice/salesinvoice_list');
			}
			else
			{
				$this->session->set_flashdata('message', 'Sale Invoice Already Exist');
				//redirect('instant_salesinvoice/edit_salesinvoice/'.$id);
				redirect('instant_salesinvoice/salesinvoice_list/');
			}
		}
		else
		{
			$this->data["paymentmode"] = $this->instantsalesinvoicemodel->get_all_pay_mode();
			$this->data['country'] = $this->organizationsmodel->get_country();
			$this->data["manufacturer_srt_name"] = $this->mastersmodule->get_all_manufacturer(); //** Get All Company **//	
			$this->data["courier_type"] = $this->mastersmodule->get_all_courier_type();			
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/instant_salesinvoice/add_instant_sales');
		}
	}
	
	public function edit_salesinvoice($id)
	{
		 
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
			
		$this->data["invoice_edit"] = $this->instantsalesinvoicemodel->get_single_invoice($id);
		$this->data["paymentmode"] = $this->instantsalesinvoicemodel->get_all_pay_mode();
		$this->data["manufacturer_srt_name"] = $this->mastersmodule->get_all_manufacturer(); //** Get All Company **//	
		$this->data["courier_type"] = $this->mastersmodule->get_all_courier_type();		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->_render('pages/instant_salesinvoice/edit_salesinvoice');
	}
	
	
	public function update_instant_salesinvoice($invoice_id)
	{
		//echo $id; exit;
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];

		if(isset($_POST['save']))
		{ 
			$si_invoice_num = $this->security->xss_clean($this->input->post('si_invoice_num'));
			$sales_invoice_date = $this->security->xss_clean($this->input->post('sales_invoice_date'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
		    $so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$so_customer_code = $this->security->xss_clean($this->input->post('so_customer_code'));
			$sale_invoice_amount = $this->security->xss_clean($this->input->post('sale_invoice_amount'));
			
			$sale_invoice_qty = $this->security->xss_clean($this->input->post('sale_invoice_qty'));
			$sale_invoice_weight = $this->security->xss_clean($this->input->post('sale_invoice_weight'));
			$sale_invoice_value = $this->security->xss_clean($this->input->post('sale_invoice_value'));
			$sale_invoice_freight = $this->security->xss_clean($this->input->post('sale_invoice_freight'));
			$sale_invoice_tax = $this->security->xss_clean($this->input->post('sale_invoice_tax'));
			$sale_invoice_company = $this->security->xss_clean($this->input->post('sale_invoice_company'));
			
			//Validating Sales Invoice Invoice number exist or nor ao that SO & SI will not be created
			$so_status = $this->security->xss_clean($this->input->post('so_status'));
			$sales_invo_courier_type = $this->security->xss_clean($this->input->post('sales_invo_courier_type'));
			$sale_invoice_shipper = $this->security->xss_clean($this->input->post('sale_invoice_shipper'));
			$sale_invoice_receiver = $this->security->xss_clean($this->input->post('sale_invoice_receiver'));
			$si_payment_mode = $this->security->xss_clean($this->input->post('si_payment_mode'));
			$sales_invo_terms_conditions= $this->security->xss_clean($this->input->post('sales_invo_terms_conditions'));
			$valid_si= $this->salesinvoicemodel->si_vaildation($si_invoice_num); //** Vendor Validation **//
			
			 $si_data=array(
								'sale_invoice_no'=>$si_invoice_num,
								'sale_invoice_company_id'=>$sess_company,								
								'sale_invoice_date'=>date("Y-m-d", strtotime($sales_invoice_date )),
								'sale_invoice_customer_id'=>$so_customer_id,
								'sale_invoice_amount'=>$sale_invoice_amount ,
								'sale_invoice_qty'=>$sale_invoice_qty ,
								'sale_invoice_weight'=>$sale_invoice_weight ,
								'sale_invoice_value'=>$sale_invoice_value ,
								'sale_invoice_freight'=>$sale_invoice_freight ,
								'sale_invoice_tax'=>$sale_invoice_tax ,
								'sale_invoice_company'=>$sale_invoice_company ,
								'sale_invoice_status'=>$so_status ,
								'sales_invo_courier_type'=>$sales_invo_courier_type,
								'sale_invoice_shipper'=>$sale_invoice_shipper ,
								'sale_invoice_receiver'=>$sale_invoice_receiver ,
								'sale_invoice_payment_mode'=>$si_payment_mode ,
								'sale_invoice_term_condition'=>$sales_invo_terms_conditions,
								'sale_invoice_added_by'=>$sess_user,
								'sale_invoice_updated_by'=>$sess_user,
								'sale_invoice_add_date'=>date('Y-m-d h:i:s'),
								'sale_invoice_active_status'=>'active', 
								);
                       // echo"<pre>"; print_r($si_data); exit;
								
			$this->instantsalesinvoicemodel->update_so_invoice($si_data, $invoice_id);
			
			if($so_status == 'delivered') 
			{	
					 $so_payment_details= array(
						'invoice_payment_invoice_id'=>$invoice_id,
						'invoice_payment_customer_id'=>$so_customer_id,
						'invoice_payment_invoice_tds'=>'',
						'invoice_payment_invoice_amount'=>$sale_invoice_amount,
						'invoice_payment_due_amount' =>$sale_invoice_amount,
					);
						
					$this->salesinvoicemodel->add_so_payment_details($so_payment_details);	
					 
					
			
					/////////////////////CUSTOMER SALES ACCOUNTS///////////////////////////////

					 $get_cus_accounts = $this->salesinvoicemodel->get_cus_accounts($so_customer_id);	
					
					if(!empty($get_cus_accounts))
					{
												
						$deb_amt= $get_cus_accounts->customer_accounts_debit;
						$cred_amt= $get_cus_accounts->customer_accounts_credit;
									
						if($cred_amt != '0')
						{
							if($cred_amt < $grand_total)
							{
								$remaining_invoice_amount = $grand_total - $cred_amt;
								$accounts_total=$remaining_invoice_amount + $deb_amt;
								$so_customer_accounts_details=array(
									'customers_accounts_customer_id'=>$so_customer_id,
									'customer_accounts_debit'=>$accounts_total,
									'customer_accounts_credit'=>'0.00',					
								);
								
								$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id);
							}
							else
							{
								$accounts_total= $cred_amt - $grand_total ;
								$so_customer_accounts_details=array(
									'customers_accounts_customer_id'=>$so_customer_id,
									'customer_accounts_debit'=>'0.00',
									'customer_accounts_credit'=>$accounts_total,					
								);
									
								$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id);
										
							}
						}
						else
						{
							$accounts_total = $deb_amt + $grand_total;
										
							$so_customer_accounts_details=array(
								'customers_accounts_customer_id'=>$so_customer_id,
								'customer_accounts_debit'=>$accounts_total,
								'customer_accounts_credit'=>'0.00',					
							);
												
							
							$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id);
								
						}
					}
					else
					{
									
						$so_customer_accounts_details=array(
							'customers_accounts_customer_id'=>$so_customer_id,
							'customer_accounts_debit'=>$sale_invoice_amount,
							'customer_accounts_credit'=>'0.00',
						);
						$this->salesinvoicemodel->add_so_customer_accounts_details($so_customer_accounts_details);	
					} 
							
				//////////////////////////CUSTOMER SALES ACCOUT CLOSES HERE ////////////////////////////////////////
						
			}
			
			
			
				
			 $this->session->set_flashdata('message', 'Sale Invoice Updated Sucessfully');
			 redirect('instant_salesinvoice/salesinvoice_list');
			
		}
		else
		{
			 redirect('instant_salesinvoice/salesinvoice_list');
		}
	}
	public function view_salesinvoice($id)
	{	
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data['city'] = $this->salesinvoicemodel->get_city();
		$this->data['state'] = $this->salesinvoicemodel->get_state();
		$this->data['country'] = $this->salesinvoicemodel->get_country();	
		$this->data["invoice_edit"] = $this->instantsalesinvoicemodel->get_single_invoice($id);
		
		
		$this->data["paymentmode"] = $this->instantsalesinvoicemodel->get_all_pay_mode();
		$this->data['country'] = $this->organizationsmodel->get_country();
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->_render('pages/instant_salesinvoice/view_salesinvoice');
	}
	
	public function update_invoice_status()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		
		$invoice_id = $this->input->post('invoice_id');
		$sales_order_id = $this->input->post('sales_order_id');
		$so_customer_id = $this->input->post('customer_id');
		$total_tds = $this->input->post('tds');
		$grand_total = $this->input->post('grand_total');
		
		
			
			$so_payment_details= array(
				'invoice_payment_invoice_id'=>$invoice_id,
				'invoice_payment_customer_id'=>$so_customer_id,
				'invoice_payment_invoice_tds'=>$total_tds,
				'invoice_payment_invoice_amount'=>$grand_total,
				'invoice_payment_due_amount'=>$grand_total,
			);
			
			
				
			$this->salesinvoicemodel->add_so_payment_details($so_payment_details);	
			 
			//////////////////////SALES ORDER STATUS CHANGE///////////////////
			$sales_order_status = array(
							  'sales_order_status'=>'delivered',
							  'sales_order_update_date'=>date('Y-m-d h:i:s'),
							  'sales_order_updated_by'=>$sess_user							
						  );
						
			$this->salesinvoicemodel->update_so_order_status($sales_order_status,$sales_order_id);
			
			
			//////////////////////SALES INVOICE STATUS CHANGE///////////////////
			$sales_invoice_status = array(
							  'sale_invoice_status'=>'delivered',
							  'sale_invoice_update_date'=>date('Y-m-d h:i:s'),
							  'sale_invoice_updated_by'=>$sess_user							
						  );
						
			$this->salesinvoicemodel->update_so_invoice($sales_invoice_status,$invoice_id);


			/////////////////////CUSTOMER SALES ACCOUNTS///////////////////////////////

			$get_cus_accounts = $this->salesinvoicemodel->get_cus_accounts($so_customer_id);	
		
			if(!empty($get_cus_accounts))
			{
										
				$deb_amt= $get_cus_accounts->customer_accounts_debit;
				$cred_amt= $get_cus_accounts->customer_accounts_credit;
							
				if($cred_amt != '0')
				{
					if($cred_amt < $grand_total)
					{
						$remaining_invoice_amount = $grand_total - $cred_amt;
						$accounts_total=$remaining_invoice_amount + $deb_amt;
						$so_customer_accounts_details=array(
							'customers_accounts_customer_id'=>$so_customer_id,
							'customer_accounts_debit'=>$accounts_total,
							'customer_accounts_credit'=>'0.00',					
						);
						
						$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id);
					}
					else
					{
						$accounts_total= $cred_amt - $grand_total ;
						$so_customer_accounts_details=array(
							'customers_accounts_customer_id'=>$so_customer_id,
							'customer_accounts_debit'=>'0.00',
							'customer_accounts_credit'=>$accounts_total,					
						);
							
						$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id);
								
					}
				}
				else
				{
					$accounts_total = $deb_amt + $grand_total;
								
					$so_customer_accounts_details=array(
						'customers_accounts_customer_id'=>$so_customer_id,
						'customer_accounts_debit'=>$accounts_total,
						'customer_accounts_credit'=>'0.00',					
					);
										
					
					$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id);
						
				}
			}
			else
			{
							
				$so_customer_accounts_details=array(
					'customers_accounts_customer_id'=>$so_customer_id,
					'customer_accounts_debit'=>$grand_total,
					'customer_accounts_credit'=>'0.00',
				);
				$this->salesinvoicemodel->add_so_customer_accounts_details($so_customer_accounts_details);	
			}
			
			echo "All Invoices Are Approved"; exit;
					
		
	
	}
	
	public function print_salesinvoices($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["sess_company"] = $sess_company;
		$this->data["compny_det"] = $this->salesinvoicemodel->compny_details($sess_company);

		$this->data["invoice_edit"] = $this->salesinvoicemodel->get_single_invoice($id);
		
		
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		
		
			$this->load->view('pages/instant_salesinvoice/sale_invoice_print_new',$this->data);
		
		
	}
}