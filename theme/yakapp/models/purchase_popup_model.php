<?php
Class Purchase_popup_model extends CI_Model
{
	
	//** Get all Producttype **//
	
	public function get_allproducttypes($sess_group,$sess_company)
	{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
						->from('products_type as TYPE')
						->where('TYPE.products_type_id !=','2')
						->where('TYPE.products_type_status','enable')
						->get()->result_array();
		return $ret;	
		
	}
	
	//** Get all Productgroup **//
	
	public function get_allproductgroups()
	{
		$ret = $this->db->select('G.products_group_id, G.products_group_name')
					->from('products_groups as G')
					->get()->result_array();
		return $ret;
	}
	
	//** Get all Product Details **//
	
	public function get_allproductsdetails($producttype)
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
	
	//** Onchange Product Type in Single Item Pop-up **//
	
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
	
	//** Get All Product Based on customers **//
	
	public function getcustomerbasedproductsdetails($sess_group,$sess_company,$pricebook_id)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_name, PRO.product_code, PRO.product_model_number,PRO.product_mfr_part_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id')
						->from('price_book_price as PRO_PRICE')
						->join('products as PRO', 'PRO.product_id = PRO_PRICE.price_book_price_item_id')
						->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
						->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
						->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
						->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
						->where('PRO_PRICE.price_book_price_pb_id',$pricebook_id)
						->limit(10)
						->get()->result_array();
			
			return $ret;	
		}
		else
		{
			$ret = $this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_name, PRO.product_code, PRO.product_model_number,PRO.product_mfr_part_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id')
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
			return $ret;
		}
	}
	
	//** Search In Multiple Item Details **//
	
	public function getcustomerbasedproductsdetailswithmultiplesearch($sess_group,$sess_company,$pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno)
	{
		if($sess_group == 1)
		{
			$this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_company_id, PRO.product_name, PRO.product_code, PRO.product_model_number,PRO.product_mfr_part_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id');
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
				if($item_mfg_prtno != "")
				{
					$this->db->like('PRO.product_mfr_part_number',$item_mfg_prtno);
				}
			$this->db->limit(10);
			$ret = $this->db->get()->result_array();
			return $ret;
		}
		else
		{
			$this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_company_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.price_book_price_mrp as product_mrp, PRO_PRICE.price_book_price_selling_price as product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRO_PRICE.price_book_price_vat as product_vat_tax, PRO_PRICE.price_book_price_gst as product_gst_tax, PRO_PRICE.price_book_price_service as product_service_tax, PRO_PRICE.price_book_price_cst as product_cst_tax, PRO_PRICE.price_book_price_excise as product_excise_duty_tax, U.uom_name, U.uom_id');
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
				if($item_mfg_prtno != "")
				{
					$this->db->like('PRO.product_mfr_part_number',$item_mfg_prtno);
				}
			$this->db->limit(10);
			$ret = $this->db->get()->result_array();
		
			return $ret;
		}
	}
	
	//** Get Single Item Product Details **//
	
	public function getitemdetails($product_item_id, $pricebook_id)
	{
		$productpopupprice = new stdClass();
		
		$productprice = $this->db->select('PRO.product_id,PRO.product_type_id,PRO.product_group_id,PRO.product_name,PRO.product_code,PRO.product_model_number,PRO.product_mfr_part_number,PRICE.product_mrp,PRICE.product_selling,PRICE.product_cp,PRICE.product_uty_qty,PRICE.product_vat_tax,PRICE.product_gst_tax,PRICE.product_service_tax,PRICE.product_cst_tax,PRICE.product_excise_duty_tax,U.uom_name,U.uom_id')
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
			$productpopupprice->product_mfr_part_number = $productprice->product_mfr_part_number;
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
	
	//** Multiple Product Details **//
	
		public function getmultipleproductsdetails($sess_group,$sess_company,$pricebook_id,$division_id,$store_id)
	{
		//echo $sess_group; exit;
		if($sess_group == 1)
		{
		$ret = $this->db->select('PRO.*,  PRO_PRICE.* ,PRO_TYP.*,PBPRIC.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					//->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					//->join('store_division as SD', 'SD.division_id = PRO.material_store_division_id')
					//->join('store as STR', 'STR.store_id = PRO.material_store_id')
					->join('price_book_price as PBPRIC', 'PBPRIC.price_book_price_item_id = PRO.product_id')
					->join('price_book as PB', 'PB.price_book_id = PBPRIC.price_book_price_pb_id')
					//->where('PRO.material_store_division_id',$division_id)
					//->where('PRO.material_store_id',$store_id)
					->where('PBPRIC.price_book_price_pb_id',$pricebook_id)
					//->where('PRO.product_type_id !=', 2)
					->where('PRO.product_status','enable')
					->limit(10)
					->get()->result_array();
		return $ret;	
		}
		else
		{
		$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*,SD.division_name,STR.store_name,SD.division_id,STR.store_id')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('store_division as SD', 'SD.division_id = PRO.material_store_division_id')
					->join('store as STR', 'STR.store_id = PRO.material_store_id')
					->where('PRO.material_store_division_id',$division_id)
					->where('PRO.material_store_id',$store_id)
					->where('PRO.product_status','enable')
					->where('PRO.product_type_id !=', 2)
					->where('PRO.product_company_id',$sess_company)
					->limit(10)
					->get()->result_array();
					//echo"<pre>"; print_r($ret); exit;
		return $ret;
		}
	}
	
	public function getmultipleproducts_gr($sess_group,$sess_company,$pricebook_id,$poindent_po_oder_id)
	{
		//echo $sess_group; exit;
		if($sess_group == 1)
		{
		$ret = $this->db->select('PRO.*, PRO_TYP.*, POITM.*')
					->from('products as PRO')
					//->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					//->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('purchase_order_items as POITM', 'POITM.po_items_item_id = PRO.product_id')
					->where('POITM.po_items_po_id',$poindent_po_oder_id)
					->where('PRO.product_status','enable')
					->limit(10)
					->get()->result_array();
		return $ret;	
		}
		else
		{
		$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*, POITM.po_items_id')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('purchase_order_items as POITM', 'POITM.po_items_item_id = PRO.product_id')
					->where('POITM.po_items_po_id',$poindent_po_oder_id)
					->where('PRO.product_status','enable')
					//->where('PRO.product_company_id',$sess_company)
					->limit(10)
					->get()->result_array();
					//echo"<pre>"; print_r($ret); exit;
		return $ret;
		}
	}
	
	//** Get All product with multiple search **//
	
	public function getproductsdetailswithmultiplesearch($product_type,$product_group,$item_code,$item_name,$item_mfg_prtno,$division_id,$pricebook_id)
	{
			$this->db->select('PRO.*,PRO_TYP.*,SD.division_name,STR.store_name,SD.division_id,STR.store_id,PBPRIC.*');
			$this->db->from('products as PRO');
			//$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			//$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			//$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			$this->db->join('store_division as SD', 'SD.division_id = PRO.material_store_division_id');
			$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
			$this->db->join('price_book_price as PBPRIC', 'PBPRIC.price_book_price_item_id = PRO.product_id');
			$this->db->join('price_book as PB', 'PB.price_book_id = PBPRIC.price_book_price_pb_id');
			//$this->db->where('PRO.material_store_division_id',$division_id);
			$this->db->where('PRO.product_status','enable');
			$this->db->where('PBPRIC.price_book_price_pb_id','2');
			//$this->db->where('PRO.product_type_id !=', 2);
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
				$this->db->like('PRO.product_sku',$item_mfg_prtno);
			}
			if($item_name != "")
			{
				$this->db->like('PRO.product_name',$item_name);
			}
			$ret = $this->db->get()->result_array();
			
			return $ret;	
	}
	
	
	//** Get All product with multiple search **//
	
	public function get_grproductsdetailswithmultiplesearch($sess_group,$sess_company,$item_code,$item_name,$item_mfg_prtno,$poindent_po_oder_id)
	{

			$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					//->join('purchase_order_items as POITM', 'POITM.po_items_item_id = PRO.product_id')
					//->where('POITM.po_items_po_id',$poindent_po_oder_id)
					->where('PRO.product_status','enable')
					//->where('PRO.product_company_id',$sess_company)
					->limit(10);
					
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
			//echo $this->db->last_query(); exit;
			
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
			$this->db->like('vendor_mobile',$ven_mobile);
		}
		if($ven_email != "")
		{
			$this->db->like('vendor_email',$ven_email);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
	}
	
	//** Get Material Request for Pop-up Grid **//
	public function getmetrialrequest_for_popup_grid()
	{
		$ret = $this->db->select('*')
					->from('meterial_request')
					->order_by('met_id', 'DESC')
					->where('met_status' ,'active')
					->limit(10)
					->get()->result_array();
					
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
	
	//** Get Vendor Quatation Details For Pop-up **//
	
	public function get_vendor_quotation($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('VQ.*,VEN.*')
						->from('vendor_quotation as VQ')
						->join('vendors as VEN','VEN.vendor_id = VQ.vendor_quote_vendor_id')
						->order_by('vendor_quote_id', 'DESC')
						->where('vendor_quote_status' ,'active')
						->limit(10)
						->get()->result_array();
			return $ret;
		}
		else
		{
			$ret = $this->db->select('VQ.*,VEN.*')
						->from('vendor_quotation as VQ')
						->join('vendors as VEN','VEN.vendor_id = VQ.vendor_quote_vendor_id')
						->order_by('vendor_quote_id', 'DESC')
						->where('vendor_quote_status' ,'active')
						->where('vendor_quote_company_id',$sess_company)
						->limit(10)
						->get()->result_array();
			return $ret;
		}
	}
	
	//** Search Vendor Quatation **//
	
	public function getvendorquatationsearch($vq_code,$vendor_name)
	{
		$this->db->select('VQ.*,VEN.*');
		$this->db->from('vendor_quotation as VQ');
		$this->db->join('vendors as VEN','VEN.vendor_id = VQ.vendor_quote_vendor_id');
		$this->db->where('VQ.vendor_quote_cur_status !=','closed');
		$this->db->where('VQ.vendor_quote_status','active');
			if($vq_code != "")
			{
				$this->db->like('VQ.vendor_quote_qoute_no',$vq_code);
			}
			if($vendor_name != "")
			{
				$this->db->like('VEN.vendor_name',$vendor_name);
			}
		$ret = $this->db->get()->result_array();
		return $ret;
	}
	
	//** Get Single Vendor Quatation **//
	
	public function getsinglequotationitem($id)
	{
		$this->db->select('VQ.*,U.uom_name,U.uom_id, PRO.*');
		$this->db->from('vendor_qoute_item as VQ');
	 	$this->db->where('VQ.vquote_vendor_quoute_id', $id);
		$this->db->join('products as PRO', 'PRO.product_id = VQ.vquote_items_item_id');		
		$this->db->join('uom as U', 'U.uom_id = VQ.vquote_items_uom_id');
		$this->db->join('product_price as PROP', 'PROP.product_prd_id = VQ.vquote_items_item_id');		
		$query = $this->db->get()->result_array();
	 	///echo "<pre>"; print_r($query); exit;
		return $query;
	}
	
	public function autosearch_item_code($q)
  	{
    $this->db->select('*');
    $this->db->like('product_code', $q);
	$this->db->limit(15);
    $query = $this->db->get('products');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_code']));
        $new_row['value']=htmlentities(stripslashes($row['product_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  
  public function autosearch_po_item_code($q,$poindent_po_oder_id)
  	{
		$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('purchase_order_items as POITM', 'POITM.po_items_item_id = PRO.product_id')
					->where('POITM.po_items_po_id',$poindent_po_oder_id)
					->where('PRO.product_status','enable')
					->like('product_code', $q)
					->limit(10);
	$query = $this->db->get();
		
		
   /* $this->db->select('*');
    $this->db->like('product_code', $q);
	$this->db->limit(15);
    $query = $this->db->get('products');*/
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_code']));
        $new_row['value']=htmlentities(stripslashes($row['product_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_item_partnumber($q)
  {
    $this->db->select('*');
    $this->db->like('product_mfr_part_number', $q);
	$this->db->limit(15);
    $query = $this->db->get('products');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $new_row['value']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
   public function autosearch_po_item_partnumber($q,$poindent_po_oder_id)
  {
    $ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('purchase_order_items as POITM', 'POITM.po_items_item_id = PRO.product_id')
					->where('POITM.po_items_po_id',$poindent_po_oder_id)
					->where('PRO.product_status','enable')
					->like('product_mfr_part_number', $q)
					->limit(10);
	$query = $this->db->get();
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $new_row['value']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
   public function autosearch_item_name($q,$division_id)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
	$this->db->where('material_store_division_id', $division_id);
	$this->db->limit(15);
    $query = $this->db->get('products');
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  
   public function autosearch_po_item_name($q,$poindent_po_oder_id)
  {
    $ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.* ,PRO_STK.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->join('purchase_order_items as POITM', 'POITM.po_items_item_id = PRO.product_id')
					->where('POITM.po_items_po_id',$poindent_po_oder_id)
					->where('PRO.product_status','enable')
					->like('product_name', $q)
					->limit(10);
	$query = $this->db->get();
	
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
	
}
?>