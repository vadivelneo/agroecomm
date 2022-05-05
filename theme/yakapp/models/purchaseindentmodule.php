<?php

Class Purchaseindentmodule extends CI_Model
{
	//** Get Prefix Data **//
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Get Last ID For Purchase Indent **//
	
	public function getlastid()
	{
		
		$ret =  $this->db->select('po_indent_number')
						->from('purchase_indent')
						->order_by('po_indent_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	
	public function getlast_divisionid($material_store_division_id,$product_type_id)
	{
				
				if($material_store_division_id == 1 || $material_store_division_id == 2)
				{	
		$ret =  $this->db->select('po_indent_number')
						->from('purchase_indent PI')
						->where('PI.po_indent_division_id',$material_store_division_id )
						->where('PI.po_indent_prod_typ_id',$product_type_id )
						->order_by('po_indent_id', 'DESC')
						->limit (1)
						->get()->row();
				}
				else
				{
					$ret =  $this->db->select('po_indent_number')
						->from('purchase_indent PI')
						->where('PI.po_indent_division_id',$material_store_division_id )
						//->where('PI.po_indent_prod_typ_id',$product_type_id )
						->order_by('po_indent_id', 'DESC')
						->limit (1)
						->get()->row();
				}
						
		return $ret;
	}
	
	//** Add Po Indent Details **//
	
	public function getuser_list($sess_user)
	{
		
		$ret =  $this->db->select('*')
						->from('users')
						// 	->where('user_id !=',$sess_user)
						->order_by('user_id', 'DESC')
						->get()->result_array();
		return $ret;
	}
	
	public function add_po_indent_details($pur_indent_details)
	{
		$this->db->insert('purchase_indent', $pur_indent_details);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Add Stock Details  in Inventry **//
	
	public function add_stock_item_details($stock_data)
	{
		$this->db->insert('inventory', $stock_data);
		return true;	
	}
	
	//** Add PO Indent Items **//
	
	public function add_po_ind_item_details($purchase_indent_items)
	{
		$this->db->insert('purchase_indent_items', $purchase_indent_items);
		return true;	
	}
	
	//** Purchase Indent List **//
	
	public function purchase_indent_list($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name')
								->from('purchase_indent as PI')
								
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->where('PI.po_indent_status','enable')
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_indent as PI')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by')
 								->where('PI.po_indent_status','enable')
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name')
								->from('purchase_indent as PI')
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->where('PI.po_indent_status','enable')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by') 
								->where('PI.po_indent_company_id',$sess_company)
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_indent as PI')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by')
								->where('PI.po_indent_status','enable')
								->where('PI.po_indent_company_id',$sess_company)
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	public function indent_quality_alert_list($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name')
								->from('purchase_indent as PI')
								
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->where('PI.po_indent_active_status','created')
								->where('PI.po_indent_status','enable')
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_indent as PI')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by')
								->where('PI.po_indent_active_status','created')
 								->where('PI.po_indent_status','enable')
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name')
								->from('purchase_indent as PI')
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->where('PI.po_indent_active_status','created')
								->where('PI.po_indent_status','enable')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by') 
								->where('PI.po_indent_company_id',$sess_company)
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_indent as PI')
								->join('location as LOC', 'LOC.location_id = PI.po_location')
								->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
								->join('users as U', 'U.user_id = PI.po_indent_approved_by')
								->where('PI.po_indent_active_status','created')
								->where('PI.po_indent_status','enable')
								->where('PI.po_indent_company_id',$sess_company)
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	//** Search Purchase Indent **//
	
	public function search_purchase_indent_list($sess_company,$sess_group,$search_ind_no,$search_approved_by,$search_location,$search_status,$limit,$page,$sort_order,$sort_by,$search_po_no,$from_date,$to_date,$search_store_name)
	{
		//echo $search_location; exit;
		if($sess_group == 1)
		{
				$this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name');
				$this->db->from('purchase_indent as PI');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					if($search_status != '')
					{
						$this->db->or_like('PI.po_indent_active_status' ,$search_status);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					
				$this->db->limit($limit, $page);
				$ret['rows'] = $this->db->get()->result_array();
	
				$this->db->select('count(*) as TotalRows');
				$this->db->from('purchase_indent as PI');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					 
					
					if($search_status != '')
					{
						$this->db->or_like('PI.po_indent_active_status' ,$search_status);
					}
				$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		}
		else
		{
				$this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name,STR.*');
				$this->db->from('purchase_indent as PI');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->join('store as STR', 'STR.store_id = PI.po_indent_store_id');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					
					if($search_store_name != '')
					{
						$this->db->or_like('STR.store_name' ,$search_store_name);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					if($search_status != '')
					{
						$this->db->or_like('PI.po_indent_active_status' ,$search_status);
					}
				$this->db->where('PI.po_indent_company_id',$sess_company);
				$this->db->limit($limit, $page);
				$ret['rows'] = $this->db->get()->result_array();

				$this->db->select('count(*) as TotalRows');
				$this->db->from('purchase_indent as PI');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->join('store as STR', 'STR.store_id = PI.po_indent_store_id');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					
					if($search_store_name != '')
					{
						$this->db->or_like('STR.store_name' ,$search_store_name);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					if($search_status != '')
					{
						$this->db->or_like('PI.po_indent_active_status' ,$search_status);
					}
				$this->db->where('PI.po_indent_company_id',$sess_company);
				$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		}
	}
	
	
	public function search_quality_alert_list($sess_company,$sess_group,$search_ind_no,$search_approved_by,$search_location,$search_status,$limit,$page,$sort_order,$sort_by,$search_po_no,$from_date,$to_date,$search_store_name)
	{
		//echo $search_location; exit;
		if($sess_group == 1)
		{
				$this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name');
				$this->db->from('purchase_indent as PI');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->where('PI.po_indent_active_status','created');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					if($search_status != '')
					{
						$this->db->or_like('PI.po_indent_active_status' ,$search_status);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					
				$this->db->limit($limit, $page);
				$ret['rows'] = $this->db->get()->result_array();
	
				$this->db->select('count(*) as TotalRows');
				$this->db->from('purchase_indent as PI');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->where('PI.po_indent_active_status','created');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					
				$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		}
		else
		{
				$this->db->select('PI.*,LOC.location_name,LOC.location_id,U.user_id,U.user_name, VEN.vendor_name,STR.*');
				$this->db->from('purchase_indent as PI');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->join('store as STR', 'STR.store_id = PI.po_indent_store_id');
				$this->db->where('PI.po_indent_active_status','created');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					
					if($search_store_name != '')
					{
						$this->db->or_like('STR.store_name' ,$search_store_name);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					
				$this->db->where('PI.po_indent_company_id',$sess_company);
				$this->db->limit($limit, $page);
				$ret['rows'] = $this->db->get()->result_array();

				$this->db->select('count(*) as TotalRows');
				$this->db->from('purchase_indent as PI');
				$this->db->join('users as U', 'U.user_id = PI.po_indent_approved_by');
				$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id');
				$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
				$this->db->join('store as STR', 'STR.store_id = PI.po_indent_store_id');
				$this->db->where('PI.po_indent_active_status','created');
				$this->db->where('PI.po_indent_status','enable');
				$this->db->order_by($sort_order, $sort_by);
					if($search_ind_no != '')
					{
						$this->db->or_like('PI.po_indent_number' ,$search_ind_no);
					}
					if($search_approved_by != '')
					{
						$this->db->or_like('PI.po_indent_approved_by' ,$search_approved_by);
					}
					if($search_location != '')
					{
						$this->db->or_like('LOC.location_name' ,$search_location);
					}
					if($search_po_no != '')
					{
						$this->db->or_like('PI.po_reference_number' ,$search_po_no);
					}
					
					if($search_store_name != '')
					{
						$this->db->or_like('STR.store_name' ,$search_store_name);
					}
					
					if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PI.po_indent_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PI.po_indent_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PI.po_indent_date >=', $from_date);
							$this->db->where('PI.po_indent_date <=', $to_date);
							} 
							
						}
					
					
				$this->db->where('PI.po_indent_company_id',$sess_company);
				$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		}
	}
	//** Get Single PO Indent Details **//
	
	public function edit_single_purchase_indent($id)
	{
		$ret = $this->db->select('PI.*,VEN.*,SUB.*,SHIP.shipping_carrier_name,USER.user_id,USER.user_name')
						->from('purchase_indent as PI')
						->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id')
						->join('location as LO', 'LO.location_id = PI.po_location')
						->join('vendors_sub_details as SUB', 'SUB.ven_sub_det_ven_id = VEN.vendor_id')
						->join('users as USER', 'USER.user_id = PI.po_indent_approved_by')
						//->join('country as CONT', 'CONT.country_id = SUB.vendor_state')
						//->join('state as ST', 'ST.state_id = SUB.vendor_state')
						//->join('city as CT', 'CT.city_id = SUB.vendor_city')
						->join('shipping_carrier as SHIP', 'SHIP.shipping_carrier_id = PI.po_purchase_carrier')
						->where('po_indent_id', $id)
						->get()->row();		
		return $ret;
	}
	
	//** Get Single PO Indent Item Details **//
	
	public function edit_single_po_indent_items($id)
	{
		$ret = $this->db->select('ITMES.*,PRO.product_name')
						->from('purchase_indent_items as ITMES')
						->where('ITMES.po_indent_item_indent_id', $id)
						//->join('uom as U', 'U.uom_id = ITMES.po_indent_uom_id')
						->join('products as PRO', 'PRO.product_id = ITMES.po_indent_item_item_id')
						->get()->result_array();	
		return $ret;
	}
	
	//** Update PO Indent Details **//
	
	public function get_po_items($po_purchase_order_id)
	{
	
		$ret = $this->db->select('*')
				->from('purchase_order_items')
				->where('po_items_po_id',$po_purchase_order_id)
				->where('po_items_qty !=', '0.00')
				->get()->result_array();
		
		return $ret;
	
	}
	
	public function update_purchase_indent($pur_indent_details,$id)
	{
		$this->db->where('po_indent_id', $id);
		$this->db->update('purchase_indent', $pur_indent_details);
		
		
		return  true;
	}
	
	//** Update PO Indent Item Details **//
	
	
		public function delete_purchase_indent_Item_details($id)
	{
		$this->db->where('po_indent_item_indent_id',$id);
		$this->db->delete('purchase_indent_items');
	}
	
	
	public function update_purchase_indent_Item_details($purchase_indent_items,$id, $item_id, $sno_id)
	{
		$this->db->select('*')
				->from('purchase_indent_items')
				->where('po_indent_item_indent_id',$id)
				->where('po_indent_item_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('purchase_indent_items', $purchase_indent_items);
		}
		else
		{
			$this->db->where('po_indent_item_indent_id', $id);
			$this->db->where('po_indent_item_item_id', $item_id);
			$this->db->where('po_indent_item_id', $sno_id);
			$this->db->update('purchase_indent_items', $purchase_indent_items);
		}
		return true;
	}
	
	//** Update PO Indent Item Details **//
	
	public function update_purchaseindent_Item_ordqty_details($update_ord_qty, $id, $po_purchase_order_id,$item_id,$po_id)
	{
		/*$this->db->select('a.*, b.*,c.po_items_po_id,c.po_items_item_id')
				->from('purchase_indent_items as a')
				->join('purchase_indent as b', 'a.po_indent_item_indent_id = b.po_indent_id','left')
				->join('purchase_order_items as c', 'c.po_items_po_id = b.po_purchase_order_id','left')
				->where('a.po_indent_item_indent_id',$id)
				->where('a.po_indent_item_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			//$this->db->insert('purchase_indent_items', $purchase_indent_items);
		}
		else
		{*/
			//$this->db->where('po_items_po_id', $po_purchase_order_id);
			//$this->db->where('po_items_item_id', $item_id);
			$this->db->where('po_items_id', $po_id);
			$this->db->update('purchase_order_items',$update_ord_qty);
		//}
		return true;
	}
	
	
	//** Valid PO Indent **//
	
	public function po_vaildation($intent_no)
	{
		$this->db->select('*')
				->from('purchase_indent')
				->where('po_indent_number',$intent_no)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	public function getlastpo_id()
	{
		
		$ret =  $this->db->select('po_indent_number')
						->from('purchase_indent')
						->where('po_indent_store_id != 3')
						->order_by('po_indent_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	public function getlast_storeid($store_id)
	{
		
		$ret =  $this->db->select('po_indent_number')
						->from('purchase_indent')
						->where('po_indent_store_id',$store_id)
						->order_by('po_indent_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}

	//** Update Purchase Order Quantity **//
	
	public function update_po_order_quantity($purchase_order_items,$item_id,$po_purchase_order_id,$sno_id)
	{
		//$this->db->where('po_items_po_id', $po_purchase_order_id);
		//$this->db->where('po_items_item_id', $item_id);
		$this->db->where('po_items_id', $sno_id);
		$this->db->update('purchase_order_items', $purchase_order_items);
		
		return true;
	}
	
	//** Purchase Order Status Change **//
	
	public function update_po_order_status($purchase_order_status,$po_purchase_order_id)
	{
		$this->db->where('po_po_id', $po_purchase_order_id);
		$this->db->update('purchase_order', $purchase_order_status);
		
		return true;
	}
	
	//** Purchase Indent Status **//
	
	public function update_purchaseindent_status($poindentdata,$id)
	{
		$this->db->where('po_indent_id', $id)
				->update('purchase_indent', $poindentdata);
		
		return true;
	}

	public function getpurchaseindent_for_popup_grid()
	{
		$ret = $this->db->select('PIN.*,VEN.vendor_name')
					->from('purchase_indent as PIN')
					->join('vendors as VEN', 'VEN.vendor_id = PIN.po_indent_vendor_id')
					->order_by('po_indent_id', 'DESC')
					->where('po_indent_status' ,'enable')
					->where('po_indent_active_status' ,'created')
					->limit (10)
					->get()->result_array();
		return $ret;
	}
	
	//** Get Purchase Order for POp-up **//
	
	public function getpurchaseorder_for_popup_grid($sess_group,$sess_company)
	{
		$ret = $this->db->select('PO.*,VEN.vendor_name,VEN.vendor_id,VEN.vendor_code')
					->from('purchase_order as PO')
					//->join('purchase_order_items as POI', 'POI.po_items_po_id=PO.po_po_id')
					//->join('products as PRO', 'PRO.product_id = POI.po_items_item_id')
					//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('vendors as VEN', 'PO.po_vendor_id=VEN.vendor_id')
					->order_by('po_po_id', 'DESC')
					->where('po_po_status' ,'approved')
					->where('po_status' ,'active')
					->limit (10)
					->get()->result_array();
		return $ret;
	}
	
	
	//** Purchase Order Search in Pop-up **//
	
	public function getpurchaseordersearch($po_code,$vendor_name,$sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('PO.*,VEN.vendor_name,VEN.vendor_id,VEN.vendor_code');
					$this->db->from('purchase_order as PO');
					$this->db->join('vendors as VEN', 'PO.po_vendor_id=VEN.vendor_id');
					$this->db->order_by('po_po_id', 'DESC');
					//$this->db->where('po_po_status !=','delivered');
					//$this->db->where('po_po_status !=' ,'cancelled');
					//$this->db->where('po_po_status !=' ,'awaiting approval');
					//$this->db->where('po_po_status !=' ,'closed');
					$this->db->where('po_po_status' ,'approved');
					$this->db->where('po_status' ,'active');
					$this->db->limit (10);
					if($po_code != "")
			{
				$this->db->like('PO.po_po_no',$po_code);
			}
			if($vendor_name != "")
			{
				$this->db->like('VEN.vendor_name',$vendor_name);
			}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
		else
		{
						
			$ret = $this->db->select('PO.*,VEN.vendor_name,VEN.vendor_id,VEN.vendor_code, PRO.product_type_id,PRO_TYP.products_type_name');
					$this->db->from('purchase_order as PO');
					$this->db->join('purchase_order_items as POI', 'POI.po_items_po_id=PO.po_po_id');
					$this->db->join('products as PRO', 'PRO.product_id = POI.po_items_item_id');
					$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
					$this->db->join('vendors as VEN', 'PO.po_vendor_id=VEN.vendor_id');
					$this->db->order_by('po_po_id', 'DESC');
					$this->db->where('po_po_status !=','delivered');
					$this->db->where('po_po_status !=' ,'cancelled');
					$this->db->where('po_po_status !=' ,'awaiting approval');
					$this->db->where('po_po_status !=' ,'closed');
					$this->db->where('po_po_status !=' ,'draft');
					//$this->db->where('po_po_status ' ,'approved');
					//$this->db->or_where('po_po_status' ,'onprocess');
					$this->db->where('po_status' ,'active');
					$this->db->where('po_po_company_id',$sess_company);
					$this->db->limit (10);
					if($po_code != "")
			{
				$this->db->like('PO.po_po_no',$po_code);
			}
			if($vendor_name != "")
			{
				$this->db->like('VEN.vendor_name',$vendor_name);
			}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
	}
	
	//** Check Inventry In valid Stock **//
	
	public function vaild_stock_item($item_id)
	{
		$this->db->select('*')
				->from('inventory_new')
				->where('inventory_item_id', $item_id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get Inventry Qty From Inventry **//
	
	public function get_stock_item($item_id)
	{
		$ret = $this->db->select('inventory_qty')
					->from('inventory')
					->where('inventory_item_id', $item_id)
					->get()->row();
		return $ret;
	}
	
	//** Update Stock Details In Inventry **//
	
	public function	update_stock($stock_up_data,$item_id)
	{
		$this->db->where('inventory_item_id', $item_id);
		$this->db->update('inventory', $stock_up_data);
		return  true;
	}
	
	public function	update_stock_new($stock_up_data_new)
	{
		$this->db->insert('inventory_new', $stock_up_data_new);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
		//return true;
	}
	
	//** Company Details **//
	
	public function compny_details($sess_company)
	{
		$ret = $this->db->select('CO.*,ST.*,CTY.*,CNTR.*')
					->from('company as CO')
					->join('country as CNTR', 'CNTR.country_id=CO.company_country_id')
					->join('state as ST', 'ST.state_id=CO.company_state_id')
					->join('city as CTY', 'CTY.city_id=CO.company_city_id')					
					->where('CO.company_id' ,$sess_company)
					->get()->row();
		return $ret;
	}
	
	
}