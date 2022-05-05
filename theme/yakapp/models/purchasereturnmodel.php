<?php

Class Purchasereturnmodel extends CI_Model
{
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	public function getlastid()
	{
		$ret =  $this->db->select('purchase_return_code')
						->from('purchase_return')
						->order_by('purchase_return_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
 
  	public function get_all_purchase_Return($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('PR.*,VEN.vendor_name,VEN.vendor_code,PI.po_invoice_id, PI.po_invoice_number,LOC.location_id,LOC.location_name')
								->from('purchase_return as PR')
								->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id')
								->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id')
								->join('location as LOC','LOC.location_id = PR.purchase_return_location_id')
								->where('purchase_return_active_status','active')
								->order_by($sort_order,$sort_by)
								->limit($limit, $start)
								->get()->result_array();


			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_return as PR')
								->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id')
								->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id')
								->join('location as LOC','LOC.location_id = PR.purchase_return_location_id')
								->where('purchase_return_active_status','active')
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;

				//return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('PR.*,VEN.vendor_name,VEN.vendor_code,PI.po_invoice_id, PI.po_invoice_number,LOC.location_id,LOC.location_name')
							->from('purchase_return as PR')
							->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id')
							->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id')
							->join('location as LOC','LOC.location_id = PR.purchase_return_location_id')
							->where('PR.purchase_return_company_id',$sess_company)
							->where('PR.purchase_return_active_status','active')
							->order_by($sort_order,$sort_by)
							->limit($limit, $start)
							->get()->result_array();
							
			
			$Count = $this->db->select('count(*) as TotalRows')
								->from('purchase_return as PR')
								->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id')
								->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id')
								->join('location as LOC','LOC.location_id = PR.purchase_return_location_id')
								->where('purchase_return_active_status','active')
								->where('purchase_return_company_id',$sess_company)
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
		}
		
		
		 
		return $ret;
	}
	
	
	/*serach PR retuen */
	
	
	
	
	
	public function get_search_po_return($sess_company,$sess_group,$search_ret_nos,$search_ven_name,$search_pi,$search_status,$limit,$page,$sort_order,$sort_by,$from_date,$to_date)
	{
		if($sess_group == 1)
		{
			//echo $sort_order;exit;
			$this->db->select('PR.*,VEN.vendor_name,VEN.vendor_code,PI.po_invoice_id, PI.po_invoice_number,LOC.location_id,LOC.location_name');
			$this->db->from('purchase_return as PR');
			$this->db->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id');
			$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id');
			$this->db->join('location as LOC','LOC.location_id = PR.purchase_return_location_id');
			$this->db->where('PR.purchase_return_company_id',$sess_company);
			$this->db->order_by($sort_order, $sort_by);
			
			 if($search_ret_nos != '')
			  {
				  $this->db->or_like('PR.purchase_return_code' ,$search_ret_nos);
			  }
			  if($search_ven_name != '')
			  {
				  $this->db->or_like('VEN.vendor_name' ,$search_ven_name);
			  }
			  if($search_pi != '')
			  {
				  $this->db->or_like('PI.po_invoice_number' ,$search_pi);
			  }
			  
		   
			  if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			  {	
				  if($from_date != '' && $to_date == "1970-01-01")
				  {
				  $this->db->where('PR.purchase_return_date >=', $from_date);
				  }
				  if($from_date == "1970-01-01"  && $to_date != '' )
				  {
				  $this->db->where('PR.purchase_return_date <=', $to_date);
				  }
				  if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				  {
					$this->db->where('PR.purchase_return_date >=', $from_date);
				  	$this->db->where('PR.purchase_return_date <=', $to_date);
				  } 
				  
			  }		
				 
				if($search_status != '')
				{
					$this->db->or_like('PR.purchase_return_status' ,$search_status);
				}
				 
				$this->db->limit($limit, $page);
				$ret['rows'] = $this->db->get()->result_array();
		// echo $this->db->last_query();exit;
				$this->db->select('count(*) as TotalRows');
				$this->db->from('purchase_return as PR');
				$this->db->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id');
				$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id');
				$this->db->join('location as LOC','LOC.location_id = PR.purchase_return_location_id');
				$this->db->where('PR.purchase_return_company_id',$sess_company);
				$this->db->order_by($sort_order, $sort_by);
			
				 if($search_ret_nos != '')
			  {
				  $this->db->or_like('PR.purchase_return_code' ,$search_ret_nos);
			  }
			  if($search_ven_name != '')
			  {
				  $this->db->or_like('VEN.vendor_name' ,$search_ven_name);
			  }
			  if($search_pi != '')
			  {
				  $this->db->or_like('PI.po_invoice_number' ,$search_pi);
			  }
			  
		   
			  if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			  {	
				  if($from_date != '' && $to_date == "1970-01-01")
				  {
				  $this->db->where('PR.purchase_return_date >=', $from_date);
				  }
				  if($from_date == "1970-01-01"  && $to_date != '' )
				  {
				  $this->db->where('PR.purchase_return_date <=', $to_date);
				  }
				  if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				  {
					$this->db->where('PR.purchase_return_date >=', $from_date);
				  	$this->db->where('PR.purchase_return_date <=', $to_date);
				  } 
				  
			  }		
				 
				if($search_status != '')
				{
					$this->db->or_like('PR.purchase_return_status' ,$search_status);
				}
			 
			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		 else
		 {
			 $this->db->select('PR.*,VEN.vendor_name,VEN.vendor_code,PI.po_invoice_id, PI.po_invoice_number,LOC.location_id,LOC.location_name');
			$this->db->from('purchase_return as PR');
			$this->db->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id');
			$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id');
			$this->db->join('location as LOC','LOC.location_id = PR.purchase_return_location_id');
			 
			$this->db->order_by($sort_order, $sort_by);
			
			 if($search_ret_nos != '')
			  {
				  $this->db->or_like('PR.purchase_return_code' ,$search_ret_nos);
			  }
			  if($search_ven_name != '')
			  {
				  $this->db->or_like('VEN.vendor_name' ,$search_ven_name);
			  }
			  if($search_pi != '')
			  {
				  $this->db->or_like('PI.po_invoice_number' ,$search_pi);
			  }
			  
		   
			  if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			  {	
				  if($from_date != '' && $to_date == "1970-01-01")
				  {
				  $this->db->where('PR.purchase_return_date >=', $from_date);
				  }
				  if($from_date == "1970-01-01"  && $to_date != '' )
				  {
				  $this->db->where('PR.purchase_return_date <=', $to_date);
				  }
				  if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				  {
					$this->db->where('PR.purchase_return_date >=', $from_date);
				  	$this->db->where('PR.purchase_return_date <=', $to_date);
				  } 
				  
			  }		
				 
				if($search_status != '')
				{
					$this->db->or_like('PR.purchase_return_status' ,$search_status);
				}
				 
				$this->db->limit($limit, $page);
				$ret['rows'] = $this->db->get()->result_array();
		// echo $this->db->last_query();exit;
				$this->db->select('count(*) as TotalRows');
				$this->db->from('purchase_return as PR');
				$this->db->join('vendors as VEN','VEN.vendor_id = PR.purchase_return_customer_id');
				$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id');
				$this->db->join('location as LOC','LOC.location_id = PR.purchase_return_location_id');
				$this->db->where('PR.purchase_return_company_id',$sess_company);
				$this->db->order_by($sort_order, $sort_by);
			
				 if($search_ret_nos != '')
			  {
				  $this->db->or_like('PR.purchase_return_code' ,$search_ret_nos);
			  }
			  if($search_ven_name != '')
			  {
				  $this->db->or_like('VEN.vendor_name' ,$search_ven_name);
			  }
			  if($search_pi != '')
			  {
				  $this->db->or_like('PI.po_invoice_number' ,$search_pi);
			  }
			  
		   
			  if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			  {	
				  if($from_date != '' && $to_date == "1970-01-01")
				  {
				  $this->db->where('PR.purchase_return_date >=', $from_date);
				  }
				  if($from_date == "1970-01-01"  && $to_date != '' )
				  {
				  $this->db->where('PR.purchase_return_date <=', $to_date);
				  }
				  if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				  {
					$this->db->where('PR.purchase_return_date >=', $from_date);
				  	$this->db->where('PR.purchase_return_date <=', $to_date);
				  } 
				  
			  }		
				 
				if($search_status != '')
				{
					$this->db->or_like('PR.purchase_return_status' ,$search_status);
				}
			 
			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
			 
		 }
	}
	
	
	public function invoice_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('PI.po_invoice_id, PI.po_invoice_number, PI.po_invoice_company_id,  PI.po_invoice_vendor_id,PI.po_invoice_date, VEN.vendor_id,VEN.vendor_name,VEN.vendor_code,')
					->from('purchase_invoice as PI')
					->join('vendors as VEN','VEN.vendor_id = PI.po_invoice_vendor_id')
					->order_by('po_invoice_id', 'DESC')
					->where('po_invoice_active_status' ,'active')
					->where('po_invoice_status !=' ,'returned')
					->limit (10)
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('PI.po_invoice_id, PI.po_invoice_number, PI.po_invoice_company_id,  PI.po_invoice_vendor_id,PI.po_invoice_date, VEN.vendor_id,VEN.vendor_name,VEN.vendor_code,')
					->from('purchase_invoice as PI')
					->join('vendors as VEN','VEN.vendor_id = PI.po_invoice_vendor_id')
					->order_by('po_invoice_id', 'DESC')
					->where('po_invoice_active_status' ,'active')
					->where('po_invoice_status !=' ,'returned')

					->where('po_invoice_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
		return $ret;
		}
	}
	
		public function get_inv_items($inv_id)
	{
		
		$ret = $this->db->select('PI.po_invoice_number,PI.po_invoice_company_id, PI.po_invoice_date, PI.po_invoice_contact_number, PI_ITEMS.*, PRO.product_id, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, UOM.uom_name, UOM.uom_id')	
					->from('purchase_invoice as PI')
					->where('PI.po_invoice_id', $inv_id)
					->join('purchase_invoice_items as PI_ITEMS', 'PI_ITEMS.po_invoice_items_inovice_id = PI.po_invoice_id')
					->join('products as PRO', 'PI_ITEMS.po_invoice_items_item_id = PRO.product_id')
					->join('uom as UOM', 'PI_ITEMS.po_invoice_items_uom_id = UOM.uom_id')
					->get()->result_array();
		
		//echo "<pre>"; print_r($ret); exit;
		
		return $ret;
		
	}
	
	public function getcustomerbasedproductsdetails($sess_group,$sess_company,$pricebook_id)
	{
		$ret = $this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id')
					->from('price_book_price as PRO_PRICE')
					->join('products as PRO', 'PRO.product_id = PRO_PRICE.price_book_price_item_id')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
					->where('PRO_PRICE.price_book_price_pb_id',$pricebook_id)
					->limit(10)
					->get()->result_array();
				//	print_r($ret); exit;
		return $ret;	
	
	}
	
	public function add_purchase_return($purchase_ret_data)
	{
		$this->db->insert('purchase_return', $purchase_ret_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	public function add_purchase_return_items($purchase_return_item)
	{
		$this->db->insert('purchase_return_items', $purchase_return_item);
		return true;
	}
	
	//** Add Tax Group **//
	
	public function add_tax_group($tax_group)
	{
		$this->db->insert('purchase_return_tax_group', $tax_group);
		return  true;
	}
	
	
	public function verify_ven($ven_id)
	{
		$this ->db-> select('*');
		$this ->db-> from('vendors_accounts');
		$this ->db-> where('vendors_accounts_vendor_id',$ven_id);
	 	$this ->db-> limit(1);
		$query = $this -> db -> get();
		$value = $query -> num_rows();
			
		return $value;
			
	}
	public function ven_det($ven_id)
	{
		$this ->db-> select('*');
		$this ->db-> from('vendors_accounts');
		$this ->db-> where('vendors_accounts_vendor_id',$ven_id);
		$result = $this -> db -> get()->row();
		return $result;
	}
	
	
	public function ven_acc_update($ven_acc_data,$ven_id)
	{
		$this->db->where('vendors_accounts_vendor_id', $ven_id);
		$this->db->update('vendors_accounts', $ven_acc_data);
		
	}
	public function ven_acc_insert($ven_acc_data)
	{
	 
		$this->db->insert('vendors_accounts', $ven_acc_data);
		
	}
	
	public function updateinvoice_status($invoice_status_change, $invoice_id)
	{
		$this->db->where('po_invoice_id', $invoice_id);
		$this->db->update('purchase_invoice', $invoice_status_change);
	}
	
	public function get_purchase_return($id)
	{
		$ret = $this->db->select('PR.*,PI.po_invoice_number,VEN.vendor_name,vendor_id,vendor_code,vendor_code,LOC.location_name,DET.vendor_address,venor_zipcode')
					->from('purchase_return as PR')
					->where('PR.purchase_return_id', $id)
  					->join('purchase_invoice as PI', 'PI.po_invoice_id = PR.purchase_return_invoice_id')
					->join('vendors as VEN', 'VEN.vendor_id = PR.purchase_return_customer_id')
					->join('vendors_sub_details as DET', 'DET.ven_sub_det_ven_id = PR.purchase_return_customer_id')
					->join('location as LOC', 'LOC.location_id = PR.purchase_return_location_id')
					->get()->row();
		 //print_r($ret);exit;
		return $ret;
		
	}
	/* public function get_purchase_return_all($id)
	{
		$returns = $this->db->select('PR.*,VEN.vendor_name,vendor_id,vendor_code,LOC.location_name')	
					->from('purchase_return as PR')
					->where('PR.purchase_return_id', $id)
					->join('vendors as VEN', 'VEN.vendor_id = PR.purchase_return_customer_id')
					->join('location as LOC', 'LOC.location_id = PR.purchase_return_location_id')
					->get()->result_array();
				echo"<PRE>";	print_r($returns);
		//return $returns;
		
		$result = array();
	
		$purchase_return_itmes = $this->db->select('ITEMS.*,UOM.uom_name, PRO.*')	
					->from('purchase_return_items as ITEMS')
					->where('ITEMS.pr_items_returns_id', $returns['purchase_return_id'])
					->join('products as PRO', 'PRO.product_id = ITEMS.pr_items_item_id')
					->join('uom as UOM', 'ITEMS.pr_items_uom_id = UOM.uom_id')
					->get()->row();
		
		echo "<pre>"; print_r($result); exit;
		return $result;
		
	} */
	
	
	public function get_purchase_return_item($id)
	{
		$ret = $this->db->select('PI_ITEM.*,PRO.*,UOM.uom_name')
					->from('purchase_return_items as PI_ITEM')
					->where('PI_ITEM.pr_items_returns_id', $id)
  				//	->join('purchase_return_items as PI_ITEM', 'PI_ITEM.pr_items_returns_id = PR.purchase_return_id')
					->join('products as PRO', 'PI_ITEM.pr_items_item_id = PRO.product_id')
				//	->join('purchase_order_items as PO_ITEM', 'PO_ITEM.po_items_id = PI_ITEM.pr_items_item_id')
					->join('uom as UOM', 'PI_ITEM.pr_items_uom_id = UOM.uom_id')
					->get()->result_array();
		 		return $ret;
		
	}
	
	public function get_purchase_return_tax_group($id)
	{
		$ret = $this->db->select('PR.*,PI_TAX.*')
			        ->from('purchase_return as PR')
					->where('PR.purchase_return_id', $id)
  					->join('purchase_return_tax_group as PI_TAX', 'PI_TAX.tax_group_purchase_return_id = PR.purchase_return_id')
					->get()->result_array();
		 		return $ret;
	}
	
	public function get_comp_det($sess_company)
	{
		$ret = $this->db->select('COM.*,ST.*,CON.*,CTY.*')
			        ->from('company as COM')
					->where('company_id', $sess_company)
					->join('country as CON', 'CON.country_id = COM.company_country_id')
					->join('state as ST', 'ST.state_id = COM.company_state_id')
					->join('city as CTY', 'CTY.city_id = COM.company_city_id')
  					 ->get()->row();
		 		return $ret;
	}
	
	
	
	public function update_po_return($purchase_ret_data,$id)
	{
		$this->db->where('purchase_return_id', $id);
		$this->db->update('purchase_return', $purchase_ret_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	
	 
}