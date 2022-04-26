<?php

Class Accountmodule extends CI_Model
{	
	
	public function getprefix($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;	
	}
	
	public function getlast_inv_rep_id()
	{
		
		$ret =  $this->db->select('invoice_receipt_number')
						->from('invoice_receipt')
						->order_by('invoice_receipt_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	
	public function get_inv_recp($limit,$start,$sort_order,$sort_by)
	{
	
		$ret['rows'] = $this->db->select('INV.*,CUS.OFCR_LST_NME,CUS.OFCR_FST_NME as customer_name,CUS.OFCR_USR_VALUE as customer_code,PY.payment_mode_name')
						->from('invoice_receipt as INV')
						->join('officer as CUS', 'CUS.OFCR_ID = INV.invoice_receipt_customer_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id')	
						->order_by($sort_order,$sort_by)
						->where('invoice_receipt_active_status' ,'active')
						->limit($limit, $start)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('invoice_receipt')
							 
							->where('invoice_receipt_active_status' ,'active')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 //echo $this->db->last_query();exit;
		return $ret;
	}
	
	public function search_get_inv_recp($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_inc_rcpt_no,$search_cus_name,$search_status,$from_date,$to_date)
	{

		if($sess_group == 1)
		{
			//echo "test";exit;
						$this->db->select('INV.*,CUS.OFCR_USR_VALUE as customer_code,CUS.OFCR_FST_NME as customer_name,CUS.OFCR_LST_NME,PY.payment_mode_name');
						$this->db->from('invoice_receipt as INV');
						$this->db->join('officer as CUS', 'CUS.OFCR_ID = INV.invoice_receipt_customer_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_inc_rcpt_no != '')
						{
							$this->db->like('INV.invoice_receipt_number',$search_inc_rcpt_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('INV.invoice_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							} 
							
						}
						 
						
						$this->db->where('INV.invoice_receipt_active_status','active');
						 
						$this->db->limit($limit,$page);
						 
						$ret['rows'] = $this->db->get()->result_array();
	 			 // echo $this->db->last_query();exit;
				
						$this->db->select('count(*) as TotalRows');
						$this->db->from('invoice_receipt as INV');
						$this->db->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_inc_rcpt_no != '')
						{
							$this->db->like('INV.invoice_receipt_number',$search_inc_rcpt_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('INV.invoice_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							} 
							
						}
						 
						
						$this->db->where('INV.invoice_receipt_active_status','active');
						 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
		}
		else
		{
				$this->db->select('INV.*,CUS.customer_code,CUS.customer_name,PY.payment_mode_name');
						$this->db->from('invoice_receipt as INV');
						$this->db->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_inc_rcpt_no != '')
						{
							$this->db->like('INV.invoice_receipt_number',$search_inc_rcpt_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('INV.invoice_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							} 
							
						}
						 
						
						$this->db->where('INV.invoice_receipt_active_status','active');
						 
						$this->db->limit($limit,$page);
						 
						$ret['rows'] = $this->db->get()->result_array();
	 			 // echo $this->db->last_query();exit;
				
						$this->db->select('count(*) as TotalRows');
						$this->db->from('invoice_receipt as INV');
						$this->db->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_inc_rcpt_no != '')
						{
							$this->db->like('INV.invoice_receipt_number',$search_inc_rcpt_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('INV.invoice_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('INV.invoice_receipt_date >=', $from_date);
							$this->db->where('INV.invoice_receipt_date <=', $to_date);
							} 
							
						}
						 
						
						$this->db->where('INV.invoice_receipt_active_status','active');
						 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;		
		}
		
	 	
	}
	
	public function getcustomerdetail_for_popup_grid()
	{
		$ret = $this->db->select('CUS.*')
					->from('officer as CUS')
					//->join('region as RG', 'RG.region_id = CUS.customer_region')
					->order_by('OFCR_ID', 'DESC')
					->where('OFCR_STAT','active')
					->limit(10)
					->get()->result_array();
		return $ret;
	}
	
		public function getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email)
	{
		$this->db->select('CUS.*');
		$this->db->from('officer as CUS');
		
		$this->db->where('CUS.OFCR_STAT','active');
		
		if($cus_code != "")
		{
			$this->db->like('CUS.OFCR_USR_VALUE',$cus_code);
		}
		if($cus_name != "")
		{
			$this->db->like('CUS.OFCR_FST_NME',$cus_name);
		}
		if($cus_mobile != "")
		{
			$this->db->like('CUS.OFCR_MOB',$cus_mobile);
		}
		if($cus_email != "")
		{
			$this->db->like('CUS.OFCR_USR_EMAIL',$cus_email);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}
	
	public function inv_recp_vaildation($so_customer_id)
	{
		$this->db->select('*')
				->from('officer')
				->where('OFCR_ID',$so_customer_id)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}

	/******** Add Invoice Report ***********/
	public function add_inv_recp_details($inv_recp_details)
	{
		$this->db->insert('invoice_receipt', $inv_recp_details);
		return true;	
		
	}

	/**********   Add Invoice Receipt Amount to Customer Accounts Debit Value ***********/

	public function get_cus_accounts($so_customer_id)
	{	
	
		$ret=$this->db->select('*')
				->from('customers_accounts')
				->where('customers_accounts_customer_id',$so_customer_id)
				->get()->row();
		
		return $ret;
	
	}

	public function update_so_customer_accounts_details($so_customer_accounts_details,$so_customer_id)
	{	
		$this->db->where('customers_accounts_customer_id', $so_customer_id);
		$this->db->update('customers_accounts', $so_customer_accounts_details);
		// echo $this->db->last_query(); exit;
		return  true;
	}

	public function add_so_customer_accounts_details($so_customer_accounts_details)
	{
		$this->db->insert('customers_accounts', $so_customer_accounts_details);
		return true;
	}
	
	
	public function update_inv_recp_status($inv_recpdata,$id)
	{
		$this->db->where('invoice_receipt_id', $id)
				->update('invoice_receipt', $inv_recpdata);
		
		return true;
	}

	
	public function getsingle_inv_recp($id)
	{
		$this->db->select('INV.*,CUS.OFCR_LST_NME,CUS.OFCR_FST_NME as customer_name,CUS.OFCR_USR_VALUE as customer_code,PY.payment_mode_name');
		$this->db->from('invoice_receipt as INV');
		$this->db->join('officer as CUS', 'CUS.OFCR_ID = INV.invoice_receipt_customer_id');
		$this->db->join('payment_mode as PY', 'PY.payment_mode_id = INV.invoice_receipt_payment_mode_id');
		$this->db->where('invoice_receipt_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	function update_inv_recp_details($inv_recp_details, $id)
	{	
		$this->db->where('invoice_receipt_id', $id);
		$this->db->update('invoice_receipt', $inv_recp_details);
		
		return true;
	}
	

	/***********  payment receipt model **********/


	public function get_pay_recp($limit,$start,$sort_order,$sort_by)
	{
	
		$ret['rows'] = $this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name')
						->from('payment_receipt as RECP')
						->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id')	
						->order_by($sort_order,$sort_by)
						->where('payment_receipt_active_status' ,'active')
						->limit($limit, $start)
						->get()->result_array();
	
		
		$Count = $this->db->select('count(*) as TotalRows')
							->from('payment_receipt')
							 
							->where('payment_receipt_active_status' ,'active')
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		 //echo $this->db->last_query();exit;
		return $ret;
	}
	
	public function search_get_pay_recp($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_pay_rcpt_no,$search_ven_name,$search_status,$from_date,$to_date)
	{
		
		/*$ret['rows'] = $this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name')
						->from('payment_receipt as RECP')
						->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id')	
						->order_by($sort_order,$sort_by)						->or_like('RECP.payment_receipt_number' ,$srarch_key)
						->or_like('VEN.vendor_name' ,$srarch_key)
						->or_like('VEN.vendor_code' ,$srarch_key)
						->or_like('RECP.payment_receipt_amount' ,$srarch_key)
						->or_like('PY.payment_mode_name' ,$srarch_key)
						->where('RECP.payment_receipt_active_status' ,'active')
						->limit($limit,$page)
						->get()->result_array();
	
				 //echo $this->db->last_query(); exit;

		$Count = $this->db->select('count(*) as TotalRows')
						->from('payment_receipt as RECP')
						->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id')	
						->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id')
						->or_like('RECP.payment_receipt_number' ,$srarch_key)
						->or_like('VEN.vendor_name' ,$srarch_key)
						->or_like('VEN.vendor_code' ,$srarch_key)
						->or_like('RECP.payment_receipt_amount' ,$srarch_key)
						->or_like('PY.payment_mode_name' ,$srarch_key)
						 ->where('RECP.payment_receipt_active_status' ,'active')	 
						 	->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		return $ret;*/
		
		if($sess_group == 1)
		{
			//echo "test";exit;
						$this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name');
						$this->db->from('payment_receipt as RECP');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_pay_rcpt_no != '')
						{
							$this->db->like('RECP.payment_receipt_number',$search_pay_rcpt_no);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name',$search_ven_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('RECP.payment_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							} 
							
						}
					
						$this->db->where('RECP.payment_receipt_active_status','active');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	 			// echo $this->db->last_query();exit;
				
						$this->db->select('count(*) as TotalRows');
						$this->db->from('payment_receipt as RECP');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_pay_rcpt_no != '')
						{
							$this->db->like('RECP.payment_receipt_number',$search_pay_rcpt_no);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name',$search_ven_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('RECP.payment_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							} 
							
						}
					
						$this->db->where('RECP.payment_receipt_active_status','active');												 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
		}
		else
		{
			$this->db->select('RECP.*,VEN.vendor_code,VEN.vendor_name,PY.payment_mode_name');
						$this->db->from('payment_receipt as RECP');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_pay_rcpt_no != '')
						{
							$this->db->like('RECP.payment_receipt_number',$search_pay_rcpt_no);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name',$search_ven_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('RECP.payment_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							} 
							
						}
					
						$this->db->where('RECP.payment_receipt_active_status','active');
						$this->db->limit($limit,$page);
						$ret['rows'] = $this->db->get()->result_array();
	 			// echo $this->db->last_query();exit;
				
						$this->db->select('count(*) as TotalRows');
						$this->db->from('payment_receipt as RECP');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id');
						$this->db->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id');	
						
			     		$this->db->order_by($sort_order, $sort_by);
						
						if($search_pay_rcpt_no != '')
						{
							$this->db->like('RECP.payment_receipt_number',$search_pay_rcpt_no);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name',$search_ven_name);
						}
					 
						if($search_status != '')
						{
							$this->db->like('RECP.payment_receipt_status',$search_status);
						}
						
						if($to_date != "1970-01-01" || $from_date != "1970-01-01" )

 						{	
						 	if($from_date != '' && $to_date == "1970-01-01")
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							}
							if($from_date == "1970-01-01"  && $to_date != '' )
							{
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							}
							if($to_date != "1970-01-01" && $from_date != "1970-01-01" )
							{
							$this->db->where('RECP.payment_receipt_date >=', $from_date);
							$this->db->where('RECP.payment_receipt_date <=', $to_date);
							} 
							
						}
					
						$this->db->where('RECP.payment_receipt_active_status','active');												 
						$Count = $this->db->get()->row();

					$ret['num_rows'] = $Count->TotalRows;
					return $ret;
					
		}
		
		
		
		
	}
	public function getprefix_pay_recp($module)
	{
		$this->db->select('prefix_name');
		$this->db->from('prefix');
		$this->db->where('prefix_module',$module);
		$ret = $this->db->get()->row();
		
		return $ret;
	}
	
	
	public function getlastid_pay_recp()
	{
		
		$ret =  $this->db->select('payment_receipt_number')
						->from('payment_receipt')
						->order_by('payment_receipt_id', 'DESC')
						->limit (1)
						->get()->row();
		
		return $ret;
	}
	
	
	public function getvendors_for_popup_grid()
	{
		
		$ret = $this->db->select('VEN.*,VENS.*')
				  ->from('vendors as VEN')
				  ->join('vendors_sub_details as VENS','VENS.ven_sub_det_ven_id = VEN.vendor_id')
				  ->order_by('vendor_id', 'DESC')
				  ->where('vendor_status' ,'enable')
				  ->get()->result_array();
	
		return $ret;
	}

	public function getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email)
	{
		$this->db->select('*');
		$this->db->from('vendors');
		$this->db->where('vendor_status','enable');
		if($vendor_code != "")
		{
			$this->db->like('vendor_code',$vendor_code);
		}
		if($vendor_name != "")
		{
			$this->db->like('vendor_name',$vendor_name);
		}
		if($ven_mobile != "")
		{
			$this->db->like('vendor_phone',$ven_mobile);
		}
		if($ven_email != "")
		{
			$this->db->like('vendor_email',$ven_email);
		}
		$ret = $this->db->get()->result_array();
		
		return $ret;
		
	}

	public function pay_recp_vaildation($vendor_name)
	{
		$this->db->select('*')
				->from('vendors')
				->where('vendor_name',$vendor_name)
				->get();
		$num = $this->db->affected_rows();

		return $num;
	
	}

	public function add_pay_recp_details($pay_recp_details)
	{
		$this->db->insert('payment_receipt', $pay_recp_details);
		return true;	
		
	}
	
	public function update_pay_recp_status($pay_recpdata,$id)
	{
		$this->db->where('payment_receipt_id', $id)
				->update('payment_receipt', $pay_recpdata);
		
		return true;
	}

	public function getsingle_pay_recp($id)
	{
		$this->db->select('RECP.*,VEN.*,PY.payment_mode_name');
		$this->db->from('payment_receipt as RECP');
		$this->db->join('vendors as VEN', 'VEN.vendor_id = RECP.payment_receipt_vendor_id');
		$this->db->join('payment_mode as PY', 'PY.payment_mode_id = RECP.payment_receipt_payment_mode_id');
		$this->db->where('payment_receipt_id', $id);
		$query = $this->db->get()->row();
	 	
		return $query;
	}
	
	function update_pay_recp_details($pay_recp_details, $id)
	{	
		$this->db->where('payment_receipt_id', $id);
		$this->db->update('payment_receipt', $pay_recp_details);
		
		return true;
	}
	
		
	public function ven_det($vendor_id)
	{
		$this ->db-> select('*');
		$this ->db-> from('vendors_accounts');
		$this ->db-> where('vendors_accounts_vendor_id',$vendor_id);
		$result = $this -> db -> get()->row();
		return $result;
	}
	
	public function ven_acc_update($ven_acc_data,$vendor_id)
	{
		$this->db->where('vendors_accounts_vendor_id', $vendor_id);
		$this->db->update('vendors_accounts', $ven_acc_data);
		
	}
	public function ven_acc_insert($ven_acc_data)
	{
	 
		$this->db->insert('vendors_accounts', $ven_acc_data);
		
	}
		
		
		
	public function add_po_vendor_accounts_details($po_vendor_accounts_details)
	{
		$this->db->insert('vendors_accounts', $po_vendor_accounts_details);
		return true;
	}
	
	public function update_po_vendor_accounts_details($po_vendor_accounts_details,$ven_id)
	{	
		$this->db->where('vendors_accounts_vendor_id', $ven_id);
		$this->db->update('vendors_accounts', $po_vendor_accounts_details);
		// echo $this->db->last_query(); exit;
		return  true;
	}
	
	
	
	//////////////// PAYMENT ADJUSTMENT/////////////////////////////
	
	
	
	public function get_invrecp_for_popup_grid()
	{
		$ret = $this->db->select('INV.*,CUS.customer_name')
					->from('invoice_receipt as INV')
					->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id')
					->order_by('invoice_receipt_id', 'DESC')
					->where('invoice_receipt_status','approved')
					->where('invoice_receipt_balance_amount >','0')
					->limit (10)
					->get()->result_array();
		return $ret;
	}
	
	public function get_so_invoice_detils($cus_id,$invrecp_id)
	{
		
		$receipt = $this->db->select('INV.invoice_receipt_customer_id, INV.invoice_receipt_balance_amount, CUS.customer_name')
					->from('invoice_receipt as INV')
					->where('INV.invoice_receipt_customer_id', $cus_id)
					->where('INV.invoice_receipt_id', $invrecp_id)
					->join('customers as CUS', 'CUS.customer_id = INV.invoice_receipt_customer_id')
					->get()->row();
					
		$invoice = $this->db->select('SI.sale_invoice_id, SI.sale_invoice_status, SI.sale_invoice_no,SI.sale_invoice_amount, PAYMENT.invoice_payment_paid_amount, PAYMENT.invoice_payment_due_amount')
					->from('invoice_payment_details as PAYMENT')
					->where('PAYMENT.invoice_payment_customer_id', $cus_id)
					->where('PAYMENT.invoice_payment_due_amount >', '0')
					->join('sale_invoice as SI', 'SI.sale_invoice_id = PAYMENT.invoice_payment_invoice_id')
					//->join('sale_invoice_total as SIT', 'SI.sale_invoice_id = SIT.sale_invoice_si_id')
					->get()->result_array();
		
		$ret['receipt'] = $receipt;
		$ret['invoice'] = $invoice;
	//echo "<pre>"; print_r($ret); exit;
		return $ret;
	}
	
	public function get_payrecp_for_popup_grid()
	{
		$ret = $this->db->select('PR.*,VEN.vendor_name')
					->from('payment_receipt as PR')
					->join('vendors as VEN', 'VEN.vendor_id = PR.payment_receipt_vendor_id')
					->order_by('payment_receipt_id', 'DESC')
					->where('payment_receipt_status','approved')
					->where('payment_receipt_balance_amount >','0')
					->limit (10)
					->get()->result_array();
		return $ret;
	}
	
	
	public function get_po_invoice_detils($ven_id,$payrecp_id)
	{
		
		$receipt = $this->db->select('INV.payment_receipt_vendor_id, INV.payment_receipt_balance_amount, VEN.vendor_name')
					->from('payment_receipt as INV')
					->where('INV.payment_receipt_vendor_id', $ven_id)
					->where('INV.payment_receipt_id', $payrecp_id)
					->join('vendors as VEN', 'VEN.vendor_id = INV.payment_receipt_vendor_id')
					->get()->row();
					
		$invoice = $this->db->select('PI.po_invoice_id,PI.po_invoice_number, PIT.po_invoice_grand_total, PIT.po_invoice_total_tds, PAYMENT.payment_payment_paid_amount, PAYMENT.payment_payment_due_amount')
					->from('payment_payment_details as PAYMENT')
					->where('PAYMENT.payment_payment_vendor_id', $ven_id)
					->where('PAYMENT.payment_payment_due_amount >', '0')
					->join('purchase_invoice as PI', 'PI.po_invoice_id = PAYMENT.payment_payment_invoice_id')
					->join('purchase_invoice_total as PIT', 'PI.po_invoice_id = PIT.po_invoice_total_invoice_id')
					->get()->result_array();
		
		$ret['receipt'] = $receipt;
		$ret['invoice'] = $invoice;
		
		return $ret;
	}
	
	
	public function add_pay_adj_ir_details($pay_adj_cus_details)
	{
		$this->db->insert('invoice_payment_adjustment', $pay_adj_cus_details);
		
		return true;
		
	}
	

	
	public function add_pay_adj_ir_pay_details($pay_adj_inv_items,$inv_id)
	{
		$this->db->select('*')
				->from('invoice_payment_details')
				->where('invoice_payment_invoice_id',$inv_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('invoice_payment_details', $pay_adj_inv_items);
		}
		{
			$this->db->where('invoice_payment_invoice_id', $inv_id);
			$this->db->update('invoice_payment_details', $pay_adj_inv_items);
		}
		
		return true;
	}
	
	public function update_sales_inv_pay_status($sales_invoice_payment_status,$inv_id)
	{	
		$this->db->where('sale_invoice_id', $inv_id)
				->update('sale_invoice', $sales_invoice_payment_status);
		
		return true;
	}
	
	
	
		
	public function add_pay_adj_pr_details($pay_adj_ven_details)
	{
		$this->db->insert('payment_payment_adjustment', $pay_adj_ven_details);
		return true;
	}
	
	
	public function add_pay_adj_pr_pay_details($pay_adj_inv_items,$inv_id)
	{
		$this->db->select('*')
				->from('payment_payment_details')
				->where('payment_payment_invoice_id',$inv_id)
				->get();
		$num = $this->db->affected_rows();
		if($num == 0)
		{
			$this->db->insert('payment_payment_details', $pay_adj_inv_items);
		}
		{
			$this->db->where('payment_payment_invoice_id', $inv_id);
			$this->db->update('payment_payment_details', $pay_adj_inv_items);
		}
		//echo $this->db->last_query(); exit;
		return true;
	
	
	
	}
	
	public function update_purchase_inv_pay_status($purchase_invoice_payment_status,$inv_id)
	{	
		$this->db->where('po_invoice_id', $inv_id)
				->update('purchase_invoice', $purchase_invoice_payment_status);
		
		return true;
	}
	
	public function get_alllocation()
	{
		$ret = $this->db->select('*')
					->from('location')
					->where('location_status', 'active')
					->get()->result_array();
		return $ret;
	}
	
	public function get_all_pay_mode()
	{
		$ret = $this->db->select('PM.payment_mode_id, PM.payment_mode_name')
					->from('payment_mode as PM')
					->get()->result_array();
		return $ret;
	}
	
	public function users_list($sess_group,$sess_company)
	{
		  if($sess_group == 1)
		  {
			  $ret = $this->db->select('USR.user_id, USR.user_company_id, USR.user_group_id, USR.user_code, USR.user_first_name, USR.user_last_name, USR.user_name, USR.user_phone, USR.user_email, UGRP.group_name')
						  ->from('users as USR')
						  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
						  ->where('USR.user_status' ,'enable')
						  ->where('USR.user_display_status','1')
						  ->get()->result_array(); 
		  }
		  else
		  {
			  $ret = $this->db->select('USR.user_id, USR.user_company_id, USR.user_group_id, USR.user_code, USR.user_first_name, USR.user_last_name, USR.user_name, USR.user_phone, USR.user_email, UGRP.group_name')
						  ->from('users as USR')
						  ->join('user_groups as UGRP', 'UGRP.group_id = USR.user_group_id')
						  ->where('USR.user_status' ,'enable')
						  ->where('USR.user_company_id', $sess_company)
						  ->where('USR.user_display_status','1')
						  ->get()->result_array();
	
		  }
		  return $ret;
	}
	
	public function update_invoice_receipt_balance($receipt_id,$receipt_balance)
	{
		$this->db->where('invoice_receipt_id', $receipt_id);
		$this->db->update('invoice_receipt', $receipt_balance);
		
		return true;
	}
	
	public function update_payment_receipt_balance($receipt_id,$receipt_balance)
	{
		$this->db->where('payment_receipt_id', $receipt_id);
		$this->db->update('payment_receipt', $receipt_balance);
		
		return true;
	}
	
	public function add_pay_adj_invoice_summary($pay_adj_invoice_summary)
	{
		$this->db->insert('invoice_receipt_summary', $pay_adj_invoice_summary);
		
		return true;
	}
	
	public function add_pay_adj_payment_summary($pay_adj_payment_summary)
	{
		$this->db->insert('payment_receipt_summary', $pay_adj_payment_summary);
		
		return true;
	}
	
	
	
	///////////////////////CREDIT NOTE////////////////////////////////
	
	public function get_credit_cus_grid($limit,$start,$sort_order,$sort_by)
	{
		//echo $sort_by;exit;
			$ret['rows'] = $this->db->select('CUSA.customer_accounts_credit as CREDIT, CUSA.customer_accounts_debit as DEBIT, CUSA.customer_accounts_id as ACCID, CUS.customer_name as PARTYNAME, CUS.customer_code as PARTYCODE, CUS.customer_id as PARTYID')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->order_by($sort_order,$sort_by)
						->limit($limit, $start)
						->get()->result_array();
			//echo $this->db->last_query(); exit;		
		$Count = $this->db->select('count(*) as TotalRows')
						->from('customers_accounts ')
						->get()->row();

		$ret['num_rows'] = $Count->TotalRows;
		  //echo "<pre>"; print_r($ret); exit;
		return $ret;
	}
	
	public function get_credit_cus_details()
	{
		//echo $sort_by;exit;
			$ret['rows'] = $this->db->select('CUSA.customer_accounts_credit, CUSA.customer_accounts_debit, CUSA.customer_accounts_id, CUS.customer_name, CUS.customer_code, CUS.customer_id')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->order_by('CUS.customer_id', 'ASC')
						->get()->result_array();
						
						$Count = $this->db->select('sum(customer_accounts_debit) as TotalDebit,sum(customer_accounts_credit) as TotalCredit')
						->from('customers_accounts ')
						->get()->row();

		$ret['debit_total'] = $Count->TotalDebit;
		$ret['credit_total'] = $Count->TotalCredit;
		return $ret;
	}
	
	
	
	public function search_credit_cus_grid($limit,$start,$sort_order,$sort_by,$search_cus_no,$search_cus_name,$search_status)
	{
		 
			 $this->db->select('CUSA.customer_accounts_credit as CREDIT, CUSA.customer_accounts_debit as DEBIT, CUSA.customer_accounts_id as ACCID, CUS.customer_name as PARTYNAME, CUS.customer_code as PARTYCODE, CUS.customer_id as PARTYID');
						$this->db->from('customers_accounts as CUSA');
						$this->db->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id');
						if($search_cus_no != '')
						{
							$this->db->like('CUS.customer_code',$search_cus_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
						if($search_status != '')
						{
							if($search_status == '10000')
							{
								$this->db->where('CUSA.customer_accounts_credit <=',$search_status);
							}
							if($search_status == '25000')
							{
								$this->db->where('CUSA.customer_accounts_credit >',"10000");
								$this->db->where('CUSA.customer_accounts_credit <=',"25000");
							}
							if($search_status == '50000')
							{
								$this->db->where('CUSA.customer_accounts_credit >',"25000");
								$this->db->where('CUSA.customer_accounts_credit <=',"50000");
							}
							if($search_status == '50001')
							{
								$this->db->where('CUSA.customer_accounts_credit >',"50001");
								 
							}
						}
						
						$this->db->order_by($sort_order,$sort_by);
						$this->db->limit($limit, $start);
					$ret['rows'] =	$this->db->get()->result_array();
						
			  //echo $this->db->last_query(); exit;		
				 	 $this->db->select('count(*) as TotalRows');
						$this->db->from('customers_accounts as CUSA');
						$this->db->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id');
						if($search_cus_no != '')
						{
							$this->db->like('CUS.customer_code',$search_cus_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
						if($search_status != '')
						{
							if($search_status == '10000')
							{
								$this->db->where('CUSA.customer_accounts_credit <=',$search_status);
							}
							if($search_status == '25000')
							{
								$this->db->where('CUSA.customer_accounts_credit >',"10000");
								$this->db->where('CUSA.customer_accounts_credit <=',"25000");
							}
							if($search_status == '50000')
							{
								$this->db->where('CUSA.customer_accounts_credit >',"25000");
								$this->db->where('CUSA.customer_accounts_credit <=',"50000");
							}
							if($search_status == '50001')
							{
								$this->db->where('CUSA.customer_accounts_credit >',"50001");
								 
							}
						}
						
						$this->db->limit($limit, $start);
					$Count =	$this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows; 
		   //echo "<pre>"; print_r($ret); exit;
		return $ret;
	}
	
	 
	 

	public function get_credit_cus_accounts_view($id)
	{
			$ret = $this->db->select('ACC.*,CUS.customer_name,CUS.customer_code,CUS.customer_id,USR.user_name')
						->from('accounts as ACC')
						->join('customers as CUS','CUS.customer_id = ACC.account_user_id')
						->join('users as USR','USR.user_id = ACC.account_created_by')
						->where('ACC.account_for','Customer')
						->where('ACC.account_type','credit')
						->where('ACC.account_user_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_credit_ven_accounts_view($id)
	{
			$ret = $this->db->select('ACC.*,VEN.vendor_name,VEN.vendor_code,VEN.vendor_id,USR.user_name')
						->from('accounts as ACC')
						->join('vendors as VEN','VEN.vendor_id = ACC.account_user_id')
						->join('users as USR','USR.user_id = ACC.account_created_by')
						->where('ACC.account_for','Vendor')
						->where('ACC.account_type','credit')
						->where('ACC.account_user_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_debit_cus_accounts_view($id)
	{
			$ret = $this->db->select('ACC.*,CUS.customer_name,CUS.customer_code,CUS.customer_id,USR.user_name')
						->from('accounts as ACC')
						->join('customers as CUS','CUS.customer_id = ACC.account_user_id')
						->join('users as USR','USR.user_id = ACC.account_created_by')
						->where('ACC.account_for','Customer')
						->where('ACC.account_type','debit')
						->where('ACC.account_user_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_debit_ven_accounts_view($id)
	{
			$ret = $this->db->select('ACC.*,VEN.vendor_name,VEN.vendor_code,VEN.vendor_id,USR.user_name')
						->from('accounts as ACC')
						->join('vendors as VEN','VEN.vendor_id = ACC.account_user_id')
						->join('users as USR','USR.user_id = ACC.account_created_by')
						->where('ACC.account_for','Vendor')
						->where('ACC.account_type','debit')
						->where('ACC.account_user_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_credit_cus_view($id)
	{
			$ret = $this->db->select('CUSA.*,INV.*,CUS.*,SI.sale_invoice_no')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->join('invoice_payment_details as INV', 'INV.invoice_payment_customer_id = CUSA.customers_accounts_customer_id')
						->join('sale_invoice as SI','SI.sale_invoice_id = INV.invoice_payment_invoice_id')
						->order_by('customer_accounts_id', 'DESC')
						->where('CUS.customer_id',$id)
						->get()->result_array();
			return $ret;
	}
	
	public function get_sales_return_credit_cus_view($id)
	{
			$ret = $this->db->select('CUSA.*,SRET.sales_return_code,SRET.sales_return_total_net_amount,SRET.sales_return_invoice_id,CUS.customer_id, CUS.customer_code, SINV.sale_invoice_id,SINV.sale_invoice_company_invoice_no')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->join('sales_return as SRET', 'SRET.sales_return_customer_id = CUSA.customers_accounts_customer_id')
						->join('sale_invoice as SINV', 'SINV.sale_invoice_id = SRET.sales_return_invoice_id')
						->order_by('customer_accounts_id', 'DESC')
						->where('CUS.customer_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_credit_cus($id)
	{
			$ret = $this->db->select('CUSA.*,CUS.*')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->order_by('customer_accounts_id', 'DESC')
						->where('CUS.customer_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_credit_ven_view($id)
	{
			$ret = $this->db->select('VENA.*,PPD.*,VEN.*,PI.po_invoice_number')
						->from('vendors_accounts as VENA')
						->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id')
						->join('payment_payment_details as PPD', 'PPD.payment_payment_vendor_id = VENA.vendors_accounts_vendor_id')
						->join('purchase_invoice as PI','PI.po_invoice_id = PPD.payment_payment_invoice_id')
						->order_by('vendors_accounts_id', 'DESC')
						->where('VEN.vendor_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_credit_ven($id)
	{
			$ret = $this->db->select('VENA.*,PPD.*,VEN.*,PI.po_invoice_number')
						->from('vendors_accounts as VENA')
						->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id')
							->join('payment_payment_details as PPD', 'PPD.payment_payment_vendor_id = VENA.vendors_accounts_vendor_id')
						->join('purchase_invoice as PI','PI.po_invoice_id = PPD.payment_payment_invoice_id')
						->order_by('vendors_accounts_id', 'DESC')
						->where('VEN.vendor_id',$id)
						->get()->result_array();
			return $ret;
	}



	public function get_debit_cus_view($id)
	{
			$ret = $this->db->select('CUSA.*,INV.*,CUS.*,SI.sale_invoice_no')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->join('invoice_payment_details as INV', 'INV.invoice_payment_customer_id = CUSA.customers_accounts_customer_id')
						->join('sale_invoice as SI','SI.sale_invoice_id = INV.invoice_payment_invoice_id')
						->order_by('customer_accounts_id', 'DESC')
						->where('CUS.customer_id',$id)
						->get()->result_array();
			return $ret;
	}

	public function get_debit_ven_view($id)
	{
			$ret = $this->db->select('VENA.*,PPD.*,VEN.*,PI.po_invoice_number')
						->from('vendors_accounts as VENA')
						->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id')
						->join('payment_payment_details as PPD', 'PPD.payment_payment_vendor_id = VENA.vendors_accounts_vendor_id')
						->join('purchase_invoice as PI','PI.po_invoice_id = PPD.payment_payment_invoice_id')
						->order_by('vendors_accounts_id', 'DESC')
						->where('VEN.vendor_id',$id)
						->get()->result_array();
			return $ret;
	}
	
	public function get_purchase_return_debit_ven_view($id)
	{
			$ret = $this->db->select('VENA.*,PRET.purchase_return_code,PRET.purchase_return_customer_id,PRET.purchase_return_invoice_id,PRET.purchase_return_total_net_amount,VEN.vendor_id,VEN.vendor_code,PI.po_invoice_number')
						->from('vendors_accounts as VENA')
						->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id')
						->join('purchase_return as PRET', 'PRET.purchase_return_customer_id = VENA.vendors_accounts_vendor_id')
						->join('purchase_invoice as PI','PI.po_invoice_id = PRET.purchase_return_invoice_id')
						->order_by('vendors_accounts_id', 'DESC')
						->where('VEN.vendor_id',$id)
						->get()->result_array();
			return $ret;
	}
	
	public function get_credit_ven_grid($limit,$start,$sort_order,$sort_by)
	{	
		$ret['rows'] = $this->db->select('VENA.vendors_accounts_credit as CREDIT, VENA.vendors_accounts_debit as DEBIT, VENA.vendors_accounts_id as ACCID, VEN.vendor_name as PARTYNAME, VEN.vendor_code as PARTYCODE, VEN.vendor_id as PARTYID')
						->from('vendors_accounts as VENA')
						->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id')
						 ->order_by($sort_order,$sort_by)
						->limit($limit, $start)
						->get()->result_array();
						
			$Count = $this->db->select('count(*) as TotalRows')
						->from('vendors_accounts as VENA')
						->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id')
						->get()->row();

		$ret['num_rows'] = $Count->TotalRows;			
						// echo "<pre>"; print_r($ret); exit;
			return $ret;
	}
	
	public function search_credit_ven_grid($limit,$start,$sort_order,$sort_by,$search_ven_no,$search_ven_name,$search_status)
	{	
		 $this->db->select('VENA.vendors_accounts_credit as CREDIT, VENA.vendors_accounts_debit as DEBIT, VENA.vendors_accounts_id as ACCID, VEN.vendor_name as PARTYNAME, VEN.vendor_code as PARTYCODE, VEN.vendor_id as PARTYID');
						$this->db->from('vendors_accounts as VENA');
						$this->db->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id');
						
						if($search_ven_no != '')
						{
							$this->db->like('VEN.vendor_code',$search_ven_no);
						}
						if($search_ven_name != '')
						{
							$this->db->like('VEN.vendor_name',$search_ven_name);
						}
						if($search_status != '')
						{
							if($search_status == '10000')
							{
								$this->db->where('VENA.vendors_accounts_credit <=',$search_status);
							}
							if($search_status == '25000')
							{
								$this->db->where('VENA.vendors_accounts_credit >',"10000");
								$this->db->where('VENA.vendors_accounts_credit <=',"25000");
							}
							if($search_status == '50000')
							{
								$this->db->where('VENA.vendors_accounts_credit >',"25000");
								$this->db->where('VENA.vendors_accounts_credit <=',"50000");
							}
							if($search_status == '50001')
							{
								$this->db->where('VENA.vendors_accounts_credit >',"50001");
								 
							}
						}
						$this->db ->order_by($sort_order,$sort_by);
						$this->db->limit($limit, $start);
						
			$ret['rows'] =	$this->db->get()->result_array();
		//echo $this->db->last_query(); exit;		
			 $this->db->select('count(*) as TotalRows');
			 $this->db->from('vendors_accounts as VENA');
			 $this->db->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id');
			 if($search_ven_no != '')
			 {
				$this->db->like('VEN.vendor_code',$search_ven_no);
			 }
			 if($search_ven_name != '')
			 {
			   $this->db->like('VEN.vendor_name',$search_ven_name);
			 }
			 $this->db ->order_by($sort_order,$sort_by);
			 $this->db->limit($limit, $start);
			 $Count =	$this->db->get()->row();

		    $ret['num_rows'] = $Count->TotalRows;			
			 //echo "<pre>"; print_r($ret); exit;
			return $ret;
	}


	public function getcustomerdetail_for_popup()
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

	public function add_credit($credit_data)
	{
		$this->db->insert('accounts', $credit_data);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
	}

	public function add_debit($debit_data)
	{
		$this->db->insert('accounts', $debit_data);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;
	}


	public function get_all_pay_adj()
	{
		$ret = $this->db->select('PA.*,VEN.*,LOC.*')
					->from('payment_payment_adjustment as PA')
					
					->join('location as LOC', 'LOC.location_id = PA.payment_pay_adj_location_id')
					->join('vendors as VEN', 'VEN.vendor_id = PA.payment_pay_adj_vendor_id')
					->get()->result_array();
		return $ret;
	}
	
	
	public function search_debit_cus_grid($limit,$start,$sort_order,$sort_by,$search_cus_no,$search_cus_name,$search_status)
	{
		 
			 $this->db->select('CUSA.customer_accounts_credit as CREDIT, CUSA.customer_accounts_debit as DEBIT, CUSA.customer_accounts_id as ACCID, CUS.customer_name as PARTYNAME, CUS.customer_code as PARTYCODE, CUS.customer_id as PARTYID');
						$this->db->from('customers_accounts as CUSA');
						$this->db->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id');
						if($search_cus_no != '')
						{
							$this->db->like('CUS.customer_code',$search_cus_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
						if($search_status != '')
						{
							if($search_status == '10000')
							{
								$this->db->where('CUSA.customer_accounts_debit <=',$search_status);
							}
							if($search_status == '25000')
							{
								$this->db->where('CUSA.customer_accounts_debit >',"10000");
								$this->db->where('CUSA.customer_accounts_debit <=',"25000");
							}
							if($search_status == '50000')
							{
								$this->db->where('CUSA.customer_accounts_debit >',"25000");
								$this->db->where('CUSA.customer_accounts_debit <=',"50000");
							}
							if($search_status == '50001')
							{
								$this->db->where('CUSA.customer_accounts_debit >',"50001");
								 
							}
						}
						
						$this->db->order_by($sort_order,$sort_by);
						$this->db->limit($limit, $start);
					$ret['rows'] =	$this->db->get()->result_array();
						
			  //echo $this->db->last_query(); exit;		
				 	 $this->db->select('count(*) as TotalRows');
						$this->db->from('customers_accounts as CUSA');
						$this->db->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id');
						if($search_cus_no != '')
						{
							$this->db->like('CUS.customer_code',$search_cus_no);
						}
						if($search_cus_name != '')
						{
							$this->db->like('CUS.customer_name',$search_cus_name);
						}
						if($search_status != '')
						{
							if($search_status == '10000')
							{
								$this->db->where('CUSA.customer_accounts_debit <=',$search_status);
							}
							if($search_status == '25000')
							{
								$this->db->where('CUSA.customer_accounts_debit >',"10000");
								$this->db->where('CUSA.customer_accounts_debit <=',"25000");
							}
							if($search_status == '50000')
							{
								$this->db->where('CUSA.customer_accounts_debit >',"25000");
								$this->db->where('CUSA.customer_accounts_debit <=',"50000");
							}
							if($search_status == '50001')
							{
								$this->db->where('CUSA.customer_accounts_debit >',"50001");
								 
							}
						}
						
						$this->db->limit($limit, $start);
					$Count =	$this->db->get()->row();

		$ret['num_rows'] = $Count->TotalRows; 
		   //echo "<pre>"; print_r($ret); exit;
		return $ret;
	}
	
	public function search_debit_ven_grid($limit,$start,$sort_order,$sort_by,$search_ven_no,$search_ven_name,$search_status)
	{
		 
		$this->db->select('VENA.vendors_accounts_credit as CREDIT, VENA.vendors_accounts_debit as DEBIT, VENA.vendors_accounts_id as ACCID, VEN.vendor_name as PARTYNAME, VEN.vendor_code as PARTYCODE, VEN.vendor_id as PARTYID');
		$this->db->from('vendors_accounts as VENA');
		$this->db->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id');
		
		if($search_ven_no != '')
		{
			$this->db->like('VEN.vendor_code',$search_ven_no);
		}
		if($search_ven_name != '')
		{
			$this->db->like('VEN.vendor_name',$search_ven_name);
		}
		if($search_status != '')
		{
			if($search_status == '10000')
			{
				$this->db->where('VENA.vendors_accounts_debit <=',$search_status);
			}
			if($search_status == '25000')
			{
				$this->db->where('VENA.vendors_accounts_debit >',"10000");
				$this->db->where('VENA.vendors_accounts_debit <=',"25000");
			}
			if($search_status == '50000')
			{
				$this->db->where('VENA.vendors_accounts_debit >',"25000");
				$this->db->where('VENA.vendors_accounts_debit <=',"50000");
			}
			if($search_status == '50001')
			{
				$this->db->where('VENA.vendors_accounts_debit >',"50001");
				 
			}
		}
		$this->db ->order_by($sort_order,$sort_by);
		$this->db->limit($limit, $start);
						
		$ret['rows'] =	$this->db->get()->result_array();
		//echo $this->db->last_query(); exit;
				
	   $this->db->select('count(*) as TotalRows');
	   $this->db->from('vendors_accounts as VENA');
	   $this->db->join('vendors as VEN', 'VEN.vendor_id = VENA.vendors_accounts_vendor_id');
	   if($search_ven_no != '')
	   {
		  $this->db->like('VEN.vendor_code',$search_ven_no);
	   }
	   if($search_ven_name != '')
	   {
		 $this->db->like('VEN.vendor_name',$search_ven_name);
	   }
	   if($search_status != '')
		{
			if($search_status == '10000')
			{
				$this->db->where('VENA.vendors_accounts_debit <=',$search_status);
			}
			if($search_status == '25000')
			{
				$this->db->where('VENA.vendors_accounts_debit >',"10000");
				$this->db->where('VENA.vendors_accounts_debit <=',"25000");
			}
			if($search_status == '50000')
			{
				$this->db->where('VENA.vendors_accounts_debit >',"25000");
				$this->db->where('VENA.vendors_accounts_debit <=',"50000");
			}
			if($search_status == '50001')
			{
				$this->db->where('VENA.vendors_accounts_debit >',"50001");
				 
			}
		}
	   $this->db ->order_by($sort_order,$sort_by);
	   $this->db->limit($limit, $start);
	   $Count =	$this->db->get()->row();
  
	  $ret['num_rows'] = $Count->TotalRows;			
	   //echo "<pre>"; print_r($ret); exit;
	  return $ret;
	}
	
	public function get_credit_inv_cus_view($id)
	{
		 $receipt = $this->db->select('INVR.*')
						->from('invoice_receipt_summary as INVR')
						->where('INVR.receipt_id',$id)
						//->where('INVR.amount !=','0.00')
						
						->get()->result_array();
						
						//echo "<pre>"; print_r($receipt); 
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

	public function get_pay_ven_view($id)
	{
		 $receipt = $this->db->select('PRS.*')
						->from('payment_receipt_summary as PRS')
						->where('PRS.receipt_id',$id)
						->where('PRS.amount !=','0.00')
						
						->get()->result_array();
						
					//	echo "<pre>"; print_r($receipt); exit;
		$result = array();$i=0;
		foreach($receipt as $REP)
		{	
		$amount = $this->db->select('PAY_DET.*,SI.po_invoice_number, CUS.vendor_name')
						->from('payment_payment_details as PAY_DET')
						->where('PAY_DET.payment_payment_invoice_id', $REP['invoice_id'])
						->join('purchase_invoice as SI', 'SI.po_invoice_id = PAY_DET.payment_payment_invoice_id')
						->join('vendors as CUS', 'CUS.vendor_id = PAY_DET.payment_payment_vendor_id')
						->get()->row();
						
			$result[$i]['receipt_summary_id'] = $REP['receipt_summary_id'];
			$result[$i]['receipt_id'] = $REP['receipt_id'];
			$result[$i]['invoice_id'] = $REP['invoice_id'];
			$result[$i]['amount'] = $REP['amount'];
			
			$result[$i]['payment_payment_invoice_amount'] = $amount->payment_payment_invoice_amount;
			$result[$i]['po_invoice_number'] = $amount->po_invoice_number;
			$result[$i]['payment_payment_paid_amount'] = $amount->payment_payment_paid_amount;
			$result[$i]['payment_payment_due_amount'] = $amount->payment_payment_due_amount;
			$result[$i]['payment_payment_adjusted_amount'] = $amount->payment_payment_adjusted_amount;
		
					
		$i++;
		} 	
		return $result;
		
			
	}

	
	///////////////////////////////////////////////////////////////////////////////
	

}
?>