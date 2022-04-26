<?php

Class Materialrequestmodule extends CI_Model
{
	//** Get Prefix for Material Request **//
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Get All Material Request **//
	
	public function get_allmaterialreq($limit,$start,$sort_order,$sort_by,$sess_company,$sess_group)
	{
		if($sess_group == 1)
		{
		$ret['rows'] = $this->db->select('*')
							->from('meterial_request')
							 ->order_by($sort_order, $sort_by)
							->where('met_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('meterial_request')
							 ->order_by($sort_order, $sort_by)
							->where('met_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('*')
						->from('meterial_request')
			     		 ->order_by($sort_order, $sort_by)
						->where('met_status' ,'active')
						//->where('met_requestion_company_id' , $sess_company)
						->limit($limit, $start)
						->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('meterial_request')
							 ->order_by($sort_order, $sort_by)
							->where('met_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
		}
	}
	
	//** Search Material Request **//
	
	public function get_search_materialreq($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_met_req_no,$search_req_typ,$search_req_for,$search_status,$from_date,$to_date)
	{
		if($sess_group == 1)
		{
			//echo "test";exit;
						$this->db->select('*');
						$this->db->from('meterial_request');
			     		$this->db->order_by($sort_order, $sort_by);
						if($search_met_req_no != '')
						{
							$this->db->like('met_requestion_no',$search_met_req_no);
						}
						if($search_req_for != '')
						{
							$this->db->like('met_request_for',$search_req_for);
						}
						if($search_req_typ != '')
						{
							$this->db->like('met_requestion_type',$search_req_typ);
						}
						if($search_status != '')
						{
							$this->db->like('met_req_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('met_transation_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('met_transation_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('met_transation_date >=', $from_date);
							$this->db->where('met_transation_date <=', $to_date);
							} 
							
						}
						 
						
						
						$this->db->where('met_status','active');
						$this->db->limit($limit,$page);
						 
						$ret['rows'] = $this->db->get()->result_array();
	 			// echo $this->db->last_query();exit;
						$this->db->select('count(*) as TotalRows');
						$this->db->from('meterial_request');
						if($search_met_req_no != '')
						{
							$this->db->like('met_requestion_no',$search_met_req_no);
						}
						if($search_req_for != '')
						{
							$this->db->like('met_request_for',$search_req_for);
						}
						if($search_req_typ != '')
						{
							$this->db->like('met_requestion_type',$search_req_typ);
						}
						if($search_status != '')
						{
							$this->db->like('met_req_status',$search_status);
						} 
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('met_transation_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('met_transation_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('met_transation_date >=', $from_date);
							$this->db->where('met_transation_date <=', $to_date);
							} 
							
						}
						 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
		}
					else
					{
						$this->db->select('*');
						$this->db->from('meterial_request');
			     		$this->db->order_by($sort_order, $sort_by);
						if($search_met_req_no != '')
						{
						$this->db->like('met_requestion_no',$search_met_req_no);
						}
						if($search_req_for != '')
						{
						$this->db->like('met_request_for',$search_req_for);
						}
						if($search_req_typ != '')
						{
						$this->db->like('met_requestion_type',$search_req_typ);
						}
						if($search_status != '')
						{
						$this->db->like('met_req_status',$search_status);
						}
						 
						 if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('met_transation_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('met_transation_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('met_transation_date >=', $from_date);
							$this->db->where('met_transation_date <=', $to_date);
							} 
							
						}
						
						//$this->db->where('met_requestion_company_id', $sess_company);
						$this->db->where('met_status','active');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	 
						$this->db->select('count(*) as TotalRows');
						$this->db->from('meterial_request');
						if($search_met_req_no != '')
						{
						$this->db->like('met_requestion_no',$search_met_req_no);
						}
						if($search_req_for != '')
						{
						$this->db->like('met_request_for',$search_req_for);
						}
						if($search_req_typ != '')
						{
						$this->db->like('met_requestion_type',$search_req_typ);
						}
						if($search_status != '')
						{
						$this->db->like('met_req_status',$search_status);
						}
						 
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('met_transation_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('met_transation_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('met_transation_date >=', $from_date);
							$this->db->where('met_transation_date <=', $to_date);
							} 
							
						}
						//$this->db->where('met_requestion_company_id', $sess_company);
							 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
	
	public function getmetrialrequest_for_popup_grid()
	{
		$ret = $this->db->select('*')
					->from('meterial_request')
					->order_by('met_id', 'DESC')
					->where('met_status' ,'active')
					->get()->result_array();
		return $ret;
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

	/*public function getmetrialrequest_items_for_popup_grid()
	{
		$ret = $this->db->select('*')
					->from('meterial_request_item')
					->order_by('met_id', 'DESC')
					->where('met_status' ,'active')
					->get()->result_array();
		return $ret;
	}*/
	
	//** Get Last ID for Material request **//
	
	public function getlastid()
	{
		
		$ret =  $this->db->select('met_requestion_no')
						->from('meterial_request')
						->order_by('met_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	} 
	
	//** Add Material Request Details **//
	
	public function add_material_details($materialreqdata)
	{
		$this->db->insert('meterial_request',$materialreqdata);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	//** Add Material Request Item Details **//
	
	public function add_material_Item_details($materialitm_data)
	{
		$this->db->insert('meterial_request_item',$materialitm_data);
		return true;
	}
	
	//** Add Material Request Vendor Details **//
	
	public function add_met_vendor_details($material_ven_data)
	{
		$this->db->insert('meterial_request_vendors',$material_ven_data);
		return true;
	}
	
	//** Get single Material Request Details **//
	
	public function edit_single_materialrequest($id)
	{
		$ret = $this->db->select('*')
						->from('meterial_request')
						->where('met_id', $id)
						->get()->row();			
		return $ret;
	}
	
	//** Get single Material Request Item Details **//
	
	public function edit_single_matreq_items($id)
	{
		
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id, PRO.product_name,PRO.product_code,PRO.product_mfr_part_number,')
						->from('meterial_request_item as ITMES')
						->where('ITMES.met_req_id', $id)
						->join('products as PRO', 'PRO.product_id = ITMES.met_item_itemid','left')
						->join('uom as U', 'U.uom_id = ITMES.met_item_uom','left')
						->get()->result_array();
		return $ret;
	}
	
	//** Get single Material Request Vendor Details **//
	
	public function edit_single_matreq_vendor($id)
	{
		
		$ret = $this->db->select('VEN.*,V.vendor_name,V.vendor_code,V.vendor_id,V.vendor_phone,V.vendor_email,V.vendor_contact_person')
						->from('meterial_request_vendors as VEN')
						->where('VEN.met_req_id', $id)
						->join('vendors as V', 'V.vendor_id = VEN.met_ven_venid','left')
						->get()->result_array();
		return $ret;
	}
	
	//** Update Material Request Details **//
	
	public function update_material_details($materialreqdata,$id)
	{
		$this->db->where('met_id', $id);
		$this->db->update('meterial_request', $materialreqdata);
		return  true;
	}
	
	//** Delete Material Request Items In the Grid List **//
	
	public function delete_material_request_items($id)
	{
		$this->db->where('met_req_id',$id);
		$this->db->delete('meterial_request_item');
	}
	
	//** Update Material Request Item Details **//
	
	public function update_material_Item_details($materialitm_data,$id, $item_id)
	{
		$this->db->select('*')
				->from('meterial_request_item')
				->where('met_req_id',$id)
				->where('met_item_itemid',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('meterial_request_item', $materialitm_data);
		}
		else
		{
			$this->db->where('met_req_id', $id);
			$this->db->where('met_item_itemid', $item_id);
			$this->db->update('meterial_request_item', $materialitm_data);
		}
		return true;
	}
	
	//** Delete Material Request Vendor Details In the Grid List **//
	
	public function delete_met_vendor_details($id)
	{
		$this->db->where('met_req_id',$id);
		$this->db->delete('meterial_request_vendors');
	}
	
	//** Update Material Request Vendor Details Details **//
	
	public function update_met_vendor_details($material_ven_data, $id,$ven_id)
	{
		$this->db->select('*')
				->from('meterial_request_vendors')
				->where('met_req_id',$id)
				->where('met_ven_venid',$ven_id)
				->get();
		$num = $this->db->affected_rows();
		
		if($num == 0)
		{
			$this->db->insert('meterial_request_vendors', $material_ven_data);
		}
		else
		{
			$this->db->where('met_req_id', $id);
			$this->db->where('met_ven_venid', $ven_id);
			$this->db->update('meterial_request_vendors', $material_ven_data);
		}
		return true;
	}
	
	//** Get Material Request Items **//
	
	public function getmetrialrequestitems($id)
	{
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,PRO_PRICE.*,P.product_model_number')
					->from('meterial_request_item as ITMES')
					->where('ITMES.met_req_id', $id)
					->join('products as P', 'P.product_id = ITMES.met_item_itemid')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = P.product_id')
					->join('uom as U', 'U.uom_id = ITMES.met_item_uom')
					->get()->result_array();
		return $ret;
	}
	
	//** Material Request Status **//
	
	public function update_mr_status($mrdata,$id)
	{
		$this->db->where('met_id', $id)
				->update('meterial_request', $mrdata);
		
		return true;
	}
	
	//** Get All Product Type **//
	
	public function get_allproducttypes($sess_group,$sess_company)
	{
			$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
							->from('products_type as TYPE')
							->where('TYPE.products_type_status','enable')
							->get()->result_array();
			return $ret;
	}
	
	//** Get All Product Group **//
	
	public function get_allproductgroups()
	{
		$ret = $this->db->select('G.products_group_id, G.products_group_name')
					->from('products_groups as G')
					->get()->result_array();
		return $ret;
	}
	
	public function get_allproductsdetails($sess_group,$sess_company,$division_id,$store_id)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*,STD.division_name,STR.store_name')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id')
					->join('store as STR', 'STR.store_id = PRO.material_store_id')
					->where('PRO.material_store_division_id',$division_id)
					//->where('PRO.material_store_id',$store_id)
					->where('PRO.product_status','enable')
					->limit (10)
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*,STD.division_name,STR.store_name')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id')
					->join('store as STR', 'STR.store_id = PRO.material_store_id')
					->where('PRO.material_store_division_id',$division_id)
					//->where('PRO.material_store_id',$store_id)
					->where('PRO.product_status','enable')
					//->where('PRO.product_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
				
		return $ret;
		}
	}
	
	//** Get All Products for Single Item **//
	
	public function get_allproductsdetailsforsingleitem($sess_group,$sess_company,$producttype)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
							->from('products as PRO')
							->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
							->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
							->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
							->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
							->where('PRO.product_status','enable')
							->where('PRO.product_type_id',$producttype)
							->get()->result_array();
		return $ret;
		}
		else
		{
			$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
							->from('products as PRO')
							->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
							->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
							->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
							->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
							->where('PRO.product_status','enable')
							->where('PRO.product_type_id',$producttype)
							//->where('PRO.product_company_id',$sess_company)
							->get()->result_array();
			return $ret;
		}
	}
	
	//** Get All Uom Details **//
	
	public function get_alluom()
	{
		$ret = $this->db->select('U.uom_id, U.uom_name')
						->from('uom as U')
						->get()->result_array();
		return $ret;
	}
	
	//** Get Item Details based on product Id **//
	
	public function getitemdetails($product_item_id)
	{
		$ret = $this->db->select('PRO.product_id,PRO.product_type_id,PRO.product_group_id,PRO.product_name,PRO.product_code,PRO.product_model_number,PRO.product_mfr_part_number,PRICE.product_mrp,PRICE.product_selling,PRICE.product_cp,PRICE.product_uty_qty,PRICE.product_vat_tax,PRICE.product_gst_tax,PRICE.product_service_tax,PRICE.product_cst_tax,PRICE.product_excise_duty_tax,PRICE.product_discounts,U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
					->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
					->where('PRO.product_id', $product_item_id)
					->get()->row();
					
		return $ret;
	}
	
	//** Onchange Item Popup in the product type and Items **//
	
	public function onchangeitemstype($sess_group,$sess_company,$product_type,$product_group)
	{	
			$this->db->select('PRO.*');
			$this->db->from('products as PRO');
			$this->db->where('PRO.product_status','enable');
			if($product_type != "")
			{
				$this->db->where('PRO.product_type_id',$product_type);
			}
			if($product_group != "")
			{
				$this->db->where('PRO.product_group_id',$product_group);
			}
			$ret =  $this->db->get()->result_array();
		
			return $ret;	
	}
	
	//** Multiple Search Item Details **//
	
	public function getproductsdetailswithmultiplesearch($sess_group,$sess_company,$product_type,$product_group,$item_code,$mfg_prtno,$item_name,$division_id,$store_id)
	{
		if($sess_group == 1)
		{
			$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*, STD.*, STR.*');
			$this->db->from('products as PRO');
			$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id');
			$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
			$this->db->where('PRO.material_store_division_id',$division_id);
			//$this->db->where('PRO.material_store_id',$store_id)
			$this->db->where('PRO.product_status','enable');
			$this->db->limit (25);
			if($product_type != "")
			{
				$this->db->where('PRO.product_type_id',$product_type);
			}
			if($product_group != "")
			{
				$this->db->where('PRO.product_group_id',$product_group);
			}
			if($item_code != "")
			{
				$this->db->like('PRO.product_code',$item_code);
			}
			if($mfg_prtno != "")
			{
				$this->db->like('PRO.product_mfr_part_number',$mfg_prtno);
			} if($item_name != "")
			{
				$this->db->like('PRO.product_name',$item_name);
			} 
			$ret = $this->db->get()->result_array();
			
			return $ret;
		}
		else
		{
			$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*,STD.*, STR.*');
			$this->db->from('products as PRO');
			$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id');
			$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
			$this->db->where('PRO.material_store_division_id',$division_id);
			//$this->db->where('PRO.material_store_id',$store_id)
			$this->db->where('PRO.product_status','enable');
			//$this->db->where('PRO.product_company_id',$sess_company);
			$this->db->limit (25);
			if($product_type != "")
			{
				$this->db->where('PRO.product_type_id',$product_type);
			}
			if($product_group != "")
			{
				$this->db->where('PRO.product_group_id',$product_group);
			}
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
			$ret = $this->db->get()->result_array();
			
			return $ret;
		}
	}
//FOR sales Order Popup	

	//** Get Sales Order Pop-up **//
	
	public function getsales_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('*')
					->from('sales_order')
					->order_by('sales_order_id', 'DESC')
					->where('sales_order_status !=' ,'cancelled')
					->where('sales_order_status !=' ,'delivered')
					->where('sales_order_active_status' ,'active')
					->limit (10)
					->get()->result_array();
				
		return $ret;
		}
		else
		{
			$ret = $this->db->select('*')
					->from('sales_order')
					->order_by('sales_order_id', 'DESC')
					->where('sales_order_status !=' ,'cancelled')
					->where('sales_order_status !=' ,'delivered')
					->where('sales_order_active_status' ,'active')
					//->where('sales_order_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
				
		return $ret;
		}
	}
	
	
	public function getBOM_popup_grid($sess_group,$sess_company)
	{
		
		$ret = $this->db->select('*')
					->from('bom')
					->order_by('bom_id', 'DESC')
					->where('bom_status' ,'enable')
					->limit (10)
					->get()->result_array();
				
		return $ret;
		
	}
	//** Get Single SalesOrder Items **//
	
	public function getsinglesalesitem($id)
	{
		$this->db->select('SO.*, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, U.uom_name,U.uom_id');
		$this->db->from('sales_order_items as SO');
	 	$this->db->where('SO.so_items_sales_id', $id);
		$this->db->join('products as PRO', 'PRO.product_id = SO.so_items_item_id');		
		$this->db->join('uom as U', 'U.uom_id = SO.so_items_uom_id');		
		$query = $this->db->get()->result_array();
	
		return $query;
	}
	
	public function getsales_bomitems($id)
	{
		$this->db->select('SO.*, PRO.product_name, BOM.bom_product_id');
		$this->db->from('sales_order_items as SO');
	 	$this->db->where('SO.so_items_sales_id', $id);
		$this->db->join('bom as BOM', 'BOM.bom_product_id = SO.so_items_item_id');	
		$this->db->join('products as PRO', 'PRO.product_id = SO.so_items_item_id');	
		$this->db->join('uom as U', 'U.uom_id = SO.so_items_uom_id');		
		$query = $this->db->get()->result_array();
	
		return $query;
	}
	
		public function getsingleBOMDetails($id)
	{
		$this->db->select('BOM.*');
		$this->db->from('bom as BOM');
	 	$this->db->where('BOM.bom_id', $id);
		$query = $this->db->get()->row();
	
		return $query;
	}
	
/*	public function getsingleBOMitem($id)
	{
		$this->db->select('BOM.*, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, U.uom_name,U.uom_id');
		$this->db->from('bom_items as BOM');
	 	$this->db->where('BOM.bom_item_ref_id', $id);
		$this->db->join('products as PRO', 'PRO.product_id = BOM.bom_item_comp_material_id');		
		$this->db->join('uom as U', 'U.uom_id = BOM.bom_item_comp_qty_uom_id');		
		$query = $this->db->get()->result_array();
	
		return $query;
	}*/
	
		public function getsingleBOMitem($id)
	{
		$this->db->select('BOM.*, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, U.uom_name,U.uom_id,SUM(INV.inventory_qty) as inventory_qty');
		$this->db->from('bom_items as BOM');
		$this->db->join('products as PRO', 'PRO.product_id = BOM.bom_item_comp_material_id');
		$this->db->join('inventory_new as INV', 'PRO.product_id = INV.inventory_item_id');		
		$this->db->join('uom as U', 'U.uom_id = BOM.bom_item_comp_qty_uom_id');
		$this->db->group_by('INV.inventory_item_id');		
		$this->db->where('BOM.bom_item_ref_id', $id);
		$query = $this->db->get()->result_array();
	
		return $query;
	}
	
	public function getsingleBOMitem_new($id)
	{
		$this->db->select('BOM.*');
		$this->db->from('bom as BOM');
	 	$this->db->where('BOM.bom_product_id', $id);
		$this->db->limit (1);
		$this->db->order_by('BOM.bom_id', 'desc');
		$query = $this->db->get()->row();
	
		return $query;
	}
	
	public function getBOMwithsearch($search_bom_no,$search_prod_name)
	{
		$this->db->select('*');
		$this->db->from('bom');
		$this->db->where('bom_status' ,'enable');
		$this->db->limit (10);
		if($search_bom_no != "")
		{
			$this->db->like('bom_no',$search_bom_no);
		}
		if($search_prod_name != "")
		{
			$this->db->like('bom_product_name',$search_prod_name);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}
	
	//** Search Vendor Details **//
	
	public function getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email)
	{
		$this->db->select('*');
		$this->db->from('vendors');
		$this->db->where('vendor_status','enable');
		if($vendor_code != "")
		{
			$this->db->like('vendor_code',$vendor_code);
		}
		if($vendor_name != "")
		{
			$this->db->like('vendor_name',$vendor_name);
		}
		if($ven_mobile != "")
		{
			$this->db->like('vendor_phone',$ven_mobile);
		}
		if($ven_email != "")
		{
			$this->db->like('vendor_email',$ven_email);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}
	
	//** Search Sales ORder DEtails **//
	
	public function getsalesorderwithsearch($so_code,$customer_name)
	{
		$this->db->select('*');
		$this->db->from('sales_order');
		$this->db->where('sales_order_status !=' ,'cancelled');
		$this->db->where('sales_order_status !=' ,'delivered');
		$this->db->where('sales_order_active_status' ,'active');
		$this->db->limit (10);
		if($so_code != "")
		{
			$this->db->like('sales_order_number',$so_code);
		}
		if($customer_name != "")
		{
			$this->db->like('sales_order_customer_name',$customer_name);
		}
		
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}
	
	public function getsalesorderwithsearch_indent($so_code,$customer_name,$po_refernce_no)
	{
		$this->db->select('*');
		$this->db->from('sales_order');
		$this->db->where('sales_order_status !=' ,'cancelled');
		$this->db->where('sales_order_status !=' ,'delivered');
		$this->db->where('sales_order_status' ,'approved');
		$this->db->where('sales_order_active_status' ,'active');
		$this->db->limit (10);
		if($so_code != "")
		{
			$this->db->like('sales_order_number',$so_code);
		}
		if($customer_name != "")
		{
			$this->db->like('sales_order_customer_name',$customer_name);
		}
		if($po_refernce_no != "")
		{
			$this->db->like('sale_order_customer_po_refernce_number',$po_refernce_no);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}
	
	
}
	