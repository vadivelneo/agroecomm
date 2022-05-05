<?php

Class LocationModel extends CI_Model
{	
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
  
	
		public function getAllState($con_id)
	{
		$ret =  $this->db->select('*')
						->from('state')
						->where('st_country_id', $con_id)
					//	->where('PRO_CAT_STAT', 'active')
						->get()->result_array();
		
		return $ret;
	}
	 	public function getAllcity($con_id,$sta_id)
	{
		$ret =  $this->db->select('*')
						->from('city')
						->where('cty_country_id', $con_id)
						->where('cty_state_id', $sta_id)
					//	->where('PRO_CAT_STAT', 'active')
						->get()->result_array();
		
		return $ret;
	}
	 
     	
     	
}

?>