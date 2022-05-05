<?php

Class Homemodule extends CI_Model
{

	function verifylogin($username,$password)
	{
		
		
		
		$this ->db-> select('*');
		$this ->db-> from('users');
		//$this ->db-> where('user_name',$username);
		
		if(is_numeric($username)) 
		{
			$this ->db-> or_where('user_phone',$username);
		}
		else
		{
			$this ->db-> where('user_name',$username);
		}
		
		$this ->db-> where('user_pwd', $password);
		$this ->db-> limit(1);
		$query = $this -> db -> get();
		$value = $query -> num_rows();

		return $value;
				
	}
	function getuserdetail($username,$password)
	{
		$this -> db -> select('USR.*, COMP.company_logo, COMP.company_tax, COMP.company_vat_display, COMP.company_cst_display, COMP.company_gst_display, COMP.company_service_display, COMP.company_excise_display');
		$this -> db -> from('users as USR');
		$this -> db -> where('USR.user_name', $username);
		$this ->db-> or_where('user_phone',$username);
		$this -> db -> where('USR.user_pwd', $password);
		$this -> db -> join('company as COMP','COMP.company_id = USR.user_company_id');
		
		$this -> db -> limit(1);
		$result = $this -> db -> get()->row();
		return $result;
	}

	public function chkvaliduser($username)
	{
		$this->db->select('*')
				->from('users')	
				->where('user_email', $username)
				->where('user_status', 'enable')
				->get();
		$ret= $this->db->affected_rows();
		//echo $this->db->last_query();exit;
		return $ret;		
					
	}

	public function strpwdstring($username, $randomString)
	{
		$data = array(
			'user_reset_pwd' => $randomString
		);
		
		$this->db->where('user_email', $username)
				->update('users', $data);
		
	}
	public function getrstpwddetails($username)
	{
		$ret=$this->db->select('*')
				  ->from('users')
				  ->where('user_email',$username)	
				  ->where('user_status','enable')
				  ->get()->row();
		
		return $ret;
	}


	public function checkUserForResetPwd($userId, $resetStr)
	{
		$this->db->select('*')
				->from('users')
				->where('user_id', $userId)
				->where('user_reset_pwd', $resetStr)
				->where('user_status', 'enable')
				->get();
		$num = $this->db->affected_rows();
		
		return $num;
	}
	public function ChangePassword($userId, $data)
	{
		$this->db->where('user_id', $userId)
				->update('users', $data);
		
		return true;
	}

	function get_client_ip() 
 	{	
	     $ipaddress = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		   else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(!empty($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(!empty($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(!empty($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED']; 
        else if(!empty($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
			
	}
	function insert_ip_details($data)
	{
		$query=	$this->db->insert('user_login_histroy', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	function insert_logout_details($sess_user,$ip_address, $values)
	{	
			$this->db->where ('login_histroy_user_id', $sess_user)
					->where('login_histroy_ip', $ip_address)
					->update('user_login_histroy', $values);
		$ret=$this->db->affected_rows();
		//echo $this->db->last_query(); exit;
		
		return $ret;						
			 
	}
	
	public function officer_count()
	{
			$this->db->select('*');
			$this->db->where('OFCR_ID !=1');
			$query = $this->db->get('officer');
			//->get()->result_array();
			$num = $query->num_rows();
		return $num;
	}
	
	public function vendor_count()
	{
			$this->db->select('*');
			$query = $this->db->get('vendors');
			//->get()->result_array();
			$num = $query->num_rows();
		return $num;
	}
	
	public function purchase_amount()
	{
			$this->db->select('sum(po_grand_total) as po_amount');
			$this->db->from('purchase_order_total');
			$query = $this->db->get()->result_array();
			//$num = $query->num_rows();
		return $query;
	}
	
	public function sales_amount()
	{
			$this->db->select('sum(so_grand_total) as so_amount');
			$this->db->from('sales_order_total');
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	public function cus_incentive()
	{
			$this->db->select('sum(USR_INCENTIVE_AMT) as TOTAL_INCENTIVE_AMT');
			$this->db->from('incentive_details');
			$this->db->where('OFCR_ID !=1');
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	public function comp_incentive()
	{
			$this->db->select('sum(USR_INCENTIVE_AMT) as COMP_INCENTIVE_AMT');
			$this->db->from('incentive_details');
			$this->db->where('OFCR_ID =1');
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	public function count_downline_user($sess_user)
	{
			$this->db->select('*');
			$this->db->from('officer as OFCR');
			$this->db->join('officer_tree as OFCR_TREE', 'OFCR.OFCR_USR_VALUE = OFCR_TREE.OFCR_TRE_SPNCR_ID');
			$this->db->where('OFCR.OFCR_ADD_USR_ID',$sess_user);
			$query = $this->db->get();
		$num = $query->num_rows();
		//echo $this->db->last_query(); exit;
		return $num;
	}
	
	public function downline_user_details($sess_user)
	{
			$this->db->select('OFCR1.OFCR_USR_VALUE,OFCR1.OFCR_MOB,OFCR1.OFCR_FST_NME,cty.CTY_NME');
			$this->db->from('officer as OFCR');
			$this->db->join('officer_tree as OFCR_TREE', 'OFCR.OFCR_USR_VALUE = OFCR_TREE.OFCR_TRE_SPNCR_ID');
			$this->db->join('officer as OFCR1', 'OFCR1.OFCR_USR_VALUE = OFCR_TREE.OFCR_TRE_USR_ID');
			$this->db->join('officer_bill as OFCR_BILL', 'OFCR_BILL.OFCR_BILL_OFCR_ID = OFCR1.OFCR_ID');
			$this->db->join('cty as cty', 'cty.CTY_ID = OFCR_BILL.OFCR_BILL_CTY');
			$this->db->where('OFCR.OFCR_ADD_USR_ID',$sess_user);
			$this->db->order_by('OFCR1.OFCR_ID','desc');
			$this->db->limit(5);
			$query = $this->db->get()->result_array();
			
		//echo $this->db->last_query(); exit;
		return $query;
	}
	
	public function user_details($sess_user)
	{
			$this->db->select('OFCR_USR_VALUE, OFCR_MOB, CONCAT(OFCR_FST_NME, " ", OFCR_LST_NME) AS OFCR_NAME', FALSE);
			$this->db->from('officer');
			$this->db->where('OFCR_ADD_USR_ID',$sess_user);
			$query = $this->db->get()->result_array();
			
		//echo $this->db->last_query(); exit;
		return $query;
	}
	
	public function self_purchase_amount_user($sess_user)
	{
			$this->db->select('sum(so_grand_total) as so_amount');
			$this->db->from('sales_order_total SO_TOT');
			$this->db->join('sales_order as SO', 'SO.sales_order_id = SO_TOT.so_total_sales_id');
			$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = SO.sales_order_customer_id');
			$this->db->where('OFCR.OFCR_ADD_USR_ID',$sess_user);
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	public function incentive_amount_user($sess_user)
	{
			$this->db->select('sum(USR_INCENTIVE_AMT) as TOTAL_INCENTIVE_AMT');
			$this->db->from('incentive_details as INCV');
			$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = INCV.OFCR_ID');
			$this->db->where('OFCR.OFCR_ADD_USR_ID',$sess_user);
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	public function redeem_amount_user($sess_user)
	{
			$this->db->select('sum(USR_REDEEM_AMT) as USR_REDEEM_AMT');
			$this->db->from('incentive_details as INCV');
			$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = INCV.OFCR_ID');
			$this->db->where('OFCR.OFCR_ADD_USR_ID',$sess_user);
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	
	public function wallet_amount_user($sess_user)
	{
			$this->db->select('sum(USR_INCENTIVE_AMT) as TOTAL_INCENTIVE_AMT, sum(USR_REDEEM_AMT) as USR_REDEEM_AMT');
			$this->db->from('incentive_details as INCV');
			$this->db->join('officer as OFCR', 'OFCR.OFCR_ID = INCV.OFCR_ID');
			$this->db->where('OFCR.OFCR_ADD_USR_ID',$sess_user);
			$query = $this->db->get()->result_array();
			//echo $this->db->last_query(); exit;
			//$num = $query->num_rows();
		return $query;
	}
	
	public function cus_credit()
	{
		$result = $this->db->select('CUSA.customer_accounts_credit as CREDIT, CUSA.customer_accounts_debit as DEBIT, CUSA.customer_accounts_id as ACCID, CUS.customer_name as PARTYNAME, CUS.customer_code as PARTYCODE, CUS.customer_id as PARTYID')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->order_by('CUSA.customer_accounts_credit','desc')
						->limit(5)
						->get()->result_array();
		return $result;
	}
	
	public function deb_credit()
	{
		$result = $this->db->select('CUSA.customer_accounts_credit as CREDIT, CUSA.customer_accounts_debit as DEBIT, CUSA.customer_accounts_id as ACCID, CUS.customer_name as PARTYNAME, CUS.customer_code as PARTYCODE, CUS.customer_id as PARTYID')
						->from('customers_accounts as CUSA')
						->join('customers as CUS', 'CUS.customer_id = CUSA.customers_accounts_customer_id')
						->order_by('CUSA.customer_accounts_debit','desc')
						->limit(5)
						->get()->result_array();
		return $result;
	}
	
	public function sale_invoice()
	{
	
	$result = $this->db->select('SI.*, TOT.*,CUS.customer_name')
								->from('sale_invoice as SI')
								->join('sale_invoice_total AS TOT','TOT.sale_invoice_si_id = SI.sale_invoice_id')
								->join('customers as CUS', 'CUS.customer_id = SI.sale_invoice_customer_id')

								->where('SI.sale_invoice_active_status','active')
								->where('SI.sale_invoice_status !=','returned')
								 ->order_by('SI.sale_invoice_id','desc')
								->limit(5)
								->get()->result_array();
		return $result;
								
	}
	
	
	public function purchase_invoice()
	{
		
		$result = $this->db->select('PIN.*,VEN.vendor_name,PINT.po_invoice_grand_total')
								->from('purchase_invoice as PIN')
								->join('vendors as VEN','VEN.vendor_id = PIN.po_invoice_vendor_id')
								->join('purchase_invoice_total as PINT','PINT.po_invoice_total_invoice_id = PIN.po_invoice_id')
								->where('PIN.po_invoice_active_status', 'active')
								 ->order_by('PIN.po_invoice_id','desc')
								->limit(5)
								->get()->result_array();

		return $result;
								
	}
	public function stock_details()
	{
		$result = $this->db->select('INV.*, U.*,PRO.*')
						->from('inventory as INV')
					 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
						->join('products as PRO', 'PRO.product_id = INV.inventory_item_id') 
			     		->order_by('INV.inventory_qty','desc')
						->limit(5)
						->get()->result_array();
	return $result;
	}
	
	public function stock_notifi()
	{
		$result = $this->db->select('INV.*, U.*,PRO.*')
						->from('inventory as INV')
					 	->join('uom as U', 'U.uom_id = INV.inventory_uom_id')
						->join('products as PRO', 'PRO.product_id = INV.inventory_item_id') 
						->where('INV.inventory_qty <=','50' )
			     		->order_by('INV.inventory_qty','desc')
						->limit(5)
						->get()->result_array();
	return $result;
	}
	
	public function invoice_notifi()
	{
			$result = $this->db->select('INV.*, SI.sale_invoice_no, SI.sale_invoice_id, SI.sale_invoice_date,CUS.customer_id,CUS.customer_code,CUS.customer_name,CUS.customer_credit_limit,CUS.cusotmer_credit_days')
						->from('invoice_payment_details as INV')
					 	->join('sale_invoice as SI', 'SI.sale_invoice_id = INV.invoice_payment_invoice_id')
						->join('customers as CUS', 'CUS.customer_id = INV.invoice_payment_customer_id')
						 
			     		->order_by('INV.invoice_payment_due_amount','desc')
						 ->get()->row();
	return $result;
		
	}
	public function meet_notifi()
	{
		$date=date("Y-m-d h:i:sa");
	    $s_date = date('Y-m-d h:i:sa', strtotime("+1 days"));
		$result = $this->db->select('LED.lead_id,LED.lead_first_name,LED.lead_last_name,LED.lead_mobile,LED.lead_primary_email,LED.lead_designation,LM.lead_met_id,LM.lead_met_subject,LM.lead_met_lead_id,LM.lead_met_assign_to,LM.lead_met_meeting_start_time,LM.lead_met_contact_number,LM.lead_met_meeting_status,LM.lead_met_priority,LM.lead_met_invite,LM.lead_met_location,LM.lead_met_notify,LM.lead_met_descript')
						->from('leads_meeting as LM')
					 	->join('leads as LED', 'LED.lead_id = LM.lead_met_lead_id')
					 	->where('LM.lead_met_meeting_start_time <=',$s_date)					 
			     		->order_by('LM.lead_met_id','desc')
						->get()->result_array();
			// echo $this->db->last_query();
	return $result;
		
	}
	
	
}	
?>