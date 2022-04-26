<?php

Class Instantsalesinvoicemodel extends CI_Model
{
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
 
 	public function get_all_SI($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		
			$ret['rows'] = $this->db->select('SI.*,CUS.*')
								->from('sale_invoice as SI')
								->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')
								->where('SI.sale_invoice_active_status','active')
								->order_by($sort_order,$sort_by)
								->limit($limit, $start)
								->get()->result_array();


			$Count = $this->db->select('count(*) as TotalRows')
								->from('sale_invoice as SI')
								->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')
								->where('SI.sale_invoice_active_status','active')
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;

				 
		return $ret;
	}
	
	public function search_get_all_SI($sess_group,$sess_company,$search_si_no,$search_so_no,$search_status,$limit,$page,$sort_order,$sort_by,$search_cus_name,$from_date,$to_date)
	{
		
			$this->db->select('SI.*,CUS.customer_name');
			$this->db->from('sale_invoice as SI');
			$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
			
			if($search_si_no != "")
			{
				$this->db->like('SI.sale_invoice_no',$search_si_no);
			}
			
			if($search_status != "")
			{
				$this->db->like('SI.sale_invoice_status',$search_status);
			}
			if($search_cus_name != "")
			{
				$this->db->like('CUS.customer_name',$search_cus_name);
			}
			
			 
			$this->db->where('SI.sale_invoice_status !=','returned');
			$this->db->where('SI.sale_invoice_company_id',$sess_company);
			$this->db->order_by($sort_order,$sort_by);	
			$this->db->limit($limit,$page);
			$this->db->order_by($sort_order,$sort_by);	
			$ret['rows'] = $this->db->get()->result_array();
	

			 $this->db->select('count(*) as TotalRows');
			  $this->db->from('sale_invoice as SI');
			  $this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
			 
			  if($search_si_no != "")
			  {
			  $this->db->like('SI.sale_invoice_no',$search_si_no);
			  }
			  
			   
			  if($search_status != "")
			  {
			  $this->db->like('SI.sale_invoice_status',$search_status);
			  }
			  if($search_cus_name != "")
			  {
			  $this->db->like('CUS.customer_name',$search_cus_name);
			  }
			  
			  
			$this->db->where('SI.sale_invoice_status !=','returned');
			$this->db->where('SI.sale_invoice_company_id',$sess_company);
			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		
		
	}
	
	public function getlastid_si()
	{
		
		$ret =  $this->db->select('sale_invoice_no,sale_invoice_company_id,sale_invoice_no')
						->from('sale_invoice')
						->order_by('sale_invoice_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	public function getlastid_so()
	{
		
		$ret =  $this->db->select('sales_order_number')
						->from('sales_order')
						->order_by('sales_order_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}

	public function getlastidwithcompany($sess_company)
	{
		
		$ret =  $this->db->select('sale_invoice_no,sale_invoice_company_id,sale_invoice_no')
						->from('sale_invoice')
						->where('sale_invoice_company_id', $sess_company)
						->order_by('sale_invoice_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
 	public function getsalerequest_for_popup_grid($sess_group,$sess_company)
	{ 
		if($sess_group == 1)
		{
		$ret = $this->db->select('*')
					->from('sales_order')
					//->join('sales_order_billing_address AS SBA','SBA.sales_order_billing_sales_order_id = SO.sales_order_id')
				//	->join('sales_order_shipping_address AS SSA','SSA.sales_order_shipping_sales_order_id = SO.sales_order_id')
					->order_by('sales_order_id', 'DESC')
					->where('sales_order_status' ,'created')
					//->where('sales_order_status !=' ,'delivered')
					->where('sales_order_active_status' ,'active')
					->limit (10)
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('*')
					->from('sales_order')
					//->join('sales_order_billing_address AS SBA','SBA.sales_order_billing_sales_order_id = SO.sales_order_id')
				//	->join('sales_order_shipping_address AS SSA','SSA.sales_order_shipping_sales_order_id = SO.sales_order_id')
					->order_by('sales_order_id', 'DESC')
					->where('sales_order_status' ,'created ')
				//	->where('sales_order_status !=' ,'delivered')
					->where('sales_order_active_status' ,'active')
					->where('sales_order_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
					//echo $this->db->last_query(); exit;
		return $ret;
		}
	}
	
	 public function dc_for_popup_grid($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('*')
					->from('delivery_challan')
					->order_by('delivery_challan_id', 'DESC')
					->where('delivery_challan_status !=' ,'cancelled')
					->where('delivery_challan_status !=' ,'delivered')
					->where('delivery_challan_active_status' ,'enable')
					->limit (10)
					->get()->result_array();
		return $ret;
		}
		else
		{
		$ret = $this->db->select('*')
					->from('delivery_challan')
					->order_by('delivery_challan_id', 'DESC')
					->where('delivery_challan_status !=' ,'cancelled')
					->where('delivery_challan_status !=' ,'delivered')
					->where('delivery_challan_active_status' ,'enable')
					->where('delivery_challan_company_id',$sess_company)
					->limit (10)
					->get()->result_array();
		return $ret;
		}
	}
	
	public function getsale_orderitems($id)
	{
		//echo $id;exit;
		$ret = $this->db->select('ITMES.*, U.*,PRO.product_name,PRO.product_code,PRO.product_mfr_part_number')	
					->from('sales_order_items as ITMES')
					->where('ITMES.so_items_sales_id', $id)
					->join('products as PRO', 'PRO.product_id = ITMES.so_items_item_id')
					->join('uom as U', 'U.uom_id = ITMES.so_items_uom_id')
 
					->get()->result_array();
					
		// echo $this->db->last_query(); exit;	
		return $ret;
	}
	
	public function get_dc_items($sales_id, $dc_id)
	{
		
		$delivery_challan = $this->db->select('DC.delivery_challan_sales_order_id, DC.delivery_challan_customer_id, DC.delivery_challan_number, DC.delivery_challan_id, DC_ITEMS.delivery_challan_delivered_qty, DC_ITEMS.delivery_challan_item_item_id')	
					->from('delivery_challan as DC')
					->where('DC.delivery_challan_id', $dc_id)
				
					->join('delivery_challan_items as DC_ITEMS', 'DC_ITEMS.delivery_challan_item_dc_id = DC.delivery_challan_id')
					->get()->result_array();
			
		
		
		$result = array();
		$i=0;
		
		foreach($delivery_challan as $DC)
		{
			$sales_order_itmes = $this->db->select('ITEMS.so_items_item_id, ITEMS.so_items_code, ITEMS.so_items_name, ITEMS.so_items_model, ITEMS.so_items_uom_id, ITEMS.so_items_qty, ITEMS.so_items_ord_qty, ITEMS.so_items_priceperunit, ITEMS.so_items_gross_amount, ITEMS.so_items_vat, ITEMS.so_items_cst, ITEMS.so_items_gst, ITEMS.so_items_service_tax, ITEMS.so_items_ex_duty, ITEMS.so_items_tax_percent, ITEMS.so_items_tax_amount, ITEMS.so_items_discounts_percentage, ITEMS.so_items_discounts_amount, ITEMS.so_items_net_amount, U.uom_id, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number')	
					->from('sales_order_items as ITEMS')
					->where('ITEMS.so_items_sales_id', $DC['delivery_challan_sales_order_id'])
					->where('ITEMS.so_items_item_id', $DC['delivery_challan_item_item_id'])
					->join('products as PRO', 'PRO.product_id = ITEMS.so_items_item_id')
					->join('uom as U', 'U.uom_id = ITEMS.so_items_uom_id')
					->get()->row();
				
			$result[$i]['delivery_challan_sales_order_id'] = $DC['delivery_challan_sales_order_id'];
			$result[$i]['delivery_challan_customer_id'] = $DC['delivery_challan_customer_id'];
			$result[$i]['delivery_challan_number'] = $DC['delivery_challan_number'];
			$result[$i]['delivery_challan_id'] = $DC['delivery_challan_id'];
			$result[$i]['delivery_challan_delivered_qty'] = $DC['delivery_challan_delivered_qty'];
			$result[$i]['delivery_challan_item_item_id'] = $DC['delivery_challan_item_item_id'];
			
			$result[$i]['so_items_item_id'] = $sales_order_itmes->so_items_item_id;
			$result[$i]['so_items_code'] = $sales_order_itmes->product_code;
			$result[$i]['so_items_name'] = $sales_order_itmes->product_name;
			$result[$i]['so_items_model'] = $sales_order_itmes->product_mfr_part_number;
			$result[$i]['so_items_uom_id'] = $sales_order_itmes->so_items_uom_id;
			$result[$i]['so_items_qty'] = $sales_order_itmes->so_items_qty;
			$result[$i]['so_items_ord_qty'] = $sales_order_itmes->so_items_ord_qty;
			$result[$i]['so_items_priceperunit'] = $sales_order_itmes->so_items_priceperunit;
			$result[$i]['so_items_gross_amount'] = $sales_order_itmes->so_items_gross_amount;
			$result[$i]['so_items_vat'] = $sales_order_itmes->so_items_vat;
			$result[$i]['so_items_cst'] = $sales_order_itmes->so_items_cst;
			$result[$i]['so_items_gst'] = $sales_order_itmes->so_items_gst;
			$result[$i]['so_items_service_tax'] = $sales_order_itmes->so_items_service_tax;
			$result[$i]['so_items_ex_duty'] = $sales_order_itmes->so_items_ex_duty;
			$result[$i]['so_items_tax_percent'] = $sales_order_itmes->so_items_tax_percent;
			$result[$i]['so_items_tax_amount'] = $sales_order_itmes->so_items_tax_amount;
			$result[$i]['so_items_discounts_percentage'] = $sales_order_itmes->so_items_discounts_percentage;
			$result[$i]['so_items_discounts_amount'] = $sales_order_itmes->so_items_discounts_amount;
			$result[$i]['so_items_net_amount'] = $sales_order_itmes->so_items_net_amount;
			$result[$i]['uom_id'] = $sales_order_itmes->uom_id;
			$result[$i]['uom_name'] = $sales_order_itmes->uom_name;
			
			$i++;
		}
		
		return $result;
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
	
	//////////**********   Add Sales Invoice Data  *************/////////
	
	public function add_so_invoice($si_data)
	{
		$this->db->insert('sale_invoice', $si_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	//////////**********   Add Sales Invoice Item Data  *************/////////
	
	public function add_si_items($sale_invoice_item)
	{
		$this->db->insert('sale_invoice_item', $sale_invoice_item);
		return true;
	}

	//////////**********   Add Sales Invoice Item Total Data  *************/////////

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
	
	
	/*public function get_single_invoice($id)
	{
		$this->db->select('*');
		$this->db->from('sale_invoice');
	 	$this->db->where('sale_invoice_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}*/
	
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
		$this->db->select('ITEMS.*,PRO.product_name, PRO.product_mfr_part_number, U.*');
		$this->db->from('sale_invoice_item as ITEMS');
	 	$this->db->where('ITEMS.sale_invoice_item_si_id', $id);
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
	
	public function getsalesordersearch($so_code,$customer_name)
	{
		$this->db->select('SO.*,CUS.*');
		$this->db->from('sales_order as SO');
		$this->db->join('customers as CUS','CUS.customer_id = SO.sales_order_customer_id');
		$this->db->where('SO.sales_order_status !=','delivered');
		$this->db->where('SO.sales_order_status !=','cancelled');
		$this->db->where('SO.sales_order_active_status','active');
	
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
	
	public function getdeliverychallansearch($dc_code,$customer_name)
	{
		$this->db->select('DC.*,CUS.*');
		$this->db->from('delivery_challan as DC');
		$this->db->join('customers as CUS','CUS.customer_id = DC.delivery_challan_customer_id');
		$this->db->where('DC.delivery_challan_status !=','delivered');
		$this->db->where('DC.delivery_challan_status !=','cancelled');
		$this->db->where('DC.delivery_challan_active_status','enable');
	
		if($dc_code != "")
		{
			$this->db->like('DC.delivery_challan_number',$dc_code);
		}
		if($customer_name != "")
		{
			$this->db->like('CUS.customer_name',$customer_name);
		}
		$ret = $this->db->get()->result_array();
		//echo $this->db->last_query(); exit;	
		return $ret;
		
	}

	////****   Add Invoice Payment Details ****////

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
	

	/*****  Get Customer Accounts ******/

	public function get_cus_accounts($so_customer_id)
	{	
	
		$ret=$this->db->select('*')
				->from('customers_accounts')
				->where('customers_accounts_customer_id',$so_customer_id)
				->get()->row();
		
		return $ret;
	
	}

	/*****  Update Customer Accounts Credit and debit amount ******/

	public function update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id)
	{	
		$this->db->where('customers_accounts_customer_id', $so_customer_id);
		$this->db->update('customers_accounts', $so_customer_accounts_details);
		// echo $this->db->last_query(); exit;
		return  true;
	}

	/*****  Add Customer Accounts Credit and debit amount ******/

	public function add_so_customer_accounts_details($so_customer_accounts_details)
	{
		$this->db->insert('customers_accounts', $so_customer_accounts_details);
		return true;
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
	
	public function get_single_invoice($id)
	{
		$this->db->select('SI.*, CUS.*,PAY_MD.payment_mode_name,MFC.manufacturer_name,PTYP.products_type_name');
		$this->db->from('sale_invoice as SI');
		$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
	    $this->db->join('payment_mode as PAY_MD', 'PAY_MD.payment_mode_id = SI.sale_invoice_payment_mode');
		$this->db->join('products_type as PTYP', 'PTYP.products_type_id = SI.sales_invo_courier_type');
		$this->db->join('manufacturer as MFC', 'MFC.manufacturer_id = SI.sale_invoice_company');
	 	$this->db->where('SI.sale_invoice_id', $id);
		$query = $this->db->get()->row();
	 	//echo "<pre>"; print_r($query); exit;
		return $query;
	}

////******  For Instant Sales Invoice ******////
	
	public function get_all_pay_mode()
	{
		$ret = $this->db->select('PM.payment_mode_id, PM.payment_mode_name')
					->from('payment_mode as PM')
					->get()->result_array();
					
		return $ret;
	}

	public function get_sales_person()
	{
		$ret = $this->db->select('*')
				->from('users')
				->where('user_group_id', '3')  
				->get()->result_array();
				
		return $ret;

	}

	////******  Add  Sales Order ******////
	
	public function add_so_details($so_data)
	{
		$this->db->insert('sales_order', $so_data);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
		
	}
	
	public function update_so_details($so_data,$sales_order_id)
	{
		$this->db->where('sales_order_id', $sales_order_id);
		$this->db->update('sales_order', $so_data);
		
		return  true;
	}
	
	public function delete_instant_sales_invoice_items($invoice_id)
	{
		$this->db->where('sale_invoice_item_si_id',$invoice_id);
		$this->db->delete('sale_invoice_item');
		//echo $this->db->last_query(); exit;
	}
	
	
		public function delete_instant_sales_order_items($sales_order_id)
	{
		$this->db->where('so_items_sales_id',$sales_order_id);
		$this->db->delete('sales_order_items');
		//echo $this->db->last_query(); exit;
	}
	
	public function update_so_Item_details($so_itemdata,$item_id,$sales_order_id)
	{
		
		$this->db->select('*')
				->from('sales_order_items')
				->where('so_items_sales_id',$sales_order_id)
				->where('so_items_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('sales_order_items', $so_itemdata);
		}
		else
		{
			$this->db->where('so_items_sales_id', $sales_order_id);
			$this->db->where('so_items_item_id', $item_id);
			$this->db->update('sales_order_items', $so_itemdata);
		}
		return true;
		
	}
	
	public function delete_tax_group($sales_order_id)
	{
		$this->db->where('tax_group_sales_order_id',$sales_order_id);
		$this->db->delete('sales_order_tax_group');
		return true;
	}
	
	
	public function update_tax_group($tax_group)
	{
		$this->db->insert('sales_order_tax_group', $tax_group);
		return  true;
	}

	//** Update Sales Order Item Total **//
	
	public function update_so_total_price($so_totalprice,$sales_order_id)
	{
		$this->db->where('so_total_sales_id', $sales_order_id);
		$this->db->update('sales_order_total', $so_totalprice);
		
		return  true;
	}
	
	////****** Update SalesOrder Shipping Address ******////

	public function update_so_shipping_address($so_shipping_details,$so_customer_id)
	{
		$this->db->where('customer_shipping_customer_id', $so_customer_id);
		$this->db->update('customer_shipping_address', $so_shipping_details);
		
		return  true;
	}

	////****** Update SalesOrder Billing Address ******////
	
	public function update_so_billing_address($so_billing_details,$so_customer_id)
	{
		$this->db->where('customer_billing_customer_id', $so_customer_id);
		$this->db->update('customer_billing_address', $so_billing_details);
		
		return  true;
	}

	////******  SalesOrder Item Details ******////

	public function add_so_Item_details($so_itemdata)
	{
		$this->db->insert('sales_order_items', $so_itemdata);
		return true;
		
	}

	////******  SalesOrder Item Total Details ******////

	public function add_so_total_price($so_totalprice)
	{
		$this->db->insert('sales_order_total', $so_totalprice);
		return true;
		
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
	
	public function update_so_invoice($so_data,$id)
	{
		$this->db->where('sale_invoice_id', $id);
		$this->db->update('sale_invoice', $so_data);
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
	
	//** Delete All SalesInvoice Tax Group Details **//
	
	public function delete_salesinvoice_tax_group($id)
	{
		$this->db->where('tax_group_sales_invoice_id',$id);
		$this->db->delete('sales_invoice_tax_group');
		
		return true;
	  
	}


	//** Add Tax Group **//
	
	public function update_salesinvoice_tax_group($tax_group)
	{
		$this->db->insert('sales_invoice_tax_group', $tax_group);
		return  true;
	}
	
	public function update_si_total($si_total_data,$id)
	{
		$this->db->where('sale_invoice_si_id', $id);
		$this->db->update('sale_invoice_total', $si_total_data);
		return  true;
	}
	 
}