<?php

Class Vendorquotemodule extends CI_Model
{
	 //** Get Vendor Quotation Prefix**//
	 
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Search Vendor Quotation **//
	
	public function get_search_vendor_quotation($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_vq_order,$search_vend_name,$search_status,$search_mr_no,$from_date,$to_date)
	{
		if($sess_group == 1)
		{
			$this->db->select('VQ.*,VEN.vendor_name,VEN.vendor_id,VEN.vendor_code');
			$this->db->from('vendor_quotation as VQ');
			$this->db->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id');
			if($search_vq_order != '')
			{
				$this->db->like('VQ.vendor_quote_qoute_no',$search_vq_order);
			}
			if($search_vend_name != '')
			{
				$this->db->like('VEN.vendor_name',$search_vend_name);
			}
			if($search_mr_no != '')
			{
				$this->db->like('VQ.vendor_quote_met_req_no',$search_mr_no);
			}
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
				$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				}
				if($from_date == "1970-01-01"  && $to_date != '' )
				{
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				}
				if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				{
					$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				} 
			} 
			if($search_status != '')
			{
				$this->db->like('VQ.vendor_quote_cur_status',$search_status);
			}
			$this->db->where('VQ.vendor_quote_status','active');
			$this->db->order_by($sort_order, $sort_by);
			$this->db->limit($limit,$page);
			
			$ret['rows'] = $this->db->get()->result_array();
			
			$this->db->select('count(*) as TotalRows');
			$this->db->from('vendor_quotation as VQ');
			$this->db->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id');
			$this->db->order_by('VQ.vendor_quote_id', 'DESC');
			if($search_vq_order != '')
			{
				$this->db->like('VQ.vendor_quote_qoute_no' ,$search_vq_order);
			}
			if($search_vend_name != '')
			{
				$this->db->like('VEN.vendor_name' ,$search_vend_name);
			}
			 
			if($search_mr_no != '')
			{
				$this->db->like('VQ.vendor_quote_met_req_no' ,$search_mr_no);
			}
			
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
				$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				}
				if($from_date == "1970-01-01"  && $to_date != '' )
				{
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				}
				if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				{
					$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				} 
			}
			if($search_status != '')
			{
				$this->db->like('VQ.vendor_quote_cur_status' ,$search_status);
			}
			$this->db->where('VQ.vendor_quote_status' ,'active');
			$Count = $this->db->get()->row();
			
			$ret['num_rows'] = $Count->TotalRows;

			return $ret;
		}
		else
		{
			$this->db->select('VQ.*,VEN.vendor_name,VEN.vendor_id,VEN.vendor_code');
			$this->db->from('vendor_quotation as VQ');
			$this->db->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id');
		
			if($search_vq_order != '')
			{
				$this->db->like('VQ.vendor_quote_qoute_no' ,$search_vq_order);
			}
			if($search_vend_name != '')
			{
				$this->db->like('VEN.vendor_name' ,$search_vend_name);
			}
			 
			if($search_mr_no != '')
			{
				$this->db->like('VQ.vendor_quote_met_req_no' ,$search_mr_no);
			}
			
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )
			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
				$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				}
				if($from_date == "1970-01-01"  && $to_date != '' )
				{
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				}
				if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				{
					$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				} 
				
			}
	
			if($search_status != '')
			{
				$this->db->like('VQ.vendor_quote_cur_status' ,$search_status);
			}
			$this->db->where('VQ.vendor_quote_status' ,'active');
			$this->db->where('VQ.vendor_quote_company_id' ,$sess_company);
			$this->db->limit($limit,$page);
			$this->db->order_by($sort_order, $sort_by);
		
			$ret['rows'] =	$this->db->get()->result_array();

			$this->db->select('count(*) as TotalRows');
			$this->db->from('vendor_quotation as VQ');
			$this->db->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id');
 			$this->db->order_by('VQ.vendor_quote_id', 'DESC');
			if($search_vq_order != '')
			{
				$this->db->like('VQ.vendor_quote_qoute_no' ,$search_vq_order);
			}
			if($search_vend_name != '')
			{
				$this->db->like('VEN.vendor_name' ,$search_vend_name);
			}
			 
			if($search_mr_no != '')
			{
				$this->db->like('VQ.vendor_quote_met_req_no' ,$search_mr_no);
			}
			
			if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

			{	
				if($from_date != '' && $to_date == "1970-01-01")
				{
				$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				}
				if($from_date == "1970-01-01"  && $to_date != '' )
				{
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				}
				if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
				{
					$this->db->where('VQ.vendor_quote_trans_date >=', $from_date);
				$this->db->where('VQ.vendor_quote_trans_date <=', $to_date);
				} 
				
			}

			if($search_status != '')
			{
				$this->db->like('VQ.vendor_quote_cur_status' ,$search_status);
			}
			$this->db->where('VQ.vendor_quote_status' ,'active');
			$this->db->where('VQ.vendor_quote_company_id' ,$sess_company);
			$Count = $this->db->get()->row();

