<?php
Class Purchase_autocompletemodule extends CI_Model
{
 
public function autosearch_met_req_no($q)
  {
    $this->db->select('*');
    $this->db->like('met_requestion_no', $q);
    $query = $this->db->get('meterial_request');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['met_requestion_no']));
        $new_row['value']=htmlentities(stripslashes($row['met_requestion_no']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
 public function autosearch_Req_type($q)
  {
    $this->db->select('*');
    $this->db->like('met_requestion_type', $q);
    $query = $this->db->get('meterial_request');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['met_requestion_type']));
        $new_row['value']=htmlentities(stripslashes($row['met_requestion_type']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_met_search_req_for($q)
  {
    $this->db->select('*');
    $this->db->like('met_request_for', $q);
    $query = $this->db->get('meterial_request');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['met_request_for']));
        $new_row['value']=htmlentities(stripslashes($row['met_request_for']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_met_status($q)
  {
    $this->db->select('*');
    $this->db->like('met_req_status', $q);
    $query = $this->db->get('meterial_request');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['met_req_status']));
        $new_row['value']=htmlentities(stripslashes($row['met_req_status']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_vq_order($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_quote_qoute_no', $q);
    $query = $this->db->get('vendor_quotation');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['vendor_quote_qoute_no']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_quote_qoute_no']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_vend_name($q)
  {
	 $this->db->select('*');
    $this->db->like('vendor_name', $q);
	$this->db->where('vendor_status' ,'enable');
    $query = $this->db->get('vendors');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['vendor_name']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_name']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_div_name($q)
  {
	 $this->db->select('*');
    $this->db->like('division_name', $q);
	$this->db->where('division_status' ,'enable');
    $query = $this->db->get('store_division');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['division_name']));
        $new_row['value']=htmlentities(stripslashes($row['division_name']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
    
   public function autosearch_str_code($q)
  {
	$this->db->select('*');
    $this->db->like('store_code', $q);
	$this->db->where('store_status' ,'enable');
    $query = $this->db->get('store');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['store_code']));
        $new_row['value']=htmlentities(stripslashes($row['store_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_str_name($q)
  {
	$this->db->select('*');
    $this->db->like('store_name', $q);
	$this->db->where('store_status' ,'enable');
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

  public function autosearch_ven_qut_status($q)
  {
	 $this->db->select('*');
    $this->db->like('vendor_quote_cur_status', $q);
    $query = $this->db->get('vendor_quotation');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['vendor_quote_cur_status']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_quote_cur_status']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_pur_order($q)
  {
	 $this->db->select('*');
     $this->db->like('po_po_no', $q);
	 $this->db->where('po_status' ,'active');
    $query = $this->db->get('purchase_order');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['po_po_no']));
        $new_row['value']=htmlentities(stripslashes($row['po_po_no']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function autosearch_store_name($q)
  {
	$this->db->select('*');
    $this->db->like('store_name', $q);
	$this->db->where('store_status' ,'enable');
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
  
  public function autosearch_po_status($q)
  {
	 $this->db->select('*');
    $this->db->like('po_po_status', $q);
    $query = $this->db->get('purchase_order');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['po_po_status']));
        $new_row['value']=htmlentities(stripslashes($row['po_po_status']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_ind_no($q)
  {
	 $this->db->select('*');
    $this->db->like('po_indent_number', $q);
	$this->db->where('po_indent_status' ,'enable');
    $query = $this->db->get('purchase_indent');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['po_indent_number']));
        $new_row['value']=htmlentities(stripslashes($row['po_indent_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_location($q)
  {
	 $this->db->select('*');
    $this->db->like('location_name', $q);
    $query = $this->db->get('location');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['location_name']));
        $new_row['value']=htmlentities(stripslashes($row['location_name']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_inv_no($q)
  {
	 $this->db->select('*');
    $this->db->like('po_invoice_number', $q);
	$this->db->where('po_invoice_active_status' ,'active');
    $query = $this->db->get('purchase_invoice');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['po_invoice_number']));
        $new_row['value']=htmlentities(stripslashes($row['po_invoice_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function autosearch_ret_no($q)
  {
	 $this->db->select('*');
    $this->db->like('purchase_return_code', $q);
    $query = $this->db->get('purchase_return');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['purchase_return_code']));
        $new_row['value']=htmlentities(stripslashes($row['purchase_return_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  
   

}
	