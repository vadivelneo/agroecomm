<?php ob_start(); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Salesorder extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->helper('download');
		  $this->load->model('salesordermodule');
		  $this->load->model('sales_popup_model');
		  $this->load->model('mastersmodule');
		  $this->load->model('purchasemodule');
		  $this->load->model('organizationsmodel');
		  $this->load->model('customermodule');
		  $this->load->library('pagination');
		  $this->load->model('productmodule');
		  $this->load->model('genelogytree');
		  
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
	
	//** Index Page **//
	
	public function index()
	{
		redirect('salesorder/salesorder_list');
	}
	
	public function sample_form()
	{
		$this->_render('pages/sample_form');
	}
	
	//** Search Customer Case History **//
	
	public function search_salesorder($sort_order='sales_order_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$sess_user_code=$sessionData['user_code'];
		
		if(isset($_POST['search']))
		{
			$so_order = $this->security->xss_clean($this->input->post('search_sale_ord_no'));
			$po_order = $this->security->xss_clean($this->input->post('search_po_ref_no'));
			$so_qut_no = $this->security->xss_clean($this->input->post('search_sale_qut_no'));
			$cus_name = $this->security->xss_clean($this->input->post('search_cus_name'));
			$cus_code = $this->security->xss_clean($this->input->post('search_cus_code'));
 			$status = $this->security->xss_clean($this->input->post('status'));
			
			$from_date = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date));
			$to_date = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date));
			
			$salesorder_search= array(
					'search_so_order' => $so_order,
					'search_po_order' => $po_order,
					'search_cus_name' =>$cus_name,
 					'search_status' => $status,
					'from_date' => $from_date,
					'to_date' => $to_date,
					'cus_code' => $cus_code,
					'so_qut_no' => $so_qut_no,
					);	
			$this->session->set_userdata('sales_order_data',$salesorder_search);
		}
			$search_data = $this->session->userdata('sales_order_data');
						
			$search_so_order = $search_data['search_so_order'];
			$search_po_order = $search_data['search_po_order'];
			$so_qut_no = $search_data['so_qut_no'];
			$cus_code = $search_data['cus_code'];
			$search_cus_name = $search_data['search_cus_name'];
			$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
		
			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =20;
			$Result = $this->salesordermodule->search_get_all_so($sess_group,$sess_user,$sess_user_code,$search_so_order,$search_po_order,$search_cus_name,$search_status,$limit,$page,$sort_order,$sort_by,$so_qut_no,$cus_code,$from_date,$to_date);
			
			$this->data["so_list"] = $Result['rows'];
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('salesorder/search_salesorder/').'/'.$sort_order.'/'.$sort_by;
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;	
			$this->title = "Sales Order";
			$this->keywords = "Sales Order";
			$this->_render('pages/salesorder/salesorder_list');
	}
	
	//** Sales Oder List **//
	
	public function salesorder_list($sort_order='sales_order_id',$sort_by='desc')
	{
		$this->session->unset_userdata('sales_order_data');
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$sess_user_code=$sessionData['user_code'];
		//echo "<pre>"; print_r($sessionData); exit;
		$this->session->unset_userdata('sales_order_data');

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->salesordermodule->get_all_so($sess_group,$sess_user,$limit,$page,$sort_order,$sort_by,$sess_user_code);
		$this->data["so_list"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('salesorder/salesorder_list/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;	
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->_render('pages/salesorder/salesorder_list');
			
	}
	
	
	public function data_table_self_purchase()
	{
		
		$this->session->unset_userdata('sales_order_data');
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$sess_user_code=$sessionData['user_code'];
		//echo "<pre>"; print_r($sessionData); exit;
		
		$this->title = "Order Form";
		$this->keywords = "Order Form";

		$this->_render('pages/salesorder/datatable_self_purchase_list');
	}
	
	//** Add Sales Order **// 
	public function addsalesorder()
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$prefix = $this->salesordermodule->getprefix('9');//** Get Prefix **//
		$SoPrefix = $prefix->prefix_name;
		$code = $this->salesordermodule->getlastid();//** Get Last Id gor SalesOrder **//
		if(!empty($code))
		{
			
			$lastSoCode = $code->sales_order_number;
			$lengthPrefix = strlen($SoPrefix);
			$strSplit = str_split($lastSoCode, $lengthPrefix);
			$SoLastdigit = $strSplit[0];
			$explode = explode($SoLastdigit,$lastSoCode);
			$SoLastnumber = $explode[1];
			if($SoLastdigit == $SoPrefix)
			{
				$Socode = $SoLastnumber+1;
				$Socode = $SoLastnumber+1;
				$digits = sprintf ('%04d', $Socode);
				$SocodewithPrefix = $SoPrefix.$digits;
			}
			else
			{
				$SocodewithPrefix = $SoPrefix.'0001';
			}
		}
		else
		{
			$SocodewithPrefix = $SoPrefix.'2213';
		}
		$this->data['Socode'] = $SocodewithPrefix;
		$this->data['SoPrefix'] = $SoPrefix;
		$randomstring = $SocodewithPrefix;
		
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		$this->data["salesman"] = $this->salesordermodule->get_all_salesman();//** Get All Sales Man **//
		$this->data['country'] = $this->customermodule->get_country(); //** Get Country **//
		$this->data['region'] = $this->customermodule->get_region();//** Get region **//
		$this->data['zone'] = $this->customermodule->get_zone();//** Get zone **//
		$this->data['area'] = $this->customermodule->get_area();//** Get area **//
		$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		
		if(isset($_POST['save']))
		{
			//** Sales Order Details **//
			
			
			$code = $this->salesordermodule->getlastid();//** Get Last Id gor SalesOrder **//
		if(!empty($code))
		{
			
			$lastSoCode = $code->sales_order_number;
			$lengthPrefix = strlen($SoPrefix);
			$strSplit = str_split($lastSoCode, $lengthPrefix);
			$SoLastdigit = $strSplit[0];
			$explode = explode($SoLastdigit,$lastSoCode);
			$SoLastnumber = $explode[1];
			if($SoLastdigit == $SoPrefix)
			{
				$Socode = $SoLastnumber+1;
				$digits = sprintf ('%04d', $Socode);
				$SocodewithPrefix = $SoPrefix.$digits;
			}
			
		}
		
		$this->data['Socode'] = $SocodewithPrefix;
		$this->data['SoPrefix'] = $SoPrefix;
		$Socode = $SocodewithPrefix;
		
		
		
			$so_so_no = $this->security->xss_clean($this->input->post('so_no'));
			$disease_type = $this->security->xss_clean($this->input->post('disease_type'));
			$so_sales_quat_no = $this->security->xss_clean($this->input->post('so_quote_no'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			$so_referral_id = $this->security->xss_clean($this->input->post('sales_man'));
			$so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$purchse_ord_req_date = $this->security->xss_clean($this->input->post('purchse_ord_req_date'));
			$cus_inc_amt = $this->security->xss_clean($this->input->post('cus_inc_amt'));
			
			if($this->input->post('purchse_ord_req_date') != "")
			{
				$purchse_ord_req_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_req_date')));
			}
			else
			{
				$purchse_ord_req_date = "0000-00-00";
			}

		 	$purchse_ord_valid = $this->security->xss_clean($this->input->post('purchse_ord_valid'));

			if($this->input->post('purchse_ord_valid') != "")
			{
				$purchse_ord_valid = date('Y-m-d', strtotime($this->input->post('purchse_ord_valid')));
			}
			else
			{
				$purchse_ord_valid = "0000-00-00";
			}
			
			$purchase_invo_po_date = $this->security->xss_clean($this->input->post('purchase_invo_po_date'));

			if($this->input->post('purchase_invo_po_date') != "")
			{
				$purchase_invo_po_date = date('Y-m-d', strtotime($this->input->post('purchase_invo_po_date')));
			}
			else
			{
				$purchase_invo_po_date = "0000-00-00";
			}
				
			$pricebook_id = $this->security->xss_clean($this->input->post('pricebook_id'));
			$customer_discount = $this->security->xss_clean($this->input->post('customer_discount'));
			$customer_cash_discount = $this->security->xss_clean($this->input->post('customer_cash_discount'));
			$so_customer_code = $this->security->xss_clean($this->input->post('so_customer_code'));
			$customer_region = $this->security->xss_clean($this->input->post('customer_region'));
			$customer_zone = $this->security->xss_clean($this->input->post('customer_zone'));
			$customer_area = $this->security->xss_clean($this->input->post('customer_area'));
			$so_branch_off = $this->security->xss_clean($this->input->post('so_branch_off'));
			$so_status = $this->security->xss_clean($this->input->post('so_status'));
			$transport_mode = $this->security->xss_clean($this->input->post('transport_mode'));
		 	
			
			
			//** SalesOrder terms & Conditions **//
			$purchse_ord_payment_mode = $this->security->xss_clean($this->input->post('purchse_ord_payment_mode'));
			$purchse_ord_transac_date= $this->security->xss_clean($this->input->post('purchse_ord_transac_date'));
		  
			if($this->input->post('purchse_ord_transac_date') != "")
			{
				$purchse_ord_transac_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_transac_date')));
			}
			else
			{
				$purchse_ord_transac_date = "0000-00-00";
			}

			$purchse_ord_terms_conditions= $this->security->xss_clean($this->input->post('purchse_ord_terms_conditions'));
			$purchse_ord_payment_terms = $this->security->xss_clean($this->input->post('purchse_ord_payment_terms'));
	 		
			//** SalesOrder Item Details **//
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			
			$item_inv_id = $this->security->xss_clean($this->input->post('item_inv_id'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$item_inv_qty = $this->security->xss_clean($this->input->post('item_inv_qty'));
			$item_qty4 = $this->security->xss_clean($this->input->post('item_qty4'));
			$item_actual_qty = $this->security->xss_clean($this->input->post('item_actual_qty'));
			
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_incentive_rate = $this->security->xss_clean($this->input->post('item_incentive_rate'));
			$item_incentive_total = $this->security->xss_clean($this->input->post('item_incentive_total'));
			$item_qty_free = $this->security->xss_clean($this->input->post('item_qty_free'));
			$free_qty_name = $this->security->xss_clean($this->input->post('free_qty_name'));
			$scheme_id = $this->security->xss_clean($this->input->post('scheme_id'));
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_gross_amount_with_disc = $this->security->xss_clean($this->input->post('item_gross_amount_with_disc'));
			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_serv_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_cgst_amt = $this->security->xss_clean($this->input->post('item_cgst_amount'));
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst'));
			$item_sgst_amt = $this->security->xss_clean($this->input->post('item_sgst_amount'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_igst_amt = $this->security->xss_clean($this->input->post('item_igst_amount'));
			$item_hsn  = $this->security->xss_clean($this->input->post('item_hsn_value'));
			
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			
			$item_flat_discount = $this->security->xss_clean($this->input->post('item_flat_discount'));
			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
			$item_damage_discount_perc = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			$item_damage_discount_amount = $this->security->xss_clean($this->input->post('item_damage_discount_amount'));
			
			//** SalesOrder Item Total **//
			$total_quantity_items = $this->security->xss_clean($this->input->post('total_quantity_items'));
			$total_gross_amount_items = $this->security->xss_clean($this->input->post('total_gross_amount_items'));
			$total_tax_percent_items = $this->security->xss_clean($this->input->post('total_tax_percent_items'));
			$total_tax_amount_items = $this->security->xss_clean($this->input->post('total_tax_amount_items'));
			$total_discount_percent_items = $this->security->xss_clean($this->input->post('total_discount_percent_items'));
			$total_discount_amount_items = $this->security->xss_clean($this->input->post('total_discount_amount_items'));
			$total_net_amount_items = $this->security->xss_clean($this->input->post('total_net_amount_items'));
			
			
			$material_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$material_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
			
			$multiple_item_division_id = $this->security->xss_clean($this->input->post('multiple_item_division_id'));
			$multiple_item_store_id = $this->security->xss_clean($this->input->post('multiple_item_store_id'));
			
			
			$tax_group_incentive_amount = $this->security->xss_clean($this->input->post('tax_group_total_incentive_amount'));
			$total_incentive_amount = $this->security->xss_clean($this->input->post('total_incentive_amount'));

		 	$so_data=array(
					'sales_order_number'=>$Socode,
					'sales_order_sales_quatation_code'=>$so_sales_quat_no,
					'sales_order_company_id' =>$sess_company,
					'sales_order_customer_id' =>$so_customer_id,
					'sales_order_incentive_amt' =>$cus_inc_amt,
					'sales_order_item_division_id' =>$material_store_division_id,
					'sales_order_item_store_id' =>$material_store_id,
					'disease_type'=>$disease_type,
					'sales_order_po_date'=>$purchase_invo_po_date,
					'sales_order_customer_discount_percentage'=>$customer_discount,
					'sales_order_customer_cash_discount'=>$customer_cash_discount,
					'sales_order_customer_price_book_id'=>$pricebook_id,
					'sales_order_referral_id' =>$so_referral_id,
					'sales_order_customer_code'=>$so_customer_code,
					'sales_order_customer_name'=>$so_customer_name ,
					'sales_order_requested_date'=>$purchse_ord_req_date,
					'sales_order_valid_till'=>$purchse_ord_valid,
					'sales_order_region_id'=>$customer_region,
					'sales_order_zone_id'=>$customer_zone,
					'sales_order_area_id'=>$customer_area,
					'sales_order_branch_office'=>$so_branch_off ,
					'sales_order_transport_mode'=>$transport_mode,
					//'sales_order_doc_name'=>$doc_name,
					'sales_order_status'=> $so_status ,
					'sales_order_payment_mode'=>$purchse_ord_payment_mode ,
					'sales_order_transaction_date'=>$purchse_ord_transac_date,
					'sales_order_termsandconditions'=>$purchse_ord_terms_conditions,
					'sales_order_payment_terms'=>$purchse_ord_payment_terms,
					'sales_order_active_status'=>'active',
					'sales_order_add_date'=>date('Y-m-d'),
					'sales_order_created_by'=>$sess_user,
					'sales_order_updated_by'=>$sess_user,
					);
				
			$so_id = $this->salesordermodule->add_so_details($so_data);//**Add Sales Order Details **//
		 
			
			
			if(!empty($item_id))
		 	{
				$result=count($item_id);
				
				for($i=1; $i<=$result; $i++)
				{
					if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
					{
						$so_itemdata=array(
							'so_items_sales_id'=>$so_id,
							'so_items_item_id'=>$item_id[$i],
							//'so_items_division_id'=>$multiple_item_division_id[$i],
							//'so_items_store_id'=>$multiple_item_store_id[$i],
							'so_items_code'=>$item_code[$i],
							'so_items_name'=>$item_name[$i],
							'so_items_model'=>$item_model[$i],
							'so_items_uom_id'=>$item_uom_id[$i],
							'so_items_priceperunit'=>$item_priceperunit[$i],
							'so_items_mrp'=>$item_mrp[$i],
							'so_items_qty'=>$item_qty[$i],
							'so_items_incentive_rate'=>$item_incentive_rate[$i],
							'so_items_incentive_total'=>$item_incentive_total[$i],
							'so_inv_id'=>$item_inv_id[$i],
							'so_items_batch_no'=>$item_batch_no[$i],
							'so_items_inv_qty'=>$item_inv_qty[$i],							
							'so_items_ord_qty'=>$item_qty[$i],
							'so_items_gross_amount'=>$item_gross_amount[$i],
							'so_items_gross_amount_with_discount'=>$item_gross_amount_with_disc[$i],
							
							'so_items_gst'=>$item_cgst[$i],
							'so_items_gst_amt'=>$item_cgst_amt[$i],
							'so_items_sgst'=>$item_sgst[$i],
							'so_items_sgst_amt'=>$item_sgst_amt[$i],
							//'so_items_igst'=>$item_igst[$i],
							//'so_items_igst_amt'=>$item_igst_amt[$i],
							//'so_items_hsn_sac'=>$item_hsn[$i],
							
							'so_items_tax_percent'=>$item_tax_percent[$i],
							'so_items_tax_amount'=>$item_tax_amount[$i],
							'so_items_discounts_percentage'=>$item_discount_percent[$i],
							'so_items_discounts_amount'=>$item_discount_amount[$i],
							
							'so_items_net_amount'=>$item_net_amount[$i],
							);
							
						$this->salesordermodule->add_so_Item_details($so_itemdata);//** Add SalesOrder Item Details **//
					}
				}	
			}
			
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
			 $tax_group_damage_discount_amt=$this->security->xss_clean($this->input->post('tax_group_damage_discount_amount'));
			 
			 if(!empty($tax_group_length))
			 {
				 
				for($i=0; $i<=$tax_group_length; $i++)
				{
					if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]) && !empty($tax_group_tax_amount[$i]) && !empty($tax_group_tax_percentage[$i])  && !empty($tax_group_with_tax_gross_amount[$i]))
					{
				  		$tax_group=array(
								'tax_group_sales_order_id'=>$so_id,
								'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
								'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
								//'tax_group_total_flat_amount'=>$tax_group_flat_amount[$i],
								//'tax_group_without_cash_disocunt_amount'=>$tax_group_without_cash_discount_amount[$i],
								//'tax_group_cash_disocunt_amount'=>$tax_group_cash_discount_amount[$i],
								'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
								'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
								'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
								//'tax_group_damage_discount_amt'=>$tax_group_damage_discount_amt[$i],
								'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
								'tax_group_incentive_amount'=>$tax_group_incentive_amount[$i],
				  				);
						$this->salesordermodule->add_tax_group($tax_group);//** Add Tax Group **//
					}
				}
			 }
			 
			//** Sales Order Item Total **//
			$total_gross_amount=$this->security->xss_clean($this->input->post('total_gross_amount'));
			$total_tax_percentage=$this->security->xss_clean($this->input->post('total_tax_percentage'));
			$total_tax_amount=$this->security->xss_clean($this->input->post('total_tax_amount'));
			$total_disocunts_percentage=$this->security->xss_clean($this->input->post('total_disocunts_percentage'));
			$total_disocunts_amount=$this->security->xss_clean($this->input->post('total_disocunts_amount'));
			$total_shipping_charges=$this->security->xss_clean($this->input->post('total_shipping_charges'));
			$total_shipping_tax=$this->security->xss_clean($this->input->post('total_shipping_tax'));
			$total_adjustments=$this->security->xss_clean($this->input->post('total_adjustments'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
			$USR_REDEEM_AMT = $this->security->xss_clean($this->input->post('cus_wallet_debit_amt'));
			//echo $USR_REDEEM_AMT; exit;
			$so_totalprice=array(
					'so_total_sales_id'=>$so_id,
					'sales_order_customer_code'=>$so_customer_code,
					'so_total_gross_amount'=>$total_gross_amount,
					'so_total_tax_amount'=>$total_tax_amount,
					'so_total_tax_percentage'=>$total_tax_percentage,
					'so_total_discount_percentage'=>$total_disocunts_percentage,
					'so_total_discount_amount'=>$total_disocunts_amount,
					'so_total_shipping_charges'=>$total_shipping_charges,
					'so_total_shipping_tax'=>$total_shipping_tax,
					'so_adjustment'=>$total_adjustments,
					'so_grand_total'=>$grand_total,
					
					'total_quantity_items'=>$total_quantity_items,
					'total_gross_amount_items'=>$total_gross_amount_items,
					'total_tax_percent_items'=>$total_tax_percent_items,
					'total_tax_amount_items'=>$total_tax_amount_items,
					'total_discount_percent_items'=>$total_discount_percent_items,
					'total_discount_amount_items'=>$total_discount_amount_items,
					'total_net_amount_items'=>$total_net_amount_items,
					'total_incentive_amount'=>$total_incentive_amount,
					'total_redeem_amount'=>$USR_REDEEM_AMT,
					'sales_order_add_date'=>date('Y-m-d'),
					);
			$this->salesordermodule->add_so_total_price($so_totalprice);//** Add Sales Order Item Total **//
			$transaction_add_date = date('Y-m-d');
			
			$connection = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);//mysqli_connect("localhost", "root", "", "agro");
			//$connection = mysqli_connect("localhost", "neoindzg_agro", "agro*123$", "neoindzg_agro_ecomm");
			
			$sql_wallet_amt = "INSERT INTO vsoft_incentive_details (SO_ID,SO_NO,OFCR_ID,OFCR_NAME,USR_LEVEL_VALUE,OFCR_USR_VALUE,OFCR_TRE_SPNCR_ID,INCENTIVE_PERCENT,TOTAL_INCENTIVE_AMT,USR_INCENTIVE_AMT, USR_REDEEM_AMT, PAYMENT_STATUS,CREATED_DATE) VALUES ('$so_id','$so_so_no','$so_customer_id','$so_customer_name','$COM_USR_LEVEL_VALUE','$so_customer_code','$so_customer_code','','','','$USR_REDEEM_AMT','7', '$transaction_add_date')";	

		mysqli_query($connection, $sql_wallet_amt);
			
			$this->session->set_flashdata('message', 'Sales Order Added Successfully');
			redirect('salesorder/salesorder_list');
		}
		else
		{
			//$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
			$this->title = "Sales Order";
			$this->keywords = "Sales Order";
			$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
			$this->_render('pages/salesorder/addsalesorder');
		}
	}
	
	public function orderform_list($sort_order='sales_order_id',$sort_by='desc')
	{
		$this->session->unset_userdata('sales_order_data');
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$sess_user_code=$sessionData['user_code'];
		//echo "<pre>"; print_r($sessionData); exit;
		$this->session->unset_userdata('sales_order_data');

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->salesordermodule->get_all_orderform($sess_group,$sess_user,$limit,$page,$sort_order,$sort_by,$sess_user_code);
		$this->data["so_list"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('salesorder/salesorder_list/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;	
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->_render('pages/salesorder/orderform_list');
			
	}
	public function order_form()
	{	
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$prefix = $this->salesordermodule->getprefix('9');//** Get Prefix **//
		$SoPrefix = $prefix->prefix_name;
		$code = $this->salesordermodule->getlastid();//** Get Last Id gor SalesOrder **//
		if(!empty($code))
		{
			
			$lastSoCode = $code->sales_order_number;
			$lengthPrefix = strlen($SoPrefix);
			$strSplit = str_split($lastSoCode, $lengthPrefix);
			$SoLastdigit = $strSplit[0];
			$explode = explode($SoLastdigit,$lastSoCode);
			$SoLastnumber = $explode[1];
			if($SoLastdigit == $SoPrefix)
			{
				$Socode = $SoLastnumber+1;
				$Socode = $SoLastnumber+1;
				$digits = sprintf ('%04d', $Socode);
				$SocodewithPrefix = $SoPrefix.$digits;
			}
			else
			{
				$SocodewithPrefix = $SoPrefix.'0001';
			}
		}
		else
		{
			$SocodewithPrefix = $SoPrefix.'2213';
		}
		$this->data['Socode'] = $SocodewithPrefix;
		$this->data['SoPrefix'] = $SoPrefix;
		$randomstring = $SocodewithPrefix;
		
		
		if(isset($_POST['save']))
		{
			//** Sales Order Details **//
		//	echo "sf vdcfg"; exit;	
			
			$code = $this->salesordermodule->getlastid();//** Get Last Id gor SalesOrder **//
		if(!empty($code))
		{
			
			$lastSoCode = $code->sales_order_number;
			$lengthPrefix = strlen($SoPrefix);
			$strSplit = str_split($lastSoCode, $lengthPrefix);
			$SoLastdigit = $strSplit[0];
			$explode = explode($SoLastdigit,$lastSoCode);
			$SoLastnumber = $explode[1];
			if($SoLastdigit == $SoPrefix)
			{
				$Socode = $SoLastnumber+1;
				$digits = sprintf ('%04d', $Socode);
				$SocodewithPrefix = $SoPrefix.$digits;
			}
			
		}
		
		$this->data['Socode'] = $SocodewithPrefix;
		$this->data['SoPrefix'] = $SoPrefix;
		$Socode = $SocodewithPrefix;
		
		
		
			$so_so_no = $this->security->xss_clean($this->input->post('so_no'));
			
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			
			$so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			
			$pricebook_id = $this->security->xss_clean($this->input->post('pricebook_id'));
			
			$so_customer_code = $this->security->xss_clean($this->input->post('so_customer_code'));
			
			$so_status = $this->security->xss_clean($this->input->post('so_status'));
			
		 	
			
			
			//** SalesOrder terms & Conditions **//
			
			//** SalesOrder Item Details **//
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			
			$item_inv_id = $this->security->xss_clean($this->input->post('item_inv_id'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$item_inv_qty = $this->security->xss_clean($this->input->post('item_inv_qty'));
			$item_incentive_rate = $this->security->xss_clean($this->input->post('item_incentive_rate'));
			$item_incentive_total = $this->security->xss_clean($this->input->post('item_incentive_total'));
			
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
		
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_gross_amount_with_disc = $this->security->xss_clean($this->input->post('item_gross_amount_with_disc'));
			
		
			
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_cgst_amt = $this->security->xss_clean($this->input->post('item_cgst_amount'));
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst'));
			$item_sgst_amt = $this->security->xss_clean($this->input->post('item_sgst_amount'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_igst_amt = $this->security->xss_clean($this->input->post('item_igst_amount'));
			$item_hsn  = $this->security->xss_clean($this->input->post('item_hsn_value'));
			
			
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			
			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
			
			
			//** SalesOrder Item Total **//
			$total_quantity_items = $this->security->xss_clean($this->input->post('total_quantity_items'));
			$total_gross_amount_items = $this->security->xss_clean($this->input->post('total_gross_amount_items'));
			$total_tax_percent_items = $this->security->xss_clean($this->input->post('total_tax_percent_items'));
			$total_tax_amount_items = $this->security->xss_clean($this->input->post('total_tax_amount_items'));
			$total_discount_percent_items = $this->security->xss_clean($this->input->post('total_discount_percent_items'));
			$total_discount_amount_items = $this->security->xss_clean($this->input->post('total_discount_amount_items'));
			$total_net_amount_items = $this->security->xss_clean($this->input->post('total_net_amount_items'));
			
			
			$material_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$material_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
			
			$multiple_item_division_id = $this->security->xss_clean($this->input->post('multiple_item_division_id'));
			$multiple_item_store_id = $this->security->xss_clean($this->input->post('multiple_item_store_id'));
			
			
			$tax_group_incentive_amount = $this->security->xss_clean($this->input->post('tax_group_total_incentive_amount'));
			$total_incentive_amount = $this->security->xss_clean($this->input->post('total_incentive_amount'));

		 	$so_data=array(
					'sales_order_number'=>$Socode,
					'sales_order_company_id' =>$sess_company,
					'sales_order_customer_id' =>$so_customer_id,
					'sales_order_item_division_id' =>$material_store_division_id,
					'sales_order_item_store_id' =>$material_store_id,
					
					'sales_order_customer_price_book_id'=>$pricebook_id,
					'sales_order_customer_code'=>$so_customer_code,
					'sales_order_customer_name'=>$so_customer_name ,
					//'sales_order_doc_name'=>$doc_name,
					'sales_order_status'=> $so_status ,
					'sales_order_active_status'=>'active',
					'sales_order_add_date'=>date('Y-m-d'),
					'sales_order_created_by'=>$sess_user,
					'sales_order_updated_by'=>$sess_user,
					);
				
			$so_id = $this->salesordermodule->add_so_details($so_data);//**Add Sales Order Details **//
		 
			
			//echo $item_id;
			//echo print_r($item_qty); exit;
			if(!empty($item_id))
		 	{
				$result=count($item_id);
				
				for($i=1; $i<=$result; $i++)
				{
					if(!empty($item_id[$i]) && $item_qty[$i] !=0)
					{
						$so_itemdata=array(
							'so_items_sales_id'=>$so_id,
							'so_items_item_id'=>$item_id[$i],
							//'so_items_division_id'=>$multiple_item_division_id[$i],
							//'so_items_store_id'=>$multiple_item_store_id[$i],
							'so_items_code'=>$item_code[$i],
							'so_items_name'=>$item_name[$i],
							'so_items_model'=>$item_model[$i],
							'so_items_uom_id'=>$item_uom_id[$i],
							'so_items_priceperunit'=>$item_priceperunit[$i],
							'so_items_mrp'=>$item_mrp[$i],
							'so_items_qty'=>$item_qty[$i],
							'so_inv_id'=>$item_inv_id[$i],
							'so_items_batch_no'=>$item_batch_no[$i],
							'so_items_inv_qty'=>$item_inv_qty[$i],							
							'so_items_ord_qty'=>$item_qty[$i],
							'so_items_gross_amount'=>$item_gross_amount[$i],
							'so_items_gross_amount_with_discount'=>$item_gross_amount_with_disc[$i],
							'so_items_incentive_rate'=>$item_incentive_rate[$i],
							'so_items_incentive_total'=>$item_incentive_total[$i],
							'so_items_gst'=>$item_cgst[$i],
							'so_items_gst_amt'=>$item_cgst_amt[$i],
							'so_items_sgst'=>$item_sgst[$i],
							'so_items_sgst_amt'=>$item_sgst_amt[$i],
							//'so_items_igst'=>$item_igst[$i],
							//'so_items_igst_amt'=>$item_igst_amt[$i],
							//'so_items_hsn_sac'=>$item_hsn[$i],
							
							'so_items_tax_percent'=>$item_tax_percent[$i],
							'so_items_tax_amount'=>$item_tax_amount[$i],
							
							'so_items_net_amount'=>$item_net_amount[$i],
							);
							//echo "<pre>"; print_r($so_itemdata); exit;
						$this->salesordermodule->add_so_Item_details($so_itemdata);//** Add SalesOrder Item Details **//
					}
				}	
			}
			
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
			 $tax_group_damage_discount_amt=$this->security->xss_clean($this->input->post('tax_group_damage_discount_amount'));
			 
			 if(!empty($tax_group_length))
			 {
				 
				for($i=0; $i<=$tax_group_length; $i++)
				{
					if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]) && !empty($tax_group_tax_amount[$i]) && !empty($tax_group_tax_percentage[$i])  && !empty($tax_group_with_tax_gross_amount[$i]))
					{
				  		$tax_group=array(
								'tax_group_sales_order_id'=>$so_id,
								'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
								'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
								//'tax_group_total_flat_amount'=>$tax_group_flat_amount[$i],
								//'tax_group_without_cash_disocunt_amount'=>$tax_group_without_cash_discount_amount[$i],
								//'tax_group_cash_disocunt_amount'=>$tax_group_cash_discount_amount[$i],
								'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
								'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
								'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
								//'tax_group_damage_discount_amt'=>$tax_group_damage_discount_amt[$i],
								'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
								'tax_group_incentive_amount'=>$tax_group_incentive_amount[$i],
				  				);
						$this->salesordermodule->add_tax_group($tax_group);//** Add Tax Group **//
					}
				}
			 }
			 
			//** Sales Order Item Total **//
			$total_gross_amount=$this->security->xss_clean($this->input->post('total_gross_amount'));
			$total_tax_percentage=$this->security->xss_clean($this->input->post('total_tax_percentage'));
			$total_tax_amount=$this->security->xss_clean($this->input->post('total_tax_amount'));
			$total_disocunts_percentage=$this->security->xss_clean($this->input->post('total_disocunts_percentage'));
			$total_disocunts_amount=$this->security->xss_clean($this->input->post('total_disocunts_amount'));
			$total_shipping_charges=$this->security->xss_clean($this->input->post('total_shipping_charges'));
			$total_shipping_tax=$this->security->xss_clean($this->input->post('total_shipping_tax'));
			$total_adjustments=$this->security->xss_clean($this->input->post('total_adjustments'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
			$USR_REDEEM_AMT = $this->security->xss_clean($this->input->post('cus_wallet_debit_amt'));
			//echo $USR_REDEEM_AMT; exit;
			$so_totalprice=array(
					'so_total_sales_id'=>$so_id,
					'sales_order_customer_code'=>$so_customer_code,
					'so_total_gross_amount'=>$total_gross_amount,
					'so_total_tax_amount'=>$total_tax_amount,
					'so_total_tax_percentage'=>$total_tax_percentage,
					'so_total_discount_percentage'=>$total_disocunts_percentage,
					'so_total_discount_amount'=>$total_disocunts_amount,
					'so_total_shipping_charges'=>$total_shipping_charges,
					'so_total_shipping_tax'=>$total_shipping_tax,
					'so_adjustment'=>$total_adjustments,
					'so_grand_total'=>$grand_total,
					
					'total_quantity_items'=>$total_quantity_items,
					'total_gross_amount_items'=>$total_gross_amount_items,
					'total_tax_percent_items'=>$total_tax_percent_items,
					'total_tax_amount_items'=>$total_tax_amount_items,
					'total_discount_percent_items'=>$total_discount_percent_items,
					'total_discount_amount_items'=>$total_discount_amount_items,
					'total_net_amount_items'=>$total_net_amount_items,
					'total_incentive_amount'=>$total_incentive_amount,
					'total_redeem_amount'=>$USR_REDEEM_AMT,
					'sales_order_add_date'=>date('Y-m-d'),
					);
			$this->salesordermodule->add_so_total_price($so_totalprice);//** Add Sales Order Item Total **//
						
			$this->session->set_flashdata('message', 'Sales Order Added Successfully');
			redirect('salesorder/orderform_list');
		}
		else
		{
			//$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
			$this->title = "Sales Order";
			$this->keywords = "Sales Order";
			$this->data['product_list'] = $this->sales_popup_model->autosearch_order_form('1','1','1','1','1','1','1','1');//** Get All Product Based on customers **//
			$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
			$this->_render('pages/salesorder/order_form');
		}
	}
	
	
	public function get_customer_incentive_amount()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$so_customer_id=$this->security->xss_clean($this->input->post('so_customer_id'));
		
		
				
		$result = $this->salesordermodule->get_cus_incentive_amount($so_customer_id);
		
		$cus_wallet = $result->incentive_amt - $result->redeem_amt;
		
			echo $cus_wallet; exit;
		
	}
	
	public function checksalesorder()
	{
		$item_qty = $_POST['item_qty'];
		$item_id= $_POST['item_id'];
		$item_code= $_POST['item_code'];
		$price_book_id= $_POST['pricebook_id'];
		$customer_id= $_POST['customer_id'];
		
		if($price_book_id!='')
		{
			$pricebook_scheme = $this->salesordermodule->getpricebook_scheme($price_book_id);

			foreach ($pricebook_scheme as $SCH)
			{ 
				$data['scheme_id'] = $SCH['scheme_id'];
				$scheme_id = $SCH['scheme_id'];
				
				if($scheme_id!='')
				{
					//$freeitem = $this->salesordermodule->getfreeitem($scheme_id,$item_id);
					$to_date = date("Y-m-d");
					$freeitem = $this->salesordermodule->getfreeitem($scheme_id,$item_id,$to_date);
					if(count($freeitem) > 0)
					{
						foreach ($freeitem as $FRM)
						{
							$scheme_qty = $FRM['scheme_price_purchase_qty'];
							$free_qty = $FRM['scheme_price_free_item_qty'];
							$free_qty_name = $FRM['scheme_price_free_item'];
							
							if($item_qty >= $scheme_qty)
							{
								 $free_qty_total = (int)($item_qty / $scheme_qty) * $free_qty;
								 $data['free_qty_total'] = $free_qty_total;
								 $data['free_qty_name'] = $free_qty_name;
							}
							else
							{
								$data['free_qty_total'] = '0.00';
								$data['free_qty_name'] = '-';
							}
						}
					}
					else
					{
						$data['free_qty_total'] = '0.00';
						$data['free_qty_name'] = '-';
					}
				}
				else
				{
					$data['free_qty_total'] = '0.00';
					$data['free_qty_name'] = '-';
				}
				
			}
			
		}
		echo json_encode($data);
	}


	//** Update Sales Order Status **//
	
	public function deletesalesorder($id,$status)
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
		$sodata = array(
					'sales_order_active_status' => $changeStatus,
					'sales_order_update_date' => date('Y-m-d'),
					'sales_order_updated_by'=>$sess_user,
					);			
		$this->salesordermodule->update_so_status($sodata,$id);
		$this->session->set_flashdata('message', 'Sales Order Deleted Successfully');
		redirect('salesorder/salesorder_list');
	}
	
	//** Edit Sales Order **//
	
	public function edit_salesorder($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_user_type=$sessionData['user_type'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		//echo "<pre>"; print_r($sessionData); exit;
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		$this->data["salesman"] = $this->salesordermodule->get_all_salesman();//** Get All Sales Man **//
		$this->data['country'] = $this->organizationsmodel->get_country();//** Get Country **//
		$this->data['region'] = $this->customermodule->get_region();//** Get region **//
		$this->data['zone'] = $this->customermodule->get_zone();//** Get zone **//
		$this->data['area'] = $this->customermodule->get_area();//** Get area **//
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
		
		if(isset($_POST['save']))
		{
			//** Sales Order Details **//
			$so_so_no = $this->security->xss_clean($this->input->post('so_no'));
			$so_no_id = $this->security->xss_clean($this->input->post('so_no_id'));
			$so_sales_quat_no = $this->security->xss_clean($this->input->post('so_quote_no'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			$so_referral_id = $this->security->xss_clean($this->input->post('sales_man'));
			$so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$so_customer_mobile = $this->security->xss_clean($this->input->post('so_customer_mobile'));
			$purchse_ord_req_date = $this->security->xss_clean($this->input->post('purchse_ord_req_date'));
			
				if($this->input->post('purchse_ord_req_date') != "")
				{
					$purchse_ord_req_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_req_date')));
				}
				else
				{
					$purchse_ord_req_date = "0000-00-00";
				}
			
			$purchse_ord_valid = $this->security->xss_clean($this->input->post('purchse_ord_valid'));
			
				if($this->input->post('purchse_ord_valid') != "")
				{
					$purchse_ord_valid = date('Y-m-d', strtotime($this->input->post('purchse_ord_valid')));
				}
				else
				{
					$purchse_ord_valid = "0000-00-00";
				}
				
			$purchase_invo_po_date = $this->security->xss_clean($this->input->post('purchase_invo_po_date'));

			if($this->input->post('purchase_invo_po_date') != "")
			{
				$purchase_invo_po_date = date('Y-m-d', strtotime($this->input->post('purchase_invo_po_date')));
			}
			else
			{
				$purchase_invo_po_date = "0000-00-00";
			}
				
			$pricebook_id = $this->security->xss_clean($this->input->post('pricebook_id'));
			$customer_discount = $this->security->xss_clean($this->input->post('customer_discount'));
			$customer_cash_discount = $this->security->xss_clean($this->input->post('customer_cash_discount'));
			$so_customer_code = $this->security->xss_clean($this->input->post('so_customer_code'));
			$customer_region = $this->security->xss_clean($this->input->post('customer_region'));
			$customer_zone = $this->security->xss_clean($this->input->post('customer_zone'));
			$customer_area = $this->security->xss_clean($this->input->post('customer_area'));
			$so_branch_off = $this->security->xss_clean($this->input->post('so_branch_off'));
			$so_status = $this->security->xss_clean($this->input->post('so_status'));
			$transport_mode = $this->security->xss_clean($this->input->post('transport_mode'));
			$cus_inc_amt = $this->security->xss_clean($this->input->post('cus_inc_amt'));
			
			
			
			$purchse_ord_payment_mode = $this->security->xss_clean($this->input->post('purchse_ord_payment_mode'));
			$purchse_ord_transac_date= $this->security->xss_clean($this->input->post('purchse_ord_transac_date'));
			$purchse_ord_terms_conditions= $this->security->xss_clean($this->input->post('purchse_ord_terms_conditions'));
			$purchse_ord_payment_terms = $this->security->xss_clean($this->input->post('purchse_ord_payment_terms'));
		 
			//** SalesOrder Item Details **//
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			
			$item_inv_id = $this->security->xss_clean($this->input->post('item_inv_id'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$item_inv_qty = $this->security->xss_clean($this->input->post('item_inv_qty'));
			
			
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_incentive_rate = $this->security->xss_clean($this->input->post('item_incentive_rate'));
			$item_incentive_total = $this->security->xss_clean($this->input->post('item_incentive_total'));
			$item_qty_free = $this->security->xss_clean($this->input->post('item_qty_free'));
			$free_qty_name = $this->security->xss_clean($this->input->post('free_qty_name'));
			
			$scheme_id = $this->security->xss_clean($this->input->post('scheme_id'));
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_gross_amount_with_disc = $this->security->xss_clean($this->input->post('item_gross_amount_with_disc'));
			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_serv_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_cgst_amt = $this->security->xss_clean($this->input->post('item_cgst_amount'));
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst'));
			$item_sgst_amt = $this->security->xss_clean($this->input->post('item_sgst_amount'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_igst_amt = $this->security->xss_clean($this->input->post('item_igst_amount'));
			$item_hsn  = $this->security->xss_clean($this->input->post('item_hsn_value'));
			
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_flat_discount = $this->security->xss_clean($this->input->post('item_flat_discount'));

			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
		 
		    $total_quantity_items = $this->security->xss_clean($this->input->post('total_quantity_items'));
			$total_gross_amount_items = $this->security->xss_clean($this->input->post('total_gross_amount_items'));
			$total_tax_percent_items = $this->security->xss_clean($this->input->post('total_tax_percent_items'));
			$total_tax_amount_items = $this->security->xss_clean($this->input->post('total_tax_amount_items'));
			$total_discount_percent_items = $this->security->xss_clean($this->input->post('total_discount_percent_items'));
			$total_discount_amount_items = $this->security->xss_clean($this->input->post('total_discount_amount_items'));
			$total_net_amount_items = $this->security->xss_clean($this->input->post('total_net_amount_items'));
			$item_damage_discount_perc = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			$item_damage_discount_amount = $this->security->xss_clean($this->input->post('item_damage_discount_amount'));
			
			$material_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$material_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
			$multiple_item_division_id = $this->security->xss_clean($this->input->post('multiple_item_division_id'));
			$multiple_item_store_id = $this->security->xss_clean($this->input->post('multiple_item_store_id'));
			$so_items_id = $this->security->xss_clean($this->input->post('so_items_id'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
					
			$tax_group_incentive_amount = $this->security->xss_clean($this->input->post('tax_group_total_incentive_amount'));
			$total_incentive_amount = $this->security->xss_clean($this->input->post('total_incentive_amount'));
			//echo "<pre>"; print_r($total_incentive_amount); exit;
			$USR_REDEEM_AMT = $this->security->xss_clean($this->input->post('cus_wallet_debit_amt'));
			
			$connection = mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);
			//$connection = mysqli_connect("localhost", "neoindzg_agro", "agro*123$", "neoindzg_agro_ecomm");
			
			$sql_wallet_update = "UPDATE `vsoft_incentive_details` SET `USR_REDEEM_AMT`='$USR_REDEEM_AMT' where SO_ID= '$so_no_id' ";	
			
			//echo $sql_wallet_update; exit;
			

			mysqli_query($connection, $sql_wallet_update);
		
		
		
		 	$so_data=array(
					'sales_order_number'=>$so_so_no,
					'sales_order_sales_quatation_code'=>$so_sales_quat_no,
					'sales_order_company_id' =>$sess_company,
					'sales_order_customer_id' =>$so_customer_id,
					'sales_order_incentive_amt' =>$cus_inc_amt,
					'sales_order_item_division_id' =>$material_store_division_id,
					'sales_order_item_store_id' =>$material_store_id,
					'sales_order_po_date'=>$purchase_invo_po_date,
					'sales_order_customer_discount_percentage'=>$customer_discount,
					'sales_order_customer_cash_discount'=>$customer_cash_discount,
					'sales_order_customer_price_book_id'=>$pricebook_id,
					'sales_order_referral_id' =>$so_referral_id,
					'sales_order_customer_code'=>$so_customer_code,
					'sales_order_customer_name'=>$so_customer_name ,
					'sales_order_requested_date'=>$purchse_ord_req_date,
					'sales_order_valid_till'=>$purchse_ord_valid,
					'sales_order_region_id'=>$customer_region,
					'sales_order_zone_id'=>$customer_zone,
					'sales_order_area_id'=>$customer_area,
					'sales_order_branch_office'=>$so_branch_off ,
					'sales_order_transport_mode'=>$transport_mode,
					'sales_order_status'=> $so_status ,
					'sales_order_payment_mode'=>$purchse_ord_payment_mode ,
					'sales_order_transaction_date'=>date("Y-m-d", strtotime($purchse_ord_transac_date)),
					'sales_order_termsandconditions'=>$purchse_ord_terms_conditions,
					'sales_order_payment_terms'=>$purchse_ord_payment_terms,
					'sales_order_active_status'=>'active',
					'sales_order_update_date'=>date('Y-m-d h:i:s'),
					'sales_order_created_by'=>$sess_user,
					'sales_order_updated_by'=>$sess_user,
					);
					//echo "<pre>";print_r($so_data); exit;
			$this->salesordermodule->update_so_details($so_data, $id);//** Update Sales Order Details **//
		 	
			
			
			
			$this->salesordermodule->delete_sales_order_items($id);//** Delete Sales Order Items In Grid **//
			if($so_status == 'approved')
							{
								
							
								  
								  //SMS Integration
			//$so_customer_mobile = "9942354602";
			//For Sms---------------------------------------------------------------------------------
			$strmsg = "Hi ".$so_customer_code.",";
			$strmsg .= "Thank you for your shopping with us!!"." ";
			$strmsg .= "Bill No: ".$so_so_no." ";
			$strmsg .= "Amount : ".$grand_total." ";
			$strmsg .= "Visit :http://agroreforming.com/ecomm"." ";
			
			//echo $strmsg; exit;
			
		/*	 $url='http://smsserver9.creativepoint.in/api.php?username=agro&password=605649&to='.$so_customer_mobile.'&from=INAGRO&message='.urlencode($strmsg).'';
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
				  'user_id' => strtoupper($so_customer_code),
				  'phone_no' => $so_customer_mobile,
				  'message' => $strmsg,
				  'created_date' => date('Y-m-d'),
				  'response' => $return_val,
				  );
			
			$this->genelogytree->insertSMSDetails($sms_details); 
			*/
			
		$transaction_add_date = date('Y-m-d');
		$incentive_amt = $total_incentive_amount;
		$incentive_amt_ten_percent = $total_incentive_amount / 3;
		$cus_incentive = ($incentive_amt_ten_percent * 2) ;
		
		$incentive_amt_three_percent = ($incentive_amt_ten_percent / 10) * 3;
		$incentive_amt_seven_percent = ($incentive_amt_ten_percent / 10) * 7;
		
			$COM_SO_ID = $id;
			$COM_SO_NO = $so_so_no;
			$COM_USR_LEVEL_VALUE = '';
			$COM_TOTAL_INCENTIVE_AMT = $total_incentive_amount;
			
			$COM_OFCR_ID =  1;
			$COM_OFCR_NAME = 'Agro Green Reforming Organization';
			$COM_OFCR_USR_VALUE =  'AGROPRO00007';
			$COM_OFCR_TRE_SPNCR_ID = 'AGRO_7';
			$COM_INCENTIVE_PERCENT_SEVEN = 7;
			$COM_USR_INCENTIVE_AMT_SEVEN = $incentive_amt_seven_percent;
			
			//echo $sess_user_type; exit;
			if($sess_user_type == 'stock_point' )
			{
				$sQl_sp = ('select OFCR_ID, OFCR_USR_VALUE, OFCR_FST_NME, OFCR_LST_NME from vsoft_officer where OFCR_ADD_USR_ID = '.$sess_user);
				$Qry = mysqli_query($connection, $sQl_sp);
				$row = mysqli_fetch_object($Qry);
				//echo $row->OFCR_ID; exit;
			$SP_OFCR_ID =  $row->OFCR_ID;
			$SP_OFCR_NAME = $row->OFCR_FST_NME." ".$row->OFCR_LST_NME;
			$SP_OFCR_USR_VALUE =  $row->OFCR_USR_VALUE;
			$SP_OFCR_TRE_SPNCR_ID = 'AGRO_3';
			$SP_INCENTIVE_PERCENT_THREE = 3;
			$SP_USR_INCENTIVE_AMT_THREE = $incentive_amt_three_percent;
			}
			else
			{
			$SP_OFCR_ID =  1;
			$SP_OFCR_NAME = 'Agro Green Reforming Organization';
			$SP_OFCR_USR_VALUE =  'AGROPRO00007';
			$SP_OFCR_TRE_SPNCR_ID = 'AGRO_3';
			$SP_INCENTIVE_PERCENT_THREE = 3;
			$SP_USR_INCENTIVE_AMT_THREE = $incentive_amt_three_percent;
			}
			
		$Validcustomer= $this->salesordermodule->valid_customer($COM_SO_ID, $COM_OFCR_TRE_SPNCR_ID);
		if($Validcustomer == 0)
		{
		$sql_three_percent = "INSERT INTO vsoft_incentive_details (SO_ID,SO_NO,OFCR_ID,OFCR_NAME,USR_LEVEL_VALUE,OFCR_USR_VALUE,OFCR_TRE_SPNCR_ID,INCENTIVE_PERCENT,TOTAL_INCENTIVE_AMT,USR_INCENTIVE_AMT, PAYMENT_STATUS,CREATED_DATE) VALUES ('$COM_SO_ID','$COM_SO_NO','$COM_OFCR_ID','$COM_OFCR_NAME','$COM_USR_LEVEL_VALUE','$COM_OFCR_USR_VALUE','$COM_OFCR_TRE_SPNCR_ID','$COM_INCENTIVE_PERCENT_SEVEN','$COM_TOTAL_INCENTIVE_AMT','$COM_USR_INCENTIVE_AMT_SEVEN','7', '$transaction_add_date')";	

		mysqli_query($connection, $sql_three_percent);
		}
		
		$Validcustomer1= $this->salesordermodule->valid_customer($COM_SO_ID, $SP_OFCR_TRE_SPNCR_ID);
		if($Validcustomer1 == 0)
		{
		$sql_seven_percent = "INSERT INTO vsoft_incentive_details (SO_ID,SO_NO,OFCR_ID,OFCR_NAME,USR_LEVEL_VALUE,OFCR_USR_VALUE,OFCR_TRE_SPNCR_ID,INCENTIVE_PERCENT,TOTAL_INCENTIVE_AMT
,USR_INCENTIVE_AMT, PAYMENT_STATUS,CREATED_DATE) VALUES ('$COM_SO_ID','$COM_SO_NO','$SP_OFCR_ID','$SP_OFCR_NAME','$COM_USR_LEVEL_VALUE','$SP_OFCR_USR_VALUE','$SP_OFCR_TRE_SPNCR_ID','$SP_INCENTIVE_PERCENT_THREE','$COM_TOTAL_INCENTIVE_AMT','$SP_USR_INCENTIVE_AMT_THREE','7', '$transaction_add_date')";	
		//echo $sql_seven_percent; exit;
		mysqli_query($connection, $sql_seven_percent);
		}
        $default_value =  $so_customer_code;
        $data          = array();
		
		if($so_customer_id != 1 )
			{
		$total_percent = 100;
        for ($index = 0; $index < 11; $index++)
        {
            $sql     = "  SELECT concat(o.OFCR_FST_NME,' ',o.OFCR_LST_NME) AS NAME,o.OFCR_ID,o.OFCR_USR_VALUE,s.OFCR_TRE_SPNCR_ID
                            FROM vsoft_officer o
                            JOIN vsoft_officer_tree s ON s.OFCR_TRE_USR_ID=o.OFCR_USR_VALUE
                            WHERE s.OFCR_TRE_USR_ID='" . $default_value . "'";
							//echo $sql; exit;
			$result = mysqli_query($connection,$sql);
			$percent = 0;
            foreach ($result as $key => $value)
            {				
				if($index == 1) {$percent = 25; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 2) {$percent = 20; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 3) {$percent = 15; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 4) {$percent = 10; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 5) {$percent = 5; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 6) {$percent = 5; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 7) {$percent = 5; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 8) {$percent = 5; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 9) {$percent = 5; $incentive_amt = ($cus_incentive * $percent) / 100; }
				else if($index == 10) {$percent = 5; $incentive_amt = ($cus_incentive * $percent) / 100;}
						
			   $data[$index]['Level']     		   		 = $index ;
               $data[$index]['NAME']         		     = $value["NAME"];
               $data[$index]['OFCR_ID']        	   		 = $value["OFCR_ID"];
               $data[$index]['OFCR_USR_VALUE'] 			 = $value["OFCR_USR_VALUE"];
			   $data[$index]['OFCR_TRE_SPNCR_ID']		 = $value["OFCR_TRE_SPNCR_ID"];
			   $data[$index]['Percent']     		     = $percent ;
			   $data[$index]['Incentive_amt']     		 = $incentive_amt ;
			   $data[$index]['Remaining_Percent']        = $total_percent - $percent ;
               $default_value                 		 	 = $value["OFCR_TRE_SPNCR_ID"];
		       $total_percent       					 = $total_percent - $percent ;
				//if($value["OFCR_TRE_SPNCR_ID"] ==0) {$data[$index]['Percent'] = $percent ;} else {};
            }
			
			
$percent++;
        }
			unset($data[0]);
        // echo "<pre>";
       // print_r($data);
       // echo "</pre>";
	   $data_count = count($data);
	   //echo $data_count; exit;
	   for($x = 1; $x < $data_count+1; $x++)
	   {
			$SO_ID = $id;
			$SO_NO = $so_so_no;
			$OFCR_ID = $data[$x]['OFCR_ID'];
			$OFCR_NAME = $data[$x]['NAME'];
			$USR_LEVEL_VALUE = $data[$x]['Level'];
			$OFCR_USR_VALUE = $data[$x]['OFCR_USR_VALUE'];
			$OFCR_TRE_SPNCR_ID = $data[$x]['OFCR_TRE_SPNCR_ID'];
			$INCENTIVE_PERCENT = $data[$x]['Percent'];
			$TOTAL_INCENTIVE_AMT = $total_incentive_amount;
			$USR_INCENTIVE_AMT = $data[$x]['Incentive_amt'];
			
			$Remaining_Percent = $data[$x]['Remaining_Percent'];
			
		//echo "<pre>";
       // print_r($OFCR_USR_VALUE);
       // echo "</pre>";	
		$Validcustomer3= $this->salesordermodule->valid_company($COM_SO_ID, $OFCR_ID);
		if($Validcustomer3 == 0)
		{	   
		$sql = "INSERT INTO vsoft_incentive_details (SO_ID,SO_NO,OFCR_ID,OFCR_NAME,USR_LEVEL_VALUE,OFCR_USR_VALUE,OFCR_TRE_SPNCR_ID,INCENTIVE_PERCENT,TOTAL_INCENTIVE_AMT,USR_INCENTIVE_AMT, PAYMENT_STATUS,CREATED_DATE) VALUES ('$SO_ID','$SO_NO','$OFCR_ID','$OFCR_NAME','$USR_LEVEL_VALUE','$OFCR_USR_VALUE','$OFCR_TRE_SPNCR_ID','$INCENTIVE_PERCENT','$TOTAL_INCENTIVE_AMT','$USR_INCENTIVE_AMT','7', '$transaction_add_date')";	

		mysqli_query($connection, $sql);
		//echo $sql; exit;		
		}
	   }
	   $INCENTIVE_PERCENT_AGRO = $INCENTIVE_PERCENT + $Remaining_Percent;
	   $cus_incentive_agro = ($incentive_amt_ten_percent * 2);
	   $USR_INCENTIVE_AMT_AGRO = ($cus_incentive_agro *  $INCENTIVE_PERCENT_AGRO) / 100;
	   //echo $INCENTIVE_PERCENT_AGRO;
	   //echo $USR_INCENTIVE_AMT_AGRO; exit;
	   $sql_agro = "UPDATE vsoft_incentive_details  SET INCENTIVE_PERCENT= '$INCENTIVE_PERCENT_AGRO', USR_INCENTIVE_AMT = '$USR_INCENTIVE_AMT_AGRO'    WHERE OFCR_TRE_SPNCR_ID= 'AGRO' and  SO_ID= '$SO_ID' ";
	   mysqli_query($connection, $sql_agro);
		//echo $sql_agro; exit;
			}
			else
			{
				$incentive_20_percent = $total_incentive_amount / 3;
				$cus_incentive = ($incentive_amt_ten_percent * 2) ;
				$SPNCR_ID_ADMIN = 'AGRO_20';
				
				$incentive_amt_twenty_percent = ($incentive_20_percent / 10) * 20;
				
				$Validcustomer4= $this->salesordermodule->valid_customer($COM_SO_ID, $SPNCR_ID_ADMIN);
		if($Validcustomer4 == 0)
		{
			
				$sql_20_percent = "INSERT INTO vsoft_incentive_details (SO_ID,SO_NO,OFCR_ID,OFCR_NAME,USR_LEVEL_VALUE,OFCR_USR_VALUE,OFCR_TRE_SPNCR_ID,INCENTIVE_PERCENT,TOTAL_INCENTIVE_AMT,USR_INCENTIVE_AMT, PAYMENT_STATUS,CREATED_DATE) VALUES ('$COM_SO_ID','$COM_SO_NO','$COM_OFCR_ID','$COM_OFCR_NAME','$COM_USR_LEVEL_VALUE','$COM_OFCR_USR_VALUE','$SPNCR_ID_ADMIN','20','$COM_TOTAL_INCENTIVE_AMT','$incentive_amt_twenty_percent','7', '$transaction_add_date')";
		//echo $sql_20_percent; exit;
		mysqli_query($connection, $sql_20_percent);
		
		}
			}
		//exit;
			
							}
			if(!empty($item_id))
		 	{
				$result=count($item_id);
				for($i=1; $i<=$result; $i++)
				{
					if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
					{
						$so_itemdata=array(
							'so_items_sales_id'=>$id,
							'so_items_item_id'=>$item_id[$i],
							'so_items_division_id'=>$multiple_item_division_id[$i],
							'so_items_store_id'=>$multiple_item_store_id[$i],
							'so_items_code'=>$item_code[$i],
							'so_items_name'=>$item_name[$i],
							'so_items_model'=>$item_model[$i],
							'so_items_uom_id'=>$item_uom_id[$i],
							'so_items_mrp'=>$item_mrp[$i],
							'so_items_priceperunit'=>$item_priceperunit[$i],
							'so_items_qty'=>$item_qty[$i],
							'so_items_incentive_rate'=>$item_incentive_rate[$i],
							'so_items_incentive_total'=>$item_incentive_total[$i],
							'so_inv_id'=>$item_inv_id[$i],
							'so_items_batch_no'=>$item_batch_no[$i],
							'so_items_inv_qty'=>$item_inv_qty[$i],							
							'so_items_ord_qty'=>$item_qty[$i],
							'so_items_gross_amount'=>$item_gross_amount[$i],
							'so_items_gross_amount_with_discount'=>$item_gross_amount_with_disc[$i],
							
							'so_items_gst'=>$item_cgst[$i],
							'so_items_gst_amt'=>$item_cgst_amt[$i],
							'so_items_sgst'=>$item_sgst[$i],
							'so_items_sgst_amt'=>$item_sgst_amt[$i],
							'so_items_igst'=>$item_igst[$i],
							'so_items_igst_amt'=>$item_igst_amt[$i],
							'so_items_hsn_sac'=>$item_hsn[$i],
							
							'so_items_tax_percent'=>$item_tax_percent[$i],
							'so_items_tax_amount'=>$item_tax_amount[$i],
							'so_items_discounts_percentage'=>$item_discount_percent[$i],
							'so_items_discounts_amount'=>$item_discount_amount[$i],
							
							//'so_items_net_amount'=>$item_net_amount[$i],
							);
						$this->salesordermodule->update_so_Item_details($so_itemdata,$id,$so_items_id[$i]);//** Update SalesOrder Item Details **//
						
						if($so_status == 'approved')
							{
								

							$st_cod= $this->salesordermodule->getstock_item_details($item_inv_id[$i]);	
							$stock_qty=$st_cod->inventory_qty;
							$issued_qty=$st_cod->inventory_issued_qty;
							$rec_qty = $item_qty[$i];
							$cur_stock=$stock_qty - $rec_qty;
							$issued_qty_total= $issued_qty + $rec_qty;

							$cur_stock_items=array(
							'inventory_qty'=>$cur_stock,
							'inventory_issued_qty'=>$issued_qty_total,
							'inventory_update_date'=>date('Y-m-d'),
							);
							
							$this->salesordermodule->update_cur_stock($cur_stock_items,$item_inv_id[$i]);
								  //echo "<pre>"; print_r($cur_stock_items); exit;
							}
						
							
					}
				}
					
			}
			
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
			 $tax_group_damage_discount_amt=$this->security->xss_clean($this->input->post('tax_group_damage_discount_amount'));
			 
			 if(!empty($tax_group_length))
			 {
				 $this->salesordermodule->delete_tax_group($id);
				 
				for($i=0; $i<=$tax_group_length; $i++)
				{
					if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]) && !empty($tax_group_tax_amount[$i]) && !empty($tax_group_tax_percentage[$i])  && !empty($tax_group_with_tax_gross_amount[$i]))
					{
				  		$tax_group=array(
								'tax_group_sales_order_id'=>$id,
								'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
								'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
								'tax_group_total_flat_amount'=>$tax_group_flat_amount[$i],
								'tax_group_without_cash_disocunt_amount'=>$tax_group_without_cash_discount_amount[$i],
								'tax_group_cash_disocunt_amount'=>$tax_group_cash_discount_amount[$i],
								'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
								'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
								'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
								'tax_group_damage_discount_amt'=>$tax_group_damage_discount_amt[$i],
								'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
								'tax_group_incentive_amount'=>$tax_group_incentive_amount[$i],
				  				);
						$this->salesordermodule->update_tax_group($tax_group);//** Add Tax Group **//
					}
				}
			 }
			 
			 
			$total_gross_amount=$this->security->xss_clean($this->input->post('total_gross_amount'));
			$total_tax_percentage=$this->security->xss_clean($this->input->post('total_tax_percentage'));
			$total_tax_amount=$this->security->xss_clean($this->input->post('total_tax_amount'));
			$total_disocunts_percentage=$this->security->xss_clean($this->input->post('total_disocunts_percentage'));
			$total_disocunts_amount=$this->security->xss_clean($this->input->post('total_disocunts_amount'));
			$total_shipping_charges=$this->security->xss_clean($this->input->post('total_shipping_charges'));
			$total_shipping_tax=$this->security->xss_clean($this->input->post('total_shipping_tax'));
			$total_adjustments=$this->security->xss_clean($this->input->post('total_adjustments'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
			$USR_REDEEM_AMT = $this->security->xss_clean($this->input->post('cus_wallet_debit_amt'));
			
			$so_totalprice=array(
					'so_total_sales_id'=>$id,
					'sales_order_customer_code'=>$so_customer_code,
					'so_total_gross_amount'=>$total_gross_amount,
					'so_total_tax_amount'=>$total_tax_amount,
					'so_total_tax_percentage'=>$total_tax_percentage,
					'so_total_discount_percentage'=>$total_disocunts_percentage,
					'so_total_discount_amount'=>$total_disocunts_amount,
					'so_total_shipping_charges'=>$total_shipping_charges,
					'so_total_shipping_tax'=>$total_shipping_tax,
					'so_adjustment'=>$total_adjustments,
					'so_grand_total'=>$grand_total,
					
					'total_quantity_items'=>$total_quantity_items,
					'total_gross_amount_items'=>$total_gross_amount_items,
					'total_tax_percent_items'=>$total_tax_percent_items,
					'total_tax_amount_items'=>$total_tax_amount_items,
					'total_discount_percent_items'=>$total_discount_percent_items,
					'total_discount_amount_items'=>$total_discount_amount_items,
					'total_net_amount_items'=>$total_net_amount_items,
					'total_incentive_amount'=>$total_incentive_amount,
					'total_redeem_amount'=>$USR_REDEEM_AMT,
					);
			 $this->salesordermodule->update_so_total_price($so_totalprice,$id);//** Update Sales Order Item Total **//
			 $this->session->set_flashdata('message', 'Sales Order Updated Successfully');
			 redirect('salesorder/salesorder_list');
		}
		else
		{	
			$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
			$so_customer_id = $this->data['so_data']->sales_order_customer_id;
			
			$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);//** Get Single Sales Order Billing  Details **//
			$this->data['so_ship'] = $this->salesordermodule->getsingle_so_ship($so_customer_id);//** Get Single Sales Order Shipping Details **//
			
			$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);//** Get Single Sales Order Item Details **//
			$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);//** Get Single Sales Order Item Total Details **//
			
			$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
			
			$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);//** Get All SalesOrder Item Details **//
			$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
			$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
			
			$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details 
			$this->data["store"] = $this->productmodule->get_all_store(); //** Get All store_division Details 
			
			$this->title = "Sales Order";
			$this->keywords = "Sales Order";
			$this->_render('pages/salesorder/editsalesorder');
		}
	}
	
	
	public function edit_orderform($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_user_type=$sessionData['user_type'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		//echo "<pre>"; print_r($sessionData); exit;
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		$this->data["salesman"] = $this->salesordermodule->get_all_salesman();//** Get All Sales Man **//
		$this->data['country'] = $this->organizationsmodel->get_country();//** Get Country **//
		$this->data['region'] = $this->customermodule->get_region();//** Get region **//
		$this->data['zone'] = $this->customermodule->get_zone();//** Get zone **//
		$this->data['area'] = $this->customermodule->get_area();//** Get area **//
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
		
		if(isset($_POST['save']))
		{
			//** Sales Order Details **//
			$so_so_no = $this->security->xss_clean($this->input->post('so_no'));
			$so_no_id = $this->security->xss_clean($this->input->post('so_no_id'));
			$so_sales_quat_no = $this->security->xss_clean($this->input->post('so_quote_no'));
			$so_customer_id = $this->security->xss_clean($this->input->post('so_customer_id'));
			$so_referral_id = $this->security->xss_clean($this->input->post('sales_man'));
			$so_customer_name = $this->security->xss_clean($this->input->post('so_customer_name'));
			$so_customer_mobile = $this->security->xss_clean($this->input->post('so_customer_mobile'));
			$purchse_ord_req_date = $this->security->xss_clean($this->input->post('purchse_ord_req_date'));
			
				if($this->input->post('purchse_ord_req_date') != "")
				{
					$purchse_ord_req_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_req_date')));
				}
				else
				{
					$purchse_ord_req_date = "0000-00-00";
				}
			
			$purchse_ord_valid = $this->security->xss_clean($this->input->post('purchse_ord_valid'));
			
				if($this->input->post('purchse_ord_valid') != "")
				{
					$purchse_ord_valid = date('Y-m-d', strtotime($this->input->post('purchse_ord_valid')));
				}
				else
				{
					$purchse_ord_valid = "0000-00-00";
				}
				
			$purchase_invo_po_date = $this->security->xss_clean($this->input->post('purchase_invo_po_date'));

			if($this->input->post('purchase_invo_po_date') != "")
			{
				$purchase_invo_po_date = date('Y-m-d', strtotime($this->input->post('purchase_invo_po_date')));
			}
			else
			{
				$purchase_invo_po_date = "0000-00-00";
			}
				
			$pricebook_id = $this->security->xss_clean($this->input->post('pricebook_id'));
			$customer_discount = $this->security->xss_clean($this->input->post('customer_discount'));
			$customer_cash_discount = $this->security->xss_clean($this->input->post('customer_cash_discount'));
			$so_customer_code = $this->security->xss_clean($this->input->post('so_customer_code'));
			$customer_region = $this->security->xss_clean($this->input->post('customer_region'));
			$customer_zone = $this->security->xss_clean($this->input->post('customer_zone'));
			$customer_area = $this->security->xss_clean($this->input->post('customer_area'));
			$so_branch_off = $this->security->xss_clean($this->input->post('so_branch_off'));
			$so_status = $this->security->xss_clean($this->input->post('so_status'));
			$transport_mode = $this->security->xss_clean($this->input->post('transport_mode'));
			$cus_inc_amt = $this->security->xss_clean($this->input->post('cus_inc_amt'));
			
			
			
			$purchse_ord_payment_mode = $this->security->xss_clean($this->input->post('purchse_ord_payment_mode'));
			$purchse_ord_transac_date= $this->security->xss_clean($this->input->post('purchse_ord_transac_date'));
			$purchse_ord_terms_conditions= $this->security->xss_clean($this->input->post('purchse_ord_terms_conditions'));
			$purchse_ord_payment_terms = $this->security->xss_clean($this->input->post('purchse_ord_payment_terms'));
		 
			//** SalesOrder Item Details **//
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			
			$item_inv_id = $this->security->xss_clean($this->input->post('item_inv_id'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$item_inv_qty = $this->security->xss_clean($this->input->post('item_inv_qty'));
			
			
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_incentive_rate = $this->security->xss_clean($this->input->post('item_incentive_rate'));
			$item_incentive_total = $this->security->xss_clean($this->input->post('item_incentive_total'));
			$item_qty_free = $this->security->xss_clean($this->input->post('item_qty_free'));
			$free_qty_name = $this->security->xss_clean($this->input->post('free_qty_name'));
			
			$scheme_id = $this->security->xss_clean($this->input->post('scheme_id'));
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_gross_amount_with_disc = $this->security->xss_clean($this->input->post('item_gross_amount_with_disc'));
			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_serv_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_cgst_amt = $this->security->xss_clean($this->input->post('item_cgst_amount'));
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst'));
			$item_sgst_amt = $this->security->xss_clean($this->input->post('item_sgst_amount'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_igst_amt = $this->security->xss_clean($this->input->post('item_igst_amount'));
			$item_hsn  = $this->security->xss_clean($this->input->post('item_hsn_value'));
			
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_flat_discount = $this->security->xss_clean($this->input->post('item_flat_discount'));

			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
		 
		    $total_quantity_items = $this->security->xss_clean($this->input->post('total_quantity_items'));
			$total_gross_amount_items = $this->security->xss_clean($this->input->post('total_gross_amount_items'));
			$total_tax_percent_items = $this->security->xss_clean($this->input->post('total_tax_percent_items'));
			$total_tax_amount_items = $this->security->xss_clean($this->input->post('total_tax_amount_items'));
			$total_discount_percent_items = $this->security->xss_clean($this->input->post('total_discount_percent_items'));
			$total_discount_amount_items = $this->security->xss_clean($this->input->post('total_discount_amount_items'));
			$total_net_amount_items = $this->security->xss_clean($this->input->post('total_net_amount_items'));
			$item_damage_discount_perc = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			$item_damage_discount_amount = $this->security->xss_clean($this->input->post('item_damage_discount_amount'));
			
			$material_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$material_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
			$multiple_item_division_id = $this->security->xss_clean($this->input->post('multiple_item_division_id'));
			$multiple_item_store_id = $this->security->xss_clean($this->input->post('multiple_item_store_id'));
			$so_items_id = $this->security->xss_clean($this->input->post('so_items_id'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
					
			$tax_group_incentive_amount = $this->security->xss_clean($this->input->post('tax_group_total_incentive_amount'));
			$total_incentive_amount = $this->security->xss_clean($this->input->post('total_incentive_amount'));
			//echo "<pre>"; print_r($total_incentive_amount); exit;
			$USR_REDEEM_AMT = $this->security->xss_clean($this->input->post('cus_wallet_debit_amt'));
			
			
		
		 	$so_data=array(
					'sales_order_number'=>$so_so_no,
					'sales_order_sales_quatation_code'=>$so_sales_quat_no,
					'sales_order_company_id' =>$sess_company,
					'sales_order_customer_id' =>$so_customer_id,
					'sales_order_incentive_amt' =>$cus_inc_amt,
					'sales_order_item_division_id' =>$material_store_division_id,
					'sales_order_item_store_id' =>$material_store_id,
					'sales_order_po_date'=>$purchase_invo_po_date,
					'sales_order_customer_discount_percentage'=>$customer_discount,
					'sales_order_customer_cash_discount'=>$customer_cash_discount,
					'sales_order_customer_price_book_id'=>$pricebook_id,
					'sales_order_referral_id' =>$so_referral_id,
					'sales_order_customer_code'=>$so_customer_code,
					'sales_order_customer_name'=>$so_customer_name ,
					'sales_order_requested_date'=>$purchse_ord_req_date,
					'sales_order_valid_till'=>$purchse_ord_valid,
					'sales_order_region_id'=>$customer_region,
					'sales_order_zone_id'=>$customer_zone,
					'sales_order_area_id'=>$customer_area,
					'sales_order_branch_office'=>$so_branch_off ,
					'sales_order_transport_mode'=>$transport_mode,
					'sales_order_status'=> $so_status ,
					'sales_order_payment_mode'=>$purchse_ord_payment_mode ,
					'sales_order_transaction_date'=>date("Y-m-d", strtotime($purchse_ord_transac_date)),
					'sales_order_termsandconditions'=>$purchse_ord_terms_conditions,
					'sales_order_payment_terms'=>$purchse_ord_payment_terms,
					'sales_order_active_status'=>'active',
					'sales_order_update_date'=>date('Y-m-d h:i:s'),
					'sales_order_created_by'=>$sess_user,
					'sales_order_updated_by'=>$sess_user,
					);
					//echo "<pre>";print_r($so_data); exit;
			$this->salesordermodule->update_so_details($so_data, $id);//** Update Sales Order Details **//
		 	
			
			$this->salesordermodule->delete_sales_order_items($id);//** Delete Sales Order Items In Grid **//
			
			if(!empty($item_id))
		 	{
				$result=count($item_id);
				for($i=1; $i<=$result; $i++)
				{
					if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
					{
						$so_itemdata=array(
							'so_items_sales_id'=>$id,
							'so_items_item_id'=>$item_id[$i],
							'so_items_division_id'=>$multiple_item_division_id[$i],
							'so_items_store_id'=>$multiple_item_store_id[$i],
							'so_items_code'=>$item_code[$i],
							'so_items_name'=>$item_name[$i],
							'so_items_model'=>$item_model[$i],
							'so_items_uom_id'=>$item_uom_id[$i],
							'so_items_mrp'=>$item_mrp[$i],
							'so_items_priceperunit'=>$item_priceperunit[$i],
							'so_items_qty'=>$item_qty[$i],
							'so_items_incentive_rate'=>$item_incentive_rate[$i],
							'so_items_incentive_total'=>$item_incentive_total[$i],
							'so_inv_id'=>$item_inv_id[$i],
							'so_items_batch_no'=>$item_batch_no[$i],
							'so_items_inv_qty'=>$item_inv_qty[$i],							
							'so_items_ord_qty'=>$item_qty[$i],
							'so_items_gross_amount'=>$item_gross_amount[$i],
							'so_items_gross_amount_with_discount'=>$item_gross_amount_with_disc[$i],
							
							'so_items_gst'=>$item_cgst[$i],
							'so_items_gst_amt'=>$item_cgst_amt[$i],
							'so_items_sgst'=>$item_sgst[$i],
							'so_items_sgst_amt'=>$item_sgst_amt[$i],
							'so_items_igst'=>$item_igst[$i],
							'so_items_igst_amt'=>$item_igst_amt[$i],
							'so_items_hsn_sac'=>$item_hsn[$i],
							
							'so_items_tax_percent'=>$item_tax_percent[$i],
							'so_items_tax_amount'=>$item_tax_amount[$i],
							'so_items_discounts_percentage'=>$item_discount_percent[$i],
							'so_items_discounts_amount'=>$item_discount_amount[$i],
							
							//'so_items_net_amount'=>$item_net_amount[$i],
							);
						$this->salesordermodule->update_so_Item_details($so_itemdata,$id,$so_items_id[$i]);//** Update SalesOrder Item Details **//
						
						if($so_status == 'approved')
							{
								

							$st_cod= $this->salesordermodule->getstock_item_details($item_inv_id[$i]);	
							$stock_qty=$st_cod->inventory_qty;
							$issued_qty=$st_cod->inventory_issued_qty;
							$rec_qty = $item_qty[$i];
							$cur_stock=$stock_qty - $rec_qty;
							$issued_qty_total= $issued_qty + $rec_qty;

							$cur_stock_items=array(
							'inventory_qty'=>$cur_stock,
							'inventory_issued_qty'=>$issued_qty_total,
							'inventory_update_date'=>date('Y-m-d'),
							);
							
							$this->salesordermodule->update_cur_stock($cur_stock_items,$item_inv_id[$i]);
								  //echo "<pre>"; print_r($cur_stock_items); exit;
							}
						
							
					}
				}
					
			}
			
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
			 $tax_group_damage_discount_amt=$this->security->xss_clean($this->input->post('tax_group_damage_discount_amount'));
			 
			 if(!empty($tax_group_length))
			 {
				 $this->salesordermodule->delete_tax_group($id);
				 
				for($i=0; $i<=$tax_group_length; $i++)
				{
					if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]) && !empty($tax_group_tax_amount[$i]) && !empty($tax_group_tax_percentage[$i])  && !empty($tax_group_with_tax_gross_amount[$i]))
					{
				  		$tax_group=array(
								'tax_group_sales_order_id'=>$id,
								'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
								'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
								'tax_group_total_flat_amount'=>$tax_group_flat_amount[$i],
								'tax_group_without_cash_disocunt_amount'=>$tax_group_without_cash_discount_amount[$i],
								'tax_group_cash_disocunt_amount'=>$tax_group_cash_discount_amount[$i],
								'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
								'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
								'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
								'tax_group_damage_discount_amt'=>$tax_group_damage_discount_amt[$i],
								'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
								'tax_group_incentive_amount'=>$tax_group_incentive_amount[$i],
				  				);
						$this->salesordermodule->update_tax_group($tax_group);//** Add Tax Group **//
					}
				}
			 }
			 
			 
			$total_gross_amount=$this->security->xss_clean($this->input->post('total_gross_amount'));
			$total_tax_percentage=$this->security->xss_clean($this->input->post('total_tax_percentage'));
			$total_tax_amount=$this->security->xss_clean($this->input->post('total_tax_amount'));
			$total_disocunts_percentage=$this->security->xss_clean($this->input->post('total_disocunts_percentage'));
			$total_disocunts_amount=$this->security->xss_clean($this->input->post('total_disocunts_amount'));
			$total_shipping_charges=$this->security->xss_clean($this->input->post('total_shipping_charges'));
			$total_shipping_tax=$this->security->xss_clean($this->input->post('total_shipping_tax'));
			$total_adjustments=$this->security->xss_clean($this->input->post('total_adjustments'));
			$grand_total=$this->security->xss_clean($this->input->post('grand_total'));
			$USR_REDEEM_AMT = $this->security->xss_clean($this->input->post('cus_wallet_debit_amt'));
			
			$so_totalprice=array(
					'so_total_sales_id'=>$id,
					'sales_order_customer_code'=>$so_customer_code,
					'so_total_gross_amount'=>$total_gross_amount,
					'so_total_tax_amount'=>$total_tax_amount,
					'so_total_tax_percentage'=>$total_tax_percentage,
					'so_total_discount_percentage'=>$total_disocunts_percentage,
					'so_total_discount_amount'=>$total_disocunts_amount,
					'so_total_shipping_charges'=>$total_shipping_charges,
					'so_total_shipping_tax'=>$total_shipping_tax,
					'so_adjustment'=>$total_adjustments,
					'so_grand_total'=>$grand_total,
					
					'total_quantity_items'=>$total_quantity_items,
					'total_gross_amount_items'=>$total_gross_amount_items,
					'total_tax_percent_items'=>$total_tax_percent_items,
					'total_tax_amount_items'=>$total_tax_amount_items,
					'total_discount_percent_items'=>$total_discount_percent_items,
					'total_discount_amount_items'=>$total_discount_amount_items,
					'total_net_amount_items'=>$total_net_amount_items,
					'total_incentive_amount'=>$total_incentive_amount,
					'total_redeem_amount'=>$USR_REDEEM_AMT,
					);
			 $this->salesordermodule->update_so_total_price($so_totalprice,$id);//** Update Sales Order Item Total **//
			 $this->session->set_flashdata('message', 'Sales Order Updated Successfully');
			 redirect('salesorder/orderform_list');
		}
		else
		{	
			$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
			$so_customer_id = $this->data['so_data']->sales_order_customer_id;
			
			$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);//** Get Single Sales Order Billing  Details **//
			$this->data['so_ship'] = $this->salesordermodule->getsingle_so_ship($so_customer_id);//** Get Single Sales Order Shipping Details **//
			
			$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);//** Get Single Sales Order Item Details **//
			$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);//** Get Single Sales Order Item Total Details **//
			
			$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
			
			$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);//** Get All SalesOrder Item Details **//
			$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
			$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
			
			$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details 
			$this->data["store"] = $this->productmodule->get_all_store(); //** Get All store_division Details 
			
			$this->title = "Sales Order";
			$this->keywords = "Sales Order";
			$this->_render('pages/salesorder/editorderform');
		}
	}
	//** View Sales Order **//
	
	public function view_salesorder($id)
	{	
		$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
 		$so_customer_id = $this->data['so_data']->sales_order_customer_id;
		
		//** Get Single Sales Order Billing  Details **//
		$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);
		
		//** Get Single Sales Order Shipping Details **//
		$this->data['so_ship'] = $this->salesordermodule->getsingle_so_ship($so_customer_id);
		
		//** Get Single Sales Order Item Details **//
		$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);
		
		//** Get All SalesOrder Item Details **//
		$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);
		
		//** Get Single Sales Order Item Total Details **//
		$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
		
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->_render('pages/salesorder/viewsalesorder');
	}
	
	public function view_orderform($id)
	{	
		$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
 		$so_customer_id = $this->data['so_data']->sales_order_customer_id;
		
		//** Get Single Sales Order Billing  Details **//
		$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);
		
		//** Get Single Sales Order Shipping Details **//
		$this->data['so_ship'] = $this->salesordermodule->getsingle_so_ship($so_customer_id);
		
		//** Get Single Sales Order Item Details **//
		$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);
		
		//** Get All SalesOrder Item Details **//
		$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);
		
		//** Get Single Sales Order Item Total Details **//
		$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
		
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->_render('pages/salesorder/view_orderform');
	}
	
	public function print_sales_order($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
		
		$this->data["gross_amt_tax"] = $this->salesordermodule->get_item_gross_amount_taxable($id);
		
		$this->data["gross_amt_non_tax"] = $this->salesordermodule->get_item_gross_amount_non_taxable($id);
		
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
 		$so_customer_id = $this->data['so_data']->sales_order_customer_id;
	 	$this->data["compny_det"] = $this->salesordermodule->get_comp_det($sess_company); 
		$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);
 		$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);
 		$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);
		$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
		$this->data["so_item_total_tax_group"] = $this->salesordermodule->getsingle_so_total_tax_group($id);
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['so_item_total']->so_grand_total);
		
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->load->view('pages/salesorder/sales_order_print',$this->data);
		 
	}
	
	
	public function print_sales_order_a4($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
		$this->data["so_item_total_tax_group"] = $this->salesordermodule->get_so_total_tax_group($id);
		//echo "<pre>"; print_r($this->data["si_item_total_tax_group"]); exit; 
		
		$this->data["gross_amt_tax"] = $this->salesordermodule->get_item_gross_amount_taxable($id);
		
		$this->data["gross_amt_non_tax"] = $this->salesordermodule->get_item_gross_amount_non_taxable($id);
		
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
 		$so_customer_id = $this->data['so_data']->sales_order_customer_id;
	 	$this->data["compny_det"] = $this->salesordermodule->get_comp_det($sess_company); 
		$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);
 		$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);
 		$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);
		$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
		$this->data["so_item_total_tax_group"] = $this->salesordermodule->getsingle_so_total_tax_group($id);
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['so_item_total']->so_grand_total);
		
		$this->title = "Sales Order";
		$this->keywords = "Sales Order";
		$this->load->view('pages/salesorder/sales_order_print_a4',$this->data);
		 
	}
	
	public function pdf($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data['so_data'] = $this->salesordermodule->getsingle_so($id);//** Get Single Sales Order Details **//
		$this->data["sales_man"] = $this->salesordermodule->get_sales_person();//** Get All Sales Person **//
 		$so_customer_id = $this->data['so_data']->sales_order_customer_id;
	 	$this->data["compny_det"] = $this->salesordermodule->get_comp_det($sess_company); 
		$this->data['so_bill'] = $this->salesordermodule->getsingle_so_bill($so_customer_id);
 		$this->data["so_item_data"] = $this->salesordermodule->getsingle_so_items($id);
 		$this->data["tax_group"] = $this->salesordermodule->get_tax_group($id);
		$this->data["so_item_total"] = $this->salesordermodule->getsingle_so_total($id);
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
		
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['so_item_total']->so_grand_total);
		
		$this->data['user_details'] = $this->salesordermodule->getuserdetails($sess_user);
		
		$user_name = $this->data['user_details']->user_first_name;		
		$user_email = $this->data['user_details']->user_email;
		
		$so_no = $this->data['so_data']->sales_order_number;	
		$customer_name = $this->data['so_data']->customer_name;		
		$customer_email = $this->data['so_data']->customer_email;
		
		$html = $this->pdf->load_view('pages/salesorder/sales_order_print',$this->data);
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
				       ->setSubject('Sales Order Details') // Message subject
					   ->setTo(array($customer_email => $customer_name)) // Array of people to send to
					   ->setCc(array($user_email => $user_name))
					   ->setFrom(array('info@neophron.com' => 'Chennaiautospares')) // From:
					   ->setBody($html_message, 'text/html') // Attach that HTML message from earlier
					   ->attach(Swift_Attachment::newInstance($pdf_content, 'sales_order_'.$so_no.'.pdf', 'application/pdf')); // Attach the generated PDF from earlier
		//echo "<pre>"; print_r($message); exit;
		// Send the email, and show user message
		if ($mailer->send($message))
		{
			$this->session->set_flashdata('message', 'Mail Sended Successfully');
			redirect('salesorder/salesorder_list');
		}
		else
		{
			$this->session->set_flashdata('message', 'Oops! Mail Not Send Faild');
			redirect('salesorder/salesorder_list');
		}
		
	}
	
	//** Get State Name On Page Load **//
	
	public function get_state()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		
		$state = $this->salesordermodule->getAllState($con_id);//** Get All State **//
		
		if(empty($state))
		{
			echo "<option value='0'>Select State Name</option>";
		}
		else
		{

			$Select = "";
			foreach($state as $STA)
			{
				if($STA["state_id"] == $sta_id)
				{
					$Select .= "<option value='{$STA["state_id"]}' selected='selected'>{$STA["state_name"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$STA["state_id"]}'>{$STA["state_name"]}</option>";
				}
			} 
			echo $Select;
		}
		exit;
	}
	
	//** Get City Name On Page Load **//
	
	public function get_city()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		$cty_id = $this->input->post('city');
		
		$city = $this->salesordermodule->getAllcity($con_id,$sta_id);//** Get All City **//
		
		if(empty($city))
		{
			echo "<option value='0'>Select City Name</option>";
		}
		else
		{
			$Select = "";
			foreach($city as $CTY)
			{
				if($CTY["city_id"] == $cty_id)
				{
					$Select .= "<option value='{$CTY["city_id"]}' selected='selected'>{$CTY["city_name"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$CTY["city_id"]}'>{$CTY["city_name"]}</option>";
				}
			} 
			echo $Select;
		}
		exit;
	}
	
	
	public function getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		$pricebook_id = $this->input->post('pricebook');
		
		$produt_details = $this->salesordermodule->getitemdetails($product_item_id, $pricebook_id);
		
		$data['product_id'] = $produt_details->product_id;
		$data['product_type_id'] = $produt_details->product_type_id;
		$data['product_group_id'] = $produt_details->product_group_id;
		$data['product_name'] = $produt_details->product_name;
		$data['product_code'] = $produt_details->product_code;
		$data['product_model_number'] = $produt_details->product_model_number;
		
		$data['product_mrp'] = $produt_details->product_mrp;
		$data['product_selling'] = $produt_details->product_selling;
		$data['product_cp'] = $produt_details->product_cp;
		$data['product_uty_qty'] = $produt_details->product_uty_qty;
		$data['product_vat_tax'] = $produt_details->product_vat_tax;
		$data['product_gst_tax'] = $produt_details->product_gst_tax;
		$data['product_service_tax'] = $produt_details->product_service_tax;
		$data['product_cst_tax'] = $produt_details->product_cst_tax;
		$data['product_excise_duty_tax'] = $produt_details->product_excise_duty_tax;
		
		$data['uom_id'] = $produt_details->uom_id;
		$data['uom_name'] = $produt_details->uom_name;
		//$data['qty_stock'] = $produt_details->inventory_qty;
		
		$result = json_encode($data);
		
		echo $result; exit;
		
	}
	
	public function getsingleitem()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["product_type"] = $this->salesordermodule->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->salesordermodule->get_allproductgroups();
		
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
			
		$this->data["product_list"] = $this->salesordermodule->get_allproductsdetails($sess_group,$sess_company,$producttype);
		
		$result = $this->load->view("pages/salesorder/singleitem_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	public function onchangegetitemspopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$product_type = $this->input->post('product_type');
		$product_group = $this->input->post('product_group');
		
		$product_list = $this->salesordermodule->onchangeitemstype($sess_group,$sess_company,$product_type,$product_group);
		
		if(empty($product_list))
		{
			echo "<option value=''>Select Item</option>";
		}
		else
		{
			$Select = "<option value=''>Select Item</option>";
			foreach($product_list as $PROLST)
			{
					$Select .= "<option value='{$PROLST["product_id"]}'>{$PROLST["product_code"]}</option>";
			} 
			echo $Select;
		}
		exit;

	}
	
	
	public function getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		
		$this->data["product_type"] = $this->salesordermodule->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->salesordermodule->get_allproductgroups();
		
		$this->data['product_list'] = $this->salesordermodule->getcustomerbasedproductsdetails($sess_group,$sess_company,$pricebook_id);
		
		$result = $this->load->view("pages/salesorder/multipleitem_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	public function customerpopup()
	{
		$this->data["customer_data"] = $this->customermodule->getcustomerdetail_for_popup_grid();
		
		$result = $this->load->view("pages/salesorder/customer_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	public function salesquotepopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["sales_quote_data"] = $this->salesordermodule->getsalesquotepopupdetail_for_popup_grid($sess_group,$sess_company);
		
		$result = $this->load->view("pages/salesorder/sales_quote_popup.php", $this->data, true);
		
		echo $result; exit;
	}
	
	public function getsales_quote()
	{
		$id = $this->input->post('salesQuoteId');
		
		$this->data["sales_order_id"] = $this->salesordermodule->getsales_id($id);
		
		$request=$this->data["sales_order_id"]->sales_quote_id;
		$this->data["sales_order"] = $this->salesordermodule->getSQ_items_grid($request);
		$data['view_order'] =$this->load->view('pages/salesorder/sales_qutation_append_popup.php',$this->data,true);
		$sales_order_total = $this->salesordermodule->getsales_order_total($request);

		$sales_order_item = $this->data["sales_order"];
		
		$data['table_count'] = count($sales_order_item);
		$data['countofrows'] = count($sales_order_item);

		$data['total_shipping_charges'] = $sales_order_total->salesquote_shipping_charges;
		$data['total_shipping_tax'] = $sales_order_total->salesquote_shipping_tax;

		$result = json_encode($data);
		
		echo $result; exit;
		
		
		
	}
	
	
	public function multiplesearchitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook'));
		$product_type=$this->security->xss_clean($this->input->post('product_type'));
		$product_group=$this->security->xss_clean($this->input->post('product_group'));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		
		$this->data['product_list'] = $this->salesordermodule->getcustomerbasedproductsdetailswithmultiplesearch($sess_group,$sess_company,$pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno);
		
		$result = $this->load->view("pages/salesorder/search_multiple_items", $this->data, true);
				
		echo $result; exit;
	}
	
	public function searchsalesquatation()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$sq_code=$this->security->xss_clean($this->input->post('sq_code'));
		$customer_name=$this->security->xss_clean($this->input->post('customer_name'));
		
				
		$this->data['sales_quote_data'] = $this->salesordermodule->getsalesquatationsearch($sq_code,$customer_name,$sess_group,$sess_company);
		$result = $this->load->view("pages/salesorder/searchsalesquatation_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	
	
	
	public function searchcustomerdetails()
	{
		$cus_code=$this->security->xss_clean($this->input->post('cus_code'));
		$cus_name=$this->security->xss_clean($this->input->post('cus_name'));
		$cus_mobile=$this->security->xss_clean(trim($this->input->post('cus_mobile')));
		$cus_email=$this->security->xss_clean($this->input->post('cus_email'));
		
		$this->data['customer_data'] = $this->salesordermodule->getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email);
		//echo"<pre>"; print_r($this->data["customer_data"]); exit; 
		$result = $this->load->view("pages/salesorder/searchcustomer_popup", $this->data, true);
				
		echo $result; exit;
		
	}	
	
	public function download_attachment($id)
	{
		
		$data = file_get_contents("uploads/purchaseorders/$id"); // Read the file's contents
	
		$name = $id;

		force_download($name, $data);
	}	
	
	
	
}
	