<?php
Class Inventory_autocompletemodule extends CI_Model
{
 
public function search_stock_code($q)
  {
    $this->db->select('*');
    $this->db->like('opening_stock_code', $q);
    $query = $this->db->get('opening_stock');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['opening_stock_code']));
        $new_row['value']=htmlentities(stripslashes($row['opening_stock_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
  public function search_item_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_code', $q);
    $query = $this->db->get('products');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['product_code']));
        $new_row['value']=htmlentities(stripslashes($row['product_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
public function search_item_name($q)
  {
    $this->db->select('*');
    $this->db->like('product_name', $q);
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

 public function search_mft_code($q)
  {
    $this->db->select('*');
    $this->db->like('product_mfr_part_number', $q);
    $query = $this->db->get('products');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $new_row['value']=htmlentities(stripslashes($row['product_mfr_part_number']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
  
   public function search_adj_stock_code($q)
  {
    $this->db->select('*');
    $this->db->like('stock_adjustments_code', $q);
    $query = $this->db->get('stock_adjustments');
	if($query->num_rows > 0)
	{
      foreach ($query->result_array() as $row)
	  {
        $new_row['label']=htmlentities(stripslashes($row['stock_adjustments_code']));
        $new_row['value']=htmlentities(stripslashes($row['stock_adjustments_code']));
        $row_set[] = $new_row;  
      }
      echo json_encode($row_set);  
    }
  }
   

}
	