<?php

Class Salesordermodule extends CI_Model
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
	
	
	public function valid_incentive($COM_SO_ID, $so_customer_id)
	{
		$this->db->select('*')
				->from('incentive_details')
				->where('SO_ID',$COM_SO_ID)
				->where('OFCR_ID !=',$so_customer_id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	public function valid_customer($COM_SO_ID, $so_customer_id)
	{
		$this->db->select('*')
				->from('incentive_details')
				->where('SO_ID',$COM_SO_ID)
				->where('OFCR_ID',$so_customer_id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	public function valid_company($COM_SO_ID, $SPNCR_ID)
	{
		$this->db->select('*')
				->from('incentive_details')
				->where('SO_ID',$COM_SO_ID)
				->where('OFCR_TRE_SPNCR_ID',$SPNCR_ID)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Sales Oder List **//
	
	public function get_all_so($sess_group,$sess_user,$limit,$start,$sort_order,$sort_by,$sess_user_code)
	{
		if($sess_user == 1)
		{
			$ret['rows'] = $this->db->select('SO.*,  TOT.*,OFFR.*')
								->from('sales_order as SO')
								//->join('region as RE', 'RE.region_id = SO.sales_order_region_id')
								//->join('zone as ZO', 'ZO.zone_id = SO.sales_order_zone_id')
								//->join('area as AR', 'AR.area_id = SO.sales_order_area_id')
								->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id')
								//->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id')
								->join('officer as OFFR', 'OFFR.OFCR_ID = SO.sales_order_customer_id')
								->where('SO.sales_order_active_status' ,'active')
								//->where('OFFR.OFCR_USR_VALUE' ,$sess_user_code)
								->group_by('SO.sales_order_id')
								->order_by($sort_order,$sort_by)
								->limit($limit, $start)
								->get()->result_array();

			$Count = $this->db->select('count(*) as TotalRows')
								->from('sales_order')
								
								->where('sales_order_active_status' ,'active')
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('SO.*,  TOT.*,OFFR.*')
								->from('sales_order as SO')
								//->join('region as RE', 'RE.region_id = SO.sales_order_region_id')
								//->join('zone as ZO', 'ZO.zone_id = SO.sales_order_zone_id')
								//->join('area as AR', 'AR.area_id = SO.sales_order_area_id')
								->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id')
								//->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id')
								->join('officer as OFFR', 'OFFR.OFCR_ID = SO.sales_order_customer_id')
								->where('SO.sales_order_active_status' ,'active')
								->where('OFFR.OFCR_USR_VALUE' ,$sess_user_code)
								->group_by('SO.sales_order_id')
								->order_by($sort_order,$sort_by)
								->limit($limit, $start)
								->get()->result_array();

			$Count = $this->db->select('count(*) as TotalRows')
								->from('sales_order as SO')
								->join('officer as OFFR', 'OFFR.OFCR_ID = SO.sales_order_customer_id')
								->where('sales_order_active_status' ,'active')
								->where('OFFR.OFCR_USR_VALUE' ,$sess_user_code)
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	//** Search Sales Order **//
	
	public function search_get_all_so($sess_group,$sess_user,$sess_user_code,$search_so_order,$search_po_order,$search_cus_name,$search_status,$limit,$page,$sort_order,$sort_by,$so_qut_no,$cus_code,$from_date,$to_date)
	{
		if($sess_user == 1)
		{
			$this->db->select('SO.*, TOT.so_grand_total,OFFR.*');
			$this->db->from('sales_order as SO');
			$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			$this->db->join('officer as OFFR', 'OFFR.OFCR_ID = SO.sales_order_customer_id');
			//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
			$this->db->order_by($sort_order,$sort_by);
				if($search_so_order != "")
				{	
					$this->db->like('SO.sales_order_number' ,$search_so_order);
				}
				if($search_po_order != "")
				{	
					$this->db->like('SO.sale_order_customer_po_refernce_number' ,$search_po_order);
				}
				
				if($search_cus_name != "")
				{
					$this->db->like('SO.sales_order_customer_name' ,$search_cus_name);
				}
				if($cus_code != "")
				{
					$this->db->like('SO.sales_order_customer_code' ,$cus_code);
				}
				if($so_qut_no != "")
				{
					$this->db->like('SO.sales_order_sales_quatation_code' ,$so_qut_no);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					} 
				} 
				 
				if($search_status != "")
				{
					$this->db->like('SO.sales_order_status' ,$search_status);
				}
				
			$this->db->limit($limit, $page);
			$ret['rows'] =	$this->db->get()->result_array();
//echo $this->db->last_query();exit;
			$this->db->select('count(*) as TotalRows');
			$this->db->from('sales_order as SO');
			$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			$this->db->order_by($sort_order,$sort_by);
				if($search_so_order != "")
				{	
					$this->db->like('SO.sales_order_number' ,$search_so_order);
				}
				if($search_po_order != "")
				{	
					$this->db->like('SO.sale_order_customer_po_refernce_number	' ,$search_po_order);
				}
				
				if($search_cus_name != "")
				{
					$this->db->like('SO.sales_order_customer_name' ,$search_cus_name);
				}
				if($cus_code != "")
				{
					$this->db->like('SO.sales_order_customer_code' ,$cus_code);
				}
				if($so_qut_no != "")
				{
					$this->db->like('SO.sales_order_sales_quatation_code' ,$so_qut_no);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					} 
				} 
				 
				if($search_status != "")
				{
					$this->db->like('SO.sales_order_status' ,$search_status);
				}
			$Count =	$this->db->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			//echo "<pre>";print_r($ret['num_rows']);exit;
			return $ret;
		}
		else
		{
			//echo $sess_user; exit;
			$this->db->select('SO.*, TOT.so_grand_total,OFFR.*');
			$this->db->from('sales_order as SO');
			$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			$this->db->join('officer as OFFR', 'OFFR.OFCR_ID = SO.sales_order_customer_id');
			//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
			$this->db->where('OFFR.OFCR_ADD_USR_ID',$sess_user);
			$this->db->order_by($sort_order,$sort_by);
				if($search_so_order != "")
				{	
					$this->db->like('SO.sales_order_number' ,$search_so_order);
				}
				if($search_po_order != "")
				{	
					$this->db->like('SO.sale_order_customer_po_refernce_number' ,$search_po_order);
				}
				
				if($search_cus_name != "")
				{
					$this->db->like('SO.sales_order_customer_name' ,$search_cus_name);
				}
				if($cus_code != "")
				{
					$this->db->like('SO.sales_order_customer_code' ,$cus_code);
				}
				if($so_qut_no != "")
				{
					$this->db->like('SO.sales_order_sales_quatation_code' ,$so_qut_no);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
					$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					} 
				} 
				 
				if($search_status != "")
				{
					$this->db->like('SO.sales_order_status' ,$search_status);
				}
				
			$this->db->limit($limit, $page);
			$ret['rows'] =	$this->db->get()->result_array();
			//echo $this->db->last_query();exit;
			$this->db->select('count(*) as TotalRows');
			$this->db->from('sales_order as SO');
			$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			$this->db->join('officer as OFFR', 'OFFR.OFCR_ID = SO.sales_order_customer_id');
			$this->db->where('OFFR.OFCR_ADD_USR_ID',$sess_user);
			$this->db->order_by($sort_order,$sort_by);
				if($search_so_order != "")
				{	
					$this->db->like('SO.sales_order_number' ,$search_so_order);
				}
				if($search_po_order != "")
				{	
					$this->db->like('SO.sale_order_customer_po_refernce_number	' ,$search_po_order);
				}
				
				if($search_cus_name != "")
				{
					$this->db->like('SO.sales_order_customer_name' ,$search_cus_name);
				}
				if($cus_code != "")
				{
					$this->db->like('SO.sales_order_customer_code' ,$cus_code);
				}
				if($so_qut_no != "")
				{
					$this->db->like('SO.sales_order_sales_quatation_code' ,$so_qut_no);
				}
				
				if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
				{	
					if($from_date != '' && $to_date == "1970-01-01")
					{
					$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					}
					if($from_date == "1970-01-01"  && $to_date != '' )
					{
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					}
					if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
					{
						$this->db->where('SO.sales_order_transaction_date >=', $from_date);
					$this->db->where('SO.sales_order_transaction_date <=', $to_date);
					} 
				} 
				 
				if($search_status != "")
				{
					$this->db->like('SO.sales_order_status' ,$search_status);
				}
			$Count =	$this->db->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			//echo "<pre>";print_r($ret['num_rows']);exit;
			return $ret;
		}
		
	}
	
	//** Get pricebook in Scheme **//
	
	public function getpricebook_scheme($price_book_id)
	{
		$ret =  $this->db->select('*')
						->from('price_book')
						->where('price_book_id', $price_book_id)
						->get()->result_array();
		return $ret;
	}
	
	//** Get Product in Scheme **//
	
	/*public function getfreeitem($scheme_id,$item_id,$to_date)
	{
		$ret =  $this->db->select('*')
						->from('scheme_price')
						->where('scheme_price_scheme_id', $scheme_id)  // 22
						->where('scheme_price_item_id', $item_id)	
						->get()->result_array();
		return $ret;
	}*/
	
	public function get_item_gross_amount_taxable($id) 
	{
		$this->db->select('ITEMS.*,PRO.product_id,PRO.product_code,PRO.product_name');
		$this->db->from('sales_order_items as ITEMS');
	 	$this->db->where('ITEMS.so_items_sales_id', $id);
		$this->db->where('ITEMS.so_items_tax_percent !=',0.00);
		//$this->db->join('uom as U', 'U.uom_id = ITEMS.so_items_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.so_items_item_id');
		$query = $this->db->get()->result_array();
		//echo $this->db->last_query(); exit;
		return $query; 
	}
	
	public function get_cus_incentive_amount($id) 
	{
		$this->db->select('incv.*,sum(incv.USR_INCENTIVE_AMT) as incentive_amt,sum(incv.USR_REDEEM_AMT) as redeem_amt');
				$this->db->from('incentive_details as incv');
				$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = incv.OFCR_ID');
				$this->db->where('OFCR.OFCR_ID', $id);
				
		$query = $this->db->get()->row();
		return $query; 
	}
	
  public function get_item_gross_amount_non_taxable($id) 
	{
		$this->db->select('ITEMS.*,PRO.product_id,PRO.product_code,PRO.product_name');
		$this->db->from('sales_order_items as ITEMS');
	 	$this->db->where('ITEMS.so_items_sales_id', $id);
		$this->db->where('ITEMS.so_items_tax_percent =',0.00);
		//$this->db->join('uom as U', 'U.uom_id = ITEMS.so_items_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.so_items_item_id');
		$query = $this->db->get()->result_array();
		return $query; 
	}
	
	public function getfreeitem($scheme_id,$item_id,$to_date)
	{
		$ret =  $this->db->select('*')
							->from('scheme_management as SCM')
							->join('scheme_price as SCH','SCM.scheme_id = SCH.scheme_price_scheme_id')
							->where('SCH.scheme_price_scheme_id', $scheme_id)  // 22
							->where('SCH.scheme_price_item_id', $item_id)
							->where('SCM.scheme_status', 'active')		// 945
							->where('SCM.scheme_to_date >=', $to_date)
							->get()->result_array();
		return $ret;
	}
	
	//** Get Last Id gor SalesOrder **//
	
	public function getlastid()
	{
		$ret =  $this->db->select('sales_order_number')
						->from('sales_order')
						->order_by('sales_order_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	public function get_comp_det($sess_company)
	{
		/*$ret = $this->db->select('*')
			        ->from('company')
					->where('company_id', $sess_company)
  					 ->get()->row();
		 		return $ret;*/
				
				$ret = $this->db->select('CO.*,ST.*,CTY.*,CNTR.*')
					->from('company as CO')
					->join('country as CNTR', 'CNTR.country_id=CO.company_country_id')
					->join('state as ST', 'ST.state_id=CO.company_state_id')
					->join('city as CTY', 'CTY.city_id=CO.company_city_id')					
					 
					->where('CO.company_id' ,$sess_company)
					 
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
	
	public function getsalesorder_for_popup_grid()
	{
		$ret = $this->db->select('*')
					->from('sales_order')
					->order_by('sales_order_id', 'DESC')
					->where('sales_order_status !=' ,'cancelled')
					->where('sales_order_status !=' ,'delivered')
					->where('sales_order_active_status' ,'active')
					->get()->result_array();
		return $ret; 
		
	}
	
	
	//** Sales Order Validation **//
	
	public function so_vaildation($randomstring)
	{
		$this->db->select('*')
				->from('sales_order')
				->where('sales_order_number',$randomstring)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	}
	
	
	
	//**Add Sales Order Details **//
	
	public function add_so_details($so_data)
	{
		$this->db->insert('sales_order', $so_data);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
		
	}
	
	//** Add SalesOrder Item Details **//
	
	public function add_so_Item_details($so_itemdata)
	{
		$this->db->insert('sales_order_items', $so_itemdata);
		return true;
		
	}
	
	//** Add Sales Order Item Total **//
	
	public function add_so_total_price($so_totalprice)
	{
		$this->db->insert('sales_order_total', $so_totalprice);
		return true;
		
	}
	
	//** Update Sales Order Status **//
	
	public function update_so_status($sodata,$id)
	{	
		$this->db->where('sales_order_id', $id)
				->update('sales_order', $sodata);
		
		return true;
	}
	
	
	  
	public function getsales_orderitems($id)
	{
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,P.product_name')
					->from('sales_order_items as ITMES')
					->where('ITMES.so_items_sales_id', $id)
					->join('products as P', 'P.product_id = ITMES.so_items_item_id')
					->join('uom as U', 'U.uom_id = ITMES.so_items_uom_id')
					->get()->result_array();
		//echo $this->db->last_query(); exit;	
		return $ret;
	
	}
	
	//** Get Single Sales Order Details **//
	
	public function getsingle_so($id)
	{
		$this->db->select('SO.*, CUS.*, STD.division_name,STR.store_name,Bill_addr.*,cty.CTY_NME');
		$this->db->from('sales_order as SO');
		$this->db->join('officer as CUS', 'CUS.OFCR_ID = SO.sales_order_customer_id');
		$this->db->join('officer_bill as Bill_addr', 'CUS.OFCR_ID = Bill_addr.OFCR_BILL_OFCR_ID');
		$this->db->join('cty as cty', 'Bill_addr.OFCR_BILL_CTY = cty.CTY_ID');
		//$this->db->join('zone as ZO', 'ZO.zone_id = SO.sales_order_zone_id');
		//$this->db->join('area as AR', 'AR.area_id = SO.sales_order_area_id');
		//$this->db->join('payment_mode as PA', 'PA.payment_mode_id = SO.sales_order_payment_mode');
		//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
		$this->db->join('store_division as STD', 'STD.division_id = SO.sales_order_item_division_id');
		$this->db->join('store as STR', 'STR.store_id = SO.sales_order_item_store_id');
	 	$this->db->where('SO.sales_order_id', $id);
		$query = $this->db->get()->row();
		//echo '<PRE>';print_r($query); exit;
	 	
		return $query;
	}
	
	public function get_so_total_tax_group($id)
	{
		$this->db->select('*');
		$this->db->from('sales_order_tax_group');
	 	$this->db->where('tax_group_sales_order_id', $id);
		//$query = $this->db->get()->row();
		$query =  $this->db->get()->result_array();
		//echo "<pre>";
		//print_r($query);
		return $query;
	}
	//** Get Single Sales Order Billing  Details **//
	
	public function getsingle_so_bill($so_customer_id)
	{
		$this->db->select('CUS.*,ST.*,CON.*,CTY.*');
		$this->db->from('customer_billing_address as CUS');
	 	$this->db->where('CUS.customer_billing_customer_id', $so_customer_id);
		$this->db->join('country as CON', 'CON.country_id = CUS.customer_billing_country_id');
		$this->db->join('state as ST', 'ST.state_id = CUS.customer_billing_state_id');
		$this->db->join('city as CTY', 'CTY.city_id = CUS.customer_billing_city_id');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Get Single Sales Order Shipping Details **//
	
	public function getsingle_so_ship($so_customer_id)
	{
		$this->db->select('CUS.*,ST.*,CON.*,CTY.*');
		$this->db->from('customer_shipping_address as CUS');
	 	$this->db->where('CUS.customer_shipping_customer_id', $so_customer_id);
		$this->db->join('country as CON', 'CON.country_id = CUS.customer_shipping_country_id');
		$this->db->join('state as ST', 'ST.state_id = CUS.customer_shipping_state_id');
		$this->db->join('city as CTY', 'CTY.city_id = CUS.customer_shipping_city_id');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Get Single Sales Order Item Details **//
	
	public function getsingle_so_items($id)
	{	
		$ret = $this->db->select('ITMES.*,PRO.product_name, PRO.product_code,STR.store_name,STDIV.division_name')
					->from('sales_order_items as ITMES')
					->where('ITMES.so_items_sales_id', $id)
					->join('products as PRO', 'PRO.product_id = ITMES.so_items_item_id','left')
					->join('store as STR', 'STR.store_id = ITMES.so_items_store_id','left')
					->join('store_division as STDIV', 'STDIV.division_id = ITMES.so_items_division_id','left')
					//->join('uom as U', 'U.uom_id = ITMES.so_items_uom_id','left')
					->get()->result_array();
		return $ret;
	}
	
	//** Update Sales Order Details **//
	
	public function update_so_details($so_data, $id)
	{
		$this->db->where('sales_order_id', $id);
		$this->db->update('sales_order', $so_data);
		return  true;
	}

	public function update_so_bill_details($so_billing_details, $id)
	{
		$this->db->where('sales_order_billing_sales_order_id', $id);
		$this->db->update('sales_order_billing_address', $so_billing_details);
		return  true;
	}

	public function update_so_ship_details($so_shipping_details, $id)
	{
		$this->db->where('sales_order_shipping_sales_order_id', $id);
		$this->db->update('sales_order_shipping_address', $so_shipping_details);
		return  true;
	}
	
	//** Delete Sales Order Items In Grid **//
	
	public function delete_sales_order_items($id)
	{
		$this->db->where('so_items_sales_id',$id);
		$this->db->delete('sales_order_items');
	}
	
	//** Update SalesOrder Item Details **//
	
	public function update_so_Item_details($so_itemdata, $id,$item_id)
	{
		$this->db->select('*')
				->from('sales_order_items')
				->where('so_items_sales_id',$id)
				->where('so_items_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('sales_order_items', $so_itemdata);
		}
		else
		{
			$this->db->where('so_items_sales_id', $id);
			$this->db->where('so_items_item_id', $item_id);
			$this->db->update('sales_order_items', $so_itemdata);
		}
		return true;
	}
	
	//** Update Sales Order Item Total **//
	
	public function update_so_total_price($so_totalprice,$id)
	{
		$this->db->where('so_total_sales_id', $id);
		$this->db->update('sales_order_total', $so_totalprice);
		
		return  true;
	}
	
	//**Update SalesOrder Shipping Address **//	
	
	public function update_so_shipping_address($so_shipping_details,$so_customer_id)
	{
		$this->db->where('customer_shipping_customer_id', $so_customer_id);
		$this->db->update('customer_shipping_address', $so_shipping_details);
		
		return  true;
	}
	
	//**Update SalesOrder Billing Address **//	
	
	public function update_so_billing_address($so_billing_details,$so_customer_id)
	{
		$this->db->where('customer_billing_customer_id', $so_customer_id);
		$this->db->update('customer_billing_address', $so_billing_details);
		
		return  true;
	}
	
	public function getsales_for_popup_grid()
	{
		$ret = $this->db->select('*')
					->from('sales_order')
					->order_by('sales_order_id', 'DESC')
					->where('sales_order_status !=' ,'cancelled')
					->where('sales_order_status !=' ,'delivered')
					->where('sales_order_active_status' ,'active')
					->get()->result_array();
			//echo $this->db->last_query(); exit;		
		return $ret;
	}
	
	public function get_allproducttypes($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
					->from('products_type as TYPE')
					->where('TYPE.products_type_name','FinishedGoods')
					->where('TYPE.products_type_status','enable')
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
					->from('products_type as TYPE')
					->where('TYPE.products_type_name','FinishedGoods')
					->where('TYPE.products_type_status','enable')
					//->where('TYPE.product_type_company_id',$sess_company)
					->get()->result_array();
		return $ret;
		}
	}

	public function get_allproductgroups()
	{
		$ret = $this->db->select('G.products_group_id, G.products_group_name')
					->from('products_groups as G')
					->get()->result_array();
		return $ret;
	}
	
	public function get_allproductsdetails($sess_group,$sess_company,$producttype)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('PRO.*,PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->where('PRO_TYP.products_type_name','FinishedGoods')
					->where('PRO.product_type_id',$producttype)
					->where('PRO.product_status','enable')
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('PRO.*,PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->where('PRO_TYP.products_type_name','FinishedGoods')
					->where('PRO.product_type_id',$producttype)
					->where('PRO.product_status','enable')
					//->where('PRO.product_company_id',$sess_company)
					->get()->result_array();
		return $ret;
		}
	}
	
	
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
			//$this->db->where('PRO.product_company_id',$sess_company);
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
	
	
	public function getstock_item_details($item_inv_qty)
	{
		$num=$this->db->select('inventory_qty,inventory_issued_qty')
				->from('inventory_new')
				->where('inventory_id',$item_inv_qty)
				->get()->row();
		 return $num;
	}
	
		public function update_cur_stock($cur_stock_items,$item_inv_qty)
	{
		$this->db->where('inventory_id', $item_inv_qty)
				->update('inventory_new', $cur_stock_items);
		//echo $this->db->last_query(); exit;
		return true;
	
	}
	
	public function getitemdetails($product_item_id, $pricebook_id)
	{
		
		$productpopupprice = new stdClass();
		
		$productprice = $this->db->select('PRO.product_id,PRO.product_type_id,PRO.product_group_id,PRO.product_name,PRO.product_code,PRO.product_model_number,PRICE.product_mrp,PRICE.product_selling,PRICE.product_cp,PRICE.product_uty_qty,PRICE.product_vat_tax,PRICE.product_gst_tax,PRICE.product_service_tax,PRICE.product_cst_tax,PRICE.product_excise_duty_tax,U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
				//	->join('inventory as INV', 'INV.inventory_item_id = PRO.product_id')
					->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
					->where('PRO.product_id', $product_item_id)
					->get()->row();
		
		$priceitems = $this->db->select('*')
						  ->from('price_book_price')
						  ->where('price_book_price_pb_id',$pricebook_id)
						  ->where('price_book_price_item_id',$product_item_id)
						  ->get()->row();
		$num = $this->db->affected_rows();
		
		//print_r($productprice); exit;
		if($num == 0)
		{
			$productpopupprice = $productprice;
		}
		else
		{
			$productpopupprice->product_id = $productprice->product_id;
			$productpopupprice->product_type_id = $productprice->product_type_id;
			$productpopupprice->product_group_id = $productprice->product_group_id;
			$productpopupprice->product_name = $productprice->product_name;
			$productpopupprice->product_code = $productprice->product_code;
			$productpopupprice->product_model_number = $productprice->product_model_number;
			$productpopupprice->product_cp = $productprice->product_cp;
			
			$productpopupprice->product_mrp = $priceitems->price_book_price_mrp;
			$productpopupprice->product_selling = $priceitems->price_book_price_selling_price;
			
			$productpopupprice->product_vat_tax = $priceitems->price_book_price_vat;
			$productpopupprice->product_gst_tax = $priceitems->price_book_price_gst;
			$productpopupprice->product_service_tax = $priceitems->price_book_price_service;
			$productpopupprice->product_cst_tax = $priceitems->price_book_price_cst;
			$productpopupprice->product_excise_duty_tax = $priceitems->price_book_price_excise;
			
			$productpopupprice->product_uty_qty = $productprice->product_uty_qty;
			$productpopupprice->uom_id = $productprice->uom_id;
			$productpopupprice->uom_name = $productprice->uom_name;
		}
		

		return $productpopupprice;
	}
	
	public function getcustomerbasedproductsdetails($sess_group,$sess_company,$pricebook_id)
	{
		if($sess_group == 1)
		{
		$ret = $this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id')
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
		else
		{
		$ret = $this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id')
					->from('price_book_price as PRO_PRICE')
					->join('products as PRO', 'PRO.product_id = PRO_PRICE.price_book_price_item_id')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
					//->where('PRO.product_company_id',$sess_company)
					->where('PRO_PRICE.price_book_price_pb_id',$pricebook_id)
					->limit(10)
					->get()->result_array();
				//	print_r($ret); exit;
		return $ret;
		}
	
	}
	
	public function getcustomerbasedproductsdetailswithmultiplesearch($sess_group,$sess_company,$pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno)
	{
		if($sess_group == 1)
		{
		$this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_company_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id');
		$this->db->from('price_book_price as PRO_PRICE');
		$this->db->join('products as PRO', 'PRO.product_id = PRO_PRICE.price_book_price_item_id');
		$this->db->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id');
		$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
		$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
		$this->db->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id');
		$this->db->where('PRO_PRICE.price_book_price_pb_id',$pricebook_id);
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
		
		$this->db->limit(10);
		$ret = $this->db->get()->result_array();
	
		return $ret;
		}
		else
		{
		$this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_company_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id');
		$this->db->from('price_book_price as PRO_PRICE');
		$this->db->join('products as PRO', 'PRO.product_id = PRO_PRICE.price_book_price_item_id');
		$this->db->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id');
		$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
		$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
		$this->db->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id');
		//$this->db->where('PRO.product_company_id',$sess_company);
		$this->db->where('PRO_PRICE.price_book_price_pb_id',$pricebook_id);
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
		
		$this->db->limit(10);
		$ret = $this->db->get()->result_array();
	
		return $ret;
		}
	}
	
	public function getsalesquotepopupdetail_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('SQ.*,CUS.*,RG.region_name,ZO.zone_name,AR.area_name,CBA.*,CSA.*')
					->from('sales_quotation as SQ')
					->join('customers as CUS', 'CUS.customer_id = SQ.sales_quote_customer_id')
					->join('region as RG', 'RG.region_id = CUS.customer_region')
					->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone')
					->join('area as AR', 'AR.area_id = CUS.customer_area')
					->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id')
					->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id')
					->order_by('sales_quote_id', 'DESC')
					->where('sales_quote_cur_status !=','closed')
					->where('sales_quote_status','active')
					->limit(10)
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('SQ.*,CUS.*,RG.region_name,ZO.zone_name,AR.area_name,CBA.*,CSA.*')
					->from('sales_quotation as SQ')
					->join('customers as CUS', 'CUS.customer_id = SQ.sales_quote_customer_id')
					->join('region as RG', 'RG.region_id = CUS.customer_region')
					->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone')
					->join('area as AR', 'AR.area_id = CUS.customer_area')
					->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id')
					->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id')
					->order_by('sales_quote_id', 'DESC')
					->where('sales_quote_cur_status !=','closed')
					->where('sales_quote_status','active')
					//->where('sales_quote_company_id',$sess_company)
					->limit(10)
					->get()->result_array();
		return $ret;
		}
	}
	public function getsalesquatationsearch($sq_code,$customer_name,$sess_group,$sess_company)
	{	
		if($sess_group == 1)
		{
			$ret = $this->db->select('SQ.*,CUS.*,RG.region_name,ZO.zone_name,AR.area_name,CBA.*,CSA.*');
					$this->db->from('sales_quotation as SQ');
					$this->db->join('customers as CUS', 'CUS.customer_id = SQ.sales_quote_customer_id');
					$this->db->join('region as RG', 'RG.region_id = CUS.customer_region');
					$this->db->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone');
					$this->db->join('area as AR', 'AR.area_id = CUS.customer_area');
					$this->db->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id');
					$this->db->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id');
					$this->db->order_by('sales_quote_id', 'DESC');
					$this->db->where('sales_quote_cur_status !=','closed');
					$this->db->where('sales_quote_status','active');
					$this->db->limit(10);
					if($sq_code != "")
		{
			$this->db->like('SQ.sales_quote_qoute_no',$sq_code,  'after');
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name,  'after');
		}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('SQ.*,CUS.*,RG.region_name,ZO.zone_name,AR.area_name,CBA.*,CSA.*');
					$this->db->from('sales_quotation as SQ');
					$this->db->join('customers as CUS', 'CUS.customer_id = SQ.sales_quote_customer_id');
					$this->db->join('region as RG', 'RG.region_id = CUS.customer_region');
					$this->db->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone');
					$this->db->join('area as AR', 'AR.area_id = CUS.customer_area');
					$this->db->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id');
					$this->db->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id');
					$this->db->order_by('sales_quote_id', 'DESC');
					$this->db->where('sales_quote_cur_status !=','closed');
					$this->db->where('sales_quote_status','active');
					//$this->db->where('sales_quote_company_id',$sess_company);
					$this->db->limit(10);
					if($sq_code != "");
		{
			$this->db->like('SQ.sales_quote_qoute_no',$sq_code,  'after');
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name,  'after');
		}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
	
				
	}
	public function getproducts_grid($product_typeid)
	{
		$ret = $this->db->select('PRO.product_id,PRO.product_name,PRO.product_code,PSK.product_stock_uom_id,U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_stock as PSK', 'PSK.product_stock_prd_id = PRO.product_id')
					->join('uom as U', 'U.uom_id = PSK.product_stock_uom_id')
					->where('product_type_id',$product_typeid)
					
					->get()->result_array();
					
		return $ret;
	}
	public function getproducts_details($id)
	{
		 
		$ret = $this->db->select('PRO.*,PSK.product_stock_uom_id,U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_stock as PSK', 'PSK.product_stock_prd_id = PRO.product_id')
					->join('uom as U', 'U.uom_id = PSK.product_stock_uom_id')
					->where('product_id',$id)
					->get()->result_array();
		return $ret;
	}
	
	public function getSQ_items_grid($id)
	{	
		$ret = $this->db->select('SQI.*,U.uom_name,U.uom_id,P.product_name, P.product_code')
						->from('sales_qoute_item as SQI')
						->where('SQI.salesquote_sales_quoute_id', $id)
						->join('products as P', 'P.product_id = SQI.salesquote_items_item_id')
						->join('uom as U', 'U.uom_id = SQI.salesquote_items_uom_id')
						->get()->result_array();
		//echo $this->db->last_query(); exit;
		return $ret;
	
	}

	public function getsales_id($id) 
	{
		$this->db->select('*');
		$this->db->from('sales_quotation');
	 	$this->db->where('sales_quote_id', $id);
		$query = $this->db->get()->row();
	 	//echo $this->db->last_query(); exit;
		return $query;
	}

	public function getsales_order_total($id)
	{
		$ret = $this->db->select('total.*')
					->from('sales_quotation_items_total as total')
					->where('total.salesquote_quoutation_id', $id)
					->get()->row();
		return $ret;
	}
	
	
	
	public function getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email)
	{
		$this->db->select('CUS.*,RG.*,ZO.*,AR.*,CBA.*,CSA.*');
		$this->db->from('customers as CUS');
		$this->db->join('region as RG', 'RG.region_id = CUS.customer_region');
		$this->db->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone');
		$this->db->join('area as AR', 'AR.area_id = CUS.customer_area');
		$this->db->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id');
		$this->db->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id');
		$this->db->where('CUS.customer_status','active');
		$this->db->limit(10);
		
		if($cus_code != "")
		{
			$this->db->like('CUS.customer_code',$cus_code);
		}
		if($cus_name != "")
		{
			$this->db->like('CUS.customer_name',$cus_name);
		}
		if($cus_mobile != "")
		{
			$this->db->like('CUS.customer_mobile',$cus_mobile);
		}
		if($cus_email != "")
		{
			$this->db->like('CUS.customer_email',$cus_email);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}
	
	//** Get All Sales Person **//
	
	public function get_sales_person()
	{
		$ret = $this->db->select('*')
				->from('users')
				->where('user_group_id', '3')  
				->get()->result_array();
				
		return $ret;

	}

	
	//** Add Tax Group **//
	
	public function add_tax_group($tax_group)
	{
		$this->db->insert('sales_order_tax_group', $tax_group);
		return  true;
	}
	
	//** Get Single Sales Order Item Total Details **//
	
	public function getsingle_so_total($id)
	{
		$this->db->select('*');
		$this->db->from('sales_order_total');
	 	$this->db->where('so_total_sales_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function getsingle_so_total_tax_group($id)
	{
		$this->db->select('*');
		$this->db->from('sales_order_tax_group');
	 	$this->db->where('tax_group_sales_order_id', $id);
		//$query = $this->db->get()->row();
		$query =  $this->db->get()->result_array();
		//echo "<pre>";
		//print_r($query);
		return $query;
	}
	
	//** Get All Salesquotation Tax Group Details **//
	
	public function get_tax_group($id)
	{
		$ret = $this->db->select('TG.*')
					->from('sales_order_tax_group as TG')
					->where('TG.tax_group_sales_order_id' ,$id)
					->get()->result_array();
	 	return $ret;  
	}
	
	
	//** Delete All Salesquotation Tax Group Details **//
	
	public function delete_tax_group($id)
	{
		$this->db->where('tax_group_sales_order_id',$id);
		$this->db->delete('sales_order_tax_group');
		
		return true;
	}


	//** Add Tax Group **//
	
	public function update_tax_group($tax_group)
	{
		$this->db->insert('sales_order_tax_group', $tax_group);
		return  true;
	}
	
	public function getuserdetails($sess_user)
	{
		$ret = $this->db->select('USR.user_email, USR.user_first_name')
				->from('users as USR')
				->where('USR.user_id',$sess_user )
				->limit(1)
				->get()->row();
		return $ret;
	}
	
	public function get_all_salesman()
	{
		$ret = $this->db->select('DES_USR.designation_user_id, DES_USR.designation_user_name, DES_USR.designation_user_email, DES_USR.designation_user_mobile')
				->from('designation_users as DES_USR')
				->join('designation as DES', 'DES.designation_id = DES_USR.designation_user_designation_id')
				->where('DES.designation_name','Sales Man')
				->where('DES_USR.designation_user_status','active')
				->get()->result_array();
				
		return $ret;
	}
	
	
}