<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('vendormodule');
		  $this->load->model('mastersmodule');
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

	//** Get State For Page Load **//
	
	public function get_state()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		
		$state = $this->vendormodule->getAllState($con_id); //** Get All State **//
		
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
	
	//** Get City For Page Load **//
	
	public function get_city()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		$cty_id = $this->input->post('city');
		
		$city = $this->vendormodule->getAllcity($con_id,$sta_id);//** Get All City **//
		
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
	
	//** Index page of Vendor Controller **//
	
	public function index()
	{
		redirect('vendor/vendor_list');
	}
	
	//** Search Vendor **//
	
	
	public function search_vendor($sort_order='vendor_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$ven_code = $this->security->xss_clean($this->input->post('search_ven_code'));
			$ven_name = $this->security->xss_clean($this->input->post('search_ven_name'));
			$ven_mob = $this->security->xss_clean($this->input->post('search_ven_mob'));
			$ven_email = $this->security->xss_clean($this->input->post('search_ven_email'));
			
			$req_search= array(
					'search_ven_code' => $ven_code,
					'search_ven_name' =>$ven_name,
					'search_ven_mob' => $ven_mob,
					'search_ven_email' => $ven_email,
					);	
			$this->session->set_userdata('req_search',$req_search);
		}	
			
			
			$search_data = $this->session->userdata('req_search');			
			$search_ven_code = $search_data['search_ven_code'];
			$search_ven_name = $search_data['search_ven_name'];
			$search_ven_mob = $search_data['search_ven_mob'];
			$search_ven_email = $search_data['search_ven_email'];
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =20;
		  $Result = $this->vendormodule->get_search_vendors($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_ven_code,$search_ven_name,$search_ven_mob,$search_ven_email);
		 
		  $this->data["vendor_list"] = $Result['rows'];
		
  		  
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('vendor/search_vendor/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "Vendor";
		  $this->keywords = "Vendors";
		  $this->_render('pages/vendors/vendors');
	}
	
		
	//** Vendor's List **//
	
	public function vendor_list($sort_order='vendor_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->vendormodule->get_vendors($limit,$page,$sort_order,$sort_by);
		$this->data["vendor_list"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('vendor/vendor_list').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Vendor";
		$this->keywords = "Vendors";
		$this->_render('pages/vendors/vendors');
	}
	
	//** Add Vemdor Function **//
	
	public function addvendor()
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$Result_state=$this->mastersmodule->get_allstate();//** Get All State for Masters'Module **//
		$this->data["state"] = $Result_state['rows'];

		$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country for Masters'Module **//
		$this->data["ctry"] = $res_cont['rows'];

		$res_city=$this->mastersmodule->get_allcity();//** Get All City for Masters'Module **//
		$this->data["city"] = $res_city['rows'];
		$this->data['area'] = $this->vendormodule->get_area();//** get Area **//
		$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
		
		$prefix = $this->vendormodule->getprefix('1'); //** To Get Prefix Name for Vendor **//
		
		$vendorPrefix = $prefix->prefix_name;

		$code = $this->vendormodule->getlastid();//** To Get Last Id **//
		
		if(!empty($code))
		{
			$lastVendorCode = $code->vendor_code;
			
			$lengthPrefix = strlen($vendorPrefix);
			$strSplit = str_split($lastVendorCode, $lengthPrefix);
			$vendorLastdigit = $strSplit[0];
			
			$explode = explode($vendorLastdigit,$lastVendorCode);
			$vendorLastnumber = $explode[1];
			
			if($vendorLastdigit == $vendorPrefix)
			{
				$vendorcode = $vendorLastnumber+1;
				
				$digits = sprintf ('%04d', $vendorcode);
				$vendorcodewithPrefix = $vendorPrefix.$digits;
			}
			else
			{
				$vendorcodewithPrefix = $vendorPrefix.'0001';
			}
		}
		else
		{
			$vendorcodewithPrefix = $vendorPrefix.'0001';
		}
		
		$this->data['vendorCode'] = $vendorcodewithPrefix;
		$this->data['vendorPrefix'] = $vendorPrefix;
			
		$randomstring = $vendorcodewithPrefix;
			
		if(isset($_POST['vendor_add_details']))
		{
			$vendor_name = $this->security->xss_clean($this->input->post('vendor_name'));
			$vendor_code = $this->security->xss_clean($this->input->post('vendor_code'));
			$vendor_email = $this->security->xss_clean($this->input->post('vendor_email'));
			$vendor_mobile = $this->security->xss_clean($this->input->post('vendor_mobile'));
			$vendor_gst = $this->security->xss_clean($this->input->post('vendor_gst'));
			$vendor_category = $this->security->xss_clean($this->input->post('vendor_category'));		
			
			$vendor_pan = $this->security->xss_clean($this->input->post('vendor_pan'));
			$vendor_con_person = $this->security->xss_clean($this->input->post('vendor_con_person'));
			$vendor_credit_limit = $this->security->xss_clean($this->input->post('vendor_credit_limit'));
			$vendor_credit_days = $this->security->xss_clean($this->input->post('vendor_credit_days'));
			$vendor_discount_percent = $this->security->xss_clean($this->input->post('vendor_discount_percent'));
			$vendor_transport = $this->security->xss_clean($this->input->post('vendor_transport'));
			$vendor_remarks = $this->security->xss_clean($this->input->post('vendor_remarks'));
			$vendor_area = $this->security->xss_clean($this->input->post('vendor_area'));
			
			$vendor_address = $this->security->xss_clean($this->input->post('vendor_address'));
			$vendor_state = $this->security->xss_clean($this->input->post('state'));
			$vendor_country = $this->security->xss_clean($this->input->post('country'));
			$vendor_city = $this->security->xss_clean($this->input->post('city'));
			$vendor_zipcode = $this->security->xss_clean($this->input->post('vendor_zipcode'));
			
			$vendor_shipping_address = $this->security->xss_clean($this->input->post('vendor_shipping_address'));
			$shipping_country = $this->security->xss_clean($this->input->post('shipping_country'));
			$shipping_state = $this->security->xss_clean($this->input->post('shipping_state'));
			$shipping_city = $this->security->xss_clean($this->input->post('shipping_city'));
			$ship_zip_code = $this->security->xss_clean($this->input->post('vendor_shipping_zipcode'));
			
			
			
			$validvendor= $this->vendormodule->vendorvaildation($vendor_name, $vendor_mobile); //** Vendor Validation **//
		
			if($validvendor== 0)
			{
			$vendordetails=array(
				'vendor_name'=>$vendor_name,
				'vendor_code'=>$vendor_code,
				'vendor_email'=>$vendor_email,
				'vendor_mobile'=>$vendor_mobile,
				'vendor_category'=>$vendor_category,
				'vendor_gst_no'=>$vendor_gst,
				'vendor_pan'=>$vendor_pan,
				'vendor_con_person'=>$vendor_con_person,
				'vendor_credit_limit'=>$vendor_credit_limit,
				'vendor_credit_days'=>$vendor_credit_days,
				'vendor_area'=>$vendor_area,
				'vendor_discount_percent'=>$vendor_discount_percent,
				'vendor_transport'=>$vendor_transport,
				'vendor_remarks'=>$vendor_remarks,
				'vendor_status' => 'enable',
				'vendor_add_date' => date('Y-m-d h:i:s'),
				'vendor_created_by' =>$sess_user,
				'vendor_modified_by' =>$sess_user,
				);
				
				//echo "<pre>"; print_r($vendordetails); exit;
			$vendorid=$this->vendormodule->add_vendor_details($vendordetails); //** Add Vendor DEtails **//
			
			$vendorsubdetails=array(
				'ven_sub_det_ven_id'=>$vendorid,
				'vendor_address'=>$vendor_address,
				'vendor_state'=>$vendor_state,
				'vendor_country'=>$vendor_country,
				'vendor_city'=>$vendor_city,
				'venor_zipcode'=>$vendor_zipcode,
				
				);
			$this->vendormodule->add_vendor_subdetails($vendorsubdetails); //** Add Vendor SubDEtails **//
			
			$vendor_shiping_details=array(
				'vendor_shipping_vendor_id'=> $vendorid,
				'vendor_shipping_address'=> $vendor_shipping_address,
				'vendor_shipping_country_id'=> $shipping_country,
				'vendor_shipping_state_id'=> $shipping_state,
				'vendor_shipping_city_id'=> $shipping_city,
				'vendor_shipping_zipcode'=> $ship_zip_code,
			);
			$this->vendormodule->add_vendor_shipping_details($vendor_shiping_details); //** Add Vendor Shipping Details **//
			
			$this->session->set_flashdata('message', 'Vendor Added Successfully');
			redirect('vendor/vendor_list');
			}
			else 
			{					
				$this->session->set_flashdata('message', 'Vendor Already Exist');
				redirect('vendor/vendor_list');
			}	
		}
		else
		{	
		$this->title = "Vendor";
		$this->keywords = "Vendors";
		$this->_render('pages/vendors/addvendor');
		}
	}
	
	//** Update Vendor Details **//
	
	public function editvendor($id)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if(isset($_POST['vendor_edit_details']))
		{
			$vendor_name = $this->security->xss_clean($this->input->post('vendor_name'));
			$vendor_code = $this->security->xss_clean($this->input->post('vendor_code'));
			$vendor_email = $this->security->xss_clean($this->input->post('vendor_email'));
			$vendor_mobile = $this->security->xss_clean($this->input->post('vendor_mobile'));
			$vendor_category = $this->security->xss_clean($this->input->post('vendor_category'));
			$vendor_gst = $this->security->xss_clean($this->input->post('vendor_gst'));
			
			$vendor_pan = $this->security->xss_clean($this->input->post('vendor_pan'));
			$vendor_con_person = $this->security->xss_clean($this->input->post('vendor_con_person'));
			$vendor_credit_limit = $this->security->xss_clean($this->input->post('vendor_credit_limit'));
			$vendor_credit_days = $this->security->xss_clean($this->input->post('vendor_credit_days'));
			$vendor_discount_percent = $this->security->xss_clean($this->input->post('vendor_discount_percent'));
			$vendor_transport = $this->security->xss_clean($this->input->post('vendor_transport'));
			$vendor_remarks = $this->security->xss_clean($this->input->post('vendor_remarks'));
			$vendor_area = $this->security->xss_clean($this->input->post('vendor_area'));
			
			$vendor_address = $this->security->xss_clean($this->input->post('vendor_address'));
			$vendor_state = $this->security->xss_clean($this->input->post('state'));
			$vendor_country = $this->security->xss_clean($this->input->post('country'));
			$vendor_city = $this->security->xss_clean($this->input->post('city'));
			$vendor_zipcode = $this->security->xss_clean($this->input->post('vendor_zipcode'));
		
			
			$vendor_shipping_address = $this->security->xss_clean($this->input->post('vendor_shipping_address'));
			$shipping_country = $this->security->xss_clean($this->input->post('shipping_country'));
			$shipping_state = $this->security->xss_clean($this->input->post('shipping_state'));
			$shipping_city = $this->security->xss_clean($this->input->post('shipping_city'));
			$ship_zip_code = $this->security->xss_clean($this->input->post('vendor_shipping_zipcode'));
			
			$check_valid_vendor=$this->vendormodule->check_validupdatevendor($vendor_name, $id); //** Check for Valid Vendor for update **//
			
			if($check_valid_vendor == 0)
			{
				$vendordetails=array(
				'vendor_name'=>$vendor_name,
				'vendor_code'=>$vendor_code,
				'vendor_email'=>$vendor_email,
				'vendor_mobile'=>$vendor_mobile,
				'vendor_category'=>$vendor_category,
				'vendor_gst_no'=>$vendor_gst,
				'vendor_pan'=>$vendor_pan,
				'vendor_con_person'=>$vendor_con_person,
				'vendor_credit_limit'=>$vendor_credit_limit,
				'vendor_credit_days'=>$vendor_credit_days,
				'vendor_area'=>$vendor_area,
				'vendor_discount_percent'=>$vendor_discount_percent,
				'vendor_transport'=>$vendor_transport,
				'vendor_remarks'=>$vendor_remarks,
				'vendor_status' => 'enable',
				'vendor_update_date' => date('Y-m-d h:i:s'),
				'vendor_modified_by' =>$sess_user,
				);
		
			$this->vendormodule->update_vendor_details($vendordetails,$id); //** Update Vendor Details **//
			
			
			$vendorsubdetails=array(
				'ven_sub_det_ven_id'=>$id,
				'vendor_address'=>$vendor_address,
				//'vendor_pobox'=>$vendor_pobox,
				'vendor_state'=>$vendor_state,
				'vendor_country'=>$vendor_country,
				'vendor_city'=>$vendor_city,
				'venor_zipcode'=>$vendor_zipcode,
				
				);
			
			$this->vendormodule->update_vendor_subdetails($vendorsubdetails ,$id); //** Update Vendor address Details **//
			
			$vendor_shiping_details=array(
				'vendor_shipping_vendor_id'=> $id,
				'vendor_shipping_address'=> $vendor_shipping_address,
				'vendor_shipping_country_id'=> $shipping_country,
				'vendor_shipping_state_id'=> $shipping_state,
				'vendor_shipping_city_id'=> $shipping_city,
				'vendor_shipping_zipcode'=> $ship_zip_code,
			);
			
			$this->vendormodule->update_vendor_shipping_details($vendor_shiping_details,$id);//** Update Vendor Shipping address Details **//
			$this->session->set_flashdata('message', 'Vendor Updated Successfully');
			redirect('vendor/vendor_list');
			}
			else
			{
				echo "Vendor name Already Exist";
			}
		
		}
		$this->data['editvendor'] = $this->vendormodule->getsingle_vendor($id);//** Get Single Vendor Based onVendor Id **//
		$this->data['editvendor_addr'] = $this->vendormodule->getsingle_vendoraddr($id);//** Get Single Vendor address Based onVendor Id **//
		$this->data['editvendor_shp_addr'] = $this->vendormodule->getsingle_vendor_shpaddr($id);//** Get Single Vendor Shipping address Based onVendor Id **//
		
		$Result_state=$this->mastersmodule->get_allstate();//** Get All State for Masters'Module **//
		$this->data["state"] = $Result_state['rows'];

		$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country for Masters'Module **//
		$this->data["ctry"] = $res_cont['rows'];

		$res_city=$this->mastersmodule->get_allcity();//** Get All City for Masters'Module **//
		$this->data["city"] = $res_city['rows'];
		
		$this->data['area'] = $this->vendormodule->get_area();//** get Area **//
		$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			
		$this->title = "Edit Vendor";
		$this->keywords = "Vendor";
		$this->_render('pages/vendors/editvendor');
		
	}
	
	//** Vendor Status **//
	
	public function vendorstatus($id,$status)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if($status == 'enable')
		{
			$changeStatus = 'disable';
		}
		else
		{
			$changeStatus = 'enable';
		}
		
		$vendordata = array(
				  'vendor_status' => $changeStatus,
				  'vendor_modified_by'=>$sess_user,
				  'vendor_update_date' => date('Y-m-d h:i:s'),
			  );
			  
		$this->vendormodule->updatevendorstatus($vendordata, $id);
		$this->session->set_flashdata('message', 'Vendor Status Changed Successfully');
		redirect('vendor/vendor_list');
	}
	
	//** View Vendor **//
	
	public function viewvendor($id)
	{	
		$this->data['editvendor'] = $this->vendormodule->getsingle_vendor($id); //** Get Single Vendor Based onVendor Id **//
		$this->data['editvendor_addr'] = $this->vendormodule->getsingle_vendoraddr($id);//** Get Single Vendor address Based on Vendor Id **//
		$this->data['editvendor_shp_addr'] = $this->vendormodule->getsingle_vendor_shpaddr($id);//** Get Single Vendor Shipping address Based on Vendor Id **//
		
		$Result_state=$this->mastersmodule->get_allstate();//** Get All State for Masters'Module **//
		$this->data["state"] = $Result_state['rows'];

		$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country for Masters'Module **//
		$this->data["ctry"] = $res_cont['rows'];

		$res_city=$this->mastersmodule->get_allcity();//** Get All City for Masters'Module **//
		$this->data["city"] = $res_city['rows'];
		
		$this->title = "View Vendor";
		$this->keywords = "Vendor";
		
		
	$this->_render('pages/vendors/viewvendor');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */