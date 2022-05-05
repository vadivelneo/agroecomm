<?php

Class Productmodule extends CI_Model
{
	//** Get Prefix for Products **//
	
	public function getprefix($id,$sess_company)
	{
		$this->db->select('products_type_prefix');
		$this->db->from('products_type');
		$this->db->where('products_type_id',$id);
		//$this->db->where('product_type_company_id',$sess_company);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Get Product **//
	
	public function get_products()
	{
		$ret['rows'] = $this->db->select('*')
							->from('products')
							->order_by('product_id', 'DESC')
							->where('product_status' ,'enable')
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('products')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 
		return $ret;
	}
	
	
	//** Get Product store based on company name **//
	
	public function getproduct_store_division($material_store_division_id)
	{
		$ret =  $this->db->select('STR.*,STD.* ')
						->from('store_division as STD')
						->join('store as STR','STR.store_division = STD.division_id')
						->where('STR.store_division',$material_store_division_id)
						->where('STR.store_status', 'enable')
						->get()->result_array();
	
		return $ret;
	}
	
	
//** Get Product store based on company name **//
	
	public function getproduct_store($material_store_id)
	{
		$ret =  $this->db->select('STR.*,PDTY.* ')
						->from('store as STR')
						->join('products_type as PDTY','PDTY.products_type_id = STR.store_category')
						->where('store_id', $material_store_id)
						->where('store_status', 'enable')
						->get()->result_array();
	
		return $ret;
	}
	//** Get Product type based on company name **//
	
	public function getproduct_type($company_name)
	{
		$ret =  $this->db->select('*')
						->from('products_type')
						->where('product_type_company_id', $company_name)
						->where('products_type_status', 'enable')
						->get()->result_array();
		
		return $ret;
	}
	
	
	//** Get All material_category **//
	
	public function get_all_material_name($name)
	{
		$ret =  $this->db->select('*')
						->from('products_type')
						->where('products_type_id',$name)
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	//** Get Product Details Based on Session Group and Session Company Id **//
	
	public function get_productdetial($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			
			$ret['rows'] = $this->db->select('PRO.*,PRTGP.*,PRO_TYP.*')
								->from('products as PRO')
								->join('products_groups as PRTGP', 'PRTGP.products_group_id = PRO.product_group_id')
								->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								->where('PRO.product_status','enable')
								//->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
								//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
								//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								//	->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
								//->where('PRO.product_company_id',$sess_company)
								->order_by('PRO.product_id', 'DESC')
								->limit($limit, $start)
								->get()->result_array();
			
			$Count = $this->db->select('count(*) as TotalRows')
								->from('products as PRO')
								->join('products_groups as PRTGP', 'PRTGP.products_group_id = PRO.product_group_id')
								->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								->where('PRO.product_status','enable')
								//->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
								//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
								//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								//->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
								//->where('PRO.product_company_id',$sess_company)
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
		 }
		else
		{
			
			$ret['rows'] = $this->db->select('PRO.*,STOR.*,PRTGP.*,PRO_TYP.*,STD.*')
								->from('products as PRO')
								->join('store as STOR', 'STOR.store_id = PRO.material_store_id')
								->join('products_groups as PRTGP', 'PRTGP.products_group_id = PRO.product_group_id')
								->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id','left')
								->where('PRO.product_status','enable')
								//->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
								//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
								//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								//	->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
								//->where('PRO.product_company_id',$sess_company)
								->order_by('PRO.product_id', 'DESC')
								->limit($limit, $start)
								->get()->result_array();
		          	//echo $this->db->last_query(); 
			$Count = $this->db->select('count(*) as TotalRows')
								->from('products as PRO')
								->join('store as STOR', 'STOR.store_id = PRO.material_store_id')
								->join('products_groups as PRTGP', 'PRTGP.products_group_id = PRO.product_group_id')
								->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id','left')
								->where('PRO.product_status','enable')
								//->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
								//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
								//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
								//->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
								//->where('PRO.product_company_id',$sess_company)
								->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
		 }
		return $ret;
	}
	
	//** Search Product Based on Session Group and Session Company Id **//
		
	
	public function get_search_products($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_feild_1,$search_feild_2,$search_feild_3,$search_feild_4,$search_feild_5,$search_feild_6)
	{
		if($sess_group == 1)
		{
						$this->db->select('PRO.*,  PRO_PRICE.*,PRO_TYP.*');
						$this->db->from('products as PRO');
						$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
						$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
						//$this->db->join('uom as U', 'U.uom_id = PRO.product_uom');
			     		$this->db->order_by('PRO.product_id', 'DESC');
						
						if($search_feild_1 != '')
						{
							$this->db->like('PRO.product_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('PRO.product_name',$search_feild_2);
						}
						
						if($search_feild_4 != '')
						{
							$this->db->where('PRO.product_type_id',$search_feild_4);
						}
						
						
						$this->db->order_by($sort_order, $sort_by);
						$this->db->where('PRO.product_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				 

						$this->db->select('count(*) as TotalRows');
						$this->db->from('products as PRO');
						
						if($search_feild_1 != '')
						{
							$this->db->like('PRO.product_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('PRO.product_name',$search_feild_2);
						}
						
						if($search_feild_4 != '')
						{
							$this->db->where('PRO.product_type_id',$search_feild_4);
						}
						
												
						$this->db->order_by($sort_order, $sort_by);
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					
					//echo"<PRE>";print_R($ret);exit;
					return $ret;
		}
					else
					{
						$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.*,PRO_TYP.*');
						$this->db->from('products as PRO');
						$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
						$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
						$this->db->join('uom as U', 'U.uom_id = PRO.product_uom');
			     		$this->db->order_by('PRO.product_id', 'DESC');
						
						if($search_feild_1 != '')
						{
							$this->db->like('PRO.product_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('PRO.product_name',$search_feild_2);
						}
						
						if($search_feild_4 != '')
						{
							$this->db->where('PRO.product_type_id',$search_feild_4);
						}
						
						
						
						$this->db->order_by($sort_order, $sort_by);
						$this->db->where('PRO.product_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				 

						$this->db->select('count(*) as TotalRows');
						$this->db->from('products as PRO');
						
						if($search_feild_1 != '')
						{
							$this->db->like('PRO.product_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('PRO.product_name',$search_feild_2);
						}
						
						if($search_feild_4 != '')
						{
							$this->db->where('PRO.product_type_id',$search_feild_4);
						}
						
						
				
						$this->db->order_by($sort_order, $sort_by); 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
	
	

	
	//** Get All Product DEtails **//
	
	public function get_allproductsdetails()
	{
		$ret = $this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.*, PRO_TYP.*')
						->from('products as PRO')
						->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
						->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
						->join('uom as U', 'U.uom_id = PRO.product_uom')
						->where('PRO.product_status','enable')
						->get()->result_array();
		return $ret;
	}
	
	 //** Get All Product Types **//
	 
	public function get_allproducttypes($sess_company)
	{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
						->from('products_type as TYPE')
						//->where('TYPE.product_type_company_id',$sess_company)
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
	
	//** Get All Manufacturer Details **//
	
	public function get_allmanufacturer()
	{
		$ret = $this->db->select('M.manufacturer_id, M.manufacturer_name')
						->from('manufacturer as M')
						->get()->result_array();
					
		return $ret;
	}
	
	//** Get All Unit of Measurememt Details **//
	
	public function get_alluom()
	{
		$ret = $this->db->select('U.uom_id, U.uom_name')
					->from('uom as U')
					->get()->result_array();
		return $ret;
	}

	//** Product Validation **//
	
	public function productvaildation($product_item_code)
	{
		$this->db->select('*')
				->from('products')
				->where('product_code',$product_item_code)
				->get();
		$num = $this->db->affected_rows();

		return $num;

	}
	
	//** Get Last Id of the Product **//
	
	public function getlastid($type_id,$sess_company)
	{
		$ret =  $this->db->select('product_code')
						->from('products')
						->where('product_type_id',$type_id)
						//->where('product_company_id',$sess_company)
						->order_by('product_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	//** Add Product details **//
	
	public function add_product_details($productdetails)
	{
		$this->db->insert('products', $productdetails);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
		
	}
	
	//** Add Product Pricing Details **//
	
	public function add_pro_pricing_details($productpricing)
	{
		$this->db->insert('product_price', $productpricing);
		return true;
		
	}
	
	//** Add Stock Details **//
	
	public function add_pro_stock_details($productstock)
	{
		$this->db->insert('product_stock', $productstock);
		return true;
		
	}
	
	//** Add Product Item Details **//
	
	public function add_pro_item_details($productitems)
	{
		$this->db->insert('product_items', $productitems);
		return true;
		
	}
		
	public function getsingle_product($id)//** Get Single Product Details **//
	{
		$ret = $this->db->select('PRO.*, PRO_PRICE.* ,PRO_TYP.* ,PRO_GRO.*,UOM1.uom_name as uom1,')
						->from('products as PRO')
						->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id','left')
						->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id','left')
						->join('products_groups as PRO_GRO', 'PRO_GRO.products_group_id = PRO.product_group_id','left')
						->join('uom as UOM1','PRO.product_uom = UOM1.uom_id','left')
						->where('PRO.product_id', $id)
						->get()->row();
						//echo "<pre>"; print_r($ret); 
		return $ret;
	}
	
	//** Get Product Items **//
	
	public function get_product_list_items($id)
	{
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id')
						->from('product_items as ITMES')
						->where('ITMES.product_items_prd_id', $id)
						->join('uom as U','U.uom_id = ITMES.product_items_uom')
						->get()->result_array();
						
		return $ret;
		
	}
	
	//** Update Product Validation based on product code and ID **//
	
	public function product_update_vaildation($product_item_code, $id)
	{
		$this->db->select('*')
				->from('products')
				->where('product_code',$product_item_code)
				->where('product_id !=',$id)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	}
	
	//** Update Product details **//
	
	public function update_product_details($productdetails, $id)
	{
		$this->db->where('product_id', $id);
		$this->db->update('products', $productdetails);
		return  true;
	}
	
	//** Update Pricebook Details **//
	
	public function update_pro_pricing_details($productpricing, $id)
	{
		$this->db->select('*')
				->from('product_price')
				->where('product_prd_id',$id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('product_price', $productpricing);
		}
		{
			$this->db->where('product_prd_id', $id);
			$this->db->update('product_price', $productpricing);
			return true;
		}
	}
	
	//** Update Product Stock Details **//
	
	public function update_pro_stock_details($productstock, $id)
	{
		$this->db->select('*')
				->from('product_stock')
				->where('product_stock_prd_id',$id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('product_stock', $productstock);
		}
		{
			$this->db->where('product_stock_prd_id', $id);
			$this->db->update('product_stock', $productstock);
			return true;
		}	
	}
	
	//** Update Product Item Details **//
	
	public function update_pro_item_details($productitems, $id, $item_id)
	{
		$this->db->select('*')
				->from('product_items')
				->where('product_items_prd_id',$id)
				->where('product_items_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('product_items', $productitems);
		}
		{
			$this->db->where('product_items_prd_id', $id);
			$this->db->where('product_items_item_id', $item_id);
			$this->db->update('product_items', $productitems);
		}
		return true;
	}
	
	 //** Get Product Item Details **//
	 
	public function getitemdetails($product_item_id)
	{
		$ret = $this->db->select('PRO.product_id,PRO.product_type_id,PRO.product_group_id,PRO.product_name,PRO.product_code,PRO.product_model_number,PRICE.product_mrp,PRICE.product_selling,PRICE.product_cp,PRICE.product_uty_qty,PRICE.product_vat_tax,PRICE.product_gst_tax,PRICE.product_service_tax,PRICE.product_cst_tax,PRICE.product_excise_duty_tax,U.uom_name,U.uom_id')
					->from('products as PRO')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
					->join('uom as U', 'PRO.product_uom = U.uom_id')
					->where('PRO.product_id', $product_item_id)
					->get()->row();
		return $ret;
	}
	
	//** Update Product Status **//
	
	public function updateproductstatus($productdata, $id)
	{
			$this->db->where('product_id', $id)
				->update('products', $productdata);
		
		return true;
	}
	
	//** Update Pricebook Details **//
	
	public function update_pricebook_price_details($priceitems,$id,$item_id)
	{
		$this->db->select('*')
				->from('price_book_price')
				->where('price_book_price_pb_id',$id)
				->where('price_book_price_item_id',$item_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('price_book_price', $priceitems);
		}
		else
		{
			$this->db->where('price_book_price_pb_id', $id);
			$this->db->where('price_book_price_item_id', $item_id);
			$this->db->update('price_book_price', $priceitems);
		}
		return true;		
	}
	
	//** Get Price Book Details **//
	
	public function get_pricebook()
	{
		 $ret = $this->db->select('*')
					->from('price_book')
					->where('price_book_name' ,'General')
					->where('price_book_id' ,'1')
					->where('price_book_status' ,'active')
					->get()->result_array();
					
					
		return $ret;
	}
	
	//** Get Product Code **//
	
	public function product_code()
	{
		$ret =  $this->db->select('product_code')
						->from('products')
						->order_by('product_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	//** Get Manuf. Part Number **//
	
	public function get_products_mfr() 
	{
		$ret = $this->db->select('product_id,product_mfr_part_number')
						->from('products')
						->get()->result_array();
		return $ret;
	}
	
	//** Update Product Manuf. Part Number **//
	public function update_products_mfr($product_id, $update_mfr_details)
	{
			$this->db->where('product_id', $product_id);
			$this->db->update('products', $update_mfr_details);
			
			return true;
	}
	
	public function get_all_store()
	{
		$ret = $this->db->select('STR.*')
					->from('store as STR')
					->where('STR.store_status','enable')
					->get()->result_array();
					
		return $ret;
	}
	
	public function get_all_store_division()
	{
		$ret = $this->db->select('STD.*')
					->from('store_division as STD')
					->where('STD.division_status','enable')
					->get()->result_array();
					
		return $ret;
	}
	
	public function get_allmaterial_ingredients()
	{
		$ret = $this->db->select('MIS.*')
					->from('products_ingredient as MIS')
					->where('MIS.mi_status','enable')
					->get()->result_array();
					
		return $ret;
	}
	
	public function get_prefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	public function getlast_id()
	{
		$ret =  $this->db->select('product_code')
						->from('products')
						->order_by('product_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
}