$ret['num_rows'] = $Count->TotalRows;
return $ret;
}
	}
	
	//** Get Vendor Quotation where session Company and session Group **//
	public function get_vendor_quotation($limit,$start,$sort_order,$sort_by,$sess_company,$sess_group)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('VQ.*,VEN.vendor_name,VEN.vendor_code')
									->from('vendor_quotation as VQ')
									->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id')
									->where('vendor_quote_status' ,'active')
									 ->order_by($sort_order, $sort_by)
									->limit($limit, $start)
									->get()->result_array();
		
			$Count = $this->db->select('count(*) as TotalRows')
									->from('vendor_quotation AS VQ')
										 
									->where('vendor_quote_status' ,'active')
									->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
			$ret['rows'] = $this->db->select('VQ.*,VEN.vendor_name,VEN.vendor_code')
									->from('vendor_quotation as VQ')
									->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id')
									->where('vendor_quote_status' ,'active')
									->where('VQ.vendor_quote_company_id' ,$sess_company)
									 ->order_by($sort_order, $sort_by)
									->limit($limit, $start)
									->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
									->from('vendor_quotation AS VQ')
									->where('vendor_quote_status' ,'active')
									->where('VQ.vendor_quote_company_id' ,$sess_company)
									->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	
	//** Get Vendor Quotation Last Id**//
	
	public function getlastid()
	{
		
		$ret =  $this->db->select('vendor_quote_qoute_no')
						->from('vendor_quotation')
						->order_by('vendor_quote_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	//** Get Single Vendor Quotation Details**//
	
	public function get_single_quotation($id)
	{
		$this->db->select('VQ.*,VEN.vendor_name,VEN.vendor_code,PA.payment_mode_name');
		$this->db->from('vendor_quotation as VQ');
	 	$this->db->where('VQ.vendor_quote_id',$id);
		$this->db->join('vendors as VEN','VQ.vendor_quote_vendor_id =VEN.vendor_id');
		$this->db->join('payment_mode as PA','PA.payment_mode_id =VQ.vendor_quote_payment_mode');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Get Single Vendor Quotation Item Details**//
	
	public function get_single_quotation_item($id)
	{
		$this->db->select('VQ.*,PRO.product_id,PRO.product_name,PRO.product_code,PRO.product_mfr_part_number,U.uom_name,U.uom_id');
		$this->db->from('vendor_qoute_item as VQ');
	 	$this->db->where('VQ.vquote_vendor_quoute_id', $id);
		$this->db->join('products as PRO', 'PRO.product_id = VQ.vquote_items_item_id');
		$this->db->join('uom as U', 'U.uom_id = VQ.vquote_items_uom_id');
		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	public function get_single_item_count($id)
	{
		$this->db->select('*');
		$this->db->from('vendor_qoute_item');
	 	$this->db->where('vquote_vendor_quoute_id', $id);
		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	//** Add Vendor Quotation Details**//
		
	public function add_vendor_qoute($vqoute_data)
	{
		$this->db->insert('vendor_quotation', $vqoute_data);   
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Add Vendor Quotation Item Details**//
	
	public function add_qouteitems($qouteitems)
	{
		$this->db->insert('vendor_qoute_item', $qouteitems);
		return  true;
	}
	
	//** Add Vendor Quotation Item Total Details**//
	
	public function add_qouteitems_total($qouteitemstotal)
	{
		$this->db->insert('vendor_quotation_items_total', $qouteitemstotal);
		return  true;	
	}
	
	//** Get All Payment Mode **//
	
	public function get_all_pay_mode()
	{
		$ret = $this->db->select('PM.payment_mode_id, PM.payment_mode_name')
					->from('payment_mode as PM')
					->get()->result_array();			
		return $ret;
	}
	
	//** Delete Vendor Quatation Items in Grid **//
	
	public function delete_vendor_qoute_items($id)
	{
		$this->db->where('vquote_vendor_quoute_id',$id);
		$this->db->delete('vendor_qoute_item');
	}
	
	//** Update Vendor Quotation Item Details**//
	
	public function update_qouteitems($qouteitems,$id,$item_id)
	{
		$this->db->select('*')
				->from('vendor_qoute_item')
				->where('vquote_vendor_quoute_id',$id)
				->where('vquote_items_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('vendor_qoute_item', $qouteitems);
		}
		{
			$this->db->where('vquote_vendor_quoute_id', $id);
			$this->db->where('vquote_items_item_id', $item_id);
			$this->db->update('vendor_qoute_item', $qouteitems);
		}
		return true;
			
	}
	
	//** Update Vendor Quotation Details**//
	
	public function update_vendor_qoute($vqoute_data,$id)
	{
		$this->db->where('vendor_quote_id', $id)
				->update('vendor_quotation', $vqoute_data);
		return true;	
	}
	
	//** Update Vendor Quotation Item Total Details**//
	
	public function update_qouteitems_total($qouteitemstotal,$id)
	{
		$this->db->where('vquote_vendor_quoute_id', $id)
				->update('vendor_quotation_items_total', $qouteitemstotal);
		return true;	
	}
	
	//** Vendor Quatation Status Change **//
	
	public function del_vendorquotate($vendor_del,$id)
	{	
		$this->db->where('vendor_quote_id', $id)
				->update('vendor_quotation', $vendor_del);
		
		return true;
	}
	
	//** Get All Products Details **//
	
	public function get_allproductsdetails()
	{
		$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
						->from('products as PRO')
						->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
						->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
						->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
						->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
						->where('PRO.product_status','enable')
						->get()->result_array();
		return $ret;
	}
	
	//** Get all Products for single item **//
	
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
						->where('PRO.product_company_id',$sess_company)
						->get()->result_array();
			return $ret;
		}
	}
	
	//** Onchange Item Pop-up item details **//
	
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
	
	//** Multiple Product Details **//
	
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
	
	//** Get All product with multiple search **//
	
	public function getproductsdetailswithmultiplesearch($sess_group,$sess_company,$product_type,$product_group,$item_code,$item_mfg_prtno,$item_name)
	{
		if($sess_group == 1)
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
			if($item_mfg_prtno != "")
			{
				$this->db->like('PRO.product_mfr_part_number',$item_mfg_prtno);
			}
			if($item_name != "")
			{
				$this->db->like('PRO.product_name',$item_name);
			}
			$ret = $this->db->get()->result_array();
			
			return $ret;	
		}
		else
		{
			$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*');
			$this->db->from('products as PRO');
			$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->where('PRO.product_status','enable');
			$this->db->where('PRO.product_company_id',$sess_company);
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
			if($item_mfg_prtno != "")
			{
				$this->db->like('PRO.product_mfr_part_number',$item_mfg_prtno);
			}
			if($item_name != "")
			{
				$this->db->like('PRO.product_name',$item_name);
			}
			$ret = $this->db->get()->result_array();
			
			return $ret;
		}
	}
	
	//** Get All Vendor's search **//
	
	public function getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email)
	{
		$this->db->select('*');
		$this->db->from('vendors');
		$this->db->where('vendor_status','enable');
		$this->db->limit(10);
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
	
	//** Get Material Request Items **//
	
	public function getmetrialrequestitems($id)
	{
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,PRO_PRICE.*,P.product_model_number,P.product_mfr_part_number,P.product_name,P.product_code')
					->from('meterial_request_item as ITMES')
					->where('ITMES.met_req_id', $id)
					->join('products as P', 'P.product_id = ITMES.met_item_itemid')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = P.product_id')
					->join('uom as U', 'U.uom_id = ITMES.met_item_uom')
					->get()->result_array();
		return $ret;
	}
	
	//** Material Request Search **//
	
	public function getmaterialrequestwithsearch($mr_code,$mr_type)
	{
		$this->db->select('*');
		$this->db->from('meterial_request');
		$this->db->where('met_req_status !=' ,'cancelled');
		$this->db->where('met_req_status !=' ,'delivered');
		$this->db->where('met_status' ,'active');
		$this->db->limit(10);
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
	
	//** Get Vendor For Pop-up **//
	
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
	
	//** Get Material Request for Pop-up Grid **//
	
	public function getmetrialrequest_for_popup_grid($sess_group,$sess_company)
	{
		$ret = $this->db->select('*')
					->from('meterial_request')
					->order_by('met_id', 'DESC')
					->where('met_status' ,'active')
					->limit(10)
					->get()->result_array();
					
		return $ret;
	}
}
	