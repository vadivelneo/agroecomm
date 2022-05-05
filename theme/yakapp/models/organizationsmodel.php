<?php
Class organizationsmodel extends CI_Model
{
    public function get_org($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('ORG.*, BL.*, CT.*')
						->from('organization as ORG')
						->join('organization_billing_address as BL', 'BL.organization_billing_org_id = ORG.organization_id')
						->join('city as CT', 'CT.city_id = BL.organization_billing_city_id')	  
			     		->order_by($sort_order,$sort_by)
						->where('ORG.organization_status', 'active')
						->limit($limit, $start)

						->get()->result_array();
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('organization')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 //echo $this->db->last_query();exit;
		return $ret;
	}
	
	public function valid_org($org_name)
	{
		$this->db->select('*')
				->from('organization')
				->where('organization_name',$org_name)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}
	
	public function add_org_details($orgData)
	{
		$this->db->insert('organization', $orgData);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	public function add_bill_details($OrgBilldata)
	{
		$this->db->insert('organization_billing_address',$OrgBilldata);
		return true;		
	}
	public function add_ship_details($OrgShipdata)
	{
		$this->db->insert('organization_shipping_address',$OrgShipdata);
		return true;		
	}
	
	public function getSingle_org($id)
	{
		$this->db->select('*');
		$this->db->from('organization');
	 	$this->db->where('organization_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	public function getSingle_org_bill($id)
	{
		 $query = $this->db->select('CN.*, CNT.*, ST.*, CT.*,')
						->from('organization_billing_address as CN')
						 ->join('country as CNT','CNT.country_id = CN.organization_billing_country_id') 
				 		->join('state as ST','ST.state_id = CN.organization_billing_state_id')
						->join('city as CT','CT.city_id = CN.organization_billing_city_id') 
						->where('CN.organization_billing_org_id', $id)
						 
						->get()->row();
	  
		return $query;
	  
	}
	public function getSingle_org_ship($id)
	{
		 
	  $query = $this->db->select('CN.*, CNT.*, ST.*, CT.*,')
						->from('organization_shipping_address as CN')
						 ->join('country as CNT','CNT.country_id = CN.organization_shipping_country_id') 
				 		->join('state as ST','ST.state_id = CN.organization_shipping_state_id')
						->join('city as CT','CT.city_id = CN.organization_shipping_city_id') 
						->where('CN.organization_shipping_org_id', $id)
						->get()->row();
	   
		return $query;
	}
	public function update_org_details($org_Data,$id)
	{	 
		$this->db->where('organization_id',$id)
				->update('organization',$org_Data);
		//echo $this->db->last_query();exit;
		return true;
	}
	public function update_bill_details($OrgBilldata , $id)
	{	
		$this->db->where('organization_billing_org_id', $id)
				->update('organization_billing_address', $OrgBilldata);
		
		return true;
	}
	public function update_ship_details($OrgShipdata , $id)
	{	
		$this->db->where('organization_shipping_org_id', $id)
				->update('organization_shipping_address', $OrgShipdata);
		
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
	
	
		public function getorg()
	{
		
		$query = $this->db->select('*')
						->from('organization as ORG')
						->join('organization_billing_address as BL', 'BL.organization_billing_org_id = ORG.organization_id')
						->join('city as CT', 'CT.city_id = BL.organization_billing_city_id')
						->join('state as ST', 'ST.state_id = BL.organization_billing_state_id')	  
							->join('country as CON', 'CON.country_id = BL.organization_billing_country_id')	  	  
			     		->order_by('ORG.organization_id', 'DESC')
						->where('ORG.organization_status', 'active')
						 
						->get()->result_array(); 
	 
	 
	 	
		return $query;
	}
	
	 
}
?>