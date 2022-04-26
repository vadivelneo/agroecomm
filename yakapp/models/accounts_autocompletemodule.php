<?php
Class Accounts_autocompletemodule extends CI_Model
{
 
public function autosearch_inc_rcpt_no($q)
  {
    $this->db->select('*');
    $this->db->like('invoice_receipt_number', $q);
    $query = $this->db->get('invoice_receipt');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['invoice_receipt_number']));
        $new_row['value']=htmlentities(stripslashes($row['invoice_receipt_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function autosearch_cus_name($q)
  {
    $this->db->select('*');
    $this->db->like('customer_name', $q);
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
  public function autosearch_cus_no($q)
  {
    $this->db->select('*');
    $this->db->like('customer_code', $q);
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
  
  public function autosearch_ven_name($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_name', $q);
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
  
   public function autosearch_ven_no($q)
  {
    $this->db->select('*');
    $this->db->like('vendor_code', $q);
    $query = $this->db->get('vendors');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['vendor_code']));
        $new_row['value']=htmlentities(stripslashes($row['vendor_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }

  
   public function autosearch_pay_rcpt_no($q)
  {
    $this->db->select('*');
    $this->db->like('payment_receipt_number', $q);
    $query = $this->db->get('payment_receipt');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['payment_receipt_number']));
        $new_row['value']=htmlentities(stripslashes($row['payment_receipt_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   
  
   

}
	