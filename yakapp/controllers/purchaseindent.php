<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchaseindent extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->library('pagination');
		  $this->load->helper(array('form', 'url'));
		  $this->load->library('form_validation');
		  $this->load->library('email');
		  $this->load->model('productmodule');
		  $this->load->model('purchaseindentmodule');
		  $this->load->model('vendormodule');
		  $this->load->model('mastersmodule');
		  $this->load->model('purchasemodule');
		  
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
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		redirect('purchaseindent/po_indent_list');
	}
	
	//** Search Purchase Indent **//
	
	public function search_po_indent($sort_order='po_indent_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$ind_no = $this->security->xss_clean($this->input->post('search_ind_no'));
			$app_by = $this->security->xss_clean($this->input->post('search_approved_by'));
			$location = $this->security->xss_clean($this->input->post('search_location'));
			$status = $this->security->xss_clean($this->input->post('search_status'));
			$search_po_no = $this->security->xss_clean($this->input->post('search_po_no'));
			$search_store_name = $this->security->xss_clean($this->input->post('search_store_name'));
			$from_date = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date));
			$to_date = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date));
			
			$indent_search= array(
					'search_ind_no' => $ind_no,
					'search_approved_by' =>$app_by,
					'search_location' => $location,
					'search_status' => $status,
					'search_po_no' => $search_po_no,
					'search_store_name' => $search_store_name,
					'from_date' => $from_date,
					'to_date' => $to_date,
					);	
			$this->session->set_userdata('po_indent_data',$indent_search);
		}
			$search_data = $this->session->userdata('po_indent_data');			
			$search_ind_no = $search_data['search_ind_no'];
			$search_approved_by = $search_data['search_approved_by'];
			$search_location = $search_data['search_location'];
			$search_status = $search_data['search_status'];
			$search_store_name = $search_data['search_store_name'];
			$search_po_no = $search_data['search_po_no'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
			
			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =20;
			$Result=$this->purchaseindentmodule->search_purchase_indent_list($sess_company,$sess_group,$search_ind_no,$search_approved_by,$search_location,$search_status,$limit,$page,$sort_order,$sort_by,$search_po_no,$from_date,$to_date,$search_store_name);
			
			$this->data["po_indent"] = $Result['rows'];	
			$Result_location = $this->mastersmodule->get_alllocation(); //** Get All Locations In Master's Model **//
			$this->data["locationdata"] = $Result_location['rows'];
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('purchaseindent/search_po_indent/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;    

			$this->title = "Purchase Indent";
			$this->keywords = "Purchase Indent";
			$this->_render('pages/purchaseindent/po_indent');	
	}
	
	//** Purchase Indent List **//
	
	public function po_indent_list($sort_order='po_indent_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->session->unset_userdata('po_indent_data');
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result=$this->purchaseindentmodule->purchase_indent_list($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["po_indent"] = $Result['rows'];	
	
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('purchaseindent/po_indent_list/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;    
		$Result_location = $this->mastersmodule->get_alllocation(); //** Get All Locations In Master's Model **//
		$this->data["locationdata"] = $Result_location['rows'];
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		$this->_render('pages/purchaseindent/po_indent');	
	}
	
	
	public function prefix_code()
	{
			$store_id = $this->input->post('po_store_id');
			if($store_id !='3')
			{
				$prefix = $this->purchaseindentmodule->getprefix('7');//** Get Prefix Data **//
				$piprefix = $prefix->prefix_name;
			}
		
			else
			{
				//$prefix = $this->purchaseindentmodule->getprefix('7');//** Get Prefix Data **//
				//$piprefix = $prefix->prefix_name;
				$piprefix = 'NGST';
			}
			if($piprefix !='')
			{
				$code = $this->purchaseindentmodule->getlast_storeid($store_id); //** Get Last ID For Purchase Indent **//
				if(!empty($code))
				{
					$lastPiCode = $code->po_indent_number;
					$lengthPrefix = strlen($piprefix);
					$strSplit = str_split($lastPiCode, $lengthPrefix);
					$piLastdigit = $strSplit[0];
					$explode = explode($piLastdigit,$lastPiCode);
					$piLastnumber = $explode[1];
					
					if($piLastdigit == $piprefix)
					{
						$picode = $piLastnumber+1;
						$digits = sprintf ('%04d', $picode);
						$picodewithPrefix = $piprefix.$digits;
					}
					else
					{
						$picodewithPrefix = $piprefix.'0001';
					}
				}
				else
				{
					$picodewithPrefix = $piprefix.'0001';
				}
				
				$data['picode'] = $picodewithPrefix;
				$data['piprefix'] = $piprefix;
			
				echo json_encode($data);
			}
		
	}
	
	
	public function add_po_indent()
	{	
		$Result_location = $this->mastersmodule->get_alllocation(); //** Get All Locations In Master's Model **//
		$this->data["locationdata"] = $Result_location['rows'];
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_user_name=$sessionData['user_first_name'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_user"] = $sess_user;
		$this->data["sess_user_name"] = $sess_user_name;
		
			
		if(isset($_POST['po_int_details']))
		{
			
			$intent_no = $this->security->xss_clean($this->input->post('purchse_ind_indentnum'));
			$vdrquo_vendor_id = $this->security->xss_clean($this->input->post('vdrquo_vendor_id'));
			$vendar_name = $this->security->xss_clean($this->input->post('vdrquo_vendor_name'));
			$created_by = $this->security->xss_clean($this->input->post('purchse_int_created'));
			$approved_by = $this->security->xss_clean($this->input->post('purchse_int_approver'));
			$intent_date = $this->security->xss_clean($this->input->post('intent_date'));
			$ind_status = $this->security->xss_clean($this->input->post('ind_status'));

			if($this->input->post('intent_date') != "")
			{
				$intent_date = date('Y-m-d', strtotime($this->input->post('intent_date')));
			}
			else
			{
				$intent_date = "0000-00-00";
			}
			
			$location = $this->security->xss_clean($this->input->post('purchse_int_loc'));
			
			$po_reference_no = $this->security->xss_clean($this->input->post('purchse_ind_quonum'));
			$po_purchase_order_id = $this->security->xss_clean($this->input->post('poindent_po_oder_id'));
			
			$po_item_name = $this->security->xss_clean($this->input->post('po_int_name'));
			$po_int_meas = $this->security->xss_clean($this->input->post('po_int_uom'));
			$po_oder_qty = $this->security->xss_clean($this->input->post('po_int_ordqty'));
			$po_rec_qty = $this->security->xss_clean($this->input->post('po_int_recev_qty'));
			$po_pend_qty = $this->security->xss_clean($this->input->post('po_int_pend_qty'));
			$po_remarks = $this->security->xss_clean($this->input->post('po_int_remarks'));
			
			
			$last_table_id =$this->input->post('last_table_id');
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$sno_id = $this->security->xss_clean($this->input->post('sno_id'));
			
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			//echo "<pre";print_r($last_table_id); 
			//echo "<pre";print_r($item_code); 
			//echo "<pre>"; print_r($sno_id); exit;
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$uom = $this->security->xss_clean($this->input->post('UOM_id'));
			$ordered_qty = $this->security->xss_clean($this->input->post('ordered_qty'));
			$received_qty = $this->security->xss_clean($this->input->post('received_qty'));
			$pending_qty = $this->security->xss_clean($this->input->post('pending_qty'));
			$item_name_hsn_sac = $this->security->xss_clean($this->input->post('item_name_hsn_sac'));
			
			$item_remark = $this->security->xss_clean($this->input->post('item_remark'));
			$build_qty = $this->security->xss_clean($this->input->post('build_qty'));
			$item_control_no = $this->security->xss_clean($this->input->post('item_control_no'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$item_expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));
			$extra_qty = $this->security->xss_clean($this->input->post('extra_qty'));
			
			$cus_dc_inv_date = $this->security->xss_clean($this->input->post('cus_dc_inv_date'));
	         if($this->input->post('cus_dc_inv_date') != "")
			{
				$cus_dc_inv_date = date('Y-m-d', strtotime($this->input->post('cus_dc_inv_date')));
			}
			else
			{
				$cus_dc_inv_date = "0000-00-00";
			}  
			
			
			$vdrquo_cus_dc_inv = $this->security->xss_clean($this->input->post('vdrquo_cus_dc_inv'));
			$purchase_carrier = $this->security->xss_clean($this->input->post('purchase_carrier'));
			$lr_number = $this->security->xss_clean($this->input->post('lr_number'));
			$item_pack_size = $this->security->xss_clean($this->input->post('item_pack_size'));
			$item_mfg_prtno = $this->security->xss_clean($this->input->post('item_mfg_prtno'));
			
			//$po_ref_no = $this->purchaseindentmodule->po_vaildation($randomstring);//** Valid PO Indent **//
			$store_id = $this->security->xss_clean($this->input->post('purchase_indent_store_id'));
			$division_id = $this->security->xss_clean($this->input->post('purchase_indent_division_id'));
			$product_type_id = $this->security->xss_clean($this->input->post('purchase_indent_product_type_id'));
			$item_brand = $this->security->xss_clean($this->input->post('item_brand'));
			$item_price = $this->security->xss_clean($this->input->post('item_price'));
			$item_total_price = $this->security->xss_clean($this->input->post('item_total_price'));
		
					
			if(!empty ($item_id))
			{
				$pur_indent_details = array(
				//'po_indent_number' => $randomstring,
				'po_indent_number' => $intent_no,
				'po_indent_vendor_id'=>$vdrquo_vendor_id,
				'po_indent_company_id'=>$sess_company,
				'po_indent_division_id'=>$division_id,
				'po_indent_prod_typ_id'=>$product_type_id,
				'po_indent_store_id'=>$store_id,
				'po_indent_create_by' => $created_by,
				'po_indent_approved_by' => $approved_by,
				'po_indent_date' => $intent_date,
				'po_indent_active_status' => $ind_status,
				'po_location' => $location,
				'po_cus_dc_inv' => $vdrquo_cus_dc_inv,
				'po_cus_dc_inv_date' => $cus_dc_inv_date,
				'po_purchase_carrier' => $purchase_carrier,
				'po_lr_number' => $lr_number,
				'po_reference_number' => $po_reference_no,
				'po_purchase_order_id' =>$po_purchase_order_id,
				'po_indent_add_date' => date('Y-m-d h:i:s'),
				'po_indent_created_by' =>$sess_user,
				'po_indent_updated_by' =>$sess_user,
				'po_indent_status' => 'enable'
				);
				
			
			$pur_indentid=$this->purchaseindentmodule->add_po_indent_details($pur_indent_details);//** Add Po Indent Details
				
				if(!empty ($item_id))
				{
					$result=count($item_id);
				//echo $result; exit;
					for($i=1; $i<=$result; $i++)
					{
						
						if(!empty($ordered_qty[$i]) && !empty($received_qty[$i]))
						{	
								$item_expiry_date[$i] = ($item_expiry_date[$i] !='')? date("Y-m-d", strtotime($item_expiry_date[$i])):'0000-00-00';
								
							$purchase_indent_items=array(
							
								'po_indent_item_indent_id'=>$pur_indentid,
								'po_indent_item_item_id'=>$item_id[$i],
								'po_indent_po_id'=>$sno_id[$i],
								'po_indent_item_code'=>$item_code[$i],
								'po_indent_item_name'=>$item_name[$i],
								'po_indent_item_sku'=>$item_mfg_prtno[$i],
								'po_indent_item_hsn_san'=>$item_name_hsn_sac[$i],
								'po_indent_item_control_no'=>$item_control_no[$i],
								'po_indent_item_batch_no'=>$item_batch_no[$i],
								'po_indent_item_expiry_date'=> $item_expiry_date[$i],
								'po_indent_item_pack_size'=>$item_pack_size[$i],
								'po_indent_uom_id'=>$uom[$i],
								'po_indent_item_brand'=>$item_brand[$i],
								'po_indent_item_price'=>$item_price[$i],
								'po_indent_order_qty'=>$ordered_qty[$i],
								'po_indent_received_qty'=>$received_qty[$i],
								'po_indent_build_qty'=>$build_qty[$i],
								'po_indent_pending_qty'=>$pending_qty[$i],
								'po_indent_extra_qty'=>$extra_qty[$i],
								'po_indent_item_total'=>$item_total_price[$i],
								'po_indent_item_remark'=>$item_remark[$i],
							);
						
						$this->purchaseindentmodule->add_po_ind_item_details($purchase_indent_items);//** Add PO Indent Items 
						 	
							$purchase_order_items=array(
								'po_items_qty'=>$pending_qty[$i]
							);
						$this->purchaseindentmodule->update_po_order_quantity($purchase_order_items,$item_id[$i],$po_purchase_order_id,$sno_id[$i]);//** Update Purchase Order Quantity **/
						}
					}
					
						$purchase_order_status=array(
							'po_po_status'=>'onprocess'
						);
					$this->purchaseindentmodule->update_po_order_status($purchase_order_status,$po_purchase_order_id);//** Purchase Order Status Change **//
				}

				$this->session->set_flashdata('message', 'Purchase Indent Added Successfully');
				redirect('purchaseindent/po_indent_list');
			}
			else
			{
				$this->session->set_flashdata('message', 'Purchase PO Number Already Exist');
				redirect('purchaseindent/po_indent_list');
			}
		}
		else
		{
			$this->title = "Purchase Indent";
			$this->keywords = "Purchase Indent";
			$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product Details **//
			$this->data["product_uom"] = $this->productmodule->get_alluom();//** Get All UOM **//
			$this->data["vendors"] = $this->vendormodule->getvendors_for_popup_grid();//** Vendor Pop-up Details **//
			$this->data["user"] = $this->purchaseindentmodule->getuser_list($sess_user);
			$this->data["store"] = $this->productmodule->get_all_store(); //** Get All store Details **//
			$this->_render('pages/purchaseindent/addindent');
		}
	}
	
	//** Edit PO Indent **//
	
	public function edit_po_indent($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_user_name=$sessionData['user_first_name'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_user"] = $sess_user;
		$this->data["sess_user_name"] = $sess_user_name;
	
	if(isset($_POST['edit_po_int_details']))
	{
		$intent_no = $this->security->xss_clean($this->input->post('purchse_ind_indentnum'));
		$pur_ind_id = $this->security->xss_clean($this->input->post('pur_ind_id'));
		$vendar_name = $this->security->xss_clean($this->input->post('vdrquo_vendor_name'));
		$vdrquo_vendor_id = $this->security->xss_clean($this->input->post('vdrquo_vendor_id'));
		$created_by = $this->security->xss_clean($this->input->post('purchse_int_created'));
		$ind_status = $this->security->xss_clean($this->input->post('ind_status'));
		$approved_by = $this->security->xss_clean($this->input->post('purchse_int_approver'));
		$intent_date = $this->security->xss_clean($this->input->post('intent_date'));
	
		if($this->input->post('intent_date') != "")
		{
			$intent_date = date('Y-m-d', strtotime($this->input->post('intent_date')));
		}
		else
		{
			$intent_date = "0000-00-00";
		}
	
		$location = $this->security->xss_clean($this->input->post('purchse_int_loc'));
		$po_reference_no = $this->security->xss_clean($this->input->post('purchse_ind_quonum'));
		$po_purchase_order_id = $this->security->xss_clean($this->input->post('poindent_po_oder_id'));
		
		$po_item_name = $this->security->xss_clean($this->input->post('po_int_name'));
		$po_int_meas = $this->security->xss_clean($this->input->post('po_int_uom'));
		$po_oder_qty = $this->security->xss_clean($this->input->post('po_int_ordqty'));
		$po_rec_qty = $this->security->xss_clean($this->input->post('po_int_recev_qty'));
		$po_pend_qty = $this->security->xss_clean($this->input->post('po_int_pend_qty'));
		$po_remarks = $this->security->xss_clean($this->input->post('item_remark'));
		
		$last_table_id =$this->input->post('last_table_id');
		$item_id = $this->security->xss_clean($this->input->post('item_id'));
		$sno_id = $this->security->xss_clean($this->input->post('sno_id'));
		$po_id = $this->security->xss_clean($this->input->post('po_id'));
		$item_code = $this->security->xss_clean($this->input->post('item_code'));
		$item_name = $this->security->xss_clean($this->input->post('item_name'));
		$uom = $this->security->xss_clean($this->input->post('UOM_id'));
		$ordered_qty = $this->security->xss_clean($this->input->post('ordered_qty'));
		$received_qty = $this->security->xss_clean($this->input->post('received_qty'));
		$pending_qty = $this->security->xss_clean($this->input->post('pending_qty'));
		$item_control_no = $this->security->xss_clean($this->input->post('item_control_no'));
		$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
		$item_expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));
		$item_brand = $this->security->xss_clean($this->input->post('item_brand'));
		$extra_qty = $this->security->xss_clean($this->input->post('extra_qty'));
		$item_pack_size = $this->security->xss_clean($this->input->post('item_pack_size'));
		$vdrquo_cus_dc_inv = $this->security->xss_clean($this->input->post('vdrquo_cus_dc_inv'));
	    $purchase_carrier = $this->security->xss_clean($this->input->post('purchase_carrier'));
	    $lr_number = $this->security->xss_clean($this->input->post('lr_number'));
		$cus_dc_inv_date = $this->security->xss_clean($this->input->post('cus_dc_inv_date'));
		$build_qty = $this->security->xss_clean($this->input->post('build_qty'));
		$store_id = $this->security->xss_clean($this->input->post('purchase_indent_store_id'));
		$division_id = $this->security->xss_clean($this->input->post('purchase_indent_division_id'));
		
		$item_price = $this->security->xss_clean($this->input->post('item_price'));
		$item_total_price = $this->security->xss_clean($this->input->post('item_total_price'));
	    
		if($this->input->post('cus_dc_inv_date') != "")
		{
			$cus_dc_inv_date = date('Y-m-d', strtotime($this->input->post('cus_dc_inv_date')));
		}
		else
		{
			$cus_dc_inv_date = "0000-00-00";
		}  
	
		$pur_indent_details = array(
			'po_indent_number' => $intent_no,
			'po_indent_vendor_id' => $vdrquo_vendor_id,
			'po_indent_company_id'=>$sess_company,
			'po_indent_division_id'=>$division_id,
			'po_indent_store_id'=>$store_id,
			'po_indent_create_by' => $created_by,
			'po_indent_approved_by' => $approved_by,
			'po_indent_active_status' => $ind_status,
			'po_indent_date' => $intent_date,
			'po_location' => $location,
			'po_cus_dc_inv' => $vdrquo_cus_dc_inv,
			'po_cus_dc_inv_date' => $cus_dc_inv_date,
			'po_purchase_carrier' => $purchase_carrier,
			'po_lr_number' => $lr_number,
			'po_reference_number' => $po_reference_no,
			'po_purchase_order_id' =>$po_purchase_order_id,
			'po_indent_update_date' => date('Y-m-d h:i:s'),
			'po_indent_updated_by' =>$sess_user,
			'po_indent_status' => 'enable',
		);
		
		$this->purchaseindentmodule->update_purchase_indent($pur_indent_details,$id);//** Update PO Indent Details **//
	
		if(!empty ($item_id))
		{
			$result=count($item_id);
		
			for($i=1; $i<=$result; $i++)
			{
				if(!empty($ordered_qty[$i]) && !empty($received_qty[$i]))
				{
					$item_expiry_date[$i] = ($item_expiry_date[$i] !='')? date("Y-m-d", strtotime($item_expiry_date[$i])):'0000-00-00';
					
			  $purchase_indent_items=array(
								'po_indent_item_indent_id'=>$id,
								'po_indent_item_item_id'=>$item_id[$i],
								'po_indent_po_id'=>$po_id[$i],
								'po_indent_item_code'=>$item_code[$i],
								'po_indent_item_name'=>$item_name[$i],
								'po_indent_item_control_no'=>$item_control_no[$i],
								'po_indent_item_batch_no'=>$item_batch_no[$i],
								'po_indent_item_expiry_date'=>$item_expiry_date[$i],
								'po_indent_item_pack_size'=>$item_pack_size[$i],
								'po_indent_uom_id'=>$uom[$i],
								'po_indent_item_brand'=>$item_brand[$i],
								'po_indent_item_price'=>$item_price[$i],
								'po_indent_order_qty'=>$ordered_qty[$i],
								'po_indent_build_qty'=>$build_qty[$i],
								'po_indent_received_qty'=>$received_qty[$i],
								'po_indent_pending_qty'=>$pending_qty[$i],
								'po_indent_extra_qty'=>$extra_qty[$i],
								'po_indent_item_total'=>$item_total_price[$i],
								'po_indent_item_remark'=>$po_remarks[$i],
							);
					
					
				 $this->purchaseindentmodule->update_purchase_indent_Item_details($purchase_indent_items, $id, $item_id[$i],$sno_id[$i]);//** Update PO Indent Item Details **//
				 
				 $update_ord_qty =array(
									'po_items_qty'=>$pending_qty[$i],
								);
				 
				 $this->purchaseindentmodule->update_purchaseindent_Item_ordqty_details($update_ord_qty, $id, $po_purchase_order_id, $item_id[$i],$po_id[$i]);//** Update PO Indent Item Details **//
			  
					if($ind_status == 'approved')
					{
					
					$valid=$this->purchaseindentmodule->vaild_stock_item($item_id[$i]);
											
						if(!empty($item_id))
		               {
		                	$result=count($item_id);
		
		           	for($i=1; $i<=$result; $i++)
			       {
					   if(!empty($received_qty[$i]))
				{
				$item_expiry_date[$i] = ($item_expiry_date[$i] !='')? date("Y-m-d", strtotime($item_expiry_date[$i])):'0000-00-00';
				$stock_up_data_new=array(
								'inventory_gr_no'=>$intent_no,
								'inventory_gr_id'=>$pur_ind_id[$i],
								'inventory_item_id'=>$item_id[$i],
								'inventory_uom_id'=>$uom[$i],
								'inventory_control_no'=>$item_control_no[$i],
								'inventory_batch_no'=>$item_batch_no[$i],
								'inventory_expiry_date'=>$item_expiry_date[$i],
								'inventory_received_qty'=>$received_qty[$i],
								'inventory_qty'=>$received_qty[$i],
								'inventory_add_date'=>$intent_date,
								'inventory_add_by'=>$sess_user,
								'inventory_update_by'=>$sess_user,
								'inventory_created_date'=>date('Y-m-d'),
							);
							
							//echo "<pre>"; print_r($stock_up_data_new); exit;
				$inventory_id = $this->purchaseindentmodule->update_stock_new($stock_up_data_new);
				//echo $inventory_id; exit;
				//$pur_indentid=$this->purchaseindentmodule->update_stock_new($pur_indent_details);//** Add Po Indent Details
				
				
					
			  $purchase_indent_items=array(
								'po_indent_item_inventory_id'=>$inventory_id,
							);
					
					
				 $this->purchaseindentmodule->update_purchase_indent_Item_details($purchase_indent_items, $id, $item_id[$i],$sno_id[$i]);//** Update PO Indent Item Details **//
				
				
				
				}
			}
					   }
					
			}}}
		
			$get_po_items=$this->purchaseindentmodule->get_po_items($po_purchase_order_id);
		
			if(empty($get_po_items))
				{
				$purchase_order_status=array(
				'po_po_status'=>'delivered'
				);
				}
				else
				{
				$purchase_order_status=array(
					'po_po_status'=>'onprocess'
				);
				}
				
			$this->purchaseindentmodule->update_po_order_status($purchase_order_status,$po_purchase_order_id);//** Update Purchase Order Status **//
		}	
		
		$this->session->set_flashdata('message', 'Purchase Indent Updated Successfully');
		redirect('purchaseindent/po_indent_list');
		}
		else
		{
			$this->data["edit_indent"] = $this->purchaseindentmodule->edit_single_purchase_indent($id);//** Get Single PO Indent Details **//
			$this->data["edit_indent_items"] = $this->purchaseindentmodule->edit_single_po_indent_items($id);//** Get Single PO Indent Item Details **//
			$this->title = "Purchase Indent";
			$this->keywords = "Purchase Indent";
			$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			$this->data["user"] = $this->purchaseindentmodule->getuser_list($sess_user);
			$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product Details **//
			$this->data["product_uom"] = $this->productmodule->get_alluom();//** Get All UOM **//
			$this->data["vendors"] = $this->vendormodule->getvendors_for_popup_grid();//** Vendor Pop-up Details **//
			$Result_location = $this->mastersmodule->get_alllocation();//** Get All Locations In Master's Model **//
			$this->data["locationdata"] = $Result_location['rows'];
			
			$this->_render('pages/purchaseindent/editindent');
		}
	}

	public function view_po_indent($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["edit_indent"] = $this->purchaseindentmodule->edit_single_purchase_indent($id);//** Get Single PO Indent Details **//
		$this->data["edit_indent_items"] = $this->purchaseindentmodule->edit_single_po_indent_items($id);//** Get Single PO Indent Item Details **//
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		$Result_carrier=$this->mastersmodule->get_allcarrier();
		$this->data["carrier"] = $Result_carrier['rows'];
		$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product Details **//
		$this->data["product_uom"] = $this->productmodule->get_alluom();//** Get All UOM **//
		$this->data["vendors"] = $this->vendormodule->getvendors_for_popup_grid();//** Vendor Pop-up Details **//
		$Result_location = $this->mastersmodule->get_alllocation();//** Get All Locations In Master's Model **//
		$this->data["locationdata"] = $Result_location['rows'];
		
		$this->_render('pages/purchaseindent/viewindent');
	}
	
	public function view_po_indent_export()
	{
		$id = $this->input->post('search_id');
		
		$this->data["edit_indent_items"] = $this->purchaseindentmodule->edit_single_po_indent_items($id);
	
		//** Get Single PO Indent Item Details **//
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		
		$this->load->view('pages/purchaseindent/viewindent_export',$this->data);
	}
	
	public function view_po_indent_excess()
	{
		$id = $this->input->post('search_id');
		
		$this->data["edit_indent_items"] = $this->purchaseindentmodule->edit_single_po_indent_items($id);
	
		//** Get Single PO Indent Item Details **//
		$this->title = "Purchase Indent";
		$this->keywords = "Purchase Indent";
		
		$this->load->view('pages/purchaseindent/view_po_excess',$this->data);
	}
	
	//** Print PO Indent **//
	
	public function print_po_indent($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$this->data["sess_company"] = $sess_company;
		
		$this->data["compny_det"] = $this->purchaseindentmodule->compny_details($sess_company);//** Company Details **//
		$this->data["edit_indent"] = $this->purchaseindentmodule->edit_single_purchase_indent($id);//** Get Single PO Indent Details **//
		$this->data["edit_indent_items"] = $this->purchaseindentmodule->edit_single_po_indent_items($id);//** Get Single PO Indent Item Details **//
		$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product Details **//
		$this->data["product_uom"] = $this->productmodule->get_alluom();//** Get All UOM **//
		$this->data["vendors"] = $this->vendormodule->getvendors_for_popup_grid();//** Vendor Pop-up Details **//
		$this->data["purchase_order"] = $this->purchasemodule->getpurchaseorder_for_popup_grid();
		$Result_location = $this->mastersmodule->get_alllocation();//** Get All Locations In Master's Model **//
		$this->data["locationdata"] = $Result_location['rows'];
		
		$this->load->view('pages/purchaseindent/print_po_indent',$this->data);
	}
	
	//** Purchase Indent Status **//
	
	public function deletepurchaseindent($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		
		if($status == 'enable')
		{
			$changeStatus = 'disable';
		}
		else
		{
			$changeStatus = 'enable';
		}
		
		$poindentdata = array(
		'po_indent_status' => $changeStatus,
		'po_indent_update_date' => date('Y-m-d'),
		'po_indent_updated_by'=>$userid,
		);				
		$this->purchaseindentmodule->update_purchaseindent_status($poindentdata,$id); 
		$this->session->set_flashdata('message', 'Purchase Indent Deleted Successfully');
		redirect('purchaseindent/po_indent_list');
	}
	
	//** Get Purchase Order for Append Values POp-up **//
	
	public function getpurchase_order()
	{
		$request = $this->input->post('purchaseOrderId');
		$this->data["purchase_order"] = $this->purchasemodule->getpurchase_orderitems($request);
		echo $this->load->view('pages/purchaseindent/purchase_order_append_popup.php',$this->data,true);
		exit;
	}
	
	//** Get Purchase Order for POp-up **//
	
	public function getpurchaseorderpopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["purchase_order"] = $this->purchaseindentmodule->getpurchaseorder_for_popup_grid($sess_group,$sess_company);
		//echo "<pre>";	print_r($this->data["purchase_order"]);
		
		$result = $this->load->view("pages/purchaseindent/purchase_order_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	
	public function getpurchaseindent_code()
	{
		$division_id =  $this->security->xss_clean($this->input->post('po_store_division_id'));
		$product_type_id =  $this->security->xss_clean($this->input->post('product_type_id'));
		
		//*****************//
		
		if($division_id == 1 && $product_type_id == 1)
		{
		$prefix = $this->purchasemodule->getprefix('44');//** Get Prefix data for Purchase Order **//
		}
		elseif($division_id == 1 && $product_type_id == 3)
		{
			$prefix = $this->purchasemodule->getprefix('45');
		}
		elseif($division_id == 2 && $product_type_id == 1)
		{
			$prefix = $this->purchasemodule->getprefix('46');
		}
		elseif($division_id == 2 && $product_type_id == 3)
		{
			$prefix = $this->purchasemodule->getprefix('47');
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

		$code = $this->purchaseindentmodule->getlast_divisionid($division_id,$product_type_id);//** Get Last Id for PurchaseOrder **//
		
		if(!empty($code))
		{
			$lastPoCode = $code->po_indent_number;
			
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
	
	//** Purchase Order Search in Pop-up **//
	
	public function searchpurchaseorder()
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$po_code=$this->security->xss_clean($this->input->post('po_code'));
		$vendor_name=$this->security->xss_clean($this->input->post('vendor_name'));
		
		$this->data['purchase_order'] = $this->purchaseindentmodule->getpurchaseordersearch($po_code,$vendor_name,$sess_group,$sess_company);
		
		$result = $this->load->view("pages/purchaseindent/searchpurchaseorder_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	
	
}