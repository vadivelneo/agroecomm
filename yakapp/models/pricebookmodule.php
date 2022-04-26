<?php

Class Pricebookmodule extends CI_Model
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
		
		$ret =  $this->db->select('price_book_code')
						->from('price_book')
						->order_by('price_book_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	
	public function get_pricebook($limit,$start,$sort_order,$sort_by)
	{
		
		$ret['rows'] = $this->db->select('*')
						->from('price_book')
			     		->order_by($sort_order,$sort_by)
						->where('price_book_status' ,'active')
						->limit($limit, $start)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('price_book')
			     			->order_by('price_book_id', 'DESC')
							->where('price_book_status' ,'active')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 //echo $this->db->last_query();exit;
		return $ret;
	} 
	
	//** Search Sales Order **//
	
	public function search_get_all_pricebook($sess_group,$sess_company,$search_price_book_name,$search_price_book_code,$limit,$page,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$this->db->select('FB.*');
			$this->db->from('price_book as FB');
			//$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
			$this->db->order_by($sort_order,$sort_by);
				if($search_price_book_code != "")
				{	
					$this->db->like('FB.price_book_code' ,$search_price_book_code);
				}
				if($search_price_book_name != "")
				{	
					$this->db->like('FB.price_book_name' ,$search_price_book_name);
				}
				

				
			$this->db->limit($limit, $page);
			$ret['rows'] =	$this->db->get()->result_array();
			$this->db->select('count(*) as TotalRows');
			$this->db->from('price_book as FB');
			//$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			$this->db->order_by($sort_order,$sort_by);
				if($search_price_book_code != "")
				{	
					$this->db->like('FB.price_book_code' ,$search_price_book_code);
				}
				if($search_price_book_name != "")
				{	
					$this->db->like('FB.price_book_name' ,$search_price_book_name);
				}
				
				
			$Count =	$this->db->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
		else
		{
			
$this->db->select('FB.*');
			$this->db->from('price_book as FB');
			//$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			//$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
			$this->db->order_by($sort_order,$sort_by);
				if($search_price_book_code != "")
				{	
					$this->db->like('FB.price_book_code' ,$search_price_book_code);
				}
				if($search_price_book_name != "")
				{	
					$this->db->like('FB.price_book_name' ,$search_price_book_name);
				}
				

				
			$this->db->limit($limit, $page);
			$ret['rows'] =	$this->db->get()->result_array();
			$this->db->select('count(*) as TotalRows');
			$this->db->from('price_book as FB');
			//$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
			$this->db->order_by($sort_order,$sort_by);
				if($search_price_book_code != "")
				{	
					$this->db->like('FB.price_book_code' ,$search_price_book_code);
				}
				if($search_price_book_name != "")
				{	
					$this->db->like('FB.price_book_name' ,$search_price_book_name);
				}
				
				
			$Count =	$this->db->get()->row();
			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}
	}
	///
	
	public function singlepricebookdetails($sess_group,$sess_company,$id)
	{
			$ret['pricebook'] = $this->db->select('*')
								->from('price_book')
								->where('price_book_id', $id)
								->limit(1)
								->get()->row();
	
			$ret['pricelist'] = $this->db->select('PRICE_BOOK.price_book_price_selling_price, PRICE_BOOK.price_book_price_mrp, PRICE_BOOK.price_book_price_discount_percentage, PRICE_BOOK.price_book_price_discount_amount, PRICE_BOOK.price_book_price_vat, PRICE_BOOK.price_book_price_gst, PRICE_BOOK.price_book_price_sgst, PRICE_BOOK.price_book_price_igst, PRICE_BOOK.price_book_price_hsn ,  PRO.*, PRICE_BOOK.price_book_price_incentive_rate, PRICE_BOOK.price_book_price_handling_charge')
										->from('price_book_price as PRICE_BOOK')
										->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id')
										->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
										//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
										->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
										//->join('store_division as STR_DIV', 'STR_DIV.division_id = PRO.material_store_division_id')
										->where('PRICE_BOOK.price_book_price_pb_id', $id)
										->where('PRO.product_status','enable')
										->get()->result_array();

			return $ret;	
	}
	
	public function get_allproductsdetails($sess_group,$sess_company)
	{
		if($sess_group == 1)
		{
			$ret = $this->db->select('PRO.*,PRO_PRICE.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
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
					//->join('store_division as STR_DIV', 'STR_DIV.division_id = PRO.material_store_division_id')
					->where('PRO_TYP.products_type_name','FinishedGoods')
					->where('PRO.product_status','enable')
					//->where('PRO.product_company_id',$sess_company)
					->get()->result_array();
			return $ret;
		}
	}
	
	public function pricebookvaildation($pricebookname, $pricebookcode)
	{
		$this->db->select('*')
				->from('price_book')
				->where('price_book_name',$pricebookname)
				->or_where('price_book_code',$pricebookcode)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	}
	
	public function add_pricebook($pricebookdetails)
	{
		$this->db->insert('price_book', $pricebookdetails);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
	}
	
	public function getscheme_name()
	{
		$ret = $this->db->select('SCH.*')
					->from('scheme_management as SCH')
					->where('SCH.scheme_status','active')
					->get()->result_array();
			return $ret;
	}
	
	public function add_pricebook_price_details($priceitems)
	{
		$this->db->insert('price_book_price',$priceitems);
		return true;		
	}
	
	public function updatepricebookvaildation($pricebookname, $pricebookcode, $id)
	{
		$this->db->select('*')
				->from('price_book')
				->where('price_book_name',$pricebookname)
				->where('price_book_id !=',$id)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	}
	
	public function update_pricebook($pricebookdetails,$id)
	{
		$this->db->where('price_book_id', $id);
		$this->db->update('price_book', $pricebookdetails);
		return true;
	}
	
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
	
	public function updatepbstatus($pbdata, $id)
	{	
		$this->db->where('price_book_id', $id)
				->update('price_book', $pbdata);
		
		return true;
	}
	
	//** Get all Products for single item **//
	
	public function get_allproductsdetailsforsingleitem($sess_group,$producttype)
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
	
	//** Get All Product Type **//
	
	public function get_allproducttypes($sess_group)
	{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.products_type_prefix, TYPE.products_type_description, TYPE.products_type_status')
					->from('products_type as TYPE')
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
	
	//** Get All product with multiple search **//
	
	public function getproductsdetailswithmultiplesearch($item_code,$item_name,$item_mfg_prtno)
	{
			$this->db->select('PRO.*, U.uom_id, U.uom_name, PRO_PRICE.*, PRO_STK.*, PRO_TYP.*');
			$this->db->from('products as PRO');
			$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id');
			//$this->db->where('PRO.product_type_id',2);
			$this->db->where('PRO.product_status','enable');
			$this->db->limit(10);
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
				$this->db->like('PRO.product_name', $item_name);
			}
			$ret = $this->db->get()->result_array();
			
			return $ret;	
	}
	
	//** Onchange Item Pop-up item details **//
	
	public function onchangeitemstype($sess_group,$product_type,$product_group)
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
	
	//** Multiple Product Details **//
	
	public function getmultipleproductsdetails($sess_group)
	{
		$ret = $this->db->select('PRO.*, PRO_PRICE.*,PRO_TYP.*')
					->from('products as PRO')
					->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
					//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
					//->join('uom as U', 'U.uom_id = PRO_STK.product_stock_uom_id')
					->where('PRO.product_status','enable')
					//->where('PRO.product_type_id',2)
					->limit(10)
					->get()->result_array();
		return $ret;	
	}
	
	//** Get Item Details based on product Id **//
	
	public function getitemdetails($product_item_id)
	{
		$ret = $this->db->select('PRO.product_id, PRO.product_type_id, PRO.product_group_id, PRO.product_name, PRO.product_code, PRO.product_model_number, PRO.product_mfr_part_number, PRICE.product_mrp, PRICE.product_selling, PRICE.product_cp, PRICE.product_uty_qty, PRICE.product_vat_tax, PRICE.product_gst_tax, PRICE.product_service_tax, PRICE.product_cst_tax, PRICE.product_excise_duty_tax, PRICE.product_discounts, U.uom_name, U.uom_id')
					->from('products as PRO')
					->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
					->join('product_price as PRICE', 'PRICE.product_prd_id = PRO.product_id')
					->join('uom as U', 'PRO_STK.product_stock_uom_id = U.uom_id')
					->where('PRO.product_id', $product_item_id)
					->get()->row();
					
		return $ret;
	}
	
	public function getmultiple_pricebook_products_details($pricebook_id)
	{
		
		$ret =$this->db->select('PRICE_BOOK.*,PRO.*')
										->from('price_book_price as PRICE_BOOK')
										->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id')
										//->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id')
										//->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id')
										->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id')
										->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id)
										->where('PRO.product_status','enable')
										->limit(10)
										->get()->result_array();
															
		return $ret;	
	}
	
	//** Get All product with multiple search **//
	
	public function search_multiple_pricebook_itemdetails($pricebook_id,$item_code,$item_mfg_prtno,$item_name)
	{
			$this->db->select('PRICE_BOOK.*,PRO.*');
			$this->db->from('price_book_price as PRICE_BOOK');
			$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
			//$this->db->join('product_price as PRO_PRICE', 'PRO_PRICE.product_prd_id = PRO.product_id');
			//$this->db->join('product_stock as PRO_STK', 'PRO_STK.product_stock_prd_id = PRO.product_id');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
			$this->db->where('PRO.product_status','enable');
			$this->db->limit(10);
			if($item_code != "" && $item_code != NULL)
			{
				$this->db->like('PRO.product_code',$item_code);
			}
			if($item_mfg_prtno != "" && $item_mfg_prtno != NULL)
			{
				$this->db->like('PRO.product_sku',$item_mfg_prtno);
			}
			if($item_name != "" && $item_name != NULL)
			{
				$this->db->like('PRO.product_name',$item_name);
			}
			$ret = $this->db->get()->result_array();
			
			return $ret;	
	}
	
  
  public function autosearch_item_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_code', $q);
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
  
  public function autosearch_item_partnumber($q)
  {
    $this->db->select('*');
    $this->db->like('product_mfr_part_number', $q);
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
  
   public function autosearch_item_name($q)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
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
  
  public function autosearch_pricbook_item_code($pricebook_id,$q)
  {
	  $this->db->select('PRO.product_code');
	  $this->db->from('price_book_price as PRICE_BOOK');
	  $this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
	  $this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
	  $this->db->like('PRO.product_code', $q);
	  $query = $this->db->get();

    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_code']));
        $new_row['value']=htmlentities(stripslashes($row['product_code']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
  
  public function autosearch_pricbook_item_partnumber($pricebook_id,$q)
  {
	$this->db->select('PRO.product_mfr_part_number');
	$this->db->from('price_book_price as PRICE_BOOK');
	$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
	$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
	$this->db->like('PRO.product_mfr_part_number', $q);
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
  
   public function autosearch_pricbook_item_name($pricebook_id,$q)
  {
	$this->db->select('PRO.product_name');
	$this->db->from('price_book_price as PRICE_BOOK');
	$this->db->join('products as PRO', 'PRO.product_id = PRICE_BOOK.price_book_price_item_id');
	$this->db->where('PRICE_BOOK.price_book_price_pb_id', $pricebook_id);
	$this->db->like('PRO.product_name', $q);
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
	
	