<?php

Class Inventorymodule extends CI_Model
{
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	public function getlastid_ops()
	{
		
		$ret =  $this->db->select('opening_stock_code')
						->from('opening_stock')
						
						->order_by('opening_stock_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	public function loc_list()
	{
		
		$ret =  $this->db->select('*')
						->from('location')
						->order_by('location_id', 'DESC')
						->get()->result_array();
		return $ret;
	}
	
	
	public function inventory_list($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by)
	{
		//echo $sess_group;
		if($sess_group == 1)
		{
		$ret['rows'] = $this->db->select('INV_NEW.inventory_uom_id,INV_NEW.inventory_add_date,INV_NEW.inventory_item_id, SUM(INV_NEW.inventory_qty) AS amount, SUM(INV_NEW.inventory_received_qty) AS received_qty,PRO.*,STA.*,PDTY.*,PROP.*,U.uom_name')
						->from('inventory_new as INV_NEW')
						->join('products as PRO', 'PRO.product_id = INV_NEW.inventory_item_id') 
						->join('store as STA', 'STA.store_id = PRO.material_store_id') 
						->join('products_type as PDTY', 'PDTY.products_type_id = PRO.product_type_id') 
						//->join('products_groups as PDGY', 'PDGY.products_group_id = PRO.product_group_id') 
						//->join('product_stock as PSTK', 'PSTK.product_stock_prd_id = PRO.product_id') 
						->join('product_price as PROP','PROP.product_prd_id = PRO.product_id')
						->join('uom as U', 'U.uom_id = PRO.product_uom')
			     		->order_by($sort_order,$sort_by)
						->group_by('INV_NEW.inventory_item_id')
						->limit($limit, $page)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('inventory_new as INV_NEW')
							->join('products as PRO', 'PRO.product_id = INV_NEW.inventory_item_id') 
							->join('store as STA', 'STA.store_id = PRO.material_store_id') 
							->join('products_type as PDTY', 'PDTY.products_type_id = PRO.product_type_id') 
							//->join('products_groups as PDGY', 'PDGY.products_group_id = PRO.product_group_id') 
							//->join('product_stock as PSTK', 'PSTK.product_stock_prd_id = PRO.product_id') 
							//->join('product_price as PROP','PROP.product_prd_id = PRO.product_id')	
							//->join('uom as U', 'U.uom_id = PSTK.product_stock_uom_id')		
							->group_by('INV_NEW.inventory_item_id')
							
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
		}
		

	}
	public function opening_stk_list($limit,$start,$sort_order,$sort_by)
	{	
		$ret['rows'] = $this->db->select('OST.*, LOC.location_name,LOC.location_id,US.user_first_name')
						->from('opening_stock as OST')
						->join('location as LOC', 'LOC.location_id = OST.opening_stock_location_id')
						->join('users as US', 'US.user_id = OST.opening_stock_approved_by_id')
			     		->order_by($sort_order,$sort_by)
						//->where('OST.opening_stock_active_status' ,'active')
						->limit($limit, $start)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('opening_stock as OST')
							->join('location as LOC', 'LOC.location_id = OST.opening_stock_location_id')
							->join('users as US', 'US.user_id = OST.opening_stock_approved_by_id')
							->order_by($sort_order,$sort_by)
							->where('opening_stock_active_status' ,'active')
						 	->get()->row();
							//echo $this->db->last_query();

		$ret['num_rows'] = $Count->TotalRows;
	
		return $ret;

	}
	
	
	public function get_allproductsdetails($sess_company)
	{
		$ret = $this->db->select('PRO.product_name,PRO.product_id,PRO.product_mfr_part_number,PRO.product_code,PRO_STK.*,U.uom_id,U.uom_name,INV.inventory_qty,INV.inventory_id')
					->from('products as PRO')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
				//	->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('inventory as INV', 'INV.inventory_item_id = PRO.product_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
				//	->where('PRO_TYP.products_type_name','FinishedGoods')
					->where('PRO.product_company_id', $sess_company)
					->where('PRO.product_status','enable')
					->get()->result_array();
		//print_r($ret); exit;
			
		return $ret;
	}
	
	public function get_allproduct($sess_company)
	{
		$ret = $this->db->select('PRO.*')
					->from('products as PRO')
					//->where('PRO.product_company_id', $sess_company)
					->where('PRO.product_status','enable')
					->get()->result_array();
			
		return $ret;
	}
	
	public function get_allproducttypes($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
					->from('products_type as TYPE')
					->where('TYPE.products_type_status','enable')
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
					->from('products_type as TYPE')
					->where('TYPE.products_type_status','enable')
					->where('TYPE.product_type_company_id',$sess_company)
					->get()->result_array();
		return $ret;	
		}
	}
	
	/* public function getproducts_grid($productid)
	{
		$ret = $this->db->select('PRO.*')
					->from('products as PRO')
					//->join('vendors as VEN', 'PO.po_vendor_id=VEN.vendor_id')
					->order_by('product_id', 'DESC')
					->where('product_type_id',$productid)
					
					->get()->result_array();
				
		//print_r($ret);exit;
		return $ret;
	} */
	
	public function getproducts_grid($product_typeid)
	{
		$ret = $this->db->select('PRO.product_id, PRO.product_name, PRO.product_code, PSK.product_stock_uom_id, U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_stock as PSK', 'PSK.product_stock_prd_id = PRO.product_id')
					->join('uom as U', 'U.uom_id = PSK.product_stock_uom_id')
					->where('product_type_id',$product_typeid)
					->get()->result_array();
				
		return $ret;
	}
	
	public function add_op_stk_details($opstk_details)
	{
		$this->db->insert('opening_stock', $opstk_details);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
		
	}
	
	public function add_opstk_item_details($op_stk_items)
	{
		$this->db->insert('opening_stock_items', $op_stk_items);
		
		//echo "<pre>"; print_r($purchase_order_items); exit;
		return true;
		
	}
	
	public function op_stk_vaildation($open_stk_code)
	{
		$this->db->select('*')
				->from('opening_stock')
				->where('opening_stock_code',$open_stk_code)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}
	
	public function vaild_stock_item($item_id)
	{
		$this->db->select('*')
				->from('inventory')
				->where('inventory_item_id', $item_id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	public function get_stk_qty($item_id)
	{	
	
		$ret=$this->db->select('*')
				->from('inventory')
				->where('inventory_item_id',$item_id)
				->get()->row();
		
		return $ret;
	
	}
	
	public function	update_stock($stock_up_data,$item_id)
	{
		$this->db->where('inventory_item_id', $item_id);
		$this->db->update('inventory', $stock_up_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	public function	insert_inv_stock($op_stock_add_data)
	{
		$this->db->insert('inventory', $op_stock_add_data);
		return  true;
	}
	
	
	public function	add_stock($op_stock_data)
	{
		$this->db->insert('inventory', $op_stock_data);
		return  true;
	}
	
	public function getsearchData($sess_group,$sess_company,$search_item_name,$search_mft_code,$search_range,$search_division_id,$search_item_type_id,$limit,$page,$sort_order,$sort_by)
	{
		$this->db->select('INV.inventory_uom_id,INV.inventory_add_date,INV.inventory_item_id,SUM(INV.inventory_received_qty) as received_qty, SUM(INV.inventory_qty) AS amount,U.*,PRO.*,STA.*,PDTY.*,PDGY.*,PROP.*');
		$this->db->from('inventory_new as INV');
		$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
		$this->db->join('uom as U', 'U.uom_id = PRO.product_uom');
		$this->db->join('store as STA', 'STA.store_id = PRO.material_store_id') ;
		$this->db->join('products_type as PDTY', 'PDTY.products_type_id = PRO.product_type_id') ;
		$this->db->join('products_groups as PDGY', 'PDGY.products_group_id = PRO.product_group_id') ;
		$this->db->join('product_price as PROP','PROP.product_prd_id = PRO.product_id');
		$this->db->group_by('INV.inventory_item_id');
		//$this->db->where('PRO.product_company_id',$sess_company);
	 
		if($search_item_name != "")
		{
			$this->db->like('PRO.product_name', $search_item_name);
		}

		if($search_mft_code != "")
		{
		$this->db->like('PRO.product_mfr_part_number', $search_mft_code);
		}
		
		if($search_division_id != "")
		{
		$this->db->like('PRO.material_store_division_id', $search_division_id);
		}
		
		if($search_item_type_id != "")
		{
		$this->db->like('PRO.product_type_id', $search_item_type_id);
		}
		
		$this->db->order_by($sort_order,$sort_by);
		$this->db->limit($limit, $page);
		$ret['rows'] = $this->db->get()->result_array();
		  
		$this->db->select('count(*) as TotalRows');
		$this->db->from('inventory_new as INV');
		$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
		$this->db->join('uom as U', 'U.uom_id = INV.inventory_uom_id');
		$this->db->join('store as STA', 'STA.store_id = PRO.material_store_id') ;
		$this->db->join('products_type as PDTY', 'PDTY.products_type_id = PRO.product_type_id') ;
		$this->db->join('products_groups as PDGY', 'PDGY.products_group_id = PRO.product_group_id') ;
		$this->db->join('product_price as PROP','PROP.product_prd_id = PRO.product_id');
		//$this->db->where('PRO.product_company_id',$sess_company);
				
		if($search_item_name != "")
		{
			$this->db->like('PRO.product_name', $search_item_name);
		}
		
		if($search_mft_code != "")
		{
		$this->db->like('PRO.product_mfr_part_number', $search_mft_code);
		}
		if($search_division_id != "")
		{
		$this->db->like('PRO.material_store_division_id', $search_division_id);
		}
		
		if($search_item_type_id != "")
		{
		$this->db->like('PRO.product_type_id', $search_item_type_id);
		}
		
		$Count = 	$this->db->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
		 
	}
	
	public function get_opstk_Data ($limit,$start,$sort_order,$sort_by,$search_opstk_code,$search_opstk_add_loc)
	{
		$this->db->select('OPS.*,LOC.location_name,US.user_first_name');
		$this->db->from('opening_stock as OPS');
		$this->db->join('users as US', 'US.user_id = OPS.opening_stock_approved_by_id');
		$this->db->join('location as LOC', 'LOC.location_id = OPS.opening_stock_location_id');
			
	
		if($search_opstk_code != "")
		{
			$this->db->like('OPS.opening_stock_code', $search_opstk_code);
		}
		if($search_opstk_add_loc != "")
		{
		$this->db->like('LOC.location_name', $search_opstk_add_loc);
		}
		
		$this->db->order_by($sort_order,$sort_by);
		$this->db->limit($limit, $start);
		$ret['rows'] = $this->db->get()->result_array();
		  
		$this->db->select('count(*) as TotalRows');
		$this->db->from('opening_stock as OPS');
		$this->db->join('location as LOC','LOC.location_id = OPS.opening_stock_location_id');
				
		if($search_opstk_code != "")
		{
			$this->db->like('OPS.opening_stock_code', $search_opstk_code);
		}
		
		if($search_opstk_add_loc != "")
		{
		$this->db->like('LOC.location_name', $search_opstk_add_loc);
		}
		
		$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 
		
		return $ret;
	}
	

	public function view_single_opstk($id)
	{
		$ret = $this->db->select('OPS.*,LO.location_name,PT.products_type_name,USR.user_first_name')
						->from('opening_stock as OPS')
						//->join('products as PRO', 'OPS.opening_stock_prd_type_id = PRO.product_type_id')
						->join('products_type as PT', 'PT.products_type_id = OPS.opening_stock_prd_type_id')
						->join('location as LO', 'LO.location_id = OPS.opening_stock_location_id')
						->join('users as USR', 'USR.user_id = OPS.opening_stock_approved_by_id')
						->where('opening_stock_id', $id)
						->get()->row();
						
		return $ret;
	}
	
	public function view_single_opstk_items($id)
	{
		
		$ret = $this->db->select('ITMES.*,PRO.*,U.uom_name,U.uom_id, STD.*, ST.*')
					->from('opening_stock_items as ITMES')
					->where('ITMES.opt_stk_items_opening_stock_id', $id)
					->join('products as PRO', 'PRO.product_id = ITMES.opt_stk_items_item_id','left')
					->join('uom as U', 'U.uom_id = ITMES.opt_stk_items_uom_id','left')
					->join('store_division as STD', 'STD.division_id = ITMES.opt_stk_item_store_division_id','left')
					->join('store as ST', 'ST.store_id = ITMES.opt_stk_item_store_id','left')
					->get()->result_array();
			//echo $this->db->last_query(); exit;		
		return $ret;
	}
	
	
	public function get_adj_stk_prefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
		
	public function getlast_adj_stk_id()
	{
		
		$ret =  $this->db->select('stock_adjustments_code')
						->from('stock_adjustments')
						->order_by('stock_adjustments_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	
	
	public function add_adj_stk($adj_stj_details)
	{
		$this->db->insert('stock_adjustments', $adj_stj_details);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	public function add_stk_adj_items($stk_adj_items)
	{
		$this->db->insert('stock_adjustment_items',$stk_adj_items);
		return true;
	}
	
	public function	update_adj_stock($adj_stock_update_data,$inventory_id)
	{
		$this->db->where('inventory_id', $inventory_id);
		$this->db->update('inventory_new', $adj_stock_update_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	public function update_adj_stk($adj_stj_details, $id)
	{
		$this->db->where('stock_adjustments_id', $id);
		$this->db->update('stock_adjustments', $adj_stj_details);
		return true;
	}
	
	//** Update Adjustment Stock Item Details **//
	
	public function update_stk_adj_items($itemdata,$item_sno,$id)
	{
		$this->db->select('*')
				->from('stock_adjustment_items')
				->where('stk_adj_items_stock_adjustment_id',$id)
				->where('stk_adj_items_id',$item_sno)
				->get();
		$num = $this->db->affected_rows();
		
		if($num == 0)
		{
			$this->db->insert('stock_adjustment_items', $itemdata);
		}
		else
		{
			//$this->db->where('stk_adj_items_stock_adjustment_id', $id);
			$this->db->where('stk_adj_items_id', $item_sno);
			$this->db->update('stock_adjustment_items', $itemdata);
		}
		
		return true;
	}
	
	public function adj_stk_list($limit,$page,$sort_order,$sort_by)
	{	
		$ret['rows'] = $this->db->select('ADJ.*, LOC.location_name,LOC.location_id,US.user_first_name')
						->from('stock_adjustments as ADJ')
						->join('location as LOC', 'LOC.location_id = ADJ.stock_adjustments_location_id')
						->join('users as US', 'US.user_id = ADJ.stock_adjustments_approved_by')
			     		->order_by($sort_order,$sort_by)
						//->where('OST.opening_stock_active_status' ,'active')
						->limit($limit, $page)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('stock_adjustments as ADJ')
							->join('location as LOC', 'LOC.location_id = ADJ.stock_adjustments_location_id')
							->join('users as US', 'US.user_id = ADJ.stock_adjustments_approved_by')
							->order_by($sort_order,$sort_by)
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
	//	echo "<pre>"; print_r($ret); exit;
		return $ret;

	}
	
	
	public function view_single_adjstk($id)
	{
		$ret = $this->db->select('ADJ.*,LO.location_name,USR.user_first_name')
						->from('stock_adjustments as ADJ')
						//->join('products as PRO', 'OPS.opening_stock_prd_type_id = PRO.product_type_id')
						//->join('products_type as PT', 'PT.products_type_id = ADJ.opening_stock_prd_type_id')
						->join('location as LO', 'LO.location_id = ADJ.stock_adjustments_location_id')
						->join('users as USR', 'USR.user_id = ADJ.stock_adjustments_approved_by')
						->where('stock_adjustments_id', $id)
						->get()->row();
						
		return $ret;
	}
	
	public function view_single_adjstk_items($id)
	{
		
		$ret = $this->db->select('ITMES.*,PRO.*,U.uom_name,U.uom_id')
					->from('stock_adjustment_items as ITMES')
					->where('ITMES.stk_adj_items_stock_adjustment_id', $id)
					->join('products as PRO', 'PRO.product_id = ITMES.stk_adj_items_item_id','left')
					->join('uom as U', 'U.uom_id = ITMES.stk_adj_items_uom_id','left')
					->get()->result_array();
		//echo "<pre>"; print_r($ret); exit;		
		return $ret;
	}
 
	public function get_search_opn_stock($sess_company,$search_stock_code,$search_loc,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date)
	{ 
			$this->db->select('OST.*, LOC.location_name,LOC.location_id,US.user_first_name');
			$this->db->from('opening_stock as OST');
			$this->db->join('location as LOC', 'LOC.location_id = OST.opening_stock_location_id');
			$this->db->join('users as US', 'US.user_id = OST.opening_stock_approved_by_id');
			
			if($search_stock_code != '')
			{
				$this->db->or_like('OST.opening_stock_code' ,$search_stock_code);
			}
			if($search_loc != '')
			{
				$this->db->or_like('OST.opening_stock_location_id' ,$search_loc);
			}
			 
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
				$this->db->where('OST.opening_stock_added_on >=', $from_date);
				}
				if($from_date == "1970-01-01"  && $to_date != '' )
				{
				$this->db->where('OST.opening_stock_added_on <=', $to_date);
				}
				if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				{
					$this->db->where('OST.opening_stock_added_on >=', $from_date);
				$this->db->where('OST.opening_stock_added_on <=', $to_date);
				} 
			}		
			if($search_status != '')
			{
				$this->db->or_like('OST.opening_stock_status' ,$search_status);
			}
			$this->db->where('OST.opening_stock_active_status', 'active');
			$this->db->limit($limit, $page);
			$this->db->order_by($sort_order, $sort_by);
			$ret['rows'] = $this->db->get()->result_array();
		//echo $this->db->last_query(); exit;
			$this->db->select('count(*) as TotalRows');
			 
			
				$this->db->from('opening_stock as OST');
			$this->db->join('location as LOC', 'LOC.location_id = OST.opening_stock_location_id');
			$this->db->join('users as US', 'US.user_id = OST.opening_stock_approved_by_id');
				
				if($search_stock_code != '')
				{
					$this->db->or_like('OST.opening_stock_code' ,$search_stock_code);
				}
				if($search_loc != '')
				{
					$this->db->or_like('OST.opening_stock_location_id' ,$search_loc);
				}
				 
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('OST.opening_stock_added_on >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('OST.opening_stock_added_on <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('OST.opening_stock_added_on >=', $from_date);
					$this->db->where('OST.opening_stock_added_on <=', $to_date);
					} 
				}		
				if($search_status != '')
				{
					$this->db->or_like('OST.opening_stock_status' ,$search_status);
				}
			$this->db->where('OST.opening_stock_active_status', 'active');
			$this->db->limit($limit, $page);
 
			$Count = $this->db->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
	}
	
	public function get_search_adj_stock($sess_company,$search_stock_code,$search_loc,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date)
	{ 
		 		 
			$this->db->select('SA.*, LOC.location_name,LOC.location_id,US.user_first_name');
			$this->db->from('stock_adjustments as SA');
			$this->db->join('location as LOC', 'LOC.location_id = SA.stock_adjustments_location_id');
			$this->db->join('users as US', 'US.user_id = SA.stock_adjustments_approved_by');
			
			if($search_stock_code != '')
			{
				$this->db->like('SA.stock_adjustments_code' ,$search_stock_code);
			}
			if($search_loc != '')
			{
				$this->db->like('SA.stock_adjustments_location_id' ,$search_loc);
			}
			 
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
					$this->db->where('SA.stock_adjustments_added_date >=', $from_date);
				}
				else if($from_date == "1970-01-01"  && $to_date != '' )
				{
					$this->db->where('SA.stock_adjustments_added_date <=', $to_date);
				}
				else if($from_date != "1970-01-01" && $to_date != "1970-01-01" )
				{
					$this->db->where('SA.stock_adjustments_added_date >=', $from_date);
					$this->db->where('SA.stock_adjustments_added_date <=', $to_date);
				} 
			}		
			if($search_status != '')
			{
				$this->db->like('SA.stock_adjustments_status' ,$search_status);
			}
			 
			$this->db->limit($limit, $page);
			$this->db->order_by($sort_order, $sort_by);
			$ret['rows'] = $this->db->get()->result_array();
		//echo $this->db->last_query(); exit;
			$this->db->select('count(*) as TotalRows');
			 
			
			$this->db->from('stock_adjustments as SA');
			$this->db->join('location as LOC', 'LOC.location_id = SA.stock_adjustments_location_id');
			$this->db->join('users as US', 'US.user_id = SA.stock_adjustments_approved_by');
				
		if($search_stock_code != '')
			{
				$this->db->like('SA.stock_adjustments_code' ,$search_stock_code);
			}
			if($search_loc != '')
			{
				$this->db->like('SA.stock_adjustments_location_id' ,$search_loc);
			}
			 
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
					$this->db->where('SA.stock_adjustments_added_date >=', $from_date);
				}
				else if($from_date == "1970-01-01"  && $to_date != '' )
				{
					$this->db->where('SA.stock_adjustments_added_date <=', $to_date);
				}
				else if($from_date != "1970-01-01" && $to_date != "1970-01-01" )
				{
					$this->db->where('SA.stock_adjustments_added_date >=', $from_date);
					$this->db->where('SA.stock_adjustments_added_date <=', $to_date);
				} 
			}		
			if($search_status != '')
			{
				$this->db->like('SA.stock_adjustments_status' ,$search_status);
			}
			
 			$this->db->order_by($sort_order, $sort_by); 
			$Count = $this->db->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
	}
	

	public function getitem_quty_details($product_item_id)	
	{
		
		$ret = $this->db->select('inventory_qty')
					->from('inventory')
					->where('inventory_item_id', $product_item_id)
					 
					->get()->row();
			//echo $this->db->last_query(); exit;		
		return $ret;
	}
	 
	
	public function get_qty_details($product_id)
	{
		
		$ret = $this->db->select('inventory_qty')
					->from('inventory')
					->where('inventory_item_id', $product_id) 
					->get()->row();
			 //echo $this->db->last_query(); exit;		
			 
		//return $ret;
		echo "<PRE>";print_r($ret);exit;
	}
	
	//** Multiple Search Item Details **//
	
	public function getproductsdetailswithmultiplesearch($sess_group,$sess_company,$product_type,$product_group,$item_code,$mfg_prtno,$item_name,$control_no,$batch_no)
	{
			$this->db->select('INV.*,PRO.product_id,PRO.product_name,PRO.product_code,PRO.product_status,PRO.product_mfr_part_number,  PRO_STK.*,U.uom_name,U.uom_id');
			$this->db->from('inventory_new as INV');
			$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->where('PRO.product_status','enable');
			$this->db->limit (10);
			 
			if($item_code != "")
			{
				$this->db->like('PRO.product_code',$item_code);
			}
			if($mfg_prtno != "")
			{
				$this->db->like('PRO.product_mfr_part_number',$mfg_prtno);
			} 
			if($item_name != "")
			{
				$this->db->like('PRO.product_name',$item_name);
			} 
			if($control_no != "")
			{
				$this->db->like('INV.inventory_control_no',$control_no);
			} 
			if($batch_no != "")
			{
				$this->db->like('INV.inventory_batch_no',$batch_no);
			} 
			$ret = $this->db->get()->result_array();
			
			return $ret;
	}
	
	public function get_allproductsdetail($sess_group,$sess_company) 

	{
			$this->db->select('PRO.product_name,PRO.product_id,PRO.product_mfr_part_number,PRO.product_code,PRO_STK.*,U.uom_id,U.uom_name,INV.*');
			$this->db->from('inventory_new as INV');
			$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->where('PRO.product_status','enable');
			$this->db->limit (10);
		 
			$ret = $this->db->get()->result_array();
			
			return $ret;
	}
	
	//// REPORT MODULE FUNCTIONALITY WILL BE REMOVED ONCE THE REPORT FUNCTIONALITY COMPLETED
	

	
	
	public function get_report_po_stock_list($sess_company,$report_from,$report_to)
	{
		
	  $this->db->select('INV.inventory_item_id, PRO.product_code,');
	  
	  $this->db->from('inventory as INV');
	  $this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
	  $this->db->where('PRO.product_company_id',$sess_company);
  
	  
	  if($report_from != "")
	  {
		  $this->db->where('INV.inventory_add_date >=', $report_from);
	  }
	  if($report_to != "")
	  {
		  $this->db->where('INV.inventory_add_date <=', $report_to);
	  }
	 
	  $result = $this->db->get()->result_array();
	  
	  //echo "<pre>"; print_r($result); 
	  
	  $errors = array_filter($result);

	 if (!empty($errors)) 
		{
			 $i = 0;
	    foreach($result as $STK)
		{
		 $this->db->select('sum(PO_ITEMS.po_items_ord_qty) as PO_STOCK, PO.po_po_status');
		 $this->db->from('purchase_order_items as PO_ITEMS');
		 $this->db->join('purchase_order as PO','PO_ITEMS.po_items_po_id = PO.po_po_id');
		 $this->db->where('PO.po_po_status', 'draft');
		 $this->db->where('PO_ITEMS.po_items_item_id', $STK['inventory_item_id']);
		 $query = $this->db->get()->result_array();
		
		   $result[$i] = $STK;
		   $result[$i]['stock_po_summary'] = $query;
		  
		   $i++;
		}
		}

	  
	  echo "<pre>"; print_r($result);
	   return $result;
	  
	 }
	 
	 public function get_report_so_stock_list($sess_company,$report_from,$report_to)
	{
		
	  $this->db->select('INV.inventory_item_id,PRO.product_name');
	  
	  $this->db->from('inventory as INV');
	   $this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
	  $this->db->where('PRO.product_company_id',$sess_company);
  
	  
	  if($report_from != "")
	  {
		  $this->db->where('INV.inventory_add_date >=', $report_from);
	  }
	  if($report_to != "")
	  {
		  $this->db->where('INV.inventory_add_date <=', $report_to);
	  }
	 
	  $result = $this->db->get()->result_array();
	  
	  $errors = array_filter($result);

	 if (!empty($errors)) 
		{
			 $i = 0;
	    foreach($result as $STK)
		{
		 $this->db->select('sum(SO_ITEMS.so_items_ord_qty) as SO_STOCK, SO.sales_order_status');
		 $this->db->from('sales_order_items as SO_ITEMS');
		 $this->db->join('sales_order as SO','SO_ITEMS.so_items_sales_id = SO.sales_order_id');
		 $this->db->where('SO.sales_order_status', 'created');
		 $this->db->where('SO_ITEMS.so_items_item_id', $STK['inventory_item_id']);
		 $query = $this->db->get()->result_array();
		
		   $result[$i] = $STK;
		   $result[$i]['stock_so_summary'] = $query;
		  
		   $i++;
		}
		}

	  
	   echo "<pre>"; print_r($result); exit;
	  // return $result;
	  
	 }
	
	
	public function get_report_sales_flow($sess_company,$report_from,$report_to,$cus_id)
	{
		
		$this->db->select('PO.po_po_id, PO.po_po_no, PO.po_add_date, IND.po_indent_number, IND.po_indent_add_date, PUR_INV.po_invoice_number, PUR_INV.po_invoice_add_date');
		
		$this->db->from('purchase_order as PO');
		$this->db->join('purchase_indent as IND','IND.po_purchase_order_id = PO.po_po_id');
		$this->db->join('purchase_invoice as PUR_INV','PUR_INV.po_invoice_po_reference_id = PO.po_po_id');
		$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
		$this->db->order_by('po_po_id', 'DESC');
		//$this->db->where('IND.po_indent_number','PI0044');
		
		
		if($report_from != "")
		{
			$this->db->where('PO.po_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PO.po_add_date <=', $report_to);
		}
		if($cus_id != "")
		{
			$this->db->where('PO.po_vendor_id', $cus_id);
		
		}
		$this->db->where('PO.po_status','active');
		$this->db->where('PO.po_po_company_id',$sess_company);
		$ret = $this->db->get()->result_array();
		
		return $ret;
	}
	// Stock Items //
	public function inventory_items($id)
	{
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,PRO.*, PROP.*')
						->from('inventory_new as ITMES')
						->where('ITMES.inventory_item_id', $id)
						->join('products as PRO','PRO.product_id = ITMES.inventory_item_id','left')
						->join('product_price as PROP','PROP.product_prd_id = ITMES.inventory_item_id','left')
						->join('uom as U', 'U.uom_id = ITMES.inventory_uom_id','left')
						->get()->result_array();	
		return $ret;
	}
	
	public function inventory_items_list()
	{
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,PRO.*, PROP.*')
						->from('inventory_new as ITMES')
						->join('products as PRO','PRO.product_id = ITMES.inventory_item_id','left')
						->join('product_price as PROP','PROP.product_prd_id = ITMES.inventory_item_id','left')
						->join('uom as U', 'U.uom_id = ITMES.inventory_uom_id','left')
						->get()->result_array();	
		return $ret;
	}
	
	public function	update_stock_new($stock_up_data_new)
	{
		$this->db->insert('inventory_new', $stock_up_data_new);
		return true;
	}
}