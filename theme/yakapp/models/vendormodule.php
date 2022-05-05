<?php

Class Vendormodule extends CI_Model
{
	//** To Get Prefix Name for Vendor **//
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Get All Vendor's To Display as Gird **//
	
	public function get_vendors($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('vendors')
						//	->order_by('vendor_id', 'DESC')
							->order_by($sort_order, $sort_by)
							->where('vendor_status' ,'enable')
							->limit($limit, $start)
							->get()->result_array();
							
							 $this->db->last_query();
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('vendors')
							//->order_by('vendor_id', 'DESC')
							->order_by($sort_order, $sort_by)
							->where('vendor_status' ,'enable')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search Vendor **//
	
	public function get_search_vendors($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_ven_code,$search_ven_name,$search_ven_mob,$search_ven_email)
	{
		if($sess_group == 1)
		{
						$this->db->select('*');
						$this->db->from('vendors');
			     		$this->db->order_by('vendor_id', 'DESC');
						if($search_ven_code != '')
						{
							$this->db->like('vendor_code',$search_ven_code);
						}
						if($search_ven_name != '')
						{
							$this->db->like('vendor_name',$search_ven_name);
						}
						if($search_ven_mob != '')
						{
							$this->db->like('vendor_phone',$search_ven_mob);
						}
						if($search_ven_email != '')
						{
							$this->db->like('vendor_email',$search_ven_email);
						}
						$this->db->where('vendor_status','enable');
						
						$this->db->limit($limit,$page);
						$this->db->order_by($sort_order, $sort_by);
						$ret['rows'] = $this->db->get()->result_array();
	
						$this->db->select('count(*) as TotalRows');
						$this->db->from('vendors');
						
						if($search_ven_code != '')
						{
							$this->db->like('vendor_code',$search_ven_code);
						}
						if($search_ven_name != '')
						{
							$this->db->like('vendor_name',$search_ven_name);
						}
						if($search_ven_mob != '')
						{
							$this->db->like('vendor_phone',$search_ven_mob);
						}
						if($search_ven_email != '')
						{
							$this->db->like('vendor_email',$search_ven_email);
						} 
						$this->db->order_by($sort_order, $sort_by);
						$this->db->limit($limit,$page); 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					
					//echo"<PRE>";print_R($ret);exit;
					return $ret;
		}
					else
					{
						$this->db->select('*');
						$this->db->from('vendors');
			     		//$this->db->order_by('vendor_id', 'DESC');
						if($search_ven_code != '')
						{
							$this->db->like('vendor_code',$search_ven_code);
						}
						if($search_ven_name != '')
						{
							$this->db->like('vendor_name',$search_ven_name);
						}
						if($search_ven_mob != '')
						{
							$this->db->like('vendor_phone',$search_ven_mob);
						}
						if($search_ven_email != '')
						{
							$this->db->like('vendor_email',$search_ven_email);
						} 
						$this->db->order_by($sort_order, $sort_by);
						$this->db->where('vendor_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				 

						$this->db->select('count(*) as TotalRows');
						$this->db->from('vendors');
						if($search_ven_code != '')
						{
							$this->db->like('vendor_code',$search_ven_code);
						}
						if($search_ven_name != '')
						{
							$this->db->like('vendor_name',$search_ven_name);
						}
						if($search_ven_mob != '')
						{
							$this->db->like('vendor_phone',$search_ven_mob);
						}
						if($search_ven_email != '')
						{
							$this->db->like('vendor_email',$search_ven_email);
						} 
				
						$this->db->order_by($sort_order, $sort_by); 
						$this->db->limit($limit,$page);
						//$this->db->order_by('vendor_id', 'DESC');
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
	
	
	//** To Get Vendor For Pop-up **//
	
	public function getvendors_for_popup_grid()
	{
		$ret = $this->db->select('*')
				  ->from('vendors')
				  ->order_by('vendor_id', 'DESC')
				  ->where('vendor_status' ,'enable')
				  ->get()->result_array();
	
		return $ret;
	}
	
	//** To Get Last Id **//
	
	public function getlastid()
	{
		$ret =  $this->db->select('vendor_code')
						->from('vendors')
						->order_by('vendor_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	public function get_area()
	{
		$this->db->select('*');
		$this->db->from('area');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	//** Vendor Validation **//
	
	public function vendorvaildation($vendor_name, $vendor_mobile)
	{
		$this->db->select('*')
				->from('vendors')
				->where('vendor_mobile',$vendor_mobile)
				//->or_where('vendor_code',$vendor_code)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	}
	
	//** Add Vendor DEtails **//
	
	public function add_vendor_details($vendordetails)
	{
		$this->db->insert('vendors', $vendordetails);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;	
	}
	
	//** Add Vendor SubDEtails **//
	
	public function add_vendor_subdetails($vendorsubdetails)
	{
		
		$this->db->insert('vendors_sub_details',$vendorsubdetails);
		return true;		
	}
	
	//** Add Vendor Shipping Details **//
	
	public function add_vendor_shipping_details($vendor_shiping_details)
	{
		
		$this->db->insert('vendor_shipping_address',$vendor_shiping_details);
		return true;		
	}
	
	//** Vendor Status **//
	
	public function updatevendorstatus($vendordata, $id)
	{
		$this->db->where('vendor_id', $id)
				->update('vendors', $vendordata);
		return true;		
	}
	
	 //** Get Single Vendor Based onVendor Id **//
	 
	public function getsingle_vendor($id)
	{
		$this->db->select('*');
		$this->db->from('vendors');
	 	$this->db->where('vendor_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Get Single Vendor address Based on Vendor Id **//
	
	public function getsingle_vendoraddr($id)
	{
		$this->db->select('VSD.*,ST.*,CT.*');
		$this->db->from('vendors_sub_details as VSD');
		$this->db->join('state as ST','ST.state_id = VSD.vendor_state');
		$this->db->join('city as CT','CT.city_id = VSD.vendor_city');
	 	$this->db->where('ven_sub_det_ven_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Get Single Vendor Shipping address Based on Vendor Id **//
	
	public function getsingle_vendor_shpaddr($id)
	{
		$this->db->select('VSA.*,ST.*,CT.*');
		$this->db->from('vendor_shipping_address as VSA');
		$this->db->join('state as ST','ST.state_id = VSA.vendor_shipping_state_id');
		$this->db->join('city as CT','CT.city_id = VSA.vendor_shipping_city_id');
	 	$this->db->where('vendor_shipping_vendor_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Check for Valid Vendor for update **//
	
	public function check_validupdatevendor($vendor_name,$id)
	{
		$this -> db -> select('*');
		$this -> db -> from('vendors');
		$this -> db -> where('vendor_name',$vendor_name);
		$this -> db -> where('vendor_id !=', $id);
		$query = $this -> db -> get();
		$num = $query -> num_rows();
		return $num;	
	}
	
	//** Update Vendor Details **//
	
	public function update_vendor_details($vendordetails,$id)
	{	
		$this->db->where('vendor_id', $id);
		$this->db->update('vendors', $vendordetails);
		
		return true;
	}
	
	//** Update Vendor Address Details **//
	
	public function update_vendor_subdetails($vendorsubdetails ,$id)
	{	
		$this->db->where('ven_sub_det_ven_id', $id);
		$this->db->update('vendors_sub_details', $vendorsubdetails);
		
		return true;
	}
	
	//** Update Vendor shipping address Details **//
	
	public function update_vendor_shipping_details($vendor_shiping_details,$id)
	{	
		$this->db->where('vendor_shipping_vendor_id', $id);
		$this->db->update('vendor_shipping_address', $vendor_shiping_details);
		
		return true;
	}
	
	//** Get All State **//
	
	public function getAllState($con_id)
	{
		$ret =  $this->db->select('*')
						->from('state')
						->where('st_country_id', $con_id)
						->get()->result_array();
		return $ret;
	}
	
	//** Get All City **//
	 	
	public function getAllcity($con_id,$sta_id)
	{
		$ret =  $this->db->select('*')
						->from('city')
						->where('cty_country_id', $con_id)
						->where('cty_state_id', $sta_id)
						->get()->result_array();
		return $ret;
	}

	
}
?>