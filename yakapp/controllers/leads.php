<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  
		  $this->load->library('session');
		  
		  $this->load->helper('security');
		  $this->load->helper(array('form', 'url'));
		  $this->load->library('form_validation');
		  
		  $this->load->library('email');
		  $this->load->library('pagination');
		  $this->load->model('leadmodule');
		  $this->load->model('locationmodel');
		  $this->load->model('homemodule');
		  $this->load->model('mastersmodule');
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
	public function get_state()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		
		$state = $this->locationmodel->getAllState($con_id);
		
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
	public function get_city()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		$cty_id = $this->input->post('city');
		
		$city = $this->locationmodel->getAllcity($con_id,$sta_id);
		
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

	public function index()
	{
		redirect('leads/lead_list');
	}
	
	public function lead_list($sort_order='lead_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->leadmodule->get_leads($limit,$page,$sort_order,$sort_by);
		$this->data["leads_list"] = $Result['rows'];
 		//echo "<pre>";print_r($sessionData);exit;

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('leads/lead_list').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
		$this->title = "Leads";
		$this->keywords = "Leads";
		$this->_render('pages/leads/lead_list');
	}
	
	public function addlead()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		if(isset($_POST['save']))
		{
			$leads_salutation = $this->security->xss_clean($this->input->post('salutation'));
			$leads_first_name = $this->security->xss_clean($this->input->post('first_name'));
			$leads_lastname = $this->security->xss_clean($this->input->post('lastname'));
			$leads_primary_num = $this->security->xss_clean($this->input->post('primary_num'));
			$leads_company = $this->security->xss_clean($this->input->post('company'));
			$leads_mobile_num = $this->security->xss_clean($this->input->post('mobile_num'));
			$leads_designation = $this->security->xss_clean($this->input->post('designation'));
			$assign_meeting = $this->security->xss_clean($this->input->post('assign_meeting'));
			
			
			$assign_meeting  = date("Y-m-d H:i", strtotime($this->input->post('assign_meeting')));
			$leads_fax = $this->security->xss_clean($this->input->post('fax'));
			$leads_lead_source = $this->security->xss_clean($this->input->post('lead_source'));
			$leads_primary_email = $this->security->xss_clean($this->input->post('primary_email'));
			$leads_industry = $this->security->xss_clean($this->input->post('industry'));
			$leads_website = $this->security->xss_clean($this->input->post('website'));
			$leads_annual_revenue = $this->security->xss_clean($this->input->post('annual_revenue'));
			$leads_laead_option = $this->security->xss_clean($this->input->post('leadstatus'));
			$leads_num_emp = $this->security->xss_clean($this->input->post('num_emp'));
			$leads_rating = $this->security->xss_clean($this->input->post('rating'));
			$leads_secondary_mail = $this->security->xss_clean($this->input->post('secondary_mail'));
			$leads_assign_to = $this->security->xss_clean($this->input->post('assign_to'));
			$leads_emailoptout = $this->security->xss_clean($this->input->post('emailoptout'));
			
			
			if($leads_emailoptout== "yes")
			{
				$option=$leads_emailoptout;
			}
			else
			{
				$option="no";
			}
			$leads_street = $this->security->xss_clean($this->input->post('street'));
			$leads_po_box = $this->security->xss_clean($this->input->post('po_box'));
			$leads_po_code= $this->security->xss_clean($this->input->post('po_code'));
			$leads_city = $this->security->xss_clean($this->input->post('city'));
			$leads_state = $this->security->xss_clean($this->input->post('state'));
			$leads_country = $this->security->xss_clean($this->input->post('country'));
			
			$leads_description = $this->security->xss_clean($this->input->post('description'));
			
			
			
		 	$ValidLeads= $this->leadmodule->valid_lead($leads_primary_email);						// leads check 
			if($ValidLeads == 0)
			{
			 $LeadsData=array(
				 
				'lead_salutation'=>$leads_salutation,
				'lead_first_name'=>$leads_first_name,
				'lead_last_name'=>$leads_lastname,
				'lead_phone'=>$leads_primary_num,
				'lead_mobile'=>$leads_mobile_num,
				'lead_primary_email'=>$leads_primary_email,
				'lead_secondary_email'=>$leads_secondary_mail,
				'lead_source'=>$leads_lead_source,
				'lead_company'=>$leads_company,
				'lead_industry'=>$leads_industry,
				'lead_designation'=>$leads_designation,
				'lead_fax_number' => $leads_fax,
				'lead_annual_revenue' => $leads_annual_revenue,
				'lead_website' =>$leads_website,
				'lead_status'=>$leads_laead_option, 
				'lead_no_of_employees' =>$leads_num_emp,
				'lead_rating' =>$leads_rating,
				'lead_email_optout' =>$option,
				'lead_assigned_to' =>$leads_assign_to,
				'lead_asssign_meeting' =>$assign_meeting,
				'status' =>'enable',
				'lead_add_date' => date('Y-m-d h:i:s'),
				'lead_created_by' =>$sess_user,
				'lead_modified_by'=> $sess_user,
				);
		 
				
				 $leadid=$this->leadmodule->add_lead_details($LeadsData);
					
			 $LeadsSubData=array(
				'lead_id'=>$leadid,
				'lead_address'=>$leads_street,
				'lead_street'=>$leads_street,
				'lead_city_id'=>$leads_city,
				'lead_state_id'=>$leads_state,
				'lead_country_id'=>$leads_country,
				'lead_pobox'=>$leads_po_box,
				'lead_zipcode'=>$leads_po_code,
				'lead_description'=>$leads_description,
				);
			  $this->leadmodule->add_leads_subdetails($LeadsSubData);
			 $this->session->set_flashdata('message', 'Leads Added Successfully');
			// echo  $this->session->flashdata('message');exit;
			redirect('leads/lead_list');
			}
			else
			{
				$this->session->set_flashdata('message', 'Leads Already Exist');
				redirect('leads/lead_list');
			}
			
		}
		else
		{
		$this->data['city'] = $this->leadmodule->get_city();
		$this->data['state'] = $this->leadmodule->get_state();
		$this->data['country'] = $this->leadmodule->get_country();	
		$this->data["users"] =$this->leadmodule->users_list($sess_group,$sess_company);
		$this->data['userid'] = $sess_user;
		 //echo "<pre>";print_r($this->data["city"]);exit;
		$this->title = "Leads";
		$this->keywords = "Leads";
		$this->_render('pages/leads/addleads');
		}
	}
	public function editleads($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if(isset($_POST['save']))
		{
			$leads_salutation = $this->security->xss_clean($this->input->post('salutation'));
			$leads_first_name = $this->security->xss_clean($this->input->post('first_name'));
			$leads_lastname = $this->security->xss_clean($this->input->post('lastname'));
			$leads_primary_num = $this->security->xss_clean($this->input->post('primary_num'));
			$leads_company = $this->security->xss_clean($this->input->post('company'));
			$leads_mobile_num = $this->security->xss_clean($this->input->post('mobile_num'));
			$leads_designation = $this->security->xss_clean($this->input->post('designation'));
			$leads_fax = $this->security->xss_clean($this->input->post('fax'));
			$leads_lead_source = $this->security->xss_clean($this->input->post('lead_source'));
			$assign_meeting  = date("Y-m-d H:i", strtotime($this->input->post('assign_meeting')));
			$leads_primary_email = $this->security->xss_clean($this->input->post('primary_email'));
			$leads_industry = $this->security->xss_clean($this->input->post('industry'));
			$leads_website = $this->security->xss_clean($this->input->post('website'));
			$leads_annual_revenue = $this->security->xss_clean($this->input->post('annual_revenue'));
			$leads_laead_option = $this->security->xss_clean($this->input->post('leadstatus'));
			$leads_num_emp = $this->security->xss_clean($this->input->post('num_emp'));
			$leads_rating = $this->security->xss_clean($this->input->post('rating'));
			$leads_secondary_mail = $this->security->xss_clean($this->input->post('secondary_mail'));
			$leads_assign_to = $this->security->xss_clean($this->input->post('assign_to'));
			$emailoptout = $this->security->xss_clean($this->input->post('emailoptout'));
			if($emailoptout== "yes")
			{
				$option=$emailoptout;
			}
			else
			{
				$option="no";
			}
			$email_ownew=$this->security->xss_clean($this->input->post('email_ownew'));
			if($email_ownew== "yes")
			{
				$option_owener=$email_ownew;
			}
			else
			{
				$option_owener="no";
			}
			$leads_street = $this->security->xss_clean($this->input->post('street'));
			$leads_po_box = $this->security->xss_clean($this->input->post('po_box'));
			$leads_po_code= $this->security->xss_clean($this->input->post('po_code'));
			$leads_city = $this->security->xss_clean($this->input->post('city'));
			$leads_state = $this->security->xss_clean($this->input->post('state'));
			$leads_country = $this->security->xss_clean($this->input->post('country'));
			
			$leads_description = $this->security->xss_clean($this->input->post('description'));
		 	 
			 $LeadsData=array(
				'lead_salutation'=>$leads_salutation,
				'lead_first_name'=>$leads_first_name,
				'lead_last_name'=>$leads_lastname,
				'lead_phone'=>$leads_primary_num,
				'lead_mobile'=>$leads_mobile_num,
				'lead_primary_email'=>$leads_primary_email,
				'lead_secondary_email'=>$leads_secondary_mail,
				'lead_source'=>$leads_lead_source,
				'lead_company'=>$leads_company,
				'lead_industry'=>$leads_industry,
				'lead_designation'=>$leads_designation,
				'lead_fax_number' => $leads_fax,
				'lead_status'=>$leads_laead_option, 
				'lead_annual_revenue' => $leads_annual_revenue,
				'lead_website' =>$leads_website,
				'lead_no_of_employees' =>$leads_num_emp,
				'lead_rating' =>$leads_rating,
				'lead_email_optout' =>$option,
				'lead_assigned_to' =>$leads_assign_to,
				'lead_asssign_meeting' =>$assign_meeting,
				'status' =>'enable',
				'lead_created_by' => date('Y-m-d h:i:s'),
				'lead_add_date' =>$sess_user,
				'lead_modified_by'=> $sess_user,
				 
				);
			//	echo "<PRE>";print_r($LeadsData);exit;
			 $this->leadmodule->update_lead_details($LeadsData,$id);
			 $LeadsSubData=array(
				'lead_id'=>$id,
				'lead_address'=>$leads_street,
				'lead_street'=>$leads_street,
				'lead_city_id'=>$leads_city,
				'lead_state_id'=>$leads_state,
				'lead_country_id'=>$leads_country,
				'lead_pobox'=>$leads_po_box,
				'lead_zipcode'=>$leads_po_code,
				'lead_description'=>$leads_description,
				);
				//echo "<PRE>";print_r($LeadsSubData);exit;
			 $this->leadmodule->update_leads_subdetails($LeadsSubData,$id);
			 $this->session->set_flashdata('message', 'Leads Updated Successfully');
			redirect('leads/lead_list');
			}
		else
		{
		$this->data['Editleads'] = $this->leadmodule->getSingle_leads($id);
		$this->data['Editleads_meeting'] = $this->leadmodule->getSingle_lead_meeting($id);
		$this->data['Editleads_addr'] = $this->leadmodule->getSingle_leadsaddr($id);
		$this->data['city'] = $this->leadmodule->get_city();
		$this->data['state'] = $this->leadmodule->get_state();
		$this->data['country'] = $this->leadmodule->get_country();	
		// echo "<PRE>";print_r($this->data['Editleads']);exit;
		$this->title = "Leads";
		$this->keywords = "Leads";
		$this->_render('pages/leads/editleads');
		}
	}
	
	public function leadconvert($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$this->data['userid'] = $sess_user;
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data['Editleads'] = $this->leadmodule->getSingle_leads($id);
		$this->data['Editleads_addr'] = $this->leadmodule->getSingle_leadsaddr($id);
		$this->data["users"] =$this->leadmodule->users_list($sess_group,$sess_company);
		$this->title = "Leads";
		$this->keywords = "Leads";
		$this->_render('pages/leads/view_lead');
	
	}
	
	public function leadconvertion($id)
	{
	 	$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$Editleads = $this->leadmodule->getSingle_leads($id);
		$Editleads_addr = $this->leadmodule->getSingle_leadsaddr($id);
	//	echo "<PRE>";print_r($Editleads);exit;
	 	 
		$leads_salutation=$Editleads->lead_salutation;
		$leads_first_name=$Editleads->lead_first_name;
		$leads_lastname=$Editleads->lead_last_name;
		$leads_primary_num=$Editleads->lead_phone;
		$leads_mobile_num=$Editleads->lead_mobile;
		$leads_primary_email=$Editleads->lead_primary_email;
		$leads_secondary_mail=$Editleads->lead_secondary_email;
		$leads_lead_source=$Editleads->lead_source;
		$leads_company=$Editleads->lead_company;
		$leads_industry=$Editleads->lead_industry;
		$leads_designation=$Editleads->lead_designation;
		$leads_fax=$Editleads->lead_fax_number;
		$leads_annual_revenue=$Editleads->lead_annual_revenue;
		$leads_website=$Editleads->lead_website;
		$leads_num_emp=$Editleads->lead_status;
		$leads_rating=$Editleads->lead_rating;
		$option=$Editleads->lead_email_optout;
				$leadid=$id;
				
		if(!empty($Editleads_addr))
		{
			
		$lead_address=$Editleads_addr->lead_address;
		$lead_city_id=$Editleads_addr->lead_city_id;
		$lead_state_id=$Editleads_addr->lead_state_id;
		$lead_country_id=$Editleads_addr->lead_country_id;
		$lead_zipcode=$Editleads_addr->lead_zipcode;
		$leads_description=$Editleads_addr->lead_description;

		}
		else 
		{
		$lead_address= NULL ;
		$lead_city_id=NULL;
		$lead_state_id=NULL;
		$lead_country_id=NULL;
		$lead_zipcode=NULL;
		$leads_description=NULL;
	
		}
		
		$organization = $this->input->post('organization');
		
		if($organization != "")
		{
		  $company = $this->input->post('company');
		  $industry = $this->input->post('industry');
		  $assign_to = $this->input->post('assign_to');
		}
		
		$contact = $this->input->post('contact');
		if($contact != "")
		{
		 	$first_name = $this->input->post('first_name');
			$lastname = $this->input->post('lastname');
			$primary_email = $this->input->post('primary_email');
			$assign_to = $this->input->post('assign_to');
		}
		
		
		$opportunity = $this->input->post('opportunity');
		if($opportunity != "")
		{ 
			$opr_name = $this->input->post('opr_name');
			$exep_close_date = $this->input->post('exep_close_date');
			$sales_stage = $this->input->post('sales_stage');
			$opp_amount = $this->input->post('opp_amount');
			$assign_to = $this->input->post('assign_to');
		}
		
		$transferModule = $this->input->post('transferModule');
		
		//echo $transferModule;exit;
		if($transferModule =="Organization")
		
		{
		 
		/*First disable tp leads Data*/
		
			  $this->leadmodule->update_lead_con($id);		
			
			$ORG_data=array(
							'organization_name'=>$company,
							'organization_industry'=>$industry,
							'organization_primary_phone'=>$leads_primary_num,
							'organization_primary_email'=>$leads_primary_email,
							'organization_website'=>$leads_website,
							'organization_annual_revenue'=>$leads_annual_revenue,
							'organization_fax_number'=>$leads_fax,
							'organization_type'=>$leads_industry,
							'organization_description'=>$leads_description, 
							'organization_assigned_to'=>$assign_to,
							'organization_created_by'=>$sess_user,
							'organization_modified_by'=>$sess_user,
							'organization_status'=>'active',
							'organization_add_date'=> date('Y-m-d h:i:s'),
						);
						
					//	echo "<pre>";print_r($ORG_data);echo"<br>";$org_last_id =1;
			 $org_last_id = $this->leadmodule->add_org_details($ORG_data);
						
		   $ORG_bill=array(
							'organization_billing_org_id'=>$org_last_id,
							'organization_billing_address'=>$lead_address,
							'organization_billing_city_id'=>$lead_city_id,
							'organization_billing_state_id'=>$lead_state_id,
							'organization_billing_country_id'=>$lead_country_id,
							'organization_billing_zipcode'=>$lead_zipcode,
							);
					//echo "<pre>";print_r($ORG_bill);echo"<br>";
								 
			 $this->leadmodule->add_org_bill_details($ORG_bill);	
							
		   $ORG_ship=array(
							'organization_shipping_org_id'=>$org_last_id,
							'organization_shipping_address'=>$lead_address,
							'organization_shipping_city_id'=>$lead_city_id,
							'organization_shipping_state_id'=>$lead_state_id,
							'organization_shipping_country_id'=>$lead_country_id,
							'organization_shipping_zipcode'=>$lead_zipcode,
							);
					//	echo "<pre>";print_r($ORG_ship);echo"<br>";
					 $this->leadmodule->add_org_ship_details($ORG_ship);	
					
			$CON_data=array(
							'contact_salutation'=>$leads_salutation,
							'contact_first_name'=>$first_name,
							'contact_last_name'=>$lastname,
							'contact_office_phone'=>$leads_primary_num,
							'contact_mobile_phone'=>$leads_mobile_num,
							'contact_primary_email'=>$primary_email,
							'contact_secondary_email'=>$leads_secondary_mail,
							'contact_lead_source'=>$leads_lead_source,
							'contact_email_optout' =>$option,
							'contact_description'=>$leads_description, 
							'contact_assigned_to'=>$assign_to,
							'contact_created_by'=>$sess_user,
							'contact_status'=>'enable',
							'contact_add_date'=> date('Y-m-d h:i:s'),
							'contact_modified_by'=>$sess_user, 
							'contact_modified_by'=>$sess_user,
							);
			//echo "<pre>";print_r($CON_data);echo"<br>";	$con_last_id=1;	
				 
		 	$con_last_id= $this->leadmodule->add_contact_details($CON_data);
			
			 $CON_bill=array(
							'contact_mailling_contact_id'=>$con_last_id,
							'contact_mailing_address'=>$lead_address,
							'contact_mailing_city_id'=>$lead_city_id,
							'contact_mailing_state_id'=>$lead_state_id,
							'contact_mailing_country_id'=>$lead_country_id,
							'contact_mailing_zipcode'=>$lead_zipcode,
							);
				//	echo "<pre>";print_r($CON_bill);echo"<br>";		
				 $this->leadmodule->add_contact_bill_details($CON_bill);
			
			$Opp_data=array(
							'opp_name'=>$opr_name,
							'org_name'=>$company,
							'opp_amount'=>$opp_amount,
							'opp_salse_stage'=>$sales_stage,
							'opp_exp_close_date'=>date("Y-m-d", strtotime($exep_close_date)),
							'opp_contact_name'=>$first_name,
							'cont_mob'=>$leads_mobile_num,
							'org_address'=>$lead_address,
							'org_country' =>$lead_country_id,
							'org_state'=>$lead_state_id,
							'org_city'=>$lead_city_id,
							'org_email'=>$primary_email,
							'org_phone'=>$leads_primary_num,
							'org_zipcde'=>$lead_zipcode,
							 'opp_lead_soruce'=>$leads_lead_source,
							'opp_description'=>$leads_description, 
							'opp_assign'=>$assign_to,
							'opp_added_by'=>$sess_user,
							'opp_status'=>'active',
							'opp_add_date'=> date('Y-m-d h:i:s'),
							'opp_modify_by'=>$sess_user, 
							);
							
				// 	 echo "<pre>";print_r($Opp_data);exit;
							
			$this->leadmodule->add_opper_details($Opp_data);
			$this->session->set_flashdata('message', 'Leads Converstaion Successfully');
			redirect('opportunities/opportunities_list');				
							
							
		}
		if($transferModule =="Contacts")
		{
			$this->leadmodule->update_lead_con($id);	
			$ORG_data=array(
							'organization_name'=>$company,
							'organization_industry'=>$industry,
							'organization_primary_phone'=>$leads_primary_num,
							'organization_primary_email'=>$leads_primary_email,
							'organization_website'=>$leads_website,
							'organization_annual_revenue'=>$leads_annual_revenue,
							'organization_fax_number'=>$leads_fax,
							'organization_type'=>$leads_industry,
							'organization_description'=>$leads_description, 
							'organization_assigned_to'=>$assign_to,
							'organization_created_by'=>$sess_user,
							'organization_modified_by'=>$sess_user,							
							'organization_status'=>'active',
							'organization_add_date'=> date('Y-m-d h:i:s'),
						);
						
					//echo "<pre>";print_r($ORG_data);echo"<br>"; $org_last_id =1;		
			 $org_last_id = $this->leadmodule->add_org_details($ORG_data);
						
		   $ORG_bill=array(
							'organization_billing_org_id'=>$org_last_id,
							'organization_billing_address'=>$lead_address,
							'organization_billing_city_id'=>$lead_city_id,
							'organization_billing_state_id'=>$lead_state_id,
							'organization_billing_country_id'=>$lead_country_id,
							'organization_billing_zipcode'=>$lead_zipcode,
							);
					//	echo "<pre>";print_r($ORG_bill);echo"<br>"; 		 
			 $this->leadmodule->add_org_bill_details($ORG_bill);	
							
		   $ORG_ship=array(
							'organization_shipping_org_id'=>$org_last_id,
							'organization_shipping_address'=>$lead_address,
							'organization_shipping_city_id'=>$lead_city_id,
							'organization_shipping_state_id'=>$lead_state_id,
							'organization_shipping_country_id'=>$lead_country_id,
							'organization_shipping_zipcode'=>$lead_zipcode,
							);
					//	echo "<pre>";print_r($ORG_ship);echo"<br>"; 
					 $this->leadmodule->add_org_ship_details($ORG_ship);	
					
			$CON_data=array(
							'contact_salutation'=>$leads_salutation,
							'contact_first_name'=>$first_name,
							'contact_last_name'=>$lastname,
							'contact_office_phone'=>$leads_primary_num,
							'contact_mobile_phone'=>$leads_mobile_num,
							'contact_primary_email'=>$primary_email,
							'contact_secondary_email'=>$leads_secondary_mail,
							'contact_lead_source'=>$leads_lead_source,
							'contact_email_optout' =>$option,
							'contact_description'=>$leads_description, 
							'contact_assigned_to'=>$assign_to,
							'contact_created_by'=>$sess_user,
							'contact_modified_by'=>$sess_user,
							'contact_status'=>'enable',
							'contact_add_date'=> date('Y-m-d h:i:s'),
							'contact_modified_by'=>$sess_user,
							);
			//echo "<pre>";print_r($CON_data);echo"<br>"; $con_last_id =1;
		 	$con_last_id= $this->leadmodule->add_contact_details($CON_data);
			
			 $CON_bill=array(
							'contact_mailling_contact_id'=>$con_last_id,
							'contact_mailing_address'=>$lead_address,
							'contact_mailing_city_id'=>$lead_city_id,
							'contact_mailing_state_id'=>$lead_state_id,
							'contact_mailing_country_id'=>$lead_country_id,
							'contact_mailing_zipcode'=>$lead_zipcode,
							);
				//	echo "<pre>";print_r($CON_bill);echo"<br>";		
				 $this->leadmodule->add_contact_bill_details($CON_bill);
			
			$Opp_data=array(
							'opp_name'=>$opr_name,
							'org_name'=>$company,
							'opp_amount'=>$opp_amount,
							'opp_salse_stage'=>$sales_stage,
							'opp_exp_close_date'=>date("Y-m-d", strtotime($exep_close_date)),
							'opp_contact_name'=>$first_name,
							'cont_mob'=>$leads_mobile_num,
							'org_address'=>$lead_address,
							'org_country' =>$lead_country_id,
							'org_state'=>$lead_state_id,
							'org_city'=>$lead_city_id,
							'org_email'=>$primary_email,
							'org_phone'=>$leads_primary_num,
							'org_zipcde'=>$lead_zipcode,
							 'opp_lead_soruce'=>$leads_lead_source,
							'opp_description'=>$leads_description, 
							'opp_assign'=>$assign_to,
							'opp_added_by'=>$sess_user,
							'opp_status'=>'active',
							'opp_add_date'=> date('Y-m-d h:i:s'),
							'opp_modify_by'=>$sess_user, 

							);
							
						// echo "<pre>";print_r($Opp_data);exit;
							
			 $this->leadmodule->add_opper_details($Opp_data);
					$this->session->set_flashdata('message', 'Leads Converstaion Successfully');
					redirect('contacts/contact_list');	
			
		}
		
		
	}
	
	public function deleteleads($id,$status)
	{
		if($status == 'enable')
		{
			$changeStatus = 'disable';
		}
		else
		{
			$changeStatus = 'enable';
		}
		
		$LeadsData = array(
						'status' => $changeStatus,
						'lead_update_date' => date('Y-m-d'),
						'lead_modified_by'=> $sess_user,
					);
					
		$this->leadmodule->update_lead_details($LeadsData,$id);
		 
		$this->session->set_flashdata('message', 'Leads Deleted Successfully');
		redirect('leads/lead_list');
	}
	
	public function add_meeting($id)
	{	
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
				
		if(isset($_POST['save_meeting']))
		{
		$meeting_subject = $this->security->xss_clean($this->input->post('meeting_subject'));
		$assigned_to= $this->security->xss_clean($this->input->post('assigned_to'));
		$meeting_start_date  = date("Y-m-d H:i", strtotime($this->input->post('meeting_start_date')));
		$meeting_end_date  = date("Y-m-d H:i", strtotime($this->input->post('meeting_end_date')));
	
		$contact_name= $this->security->xss_clean($this->input->post('contact_name'));
		$contact_mob= $this->security->xss_clean($this->input->post('contact_mob'));
		$meeting_priority= $this->security->xss_clean($this->input->post('meeting_priority'));
		$meeting_status= $this->security->xss_clean($this->input->post('meeting_status'));
		$invite= $this->security->xss_clean($this->input->post('invite'));
		$meeting_loc= $this->security->xss_clean($this->input->post('meeting_loc'));
		$notify= $this->security->xss_clean($this->input->post('notify'));
		$description= $this->security->xss_clean($this->input->post('description'));
		$data['invite'] =  implode(",", $invite);
		
		
		$valid_meeting= $this->leadmodule->meeting_validation($assigned_to,$meeting_start_date,$meeting_end_date);
		
		if($valid_meeting == 0 )
		{
		$meeting_data=array(
				"lead_met_lead_id" => $id,
				"lead_met_assign_to" => $assigned_to,
				"lead_met_subject" => $meeting_subject,
				"lead_met_meeting_start_time" => $meeting_start_date,
				"lead_met_meeting_end_time" => $meeting_end_date,
				"lead_met_contact_name" => $contact_name,
				"lead_met_contact_number" => $contact_mob,
				"lead_met_meeting_status" => $meeting_status,
				"lead_met_priority" => $meeting_priority,
				"lead_met_invite" => $data['invite'],
				"lead_met_location" => $meeting_loc,
				"lead_met_notify" => $notify,
				"lead_met_descript" => $description,
				"lead_met_created_by" => $sess_user,
				"lead_met_modified_by" => $sess_user,
				"lead_met_add_date" => date('Y-m-d h:i:s')			
				);
	
		$this->leadmodule->add_meeting_details($meeting_data);
	
		$this->session->set_flashdata('message', 'Meeting scheduled successfully');
		redirect('leads/leadconvert/'. $id);
	
		}
		else 
		{
			$this->session->set_flashdata('message', 'Meeting Alredy Scheduled for this time');
			redirect('leads/leadconvert/'. $id);
		}
		}
	}
	
	public function edit_meeting()
	{
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$lead_id = $this->input->post('lead_id');
		$met_id = $this->input->post('met_id');
		
	
		
		$this->data["edit_single_meeting"] = $this->leadmodule->get_single_meeting_popup($met_id);
		$this->data["users"] =$this->leadmodule->users_list($sess_group,$sess_company);
		$this->data['userid'] = $sess_user;
		$this->data['met_id'] = $met_id;
		$this->data['lead_id'] = $lead_id;
		//print_r($this->data["edit_single_meeting"]);exit;
		$result = $this->load->view("pages/leads/meeting_edit_popup", $this->data, true);
				
		echo $result; 
		
	
	}
	
	public function update_meeting()
	{	
	
	
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$meeting_id = $this->security->xss_clean($this->input->post('edit_meeting_id'));
		$meeting_subject = $this->security->xss_clean($this->input->post('edit_meeting_subject'));
		$lead_id = $this->security->xss_clean($this->input->post('lead_id'));
		
		
		$assigned_to= $this->security->xss_clean($this->input->post('edit_assigned_to'));
		$meeting_start_date  = date("Y-m-d H:i", strtotime($this->input->post('edit_meeting_start_date')));
		$meeting_end_date  = date("Y-m-d H:i", strtotime($this->input->post('edit_meeting_end_date')));
	
		$contact_name= $this->security->xss_clean($this->input->post('edit_contact_name'));
		$contact_mob= $this->security->xss_clean($this->input->post('edit_contact_mob'));
		$meeting_priority= $this->security->xss_clean($this->input->post('edit_meeting_priority'));
		$meeting_status= $this->security->xss_clean($this->input->post('edit_meeting_status'));
		$invite= $this->security->xss_clean($this->input->post('edit_invite'));
		$meeting_loc= $this->security->xss_clean($this->input->post('edit_meeting_loc'));
		$description= $this->security->xss_clean($this->input->post('edit_description'));
		$data['invite'] =  implode(",", $invite);
		
	 	
		//$valid_meeting= $this->leadmodule->meeting_validation($assigned_to,$meeting_start_date,$meeting_end_date);
		
		
		$meeting_data=array(
				
				"lead_met_assign_to" => $assigned_to,
				"lead_met_subject" => $meeting_subject,
				"lead_met_meeting_start_time" => $meeting_start_date,
				"lead_met_meeting_end_time" => $meeting_end_date,
				"lead_met_contact_name" => $contact_name,
				"lead_met_contact_number" => $contact_mob,
				"lead_met_meeting_status" => $meeting_status,
				"lead_met_priority" => $meeting_priority,
				"lead_met_invite" => $data['invite'],
				"lead_met_location" => $meeting_loc,
				"lead_met_notify" => $notify,
				"lead_met_descript" => $description,
				"lead_met_created_by" => $sess_user,
				"lead_met_modified_by" => $sess_user,
				"lead_met_add_date" => date('Y-m-d h:i:s')			
				);
	
		$this->leadmodule->update_meeting_details($meeting_data, $meeting_id);
	
		$this->session->set_flashdata('message', 'Meeting Updated successfully');
		redirect('leads/editleads/'. $lead_id);
	
	}
		
		
	
	
	
	
	public function logout()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$this->session->sess_destroy('userlogin');
		$this->load->model('homemodule');
		$ip_address= $this->homemodule->get_client_ip();
		$date=date("Y-m-d H:i:s"); 
		$values=array(
				"login_histroy_signout_time" => $date,
				"login_histroy_status" => 'signedoff',
				);
		//echo "<pre>"; print_r($values); exit;
		$insert_logout_details=$this->homemodule->insert_logout_details($sess_user, $ip_address, $values);			
		$this->session->set_flashdata('message', 'You are Logged Out successfully');
		redirect('signin/login');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */