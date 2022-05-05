<?php

Class Salesinvoicemodel extends CI_Model
{
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
 
 	public function getlastid_dc()
	{
		
		$ret =  $this->db->select('delivery_challan_number')
						->from('delivery_challan')
						->order_by('delivery_challan_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	public function getsingle_si_total($id)
	{
		$this->db->select('*');
		$this->db->from('sale_invoice_total');
	 	$this->db->where('sale_invoice_si_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
		public function add_so_dc_details($dcdetails)
	{
		$this->db->insert('delivery_challan', $dcdetails);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
		
	}
		public function add_so_dc_item_details($dc_items)
	{
		$this->db->insert('delivery_challan_items', $dc_items);
		
		//echo "<pre>"; print_r($purchase_order_items); exit;
		return true;
		
	}
 	public function get_all_SI($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('SI.*,CUS.customer_name')
								->from('sale_invoice as SI')
								//->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
								->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')
								//->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id')
								//->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id')
								->where('SI.sale_invoice_active_status','active')
								->where('SI.sale_invoice_status !=','returned')
								->where('SI.sale_invoice_type','normal')
								//->where('SI.sale_invoice_company_id',$sess_company)
								->order_by($sort_order,$sort_by)
								->limit($limit, $start)
								->get()->result_array();


			$Count = $this->db->select('count(*) as TotalRows')
								->from('sale_invoice as SI')
								//->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
								->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')
								//->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id')
								//->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id')
								->where('SI.sale_invoice_active_status','active')
								//->where('SI.sale_invoice_company_id',$sess_company)
								->where('SI.sale_invoice_status !=','returned')
								//->where('SI.sale_invoice_type','normal')
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;

		}
		else
		{
			$ret['rows'] = $this->db->select('SI.*, CUS.customer_name')
							->from('sale_invoice as SI')
							//->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
							->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')
							->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id')
							//->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id')
							//->where('SI.sale_invoice_company_id',$sess_company)
							->where('SI.sale_invoice_active_status','active')
							->where('SI.sale_invoice_status !=','returned')
							->where('SI.sale_invoice_type','normal')
							->order_by($sort_order,$sort_by)
							->limit($limit, $start)
							->get()->result_array();
							
			
			$Count = $this->db->select('count(*) as TotalRows')
								->from('sale_invoice as SI')
								//->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
								->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')
								->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id')
								//->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id')
								//->where('SI.sale_invoice_company_id',$sess_company)
								->where('SI.sale_invoice_active_status','active')
								->where('SI.sale_invoice_status !=','returned')
								->where('SI.sale_invoice_type','normal')
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
		}
		 
		return $ret;
	}
	
	public function search_get_all_SI($sess_group,$sess_company,$search_si_no,$search_so_no,$search_po_no,$search_status,$limit,$page,$sort_order,$sort_by,$search_cus_name,$from_date,$to_date)
	{
		if($sess_group == 1)
		{
			$this->db->select('SI.*, CUS.customer_name');
						$this->db->from('sale_invoice as SI');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						//$this->db->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id');
						$this->db->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id');
						//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
						if($search_si_no != "")
						{
						$this->db->like('SI.sale_invoice_no',$search_si_no);
						}
						if($search_so_no != "")
						{
						$this->db->like('SI.sale_invoice_so_ref_no',$search_so_no);
						}
						if($search_po_no != "")
						{
						$this->db->like('SI.sale_invoice_customer_po_refernce_number',$search_po_no);
						} 
						 
						 
						if($search_status != "")
						{
						$this->db->like('SI.sale_invoice_status',$search_status);
						}
						if($search_cus_name != "")
						{
						$this->db->like('CUS.customer_name',$search_cus_name);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
						{	
							if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('SI.sale_invoice_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('SI.sale_invoice_date >=', $from_date);
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							} 
						} 
						
						$this->db->where('SI.sale_invoice_type','normal');
						//$this->db->where('SI.sale_invoice_company_id',$sess_company);
						//$this->db->where('SI.sale_invoice_status !=','returned');
						$this->db->order_by($sort_order,$sort_by);	
						$this->db->limit($limit,$page);
						$this->db->order_by($sort_order,$sort_by);	
						$ret['rows'] = $this->db->get()->result_array();
	
				//  echo $this->db->last_query(); exit;

							$this->db->select('count(*) as TotalRows');
							$this->db->from('sale_invoice as SI');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						//$this->db->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id');
						$this->db->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id');
						//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
						if($search_si_no != "")
						{
						$this->db->like('SI.sale_invoice_no',$search_si_no);
						}
						if($search_so_no != "")
						{
						$this->db->like('SI.sale_invoice_so_ref_no',$search_so_no);
						}
						
                        if($search_po_no != "")
						{
						$this->db->like('SI.sale_invoice_customer_po_refernce_number',$search_po_no);
						}						
						 
						if($search_status != "")
						{
						$this->db->like('SI.sale_invoice_status',$search_status);
						}
						if($search_cus_name != "")
						{
						$this->db->like('CUS.customer_name',$search_cus_name);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
						{	
							if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('SI.sale_invoice_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('SI.sale_invoice_date >=', $from_date);
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							} 
						} 
						$this->db->where('SI.sale_invoice_type','normal');
						//$this->db->where('SI.sale_invoice_company_id',$sess_company);
							//$this->db->where('SI.sale_invoice_status !=','returned');
							 	 
						 	$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
		}
		else
		{
						$this->db->select('SI.*, CUS.customer_name');
						$this->db->from('sale_invoice as SI');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						//$this->db->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id');
						//$this->db->join('sales_order as SO', 'SO.sales_order_id = SI.sale_invoice_so_ref_id');
						//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
						if($search_si_no != "")
						{
						$this->db->like('SI.sale_invoice_no',$search_si_no);
						}
						if($search_so_no != "")
						{
						$this->db->like('SI.sale_invoice_so_ref_no',$search_so_no);
						}
						if($search_po_no != "")
						{
						$this->db->like('SI.sale_invoice_customer_po_refernce_number',$search_po_no);
						}
						if($search_status != "")
						{
						$this->db->like('SI.sale_invoice_status',$search_status);
						}
						if($search_cus_name != "")
						{
						$this->db->like('CUS.customer_name',$search_cus_name);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
						{	
							if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('SI.sale_invoice_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('SI.sale_invoice_date >=', $from_date);
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							} 
						} 
						$this->db->where('SI.sale_invoice_type','normal');
						//$this->db->where('SI.sale_invoice_company_id',$sess_company);
						//$this->db->where('SI.sale_invoice_status !=','returned');
						$this->db->order_by($sort_order,$sort_by);	
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				// echo $this->db->last_query(); exit;

							$this->db->select('count(*) as TotalRows');
							$this->db->from('sale_invoice as SI');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						//$this->db->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id');
						if($search_si_no != "")
						{
						$this->db->like('SI.sale_invoice_no',$search_si_no);
						}
						if($search_so_no != "")
						{
						$this->db->like('SI.sale_invoice_so_ref_no',$search_so_no);
						}
						 
						 if($search_po_no != "")
						{
						$this->db->like('SI.sale_invoice_customer_po_refernce_number',$search_po_no);
						}
						if($search_status != "")
						{
						$this->db->like('SI.sale_invoice_status',$search_status);
						}
						if($search_cus_name != "")
						{
						$this->db->like('CUS.customer_name',$search_cus_name);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
						{	
							if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('SI.sale_invoice_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
								$this->db->where('SI.sale_invoice_date >=', $from_date);
							$this->db->where('SI.sale_invoice_date <=', $to_date);
							} 
						} 
						$this->db->where('SI.sale_invoice_type','normal');
						//$this->db->where('SI.sale_invoice_company_id',$sess_company);
							//$this->db->where('SI.sale_invoice_status !=','returned');
							$this->db->order_by('SI.sale_invoice_id', 'DESC');					 
						 	$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
		}
	}
	
	public function getlastid()
	{
		
		$ret =  $this->db->select('sale_invoice_no')
						->from('sale_invoice')
						->order_by('sale_invoice_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	public function getlastidwithcompany($sess_company)
	{
		
		$ret =  $this->db->select('sale_invoice_no')
						->from('sale_invoice')
						//->where('sale_invoice_company_id', $sess_company)
						->order_by('sale_invoice_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
 	public function getsalerequest_for_popup_grid($sess_group,$sess_company)
	{ 
		if($sess_group == 1)
		{
			$this->db->select('SO.*, CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('sales_order as SO');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
	 		$this->db->where('SO.sales_order_status', 'created');
			$this->db->where('sales_order_active_status' ,'active');
			$this->db->order_by('sales_order_id', 'DESC');
			$this->db->limit(10);
			$ret = $this->db->get()->result_array();
			
			return $ret;
		}
		else
		{
			$this->db->select('SO.*, CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('sales_order as SO');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
			$this->db->where('sales_order_company_id',$sess_company);
	 		$this->db->where('SO.sales_order_status', 'created');
			$this->db->where('sales_order_active_status' ,'active');
			$this->db->order_by('sales_order_id', 'DESC');
			$this->db->limit(10);
			$ret = $this->db->get()->result_array();
			
			return $ret;
		}
	}
	
	public function dc_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			
			$this->db->select('DC.*, CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('delivery_challan as DC');
			//$this->db->join('sales_order as SO', 'SO.sales_order_id = DC.delivery_challan_sales_order_id');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
	 		$this->db->where('DC.delivery_challan_status ','approved');
			
			$this->db->where('DC.delivery_challan_active_status','enable');
			$this->db->order_by('DC.delivery_challan_id', 'DESC');
			$this->db->limit(10);
			$ret = $this->db->get()->result_array();

			return $ret;
		}
		else
		{
			$this->db->select('DC.*,  CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('delivery_challan as DC');
			//$t/his->db->join('sales_order as SO', 'SO.sales_order_id = DC.delivery_challan_sales_order_id');
			//$this->db->join('sales_order_items as SOI', 'SOI.so_items_sales_id = SO.sales_order_id');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
			$this->db->group_by('SOI.so_items_sales_id');
			$this->db->where('DC.delivery_challan_company_id',$sess_company);
			$this->db->where('DC.delivery_challan_status ','approved');
	 		$this->db->where('DC.delivery_challan_active_status','enable');
			$this->db->order_by('DC.delivery_challan_id', 'DESC');
			$this->db->limit(10);
			$ret = $this->db->get()->result_array();
			
			return $ret;
		}
	}
	
	//** Sales Invoice Validation **//
	
	public function si_vaildation($si_invoice_num)
	{
		$this->db->select('*')
				->from('sale_invoice')
				->where('sale_invoice_no',$si_invoice_num)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	}
	
	
	
	
	public function getsale_orderitems($id)
	{
		$ret = $this->db->select('ITMES.*, U.*,PRO.product_name,PRO.product_code,PRO.product_mfr_part_number')	
					->from('sales_order_items as ITMES')
					->where('ITMES.so_items_sales_id', $id)
					->join('products as PRO', 'PRO.product_id = ITMES.so_items_item_id')
					->join('uom as U', 'U.uom_id = ITMES.so_items_uom_id')
					->get()->result_array();
					
		return $ret;
	}
	
	public function get_dc_items($sales_id, $dc_id, $pricebook_id)
	{
		
		$delivery_challan = $this->db->select('DC.delivery_challan_sales_order_id, DC.delivery_challan_customer_id, DC.delivery_challan_number, DC.delivery_challan_id, DC_ITEMS.delivery_challan_delivered_qty, DC_ITEMS.delivery_challan_item_item_id, DC_ITEMS.delivery_challan_free_qty,DC_ITEMS.delivery_challan_free_qty_item, DC_ITEMS.delivery_challan_item_batch_no, DC_ITEMS.delivery_challan_item_expiry_date, DC_ITEMS.delivery_challan_item_packing_size,PRO.*,PRO_PRIC.product_hsn_sac,PRO_PRIC.product_gst_tax,PRO_PRIC.product_sgst_tax,U.uom_id,U.uom_name,DC_ITEMS.delivery_challan_order_qty,PRIC.*,CUS.customer_discounts_tax')	
					->from('delivery_challan as DC')
					->join('delivery_challan_items as DC_ITEMS', 'DC_ITEMS.delivery_challan_item_dc_id = DC.delivery_challan_id')
					->join('customers as CUS', 'CUS.customer_id = DC.delivery_challan_customer_id')
					->join('products as PRO', 'PRO.product_id = DC_ITEMS.delivery_challan_item_item_id')
					->join('product_price as PRO_PRIC', 'PRO.product_id = PRO_PRIC.product_prd_id')
					->join('product_stock as PRO_STK', 'PRO.product_id = PRO_STK.product_stock_prd_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('price_book_price as PRIC', 'PRO.product_id = PRIC.price_book_price_item_id')
					->where('DC.delivery_challan_id', $dc_id)
					->where('PRIC.price_book_price_pb_id', $pricebook_id)
					->get()->result_array();
		
		
		return $delivery_challan;
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
	
	
	public function add_so_invoice($so_data)
	{
		$this->db->insert('sale_invoice', $so_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	public function add_so_billing($so_billing_data)
	{
		$this->db->insert('sale_invoice_billing_address', $so_billing_data);
		return true;
	}
	public function add_so_shipping($so_shipping_data)
	{
		$this->db->insert('sale_invoice_shipping_address', $so_shipping_data);
		return true;
	}
	public function add_so_items($sale_invoice_item)
	{
		$this->db->insert('sale_invoice_item', $sale_invoice_item);
		return true;
	}
	public function add_si_total($si_total_data)
	{
		$this->db->insert('sale_invoice_total', $si_total_data);
		return true;
	}
	
public function update_invoices_status($sidata,$id)
	{	
		$this->db->where('sale_invoice_id', $id)
				->update('sale_invoice', $sidata);
		
		return true;
	}
	
		public function getsingle_si_total_tax_group($id)
	{
		$this->db->select('*');
		$this->db->from('sales_invoice_tax_group');
	 	$this->db->where('tax_group_sales_invoice_id', $id);
		//$query = $this->db->get()->row();
		$query =  $this->db->get()->result_array();
		//echo "<pre>";
		//print_r($query);
		return $query;
	}
	
	public function get_single_invoice($id)
	{
		$this->db->select('SI.*,CUS.customer_code, CUS.customer_name, CUS.customer_email, CUS.customer_mobile,CB.customer_billing_address, CB.customer_billing_zipcode, ST.state_name, CTRY.country_name, CTY.city_name, MFC.manufacturer_name');
		$this->db->from('sale_invoice as SI');
		//$this->db->join('sale_invoice_total as SIT', 'SIT.sale_invoice_si_id = SI.sale_invoice_id');
		$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
		$this->db->join('customer_billing_address as CB', 'CB.customer_billing_customer_id = SI.sale_invoice_customer_id');
		$this->db->join('manufacturer as MFC', 'MFC.manufacturer_id = SI.sale_invoice_company');
		$this->db->join('country as CTRY', 'CTRY.country_id = CB.customer_billing_country_id');
		$this->db->join('state as ST', 'ST.state_id = CB.customer_billing_state_id');
		$this->db->join('city as CTY', 'CTY.city_id = CB.customer_billing_city_id');
	 	$this->db->where('SI.sale_invoice_id', $id);
		$query = $this->db->get()->row();
	 	//echo "<pre>"; print_r($query); exit;
		return $query;
	}
	
	public function get_maling_invoice($id) 
	{
		$this->db->select('CUS.*,ST.*,CON.*,CTY.*');
		$this->db->from('sale_invoice_billing_address as CUS');
	 	$this->db->where('CUS.sale_invoice_si_id', $id);
		
	 	$this->db->join('country as CON', 'CON.country_id = CUS.customer_billing_country_id');
		$this->db->join('state as ST', 'ST.state_id = CUS.customer_billing_state_id');
		$this->db->join('city as CTY', 'CTY.city_id = CUS.customer_billing_city_id');
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function getsale_id($so_code) 
	{
		$this->db->select('*');
		$this->db->from('sales_order');
	 	$this->db->where('sales_order_number', $so_code);
		$query = $this->db->get()->row();
	 	//echo $this->db->last_query(); exit;
		return $query;
	}
	
	
	public function get_shipping_invoice($id) 
	{
		$this->db->select('CUS.*,ST.*,CON.*,CTY.*');
		$this->db->from('sale_invoice_shipping_address as CUS');
	 	$this->db->where('CUS.sale_invoice_shipping_si_id', $id);
		$this->db->join('country as CON', 'CON.country_id = CUS.customer_billing_country_id');
		$this->db->join('state as ST', 'ST.state_id = CUS.customer_billing_state_id');
		$this->db->join('city as CTY', 'CTY.city_id = CUS.customer_billing_city_id');
		$query = $this->db->get()->row();
		return $query;
	}
	public function get_item_invoice($id) 
	{
		$this->db->select('ITEMS.*,PRO.product_id,PRO.product_code,PRO.product_name, PRO.product_mfr_part_number');
		$this->db->from('sale_invoice_item as ITEMS');
	 	$this->db->where('ITEMS.sale_invoice_item_si_id', $id);
		
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.sale_invoice_item_id');
		//$this->db->join('product_stock as PRST', 'PRST.product_stock_uom_id = U.uom_id');
		$query = $this->db->get()->result_array();
		return $query; 
	}
	
		public function get_item_gross_amount_tax($id) 
	{
		$this->db->select('ITEMS.*,PRO.product_id,PRO.product_code,PRO.product_name, PRO.product_mfr_part_number, U.*');
		$this->db->from('sale_invoice_item as ITEMS');
	 	$this->db->where('ITEMS.sale_invoice_item_si_id', $id);
		$this->db->where('ITEMS.sale_invoice_item_tax_percent !=',0.00);
		$this->db->join('uom as U', 'U.uom_id = ITEMS.sale_invoice_item_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.sale_invoice_item_id');
		$query = $this->db->get()->result_array();
		return $query; 
	}
	
			public function get_item_gross_amount_non_tax($id) 
	{
		$this->db->select('ITEMS.*,PRO.product_id,PRO.product_code,PRO.product_name, PRO.product_mfr_part_number, U.*');
		$this->db->from('sale_invoice_item as ITEMS');
	 	$this->db->where('ITEMS.sale_invoice_item_si_id', $id);
		$this->db->where('ITEMS.sale_invoice_item_tax_percent =',0.00);
		$this->db->join('uom as U', 'U.uom_id = ITEMS.sale_invoice_item_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.sale_invoice_item_id');
		$query = $this->db->get()->result_array();
		return $query; 
	}
	
	public function get_item_total($id)
	{
		$this->db->select('*');
		$this->db->from('sale_invoice_total');
	 	$this->db->where('sale_invoice_si_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function update_so_invoice($so_data,$id)
	{
		$this->db->where('sale_invoice_id', $id);
		$this->db->update('sale_invoice', $so_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	public function getcus_bill_det($cus_id)
	{
		$ret = $this->db->select('CB.*, ST.*, CTRY.*, CTY.*')
					->from('customer_billing_address as CB')
					 ->join('country AS CTRY','CTRY.country_id = CB.customer_billing_country_id')
					  ->join('state AS ST','ST.state_id = CB.customer_billing_state_id')
					   ->join('city AS CTY','CTY.city_id = CB.customer_billing_city_id')				 
					 
					->where('CB.customer_billing_customer_id' ,$cus_id)
					->get()->row();
		return $ret;
	}
	
	 public function getcus_ship_det($cus_id)
	{
		$ret = $this->db->select('CB.*, ST.*, CTRY.*, CTY.*')
					->from('customer_shipping_address as CB')
					 ->join('country AS CTRY','CTRY.country_id = CB.customer_shipping_country_id')
					  ->join('state AS ST','ST.state_id = CB.customer_shipping_state_id')
					   ->join('city AS CTY','CTY.city_id = CB.customer_shipping_city_id')				 
					->where('CB.customer_shipping_customer_id' ,$cus_id) 
					 
					->get()->row();
		return $ret;
	}
	
	
	public function update_so_billing($so_billing_data,$id)
	{
		$this->db->where('sale_invoice_si_id', $id);
		$this->db->update('sale_invoice_billing_address', $so_billing_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	public function update_so_shipping($so_shipping_data,$id)
	{
		$this->db->where('sale_invoice_shipping_si_id', $id);
		$this->db->update('sale_invoice_shipping_address', $so_shipping_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
		public function update_si_total($si_total_data,$id)
	{
		$this->db->where('sale_invoice_si_id', $id);
		$this->db->update('sale_invoice_total', $si_total_data);
		//echo $this->db->last_query(); exit;
		return  true;
	}
	
	
	public function update_so_items($sale_invoice_item,$id,$item_id)
	{
		$this->db->select('*')
				->from('sale_invoice_item')
				->where('sale_invoice_item_si_id',$id)
				->where('sale_invoice_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		
		if($num == 0)
		{
			$this->db->insert('sale_invoice_item', $sale_invoice_item);
		}
		{
 			$this->db->where('sale_invoice_item_si_id',$id);
 			$this->db->where('sale_invoice_item_id',$item_id);
			$this->db->update('sale_invoice_item', $sale_invoice_item);
		}
		// echo $this->db->last_query(); exit;
		return true;
			
	}
	
	 public function update_so_shipping_address($so_shipping_data,$cus_id) 
	{	
		$this->db->where('customer_shipping_customer_id', $cus_id)
				->update('customer_shipping_address', $so_shipping_data);
		
		return true;
	}  	
	
	 public function update_so_billing_address($so_billing_data,$cus_id)
	{	
		$this->db->where('customer_billing_customer_id', $cus_id)
				->update('customer_billing_address', $so_billing_data);
		
		return true;
	}  	
	
	

	 public function get_cus_namee($cus_id)
	{	
		$this->db->select('*');
		$this->db->from('customers');
	 	$this->db->where('customer_id', $cus_id);
		$query = $this->db->get()->row();
		return $query;
	 
	}
	
	public function update_dc_status($dc_update_data,$sale_invoice_dc_no)
	{	
		$this->db->where('delivery_challan_number', $sale_invoice_dc_no)
				->update('delivery_challan', $dc_update_data);
		
		return true;
	}
	
	public function getsalesordersearch($so_code,$customer_name,$sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$this->db->select('SO.*, CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('sales_order as SO');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
	 		$this->db->where('SO.sales_order_status', 'created');
			$this->db->where('sales_order_active_status' ,'active');
			$this->db->order_by('sales_order_id', 'DESC');
			$this->db->limit(10);
			if($so_code != "")
		{
			$this->db->like('SO.sales_order_number',$so_code);
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name);
		}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
		else
		{
			$this->db->select('SO.*, CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('sales_order as SO');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
			$this->db->where('sales_order_company_id',$sess_company);
	 		$this->db->where('SO.sales_order_status', 'created');
			$this->db->where('sales_order_active_status' ,'active');
			$this->db->order_by('sales_order_id', 'DESC');
			$this->db->limit(10);
			if($so_code != "")
		{
			$this->db->like('SO.sales_order_number',$so_code);
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name);
		}
		$ret = $this->db->get()->result_array();
		return $ret;
		}
		
		
		
	}
	
	public function getdeliverychallansearch($dc_code,$customer_name,$sess_group,$sess_company,$po_refernce_no)
	{
		if($sess_group == 1)
		{
			
			$this->db->select('DC.*,  CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('delivery_challan as DC');
			//$this->db->join('sales_order as SO', 'SO.sales_order_id = DC.delivery_challan_sales_order_id');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
	 		$this->db->where('DC.delivery_challan_status ','approved');
			
			$this->db->where('DC.delivery_challan_active_status','enable');
			$this->db->order_by('DC.delivery_challan_id', 'DESC');
			$this->db->limit(10);
			if($dc_code != "")
		{
			$this->db->like('DC.delivery_challan_number',$dc_code);
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name);
		}
		if($po_refernce_no != "")
		{
			$this->db->like('SO.sale_order_customer_po_refernce_number',$po_refernce_no);
		}
		$ret = $this->db->get()->result_array();
		//echo $this->db->last_query(); exit;	
		return $ret;
		}
		else
		{
			$this->db->select('DC.*, CUS.customer_code, CUS.customer_name, CUS.customer_discounts_tax, CUS.customer_price_list');
			$this->db->from('delivery_challan as DC');
			//$this->db->join('sales_order as SO', 'SO.sales_order_id = DC.delivery_challan_sales_order_id');
			$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
			$this->db->where('DC.delivery_challan_company_id',$sess_company);
			$this->db->where('DC.delivery_challan_status ','approved');
	 		$this->db->where('DC.delivery_challan_active_status','enable');
			$this->db->order_by('DC.delivery_challan_id', 'DESC');
			$this->db->limit(10);
			if($dc_code != "")
		{
			$this->db->like('DC.delivery_challan_number',$dc_code);
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name);
		}
		if($po_refernce_no != "")
		{
			$this->db->like('SO.sale_order_customer_po_refernce_number',$po_refernce_no);
		}
		$ret = $this->db->get()->result_array();
		//echo $this->db->last_query(); exit;	
		return $ret;
		}
		
		
	}

	public function add_so_payment_details($so_payment_details)
	{
		$this->db->insert('invoice_payment_details', $so_payment_details);
		return true;
	}
	
	public function update_so_order_status($sales_order_status,$sales_order_id)
	{
		$this->db->where('sales_order_id', $sales_order_id);
		$this->db->update('sales_order', $sales_order_status);
		
		return true;

	}
	
	public function get_cus_accounts($cus_id)
	{	
	
		$ret=$this->db->select('*')
				->from('customers_accounts')
				->where('customers_accounts_customer_id',$cus_id)
				->get()->row();
		
		return $ret;
	
	}
	
	public function add_so_customer_accounts_details($so_customer_accounts_details)
	{
		$this->db->insert('customers_accounts', $so_customer_accounts_details);
		return true;
	}
	
	public function update_so_customer_accounts_details($so_customer_accounts_details,$cus_id)
	{	
		$this->db->where('customers_accounts_customer_id', $cus_id);
		$this->db->update('customers_accounts', $so_customer_accounts_details);
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
	//////////////Inventory Updation
	
	public function getstock_item_details($item_id)
	{
		$num=$this->db->select('inventory_qty')
				->from('inventory')
				->where('inventory_item_id',$item_id)
				->get()->row();
		 return $num;
	}
	
	public function update_cur_stock($cur_stock_items,$item_id)
	{
		$this->db->where('inventory_item_id', $item_id)
				->update('inventory', $cur_stock_items);
		
		return true;
	
	}
	
	//** Add Tax Group **//
	
	public function add_tax_group($tax_group)
	{
		$this->db->insert('sales_invoice_tax_group', $tax_group);
		return  true;
	}
	
	//** Get All SalesInvoice Tax Group Details **//
	
	public function get_tax_group($id)
	{
		$ret = $this->db->select('TG.*')
					->from('sales_invoice_tax_group as TG')
					->where('TG.tax_group_sales_invoice_id' ,$id)
					->get()->result_array();
	 	return $ret;  
	}
	
	
	//** Delete All SalesInvoice Tax Group Details **//
	
	public function delete_tax_group($id)
	{
		$this->db->where('tax_group_sales_invoice_id',$id);
		$this->db->delete('sales_invoice_tax_group');
		
		return true;
	  
	}
	
		public function delete_sales_invoice_items($id)
	{
		$this->db->where('sale_invoice_item_si_id',$id);
		$this->db->delete('sale_invoice_item');
		// echo $this->db->last_query(); exit;
	}


	//** Add Tax Group **//
	
	public function update_tax_group($tax_group)
	{
		$this->db->insert('sales_invoice_tax_group', $tax_group);
		return  true;
	}

	
	 
}