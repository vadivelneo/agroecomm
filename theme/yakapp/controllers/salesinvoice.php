<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesinvoice extends MY_Controller {

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
		  $this->load->model('salesordermodule');
		  
		  $this->load->library('pdf');
		  $this->load->library('numberwords');
		  
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
		redirect('salesinvoice/salesinvoice_list');
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
		$po_no = $this->security->xss_clean($this->input->post('search_po_no'));

		$cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
		$status = $this->security->xss_clean($this->input->post('status'));
		$from_date = $this->security->xss_clean($this->input->post('from_date'));
		$from_date =date("Y-m-d", strtotime($from_date));
		$to_date = $this->security->xss_clean($this->input->post('to_date'));
		$to_date =date("Y-m-d", strtotime($to_date));
		 
		$salesinvoice_search= array(
				'search_si_no' => $si_no,
				'search_so_no' =>$so_no,
				'search_po_no' =>$po_no,
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
			$search_po_no = $search_data['search_po_no'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
			
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->salesinvoicemodel->search_get_all_SI($sess_group,$sess_company,$search_si_no,$search_so_no,$search_po_no,$search_status,$limit,$page,$sort_order,$sort_by,$search_cus_name,$from_date,$to_date);
		$this->data["invoice_list"] = $Result['rows'];
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('salesinvoice/search_salesinvoice/').'/'.$sort_order.'/'.$sort_by; 
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
		$this->_render('pages/salesinvoice/salesinvoice_list');
	}
	
	public function salesinvoice_list($sort_order='sale_invoice_company_invoice_no',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->session->unset_userdata('sales_invoice_data');
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->salesinvoicemodel->get_all_SI($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["invoice_list"] = $Result['rows'];
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('salesinvoice/salesinvoice_list/').'/'.$sort_order.'/'.$sort_by; 
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
		$this->_render('pages/salesinvoice/salesinvoice_list');
		
		
	
	}
	public function addsalesinvoice()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		
		
		$prefix = $this->salesinvoicemodel->getprefix('12');

		$Siprefix = $prefix->prefix_name;

		$code = $this->salesinvoicemodel->getlastid();
		
		$companycode = $this->salesinvoicemodel->getlastidwithcompany($sess_company);
		
		
		if(!empty($companycode))
		{
			
			
			if($sess_company == 2)
				{
					$lastSiwithcompanyCodeno = $companycode->sale_invoice_company_invoice_no;
					$lastSiwithcompanyCode = ltrim($lastSiwithcompanyCodeno, 'I');
					//echo $lastSiwithcompanyCode;
					
				}
				elseif ($sess_company == 3) 
				{
					$lastSiwithcompanyCodeno = $companycode->sale_invoice_company_invoice_no;
					$lastSiwithcompanyCode = ltrim($lastSiwithcompanyCodeno, 'O');
					//echo $lastSiwithcompanyCode;
				} 
				else
				{
					$lastSiwithcompanyCode = $companycode->sale_invoice_company_invoice_no;
					//echo $lastSiwithcompanyCode;
				}
			
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
				
			if($sess_company == 1)
			{
			$SOcompanycodewithPrefix = $Siprefix.$companydigits;
			}
			if($sess_company == 2)
			{
			$SOcompanycodewithPrefix = 'I'.$Siprefix.$companydigits;
			}
			if($sess_company == 3)
			{
			$SOcompanycodewithPrefix = 'O'.$Siprefix.$companydigits;
			}
			}
			else
			{
				//$SOcompanycodewithPrefix = $Siprefix.'0001';
				if($sess_company == 1)
			{
			$SOcompanycodewithPrefix = $Siprefix.'0001';
			}
			if($sess_company == 2)
			{
			$SOcompanycodewithPrefix = 'I'.$Siprefix.'0001';
			}
			if($sess_company == 3)
			{
			$SOcompanycodewithPrefix = 'O'.$Siprefix.'0001';
			}
			}
		}
		else
		{
			if($sess_company == 1)
			{
			$SOcompanycodewithPrefix = $Siprefix.'0350';
			}
			if($sess_company == 2)
			{
			$SOcompanycodewithPrefix = 'I'.$Siprefix.'0001';
			}
			if($sess_company == 3)
			{
			$SOcompanycodewithPrefix = 'O'.$Siprefix.'0001';
			}
		}
		
		$this->data['sicode'] = $SOcompanycodewithPrefix;
		$this->data['Siprefix'] = $Siprefix;
		
		$randomstring = $SOcompanycodewithPrefix; 
		
		if(isset($_POST['save']))
		{ 
		
			$si_invoice_num = $this->security->xss_clean($this->input->post('si_invoice_num'));
			$purchse_invoice_date = $this->security->xss_clean($this->input->post('purchse_invoice_date'));
			$sales_invoice_date = $this->security->xss_clean($this->input->post('purchse_invoice_date'));
			$sales_order_id = $this->security->xss_clean($this->input->post('sales_id'));
			
			$purchase_invo_po_ref_no = $this->security->xss_clean($this->input->post('purchase_invo_po_ref_no'));
			$no_of_boxes = $this->security->xss_clean($this->input->post('no_of_boxes'));
			$si_lr_number = $this->security->xss_clean($this->input->post('si_lr_number'));
			
			$so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$purchse_ind_quonum = $this->security->xss_clean($this->input->post('purchse_ind_quonum'));
			$stock_Inventory_so_oder_id = $this->security->xss_clean($this->input->post('stock_Inventory_so_oder_id'));
			$purchase_invo_contactno = $this->security->xss_clean($this->input->post('purchase_invo_contactno'));
			$purchase_invo_carrier = $this->security->xss_clean($this->input->post('purchase_invo_carrier'));
			$sales_invo_transport_mode = $this->security->xss_clean($this->input->post('sales_invo_transport_mode'));
			$purchase_invo_status = $this->security->xss_clean($this->input->post('purchase_invo_status'));
			$sale_invoice_dc_no = $this->security->xss_clean($this->input->post('dc_no'));
			$purchse_invo_terms_conditions = $this->security->xss_clean($this->input->post('purchse_invo_terms_conditions'));
			$purchse_invo_payment_terms = $this->security->xss_clean($this->input->post('purchse_invo_payment_terms'));
			
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			$pricebook_id = $this->security->xss_clean($this->input->post('pricebook_id'));
			$customer_discount = $this->security->xss_clean($this->input->post('customer_discount'));
			$customer_cash_discount = $this->security->xss_clean($this->input->post('customer_cash_discount'));
			$purchase_bill_addr = $this->security->xss_clean($this->input->post('purchase_bill_addr'));
			$bill_country = $this->security->xss_clean($this->input->post('bill_country'));
			$bill_state = $this->security->xss_clean($this->input->post('bill_state'));
			$bill_city = $this->security->xss_clean($this->input->post('bill_city'));
			$purchase_invo_bill_zipcode = $this->security->xss_clean($this->input->post('purchase_invo_bill_zipcode'));
			
			 
			$purchase_ship_addr = $this->security->xss_clean($this->input->post('purchase_ship_addr'));
			$ship_country = $this->security->xss_clean($this->input->post('ship_country'));
			$ship_state = $this->security->xss_clean($this->input->post('ship_state'));
			$ship_city = $this->security->xss_clean($this->input->post('ship_city'));
			$purchase_invo_ship_zipcode = $this->security->xss_clean($this->input->post('purchase_invo_ship_zipcode'));
			  
			$last_table_id = $this->input->post('last_table_id ');
			
			//** SalesInvoice Item Details **//
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_free_qty = $this->security->xss_clean($this->input->post('item_free_qty'));
			$free_qty_item_name = $this->security->xss_clean($this->input->post('free_qty_item'));
			
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_serv_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			$item_gst = $this->security->xss_clean($this->input->post('item_gst'));
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_flat_discount = $this->security->xss_clean($this->input->post('item_flat_discount'));
			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));	
			
			$item_damage_discount_perc = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			$item_damage_discount_amount = $this->security->xss_clean($this->input->post('item_damage_discount_amount'));
			$dc_hsn_sac = $this->security->xss_clean($this->input->post('dc_hsn_sac'));
			$dc_gross_amount_with_disc = $this->security->xss_clean($this->input->post('item_gross_amount_with_disc'));
			$dc_cgst_perc = $this->security->xss_clean($this->input->post('item_cgst'));
			$dc_cgst_amt = $this->security->xss_clean($this->input->post('item_cgst_amount'));
			$dc_sgst_perc = $this->security->xss_clean($this->input->post('item_sgst'));
			$dc_sgst_amt = $this->security->xss_clean($this->input->post('item_sgst_amount'));
			
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_igst_amount = $this->security->xss_clean($this->input->post('item_igst_amount'));		
			
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));		
			$item_expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));		
			$item_packing_size = $this->security->xss_clean($this->input->post('item_packing_size'));		
			$item_control_no = $this->security->xss_clean($this->input->post('item_control_no'));		
			
			$valid_si = $this->salesinvoicemodel->si_vaildation($si_invoice_num); //** Vendor Validation **//
			$companycode = $this->salesinvoicemodel->getlastidwithcompany($sess_company);
			$si_item_store_id = $this->security->xss_clean($this->input->post('dc_so_item_store_id'));
			
			if(!empty($companycode))
				{
			if($sess_company == 1)
				{
					$lastSiwithcompanyCodeno = $companycode->sale_invoice_company_invoice_no;
					//echo $lastSiwithcompanyCode;
				}
			
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
				
			if($sess_company == 1)
			{
			$SOcompanycodewithPrefix = $Siprefix.$companydigits;
			}
			
			}
			
		}
		
		
		$this->data['sicode'] = $SOcompanycodewithPrefix;
		$this->data['Siprefix'] = $Siprefix;
		
		$SOcompanycodewithPrefix = $SOcompanycodewithPrefix; 
			//echo $SOcompanycodewithPrefix; exit;
			
		if($valid_si== 0)
		{
			
			$so_data=array(
					'sale_invoice_no'=>$SOcompanycodewithPrefix ,
					'sale_invoice_company_id'=>$sess_company,
					'sale_invoice_store_id'=>$si_item_store_id,
					'sale_invoice_company_invoice_no'=>$randomstring,
					'sale_invoice_date'=>date("Y-m-d", strtotime($purchse_invoice_date )),
					'sale_invoice_dc_no'=>$sale_invoice_dc_no, 
					'sale_invoice_Inven_so_id'=>$stock_Inventory_so_oder_id,
					'sale_invoice_customer_po_refernce_number'=>$purchase_invo_po_ref_no, 
					'sale_invoice_no_of_boxes'=>$no_of_boxes,
					'sales_invoice_lr_number'=>$si_lr_number,							
					'sale_invoice_customer_id'=>$so_customer_id,
					'sale_invoice_customer_discount_percentage'=>$customer_discount,
					'sale_invoice_customer_cash_discount'=>$customer_cash_discount,
					'sale_invoice_customer_price_book_id'=>$pricebook_id,
					'sale_invoice_so_ref_no'=>$purchse_ind_quonum,
					'sale_invoice_so_ref_id'=>$sales_order_id,
					'sale_invoice_contact_no'=>$purchase_invo_contactno,
					'sale_invoice_carrier'=>$purchase_invo_carrier ,
					'sale_invoice_transport_mode'=>$sales_invo_transport_mode ,
					'sale_invoice_status'=>$purchase_invo_status ,
					'sale_invoice_term_condition'=>$purchse_invo_terms_conditions,
					'sale_invoice_payment_terms'=>$purchse_invo_payment_terms ,
					'sale_invoice_added_by'=>$sess_user,
					'sale_invoice_updated_by'=>$sess_user,
					'sale_invoice_add_date'=>date('Y-m-d h:i:s'),
					'sale_invoice_active_status'=>'active',
					);
							
					
			$so_id = $this->salesinvoicemodel->add_so_invoice($so_data);
			
				  
			$so_billing_data= array(
					  'customer_billing_customer_id'=>$cus_id,
					  'customer_billing_address'=>$purchase_bill_addr ,
					  'customer_billing_country_id'=>$bill_country,
					  'customer_billing_state_id'=>$bill_state,
					  'customer_billing_city_id'=>$bill_city,
					  'customer_billing_zipcode'=>$purchase_invo_bill_zipcode,
					);
		
			$this->salesinvoicemodel->update_so_billing_address($so_billing_data,$cus_id);
							 
			$so_shipping_data= array(
										'customer_shipping_customer_id'=>$cus_id,
										'customer_shipping_address'=>$purchase_ship_addr,
										'customer_shipping_country_id'=>$ship_country,
										'customer_shipping_state_id'=>$ship_state,
										'customer_shipping_city_id'=>$ship_city,
										'customer_shipping_zipcode'=>$purchase_invo_ship_zipcode,
										);
				
					 	
						$this->salesinvoicemodel->update_so_shipping_address($so_shipping_data,$cus_id);
					
					
					
				if(!empty ($item_id))
					  {
						$result=count($item_id);
						for($i=1; $i<=$result; $i++)
						{				
							$sale_invoice_item=array(
											 'sale_invoice_item_si_id'=>$so_id,
											 'sales_inv_date'=>date("Y-m-d", strtotime($sales_invoice_date)),
											 'sale_invoice_item_id'=>$item_id[$i],
											 'sale_invoice_item_code'=>$item_code[$i],
											 'sale_invoice_item_name'=>$item_name[$i],
											 'sale_invoice_item_model'=>$item_model[$i],
											 'sale_invoice_item_uom_id'=>$item_uom_id[$i],
											 'sale_invoice_item_qty'=>$item_qty[$i], 
											 'sale_invoice_item_qty_name'=>$free_qty_item_name[$i], 
											 'sale_invoice_item_free_qty'=>$item_free_qty[$i],
											 'sale_invoice_item_mrp'=>$item_mrp[$i],
											 'sale_invoice_item_priceperunit'=>$item_priceperunit[$i],
											 'sale_invoice_item_gross_amount'=>$item_gross_amount[$i],
											 'sale_invoice_item_vat'=>$item_vat[$i],
											 'sale_invoice_item_cst'=>$item_cst[$i],
											 'sale_invoice_item_gst'=>$dc_cgst_perc[$i],
											 'si_items_gst_amt'=>$dc_cgst_amt[$i],
									 		 'si_items_sgst'=>$dc_sgst_perc[$i],
									 		 'si_items_sgst_amt'=>$dc_sgst_amt[$i],
											 'si_items_igst'=>$item_igst[$i],
											 'si_items_igst_amt'=>$item_igst_amount[$i],
									 		 'si_items_gross_amount_with_discount'=>$dc_gross_amount_with_disc[$i],
									 		 'si_items_hsn_sac'=>$dc_hsn_sac[$i],
									 		 'si_items_batch_no'=>$item_batch_no[$i],
									 		 'si_items_expiry_date'=>$item_expiry_date[$i],
									 		 'si_items_packing_size'=>$item_packing_size[$i],
									 		 'si_items_control_no'=>$item_control_no[$i],
											 'sale_invoice_item_service_tax'=>$item_serv_tax[$i],
											 'sale_invoice_item_ex_duty'=>$item_exc[$i],
											 'sale_invoice_item_tax_percent'=>$item_tax_percent[$i],
											 'sale_invoice_item_tax_amount'=>$item_tax_amount[$i],
											 'sale_invoice_item_discounts_percentage'=>$item_discount_percent[$i],
											 'sale_invoice_item_discounts_amount'=>$item_discount_amount[$i],
											 'si_items_damage_discount_perc'=>$item_damage_discount_perc[$i],
									 		 'si_items_damage_discount_amount'=>$item_damage_discount_amount[$i],
											 'sale_invoice_item_flat_discount'=>$item_flat_discount[$i],
											 'sale_invoice_item_net_amount'=>$item_net_amount[$i],
											);
											
											//echo "<pre>"; print_r($sale_invoice_item); exit;
			
							$this->salesinvoicemodel->add_so_items($sale_invoice_item);	

							
								////Inventory Updation/////////
							
									$st_cod = $this->salesinvoicemodel->getstock_item_details($item_id[$i]);	
									$stock_qty = $st_cod->inventory_qty;
									$rec_qty = $item_qty[$i];
									$cur_stock = $stock_qty -  $rec_qty;
								
									$cur_stock_items=array(
										'inventory_qty'=> $cur_stock,
										'inventory_update_date'=> date('Y-m-d'),
									);
											
									$this->salesinvoicemodel->update_cur_stock($cur_stock_items,$item_id[$i]);					
							
							
						}
					  }
					
					/** Tax Group **/
			
					$tax_group_length = $this->security->xss_clean($this->input->post('tax_group_length'));
					 
					 $tax_group_gross_amount = $this->security->xss_clean($this->input->post('tax_group_gross_amount'));
					 $tax_group_discount_amount = $this->security->xss_clean($this->input->post('tax_group_discount_amount'));
					 $tax_group_flat_amount = $this->security->xss_clean($this->input->post('tax_group_flat_amount'));
					 // print_r($tax_group_flat_amount); exit;
					 $tax_group_without_cash_discount_amount = $this->security->xss_clean($this->input->post('tax_group_without_cash_discount_amount'));
			 		 $tax_group_cash_discount_amount = $this->security->xss_clean($this->input->post('tax_group_cash_discount_amount'));
					 $tax_group_without_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_without_tax_gross_amount'));
					 $tax_group_tax_amount = $this->security->xss_clean($this->input->post('tax_group_tax_amount'));
					 $tax_group_tax_percentage = $this->security->xss_clean($this->input->post('tax_group_tax_percentage'));
					 $tax_group_with_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_with_tax_gross_amount'));
					 
					 $tax_group_damage_discount_amount = $this->security->xss_clean($this->input->post('tax_group_damage_discount_amount'));
					 
					 if(!empty($tax_group_length))
					 {
						for($i=0; $i<=$tax_group_length; $i++)
						{
							if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]) && !empty($tax_group_tax_amount[$i]) && !empty($tax_group_tax_percentage[$i])  && !empty($tax_group_with_tax_gross_amount[$i]))
							{
								$tax_group=array(
										'tax_group_sales_invoice_id'=>$so_id,
										'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
										'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
										'tax_group_total_flat_amount'=>$tax_group_flat_amount[$i],
										'tax_group_without_cash_disocunt_amount'=>$tax_group_without_cash_discount_amount[$i],
										'tax_group_cash_disocunt_amount'=>$tax_group_cash_discount_amount[$i],
										'tax_group_damage_discount_amount'=>$tax_group_damage_discount_amount[$i],
										'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
										'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
										'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
										'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
										);
								$this->salesinvoicemodel->add_tax_group($tax_group);//** Add Tax Group **//
							}
						}
					 }
			 		
					//** SalesInvoice Item Total **//
					$total_quantity_items = $this->security->xss_clean($this->input->post('total_quantity_items'));
					$total_gross_amount_items = $this->security->xss_clean($this->input->post('total_gross_amount_items'));
					$total_tax_percent_items = $this->security->xss_clean($this->input->post('total_tax_percent_items'));
					$total_tax_amount_items = $this->security->xss_clean($this->input->post('total_tax_amount_items'));
					$total_discount_percent_items = $this->security->xss_clean($this->input->post('total_discount_percent_items'));
					$total_discount_amount_items = $this->security->xss_clean($this->input->post('total_discount_amount_items'));
					$total_net_amount_items = $this->security->xss_clean($this->input->post('total_net_amount_items'));
					
					//** Sales Invoice Item Total **//

					$total_gross_amount=$this->security->xss_clean($this->input->post('total_gross_amount'));
					$total_tax_percentage=$this->security->xss_clean($this->input->post('total_tax_percentage'));
					$total_tax_amount=$this->security->xss_clean($this->input->post('total_tax_amount'));
					$total_disocunts_percentage=$this->security->xss_clean($this->input->post('total_disocunts_percentage'));
					$total_disocunts_amount=$this->security->xss_clean($this->input->post('total_disocunts_amount'));
					$total_shipping_charges=$this->security->xss_clean($this->input->post('total_shipping_charges'));
					$total_shipping_tax=$this->security->xss_clean($this->input->post('total_shipping_tax'));
					$total_adjustments=$this->security->xss_clean($this->input->post('total_adjustments'));
					$total_tds=$this->security->xss_clean($this->input->post('total_tds'));
					$total_discription=$this->security->xss_clean($this->input->post('total_discription'));
					$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
					$other_description=$this->security->xss_clean($this->input->post('other_description'));
					
					$si_total_data= array(
										'sale_invoice_si_id'=>$so_id,
										'sale_invoice_gross_amount'=>$total_gross_amount ,
										'sale_invoice_tax_percentage'=>$total_tax_percentage,
										'sale_invoice_tax_amount'=>$total_tax_amount,
										'sale_invoice_discount_percentage'=>$total_disocunts_percentage,
										'sale_invoice_discount_amount'=>$total_disocunts_amount,
										'sale_invoice_shipping_charges'=>$total_shipping_charges,
										'sale_invoice_shipping_tax'=>$total_shipping_tax,
										'sale_invoice_adjustment'=>$total_adjustments,
										'sale_invoice_tds'=>$total_tds,
										'sale_invoice_description'=>$total_discription,
										'sale_invoice_other_description'=>$other_description,
 										'sale_invoice_grand_total'=>$grand_total,
										'total_quantity_items'=>$total_quantity_items,
										'total_gross_amount_items'=>$total_gross_amount_items,
										'total_tax_percent_items'=>$total_tax_percent_items,
										'total_tax_amount_items'=>$total_tax_amount_items,
										'total_discount_percent_items'=>$total_discount_percent_items,
										'total_discount_amount_items'=>$total_discount_amount_items,
										'total_net_amount_items'=>$total_net_amount_items,
										
										);
				
					
							$this->salesinvoicemodel->add_si_total($si_total_data);	
							
							
	
				 
			//////////////////////DC STATUS CHANGE///////////////////
			
			if ($sale_invoice_dc_no != "")
			{ 
					$dc_update_data=array(
				  						'delivery_challan_status'=>'awaiting confirmation', 
										'delivery_challan_update_date'=>date('Y-m-d h:i:s'),
										'delivery_challan_updated_by'=>$sess_user	
				  						);
								
					$this->salesinvoicemodel->update_dc_status($dc_update_data,$sale_invoice_dc_no);
			}
	
			//////////////////////SALES ORDER STATUS CHANGE///////////////////
		
			
			if ($sales_order_id != "" && $stock_Inventory_so_oder_id == '1')
			{
				$sales_order_status=array(
								'sales_order_status'=>'awaiting confirmation',
								'sales_order_update_date'=>date('Y-m-d h:i:s'),
								'sales_order_updated_by'=>$sess_user							
							);
						
				$this->salesinvoicemodel->update_so_order_status($sales_order_status,$sales_order_id);
	
			}
			
			
			
			
			$this->session->set_flashdata('message', 'Sale Invoice Added Sucessfully');
			redirect('salesinvoice/salesinvoice_list');
			
			
		  }
		  
		$this->session->set_flashdata('message', 'Sale Invoice Already Exist');
		redirect('salesinvoice/salesinvoice_list');
		  
		  
		}
		
		else
		{
		
			$this->data['city'] = $this->salesinvoicemodel->get_city();
			$this->data['state'] = $this->salesinvoicemodel->get_state();
			$this->data['country'] = $this->salesinvoicemodel->get_country();
			$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			$this->data["store"] = $this->productmodule->get_all_store(); //** Get All store Details **//
			$this->data["product_uom"] = $this->productmodule->get_alluom();
				
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/salesinvoice/add_salesinvoice');
		
		}
	
	}
	
	
	public function deleteinvoice($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$sidata = array(
						'sale_invoice_active_status' => $changeStatus,
						'sale_invoice_update_date' => date('Y-m-d'),
						'sale_invoice_updated_by'=>$sess_user,
					);
					
		$this->salesinvoicemodel->update_invoices_status($sidata,$id);
		 
		$this->session->set_flashdata('message', 'Sales Invoice Deleted Successfully');
		redirect('instant_salesinvoice/salesinvoice_list');
	}
	
	public function edit_salesinvoice($id)
	{
		 
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		if(isset($_POST['save']))
		{  
			$si_invoice_num = $this->security->xss_clean($this->input->post('si_invoice_num'));
			$purchse_invoice_date = $this->security->xss_clean($this->input->post('purchse_invoice_date'));
			$sales_invoice_date = $this->security->xss_clean($this->input->post('purchse_invoice_date'));
			$sales_order_id = $this->security->xss_clean($this->input->post('sales_order_id'));
			$stock_Inventory_so_oder_id = $this->security->xss_clean($this->input->post('stock_Inventory_so_oder_id'));
			$so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$purchse_ind_quonum = $this->security->xss_clean($this->input->post('purchse_ind_quonum'));
			$purchase_invo_contactno = $this->security->xss_clean($this->input->post('purchase_invo_contactno'));
			$purchase_invo_carrier = $this->security->xss_clean($this->input->post('purchase_invo_carrier'));
			$sales_invo_transport_mode = $this->security->xss_clean($this->input->post('sales_invo_transport_mode'));
			$purchase_invo_status = $this->security->xss_clean($this->input->post('purchase_invo_status'));
			$sale_invoice_dc_no=$this->security->xss_clean($this->input->post('dc_no'));
			$purchse_invo_terms_conditions = $this->security->xss_clean($this->input->post('purchse_invo_terms_conditions'));
			$purchse_invo_payment_terms = $this->security->xss_clean($this->input->post('purchse_invo_payment_terms'));
			
			$purchase_invo_po_ref_no = $this->security->xss_clean($this->input->post('purchase_invo_po_ref_no'));
			$no_of_boxes = $this->security->xss_clean($this->input->post('no_of_boxes'));
			$si_lr_number = $this->security->xss_clean($this->input->post('si_lr_number'));
			
			$cus_id=$this->security->xss_clean($this->input->post('so_customer_id'));
			$cus_code=$this->security->xss_clean($this->input->post('so_customer_code'));
			$pricebook_id = $this->security->xss_clean($this->input->post('pricebook_id'));
			$customer_discount = $this->security->xss_clean($this->input->post('customer_discount'));
			$customer_cash_discount = $this->security->xss_clean($this->input->post('customer_cash_discount'));
			
			$purchase_bill_addr = $this->security->xss_clean($this->input->post('purchase_bill_addr'));
			$bill_country = $this->security->xss_clean($this->input->post('bill_country'));
			$bill_state = $this->security->xss_clean($this->input->post('bill_state'));
			$bill_city = $this->security->xss_clean($this->input->post('bill_city'));
			$purchase_invo_bill_zipcode = $this->security->xss_clean($this->input->post('purchase_invo_bill_zipcode'));
			 
			$purchase_ship_addr = $this->security->xss_clean($this->input->post('purchase_ship_addr'));
			$ship_country = $this->security->xss_clean($this->input->post('ship_country'));
			$ship_state = $this->security->xss_clean($this->input->post('ship_state'));
			$ship_city = $this->security->xss_clean($this->input->post('ship_city'));
			$purchase_invo_ship_zipcode = $this->security->xss_clean($this->input->post('purchase_invo_ship_zipcode'));
			  
			$last_table_id =$this->input->post('last_table_id ');
			
			//** SalesInvoice Item Details **//
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_free_qty = $this->security->xss_clean($this->input->post('item_free_qty'));
			$item_free_qty_name = $this->security->xss_clean($this->input->post('item_free_qty_name'));
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_serv_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			$item_gst = $this->security->xss_clean($this->input->post('item_gst'));
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_flat_discount = $this->security->xss_clean($this->input->post('item_flat_discount'));
			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
			$si_item_store_id = $this->security->xss_clean($this->input->post('dc_so_item_store_id'));
			
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));		
			$item_expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));		
			$item_packing_size = $this->security->xss_clean($this->input->post('item_packing_size'));
			 
			 
			/** Tax Group **/

			$tax_group_length = $this->security->xss_clean($this->input->post('tax_group_length'));

			$tax_group_gross_amount = $this->security->xss_clean($this->input->post('tax_group_gross_amount'));
			$tax_group_discount_amount = $this->security->xss_clean($this->input->post('tax_group_discount_amount'));
			$tax_group_flat_amount = $this->security->xss_clean($this->input->post('tax_group_flat_amount'));
			$tax_group_without_cash_discount_amount = $this->security->xss_clean($this->input->post('tax_group_without_cash_discount_amount'));
			$tax_group_cash_discount_amount = $this->security->xss_clean($this->input->post('tax_group_cash_discount_amount'));
			$tax_group_without_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_without_tax_gross_amount'));
			$tax_group_tax_amount = $this->security->xss_clean($this->input->post('tax_group_tax_amount'));
			$tax_group_tax_percentage = $this->security->xss_clean($this->input->post('tax_group_tax_percentage'));
			$tax_group_with_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_with_tax_gross_amount'));
 			$tax_group_damage_discount_amount = $this->security->xss_clean($this->input->post('tax_group_damage_discount_amount'));


			//** SalesInvoice Item Total **//
			$total_quantity_items = $this->security->xss_clean($this->input->post('total_quantity_items'));
			$total_gross_amount_items = $this->security->xss_clean($this->input->post('total_gross_amount_items'));
			$total_tax_percent_items = $this->security->xss_clean($this->input->post('total_tax_percent_items'));
			$total_tax_amount_items = $this->security->xss_clean($this->input->post('total_tax_amount_items'));
			$total_discount_percent_items = $this->security->xss_clean($this->input->post('total_discount_percent_items'));
			$total_discount_amount_items = $this->security->xss_clean($this->input->post('total_discount_amount_items'));
			$total_net_amount_items = $this->security->xss_clean($this->input->post('total_net_amount_items'));

			//** Sales Invoice Item Total **//

			$total_gross_amount=$this->security->xss_clean($this->input->post('total_gross_amount'));
			$total_tax_percentage=$this->security->xss_clean($this->input->post('total_tax_percentage'));
			$total_tax_amount=$this->security->xss_clean($this->input->post('total_tax_amount'));
			$total_disocunts_percentage=$this->security->xss_clean($this->input->post('total_disocunts_percentage'));
			$total_disocunts_amount=$this->security->xss_clean($this->input->post('total_disocunts_amount'));
			$total_shipping_charges=$this->security->xss_clean($this->input->post('total_shipping_charges'));
			$total_shipping_tax=$this->security->xss_clean($this->input->post('total_shipping_tax'));
			$total_adjustments=$this->security->xss_clean($this->input->post('total_adjustments'));
			$total_tds=$this->security->xss_clean($this->input->post('total_tds'));
			$total_discription=$this->security->xss_clean($this->input->post('total_discription'));
			$other_description=$this->security->xss_clean($this->input->post('other_description'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
			
			$item_damage_discount_perc = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			$item_damage_discount_amount = $this->security->xss_clean($this->input->post('item_damage_discount_amount'));
			$dc_hsn_sac = $this->security->xss_clean($this->input->post('dc_hsn_sac'));
			$dc_gross_amount_with_disc = $this->security->xss_clean($this->input->post('item_gross_amount_with_disc'));
			$dc_cgst_perc = $this->security->xss_clean($this->input->post('item_cgst_perc'));
			$dc_cgst_amt = $this->security->xss_clean($this->input->post('item_cgst_amt'));
			$dc_sgst_perc = $this->security->xss_clean($this->input->post('item_sgst_perc'));
			$dc_sgst_amt = $this->security->xss_clean($this->input->post('item_sgst_amt'));
			
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_igst_amount = $this->security->xss_clean($this->input->post('item_igst_amount'));
			

			$so_data=array(
					  		'sale_invoice_date'=>date("Y-m-d", strtotime($purchse_invoice_date )),
							'sale_invoice_dc_no'=>$sale_invoice_dc_no, 
							'sale_invoice_customer_id'=>$cus_id,
							'sale_invoice_store_id'=>$si_item_store_id,
							'sale_invoice_customer_discount_percentage'=>$customer_discount,
					  		'sale_invoice_customer_cash_discount'=>$customer_cash_discount,
					  		'sale_invoice_customer_price_book_id'=>$pricebook_id,
							'sale_invoice_so_ref_no'=>$purchse_ind_quonum ,
							'sale_invoice_Inven_so_id'=>$stock_Inventory_so_oder_id,
							'sale_invoice_customer_po_refernce_number'=>$purchase_invo_po_ref_no, 
							'sale_invoice_no_of_boxes'=>$no_of_boxes,
							'sales_invoice_lr_number'=>$si_lr_number,
							'sale_invoice_contact_no'=>$purchase_invo_contactno,
							'sale_invoice_carrier'=>$purchase_invo_carrier ,
							'sale_invoice_transport_mode'=>$sales_invo_transport_mode ,
							'sale_invoice_status'=>$purchase_invo_status ,
							'sale_invoice_term_condition'=>$purchse_invo_terms_conditions,
							'sale_invoice_payment_terms'=>$purchse_invo_payment_terms ,
							'sale_invoice_added_by'=>$sess_user,
							'sale_invoice_updated_by'=>$sess_user,
							'sale_invoice_update_date'=>date('Y-m-d h:i:s'),
							'sale_invoice_active_status'=>'active',
							);
				
			$this->salesinvoicemodel->update_so_invoice($so_data,$id);
				  
			
			
			$this->salesinvoicemodel->delete_sales_invoice_items($id);//** Delete Sales Invoice Items In Grid **//
			
			if($purchase_invo_status == 'delivered') 
			{	
				if($stock_Inventory_so_oder_id == '1')	////Adding Auto Generate DC/////////
				{
					$prefix = $this->salesinvoicemodel->getprefix('10');
					$DcPrefix = $prefix->prefix_name;
					$code = $this->salesinvoicemodel->getlastid_dc();
					if(!empty($code))
					{

						$lastDcCode = $code->delivery_challan_number;
						$lengthPrefix = strlen($DcPrefix);
						$strSplit = str_split($lastDcCode, $lengthPrefix);
						$DcLastdigit = $strSplit[0];
						$explode = explode($DcLastdigit,$lastDcCode);
						$DcLastnumber = $explode[1];
						if($DcLastdigit == $DcPrefix)
						{
							$Dccode = $DcLastnumber+1;
							$digits = sprintf ('%04d', $Dccode);
							$DccodewithPrefix = $DcPrefix.$digits;
						}
						else
						{
							$DccodewithPrefix = $DcPrefix.'0001';
						}
					}
					else
					{
						$DccodewithPrefix = $DcPrefix.'0001';
					}
						
					$this->data['Dccode'] = $DccodewithPrefix;
					$this->data['DcPrefix'] = $DcPrefix;
					$dc_code = $DccodewithPrefix;
				
				
				
					$dcdetails=array(
					'delivery_challan_number'=>$dc_code,
					'delivery_challan_company_id'=>$sess_company,
					'delivery_challan_customer_id'=>$cus_id,
					'delivery_challan_sales_order_id'=>$sales_order_id,
					'delivery_challan_sales_reference_number'=>$purchse_ind_quonum,
					'delivery_challan_customer_name'=>$so_customer_name,
					'delivery_challan_customer_code'=>$cus_code,
					'delivery_challan_status'=>'delivered',
					'delivery_challan_date'=>date('Y-m-d'),
					'delivery_challan_add_date'=>date('Y-m-d h:i:s'),
					'delivery_challan_created_by'=>$sess_user,
					'delivery_challan_updated_by'=>$sess_user,
					'delivery_challan_active_status'=>'enable'
					);
					
					
					$so_dcid= $this->salesinvoicemodel->add_so_dc_details($dcdetails);
				
				}
				
				if(!empty ($item_id))
				{
					$result=count($item_id);
					for($i=1; $i<=$result; $i++)
					{
						$sale_invoice_item=array(
									 'sale_invoice_item_si_id'=>$id,
									 'sales_inv_date'=>date("Y-m-d", strtotime($sales_invoice_date)),
									 'sale_invoice_item_id'=>$item_id[$i],
									 'sale_invoice_item_code'=>$item_code[$i],
									 'sale_invoice_item_name'=>$item_name[$i],
									 'sale_invoice_item_model'=>$item_model[$i],
									 'sale_invoice_item_uom_id'=>$item_uom_id[$i],
									 'si_items_batch_no'=>$item_batch_no[$i],
									 'si_items_expiry_date'=>$item_expiry_date[$i],
									 'si_items_packing_size'=>$item_packing_size[$i],
									 'sale_invoice_item_qty'=>$item_qty[$i],
									 'sale_invoice_item_free_qty'=>$item_free_qty[$i],
									 'sale_invoice_item_qty_name'=>$item_free_qty_name[$i],
									 'sale_invoice_item_mrp'=>$item_mrp[$i],
									 'sale_invoice_item_priceperunit'=>$item_priceperunit[$i],
									 'sale_invoice_item_gross_amount'=>$item_gross_amount[$i],
									 'sale_invoice_item_vat'=>$item_vat[$i],
									 'sale_invoice_item_cst'=>$item_cst[$i],
									 'sale_invoice_item_gst'=>$dc_cgst_perc[$i],
									 'si_items_gst_amt'=>$dc_cgst_amt[$i],
									 'si_items_sgst'=>$dc_sgst_perc[$i],
									 'si_items_sgst_amt'=>$dc_sgst_amt[$i],
									 'si_items_igst'=>$item_igst[$i],
									 'si_items_igst_amt'=>$item_igst_amount[$i],
									 'si_items_gross_amount_with_discount'=>$dc_gross_amount_with_disc[$i],
									 'si_items_hsn_sac'=>$dc_hsn_sac[$i],
									 'sale_invoice_item_service_tax'=>$item_serv_tax[$i],
									 'sale_invoice_item_ex_duty'=>$item_exc[$i],
									 'sale_invoice_item_tax_percent'=>$item_tax_percent[$i],
									 'sale_invoice_item_tax_amount'=>$item_tax_amount[$i],
									 'sale_invoice_item_discounts_percentage'=>$item_discount_percent[$i],
									 'sale_invoice_item_discounts_amount'=>$item_discount_amount[$i],
									 'si_items_damage_discount_perc'=>$item_damage_discount_perc[$i],
									 'si_items_damage_discount_amount'=>$item_damage_discount_amount[$i],
									 'sale_invoice_item_flat_discount'=>$item_flat_discount[$i],
									 'sale_invoice_item_net_amount'=>$item_net_amount[$i],
									);
								
							//echo "<PRE>";print_r($sale_invoice_item);
							$this->salesinvoicemodel->update_so_items($sale_invoice_item,$id,$item_id[$i]);	
						
							if($stock_Inventory_so_oder_id == '1')	////Inventory Updation/////////
							{
								
								
								
								$dc_items=array(
								'delivery_challan_item_dc_id'=>$so_dcid,
								'delivery_challan_item_item_id'=>$item_id[$i],
								'delivery_challan_item_code'=>$item_code[$i],
								'delivery_challan_item_name'=>$item_name[$i],
								'delivery_challan_order_qty'=>$item_qty[$i],
								'delivery_challan_uom_id'=>$item_uom_id[$i],
								'delivery_challan_delivered_qty'=>$item_qty[$i],
								'delivery_challan_pending_qty'=>'0.00',
								);
								
								$this->salesinvoicemodel->add_so_dc_item_details($dc_items);
							}
						}					
					};		
					////INvoice Payment Details For Customer Invoices saves data in invoice payment details table////////////////

							$so_payment_details= array(
									'invoice_payment_invoice_id'=>$id,
									'invoice_payment_customer_id'=>$cus_id,
									'invoice_payment_invoice_tds'=>$total_tds,
									'invoice_payment_invoice_amount'=>$grand_total,
									'invoice_payment_due_amount' =>$grand_total,
									);
						
								$this->salesinvoicemodel->add_so_payment_details($so_payment_details);	
				 
							//////////////////////DC STATUS CHANGE///////////////////
			
							if ($sale_invoice_dc_no != "")
							{ 
									$dc_update_data=array(
														'delivery_challan_status'=>'delivered', 
														'delivery_challan_update_date'=>date('Y-m-d h:i:s'),
														'delivery_challan_updated_by'=>$sess_user	
														);
											
									$this->salesinvoicemodel->update_dc_status($dc_update_data,$sale_invoice_dc_no);
									
									if ($sales_order_id != "")
									{
										$sales_order_status=array(
														'sales_order_status'=>'delivered',
														'sales_order_update_date'=>date('Y-m-d h:i:s'),
														'sales_order_updated_by'=>$sess_user							
													);
												
										$this->salesinvoicemodel->update_so_order_status($sales_order_status,$sales_order_id);
							
									}
							} 
							//////////////////////SALES ORDER STATUS CHANGE///////////////////
							else if ($sales_order_id != "" && $stock_Inventory_so_oder_id == '1')
							{
								$sales_order_status=array(
												'sales_order_status'=>'delivered',
												'sales_order_update_date'=>date('Y-m-d h:i:s'),
												'sales_order_updated_by'=>$sess_user							
											);
										
								$this->salesinvoicemodel->update_so_order_status($sales_order_status,$sales_order_id);
					
							} 
			
							/////////////////////CUSTOMER SALES ACCOUNTS///////////////////////////////

							 $get_cus_accounts=$this->salesinvoicemodel->get_cus_accounts($cus_id);	
					
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
											'customers_accounts_customer_id'=>$cus_id,
											'customer_accounts_debit'=>$accounts_total,
											'customer_accounts_credit'=>'0.00',					
										);
										
										$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
									}
									else
									{
										$accounts_total= $cred_amt - $grand_total ;
										$so_customer_accounts_details=array(
											'customers_accounts_customer_id'=>$cus_id,
											'customer_accounts_debit'=>'0.00',
											'customer_accounts_credit'=>$accounts_total,					
										);
											
										$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
												
									}
								}
								else
								{
									$accounts_total = $deb_amt + $grand_total;
												
									$so_customer_accounts_details=array(
										'customers_accounts_customer_id'=>$cus_id,
										'customer_accounts_debit'=>$accounts_total,
										'customer_accounts_credit'=>'0.00',					
									);
														
									
									$this->salesinvoicemodel->update_so_customer_accounts_details($so_customer_accounts_details,$cus_id);
										
								}
							}
							else
							{
											
								$so_customer_accounts_details=array(
									'customers_accounts_customer_id'=>$cus_id,
									'customer_accounts_debit'=>$grand_total,
									'customer_accounts_credit'=>'0.00',
								);
								$this->salesinvoicemodel->add_so_customer_accounts_details($so_customer_accounts_details);	
							} 
							
				//////////////////////////CUSTOMER SALES ACCOUT CLOSES HERE ////////////////////////////////////////
						
			}
			else
			{
				if(!empty ($item_id))
				{
					$result=count($item_id);
					for($i=1; $i<=$result; $i++)
					{
						$sale_invoice_item=array(
									 'sale_invoice_item_si_id'=>$id,
									 'sales_inv_date'=>date("Y-m-d", strtotime($sales_invoice_date)),
									 'sale_invoice_item_id'=>$item_id[$i],
									 'sale_invoice_item_code'=>$item_code[$i],
									 'sale_invoice_item_name'=>$item_name[$i],
									 'sale_invoice_item_model'=>$item_model[$i],
									 'sale_invoice_item_uom_id'=>$item_uom_id[$i],
									 'si_items_batch_no'=>$item_batch_no[$i],
									 'si_items_expiry_date'=>$item_expiry_date[$i],
									 'si_items_packing_size'=>$item_packing_size[$i],
									 'sale_invoice_item_qty'=>$item_qty[$i],
									 'sale_invoice_item_free_qty'=>$item_free_qty[$i],
									 'sale_invoice_item_qty_name'=>$item_free_qty_name[$i],
									 'sale_invoice_item_mrp'=>$item_mrp[$i],
									 'sale_invoice_item_priceperunit'=>$item_priceperunit[$i],
									 'sale_invoice_item_gross_amount'=>$item_gross_amount[$i],
									 'sale_invoice_item_vat'=>$item_vat[$i],
									 'sale_invoice_item_cst'=>$item_cst[$i],
									 'sale_invoice_item_gst'=>$dc_cgst_perc[$i],
									 'si_items_gst_amt'=>$dc_cgst_amt[$i],
									 'si_items_sgst'=>$dc_sgst_perc[$i],
									 'si_items_sgst_amt'=>$dc_sgst_amt[$i],
									 'si_items_igst'=>$item_igst[$i],
									 'si_items_igst_amt'=>$item_igst_amount[$i],
									 'si_items_gross_amount_with_discount'=>$dc_gross_amount_with_disc[$i],
									 'si_items_hsn_sac'=>$dc_hsn_sac[$i],
									 'sale_invoice_item_service_tax'=>$item_serv_tax[$i],
									 'sale_invoice_item_ex_duty'=>$item_exc[$i],
									 'sale_invoice_item_tax_percent'=>$item_tax_percent[$i],
									 'sale_invoice_item_tax_amount'=>$item_tax_amount[$i],
									 'sale_invoice_item_discounts_percentage'=>$item_discount_percent[$i],
									 'sale_invoice_item_discounts_amount'=>$item_discount_amount[$i],
									 'si_items_damage_discount_perc'=>$item_damage_discount_perc[$i],
									 'si_items_damage_discount_amount'=>$item_damage_discount_amount[$i],
									 'sale_invoice_item_flat_discount'=>$item_flat_discount[$i],
									 'sale_invoice_item_net_amount'=>$item_net_amount[$i],
									  
									);
								
								
								$this->salesinvoicemodel->update_so_items($sale_invoice_item,$id,$item_id[$i]);	
						
					}					
				}	
				
			}
						
			if(!empty($tax_group_length))
					 {
						$this->salesinvoicemodel->delete_tax_group($id);
						 
						for($i=0; $i<=$tax_group_length; $i++)
						{
							if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]) && !empty($tax_group_tax_amount[$i]) && !empty($tax_group_tax_percentage[$i])  && !empty($tax_group_with_tax_gross_amount[$i]))
							{
								$tax_group=array(
										'tax_group_sales_invoice_id'=>$id,
										'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
										'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
										'tax_group_total_flat_amount'=>$tax_group_flat_amount[$i],
										'tax_group_without_cash_disocunt_amount'=>$tax_group_without_cash_discount_amount[$i],
										'tax_group_cash_disocunt_amount'=>$tax_group_cash_discount_amount[$i],
										'tax_group_damage_discount_amount'=>$tax_group_damage_discount_amount[$i],
										'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
										'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
										'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
										'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
										);
										//echo "<PRE>";print_r($tax_group);
								$this->salesinvoicemodel->update_tax_group($tax_group);//** Add Tax Group **//
							}
						}
					 }
					 
					 $si_total_data= array(
										'sale_invoice_si_id'=>$id,
										'sale_invoice_gross_amount'=>$total_gross_amount ,
										'sale_invoice_tax_percentage'=>$total_tax_percentage,
										'sale_invoice_tax_amount'=>$total_tax_amount,
										'sale_invoice_discount_percentage'=>$total_disocunts_percentage,
										'sale_invoice_discount_amount'=>$total_disocunts_amount,
										'sale_invoice_shipping_charges'=>$total_shipping_charges,
										'sale_invoice_shipping_tax'=>$total_shipping_tax,
										'sale_invoice_adjustment'=>$total_adjustments,
										'sale_invoice_tds'=>$total_tds,
										'sale_invoice_description'=>$total_discription,
										'sale_invoice_other_description'=>$other_description,
 										'sale_invoice_grand_total'=>$grand_total,
										'total_quantity_items'=>$total_quantity_items,
										'total_gross_amount_items'=>$total_gross_amount_items,
										'total_tax_percent_items'=>$total_tax_percent_items,
										'total_tax_amount_items'=>$total_tax_amount_items,
										'total_discount_percent_items'=>$total_discount_percent_items,
										'total_discount_amount_items'=>$total_discount_amount_items,
										'total_net_amount_items'=>$total_net_amount_items,
										
										);
					
