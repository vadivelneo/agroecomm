<?php

Class Purchasemodule extends CI_Model
{	
	//** Get Prefix **//
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	public function get_comp_det($sess_company)
	{
		$ret = $this->db->select('*')
			        ->from('company')
					->where('company_id', $sess_company)
  					 ->get()->row();
		 		return $ret;
	}
	//** Get All Purchase Order to display in grid **//
	
	public function get_all_po($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('PO.*,POT.po_grand_total,VEN.vendor_name')
								->from('purchase_order as PO')
								->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id')
								->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id')
								 
								->where('PO.po_status' ,'active')
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
		
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_order as PO')
								->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id')
								->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id')
								->where('PO.po_status' ,'active')
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
		 
			return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('PO.*,POT.po_grand_total,VEN.vendor_name')
								->from('purchase_order as PO')
								->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id')
								->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id')
								 
								->where('PO.po_status' ,'active')
								->where('PO.po_po_company_id',$sess_company)
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
		
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_order as PO')
								->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id')
								->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id')
								->where('PO.po_status' ,'active')
								->where('PO.po_po_company_id',$sess_company)
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	//** Search Purchase Order **//
	
	public function get_search_all_po($sess_group,$sess_company,$search_po_order,$search_ven_name,$search_amount,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date,$search_div_name,$search_str_name)
	{
		if($sess_group == 1)
		{
						$this->db->select('PO.*,POT.*,VEN.vendor_name,STD.*,STR.*');
						$this->db->from('purchase_order as PO');
						$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
						$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
						$this->db->join('store_division as STD', 'STD.division_id = PO.po_store_division_id');
						$this->db->join('store as STR', 'STR.store_id = PO.po_store_id');
			     		$this->db->order_by($sort_order, $sort_by);
						if($search_po_order != '')
						{
							$this->db->like('PO.po_po_no' ,$search_po_order);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name' ,$search_ven_name);
						}
						if($search_div_name != '')
						{
							$this->db->like('STD.division_name' ,$search_div_name);
						}
						if($search_str_name != '')
						{
							$this->db->like('STR.store_name' ,$search_str_name);
						}
						 
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PO.po_req_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PO.po_req_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PO.po_req_date >=', $from_date);
							$this->db->where('PO.po_req_date <=', $to_date);
							} 
							
						}
						
						if($search_status != '')
						{
							$this->db->like('PO.po_po_status' ,$search_status);
						}
						$this->db->where('PO.po_status' ,'active');
						$this->db->limit($limit, $page); 
						$ret['rows'] = $this->db->get()->result_array();

					 	$this->db->select('count(*) as TotalRows');
						$this->db->from('purchase_order as PO');
						$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
						$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
						$this->db->join('store_division as STD', 'STD.division_id = PO.po_store_division_id');
						$this->db->join('store as STR', 'STR.store_id = PO.po_store_id');
			     		$this->db->order_by('PO.po_po_id', 'DESC');
						if($search_po_order != '')
						{
							$this->db->like('PO.po_po_no' ,$search_po_order);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name' ,$search_ven_name);
						}
						if($search_div_name != '')
						{
							$this->db->like('STD.division_name' ,$search_div_name);
						}
						if($search_str_name != '')
						{
							$this->db->like('STR.store_name' ,$search_str_name);
						}
						if($search_status != '')
						{
							$this->db->like('PO.po_po_status' ,$search_status);
						}
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PO.po_req_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PO.po_req_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PO.po_req_date >=', $from_date);
							$this->db->where('PO.po_req_date <=', $to_date);
							} 
							
						}
						$this->db->where('PO.po_status' ,'active');	
						$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
						$this->db->select('PO.*,POT.*,VEN.vendor_name,STD.*,STR.*');
						$this->db->from('purchase_order as PO');
						$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
						$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
						$this->db->join('store_division as STD', 'STD.division_id = PO.po_store_division_id');
						$this->db->join('store as STR', 'STR.store_id = PO.po_store_id');
						$this->db->where('PO.po_status' ,'active');
			     		$this->db->order_by($sort_order, $sort_by);
						if($search_po_order != '')
						{
							$this->db->like('PO.po_po_no' ,$search_po_order);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name' ,$search_ven_name);
						}
						if($search_div_name != '')
						{
							$this->db->like('STD.division_name' ,$search_div_name);
						}
						if($search_str_name != '')
						{
							$this->db->like('STR.store_name' ,$search_str_name);
						}
						 
						if($search_status != '')
						{
							$this->db->like('PO.po_po_status' ,$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PO.po_trans_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PO.po_trans_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PO.po_trans_date >=', $from_date);
								$this->db->where('PO.po_trans_date <=', $to_date);
							} 
							
						}
						$this->db->limit($limit, $page); 
						$this->db->where('PO.po_po_company_id' ,$sess_company);
						
		  $ret['rows'] = $this->db->get()->result_array();

					 	$this->db->select('count(*) as TotalRows');
						$this->db->from('purchase_order as PO');
						$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
						$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
						$this->db->join('store_division as STD', 'STD.division_id = PO.po_store_division_id');
						$this->db->join('store as STR', 'STR.store_id = PO.po_store_id');
			     		$this->db->order_by('PO.po_po_id', 'DESC');
						if($search_po_order != '')
						{
							$this->db->like('PO.po_po_no' ,$search_po_order);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name' ,$search_ven_name);
						}
						if($search_div_name != '')
						{
							$this->db->like('STD.division_name' ,$search_div_name);
						}
						if($search_str_name != '')
						{
							$this->db->like('STR.store_name' ,$search_str_name);
						}
						 
						if($search_status != '')
						{
							$this->db->like('PO.po_po_status' ,$search_status);
						}
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('PO.po_req_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('PO.po_req_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('PO.po_req_date >=', $from_date);
							$this->db->where('PO.po_req_date <=', $to_date);
							} 
							
						}
						$this->db->where('PO.po_status' ,'active');
						$this->db->where('PO.po_po_company_id' ,$sess_company);		
						$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	//** Get Last Id for PurchaseOrder **//
	
	public function getlastid()
	{
		$ret =  $this->db->select('po_po_no')
						->from('purchase_order')
						->order_by('po_po_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	public function getlast_divisionid($material_store_division_id)
	{
		$ret =  $this->db->select('po_po_no')
						->from('purchase_order as PO')
						->where('PO.po_store_division_id',$material_store_division_id )
						->order_by('po_po_id', 'DESC')
						->limit (1)
						->get()->row();
						
						//echo $this->db->last_query(); 
						
		return $ret;
	}
	
	
	public function getuserdetails($sess_user)
	{
		$ret = $this->db->select('USR.*')
				->from('users as USR')
				->where('USR.user_id',$sess_user )
				->limit(1)
				->get()->row();
		return $ret;
	}
	
	//** Add Purchase Order Details **//
	
	public function add_po_details($podetails)
	{
		$this->db->insert('purchase_order', $podetails);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	//** Purchase Order Recurring Details **//
	
	public function add_po_rec_details($porec_details)
	{
		$this->db->insert('purchase_order_recurring', $porec_details);
		return true;
	}
	
	//** Add Purchase Order Item Details **//
	
	public function add_po_item_details($po_itemdata)
	{
		$this->db->insert('purchase_order_items', $po_itemdata);
		return true;
	}
	
	//** Add Purchase Order Tax Group **//
	
	public function add_tax_group($po_totalgroup)
	{
		$this->db->insert('purchase_order_tax_group', $po_totalgroup);
		return  true;
	}
	
	//** Add Purchase Order Item Total Details **//
	
	public function add_po_total_price($po_totalprice)
	{
		$this->db->insert('purchase_order_total', $po_totalprice);
		return true;
	}
	
	//** Get All Tax Group for Purchase Order **//
	
	public function get_tax_group($id)
	{
		$ret = $this->db->select('PTG.*')
					->from('purchase_order_tax_group as PTG')
					->where('PTG.tax_group_purchase_order_id' ,$id)
					->get()->result_array();
	 	return $ret;  
	}
	
	//** Delete All PurchaseOrder Tax Group Details **//
	
	public function delete_tax_group($id)
	{
		$this->db->where('tax_group_purchase_order_id',$id);
		$this->db->delete('purchase_order_tax_group');
		
		return true;
	  
	}


	//** Update Tax Group **//
	
	public function update_tax_group($tax_group)
	{
		$this->db->insert('purchase_order_tax_group', $tax_group);
		return  true;
	}
	
	public function get_all_carrier()
	{
		
	}
	
	public function getsingle_po($id)
	{
		$this->db->select('PO.*,VEN.*,PA.payment_mode_name,VS.* ,STD.*,STR.*,SC.shipping_carrier_id,SC.shipping_carrier_name');
		$this->db->from('purchase_order as PO');
	 	$this->db->where('po_po_id', $id);
	 	$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
		$this->db->join('vendors_sub_details as VS','VS.ven_sub_det_ven_id = PO.po_vendor_id');
		$this->db->join('payment_mode as PA','PA.payment_mode_id = PO.po_payment_mode');
		$this->db->join('store_division as STD', 'STD.division_id = PO.po_store_division_id');
		$this->db->join('store as STR', 'STR.store_id = PO.po_store_id');
		$this->db->join('shipping_carrier as SC', 'SC.shipping_carrier_id = PO.po_purchase_carrier','left');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	public function getsingle_po_items($id)
	{	
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,PRO.product_name, PRO.product_code, PRO.product_sku, STD.division_name, STR.store_name')
					->from('purchase_order_items as ITMES')
					->where('ITMES.po_items_po_id', $id)
					->join('products as PRO', 'PRO.product_id = ITMES.po_items_item_id')
					->join('purchase_order as PO', 'PO.po_po_id = ITMES.po_items_po_id')
					->join('uom as U', 'U.uom_id = ITMES.po_items_uom_id','left')
					->join('store_division as STD', 'STD.division_id = ITMES.po_items_store_division_id','left')
					->join('store as STR', 'STR.store_id = ITMES.po_items_store_id','left')
					//->join('shipping_carrier as SC', 'SC.shipping_carrier_id = PO.po_purchase_carrier')
					->get()->result_array();
		return $ret;
		
		
	}

	public function getsingle_po_rec($id)
	{
		$this->db->select('*');
		$this->db->from('purchase_order_recurring');
	 	$this->db->where('po_recurring_po_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	public function getsingle_po_total($id)
	{
		$this->db->select('*');
		$this->db->from('purchase_order_total');
	 	$this->db->where('po_total_purchase_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Update Purchase Order Details **//
	
	public function update_po_details($podetails, $id)
	{
		$this->db->where('po_po_id', $id);
		$this->db->update('purchase_order', $podetails);
		return  true;
	}
	
	//** Update Purchase Order Recurring Details **//
	
	public function update_po_rec_details($porec_details, $id)
	{
		$this->db->where('po_recurring_po_id', $id);
		$this->db->update('purchase_order_recurring', $porec_details);
		return  true;
	}
	
	//** Delete Purchaseorder Items In grid View **//
	
	public function delete_po_items($id)
	{
		$this->db->where('po_items_po_id',$id);
		$this->db->delete('purchase_order_items');
	}
	
	//** Update Purchase Order Item Details **//
	
	public function update_po_Item_details($po_itemdata, $id,$item_id)
	{
		$this->db->select('*')
				->from('purchase_order_items')
				->where('po_items_po_id',$id)
				->where('po_items_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('purchase_order_items', $po_itemdata);
		}
		else
		{
			$this->db->where('po_items_po_id', $id);
			$this->db->where('po_items_item_id', $item_id);
			$this->db->update('purchase_order_items', $po_itemdata);
		}
		return true;
	}
	
	//** Update Purchase Order Item Total Details **//
	
	public function update_po_total_price($po_totalprice,$id)
	{
		$this->db->where('po_total_purchase_id', $id);
		$this->db->update('purchase_order_total', $po_totalprice);
		
		return  true;
	}
	
	//** Purchase Order Status **//
	
	public function update_po_status($podata,$id)
	{	
		$this->db->where('po_po_id', $id)
				->update('purchase_order', $podata);
		
		return true;
	}
	
	//** Get All Payment Mode **//
	
	public function get_all_pay_mode()
	{
		$ret = $this->db->select('PM.payment_mode_id, PM.payment_mode_name')
					->from('payment_mode as PM')
					->get()->result_array();			
		return $ret;
	}

public function get_all_pricebook()
	{
		$ret = $this->db->select('PB.*')
					->from('price_book as PB')
					->get()->result_array();			
		return $ret;
	}
	public function getpurchaseorder_for_popup_grid()
	{
		$ret = $this->db->select('PO.*,VEN.vendor_name')
					->from('purchase_order as PO')
					->join('vendors as VEN', 'VEN.vendor_id = PO.po_vendor_id')
					->order_by('po_po_id', 'DESC')
					->where('po_po_status !=','delivered')
					->where('po_po_status !=' ,'cancelled')
					->where('po_po_status !=' ,'closed')
					->limit (10)
					->get()->result_array();
		return $ret;
	}

	public function getpurchase_orderitems($id)
	{
		//$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,P.product_name')
		$ret = $this->db->select('ITMES.*,P.product_name')
					->from('purchase_order_items as ITMES')
					->where('ITMES.po_items_po_id', $id)
					->where('ITMES.po_items_qty !=', '0.00')
					->join('products as P', 'P.product_id = ITMES.po_items_item_id')
					//->join('uom as U', 'U.uom_id = ITMES.po_items_uom_id')
					->get()->result_array();
		return $ret;
	}
	
	//** Get Single Vendor Quatation **//
	
	public function getsinglequotationitem($id)
	{
		$this->db->select('VQ.*,U.uom_name,U.uom_id, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number');
		$this->db->from('vendor_qoute_item as VQ');
	 	$this->db->where('VQ.vquote_vendor_quoute_id', $id);
		$this->db->join('products as PRO', 'PRO.product_id = VQ.vquote_items_item_id');		
		$this->db->join('uom as U', 'U.uom_id = VQ.vquote_items_uom_id');		
		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	//** Change Vendor Quatation Status **//
	
	public function change_vendor_quote_status($VQ_statuschange,$purchse_vdrquo_quote_id)
	{
		$this->db->where('vendor_quote_id', $purchse_vdrquo_quote_id);
		$this->db->update('vendor_quotation', $VQ_statuschange);
		
		return true;
	}
	
	//** Get Single sales Order Items **//
	
	public function getsinglesalesitem($id)
	{
		$this->db->select('SO.*,PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, U.uom_name,U.uom_id, PROP.*');
		$this->db->from('sales_order_items as SO');
	 	$this->db->where('SO.so_items_sales_id', $id);
		$this->db->join('products as PRO', 'PRO.product_id = SO.so_items_item_id');
		$this->db->join('product_price as PROP', 'PROP.product_prd_id = PRO.product_id');
		$this->db->join('uom as U', 'U.uom_id = SO.so_items_uom_id');		
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	//** Get All Product Type **//
	
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
	
	//** Get All Product Group **//
	
	public function get_allproductgroups()
	{
		$ret = $this->db->select('G.products_group_id, G.products_group_name')
					->from('products_groups as G')
					->get()->result_array();
		return $ret;
	}
	
	//** Get All Product Details **//
	
	public function get_allproductsdetails($sess_group,$sess_company,$producttype)
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
					->where('PRO.product_company_id',$sess_company)
					->get()->result_array();
		return $ret;
		}
	}
	
	//** Single Item onchange Item Pop-up **//
	
	public function onchangeitemstype($sess_group,$sess_company,$product_type,$product_group)
	{	
		if($sess_group == 1)
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
		else
		{	
			$this->db->select('PRO.*');
			$this->db->from('products as PRO');
			$this->db->where('PRO.product_status','enable');
			$this->db->where('PRO.product_company_id',$sess_company);
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
	}
	
	//** Get Product Item Details **//
	
	public function getitemdetails($product_item_id, $pricebook_id)
	{
		$productprice = $this->db->select('PRO.product_id,PRO.product_type_id,PRO.product_group_id,PRO.product_name,PRO.product_code,PRO.product_model_number,PRICE.product_mrp,PRICE.product_selling,PRICE.product_cp,PRICE.product_uty_qty,PRICE.product_vat_tax,PRICE.product_gst_tax,PRICE.product_service_tax,PRICE.product_cst_tax,PRICE.product_excise_duty_tax,U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
					->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
					->where('PRO.product_id', $product_item_id)
					->get()->row();
		
		return $productprice;
	}
	
	//** Get Multiple Product Details **//
	
	public function getmultipleproductsdetails($sess_group,$sess_company)
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
						->limit(10)
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
						->where('PRO.product_company_id',$sess_company)
						->limit(10)
						->get()->result_array();
			return $ret;
		}
	
	}
	
	//** Multiple Item Pop-up Search  **//
	
	public function getproductsdetailswithmultiplesearch($sess_group,$sess_company,$product_type,$product_group,$item_code,$item_name, $item_mfg_prtno)
	{
			$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*');
			$this->db->from('products as PRO');
			$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->where('PRO.product_status','enable');
			$this->db->limit(10);
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
				if($item_name != "")
				{
					$this->db->like('PRO.product_name',$item_name);
				}
				if($item_mfg_prtno != "")
				{
					$this->db->like('PRO.product_mfr_part_number',$item_mfg_prtno);
				}
			$ret = $this->db->get()->result_array();
			return $ret;	
	}
	
	//** Get Vendor Details For Pop-up **//
	
	public function getvendors_for_popup_grid()
	{
		$ret = $this->db->select('*')
					->from('vendors')
					->order_by('vendor_id', 'DESC')
					->where('vendor_status' ,'enable')
					->limit(10)
					->get()->result_array();
		return $ret;
	}
	
	//** Get Sales Order Details For Pop-up **//
	
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
						->limit(10)
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
						->where('sales_order_company_id',$sess_company)
						->limit(10)
						->get()->result_array();
			return $ret;
		}
	}
	
	//** Get Material Request Details For Pop-up **//
	
	public function getmetrialrequest_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('*')
						->from('meterial_request')
						->order_by('met_id', 'DESC')
						->where('met_status' ,'active')
						->limit(10)
						->get()->result_array();
			return $ret;
		}
		else
		{
			$ret = $this->db->select('*')
						->from('meterial_request')
						->order_by('met_id', 'DESC')
						->where('met_status' ,'active')
						->where('met_requestion_company_id',$sess_company)
						->limit(10)
						->get()->result_array();
			return $ret;
		}
	}
	
	//** Search Vendor **//
	
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
				$this->db->where('vendor_name',$vendor_name);
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
	
	//** Search Material Request **//
	
	public function getmaterialrequestwithsearch($mr_code,$mr_type)
	{
		$this->db->select('*');
		$this->db->from('meterial_request');
		$this->db->where('met_req_status !=' ,'cancelled');
		$this->db->where('met_req_status !=' ,'delivered');
		$this->db->where('met_status' ,'active');
			if($mr_code != "")
			{
				$this->db->like('met_requestion_no',$mr_code);
			}
			if($mr_type != "")
			{
				$this->db->like('met_requestion_type',$mr_type);
			}
		$ret = $this->db->get()->result_array();
		return $ret;
	}
	
	//** Search Sales Order **//
	
	public function getsalesorderwithsearch($so_code,$customer_name)
	{
		$this->db->select('*');
		$this->db->from('sales_order');
		$this->db->where('sales_order_status !=' ,'cancelled');
		$this->db->where('sales_order_status !=' ,'delivered');
		$this->db->where('sales_order_active_status' ,'active');
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
	
	
	
}
?>