<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchaseorder extends MY_Controller {

	public function __construct()
	{
		 parent::__construct();
		  
		$this->load->model('purchasemodule');
		$this->load->model('productmodule');
		$this->load->model('vendorquotemodule');
		$this->load->model('vendormodule');
		$this->load->model('materialrequestmodule');
		$this->load->model('mastersmodule');
		$this->load->model('salesordermodule');
		$this->load->library('pagination');
		
		$this->load->library('pdf');
		$this->load->library('numberwords');
		
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
	
	//** Index Page **//
	
	public function index()
	{
		redirect('purchaseorder/listview');
	}
	
	//** Search Purchase Order **//
	
	public function search_po($sort_order='po_po_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$po_order = $this->security->xss_clean($this->input->post('search_po_order'));
			$ven_name = $this->security->xss_clean($this->input->post('search_ven_name'));
			$div_name = $this->security->xss_clean($this->input->post('search_div_name'));
			$str_name = $this->security->xss_clean($this->input->post('search_str_name'));
			$amount = $this->security->xss_clean($this->input->post('search_amount'));
			$status = $this->security->xss_clean($this->input->post('search_status'));
			$from_date = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date));
			$to_date = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date));
		
			$purchaseorder_search= array(
				'search_po_order' => $po_order,
				'search_ven_name' =>$ven_name,
				'search_amount' => $amount,
				'search_div_name' => $div_name,
				'search_str_name' => $str_name,
				'search_status' => $status,
				'from_date' => $from_date,
				'to_date' => $to_date,
				);	
			$this->session->set_userdata('purchase_order_data',$purchaseorder_search);
		}
		 
			$search_data = $this->session->userdata('purchase_order_data');			
			$search_po_order = $search_data['search_po_order'];
			$search_ven_name = $search_data['search_ven_name'];
			$search_div_name = $search_data['search_div_name'];
			$search_str_name = $search_data['search_str_name'];
			$search_amount = $search_data['search_amount'];
			$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
		
			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =20;
			$Result = $this->purchasemodule->get_search_all_po($sess_group,$sess_company,$search_po_order,$search_ven_name,$search_amount,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date,$search_div_name,$search_str_name);
			
			$this->data["po_list"] = $Result['rows'];
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('purchaseorder/search_po/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;

			$this->title = "Purchase Order";
			$this->keywords = "Purchase Order";
			$this->_render('pages/purchaseorder/list_purchase_order');
	}
	
	//** Purchase Order List **//
	
	public function listview($sort_order='po_po_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->session->unset_userdata('purchase_order_data');
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->purchasemodule->get_all_po($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["po_list"] = $Result['rows'];

			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('purchaseorder/listview/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;

		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/purchaseorder/list_purchase_order');
		
	}
	
	//** Add Purchase Order **//
	
	public function getpurchaseorder_code()
	{
		$division_id =  $this->security->xss_clean($this->input->post('material_store_division_id'));
		
		//*****************//
		
		if($division_id == 1)
		{
		$prefix = $this->purchasemodule->getprefix('36');//** Get Prefix data for Purchase Order **//
		}
		elseif($division_id == 2)
		{
			$prefix = $this->purchasemodule->getprefix('37');
		}
		elseif($division_id == 3)
		{
			$prefix = $this->purchasemodule->getprefix('38');
		}
		elseif($division_id == 4)
		{
			$prefix = $this->purchasemodule->getprefix('39');
		}
		else
		{
			$prefix = $this->purchasemodule->getprefix('6');
		}
		
		$poprefix = $prefix->prefix_name;
		//$poprefix = "GST-";

		$code = $this->purchasemodule->getlast_divisionid($division_id);//** Get Last Id for PurchaseOrder **//
		
		if(!empty($code))
		{
			$lastPoCode = $code->po_po_no;
			
			$lengthPrefix = strlen($poprefix);
			$strSplit = str_split($lastPoCode, $lengthPrefix);
			$POLastdigit = $strSplit[0];
			
			$explode = explode($POLastdigit,$lastPoCode);
			
			
			$POLastnumber = $explode[1];
			
			if($POLastdigit == $poprefix)
			{
				$pocode = $POLastnumber+1;
				$digits = sprintf ('%04d', $pocode);
				$pocodewithPrefix = $poprefix.$digits;
			}
			else
			{
				$pocodewithPrefix = $poprefix.'0001';
			}
		}
		else
		{
			$pocodewithPrefix = $poprefix.'0001';
		}
		
		$this->data['pocode'] = $pocodewithPrefix;
		$this->data['poprefix'] = $poprefix;
		
		$randomstring = $pocodewithPrefix; 
		echo $randomstring;
		
	}
	
	
	
	public function addpurchaseorder()
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$prefix = $this->purchasemodule->getprefix('6');//** Get Prefix data for Purchase Order **//
		
		$poprefix = $prefix->prefix_name;

		$code = $this->purchasemodule->getlastid();//** Get Last Id for PurchaseOrder **//
		
		if(!empty($code))
		{
			$lastPoCode = $code->po_po_no;
			
			$lengthPrefix = strlen($poprefix);
			$strSplit = str_split($lastPoCode, $lengthPrefix);
			$POLastdigit = $strSplit[0];
			
			$explode = explode($POLastdigit,$lastPoCode);
			
			
			$POLastnumber = $explode[1];
			
			if($POLastdigit == $poprefix)
			{
				$pocode = $POLastnumber+1;
				$digits = sprintf ('%04d', $pocode);
				$pocodewithPrefix = $poprefix.$digits;
			}
			else
			{
				$pocodewithPrefix = $poprefix.'0001';
			}
		}
		else
		{
			$pocodewithPrefix = $poprefix.'0001';
		}
		
		$this->data['pocode'] = $pocodewithPrefix;
		$this->data['poprefix'] = $poprefix;
		
		$randomstring = $pocodewithPrefix; 
		
		$Result_carrier=$this->mastersmodule->get_allcarrier();
		$this->data["carrier"] = $Result_carrier['rows'];
			
		$this->data["price_book"] = $this->purchasemodule->get_all_pricebook(); //** Get All Payment Mode **//	
		$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode(); //** Get All Payment Mode **//
		$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";

		$this->_render('pages/purchaseorder/add_purchase_order');
	}
	
	//** Add Purchase Order **//
	
	public function addpurchaseorder_details()
	{
		
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$prefix = $this->purchasemodule->getprefix('6');//** Get Prefix data for Purchase Order **//
		
		$poprefix = $prefix->prefix_name;

		$code = $this->purchasemodule->getlastid();//** Get Last Id for PurchaseOrder **//
		
		if(!empty($code))
		{
			$lastPoCode = $code->po_po_no;
			
			$lengthPrefix = strlen($poprefix);
			$strSplit = str_split($lastPoCode, $lengthPrefix);
			$POLastdigit = $strSplit[0];
			
			$explode = explode($POLastdigit,$lastPoCode);
			
			
			$POLastnumber = $explode[1];
			
			if($POLastdigit == $poprefix)
			{
				$pocode = $POLastnumber+1;
				$digits = sprintf ('%04d', $pocode);
				$pocodewithPrefix = $poprefix.$digits;
			}
			else
			{
				$pocodewithPrefix = $poprefix.'0001';
			}
		}
		else
		{
			$pocodewithPrefix = $poprefix.'0001';
		}
		
		$this->data['pocode'] = $pocodewithPrefix;
		$this->data['poprefix'] = $poprefix;
		
		$randomstring = $pocodewithPrefix; 
		
		if(isset($_POST['po_add_details']))
		{
			$purchse_ord_num = $this->security->xss_clean($this->input->post('purchse_ord_num'));
			$purchse_ordvendor_nam_id = $this->security->xss_clean($this->input->post('vdrquo_vendor_id'));
			/*$vdrquo_mr_reqnum_id = $this->security->xss_clean($this->input->post('vdrquo_mr_reqnum_id'));*/
			$purchse_vdrquo_quote_id = $this->security->xss_clean($this->input->post('purchse_vdrquo_quote_id'));
			$purchse_ord_req_date = $this->security->xss_clean($this->input->post('purchse_ord_req_date'));
			$purchse_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$purchse_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
			$purchse_delivery_date = $this->security->xss_clean($this->input->post('purchse_delivery_date'));
			$purchase_carrier = $this->security->xss_clean($this->input->post('purchase_carrier'));
			
					
		 if($this->input->post('purchse_delivery_date') != "")
				{
					$purchse_delivery_date = date('Y-m-d', strtotime($this->input->post('purchse_delivery_date')));
				}
				else
				{
					$purchse_delivery_date = "0000-00-00";
				}
			 
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
			$purchse_ord_met_reqnum = $this->security->xss_clean($this->input->post('purchse_ord_met_reqnum'));
			$purchse_ord_ven_quonum = $this->security->xss_clean($this->input->post('purchse_ord_ven_quonum'));
			$purchse_ord_sales_ordnum = $this->security->xss_clean($this->input->post('purchse_ord_sales_num'));
			$purchse_ord_payment_mode = $this->security->xss_clean($this->input->post('purchse_ord_payment_mode'));
			$purchse_ord_credit_limit = $this->security->xss_clean($this->input->post('purchse_ord_credit_limit'));
			$purchse_ord_transac_date = $this->security->xss_clean($this->input->post('purchse_ord_transac_date'));
			
				if($this->input->post('purchse_ord_transac_date') != "")
				{
					$purchse_ord_transac_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_transac_date')));
				}
				else
				{
					$purchse_ord_transac_date = "0000-00-00";
				}
			
			$purchse_ord_status = $this->security->xss_clean($this->input->post('purchse_ord_status'));
			$purchse_ord_terms_conditions = $this->security->xss_clean($this->input->post('purchse_ord_terms_conditions'));
			$purchse_ord_payment_terms=$this->security->xss_clean($this->input->post('purchse_ord_payment_terms'));
			$purchse_ord_recurring=$this->security->xss_clean($this->input->post('purchse_ord_recurring'));
			
				if($purchse_ord_recurring== "active")
				{
					$option=$purchse_ord_recurring;
				}
				else
				{
					$option="inactive";
				}
				
			$purchse_ord_rec_type=$this->security->xss_clean($this->input->post('purchse_ord_rec_type'));
			$purchse_ord_rec_email=$this->security->xss_clean($this->input->post('purchse_ord_rec_email'));
			$purchse_ord_rec_frmdate=$this->security->xss_clean($this->input->post('purchse_ord_rec_frmdate'));
			
				if($this->input->post('purchse_ord_rec_frmdate') != "")
				{
					$purchse_ord_rec_frmdate = date('Y-m-d', strtotime($this->input->post('purchse_ord_rec_frmdate')));
				}
				else
				{
					$purchse_ord_rec_frmdate = "0000-00-00";
				}
			
			
			$purchse_ord_rec_todate=$this->security->xss_clean($this->input->post('purchse_ord_rec_todate'));
			
				if($this->input->post('purchse_ord_rec_todate') != "")
				{
					$purchse_ord_rec_todate = date('Y-m-d', strtotime($this->input->post('purchse_ord_rec_todate')));
				}
				else
				{
					$purchse_ord_rec_todate = "0000-00-00";
				}
			
			
			$purchse_ord_rec_date_rep=$this->security->xss_clean($this->input->post('purchse_ord_rec_date_rep'));
			$purchse_ord_rec_end_date=$this->security->xss_clean($this->input->post('purchse_ord_rec_end_date'));
			
				if($this->input->post('purchse_ord_rec_end_date') != "")
				{
					$purchse_ord_rec_end_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_rec_end_date')));
				}
				else
				{
					$purchse_ord_rec_end_date = "0000-00-00";
				}
				
					$last_table_id =$this->input->post('last_table_id');
					
			
		
			
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_name_desc = $this->security->xss_clean($this->input->post('item_name_desc'));			
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			
			$item_sale_price = $this->security->xss_clean($this->input->post('item_sale_price'));
			$item_gain_percent = $this->security->xss_clean($this->input->post('item_gain_percent'));
			$item_scheme_percent = $this->security->xss_clean($this->input->post('item_scheme_percent'));
			$item_scheme_amount = $this->security->xss_clean($this->input->post('item_scheme_amount'));
			
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
			
			$item_excise_percent = $this->security->xss_clean($this->input->post('item_excise_percent'));
			$item_excise_amount = $this->security->xss_clean($this->input->post('item_excise_amount'));
			$item_name_hsn_sac = $this->security->xss_clean($this->input->post('item_name_hsn_sac'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			
			$item_store_division_id = $this->security->xss_clean($this->input->post('multiple_item_division_id'));
			$item_store_id = $this->security->xss_clean($this->input->post('multiple_item_store_id'));
			$item_brand = $this->security->xss_clean($this->input->post('item_brand'));
			
				$purchse_ord_igst = $this->security->xss_clean($this->input->post('purchse_ord_igst'));
				
				$item_igst_tax_percent = $this->security->xss_clean($this->input->post('item_igst_tax_percent'));
				$item_igst_tax_amount = $this->security->xss_clean($this->input->post('item_igst_tax_amount'));
				
				
				
				
			
			$podetails=array(
				//'po_po_no'=>$randomstring,
				'po_po_no'=>$purchse_ord_num,
				'po_vendor_id'=>$purchse_ordvendor_nam_id,
				'po_store_division_id'=>$purchse_store_division_id,
				'po_store_id'=>$purchse_store_id,
				'po_purchase_carrier' => $purchase_carrier,
				'po_po_company_id'=>$sess_company,
				'po_req_date'=>$purchse_ord_req_date,
				'po_valid_til'=>$purchse_ord_valid,
				'po_delivery_date'=>$purchse_delivery_date,				
				'po_material_request_no'=>$purchse_ord_met_reqnum,
				'po_ventor_qoute_no'=>$purchse_ord_ven_quonum,
				'po_sales_ord_no'=>$purchse_ord_sales_ordnum,
				'po_payment_mode'=>$purchse_ord_payment_mode,
				'po_credit_limit'=>$purchse_ord_credit_limit,
				'po_trans_date'=>$purchse_ord_transac_date,
				'po_po_status'=>$purchse_ord_status,
				'po_terms'=>$purchse_ord_terms_conditions,
				'po_payment_terms'=>$purchse_ord_payment_terms,
				'po_recurring'=>$purchse_ord_recurring,
				'po_igst'=>$purchse_ord_igst,
				'po_add_date'=>date('Y-m-d h:i:s'),
				'po_added_by'=>$userid,
				'po_updated_by'=>$userid,
				'po_update_date' =>date('Y-m-d h:i:s')
				);		
	$po_id = $this->purchasemodule->add_po_details($podetails);//** Add Purchase Order Details **//
				
			$porec_details=array(
				'po_recurring_po_id'=>$po_id,
				'po_recurring_type'=>$purchse_ord_rec_type,
				'po_recurring_notify_mail'=>$purchse_ord_rec_email,
				'po_recurriong_start_date'=>$purchse_ord_rec_frmdate,
				'recurring_to_date'=>$purchse_ord_rec_todate,
				'recurring_day_on_month'=>$purchse_ord_rec_date_rep,
				'recurring_end_date'=>$purchse_ord_rec_end_date
			); 	
			$this->purchasemodule->add_po_rec_details($porec_details);//** Purchase Order Recurring Details **//	
            
			
			$expiry_date = $this->security->xss_clean($this->input->post('expiry_date'));
			 if($this->input->post('expiry_date') != "")
				{
					$expiry_date = date('Y-m-d', strtotime($this->input->post('expiry_date')));
				}
							 
								
		 	if(!empty($item_id))
				//echo "<pre>"; print_r($item_id); exit;
		 	{
				$result=count($item_id);
				for($i=1; $i<=$result; $i++)
				{
					if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
					{
						$po_itemdata=array(
							'po_items_po_id'=>$po_id,
							'po_items_item_id'=>$item_id[$i],
							'po_items_code'=>$item_code[$i],
							'po_items_name'=>$item_name[$i],
							'po_items_name_desc'=>$item_name_desc[$i],
							'po_items_hsn_sac'=>$item_name_hsn_sac[$i],
							'po_items_store_division_id'=>$item_store_division_id[$i],
							'po_items_store_id'=>$item_store_id[$i],
							'po_items_brand'=>$item_brand[$i],
							'po_batch_no'=>$item_batch_no[$i],
							//'po_expiry_date'=>$expiry_date[$i],
							'po_items_model'=>$item_model[$i],
							'po_items_uom_id'=>$item_uom_id[$i],
							'po_items_priceperunit'=>$item_priceperunit[$i],
							'po_items_qty'=>$item_qty[$i],
							'po_items_ord_qty'=>$item_qty[$i],
							//'po_items_sale_price'=>$item_sale_price[$i],
							//'po_items_gain_percent'=>$item_gain_percent[$i],
							//'po_items_scheme_percent'=>$item_scheme_percent[$i],
							//'po_items_scheme_amount'=>$item_scheme_amount[$i],
							'po_items_gross_amount'=>$item_gross_amount[$i],
							'po_items_tax_percent'=>$item_tax_percent[$i],
							'po_items_excise_percent'=>$item_excise_percent[$i],
							'po_items_tax_amount'=>$item_tax_amount[$i],
							'po_items_excise_amount'=>$item_excise_amount[$i],
							'po_items_igst_percent'=>$item_igst_tax_percent[$i],
							'po_items_igst_amount'=>$item_igst_tax_amount[$i],
							'po_items_discounts_percentage'=>$item_discount_percent[$i],
							'po_items_discounts_amount'=>$item_discount_amount[$i],
							'po_items_net_amount'=>$item_net_amount[$i],
							); 
							
							
							
					$this->purchasemodule->add_po_Item_details($po_itemdata);//** Add Purchase Order Item Details **//
					//echo "<pre>"; print_r($this->purchasemodule->add_po_Item_details($po_itemdata)); exit;
					}
				}
					
			}
				
			//** Add Tax Group **//
			
			 $tax_group_length = $this->security->xss_clean($this->input->post('tax_group_length'));
			 
				
			 $tax_group_gross_amount = $this->security->xss_clean($this->input->post('tax_group_gross_amount'));
			 $tax_group_discount_amount = $this->security->xss_clean($this->input->post('tax_group_discount_amount'));
			 $tax_group_without_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_without_tax_gross_amount'));
			 $tax_group_tax_amount = $this->security->xss_clean($this->input->post('tax_group_tax_amount'));
			 $tax_group_tax_percentage = $this->security->xss_clean($this->input->post('tax_group_tax_percentage')); 
			 $excise_group_excise_amount = $this->security->xss_clean($this->input->post('excise_group_excise_amount'));
			 $excise_group_excise_percentage = $this->security->xss_clean($this->input->post('excise_group_excise_percentage'));
			 $tax_group_with_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_with_tax_gross_amount'));
			$tax_group_igst_amount = $this->security->xss_clean($this->input->post('tax_group_tax_igst_amount'));
				$tax_group_igst_percentage = $this->security->xss_clean($this->input->post('tax_group_tax_igst_percentage')); 
				
	
		if(!empty($tax_group_length))
			 {
				for($i=0; $i<=$tax_group_length; $i++)
				{
					if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]))
					{
					
						$po_totalgroup=array(
							'tax_group_purchase_order_id'=>$po_id,
							'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
							'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
							'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
							'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
							'excise_group_excise_percentage'=>$excise_group_excise_percentage[$i],
							'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
							'excise_group_excise_amount'=>$excise_group_excise_amount[$i],
							'tax_group_igst_percentage'=>$tax_group_igst_percentage[$i],
							'tax_group_igst_amount'=>$tax_group_igst_amount[$i],
							'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
							);
							
							//echo "<pre>"; print_r($po_totalgroup); exit;
							
						$this->purchasemodule->add_tax_group($po_totalgroup);//** Add Tax Group **//
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
				
			$po_totalprice=array(
				'po_total_purchase_id'=>$po_id,
				'po_total_gross_amount'=>$total_gross_amount,
				'po_total_tax_amount'=>$total_tax_amount,
				'po_total_tax_percentage'=>$total_tax_percentage,
				'po_total_discount_percentage'=>$total_disocunts_percentage,
				'po_total_discount_amount'=>$total_disocunts_amount,
				'po_total_shipping_charges'=>$total_shipping_charges,
				'po_total_shipping_tax'=>$total_shipping_tax,
				'po_adjustment'=>$total_adjustments,
				'po_grand_total'=>$grand_total,
				);
			$this->purchasemodule->add_po_total_price($po_totalprice);//** Add Purchase Order Item Total Details **//
			
			///////////********** To Change Vendor Quatation Status **********///////////
			if($purchse_vdrquo_quote_id != "")
			{
				$VQ_statuschange=array(
					'vendor_quote_cur_status'=>'onprocess',
					'vendor_quote_updated_by'=>$userid,
					'vendor_quote_update_date' =>date('Y-m-d h:i:s')
					);
			
				$this->purchasemodule->change_vendor_quote_status($VQ_statuschange,$purchse_vdrquo_quote_id);//** Change Vendor Quatation Status **//
			}
			$this->session->set_flashdata('message', 'Purchase Order Created Successfully');
			redirect('purchaseorder/listview');
		}
	}
	
	//** Edit Purchase Order **//
	
	public function editpurchaseorder_details($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		 $sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['po_update_details']))
		{	
			$purchse_ord_num = $this->security->xss_clean($this->input->post('purchse_ord_num'));
			$purchse_ordvendor_nam_id = $this->security->xss_clean($this->input->post('vdrquo_vendor_id'));
			$purchse_ord_req_date = $this->security->xss_clean($this->input->post('purchse_ord_req_date'));
			$purchse_delivery_date = $this->security->xss_clean($this->input->post('purchse_delivery_date'));
			$purchse_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$purchse_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
					
		 if($this->input->post('purchse_delivery_date') != "")
				{
					$purchse_delivery_date = date('Y-m-d', strtotime($this->input->post('purchse_delivery_date')));
				}
				else
				{
					$purchse_delivery_date = "0000-00-00";
				}
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
			$purchse_ord_met_reqnum = $this->security->xss_clean($this->input->post('purchse_ord_met_reqnum'));
			$purchse_ord_ven_quonum = $this->security->xss_clean($this->input->post('purchse_ord_ven_quonum'));
			$purchse_ord_sales_ordnum = $this->security->xss_clean($this->input->post('purchse_ord_sales_num'));
			$purchse_ord_payment_mode = $this->security->xss_clean($this->input->post('purchse_ord_payment_mode'));
			$purchse_ord_credit_limit = $this->security->xss_clean($this->input->post('purchse_ord_credit_limit'));
			$purchse_ord_transac_date = $this->security->xss_clean($this->input->post('purchse_ord_transac_date'));
			$purchase_carrier = $this->security->xss_clean($this->input->post('purchase_carrier'));
			
				if($this->input->post('purchse_ord_transac_date') != "")
				{
					$purchse_ord_transac_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_transac_date')));
				}
				else
				{
				$purchse_ord_transac_date = "0000-00-00";
				}
			
			$purchse_ord_status = $this->security->xss_clean($this->input->post('purchse_ord_status'));
			$purchse_ord_terms_conditions = $this->security->xss_clean($this->input->post('purchse_ord_terms_conditions'));
			$purchse_ord_payment_terms=$this->security->xss_clean($this->input->post('purchse_ord_payment_terms'));
			$purchse_ord_recurring=$this->security->xss_clean($this->input->post('purchse_ord_recurring'));
			
				if($purchse_ord_recurring== "active")
				{
					$option=$purchse_ord_recurring;
				}
				else
				{
					$option="inactive";
				}
			
			$purchse_ord_rec_type=$this->security->xss_clean($this->input->post('purchse_ord_rec_type'));
			$purchse_ord_rec_email=$this->security->xss_clean($this->input->post('purchse_ord_rec_email'));
			$purchse_ord_rec_frmdate=$this->security->xss_clean($this->input->post('purchse_ord_rec_frmdate'));
			
				if($this->input->post('purchse_ord_rec_frmdate') != "")
				{
				$purchse_ord_rec_frmdate = date('Y-m-d', strtotime($this->input->post('purchse_ord_rec_frmdate')));
				}
				else
				{
				$purchse_ord_rec_frmdate = "0000-00-00";
				}
			
			$purchse_ord_rec_todate=$this->security->xss_clean($this->input->post('purchse_ord_rec_todate'));
			
				if($this->input->post('purchse_ord_rec_todate') != "")
				{
				$purchse_ord_rec_todate = date('Y-m-d', strtotime($this->input->post('purchse_ord_rec_todate')));
				}
				else
				{
				$purchse_ord_rec_todate = "0000-00-00";
				}
			
			
			$purchse_ord_rec_date_rep=$this->security->xss_clean($this->input->post('purchse_ord_rec_date_rep'));
			$purchse_ord_rec_end_date=$this->security->xss_clean($this->input->post('purchse_ord_rec_end_date'));
			
				if($this->input->post('purchse_ord_rec_end_date') != "")
				{
				$purchse_ord_rec_end_date = date('Y-m-d', strtotime($this->input->post('purchse_ord_rec_end_date')));
				}
				else
				{
				$purchse_ord_rec_end_date = "0000-00-00";
				}
			
			 
		    $last_table_id =$this->input->post('last_table_id');
			
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_name_desc = $this->security->xss_clean($this->input->post('item_name_desc'));
			$item_model = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_priceperunit = $this->security->xss_clean($this->input->post('item_priceperunit'));
			$item_qty = $this->security->xss_clean($this->input->post('item_qty'));
			$item_sale_price = $this->security->xss_clean($this->input->post('item_sale_price'));
			$item_gain_percent = $this->security->xss_clean($this->input->post('item_gain_percent'));
			$item_scheme_percent = $this->security->xss_clean($this->input->post('item_scheme_percent'));
			$item_scheme_amount = $this->security->xss_clean($this->input->post('item_scheme_amount'));
			
			$item_gross_amount = $this->security->xss_clean($this->input->post('item_gross_amount'));
			$item_tax_percent = $this->security->xss_clean($this->input->post('item_tax_percent'));
			$item_tax_amount = $this->security->xss_clean($this->input->post('item_tax_amount'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percent'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_net_amount = $this->security->xss_clean($this->input->post('item_net_amount'));
			$item_excise_percent = $this->security->xss_clean($this->input->post('item_excise_percent'));
			$item_excise_amount = $this->security->xss_clean($this->input->post('item_excise_amount'));
			$item_name_hsn_sac = $this->security->xss_clean($this->input->post('item_name_hsn_sac'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			
			
			$item_store_division_id = $this->security->xss_clean($this->input->post('multiple_item_division_id'));
			$item_store_id = $this->security->xss_clean($this->input->post('multiple_item_store_id'));
			$item_brand = $this->security->xss_clean($this->input->post('item_brand'));
			
			$purchse_ord_igst = $this->security->xss_clean($this->input->post('purchse_ord_igst'));
				
				$item_igst_tax_percent = $this->security->xss_clean($this->input->post('item_igst_tax_percent'));
				$item_igst_tax_amount = $this->security->xss_clean($this->input->post('item_igst_tax_amount'));
				
			
			/*print_r($item_igst_tax_percent);
			print_r($item_igst_tax_amount);
			exit;*/
			
			
			$podetails=array(
				'po_po_no'=>$purchse_ord_num,
				'po_vendor_id'=>$purchse_ordvendor_nam_id,
				'po_store_division_id'=>$purchse_store_division_id,
				'po_store_id'=>$purchse_store_id,
				'po_purchase_carrier' => $purchase_carrier,
				'po_po_company_id'=>$sess_company,
				'po_req_date'=>$purchse_ord_req_date,
				'po_valid_til'=>$purchse_ord_valid,
				'po_delivery_date'=>$purchse_delivery_date,
				'po_material_request_no'=>$purchse_ord_met_reqnum,
				'po_ventor_qoute_no'=>$purchse_ord_ven_quonum,
				'po_sales_ord_no'=>$purchse_ord_sales_ordnum,
				'po_payment_mode'=>$purchse_ord_payment_mode,
				'po_credit_limit'=>$purchse_ord_credit_limit,
				'po_trans_date'=>$purchse_ord_transac_date,
				'po_po_status'=>$purchse_ord_status,
				'po_terms'=>$purchse_ord_terms_conditions,
				'po_payment_terms'=>$purchse_ord_payment_terms,
				'po_recurring'=>$purchse_ord_recurring,
				'po_igst'=>$purchse_ord_igst,
				'po_updated_by'=>$userid,
				'po_update_date' =>date('Y-m-d h:i:s')
				);
				
			//echo "<pre>"; print_r($podetails); exit;
				
			$this->purchasemodule->update_po_details($podetails, $id);//** Update Purchase Order Details **//
				
			$porec_details=array(
				'po_recurring_po_id'=>$id,				
				'po_recurring_type'=>$purchse_ord_rec_type,
				'po_recurring_notify_mail'=>$purchse_ord_rec_email,
				'po_recurriong_start_date'=>$purchse_ord_rec_frmdate,
				'recurring_to_date'=>$purchse_ord_rec_todate,
				'recurring_day_on_month'=>$purchse_ord_rec_date_rep,
				'recurring_end_date'=>$purchse_ord_rec_end_date); 
				
			$this->purchasemodule->update_po_rec_details($porec_details, $id);//** Update Purchase Order Recurring Details **//
			$this->purchasemodule->delete_po_items($id);//** Delete Purchaseorder Items In grid View **//
			
				
					
		 if(!empty ($item_id))
		{
				$result=count($item_id);
				for($i=1; $i<=$result; $i++)
				{
					if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
					{
						$po_itemdata=array(
							'po_items_po_id'=>$id,
							'po_items_item_id'=>$item_id[$i],
							'po_items_code'=>$item_code[$i],
							'po_items_name'=>$item_name[$i],
							'po_items_name_desc'=>$item_name_desc[$i],
							'po_items_hsn_sac'=>$item_name_hsn_sac[$i],
							'po_items_store_division_id'=>$item_store_division_id[$i],
							'po_items_store_id'=>$item_store_id[$i],
							'po_items_brand'=>$item_brand[$i],
							//'po_batch_no'=>$item_batch_no[$i],
							//'po_expiry_date'=>$expiry_date[$i],
							'po_items_model'=>$item_model[$i],
							'po_items_uom_id'=>$item_uom_id[$i],
							'po_items_priceperunit'=>$item_priceperunit[$i],
							'po_items_qty'=>$item_qty[$i],
							'po_items_ord_qty'=>$item_qty[$i],
							'po_items_sale_price'=>$item_sale_price[$i],
							'po_items_gain_percent'=>$item_gain_percent[$i],
							'po_items_scheme_percent'=>$item_scheme_percent[$i],
							'po_items_scheme_amt'=>$item_scheme_amount[$i],
							'po_items_gross_amount'=>$item_gross_amount[$i],
							'po_items_tax_percent'=>$item_tax_percent[$i],
							'po_items_tax_amount'=>$item_tax_amount[$i],
							'po_items_excise_percent'=>$item_excise_percent[$i],
							'po_items_excise_amount'=>$item_excise_amount[$i],
							'po_items_igst_percent'=>$item_igst_tax_percent[$i],
							'po_items_igst_amount'=>$item_igst_tax_amount[$i],
							'po_items_discounts_percentage'=>$item_discount_percent[$i],
							'po_items_discounts_amount'=>$item_discount_amount[$i],
							'po_items_net_amount'=>$item_net_amount[$i],
						); 
						
						//echo "<pre>"; print_r($po_itemdata); exit;
						$this->purchasemodule->update_po_Item_details($po_itemdata, $id,$item_id[$i]);//** Update Purchase Order Item Details **//
					}
					
				}
				 
		}
			
			/** Tax Group **/
			
			$tax_group_length = $this->security->xss_clean($this->input->post('tax_group_length'));
			 
			 $tax_group_gross_amount = $this->security->xss_clean($this->input->post('tax_group_gross_amount'));
			 $tax_group_discount_amount = $this->security->xss_clean($this->input->post('tax_group_discount_amount'));
			 $tax_group_without_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_without_tax_gross_amount'));
			 
			 $tax_group_with_tax_gross_amount = $this->security->xss_clean($this->input->post('tax_group_with_tax_gross_amount'));
			 $excise_group_excise_amount = $this->security->xss_clean($this->input->post('excise_group_excise_amount'));
			 $excise_group_excise_percentage = $this->security->xss_clean($this->input->post('excise_group_excise_percentage'));
			 
			 $tax_group_igst_amount = $this->security->xss_clean($this->input->post('tax_group_tax_igst_amount'));
			 $tax_group_igst_percentage = $this->security->xss_clean($this->input->post('tax_group_tax_igst_percentage'));
			 
			 if($purchse_ord_igst == 0)
				{
					$tax_group_tax_amount = $this->security->xss_clean($this->input->post('tax_group_tax_amount'));
			 		$tax_group_tax_percentage = $this->security->xss_clean($this->input->post('tax_group_tax_percentage'));
				}
				else
				{
					$tax_group_tax_amount = '0.00';
					$tax_group_tax_percentage = '0.00';
				}
				
			 
			 if(!empty($tax_group_length))
			 {
				 $this->purchasemodule->delete_tax_group($id);
				 
				for($i=0; $i<=$tax_group_length; $i++)
				{
					if(!empty($tax_group_gross_amount[$i]) && !empty($tax_group_discount_amount[$i]) && !empty($tax_group_without_tax_gross_amount[$i]))
					{
				  		$tax_group=array(
								'tax_group_purchase_order_id'=>$id,
								'tax_group_total_gross_amount'=>$tax_group_gross_amount[$i],
								'tax_group_total_disocunt_amount'=>$tax_group_discount_amount[$i],
								'tax_group_without_tax_gross_amount'=>$tax_group_without_tax_gross_amount[$i],
								'tax_group_tax_percentage'=>$tax_group_tax_percentage[$i],
								'excise_group_excise_percentage'=>$excise_group_excise_percentage[$i],
								'tax_group_tax_amount'=>$tax_group_tax_amount[$i],
								'excise_group_excise_amount'=>$excise_group_excise_amount[$i],
								'tax_group_igst_percentage'=>$tax_group_igst_percentage[$i],
								'tax_group_igst_amount'=>$tax_group_igst_amount[$i],
								'tax_group_with_tax_gross_amount'=>$tax_group_with_tax_gross_amount[$i],
				  				); 
								
							//echo "<PRE>";print_r($tax_group);	exit;
						$this->purchasemodule->update_tax_group($tax_group);//** Add Tax Group **//
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
				
			$po_totalprice=array(
				'po_total_purchase_id'=>$id,
				'po_total_gross_amount'=>$total_gross_amount,
				'po_total_tax_amount'=>$total_tax_amount,
				'po_total_tax_percentage'=>$total_tax_percentage,
				'po_total_discount_percentage'=>$total_disocunts_percentage,
				'po_total_discount_amount'=>$total_disocunts_amount,
				'po_total_shipping_charges'=>$total_shipping_charges,
				'po_total_shipping_tax'=>$total_shipping_tax,
				'po_adjustment'=>$total_adjustments,
				'po_grand_total'=>$grand_total,
			);
			
			$this->purchasemodule->update_po_total_price($po_totalprice, $id);//** Update Purchase Order Item Total Details **//
			
			$this->session->set_flashdata('message', 'Purchase Order Updated Successfully');
			redirect('purchaseorder/listview');
		}
		else
		{	
		
			$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			$this->data['editpurchaseorder'] = $this->purchasemodule->getsingle_po($id);//** Get Single Purchase Order Details **//
			$this->data['editpurchaseorder_items'] = $this->purchasemodule->getsingle_po_items($id);//** Get Single Purchase Order  Item Details **//
			$this->data['editpurchaseorder_recurring'] = $this->purchasemodule->getsingle_po_rec($id);//** Get Single Purchase Order  recurring Details **//
			$this->data['editpurchaseorder_total'] = $this->purchasemodule->getsingle_po_total($id);//** Get Single Purchase Order  Item Total Details **//
			$this->data["tax_group"] = $this->purchasemodule->get_tax_group($id);//** Get All Salesquotation Item Details **//
			$this->data["paymentmode"] = $this->purchasemodule->get_all_pay_mode();//** Get All Payment Mode **//
			$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
			$this->data["store"] = $this->productmodule->get_all_store(); //** Get All store_division Details **//
			
			$this->title = "Purchase Order";
			$this->keywords = "Purchase Order";
			$this->_render('pages/purchaseorder/edit_purchase_order');
		}
	}
	
	//** Purchase Order Status **//
	
	public function deletepurchaseorder($id,$status)
	{
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		$podata = array(
						'po_status' => $changeStatus,
						'po_update_date' => date('Y-m-d'),
						'po_updated_by'=>1,
					);			
		$this->purchasemodule->update_po_status($podata,$id);
		$this->session->set_flashdata('message', 'Purchase Order Deleted Successfully');
		redirect('purchaseorder');
	}
	
	//** View Purchase Order **//
	
	public function viewpurchaseorder($id)
	{	
	    
		$this->data['editpurchaseorder'] = $this->purchasemodule->getsingle_po($id);//** Get Single Purchase Order Details **// 
		
		$this->data['editpurchaseorder_items'] = $this->purchasemodule->getsingle_po_items($id);//** Get Single Purchase Order  Item Details **//
		
		$this->data['editpurchaseorder_recurring'] = $this->purchasemodule->getsingle_po_rec($id);//** Get Single Purchase Order  recurring Details **//
		//echo "<PRE>";print_r($this->data['editpurchaseorder']);
		$this->data['editpurchaseorder_total'] = $this->purchasemodule->getsingle_po_total($id);//** Get Single Purchase Order  Item Total Details **//
		$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		$this->data["store"] = $this->productmodule->get_all_store(); //** Get All store_division Details **//
		$this->data["tax_group"] = $this->purchasemodule->get_tax_group($id);//** Get All Salesquotation Item Details **//
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->_render('pages/purchaseorder/view_purchase_order');
	}
		public function view_purchase_export()
	{
		$id = $this->input->post('search_id');
		
		$this->data["editpurchaseorder_items"] = $this->purchasemodule->getsingle_po_items($id);
	
		//** Get Single PO Indent Item Details **//
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		
		$this->load->view('pages/purchaseorder/view_purchase_export',$this->data);
	}
	
		public function view_po_pending()
	{
		$id = $this->input->post('search_id');
		
		$this->data["editpurchaseorder_items"] = $this->purchasemodule->getsingle_po_items($id);
	
		//** Get Single PO Indent Item Details **//
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		
		$this->load->view('pages/purchaseorder/view_po_pending',$this->data);
	}
	
		
	public function print_purchaseorder($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["compny_det"] = $this->salesordermodule->get_comp_det($sess_company); 

		$this->data['editpurchaseorder'] = $this->purchasemodule->getsingle_po($id);//** Get Single Purchase Order Details **//
		//echo "<pre>"; print_r($this->data['editpurchaseorder']); exit;
		$this->data['editpurchaseorder_items'] = $this->purchasemodule->getsingle_po_items($id);//** Get Single Purchase Order  Item Details **//
		$this->data['editpurchaseorder_recurring'] = $this->purchasemodule->getsingle_po_rec($id);//** Get Single Purchase Order  recurring Details **//
		$this->data['editpurchaseorder_total'] = $this->purchasemodule->getsingle_po_total($id);//** Get Single Purchase Order  Item Total Details **//
		$this->data["tax_group"] = $this->purchasemodule->get_tax_group($id);//** Get All Salesquotation Item Details **//.
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['editpurchaseorder_total']->po_grand_total);
		$this->title = "Purchase Order";
		$this->keywords = "Purchase Order";
		$this->load->view('pages/purchaseorder/purchase_order_print',$this->data);
		 
	}
	
	
	
	public function send_mail($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$data["compny_det"] = $this->salesordermodule->get_comp_det($sess_company); 
		
		$data['editpurchaseorder'] = $this->purchasemodule->getsingle_po($id);//** Get Single Purchase Order Details **//
		$data['editpurchaseorder_items'] = $this->purchasemodule->getsingle_po_items($id);//** Get Single Purchase Order  Item Details **//
		$data['editpurchaseorder_recurring'] = $this->purchasemodule->getsingle_po_rec($id);//** Get Single Purchase Order  recurring Details **//
		$data['editpurchaseorder_total'] = $this->purchasemodule->getsingle_po_total($id);//** Get Single Purchase Order  Item Total Details **//
		$data["tax_group"] = $this->purchasemodule->get_tax_group($id);//** Get All Salesquotation Item Details **//
		
		// Get this directory, to include other files from
		$dir = dirname(__FILE__);
		
		// Get the contents of the pdf into a variable for later
		ob_start();
		//$this->load->view('pages/purchaseorder/purchase_order_print',$this->data);
		//$content = require_once(APPPATH.'views/pages/purchaseorder/purchase_order_print.php', $data, true );
		
		$pdf_html = ob_get_contents();
		 exit;
		
		
		ob_end_clean();
		
		// Load the dompdf files
		require_once(APPPATH.'/libraries/dompdf/dompdf_config.inc.php');
		
		$dompdf = new DOMPDF(); // Create new instance of dompdf
		$dompdf->load_html($pdf_html); // Load the html
		$dompdf->render(); // Parse the html, convert to PDF
		$pdf_content = $dompdf->output(); // Put contents of pdf into variable for later
		echo $pdf_content; exit;
		// Get the contents of the HTML email into a variable for later
		ob_start();
		require_once($dir.'/html.php');
		$html_message = ob_get_contents();
		ob_end_clean();
		
		// Load the SwiftMailer files
		require_once($dir.'/swift/swift_required.php');
		
	}
	
	public function pdf($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["compny_det"] = $this->salesordermodule->get_comp_det($sess_company); 
		
		$this->data['editpurchaseorder'] = $this->purchasemodule->getsingle_po($id);//** Get Single Purchase Order Details **//
		$this->data['user_details'] = $this->purchasemodule->getuserdetails($sess_user);
		
		$user_name = $this->data['user_details']->user_first_name;		
		$user_email = $this->data['user_details']->user_email;
		
		$po_no = $this->data['editpurchaseorder']->po_po_no;	
		$vendor_name = $this->data['editpurchaseorder']->vendor_name;		
		$vendor_email = $this->data['editpurchaseorder']->vendor_email;
		
		$this->data['editpurchaseorder_items'] = $this->purchasemodule->getsingle_po_items($id);//** Get Single Purchase Order  Item Details **//
		$this->data['editpurchaseorder_recurring'] = $this->purchasemodule->getsingle_po_rec($id);//** Get Single Purchase Order  recurring Details **//
		$this->data['editpurchaseorder_total'] = $this->purchasemodule->getsingle_po_total($id);//** Get Single Purchase Order  Item Total Details **//
		$this->data["tax_group"] = $this->purchasemodule->get_tax_group($id);//** Get All Salesquotation Item Details **/
		
		$this->data["words_in_total"] = $this->numberwords->convert_number_to_words($this->data['editpurchaseorder_total']->po_grand_total);
		
		//$html = $this->load->view('pages/purchaseorder/purchase_order_print', $this->data, true);
		/*PDF Genrations*/
	   $html = $this->pdf->load_view('pages/purchaseorder/purchase_order_print', $this->data);
	  // echo $html;  exit;
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
				       ->setSubject('Purchase Order Details') // Message subject
					   ->setTo(array($vendor_email => $vendor_name)) // Array of people to send to
					   ->setCc(array($user_email => $user_name))
					   ->setFrom(array('thirupathi@vernalsoft.com' => 'Chennaiautospares')) // From:
					   ->setBody($html_message, 'text/html') // Attach that HTML message from earlier
					   ->attach(Swift_Attachment::newInstance($pdf_content, 'purchase_order_'.$po_no.'.pdf', 'application/pdf')); // Attach the generated PDF from earlier
		//echo "<pre>"; print_r($message); exit;
		// Send the email, and show user message
		if ($mailer->send($message))
		{
			$this->session->set_flashdata('message', 'Mail Sended Successfully');
			redirect('purchaseorder/listview');
		}
		else
		{
			$this->session->set_flashdata('message', 'Oops! Mail Not Send Faild');
			redirect('purchaseorder/listview');
		}
	   
	}


	//** Get Material Request Items **//
	
	public function getmetrialrequest()
	{
		$requset = $this->input->post('metrialRequestId');
		$this->data["metrialRequest"] = $this->materialrequestmodule->getmetrialrequestitems($requset);
		
		$data['view_order'] = $this->load->view('pages/purchaseorder/metrial_request_append_popup.php',$this->data,true);
		$metrialrequest = $this->data["metrialRequest"];
		
		$data['table_count'] = count($metrialrequest);
		$data['countofrows'] = count($metrialrequest);
		
		$total_gross_amount = 0;
		$total_tax_percentage = 0;
		$total_tax_amount = 0;
		$total_disocunts_percentage = 0;
		$total_disocunts_amount = 0;
		$total_net_amount = 0;
		$total_grand_total = 0;
		
		if(!empty($metrialrequest))
		{
			foreach($metrialrequest as $ITEMS) 
			{
				$product_selling = $ITEMS['product_selling'];
				$product_uty_qty = $ITEMS['met_item_qty'];
				$gross_amount = $product_selling * $product_uty_qty;
				
				$product_vat_tax = $ITEMS['product_vat_tax'];
				$product_gst_tax = $ITEMS['product_gst_tax'];
				$product_service_tax = $ITEMS['product_service_tax'];
				$product_cst_tax = $ITEMS['product_cst_tax'];
				$product_excise_duty_tax = $ITEMS['product_excise_duty_tax'];
				
				$items_tax_percent = $ITEMS['product_vat_tax'] + $ITEMS['product_gst_tax'] + $ITEMS['product_service_tax'] + $ITEMS['product_cst_tax'] + $ITEMS['product_excise_duty_tax'];
				
				$product_discounts = $ITEMS['product_discounts'];
				
				$items_discounts_amount = $gross_amount * ($product_discounts / 100);
				
				$gross_amount_with_discounts = $gross_amount - $items_discounts_amount;
				
				$items_tax_amount = $gross_amount_with_discounts * ($items_tax_percent / 100);
				
				
				$items_net_amount = $gross_amount_with_discounts + $items_tax_amount;
				
				$total_gross_amount = $total_gross_amount + $gross_amount;
				$total_tax_percentage = $total_tax_percentage + $items_tax_percent;
				$total_tax_amount = $total_tax_amount + $items_tax_amount;
				$total_disocunts_percentage = $total_disocunts_percentage + $product_discounts;
				$total_disocunts_amount = $total_disocunts_amount + $items_discounts_amount;
				$total_net_amount = $total_net_amount + $items_net_amount;
				
				$total_grand_total = $total_grand_total + $total_net_amount;
			}
		}
		
		//$data['countofrows'] = count($metrialrequest); 
		$data['po_total_gross_amount'] = $total_gross_amount;
		$data['po_total_tax_amount'] = $total_tax_amount;
		$data['po_total_tax_percentage'] = $total_tax_percentage;
		$data['po_total_discount_percentage'] = $total_disocunts_percentage;
		$data['po_total_discount_amount'] = $total_disocunts_amount;
		$data['po_grand_total'] = $total_net_amount;
		//$data['po_grand_total'] = $total_net_amount;
		$data['totalamount'] = $total; 

		echo json_encode($data);
		
		exit;
	}
	
	//** Sales Order Append Values **//
	
	public function getsalesorderitems()
	{
		$request = $this->input->post('salesid');
		$this->data["sales_order_item"] = $this->purchasemodule->getsinglesalesitem($request);
		$data['view_order'] =$this->load->view('pages/purchaseorder/sales_order_append_popup.php',$this->data,true);
		
		$sales_order_item = $this->data["sales_order_item"];
		$data['table_count'] = count($sales_order_item);
		$data['countofrows'] = count($sales_order_item);
		
		$total_gross_amount = 0;
		$total_tax_percentage = 0;
		$total_tax_amount = 0;
		$total_disocunts_percentage = 0;
		$total_disocunts_amount = 0;
		$total_net_amount = 0;
		
		if(!empty($sales_order_item))
		{ 
			
			foreach($sales_order_item as $ITEMS) 
			{
				$so_items_priceperunit = $ITEMS['so_items_priceperunit'];
				$so_items_qty = $ITEMS['so_items_ord_qty'];
				$so_items_gross_amount = $ITEMS['so_items_gross_amount'];
				$so_items_tax_percent = $ITEMS['so_items_tax_percent'];
				
				$so_items_tax_amount = $ITEMS['so_items_tax_amount'];
				$so_items_discounts_percentage = $ITEMS['so_items_discounts_percentage'];
				$so_items_discounts_amount = $ITEMS['so_items_discounts_amount'];
				$so_invoice_items_net_amount = $ITEMS['so_items_net_amount'];
				
				$total_gross_amount = $total_gross_amount + $so_items_gross_amount;
				$total_tax_percentage = $total_tax_percentage + $so_items_tax_percent;
				$total_tax_amount = $total_tax_amount + $so_items_tax_amount;
				$total_disocunts_percentage = $total_disocunts_percentage + $so_items_discounts_percentage;
				$total_disocunts_amount = $total_disocunts_amount + $so_items_discounts_amount;
				$total_net_amount = $total_net_amount + $so_invoice_items_net_amount;
				
				//$total_grand_total = $total_grand_total + $total_net_amount;					
			}
		}
		$data['so_total_gross_amount'] = $total_gross_amount;
		$data['so_total_tax_amount'] = $total_tax_amount;
		$data['so_total_tax_percentage'] = $total_tax_percentage;
		$data['so_total_discount_percentage'] = $total_disocunts_percentage;
		$data['so_total_discount_amount'] = $total_disocunts_amount;
		$data['so_grand_total'] = $total_net_amount;
		//$data['po_grand_total'] = $total_net_amount;
		$result = json_encode($data);
		
		echo $result; exit;
	}
	
	//** Get Product Item Details **//
	
	public function getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		$pricebook_id = $this->input->post('pricebook');
		
		$produt_details = $this->purchasemodule->getitemdetails($product_item_id, $pricebook_id);
		
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
		$result = json_encode($data);
		
		echo $result; exit;
		
	}
	
	//** Single Item Pop-up **//
	
	public function getsingleitem()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["product_type"] = $this->purchasemodule->get_allproducttypes($sess_group,$sess_company);//** Get All Product Type **//
		$this->data["product_group"] = $this->purchasemodule->get_allproductgroups();//** Get All Product Group **//
		
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
				
		$this->data["product_list"] = $this->purchasemodule->get_allproductsdetails($sess_group,$sess_company,$producttype);//** Get All Product Details **//
		
		$result = $this->load->view("pages/purchaseorder/singleitem_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Single Item onchange Item Pop-up **//
	
	public function onchangegetitemspopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$product_type = $this->input->post('product_type');
		$product_group = $this->input->post('product_group');
		
		$product_list = $this->purchasemodule->onchangeitemstype($sess_group,$sess_company,$product_type,$product_group);
		
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
	
	//** Multiple Item Pop-up **//
	
	public function getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		
		$this->data["product_type"] = $this->purchasemodule->get_allproducttypes($sess_group,$sess_company);//** Get All Product Type **//
		$this->data["product_group"] = $this->purchasemodule->get_allproductgroups();//** Get All Product Group **//
		$this->data['product_list'] = $this->purchasemodule->getmultipleproductsdetails($sess_group,$sess_company,$pricebook_id);//** Get Multiple Product Details **//
		
		$result = $this->load->view("pages/purchaseorder/multipleitem_popup", $this->data, true);		
		echo $result; exit;
	}	
	
	//** Multiple Item Pop-up Search  **//
	
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
		
		$this->data['product_list'] = $this->purchasemodule->getproductsdetailswithmultiplesearch($sess_group,$sess_company,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno);
		
		$result = $this->load->view("pages/purchaseorder/search_multiple_items", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Search Vendor **//
	
	public function searchvendardetails()
	{
		$vendor_code=$this->security->xss_clean($this->input->post('vendor_code'));
		$vendor_name=$this->security->xss_clean($this->input->post('vendor_name'));
		$ven_mobile=$this->security->xss_clean(trim($this->input->post('ven_mobile')));
		$ven_email=$this->security->xss_clean($this->input->post('ven_email'));
		
		$this->data['vendors'] = $this->purchasemodule->getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email);
		
		$result = $this->load->view("pages/purchaseorder/searchvendor_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Search Material Request **//
	
	public function materialrequestsearch()
	{
		$mr_code=$this->security->xss_clean($this->input->post('mr_code'));
		$mr_type=$this->security->xss_clean($this->input->post('mr_type'));
		$this->data['metrialRequest'] = $this->purchasemodule->getmaterialrequestwithsearch($mr_code,$mr_type);
		
		$result = $this->load->view("pages/purchaseorder/searchmaterialrequest_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Search Sales Order **//
	
	public function searchsalesorder()
	{
		$so_code=$this->security->xss_clean($this->input->post('so_code'));
		$customer_name=$this->security->xss_clean($this->input->post('customer_name'));
		
		$this->data['sales_order'] = $this->purchasemodule->getsalesorderwithsearch($so_code,$customer_name);
		
		$result = $this->load->view("pages/purchaseorder/searchsalesorder_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	
	
	//** Get Vendor Details For Pop-up **//
	
	public function getvendorpopup()
	{
		$this->data["vendors"] = $this->purchasemodule->getvendors_for_popup_grid();
		
		$result = $this->load->view("pages/purchaseorder/vendor_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Get Material Request Details For Pop-up **//
	
	public function getmetrialrequestpopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["metrialRequest"] = $this->purchasemodule->getmetrialrequest_for_popup_grid($sess_group,$sess_company);
		
		$result = $this->load->view("pages/purchaseorder/materialrequest_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Get Sales Order Details For Pop-up **//
	
	public function getsalesorderpopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["salesorder"] = $this->purchasemodule->getsales_for_popup_grid($sess_group,$sess_company);
		
		$result = $this->load->view("pages/purchaseorder/popup_sales_order", $this->data, true);
				
		echo $result; exit;
		
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */