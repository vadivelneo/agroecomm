<?php

Class Genelogytree extends CI_Model
{	
	var $sponsors_list;
	
	var $personal_count;
	
	var $sale_count;
	
	var $searchResult;
	
	var $genealogyValidation;
	
	function __construct()
    {
        //Call the Model constructor
        parent::__construct();
    }
	
	
	public function insertcreateuser($createuser)
	{
		$this->db->insert('users', $createuser);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	
	public function getenrollementreport($limit,$start,$sort_order,$sort_by,$sess_user)
	{
		//echo $sess_user; exit;
		if($sess_user == 1)
		{
			$result['rows'] = $this->db->select('OFCR.OFCR_ID,OFCR.OFCR_USR_ID,OFCR.OFCR_USR_VALUE,OFCR.OFCR_USR_EMAIL,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,OFCR.OFCR_PAN,OFCR.OFCR_MOB,TREE.OFCR_TRE_SPNCR_ID,Qualification.rank')
						->from('officer as OFCR')
						->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK')
						->join('officer_tree as TREE', 'TREE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID')
						//->where('CTY.CTY_STAT', 'enable')
						 ->order_by($sort_order, $sort_by)
						  ->limit($limit, $start)
						 ->get()->result_array(); 
	
		$Count = $this->db->select('count(*) as TotalRows')
						->from('officer')
						->get()->row();
		$result['num_rows'] = $Count->TotalRows;
		return $result;
		}
		else
		{
			$result['rows'] = $this->db->select('OFCR.OFCR_ID,OFCR.OFCR_USR_ID,OFCR.OFCR_USR_VALUE,OFCR.OFCR_USR_EMAIL,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,OFCR.OFCR_PAN,OFCR.OFCR_MOB,TREE.OFCR_TRE_SPNCR_ID,Qualification.rank')
						->from('officer as OFCR')
						->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK')
						->join('officer_tree as TREE', 'TREE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID')
						->where('OFCR.OFCR_ADD_USR_ID', $sess_user)
						 ->order_by($sort_order, $sort_by)
						  ->limit($limit, $start)
						 ->get()->result_array(); 
	
		$Count = $this->db->select('count(*) as TotalRows')
						->from('officer')
						->where('OFCR_ADD_USR_ID', $sess_user)
						->get()->row();
		$result['num_rows'] = $Count->TotalRows;
		return $result;
		}
		
		 
	}
	
	public function getenrollementsearchreport($limit,$start,$sort_order,$sort_by,$sess_user)
	{
		//echo $sess_user; exit;
		if($sess_user == 1)
		{
			$OfficerID = $this->security->xss_clean($this->input->post('OfficerID'));
			$OfficerName = $this->security->xss_clean($this->input->post('OfficerName'));
			$OfficerMobile = $this->security->xss_clean($this->input->post('OfficerMobile'));
			$this->db->select('OFCR.OFCR_ID,OFCR.OFCR_USR_ID,OFCR.OFCR_USR_VALUE,OFCR.OFCR_USR_EMAIL,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,OFCR.OFCR_PAN,OFCR.OFCR_MOB,TREE.OFCR_TRE_SPNCR_ID,Qualification.rank');
						$this->db->from('officer as OFCR');
						$this->db->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK');
						$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID');
						
		if($OfficerID != "")
		{
			$this->db->like('OFCR.OFCR_USR_VALUE', $OfficerID);
		}
		if($OfficerName != "")
		{
			$this->db->like('OFCR.OFCR_FST_NME', $OfficerName);
		}
		if($OfficerMobile != "")
		{
			$this->db->like('OFCR.OFCR_MOB', $OfficerMobile);
		}
						//->where('CTY.CTY_STAT', 'enable')
						 $this->db->order_by($sort_order, $sort_by);
						 $this->db ->limit($limit, $start);
						 $result['rows'] =$this->db->get()->result_array(); 
						 
					 
	
		$this->db->select('count(*) as TotalRows');
						$this->db->from('officer');
						$Count = $this->db->get()->row();
		$result['num_rows'] = $Count->TotalRows;
		return $result;
		}
		else
		{
			$this->db->select('OFCR.OFCR_ID,OFCR.OFCR_USR_ID,OFCR.OFCR_USR_VALUE,OFCR.OFCR_USR_EMAIL,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,OFCR.OFCR_PAN,OFCR.OFCR_MOB,TREE.OFCR_TRE_SPNCR_ID,Qualification.rank');
						$this->db->from('officer as OFCR');
						$this->db->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK');
						$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID');
						$this->db->where('OFCR.OFCR_ADD_USR_ID', $sess_user);
						 $this->db->order_by($sort_order, $sort_by);
						 $this->db->limit($limit, $start);
						 $result['rows'] =$this->db->get()->result_array(); 
	
		$this->db->select('count(*) as TotalRows');
						$this->db->from('officer');
						$Count = $this->db->get()->row();
		$result['num_rows'] = $Count->TotalRows;
		return $result;
		}
		
		 
	}
	
	
	public function getroletype($type)
	{
		         $this->db->select("user_name,modules,add,edit,delete,view,import,export,status_change,update_date");
                 $this->db->from('role');
                 $this->db->where('user_name', $type);
                 $query = $this->db->get();
                 $result = $query->result();
                 return $result;

     }
     
	
	public function GetOfficerNamewithRank($officer_id)
	{
		$this->db->select('OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,Qualification.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_rank as RANK', 'RANK.OFCR_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as Qualification', 'Qualification.id = RANK.OFCR_QUALIFICATION_ID');
		$this->db->where('OFCR.OFCR_USR_ID', $officer_id);
		$query = $this->db->get()->result();

		return $query;
	}
	
	public function get_allcountry()
	{
		$ret['rows'] = $this->db->select('*')
						->from('cntry')
						->where('CNTRY_STAT', 'enable')
						   
						 ->get()->result_array(); 
						 return $ret;
	}
	
	public function getcityList($country, $state)
	{
		$ret =  $this->db->select('*')
						->from('cty')
						->where('CTY_CNTRY_ID', $country)
						->where('CTY_ST_ID', $state)
					 
						->get()->result_array();
		//echo $this->db->last_query(); exit;	
		return $ret;
	}
	
	function getgenelogyofficerValidation($PlacementId)
	{
		$this->db->select('OFCR.OFCR_USR_ID');
		$this->db->from('officer as OFCR');
		$this->db->where('OFCR.OFCR_USR_ID', $PlacementId);
		$ret = $this->db->get();
		$num = $ret->num_rows();
		return $num;
	}
	
	/*function getgenelogyValidation($PlacementId, $position)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('TREE.OFCR_TRE_UNDR_ID', $PlacementId);
		$this->db->where('TREE.OFCR_TRE_LEG', $position);
		$ret = $this->db->get();
		$num = $ret->num_rows();
		return $num;
	}*/
	
	function placementValidation($SponsorId, $PlacementId, $position)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('TREE.OFCR_TRE_UNDR_ID', $PlacementId);
		$this->db->where('TREE.OFCR_TRE_LEG', $position);
		$ret = $this->db->get();
		$num = $ret->num_rows();
		
		return $num;
	}
	
	
	function Validation($SponsorId, $PlacementId, $position)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('TREE.OFCR_TRE_UNDR_ID', $SponsorId);
		$ret = $this->db->get()->result_array();
		
		foreach($ret as $row)
		{
			if($row['OFCR_TRE_USR_ID'] == $PlacementId)
			{
				$this->db->select('TREE.*');
					$this->db->from('officer_tree as TREE');
					$this->db->where('TREE.OFCR_TRE_UNDR_ID', $PlacementId);
					$this->db->where('TREE.OFCR_TRE_LEG', $position);
					$ret = $this->db->get();
					$num = $ret->num_rows();
					
					if($num == '0')
					{
						$this->genealogyValidation = '0';
					}
					else
					{
						$this->genealogyValidation = '1';
					}
				return true;
			}
			else
			{
				$this->Validation($row['OFCR_TRE_USR_ID'], $PlacementId, $position);
			}
			
		}
		
	}
	
	function getgenelogyValidation($SponsorId, $PlacementId, $position)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('TREE.OFCR_TRE_UNDR_ID', $SponsorId);
		$ret = $this->db->get()->result_array();
		
		if(!empty($ret))
		{
			foreach($ret as $row)
			{
				if($row['OFCR_TRE_USR_ID'] == $PlacementId)
				{
					$this->genealogyValidation = '0';
					return true;
				}
				else
				{
					$this->Validation($row['OFCR_TRE_USR_ID'], $PlacementId, $position);
				}
				
			}
		}
		
	}
	
	public function getEnrollementValue($Sponsorid)
	{
		$ret =  $this->db->select('*')
						->from('officer')
						->where('OFCR_USR_VALUE', $Sponsorid)
					//	->where('PRO_CAT_STAT', 'active')
						->get()->result_array();
		
		return $ret;
	}
	
	public function getEnrollemobileValue($enroll_mobile)
	{
		$ret =  $this->db->select('*')
						->from('officer')
						->where('OFCR_MOB', $enroll_mobile)
					//	->where('PRO_CAT_STAT', 'active')
						->get()->result_array();
		
		return $ret;
	}
	
	public function getAllState($con_id)
	{
		$ret =  $this->db->select('*')
						->from('st')
						->where('ST_CN_ID', $con_id)
					//	->where('PRO_CAT_STAT', 'active')
						->get()->result_array();
		
		return $ret;
	}
	
	public function getState()
	{
		$ret['rows'] = $this->db->select('*')
						->from('st')
						->where('ST_STAT', 'enable')
						   
						 ->get()->result_array(); 
						 return $ret;
	}
	
	public function getCity()
	{
		$ret['rows'] = $this->db->select('*')
						->from('cty')
						->where('CTY_STAT', 'enable')
						   
						 ->get()->result_array(); 
						 return $ret;
	}
	
	public function getExtremeNode($node,$position) 
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $node);
		$this->db->where('OFCR_TRE_LEG', $position);
		$query = $this->db->get();
		
		$row1 = $query->result();
		if(!empty($row1)){
		$row = $row1[0];
		$node = $this->getExtremeNode($row->OFCR_TRE_USR_ID,$position);	
		}
			
		return $node;
	}
	
	
	function getLastUserId()
	{
		$this->db->select('OFCR.OFCR_USR_ID');
		$this->db->from('officer as OFCR');
		$this->db->order_by('OFCR.OFCR_ID', 'desc');
		$ret = $this->db->get()->row();
		return $ret;
	}
	
	function insertOfficerBasicInfo($officerdata)
	{
		$this->db->insert('officer', $officerdata);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
	}
	
	function insertOfficerdocument($officerdocu)
	{
		$this->db->insert('officer_docu', $officerdocu);
		
		return true;
	}
	
	function insertOfficerBillingAddress($officerbillingdata)
	{
		$this->db->insert('officer_bill', $officerbillingdata);
		
		return true;
	}
	
	function insertOfficerBankingDetails($officerbankingdata)
	{
		$this->db->insert('officer_bank', $officerbankingdata);
		
		return true;
	}
	
	function insertOfficerPlacementDetails($officerplacementdata)
	{
		$this->db->insert('officer_tree', $officerplacementdata);
		
		return true;
	}
	
	function insertOfficerRankingDetails($officerrankdata)
	{
		$this->db->insert('officer_rank', $officerrankdata);
		
		return true;
	}
	function insertSMSDetails($officerrankdata)
	{
		$this->db->insert('sms_details', $officerrankdata);
		
		return true;
	}
	public function getExtremetBottomNode($node,$position) 
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $node);
		$this->db->where('OFCR_TRE_LEG', $position);
		$query = $this->db->get();
		
		$row1 = $query->result();
		if(!empty($row1)){
		$row = $row1[0];
		$node = $this->getExtremetBottomNode($row->OFCR_TRE_USR_ID,$position);	
		}
			
		return $node;
	}
	
	public function getofficer($id)
	{
		$this->db->select('*');
		$this->db->from('officer');
		$this->db->where('OFCR_ID', $id);
		$this->db->limit(1);
		$result = $this->db->get()->row();
		
		return $result;
	}
	
	public function getGenealogyUser($key)
	{
		$this->db->select('OFCR.*,TREE.*,RANKD.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as RANKD', 'RANKD.id = OFCR.OFCR_RNK');
		$this->db->where('OFCR.OFCR_USR_ID', $key);
		$ret['user'] = $this->db->get()->row();
		
		
		/*$ret['user']->COUNT_SPNCR = $this->children_count($key);
		$ret['user']->LFT_COUNT = $this->sub_children_count($key,"left");
		$ret['user']->RIGHT_COUNT = $this->sub_children_count($key,"right");
		
		$ret['user']->PERSONALY_COUNT_SPNCR = $this->personal_children_count($key);
		$this->personal_count = 0;
		$this->personal_sub_children_count($key,$key,0,"left");
		$ret['user']->PERSONALY_LFT_COUNT = $this->personal_count;
		$this->personal_count = 0;
		$this->personal_sub_children_count($key,$key,0,"right");
		$ret['user']->PERSONALY_RIGHT_COUNT = $this->personal_count;*/
		
		$this->db->select('OFCR.*,TREE.*,RANKD.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as RANKD', 'RANKD.id = OFCR.OFCR_RNK');
		$this->db->where('OFCR.OFCR_USR_ID', $ret['user']->OFCR_TRE_SPNCR_ID);
		$ret['sponser'] = $this->db->get()->row();
		
		//echo "<pre>"; print_r($ret); exit;
		
		return $ret;
	}
	
	
	public function buildRootNetwork($key)
	{
		$level = array();
		$this->sponsors_list[] = $this->root_node($key);
		$level[] = $key;
		return $level;
	}
	
	public function addLeftLeg($key,$msg)
	{	
		
		$row = new StdClass();
		
		$row->COUNT_SPNCR = '';
		$row->LFT_COUNT = '';
		$row->RIGHT_COUNT ='';
		
		$row->PERSONALY_COUNT_SPNCR = '';
		$row->PERSONALY_LFT_COUNT = '';
		$row->PERSONALY_RIGHT_COUNT = '';
		$row->OFCR_TRE_UNDR_ID = $key;
		$row->OFCR_TRE_LEG = 'L';
		$row->STATUS = false;
		$row->MESSAGE = $msg;
		
		return $row;
	}
	
	public function addRightLeg($key,$msg)
	{
		$row = new StdClass();
		
		$row->COUNT_SPNCR = '';
		$row->LFT_COUNT = '';
		$row->RIGHT_COUNT ='';
		
		$row->PERSONALY_COUNT_SPNCR = '';
		$row->PERSONALY_LFT_COUNT = '';
		$row->PERSONALY_RIGHT_COUNT = '';
		$row->OFCR_TRE_UNDR_ID = $key;	
		$row->OFCR_TRE_LEG = 'R';
		$row->STATUS = false;
		$row->MESSAGE = $msg;
		
		return $row;
	}
	
	public function buildLevelByLevelNetwork($key, $counter, $level)
	{
		
		$level1 = array();
		for($i=0; $i<$counter; $i++)
		{
			$myclients = array();
			if($level[$i]!='add' && $level[$i]!='')
			{
				$this->db->select('TREE.*');
				$this->db->from('officer_tree as TREE');
				$this->db->where('OFCR_TRE_UNDR_ID', $level[$i]);
				$this->db->order_by("OFCR_TRE_LEG", "asc"); 
				$query = $this->db->get();
				$num = $query->num_rows();
				$rows = $query->result();
				
				// no child case
				if(!$num)
				{
					$myclients[]= $this->addLeftLeg($level[$i],"Add Left Leg");
					$myclients[]= $this->addRightLeg($level[$i],"Add Right Leg");
					$level1[] = 'add';
					$level1[] = 'add';
				}
				//if child exist
				else if($num > 0)
				{
					foreach($rows as $row)
					{					
						//if only one child exist
						if($num == 1)
						{
							//if right leg child exist
							if($row->OFCR_TRE_LEG=="right")
							{
								$myclients[] = $this->addLeftLeg($level[$i],"Add Left Leg");
								$myclients[] = $this->root_node($row->OFCR_TRE_USR_ID);
								$level1[] = 'add';
								$level1[] = $row->OFCR_TRE_USR_ID;
							}
							else  // if left leg child exist
							{
								$myclients[] = $this->root_node($row->OFCR_TRE_USR_ID);
								$myclients[] = $this->addRightLeg($level[$i],"Add Right Leg");
								$level1[] = $row->OFCR_TRE_USR_ID;
								$level1[] = 'add';
							}
						}
						else  //both child exist left and right leg
						{
							$myclients[] = $this->root_node($row->OFCR_TRE_USR_ID);
							$level1[] = $row->OFCR_TRE_USR_ID;
						}
					} //end while loop
				}
				$this->sponsors_list[] = $myclients;
			} else{
				
				$myclients[]= $this->addLeftLeg($level[$i],"Add Left Leg");
				$myclients[]= $this->addRightLeg($level[$i],"Add Right Leg");
				$level1[] = 'add';
				$level1[] = 'add';
				$this->sponsors_list[] = $myclients;
			}
		} //end for loop
		return $level1;
	}
	
	
	public function getGenelogy($parent,$level)
	{
		if($level >= 0)
		{
			$this->db->select('TREE.*');
			$this->db->from('officer_tree as TREE');
			$this->db->where('OFCR_TRE_UNDR_ID', $parent);
			$query = $this->db->get();
			
			$this->sponsors_list[] = $this->root_node($parent);
			
			foreach ($query->result() as $row)
			{
				$this->getGenelogy($row->OFCR_TRE_USR_ID,$level-1);
			}
		}
		
	}	
		
	public function root_node($root)
	{
		
		$this->db->select('OFCR.OFCR_FST_NME,OFCR.OFCR_RNK,TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->join('officer as OFCR', 'OFCR.OFCR_USR_ID = TREE.OFCR_TRE_USR_ID');
		$this->db->where('TREE.OFCR_TRE_USR_ID', $root);
		$query = $this->db->get();
		$row1 = $query->result();
				
		$row = $row1[0];
		
		$row->STATUS = true;
		
		return $row;
	}
	
	public function personal_children_count($parent)
	{
		$count = 0;
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_SPNCR_ID', $parent);
		$query = $this->db->get();
		return count($query->result());
		
	}
	
	public function personal_sub_children_count($parent,$root_parent,$personal_count,$position)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $parent);
		if($position != "noleg")
		{
			$this->db->where('OFCR_TRE_LEG', $position);
		}
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			if($root_parent == $row->OFCR_TRE_SPNCR_ID)
			{
				$this->personal_count = $this->personal_count + 1;
			}
			//echo $root_parent."--------".$row->OFCR_TRE_SPNCR_ID."-----".$this->personal_count."<br>";
			$this->personal_sub_children_count($row->OFCR_TRE_USR_ID,$root_parent,$personal_count,"noleg");			
			
		}
		
	}
	
	public function children_count($parent) {
		$count = 0;
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $parent);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$count += 1 + $this->children_count($row->OFCR_TRE_USR_ID);
		}

		return $count;
	}
	
	public function sub_children_count($parent,$position) {
		$count = 0;
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $parent);
		$this->db->where('OFCR_TRE_LEG', $position);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$count += 1 +$this->children_count($row->OFCR_TRE_USR_ID);
		}
		return $count;
	}
	
	public function ProfileMobileVaildation($mobile, $pancard)
	{
		$this->db->select('*')
				->from('officer')
				->where('OFCR_MOB', $mobile)
				//->or_where('OFCR_PAN ', $pancard)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}
	
	public function editSingleProfile($id)
	{
		$ret = $this->db->select('OFCR.*,OBL.*,OBK.*,ODC.*')
					->from('officer as OFCR')
					->join('officer_bill as OBL','OBL.OFCR_BILL_OFCR_ID = OFCR.OFCR_ID')
					->join('officer_bank as OBK','OBK.OFCR_BNK_OFCR_ID = OFCR.OFCR_ID')
					->join('officer_docu as ODC','ODC.officer_id = OFCR.OFCR_ID')
					->where('OFCR.OFCR_ID', $id)
					->get()->row();
		//echo "<pre>"; print_r($ret); exit;
		
		return $ret;
	}
	
	public function UpdateProfileEmailVaildation($mobile, $pancard, $loginid)
	{
		$this->db->select('*')
				->from('officer')
				->where('OFCR_MOB', $mobile)
				->where('OFCR_ID !=', $loginid)
				//->or_where('OFCR_PAN ', $pancard)
				->where('OFCR_ID !=', $loginid)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}
	
	
	function updateOfficerBasicInfo($officerdata,$id)
	{
		$this->db->where('OFCR_ID', $id);
		$this->db->update('officer', $officerdata);
		
		return true;
	}
	
	function updateOfficerBillingAddress($officerbillingdata, $id)
	{
		$this->db->where('OFCR_BILL_OFCR_ID', $id);
		$this->db->update('officer_bill', $officerbillingdata);
		
		return true;
	}
	
		function updateOfficerdocument($officerdocu, $id)
	{
		$this->db->where('officer_id', $id);
		$this->db->update('officer_docu', $officerdocu);
		
		return true;
	}
	
	function updateOfficerBankingDetails($officerbankingdata,$id)
	{
		$this->db->where('OFCR_BNK_OFCR_ID', $id);
		$this->db->update('officer_bank', $officerbankingdata);
		
		return true;
	}
	
	public function getGenealogySearch($search,$officerId)
	{

		$this->db->select('TREE.OFCR_TRE_USR_ID,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,OFCR.OFCR_USR_ID');
		$this->db->from('officer_tree as TREE');
		$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = TREE.OFCR_TRE_ID');
		$this->db->where('OFCR_TRE_UNDR_ID', $officerId);
		$ret = $this->db->get()->result_array();
		
		if(!empty($ret))
		{
			foreach($ret as $row)
			{
				$searchStringLength = strlen($search);
				$serachUserId =  substr($row['OFCR_TRE_USR_ID'], 0, $searchStringLength);
				$serachFirstName =  substr($row['OFCR_FST_NME'], 0, $searchStringLength);
				if(strcasecmp($serachUserId,$search) == 0)
				{
					$this->searchResult[] = $row;
				}
				else if(strcasecmp($serachFirstName,$search) == 0)
				{
					$this->searchResult[] = $row;
				}
				$this->getGenealogySearch($search,$row['OFCR_TRE_USR_ID']);
				
			}
		}
		
		return $ret;
	}

	public function get_tree_shuffling_offier_details($officerId)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('TREE.OFCR_TRE_USR_ID', $officerId);
		$ret = $this->db->get()->row();
		
		return $ret;
	}

	public function update_tree_shuffling($data, $officerId)
	{
		$this->db->where('OFCR_TRE_USR_ID', $officerId);
		$this->db->update('officer_tree', $data);
		
		return true;
	}
	
	
	public function ChangePassword($userId, $data)
	{
		$this->db->where('ADMIN_USR_ID', $userId)
				->update('admin_usr', $data);
		
		return true;
	}
	
	public function editadminprofile($id)
	{
		$ret = $this->db->select('*')
					->from('admin_usr')
					->where('ADMIN_USR_ID', $id)
					->get()->row();
		
		return $ret;
	}
	
	
	public function updateadminprofileemailvaildation($email, $id)
	{
				$this->db->select('*')
				->from('admin_usr')
				->where('ADMIN_USR_EML', $email)
				->where('ADMIN_USR_ID !=', $id)
				->get();
		$num = $this->db->affected_rows();
		
		return $num;
	}
	
	public function updateadminprofile($id,$data)
	{	
		$this->db->where('ADMIN_USR_ID',$id)
				->update('admin_usr',$data);
		
		return true;
	}
	
	
	public function checkValidUser($email)
	{
		$this->db->select('*')
				->from('admin_usr')
				->where('ADMIN_USR_EML',$email)
				->where('ADMIN_USR_STAT', 'active')
				->get();
		$ret = $this->db->affected_rows();
		
		return $ret;
	}
	
	public function setResetPasswordString($email, $randomString)
	{
		$data = array(
			'ADMIN_USR_RST_PWD' => $randomString
		);
		
		$this->db->where('ADMIN_USR_EML', $email)
				->update('admin_usr', $data);
	}
	
	public function getUserDetailsForForgotPassword($email)
	{
		$ret = $this->db->select('*')
					->from('admin_usr')
					->where('ADMIN_USR_EML',$email)
					->where('ADMIN_USR_STAT', 'active')
					->get()->row();
		
		return $ret;
	}
	
	public function checkUserForResetPwd($userId, $resetStr)
	{
		$this->db->select('*')
				->from('admin_usr')
				->where('ADMIN_USR_ID', $userId)
				->where('ADMIN_USR_RST_PWD', $resetStr)
				->where('ADMIN_USR_STAT', 'active')
				->get();
		$num = $this->db->affected_rows();
		
		return $num;
	}
}

?>