<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorytype extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->helper(array('form', 'url'));
		  $this->load->library('form_validation');
		  $this->load->library('session');
		  $this->load->library('email');
		  $this->load->library('pagination');
		  $this->load->model('mastersmodule');
		  $this->load->model('locationmodel');
		  $this->load->model('categorytypemodule');
		  
		 $sessionData = $this->session->userdata('userlogin');
		 
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
		else
		{
			$userLogin = $this->session->userdata('userlogin');
			$type = $userLogin['group_id'];
			
			
			if($type)
			{
				$roles= $this->mastersmodule->getroletype($type);
				
				foreach ($roles as $ro) 
				{
					$module=$ro->module_id;
					
					if($module == '1'){
						$this->data['vendor']=$ro;
					}elseif ($module == '2') {
						$this->data['customer']=$ro;
					}elseif ($module == '3') {
						$this->data['materialrequest']=$ro;
					}elseif ($module == '4') {
						$this->data['vendorquote']=$ro;
					}elseif ($module == '5') {
						$this->data['salesquote']=$ro;
					}elseif ($module == '6') {
						$this->data['purchaseorder']=$ro;
					}elseif ($module == '7') {
						$this->data['purchaseindent']=$ro;
					}elseif ($module == '8') {
						$this->data['purchaseinvoice']=$ro;
					}elseif ($module == '9') {
						$this->data['salesorder']=$ro;
					}elseif ($module == '10') {
						$this->data['deliverychallan']=$ro;
					}elseif ($module == '11') {
						$this->data['pricebook']=$ro;
					}elseif ($module == '12') {
						$this->data['salesinvoice']=$ro;
					}elseif ($module == '13') {
						$this->data['openingstock']=$ro;
					}elseif ($module == '14') {
						$this->data['invoicereceipt']=$ro;
					}elseif ($module == '15') {
						$this->data['paymentreceipt']=$ro;
					}elseif ($module == '16') {
						$this->data['stockadjustment']=$ro;
					}elseif ($module == '17') {
						$this->data['creditnote']=$ro;
					}elseif ($module == '18') {
						$this->data['debitnote']=$ro;
					}elseif ($module == '19') {
						$this->data['stockwastages']=$ro;
					}elseif ($module == '20') {
						$this->data['salesreturn']=$ro;
					}elseif ($module == '21') {
						$this->data['mastermodule']=$ro;
					}elseif($module == '22'){
						$this->data['leads']=$ro;
					}elseif ($module == '23') {
						$this->data['organization']=$ro;
					}elseif ($module == '24') {
						$this->data['contacts']=$ro;
					}elseif ($module == '25') {
						$this->data['opportunity']=$ro;
					}elseif ($module == '26') {
						$this->data['paymentadjustments']=$ro;
					}elseif ($module == '27') {
						$this->data['reports']=$ro;
					}elseif ($module == '28') {
						$this->data['products']=$ro;
					}
					
				}
			}
		}	
	}
	
	public function index()
	{
		redirect('bomcategorytype');
	}
	
	//** BOM Category **//
	
		public function bomcategorytype($sort_order='bom_cat_type_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->categorytypemodule->get_bom_cat_type($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["pro_type"] = $Result['rows'];

		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('categorytype/bomcategorytype/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "BOM Category Type";
		$this->keywords = "BOM Category Type";
		$this->_render('pages/masters/categorytype/category_type_list');	
	}
	
	//** Add BOM Category **//
	
	public function addbomcategory()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['add_bom_cat_type']))
		{
			$bom_cat_type_id = $this->security->xss_clean($this->input->post('bom_cat_type_id'));
			$bom_cat_type_name = $this->security->xss_clean($this->input->post('bom_cat_type_name'));
			$cat_type_descname = $this->security->xss_clean($this->input->post('cat_type_descname'));
			$status = $this->security->xss_clean($this->input->post('status'));

			$pro_typ_val = $this->categorytypemodule->bom_cat_vaildation($sess_company_id, $bom_cat_type_name, $cat_type_descname);//** Product Type Validation **//
			if($pro_typ_val==0)
			{

				$pro_type=array(
					'bom_cat_type_id' =>$bom_cat_type_id,
					'bom_category_type_name'=>$bom_cat_type_name,
					'bom_category_type_desc'=>$cat_type_descname,
					'bom_category_type_stat'=>$status,
					'bom_category_type_created_by' =>$sess_user,
					'bom_category_type_modified_by' =>$sess_user,
					'bom_category_type_add_dt' => date ('Y-m-d h:i:s'),
					'bom_category_type_status' => 'enable',
					);
				$this->categorytypemodule->add_bom_cat_type($pro_type);	
				$this->session->set_flashdata('message', 'BOM Category Type Added Successfully');
				redirect('categorytype/bomcategorytype');
		    }
			else
			{
				$this->session->set_flashdata('message', 'BOM Category Type Already Exist');
				redirect('categorytype/bomcategorytype');
			}
		}
		else
		{
			$this->data["company_srt_name"] = $this->mastersmodule->get_all_company(); //** Get All Company's **//
			$this->title = "BOM Category";
			$this->keywords = "BOM Category";
			$this->_render('pages/masters/categorytype/add_bom_category');
		}
	}
	
	//** Edit BOM Category **//
	
	public function editbomcategory($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];
       
		if(isset($_POST['edit_bom_cat_type']))
		{	
			$bom_cat_type_id = $this->security->xss_clean($this->input->post('bom_cat_type_id'));
			$bom_cat_type_name = $this->security->xss_clean($this->input->post('bom_cat_type_name'));
			$cat_type_descname = $this->security->xss_clean($this->input->post('cat_type_descname'));
			$status = $this->security->xss_clean($this->input->post('status'));
			


			$pro_typ_val = $this->categorytypemodule->editbom_cat_vaildation($sess_company_id,$bom_cat_type_name,$id);//** Product Type Validation for Update **//
			if($pro_typ_val==0)
			{

				$pro_typedtails=array(
					'bom_cat_type_id' =>$id,
					'bom_category_type_name'=>$bom_cat_type_name,
					'bom_category_type_desc'=>$cat_type_descname,
					'bom_category_type_stat'=>$status,
					'bom_category_type_created_by' =>$sess_user,
					'bom_category_type_modified_by' =>$sess_user,
					'bom_category_type_update_dt' => date ('Y-m-d h:i:s'),
					'bom_category_type_status' => 'enable',
					);
					
					//echo "<pre>"; print_r($pro_typedtails); exit;
				$this->categorytypemodule->update_bom_cat($pro_typedtails ,$id);	
				$this->session->set_flashdata('message', 'BOM Category Type Updated Successfully');
				redirect('categorytype/bomcategorytype');
			}
			else
			{
				$this->session->set_flashdata('message', 'BOM Category Type Already Exist');
				redirect('categorytype/bomcategorytype');
			}
		}
		else
		{
		//$this->data["company_srt_name"] = $this->categorytypemodule->get_all_company(); //** Get All Company's **//
		$this->data['bomtypedata'] = $this->categorytypemodule->getsingle_bom_cat($id); //**Get Single Product Type **//
		//print_r($this->data['bomtypedata']); exit;
		$this->title = "Update BOM Category";
		$this->keywords = "Update BOM Category";
		$this->_render('pages/masters/categorytype/edit_bom_category');
		}
	}
	
	//** View BOM Category **//

	public function viewbomcategory($id)
	{
		$this->data['bomtypedata'] = $this->categorytypemodule->getsingle_bom_cat($id);//**Get Single Product Type **//
		//print_r($this->data['bomtypedata']); exit;
		$this->title = "BOM Category Type";
		$this->keywords = "BOM Category Type";
		$this->_render('pages/masters/categorytype/view_bom_category');
	}
	public function search_bomcategory_type($sort_order='bom_category_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		if(isset($_POST['search']))
		{
			$pro_typ = $this->security->xss_clean($this->input->post('search_pro_typ'));
			$pro_prefix = $this->security->xss_clean($this->input->post('search_pro_prefix'));
		
			$pro_type_search= array(
				'search_pro_typ' => $pro_typ,
				'search_pro_prefix' =>$pro_prefix,
				);	
			$this->session->set_userdata('pro_typ_data',$pro_type_search);
		}
			$search_data = $this->session->userdata('pro_typ_data');			
			$search_pro_typ = $search_data['search_pro_typ'];
			$search_pro_prefix = $search_data['search_pro_prefix'];
			
		  	$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  	$limit =10;
		  	$Result = $this->categorytypemodule->get_search_bomcat_type($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by);
		  	$this->data["pro_type"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('categorytype/search_constructiontype/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "BOM Category Type";
			$this->keywords = "BOM Category Type";
			$this->_render('pages/masters/categorytype/category_type_list');	
	}
	//** BOM Category Status **//

	public function bom_category_status($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if($status == 'enable')
		{
			$changeStatus = 'disable';
		}
		else
		{
			$changeStatus = 'enable';
		}
		
		$pro_type_data = array(
				  'bom_category_type_status' => $changeStatus,
				  'bom_category_type_modified_by' =>$sess_user,
				  'bom_category_type_update_dt' => date('Y-m-d h:i:s'),
			  );
		$this->categorytypemodule->updatebomcatstatus($pro_type_data, $id);
		$this->session->set_flashdata('message', 'BOM Category Type Changed Successfully');
		redirect('categorytype/bomcategorytype');
	}
	
	
}
