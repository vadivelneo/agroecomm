<?php

Class Reportmodule extends CI_Model
{ 
var $placementunder; 
	var $myuderidsales; 
	var $sponsors_list;
	var $personal_count;
	public function report_autosearch_vendor_name($q)
	{
		$this->db->select('vendor_id, vendor_name');
		$this->db->like('vendor_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('vendors');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['vendor_name']));
				$new_row['vendor_id']=htmlentities(stripslashes($row['vendor_id']));
				$new_row['vendor_name']=htmlentities(stripslashes($row['vendor_name']));
				$new_row['value']=htmlentities(stripslashes($row['vendor_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_store_name($q)
	{
		$this->db->select('*');
		$this->db->like('store_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('store');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['store_name']));
				$new_row['value']=htmlentities(stripslashes($row['store_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_division_name($q)
	{
		$this->db->select('*');
		$this->db->like('division_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('store_division');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['division_name']));
				$new_row['value']=htmlentities(stripslashes($row['division_name']));
				$new_row['division_id']=htmlentities(stripslashes($row['division_id']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_material_type($q)
	{
		$this->db->select('*');
		$this->db->like('products_type_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('products_type');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['products_type_name']));
				$new_row['value']=htmlentities(stripslashes($row['products_type_name']));
				$new_row['products_type_id']=htmlentities(stripslashes($row['products_type_id']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	
	public function report_autosearch_item_name($q)
	{
		$this->db->select('product_id, product_name');
		$this->db->like('product_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('products');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['product_name']));
				$new_row['product_id']=htmlentities(stripslashes($row['product_id']));
				$new_row['product_name']=htmlentities(stripslashes($row['product_name']));
				$new_row['value']=htmlentities(stripslashes($row['product_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	public function report_autosearch_item_code($q)
	{
		$this->db->select('product_id, product_code');
		$this->db->like('product_code', $q);
		$this->db->limit(10);
		$query = $this->db->get('products');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['product_code']));
				$new_row['product_id']=htmlentities(stripslashes($row['product_id']));
				$new_row['product_code']=htmlentities(stripslashes($row['product_code']));
				$new_row['value']=htmlentities(stripslashes($row['product_code']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	public function report_autosearch_item_mfg($q)
	{
		$this->db->select('product_id, product_mfr_part_number');
		$this->db->like('product_mfr_part_number', $q);
		$this->db->limit(10);
		$query = $this->db->get('products');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['product_mfr_part_number']));
				$new_row['product_id']=htmlentities(stripslashes($row['product_id']));
				$new_row['product_mfr_part_number']=htmlentities(stripslashes($row['product_mfr_part_number']));
				$new_row['value']=htmlentities(stripslashes($row['product_mfr_part_number']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_customer_name($q)
	{
		$this->db->select('customer_id, customer_name');
		$this->db->like('customer_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('customers');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['customer_name']));
				$new_row['customer_id']=htmlentities(stripslashes($row['customer_id']));
				$new_row['customer_name']=htmlentities(stripslashes($row['customer_name']));
				$new_row['value']=htmlentities(stripslashes($row['customer_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_enroll_name($q)
	{
		$this->db->select('OFCR_ID, OFCR_FST_NME');
		$this->db->like('OFCR_FST_NME', $q);
		$this->db->limit(10);
		$query = $this->db->get('officer');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['OFCR_FST_NME']));
				$new_row['customer_id']=htmlentities(stripslashes($row['OFCR_ID']));
				$new_row['customer_name']=htmlentities(stripslashes($row['OFCR_FST_NME']));
				$new_row['value']=htmlentities(stripslashes($row['OFCR_FST_NME']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	public function report_autosearch_product_group($q)
	{
		$this->db->select('products_group_id, products_group_name');
		$this->db->like('products_group_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('products_groups');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['products_group_name']));
				$new_row['products_group_id']=htmlentities(stripslashes($row['products_group_id']));
				$new_row['customer_name']=htmlentities(stripslashes($row['products_group_name']));
				$new_row['value']=htmlentities(stripslashes($row['products_group_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	
	public function report_autosearch_region_name($q)
	{
		$this->db->select('region_id, region_name');
		$this->db->like('region_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('region');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['region_name']));
				$new_row['region_id']=htmlentities(stripslashes($row['region_id']));
				$new_row['region_name']=htmlentities(stripslashes($row['region_name']));
				$new_row['value']=htmlentities(stripslashes($row['region_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_zone_name($q)
	{
		$this->db->select('zone_id, zone_name');
		$this->db->like('zone_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('zone');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['zone_name']));
				$new_row['zone_id']=htmlentities(stripslashes($row['zone_id']));
				$new_row['zone_name']=htmlentities(stripslashes($row['zone_name']));
				$new_row['value']=htmlentities(stripslashes($row['zone_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function report_autosearch_area_name($q)
	{
		$this->db->select('area_id, area_name');
		$this->db->like('area_name', $q);
		$this->db->limit(10);
		$query = $this->db->get('area');
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['area_name']));
				$new_row['area_id']=htmlentities(stripslashes($row['area_id']));
				$new_row['area_name']=htmlentities(stripslashes($row['area_name']));
				$new_row['value']=htmlentities(stripslashes($row['area_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function get_all_items_total($sess_company,$item_id,$report_from,$report_to)
	{
		
		 $item_total = $this->db->select('SINV_ITEMS.*,SINV_ITEMS.sale_invoice_item_model,SINV_ITEMS.sale_invoice_item_name,sum(SINV_ITEMS.sale_invoice_item_qty) as Qty_total');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						
						$this->db->group_by('SINV_ITEMS.sale_invoice_item_model');
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('SINV_ITEMS.sales_inv_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SINV_ITEMS.sales_inv_date <=', $report_to);
						}						
						
						$this->db->order_by('SINV_ITEMS.sale_invoice_item_code', 'ASC');
						$this->db->where('SINV_ITEMS.sale_invoice_status !=','cancelled');
						
						$ret = $this->db->get()->result_array();
						//echo $this->db->last_query(); exit;
		
		$qwr['item_details'] = $ret;
	
		return $qwr;
		
	
	}
	
	public function report_autosearch_salesman_name($q)
	{
		$this->db->select('DES_USR.designation_user_id, DES_USR.designation_user_name');
		$this->db->from('designation_users as DES_USR');
		$this->db->join('designation as DES', 'DES.designation_id = DES_USR.designation_user_designation_id');
		$this->db->where('DES.designation_name','Sales Man');
		$this->db->where('DES_USR.designation_user_status','active');
		$this->db->like('DES_USR.designation_user_name', $q);
		$this->db->limit(10);
		$query = $this->db->get();
		
		if($query->num_rows > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$new_row['label']=htmlentities(stripslashes($row['designation_user_name']));
				$new_row['designation_user_id']=htmlentities(stripslashes($row['designation_user_id']));
				$new_row['designation_user_name']=htmlentities(stripslashes($row['designation_user_name']));
				$new_row['value']=htmlentities(stripslashes($row['designation_user_name']));
				$row_set[] = $new_row;  
			}
			echo json_encode($row_set);  
		}
	}
	
	public function get_all_indent_loc()
	{
		$ret['rows'] = $this->db->select('*')
						->from('location')
						->where('location_status', 'active')
					 	->get()->result_array();
	 	return $ret;
	 
	}
  
  	public function get_report_purchase_order($sess_company,$report_from,$report_to,$vendor,$store_name,$search_item_status)
	{
		
		$this->db->select('PO.*, VEN.vendor_name, POT.po_total_gross_amount, POT.po_total_discount_amount, POT.po_total_tax_amount, POT.po_grand_total');
		$this->db->from('purchase_order as PO');
		$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
		//$this->db->join('purchase_order_tax_group as POTG','POTG.tax_group_purchase_order_id = PO.po_po_id');
		$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
		//$this->db->join('purchase_order_items as POI', 'POI.po_items_po_id = PO.po_po_id');
		$this->db->join('store as STR', 'STR.store_id = PO.po_store_id','left');
		$this->db->group_by('PO.po_po_id');
		$this->db->order_by('PO.po_po_no','ASC');
		if($report_from != "")
		{
			$this->db->where('PO.po_trans_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PO.po_trans_date <=', $report_to);
		}
		if($vendor != "")
		{
			$this->db->where('PO.po_vendor_id', $vendor);
		
		}
		if($store_name != "")
		{
			$this->db->where('STR.store_name', $store_name);
		
		}
		
		if($search_item_status != "")
		{
			$this->db->where('PO.po_po_status', $search_item_status);
		
		}
		
		
		$this->db->where('PO.po_status','active');
		$this->db->where('PO.po_po_company_id',$sess_company);
		//$ret = $this->db->get()->result_array();
		//echo "<pre>"; print_r($ret); exit;
		  $result = $this->db->get()->result_array();
	//echo $this->db->last_query();

	$errors = array_filter($result);

		if (!empty($errors))
		
			 $i = 0;
			 
			
	  foreach($result as $purchase)
	  {
		$ret =  $this->db->select('ITMES.*, PO.*,STR.*,PRO.*, STD.*,U.uom_name,U.uom_id');
				$this->db->from('purchase_order_items as ITMES');
				$this->db->join('purchase_order as PO', 'PO.po_po_id = ITMES.po_items_po_id');
				$this->db->join('uom as U', 'U.uom_id = ITMES.po_items_uom_id','left');
				$this->db->join('store as STR', 'STR.store_id = ITMES.po_items_store_id','left');
				$this->db->join('store_division as STD', 'STD.division_id = ITMES.po_items_store_division_id','left');
				$this->db->join('products as PRO', 'PRO.product_id = ITMES.po_items_item_id','left');
				$this->db->where('ITMES.po_items_po_id',$purchase['po_po_id']);
				//$this->db->group_by('ITMES.po_items_item_id');
		       
			   $query = $this->db->get()->result_array();
		
		  $result[$i] = $purchase;
		  $result[$i]['purchase_order'] = $query;
		  
		  $i++;
	  }
		
		return $result;
	}
	
		public function get_po_pending_report($sess_company,$report_from,$report_to,$vendor,$store_name,$report_item_name,$search_item_status,$division_name,$material_type,$division_id)
	{
		
		$this->db->select('PO.po_po_id, PO.po_po_no, PO.po_po_company_id, PO.po_vendor_id, PO.po_req_date, PO.po_valid_til, PO.po_ventor_qoute_no, PO.po_material_request_no, PO.po_sales_ord_no, PO.po_trans_date, PO.po_po_status, PO.po_add_date, VEN.vendor_name,POI.*,UOM.uom_name');
		$this->db->from('purchase_order_items as POI');
		//$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
		//$this->db->join('purchase_order_tax_group as POTG','POTG.tax_group_purchase_order_id = PO.po_po_id');
		$this->db->join('purchase_order as PO', 'POI.po_items_po_id = PO.po_po_id');
		$this->db->join('products as PRO', 'PRO.product_id = POI.po_items_item_id');
		$this->db->join('products_type as PRTYP', 'PRO.product_type_id = PRTYP.products_type_id');
		$this->db->join('uom as UOM', 'UOM.uom_id = POI.po_items_uom_id');
		$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
		$this->db->join('store as STR', 'STR.store_id = POI.po_items_store_id','left');
		//$this->db->join('store_division as DIV', 'DIV.division_id = POI.po_items_store_division_id','left');
		//$this->db->group_by('PO.po_po_id');
		//$this->db->order_by('PO.po_po_no','ASC');
		if($report_from != "")
		{
			$this->db->where('PO.po_trans_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PO.po_trans_date <=', $report_to);
		}
		if($vendor != "")
		{
			$this->db->where('PO.po_vendor_id', $vendor);
		
		}
		if($store_name != "")
		{
			$this->db->where('STR.store_name', $store_name);
		
		}
		if($report_item_name != "")
		{
			$this->db->where('PRO.product_name', $report_item_name);
		
		}
		
		if($division_id != "")
		{
		$this->db->where('POI.po_items_store_division_id', $division_id);
		}
		if($material_type != "")
		{
		$this->db->where('PRTYP.products_type_name', $material_type);
		}
		
		if($search_item_status != "")
		{
			$this->db->where('PO.po_po_status', $search_item_status);
		
		}
		
		$this->db->order_by('PO.po_trans_date', 'DESC');
		$this->db->where('PO.po_status','active');
		//$this->db->where('POI.po_items_qty !=','0.00');
		$this->db->where('PO.po_po_company_id',$sess_company);
		//$ret = $this->db->get()->result_array();
		//echo "<pre>"; print_r($ret); exit;
		
		  $result = $this->db->get()->result_array();
	//echo $this->db->last_query(); exit;
		
		return $result;
	}
	
	public function get_enrollement_reportsearch($sess_company,$user_code,$report_officer)
	{
		
		$this->db->select('OFFCR.*,OFFCR_TRE.*,OFFCR_RNK.rank');
		$this->db->from('officer as OFFCR');
		$this->db->join('officer_tree as OFFCR_TRE', 'OFFCR_TRE.OFCR_TRE_OFCR_ID = OFFCR.OFCR_ID');
		$this->db->join('rank_qualification as OFFCR_RNK', 'OFFCR_RNK.id = OFFCR.OFCR_RNK');
		
		if($report_officer != "")
		{
			$this->db->where('OFFCR_TRE.OFCR_TRE_SPNCR_ID',$report_officer);
		
		}
		else
		{
			$this->db->where('OFFCR_TRE.OFCR_TRE_SPNCR_ID',$user_code);
		}
		
		
		
		  $result = $this->db->get()->result_array();
	//echo $this->db->last_query(); exit;
		
		return $result;
	}
	
	public function getenrollement_report($id, $search_key)
	{	
		$this->db->select('OFFCR.*,OFFCR_TRE.*,OFFCR_RNK.rank');
		$this->db->from('officer as OFFCR');
		$this->db->join('officer_tree as OFFCR_TRE', 'OFFCR_TRE.OFCR_TRE_OFCR_ID = OFFCR.OFCR_ID');
		$this->db->join('rank_qualification as OFFCR_RNK', 'OFFCR_RNK.id = OFFCR.OFCR_RNK');
		
		$this->db->where('OFFCR_TRE.OFCR_TRE_SPNCR_ID',$id);
		 $result = $this->db->get()->result_array();
		// echo $this->db->last_query(); exit;
		return $result;
		
		
	}
	public function get_po_excess_report($sess_company,$report_from,$report_to,$vendor_id,$store_name,$report_item_name,$search_item_status,$division_name,$material_type,$division_id)
	{
		
		$this->db->select('PI.*,PII.*, VEN.vendor_name,UOM.uom_name,PO.po_trans_date,PO.po_po_no');
		$this->db->from('purchase_indent_items as PII');
		//$this->db->join('purchase_order_total as POT','POT.po_total_purchase_id = PO.po_po_id');
		//$this->db->join('purchase_order_tax_group as POTG','POTG.tax_group_purchase_order_id = PO.po_po_id');
		$this->db->join('purchase_indent as PI', 'PII.po_indent_item_indent_id = PI.po_indent_id');
		$this->db->join('purchase_order as PO', 'PO.po_po_id = PI.po_purchase_order_id');
		$this->db->join('products as PRO', 'PRO.product_id = PII.po_indent_item_item_id');
		$this->db->join('products_type as PRTYP', 'PRO.product_type_id = PRTYP.products_type_id');
		//$this->db->join('store_division as DIV', 'DIV.division_id = PRO.material_store_division_id');
		$this->db->join('uom as UOM', 'UOM.uom_id = PII.po_indent_uom_id');
		$this->db->join('vendors as VEN','VEN.vendor_id = PI.po_indent_vendor_id');
		$this->db->join('store as STR', 'STR.store_id = PI.po_indent_store_id','left');
		//$this->db->group_by('PO.po_po_id');
		//$this->db->order_by('PO.po_po_no','ASC');
		if($report_from != "")
		{
			$this->db->where('PI.po_indent_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PI.po_indent_date <=', $report_to);
		}
		if($vendor_id != "")
		{
			$this->db->where('PI.po_indent_vendor_id', $vendor_id);
		
		}
		if($store_name != "")
		{
			$this->db->where('STR.store_name', $store_name);
		
		}
		if($report_item_name != "")
		{
		$this->db->where('PRO.product_name', $report_item_name);
		
		}
		if($division_id != "")
		{
		$this->db->where('PI.po_indent_division_id', $division_id);
		}
		if($material_type != "")
		{
		$this->db->where('PRTYP.products_type_name', $material_type);
		}
		
		if($search_item_status != "")
		{
			$this->db->where('PI.po_indent_active_status', $search_item_status);
		
		}
		
		$this->db->where('PII.po_indent_extra_qty !=','0.00');
		$this->db->where('PI.po_indent_status','enable');
		//$this->db->where('PI.po_po_company_id',$sess_company);
		//$ret = $this->db->get()->result_array();
		//echo "<pre>"; print_r($ret); exit;
		
		  $result = $this->db->get()->result_array();
	//echo $this->db->last_query(); exit;
		
		return $result;
	}
		
	public function get_purchase_flow_report($sess_company,$report_from,$report_to,$vendor)
	{
		
		$this->db->select('PO.po_po_id, PO.po_po_no, PO.po_add_date, IND.po_indent_number, IND.po_indent_add_date, PUR_INV.po_invoice_number, PUR_INV.po_invoice_add_date');
		
		$this->db->from('purchase_order as PO');
		$this->db->join('purchase_indent as IND','IND.po_purchase_order_id = PO.po_po_id');
		$this->db->join('purchase_invoice as PUR_INV','PUR_INV.po_invoice_po_reference_id = IND.po_purchase_order_id');
		$this->db->join('vendors as VEN','VEN.vendor_id = PO.po_vendor_id');
		$this->db->order_by('po_po_id', 'DESC');
		//$this->db->group_by('po_invoice_number');
		//$this->db->where('IND.po_indent_number','PI0044');
		
		
		if($report_from != "")
		{
			$this->db->where('PO.po_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PO.po_add_date <=', $report_to);
		}
		if($vendor != "")
		{
			$this->db->where('PO.po_vendor_id', $vendor);
		
		}
		$this->db->where('PO.po_status','active');
		$this->db->where('PO.po_po_company_id',$sess_company);
		$ret = $this->db->get()->result_array();
		
		
		return $ret;
	}
	
	public function get_report_purchase_invoice($sess_company,$report_from,$report_to,$vendor)
	{
	  $this->db->select('PIN.po_invoice_id, PIN.po_invoice_number, PIN.po_invoice_company_id, PIN.po_invoice_po_reference_number, PIN.po_invoice_po_indent_reference_number, PIN.po_invoice_status, PIN.po_invoice_add_date, VEN.vendor_name, PINT.po_invoice_total_gross_amount, PINT.po_invoice_total_discount_amount,PINT.po_invoice_total_tax_amount, PINT.po_invoice_grand_total, PINTG.*');
	  $this->db->from('purchase_invoice as PIN');
	  $this->db->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id');
	  $this->db->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id');
	  $this->db->join('purchase_invoice_tax_group as PINTG','PINTG.tax_group_purchase_invoice_id = PIN.po_invoice_id');
	  $this->db->where('PIN.po_invoice_active_status', 'active');
	  $this->db->where('PIN.po_invoice_company_id',$sess_company);
	  if($report_from != "")
	  {
		  $this->db->where('PIN.po_invoice_date >=', $report_from);
	  }
	  if($report_to != "")
	  {
		  $this->db->where('PIN.po_invoice_date <=', $report_to);
	  }
	  if($vendor != "")
	  {
		  $this->db->where('PIN.po_invoice_vendor_id', $vendor);
	  }
	  $result = $this->db->get()->result_array();
	  
	  $errors = array_filter($result);

		if (!empty($errors)) 
		{
			$i = 0;
	  foreach($result as $invoice)
	  {
		$this->db->select('PIT.*,U.uom_name,U.uom_id,P.product_name, P.product_code, P.product_mfr_part_number ');
		$this->db->from('purchase_invoice_items as PIT');
		$this->db->join('products as P', 'P.product_id = PIT.po_invoice_items_item_id');
		$this->db->join('uom as U', 'U.uom_id = PIT.po_invoice_items_uom_id');
	 	$this->db->where('po_invoice_items_inovice_id', $invoice['po_invoice_id']);
		$query = $this->db->get()->result_array();
		
		  $result[$i] = $invoice;
		  $result[$i]['invoice_summary'] = $query;
		  
		  $i++;
	  }
		}

	  
	  //echo "<pre>"; print_r($result); exit;
	  return $result;
 	}
	public function get_item_invoice_summary($sess_company,$report_from,$report_to,$vendor) 
	{
		$this->db->select('PIT.*,U.uom_name,U.uom_id,P.product_name, P.product_code, P.product_mfr_part_number ');
		$this->db->from('purchase_invoice_items as PIT');
		$this->db->join('products as P', 'P.product_id = PIT.po_invoice_items_item_id');
		$this->db->join('uom as U', 'U.uom_id = PIT.po_invoice_items_uom_id');
	 	$this->db->where('po_invoice_items_inovice_id', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	public function get_report_purchase_indent($sess_company,$report_from,$report_to,$vendor,$location,$store_name,$search_item_status)
	{
		$this->db->select('PI.*, VEN.vendor_name, LOC.location_name, LOC.location_id,STR.*');
		$this->db->from('purchase_indent as PI');
		$this->db->join('vendors as VEN','VEN.vendor_id = PI.po_indent_vendor_id');
		$this->db->join('location as LOC', 'LOC.location_id = PI.po_location');
		$this->db->join('store as STR', 'STR.store_id = PI.po_indent_store_id');
		$this->db->where('PI.po_indent_status','enable');
		if($report_from != "")
		{
			$this->db->where('PI.po_indent_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PI.po_indent_date <=', $report_to);
		}
		if($vendor != "")
		{
			$this->db->where('PI.po_indent_vendor_id', $vendor);
		}
		if($location != "")
		{
			$this->db->where('PI.po_location', $location);
		}
		
		if($store_name != "")
		{
			$this->db->where('STR.store_name', $store_name);
		}
			if($search_item_status != "")
		{
			$this->db->where('PI.po_indent_active_status', $search_item_status);
		}
		$this->db->where('PI.po_indent_company_id', $sess_company);
		$this->db->order_by('PI.po_indent_number', 'ASC');
		
		//echo "<pre>"; print_r($ret); exit;
		
	  $result = $this->db->get()->result_array();
	 // echo $this->db->last_query(); exit;
	  $errors = array_filter($result);

		if (!empty($errors))
		{
			 $i = 0;
	  foreach($result as $invoice)
	  {
		$ret =  $this->db->select('ITMES.*,U.uom_name,U.uom_id');
				$this->db->from('purchase_indent_items as ITMES');
				$this->db->join('uom as U', 'U.uom_id = ITMES.po_indent_uom_id','left');
				//$this->db->join('store as STR', 'STR.store_id = PO.po_store_id');
				$this->db->where('ITMES.po_indent_item_indent_id',$invoice['po_indent_id']);
				
		       
			   $query = $this->db->get()->result_array();
		
		  $result[$i] = $invoice;
		  $result[$i]['purchase_indent'] = $query;
		  
		  $i++;
	  }
		}
	 
	  //echo "<pre>"; print_r($result); exit;
		return $result;
		
	}
	
	public function get_report_sales_order($sess_user,$report_from,$report_to,$customer,$region_id,$zone_id,$area_id,$salesman_id)
	{
		if($sess_user == 1 || $sess_user == 2)
		{
		$this->db->select('SO.*, TOT.so_total_gross_amount, TOT.so_total_tax_amount, TOT.so_total_discount_amount, TOT.so_grand_total, CUS.OFCR_LST_NME, CUS.OFCR_FST_NME as customer_name');
		$this->db->from('sales_order as SO');
		$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
		$this->db->join('officer as CUS', 'CUS.OFCR_ID = SO.sales_order_customer_id');
		
		$this->db->order_by('SO.sales_order_id', 'DESC');
		$this->db->where('SO.sales_order_active_status','active');
		if($report_from != "")
		{
			$this->db->where('SO.sales_order_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SO.sales_order_add_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SO.sales_order_customer_id',$customer);
		}
		
		//$this->db->where('SO.sales_order_company_id',$sess_company);
		$ret = $this->db->get()->result_array();
		}
		else
		{
			$this->db->select('SO.*, TOT.so_total_gross_amount, TOT.so_total_tax_amount, TOT.so_total_discount_amount, TOT.so_grand_total, CUS.OFCR_LST_NME, CUS.OFCR_FST_NME as customer_name');
		$this->db->from('sales_order as SO');
		$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
		$this->db->join('officer as CUS', 'CUS.OFCR_ID = SO.sales_order_customer_id');
		
		$this->db->order_by('SO.sales_order_id', 'DESC');
		$this->db->where('SO.sales_order_active_status','active');
		if($report_from != "")
		{
			$this->db->where('SO.sales_order_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SO.sales_order_add_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SO.sales_order_customer_id',$customer);
		}
		
		$this->db->where('CUS.OFCR_ADD_USR_ID',$sess_user);
		$ret = $this->db->get()->result_array();
		}
		
		return $ret;
	} 
	
	
	public function get_report_sales_incentive($sess_group,$sess_user,$report_from,$report_to,$customer)
	{
		if($sess_user == 1 || $sess_user == 2)
		{
		$this->db->select('SO.*,CUS.*,TOT.* ');
		$this->db->from('sales_order as SO');
		$this->db->join('officer as CUS', 'CUS.OFCR_ID = SO.sales_order_customer_id');
		$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
		if($customer != "")
		{
			$this->db->where('SO.sales_order_customer_id', $customer);
		}
		if($report_from != "")
		{
			$this->db->where('SO.sales_order_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SO.sales_order_add_date <=', $report_to);
		}
		
		$this->db->order_by('SO.sales_order_id	', 'DESC');
		
		$ret = $this->db->get()->result_array();
		}
		else
		{
			$this->db->select('SO.*,CUS.*,TOT.* ');
		$this->db->from('sales_order as SO');
		$this->db->join('officer as CUS', 'CUS.OFCR_ID = SO.sales_order_customer_id');
		$this->db->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id');
		if($customer != "")
		{
			$this->db->where('SO.sales_order_customer_id', $customer);
		}
		if($report_from != "")
		{
			$this->db->where('SO.sales_order_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SO.sales_order_add_date <=', $report_to);
		}
		$this->db->where('CUS.OFCR_ADD_USR_ID',$sess_user);
		$this->db->order_by('SO.sales_order_id	', 'DESC');
		
		$ret = $this->db->get()->result_array();
		}
		//echo $this->db->last_query();
		$errors = array_filter($ret);

		if (!empty($errors)) 
		{
			$i = 0;
			  foreach($ret as $invoice)
			  {
				
				$this->db->select('*');
				$this->db->from('incentive_details');
				$this->db->where('SO_ID', $invoice['sales_order_id']);
				$query = $this->db->get()->result_array();
				//echo $this->db->last_query();
				  $ret[$i] = $invoice;
				  $ret[$i]['invoice_summary'] = $query;
				  
				  $i++;
				  
				 
			  }
		}
		
		return $ret;
	}
	
	public function get_sales_incentive($id) 
	{
		$this->db->select('*');
		$this->db->from('incentive_details');
	 	$this->db->where('SO_ID', $id);
		
		//$this->db->join('product_stock as PRST', 'PRST.product_stock_uom_id = U.uom_id');
		$query = $this->db->get()->result_array();
		//echo $this->db->last_query();
		return $query; 
	}
	
	public function get_officer_incentive($id,$report_from,$report_to) 
	{
		$this->db->select('incv.*,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,OFCR1.OFCR_FST_NME as ofcr_name,OFCR1.OFCR_LST_NME as ofcr_name2');
		$this->db->from('incentive_details as incv');
		$this->db->join('officer as OFCR', 'incv.OFCR_ID = OFCR.OFCR_ID');
		$this->db->join('sales_order as SO', 'SO.sales_order_number = incv.SO_NO');
		$this->db->join('officer as OFCR1', 'OFCR1.OFCR_ID = SO.sales_order_customer_id');
		$this->db->order_by('SO.sales_order_id', 'DESC');
	 	$this->db->where('incv.OFCR_ID', $id);
		
		
		if($report_from != "")
		{
			$this->db->where('SO.sales_order_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SO.sales_order_add_date <=', $report_to);
		}
		
		//$this->db->join('product_stock as PRST', 'PRST.product_stock_uom_id = U.uom_id');
		$query = $this->db->get()->result_array();
		//echo $this->db->last_query();
		return $query; 
	}
	
	public function get_officer_redeem($id,$report_from,$report_to,$payment_status) 
	{
		$this->db->select('incv.*,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME,PAY_MODE.payment_mode_name');
		$this->db->from('incentive_details as incv');
		//$this->db->join('sales_order as SO', 'incv.SO_ID = SO.sales_order_id');
		$this->db->join('officer as OFCR', 'incv.OFCR_ID = OFCR.OFCR_ID');
		$this->db->join('payment_mode as PAY_MODE', 'PAY_MODE.payment_mode_id = incv.PAYMENT_STATUS');
		//$this->db->join('sales_order as SO', 'SO.sales_order_number = incv.SO_NO');
	 	$this->db->where('incv.OFCR_ID', $id);
		
		
		if($report_from != "")
		{
			$this->db->where('incv.CREATED_DATE >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('incv.CREATED_DATE <=', $report_to);
		}
		if($payment_status != "")
		{
			$this->db->where('incv.PAYMENT_STATUS', $payment_status);
		}
		//$this->db->join('product_stock as PRST', 'PRST.product_stock_uom_id = U.uom_id');
		$query = $this->db->get()->result_array();
		//echo $this->db->last_query();
		return $query; 
	}
	
	public function get_usr_sales_incentive($sess_group,$sess_user,$report_from,$report_to,$customer)
	{
		if($sess_user == 1 || $sess_user == 2)
		{
	$this->db->select('incv.*,sum(incv.USR_INCENTIVE_AMT) as incentive_amt,sum(incv.USR_REDEEM_AMT) as redeem_amt');
				$this->db->from('incentive_details as incv');
				//$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = incv.OFCR_ID');
				//$this->db->join('sales_order as SO', 'SO.sales_order_number = incv.SO_NO');
				//$this->db->where('OFCR.OFCR_ADD_USR_ID', $sess_user);
		if($customer != "")
		{
			$this->db->where('incv.OFCR_ID', $customer);
		}
		if($report_from != "")
		{
			$this->db->where('incv.CREATED_DATE >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('incv.CREATED_DATE <=', $report_to);
		}
	
		$this->db->group_by('incv.OFCR_ID');
		$this->db->order_by('incv.OFCR_ID', 'DESC');
		
		$ret = $this->db->get()->result_array();
		}
		else
		{
				$this->db->select('incv.*,sum(incv.USR_INCENTIVE_AMT) as incentive_amt,sum(incv.USR_REDEEM_AMT) as redeem_amt');
				$this->db->from('incentive_details as incv');
				$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = incv.OFCR_ID');
				//$this->db->join('sales_order as SO', 'SO.sales_order_number = incv.SO_NO');
				$this->db->where('OFCR.OFCR_ADD_USR_ID', $sess_user);
		if($customer != "")
		{
			$this->db->where('incv.OFCR_ID', $customer);
		}
		if($report_from != "")
		{
			$this->db->where('incv.CREATED_DATE >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('incv.CREATED_DATE <=', $report_to);
		}
		
		$this->db->group_by('incv.OFCR_ID');
		$this->db->order_by('incv.OFCR_ID', 'DESC');
		
		$ret = $this->db->get()->result_array();
		}
		//echo $this->db->last_query();
		$errors = array_filter($ret);

	/*	if (!empty($errors)) 
		{
			$i = 0;
			  foreach($ret as $invoice)
			  {
				
				$this->db->select('incv.*,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME');
				$this->db->from('incentive_details as incv');
				$this->db->join('sales_order as SO', 'incv.SO_ID = SO.sales_order_id');
				$this->db->join('officer as OFCR', 'SO.sales_order_customer_id = OFCR.OFCR_ID');
				$this->db->where('incv.OFCR_ID', $invoice['OFCR_ID']);
		
				$query = $this->db->get()->result_array();
				//echo $this->db->last_query();
				  $ret[$i] = $invoice;
				  $ret[$i]['invoice_summary'] = $query;
				  
				  $i++;
				  
				 
			  }
		}
		*/
		return $ret;
	}
	
	public function get_usr_sales_transaction($sess_group,$sess_user,$report_from,$report_to,$customer,$payment_status)
	{
		
	$this->db->select('incv.*,sum(incv.USR_INCENTIVE_AMT) as incentive_amt,sum(incv.USR_REDEEM_AMT) as redeem_total');
				$this->db->from('incentive_details as incv');
				$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = incv.OFCR_ID');
				//$this->db->join('payment_mode as PAY_MODE', 'PAY_MODE.payment_mode_id = incv.PAYMENT_STATUS');
				//$this->db->join('sales_order as SO', 'SO.sales_order_number = incv.SO_NO');
				//$this->db->where('incv.USR_REDEEM_AMT !=', 0.00);
		
		if($customer != "")
		{
			$this->db->where('incv.OFCR_ID', $customer);
		}
		if($report_from != "")
		{
			$this->db->where('incv.CREATED_DATE >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('incv.CREATED_DATE <=', $report_to);
		}
		if($payment_status != "")
		{
			$this->db->where('incv.PAYMENT_STATUS', $payment_status);
		}
		$this->db->group_by('incv.OFCR_ID');
		$this->db->order_by('incv.OFCR_ID', 'DESC');
		
		$ret = $this->db->get()->result_array();
		
		//echo $this->db->last_query(); exit;
		
		return $ret;
	}
	
	function insertSMSDetails($officerrankdata)
	{
		$this->db->insert('sms_details', $officerrankdata);
		
		return true;
	}
	
	public function get_customer_incentive($sess_group,$sess_user,$customer)
	{
		
	$this->db->select('incv.*,sum(incv.USR_INCENTIVE_AMT) as incentive_amt,sum(incv.USR_REDEEM_AMT) as redeem_amt,OFCR.OFCR_MOB');
				$this->db->from('incentive_details as incv');
				$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = incv.OFCR_ID');
				//$this->db->where('OFCR.OFCR_ADD_USR_ID', $sess_user);
		if($customer != "")
		{
			$this->db->where('incv.OFCR_ID', $customer);
		}
	
		$this->db->group_by('incv.OFCR_ID');
		$this->db->order_by('incv.OFCR_ID', 'DESC');
		
		$ret = $this->db->get()->result_array();
		
		//echo $this->db->last_query();
		
		return $ret;
	}
	
		public function get_report_sales_return($sess_group,$sess_company,$report_from,$report_to,$customer,$region_id,$zone_id,$area_id,$salesman_id)
	{
		
		                $this->db->select('SI.*, TOT.*,CUS.customer_name,REG.region_name');
						$this->db->from('sale_return_new as SI');
						$this->db->join('sale_return_total_new AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						$this->db->join('region as REG', 'SI.sale_return_region = REG.region_id');
		
		if($report_from != "")
		{
			$this->db->where('SI.sale_invoice_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SI.sale_invoice_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SI.sale_invoice_customer_id', $customer);
		}
		if($region_id != "")
		{
			$this->db->where('SO.sales_order_region_id',$region_id);
		}
		if($zone_id != "")
		{
			$this->db->where('SO.sales_order_zone_id',$zone_id);
		}
		if($area_id != "")
		{
			$this->db->where('SO.sales_order_area_id',$area_id);
		}
		if($salesman_id != "")
		{
			$this->db->where('SO.sales_order_referral_id',$salesman_id);
		}
		if($sess_group != '1')
		{
			$this->db->where('SI.sale_invoice_company_id', $sess_company);
		}
		$this->db->where('SI.sale_invoice_status !=','returned');
		$this->db->where('SI.sale_invoice_active_status !=','inactive');
		
		$this->db->order_by('SI.sale_invoice_id', 'DESC');
		$ret = $this->db->get()->result_array();
		//echo $this->db->last_query();
		$errors = array_filter($ret);

		if (!empty($errors)) 
		{
			$i = 0;
			  foreach($ret as $invoice)
			  {
				$this->db->select('SIT.*,U.uom_name,U.uom_id');
				$this->db->from('sale_return_item_new as SIT');
				//$this->db->join('products as P', 'P.product_id = SIT.sale_invoice_item_si_id');
				$this->db->join('uom as U', 'U.uom_id = SIT.sale_invoice_item_uom_id');
				$this->db->where('SIT.sale_invoice_item_si_id', $invoice['sale_invoice_id']);
				$query = $this->db->get()->result_array();
				//echo $this->db->last_query();
				  $ret[$i] = $invoice;
				  $ret[$i]['invoice_summary'] = $query;
				  
				  $i++;
			  }
		}
		
		
		return $ret;
	}
	
	
		public function get_report_purchase_collection($sess_company,$report_from,$report_to,$vendor)
	{
		
		$this->db->select('PI.*, PAY_DET.*,  VEN.vendor_name');
		$this->db->from('purchase_invoice as PI');
		$this->db->join('payment_payment_details AS PAY_DET','PAY_DET.payment_payment_invoice_id = PI.po_invoice_id');
		$this->db->join('vendors as VEN', 'VEN.vendor_id = PAY_DET.payment_payment_vendor_id');
	
		if($report_from != "")
		{
			$this->db->where('PI.po_invoice_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('PI.po_invoice_add_date <=', $report_to);
		}
		
	
		$this->db->where('PI.po_invoice_company_id', $sess_company);
		
			if($vendor != "")
		{
			$this->db->where('VEN.vendor_id', $vendor);
		}
		
		$this->db->order_by('PI.po_invoice_id', 'DESC');
		$ret = $this->db->get()->result_array();
		//$ret =   $this->db->last_query(); 
		//echo $ret; exit;
		return $ret;
	}
	
	public function get_report_sales_collection($sess_company,$report_from,$report_to,$customer)
	{
		$this->db->select('SI.sale_invoice_id, SI.sale_invoice_no, SI.sale_invoice_company_id, SI.sale_invoice_no, SI.sale_invoice_date,  SI.sale_invoice_customer_id, SI.sale_invoice_status, SI.sale_invoice_payment_status,  SI.sale_invoice_add_date, PAY_DET.invoice_payment_id, PAY_DET.invoice_payment_invoice_id, PAY_DET.invoice_payment_customer_id, PAY_DET.invoice_payment_invoice_amount, PAY_DET.invoice_payment_invoice_tds, PAY_DET.invoice_payment_paid_amount, PAY_DET.invoice_payment_due_amount, PAY_DET.invoice_payment_adjusted_amount, PAY_DET.invoice_payment_payment_status, CUS.customer_name');
		$this->db->from('sale_invoice as SI');
		$this->db->join('invoice_payment_details AS PAY_DET','PAY_DET.invoice_payment_invoice_id = SI.sale_invoice_id');
		$this->db->join('customers as CUS', 'CUS.customer_id = PAY_DET.invoice_payment_customer_id');
		
		if($report_from != "")
		{
			$this->db->where('SI.sale_invoice_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SI.sale_invoice_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SI.sale_invoice_customer_id =', $customer);
		}
	
		$this->db->where('SI.sale_invoice_company_id', $sess_company);
		$this->db->order_by('SI.sale_invoice_id', 'DESC');
		$invoices = $this->db->get()->result_array();
		$ret = array();
		$i = 0;
		foreach($invoices as $INV)
		{
			$this->db->select('INVOICE_SUMMARY.amount, INVOICE_SUMMARY.invoice_id, INVOICE_SUMMARY.receipt_id, INVOICE_SUMMARY.receipt_summary_id, RECP.invoice_receipt_id, RECP.invoice_receipt_number, RECP.invoice_receipt_customer_id, RECP.invoice_receipt_date, RECP.invoice_receipt_amount, RECP.invoice_receipt_balance_amount, RECP.invoice_receipt_status, RECP.invoice_receipt_payment_mode_id, RECP.invoice_receipt_added_date, PAY.payment_mode_name, SI.sale_invoice_no');
		$this->db->from('invoice_receipt_summary as INVOICE_SUMMARY');
		$this->db->join('sale_invoice as SI','SI.sale_invoice_id = INVOICE_SUMMARY.invoice_id');
		$this->db->join('invoice_receipt AS RECP','RECP.invoice_receipt_id = INVOICE_SUMMARY.receipt_id');
		$this->db->join('payment_mode as PAY', 'PAY.payment_mode_id = RECP.invoice_receipt_payment_mode_id');
		$this->db->where('INVOICE_SUMMARY.invoice_id', $INV['sale_invoice_id']);
		$payment = $this->db->get()->result_array();
		
			$ret[$i] = $INV;
			$ret[$i]['receipt'] = $payment;
			
			$i++;
		}
		//echo "<pre>"; print_r($ret); exit;
		return $ret;
	}
	
	public function get_report_sales_due($sess_company,$report_from,$report_to,$customer)
	{
		$this->db->select('SI.sale_invoice_id, SI.sale_invoice_no, SI.sale_invoice_company_id, SI.sale_invoice_no, SI.sale_invoice_date, SI.sale_invoice_customer_id,  SI.sale_invoice_status, SI.sale_invoice_payment_status, SI.sale_invoice_add_date, PAY_DET.invoice_payment_id, PAY_DET.invoice_payment_invoice_id, PAY_DET.invoice_payment_customer_id, PAY_DET.invoice_payment_invoice_amount, PAY_DET.invoice_payment_invoice_tds, PAY_DET.invoice_payment_paid_amount, PAY_DET.invoice_payment_due_amount, PAY_DET.invoice_payment_adjusted_amount, PAY_DET.invoice_payment_payment_status, CUS.customer_name');
		$this->db->from('sale_invoice as SI');
		$this->db->join('invoice_payment_details AS PAY_DET','PAY_DET.invoice_payment_invoice_id = SI.sale_invoice_id');
		$this->db->join('customers as CUS', 'CUS.customer_id = PAY_DET.invoice_payment_customer_id');
		
		if($report_from != "")
		{
			$this->db->where('SI.sale_invoice_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SI.sale_invoice_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SI.sale_invoice_customer_id =', $customer);
		}
		
		$this->db->where('PAY_DET.invoice_payment_due_amount >', '0.00');
		$this->db->where('SI.sale_invoice_company_id', $sess_company);
		$this->db->order_by('SI.sale_invoice_id', 'DESC');
		$invoices = $this->db->get()->result_array();
		$ret = array();
		$i = 0;
		foreach($invoices as $INV)
		{
			$this->db->select('INVOICE_SUMMARY.amount, INVOICE_SUMMARY.invoice_id, INVOICE_SUMMARY.receipt_id, INVOICE_SUMMARY.receipt_summary_id, RECP.invoice_receipt_id, RECP.invoice_receipt_number, RECP.invoice_receipt_customer_id, RECP.invoice_receipt_date, RECP.invoice_receipt_amount, RECP.invoice_receipt_balance_amount, RECP.invoice_receipt_status, RECP.invoice_receipt_payment_mode_id, RECP.invoice_receipt_added_date, PAY.payment_mode_name, SI.sale_invoice_no');
		$this->db->from('invoice_receipt_summary as INVOICE_SUMMARY');
		$this->db->join('sale_invoice as SI','SI.sale_invoice_id = INVOICE_SUMMARY.invoice_id');
		$this->db->join('invoice_receipt AS RECP','RECP.invoice_receipt_id = INVOICE_SUMMARY.receipt_id');
		$this->db->join('payment_mode as PAY', 'PAY.payment_mode_id = RECP.invoice_receipt_payment_mode_id');
		$this->db->where('INVOICE_SUMMARY.invoice_id', $INV['sale_invoice_id']);
		$payment = $this->db->get()->result_array();
		
			$ret[$i] = $INV;
			$ret[$i]['receipt'] = $payment;
			
			$i++;
		}
		//echo "<pre>"; print_r($ret); exit;
		return $ret;
	}
	
	public function get_total_sales_due($sess_company,$report_from,$report_to,$customer)
	{
		$this->db->select('sum(PAY_DET.invoice_payment_invoice_amount) as INV_AMT, sum(PAY_DET.invoice_payment_paid_amount) as INV_PAID_AMT, sum(PAY_DET.invoice_payment_due_amount) as INV_DUE_AMT');
		$this->db->from('sale_invoice as SI');
		$this->db->join('invoice_payment_details AS PAY_DET','PAY_DET.invoice_payment_invoice_id = SI.sale_invoice_id');
		$this->db->join('customers as CUS', 'CUS.customer_id = PAY_DET.invoice_payment_customer_id');
	
		if($report_from != "")
		{
			$this->db->where('SI.sale_invoice_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SI.sale_invoice_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SI.sale_invoice_customer_id =', $customer);
		}
		$this->db->where('PAY_DET.invoice_payment_due_amount >', '0.00');
		$this->db->where('SI.sale_invoice_company_id', $sess_company);
		$this->db->order_by('SI.sale_invoice_id', 'DESC');
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	public function get_sales_invoice_income($id)
	{
		$this->db->select('SI.sale_invoice_no, INVOICE_SUMMARY.amount, INVOICE_SUMMARY.invoice_id, INVOICE_SUMMARY.receipt_id, INVOICE_SUMMARY.receipt_summary_id, RECP.invoice_receipt_id, RECP.invoice_receipt_number, RECP.invoice_receipt_customer_id, RECP.invoice_receipt_date, RECP.invoice_receipt_amount, RECP.invoice_receipt_balance_amount, RECP.invoice_receipt_status, RECP.invoice_receipt_payment_mode_id, RECP.invoice_receipt_added_date, PAY.payment_mode_name');
		$this->db->from('invoice_receipt_summary as INVOICE_SUMMARY');
		$this->db->join('sale_invoice AS SI','SI.sale_invoice_id = INVOICE_SUMMARY.invoice_id');
		$this->db->join('invoice_receipt AS RECP','RECP.invoice_receipt_id = INVOICE_SUMMARY.receipt_id');
		$this->db->join('payment_mode as PAY', 'PAY.payment_mode_id = RECP.invoice_receipt_payment_mode_id');
		$this->db->where('INVOICE_SUMMARY.invoice_id', $id);
		$payment = $this->db->get()->result_array();
		
		return $payment;
		
	}
	
	public function get_total_sales_collection($sess_company,$report_from,$report_to,$customer)
	{
		$this->db->select('sum(PAY_DET.invoice_payment_invoice_amount) as INV_AMT, sum(PAY_DET.invoice_payment_paid_amount) as INV_PAID_AMT, sum(PAY_DET.invoice_payment_due_amount) as INV_DUE_AMT');
		$this->db->from('sale_invoice as SI');
		$this->db->join('invoice_payment_details AS PAY_DET','PAY_DET.invoice_payment_invoice_id = SI.sale_invoice_id');
		$this->db->join('customers as CUS', 'CUS.customer_id = PAY_DET.invoice_payment_customer_id');
	
		if($report_from != "")
		{
			$this->db->where('SI.sale_invoice_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SI.sale_invoice_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SI.sale_invoice_customer_id =', $customer);
		}
	
		$this->db->where('SI.sale_invoice_company_id', $sess_company);
		$this->db->order_by('SI.sale_invoice_id', 'DESC');
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	public function get_cust_debitnotes($customer)
	{
		//echo $customer;
			$this->db->select('CUSA.*, USR.user_name,  CUS.customer_name');
			$this->db->from('accounts as CUSA');
			$this->db->join('users as USR', 'CUSA.account_created_by = USR.user_id');
			$this->db->join('customers as CUS', 'CUS.customer_id = CUSA.account_user_id');
			$this->db->where('CUSA.account_type', 'debit');	
				
						if($customer != "")
						{
						$this->db->where('CUSA.account_user_id =', $customer);
						}
				$ret = $this->db->get()->result_array();
		return $ret;
	}
		public function get_cust_debit_total($customer)
	{
		//echo $customer;
			$this->db->select('sum(CUSA.account_amount) as debit_total');
			$this->db->from('accounts as CUSA');
			$this->db->where('CUSA.account_type', 'debit');	
				
						if($customer != "")
						{
						$this->db->where('CUSA.account_user_id =', $customer);
						}
				$ret = $this->db->get()->row();
		return $ret;
	}
		

	public function get_report_sales_report($sess_company,$report_from,$report_to,$customer)
	{
		
		$this->db->select('SR.*, CUS.customer_name, USR.user_name');
		$this->db->from('sales_return as SR');
		$this->db->join('customers as CUS', 'CUS.customer_id = SR.sales_return_customer_id');
		$this->db->join('users as USR', 'SR.sales_return_created_by = USR.user_id');
	
		if($report_from != "")
		{
			$this->db->where('SR.sales_return_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SR.sales_return_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SR.sales_return_customer_id =', $customer);
		}
	
		$this->db->where('SR.sales_return_company_id', $sess_company);
		$this->db->order_by('SR.sales_return_id', 'DESC');
		$ret = $this->db->get()->result_array();
		//$ret =   $this->db->last_query(); 
		//echo $ret; exit;
		return $ret;
	}
	public function get_total_sales_report($sess_company,$report_from,$report_to,$customer)
	{
		
		$this->db->select('sum(SR.sales_return_total_net_amount)  as return_total');
		$this->db->from('sales_return as SR');
		$this->db->join('customers as CUS', 'CUS.customer_id = SR.sales_return_customer_id');
		$this->db->join('users as USR', 'SR.sales_return_created_by = USR.user_id');
	
		if($report_from != "")
		{
			$this->db->where('SR.sales_return_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('SR.sales_return_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('SR.sales_return_customer_id =', $customer);
		}
	
		$this->db->where('SR.sales_return_company_id', $sess_company);
		$this->db->order_by('SR.sales_return_id', 'DESC');
		$ret = $this->db->get()->row();
		//$ret =   $this->db->last_query(); 
		//echo $ret; exit;
		return $ret;
	}
	public function get_cust_credittnotes($customer)
	{
		//echo $customer; account_created_by
			$this->db->select('CUSA.*, USR.user_name,  CUS.customer_name');
			$this->db->from('accounts as CUSA');
			$this->db->join('users as USR', 'CUSA.account_created_by = USR.user_id');
			$this->db->join('customers as CUS', 'CUS.customer_id = CUSA.account_user_id');
			$this->db->where('CUSA.account_type', 'credit');	
				
						if($customer != "")
						{
						$this->db->where('CUSA.account_user_id =', $customer);
						}
				$ret = $this->db->get()->result_array();
		return $ret;
	}
		public function get_cust_credit_total($customer)
	{
		//echo $customer; account_created_by
			$this->db->select('sum(CUSA.account_amount)  as credit_total');
			$this->db->from('accounts as CUSA');
			$this->db->join('users as USR', 'CUSA.account_created_by = USR.user_id');
			$this->db->where('CUSA.account_type', 'credit');	
				
						if($customer != "")
						{
						$this->db->where('CUSA.account_user_id =', $customer);
						}
				$ret = $this->db->get()->row();
		return $ret;
	}
		
	public function get_report_delivery_challan($sess_company,$report_from,$report_to,$customer,$region_id,$zone_id,$area_id,$salesman_id)
	{
		
		$this->db->select('DC.*, SO.sales_order_number, DES_USR.designation_user_name, CUS.customer_name, RE.region_id, RE.region_code, RE.region_name, ZO.zone_name, ZO.zone_id, ZO.zone_code, AR.area_id, AR.area_name, AR.area_code');
		$this->db->from('delivery_challan as DC');
		$this->db->join('sales_order AS SO','SO.sales_order_id = DC.delivery_challan_sales_order_id');
		$this->db->join('customers as CUS', 'CUS.customer_id = SO.sales_order_customer_id');
		$this->db->join('region as RE', 'RE.region_id = SO.sales_order_region_id');
		$this->db->join('zone as ZO', 'ZO.zone_id = SO.sales_order_zone_id');
		$this->db->join('area as AR', 'AR.area_id = SO.sales_order_area_id');
		$this->db->join('designation_users as DES_USR', 'DES_USR.designation_user_id = SO.sales_order_referral_id');
		if($report_from != "")
		{
			$this->db->where('DC.delivery_challan_add_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('DC.delivery_challan_add_date <=', $report_to);
		}
		if($customer != "")
		{
			$this->db->where('DC.delivery_challan_customer_id', $customer);
		}
		if($region_id != "")
		{
			$this->db->where('SO.sales_order_region_id',$region_id);
		}
		if($zone_id != "")
		{
			$this->db->where('SO.sales_order_zone_id',$zone_id);
		}
		if($area_id != "")
		{
			$this->db->where('SO.sales_order_area_id',$area_id);
		}
		if($salesman_id != "")
		{
			$this->db->where('SO.sales_order_referral_id',$salesman_id);
		}
		$this->db->where('DC.delivery_challan_company_id', $sess_company);
		$this->db->where('DC.delivery_challan_active_status','enable');
		$this->db->order_by('DC.delivery_challan_id', 'DESC');
		
					
	 $result = $this->db->get()->result_array();
	 
	 $errors = array_filter($result);

		if (!empty($errors))
		{
			 $i = 0;
	  foreach($result as $invoice)
	  {
		$ret = $this->db->select('ITMES.*,U.uom_name,U.uom_id,P.product_name,INV.inventory_qty');
					$this->db->from('delivery_challan_items as ITMES');
					$this->db->join('products as P', 'P.product_id = ITMES.delivery_challan_item_item_id');
					$this->db->join('inventory as INV', 'INV.inventory_item_id = P.product_id');
					$this->db->join('uom as U', 'U.uom_id = ITMES.delivery_challan_uom_id');
					$this->db->where('ITMES.delivery_challan_item_dc_id', $invoice['delivery_challan_id']);
					//->where('ITMES.delivery_challan_pending_qty !=', '0' )
		       
		  $query = $this->db->get()->result_array();
		
		  $result[$i] = $invoice;
		  $result[$i]['delivery_challan'] = $query;
		  
		  $i++;
	  }
		}
		return $result;
	}		 
	public function search_get_all_stock($sess_company,$limit,$start,$sort_order,$sort_by,$report_from,$report_to)
	{
		$ret['rows'] = $this->db->select('INV.inventory_item_id, INV.inventory_uom_id, INV.inventory_qty, INV.inventory_add_date, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, PRO_GROUP.products_group_name, PRO_TYPE.products_type_name, OPS.opt_stk_items_qty')
						->from('inventory as INV')
					 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
						->join('products as PRO', 'PRO.product_id = INV.inventory_item_id')
						->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id')
						->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id')
						->join('opening_stock_items as OPS', 'PRO.product_id = OPS.opt_stk_items_item_id')
						->where('PRO.product_company_id',$sess_company)
						->where('INV.inventory_add_date >=', $report_from)
						->where('INV.inventory_add_date <=', $report_to)						 
			     		->order_by('INV.inventory_id', 'DESC')
						->limit($limit, $start)
						->get()->result_array();
						
	//echo "<pre>"; print_r($ret); exit;
		$Count = $this->db->select('count(*) as TotalRows')
							->from('inventory as INV')
						 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
							->join('products as PRO', 'PRO.product_id = INV.inventory_item_id')
							->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id')
							->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id')
							->join('opening_stock_items as OPS', 'PRO.product_id = OPS.opt_stk_items_item_id')
							->where('PRO.product_company_id',$sess_company)
							->where('INV.inventory_add_date >=', $report_from)
							->where('INV.inventory_add_date <=', $report_to)						 
				     		->order_by('INV.inventory_id', 'DESC')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		
		return $ret;

	}
	
	public function search_all_stock($sess_company,$limit,$start,$sort_order,$sort_by)
	{
		$report_from=$this->uri->segment(5);
		$report_to=$this->uri->segment(6);
		
		$ret['rows'] = $this->db->select('INV.inventory_item_id, INV.inventory_uom_id, INV.inventory_qty, INV.inventory_add_date, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, PRO_GROUP.products_group_name, PRO_TYPE.products_type_name, OPS.opt_stk_items_qty')
						->from('inventory as INV')
					 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
						->join('products as PRO', 'PRO.product_id = INV.inventory_item_id')
						->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id')
						->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id')
						->join('opening_stock_items as OPS', 'PRO.product_id = OPS.opt_stk_items_item_id')
						->where('PRO.product_company_id',$sess_company)
						->where('INV.inventory_add_date >=', $report_from)
						->where('INV.inventory_add_date <=', $report_to)						 
			     		->order_by('INV.inventory_id', 'DESC')
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('inventory as INV')
						 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
							->join('products as PRO', 'PRO.product_id = INV.inventory_item_id')
							->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id')
							->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id')
							->join('opening_stock_items as OPS', 'PRO.product_id = OPS.opt_stk_items_item_id')
							->where('PRO.product_company_id',$sess_company)
							->where('INV.inventory_add_date >=', $report_from)
							->where('INV.inventory_add_date <=', $report_to)						 
				     		->order_by('INV.inventory_id', 'DESC')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;

	}
	public function get_all_stock_export($sess_company,$report_from,$report_to)
	{
		$ret['rows'] = $this->db->select('INV.*, U.*,PRO.*')
						->from('inventory as INV')
					 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
						->join('products as PRO', 'PRO.product_id = INV.inventory_item_id')
						->where('PRO.product_company_id',$sess_company)
						->where('INV.inventory_add_date >=', $report_from)
						->where('INV.inventory_add_date <=', $report_to)						 
			     		->order_by('INV.inventory_id', 'DESC')
						 
						->get()->result_array();
	
		return $ret;

	}

	public function get_all_so_man($sess_company,$sort_order,$sort_by,$limit, $start,$report_from,$report_to,$sales_man)
	{
		$ret['rows'] = $this->db->select('SO.*,TOT.*,USR.user_first_name')
						->from('sales_order as SO')
						->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id')
						->join('users as USR', 'USR.user_id = SO.sales_order_referral_id')
						->where('SO.sales_order_active_status','active')
						->where('SO.sales_order_company_id',$sess_company)
						->where('SO.sales_order_add_date >=', $report_from)
						->where('SO.sales_order_add_date <=', $report_to)
						->where('SO.sales_order_referral_id', $sales_man)
						->order_by('SO.sales_order_id', 'DESC')
						->limit($limit, $start)
						->get()->result_array();
	 
	 //echo "<pre>"; print_r($this->db->last_query()); exit;

		$Count = $this->db->select('count(*) as TotalRows')
							->from('sales_order as SO')
							->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id')
							->where('SO.sales_order_active_status','active')
							->where('SO.sales_order_company_id',$sess_company)
							->where('SO.sales_order_add_date >=', $report_from)
							->where('SO.sales_order_add_date <=', $report_to)
							->where('SO.sales_order_referral_id', $sales_man)
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;					
		return $ret;
	 
	}
	
	public function search_all_so_man($sess_company,$limit,$start,$sort_order,$sort_by)
	{
		$report_from=$this->uri->segment(5);
		$report_to=$this->uri->segment(6); 
		$sales_man=$this->uri->segment(7);

		$ret['rows'] = $this->db->select('SO.*,TOT.*,USR.user_first_name')
						->from('sales_order as SO')
						->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id')
						->join('users as USR', 'USR.user_id = SO.sales_order_referral_id')
			     		->order_by('SO.sales_order_id', 'DESC')
						->where('SO.sales_order_active_status' ,'active')
						->where('SO.sales_order_company_id',$sess_company)
						->where('SO.sales_order_add_date >=', $report_from)
						->where('SO.sales_order_add_date <=', $report_to)
						->where('SO.sales_order_referral_id', $sales_man)
						->limit($limit, $start)
						->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sales_order as SO')
							->order_by('sales_order_id', 'DESC')
							->where('SO.sales_order_active_status' ,'active')
							->where('SO.sales_order_company_id',$sess_company)
							->where('SO.sales_order_add_date >=', $report_from)
							->where('SO.sales_order_add_date <=', $report_to)
							->where('SO.sales_order_referral_id', $sales_man)
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;					
		return $ret;
	}
	
	public function get_all_so_man_export($sess_company,$report_from,$report_to,$sales_man)
	{
		$ret['rows'] = $this->db->select('SO.*,TOT.*,USR.user_first_name')
						->from('sales_order as SO')
						->join('sales_order_total as TOT', 'TOT.so_total_sales_id = SO.sales_order_id')
						->join('users as USR', 'USR.user_id = SO.sales_order_referral_id')
			     		->order_by('SO.sales_order_id', 'DESC')
						->where('SO.sales_order_active_status' ,'active')
						->where('SO.sales_order_company_id',$sess_company)
						->where('SO.sales_order_add_date >=', $report_from)
						->where('SO.sales_order_add_date <=', $report_to)
						->where('SO.sales_order_referral_id', $sales_man)
					 	->get()->result_array();
	 	return $ret;
	 
	}
	
	public function get_all_first_level($limit,$page,$sort_order,$sort_by,$parentid)
	{
		$ret['rows'] = $this->db->select('OFCR.*')
						->from('officer as OFCR')
						->join('officer_tree as OFCR_TRE', 'OFCR.OFCR_ID = OFCR_TRE.OFCR_TRE_OFCR_ID')
						->where('OFCR_TRE.OFCR_TRE_SPNCR_ID', $parentid)
						->order_by('OFCR_TRE.OFCR_TRE_ID','DESC')
						->limit($limit, $page)
					 	->get()->result_array();
						//echo $this->db->last_query();exit;
		$Count = 		$this->db->select('count(*) as TotalRows')
						->from('officer as OFCR')
						->join('officer_tree as OFCR_TRE', 'OFCR.OFCR_ID = OFCR_TRE.OFCR_TRE_OFCR_ID')
						->where('OFCR_TRE.OFCR_TRE_SPNCR_ID', $parentid)
					 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
	 	return $ret;
	 
	}
	
	public function get_all_first_level_count($limit,$page,$sort_order,$sort_by,$parentid)
	{
		$ret['rows'] = $this->db->select('OFCR.*')
						->from('officer as OFCR')
						->join('officer_tree as OFCR_TRE', 'OFCR.OFCR_ID = OFCR_TRE.OFCR_TRE_OFCR_ID')
						->where('OFCR_TRE.OFCR_TRE_SPNCR_ID', $parentid)
						->order_by('OFCR_TRE.OFCR_TRE_ID','DESC')
						//->limit($limit, $page)
					 	->get()->result_array();
						//echo $this->db->last_query();exit;
		$Count = 		$this->db->select('count(*) as TotalRows')
						->from('officer as OFCR')
						->join('officer_tree as OFCR_TRE', 'OFCR.OFCR_ID = OFCR_TRE.OFCR_TRE_OFCR_ID')
						->where('OFCR_TRE.OFCR_TRE_SPNCR_ID', $parentid)
					 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
	 	return $ret;
	 
	}
	
	public function get_all_first_level_search($limit,$page,$sort_order,$sort_by,$parentid,$search_cus_id,$search_cus_name,$search_cus_phone)
	{
		 $this->db->select('OFCR.*');
						$this->db->from('officer as OFCR');
						$this->db->join('officer_tree as OFCR_TRE', 'OFCR.OFCR_ID = OFCR_TRE.OFCR_TRE_OFCR_ID');
						$this->db->where('OFCR_TRE.OFCR_TRE_SPNCR_ID', $parentid);
						$this->db->order_by('OFCR_TRE.OFCR_TRE_ID','DESC');
						$this->db->limit($limit, $page);
				if($search_cus_id != '')
				{	
				$this->db->like('OFCR.OFCR_USR_VALUE' ,$search_cus_id);
				}
				if($search_cus_name != '')
				{	
				$this->db->like('OFCR.OFCR_FST_NME' ,$search_cus_name);
				}
				if($search_cus_phone != '')
				{	
				$this->db->like('OFCR.OFCR_MOB' ,$search_cus_phone);
				}
					 $ret['rows'] =	$this->db->get()->result_array();
						//echo $this->db->last_query();exit;
				$this->db->select('count(*) as TotalRows');
						$this->db->from('officer as OFCR');
						$this->db->join('officer_tree as OFCR_TRE', 'OFCR.OFCR_ID = OFCR_TRE.OFCR_TRE_OFCR_ID');
						$this->db->where('OFCR_TRE.OFCR_TRE_SPNCR_ID', $parentid);
						if($search_cus_id != '')
				{	
				$this->db->like('OFCR.OFCR_USR_VALUE' ,$search_cus_id);
				}
				if($search_cus_name != '')
				{	
				$this->db->like('OFCR.OFCR_FST_NME' ,$search_cus_name);
				}
				if($search_cus_phone != '')
				{	
				$this->db->like('OFCR.OFCR_MOB' ,$search_cus_phone);
				}
					 	$Count = $this->db->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
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

	public function search_get_all_SI_today($sess_company,$limit,$start,$sort_order,$sort_by,$report_from)
	{
		
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
			     		->where('SI.sale_invoice_date', $report_from)
			     		->where('SI.sale_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sale_invoice as SI')
							->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
							->where('SI.sale_invoice_date', $report_from)
							->where('SI.sale_invoice_company_id',$sess_company)
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	public function search_all_SI_today($sess_company,$limit,$start,$sort_order,$sort_by)
	{
		$report_from=$this->uri->segment(5); 
		
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
			     		->where('SI.sale_invoice_date', $report_from)
			     		->where('SI.sale_invoice_company_id',$sess_company)
						 ->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sale_invoice as SI')
							->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
							->where('SI.sale_invoice_date', $report_from)
							->where('SI.sale_invoice_company_id',$sess_company)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	public function get_all_SI_export_today($sess_company,$report_from)
	{
		 
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
			     		->where('SI.sale_invoice_date', $report_from)
			     		->where('SI.sale_invoice_company_id',$sess_company)
						->order_by('sale_invoice_id', 'desc')
						->get()->result_array();
		 return $ret;
	}

	public function get_po_invoice_today($sess_company,$limit,$start,$sort_order,$sort_by,$report_from)
	{
	  $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						->where('PIN.po_invoice_date', $report_from)
						->where('PIN.po_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('purchase_invoice as PIN')
							->where('PIN.po_invoice_date', $report_from)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		// echo $this->db->last_query();exit;
		return $ret;
 	}
	
	public function get_po_invoice_search_today($sess_company,$limit,$start,$sort_order,$sort_by)
	{
	 $report_from=$this->uri->segment(5); 
	
	 $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						->where('PIN.po_invoice_company_id',$sess_company)
						->where('PIN.po_invoice_date', $report_from)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('purchase_invoice as PIN')
							->where('PIN.po_invoice_company_id',$sess_company)
							->where('PIN.po_invoice_date', $report_from)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
 	}

	public function get_all_PI_export_today($sess_company,$report_from)
	{
		$ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						->where('PIN.po_invoice_company_id',$sess_company)
						->where('PIN.po_invoice_date', $report_from)
						->order_by('po_invoice_id', 'desc')
						 
						->get()->result_array();
	 	return $ret;
	}
	
	public function search_get_customer($limit,$page,$sort_order,$sort_by)
	{
		
		$ret['rows'] = $this->db->select('CUS.*,CUS_ACC.*')
						->from('customers as CUS')
						->join('customers_accounts as CUS_ACC', 'CUS_ACC.customers_accounts_customer_id = CUS.customer_id')
						->where('CUS.customer_status','active')
						->order_by('CUS.customer_id', 'DESC')
						->order_by($sort_order, $sort_by)
						->limit($limit, $page)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('customers as CUS')
							->join('customers_accounts as CUS_ACC', 'CUS_ACC.customers_accounts_customer_id = CUS.customer_id')
							->where('CUS.customer_status','active')
							->order_by('CUS.customer_id', 'DESC')
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}

	public function get_all_customer_export()
	{
		 
		$ret['rows'] = $this->db->select('CUS.*,CUS_ACC.*')
							->from('customers as CUS')
							->join('customers_accounts as CUS_ACC', 'CUS_ACC.customers_accounts_customer_id = CUS.customer_id')
							->where('CUS.customer_status','active')
							->order_by('CUS.customer_id', 'DESC')
						->get()->result_array();
		 return $ret;
	}

	public function search_get_vendor($limit,$page,$sort_order,$sort_by)
	{
		
		$ret['rows'] = $this->db->select('VEN.*,VEN_ACC.*')
						->from('vendors as VEN')
						->join('vendors_accounts as VEN_ACC', 'VEN_ACC.vendors_accounts_vendor_id = VEN.vendor_id')
						->where('VEN.vendor_status','enable')
						->order_by('VEN.vendor_id', 'DESC')
						->order_by($sort_order, $sort_by)
						->limit($limit, $page)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('vendors as VEN')
							->join('vendors_accounts as VEN_ACC', 'VEN_ACC.vendors_accounts_vendor_id = VEN.vendor_id')
							->where('VEN.vendor_status','enable')
							->order_by('VEN.vendor_id', 'DESC')
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}

	public function get_all_vendor_export()
	{
		 
		$ret['rows'] = $this->db->select('VEN.*,VEN_ACC.*')
							->from('vendors as VEN')
							->join('vendors_accounts as VEN_ACC', 'VEN_ACC.vendors_accounts_vendor_id = VEN.vendor_id')
							->where('VEN.vendor_status','enable')
							->order_by('VEN.vendor_id', 'DESC')
						->get()->result_array();
		 return $ret;
	}
	/* monthly Purchase invoise Report*/
	public function get_po_invoice_month($sess_company,$limit,$start,$sort_order,$sort_by,$month,$year)
	{
	  $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						  
						->where('month(PIN.po_invoice_date)',$month)
						->where('year(PIN.po_invoice_date)',$year)				
						//->where('PIN.po_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('purchase_invoice as PIN')
							->where('month(PIN.po_invoice_date)',$month)
 							->where('year(PIN.po_invoice_date)',$year)	
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		//echo $this->db->last_query();exit; 
		return $ret;
 	}
	
	public function get_po_invoice_search_month($sess_company,$limit,$start,$sort_order,$sort_by)
	{
	 $month=$this->uri->segment(5);
	 $year=$this->uri->segment(6); 
	 
	  $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						->where('month(PIN.po_invoice_date)',$month)
						->where('year(PIN.po_invoice_date)',$year)				
						//->where('PIN.po_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('purchase_invoice as PIN')
							->where('month(PIN.po_invoice_date)',$month)
 							->where('year(PIN.po_invoice_date)',$year)	
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		  //echo $this->db->last_query();exit; 
		return $ret;
 	}
	
	
	public function get_all_PI_export_month($sess_company,$month,$year)
	{
		 $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						  
						->where('month(PIN.po_invoice_date)',$month)
						->where('year(PIN.po_invoice_date)',$year)				
						//->where('PIN.po_invoice_company_id',$sess_company)
						 
						->get()->result_array();
	 	return $ret;
	}
	 
/* Yearly Purchase invoise Report*/
	public function get_po_invoice_year($sess_company,$limit,$start,$sort_order,$sort_by,$year)
	{
	  $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						 
						->where('year(PIN.po_invoice_date)',$year)				
						//->where('PIN.po_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('purchase_invoice as PIN')
							 
 							->where('year(PIN.po_invoice_date)',$year)	
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		//echo $this->db->last_query();exit; 
		return $ret;
 	}
	
	public function get_po_invoice_search_year($sess_company,$limit,$start,$sort_order,$sort_by)
	{
	 $year=$this->uri->segment(5);
	 
	  $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						 
						->where('year(PIN.po_invoice_date)',$year)				
						//->where('PIN.po_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('purchase_invoice as PIN')
							 
 							->where('year(PIN.po_invoice_date)',$year)	
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		  //echo $this->db->last_query();exit; 
		return $ret;
 	}
	
	
	public function get_all_PI_export_year($sess_company,$year)
	{
		 $ret['rows'] = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
						->from('purchase_invoice as PIN')
						->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
						->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
						->where('PIN.po_invoice_active_status', 'active')
						->where('year(PIN.po_invoice_date)',$year)				
						//->where('PIN.po_invoice_company_id',$sess_company)
						 
						->get()->result_array();
	 	return $ret;
	}
/*Monthly sales Invoice Reports*/ 
 public function search_get_all_SI_month($sess_company,$limit,$start,$sort_order,$sort_by,$month,$year)
	{
		
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
						->where('month(SI.sale_invoice_date)',$month)
						->where('year(SI.sale_invoice_date)',$year)	
						 
			     		//->where('SI.sale_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sale_invoice as SI')
							->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
							->where('month(SI.sale_invoice_date)',$month)
							->where('year(SI.sale_invoice_date)',$year)	
						//	->where('SI.sale_invoice_company_id',$sess_company)
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		//echo $this->db->last_query();exit; 
		return $ret;
	}
	
	public function search_all_SI_month($sess_company,$limit,$start,$sort_order,$sort_by)
	{
	 $month=$this->uri->segment(5);
	 $year=$this->uri->segment(6);
	  
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
						->where('month(SI.sale_invoice_date)',$month)
						->where('year(SI.sale_invoice_date)',$year)	
						 
			     		//->where('SI.sale_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sale_invoice as SI')
							->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
							->where('month(SI.sale_invoice_date)',$month)
							->where('year(SI.sale_invoice_date)',$year)	
						//	->where('SI.sale_invoice_company_id',$sess_company)
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	public function get_all_SI_export_month($sess_company,$month,$year)
	{
		 
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
			     		->where('month(SI.sale_invoice_date)',$month)
						->where('year(SI.sale_invoice_date)',$year)	 
			     		//->where('SI.sale_invoice_company_id',$sess_company)
						->order_by('sale_invoice_id', 'desc')
						->get()->result_array();
		 return $ret;
	}
	/*Yearly Sales invoice Report*/
 public function search_get_all_SI_year($sess_company,$limit,$start,$sort_order,$sort_by,$year)
	{
		
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
						 
						->where('year(SI.sale_invoice_date)',$year)	
						 
			     		//->where('SI.sale_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sale_invoice as SI')
							->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
						 
							->where('year(SI.sale_invoice_date)',$year)	
						//	->where('SI.sale_invoice_company_id',$sess_company)
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		//echo $this->db->last_query();exit; 
		return $ret;
	}
	
	public function search_all_SI_year($sess_company,$limit,$start,$sort_order,$sort_by)
	{
	 
	 $year=$this->uri->segment(5);
	  
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
					 
						->where('year(SI.sale_invoice_date)',$year)	
						 
			     		//->where('SI.sale_invoice_company_id',$sess_company)
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('sale_invoice as SI')
							->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
 							->where('year(SI.sale_invoice_date)',$year)	
						//	->where('SI.sale_invoice_company_id',$sess_company)
							->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	public function get_all_SI_export_year($sess_company,$year)
	{
		 
		$ret['rows'] = $this->db->select('SI.*, TOT.*')
						->from('sale_invoice as SI')
						->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
			     		 
						->where('year(SI.sale_invoice_date)',$year)	 
			     		//->where('SI.sale_invoice_company_id',$sess_company)
						->order_by('sale_invoice_id', 'desc')
						->get()->result_array();
		 return $ret;
	}
	
	public function search_get_all_income($sess_company,$report_from,$report_to,$customer_id)
	{
	
						$this->db->select('INV.*,CUS.customer_code,CUS.customer_name,PY.payment_mode_name');
						$this->db->from('invoice_receipt as INV');
						$this->db->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id')	;
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id');
						if($report_from != "")
						{
							$this->db->where('INV.invoice_receipt_added_date >=', $report_from);
						}
						if($report_to != "")
						{
							$this->db->where('INV.invoice_receipt_added_date <=', $report_to);
						}
						if($customer_id != "")
						{
							$this->db->where('INV.invoice_receipt_customer_id',$customer_id);
						}
						$this->db->where('INV.invoice_receipt_active_status' ,'active');
						$ret = $this->db->get()->result_array();
						
						$errors = array_filter($ret);

						if (!empty($errors)) 
						{
							$i = 0;
							
						foreach($ret as $invoice)
						  {
							$this->db->select('INV_PAY.*,SI.sale_invoice_no, CUS.customer_name, INV_SUM.receipt_id, INV_SUM.invoice_id,INV_SUM.amount');
							$this->db->from('invoice_payment_details as INV_PAY');
							$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = INV_PAY.invoice_payment_invoice_id');
							$this->db->join('customers as CUS', 'CUS.customer_id = INV_PAY.invoice_payment_customer_id');
							$this->db->join('invoice_receipt_summary as INV_SUM', 'INV_SUM.invoice_id = INV_PAY.invoice_payment_invoice_id');
							$this->db->where('INV_SUM.receipt_id', $invoice['invoice_receipt_id']);
							
							$query = $this->db->get()->result_array();
							
							  $ret[$i] = $invoice;
							  $ret[$i]['invoice_summary'] = $query;
							  
							  $i++;
						  }
							}
	
		
		/*$Count = $this->db->select('count(*) as TotalRows')
							->from('invoice_receipt')
 							->where('invoice_receipt_active_status' ,'active')
							->where('invoice_receipt_added_date >=' ,$report_from)
						 	->where('invoice_receipt_added_date <=' ,$report_to)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;*/
		// echo $this->db->last_query();exit;
		return $ret;
	}
	
	public function search_get_cus_income($sess_company,$sort_order,$sort_by,$report_from,$report_to,$customer)
	{
	
		$ret['rows'] = $this->db->select('INV.*,CUS.customer_code,CUS.customer_name,PY.payment_mode_name')
						->from('invoice_receipt as INV')
						->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id')	
						->where('INV.invoice_receipt_added_date >=' ,$report_from)
						->where('INV.invoice_receipt_added_date <=' ,$report_to)
						->where('INV.invoice_receipt_customer_id' ,$customer)
						->where('INV.invoice_receipt_active_status' ,'active')
						->order_by($sort_order, $sort_by)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('invoice_receipt')
 							->where('invoice_receipt_active_status' ,'active')
							->where('invoice_receipt_added_date >=' ,$report_from)
						 	->where('invoice_receipt_added_date <=' ,$report_to)
							->where('invoice_receipt_customer_id' ,$customer)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		
		return $ret;
	}
	
	public function get_all_inc_export($sess_company,$report_from,$report_to)
	{
	
		$ret['rows'] = $this->db->select('INV.*,CUS.customer_code,CUS.customer_name,PY.payment_mode_name')
						->from('invoice_receipt as INV')
						->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id')	
						->where('INV.invoice_receipt_added_date >=' ,$report_from)
						->where('INV.invoice_receipt_added_date <=' ,$report_to)
						
						->where('INV.invoice_receipt_active_status' ,'active')
						->get()->result_array();
	return $ret;
	}
	public function get_cus_inc_export($sess_company,$report_from,$report_to,$customer)
	{
	
		$ret['rows'] = $this->db->select('INV.*,CUS.customer_code,CUS.customer_name,PY.payment_mode_name')
						->from('invoice_receipt as INV')
						->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id')	
						->where('INV.invoice_receipt_added_date >=' ,$report_from)
						->where('INV.invoice_receipt_added_date <=' ,$report_to)
						->where('INV.invoice_receipt_customer_id' ,$customer)
						->where('INV.invoice_receipt_active_status' ,'active')
						->get()->result_array();
		return $ret;
	}
	
	public function get_pay_invoice($sess_company,$sort_order,$sort_by,$report_from,$report_to)
	{
		$ret['rows'] = $this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name')
						->from('payment_receipt as RECP')
						->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id')	
						->order_by('payment_receipt_id', 'DESC')
						->where('payment_receipt_active_status' ,'active')
						->where('RECP.payment_receipt_added_date >=', $report_from)
						->where('RECP.payment_receipt_added_date <=', $report_to)
						->order_by($sort_order, $sort_by) 
						->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('payment_receipt')
							->order_by('payment_receipt_id', 'DESC')
							->where('payment_receipt_active_status' ,'active')
							->where('payment_receipt_added_date >=', $report_from)
							->where('payment_receipt_added_date <=', $report_to)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		
		return $ret;
 	}
	
	
	public function get_pay_vendor_invoice($sess_company,$report_from,$report_to,$vendor_id)
	{
		$this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name');
		$this->db->from('payment_receipt as RECP');
		$this->db->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	;
		$this->db->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id');
		if($report_from != "")
		{
			$this->db->where('RECP.payment_receipt_added_date >=', $report_from);
		}
		if($report_to != "")
		{
			$this->db->where('RECP.payment_receipt_added_date <=', $report_to);
		}
		if($vendor_id != "")
		{
			$this->db->where('RECP.payment_receipt_vendor_id',$vendor_id);
		}
			
		$this->db->where('RECP.payment_receipt_active_status' ,'active');
		$receipt = $this->db->get()->result_array();
		
		$errors = array_filter($receipt);
		$ret = array();
		if (!empty($errors)) 
		{
		  $i = 0;
		  foreach($receipt as $REC)
		  {
			$invoices = $this->db->select('PRS.*,PAY_DET.payment_payment_invoice_amount,PI.po_invoice_number')
						->from('payment_receipt_summary as PRS')
						->join('payment_payment_details as PAY_DET', 'PAY_DET.payment_payment_invoice_id = PRS.invoice_id')
						->join('purchase_invoice as PI', 'PI.po_invoice_id = PRS.invoice_id')
						->where('PRS.receipt_id',$REC['payment_receipt_id'])
						->where('PRS.amount !=','0.00')
						->get()->result_array();				
			
			  $ret[$i] = $REC;
			  $ret[$i]['invoice_summary'] = $invoices;
			  
			  $i++;
		  }
		}
		
		return $ret; 
 	}
		
	public function get_pay_rec_export($sess_company,$report_from,$report_to)
	{
	$ret['rows'] = $this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name')
						->from('payment_receipt as RECP')
						->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id')	
						->order_by('RECP.payment_receipt_id', 'DESC')
						->where('RECP.payment_receipt_active_status' ,'active')
						->where('RECP.payment_receipt_added_date >=', $report_from)
						->where('RECP.payment_receipt_added_date <=', $report_to)
						 
						->get()->result_array();
	 
	return $ret;
		 
 	}
	public function get_ven_pay_rec_export($sess_company,$report_from,$report_to,$vendor)
	{
	$ret['rows'] = $this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name')
						->from('payment_receipt as RECP')
						->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id')	
						->order_by('payment_receipt_id', 'DESC')
						->where('payment_receipt_active_status' ,'active')
						->where('RECP.payment_receipt_added_date >=', $report_from)
						->where('RECP.payment_receipt_added_date <=', $report_to)
						->where('RECP.payment_receipt_vendor_id', $vendor)
						 
						->get()->result_array();
	 
	return $ret;
		 
 	}

	/////////////ITEM WISE REPORTS FOR SALES & PURCHASE
	
	public function get_all_item_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$cus_id,$report_from,$report_to)
	{
		$item_details = $this->db->select('SINV_ITEMS.*,SI.*,SI.sale_invoice_no, SI.sale_invoice_no, SI.sale_invoice_customer_id, SI.sale_invoice_company_id, U.uom_name,U.uom_id, CUS.customer_name');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = SINV_ITEMS.sale_invoice_item_uom_id');
					 	$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = SINV_ITEMS.sale_invoice_item_si_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						
						$this->db->where('SINV_ITEMS.sale_invoice_item_id',$item_id);
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('SI.sale_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SI.sale_invoice_add_date <=', $report_to);
						}
						if($item_name != "")
						{
							$this->db->where('SINV_ITEMS.sale_invoice_item_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_model', $item_mfg);
						}
						if($cus_id != "")
						{
						$this->db->where('SI.sale_invoice_customer_id', $cus_id);
						} 
						
					$this->db->order_by('SINV_ITEMS.sale_invoice_item_si_id', 'DESC');
					$this->db->where('SI.sale_invoice_company_id',$sess_company);
					$ret = $this->db->get()->result_array();
					
					
		 $item_total = $this->db->select('SINV_ITEMS.sale_invoice_item_name, SINV_ITEMS.sale_invoice_item_code, SINV_ITEMS.sale_invoice_item_model, sum(SINV_ITEMS.sale_invoice_item_qty) as QTY, sum(SINV_ITEMS.sale_invoice_item_net_amount) as TOT,SI.sale_invoice_no, SI.sale_invoice_no, SI.sale_invoice_customer_id, SI.sale_invoice_company_id, U.uom_name,U.uom_id, CUS.customer_name');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = SINV_ITEMS.sale_invoice_item_uom_id');
					 	$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = SINV_ITEMS.sale_invoice_item_si_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						
						$this->db->where('SINV_ITEMS.sale_invoice_item_id',$item_id);
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('SI.sale_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SI.sale_invoice_add_date <=', $report_to);
						}						
						if($item_name != "")
						{
							$this->db->where('SINV_ITEMS.sale_invoice_item_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_model', $item_mfg);
						}
						if($cus_id != "")
						{
						$this->db->where('SI.sale_invoice_customer_id', $cus_id);
						} 
						
							 
						$this->db->order_by('SINV_ITEMS.sale_invoice_item_si_id', 'DESC');
						$this->db->where('SI.sale_invoice_company_id',$sess_company);
						$total = $this->db->get()->row();
					
		
		$qwr['item_details'] = $ret;
		$qwr['item_total'] = $total;
	
		return $qwr;
		
	
	}
	
	public function get_all_item_general_report($sess_company,$item_name,$item_code,$item_id,$item_mfg,$cus_id,$report_from,$report_to)
	{

					
					 $item_total = $this->db->select('SINV_ITEMS.*,SINV_ITEMS.sale_invoice_item_model,SINV_ITEMS.sale_invoice_item_name');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						
						$this->db->group_by('SINV_ITEMS.sale_invoice_item_model');
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('SINV_ITEMS.sales_inv_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SINV_ITEMS.sales_inv_date <=', $report_to);
						}						
						
						$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = SINV_ITEMS.sale_invoice_item_si_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						
						$this->db->order_by('SINV_ITEMS.sale_invoice_item_code', 'ASC');
						$this->db->where('SINV_ITEMS.sale_invoice_status !=','cancelled');
						
						$ret = $this->db->get()->result_array();
						
						
					$cus_details = $this->db->select('idt.sale_invoice_item_model, idt.sale_invoice_item_code, cust.customer_name, sum(idt.sale_invoice_item_qty) as sum_qty');
						$this->db->from('sale_invoice as inv');
						
						$this->db->join('customers as cust', 'inv.sale_invoice_customer_id=cust.customer_id');
					 	$this->db->join('sale_invoice_item as idt', 'idt.sale_invoice_item_si_id=inv.sale_invoice_id');
						//$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						$this->db->group_by('cust.customer_name, idt.sale_invoice_item_model');
						//$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('idt.sales_inv_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('idt.sales_inv_date <=', $report_to);
						}						
						$this->db->order_by('idt.sale_invoice_item_code', 'ASC');
						//$this->db->order_by('cust.customer_name, idt.sale_invoice_item_model', 'ASC');
						//$this->db->where('SINV_ITEMS.sale_invoice_status !=','cancelled');
						
						$cus_details= $this->db->get()->result_array();
					//echo $this->db->last_query(); exit;
					
					 $item_total = $this->db->select('SINV_ITEMS.*,SINV_ITEMS.sale_invoice_item_model,SINV_ITEMS.sale_invoice_item_name,sum(SINV_ITEMS.sale_invoice_item_qty) as Qty_total');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						
						$this->db->group_by('SINV_ITEMS.sale_invoice_item_code');
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('SINV_ITEMS.sales_inv_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SINV_ITEMS.sales_inv_date <=', $report_to);
						}						
						
						$this->db->order_by('SINV_ITEMS.sale_invoice_item_code', 'ASC');
						$this->db->where('SINV_ITEMS.sale_invoice_status !=','cancelled');
						
						$item_total = $this->db->get()->result_array();
						//echo $this->db->last_query(); exit;
		
		$qwr['item_details'] = $ret;
		$qwr['cus_details'] = $cus_details;
		$qwr['item_total'] = $item_total;
	
		return $qwr;
	}
	
		public function get_all_item_general_report_new($sess_company,$item_name,$item_code,$item_id,$item_mfg,$cus_id,$report_from,$report_to)
	{

					
					 $item_details = $this->db->select('idt.sale_invoice_item_model, cust.customer_name, sum(idt.sale_invoice_item_qty) as sum_qty');
						$this->db->from('sale_invoice as inv');
						
						$this->db->join('customers as cust', 'inv.sale_invoice_customer_id=cust.customer_id');
						$this->db->join('sale_invoice_item as idt', 'idt.sale_invoice_item_si_id=inv.sale_invoice_id');
						$this->db->group_by('cust.customer_name, idt.sale_invoice_item_model');
						$this->db->where('idt.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('idt.sales_inv_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('idt.sales_inv_date <=', $report_to);
						}						
						
						if($cus_id != "")
						{
						$this->db->where('cust.customer_id =',$cus_id);
						}
						$this->db->order_by('cust.customer_name, idt.sale_invoice_item_model', 'ASC');
						
						$this->db->where('idt.sale_invoice_status !=','cancelled');
						
						$ret = $this->db->get()->result_array();
					
						//echo $this->db->last_query(); exit;
		
		$qwr['item_details'] = $ret;
	
		return $qwr;
	}
	
	
	public function get_all_sales_item_export($sess_company,$item_id,$cus_id,$report_from,$report_to)
	{
		$ret['rows'] = $this->db->select('SINV_ITEMS.*,SI.*,SI.sale_invoice_no, SI.sale_invoice_no, SI.sale_invoice_customer_id, SI.sale_invoice_company_id, U.uom_name,U.uom_id, CUS.customer_name');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = SINV_ITEMS.sale_invoice_item_uom_id');
					 	$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = SINV_ITEMS.sale_invoice_item_si_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						
						$this->db->where('SINV_ITEMS.sale_invoice_item_id',$item_id);
						
						if($report_from != "")
						{
						$this->db->where('SI.sale_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SI.sale_invoice_add_date <=', $report_to);
						}
						if($cus_id != "")
						{
						$this->db->where('SI.sale_invoice_customer_id', $cus_id);
						} 
						
							 
					$this->db->order_by('SINV_ITEMS.sale_invoice_item_si_id', 'DESC');
					$this->db->where('SI.sale_invoice_company_id',$sess_company);
					$ret = $this->db->get()->result_array();
					
							
		return $ret;

	}
	
	
	
	
	public function get_all_item_purchase_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$ven_id,$report_from,$report_to)
	{
		$item_details = $this->db->select('PINV_ITEMS.*,PI.*,PI.po_invoice_number, PI.po_invoice_vendor_id, PI.po_invoice_stk_Inv_po_id,PI.po_invoice_company_id, U.uom_name,U.uom_id, VEN.vendor_name');
						$this->db->from('purchase_invoice_items as PINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = PINV_ITEMS.po_invoice_items_uom_id');
					 	$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PINV_ITEMS.po_invoice_items_inovice_id');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_invoice_vendor_id'); 
						$this->db->where('PINV_ITEMS.po_invoice_items_qty !=', '0' );
						$this->db->where('PINV_ITEMS.po_invoice_items_item_id',$item_id);
						
						if($report_from != "")
						{
						$this->db->where('PI.po_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('PI.po_invoice_add_date <=', $report_to);
						}
						
						if($item_name != "")
						{
							$this->db->where('PINV_ITEMS.po_invoice_items_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_model', $item_mfg);
						}
						if($ven_id != "")
						{
						$this->db->where('PI.po_invoice_vendor_id', $ven_id);
						} 
						
												 
					$this->db->order_by('PINV_ITEMS.po_invoice_items_id', 'DESC');
					$this->db->where('PI.po_invoice_company_id',$sess_company);
					$ret = $this->db->get()->result_array();
					
					
		 $item_total = $this->db->select('PINV_ITEMS.po_invoice_items_name,PINV_ITEMS.po_invoice_items_code, PINV_ITEMS.po_invoice_items_item_id, PINV_ITEMS.po_invoice_items_model,sum(PINV_ITEMS.po_invoice_items_qty) as QTY, sum(PINV_ITEMS.po_invoice_items_net_amount) as TOT,PI.po_invoice_number, PI.po_invoice_vendor_id, PI.po_invoice_company_id, U.uom_name,U.uom_id, VEN.vendor_name');
						$this->db->from('purchase_invoice_items as PINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = PINV_ITEMS.po_invoice_items_uom_id');
					 	$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PINV_ITEMS.po_invoice_items_inovice_id');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_invoice_vendor_id');
						
						$this->db->where('PINV_ITEMS.po_invoice_items_item_id',$item_id);
						
						if($report_from != "")
						{
						$this->db->where('PI.po_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('PI.po_invoice_add_date <=', $report_to);
						}
						
						
						if($item_name != "")
						{
							$this->db->where('PINV_ITEMS.po_invoice_items_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_model', $item_mfg);
						}
						if($ven_id != "")
						{
						$this->db->where('PI.po_invoice_vendor_id', $ven_id);
						} 
							 						 
					$this->db->order_by('PINV_ITEMS.po_invoice_items_id', 'DESC');
					$this->db->where('PI.po_invoice_company_id',$sess_company);
					$total = $this->db->get()->row();
					
		
		$qwr['item_puchase_details'] = $ret;
		$qwr['item_puchase_total'] = $total;
	
		return $qwr;
		
	}
	
	
	public function get_all_item_goods_received($sess_company,$item_id,$report_ven_id,$report_from,$report_to)
	{
		$item_details = $this->db->select('PIND_ITEMS.*,PI.*, U.uom_name,U.uom_id, VEN.vendor_name,VEN.vendor_id');
						$this->db->from('purchase_indent_items as PIND_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = PIND_ITEMS.po_indent_uom_id');
					 	$this->db->join('purchase_indent as PI', 'PI.po_indent_id = PIND_ITEMS.po_indent_item_indent_id');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_indent_vendor_id'); 
						
						
						if($item_id != "")
						{
						$this->db->where('PIND_ITEMS.po_indent_item_item_id',$item_id);
						}
					
						if($report_ven_id != "")
						{
						$this->db->where('PI.po_indent_vendor_id', $report_ven_id);
						} 
						
												 
					$this->db->order_by('PI.po_indent_vendor_id', 'DESC');
					$ret = $this->db->get()->result_array();
					//echo $this->db->last_query(); exit;
	
		return $ret;
		
	}
	
	public function get_all_purchase_item_export($sess_company,$item_id,$ven_id,$report_from,$report_to)
	{
		$ret['rows'] = $this->db->select('PI.*,PINV_ITEMS.*,PI.po_invoice_number, PI.po_invoice_vendor_id, PI.po_invoice_company_id, U.uom_name,U.uom_id, VEN.vendor_name');
						$this->db->from('purchase_invoice_items as PINV_ITEMS');
						$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PINV_ITEMS.po_invoice_items_inovice_id');
						$this->db->join('uom as U', 'U.uom_id = PINV_ITEMS.po_invoice_items_uom_id');
					 	$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_invoice_vendor_id');
						$this->db->where('PINV_ITEMS.po_invoice_items_item_id',$item_id);
						$this->db->where('PINV_ITEMS.po_invoice_items_qty !=', '0' );
						
							if($report_from != "")
						{
						$this->db->where('PI.po_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('PI.po_invoice_add_date <=', $report_to);
						}
						if($ven_id != "")
						{
						$this->db->where('PI.po_invoice_vendor_id', $ven_id);
						} 
							 
					$this->db->order_by('PINV_ITEMS.po_invoice_items_id', 'DESC');
					$this->db->where('PI.po_invoice_company_id',$sess_company);
					$ret = $this->db->get()->result_array();
		return $ret;

	}
	
	public function get_all_item_analysis_sales_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$report_from,$report_to)
	{
		
		$item_details = $this->db->select('SINV_ITEMS.*,SI.sale_invoice_no, SI.sale_invoice_no, SI.sale_invoice_customer_id, SI.sale_invoice_company_id, U.uom_name,U.uom_id, CUS.customer_name');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = SINV_ITEMS.sale_invoice_item_uom_id');
					 	$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = SINV_ITEMS.sale_invoice_item_si_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						
						$this->db->where('SINV_ITEMS.sale_invoice_item_id',$item_id);
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('SI.sale_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SI.sale_invoice_add_date <=', $report_to);
						}
						if($item_name != "")
						{
							$this->db->where('SINV_ITEMS.sale_invoice_item_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_model', $item_mfg);
						}
						
					$this->db->order_by('SINV_ITEMS.sale_invoice_item_si_id', 'DESC');
					$this->db->where('SI.sale_invoice_company_id',$sess_company);
					$ret = $this->db->get()->result_array();
					
					
		 $item_total = $this->db->select('SINV_ITEMS.sale_invoice_item_name,SINV_ITEMS.sale_invoice_item_model,sum(SINV_ITEMS.sale_invoice_item_qty) as QTY, sum(SINV_ITEMS.sale_invoice_item_net_amount) as TOT,SI.sale_invoice_no, SI.sale_invoice_no, SI.sale_invoice_customer_id, SI.sale_invoice_company_id, U.uom_name,U.uom_id, CUS.customer_name');
						$this->db->from('sale_invoice_item as SINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = SINV_ITEMS.sale_invoice_item_uom_id');
					 	$this->db->join('sale_invoice as SI', 'SI.sale_invoice_id = SINV_ITEMS.sale_invoice_item_si_id');
						$this->db->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id');
						
						$this->db->where('SINV_ITEMS.sale_invoice_item_id',$item_id);
						$this->db->where('SINV_ITEMS.sale_invoice_item_qty !=',0);
						if($report_from != "")
						{
						$this->db->where('SI.sale_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('SI.sale_invoice_add_date <=', $report_to);
						}
						if($item_name != "")
						{
							$this->db->where('SINV_ITEMS.sale_invoice_item_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('SINV_ITEMS.sale_invoice_item_model', $item_mfg);
						}
						
						
							 
					$this->db->order_by('SINV_ITEMS.sale_invoice_item_si_id', 'DESC');
					$this->db->where('SI.sale_invoice_company_id',$sess_company);
					$total = $this->db->get()->row();
					
		
		$qwr['item_details'] = $ret;
		$qwr['item_total'] = $total;
	
		return $qwr;
	}
	
	public function get_all_item_analysis_purchase_invoice($sess_company,$item_name,$item_code,$item_id,$item_mfg,$report_from,$report_to)
	{
		
		$item_details = $this->db->select('PINV_ITEMS.*,PI.po_invoice_number, PI.po_invoice_vendor_id, PI.po_invoice_company_id, U.uom_name,U.uom_id, VEN.vendor_name');
						$this->db->from('purchase_invoice_items as PINV_ITEMS');
						$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PINV_ITEMS.po_invoice_items_inovice_id');
						$this->db->join('uom as U', 'U.uom_id = PINV_ITEMS.po_invoice_items_uom_id');
					 	$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_invoice_vendor_id');
						
						$this->db->where('PINV_ITEMS.po_invoice_items_item_id',$item_id);
						$this->db->where('PINV_ITEMS.po_invoice_items_qty !=',0);
						if($report_from != "")
						{
						$this->db->where('PI.po_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('PI.po_invoice_add_date <=', $report_to);
						}
						if($item_name != "")
						{
							$this->db->where('PINV_ITEMS.po_invoice_items_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_model', $item_mfg);
						}
												 
					$this->db->order_by('PINV_ITEMS.po_invoice_items_id', 'DESC');
					$this->db->where('PI.po_invoice_company_id',$sess_company);
					$ret = $this->db->get()->result_array();
					
					
		 $item_total = $this->db->select('PINV_ITEMS.po_invoice_items_name,PINV_ITEMS.po_invoice_items_code, PINV_ITEMS.po_invoice_items_item_id, PINV_ITEMS.po_invoice_items_model,sum(PINV_ITEMS.po_invoice_items_qty) as QTY, sum(PINV_ITEMS.po_invoice_items_net_amount) as TOT,PI.po_invoice_number, PI.po_invoice_vendor_id, PI.po_invoice_company_id, U.uom_name,U.uom_id, VEN.vendor_name');
						$this->db->from('purchase_invoice_items as PINV_ITEMS');
						$this->db->join('uom as U', 'U.uom_id = PINV_ITEMS.po_invoice_items_uom_id');
					 	$this->db->join('purchase_invoice as PI', 'PI.po_invoice_id = PINV_ITEMS.po_invoice_items_inovice_id');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = PI.po_invoice_vendor_id');
						
						$this->db->where('PINV_ITEMS.po_invoice_items_item_id',$item_id);
						$this->db->where('PINV_ITEMS.po_invoice_items_qty !=',0);
						
						if($report_from != "")
						{
						$this->db->where('PI.po_invoice_add_date >=', $report_from);
						}
						if($report_to != "")
						{
						$this->db->where('PI.po_invoice_add_date <=', $report_to);
						}						
						if($item_name != "")
						{
							$this->db->where('PINV_ITEMS.po_invoice_items_name', $item_name);
						}
						if($item_code != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_code', $item_code);
						}
						if($item_mfg != "")
						{
						$this->db->where('PINV_ITEMS.po_invoice_items_model', $item_mfg);
						}
													 
					$this->db->order_by('PINV_ITEMS.po_invoice_items_id', 'DESC');
					$this->db->where('PI.po_invoice_company_id',$sess_company);
					$total = $this->db->get()->row();
					
		
		$qwr['item_puchase_details'] = $ret;
		$qwr['item_puchase_total'] = $total;
	
		return $qwr;
	}
	
	public function get_income_cus_items($id)
	{
		$receipt = $this->db->select('INVR.*')
						->from('invoice_receipt_summary as INVR')
						->where('INVR.receipt_id',$id)
						->where('INVR.amount !=','0.00')
						->get()->result_array();
						
		$result = array();$i=0;
		foreach($receipt as $REP)
		{	
			$amount = $this->db->select('INV_PAY.*,SI.sale_invoice_no, CUS.customer_name')
						->from('invoice_payment_details as INV_PAY')
						->where('INV_PAY.invoice_payment_invoice_id', $REP['invoice_id'])
						->join('sale_invoice as SI', 'SI.sale_invoice_id = INV_PAY.invoice_payment_invoice_id')
						->join('customers as CUS', 'CUS.customer_id = INV_PAY.invoice_payment_customer_id')
						->get()->row();
						
			$result[$i]['receipt_summary_id'] = $REP['receipt_summary_id'];
			$result[$i]['receipt_id'] = $REP['receipt_id'];
			$result[$i]['invoice_id'] = $REP['invoice_id'];
			$result[$i]['amount'] = $REP['amount'];
			
			$result[$i]['invoice_payment_invoice_amount'] = $amount->invoice_payment_invoice_amount;
			$result[$i]['sale_invoice_no'] = $amount->sale_invoice_no;
			$result[$i]['invoice_payment_paid_amount'] = $amount->invoice_payment_paid_amount;
			$result[$i]['invoice_payment_due_amount'] = $amount->invoice_payment_due_amount;
			$result[$i]['invoice_payment_adjusted_amount'] = $amount->invoice_payment_adjusted_amount;
		
					
		$i++;
		} 	
		return $result;	
	}

	public function get_pay_ven_items($id)
	{
		 $result = $this->db->select('PRS.*,PAY_DET.payment_payment_invoice_amount,PI.po_invoice_number')
						->from('payment_receipt_summary as PRS')
						->join('payment_payment_details as PAY_DET', 'PAY_DET.payment_payment_invoice_id = PRS.invoice_id')
						->join('purchase_invoice as PI', 'PI.po_invoice_id = PRS.invoice_id')
						->where('PRS.receipt_id',$id)
						->where('PRS.amount !=','0.00')
						->get()->result_array();				
		return $result;	
	}
	
	public function get_report_stock_list($sess_company,$search_item_status,$item_name,$division_id,$material_type_id)
	{
		
		$this->db->select('INV.inventory_item_id, INV.inventory_uom_id, SUM(INV.inventory_qty) as  inventory_qty, INV.inventory_add_date,INV.inventory_qc_status, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, PRO_GROUP.products_group_name, PRO_GROUP.products_group_id,PRO_TYPE.products_type_name,STR.store_name,STR_DIV.division_name');

		$this->db->from('inventory_new as INV');
		$this->db->join('uom as U', 'U.uom_id = INV.inventory_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
		$this->db->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id');
		$this->db->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id');
		$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
		$this->db->join('store_division as STR_DIV', 'STR_DIV.division_id = PRO.material_store_division_id');
		$this->db->where('PRO.product_company_id',$sess_company);
		$this->db->group_by('INV.inventory_item_id');
		
		if($item_name != "")
		{
		$this->db->where('PRO.product_name', $item_name);
		}
		if($division_id != "")
		{
		$this->db->where('PRO.material_store_division_id', $division_id);
		}
		if($material_type_id != "")
		{
		$this->db->where('PRO.product_type_id', $material_type_id);
		}
		if($search_item_status != "")
		{
		$this->db->where('INV.inventory_qc_status', $search_item_status);
		}
		$this->db->order_by('PRO.product_name', 'ASC');
		
	 
	
		  $ret = $this->db->get()->result_array();
		 // echo $this->db->last_query(); exit;
		 	  
	return $ret;
	  
	 }
	 
	 public function get_report_detailed_stock($sess_company,$search_item_status,$item_name,$control_no,$division_id,$material_type_id)
	{
		
		$this->db->select('INV.inventory_item_id, INV.inventory_uom_id, INV.inventory_qty ,INV.inventory_control_no,INV.inventory_batch_no, INV.inventory_add_date,INV.inventory_qc_status, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, PRO_GROUP.products_group_name, PRO_GROUP.products_group_id,PRO_TYPE.products_type_name,STR.store_name,STR_DIV.division_name');

		$this->db->from('inventory_new as INV');
		$this->db->join('uom as U', 'U.uom_id = INV.inventory_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
		$this->db->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id');
		$this->db->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id');
		$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
		$this->db->join('store_division as STR_DIV', 'STR_DIV.division_id = PRO.material_store_division_id');
		$this->db->where('PRO.product_company_id',$sess_company);
		//$this->db->group_by('INV.inventory_item_id');
		
		if($item_name != "")
		{
		$this->db->where('PRO.product_name', $item_name);
		}
		if($control_no != "")
		{
		$this->db->where('INV.inventory_control_no', $control_no);
		}
		if($division_id != "")
		{
		$this->db->where('PRO.material_store_division_id', $division_id);
		}
		if($material_type_id != "")
		{
		$this->db->where('PRO.product_type_id', $material_type_id);
		}
		if($search_item_status != "")
		{
		$this->db->where('INV.inventory_qc_status', $search_item_status);
		}
		
		$this->db->order_by('PRO.product_name', 'ASC');
		
	 
	
		  $ret = $this->db->get()->result_array();
		 // echo $this->db->last_query(); exit;
		 	  
	return $ret;
	  
	 }
	 
	 
	 public function get_report_stock_details($sess_company,$report_from,$report_to,$item_name,$product_group_id,$search_item_status)
	{
		
		$this->db->select('INV.inventory_item_id, INV.inventory_uom_id, SUM(INV.inventory_qty) as  inventory_qty,  INV.inventory_add_date,INV.inventory_received_qty,INV.inventory_issued_qty,INV.inventory_qc_status, U.uom_name, PRO.product_name, PRO.product_code, PRO.product_mfr_part_number, PRO_GROUP.products_group_name, PRO_GROUP.products_group_id,PRO_TYPE.products_type_name,STR.store_name,STR_DIV.division_name');

		$this->db->from('inventory_new as INV');
		$this->db->join('uom as U', 'U.uom_id = INV.inventory_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = INV.inventory_item_id');
		//$this->db->join('materialissue_items as MISU', 'MISU.mis_item_material_id = INV.inventory_item_id');
		$this->db->join('products_groups as PRO_GROUP', 'PRO.product_group_id = PRO_GROUP.products_group_id');
		$this->db->join('products_type as PRO_TYPE', 'PRO.product_type_id = PRO_TYPE.products_type_id');
		$this->db->join('store as STR', 'STR.store_id = PRO.material_store_id');
		$this->db->join('store_division as STR_DIV', 'STR_DIV.division_id = PRO.material_store_division_id');
		$this->db->where('PRO.product_company_id',$sess_company);
		$this->db->group_by('PRO.product_id');
		if($report_from != "")
		{
		$this->db->where('INV.inventory_add_date >=', $report_from);
		}
		if($report_to != "")
		{
		$this->db->where('INV.inventory_add_date <=', $report_to);
		}
		
		if($item_name != "")
		{
			$this->db->where('PRO.product_name', $item_name);
		}
		
		$this->db->order_by('INV.inventory_id', 'DESC');
		
		
	  
	
		  $ret = $this->db->get()->result_array();
		// echo $this->db->last_query(); 
		 	  
	return $ret;
	  
	 }
	 
	  public function get_report_grn_test($sess_company,$report_from,$report_to,$report_item_id,$report_item_name)
	{
					
					$this->db->select('QC.*,LOC.*,USR.*');
					$this->db->from('quality_checking as QC');
					//$this->db->join('quality_checking_items as QCI', 'QCI.qc_ref_id = QC.qc_id');
				    $this->db->join('location as LOC', 'LOC.location_id = QC.qc_location_id');
				    $this->db->join('users as USR', 'USR.user_id = QC.qc_approved_by_id');
					$this->db->where('QC.qc_active_status','active');
					
					if($report_from != "")
					{
					$this->db->where('QC.qc_added_date >=', $report_from);
					}
					
					if($report_to != "")
					{
					$this->db->where('QC.qc_added_date <=', $report_to);
					}
					
				 	$inv_qry = 	$this->db->get()->result_array();
					//echo $this->db->last_query();  exit;
					
					
					return $inv_qry;
	 }

 public function get_report_grn_sampling($sess_company,$report_from,$report_to,$report_division)
	{
					
					$this->db->select('GRN.*,LOC.*,STD.*,USR.*');
					$this->db->from('grn_sampling as GRN');
					$this->db->join('location as LOC', 'LOC.location_id = GRN.samp_location_id');
					$this->db->join('store_division as STD', 'STD.division_id = GRN.samp_division_id');
					$this->db->join('users as USR', 'USR.user_id = GRN.samp_approved_by_id');
					$this->db->where('GRN.samp_active_status','active');
					
					//$this->db->where('GRN.samp_id','DESC');
					
					
					if($report_division != "")
					{
					$this->db->where('STD.division_name', $report_division);
					}
					
					if($report_from != "")
					{
					$this->db->where('GRN.samp_created_date >=', $report_from);
					}
					if($report_to != "")
					{
					$this->db->where('GRN.samp_created_date <=', $report_to);
					}
				 	$inv_qry = 	$this->db->get()->result_array();
					//echo $this->db->last_query();  exit;
					
					
					return $inv_qry;
	 }
	 
	  public function get_qm_intimation_ledger($sess_company,$report_from,$report_to,$id)
	{
					//$this->db->select('INV.*,  P.product_name');
					$this->db->select('INV.*,  P.product_name,PIN.po_indent_date,PIN.po_indent_number,PIN.po_cus_dc_inv,PIN.po_cus_dc_inv_date,VEN.vendor_id,VEN.vendor_name');
					$this->db->from('inventory_new as INV');
					$this->db->join('products as P', 'P.product_id = INV.inventory_item_id');
					$this->db->join('purchase_indent as PIN', 'PIN.po_indent_id = INV.inventory_gr_id');
					$this->db->join('vendors as VEN', 'PIN.po_indent_vendor_id = VEN.vendor_id');
					//$this->db->join('materialissue_items as ITEMS', 'MIS.inventory_id = ITEMS.mis_item_inventory_id');
					//$this->db->join('materialissue as MIS', 'MIS.mis_id = ITEMS.mis_ref_id');
					$this->db->where('P.product_id',$id);
					$this->db->where('INV.inventory_add_date >=', '2018-08-01');
					/*if($report_from != "")
					{
					$this->db->where('INV.inventory_add_date >=', $report_from);
					}*/
					if($report_to != "")
					{
					$this->db->where('INV.inventory_add_date <=', $report_to);
					}
					$this->db->order_by('INV.inventory_id', 'ASC');
				 	$inv_qry = 	$this->db->get()->result_array();
					//echo $this->db->last_query();  exit;
					
					
					return $inv_qry;
	 }
	 
	  public function get_report_qm_intimation($sess_company,$report_from,$report_to,$report_division)
	{
					
					$this->db->select('QM.*,LOC.*,STD.*');
					$this->db->from('qm_intimation as QM');
					$this->db->join('location as LOC', 'LOC.location_id = QM.qm_intin_location_id');
					$this->db->join('store_division as STD', 'STD.division_id = QM.qm_intin_division_id');
					
					
				
					$this->db->where('QM.qm_intin_active_status','active');
					
					
					if($report_division != "")
					{
					$this->db->where('STD.division_name', $report_division);
					}
					if($report_from != "")
					{
					$this->db->where('QM.qm_intin_created_date >=', $report_from);
					}
					if($report_to != "")
					{
					$this->db->where('QM.qm_intin_created_date <=', $report_to);
					}
				 	$inv_qry = 	$this->db->get()->result_array();
					//echo $this->db->last_query();  exit;
					
					
					return $inv_qry;
	 }
	  public function get_item_qm_intimation($id) 
	{
		$this->db->select('ITEMS.*,U.*');
		$this->db->from('qm_intimation_items as ITEMS');
	 	$this->db->where('ITEMS.qm_intin_ref_id', $id);
		$this->db->join('uom as U', 'U.uom_id = ITEMS.qm_intin_item_uom_id');
		//$this->db->join('products as PRO', 'PRO.product_id = ITEMS.sale_invoice_item_id');
		//$this->db->join('product_stock as PRST', 'PRST.product_stock_uom_id = U.uom_id');
		$query = $this->db->get()->result_array();
		return $query; 
	}
	
	public function get_item_grn_test($id) 
	{
		$this->db->select('ITEMS.*,U.*,PRO.*,STD.*');
		$this->db->from('quality_checking_items as ITEMS');
	 	$this->db->where('ITEMS.qc_ref_id', $id);
		$this->db->join('uom as U', 'U.uom_id = ITEMS.qc_item_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.qc_item_item_id');
		$this->db->join('store_division as STD', 'STD.division_id = ITEMS.qc_item_division_id');
		$query = $this->db->get()->result_array();
		return $query; 
	}
	 public function get_item_grn_sam($id) 
	{
		$this->db->select('ITEMS.*,U.*,PRO.*,STD.*');
		$this->db->from('grn_sampling_items as ITEMS');
	 	
		$this->db->join('uom as U', 'U.uom_id = ITEMS.samp_item_uom_id');
		$this->db->join('products as PRO', 'PRO.product_id = ITEMS.samp_item_item_id');
		$this->db->join('store_division as STD', 'STD.division_id = ITEMS.samp_item_division_id');
		//$this->db->join('product_stock as PRST', 'PRST.samp_item_division_id = U.uom_id');
		$this->db->where('ITEMS.samp_ref_id', $id);
		$query = $this->db->get()->result_array();
		return $query; 
	}
	 
	 public function ledger_inventory_list_product($sess_company,$report_from,$report_to,$item_name)
	{
		//echo $sess_group;
		
		
						
						$this->db->select('PRO.product_id,PRO.product_name,PRO.material_store_division_id,STA.store_id,STA.store_name,PDTY.products_type_id,PDTY.products_type_name,U.uom_id,U.uom_name,PROP.product_hsn_sac,PRO.product_add_date');
						
						$this->db->from('products as PRO');
						$this->db->join('store as STA', 'STA.store_id = PRO.material_store_id') ;
						$this->db->join('products_type as PDTY', 'PDTY.products_type_id = PRO.product_type_id') ;
						$this->db->join('products_groups as PDGY', 'PDGY.products_group_id = PRO.product_group_id') ;
						$this->db->join('product_price as PROP','PROP.product_prd_id = PRO.product_id');
						$this->db->join('product_stock as PROST','PROST.product_stock_prd_id = PRO.product_id');
						$this->db->join('uom as U', 'U.uom_id = PROST.product_stock_uom_id');
						$this->db->group_by('PRO.product_id');
						
						if($item_name != "")
						{
						$this->db->where('PRO.product_name', $item_name);
						}
						
						$ret = 	$this->db->get()->result_array();
						// echo $this->db->last_query(); 
						

		
		return $ret;
		

	}
	 
	 public function ledger_inventory_list($sess_company,$report_from,$report_to,$item_name)
	{
		//echo $sess_group;
		
		
						
						$this->db->select('PRO.product_id,PRO.product_name,PRO.material_store_division_id,STA.store_id,STA.store_name,PDTY.products_type_id,PDTY.products_type_name,U.uom_id,U.uom_name,PROP.product_hsn_sac,PRO.product_add_date, SUM(ITEMS.mis_item_required_qty) AS required_qty');
						//$this->db->from('inventory_ledger as INV_LEDG');
						
						$this->db->from('materialissue as MIS');
						$this->db->join('materialissue_items as ITEMS', 'MIS.mis_id = ITEMS.mis_ref_id');
						$this->db->join('products as PRO', 'PRO.product_id = ITEMS.mis_item_material_id');
						
						//$this->db->from('products as PRO');
						//$this->db->join('products as PRO', 'PRO.product_id = INV_LEDG.ledger_item_id');
						$this->db->join('store as STA', 'STA.store_id = PRO.material_store_id') ;
						$this->db->join('products_type as PDTY', 'PDTY.products_type_id = PRO.product_type_id') ;
						$this->db->join('products_groups as PDGY', 'PDGY.products_group_id = PRO.product_group_id') ;
						$this->db->join('product_price as PROP','PROP.product_prd_id = PRO.product_id');
						$this->db->join('product_stock as PROST','PROST.product_stock_prd_id = PRO.product_id');
						$this->db->join('uom as U', 'U.uom_id = PROST.product_stock_uom_id');
			     		//->order_by($sort_order,$sort_by)
						$this->db->group_by('ITEMS.mis_item_material_id');
						
		/*if($report_from != "")
		{
		$this->db->where('INV_LEDG.ledger_add_date >=', $report_from);
		}
		if($report_to != "")
		{
		$this->db->where('INV_LEDG.ledger_add_date <=', $report_to);
		}*/
		
		if($item_name != "")
		{
		$this->db->where('PRO.product_name', $item_name);
		}
		
						//->limit($limit, $page)
					$ret = 	$this->db->get()->result_array();
						// echo $this->db->last_query(); 
						
						
$errors = array_filter($ret);

		if (!empty($errors)) 
		{
			$i = 0;
			  foreach($ret as $ledger)
			  {
				  
				  $this->db->select('INV.*,  P.product_name,PIN.po_indent_date,PIN.po_indent_number,PIN.po_cus_dc_inv,PIN.po_cus_dc_inv_date,VEN.vendor_id,VEN.vendor_name');
					$this->db->from('inventory_new as INV');
					$this->db->join('products as P', 'P.product_id = INV.inventory_item_id');
					$this->db->join('purchase_indent as PIN', 'PIN.po_indent_id = INV.inventory_gr_id');
					$this->db->join('vendors as VEN', 'PIN.po_indent_vendor_id = VEN.vendor_id');
					$this->db->where('P.product_id',$ledger['product_id']);
				
				$query = $this->db->get()->result_array();
				//echo $this->db->last_query();
				  //$ret[$i] = $invoice;
				  $ret[$i]['invoice_summary'] = $query;
				  
				  $i++;
			  }
		}
		
		return $ret;
		

	}
	
	public function getsubUser($parentid)
	{	
		$this->db->select('OFCR.OFCR_ID, OFCR.OFCR_USR_ID, OFCR.OFCR_USR_EMAIL, OFCR.OFCR_FST_NME, OFCR.OFCR_LST_NME, OFCR.OFCR_MID_NME, OFCR.OFCR_DISP_NME, OFCR.OFCR_PAN, OFCR.OFCR_MOB, OFCR.OFCR_RNK,TREE.*,Qualification.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK');
		$this->db->where('OFCR_TRE_UNDR_ID',$parentid);
		$result = $this->db->get()->result_array(); 
	
		foreach($result as $row)
		{
			if($row['OFCR_TRE_SPNCR_ID']== $parentid)
			{
				$this->placementunder[]= $row;			
			}
			$this->officerdetails($parentid,$row['OFCR_TRE_USR_ID']);
		}
		return true;
	}

	public function officerdetails($parentid,$officerid)
	{
		
		$this->db->select('OFCR.OFCR_ID, OFCR.OFCR_USR_ID, OFCR.OFCR_USR_EMAIL, OFCR.OFCR_FST_NME, OFCR.OFCR_LST_NME, OFCR.OFCR_MID_NME, OFCR.OFCR_DISP_NME, OFCR.OFCR_PAN, OFCR.OFCR_MOB, OFCR.OFCR_RNK,TREE.*,Qualification.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK');
		$this->db->where('OFCR_TRE_UNDR_ID',$officerid);
		$result= $this->db->get()->result_array(); 
	
		foreach($result as $row)
		{
			if($row['OFCR_TRE_SPNCR_ID'] == $parentid)
			{
				$this->placementunder[]= $row;	
			}
			$this->officerdetails($parentid,$row['OFCR_TRE_USR_ID']);
		}
	}
	
	public function mysales($parentid)
	{
		$this->db->select('SALE.*,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME, CUS.CUS_MOB,CUS.CUS_FST_NME,CUS.CUS_LST_NME,CUS.CUS_MAIL');
		$this->db->from('sales as SALE');
		$this->db->join('officer as OFCR', 'OFCR.OFCR_USR_ID = SALE.SALES_OFCR_USR_ID');
		$this->db->join('customer as CUS', 'CUS.CUS_SALES_ID = SALE.SALES_ID');	
		$this->db->where('SALE.SALES_OFCR_USR_ID',$parentid);
		$this->db->where('SALE.SALES_STAT', 'active'); 
		$result= $this->db->get()->result_array();
		
		return $result;
	}
	
	public function cashreportview($parentid)
	{
		$ret = $this->db->select('OFCR.*,CSHDET.*')
					->from('officer as OFCR')
					->join('cash_details as CSHDET','CSHDET.OFFICER_ID = OFCR.OFCR_ID')
					->where('OFCR.OFCR_USR_ID', $parentid)
					->get()->result_array();
					//echo $this->db->last_query(); exit;
		//echo "<pre>"; print_r($ret); exit;
		
		return $ret;
	}
	
	public function under_id_sales($id)
	{
		$this->db->select('SALE.*,OFCR.OFCR_FST_NME,OFCR.OFCR_LST_NME, CUS.CUS_MOB,CUS.CUS_FST_NME,CUS.CUS_LST_NME,CUS.CUS_MAIL,');
		$this->db->from('sales as SALE');
		$this->db->join('officer as OFCR', 'OFCR.OFCR_USR_ID = SALE.SALES_OFCR_USR_ID');
		$this->db->join('customer as CUS', 'CUS.CUS_SALES_ID = SALE.SALES_ID');	
		$this->db->where('SALE.SALES_OFCR_USR_ID',$id);
		$this->db->where('SALE.SALES_STAT', 'active'); 
		$result= $this->db->get()->result_array();
		
		return $result;
	}
	
	public function getmygroup($parentid)
	{
		$this->db->select('OFCR.*,TREE.*');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_ID = OFCR.OFCR_ID');
		$this->db->where('OFCR_TRE_USR_ID > ', $parentid);
		$result= $this->db->get()->result_array(); 
		
		return $result;
	}
	
	public function under_child($key)
	{
		
		$this->personal_count = 0;
		$ret['COUNT_SPNCR'] = $this->children_count($key);
		$this->personal_count = 0;
		$ret['LFT_COUNT'] = $this->sub_children_count($key,"left");
		$this->personal_count = 0;
		$ret['RIGHT_COUNT'] = $this->sub_children_count($key,"right");
		
		$ret['PERSONALY_COUNT_SPNCR'] = $this->personal_children_count($key);
		$this->personal_count = 0;
		$this->personal_sub_children_count($key,$key,0,"left");
		$ret['PERSONALY_LFT_COUNT'] = $this->personal_count;
		$this->personal_count = 0;
		$this->personal_sub_children_count($key,$key,0,"right");
		$ret['PERSONALY_RIGHT_COUNT'] = $this->personal_count;
		
		return $ret;
		
	}
	
	public function personal_children_count($parent)
	{
		$count = 0;
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_SPNCR_ID', $parent);
		$query = $this->db->get();
		return count($query->result());
		
	}
	
	public function personal_sub_children_count($parent,$root_parent,$personal_count,$position)
	{
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $parent);
		if($position != "noleg")
		{
			$this->db->where('OFCR_TRE_LEG', $position);
		}
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			if($root_parent == $row->OFCR_TRE_SPNCR_ID)
			{
				$this->personal_count = $this->personal_count + 1;
			}
			//echo $root_parent."--------".$row->OFCR_TRE_SPNCR_ID."-----".$this->personal_count."<br>";
			$this->personal_sub_children_count($row->OFCR_TRE_USR_ID,$root_parent,$personal_count,"noleg");			
			
		}
		
	}
	
	public function children_count($parent) {
		$count = 0;
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $parent);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$count += 1 + $this->children_count($row->OFCR_TRE_USR_ID);
		}

		return $count;
	}
	
	public function sub_children_count($parent,$position) {
		$count = 0;
		$this->db->select('TREE.*');
		$this->db->from('officer_tree as TREE');
		$this->db->where('OFCR_TRE_UNDR_ID', $parent);
		$this->db->where('OFCR_TRE_LEG', $position);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$count += 1 +$this->children_count($row->OFCR_TRE_USR_ID);
		}
		return $count;
	}
	
	
	public function downlineuser($parentid)
	{	
		$this->db->select('OFCR.OFCR_ID, OFCR.OFCR_USR_ID, OFCR.OFCR_USR_EMAIL, OFCR.OFCR_FST_NME, OFCR.OFCR_LST_NME, OFCR.OFCR_MID_NME, OFCR.OFCR_DISP_NME, OFCR.OFCR_PAN, OFCR.OFCR_MOB, OFCR.OFCR_RNK,TREE.*,Qualification.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK');
		$this->db->where('OFCR_TRE_UNDR_ID',$parentid);
		$result = $this->db->get()->result_array(); 
	
		foreach($result as $row)
		{
			$this->placementunder[]= $row;			
			$this->downlinesubuser($parentid,$row['OFCR_TRE_USR_ID']);
		}
		return true;
	}

	public function downlinesubuser($parentid,$officerid)
	{
		
		$this->db->select('OFCR.OFCR_ID, OFCR.OFCR_USR_ID, OFCR.OFCR_USR_EMAIL, OFCR.OFCR_FST_NME, OFCR.OFCR_LST_NME, OFCR.OFCR_MID_NME, OFCR.OFCR_DISP_NME, OFCR.OFCR_PAN, OFCR.OFCR_MOB, OFCR.OFCR_RNK,TREE.*,Qualification.rank');
		$this->db->from('officer as OFCR');
		$this->db->join('officer_tree as TREE', 'TREE.OFCR_TRE_ID = OFCR.OFCR_ID');
		$this->db->join('rank_qualification as Qualification', 'Qualification.id = OFCR.OFCR_RNK');
		$this->db->where('OFCR_TRE_UNDR_ID',$officerid);
		$result= $this->db->get()->result_array(); 
	
		foreach($result as $row)
		{
			$this->placementunder[] = $row;	
			$this->downlinesubuser($parentid,$row['OFCR_TRE_USR_ID']);
		}
	}
}