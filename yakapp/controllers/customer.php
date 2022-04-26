<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('vendormodule');
		  $this->load->model('mastersmodule');
		  $this->load->model('customermodule');
		  $this->load->model('organizationsmodel');
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
						$this->data['master']=$ro;
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
	
	//** Get State **//
	
	public function get_state()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		
		$state = $this->customermodule->getAllState($con_id);//** Get All State **//
		
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
	
	//** Get City **//
	
	public function get_city()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		$cty_id = $this->input->post('city');
		
		$city = $this->customermodule->getAllcity($con_id,$sta_id);//** Get All City **//
		
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
	
	//** Index Page **//
	
	public function index()
	{
		redirect('customer/customer_list');
	}
	
	//** Search Customer **//
	
	 public function customer_search($sort_order='customer_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_feild_1 = $this->security->xss_clean($this->input->post('search_feild_1'));
			$search_feild_2 = $this->security->xss_clean($this->input->post('search_feild_2'));
			$search_feild_3 = $this->security->xss_clean($this->input->post('search_feild_3'));
			$search_feild_4 = $this->security->xss_clean($this->input->post('search_feild_4'));
			$search_feild_5 = $this->security->xss_clean($this->input->post('search_feild_5'));
			
		
			$req_search= array(
					'search_feild_1' => $search_feild_1,
					'search_feild_2' =>$search_feild_2,
					'search_feild_3' => $search_feild_3,
					'search_feild_4' => $search_feild_4,
					'search_feild_5' => $search_feild_5,
					);	
			$this->session->set_userdata('req_search',$req_search);
		}	
			
			
			$search_data = $this->session->userdata('req_search');			
			$search_feild_1 = $search_data['search_feild_1'];
			$search_feild_2 = $search_data['search_feild_2'];
			$search_feild_3= $search_data['search_feild_3'];
			$search_feild_4 = $search_data['search_feild_4'];
			$search_feild_5 = $search_data['search_feild_5'];
			
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =20;
		  $Result = $this->customermodule->get_search_customers($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_feild_1,$search_feild_2,$search_feild_3,$search_feild_4,$search_feild_5);
		 
		  $this->data["customer_list"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('customer/customer_search').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "Customer";
		  $this->keywords = "Customer";
		  $this->_render('pages/customer/customer_list');
	}
	
	//** Get Customer Details For Grid View **//
	
	public function customer_list($sort_order='customer_id',$sort_by='desc')
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =20;
		$Result = $this->customermodule->get_customer($limit,$page,$sort_order,$sort_by);
		$this->data["customer_list"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('customer/customer_list').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Customer";
		$this->keywords = "Customer";
		$this->_render('pages/customer/customer_list');
	}
	
	//** Add Customer Details **//
	
	public function addcustomer()
	{	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		//$this->data['pricebookList'] = $this->customermodule->get_pricebook();//** Get Price Book Details **//
		$this->data["salesman"] = $this->customermodule->get_all_salesman();//** Get All Sales Man **//
		
		$prefix = $this->customermodule->getprefix('2');//** Get Customer Prefix **//
		
		$CustomerPrefix = $prefix->prefix_name;

		$code = $this->customermodule->getlastid();//** Get Customer Last Id **//
		
		if(!empty($code))
		{
			
			$lastCuscode = $code->customer_code;
			
			$lengthPrefix = strlen($CustomerPrefix);

			$strSplit = str_split($lastCuscode, $lengthPrefix);
			$CusLastdigit = $strSplit[0];
			
			$explode = explode($CusLastdigit,$lastCuscode);
			$CusLastnumber = $explode[1];
			
			if($CusLastdigit == $CustomerPrefix)
			{
				$Cuscode = $CusLastnumber+1;
				
				$digits = sprintf ('%04d', $Cuscode);
				$CuscodewithPrefix = $CustomerPrefix.$digits;
			}
			else
			{
				$CuscodewithPrefix = $CustomerPrefix.'0001';
			}
		}
		else
		{
			
			$CuscodewithPrefix = $CustomerPrefix.'0001';
		}
		
		
		$this->data['Cuscode'] = $CuscodewithPrefix;
		$this->data['CustomerPrefix'] = $CustomerPrefix;
			
		$randomstring = $CuscodewithPrefix;
		$this->data['country'] = $this->customermodule->get_country();//** Get All Country **//
		$this->data['area'] = $this->customermodule->get_area();//** get Area **//
		$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			
		$this->title = "Customer";
		$this->keywords = "Customer";
		$this->_render('pages/customer/addcustomer');
		
	}
	
	public function addcustomer_details()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
	
		if(isset($_POST['cus_add_details']))
		{
			$customer_name = $this->security->xss_clean($this->input->post('customer_name'));
			$customer_code = $this->security->xss_clean($this->input->post('customer_code'));
			$customer_email = $this->security->xss_clean($this->input->post('customer_email'));
			$customer_mobile = $this->security->xss_clean($this->input->post('customer_mobile'));
			$customer_category = $this->security->xss_clean($this->input->post('customer_category'));
			$customer_gst = $this->security->xss_clean($this->input->post('customer_gst'));
			$customer_pan = $this->security->xss_clean($this->input->post('customer_pan'));
			$customer_con_person = $this->security->xss_clean($this->input->post('customer_con_person'));
			$customer_credit_limit = $this->security->xss_clean($this->input->post('customer_credit_limit'));
			$customer_credit_days = $this->security->xss_clean($this->input->post('customer_credit_days'));
			$customer_discount_percent = $this->security->xss_clean($this->input->post('customer_discount_percent'));
			$customer_transport = $this->security->xss_clean($this->input->post('customer_transport'));
			$customer_remarks = $this->security->xss_clean($this->input->post('customer_remarks'));
			$customer_area = $this->security->xss_clean($this->input->post('customer_area'));
			
			$cus_bill_address = $this->security->xss_clean($this->input->post('cus_bill_address'));
			$cus_ship_address = $this->security->xss_clean($this->input->post('cus_ship_address'));
			$billing_city = $this->security->xss_clean($this->input->post('billing_city'));
			$shipping_city = $this->security->xss_clean($this->input->post('shipping_city'));
			$billing_state = $this->security->xss_clean($this->input->post('billing_state'));
			$shipping_state = $this->security->xss_clean($this->input->post('shipping_state'));
			$bill_zip_code = $this->security->xss_clean($this->input->post('bill_zip_code'));
			$ship_zip_code = $this->security->xss_clean($this->input->post('ship_zip_code'));
			$billing_country = $this->security->xss_clean($this->input->post('billing_country'));
			$shipping_country = $this->security->xss_clean($this->input->post('shipping_country'));
			
			$Validcus= $this->customermodule->valid_cus($customer_name, $customer_email);//** Customer check validation **//
				
			if($Validcus == 0)
			{
			 	$cusData=array( 
					'customer_name'=>$customer_name,
					'customer_code'=>$customer_code,
					'customer_email'=>$customer_email,
					'customer_mobile'=>$customer_mobile,
					'customer_category'=>$customer_category,
					'customer_gst'=>$customer_gst,
					'customer_pan'=>$customer_pan,
					'customer_con_person'=>$customer_con_person,
					'customer_credit_limit'=>$customer_credit_limit,
					'customer_credit_days'=>$customer_credit_days,
					'customer_area'=>$customer_area,
					'customer_discount_percent'=>$customer_discount_percent,
					'customer_transport'=>$customer_transport,
					'customer_remarks'=>$customer_remarks,
					'customer_status' => 'active',
					'customer_add_date' => date('Y-m-d h:i:s'),
					'customer_add_by' =>$sess_user,
					'customer_update_by' =>$sess_user,
					);
					
				$cusid=$this->customermodule->add_customer_details($cusData);//** Add Customer Details **//
				
				$cus_billadd=array(
					'customer_billing_customer_id'=>$cusid,
					'customer_billing_address'=>$cus_bill_address,
					'customer_billing_city_id'=>$billing_city,
					'customer_billing_country_id'=>$billing_country,
					'customer_billing_state_id'=>$billing_state,
					'customer_billing_zipcode'=>$bill_zip_code,
					);
				$this->customermodule->add_customer_bill_details($cus_billadd);//** Add Customer Billing Details **//
				
				$cus_shipadd=array(
					'customer_shipping_customer_id'=>$cusid,
					'customer_shipping_country_id'=>$shipping_country,
					'customer_shipping_address'=>$cus_ship_address,
					'customer_shipping_city_id'=>$shipping_city,
					'customer_shipping_state_id'=>$shipping_state,
					'customer_shipping_zipcode'=>$ship_zip_code,
					);
				$this->customermodule->add_customer_ship_details($cus_shipadd);//** Add Customer Shipping Details **//
								
				$this->session->set_flashdata('message', 'Customer Added Successfully');
				redirect('customer/customer_list');	
			}
			else
			{
				$this->session->set_flashdata('message', 'Customer Already Exist');
				redirect('customer/customer_list');
			}
		}
		else
		{
			redirect('customer/addcustomer');
		}
	}
	
	//** Edit Customer **//
	
	public function editcustomer($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['cus_update_details']))
		{
			$customer_name = $this->security->xss_clean($this->input->post('customer_name'));
			$customer_code = $this->security->xss_clean($this->input->post('customer_code'));
			$customer_email = $this->security->xss_clean($this->input->post('customer_email'));
			$customer_mobile = $this->security->xss_clean($this->input->post('customer_mobile'));
			$customer_category = $this->security->xss_clean($this->input->post('customer_category'));
			$customer_gst = $this->security->xss_clean($this->input->post('customer_gst'));
			$customer_pan = $this->security->xss_clean($this->input->post('customer_pan'));
			$customer_con_person = $this->security->xss_clean($this->input->post('customer_con_person'));
			$customer_credit_limit = $this->security->xss_clean($this->input->post('customer_credit_limit'));
			$customer_credit_days = $this->security->xss_clean($this->input->post('customer_credit_days'));
			$customer_discount_percent = $this->security->xss_clean($this->input->post('customer_discount_percent'));
			$customer_transport = $this->security->xss_clean($this->input->post('customer_transport'));
			$customer_remarks = $this->security->xss_clean($this->input->post('customer_remarks'));
			$customer_area = $this->security->xss_clean($this->input->post('customer_area'));
			$customer_status = $this->security->xss_clean($this->input->post('customer_status'));
			
			$cus_bill_address = $this->security->xss_clean($this->input->post('cus_bill_address'));
			$cus_ship_address = $this->security->xss_clean($this->input->post('cus_ship_address'));
			$billing_city = $this->security->xss_clean($this->input->post('billing_city'));
			$shipping_city = $this->security->xss_clean($this->input->post('shipping_city'));
			$billing_state = $this->security->xss_clean($this->input->post('billing_state'));
			$shipping_state = $this->security->xss_clean($this->input->post('shipping_state'));
			$bill_zip_code = $this->security->xss_clean($this->input->post('bill_zip_code'));
			$ship_zip_code = $this->security->xss_clean($this->input->post('ship_zip_code'));
			$billing_country = $this->security->xss_clean($this->input->post('billing_country'));
			$shipping_country = $this->security->xss_clean($this->input->post('shipping_country'));
			
			
			
			 //echo $cus_bill_address; exit;
			$Validcus= $this->customermodule->editvalid_cus($customer_email, $id);//** Edit Customer check validation **//
			if($Validcus == 0)
			{
			 	$cusData=array(
					'customer_name'=>$customer_name,
					'customer_code'=>$customer_code,
					'customer_email'=>$customer_email,
					'customer_mobile'=>$customer_mobile,
					'customer_category'=>$customer_category,
					'customer_gst'=>$customer_gst,
					'customer_pan'=>$customer_pan,
					'customer_con_person'=>$customer_con_person,
					'customer_credit_limit'=>$customer_credit_limit,
					'customer_credit_days'=>$customer_credit_days,
					'customer_area'=>$customer_area,
					'customer_discount_percent'=>$customer_discount_percent,
					'customer_transport'=>$customer_transport,
					'customer_remarks'=>$customer_remarks,
					'customer_status' => $customer_status,
					'customer_add_date' => date('Y-m-d h:i:s'),
					'customer_add_by' =>$sess_user,
					'customer_update_by' =>$sess_user,
					);
				
				$this->customermodule->update_cus_details($cusData, $id);//** Update Customer Details **//
				
				$CusBilldata=array(
					'customer_billing_customer_id'=>$id,
					'customer_billing_address'=>$cus_bill_address,
					'customer_billing_city_id'=>$billing_city,
					'customer_billing_country_id'=>$billing_country,
					'customer_billing_state_id'=>$billing_state,
					'customer_billing_zipcode'=>$bill_zip_code,
					);
					//echo "<PRE>";print_r($CusBilldata);exit;
				$this->customermodule->update_cusbill_details($CusBilldata, $id);//** Update Customer Billing Details **//
				
				$CusShipdata=array(
					'customer_shipping_customer_id'=>$id,
					'customer_shipping_address'=>$cus_ship_address,
					'customer_shipping_city_id'=>$shipping_city,
					'customer_shipping_state_id'=>$shipping_state,
					'customer_shipping_zipcode'=>$ship_zip_code,
					'customer_shipping_country_id'=>$shipping_country,
					);
				$this->customermodule->update_cusship_details($CusShipdata, $id);//** Update Customer Shipping Details **//
								
				$this->session->set_flashdata('message', 'Customer Updated Successfully');
				redirect('customer/customer_list');
			}
			else
			{
				$this->session->set_flashdata('message', 'Customer Already Exist');
				redirect('customer/addcustomer_details');
			}
		}
		else
		{
			$this->data['country'] = $this->customermodule->get_country();//** Get All Country **//
			
			$this->data['Editcus'] = $this->customermodule->getSingle_cus($id);//** Get Single Customer data **//
			$this->data['Editcus_bill'] = $this->customermodule->getSingle_cus_bill($id);//** Get Single Customer Billing data **//
			$this->data['Editcus_ship'] = $this->customermodule->getSingle_cus_ship($id);//** Get Single Customer Shipping data **//
			$this->data['area'] = $this->customermodule->get_area();//** get Area **//
		$Result_carrier=$this->mastersmodule->get_allcarrier();
			$this->data["carrier"] = $Result_carrier['rows'];
			
			$this->title = "Customer";
			$this->keywords = "Customer";
			$this->_render('pages/customer/editcustomer');
		}
		
	}
	
	//** View Customer **//
	
	public function viewcustomer($id)
	{
		//$this->data['country'] = $this->customermodule->get_country();//** Get All Country **//
		//$this->data['region'] = $this->customermodule->get_region();//** Get Region **//
		//$this->data['zone'] = $this->customermodule->get_zone();//** Get zone **//
		//$this->data['area'] = $this->customermodule->get_area();//** get Area **//
		$this->data['Editcus'] = $this->customermodule->getSingle_cus($id);//** Get Single Customer data **//
		$this->data['Editcus_bill'] = $this->customermodule->getSingle_cus_bill($id);//** Get Single Customer Billing data **//
		$this->data['Editcus_ship'] = $this->customermodule->getSingle_cus_ship($id);//** Get Single Customer Shipping data **//
		
		//$this->data['pricebook'] = $this->customermodule->get_pricebook();//** Get Price Book Details **//
		
		$this->title = "Customer";
		$this->keywords = "Customer";
		$this->_render('pages/customer/viewcustomer');
		
	}
	
	//** Customer Status Change **//
	
	public function deletecustomer($id,$status)
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
		
		$cus_del = array(
						'customer_status' => $changeStatus,
						'customer_update_date' => date('Y-m-d'),
						'customer_update_by'=>$sess_user,
					);			
		$this->customermodule->del_cus($cus_del,$id);
		$this->session->set_flashdata('message', 'Customer Deleted Successfully');
		redirect('customer/customer_list');
	
	}

	public function addressdata()
	{
		
	}
}
