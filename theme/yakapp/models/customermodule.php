<?php

Class Customermodule extends CI_Model
{
	//** Get Customer Prefix **//
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	//** Get Customer Last Id **//
	
	public function getlastid()
	{
		$ret =  $this->db->select('customer_code')
						->from('customers')
						->order_by('customer_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	//** Get Price Book Details **//
	
	public function get_pricebook()
	{
		 $ret = $this->db->select('*')
					->from('price_book')
					->where('price_book_status' ,'active')
					->get()->result_array();
		return $ret;
	}
	
	//** Get Country **//
	
	public function get_country()
	{
		$this->db->select('*');
		$this->db->from('country');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	//** Get All State **//
	
	public function getAllState($con_id)
	{
		$ret =  $this->db->select('*')
						->from('state')
						->where('st_country_id', $con_id)
						->get()->result_array();
		return $ret;
	}
	
	//** Get All City **//
	
	public function getAllcity($con_id,$sta_id)
	{
		$ret =  $this->db->select('*')
						->from('city')
						->where('cty_country_id', $con_id)
						->where('cty_state_id', $sta_id)
						->get()->result_array();
		return $ret;
	}
	
	//** Get Customer Details For Grid View **//
	
	public function get_customer($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('customers as CUS')
							//->join('region as RG', 'RG.region_id = CUS.customer_region')
						//	->order_by('customer_id', 'DESC')
							->order_by($sort_order, $sort_by)
							->where('customer_status' ,'active')
							->limit($limit, $start)
							->get()->result_array();
							
							//echo  $this->db->last_query();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('customers')
							//->order_by('customer_id', 'DESC')
							->order_by($sort_order, $sort_by)
							->where('customer_status' ,'active')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
	//** Search Customer **//
	
	/* public function search_get_customer($limit,$start,$sort_order,$sort_by,$srarch_key)
	{
		$ret['rows'] = $this->db->select('CUS.*,RG.*')
							->from('customers as CUS')
							->join('region as RG', 'RG.region_id = CUS.customer_region')
							->like('CUS.customer_code',$srarch_key)
							->or_like('CUS.customer_name',$srarch_key)
							->or_like('CUS.customer_category',$srarch_key)
							->or_like('CUS.customer_email',$srarch_key)
							->or_like('CUS.customer_mobile',$srarch_key)
							->or_like('RG.region_name',$srarch_key)
							->where('CUS.customer_status','active')
							->order_by('CUS.customer_id', 'DESC')
							->limit($limit, $start)
							->get()->result_array();

		$Count = $this->db->select('count(*) as TotalRows')
							->from('customers as CUS')
							->where('CUS.customer_status' ,'active')
							->or_like('CUS.customer_code' ,$srarch_key)
							->or_like('CUS.customer_name' ,$srarch_key)
							->or_like('CUS.customer_category' ,$srarch_key)
							->or_like('CUS.customer_email' ,$srarch_key)
							->or_like('CUS.customer_mobile' ,$srarch_key)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	 */
	public function get_search_customers($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_feild_1,$search_feild_2,$search_feild_3,$search_feild_4,$search_feild_5)
	{
		if($sess_group == 1)
		{
						$this->db->select('CUS.*');
						$this->db->from('customers as CUS');
			     		$this->db->order_by('CUS.customer_id', 'DESC');
						if($search_feild_1 != '')
						{
							$this->db->like('CUS.customer_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('CUS.customer_name',$search_feild_2);
						}
						if($search_feild_3 != '')
						{
							$this->db->like('CUS.customer_mobile',$search_feild_3);
						}
						if($search_feild_4 != '')
						{
							$this->db->like('CUS.customer_email',$search_feild_4);
						}
						if($search_feild_5 != '')
						{
							$this->db->like('CUS.customer_category',$search_feild_5);
						}
						$this->db->where('CUS.customer_status','active');
						$this->db->order_by($sort_order, $sort_by);
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
						
						
  		  
						$this->db->select('count(*) as TotalRows');
						$this->db->from('customers as CUS');
						
						if($search_feild_1 != '')
						{
							$this->db->like('CUS.customer_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('CUS.customer_name',$search_feild_2);
						}
						if($search_feild_3 != '')
						{
							$this->db->like('CUS.customer_mobile',$search_feild_3);
						}
						if($search_feild_4 != '')
						{
							$this->db->like('CUS.customer_email',$search_feild_4);
						}
						if($search_feild_5 != '')
						{
							$this->db->like('CUS.customer_category',$search_feild_5);
						} 
						$this->db->order_by($sort_order, $sort_by);
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					
					//echo"<PRE>";print_R($ret);exit;
					return $ret;
		}
					else
					{
						$this->db->select('CUS.*,RG.*');
						$this->db->from('customers as CUS');
						$this->db->join('region as RG', 'RG.region_id = CUS.customer_region');
			     		$this->db->order_by('CUS.customer_id', 'DESC');
						if($search_feild_1 != '')
						{
							$this->db->like('CUS.customer_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('CUS.customer_name',$search_feild_2);
						}
						if($search_feild_3 != '')
						{
							$this->db->like('CUS.customer_mobile',$search_feild_3);
						}
						if($search_feild_4 != '')
						{
							$this->db->like('CUS.customer_email',$search_feild_4);
						}
						if($search_feild_5 != '')
						{
							$this->db->like('CUS.customer_category',$search_feild_5);
						}
						$this->db->order_by($sort_order, $sort_by);
						$this->db->where('CUS.customer_status','active');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	
				 

						$this->db->select('count(*) as TotalRows');
						$this->db->from('customers as CUS');
						if($search_feild_1 != '')
						{
							$this->db->like('CUS.customer_code',$search_feild_1);
						}
						if($search_feild_2 != '')
						{
							$this->db->like('CUS.customer_name',$search_feild_2);
						}
						if($search_feild_3 != '')
						{
							$this->db->like('CUS.customer_mobile',$search_feild_3);
						}
						if($search_feild_4 != '')
						{
							$this->db->like('CUS.customer_email',$search_feild_4);
						}
						if($search_feild_5 != '')
						{
							$this->db->like('CUS.customer_category',$search_feild_5);
						}
				
						$this->db->order_by($sort_order, $sort_by); 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
	
	
	
	//** Customer check validation **//
	
	public function valid_cus($customer_name, $customer_email)
	{
		$this->db->select('*')
				->from('customers')
				->where('customer_name',$customer_name)
				->or_where('customer_email',$customer_email)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Edit Customer check validation **//
	
	public function editvalid_cus($customer_email, $id)
	{
		$this->db->select('*')
				->from('customers')
				->where('customer_email',$customer_email)
				->where('customer_id !=',$id)
				->get();
		$num = $this->db->affected_rows();
		return $num;
	
	}
	
	//** Add Customer Details **//
	
	public function add_customer_details($cusData)
	{
		$this->db->insert('customers', $cusData);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	//** Add Customer Billing Details **//
	
	public function add_customer_bill_details($cus_billadd)
	{	
		$this->db->insert('customer_billing_address',$cus_billadd);
		return true;		
	}
	
	//** Add Customer Shipping Details **//
	
	public function add_customer_ship_details($cus_shipadd)
	{	
		$this->db->insert('customer_shipping_address',$cus_shipadd);
		return true;		
	}
	
	//** Get Region **//
	
	public function get_region()
	{
		$this->db->select('*');
		$this->db->from('region');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	//** Get zone **//
	
	public function get_zone()
	{
		$this->db->select('*');
		$this->db->from('zone');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	//** get Area **//
	
	public function get_area()
	{
		$this->db->select('*');
		$this->db->from('area');
 		$query = $this->db->get()->result_array();
	 	
		return $query;
	}
	
	//** Customer Status Change **//
	
	public function del_cus($cus_del,$id)
	{	
		$this->db->where('customer_id', $id)
				->update('customers', $cus_del);
		
		return true;
	}
	
	//** Get Single Customer data **//
	
	public function getSingle_cus($id)
	{
		$this->db->select('CUS.*,AR.*,CARR.*');
		$this->db->from('customers as CUS');
		$this->db->join('area as AR', 'AR.area_id = CUS.customer_area');
		$this->db->join('shipping_carrier as CARR', 'CARR.shipping_carrier_id = CUS.customer_transport');
	 	$this->db->where('CUS.customer_id', $id);
		
		
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Get Single Customer Billing data **//
	
	public function getSingle_cus_bill($id)
	{
		$this->db->select('CUS.*,CON.*,ST.*,CTY.*');
		$this->db->from('customer_billing_address as CUS');
	 	$this->db->where('CUS.customer_billing_customer_id', $id);
		$this->db->join('country as CON', 'CON.country_id = CUS.customer_billing_country_id');
		$this->db->join('state as ST', 'ST.state_id = CUS.customer_billing_state_id');	
		$this->db->join('city as CTY', 'CTY.city_id = CUS.customer_billing_city_id');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Get Single Customer Shipping data **//
	
	public function getSingle_cus_ship($id)
	{
		$this->db->select('CUS.*,CON.*,ST.*,CTY.*');
		$this->db->from('customer_shipping_address as CUS');
	 	$this->db->where('customer_shipping_customer_id', $id);
		$this->db->join('country as CON', 'CON.country_id = CUS.customer_shipping_country_id');
		$this->db->join('state as ST', 'ST.state_id = CUS.customer_shipping_state_id');	
		$this->db->join('city as CTY', 'CTY.city_id = CUS.customer_shipping_city_id');
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	//** Update Customer Details **//
	
	public function update_cus_details($cusData,$id)
	{	
		$this->db->where('customer_id', $id)
				->update('customers', $cusData);
		
		return true;
	}
	
	//** Update Customer Billing Details **//
	
	public function update_cusbill_details($CusBilldata , $id)
	{	
		$this->db->where('customer_billing_customer_id', $id)
				->update('customer_billing_address', $CusBilldata);
		
		return true;
	}
	
	//** Update Customer Shipping Details **//
	
	public function update_cusship_details($CusShipdata , $id)
	{	
		$this->db->where('customer_shipping_customer_id', $id)
				->update('customer_shipping_address', $CusShipdata);
		
		return true;
	}
	
	//** Get Customer Details For Pop-up **//
	
	public function getcustomerdetail_for_popup_grid()
	{
		$ret = $this->db->select('CUS.*,RG.region_name,ZO.zone_name,AR.area_name,CBA.*,CSA.*')
					->from('customers as CUS')
					->join('region as RG', 'RG.region_id = CUS.customer_region')
					->join('zone as ZO', 'ZO.zone_id = CUS.customer_zone')
					->join('area as AR', 'AR.area_id = CUS.customer_area')
					->join('customer_billing_address as CBA', 'CBA.customer_billing_customer_id = CUS.customer_id')
					->join('customer_shipping_address as CSA', 'CSA.customer_shipping_customer_id = CUS.customer_id')
					->order_by('customer_id', 'DESC')
					->where('customer_status','active')
					->limit(10)
					->get()->result_array();
		return $ret;
	}
	
	public function get_all_salesman()
	{
		$ret = $this->db->select('DES_USR.designation_user_id, DES_USR.designation_user_name, DES_USR.designation_user_email, DES_USR.designation_user_mobile')
				->from('designation_users as DES_USR')
				->join('designation as DES', 'DES.designation_id = DES_USR.designation_user_designation_id')
				->where('DES.designation_name','Sales Man')
				->where('DES_USR.designation_user_status','active')
				->get()->result_array();
				
		return $ret;
	}
	
	//** Add Employee Details **//
	
	public function add_employee_details($cusData)
	{
		$this->db->insert('employee_master', $cusData);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	
	//** Get Employee Last Id **//
	
	public function getlastempid()
	{
		$ret =  $this->db->select('emp_code')
						->from('employee_master')
						->order_by('emp_id', 'DESC')
						->limit (1)
						->get()->row();
		return $ret;
	}
	
	//** Get Employee Designation Type **//
	
	public function designation_type_val()
	{
		$ret =  $this->db->select('*')
						->from('employee_designation')
						->where('desig_id !=',1)
						->get()->result_array();
		return $ret;
	}
	
	//** Get Report Head Details **//
	
	public function getreport_head($emp_reporting)
	{
		$ret =  $this->db->select('*')
						->from('employee_master')
						->where('emp_reporting_id',$emp_reporting)
						->get()->result_array();
		return $ret;
	}
	
	//** Get Reporting Head Id **//
	
	public function reporting_head_val($con_id)
	{
		$ret =  $this->db->select('*')
						->from('employee_master')
						->where('emp_desig_id', $con_id)
						->get()->result_array();
		return $ret;
	}
	
	//** Get Employee Details For Grid View **//
	
	public function get_employee($limit,$start,$sort_order,$sort_by)
	{
		$ret['rows'] = $this->db->select('*')
							->from('employee_master as EM')
							->join('employee_designation as ED', 'EM.emp_desig_id = ED.desig_id')
							->order_by($sort_order, $sort_by)
							->limit($limit, $start)
							->get()->result_array();
	
		$Count = $this->db->select('count(*) as TotalRows')
							->from('employee_master')
							//->order_by('customer_id', 'DESC')
							->order_by($sort_order, $sort_by)
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;
	}
	
		//** Edit Single Employee Details **//
		
	public function getSingle_emp($id)
	{
		$this->db->select('*')
							->from('employee_master as EM')
							->join('employee_designation as ED', 'EM.emp_desig_id = ED.desig_id');
	 	$this->db->where('emp_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	
	//** Update Employee Details **//
	
	public function update_emp_details($cusData,$id)
	{	
		$this->db->where('emp_id', $id)
				->update('employee_master', $cusData);
		
		return true;
	}
	
	
	//****  Employee Search List ****//
	 
   public function get_search_emp($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$emp_name,$emp_code,$desig_type)
	{
		if($sess_group == 1)
		{
						$this->db->select('*')
						->from('employee_master as EM')
						->join('employee_designation as ED', 'EM.emp_desig_id = ED.desig_id');
						$this->db->order_by('emp_id', 'DESC');
						if($emp_name != '')
						{
							$this->db->like('emp_name',$emp_name);
						}
						if($emp_code != '')
						{
							$this->db->like('emp_code',$emp_code);
						}
						/*if($desig_type != '')
						{
							$this->db->like('desig_type',$desig_type);
						}*/
						
						$this->db->order_by($sort_order, $sort_by);
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
						
						
  		  
						$this->db->select('count(*) as TotalRows');
						$this->db->from('employee_master');
						
						if($emp_name != '')
						{
							$this->db->like('emp_name',$emp_name);
						}
						if($emp_code != '')
						{
							$this->db->like('emp_code',$emp_code);
						}
						
						$this->db->order_by($sort_order, $sort_by);
						$Count = $this->db->get()->row();
	
					$ret['num_rows'] = $Count->TotalRows;
					
					//echo"<PRE>";print_R($ret);exit;
					return $ret;
		}
					else
					{
						$this->db->select('*')
						->from('employee_master as EM')
						->join('employee_designation as ED', 'EM.emp_desig_id = ED.desig_id');
						$this->db->order_by('emp_id', 'DESC');
						if($emp_name != '')
						{
							$this->db->like('emp_name',$emp_name);
						}
						if($emp_code != '')
						{
							$this->db->like('emp_code',$emp_code);
						}
						if($desig_type != '')
						{
							$this->db->like('desig_type',$desig_type);
						}
						
						$this->db->order_by($sort_order, $sort_by);
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();	 

						$this->db->select('count(*) as TotalRows')
						->from('employee_master as EM')
						->join('employee_designation as ED', 'EM.emp_desig_id = ED.desig_id');
						$this->db->order_by('emp_id', 'DESC');
						if($emp_name != '')
						{
							$this->db->like('emp_name',$emp_name);
						}
						if($emp_code != '')
						{
							$this->db->like('emp_code',$emp_code);
						}
						if($desig_type != '')
						{
							$this->db->like('desig_type',$desig_type);
						}
										
						$this->db->order_by($sort_order, $sort_by); 
						$Count = $this->db->get()->row();
						

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					}
	}
}