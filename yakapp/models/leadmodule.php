<?php


Class Leadmodule extends CI_Model
{
   public function get_leads($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('LED.*, USR.user_first_name')
						->from('leads as LED')
						->join('users as USR', 'USR.user_id = LED.lead_assigned_to')	
			     		->order_by($sort_order,$sort_by)
						->where('LED.status', 'enable')
						->limit($limit, $start)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('leads')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 //echo $this->db->last_query();exit;
		return $ret;
	}
	
	public function valid_lead($leads_primary_email)
	{
		$this->db->select('*')
				->from('leads')
				->where('lead_primary_email',$leads_primary_email)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}
	
	public function add_lead_details($LeadsData)
	{
		$this->db->insert('leads', $LeadsData);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	public function add_leads_subdetails($LeadsSubData)
	{
		
		$this->db->insert('leads_address',$LeadsSubData);
		return true;		
	}
	
	
	public function deleteleads($id)
	{
		$this->db->where('lead_id', $id);
		$this->db->delete('leads');
		
		return true;
	}
	
	public function getSingle_leads($id)
	{
		$this->db->select('*');
		$this->db->from('leads');
	 	$this->db->where('lead_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	public function getSingle_lead_meeting($id)
	{
		$this->db->select('LEDM.*, USR.user_first_name');
		$this->db->from('leads_meeting as LEDM');
	 	$this->db->where('LEDM.lead_met_lead_id', $id);
		$this->db->join('users as USR', 'LEDM.lead_met_assign_to = USR.user_id');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	public function getSingle_leadsaddr($id)
	{
		$this->db->select('*');
		$this->db->from('leads_address');
	 	$this->db->where('lead_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	
	public function deleteleads_address($id)
	{
		$this->db->where('lead_id', $id);
		$this->db->delete('leads_address');
		
		return true;
	}
	
	public function update_lead_details($LeadsData,$id)
	{	
		$this->db->where('lead_id', $id)
				->update('leads', $LeadsData);
		
		return true;
	}
	public function update_lead_con($id)
	{	
		$this->db->where('lead_id', $id);
      	$this->db->delete('leads'); 
		return true;
	}
	 
 	public function update_leads_subdetails($LeadsSubData,$id)
	{
		$this->db->select('*')
				->from('leads_address')
				->where('lead_id',$id)
			 
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('leads_address', $LeadsSubData);
		}
		{
			$this->db->where('lead_id', $id)
				->update('leads_address', $LeadsSubData);
				 
		}
		return true;
			
	}
	
	public function get_city()
	{
		$this->db->select('*');
		$this->db->from('city');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
		public function get_state()
	{
		$this->db->select('*');
		$this->db->from('state');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	public function get_country()
	{
		$this->db->select('*');
		$this->db->from('country');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	public function add_org_details($ORG_data)
	{
		$this->db->insert('organization', $ORG_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	public function add_org_bill_details($ORG_bill)
	{
		
		$this->db->insert('organization_billing_address',$ORG_bill);
		return true;		
	}
	
	public function add_org_ship_details($ORG_ship)
	{
		
		$this->db->insert('organization_shipping_address',$ORG_ship);
		return true;		
	}
	
	public function add_contact_details($CON_data)
	{
		$this->db->insert('contacts', $CON_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	public function add_contact_bill_details($CON_bill)
	{
		
		$this->db->insert('contact_mailling_address',$CON_bill);
		return true;		
	}
	
	public function add_opper_details($Opp_data)
	{
		
		$this->db->insert('opportunites',$Opp_data);
		return true;		
	}
	
	public function users_list($sess_group,$sess_company)
	{
		  if($sess_group == 1)
		  {
			  $ret = $this->db->select('USR.user_id, USR.user_company_id, USR.user_group_id, USR.user_code, USR.user_first_name, USR.user_last_name, USR.user_name, USR.user_phone, USR.user_email, UGRP.group_name')
						  ->from('users as USR')
						  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
						  ->where('USR.user_status' ,'enable')
						  ->where('USR.user_display_status','1')
						  ->get()->result_array(); 
		  }
		  else
		  {
			  $ret = $this->db->select('USR.user_id, USR.user_company_id, USR.user_group_id, USR.user_code, USR.user_first_name, USR.user_last_name, USR.user_name, USR.user_phone, USR.user_email, UGRP.group_name')
						  ->from('users as USR')
						  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
						  ->where('USR.user_status' ,'enable')
						  ->where('USR.user_company_id', $sess_company)
						  ->where('USR.user_display_status','1')
						  ->get()->result_array();
	
		  }
		  return $ret;
	}
	
	
	
	public function add_meeting_details($meeting_data)
	{
		
		$this->db->insert('leads_meeting',$meeting_data);
		return true;		
	}
	
	
	public function meeting_validation($assigned_to,$meeting_start_date,$meeting_end_date)
	{	
		$this -> db -> select('*');
		$this -> db -> from('leads_meeting');	
		
		//$this->db->where 'lead_met_meeting_start_time' + interval 1 second between '$meeting_start_date' + interval 0 second and '$meeting_end_date' + interval 0 second or 'lead_met_meeting_end_time' - interval 1 second between '$meeting_start_date' + interval 0 second and '$meeting_end_date' + interval 1 second;

		//echo $this->db->last_query();exit;
		
	
			
		
		$this->db->where('lead_met_assign_to',$assigned_to);
		$this->db->or_where('lead_met_meeting_start_time', $meeting_start_date);
        $this->db->or_where('lead_met_meeting_end_time' ,$meeting_end_date);
		
		$query = $this -> db -> get();
		$num = $query -> num_rows();
				
		return $num;	
	
	}
	
	public function get_single_meeting_popup($met_id)
	{	
		$this->db->select('*');
		$this->db->from('leads_meeting');
	 	$this->db->where('lead_met_id', $met_id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	
	public function update_meeting_details($meeting_data, $meeting_id)
	{	
		$this->db->where('lead_met_id', $meeting_id)
				->update('leads_meeting', $meeting_data);
		
		return true;
	}
	
	
	
	
	
	
	
}
?>