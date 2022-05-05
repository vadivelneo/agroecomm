<?php
Class Sales_autocompletemodule extends CI_Model
{
 
public function autosearch_sale_qut_no($q)
  {
    $this->db->select('*');
    $this->db->like('sales_quote_qoute_no', $q);
	$this->db->where('sales_quote_status' ,'active');
	$this->db->limit(100);
    $query = $this->db->get('sales_quotation');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['sales_quote_qoute_no']));
        $new_row['value']=htmlentities(stripslashes($row['sales_quote_qoute_no']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
 
 public function autosearch_cus_name($q)
  {
    $this->db->select('*');
    $this->db->like('customer_name', $q);
	$this->db->where('customer_status' ,'active');
    $query = $this->db->get('customers');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['customer_name']));
        $new_row['value']=htmlentities(stripslashes($row['customer_name']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_price_book_name($q)
  {
    $this->db->select('*');
    $this->db->like('price_book_name', $q);
	$this->db->where('price_book_status' ,'active');
	$this->db->limit(100);
    $query = $this->db->get('price_book');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['price_book_name']));
        $new_row['value']=htmlentities(stripslashes($row['price_book_name']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function autosearch_item_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
	$this->db->limit(100);
    $query = $this->db->get('products');

	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
 public function autosearch_cus_code($q)
  {
    $this->db->select('*');
    $this->db->like('customer_code', $q);
	$this->db->where('customer_status' ,'active');
    $query = $this->db->get('customers');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['customer_code']));
        $new_row['value']=htmlentities(stripslashes($row['customer_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
 
   public function autosearch_sale_order_no($q)
  {
    $this->db->select('*');
    $this->db->like('sales_order_number', $q);
	$this->db->where('sales_order_active_status' ,'active');
	$this->db->limit(100);
    $query = $this->db->get('sales_order');
	
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['sales_order_number']));
        $new_row['value']=htmlentities(stripslashes($row['sales_order_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function autosearch_po_ref_no($q)
  {
    $this->db->select('*');
    $this->db->like('sale_invoice_customer_po_refernce_number', $q);
	$this->db->where('sales_order_active_status' ,'active');
	$this->db->limit(100);
    $query = $this->db->get('sales_order');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['sale_invoice_customer_po_refernce_number']));
        $new_row['value']=htmlentities(stripslashes($row['sale_invoice_customer_po_refernce_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  
  public function autosearch_sale_dc_no($q)
  {
    $this->db->select('*');
    $this->db->like('delivery_challan_number', $q);
	$this->db->where('delivery_challan_active_status' ,'enable');
	$this->db->limit(100);
    $query = $this->db->get('delivery_challan');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['delivery_challan_number']));
        $new_row['value']=htmlentities(stripslashes($row['delivery_challan_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function autosearch_sale_si_no($q)
  {
    $this->db->select('*');
    $this->db->like('sale_invoice_company_invoice_no', $q);
	$this->db->where('sale_invoice_active_status' ,'active');
	$this->db->limit(100);
    $query = $this->db->get('sale_invoice');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['sale_invoice_company_invoice_no']));
        $new_row['value']=htmlentities(stripslashes($row['sale_invoice_company_invoice_no']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function autosearch_sale_ret_no($q)
  {
    $this->db->select('*');
    $this->db->like('sales_return_code', $q);
	$this->db->limit(100);
    $query = $this->db->get('sales_return');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['sales_return_code']));
        $new_row['value']=htmlentities(stripslashes($row['sales_return_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
   

}
	