//			echo "<PRE>";print_r($si_total_data);

			//$this->salesinvoicemodel->update_tax_group($tax_group, $id);//** Add Tax Group **//
			$this->salesinvoicemodel->update_si_total($si_total_data,$id);					 
			$this->session->set_flashdata('message', 'Sale Invoice Updated Sucessfully');
			redirect('instant_salesinvoice/salesinvoice_list');
			 
		}
		else
		{
			$this->data['city'] = $this->salesinvoicemodel->get_city();
			$this->data['state'] = $this->salesinvoicemodel->get_state();
			$this->data['country'] = $this->salesinvoicemodel->get_country();	
			$this->data["product_uom"] = $this->productmodule->get_alluom();
			$this->data["invoice_edit"]=$this->salesinvoicemodel->get_single_invoice($id);
			$cus_id=$this->data["invoice_edit"]->sale_invoice_customer_id;
			$this->data["cus_det"]=$this->salesinvoicemodel->get_cus_namee($cus_id);
			$this->data["cus_name"]=$this->data["cus_det"]->customer_name;
			$this->data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
			$this->data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id);
			$this->data["invoice_item"]=$this->salesinvoicemodel->get_item_invoice($id);
			$this->data["invoice_total"]=$this->salesinvoicemodel->get_item_total($id);	
			
			$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);//** Get All SalesInvoice Item Details **//
			
			$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
	
			//  echo "<pre>";print_r($this->data["invoice_edit"]);exit;
			$this->title = "Sales Invoice";
			$this->keywords = "Sales Invoice";
			$this->_render('pages/salesinvoice/edit_salesinvoice');
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
		$this->data["salesorder"] = $this->salesinvoicemodel->getsalerequest_for_popup_grid($sess_group,$sess_company);
		$this->data["product_uom"] = $this->productmodule->get_alluom();
		$this->data["deliver"] = $this->salesinvoicemodel->dc_for_popup_grid($sess_group,$sess_company);
		$this->data["invoice_edit"]=$this->salesinvoicemodel->get_single_invoice($id);
		$cus_id=$this->data["invoice_edit"]->sale_invoice_customer_id;
		$this->data["cus_det"]=$this->salesinvoicemodel->get_cus_namee($cus_id);
		$this->data["cus_name"]=$this->data["cus_det"]->customer_name;
		$this->data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
		$this->data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id);
		$this->data["invoice_item"]=$this->salesinvoicemodel->get_item_invoice($id);
		$this->data["invoice_total"]=$this->salesinvoicemodel->get_item_total($id);	
		
		$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);//** Get All SalesInvoice Item Details **//
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->_render('pages/salesinvoice/view_salesinvoice');
	}
	
	public function view_summary_salesinvoice()
	{	
		$id = $this->input->post('search_id');
		
		$this->data["invoice_item"]=$this->salesinvoicemodel->get_item_invoice($id);
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		$this->load->view('pages/salesinvoice/view_summary_salesinvoice', $this->data);
		
	}
	
	public function print_salesinvoice($id)
	{	
		$this->load->helper('text');		//** Get All SalesInvoice Details **//
		$this->data["invoice_edit"] = $this->salesinvoicemodel->get_single_invoice($id);		//** Get All SalesInvoice Items Details **//
		$this->data["invoice_item"] = $this->salesinvoicemodel->get_item_invoice($id);		//** Get All SalesInvoice Tax Group Details **//
		$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);
		
		$this->load->view('pages/salesinvoice/sale_invoice_print', $this->data); 
		
		//echo $htmlString; 
		//$htmlString = '<p>This is some <strong>XHTML</strong> markup that <em>will</em> be<br />turned <a href="" title="#! code">into</a> an ascii string</p>';
 		//echo entities_to_ascii($htmlString);
		//echo $this->html2ascii($htmlString);

	}

	public function print_salesinvoice_withouttax($id)
	{	
		//** Get All SalesInvoice Details **//
		$this->data["invoice_edit"]=$this->salesinvoicemodel->get_single_invoice($id);
		//** Get All SalesInvoice Items Details **//
		$this->data["invoice_item"]=$this->salesinvoicemodel->get_item_invoice($id);
		//** Get All SalesInvoice Tax Group Details **//
		$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);

		$this->load->view('pages/salesinvoice/sale_invoice_print_withouttax',$this->data);
		
		//echo $this->html2ascii($htmlString);
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
		$this->data["si_item_total_tax_group"] = $this->salesinvoicemodel->getsingle_si_total_tax_group($id);
		$this->data["invoice_item"] = $this->salesinvoicemodel->get_item_invoice($id);
		$this->data["gross_amt_tax"] = $this->salesinvoicemodel->get_item_gross_amount_tax($id);
		$this->data["gross_amt_non_tax"] = $this->salesinvoicemodel->get_item_gross_amount_non_tax($id);
		$this->data["si_item_total"] = $this->salesinvoicemodel->getsingle_si_total($id);
		$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);
		$cus_id=$this->data["invoice_edit"]->sale_invoice_customer_id;
		$store_id=$this->data["invoice_edit"]->sale_invoice_store_id;
		//$this->data["cus_det"]=$this->salesinvoicemodel->get_cus_namee($cus_id);
		//$this->data["cus_name"]=$this->data["cus_det"]->customer_name;
		//$this->data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
		$this->data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id); 
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['invoice_edit']->sale_invoice_grand_total);
		
		$this->data['user_details'] = $this->salesordermodule->getuserdetails($sess_user);
		$user_name = $this->data['user_details']->user_first_name;		
		$user_email = $this->data['user_details']->user_email;
		$inv_no = $this->data['invoice_edit']->sale_invoice_company_invoice_no;	
		$customer_name = $this->data['invoice_edit']->customer_name;		
		$customer_email = $this->data['invoice_edit']->customer_email;
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		
		if($store_id == '1')
		{
			$this->load->view('pages/salesinvoice/sale_invoice_print_drug',$this->data);
		}
		 else if($store_id == '2')
		{
			$this->load->view('pages/salesinvoice/sale_invoice_print_food',$this->data);
		}
		else if($store_id == '3')
		{
			$this->load->view('pages/salesinvoice/sale_invoice_print_vet',$this->data);
		}
		else if($store_id == '4')
		{
			$this->load->view('pages/salesinvoice/sale_invoice_print_auy',$this->data);
		}
		else
		{
			$this->load->view('pages/salesinvoice/sale_invoice_print_others',$this->data);
		}  
	}
	
	public function print_salesinvoices_new($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["sess_company"] = $sess_company;
		$this->data["compny_det"] = $this->salesinvoicemodel->compny_details($sess_company);

		$this->data["invoice_edit"] = $this->salesinvoicemodel->get_single_invoice($id);
		$this->data["si_item_total_tax_group"] = $this->salesinvoicemodel->getsingle_si_total_tax_group($id);
		$this->data["invoice_item"] = $this->salesinvoicemodel->get_item_invoice($id);
		$this->data["gross_amt_tax"] = $this->salesinvoicemodel->get_item_gross_amount_tax($id);
		$this->data["gross_amt_non_tax"] = $this->salesinvoicemodel->get_item_gross_amount_non_tax($id);
		$this->data["si_item_total"] = $this->salesinvoicemodel->getsingle_si_total($id);
		$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);
		$cus_id=$this->data["invoice_edit"]->sale_invoice_customer_id;
		$store_id=$this->data["invoice_edit"]->sale_invoice_store_id;
		//$this->data["cus_det"]=$this->salesinvoicemodel->get_cus_namee($cus_id);
		//$this->data["cus_name"]=$this->data["cus_det"]->customer_name;
		//$this->data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
		$this->data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id); 
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['invoice_edit']->sale_invoice_grand_total);
		
		$this->data['user_details'] = $this->salesordermodule->getuserdetails($sess_user);
		$user_name = $this->data['user_details']->user_first_name;		
		$user_email = $this->data['user_details']->user_email;
		$inv_no = $this->data['invoice_edit']->sale_invoice_company_invoice_no;	
		$customer_name = $this->data['invoice_edit']->customer_name;		
		$customer_email = $this->data['invoice_edit']->customer_email;
		
		$this->title = "Sales Invoice";
		$this->keywords = "Sales Invoice";
		
		
			$this->load->view('pages/salesinvoice/sale_invoice_print_new',$this->data);
		
		  
	}
	
	public function pdf($id)
	{	
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["sess_company"] = $sess_company;
		$this->data["compny_det"] = $this->salesinvoicemodel->compny_details($sess_company);
		
		
		$this->data["invoice_edit"] = $this->salesinvoicemodel->get_single_invoice($id);
		//echo "<pre>"; print_r($this->data["invoice_edit"]); exit; 
		$this->data["invoice_item"] = $this->salesinvoicemodel->get_item_invoice($id);
		
		$this->data["tax_group"] = $this->salesinvoicemodel->get_tax_group($id);
		
		$cus_id=$this->data["invoice_edit"]->sale_invoice_customer_id;
		
		$this->data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id); 
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['invoice_edit']->sale_invoice_grand_total);
  		 
		$this->data['user_details'] = $this->salesordermodule->getuserdetails($sess_user);
		
		$user_name = $this->data['user_details']->user_first_name;		
		$user_email = $this->data['user_details']->user_email;
		
		$inv_no = $this->data['invoice_edit']->sale_invoice_company_invoice_no;	
		$customer_name = $this->data['invoice_edit']->customer_name;		
		$customer_email = $this->data['invoice_edit']->customer_email;
		
		
		$html = $this->pdf->load_view('pages/salesinvoice/sale_invoice_print_old',$this->data);
		
		$date = date('d-m-y');
		$this->pdf->render();
		// $this->pdf->stream($date."purchaseorder.pdf");
		$pdf_content = $this->pdf->output(); // Put contents of pdf into variable for later
		
		ob_start();
		//require_once($dir.'/html.php');
		$html_message = ob_get_contents();
		ob_end_clean();
		
	  // echo $html_message;  exit;
	   
	   // Load the SwiftMailer files
	   require_once APPPATH.'libraries/swift/swift_required.php';
	

		$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer

		$message = Swift_Message::newInstance()
				       ->setSubject('Sales Invoice Details') // Message subject
					   ->setTo(array($customer_email => $customer_name)) // Array of people to send to
					   ->setCc(array($user_email => $user_name))
					   ->setFrom(array('thirupathi@vernalsoft.com' => 'Chennaiautospares')) // From:
					   ->setBody($html_message, 'text/html') // Attach that HTML message from earlier
					   ->attach(Swift_Attachment::newInstance($pdf_content, 'sales_invoice_'.$inv_no.'.pdf', 'application/pdf')); // Attach the generated PDF from earlier
		//echo "<pre>"; print_r($message); exit;
		// Send the email, and show user message
		if ($mailer->send($message))
		{
			$this->session->set_flashdata('message', 'Mail Sended Successfully');
			redirect('salesinvoice/salesinvoice_list');
		}
		else
		{
			$this->session->set_flashdata('message', 'Oops! Mail Not Send Faild');
			redirect('salesinvoice/salesinvoice_list');
		}
	}
	
	public function getsalesorderpopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["salesorder"] = $this->salesinvoicemodel->getsalerequest_for_popup_grid($sess_group,$sess_company);
		
		$result = $this->load->view("pages/salesinvoice/sales_order_popup", $this->data, true);
				
		echo $result; exit;
	}
	
	public function getsales_order()
	{
		$cus_id = $this->input->post('cus_id');
		$request = $this->input->post('salesOrderId');
	   	$data["cus_id"] = $cus_id;
		$data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
		$data['bill_addr']=$data["bill"]->customer_billing_address;
		$data['bill_country']=$data["bill"]->customer_billing_country_id;
		$data['bill_state']=$data["bill"]->customer_billing_state_id;
		$data['bill_city']=$data["bill"]->customer_billing_city_id;
		$data['bill_zip']=$data["bill"]->customer_billing_zipcode;
		
		$data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id);
		$data['ship_addr']=$data["ship"]->customer_shipping_address;
		$data['ship_country']=$data["ship"]->customer_shipping_country_id;
		$data['ship_state']=$data["ship"]->customer_shipping_state_id;
		$data['ship_city']=$data["ship"]->customer_shipping_city_id;
		$data['ship_zip']=$data["ship"]->customer_shipping_zipcode;
		
		$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($request);//** Get Single Sales Order Item Details **//
		$this->data["tax_group"] = $this->salesordermodule->get_tax_group($request);//** Get All SalesOrder Item Details **//
		$so_item_total = $this->salesordermodule->getsingle_so_total($request);//** Get Single Sales Order Item Total Details **//
			
		//$this->data["sales_order"] = $this->salesinvoicemodel->getsale_orderitems($request);
				
		$data['view_order'] =$this->load->view('pages/salesinvoice/sales_order_append_popup.php',$this->data,true);
		$data['tax_group'] =$this->load->view('pages/salesinvoice/sales_order_tax_group_append_popup.php',$this->data,true);
		  
		
		$data['table_count'] = count($this->data["so_item_data"]);
		$data['tax_count'] = count($this->data["tax_group"]);
			
		$data['sales_total_gross_amount'] = $so_item_total->so_total_gross_amount;
		$data['sales_total_tax_amount'] = $so_item_total->so_total_tax_amount;
		$data['sales_total_tax_percentage'] = $so_item_total->so_total_tax_percentage;
		$data['sales_total_discount_percentage'] = $so_item_total->so_total_discount_percentage;
		$data['sales_total_discount_amount'] = $so_item_total->so_total_discount_amount;
		$data['sales_total_shipping_charges'] = $so_item_total->so_total_shipping_charges;
		$data['sales_total_shipping_tax'] = $so_item_total->so_total_shipping_tax;
		$data['sales_grand_total'] = $so_item_total->so_grand_total;
		
		
		
		$result = json_encode($data);
		
		echo $result; exit;
	}
	
	public function getdeliverychallenpopup()
	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["deliver"] = $this->salesinvoicemodel->dc_for_popup_grid($sess_group,$sess_company);
		
		$result = $this->load->view("pages/salesinvoice/dc_popup", $this->data, true);
				
		echo $result; exit;
		
	}

	public function get_dc()
	{
		$cus_id = $this->input->post('cus_id');
		$dc_id = $this->input->post('dc_id');
		$so_id = $this->input->post('salesOrderId');
		$pricebook_id = $this->input->post('pricebook_id');
		
		$data["cus_id"] = $cus_id;
		$data["bill"] = $this->salesinvoicemodel->getcus_bill_det($cus_id);
		$data['bill_addr']=$data["bill"]->customer_billing_address;
		$data['bill_country']=$data["bill"]->customer_billing_country_id;
		$data['bill_state']=$data["bill"]->customer_billing_state_id;
		$data['bill_city']=$data["bill"]->customer_billing_city_id;
		$data['bill_zip']=$data["bill"]->customer_billing_zipcode;
		
		$data["ship"] = $this->salesinvoicemodel->getcus_ship_det($cus_id);
		$data['ship_addr']=$data["ship"]->customer_shipping_address;
		$data['ship_country']=$data["ship"]->customer_shipping_country_id;
		$data['ship_state']=$data["ship"]->customer_shipping_state_id;
		$data['ship_city']=$data["ship"]->customer_shipping_city_id;
		$data['ship_zip']=$data["ship"]->customer_shipping_zipcode;
		
		$this->data["sales_order"] = $this->salesinvoicemodel->get_dc_items($so_id, $dc_id, $pricebook_id);
		
		
		$data['view_order'] =$this->load->view('pages/salesinvoice/dc_append_popup.php',$this->data,true);
		$sales_order_item = $this->data["sales_order"];
		$data['table_count'] = count($sales_order_item);
		
	$result = json_encode($data);
		echo $result; exit;
	}
	
	public function searchsalesorder()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$so_code=$this->security->xss_clean($this->input->post('so_code'));
		$customer_name=$this->security->xss_clean($this->input->post('customer_name'));
		
		$this->data['salesorder'] = $this->salesinvoicemodel->getsalesordersearch($so_code,$customer_name,$sess_group,$sess_company);
		
		$result = $this->load->view("pages/salesinvoice/searchsalesorder_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	public function searchdeliverychallan()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$dc_code=$this->security->xss_clean($this->input->post('dc_code'));
		$customer_name=$this->security->xss_clean($this->input->post('customer_name'));
		$po_refernce_no=$this->security->xss_clean($this->input->post('po_refernce_no'));
		
		$this->data['deliver'] = $this->salesinvoicemodel->getdeliverychallansearch($dc_code,$customer_name,$sess_group,$sess_company,$po_refernce_no);
		
		$result = $this->load->view("pages/salesinvoice/searchdeliverychallan_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
}