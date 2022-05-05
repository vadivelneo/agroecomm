<?php

Class Mastersmodule extends CI_Model
{	
	public function getroletype($type)
	{
		         $this->db->select("user_group_id,module_id,add_option,edit_option,	delete_option, 	view_option, import_option, export_option, status_change, update_date");
                 $this->db->from('user_roles');
                 $this->db->where('user_group_id', $type);
                 $query = $this->db->get();
                 $result = $query->result();
                 return $result;

    }
	
	//****    Unit of Measurment List ****//
	 
   public function get_uom($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('uom')
							->order_by($sort_order, $sort_by)
			     			->order_by('uom_id', 'DESC')
			     			->where('uom_status' ,'enable')
							->limit($limit, $start)
							->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
						  ->from('uom')
						  ->order_by($sort_order, $sort_by)
						  ->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//****   Search Unit of Measurment ****//
	
	/* public function get_search_uom1($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		
		$ret['rows'] = $this->db->select('*')
							->from('uom')
							->order_by('uom_id', 'DESC')
							->or_like('uom_name' ,$srarch_key)
							//->or_like('uom_descrption' ,$srarch_key)
							->where('uom_status' ,'enable')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
						  ->from('uom')
						  ->or_like('uom_name' ,$srarch_key)
						 // ->or_like('uom_descrption' ,$srarch_key)
						  ->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	} */
	
	public function get_search_uom($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_uom_name)
	{
		if($sess_group == 1)
		{
						$this->db->select('*');
						$this->db->from('uom');
						$this->db->order_by('uom_id', 'DESC');
						if($search_uom_name != '')
						{
							$this->db->like('uom_name',$search_uom_name);
						}
						
						$this->db->where('uom_status','enable');
						$this->db->order_by($sort_order, $sort_by);
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
						
						
  		  
						$this->db->select('count(*) as TotalRows');
						$this->db->from('uom');
						
						if($search_uom_name != '')
						{
							$this->db->like('uom_name',$search_uom_name);
						}
						
						
						$this->db->order_by($sort_order, $sort_by);
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					
					//echo"<PRE>";print_R($ret);exit;
					return $ret;
		}
					else
					{
						$this->db->select('*');
						$this->db->from('uom');
						$this->db->order_by('uom_id', 'DESC');
						if($search_uom_name != '')
						{
							$this->db->like('uom_name',$search_uom_name);
						}
						$this->db->order_by($sort_order, $sort_by);
						$this->db->where('uom_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				 

						$this->db->select('count(*) as TotalRows');
						$this->db->from('uom');
						if($search_uom_name != '')
						{
							$this->db->like('uom_name',$search_uom_name);
						}
										
						$this->db->order_by($sort_order, $sort_by); 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
	
	//**** Unit of Measurment Validation ****//
	
	public function uomvaildation($uom_name)
	{
		$this->db->select('*')
				->from('uom')
				->where('uom_name',$uom_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//****   Add Unit of Measurment ****//

	public function add_uom($uomdetails)
	{
		$this->db->insert('uom', $uomdetails);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//**** Unit of Measurment Validation For Edit ****//
	
	public function edituomvaildation($uom_name, $id)
	{
		$this->db->select('*')
				->from('uom')
				->where('uom_name',$uom_name)
				->where('uom_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}

	//****   Edit Unit of Measurment ****//
	
	public function update_uom($uomdetails,$id)
	{	
		$this->db->where('uom_id', $id);
		$this->db->update('uom', $uomdetails);
		return true;
	}
	
	//****   Get Single Unit of Measurment ****//

	public function getsingle_uom($id)
	{
		$this->db->select('*');
		$this->db->from('uom');
	 	$this->db->where('uom_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}

	//****   Unit of Measurment Status ****//
	
	public function updateuomstatus($uomdata, $id)
	{
		$this->db->where('uom_id', $id)
				->update('uom', $uomdata);
		return true;		
	}

	//****  Get Product Type for List ****//

	public function get_pro_type($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('*')
							->from('products_type')
							->order_by($sort_order, $sort_by)
			     			->order_by('products_type_id', 'DESC')
			     			->where('products_type_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
							->from('products_type')
							->order_by($sort_order, $sort_by)
							->where('products_type_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;	
		}
		else
		{
			$ret['rows'] = $this->db->select('*')
								->from('products_type')
			     				->order_by('products_type_id', 'DESC')
			     				->where('products_type_status', 'enable')
			     				->where('product_type_company_id',$sess_company)
								->limit($limit, $start)
								->get()->result_array();
	
		
			$Count = $this->db->select('count(*) as TotalRows')
								->from('products_type')
								->where('products_type_status', 'enable')
			     				->where('product_type_company_id',$sess_company)
						 		->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}	
	}
	
	//**** Search Product Type ****//

	public function get_search_pro_type($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
						$ret['rows'] = $this->db->select('*');
						$this->db->from('products_type');
			     		$this->db->order_by('products_type_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('products_type_name' ,$search_pro_typ);
						}
						if($search_pro_prefix != "")
						{
						$this->db->like('products_type_prefix' ,$search_pro_prefix);
						}
						$this->db->where('products_type_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] =	 $this->db->get()->result_array();

						$this->db->select('count(*) as TotalRows');
						$this->db->from('products_type');
			     		$this->db->order_by('products_type_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('products_type_name' ,$search_pro_typ);
						}
						if($search_pro_prefix != "")
						{
						$this->db->like('products_type_prefix' ,$search_pro_prefix);
						}
						$this->db->where('products_type_status','enable');
						$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		}
		else
		{
						$this->db->select('*');
						$this->db->from('products_type');
			     		$this->db->order_by('products_type_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('products_type_name' ,$search_pro_typ);
						}
						if($search_pro_prefix != "")
						{
						$this->db->like('products_type_prefix' ,$search_pro_prefix);
						}
						$this->db->where('products_type_status','enable');
						$this->db->where('product_type_company_id',$sess_company);
						$this->db->limit($limit,$page);
						$ret['rows'] =	$this->db->get()->result_array();

						$this->db->select('count(*) as TotalRows');
						$this->db->from('products_type');
			     		$this->db->order_by('products_type_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('products_type_name' ,$search_pro_typ);
						}
						if($search_pro_prefix != "")
						{
						$this->db->like('products_type_prefix' ,$search_pro_prefix);
						}
						$this->db->where('products_type_status','enable');
						$this->db->where('product_type_company_id',$sess_company);
						$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		}
	}
	
	//**** Search BOM Group ****//
	
	public function get_search_bom_group($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by)
	{
		
						$ret['rows'] = $this->db->select('BOG.*,PRM.processmaster_name');
						$this->db->from('bomgroup as BOG');
						$this->db->join('processmaster as PRM','PRM.processmaster_id = BOG.processmaster_bomgroup_id');
			     		$this->db->order_by('BOG.bomgroup_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('BOG.bomgroup_name' ,$search_pro_typ);
						}
											
						$this->db->where('BOG.bomgroup_status','enable');
						//$this->db->limit($limit,$page);
						$ret['rows'] =	 $this->db->get()->result_array();

						$this->db->select('count(*) as TotalRows');
						$this->db->from('bomgroup as BOG');
						$this->db->join('processmaster as PRM','PRM.processmaster_id = BOG.processmaster_bomgroup_id');
			     		$this->db->order_by('BOG.bomgroup_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('BOG.bomgroup_name' ,$search_pro_typ);
						}
					
						$this->db->where('BOG.bomgroup_status','enable');
						$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
		
	}
	
	//** Product Type Validation **//
	
	public function pro_typ_vaildation($sess_company_id, $product_type_name, $prefix)
	{
		$this->db->select('*')
				->from('products_type')
				->where('product_type_company_id',$sess_company_id)
				->where('products_type_name',$product_type_name)
				->or_where('products_type_prefix',$prefix)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Product Type **//
	
	public function add_pro_type($pro_type)
	{
		$this->db->insert('products_type', $pro_type);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Product Type Validation for Update **//
	
	public function editpro_typ_vaildation($sess_company_id, $product_type_name, $prefix, $id)
	{
		$this->db->select('*');
		$this->db->from('products_type');
		$this->db->where('product_type_company_id',$sess_company_id);
		$this->db->where('products_type_name', $product_type_name);
		$this->db->or_where('products_type_prefix', $prefix); 
		$this->db->where_not_in('products_type_id', $id);
		$this->db->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//**Update Product Type **//

	public function update_pro_type($pro_typedtails,$id)
	{	
		$this->db->where('products_type_id', $id);
		$this->db->update('products_type', $pro_typedtails);
		return true;
	}
	
	//**Get Single Product Type **//
	
	public function getsingle_pro_type($id)
	{
		$this->db->select('PRO_TYPE.*,COM.company_id,COM.company_name, COM.company_short_name');
		$this->db->from('products_type as PRO_TYPE');
		$this->db->join('company as COM', 'PRO_TYPE.product_type_company_id = COM.company_id');
	 	$this->db->where('products_type_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}


	//** Product Type Status **//
	
	public function updateprotypestatus($pro_type_data, $id)
	{
		$this->db->where('products_type_id', $id)
				 ->update('products_type', $pro_type_data);
		return true;
	}
	
	//**  Search Product Group **//
	
	
		public function get_search_pro_group($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_name)
	{
		$this->db->select('*');
		$this->db->from('products_groups');
		$this->db->order_by('products_group_id', 'DESC');
		if($search_name != '')
		{
		$this->db->like('products_group_name',$search_name);
		}

		$this->db->where('products_group_status','enable');
		$this->db->order_by($sort_order, $sort_by);
		$this->db->limit($limit,$page);
		$ret['rows'] = $this->db->get()->result_array();



		$this->db->select('count(*) as TotalRows');
		$this->db->from('products_groups');

		if($search_name != '')
		{
		$this->db->like('products_group_name',$search_name);
		}


		$this->db->order_by($sort_order, $sort_by);
		$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;

		//echo"<PRE>";print_R($ret);exit;
		return $ret;
		
					
	}
	
	
	//** Get Product Group List **//

	public function get_pro_group($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('products_groups')
							->where('products_group_status', 'enable')
							->order_by($sort_order, $sort_by)
			     			->order_by('products_group_id', 'DESC')
							->limit($limit, $start)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('products_groups')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Product Group Validation **//
	
	public function pro_gup_vaildation($products_group_name)
	{
		$this->db->select('*')
				->from('products_groups')
				->where('products_group_name',$products_group_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Product Group **//
	
	public function add_pro_group($pro_group)
	{
		$this->db->insert('products_groups', $pro_group);
		$insert_id = $this->db->insert_id();
		return  $insert_id;		
	}
	
	//** Product Group Validation for Edit **//
	
	public function editpro_gup_vaildation($products_group_name, $id)
	{
		$this->db->select('*')
			 ->from('products_groups')
			 ->where('products_group_name',$products_group_name)
			 ->where('products_group_id !=', $id)
			 ->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Update Product Group **//
	
	public function update_pro_group($pro_groupdetails,$id)
	{	
		$this->db->where('products_group_id', $id);
		$this->db->update('products_groups', $pro_groupdetails);
		
		return true;
	}

	
	//** Get Single Product Group **//
	
	public function getsingle_pro_group($id)
	{
		$this->db->select('PRO_GP.*,PDTY.*,UM.*');
		$this->db->from('products_groups as PRO_GP');
		$this->db->join('products_type as PDTY','PRO_GP.product_group_type_id = PDTY.products_type_id');
		$this->db->join('uom as UM','PRO_GP.product_group_uom_id = UM.uom_id');
	 	$this->db->where('products_group_id', $id);
		$query = $this->db->get()->row();
		//echo "<pre>"; print_r($query); exit;
		return $query;
	}
	
	//** Product Group Status **//
	
	public function updateprogroupstatus($pro_group_data, $id)
	{
		
		$this->db->where('products_group_id', $id)
				 ->update('products_groups', $pro_group_data);
		return true;
	}
	
	public function updatestorestatus($store_data, $id)
	{
		
		$this->db->where('store_id', $id)
				 ->update('store', $store_data);
		return true;
	}
	
	public function get_allproducttypes()
	{
		$ret = $this->db->select('TYPE.products_type_id, TYPE.products_type_name, TYPE.product_type_stus, TYPE.products_type_description, TYPE.products_type_status')
						->from('products_type as TYPE')
						//->join('store as STA','STA.store_category = TYPE.products_type_id' )
						->where('TYPE.products_type_status','enable')
						->get()->result_array();
		return $ret;
	}
	
	public function get_alluom()
	{
		$ret = $this->db->select('U.uom_id, U.uom_name')
					->from('uom as U')
					//->where('uom_id',2)
					->where('uom_status','enable')
					
					->get()->result_array();
		return $ret;
	}
	
	//** Search Country **//

		public function search_country_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_cont_name,$search_cont_code)
	{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->order_by('country_id', 'DESC');
		if($search_cont_name != '')
		{
		$this->db->like('country_name',$search_cont_name);
		}
		if($search_cont_code != '')
		{
		$this->db->like('country_code',$search_cont_code);
		}

		$this->db->where('country_status','enable');
		$this->db->order_by($sort_order, $sort_by);
		$this->db->limit($limit,$page);
		$ret['rows'] = $this->db->get()->result_array();



		$this->db->select('count(*) as TotalRows');
		$this->db->from('country');

		if($search_cont_name != '')
		{
		$this->db->like('country_name',$search_cont_name);
		}
		if($search_cont_code != '')
		{
		$this->db->like('country_code',$search_cont_code);
		}


		$this->db->order_by($sort_order, $sort_by);
		$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;

		
		return $ret;
		
					
	}
	
	//** Country List **//
	
	public function country_list($limit,$start,$sort_order,$sort_by)
	{
	 	$ret['rows'] = $this->db->select('*')
							->from('country')
							->where('country_status','enable')
							->order_by($sort_order, $sort_by)
							->limit($limit, $start)
							->get()->result_array();
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('country')
							->where('country_status','enable')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Country Validation **//
	
	public function countryvaildation($con_name)
	{
		$this->db->select('*')
				 ->from('country')
				 ->where('country_name',$con_name)
				 ->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Country **//
	
	public function add_country($country_data)
	{
		$this->db->insert('country', $country_data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	//** Country Validation for edit **//
	
	public function editcountryvaildation($con_name, $id)
	{
		$this->db->select('*')
				->from('country')
				->where('country_name',$con_name)
				->where('country_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get Single Country **//
	
	function get_singlecountry($id) 
	{     
        $this->db->select('*');
		$this->db->from('country');
	 	$this->db->where('country_id', $id);
		$query = $this->db->get()->row();
		return $query;	 
    }
	
	//** Edit Country **//
	
	public function Updatecountry($id,$country_data)
	{	
		$this->db->where('country_id', $id)
				 ->update('country', $country_data);
		return true;
	} 
	
	//** Country Status **//
	
	public function Updatecont_Status($id,$data)
	{	
		$this->db->where('country_id', $id)
				 ->update('country', $data);
		return true;
	}
	
	//** Get All Country **//
	
	public function get_allcountry()
	{
		$ret['rows'] = $this->db->select('*')
						->from('country')
						->where('country_status', 'enable')
						->get()->result_array();
						return $ret;
	}
	
	
	//** Search Store **//
	
	public function search_store_list($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by,$search_store_code,$search_store_name,$search_pro_typ)
	{
		
		if($sess_group == 1)
		{
			$this->db->select('STOR.*,DIVIS.*,PTY.*');
   	  			$this->db->from('store as STOR');
				$this->db->join('store_division as DIVIS','STOR.store_division = DIVIS.division_id');
				$this->db->join('products_type as PTY','PTY.products_type_id = STOR.store_category');
				if($search_store_code != '')
				{
					$this->db->like('STOR.store_code',$search_store_code);
				}
				if($search_store_name != '')
				{
					$this->db->like('STOR.store_name',$search_store_name);
				}
				if($search_pro_typ != '')
				{
					$this->db->like('PTY.products_type_name',$search_pro_typ);
				}
						
			    $this->db->order_by('store_id', 'DESC');
			    $this->db->where('store_status', 'enable');
				$this->db->order_by($sort_order, $sort_by);
				$this->db->limit($limit, $start);
				$ret['rows'] =	 $this->db->get()->result_array();
	
				$this->db->select('count(*) as TotalRows');
				$this->db->from('store as STOR');
				$this->db->join('store_division as DIVIS','STOR.store_division = DIVIS.division_id');
				$this->db->join('products_type as PTY','PTY.products_type_id = STOR.store_category');
				if($search_store_code != '')
				{
					$this->db->like('STOR.store_code',$search_store_code);
				}
				if($search_store_name != '')
				{
					$this->db->like('STOR.store_name',$search_store_name);
				}
				if($search_pro_typ != '')
				{
					$this->db->like('PTY.products_type_name',$search_pro_typ);
				}
				
				$this->db->order_by($sort_order, $sort_by);
				$this->db->where('store_status', 'enable');
			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;

		}
		else
		{
				$this->db->select('STOR.*,DIVIS.*,PTY.*');
   	  			$this->db->from('store as STOR');
				$this->db->join('store_division as DIVIS','STOR.store_division = DIVIS.division_id');
				$this->db->join('products_type as PTY','PTY.products_type_id = STOR.store_category');
				if($search_store_code != '')
				{
					$this->db->like('STOR.store_code',$search_store_code);
				}
				if($search_store_name != '')
				{
					$this->db->like('STOR.store_name',$search_store_name);
				}
				if($search_pro_typ != '')
				{
					$this->db->like('PTY.products_type_name',$search_pro_typ);
				}
						
			    $this->db->order_by('store_id', 'DESC');
			    $this->db->where('store_status', 'enable');
				$this->db->order_by($sort_order, $sort_by);
				$this->db->limit($limit, $start);
				$ret['rows'] =	 $this->db->get()->result_array();
	
				$this->db->select('count(*) as TotalRows');
				$this->db->from('store as STOR');
				$this->db->join('store_division as DIVIS','STOR.store_division = DIVIS.division_id');
				$this->db->join('products_type as PTY','PTY.products_type_id = STOR.store_category');
				if($search_store_code != '')
				{
					$this->db->like('STOR.store_code',$search_store_code);
				}
				if($search_store_name != '')
				{
					$this->db->like('STOR.store_name',$search_store_name);
				}
				if($search_pro_typ != '')
				{
					$this->db->like('PTY.products_type_name',$search_pro_typ);
				}
				
				$this->db->order_by($sort_order, $sort_by);
				$this->db->where('store_status', 'enable');
				$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}	
	}
	//** Search State **//
	
	public function search_state_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_country_name,$search_state_name,$search_state_code)
	{
		$this->db->select('S.*, CN.country_name');
		$this->db->from('state as S');
		$this->db->join('country as CN', 'CN.country_id = S.st_country_id');
		$this->db->order_by('S.state_id', 'DESC');
		if($search_country_name != '')
		{
		$this->db->like('CN.country_name',$search_country_name);
		}
		if($search_state_name != '')
		{
		$this->db->like('S.state_name',$search_state_name);
		}
		if($search_state_code != '')
		{
		$this->db->like('S.state_code',$search_state_code);
		}

		$this->db->where('S.state_status','enable');
		$this->db->order_by($sort_order, $sort_by);
		$this->db->limit($limit,$page);
		$ret['rows'] = $this->db->get()->result_array();

		$this->db->select('count(*) as TotalRows');
		$this->db->from('state as S');
		$this->db->join('country as CN', 'CN.country_id = S.st_country_id');

		if($search_country_name != '')
		{
		$this->db->like('CN.country_name',$search_country_name);
		}
		if($search_state_name != '')
		{
		$this->db->like('S.state_name',$search_state_name);
		}
		if($search_state_code != '')
		{
		$this->db->like('S.state_code',$search_state_code);
		}


		$this->db->order_by($sort_order, $sort_by);
		$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;			
	}
		
	//** State List **//
	
	public function state_list($limit,$start,$sort_order,$sort_by)
	{
	 	$ret['rows'] = $this->db->select('S.*, CN.country_name')
							->from('state as S')
							->join('country as CN', 'CN.country_id = S.st_country_id')
							->where('S.state_status', 'enable')
							->order_by($sort_order,$sort_by)
							->limit($limit, $start)
							->get()->result_array(); 
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('state')
							->get()->row();
		$ret['num_rows'] = $Count->TotalRows; 
		return $ret;
	}
	
	//** State Validation **//
	
	public function statevaildation($state_name, $con_name)
	{
		$this->db->select('*')
				->from('state')
				->where('state_name',$state_name)
				->where('st_country_id',$con_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add State **//	
	
	public function add_state($statedata)
	{
		$this->db->insert('state', $statedata);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	
	//** Edit State Validation **//
	
	public function editstatevaildation($state_name, $con_name, $id)
	{
		$this->db->select('*')
				->from('state')
				->where('state_name',$state_name)
				->where('st_country_id',$con_name)
				->where('state_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get Single State **//
	
	function get_singlestate($id) 
	{  
		$this->db->select('*');
		$this->db->from('state');
		$this->db->where('state_id', $id);
		$query = $this->db->get()->row();
		return $query;  
    }
	
	//** Update State **//
	  
	public function UpdateState($id,$state_data)
	{	
		$this->db->where('state_id', $id)
				 ->update('state', $state_data);
		return true;
	} 
	
	//** State Status **//
	
	public function Updatestate_Status($id,$data)
	{	
		$this->db->where('state_id', $id)
				 ->update('state', $data);
		return true;
	}
	
	//** Get All State **//
	
	public function get_allstate()
	{
		$ret['rows'] = $this->db->select('S.*, CN.country_name')
							->from('state as S')
							->join('country as CN', 'CN.country_id = S.st_country_id')
							->where('S.state_status', 'enable')
							->get()->result_array(); 
							return $ret;
	}
	
	
	
	//** Search City **//
		
	public function search_city_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_country_name,$search_state_name,$search_city_name,$search_city_code)
	{
		$this->db->select('CTY.*, S.state_name, CN.country_name');
		$this->db->from('city as CTY');
		$this->db->join('country as CN', 'CN.country_id = CTY.cty_country_id');
		$this->db->join('state as S', 'S.state_id = CTY.cty_state_id');
		$this->db->order_by('CTY.city_id', 'DESC');
		
		if($search_country_name != '')
		{
		$this->db->like('CN.country_name',$search_country_name);
		}
		if($search_state_name != '')
		{
		$this->db->like('S.state_name',$search_state_name);
		}
		if($search_city_name != '')
		{
		$this->db->like('CTY.city_name',$search_city_name);
		}
		if($search_city_code != '')
		{
		$this->db->like('CTY.city_code',$search_city_code);
		}

		$this->db->where('CTY.city_status', 'enable');
		$this->db->order_by($sort_order, $sort_by);
		$this->db->limit($limit,$page);
		$ret['rows'] = $this->db->get()->result_array();
		
		$this->db->select('count(*) as TotalRows');
		$this->db->from('city as CTY');
		$this->db->join('country as CN', 'CN.country_id = CTY.cty_country_id');
		$this->db->join('state as S', 'S.state_id = CTY.cty_state_id');
	

		if($search_country_name != '')
		{
		$this->db->like('CN.country_name',$search_country_name);
		}
		if($search_state_name != '')
		{
		$this->db->like('S.state_name',$search_state_name);
		}
		if($search_city_name != '')
		{
		$this->db->like('CTY.city_name',$search_city_name);
		}
		if($search_city_code != '')
		{
		$this->db->like('CTY.city_code',$search_city_code);
		}


		$this->db->order_by($sort_order, $sort_by);
		$Count = $this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows;

		
		return $ret;
	}
	
	//** City List **//
	
	public function city_list($limit,$start,$sort_order,$sort_by)
	{
	 	$ret['rows'] = $this->db->select('CTY.*, S.state_name, CN.country_name')
							->from('city as CTY')
							->join('country as CN', 'CN.country_id = CTY.cty_country_id')
							->join('state as S', 'S.state_id = CTY.cty_state_id')
							->where('CTY.city_status', 'enable')
							->order_by($sort_order, $sort_by)
							->limit($limit, $start)
							->get()->result_array(); 
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('city')
							->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** City Validation **//
	
	public function cityvaildation($city_name, $s_name, $con_name)
	{
		$this->db->select('*')
				->from('city')
				->where('city_name',$city_name)
				->where('cty_country_id',$con_name)
				->where('cty_state_id' ,$s_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Edit City Validation **//
	
	public function editcityvaildation($city_name, $s_name, $con_name, $id)
	{
		$this->db->select('*')
				->from('city')
				->where('city_name',$city_name)
				->where('cty_country_id',$con_name)
				->where('cty_state_id' ,$s_name)
				->where('city_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Add City **//
	
	public function add_city($citydata)
	{
		$this->db->insert('city', $citydata);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	
	//** Get Single City **//
	
	public function get_singlecity($id)
	{    
		$this->db->select('*');
		$this->db->from('city');
		$this->db->where('city_id', $id);
		$query = $this->db->get()->row();
		return $query;
    }
	
	//** Update City **//
	
	public function Updatecity($id,$city_data)
	{	
		$this->db->where('city_id', $id)
				 ->update('city', $city_data);

		return true;
	}
	
	//** City Status **//
	
	public function Updatecity_Status($id,$data)
	{	
		$this->db->where('city_id', $id)
				->update('city', $data);
		return true;
	} 

	//** Get All City's **//
	
	public function get_allcity()
	{
			$ret['rows'] = $this->db->select('CTY.*, S.state_name, CN.country_name')
								->from('city as CTY')
								->join('country as CN', 'CN.country_id = CTY.cty_country_id')
								->join('state as S', 'S.state_id = CTY.cty_state_id')
								->where('CTY.city_status', 'enable')
								->get()->result_array(); 
								return $ret;
	}
	
	//** Search User's **//
	
	/* public function search_users_list($sess_company,$srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('USR.*, UGRP.group_name')
							->from('users as USR')
							->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
							->order_by('USR.user_id', 'DESC')
							->or_like('USR.user_first_name',$srarch_key)
							->or_like('USR.user_last_name',$srarch_key)
							->or_like('USR.user_name',$srarch_key)
							->or_like('UGRP.group_name',$srarch_key)
							->or_like('USR.user_phone',$srarch_key)
							->or_like('USR.user_email',$srarch_key)
							->where('USR.user_status','enable')
							->where('USR.user_company_id', $sess_company)
							->where('USR.user_display_status','1')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('users as USR')
							->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
							->order_by('USR.user_id', 'DESC')
							->or_like('USR.user_first_name',$srarch_key)
							->or_like('USR.user_last_name',$srarch_key)
							->or_like('USR.user_name',$srarch_key)
							->or_like('UGRP.group_name',$srarch_key)
							->or_like('USR.user_phone',$srarch_key)
							->or_like('USR.user_email',$srarch_key)
							->where('USR.user_status','enable')
							->where('USR.user_company_id', $sess_company)
							->where('USR.user_display_status','1')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	} */
	
	
	public function search_users_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_first_name,$search_last_name,$search_user_name,$search_group_name,$search_user_email)
	{
		if($sess_group == 1)
		{
						$this->db->select('USR.*, UGRP.group_name');
						$this->db->from('users as USR');
						$this->db->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id');
						
						$this->db->order_by($sort_order, $sort_by);
			     		$this->db->order_by('USR.user_id', 'DESC');
						
						if($search_first_name != '')
						{
							$this->db->like('USR.user_first_name',$search_first_name);
						}
						if($search_last_name != '')
						{
							$this->db->like('USR.user_last_name',$search_last_name);
						}
						if($search_user_name != '')
						{
							$this->db->like('USR.user_name',$search_user_name);
						}
						if($search_group_name != '')
						{
							$this->db->like('UGRP.group_name',$search_group_name);
						}
						if($search_user_email != '')
						{
							$this->db->like('USR.user_email',$search_user_email);
						}
						$this->db->where('USR.user_status','enable');
						$this->db->where('USR.user_display_status','1');
						$this->db->order_by($sort_order, $sort_by);
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
						
						
						$this->db->select('count(*) as TotalRows');
						$this->db->from('users as USR');
						$this->db->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id');
						
						if($search_first_name != '')
						{
							$this->db->like('USR.user_first_name',$search_first_name);
						}
						if($search_last_name != '')
						{
							$this->db->like('USR.user_last_name',$search_last_name);
						}
						if($search_user_name != '')
						{
							$this->db->like('USR.user_name',$search_user_name);
						}
						if($search_group_name != '')
						{
							$this->db->like('UGRP.group_name',$search_group_name);
						}
						if($search_user_email != '')
						{
							$this->db->like('USR.user_email',$search_user_email);
						}
						$this->db->order_by($sort_order, $sort_by);
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
						
				
					return $ret;
		}
					else
					{
						$this->db->select('USR.*, UGRP.group_name');
						$this->db->from('users as USR');
						$this->db->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id');
						
						$this->db->order_by($sort_order, $sort_by);
			     		$this->db->order_by('USR.user_id', 'DESC');
						
						if($search_first_name != '')
						{
							$this->db->like('USR.user_first_name',$search_first_name);
						}
						if($search_last_name != '')
						{
							$this->db->like('USR.user_last_name',$search_last_name);
						}
						if($search_user_name != '')
						{
							$this->db->like('USR.user_name',$search_user_name);
						}
						if($search_group_name != '')
						{
							$this->db->like('UGRP.group_name',$search_group_name);
						}
						if($search_user_email != '')
						{
							$this->db->like('USR.user_email',$search_user_email);
						}
						
						$this->db->order_by($sort_order, $sort_by);
						$this->db->where('USR.user_company_id', $sess_company);
						$this->db->where('USR.user_display_status','1');
						$this->db->where('USR.user_status','enable');
						
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				 

						$this->db->select('count(*) as TotalRows');
						$this->db->from('users as USR');
						$this->db->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id');
						
						if($search_first_name != '')
						{
							$this->db->like('USR.user_first_name',$search_first_name);
						}
						if($search_last_name != '')
						{
							$this->db->like('USR.user_last_name',$search_last_name);
						}
						if($search_user_name != '')
						{
							$this->db->like('USR.user_name',$search_user_name);
						}
						if($search_group_name != '')
						{
							$this->db->like('UGRP.group_name',$search_group_name);
						}
						if($search_user_email != '')
						{
							$this->db->like('USR.user_email',$search_user_email);
						}
				
						$this->db->order_by($sort_order, $sort_by); 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
	
	//** User's List **//
	
	public function users_list($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		  if($sess_group == 1)
		  {
			  $ret['rows'] = $this->db->select('USR.*, UGRP.group_name')
									  ->from('users as USR')
									  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
									  ->where('USR.user_status' ,'enable')
									  ->where('USR.user_display_status','1')
									  ->order_by($sort_order, $sort_by)
									  ->limit($limit, $start)
									  ->get()->result_array(); 
				
			  $Count = $this->db->select('count(*) as TotalRows')
									  ->from('users as USR')
									  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
									  ->where('USR.user_status' ,'enable')
									  ->where('USR.user_display_status','1')
									  ->get()->row();
						  $ret['num_rows'] = $Count->TotalRows;
						  return $ret;
		  }
		  else
		  {
			  $ret['rows'] = $this->db->select('USR.*, UGRP.group_name')
									  ->from('users as USR')
									  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
									  ->where('USR.user_status' ,'enable')
									  ->where('USR.user_company_id', $sess_company)
									  ->where('USR.user_display_status','1')
									  ->order_by($sort_order, $sort_by)
									  ->limit($limit, $start)
									  ->get()->result_array();
		  
			  $Count = $this->db->select('count(*) as TotalRows')
									  ->from('users as USR')
									  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
									  ->where('USR.user_status' ,'enable')
									  ->where('USR.user_company_id', $sess_company)
									  ->where('USR.user_display_status','1')
									  ->get()->row();
			  			$ret['num_rows'] = $Count->TotalRows;
						return $ret;
		  }
	}
	
	//** Get All User Groups **//
	
	public function get_allusr_grp()
	{
		$ret['rows'] = $this->db->select('*')
							->from('user_groups')
							->where('status', 'enable')  
							->get()->result_array();
							return $ret;
	}
	
	//** User Validation **//
	
	public function user_vaildation($username)
	{
		$this->db->select('*')
				->from('users')
				->where('user_name',$username)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add User **//
	
	public function add_user($userdata)
	{
		$this->db->insert('users', $userdata);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Edit User Validation **//
	
	public function edituser_vaildation($username, $id)
	{
		$this->db->select('*')
				->from('users')
				->where('user_name',$username)
				->where('user_id !=',$id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Update User's **//
	
	public function update_user($userdata,$id)
	{	
		$this->db->where('user_id', $id);
		$this->db->update('users', $userdata);
		
		return true;
	}

	//** Get Single User **//
	
	function get_singleuser($id)
	 { 	
		$this->db->select('USR.*,COM.company_id,COM.company_name, COM.company_short_name');
		$this->db->from('users as USR');
		$this->db->join('company as COM', 'USR.user_company_id = COM.company_id');
		$this->db->where('user_id', $id);
		$query = $this->db->get()->row();
		return $query;
    }
	
	//** User Status **//
	
    public function updateuserstatus($userdata, $id)
	{
		$this->db->where('user_id', $id)
				 ->update('users', $userdata);
		return true;		
	}
	
	//** User Group List **//
	
	public function users_grplist($limit,$start,$sort_order,$sort_by)
	{
	 	$ret['rows'] = $this->db->select('*')
							->from('user_groups')
							->order_by('group_id', 'DESC')
							->where('status' ,'enable')
							->limit($limit, $start)
							->get()->result_array();
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('user_groups')
							->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search User Group **//
	
	public function search_users_grplist($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		
		$ret['rows'] = $this->db->select('*')
							->from('user_groups')
							->order_by('group_id', 'DESC')
							->or_like('group_name' ,$srarch_key)
							->or_like('group_description' ,$srarch_key)
							->where('group_id !=' ,'1')
							->where('status' ,'enable')
							->limit($limit,$page)
							->get()->result_array();
	//echo $this->db->last_query();exit;
		$Count = $this->db->select('count(*) as TotalRows')
							->from('user_groups')
							->or_like('group_name' ,$srarch_key)
							->or_like('group_description' ,$srarch_key)
							->where('status' ,'enable')
							->where('group_id !=' ,'1')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret; 
	}
	
	//** User Group Validation **//
	
	public function user_grpvaildation($usr_grp_name)
	{
		$this->db->select('*')
				->from('user_groups')
				->where('group_name',$usr_grp_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Edit User Group Validation **//
	
	public function edituser_grpvaildation($usr_grp_name, $id)
	{
		$this->db->select('*')
				->from('user_groups')
				->where('group_name',$usr_grp_name)
				->where('group_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Add User Group **//
	
	public function add_usergrp($user_grpdetail)
	{
		$this->db->insert('user_groups', $user_grpdetail);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	//** Add User Group Modules **//
	
	public function add_user_grp_module_detail($user_grp_module_detail)
	{
		$this->db->insert('user_roles', $user_grp_module_detail);
		return  true;
		
	}
	public function get_usergrp()
	{
	
		$this->db->select('group_id');
		$this->db->from('yak_user_groups');
		
		$ret = $this->db->get()->result_array();
		
		return $ret;
	}
	
	//** Get Module **//
	
	public function get_module()
	{
		$this->db->select('module_id');
		$this->db->from('yak_modules');
		$ret = $this->db->get()->result_array();
		return $ret;
	}
	
	//** Update User Group **//
		
	public function update_usergrp($user_grpdetail,$id)
	{	
		$this->db->where('group_id', $id);
		$this->db->update('user_groups', $user_grpdetail);
		
		return true;
	}
	
	//** Get Single User Group **//
	
	function get_singleusergrp($id)
	 {    
	  $this->db->select('*');
		$this->db->from('user_groups');
	 	$this->db->where('group_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
    }
	
	//** Update User Group **//
	
    public function updateuser_grpstatus($usergrpdata, $id)
	{
		$this->db->where('group_id', $id)
				 ->update('user_groups', $usergrpdata);
		return true;
			
	}
	
	public function get_all_module_roles($id)
	{
		$ret = $this->db->select('UR.*, MO.module_id, MO.module_name')
					->from('modules as MO')
					->join('user_roles as UR', 'MO.module_id = UR.module_id')
					->where('UR.user_group_id', $id)
					->get()->result_array();
					
		return $ret;
	}
	
	
	public function add_roles($data, $user_group_id, $module_id)
	{
		$this->db->select('*')
				->from('user_roles')
				->where('user_group_id',$user_group_id)
				->where('module_id',$module_id)
				->get();
		$num = $this->db->affected_rows();
		
		if($num == 0)
		{
			$this->db->insert('user_roles', $data);
		}
		else
		{
			$this->db->where('user_group_id', $user_group_id);
			$this->db->where('module_id', $module_id);
			$this->db->update('user_roles', $data);
		}
		return true;
	}
	/************** Carrier Model ****************/
	//** Search Carrier **//
	
	public function search_career_list($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('shipping_carrier')
							->order_by('shipping_carrier_id', 'DESC')
							->or_like('shipping_carrier_name' ,$srarch_key)
							->or_like('shipping_carrier_address' ,$srarch_key)
							->where('shipping_status' ,'active')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('shipping_carrier')
							->or_like('shipping_carrier_name' ,$srarch_key)
							->or_like('shipping_carrier_address' ,$srarch_key)
							->where('shipping_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Carrier List **//
	
	public function career_list($limit,$start,$sort_order,$sort_by)
	{
	 	$ret['rows'] = $this->db->select('*')
							->from('shipping_carrier')
							->order_by('shipping_carrier_id', 'DESC')
							->where('shipping_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('uom')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//**  Carrier Validation **//
	
	public function careervaildation($career_name)
	{
		$this->db->select('*')
				->from('shipping_carrier')
				->where('shipping_carrier_name',$career_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Carrier **//
	
	public function add_career($career_detail)
	{
		$this->db->insert('shipping_carrier', $career_detail);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	//** Edit Carrier Validation **//
	
	public function editcareervaildation($career_name, $id)
	{
		$this->db->select('*')
				->from('shipping_carrier')
				->where('shipping_carrier_name',$career_name)
				->where('shipping_carrier_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}

	//** Get Single Carrier **//
	
	public function get_singlecareer($id)
	{    
		$this->db->select('*');
		$this->db->from('shipping_carrier');
		$this->db->where('shipping_carrier_id', $id);
		$query = $this->db->get()->row();
		return $query;
    }
	
	//** Edit Carrier **//
	
    public function edit_career($career_detail,$id)
	{	
		$this->db->where('shipping_carrier_id', $id);
		$this->db->update('shipping_carrier', $career_detail);
		return true;
	}
	
	//** Get All Carrier **//
	
	public function get_allcarrier()
	{
		$ret['rows'] = $this->db->select('*')
							->from('shipping_carrier')
							->where('shipping_status', 'active')
							->get()->result_array();
							return $ret;
	}
	
	//** Update Carrier **//
	
	public function update_carrier($carrierdata,$id)
	{	
		$this->db->where('shipping_carrier_id', $id)
				->update('shipping_carrier', $carrierdata);
		
		return true;
	}

/************** Prefix Model ****************/
	
	//** Prefix List **//
	
	public function get_prefix($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('PR.*,PRM.module_name,PRM.module_id')
							->from('prefix as PR')
							->join('modules as PRM', 'PRM.module_id = PR.prefix_module')
							->order_by('PR.prefix_id', 'DESC')
							->where('PR.prefix_statue' ,'active')
							->limit($limit, $start)
							->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('prefix')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search Prefix **//
	
	public function search_get_prefix($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('prefix')
							->order_by('prefix_id', 'DESC')
							->or_like('prefix_module' ,$srarch_key)
							->or_like('prefix_name' ,$srarch_key)
							->or_like('prefix_decsription' ,$srarch_key)
							->where('prefix_statue' ,'active')
							->limit($limit, $page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('prefix')
							->or_like('prefix_module' ,$srarch_key)
							->or_like('prefix_name' ,$srarch_key)
							->or_like('prefix_decsription' ,$srarch_key)
							->where('prefix_statue' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//**  Prefix Validation **//
	
	public function prefixvaildation($prefix_name)
	{
		$this->db->select('*')
				->from('prefix')
				->where('prefix_name',$prefix_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get All Module For Prefix **//
	
	public function get_all_module_prefix()
	{
		$ret = $this->db->select('MO.module_id, MO.module_name')
					->from('modules as MO')
					->get()->result_array();
					
		return $ret;
	}

	//** Add Prefix **//
	
	public function add_prefix($prefixdetails)
	{
		$this->db->insert('prefix', $prefixdetails);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Update Prefix **//
	
	public function update_prefix($prefixdetails,$id)
	{	
		$this->db->where('prefix_id', $id);
		$this->db->update('prefix', $prefixdetails);
		return true;
	}
	
	//** Edit Prefix Validation **//
	
	public function editprefixvaildation($prefix_name, $id)
	{
		$this->db->select('*')
				->from('prefix')
				->where('prefix_name',$prefix_name)
				->where('prefix_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Get Single Prefix **//
	
	public function getsingle_prefix($id)
	{
		$this->db->select('PR.*,PRM.module_name,PRM.module_id');
		$this->db->from('prefix as PR');
		$this->db->join('modules as PRM', 'PRM.module_id = PR.prefix_module');
	 	$this->db->where('PR.prefix_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Prifix Status **//
	
	public function update_prefix_status($prefixData,$id)
	{	
		$this->db->where('prefix_id', $id)
				->update('prefix', $prefixData);
		
		return true;
	}

/****************** manufacturer Model *****************/
	//** Manufacturer List **//
	
	public function get_manufacturer($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('manufacturer')
							->order_by('manufacturer_id', 'DESC')
							->where('manufacturer_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('manufacturer')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search Manufacturer **//
	
	public function search_get_manufacturer($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('manufacturer')
							->order_by('manufacturer_id', 'DESC')
							->or_like('manufacturer_name' ,$srarch_key)
							->or_like('manufacturer_description' ,$srarch_key)
							->where('manufacturer_status' ,'active')
							->limit($limit,$page)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('manufacturer')
							->or_like('manufacturer_name' ,$srarch_key)
							->or_like('manufacturer_description' ,$srarch_key)
							->where('manufacturer_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Manufacturer Validation **//
	
	public function manufacturervaildation($manufacturer_name)
	{
		$this->db->select('*')
				->from('manufacturer')
				->where('manufacturer_name',$manufacturer_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Manufacturer **//
	
	public function add_manufacturer($manufacturerdetails)
	{
		$this->db->insert('manufacturer', $manufacturerdetails);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Update Manufacturer **//
	
	public function update_manufacturer($manufacturerdetails,$id)
	{	
		$this->db->where('manufacturer_id', $id);
		$this->db->update('manufacturer', $manufacturerdetails);
		
		return true;
	}
	
	//**Edit  Manufacturer Validation **//
	
	public function editmanufacturervaildation($manufacturer_name, $id)
	{
		$this->db->select('*')
				->from('manufacturer')
				->where('manufacturer_name',$manufacturer_name)
				->where('manufacturer_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get Single Manufacturer **//
	
	public function getsingle_manufacturer($id)
	{
		$this->db->select('*');
		$this->db->from('manufacturer');
	 	$this->db->where('manufacturer_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Manufacturer Status **//
	
	public function update_manufacturer_status($manufacturerData,$id)
	{	
		$this->db->where('manufacturer_id', $id)
				->update('manufacturer', $manufacturerData);
		return true;
	}

	/************ Payment Mode Model ***************/
	//** Payment List **//
	
	public function get_paymentmode($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('payment_mode')
							->order_by('payment_mode_id', 'DESC')
							->where('payment_mode_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('payment_mode')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search Payment **//
	
	public function search_get_paymentmode($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('payment_mode')
							->order_by('payment_mode_id', 'DESC')
							->or_like('payment_mode_name' ,$srarch_key)
							->or_like('payment_mode_description' ,$srarch_key)
							->where('payment_mode_status' ,'active')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('payment_mode')
							->or_like('payment_mode_name' ,$srarch_key)
							->or_like('payment_mode_description' ,$srarch_key)
							->where('payment_mode_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Payment Validation **//
	
	public function paymentmodevaildation($pay_mode_name)
	{
		$this->db->select('*')
				->from('payment_mode')
				->where('payment_mode_name',$pay_mode_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//**Add Payment **//
	
	public function add_paymentmode($paymentmodedetails)
	{
		$this->db->insert('payment_mode', $paymentmodedetails);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//**Update Payment **//
	
	public function update_paymentmode($paymentmodedetails,$id)
	{	
		$this->db->where('payment_mode_id', $id);
		$this->db->update('payment_mode', $paymentmodedetails);
		return true;
	}
	
	//**Edit Payment Validation **//
	
	public function editpaymentmodevaildation($pay_mode_name, $id)
	{
		$this->db->select('*')
				->from('payment_mode')
				->where('payment_mode_name',$pay_mode_name)
				->where('payment_mode_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Get Single  Payment Mode **//

	public function getsingle_paymentmode($id)
	{
		$this->db->select('*');
		$this->db->from('payment_mode');
	 	$this->db->where('payment_mode_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Payment Status **//
	
	public function update_paymentmode_status($paymentmodeData,$id)
	{	
		$this->db->where('payment_mode_id', $id)
				->update('payment_mode', $paymentmodeData);
		
		return true;
	}

	/************* Location Model **************/
	//** Loaction List **//
	
	public function get_location($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('location')
							->order_by('location_id', 'DESC')
							->where('location_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('location')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Loaction Search **//
	
	public function search_get_location($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('location')
							->order_by('location_id', 'DESC')
							->or_like('location_name' ,$srarch_key)
							->or_like('location_address' ,$srarch_key)
							->or_like('location_phone' ,$srarch_key)
							->where('location_status' ,'active')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('location')
							->or_like('location_name' ,$srarch_key)
							->or_like('location_address' ,$srarch_key)
							->or_like('location_phone' ,$srarch_key)
							->where('location_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Get All Location's **//
	
	public function get_alllocation()
	{
		$ret['rows'] = $this->db->select('*')
							->from('location')
							->where('location_status', 'active')  
							->get()->result_array();
						 return $ret;
	}
	
	//** Add Loaction **//
	
	public function add_location($locationdetails)
	{
		$this->db->insert('location', $locationdetails);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	
	//** Loaction Validation **//
	
	public function locationvaildation($con_location)
	{
		$this->db->select('*')
				->from('location')
				->where('location_name',$con_location)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}

	//** Get Single Location **//
	
	public function getsingle_location($id)
	{
		$this->db->select('*');
		$this->db->from('location');
	 	$this->db->where('location_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Update Loaction **//
	
	public function update_location($locationdetails,$id)
	{	
		$this->db->where('location_id', $id);
		$this->db->update('location', $locationdetails);
		return true;
	}
	
	//** Edit Loaction Validation **//
	
	public function editlocationvaildation($con_location, $id)
	{
		$this->db->select('*')
				->from('location')
				->where('location_name',$con_location)
				->where('location_id !=',$id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Loaction Status **//
	
	public function update_location_status($locationData,$id)
	{	
		$this->db->where('location_id', $id)
				->update('location', $locationData);
		
		return true;
	}

	/********* Bank Details *******/
	//** Bank List **//
	
	public function get_bankdetails($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('bank_info')
							->order_by('bank_id', 'DESC')
							->where('bank_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();
	 
		$Count = $this->db->select('count(*) as TotalRows')
							->from('bank_info')
							->order_by('bank_id', 'DESC')
			     			->where('bank_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Bank Search **//
	
	public function search_get_bankdetails($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('bank_info')
							->order_by('bank_id', 'DESC')
							->or_like('bank_name' ,$srarch_key)
							->or_like('bank_desc' ,$srarch_key)
							->where('bank_status' ,'active')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('bank_info')
							->or_like('bank_name' ,$srarch_key)
							->or_like('bank_desc' ,$srarch_key)
							->where('bank_status' ,'active')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Bank Validation **//
	
	public function banknamevaildation($bank_name)
	{
		$this->db->select('*')
				->from('bank_info')
				->where('bank_name',$bank_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Bank **//
	
	public function add_bankdetails($bank_details)
	{
		$this->db->insert('bank_info', $bank_details);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	//**Edit Bank Validation **//
	
	public function editbanknamevaildation($bank_name, $id)
	{
		$this->db->select('*')
				->from('bank_info')
				->where('bank_name',$bank_name)
				->where('bank_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Update Bank **//
	
	public function update_bankdetail($bank_details,$id)
	{	
		$this->db->where('bank_id', $id);
		$this->db->update('bank_info', $bank_details);
		
		return true;
	}
	
	//**Get Single Bank Details **//
	
	public function getsingle_bankdetails($id)
	{
		$this->db->select('*');
		$this->db->from('bank_info');
	 	$this->db->where('bank_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
	
	//** Bank Status **//
	
	public function update_bank_status($bank_details,$id)
	{	
		$this->db->where('bank_id', $id)
				 ->update('bank_info', $bank_details);
		return true;
	}
	
	
	/**************   region   ***************/
	//** Region List **//
	
   public function region_list($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('region')
							->order_by('region_id', 'DESC')
							->where('region_status' ,'enable')
							->limit($limit, $start)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('region')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Region Search **//
	
	public function search_region_list($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('region')
							->order_by('region_id', 'DESC')
							->or_like('region_name' ,$srarch_key)
							->or_like('region_code' ,$srarch_key)
							->or_like('region_status' ,$srarch_key)
							->where('region_status' ,'enable')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('region')
							->or_like('region_name' ,$srarch_key)
							->or_like('region_code' ,$srarch_key)
							->or_like('region_status' ,$srarch_key)
							->where('region_status' ,'enable')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Region Validation **//
	
	public function valid_region($region_name)
	{
		$this->db->select('*')
				->from('region')
				->where('region_name',$region_name)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add Region **//
	
	public function add_region($Region_Data)
	{
		$this->db->insert('region', $Region_Data);
		return  true;
	}
	
	//** Get Single Region **//
	
	public function get_singleregion($id)
	{    
		$this->db->select('*');
		$this->db->from('region');
		$this->db->where('region_id', $id);
		$query = $this->db->get()->row();
		return $query;
    }
	
	//** Update Region **//
	
	public function Update_region($id, $Region_Data)
	{	
		$this->db->where('region_id', $id)
				->update('region', $Region_Data);
		return true;
	}
	 
	//** Region Status **//
	
	public function update_region_status($region_Data,$id)
	{	
		$this->db->where('region_id', $id)
				->update('region', $region_Data);
		return true;
	}
	
 /********************* zone **********************/
 //** Zone List **//
 
  	public function zone_list($limit,$start,$sort_order,$sort_by)
	{
	$ret['rows'] = $this->db->select('ZO.*, RE.*')
							->from('zone as ZO')
							->join('region as RE', 'RE.region_id = ZO.zone_region_id')
							->where('ZO.zone_status' ,'enable')
							->order_by($sort_order, $sort_by)
							->limit($limit, $start)
							->get()->result_array(); 
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('zone')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Zone search **//
	
	public function search_zone_list($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		
		$ret['rows'] = $this->db->select('ZO.*, RE.*')
							->from('zone as ZO')
							->join('region as RE', 'RE.region_id = ZO.zone_region_id')
							->order_by('zone_id', 'DESC')
							->or_like('ZO.zone_name' ,$srarch_key)
							->or_like('ZO.zone_code' ,$srarch_key)
							->or_like('RE.region_name' ,$srarch_key)
							->or_like('ZO.zone_status' ,$srarch_key)
							->where('ZO.zone_status' ,'enable')
							->limit($limit,$page)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('zone as ZO')
							->join('region as RE', 'RE.region_id = ZO.zone_region_id')
							->or_like('ZO.zone_name' ,$srarch_key)
							->or_like('ZO.zone_code' ,$srarch_key)
							->or_like('RE.region_name' ,$srarch_key)
							->or_like('ZO.zone_status' ,$srarch_key)
							->where('ZO.zone_status' ,'enable')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Zone Validation **//
	
	public function valid_zone($region_name, $zone_name)
	{
		$this->db->select('*')
				->from('zone')
				->where('zone_region_id',$region_name)
				->where('zone_name',$zone_name)
				->get();
		$num = $this->db->affected_rows();
 		return $num;
	}
	
	//** Get All Region **//
	
	public function get_allregion()
	{
		$num['rows']=$this->db->select('*')
				->from('region')
				->get()->result_array();
		return $num;
	}
	
	//** Zone Add **//
	
	public function add_zone($zone_data)
	{
		$this->db->insert('zone', $zone_data);
		return  true;
	}
	
	//** Get Single Zone **//
	
	public function get_singlezone($id)
	 {    
		$this->db->select('*');
		$this->db->from('zone');
		$this->db->where('zone_id', $id);
		$query = $this->db->get()->row();
		return $query;
    }
	
	//** Zone Update  **//
	
	public function Update_zone($id, $zone_Data)
	{	
		$this->db->where('zone_id', $id)
				->update('zone', $zone_Data);
		return true;
	}
	 
	 //** Zone Status **//
	 
	public function update_zone_status($zone_Data,$id)
	{	
		$this->db->where('zone_id', $id)
				 ->update('zone', $zone_Data);
		return true;
	}
	
	/************** AREA *******************/
 	//** Area List **//
	
  	public function area_list($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('AR.*, RE.*, ZO.*')
	 					->from('area as AR')
						->join('region as RE', 'RE.region_id = AR.area_region_id')
						->join('zone as ZO', 'ZO.zone_id = AR.area_zone_id')
						->where('AR.area_status' ,'enable') 
						->order_by($sort_order, $sort_by)
						->limit($limit, $start)
						->get()->result_array(); 
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('area')
						 	->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search Area **//
	
	public function search_area_list($srarch_key,$limit,$page,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('AR.*, RE.*, ZO.*')
								->from('area as AR')
								->join('region as RE', 'RE.region_id = AR.area_region_id')
								->join('zone as ZO', 'ZO.zone_id = AR.area_zone_id')
								->order_by('area_id', 'DESC')
								->or_like('AR.area_name' ,$srarch_key)
								->or_like('AR.area_code' ,$srarch_key)
								->or_like('RE.region_name' ,$srarch_key)
								->or_like('ZO.zone_name' ,$srarch_key)
								->or_like('AR.area_status' ,$srarch_key)
								->where('area_status' ,'enable')
								->limit($limit,$page)
								->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
								->from('area as AR')
								->join('region as RE', 'RE.region_id = AR.area_region_id')
								->join('zone as ZO', 'ZO.zone_id = AR.area_zone_id')
								->or_like('AR.area_name' ,$srarch_key)
								->or_like('AR.area_code' ,$srarch_key)
								->or_like('RE.region_name' ,$srarch_key)
								->or_like('ZO.zone_name' ,$srarch_key)
								->or_like('AR.area_status' ,$srarch_key)
								->where('area_status' ,'enable')
								->get()->row();
		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Area Validation **//
	
	public function valid_area($area_region_id, $area_zone_id, $area_name)
	{
		$this->db->select('*')
				->from('area')
				->where('area_region_id',$area_region_id)
				->where('area_zone_id',$area_zone_id)
				->where('area_name',$area_name)
				->get();
		$num = $this->db->affected_rows();
 		return $num;
	}
	
	//** Get All Zone **//
	 
	public function get_allzone()
	{
		$num['rows']=$this->db->select('*')
				->from('zone')
				->get()->result_array();
		return $num;
	}
	
	//** Add Area **//
	
	public function add_area($area_data)
	{
		$this->db->insert('area', $area_data);
		return  true;
	}
	
	//** Get Single Area **//
	
	public function get_singlearea($id)
	 {    
		$this->db->select('*');
		$this->db->from('area');
		$this->db->where('area_id', $id);
		$query = $this->db->get()->row();
		return $query;
    }
	
	//** Update Area **//
	
	public function Update_area($id, $area_Data)
	{	
		$this->db->where('area_id', $id)
				->update('area', $area_Data);
		return true;
	}
	 
	//** Delete Area **//
	
	public function update_area_status($area_Data,$id)
	{	
		$this->db->where('area_id', $id)
				 ->update('area', $area_Data);
		return true;
	}
	/** New Modlue Start here/*///////////////
	
	public function get_module_list($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
						->from('modules')
			     		->order_by('module_id', 'DESC')
			     		->limit($limit, $start)
						->get()->result_array();
	 
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('modules')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		
		return $ret;
	}
	
	public function modulevaildation($module_name)
	{
		$this->db->select('module_name')
				->from('modules')
				->where('module_name',$module_name)
				->get();
		$num = $this->db->affected_rows();
		//echo $this->db->last_query();exit;

		return $num;
	
	}	
	public function get_usergrp_module()
	{
		$id='1';
		$this->db->select('group_id');
		$this->db->from('yak_user_groups');
		$this->db->where('group_id !=', $id);
		
		$ret = $this->db->get()->result_array();
		
		return $ret;
	}
	
	
	public function add_module_data($moduledetails)
	{
		$this->db->insert('modules', $moduledetails);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
		
	}
	
	
	public function add_grp_module_detail($user_grp_module_detail,$id,$mod_id)
	{	
	
		$this->db->select('*')
				->from('user_roles')
				->where('user_group_id',$id)
				->where('module_id',$mod_id)
				->get();
		$num = $this->db->affected_rows();
		
		if($num == 0)
		{
			$this->db->insert('user_roles', $user_grp_module_detail);
		}
		else
		{
			$this->db->where('user_group_id', $id);
			$this->db->where('module_id', $mod_id);
			
			$this->db->update('user_roles', $user_grp_module_detail);
		}
		
		return true;
		
	}
	public function add_vernalsoft_module_detail($user_vernalsoft_module_detail)
	{
		$this->db->insert('user_roles', $user_vernalsoft_module_detail);
		
		
		return true;
		
	}
	
	public function getsingle_module($id)
	{
		$this->db->select('*');
		$this->db->from('modules');
	 	$this->db->where('module_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	public function editmodulevaildation($module_name,$id)
	{	
	//echo $id; exit;
		$this->db->select('*')
				->from('modules')
				->where('module_name',$module_name)
				->where('module_id !=', $id)
				->get();
		$num = $this->db->affected_rows();
	//	echo $this->db->last_query();exit;
		return $num;
	
	}
	
	public function update_module_details($moduledetails, $id)
	{	
		$this->db->where('module_id', $id);
		$this->db->update('modules', $moduledetails);
		
		return true;
	}
	
	/////////////////////Edit Profile Preferences////////////////
	
	public function editprofile_vaildation($email, $id)
	{
		$this->db->select('*')
				->from('users')
				->where('user_email',$email)
				->where('user_id !=',$id)
				->get();
		$num = $this->db->affected_rows();
		//echo $this->db->last_query();exit;

		return $num;
	}
	public function get_userpassword($userId)
	{
		$this->db->select('user_pwd');
		$this->db->from('users');
	 	$this->db->where('user_id', $userId);
		$query = $this->db->get()->row();
	 	
		return $query;
	
	}
	
	public function get_userDetails($Cus_UserId)
	{
		$this->db->select('user_name');
		$this->db->from('users');
	 	$this->db->where('user_name', $Cus_UserId);
		$query = $this->db->get()->row();
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('users')
							->where('user_name', $Cus_UserId)
						 	->get()->row();
		
		$ret['num_rows'] = $Count->TotalRows;
	 	
		return $ret;
	
	}
	public function ChangePassword($userId, $data)
	{
		
		$this->db->where('user_id', $userId)
				->update('users', $data);
		
		return true;
	}
	public function get_user_code($userId)
	{
		$this->db->select('user_name');
		$this->db->from('users');
	 	$this->db->where('user_id', $userId);
		$query = $this->db->get()->row();
	 	
		return $query;
	
	}
	public function ChangeUserPassword($Cus_UserId, $data)
	{
		
		$this->db->where('user_name', $Cus_UserId)
				->update('users', $data);
		
		return true;
	}
	
	//**  COMPANY MODULE Get All Company  **//
	
	//** Get All Company **//
	
	public function get_all_company()
	{
		$ret = $this->db->select('COM.company_id, COM.company_name, COM.company_short_name')
					->from('company as COM')
					->get()->result_array();
					
		return $ret;
	}
	
	public function get_all_manufacturer()
	{
		$ret = $this->db->select('MFC.*')
					->from('manufacturer as MFC')
					->get()->result_array();
					
		return $ret;
	}
	
	public function get_all_courier_type()
	{
		$ret = $this->db->select('CTYP.*')
					->from('products_type as CTYP')
					->get()->result_array();
					
		return $ret;
	}
	public function get_company_list($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
						->from('company')
			     		->order_by('company_id', 'DESC')
			     		->limit($limit, $start)
						->get()->result_array();
	 
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('company')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		
		return $ret;
	}
	////////////Get Sales Person ////
	public function get_sales_person()
	{
		$ret = $this->db->select('*')
				->from('users')
				->where('user_group_id', '3')  
				->get()->result_array();
				
		return $ret;

	}
	
	public function get_search_products($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_feild_1,$search_feild_2,$search_feild_3,$search_feild_4,$search_feild_5)
	{
		if($sess_group == 1)
		{
			  $this->db->select('PRO.*, PRO_TYP.*');
			  $this->db->from('products as PRO');
			  $this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			  $this->db->order_by($sort_order, $sort_by);
			  $this->db->order_by('PRO.product_id', 'DESC');
			  
			  if($search_feild_1 != '')
			  {
				  $this->db->like('PRO.product_code',$search_feild_1);
			  }
			  if($search_feild_2 != '')
			  {
				  $this->db->like('PRO.product_name',$search_feild_2);
			  }
			  if($search_feild_3 != '')
			  {
				  $this->db->like('PRO.product_mfr_part_number',$search_feild_3);
			  }
			  if($search_feild_4 != '')
			  {
				  $this->db->like('PRO.product_type_id',$search_feild_4);
			  }
			  if($search_feild_5 != '')
			  {
				  $this->db->like('PRO.product_active_status',$search_feild_5);
			  }
			  $this->db->where('PRO.product_status','enable');
			  $this->db->where('PRO.product_type_id','1');
			  $this->db->order_by($sort_order, $sort_by);
			  $this->db->limit($limit,$page);
			  $ret['rows'] = $this->db->get()->result_array();
			  
			  

			  $this->db->select('count(*) as TotalRows');
			  $this->db->from('products as PRO');
			  $this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			  if($search_feild_1 != '')
			  {
				  $this->db->like('PRO.product_code',$search_feild_1);
			  }
			  if($search_feild_2 != '')
			  {
				  $this->db->like('PRO.product_name',$search_feild_2);
			  }
			  if($search_feild_3 != '')
			  {
				  $this->db->like('PRO.product_mfr_part_number',$search_feild_3);
			  }
			  if($search_feild_4 != '')
			  {
				  $this->db->like('PRO.product_type_id',$search_feild_4);
			  }
			  if($search_feild_5 != '')
			  {
				  $this->db->like('PRO.product_active_status',$search_feild_5);
			  }
			  $this->db->where('PRO.product_status','enable');
			  $this->db->where('PRO.product_type_id','1');
			  $this->db->order_by($sort_order, $sort_by);
			  $Count = $this->db->get()->row();

		  	$ret['num_rows'] = $Count->TotalRows;
		  
		  	return $ret;
		}
		else
		{
			$this->db->select('PRO.*, PRO_TYP.*');
			$this->db->from('products as PRO');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			$this->db->order_by('PRO.product_id', 'DESC');
			
			if($search_feild_1 != '')
			{
				$this->db->like('PRO.product_code',$search_feild_1);
			}
			if($search_feild_2 != '')
			{
				$this->db->like('PRO.product_name',$search_feild_2);
			}
			if($search_feild_3 != '')
			{
				$this->db->like('PRO.product_mfr_part_number',$search_feild_3);
			}
			if($search_feild_4 != '')
			{
				$this->db->like('PRO.product_type_id',$search_feild_4);
			}
			if($search_feild_5 != '')
			{
				$this->db->like('PRO.product_active_status',$search_feild_5);
			}
			$this->db->where('PRO.product_company_id',$sess_company);
			$this->db->order_by($sort_order, $sort_by);
			$this->db->where('PRO.product_status','enable');
			$this->db->limit($limit,$page);
			$ret['rows'] = $this->db->get()->result_array();

			$this->db->select('count(*) as TotalRows');
			$this->db->from('products as PRO');
			$this->db->join('products_type as PRO_TYP', 'PRO_TYP.products_type_id = PRO.product_type_id');
			if($search_feild_1 != '')
			{
				$this->db->like('PRO.product_code',$search_feild_1);
			}
			if($search_feild_2 != '')
			{
				$this->db->like('PRO.product_name',$search_feild_2);
			}
			if($search_feild_3 != '')
			{
				$this->db->like('PRO.product_mfr_part_number',$search_feild_3);
			}
			if($search_feild_4 != '')
			{
				$this->db->like('PRO.product_type_id',$search_feild_4);
			}
			if($search_feild_5 != '')
			{
				$this->db->like('PRO.product_active_status',$search_feild_5);
			}
			$this->db->where('PRO.product_company_id',$sess_company);
			$this->db->where('PRO.product_type_id','1');
			$this->db->where('PRO.product_status','enable');
			$Count = $this->db->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			
			return $ret;
		}
	}
	
	//**BOM Group List**//
	public function get_bomgroup($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('BOMGRP.*,PRO.*')
							->from('bomgroup as BOMGRP')
							->join('processmaster as PRO', 'BOMGRP.processmaster_bomgroup_id = PRO.processmaster_id')
							->order_by($sort_order, $sort_by)
			     			->order_by('BOMGRP.bomgroup_id', 'DESC')
			     			->where('BOMGRP.bomgroup_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
							->from('bomgroup as BOMGRP')
							->join('processmaster as PRO', 'BOMGRP.processmaster_bomgroup_id = PRO.processmaster_id')
							->order_by($sort_order, $sort_by)
							->where('BOMGRP.bomgroup_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;	
		}
		else
		{
			$ret['rows'] = $this->db->select('BOMGRP.*,PRO.*')
							->from('bomgroup as BOMGRP')
							->join('processmaster as PRO', 'BOMGRP.processmaster_bomgroup_id = PRO.processmaster_id')
							->order_by($sort_order, $sort_by)
			     			->order_by('BOMGRP.bomgroup_id', 'DESC')
			     			->where('BOMGRP.bomgroup_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
		
			$Count = $this->db->select('count(*) as TotalRows')
							->from('bomgroup as BOMGRP')
							->join('processmaster as PRO', 'BOMGRP.processmaster_bomgroup_id = PRO.processmaster_id')
							->order_by($sort_order, $sort_by)
							->where('BOMGRP.bomgroup_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}	
	}
	
	
	//**BOM Group Validation **//
	
	public function bomgroup_vaildation($sess_company_id,$group_name)
	{
		
		$this->db->select('*')
				->from('bomgroup')
				->where('processmaster_bomgroup_id',$sess_company_id)
				->where('bomgroup_name',$group_name)
				//->or_where('bomgroup_stat',$status)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//** Add BOM Group **//
	
	public function add_bomgroup($pro_type)
	{
		$this->db->insert('bomgroup', $pro_type);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	//**bomgroup Validation for Update **//
	
	public function editbom_grp_validation($sess_company_id, $group_name)
	{
		$this->db->select('*');
		$this->db->from('bomgroup');
		//$this->db->where('construction_type_company_id',$sess_company_id);
		$this->db->where('bomgroup_name', $group_name);
		$this->db->or_where('bomgroup_stat'); 
		//$this->db->where_not_in('bomgroup_id', $id);
		$this->db->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	public function update_bomgroup($pro_typedtails,$id)
	{	
		$this->db->where('bomgroup_id', $id);
		$this->db->update('bomgroup', $pro_typedtails);
		return true;
	}
	//**Get Single BOM Group**//
	
	public function getsingle_bomgroup($id)
	{
		$this->db->select('BOMGRP.*, PRO.*');
		$this->db->from('bomgroup as BOMGRP');
		$this->db->join('processmaster as PRO', 'BOMGRP.processmaster_bomgroup_id = PRO.processmaster_id');
		$this->db->where('BOMGRP.bomgroup_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
		public function updatebomgroupstatus($pro_type_data, $id)
	{
		$this->db->where('processmaster_id', $id)
				 ->update('processmaster', $pro_type_data);
		return true;
	}
	
	public function get_all_processmaster()
	{
		$ret = $this->db->select('COM.processmaster_id,COM.processmaster_name')
					->from('processmaster as COM')
					->get()->result_array();
					
		return $ret;
	}
	public function get_all_bomcategory()
	{
		$ret = $this->db->select('COM.bom_category_id, COM.bom_category_name')
					->from('bom_category as COM')
			
					->get()->result_array();
		
		return $ret;
	}
	
	
	//** BOM Category**//
	public function get_bom_cat($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('*')
							->from('bom_category')
							->order_by($sort_order, $sort_by)
			     			->order_by('bom_category_id', 'DESC')
			     			->where('bom_category_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
			$Count = $this->db->select('count(*) as TotalRows')
							->from('bom_category')
							->order_by($sort_order, $sort_by)
							->where('bom_category_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			 
			return $ret;
   
		}
		else
		{
			$ret['rows'] = $this->db->select('*')
							->from('bom_category')
							->order_by($sort_order, $sort_by)
			     			->order_by('bom_category_id', 'DESC')
			     			->where('bom_category_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
	
		
			$Count = $this->db->select('count(*) as TotalRows')
							->from('bom_category')
							->order_by($sort_order, $sort_by)
							->where('bom_category_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}	
	}
	//** BOM Category  Validation **//
	
	public function bom_cat_vaildation($sess_company_id, $bom_category_name, $prefix)
	{
		$this->db->select('*')
				->from('bom_category')
				->where('bom_category_type_id',$sess_company_id)
				->where('bom_category_name',$bom_category_name)
				
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
		//** Add BOM Category **//
	
	public function add_bom_cat_type($pro_type)
	{
		$this->db->insert('bom_category', $pro_type);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	//** Edit BOM Category**//
	public function editbom_cat_vaildation($sess_company_id, $bom_category_name, $prefix, $id)
	{
		$this->db->select('*');
		$this->db->from('bom_category');
		$this->db->where('bom_category_type_id',$sess_company_id);
		$this->db->where('bom_category_name', $bom_category_name);
		
		$this->db->where_not_in('bom_category_id', $id);
		$this->db->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	
	//**Update BOM Category **//

	public function update_bom_cat($pro_typedtails,$id)
	{	
		$this->db->where('bom_category_id', $id);
		$this->db->update('bom_category', $pro_typedtails);
		return true;
	}
	//**Get Single BOM Category **//
	
	public function getsingle_bom_cat($id)
	{
		$this->db->select('BOMCAT.*,TYP.*');
		$this->db->from('bom_category as BOMCAT');
		$this->db->join('bom_category_type as TYP', 'BOMCAT.bom_category_type_id = TYP.bom_cat_type_id');
	 	$this->db->where('BOMCAT.bom_category_id', $id);
		$query = $this->db->get()->row();
		return $query;
	}
//** BOM Category Status **//
	
	public function updatebomcatstatus($pro_type_data, $id)
	{
		$this->db->where('bom_category_id', $id)
				 ->update('bom_category', $pro_type_data);
		return true;
	}
	//** BOM Group **//
	public function update_bom_status($pro_type_data, $id)
	{
		$this->db->where('bomgroup_id', $id)
				 ->update('bomgroup', $pro_type_data);
		return true;
	}
	//** Search BOM Category**//
	public function get_search_bomcat_type($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by)
	{
						$ret['rows'] = $this->db->select('*');
						$this->db->from('bom_category');
			     		$this->db->order_by('bom_category_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('bom_category_name' ,$search_pro_typ);
						}
						
						$this->db->where('bom_category_status','enable');
						$this->db->limit($limit,$page);
						$ret['rows'] =	 $this->db->get()->result_array();

						$this->db->select('count(*) as TotalRows');
						$this->db->from('bom_category');
			     		$this->db->order_by('bom_category_id', 'DESC');
						if($search_pro_typ != "")
						{
						$this->db->like('bom_category_name' ,$search_pro_typ);
						}
						
						$this->db->where('bom_category_status','enable');
						$Count = $this->db->get()->row();

				$ret['num_rows'] = $Count->TotalRows;
				return $ret;
	
	}
	
	public function get_all_bomcat_type()
	{
		$ret = $this->db->select('CATTYPE.*')
					->from('bom_category_type as CATTYPE')
					->get()->result_array();
					
		return $ret;
	}
	
public function get_store($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by)
	{
		if($sess_group == 1)
		{
			$ret['rows'] = $this->db->select('STOR.*,DIVIS.*,PTY.*')
							->from('store as STOR')
							->join('store_division as DIVIS','STOR.store_id = DIVIS.division_id')
							->join('products_type as PTY','PTY.products_type_id = STOR.store_category')
							->order_by($sort_order, $sort_by)
			     			->order_by('store_id', 'DESC')
			     			->where('store_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('store as STOR')
							->join('store_division as DIVIS','STOR.store_id = DIVIS.division_id')
							->join('products_type as PTY','PTY.products_type_id = STOR.store_category')
							->order_by($sort_order, $sort_by)
							->where('store_status', 'enable')
						 	->get()->row();

		}
		else

		{
			
			$ret['rows'] = $this->db->select('STOR.*,DIVIS.*,PTY.*')
							->from('store as STOR')
							->join('store_division as DIVIS','STOR.store_division = DIVIS.division_id')
							->join('products_type as PTY','PTY.products_type_id = STOR.store_category')
							->order_by($sort_order, $sort_by)
			     			->order_by('store_id', 'DESC')
			     			->where('store_status', 'enable')
							->limit($limit, $start)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('store as STOR')
							->join('store_division as DIVIS','STOR.store_division = DIVIS.division_id')
							->join('products_type as PTY','PTY.products_type_id = STOR.store_category')
							->order_by($sort_order, $sort_by)
							->where('store_status', 'enable')
						 	->get()->row();

			$ret['num_rows'] = $Count->TotalRows;
			return $ret;
		}	
	}
	public function store_vaildation($sess_company_id, $store_name)
	{
		$this->db->select('*')
				->from('store')
				//->where('product_type_company_id',$sess_company_id)
				->where('store_name',$store_name)
				//->or_where('products_type_prefix')
				->get();
		$num = $this->db->affected_rows();
		return $num;
	}
	public function add_store($pro_type)
	{
		$this->db->insert('store', $pro_type);
		$insert_id = $this->db->insert_id();
		return  $insert_id;	
	}
	public function get_all_store_div()
	{
		$ret = $this->db->select('COM.division_id,COM.division_name')
					->from('store_division as COM')
					->get()->result_array();
					
		return $ret;
	}
	
	public function update_store($pro_type,$id)
	{	
		$this->db->where('store_id', $id);
		$this->db->update('store', $pro_type);
		return true;
	}
	public function get_all_store()
	{
		$ret = $this->db->select('COM.division_id,COM.division_name')
					->from('store_division as COM')
					->get()->result_array();
					
		return $ret;
	}
	public function getsingle_store($id)
	{
		$this->db->select('LABOU.*,POS.*,PDT.products_type_id,PDT.products_type_name');
		$this->db->from('store as LABOU');
	    $this->db->join('store_division as POS','LABOU.store_division = POS.division_id');
		$this->db->join('products_type as PDT','LABOU.store_category = PDT.products_type_id');
	 	$this->db->where('store_id', $id);
		$query = $this->db->get()->row();
		
		//echo "<pre>"; print_r($query); exit;
		return $query;
	}
	
		
}
	

	
	
	
	
