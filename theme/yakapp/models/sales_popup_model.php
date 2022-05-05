<?php
Class Sales_popup_model extends CI_Model
{
	
	//** Get all Producttype **//
	
	public function get_allproducttypes()
	{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
					->from('products_type as TYPE')
					->where('TYPE.products_type_name','FinishedGoods')
					->where('TYPE.products_type_status','enable')
					->get()->result_array();
		return $ret;	
	}
	
		public function get_all_lot_id()
	{
		$ret = $this->db->select('LOT.*')
					->from('scheme_lot_assign as LOT')
					//->where('LOT.lot_status','enable')
					->get()->result_array();
		return $ret;	
	}
		public function get_product_tax_type($customer_id)
	{
		$ret = $this->db->select('TYPE.customer_discounts_tax')
					->from('officer as TYPE')
					->where('TYPE.OFCR_ID',$customer_id)
					->where('TYPE.OFCR_STAT','active')
					->get()->row();
					//echo $this->db->last_query();exit;
		return $ret;	
	}
	
	//** Get all Productgroup **//
	
	public function get_allproductgroups()
	{
		$ret = $this->db->select('G.products_group_id, G.products_group_name')
					->from('products_groups as G')
					->where('G.products_group_status','enable')
					->get()->result_array();
		return $ret;
	}
	
	
	//** Get all Product Details **//
	
	public function get_allproductsdetails($producttype,$pricebook_id)
	{
		$ret = $this->db->select('PRICE_BOOK.price_book_price_selling_price, PRICE_BOOK.price_book_price_mrp, PRICE_BOOK.price_book_price_discount_percentage, PRICE_BOOK.price_book_price_discount_amount, PRICE_BOOK.price_book_price_vat, PRICE_BOOK.price_book_price_gst, PRICE_BOOK.price_book_price_cst, PRICE_BOOK.price_book_price_service, PRICE_BOOK.price_book_price_excise, PRO.product_type_id, PRO.product_group_id, PRO.product_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.product_mrp, PRO_PRICE.product_selling, PRO_PRICE.product_cp, PRO_PRICE.product_vat_tax, PRO_PRICE.product_gst_tax, PRO_PRICE.product_service_tax, PRO_PRICE.product_cst_tax, PRO_PRICE.product_excise_duty_tax, PRO_PRICE.product_discounts, PRO_STK.product_stock_uom_id')
										->from('price_book_price as PRICE_BOOK')
										->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id')
										->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
										->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
										->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
										//->join('inventory as INV', 'PRO.product_id = INV.inventory_item_id')
										->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id)
										->where('PRO.product_type_id',$producttype)
										->where('PRO.product_status','enable')
										->get()->result_array();
										
			return $ret;	
	}
	
	
	
	//** Get All Product Based on customers **//
	
	public function getcustomerbasedproductsdetails($pricebook_id,$division_id,$store_id)
	{
		
		$ret = $this->db->select('PRICE_BOOK.*, PRO.* , PRO_PRICE.*, INV.*')
										->from('price_book_price as PRICE_BOOK')
										->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id')
										->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
										//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
										//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
										->join('inventory_new as INV', 'PRO.product_id = INV.inventory_item_id','left')
										
										->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id)
										->where('PRO.product_status','enable')
										
										->limit(10)
										->get()->result_array();
										//echo $this->db->last_query();
			return $ret;
	}
	
	public function orderformproductsdetails($pricebook_id,$division_id,$store_id)
	{
		
		$ret = $this->db->select('PRICE_BOOK.*, PRO.* , PRO_PRICE.*, INV.*, sum(inventory_qty)')
										->from('price_book_price as PRICE_BOOK')
										->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id')
										->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
										//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
										//->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
										->join('inventory_new as INV', 'PRO.product_id = INV.inventory_item_id','left')
										
										->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id)
										->where('PRO.product_status','enable')
										->group_by('PRO.product_id')
										->limit(50)
										->get()->result_array();
										//echo $this->db->last_query();
			return $ret;
	}
	
	public function autosearch_item_partnumber($q,$pricebook_id,$product_type,$product_group,$product_sub_group,$item_code,$item_name,$item_mfg_prtno,$store_id)
  {
	  
	  	$this->db->select('PRICE_BOOK.*, PRO.*');
		$this->db->from('price_book_price as PRICE_BOOK');
		$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
		
		$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
		
		$this->db->group_by('PRO.product_id');
		$this->db->where('PRO.product_status','enable');
		
	
		if($product_group != "")
		{
			$this->db->where('PRO.product_group_id',$product_group);
		}
		if($product_sub_group != "")
		{
			$this->db->where('PRO.product_sub_group',$product_sub_group);
		}
		if($item_code != "" && $item_code != NULL)
		{
			$this->db->like('PRO.product_code',$item_code);
		}
		if($item_name != "" && $item_name != NULL)
		{
			$this->db->like('PRO.product_name',$item_name);
		}
		if($item_mfg_prtno != "" && $item_mfg_prtno != NULL)
		{
			$this->db->like('PRO.product_sku',$q);
		}
		
		$this->db->limit(25);
		//echo $this->db->last_query(); exit;
		$query = $this->db->get();
		
		if($query->num_rows > 0){
		  foreach ($query->result_array() as $row){
			$row_set[] = $row;  	   
		  }
		  echo json_encode($row_set); //format the array into json data
    }
  }
  
  
  public function autosearch_order_form($q,$pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno,$store_id)
  {
	  
	  	$this->db->select('PRICE_BOOK.*,PRO_PRICE.*, PRO.*,INV.*,sum(inventory_qty)');
		$this->db->from('price_book_price as PRICE_BOOK');
		$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
		$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
		//$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
		//$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
		$this->db->join('inventory_new as INV', 'PRO.product_id = INV.inventory_item_id','left');
		//$this->db->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id');
		//$this->db->join('store_division as STD', 'STD.division_id = PRO.material_store_division_id');
		//$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
		$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
		//$this->db->where('PRO.material_store_id', $store_id);
		$this->db->where('INV.inventory_qty !=','0.00');
		$this->db->where('PRO.product_status','enable');
		$this->db->group_by('PRO.product_id'); 
		$ret = 	$this->db->get()->result_array();
		
		return $ret;
		
  }
	
	//** Search In Multiple Item Details **//
	
	public function getcustomerbasedproductsdetailswithmultiplesearch($pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno)
	{
		
		$this->db->select('PRICE_BOOK.price_book_price_selling_price, PRICE_BOOK.price_book_price_mrp, PRICE_BOOK.price_book_price_discount_percentage, PRICE_BOOK.price_book_price_discount_amount, PRICE_BOOK.price_book_price_vat, PRICE_BOOK.price_book_price_gst, PRICE_BOOK.price_book_price_cst, PRICE_BOOK.price_book_price_service, PRICE_BOOK.price_book_price_excise, PRO.product_type_id, PRO.product_group_id, PRO.product_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.product_mrp, PRO_PRICE.product_selling, PRO_PRICE.product_cp, PRO_PRICE.product_vat_tax, PRO_PRICE.product_gst_tax, PRO_PRICE.product_service_tax, PRO_PRICE.product_cst_tax, PRO_PRICE.product_excise_duty_tax, PRO_PRICE.product_discounts, PRO_STK.product_stock_uom_id,U.uom_name,U.uom_id,INV.inventory_item_id, INV.inventory_qty');
		$this->db->from('price_book_price as PRICE_BOOK');
		$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
		$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
		$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
		$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
		$this->db->join('inventory as INV', 'PRO.product_id = INV.inventory_item_id');
		$this->db->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id');
		$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
		$this->db->where('PRO.product_status','enable');
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
		$ret = 	$this->db->get()->result_array();
		
		return $ret;
	}
	

	//** Get Single Item Product Details **//
	
	public function getitemdetails($product_item_id, $pricebook_id)
	{
		
		$ret = $this->db->select('PRICE_BOOK.price_book_price_selling_price, PRICE_BOOK.price_book_price_mrp, PRICE_BOOK.price_book_price_discount_percentage, PRICE_BOOK.price_book_price_discount_amount, PRICE_BOOK.price_book_price_vat, PRICE_BOOK.price_book_price_gst, PRICE_BOOK.price_book_price_cst, PRICE_BOOK.price_book_price_service, PRICE_BOOK.price_book_price_excise, PRO.product_type_id, PRO.product_group_id, PRO.product_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.product_mrp, PRO_PRICE.product_selling, PRO_PRICE.product_cp, PRO_PRICE.product_vat_tax, PRO_PRICE.product_gst_tax, PRO_PRICE.product_service_tax, PRO_PRICE.product_cst_tax, PRO_PRICE.product_excise_duty_tax, PRO_PRICE.product_discounts, PRO_STK.product_stock_uom_id,U.uom_name,U.uom_id, INV.inventory_item_id, INV.inventory_qty')
										->from('price_book_price as PRICE_BOOK')
										->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id')
										->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
										->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
										->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
										->join('inventory as INV', 'PRO.product_id = INV.inventory_item_id')
										->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
										->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id)
										->where('PRICE_BOOK.price_book_price_item_id', $product_item_id)
										->where('PRO.product_status','enable')
										->get()->row();
			return $ret;	
	}
	
	
	public function get_lot_value($search_lot)
	{
		
		$ret = $this->db->select('LOT.*,PRO.product_code')
										->from('scheme_lot_assign as LOT')
										->join('products as PRO', 'PRO.product_id = LOT.product_id')
										->where('LOT.id', $search_lot)
										//->where('LOT.lot_status','enable')
										->get()->row();
			return $ret;	
	}
	
	//** Onchange Product Type in Single Item Pop-up **//
	
	public function onchangeitemstype($product_type,$product_group,$pricebook_id)
	{	
			$this->db->select('PRICE_BOOK.price_book_price_selling_price, PRICE_BOOK.price_book_price_mrp, PRICE_BOOK.price_book_price_discount_percentage, PRICE_BOOK.price_book_price_discount_amount, PRICE_BOOK.price_book_price_vat, PRICE_BOOK.price_book_price_gst, PRICE_BOOK.price_book_price_cst, PRICE_BOOK.price_book_price_service, PRICE_BOOK.price_book_price_excise, PRO.product_type_id, PRO.product_group_id, PRO.product_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.product_mrp, PRO_PRICE.product_selling, PRO_PRICE.product_cp, PRO_PRICE.product_vat_tax, PRO_PRICE.product_gst_tax, PRO_PRICE.product_service_tax, PRO_PRICE.product_cst_tax, PRO_PRICE.product_excise_duty_tax, PRO_PRICE.product_discounts, PRO_STK.product_stock_uom_id');
			$this->db->from('price_book_price as PRICE_BOOK');
			$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
			$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
			if($product_type != "")
			{
				$this->db->where('PRO.product_type_id',$product_type);
			}
			if($product_group != "")
			{
				$this->db->where('PRO.product_group_id',$product_group);
			}
			$this->db->where('PRO.product_status','enable');
		  	
			$ret = $this->db->get()->result_array();
				  
			return $ret;
	}
	
	//** Get Customer Details For Pop-up **//
	
	public function getcustomerdetail_for_popup_grid()
	{
		$ret = $this->db->select('CUS.*')
					->from('officer as CUS')
					
					//->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id')
					->order_by('OFCR_ID', 'DESC')
					->where('OFCR_STAT','active')
					->limit(10)
					->get()->result_array();
		return $ret;
	}
	
	//** Search Customer Details in Customer Pop-up **//
	
	public function getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email)
	{
		$this->db->select('CUS.*');
		$this->db->from('officer as CUS');
		//$this->db->join('region as RG', 'RG.region_id = CUS.customer_region');
		//$this->db->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone');
		//$this->db->join('area as AR', 'AR.area_id = CUS.customer_area');
		//$this->db->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id');
		//$this->db->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id');
		$this->db->where('CUS.OFCR_STAT','active');
		$this->db->limit(10);
		if($cus_code != "")
		{
			$this->db->like('CUS.OFCR_USR_VALUE',$cus_code,  'after');
			//$this->db->like('title', 'match', 'before'); 
		}
		if($cus_name != "")
		{
			$this->db->like('CUS.OFCR_FST_NME',$cus_name, 'after');
		}
		if($cus_mobile != "")
		{
			$this->db->like('CUS.OFCR_MOB',$cus_mobile, 'after');
		}
		if($cus_email != "")
		{
			$this->db->like('CUS.OFCR_USR_EMAIL',$cus_email, 'after');
		}
		$ret = $this->db->get()->result_array();
		
		//print_r($this->db->last_query()); exit;
		
		return $ret;
		
	}
	
	public function get_services()
	{
		$ret = $this->db->select('*')
					->from('yak_services')
					->get()->result_array();
		return $ret;
	}
	
	
	
  public function autosearch_item_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_code', $q);
	$this->db->limit(10);
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
  
  public function autosearch_item_selected($pricebook_id,$selected_itmes)
  {
	  	$selected = json_decode($selected_itmes,true);
	  
	  	$this->db->select('PRICE_BOOK.price_book_price_selling_price, PRICE_BOOK.price_book_price_mrp, PRICE_BOOK.price_book_price_discount_percentage, PRICE_BOOK.price_book_price_discount_amount, PRICE_BOOK.price_book_price_vat, PRICE_BOOK.price_book_price_gst, PRICE_BOOK.price_book_price_cst, PRICE_BOOK.price_book_price_service, PRICE_BOOK.price_book_price_excise, PRO.product_type_id, PRO.product_group_id, PRO.product_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRO_PRICE.product_mrp, PRO_PRICE.product_selling, PRO_PRICE.product_cp, PRO_PRICE.product_vat_tax, PRO_PRICE.product_gst_tax, PRO_PRICE.product_service_tax, PRO_PRICE.product_cst_tax, PRO_PRICE.product_excise_duty_tax, PRO_PRICE.product_discounts, PRO_STK.product_stock_uom_id, U.uom_name, U.uom_id, INV.inventory_item_id, INV.inventory_qty');
		$this->db->from('price_book_price as PRICE_BOOK');
		$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
		$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
		$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
		$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
		$this->db->join('inventory as INV', 'PRO.product_id = INV.inventory_item_id');
		$this->db->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id');
		$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
		$this->db->where('PRO.product_status','enable');
		if(!empty($selected))
		{
			$this->db->where_in('PRO.product_id', $selected);
		}
		$this->db->limit(10);
		$query = $this->db->get();
		
		if($query->num_rows > 0){
		  foreach ($query->result_array() as $row){
			$row_set[] = $row;  	   
		  }
		  echo json_encode($row_set); //format the array into json data
    }
  }
  
  
  
   public function autosearch_item_name($q)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
	$this->db->limit(10);
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
  
  
  
}
?>