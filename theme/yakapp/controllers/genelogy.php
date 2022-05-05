<?php ob_start();

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genelogy extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		//$this->output->enable_profiler(TRUE);
		
		$this->load->model('genelogytree');
      	$this->load->library('pagination');
		$this->load->dbutil();
		$this->load->helper('download');
		$this->data['sessionData'] = $this->session->userdata('userlogin');
		
		if($this->data['sessionData'] == "")
		{
			redirect('home'); 
		}
		else
		{
			$userLogin = $this->session->userdata('MPAdmin');
			$type = $userLogin['type'];
			if($type)
			{
				$roles= $this->genelogytree->getroletype($type);
				
				foreach ($roles as $ro) 
				{
					$module=$ro->modules;
					
					if($module == 'Enrollment'){
						
						$this->data['Enrollment']=$ro;
					}elseif ($module == 'Genealogy') {
						$this->data['Genealogy']=$ro;
					}elseif ($module == 'Project') {
						$this->data['Project']=$ro;
					}elseif ($module == 'Location') {
						$this->data['Location']=$ro;
					}elseif ($module == 'Sales') {
						$this->data['Sales']=$ro;
					}elseif ($module == 'Report') {
						$this->data['Report']=$ro;
					}elseif ($module == 'Roles') {
						$this->data['Roles']=$ro;
					}elseif ($module == 'Treeshuffling') {
						$this->data['Treeshuffling']=$ro;
					}elseif ($module == 'Superadmin') {
						$this->data['Superadmin']=$ro;
					}elseif ($module == 'Admin') {
						$this->data['Admin']=$ro;
					}elseif ($module == 'Processor') {
						$this->data['Processor']=$ro;
					}elseif ($module == 'Officer') {
						$this->data['Officer']=$ro;
					}elseif ($module == 'Employees') {
						$this->data['Employees']=$ro;
					}

					
				}
				

	     	}
		}
				
	}
   
	public function index()
	{
		redirect('genelogy/enrollment');
	}
	
	public function enrollment($sort_order='OFCR_ID',$sort_by='asc')
	{
		
		if (isset($_POST['search']))
			{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =25;
		$Result= $this->genelogytree->getenrollementsearchreport($limit,$page,$sort_order,$sort_by,$sess_user);
		$this->data["enrollment"] =$Result['rows'];
		   $config['first_link']='First';
		   $config['prev_link']='Prev';
			$config['next_link']='Next';
			
			$config['last_link']='Last';
			$config['base_url'] = site_url('genelogy/enrollment/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;  
		
		$this->title = "AGRO FARM";
		$this->keywords = "AGRO FARM";

		$this->_render('pages/enrollmentlist');
			}
			else
			{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =25;
		$Result= $this->genelogytree->getenrollementreport($limit,$page,$sort_order,$sort_by,$sess_user);
		$this->data["enrollment"] =$Result['rows'];
		   $config['first_link']='First';
		   $config['prev_link']='Prev';
			$config['next_link']='Next';
			
			$config['last_link']='Last';
			$config['base_url'] = site_url('genelogy/enrollment/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;  
		
		$this->title = "AGRO FARM";
		$this->keywords = "AGRO FARM";

		$this->_render('pages/enrollmentlist');
		}
	}
	
	
	public function getEnrollmentDetails()
	{
		$Sponsorid = $this->input->post('Sponsorid');
		
		$SId = $this->genelogytree->getEnrollementValue($Sponsorid);
		
		if(empty($SId))
		{
			echo "Not found";
		}
		else
		{
			foreach($SId as $STA)
			{
				$Select = "{$STA["OFCR_FST_NME"]}".' '."{$STA["OFCR_LST_NME"]}".' $/# '."{$STA["OFCR_MOB"]}";
			}
			echo $Select;
		}
		exit;
	}
	
	public function getEnrollmobileDetails()
	{
		$enroll_mobile = $this->input->post('enroll_mobile');
		
		$MId = $this->genelogytree->getEnrollemobileValue($enroll_mobile);
		
		if(empty($MId))
		{
			echo "Not found";
		}
		else
		{
			foreach($MId as $STA)
			{
				$Select = "{$STA["OFCR_FST_NME"]}".' '."{$STA["OFCR_LST_NME"]}".' $/# '."{$STA["OFCR_USR_VALUE"]}";
			}
			echo $Select;
		}
		exit;
	}
	
	public function getstate()
	{
		$con_id = $this->input->post('country');
		$state = $this->genelogytree->getAllState($con_id);
		
		if(empty($state))
		{
			echo "<option value='0'>Select Your State</option>";
		}
		else
		{
			$Select = "<option value=''>Select Your State</option>";
			foreach($state as $STA)
			{
				$Select .= "<option value='{$STA["ST_ID"]}'>{$STA["ST_NME"]}</option>";
			}
			echo $Select;
		}
		exit;
	}
	
	public function update_getState()
	{
		
		$con_id = $this->input->post('country');
		$st_id = $this->input->post('state');
		
		$state = $this->genelogytree->getAllState($con_id);
		
		if(empty($state))
		{
			echo "<option value='0'>Select Your State</option>";
		}
		else
		{
			$Select = "<option value=''>Select Your State</option>";
			foreach($state as $STA)
			{
				if($STA["ST_ID"] == $st_id)
				{
					$Select .= "<option value='{$STA["ST_ID"]}' selected='selected' >{$STA["ST_NME"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$STA["ST_ID"]}'>{$STA["ST_NME"]}</option>";
				}
				
			}
			echo $Select;
		}
		exit;
		
	}
	
	
	public function update_getCity()
	{
		
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$cty_id = $this->input->post('city');
		
		$city = $this->genelogytree->getcityList($country, $state);
		 
		if(empty($city))
		{
			echo "<option value=''>Select Your City</option>";
		}
		else
		{
			$Select = "<option value=''>Select Your City</option>";
			foreach($city as $CTY)
			{
				if($CTY["CTY_ID"] == $cty_id)
				{
					$Select .= "<option value='{$CTY["CTY_ID"]}' selected='selected' >{$CTY["CTY_NME"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$CTY["CTY_ID"]}'>{$CTY["CTY_NME"]}</option>";
				}
				
				
			}
			echo $Select;
		}
		exit;
		
	}
	
	
	public function getcityList()
	{
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$city = $this->genelogytree->getcityList($country, $state);
		 
		if(empty($city))
		{
			echo "<option value=''>Select Your City</option>";
		}
		else
		{
			$Select = "<option value=''>Select Your City</option>";
			foreach($city as $CTY)
			{
				
				$Select .= "<option value='{$CTY["CTY_ID"]}'>{$CTY["CTY_NME"]}</option>";
			}
			echo $Select;
		}
		exit;
	}
	
	public function officerform($underId="", $position="")
	{
		if(($underId != "") && ($position != ""))
		{
			$this->data['underId'] = $underId;
			$this->data['position'] = $position;
		}
		
		$res_cont= $this->genelogytree->get_allcountry();
	    $this->data["ctry"] = $res_cont['rows'];
		
		$this->title = "AGRO FARM";
		$this->keywords = "AGRO FARM";

		$this->_render('pages/officerregistration');
	}
	
	public function genelogyOfficerValidation()
	{
		$PlacementId = $this->input->post('PlacementId');
		
		$result = $this->genelogytree->getgenelogyofficerValidation($PlacementId);
		
		echo $result; exit;
	}
	
/*	public function genelogyValidation()
	{
		$PlacementId = $this->input->post('PlacementId');
		$position = $this->input->post('position');
		
		$result = $this->genelogytree->getgenelogyValidation($PlacementId, $position);
		
		echo $result; exit;
	}
	*/
	
	
	public function genelogyValidation()
	{
		$SponsorId = $this->input->post('SponsorId');
		$PlacementId = $this->input->post('PlacementId');
		$position = $this->input->post('position');
		
		if($SponsorId != $PlacementId)
		{
			$this->genelogytree->getgenelogyValidation($SponsorId, $PlacementId, $position);
			$ret = $this->genelogytree->genealogyValidation;
			if($ret == '0')
			{
				$result = $this->genelogytree->placementValidation($SponsorId, $PlacementId, $position);
			}
			else
			{
				$result = '1';
			}
			
		}
		else
		{
			$result = $this->genelogytree->placementValidation($SponsorId, $PlacementId, $position);
		}
		
		echo $result; exit;
	}
	
	
	public function genelogySponserValidation($SponsorId,$PlacementId,$position)
	{
		
		if($SponsorId != $PlacementId)
		{
			$this->genelogytree->getgenelogyValidation($SponsorId, $PlacementId, $position);
			$ret = $this->genelogytree->genealogyValidation;
			if($ret == '0')
			{
				$result = $this->genelogytree->placementValidation($SponsorId, $PlacementId, $position);
			}
			else
			{
				$result = '1';
			}
			
		}
		else
		{
			$result = $this->genelogytree->placementValidation($SponsorId, $PlacementId, $position);
		}
		
		return $result;
	}
	
	public function genelogyExtremePostion()
	{
		$SponsorId = $this->input->post('SponsorId');
		$position = $this->input->post('position');
		
		$result = $this->genelogytree->getExtremeNode($SponsorId,$position);
		
		print_r($result); exit;
	}
	
	public function addnewofficer()
	{
		
 		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$middlename = $this->input->post('middlename');
		$pancard = $this->input->post('pancard');
		$mobile = $this->input->post('mobile');
		$phone = $this->input->post('phone');
		$aadhar_no = $this->input->post('aadhar_no');
		$spouse_aadhar_no = $this->input->post('spouse_aadhar_no');
		$DOB = date('Y-m-d', strtotime($this->input->post('DOB')));
		
		if(($this->input->post('DOB') != "") && ($this->input->post('DOB') != "1970-01-01"))
		{
			$DOB = date('Y-m-d', strtotime($this->input->post('DOB')));
		}
		else
		{
			$DOB = "0000-00-00";
		}
		
		$displayname = $this->input->post('displayname');
		$enrollementtype = $this->input->post('enrollementtype');
		$companyname = $this->input->post('companyname');
		$companypan = $this->input->post('companypan');
		
		$spouse_firstname = $this->input->post('spouse_firstname');
		$spouse_lastname = $this->input->post('spouse_lastname');
		$spouse_middlename = $this->input->post('spouse_middlename');
		$spouse_pancard = $this->input->post('spouse_pancard');
		$spouse_mobile = $this->input->post('spouse_mobile');
		$spouse_DOB = date('Y-m-d', strtotime($this->input->post('spouse_DOB')));
		
		if(($this->input->post('spouse_DOB') != "") && ($this->input->post('spouse_DOB') != "1970-01-01"))
		{
			$spouse_DOB = date('Y-m-d', strtotime($this->input->post('spouse_DOB')));
		}
		else
		{
			$spouse_DOB = "0000-00-00";
		}
		
		$addressone = $this->input->post('addressone');
		$addresstwo = $this->input->post('addresstwo');
		$addressthree = $this->input->post('addressthree');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$country = $this->input->post('country');
		$pinCode = $this->input->post('pinCode');
		$email = $this->input->post('email');
		
		$accountHolderName = $this->input->post('accountHolderName');
		$accountno = $this->input->post('accountno');
		$bankName = $this->input->post('bankName');
		$IFSCNo = $this->input->post('IFSCNo');
		$AcType = $this->input->post('AcType');
		$BranchName = $this->input->post('BranchName');
		$BranchAddress = $this->input->post('BranchAddress');
		
		$Sponsor = $this->input->post('Sponsor');
		$placement = $this->input->post('placement');
		$tree = $this->input->post('treepostion');
 		
		//$sponsorValid = $this->genelogySponserValidation($Sponsor,$placement,$tree);
		
		//echo "<pre>"; print_r($sponsorValid); exit;
		$checkValidUsr = $this->genelogytree->ProfileMobileVaildation($mobile, $pancard);
		
		if($checkValidUsr == 0 )
		{
				
			$lastuserid = $this->genelogytree->getLastUserId();
			
			$userId = $lastuserid->OFCR_USR_ID + 27;
			
			$createuser = array(
				  'user_company_id' => $sess_company,
				  'user_group_id' => $sess_group,
				  'user_code' => $userId,
				  'user_first_name' => $firstname,
				  'user_name' => "AGROPRO".strtoupper($userId),
				 'user_phone' => $mobile,
				 'user_email' => $email,
				 'user_pwd' => md5($mobile),
				 'user_confirm_pwd' => md5($mobile),
				 'user_country' => $country,
				 'user_state' => $state,
				 'user_city' => $city,
				  );
			
			$cususerid = $this->genelogytree->insertcreateuser($createuser);
			
			$officerdata = array(
				  'OFCR_USR_ID' => $userId,
				  'OFCR_USR_VALUE' => "AGROPRO".strtoupper($userId),
				  'OFCR_USR_EMAIL' => strtoupper($email),
				  'OFCR_PWD' =>  md5($mobile),
				  'OFCR_FST_NME' => strtoupper($firstname),
				  'OFCR_LST_NME' => strtoupper($lastname),
				  'OFCR_MID_NME' => strtoupper($middlename),
				  'OFCR_DISP_NME' => strtoupper($displayname),
				  'OFCR_PAN' => strtoupper($pancard),
				  'OFCR_DOB' => $DOB,
				  'OFCR_MOB' => $mobile,
				  'OFCR_PHONE' => $phone,
				  'OFCR_ENROLL_TYP' => $enrollementtype,
				  'OFCR_CMP_NME' => strtoupper($companyname),
				  'OFCR_CMP_PAN' => strtoupper($companypan),
				  'OFCR_AADHAR' => $aadhar_no,
				  'OFCR_SPOUSE_AADHAR' => $spouse_aadhar_no,
				  'OFCR_SPOUSE_FST_NME' => strtoupper($spouse_firstname),
				  'OFCR_SPOUSE_LST_NME' => strtoupper($spouse_lastname),
				  'OFCR_SPOUSE_MID_NME' => strtoupper($spouse_middlename),
				  'OFCR_SPOUSE_PAN' => strtoupper($spouse_pancard),
				  'OFCR_SPOUSE_DOB' => $spouse_DOB,
				  'OFCR_SPOUSE_MOB' => $spouse_mobile,
				  'OFCR_STAT' => 'active',
				  'OFCR_SESS_USR_ID' => $sess_user,
				  'OFCR_ADD_USR_ID' => $cususerid,
				  'OFCR_ADD_DT' => date('Y-m-d'),
				  'OFCR_UPD_DT' => date('Y-m-d h:i:s'),
				  );
			
			$officer_id = $this->genelogytree->insertOfficerBasicInfo($officerdata);
			
			
			
			
			$newUserSubfolder = "resources/uploads/".$officer_id;
		mkdir($newUserSubfolder,0755,true); 
		
		$imgpan = rand(). $_FILES['pan_card']['name'];
        move_uploaded_file($_FILES['pan_card']['tmp_name'], "resources/uploads/".$officer_id."/".$imgpan);
		
		$imgaadhar = rand(). $_FILES['aadhar_xerox']['name'];
        move_uploaded_file($_FILES['aadhar_xerox']['tmp_name'], "resources/uploads/".$officer_id."/".$imgaadhar);
		
		$imgpassbook = rand(). $_FILES['passbook_xerox']['name'];
        move_uploaded_file($_FILES['passbook_xerox']['tmp_name'], "resources/uploads/".$officer_id."/".$imgpassbook);
		
		
		
		if($_FILES['user_photo']['name'] != '')
		{
		$imguser_photo = rand(). $_FILES['user_photo']['name'];
        move_uploaded_file($_FILES['user_photo']['tmp_name'], "resources/uploads/".$officer_id."/".$imguser_photo);
		}
		else
		{
			$imguser_photo =  $_FILES['user_photo']['name'];
			move_uploaded_file($_FILES['user_photo']['tmp_name'], "resources/uploads/".$officer_id."/".$imguser_photo);
		}
		
		$officerdocu = array(
				  'officer_id' => $officer_id,
				  'pan_card' => $imgpan,
				  'aadhar_xerox' => $imgaadhar,
				  'passbook_xerox' => $imgpassbook,
				  'user_photo' => $imguser_photo,
				 
				  );
			
			$officerbilling = $this->genelogytree->insertOfficerdocument($officerdocu);
			
			$officerbillingdata = array(
				  'OFCR_BILL_OFCR_ID' => $officer_id,
				  'OFCR_BILL_ADDRS1' => strtoupper($addressone),
				  'OFCR_BILL_ADDRS2' => strtoupper($addresstwo),
				  'OFCR_BILL_ADDRS3' => strtoupper($addressthree),
				  'OFCR_BILL_CNTRY' => $country,
				  'OFCR_BILL_ST' => $state,
				  'OFCR_BILL_CTY' => $city,
				  'OFCR_BILL_ZIP' => $pinCode,
				  'OFCR_BILL_EMAIL' => strtoupper($email),
				  );
			
			$officerbilling = $this->genelogytree->insertOfficerBillingAddress($officerbillingdata);
			
			$officerbankingdata = array(
				  'OFCR_BNK_OFCR_ID' => $officer_id,
				  'OFCR_BNK_ACCNT_HOLD_NME' => strtoupper($accountHolderName),
				  'OFCR_BNK_ACCNT_NUM' => $accountno,
				  'OFCR_BNK_NME' => strtoupper($bankName),
				  'OFCR_BNK_IFSC' => strtoupper($IFSCNo),
				  'OFCR_BNK_ACCNT_TYP' => $AcType,
				  'OFCR_BNK_BRN_NME' => strtoupper($BranchName),
				  'OFCR_BNK_BRN_ADDR' => strtoupper($BranchAddress),
				  );
			
			$officerbanking = $this->genelogytree->insertOfficerBankingDetails($officerbankingdata);
			
			$officerplacementdata = array(
				  'OFCR_TRE_OFCR_ID' => $officer_id,
				  'OFCR_TRE_USR_ID' => "AGROPRO".strtoupper($userId),
				  'OFCR_TRE_SPNCR_ID' => strtoupper($Sponsor),
				  'OFCR_TRE_UNDR_ID' => strtoupper($Sponsor),
				  'OFCR_TRE_LEG' => 'right',
				  'OFCR_ADD_DT' => date('Y-m-d h:i:s'),
				  );
			
			$officerbanking = $this->genelogytree->insertOfficerPlacementDetails($officerplacementdata);
			
			$officerrankdata = array(
				  'OFCR_ID' => $officer_id,
				  'OFCR_RANK_USR_ID' => "AGROPRO".strtoupper($userId),
				  'OFCR_QUALIFICATION_ID' => '1',
				  'OFCR_RANK_UPD_DT' => date('Y-m-d'),
				  'OFCR_RANK_STAT' => 'active',
				  );
			
			$this->genelogytree->insertOfficerRankingDetails($officerrankdata);
			
			//SMS Integration
			
			//For Sms---------------------------------------------------------------------------------
			$strmsg = "Hi ".$firstname.", Welcome to AGRO. Username: AGROPRO".strtoupper($userId).", Password: ".$mobile.".Kindly login through the following link, www.agroreforming.com";
			
			
			
			 $url='http://smsserver9.creativepoint.in/api.php?username=agro&password=605649&to='.$mobile.'&from=BLKSMS&message='.urlencode($strmsg).'';
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
				  'user_id' => strtoupper($userId),
				  'phone_no' => $mobile,
				  'message' => $strmsg,
				  'created_date' => date('Y-m-d'),
				  'response' => $return_val,
				  );
			
			$this->genelogytree->insertSMSDetails($sms_details);
			
			
			$data['user'] = $officerdata;
			
			$message = $this->load->view('pages/mailtemplate/Enrollementsuccess', $data, true);
			
			$this->load->library('email');

    			$config=array(
					'charset'=>'utf-8',
					'wordwrap'=> TRUE,
					'mailtype' => 'html'
				);

			$this->email->initialize($config);

			$this->email->from('velmurugan@neophrontech.com');
			$this->email->to($email); 

			$this->email->subject('AGRO FARM - Enrolled Successfully');
			$this->email->message($message);    

			@$this->email->send();
		
			
			$this->session->set_flashdata('message', 'Profile Added Successfully');
			//redirect('genelogy/enrollment');
			redirect('genelogy/officerform/');
				
		}
		else
		{
			$this->session->set_flashdata('message', 'Please Provide Valid Email or Sponsor ID');
			redirect('genelogy/officerform/');
		}
	}
	
	public function genelogyExtremeBottomPostion()
	{
		$SponsorId = $this->input->post('SponsorId');
		$position = $this->input->post('position');
		
		$result = $this->genelogytree->getExtremetBottomNode($SponsorId,$position);
		
		print_r($result); exit;
	}
	
	
	public function genelogyTree()
	{		
		
		$genelogyUser = $this->session->userdata('genelogy_user_admin');
		//echo "<pre>"; print_r($genelogyUser); exit;
			
		if($genelogyUser != "")
		{
			$key = $genelogyUser['key'];
			$officers = $this->genelogytree->getofficer('1');
			
			$genelogyUser  = $officers->OFCR_USR_ID;
			
			$this->data['officerUserId'] = $genelogyUser;
			
		}
		else
		{
			$officers = $this->genelogytree->getofficer('1');
			
			$genelogyUser  = $officers->OFCR_USR_ID;
			
			$this->data['officerUserId'] = $genelogyUser;
			
			$genelogy  = array('key' => $genelogyUser);
			
			$this->session->set_userdata('genelogy_user_admin', $genelogy);
			
			$genelogyUser = $this->session->userdata('genelogy_user_admin');
			
			$key = $genelogyUser['key'];
		}
		
		$this->data['genealogy_user_data'] = $this->genelogytree->getGenealogyUser($key);
		
		$level = $this->genelogytree->buildRootNetwork($key);	
		
		$level = $this->genelogytree->buildLevelByLevelNetwork($key, 1, $level);
		
		$level = $this->genelogytree->buildLevelByLevelNetwork($key, 2, $level);
		
		//$level = $this->genelogytree->buildLevelByLevelNetwork($key, 3, $level);
		
		$this->data['genelogy_data'] = $this->genelogytree->sponsors_list;
		
		//echo "<pre>"; print_r($this->data['genealogy_user_data']); exit;
		
		$this->title = "AGRO FARM";
		$this->keywords = "AGRO FARM";

		$this->_render('pages/genologytree');
	}
	
	public function genelogyView()
	{		
		$officerId = $this->input->post('officerId');	
		
		$this->session->unset_userdata('genelogy_user_admin');
		
		$genelogy  = array('key' => $officerId);
		
		$this->session->set_userdata('genelogy_user_admin', $genelogy);
		
		$genelogyUser = $this->session->userdata('genelogy_user_admin');
		
		$key = $genelogyUser['key'];
		
		$officers = $this->genelogytree->getofficer('4');
			
		$genelogyUser  = $officers->OFCR_USR_ID;
		
		$this->data['officerUserId'] = $genelogyUser;
		
		$this->data['genealogy_user_data'] = $this->genelogytree->getGenealogyUser($key);
		
		$level = $this->genelogytree->buildRootNetwork($key);	
		
		$level = $this->genelogytree->buildLevelByLevelNetwork($key, 1, $level);
		
		$level = $this->genelogytree->buildLevelByLevelNetwork($key, 2, $level);
		
		$level = $this->genelogytree->buildLevelByLevelNetwork($key, 3, $level);
		
		$this->data['genelogy_data'] = $this->genelogytree->sponsors_list;
		
		echo $this->load->view('pages/genelogy/genelogy.php', $this->data, TRUE);
		
		exit;
		
	}
	
	
	public function getserachgenealogy()
	{
		$search = $this->input->post('search');
		
		$officers = $this->genelogytree->getofficer('4');
			
		$officerId = $officers->OFCR_USR_ID;
		
		$this->genelogytree->getGenealogySearch($search,$officerId);
		
		$this->data['genealogy_search_data'] = $this->genelogytree->searchResult;
				
		echo $this->load->view('pages/genelogy/genealogyserach.php', $this->data, TRUE);
		
		exit;
	}
	
	
	public function editOfficerProfile($id)
	{
	   	
		$res_cont= $this->genelogytree->get_allcountry();
	    $this->data["ctry"] = $res_cont['rows'];
		
		$loginUser = $this->session->userdata('UserLogin');

		if(isset($_POST['updateProfile']))
		{
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$middlename = $this->input->post('middlename');
			$pancard = $this->input->post('pancard');
			$mobile = $this->input->post('mobile');
			$phone = $this->input->post('phone');
			$DOB = date('Y-m-d', strtotime($this->input->post('DOB')));
			
			if(($this->input->post('DOB') != "") && ($this->input->post('DOB') != "1970-01-01"))
			{
			$DOB = date('Y-m-d', strtotime($this->input->post('DOB')));
			}
			else
			{
			$DOB = "0000-00-00";
			}
						
			$displayname = $this->input->post('displayname');
			$enrollementtype = $this->input->post('enrollementtype');
			$companyname = $this->input->post('companyname');
			$companypan = $this->input->post('companypan');
			
			$spouse_firstname = $this->input->post('spouse_firstname');
			$spouse_lastname = $this->input->post('spouse_lastname');
			$spouse_middlename = $this->input->post('spouse_middlename');
			$spouse_pancard = $this->input->post('spouse_pancard');
			$spouse_mobile = $this->input->post('spouse_mobile');
			$spouse_DOB = date('Y-m-d', strtotime($this->input->post('spouse_DOB')));
			
			if(($this->input->post('spouse_DOB') != "") && ($this->input->post('spouse_DOB') != "1970-01-01"))
			{
			$spouse_DOB = date('Y-m-d', strtotime($this->input->post('spouse_DOB')));
			}
			else
			{
			$spouse_DOB = "0000-00-00";
			}
						
			$addressone = $this->input->post('addressone');
			$addresstwo = $this->input->post('addresstwo');
			$addressthree = $this->input->post('addressthree');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$country = $this->input->post('country');
			$pinCode = $this->input->post('pinCode');
			$email = $this->input->post('email');
			
			$accountHolderName = $this->input->post('accountHolderName');
			$accountno = $this->input->post('accountno');
			$bankName = $this->input->post('bankName');
			$IFSCNo = $this->input->post('IFSCNo');
			$AcType = $this->input->post('AcType');
			$BranchName = $this->input->post('BranchName');
			$BranchAddress = $this->input->post('BranchAddress');

			//echo $id; exit;
			
			//$checkValidUsr = $this->genelogytree->UpdateProfileEmailVaildation($mobile, $pancard, $id);
			$checkValidUsr = 0;
			//echo $checkValidUsr; exit;
			
			if($checkValidUsr == 0)
			{
				
				$officerdata = array(
					  'OFCR_USR_EMAIL' => $email,
					  'OFCR_FST_NME' => $firstname,
					  'OFCR_LST_NME' => $lastname,
					  'OFCR_MID_NME' => $middlename,
					  'OFCR_DISP_NME' => $displayname,
					  'OFCR_PAN' => $pancard,
					  'OFCR_DOB' => $DOB,
					  'OFCR_MOB' => $mobile,
					  'OFCR_PHONE' => $phone,
					  'OFCR_ENROLL_TYP' => $enrollementtype,
					  'OFCR_CMP_NME' => $companyname,
					  'OFCR_CMP_PAN' => $companypan,
					  'OFCR_SPOUSE_FST_NME' => $spouse_firstname,
					  'OFCR_SPOUSE_LST_NME' => $spouse_lastname,
					  'OFCR_SPOUSE_MID_NME' => $spouse_middlename,
					  'OFCR_SPOUSE_PAN' => $spouse_pancard,
					  'OFCR_SPOUSE_DOB' => $spouse_DOB,
					  'OFCR_SPOUSE_MOB' => $spouse_mobile,
					  'OFCR_UPD_DT' => date('Y-m-d h:i:s'),
					  );
				
				$this->genelogytree->updateOfficerBasicInfo($officerdata,$id);
				
				$newUserSubfolder = "resources/uploads/".$id;
				mkdir($newUserSubfolder,0755,true); 
				
								
				$doc_imgpan = $_FILES['pan_card']['name'];
				if($doc_imgpan != "")
				{
					$imgpan = rand(). $_FILES['pan_card']['name'];
					move_uploaded_file($_FILES['pan_card']['tmp_name'], "resources/uploads/".$id."/".$imgpan);
				}
				else
				{
					$imgpan =	$this->input->post('hiddenpan_card');
				}
		
		$doc_aadhar = $_FILES['aadhar_xerox']['name'];
				if($doc_aadhar != "")
				{
					$imgaadhar = rand(). $_FILES['aadhar_xerox']['name'];
					move_uploaded_file($_FILES['aadhar_xerox']['tmp_name'], "resources/uploads/".$id."/".$imgaadhar);
				}
				else
				{
					$imgaadhar =	$this->input->post('hiddenaadhar');
				}
				
		$doc_passbook = $_FILES['passbook_xerox']['name'];
				if($doc_passbook != "")
				{
					$imgpassbook = rand(). $_FILES['passbook_xerox']['name'];
					move_uploaded_file($_FILES['passbook_xerox']['tmp_name'], "resources/uploads/".$id."/".$imgpassbook);
				}
				else
				{
					$imgpassbook =	$this->input->post('hiddenpassbook');
				}
				
	    $doc_userphoto = $_FILES['profilepicture']['name'];
				if($doc_userphoto != "")
				{
					$imguser_photo = rand(). $_FILES['profilepicture']['name'];
					move_uploaded_file($_FILES['profilepicture']['tmp_name'], "resources/uploads/".$id."/".$imguser_photo);
				}
				else
				{
					$imguser_photo =	$this->input->post('hiddenprofilepicture');
				}	
		
		$officerdocu = array(
				  'officer_id' => $id,
				  'pan_card' => $imgpan,
				  'aadhar_xerox' => $imgaadhar,
				  'passbook_xerox' => $imgpassbook,
				  'user_photo' => $imguser_photo,
				 
				  );
			
			$officerbilling = $this->genelogytree->updateOfficerdocument($officerdocu,$id);
				
				$officerbillingdata = array(
					  'OFCR_BILL_OFCR_ID' => $id,
					  'OFCR_BILL_ADDRS1' => $addressone,
					  'OFCR_BILL_ADDRS2' => $addresstwo,
					  'OFCR_BILL_ADDRS3' => $addressthree,
					  'OFCR_BILL_CNTRY' => $country,
					  'OFCR_BILL_ST' => $state,
					  'OFCR_BILL_CTY' => $city,
					  'OFCR_BILL_ZIP' => $pinCode,
					  'OFCR_BILL_EMAIL' => $email,
					  );
				
				$this->genelogytree->updateOfficerBillingAddress($officerbillingdata,$id);
				
				$officerbankingdata = array(
					  'OFCR_BNK_OFCR_ID' => $id,
					  'OFCR_BNK_ACCNT_HOLD_NME' => $accountHolderName,
					  'OFCR_BNK_ACCNT_NUM' => $accountno,
					  'OFCR_BNK_NME' => $bankName,
					  'OFCR_BNK_IFSC' => $IFSCNo,
					  'OFCR_BNK_ACCNT_TYP' => $AcType,
					  'OFCR_BNK_BRN_NME' => $BranchName,
					  'OFCR_BNK_BRN_ADDR' => $BranchAddress,
					  );
				
				$this->genelogytree->updateOfficerBankingDetails($officerbankingdata,$id);
				
				$this->session->set_flashdata('message', 'Profile Updated Successfully');
				redirect('genelogy/editOfficerProfile/'.$id);
				
			}
			else
			{
					$this->session->set_flashdata('message', 'This Email or Pancard Already Exist');
					redirect('genelogy/editOfficerProfile/'.$id);
			}
		}
		else
		{
			$this->data['edituserdetails'] = $this->genelogytree->editSingleProfile($id);
			//echo "<pre>"; print_r($this->data['edituserdetails']); exit;
			$this->title = "AGRO FARM - Edit Profile";
			$this->keywords = "AGRO FARM";
			$this->_render('pages/editofficerprofile');
		}
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
	public function getroletype()
	{  
	}

	public function treeshuffling()
	{
		if(isset($_POST['shuffling']))
		{
			$officerId = $this->input->post('Officer');
			$sponsorId = $this->input->post('Sponsor');
			$placementId = $this->input->post('placement');
			$position = $this->input->post('tree');
			
			$officer_details = $this->genelogytree->get_tree_shuffling_offier_details($officerId);
						
			if($sponsorId != $placementId)
			{
				$this->genelogytree->getgenelogyValidation($sponsorId, $placementId, $position);
				$ret = $this->genelogytree->genealogyValidation;
				if($ret == '0')
				{
					$valid = $this->genelogytree->placementValidation($sponsorId, $placementId, $position);
				}
				else
				{
					$valid = '1';
				}
				
			}
			else
			{
				$valid = $this->genelogytree->placementValidation($sponsorId, $placementId, $position);
			}
			
			if($valid == 0)
			{
				$old_sponserId = $officer_details->OFCR_TRE_SPNCR_ID;
				$old_placementId = $officer_details->OFCR_TRE_UNDR_ID;
				$old_position = $officer_details->OFCR_TRE_LEG;
				
				$data = array(
					'OFCR_TRE_SPNCR_ID' => $sponsorId,
					'OFCR_TRE_UNDR_ID' => $placementId,
					'OFCR_TRE_LEG' => $position,
				);
				
				
				$this->genelogytree->update_tree_shuffling($data, $officerId);
				/*$this->genelogytree->get_officer_details($officerId, $placementId, $officerId);
				$shuffle_separate_tree = $this->genelogytree->shuffle_separate_tree;
				$shuffle_sponser_tree = $this->genelogytree->shuffle_sponser_tree;
				
				foreach($shuffle_sponser_tree as $SPNCR_TREE)
				{
					foreach($shuffle_separate_tree as $TREE)
					{
						if($TREE['OFCR_TRE_UNDR_ID'] == $SPNCR_TREE['OFCR_TRE_USR_ID'])
						{
							$shuffle_tree = array(
								'OFCR_TRE_OFCR_ID' => $TREE['OFCR_TRE_USR_ID'],
								'OFCR_TRE_SPNCR_ID' => $TREE['OFCR_TRE_USR_ID'],
								'OFCR_TRE_UNDR_ID' => '',
								'OFCR_TRE_LEG' => $TREE['OFCR_TRE_LEG'],
							);
							echo "<pre>"; print_r($shuffle_tree);
						}
					}
						
				}
				echo "<pre>"; print_r($shuffle_separate_tree);
				echo "<pre>"; print_r($shuffle_sponser_tree);
				exit;*/
				
				$this->session->set_flashdata('message', 'Tree Shuffling Updated Suuccessfully');
				redirect('genelogy/treeshuffling');
			}
			else
			{
				$this->session->set_flashdata('message', 'Please Enter Valid Informations');
				redirect('genelogy/treeshuffling');
			}
					
		}
		else
		{
			$this->title = "AGRO FARM - Edit Profile";
			$this->keywords = "AGRO FARM";
			$this->_render('pages/tree');
		}
	}
	
	
	
	public function editprofile($id)
	{
	//	echo "hai";exit;
		
		if(isset($_POST['updateProfile']))
		{
			
			$firstname = $this->input->post('fName');
			$lastname = $this->input->post('lName');
			$email = $this->input->post('email');
			$dob = $this->input->post('dob');
			$gender = $this->input->post('gender');
			
			$checkValidUsr = $this->genelogytree->updateadminprofileemailvaildation($email,$id);
			
		if($checkValidUsr == 0)
			{	
				$data = array(
					  'ADMIN_USR_FST_NME' => $firstname,
					  'ADMIN_USR_LST_NME' => $lastname,
					  'ADMIN_USR_EML' => $email,
					  'ADMIN_USR_UPD_DT' => date('Y-m-d h:i:s'),
					  );
				
				$this->genelogytree->updateadminprofile($id,$data);
				$this->session->set_flashdata('message', 'Details Updated Successfully');
				redirect('genelogy'); 				
			}
			else
			{
				$this->session->set_flashdata('message', 'This Email Already Exist');
				redirect('genelogy/editProfile/'.'/'.$id);
				
			}
		}
			else
		{
			
			$this->data['editadmindetails'] = $this->genelogytree->editadminprofile($id);

			$this->title = "AGRO FARM - Edit Profile";
			$this->keywords = "AGRO FARM";
			$this->_render('pages/editadminprofile');
		}
	}
	
	public function changepassword($userId)
	{ 
		if($this->session->userdata('MPAdmin') == "")
		{
			redirect('home/login'); 
		}
	
		if(isset($_POST['changePwd']))
		{
			$currentPassword = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword');
			$confirmPassword = $this->input->post('confirmPassword');
			
			$data = array(
				'ADMIN_USR_PWD' => md5($newPassword),
			);
			
			$this->genelogytree->ChangePassword($userId, $data);
			$this->session->set_flashdata('message', 'Password Changed Successfully');
			redirect('genelogy/changepassword/'.'/'.$userId);
		}
		else
		{
			$this->title = "AGRO FARM - Change Password";
			$this->keywords = "AGRO FARM";
		
			$this->_render('pages/changepassword');
		}
		
	}
	
	
	
	
	
}
?>