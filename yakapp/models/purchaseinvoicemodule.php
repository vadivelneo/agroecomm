<?php
Class Purchaseinvoicemodule extends CI_Model
{	
	//** Get Prefix Value **//

	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Get Last Id of PO Invoice **//
	
	public function getlastid()
	{
		$ret =  $this->db->select('po_invoice_number')
						->from('purchase_invoice')
						->order_by('po_invoice_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
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
	
	//** Add PO Invoice DEtails **//
	
	public function add_po_invoice($po_data)
	{
		$this->db->insert('purchase_invoice', $po_data);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;	
	}
	
	//** Update PO Invoice Billing DEtails **//	
	
	public function add_po_billing($po_billing_data,$ven_id)
	{
		$this->db->where('ven_sub_det_ven_id', $ven_id);
		$this->db->update('vendors_sub_details', $po_billing_data);
		return  true;
	}
	
	//** Update PO Invoice Shipping DEtails **//
	
	public function add_po_shipping($po_ship_data,$ven_id)
	{
		$this->db->where('vendor_shipping_vendor_id', $ven_id);
		$this->db->update('vendor_shipping_address', $po_ship_data);
		return true;	
	}
	
	//** Add PO Invoice Item Details **//
	
	public function add_po_items($po_invoice_item)
	{
		$this->db->insert('purchase_invoice_items', $po_invoice_item);
		return true;	
	}
	
	//** Add PO Invoice Tax Group **//
	
	public function add_tax_group($po_totalgroup)
	{
		$this->db->insert('purchase_invoice_tax_group', $po_totalgroup);
		return  true;
	}
	
	//** Get All Tax Group for Purchase invoice **//
	
	public function get_tax_group($id)
	{
		$ret = $this->db->select('PTG.*')
					->from('purchase_invoice_tax_group as PTG')
					->where('PTG.tax_group_purchase_invoice_id' ,$id)
					->get()->result_array();
	 	return $ret;  
	}
	
	//** Delete All PurchaseOrder Tax Group Details **//
	
	public function delete_tax_group($id)
	{
		$this->db->where('tax_group_purchase_invoice_id',$id);
		$this->db->delete('purchase_invoice_tax_group');
		
		return true;
	  
	}


	//** Update Tax Group **//
	
	public function update_tax_group($tax_group)
	{
		$this->db->insert('purchase_invoice_tax_group', $tax_group);
		return  true;
	}
	
	public function add_po_total($po_total_data)
	{
		$this->db->insert('purchase_invoice_total', $po_total_data);
		return true;
		
	}
	
	
	public function get_po_invoice($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
								->from('purchase_invoice as PIN')
								->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
								->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
								->where('PIN.po_invoice_active_status', 'active')
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();

			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_invoice as PIN')
								->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
								->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
								->where('PIN.po_invoice_active_status', 'active')
								->order_by($sort_order, $sort_by)
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
		 	$ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
								->from('purchase_invoice as PIN')
								->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
								->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
								->where('PIN.po_invoice_active_status', 'active')
								->where('PIN.po_invoice_company_id',$sess_company)
								->order_by($sort_order, $sort_by)
								->limit($limit, $start)
								->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_invoice as PIN')
								->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
								->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
								->where('PIN.po_invoice_active_status', 'active')
								->where('PIN.po_invoice_company_id',$sess_company)
								->order_by($sort_order, $sort_by)
								->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	//** Search PO Invoice **//
	
	public function get_search_po_invoice($sess_company,$sess_group,$search_inv_no,$search_ven_name,$search_amount,$search_status,$limit,$page,$sort_order,$sort_by,$search_mrec,$search_po,$from_date,$to_date)
	{
		if($sess_group == 1)
		{
			 
			$this->db->select('PIN.*,VEN.vendor_name,PINT.*');
			$this->db->from('purchase_invoice as PIN');
			$this->db->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id');
			$this->db->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id');
				
				if($search_inv_no != '')
				{
					$this->db->or_like('PIN.po_invoice_number' ,$search_inv_no);
				}
				if($search_ven_name != '')
				{
					$this->db->or_like('VEN.vendor_name' ,$search_ven_name);
				}
				 
				
				if($search_mrec != '')
				{
				$this->db->like('PIN.po_invoice_po_indent_reference_number',$search_mrec);
				}
				
				if($search_po != '')
				{
				$this->db->like('PIN.po_invoice_po_reference_number',$search_po);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('PIN.po_invoice_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('PIN.po_invoice_date >=', $from_date);
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					} 
					
				}		
				 
				if($search_status != '')
				{
					$this->db->or_like('PIN.po_invoice_status' ,$search_status);
				}
			$this->db->where('PIN.po_invoice_active_status', 'active');
			$this->db->limit($limit, $page);
				$this->db->order_by($sort_order, $sort_by);
			$ret['rows'] = $this->db->get()->result_array();
			
			$this->db->select('count(*) as TotalRows');
			$this->db->from('purchase_invoice as PIN');
			$this->db->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id');
			$this->db->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id');
				if($search_inv_no != '')
				{
					$this->db->or_like('PIN.po_invoice_number' ,$search_inv_no);
				}
				if($search_ven_name != '')
				{
					$this->db->or_like('VEN.vendor_name' ,$search_ven_name);
				}
				 
				if($search_status != '')
				{
					$this->db->or_like('PIN.po_invoice_status' ,$search_status);
				}
				if($search_mrec != '')
				{
				$this->db->like('PIN.po_invoice_po_indent_reference_number',$search_mrec);
				}
				if($search_po != '')
				{
				$this->db->like('PIN.po_invoice_po_reference_number',$search_po);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('PIN.po_invoice_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('PIN.po_invoice_date >=', $from_date);
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					} 
					
				}		
			$this->db->where('PIN.po_invoice_active_status', 'active');
			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
			$this->db->select('PIN.*,VEN.vendor_name,PINT.*');
			$this->db->from('purchase_invoice as PIN');
			$this->db->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id');
			$this->db->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id');
			$this->db->order_by($sort_order, $sort_by);
				if($search_inv_no != '')
				{
					$this->db->or_like('PIN.po_invoice_number' ,$search_inv_no);
				}
				if($search_ven_name != '')
				{
					$this->db->or_like('VEN.vendor_name' ,$search_ven_name);
				}
			 
				if($search_status != '')
				{
					$this->db->or_like('PIN.po_invoice_status' ,$search_status);
				}
				if($search_mrec != '')
				{
				$this->db->like('PIN.po_invoice_po_indent_reference_number',$search_mrec);
				}
				if($search_po != '')
				{
				$this->db->like('PIN.po_invoice_po_reference_number',$search_po);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('PIN.po_invoice_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('PIN.po_invoice_date >=', $from_date);
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					} 
					
				}		
			$this->db->where('PIN.po_invoice_active_status', 'active');
 			$this->db->limit($limit, $page);
			$ret['rows'] = $this->db->get()->result_array();

			$this->db->select('count(*) as TotalRows');
			$this->db->from('purchase_invoice as PIN');
			$this->db->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id');
			$this->db->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id');
			$this->db->order_by($sort_order, $sort_by);
				if($search_inv_no != '')
				{
					$this->db->or_like('PIN.po_invoice_number' ,$search_inv_no);
				}
				if($search_ven_name != '')
				{
					$this->db->or_like('VEN.vendor_name' ,$search_ven_name);
				}
				 
				if($search_status != '')
				{
					$this->db->or_like('PIN.po_invoice_status' ,$search_status);
				}
				if($search_mrec != '')
				{
				$this->db->like('PIN.po_invoice_po_indent_reference_number',$search_mrec);
				}
				if($search_po != '')
				{
				$this->db->like('PIN.po_invoice_po_reference_number',$search_po);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('PIN.po_invoice_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('PIN.po_invoice_date >=', $from_date);
					$this->db->where('PIN.po_invoice_date <=', $to_date);
					} 
					
				}		
				
			$this->db->where('PIN.po_invoice_active_status', 'active');
 			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	public function get_single_invoice($id)
	{
		$this->db->select('PI.*,VEN.*,SHIP.shipping_carrier_name,');
		$this->db->from('purchase_invoice as PI');
	 	$this->db->where('po_invoice_id', $id);
	 	$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_invoice_vendor_id');
	 	$this->db->join('shipping_carrier as SHIP', 'SHIP.shipping_carrier_id = PI.po_invoice_carrier_id');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	public function get_bill_address($id) 
	{
		$this->db->select('*');
		$this->db->from('vendors_sub_details');
	 	$this->db->where('ven_sub_det_ven_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	public function get_shipp_invoice($id) 
	{
		$this->db->select('*');
		$this->db->from('vendor_shipping_address');
	 	$this->db->where('vendor_shipping_vendor_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	public function get_item_invoice($id) 
	{
		$this->db->select('PIT.*,U.uom_name,U.uom_id,P.product_name, P.product_code, P.product_mfr_part_number ');
		$this->db->from('purchase_invoice_items as PIT');
		$this->db->join('products as P', 'P.product_id = PIT.po_invoice_items_item_id');
		$this->db->join('uom as U', 'U.uom_id = PIT.po_invoice_items_uom_id');
	 	$this->db->where('po_invoice_items_inovice_id', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	
		
	
	public function get_item_total($id)
	{
		$this->db->select('*');
		$this->db->from('purchase_invoice_total');
	 	$this->db->where('po_invoice_total_invoice_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function update_po_invoice($po_data,$id)
	{
		$this->db->where('po_invoice_id', $id);
		$this->db->update('purchase_invoice', $po_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	public function update_po_billing($po_billing_data,$id)
	{
		$this->db->where('po_invoice_billing_invoice_id', $id);
		$this->db->update('purchase_invoice_billing_address', $po_billing_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	public function update_po_shipping($po_ship_data,$id)
	{
		$this->db->where('po_invoice_shipping_invoice_id', $id);
		$this->db->update('purchase_invoice_shipping_address', $po_ship_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	
	public function update_po_items($po_invoice_item,$id,$item_id)
	{
		$this->db->select('*')
				->from('purchase_invoice_items')
				->where('po_invoice_items_inovice_id',$id)
				->where('po_invoice_items_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('vendor_qoute_item', $qouteitems);
		}
		{
			$this->db->where('po_invoice_items_inovice_id', $id);
			$this->db->where('po_invoice_items_item_id', $item_id);
			$this->db->update('purchase_invoice_items', $po_invoice_item);
		}
		//echo $this->db->last_query(); exit;
		return true;
			
	}
	
	public function update_po_total($po_total_data,$id)
	{
		$this->db->where('po_invoice_total_invoice_id', $id);
		$this->db->update('purchase_invoice_total', $po_total_data);
		// echo $this->db->last_query(); exit;
		return  true;
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
	public function delete_po_invoice($po_invoice_del,$id)
	{	
		$this->db->where('po_invoice_id', $id)
				->update('purchase_invoice', $po_invoice_del);
		//echo $this->db->last_query(); exit;
		return true;
	}
	
	public function getpurchase_orderitems($po_id)
	{
		
		$result = $this->db->select('ITEMS.po_items_item_id, ITEMS.po_items_code, ITEMS.po_items_name, ITEMS.po_items_model, ITEMS.po_items_uom_id, ITEMS.po_items_qty, ITEMS.po_items_ord_qty, ITEMS.po_items_priceperunit, ITEMS.po_items_gross_amount, ITEMS.po_items_tax_percent,ITEMS.po_items_tax_amount, ITEMS.po_items_excise_percent, ITEMS.po_items_excise_amount, ITEMS.po_items_discounts_percentage, ITEMS.po_items_discounts_amount, ITEMS.po_items_net_amount,ITEMS.po_items_hsn_sac, U.uom_id, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number')	
					->from('purchase_order_items as ITEMS')
					->where('ITEMS.po_items_po_id', $po_id)
					->join('products as PRO', 'PRO.product_id = ITEMS.po_items_item_id')
					->join('uom as U', 'U.uom_id = ITEMS.po_items_uom_id')
					->get()->result_array();
			
		
		
		
		return $result;
		
	}
	
	
	public function getpurchase_indentitems($po_id, $po_ind_id)
	{
		
		$indent = $this->db->select('IND.po_indent_id, IND.po_indent_number, IND.po_indent_company_id, IND.po_indent_vendor_id, IND.po_purchase_order_id, IND_ITEMS.po_indent_item_item_id, IND_ITEMS.po_indent_received_qty ,IND_ITEMS.po_indent_item_batch_no ,IND_ITEMS.po_indent_item_expiry_date, IND_ITEMS.po_indent_item_pack_size')	
					->from('purchase_indent as IND')
					->where('IND.po_indent_id', $po_ind_id)
					->join('purchase_indent_items as IND_ITEMS', 'IND_ITEMS.po_indent_item_indent_id = IND.po_indent_id')
					->get()->result_array();
			
		
		
		$result = array();
		$i=0;
		
		foreach($indent as $INV)
		{
			$purchase_order_itmes = $this->db->select('ITEMS.po_items_item_id, ITEMS.po_items_code, ITEMS.po_items_name, ITEMS.po_items_model, ITEMS.po_items_uom_id, ITEMS.po_items_qty, ITEMS.po_items_ord_qty, ITEMS.po_items_priceperunit, ITEMS.po_items_gross_amount, ITEMS.po_items_tax_percent, ITEMS.po_items_tax_amount,ITEMS.po_batch_no,ITEMS.po_expiry_date, ITEMS.po_items_discounts_percentage, ITEMS.po_items_discounts_amount, ITEMS.po_items_net_amount, U.uom_id, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number,ITEMS.po_items_hsn_sac,ITEMS.po_items_excise_percent,ITEMS.po_items_excise_amount')	
					->from('purchase_order_items as ITEMS')
					->where('ITEMS.po_items_po_id', $INV['po_purchase_order_id'])
					->where('ITEMS.po_items_item_id', $INV['po_indent_item_item_id'])
					->join('products as PRO', 'PRO.product_id = ITEMS.po_items_item_id')
					->join('uom as U', 'U.uom_id = ITEMS.po_items_uom_id')
					->get()->row();
				
			$result[$i]['po_purchase_order_id'] = $INV['po_purchase_order_id'];
			$result[$i]['po_indent_vendor_id'] = $INV['po_indent_vendor_id'];
			$result[$i]['po_indent_number'] = $INV['po_indent_number'];
			$result[$i]['po_indent_id'] = $INV['po_indent_id'];
			$result[$i]['po_indent_received_qty'] = $INV['po_indent_received_qty'];
			$result[$i]['po_indent_item_item_id'] = $INV['po_indent_item_item_id'];
			$result[$i]['po_indent_item_batch_no'] = $INV['po_indent_item_batch_no'];
			$result[$i]['po_indent_item_expiry_date'] = $INV['po_indent_item_expiry_date'];
			$result[$i]['po_indent_item_pack_size'] = $INV['po_indent_item_pack_size'];
			
						
			$result[$i]['product_id'] = $purchase_order_itmes->po_items_item_id;
			$result[$i]['product_code'] = $purchase_order_itmes->product_code;
			$result[$i]['product_name'] = $purchase_order_itmes->product_name;
			$result[$i]['po_items_hsn_sac'] = $purchase_order_itmes->po_items_hsn_sac;
			$result[$i]['po_batch_no'] = $purchase_order_itmes->po_batch_no;
			$result[$i]['po_expiry_date'] = $purchase_order_itmes->po_expiry_date;
			$result[$i]['product_mfr_part_number'] = $purchase_order_itmes->product_mfr_part_number;
			$result[$i]['po_items_uom_id'] = $purchase_order_itmes->po_items_uom_id;
			$result[$i]['po_items_qty'] = $purchase_order_itmes->po_items_qty;
			$result[$i]['po_items_ord_qty'] = $purchase_order_itmes->po_items_ord_qty;
			$result[$i]['po_items_priceperunit'] = $purchase_order_itmes->po_items_priceperunit;
			$result[$i]['so_items_gross_amount'] = $purchase_order_itmes->po_items_gross_amount;
			$result[$i]['po_items_tax_percent'] = $purchase_order_itmes->po_items_tax_percent;
			$result[$i]['po_items_excise_percent'] = $purchase_order_itmes->po_items_excise_percent;
			$result[$i]['po_items_tax_amount'] = $purchase_order_itmes->po_items_tax_amount;
			$result[$i]['po_items_excise_amount'] = $purchase_order_itmes->po_items_excise_amount;
			$result[$i]['po_items_discounts_percentage'] = $purchase_order_itmes->po_items_discounts_percentage;
			$result[$i]['po_items_discounts_amount'] = $purchase_order_itmes->po_items_discounts_amount;
			$result[$i]['po_items_net_amount'] = $purchase_order_itmes->po_items_net_amount;
			$result[$i]['uom_id'] = $purchase_order_itmes->uom_id;
			$result[$i]['uom_name'] = $purchase_order_itmes->uom_name;
			
			$i++;
		}
		
		return $result;
		
	}
	
	
	public function getpurchase_order_total($id)
	{
		$ret = $this->db->select('total.*')
					->from('purchase_order_total as total')
					->where('total.po_total_purchase_id', $id)
					->get()->row();
		return $ret;
	}

	public function getpurchase_id($po_code) 
	{
		$this->db->select('*');
		$this->db->from('purchase_order');
	 	$this->db->where('po_po_no', $po_code);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	 public function get_pending_qty($po_ind_id)
	{
		$this->db->select('*');
		$this->db->from('purchase_indent_items');
	 	$this->db->where('po_indent_item_indent_id', $po_ind_id);
		$query = $this->db->get()->result_array();
	 	//echo $this->db->last_query(); exit;
		return $query;
	}
	 
	public function getven_bill_det($ven_id)
	{
		$ret = $this->db->select('VEND.*, ST.*, CTRY.*, CTY.*,VEN.*')
					->from('vendors_sub_details as VEND')
					->join('country AS CTRY','CTRY.country_id = VEND.vendor_country')
					->join('state AS ST','ST.state_id = VEND.vendor_state')
					->join('city AS CTY','CTY.city_id = VEND.vendor_city')				 
					 ->join('vendors AS VEN','VEN.vendor_id = VEND.ven_sub_det_ven_id')
					->where('VEND.ven_sub_det_ven_id' ,$ven_id)
					->get()->row();
		return $ret;
	}

	public function getven_ship_det($ven_id)
	{
		$ret = $this->db->select('VEND.*, ST.*, CTRY.*, CTY.*,VEN.*')
					->from('vendor_shipping_address as VEND')
					->join('country AS CTRY','CTRY.country_id = VEND.vendor_shipping_country_id')
					->join('state AS ST','ST.state_id = VEND.vendor_shipping_state_id')
					->join('city AS CTY','CTY.city_id = VEND.vendor_shipping_city_id')				 
					->join('vendors AS VEN','VEN.vendor_id = VEND.vendor_shipping_vendor_id') 
					->where('VEND.vendor_shipping_vendor_id' ,$ven_id)
					->get()->row();
		return $ret;
	}

	public function get_ven_namee($ven_id)
	{	
		$this->db->select('*');
		$this->db->from('vendors');
	 	$this->db->where('vendor_id', $ven_id);
		$query = $this->db->get()->row();
		return $query;
	 
	}
	
		public function change_pur_ind_status($PI_statuschange,$purchase_indent_id)
	{
		
		$this->db->where('po_indent_id', $purchase_indent_id);
		$this->db->update('purchase_indent', $PI_statuschange);
		
		return true;

	}
	public function change_pur_ind_status_aftappro($PI_statuschange,$purchase_invo_po_ind_no)
	{
		
		$this->db->where('po_indent_number', $purchase_invo_po_ind_no);
		$this->db->update('purchase_indent', $PI_statuschange);
		
		return true;

	}
	
	public function change_purchase_order_status($PO_statuschange,$poindent_po_oder_id)
	{
		
		$this->db->where('po_po_id', $poindent_po_oder_id);
		$this->db->update('purchase_order', $PO_statuschange);
		
		return true;

	}
	
	public function getpurchaseordersearch($po_code,$vendor_name,$sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('PO.*,VEN.vendor_name');
					$this->db->from('purchase_order as PO');
					$this->db->join('vendors as VEN', 'VEN.vendor_id = PO.po_vendor_id');
					$this->db->order_by('po_po_id', 'DESC');
					$this->db->where('po_po_status !=','delivered');
					$this->db->where('po_po_status !=','onprocess');
					$this->db->where('po_po_status !=','awaiting approval');
					$this->db->where('po_po_status !=' ,'cancelled');
					$this->db->where('po_po_status !=' ,'closed');
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
			$ret = $this->db->select('PO.*,VEN.vendor_name');
					$this->db->from('purchase_order as PO');
					$this->db->join('vendors as VEN', 'VEN.vendor_id = PO.po_vendor_id');
					$this->db->order_by('po_po_id', 'DESC');
					$this->db->where('po_po_status !=','delivered');
					$this->db->where('po_po_status !=','onprocess');
					$this->db->where('po_po_status !=','awaiting approval');
					$this->db->where('po_po_status !=' ,'cancelled');
					$this->db->where('po_po_status !=' ,'closed');
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
	
	public function getpurchaseindentsearch($po_indent_code,$vendor_name,$sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('PIN.*,VEN.vendor_name');
					$this->db->from('purchase_indent as PIN');
					$this->db->join('vendors as VEN', 'VEN.vendor_id = PIN.po_indent_vendor_id');
					$this->db->order_by('po_indent_id', 'DESC');
					$this->db->where('po_indent_status' ,'enable');
					$this->db->where('po_indent_active_status' ,'approved');
					$this->db->limit (10);
					if($po_indent_code != "")
		{
			$this->db->like('PIN.po_indent_number',$po_indent_code);
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
			$ret = $this->db->select('PIN.*,VEN.vendor_name');
					$this->db->from('purchase_indent as PIN');
					$this->db->join('vendors as VEN', 'VEN.vendor_id = PIN.po_indent_vendor_id');
					$this->db->order_by('po_indent_id', 'DESC');
					$this->db->where('po_indent_status' ,'enable');
					$this->db->where('po_indent_active_status' ,'approved');
					$this->db->where('po_indent_company_id',$sess_company);
					$this->db->limit (10);
					if($po_indent_code != "")
		{
			$this->db->like('PIN.po_indent_number',$po_indent_code);
		}
		if($vendor_name != "")
		{
			$this->db->like('VEN.vendor_name',$vendor_name);
		}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
	
		
		
	}

	public function add_po_payment_details($po_payment_details)
	{
		$this->db->insert('payment_payment_details', $po_payment_details);
		return true;
	}
	
	public function get_ven_accounts($ven_id)
	{	
	
		$ret=$this->db->select('*')
				->from('vendors_accounts')
				->where('vendors_accounts_vendor_id',$ven_id)
				->get()->row();
		
		return $ret;
	
	}
	
	public function add_po_vendor_accounts_details($po_vendor_accounts_details)
	{
		$this->db->insert('vendors_accounts', $po_vendor_accounts_details);
		return true;
	}
	
	public function update_po_vendor_accounts_details($po_vendor_accounts_details,$ven_id)
	{	
		$this->db->where('vendors_accounts_vendor_id', $ven_id);
		$this->db->update('vendors_accounts', $po_vendor_accounts_details);
		// echo $this->db->last_query(); exit;
		return  true;
	}
	
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

	public function getpurchaseorder_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('PO.*,VEN.vendor_name')
					->from('purchase_order as PO')
					->join('vendors as VEN', 'VEN.vendor_id = PO.po_vendor_id')
					->order_by('po_po_id', 'DESC')
					->where('po_po_status !=','delivered')
					->where('po_po_status !=','onprocess')
					->where('po_po_status !=','awaiting approval')
					->where('po_po_status !=' ,'cancelled')
					->where('po_po_status !=' ,'closed')
					->limit (10)
					->get()->result_array();
		return $ret;
		}
		else
		{
			$ret = $this->db->select('PO.*,VEN.vendor_name')
					->from('purchase_order as PO')
					->join('vendors as VEN', 'VEN.vendor_id = PO.po_vendor_id')
					->order_by('po_po_id', 'DESC')
					->where('po_po_status !=','delivered')
					->where('po_po_status !=','onprocess')
					->where('po_po_status !=','awaiting approval')
					->where('po_po_status !=' ,'cancelled')
					->where('po_po_status !=' ,'closed')
					->where('po_po_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
		return $ret;
		}
	}
	
	public function getpurchaseindent_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('PIN.*,VEN.vendor_name')
					->from('purchase_indent as PIN')
					->join('vendors as VEN', 'VEN.vendor_id = PIN.po_indent_vendor_id')
					->order_by('po_indent_id', 'DESC')
					->where('po_indent_status' ,'enable')
					->where('po_indent_active_status' ,'approved')
					->limit (10)
					->get()->result_array();
		return $ret;
		}
		else
		{
			$ret = $this->db->select('PIN.*,VEN.vendor_name')
					->from('purchase_indent as PIN')
					->join('vendors as VEN', 'VEN.vendor_id = PIN.po_indent_vendor_id')
					->order_by('po_indent_id', 'DESC')
					->where('po_indent_status' ,'enable')
					->where('po_indent_active_status' ,'approved')
					->where('po_indent_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
		return $ret;
		}
	}
	
	///////////Inventory Updation Starts Here
	
	//** Check Its Valid Stock In Inventry **//
	
	public function vaild_stock_item($item_id)
	{
		$this->db->select('*')
				->from('inventory')
				->where('inventory_item_id', $item_id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get stock item from inventry **//
	
	public function get_stock_item($item_id)
	{
		$ret = $this->db->select('inventory_qty')
					->from('inventory')
					->where('inventory_item_id', $item_id)
					->get()->row();		
		return $ret;
	}
	
	//** Update stock  in Inventry **//
	
	public function	update_stock($stock_up_data,$item_id)
	{
		$this->db->where('inventory_item_id', $item_id);
		$this->db->update('inventory', $stock_up_data);
		return  true;
	}
	
	//** Add Stock Details In Inventry **//
	
	public function add_stock_item_details($stock_data)
	{
		$this->db->insert('inventory', $stock_data);
		return true;	
	}
	
	///////////Inventory Updation Closes Here
	
}