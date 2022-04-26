<?php

Class Categorytypemodule extends CI_Model
{	



//** BOM Category_type**//
	public function get_bom_cat_type($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('*')
							->from('bom_category_type')
							->order_by($sort_order, $sort_by)
			     			->order_by('bom_cat_type_id', 'DESC')
			     			->where('bom_category_type_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
							->from('bom_category_type')
							->order_by($sort_order, $sort_by)
							->where('bom_category_type_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			 
			return $ret;
   
		}
		else
		{
			$ret['rows'] = $this->db->select('*')
							->from('bom_category_type')
							->order_by($sort_order, $sort_by)
			     			->order_by('bom_cat_type_id', 'DESC')
			     			->where('bom_category_type_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
	
		
			$Count = $this->db->select('count(*) as TotalRows')
							->from('bom_category_type')
							->order_by($sort_order, $sort_by)
							->where('bom_category_type_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}	
	}
	//** BOM Category  Validation **//
	
	public function bom_cat_vaildation($sess_company_id, $bom_cat_type_name, $cat_type_descname)
	{
		$this->db->select('*')
				->from('bom_category_type')
				->where('bom_cat_type_id',$sess_company_id)
				->where('bom_category_type_name',$bom_cat_type_name)
				
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
		//** Add BOM Category **//
	
	public function add_bom_cat_type($pro_type)
	{
		$this->db->insert('bom_category_type', $pro_type);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	//** Edit BOM Category**//
	public function editbom_cat_vaildation($sess_company_id, $bom_cat_type_name,$id)
	{
		$this->db->select('*');
		$this->db->from('bom_category_type');
		$this->db->where('bom_cat_type_id',$sess_company_id);
		$this->db->where('bom_category_type_name', $bom_cat_type_name);
		
		$this->db->where_not_in('bom_cat_type_id', $id);
		$this->db->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//**Update BOM Category **//

	public function update_bom_cat($pro_typedtails,$id)
	{	
		$this->db->where('bom_cat_type_id', $id);
		$this->db->update('bom_category_type', $pro_typedtails);
		return true;
	}
	//**Get Single BOM Category **//
	
	public function getsingle_bom_cat($id)
	{
		$this->db->select('*');
		$this->db->from('bom_category_type');
		//$this->db->join('company as COM', 'PRO_TYPE.bom_category_id = COM.company_id');
	 	$this->db->where('bom_cat_type_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
//** BOM Category Status **//
	
	public function updatebomcatstatus($pro_type_data, $id)
	{
		$this->db->where('bom_cat_type_id', $id)
				 ->update('bom_category_type', $pro_type_data);
		return true;
	}
	//** Search BOM Category Type**//
	public function get_search_bomcat_type($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by)
	{
						$ret['rows'] = $this->db->select('*');
						$this->db->from('bom_category_type');
			     		$this->db->order_by('bom_cat_type_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('bom_category_type_name' ,$search_pro_typ);
						}
						
						$this->db->where('bom_category_type_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] =	 $this->db->get()->result_array();

						$this->db->select('count(*) as TotalRows');
						$this->db->from('bom_category_type');
			     		$this->db->order_by('bom_cat_type_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('bom_category_type_name' ,$search_pro_typ);
						}
						
						$this->db->where('bom_category_type_status','enable');
						$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		
		
	}
	public function get_all_bomcat_type()
	{
		$ret = $this->db->select('CATTYPE.bom_cat_type_id, CATTYPE.bom_category_type_name')
					->from('bom_category_type as CATTYPE')
					->get()->result_array();
					
		return $ret;
	}
	
}