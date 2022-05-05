<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory  extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		   $this->load->helper('security');
		  $this->load->library('pagination');
		  $this->load->model('inventorymodule');
		  $this->load->model('mastersmodule');
		  $this->load->model('salesordermodule');
		  $this->load->model('productmodule');
		   $this->load->model('materialrequestmodule');
		   $this->load->model('accountmodule');
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
		
		redirect('inventory/stock_list');
		//$this->creditnotes();
	}

	
	public function search_stock_list($sort_order='inventory_id',$sort_by='desc')
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
		//$search_item_code = $this->security->xss_clean($this->input->post('search_item_code'));
		$search_item_name = $this->security->xss_clean($this->input->post('search_item_name'));
		$search_mft_code = $this->security->xss_clean($this->input->post('search_mft_code'));
		$search_range = $this->security->xss_clean($this->input->post('search_range'));
		$search_division_id = $this->security->xss_clean($this->input->post('search_division_id'));
		$search_item_type_id = $this->security->xss_clean($this->input->post('search_item_type_id'));
		
		$stock_search= array(
				//'search_stk_item_code' => $search_item_code,
				'search_item_name' =>$search_item_name,
				'search_mft_code' =>$search_mft_code,
				'search_range' =>$search_range,
				'search_division_id' =>$search_division_id,
				'search_item_type_id' =>$search_item_type_id,
				);	
		
				
		$this->session->set_userdata('stock_data',$stock_search);
		}
			$search_data = $this->session->userdata('stock_data');
						
			//$search_stk_item_code = $search_data['search_stk_item_code'];
			$search_item_name = $search_data['search_item_name'];
			$search_mft_code = $search_data['search_mft_code'];
			$search_range = $search_data['search_range'];
			$search_division_id = $search_data['search_division_id'];
			$search_item_type_id = $search_data['search_item_type_id'];
		
			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =20;
			
			$Result_search = $this->inventorymodule->getsearchData($sess_group,$sess_company,$search_item_name,$search_mft_code,$search_range,$search_division_id,$search_item_type_id,$limit,$page,$sort_order,$sort_by);
		
			$this->data["indent_list"] = $Result_search['rows'];
			$this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); 
		  $this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('inventory/search_stock_list/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result_search['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "Stock";
			$this->keywords = "Stock";
				
		$this->_render('pages/inventory/stock_list');
		}
	
	public function stock_list($sort_order='inventory_id',$sort_by='desc')
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->session->userdata('stock_data');
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =20;
		  $Result=$this->inventorymodule->inventory_list($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		  $this->data["indent_list"] = $Result['rows'];	
		  //echo $Result['num_rows'];
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('inventory/stock_list/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  //echo $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links();
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;    
		  $this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); 
		  $this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		   
		  $this->title = "Stock";
		  $this->keywords = "Stock";
		  $this->_render('pages/inventory/stock_list');
		
	}
	
	public function stock_export()
	{
	if(isset($_POST['export']))
		{
			$this->data["inventory_stock"] = $this->inventorymodule->inventory_items_list();
			
			$this->title = "Inventory Stock";
			$this->keywords = "Inventory Stock";
			$this->load->view('pages/inventory/pdf/inventory_stock_reports',$this->data);
			
		}
	}
		
		
	public function stock_fd_list($sort_order='inventory_id',$sort_by='desc')
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->session->userdata('stock_data');
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =20;
		  $Result=$this->inventorymodule->inventory_list($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		  $this->data["indent_list"] = $Result['rows'];	
		  //echo $Result['num_rows'];
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('inventory/stock_list/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  //echo $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links();
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;    
		   
		  $this->title = "Stock";
		  $this->keywords = "Stock";
		  $this->_render('pages/inventory/stock_list');
		
	}
	
	public function openingstock($sort_order='opening_stock_id',$sort_by='desc')
	{
	 
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result=$this->inventorymodule->opening_stk_list($limit,$page,$sort_order,$sort_by);
		$this->data["op_stk_list"] = $Result['rows'];	
		$this->session->unset_userdata('opening_stock_data');
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('inventory/openingstock/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;	 
		$this->data["loc_list"] = $this->inventorymodule->loc_list();	

		$this->title = "Opening Stock";
		$this->keywords = "Opening Stock";
		$this->_render('pages/inventory/opening_stk_list/opening_stk');
		 
	}
	
	
	//** Search Opening stock **//
	
	 public function search_opening_stock($sort_order='opening_stock_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
			 
		if(isset($_POST['search']))
		{
			$search_stock_code = $this->security->xss_clean($this->input->post('search_stock_code'));
			$search_status = $this->security->xss_clean($this->input->post('search_status'));
			$search_loc =$this->security->xss_clean($this->input->post('search_loc'));
 			
			$from_date = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date));
			$to_date = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date));
			
			$opening_stock_search= array(
					'search_stock_code' =>$search_stock_code,
					'search_loc' => $search_loc,
					'search_status' => $search_status,
					'from_date' => $from_date,
					'to_date' => $to_date,
					);	
			$this->session->set_userdata('opening_stock_data',$opening_stock_search);
		}
		
			$search_data = $this->session->userdata('opening_stock_data');			
			$search_stock_code = $search_data['search_stock_code'];
			$search_loc = $search_data['search_loc'];
			$search_status = $search_data['search_status'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];	
 
 			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			
			$Result = $this->inventorymodule->get_search_opn_stock($sess_company,$search_stock_code,$search_loc,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date);
			
			$this->data["op_stk_list"] = $Result['rows'];
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('inventory/search_opening_stock').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
			$this->data["loc_list"] = $this->inventorymodule->loc_list();	
			$this->title = "Opening Stock";
			$this->keywords = "Opening Stock";
			$this->_render('pages/inventory/opening_stk_list/opening_stk');
	} 
	
	
	
	public function view_opening_stk($id)
	{	
		$this->data["view_opstk"] = $this->inventorymodule->view_single_opstk($id);
		$this->data["view_opstk_items"] = $this->inventorymodule->view_single_opstk_items($id);
		
		$this->title = "Opening Stock";
		$this->keywords = "Opening Stock";
		$this->_render('pages/inventory/opening_stk_list/view_opening_stk');
		
	}
	
	public function addopeningstock()
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$Result_location = $this->mastersmodule->get_alllocation();
		$this->data["locationdata"] = $Result_location['rows'];
		$prefix = $this->inventorymodule->getprefix('13');
		$opsprefix = $prefix->prefix_name;
		$code = $this->inventorymodule->getlastid_ops();
		if(!empty($code))
		{
			$lastOpsCode = $code->opening_stock_code;
			$lengthPrefix = strlen($opsprefix);
			$strSplit = str_split($lastOpsCode, $lengthPrefix);
			$OpsLastdigit = $strSplit[0];
			$explode = explode($OpsLastdigit,$lastOpsCode);
			$OpsLastnumber = $explode[1];
			if($OpsLastdigit == $opsprefix)
			{
				$Opscode = $OpsLastnumber+1;
				$digits = sprintf ('%04d', $Opscode);
				$OpscodewithPrefix = $opsprefix.$digits;
			}
			else
			{
				$OpscodewithPrefix = $opsprefix.'0001';
			}
		}
		else
		{
			$OpscodewithPrefix = $opsprefix.'0001';
		}
		
		$this->data['Opscode'] = $OpscodewithPrefix;
		$this->data['opsprefix'] = $opsprefix;
		$randomstring = $OpscodewithPrefix;
		if(isset ($_POST['open_stk_add']))
		{
			$open_stk_code = $this->security->xss_clean($this->input->post('open_stk_code'));
			$product_type = $this->security->xss_clean($this->input->post('product_type'));
			$opt_stk_loc = $this->security->xss_clean($this->input->post('opt_stk_loc'));
			$opt_stk_adddate = $this->security->xss_clean($this->input->post('opt_stk_adddate'));
			if($this->input->post('opt_stk_adddate') != "")
			{
				$opt_stk_adddate = date('Y-m-d', strtotime($this->input->post('opt_stk_adddate')));
			}
			else
			{
				$opt_stk_adddate = "0000-00-00";
			}
			
			$opt_stk_appr_by = $this->security->xss_clean($this->input->post('opt_stk_appr_by'));
			$opt_stk_status = $this->security->xss_clean($this->input->post('opt_stk_status'));
			$item_id = $this->security->xss_clean($this->input->post('grid_item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$UOM_id = $this->security->xss_clean($this->input->post('UOM_id'));
			$UOM_name = $this->security->xss_clean($this->input->post('UOM_name'));
			$quantity = $this->security->xss_clean($this->input->post('quantity'));
			$item_name_hsn_sac = $this->security->xss_clean($this->input->post('item_name_hsn_sac'));
			$item_control_no = $this->security->xss_clean($this->input->post('item_control_no'));
			$item_batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$item_expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));
			$item_expiry_dates = $this->security->xss_clean($this->input->post('item_expiry_date'));
			$material_store_id = $this->security->xss_clean($this->input->post('material_store_id'));
			$material_store_division_id = $this->security->xss_clean($this->input->post('material_store_division_id'));
			$validop_stk= $this->inventorymodule->op_stk_vaildation($open_stk_code);
			
			if($validop_stk == 0)
			{
			$opstk_details=array(
				'opening_stock_code'=>$open_stk_code,
				'opening_stock_prd_type_id'=>$product_type,
				'opening_stock_location_id'=>$opt_stk_loc,
				'opening_stock_approved_by_id'=>$sess_user,
				'opening_stock_status'=>$opt_stk_status,
				'opening_stock_added_on'=>$opt_stk_adddate,
				'opening_stock_created_by'=>$sess_user,
				'opening_stock_added_date'=>date('Y-m-d h:i:s'),
				'opening_stock_updated_by'=>$sess_user,
				'opening_stock_active_status'=>'active'
				);
		
			// echo"<pre>";print_r($opstk_details);
			//$opstkid='1'; echo "<br>"; 

		$opstkid= $this->inventorymodule->add_op_stk_details($opstk_details);
								
			if(!empty ($item_id))
				{
				$result=count($item_id);
				for($i=1; $i<=$result; $i++)
					{
						$item_expiry_date[$i] = ($item_expiry_date[$i] !='')? date("Y-m-d", strtotime($item_expiry_date[$i])):'0000-00-00';
						$stock_up_data_new=array(
								
								'inventory_item_id'=>$item_id[$i],
								'inventory_gr_no'=>'Opening Stock',
								'inventory_gr_id'=> 118,
								'inventory_uom_id'=>$UOM_id[$i],
								'inventory_control_no'=>$item_control_no[$i],
								'inventory_batch_no'=>$item_batch_no[$i],
								'inventory_expiry_date'=>$item_expiry_date[$i],
								'inventory_received_qty'=>$quantity[$i],
								'inventory_qty'=>$quantity[$i],
								'inventory_qc_status'=> 1,
								'inventory_add_date'=>date('Y-m-d'),
								'inventory_add_by'=>$sess_user,
								'inventory_update_by'=>$sess_user,
							);
							
							//echo "<pre>"; print_r($stock_up_data_new); 
				$this->inventorymodule->update_stock_new($stock_up_data_new);
						
					if(!empty($quantity[$i]))
						{ 
					          $item_expiry_dates[$i] = ($item_expiry_dates[$i] !='')? date("Y-m-d", strtotime($item_expiry_dates[$i])):'0000-00-00';
							$op_stk_items=array(
								'opt_stk_items_opening_stock_id'=>$opstkid,
								'opt_stk_items_item_id'=>$item_id[$i],
								'opt_stk_item_name_hsn_sac'=>$item_name_hsn_sac[$i],
								'opt_stk_item_store_division_id'=>$material_store_division_id[$i],
								'opt_stk_item_store_id'=>$material_store_id[$i],
								'opt_stk_item_control_no'=>$item_control_no[$i],
								'opt_stk_item_batch_no'=>$item_batch_no[$i],
								'opt_stk_item_expiry_date'=>$item_expiry_dates[$i],
								'opt_stk_items_qty'=>$quantity[$i],
								'opt_stk_items_uom_id'=>$UOM_id[$i],
								);
									
				//echo"<pre>";print_r($op_stk_items); exit;
							$valid=$this->inventorymodule->vaild_stock_item($item_id[$i]);
						
							if($valid == 1)
							{
								$get_stk_qty=$this->inventorymodule->get_stk_qty($item_id[$i]);	
								$old_qty= $get_stk_qty->inventory_qty;
								$cur_quty= $quantity[$i];
								$now_stock=$cur_quty+$old_qty;
								$op_stock_data=array(
											  'inventory_qty'=>$now_stock,
											  'inventory_update_date'=>date('Y-m-d'),
											  'inventory_update_by'=>$sess_user,
											  );
											// echo"<pre>";print_r($op_stock_data);echo "<br>"; 
								$this->inventorymodule->update_stock($op_stock_data,$item_id[$i]);
							}
							else
							{
								$op_stock_add_data=array(
											  'inventory_item_id'=>$item_id[$i],
											  'inventory_qty'=>$quantity[$i],
											  'inventory_uom_id'=>$UOM_id[$i],
											  'inventory_add_date'=>date('Y-m-d'),
											  'inventory_update_date'=>date('Y-m-d'),
											  'inventory_update_by'=>$sess_user,
											  );
										//echo"<pre>";print_r($op_stock_add_data);echo "<br>"; exit;	 
								$this->inventorymodule->insert_inv_stock($op_stock_add_data);
							
							}
							$this->inventorymodule->add_opstk_item_details($op_stk_items);
							
						}
					}
				}	
	 		$this->session->set_flashdata('message', 'Opening Stock  Added Successfully');
			redirect('inventory/openingstock');
			}
		}
		$this->title = "Opening Stock";
		$this->keywords = "Opening Stock";
		$this->data["users"] =$this->accountmodule->users_list($sess_group,$sess_company);
		$this->data["store_division"] = $this->productmodule->get_all_store_division(); 
		$this->data['userid'] = $sess_user;
		$this->data["product_type"] = $this->inventorymodule->get_allproducttypes($sess_group,$sess_company);
		$this->_render('pages/inventory/opening_stk_list/addopening_stk');
	}
	
	public function adjustment_stock($sort_order='stock_adjustments_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result=$this->inventorymodule->adj_stk_list($limit,$page,$sort_order,$sort_by);
		$this->data["adj_stk_list"] = $Result['rows'];	
		
		$this->session->unset_userdata('adj_stock_data');
		
		//echo"<PRE>";print_r($Result);exit;
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='false';
		$config['last_link']='false';
		$config['base_url'] = site_url('inventory/adjustment_stock/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;    
		$this->data["loc_list"] = $this->inventorymodule->loc_list(); 
		$this->title = "Stock Adjustment";
		$this->keywords = "Stock Adjustment";
		$this->_render('pages/inventory/adjustment_stk/adjustment_stk_list');
	}
	
	//** Search Opening stock **//
	
	 public function search_stock_adjustment($sort_order='stock_adjustments_id',$sort_by='desc')
	{
		//echo "test";exit;
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
			 
		if(isset($_POST['search']))
		{
			$search_stock_code = $this->security->xss_clean($this->input->post('search_stock_code'));
			$search_status = $this->security->xss_clean($this->input->post('search_status'));
			$search_loc =$this->security->xss_clean($this->input->post('search_loc'));
 			
			$from_date_val = $this->security->xss_clean($this->input->post('from_date'));
			$from_date =date("Y-m-d", strtotime($from_date_val));
			$to_date_val = $this->security->xss_clean($this->input->post('to_date'));
			$to_date =date("Y-m-d", strtotime($to_date_val));
			
			$req_search= array(
					'search_stock_code' => $search_stock_code,
					'search_status' =>$search_status,
					'search_loc' => $search_loc,
					'from_date' => $from_date,
					'to_date' => $to_date,
					);	
			$this->session->set_userdata('req_search',$req_search);
			
		}
			$search_data = $this->session->userdata('req_search');			
			$search_stock_code = $search_data['search_stock_code'];
			$search_status = $search_data['search_status'];
			$search_loc= $search_data['search_loc'];
			$from_date = $search_data['from_date'];
			$to_date = $search_data['to_date'];
 
 			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			
			$Result = $this->inventorymodule->get_search_adj_stock($sess_company,$search_stock_code,$search_loc,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date);
			
			$this->data["adj_stk_list"] = $Result['rows'];
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('inventory/search_stock_adjustment').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
		$this->data["loc_list"] = $this->inventorymodule->loc_list(); 
		$this->title = "Stock Adjustment";
		$this->keywords = "Stock Adjustment";
		$this->_render('pages/inventory/adjustment_stk/adjustment_stk_list');
	} 
	
	
	public function add_adjustment_stock()
	{	
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		$prefix = $this->inventorymodule->get_adj_stk_prefix('16');
		
		$adj_stkPrefix = $prefix->prefix_name;

		$code = $this->inventorymodule->getlast_adj_stk_id();
		
		
		if(!empty($code))
		{
			
			$lastAdj_stk_Code = $code->stock_adjustments_code;
			
			$lengthPrefix = strlen($adj_stkPrefix);
			$strSplit = str_split($lastAdj_stk_Code, $lengthPrefix);
			$stk_adj_Lastdigit = $strSplit[0];
			
			$explode = explode($stk_adj_Lastdigit,$lastAdj_stk_Code);
			$adj_stk_Lastnumber = $explode[1];
			
			if($stk_adj_Lastdigit == $adj_stkPrefix)
			{
				$adj_stkcode = $adj_stk_Lastnumber+1;
				
				$digits = sprintf ('%04d', $adj_stkcode);
				$adj_stkcodewithPrefix = $adj_stkPrefix.$digits;
			}
			else
			{
				$adj_stkcodewithPrefix = $adj_stkPrefix.'0001';
			}
		}
		else
		{
			
			$adj_stkcodewithPrefix = $adj_stkPrefix.'0001';
		}
		
		
		$this->data['adj_stkcode'] = $adj_stkcodewithPrefix;
		$this->data['adj_stkPrefix'] = $adj_stkPrefix;
			
		$randomstring = $adj_stkcodewithPrefix;
			
		
		
		if(isset($_POST['adj_stk_add']))
		{
			 
		$prefix = $this->inventorymodule->get_adj_stk_prefix('16');
		
		$adj_stkPrefix = $prefix->prefix_name;

		$code = $this->inventorymodule->getlast_adj_stk_id();
		
		
		if(!empty($code))
		{
			
			$lastAdj_stk_Code = $code->stock_adjustments_code;
			
			$lengthPrefix = strlen($adj_stkPrefix);
			$strSplit = str_split($lastAdj_stk_Code, $lengthPrefix);
			$stk_adj_Lastdigit = $strSplit[0];
			
			$explode = explode($stk_adj_Lastdigit,$lastAdj_stk_Code);
			$adj_stk_Lastnumber = $explode[1];
			
			if($stk_adj_Lastdigit == $adj_stkPrefix)
			{
				$adj_stkcode = $adj_stk_Lastnumber+1;
				
				$digits = sprintf ('%04d', $adj_stkcode);
				$adj_stkcodewithPrefix = $adj_stkPrefix.$digits;
			}
			else
			{
				$adj_stkcodewithPrefix = $adj_stkPrefix.'0001';
			}
		}
		else
		{
			
			$adj_stkcodewithPrefix = $adj_stkPrefix.'0001';
		}
		
		
		//$this->data['adj_stkcode'] = $adj_stkcodewithPrefix;
			 
			$item_check = $this->security->xss_clean($this->input->post('item_check'));
			 
			//$adj_stk_code = $this->security->xss_clean($this->input->post('adj_stk_code'));
			$adj_stk_code = $adj_stkcodewithPrefix;
			$adj_stk_loc = $this->security->xss_clean($this->input->post('adj_stk_loc'));
			$adj_stk_appr_by = $this->security->xss_clean($this->input->post('adj_stk_appr_by'));
			$adj_stk_status = $this->security->xss_clean($this->input->post('adj_stk_status'));
			$adj_stk_cause = $this->security->xss_clean($this->input->post('adj_stk_cause'));
			$adj_stk_reason = $this->security->xss_clean($this->input->post('adj_stk_reason'));
			$adj_stk_date = $this->security->xss_clean($this->input->post('adj_stk_date'));

			
			$inventory_id = $this->security->xss_clean($this->input->post('item_inventory_id'));
			$item_id = $this->security->xss_clean($this->input->post('grid_item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_uom_id = $this->security->xss_clean($this->input->post('UOM_id'));
			$inv_qty = $this->security->xss_clean($this->input->post('quantity'));
			$inv_id = $this->security->xss_clean($this->input->post('inv_id'));
			$curr_qty = $this->security->xss_clean($this->input->post('cur_qty'));
			$adj_qty = $this->security->xss_clean($this->input->post('adj_qty'));
			
			$control_no = $this->security->xss_clean($this->input->post('item_control_no'));
			$batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));
			$arn_no = $this->security->xss_clean($this->input->post('item_arn_no'));
			
			/*  echo"<pre>";print_r($item_uom_id);
			$curr_qty = $this->security->xss_clean($this->input->post('curr_qty'));
		 	foreach($curr_qty as $curr_qty_change_key=>$array_item)
			if($curr_qty[$curr_qty_change_key] == 0 || $curr_qty[$curr_qty_change_key] == "")
			{
				unset($curr_qty[$curr_qty_change_key]);
			}
			*/

			if($this->input->post('adj_stk_date') != "")
			{
				$adj_stk_date = date('Y-m-d', strtotime($this->input->post('adj_stk_date')));
			}
			else
			{
				$adj_stk_date = "0000-00-00";
			}
			
			
			
			 $adj_stj_details=array(
				'stock_adjustments_code'=>$adj_stk_code,
				'stock_adjustments_location_id'=>$adj_stk_loc,
				'stock_adjustments_approved_by'=>$adj_stk_appr_by,
				'stock_adjustments_status'=>$adj_stk_status,
				'stock_adjustmentse_cause'=>$adj_stk_cause,
				'stock_adjustments_reason'=>$adj_stk_reason,
				'stock_adjustments_adjustment_date'=>$adj_stk_date,
				'stock_adjustments_created_by'=>$sess_user,
				'stock_adjustments_added_date'=>date('Y-m-d h:i:s'),
				'stock_adjustments_updated_by'=>$sess_user,
				);
		
			
			$adj_id=$this->inventorymodule->add_adj_stk($adj_stj_details);
			 
			 $result=count($item_id);
			 
			  for($i=0; $i<=$result; $i++)
			  {
				  if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
				  {
	  
					  $stk_adj_items=array(
							  'stk_adj_items_stock_adjustment_id'=>$adj_id,
							  'stk_adj_items_item_id'=>$item_id[$i],
							  'stk_adj_items_inventory_id'=>$inventory_id[$i],
							  'stk_adj_items_control_no'=>$control_no[$i],
							  'stk_adj_items_batch_no'=>$batch_no[$i],
							  'stk_adj_items_expiry_date'=>$expiry_date[$i],
							  'stk_adj_items_arn_no'=>$arn_no[$i],
							  'stk_adj_items_uom_id'=>$item_uom_id[$i],
							  'stk_adj_items_system_qty'=>$inv_qty[$i],
							  'stk_adj_items_current_qty'=>$curr_qty[$i],
							  'stk_adj_items_adjustment_qty'=>$adj_qty[$i]
							  );
							  
							  
					  $this->inventorymodule->add_stk_adj_items($stk_adj_items,$item_id[$i]);
					  
					  
					  /* $adj_stock_update_data=array(
										'inventory_qty'=>$curr_qty[$i],
										'inventory_update_date'=>date('Y-m-d'),
										'inventory_update_by'=>$sess_user,
										);
					  
					  $this->inventorymodule->update_adj_stock($adj_stock_update_data,$item_id[$i]); */
				  }
			 }
			
 			$this->session->set_flashdata('message', 'Stock Adjustment Successful');
			redirect('inventory/adjustment_stock');
			
		}
		$this->title = "Stock Adjustment";
		$this->keywords = "Stock Adjustment";
		$Result_location = $this->mastersmodule->get_alllocation();
		$this->data["locationdata"] = $Result_location['rows'];
	    $this->data["users"] =$this->accountmodule->users_list($sess_group,$sess_company);
		$this->data['userid'] = $sess_user;
		$this->data["product_list"] = $this->inventorymodule->get_allproductsdetails($sess_company);
		$this->_render('pages/inventory/adjustment_stk/add_adjustment_stk');
	
	
	}
	
	public function view_adj_stk($id)
	{	
		$this->data["view_adjstk"] = $this->inventorymodule->view_single_adjstk($id);
		$this->data["view_adjtk_items"] = $this->inventorymodule->view_single_adjstk_items($id);
		
		$this->title = "Stock Adjustment";
		$this->keywords = "Stock Adjustment";
		$this->_render('pages/inventory/adjustment_stk/view_adjustment_stk');
		
	}
	
	
	public function edit_adj_stk($id)
	{	
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
				
		
		if(isset($_POST['update_stk_add']))
		{
			 
			 
			$item_check = $this->security->xss_clean($this->input->post('item_check'));
			 
			$adj_stk_code = $this->security->xss_clean($this->input->post('adj_stk_code'));
			$adj_stk_loc = $this->security->xss_clean($this->input->post('adj_stk_loc'));
			$adj_stk_appr_by = $this->security->xss_clean($this->input->post('adj_stk_appr_by'));
			$adj_stk_status = $this->security->xss_clean($this->input->post('adj_stk_status'));
			$adj_stk_cause = $this->security->xss_clean($this->input->post('adj_stk_cause'));
			$adj_stk_reason = $this->security->xss_clean($this->input->post('adj_stk_reason'));
			$adj_stk_date = $this->security->xss_clean($this->input->post('adj_stk_date'));

			$item_sno = $this->security->xss_clean($this->input->post('item_sno'));
			$inventory_id = $this->security->xss_clean($this->input->post('item_inventory_id'));
			$item_id = $this->security->xss_clean($this->input->post('grid_item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_uom_id = $this->security->xss_clean($this->input->post('UOM_id'));
			$inv_qty = $this->security->xss_clean($this->input->post('quantity'));
			$inv_id = $this->security->xss_clean($this->input->post('inv_id'));
			$curr_qty = $this->security->xss_clean($this->input->post('cur_qty'));
			$adj_qty = $this->security->xss_clean($this->input->post('adj_qty'));
			$control_no = $this->security->xss_clean($this->input->post('item_control_no'));
			$batch_no = $this->security->xss_clean($this->input->post('item_batch_no'));
			$expiry_date = $this->security->xss_clean($this->input->post('item_expiry_date'));
			$arn_no = $this->security->xss_clean($this->input->post('item_arn_no'));
			
			

			if($this->input->post('adj_stk_date') != "")
			{
				$adj_stk_date = date('Y-m-d', strtotime($this->input->post('adj_stk_date')));
			}
			else
			{
				$adj_stk_date = "0000-00-00";
			}
			
			
			
			 $adj_stj_details=array(
				'stock_adjustments_code'=>$adj_stk_code,
				'stock_adjustments_location_id'=>$adj_stk_loc,
				'stock_adjustments_approved_by'=>$adj_stk_appr_by,
				'stock_adjustments_status'=>$adj_stk_status,
				'stock_adjustmentse_cause'=>$adj_stk_cause,
				'stock_adjustments_reason'=>$adj_stk_reason,
				'stock_adjustments_adjustment_date'=>$adj_stk_date,
				'stock_adjustments_created_by'=>$sess_user,
				'stock_adjustments_added_date'=>date('Y-m-d h:i:s'),
				'stock_adjustments_updated_by'=>$sess_user,
				);
		
			
			$this->inventorymodule->update_adj_stk($adj_stj_details, $id);
			 
			 $result=count($item_id);
			 
			  for($i=0; $i<=$result; $i++)
			  {
				  if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
				  {
	  
					  $stk_adj_items=array(
							  'stk_adj_items_stock_adjustment_id'=>$id,
							  'stk_adj_items_item_id'=>$item_id[$i],
							  'stk_adj_items_inventory_id'=>$inventory_id[$i],
							  'stk_adj_items_control_no'=>$control_no[$i],
							  'stk_adj_items_batch_no'=>$batch_no[$i],
							  'stk_adj_items_expiry_date'=>$expiry_date[$i],
							  'stk_adj_items_arn_no'=>$arn_no[$i],
							  'stk_adj_items_uom_id'=>$item_uom_id[$i],
							  'stk_adj_items_system_qty'=>$inv_qty[$i],
							  'stk_adj_items_current_qty'=>$curr_qty[$i],
							  'stk_adj_items_adjustment_qty'=>$adj_qty[$i]
					 );

					$this->inventorymodule->update_stk_adj_items($stk_adj_items,$item_sno[$i],$id);
					  
					  if($adj_stk_status == 'approved')
					  {
						  $adj_stock_update_data=array(
											'inventory_qty'=>$curr_qty[$i],
											'inventory_update_date'=>date('Y-m-d'),
											'inventory_update_by'=>$sess_user,
											);
					
						$this->inventorymodule->update_adj_stock($adj_stock_update_data,$inventory_id[$i]);
					  }
				  }
			 }
			
 			$this->session->set_flashdata('message', 'Stock Adjustment Successful');
			redirect('inventory/adjustment_stock');
			
		}
		
		
		
		$this->title = "Stock Adjustment";
		$this->keywords = "Stock Adjustment";
		
		$Result_location = $this->mastersmodule->get_alllocation();
		$this->data["locationdata"] = $Result_location['rows'];
	    $this->data["users"] =$this->accountmodule->users_list($sess_group,$sess_company);
		$this->data['userid'] = $sess_user;
		$this->data["product_list"] = $this->inventorymodule->get_allproductsdetails($sess_company);
		$this->data["view_adjstk"] = $this->inventorymodule->view_single_adjstk($id);
		$this->data["view_adjtk_items"] = $this->inventorymodule->view_single_adjstk_items($id);
		
		$this->_render('pages/inventory/adjustment_stk/edit_adjustment_stk');
	
	}
	
	public function wastages()
	{
		$this->title = "Wastages";
		$this->keywords = "Wastages";

		$this->_render('pages/inventory/wastages/wastages_list');
	
	}
	
	public function add_wastages()
	{
		$this->title = "Wastages";
		$this->keywords = "Wastages";

		$this->_render('pages/inventory/wastages/add_wastages');
	
	}
	
	public function get_opsstk_products()
	{	
		$product_typeid = $this->input->post('productid');
		$this->data["stk_products"] = $this->inventorymodule->getproducts_grid($product_typeid);
		
		echo $this->load->view('pages/inventory/opening_stk_list/products_append_popup.php',$this->data,true);
		exit;
	
	}
	
	public function instant_oprning_stock()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$prefix = $this->inventorymodule->getprefix('13');
		$opsprefix = $prefix->prefix_name;
		$code = $this->inventorymodule->getlastid_ops();
		if(!empty($code))
		{
			$lastOpsCode = $code->opening_stock_code;
			$lengthPrefix = strlen($opsprefix);
			$strSplit = str_split($lastOpsCode, $lengthPrefix);
			$OpsLastdigit = $strSplit[0];
			$explode = explode($OpsLastdigit,$lastOpsCode);
			$OpsLastnumber = $explode[1];
			
			if($OpsLastdigit == $opsprefix)
			{
				$Opscode = $OpsLastnumber+1;
				$digits = sprintf ('%04d', $Opscode);
				$OpscodewithPrefix = $opsprefix.$digits;
			}
			else
			{
				$OpscodewithPrefix = $opsprefix.'0001';
			}
		}
		else
		  {
			  $OpscodewithPrefix = $opsprefix.'0001';
		  }
		  
		  $this->data['Opscode'] = $OpscodewithPrefix;
		  $this->data['opsprefix'] = $opsprefix;
		  $randomstring = $OpscodewithPrefix;
		  $open_stk_code = $randomstring;
		  $opstk_details=array(
						'opening_stock_code'=>$open_stk_code,
						'opening_stock_prd_type_id'=>'1',
						'opening_stock_location_id'=>'1',
						'opening_stock_approved_by_id'=>'2',
						'opening_stock_status'=>'draft',
						'opening_stock_added_on'=>date('Y-m-d'),
						'opening_stock_created_by'=>'2',
						'opening_stock_added_date'=>date('Y-m-d h:i:s'),
						'opening_stock_updated_by'=>$sess_user,
						'opening_stock_active_status'=>'active'
						);
	     //$opstkid = $this->inventorymodule->add_op_stk_details($opstk_details);
		 
		  $opstkid = 1; echo "<pre>"; print_r($opstk_details);
		 $Result_pro = $this->inventorymodule->get_allproduct($sess_company);
		// echo "<pre>"; print_r($Result_pro); exit;
		 $count= count($Result_pro);
	     foreach($Result_pro as $PRO)
		  {				
			  $item_id = $PRO['product_id'];
			  $item_code = $PRO['product_code'];
			  $item_name = $PRO['product_name'];
			  $UOM_id = 1;
			  $UOM_name = "NOS";
			  $quantity = 100;
		  
					  $op_stk_items=array(
								  'opt_stk_items_opening_stock_id'=>$opstkid,
								  'opt_stk_items_item_id'=>$item_id,
								  'opt_stk_items_qty'=>$quantity,
								  'opt_stk_items_uom_id'=>$UOM_id,
							  );
							//   echo "<pre>"; print_r($op_stk_items);
							  $valid=$this->inventorymodule->vaild_stock_item($item_id);
							  
							  if($valid == 1)
							  {
								  $get_stk_qty=$this->inventorymodule->get_stk_qty($item_id);	
								  $old_qty= $get_stk_qty->inventory_qty;
								  $cur_quty= $quantity;
								  $now_stock=$cur_quty+$old_qty;
								  $op_stock_data=array(
										'inventory_qty'=>$now_stock,
										'inventory_update_date'=>date('Y-m-d'),
										'inventory_update_by'=>'2',
										);
									 //  echo "<pre>"; print_r($op_stock_data);
								 $this->inventorymodule->update_stock($op_stock_data,$item_id);
							  }
							  else
							  {
								  $op_stock_data=array(
												  'inventory_item_id'=>$item_id,
												  'inventory_uom_id'=>$UOM_id,
												  'inventory_qty'=>$quantity,
												  'inventory_update_date'=>date('Y-m-d'),
												  'inventory_update_by'=>'2',
										);
									    echo "<pre>"; print_r($op_stock_data);
								  $this->inventorymodule->add_stock($op_stock_data);
							  }
							 $this->inventorymodule->add_opstk_item_details($op_stk_items);
	   
	  }
	  
		 exit;
	 	$this->session->set_flashdata('message', 'Opening Stock  Added Successfully');
		redirect('inventory/openingstock');
	}
	
	//** Get Single Item Pop-up **//
	
	public function getsingleitem()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["product_type"] = $this->materialrequestmodule->get_allproducttypes($sess_group,$sess_company); //** Get All Product Type **//
		$this->data["product_group"] = $this->materialrequestmodule->get_allproductgroups();//** Get All Product Group **//
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
				
		$this->data["product_list"] = $this->materialrequestmodule->get_allproductsdetailsforsingleitem($sess_group,$sess_company,$producttype);//** Get All Products for Single Item **//
		$this->data["product_uom"] = $this->materialrequestmodule->get_alluom();//** Get All Uom Details **//
		$result = $this->load->view("pages/inventory/opening_stk_list/singleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	//** Get Multiple Items in POP-up **//
	
	public function getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$division_id= $this->input->post('division_id');
		$store_id= $this->input->post('store_id');
		
		$this->data["product_type"] = $this->materialrequestmodule->get_allproducttypes($sess_group,$sess_company);//** Get All Product Type **//
		$this->data["product_group"] = $this->materialrequestmodule->get_allproductgroups();//** Get All Product Group **//
		$this->data["product_list"] = $this->materialrequestmodule->get_allproductsdetails($sess_group,$sess_company,$division_id,$store_id);//** Get All Products for Single Item **//
		$this->data["product_uom"] = $this->materialrequestmodule->get_alluom();//** Get All Uom Details **//
		$this->data["store_division_id"] = $division_id;
		$result = $this->load->view("pages/inventory/opening_stk_list/multipleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	public function adj_getsingleitem()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["product_type"] = $this->materialrequestmodule->get_allproducttypes($sess_group,$sess_company); //** Get All Product Type **//
		$this->data["product_group"] = $this->materialrequestmodule->get_allproductgroups();//** Get All Product Group **//
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
				
		$this->data["product_list"] = $this->materialrequestmodule->get_allproductsdetailsforsingleitem($sess_group,$sess_company,$producttype);//** Get All Products for Single Item **//
		$this->data["product_uom"] = $this->materialrequestmodule->get_alluom();//** Get All Uom Details **//
		$result = $this->load->view("pages/inventory/adjustment_stk/singleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	//** Get Multiple Items in POP-up **//
	
	public function adj_getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		  
		$this->data["product_type"] = $this->materialrequestmodule->get_allproducttypes($sess_group,$sess_company);//** Get All Product Type **//
		$this->data["product_group"] = $this->materialrequestmodule->get_allproductgroups();//** Get All Product Group **//
		$this->data["product_list"] = $this->inventorymodule->get_allproductsdetail($sess_group,$sess_company);//** Get All Products for Single Item **//
 		$result = $this->load->view("pages/inventory/adjustment_stk/multipleitem_popup", $this->data, true);
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
		
		$product_list = $this->materialrequestmodule->onchangeitemstype($sess_group,$sess_company,$product_type,$product_group);
		
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
	
	public function getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		$produt_qty= $this->inventorymodule->getitem_quty_details($product_item_id); //** Get Item QTY Details based on product Id **//
		 
		$produt_details = $this->materialrequestmodule->getitemdetails($product_item_id); //** Get Item Details based on product Id **//
		$data['product_id'] = $produt_details->product_id;
		$data['product_type_id'] = $produt_details->product_type_id;
		$data['product_group_id'] = $produt_details->product_group_id;
		$data['product_name'] = $produt_details->product_name;
		$data['product_code'] = $produt_details->product_code;
		$data['product_model_number'] = $produt_details->product_model_number;
		$data['product_mfr_part_number'] = $produt_details->product_mfr_part_number;
		  
		$data['product_mrp'] = $produt_details->product_mrp;
		$data['product_selling'] = $produt_details->product_selling;
		$data['product_cp'] = $produt_details->product_cp;
		$data['product_uty_qty'] = $produt_details->product_uty_qty;
		$data['product_vat_tax'] = $produt_details->product_vat_tax;
		$data['product_gst_tax'] = $produt_details->product_gst_tax;
		$data['product_service_tax'] = $produt_details->product_service_tax;
		$data['product_cst_tax'] = $produt_details->product_cst_tax;
		$data['product_excise_duty_tax'] = $produt_details->product_excise_duty_tax;
		$data['product_discounts'] = $produt_details->product_discounts;
		
		$data['uom_id'] = $produt_details->uom_id;
		$data['uom_name'] = $produt_details->uom_name;
		$data['inventory_qty']=$produt_qty->inventory_qty;
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
		$control_no=$this->security->xss_clean($this->input->post('control_no'));
		$batch_no=$this->security->xss_clean($this->input->post('batch_no'));
		$mfg_prtno=$this->security->xss_clean($this->input->post('mfg_prtno'));
		
		$this->data['product_list'] = $this->inventorymodule->getproductsdetailswithmultiplesearch($sess_group,$sess_company,$product_type,$product_group,$item_code,$mfg_prtno,$item_name,$control_no,$batch_no);
		
		//echo"<PRE>";print_r($this->data['product_list']);exit; 
		
		 
		$result = $this->load->view("pages/inventory/adjustment_stk/search_multiple_items", $this->data, true);
				
		echo $result; exit;
	}
	
	/// REPORT FUNCTIONALITY WILL BE REMOVE ONCE THE REPORT HAS COVERED
	
		
	
	
		
	public function sales_flow()
   	{
		$this->title = "Sales Reports";
		$this->keywords = "Sales Reports";
		$this->_render('pages/reports/sales_flow_report');
	}
	
	public function sales_generate_flow_report()
   	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
    	$this->data["sess_company"] =$sess_company;
		
		$cus_id = $this->security->xss_clean($this->input->post('report_cus_id'));
		$vendor_name = $this->security->xss_clean($this->input->post('report_customer'));
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
		  
		$this->data["flow_list"] = $this->inventorymodule->get_report_sales_flow($sess_company,$report_from,$report_to,$cus_id);
		$this->data["report_from"] =$report_from;
		$this->data["report_to"] =$report_to;
		$this->data["vendor_id"] =$cus_id;
		$this->data["vendor_name"] =$vendor_name;
		
		$this->title = "Sales Reports";
		$this->keywords = "Sales Reports";
		$this->_render('pages/reports/sales_flow_report');
	}
	
	public function view_inventory_stock_export()
	{
		$id = $this->input->post('search_id');
		
		$this->data["inventory_stock"] = $this->inventorymodule->inventory_items($id);
		
		//echo "<pre>"; print_r($this->data["inventory_stock"]); exit;
		//** Get Single PO Indent Item Details **//
		$this->title = "Stock";
		$this->keywords = "Stock";
		
		$this->load->view('pages/inventory/viewstock_export',$this->data);
	}
	
	
		
}
 