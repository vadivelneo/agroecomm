<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masters extends MY_Controller {

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
		redirect('vendor');
	}
	
	//****   Search Unit of Measurment ****//
	
	public function search1_uom($srarch_key="",$sort_order='uom_id',$sort_by='desc')
	{
		if($srarch_key == "")
		{
			$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
		}
		  $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->get_search_uom($srarch_key,$limit,$page,$sort_order,$sort_by);
		  $this->data["uom_list"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/uom/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=6;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		
		$this->title = "Unit Of Materials";
		$this->keywords = "Unit Of Materials";
		$this->_render('pages/masters/uom/uom_list');
		
	}
	
	 public function search_uom($sort_order='uom_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_uom_name = $this->security->xss_clean($this->input->post('search_uom_name'));
			
			
		
			$req_search= array(
					'search_uom_name' => $search_uom_name,
					
					);	
			$this->session->set_userdata('req_search',$req_search);
		}	
			
			
			$search_data = $this->session->userdata('req_search');			
			$search_uom_name = $search_data['search_uom_name'];
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->get_search_uom($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_uom_name);
		 
		  $this->data["uom_list"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('masters/search_uom/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "Unit Of Materials";
		  $this->keywords = "Unit Of Materials";
		  $this->_render('pages/masters/uom/uom_list');
	}
	
	//****   Unit of Measurment List ****//
	
	public function uom($sort_order='uom_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_uom($limit,$page,$sort_order,$sort_by);
		$this->data["uom_list"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/uom/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		
		$this->title = "Unit Of Materials";
		$this->keywords = "Unit Of Materials";
		$this->_render('pages/masters/uom/uom_list');
	}
	
	//****   Add Unit of Measurment ****//
	
	public function adduom()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['uom_add_details']))
		{
		
			$uom_name = $this->security->xss_clean($this->input->post('uom_name'));
			$uom_desc = $this->security->xss_clean($this->input->post('uom_desc'));

			$uomval = $this->mastersmodule->uomvaildation($uom_name);  //**** Unit of Measurment Validation ****//
			if($uomval==0)
			{
			$uomdetails=array(
				'uom_name'=>$uom_name,
				'uom_descrption'=>$uom_desc,
				'uom_created_by'=>$sess_user,
				'uom_updated_by'=>$sess_user,
				'uom_add_date'=> date ('Y-m-d h:i:s'),
				);
			$this->mastersmodule->add_uom($uomdetails); //****   Add Unit of Measurment ****//
			$this->session->set_flashdata('message', 'UOM  Added Successfully');
			redirect('masters/uom');
			}
			else
			{
				$this->session->set_flashdata('message', 'UOM  Already Exist');
				redirect('masters/uom');
			}
		}
		else
		{
			$this->title = "Unit Of Materials";
			$this->keywords = "Unit Of Materials";
			$this->_render('pages/masters/uom/add_uom');
		}
		
	}
	
	//****   Edit Unit of Measurment ****//

	public function edituom($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['uom_edit_details']))
		{	
			$uom_name = $this->security->xss_clean($this->input->post('uom_name'));
			$uom_desc = $this->security->xss_clean($this->input->post('uom_desc'));
			$uomval = $this->mastersmodule->edituomvaildation($uom_name, $id); //**** Unit of Measurment Validation ****//
			if($uomval==0)
			{
				$uomdetails=array(
							'uom_name'=>$uom_name,
							'uom_descrption'=>$uom_desc,
							'uom_updated_by'=>$sess_user,
							'uom_update_date'=>date('Y-m-d h:i:s'),
							);

				$this->mastersmodule->update_uom($uomdetails ,$id);	//****   Edit Unit of Measurment ****//
				$this->session->set_flashdata('message', 'UOM Updated Successfully');
				redirect('masters/uom');
			}
			else
			{
				$this->session->set_flashdata('message', 'UOM Already Exist');
				redirect('masters/uom');
			}
		}
		else
		{
			$this->data['uomdata'] = $this->mastersmodule->getsingle_uom($id); //****   Get Single Unit of Measurment ****//
			$this->title = "UOM";
			$this->keywords = "UOM";
			$this->_render('pages/masters/uom/edit_uom');
		}
	}

	//****   Unit of Measurment Status ****//
	
	public function uomstatus($id,$status)
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
		
		$uomdata = array(
				  'uom_status' => $changeStatus,
				  'uom_updated_by'=>$sess_user,
				  'uom_update_date' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updateuomstatus($uomdata, $id); 
		$this->session->set_flashdata('message', 'UOM Status Changed Successfully');
		redirect('masters/uom');
	}

	//****  View Unit of Measurment ****//

	public function viewuom($id)
	{
		$this->data['uomdata'] = $this->mastersmodule->getsingle_uom($id);
		$this->title = "UOM";
		$this->keywords = "UOM";
		$this->_render('pages/masters/uom/view_uom');
	}
	
	//**** Search Product Type ****//
	
	public function search_producttype($sort_order='products_type_id',$sort_by='desc')
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
		  	$Result = $this->mastersmodule->get_search_pro_type($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by);
		  	$this->data["pro_type"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/search_producttype/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "Product Type";
			$this->keywords = "Product Type";
			$this->_render('pages/masters/producttype/product_type_list');	
	}
	
	//****  Product Type List ****//
	
	public function producttype($sort_order='products_type_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_pro_type($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["pro_type"] = $Result['rows'];

		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/producttype/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Product Type";
		$this->keywords = "Product Type";
		$this->_render('pages/masters/producttype/product_type_list');	
	}
	
//** Add Product Type **//
	
	public function addproducttype()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['add_pro_type']))
		{
			$product_type_company_id = $this->security->xss_clean($this->input->post('company'));
			$producttype_id = $this->security->xss_clean($this->input->post('producttype_id'));
			$product_type_code = $this->security->xss_clean($this->input->post('product_type_code'));
			$product_type_name = $this->security->xss_clean($this->input->post('product_type_name'));
			$prefix = $this->security->xss_clean($this->input->post('prefix'));
			$product_type_descname = $this->security->xss_clean($this->input->post('product_type_descname'));
			$product_type_stus = $this->security->xss_clean($this->input->post('product_type_stus'));

			//$pro_typ_val = $this->mastersmodule->pro_typ_vaildation($sess_company_id, $product_type_name, $prefix);//** Product Type Validation **//
			if($pro_typ_val==0)
			{

				$pro_type=array(
					'product_type_company_id' =>$product_type_company_id,
					'producttype_id' =>$producttype_id,
					'product_type_code' =>$product_type_code,
					'products_type_name'=>$product_type_name,
					'products_type_prefix'=>$prefix,
					'products_type_description'=>$product_type_descname,
					'product_type_stus'=>$product_type_stus,
					'products_type_created_by' =>$sess_user,
					'products_type_modified_by' =>$sess_user,
					'products_type_add_dt' => date ('Y-m-d h:i:s'),
					'products_type_status' => 'enable',
					);
					
					//echo "<pre>"; print_r($pro_type); exit;
				$this->mastersmodule->add_pro_type($pro_type);	
				$this->session->set_flashdata('message', 'Product Type Added Successfully');
				redirect('masters/producttype');
		    }
			else
			{
				$this->session->set_flashdata('message', 'Product Type Already Exist');
				redirect('masters/producttype');
			}
		}
		else
		{
			$this->data["company_srt_name"] = $this->mastersmodule->get_all_company(); //** Get All Company's **//
			$this->title = "Product Type";
			$this->keywords = "Product Type";
			$this->_render('pages/masters/producttype/add_product_type');
		}
	}
	
	//** Edit Product Type **//
	
	public function editproducttype($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['edit_pro_type']))
		{	
			$product_type_company_id = $this->security->xss_clean($this->input->post('company'));
			$product_type_name = $this->security->xss_clean($this->input->post('product_type_name'));
			$prefix = $this->security->xss_clean($this->input->post('prefix'));
			$product_type_descname = $this->security->xss_clean($this->input->post('product_type_descname'));
			$producttype_id = $this->security->xss_clean($this->input->post('producttype_id'));
			$product_type_code = $this->security->xss_clean($this->input->post('product_type_code'));
			$product_type_stus = $this->security->xss_clean($this->input->post('product_type_stus'));

			//$pro_typ_val = $this->mastersmodule->editpro_typ_vaildation($sess_company_id,$product_type_name, $prefix, $id);//** Product Type Validation for Update **//
			if($pro_typ_val==0)
			{

				$pro_typedtails=array(
					'products_type_id' =>$id,
					'product_type_company_id' =>$product_type_company_id,
					'producttype_id' =>$producttype_id,
					'product_type_code' =>$product_type_code,
					'product_type_stus' =>$product_type_stus,
					'products_type_name'=>$product_type_name,
					'products_type_prefix'=>$prefix,
					'products_type_description'=>$product_type_descname,
					'products_type_modified_by' =>$sess_user,
					'products_type_update_dt' => date('Y-m-d h:i:s'),
					);
					
					//echo "<pre>"; print_r($pro_typedtails); exit;
				$this->mastersmodule->update_pro_type($pro_typedtails ,$id);	
				$this->session->set_flashdata('message', 'Product Type Updated Successfully');
				redirect('masters/producttype');
			}
			else
			{
				$this->session->set_flashdata('message', 'Product Type Already Exist');
				redirect('masters/producttype');
			}
		}
		else
		{
		$this->data["company_srt_name"] = $this->mastersmodule->get_all_company(); //** Get All Company's **//
		$this->data['protypedata'] = $this->mastersmodule->getsingle_pro_type($id); //**Get Single Product Type **//
		$this->title = "Update Product Type";
		$this->keywords = "Update Product Type";
		$this->_render('pages/masters/producttype/edit_product_type');
		}
	}
	
	//** View Product Type **//

	public function viewproducttype($id)
	{
		$this->data['protypedata'] = $this->mastersmodule->getsingle_pro_type($id);//**Get Single Product Type **//
		$this->title = "Product Type";
		$this->keywords = "Product Type";
		$this->_render('pages/masters/producttype/view_product_type');
	}
	
	//** Product Type Status **//

	public function pro_type_status($id,$status)
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
				  'products_type_status' => $changeStatus,
				  'products_type_modified_by' =>$sess_user,
				  'products_type_update_dt' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updateprotypestatus($pro_type_data, $id);
		$this->session->set_flashdata('message', 'Product type Changed Successfully');
		redirect('masters/producttype');
	}
	
	//**  Search Product Group **//
	
	
	 public function search_productgroup($sort_order='products_group_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_name = $this->security->xss_clean($this->input->post('search_name'));
			
			
		
			$req_search_product_group= array(
					'search_name' => $search_name,
					
					);	
			$this->session->set_userdata('req_search_product_group',$req_search_product_group);
		}	
			
			
			$search_data = $this->session->userdata('req_search_product_group');			
			$search_name = $search_data['search_name'];
				
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->get_search_pro_group($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_name);
		 
		  $this->data["pro_group"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('masters/search_productgroup/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "Product Group";
		  $this->keywords = "Product Group";
		  $this->_render('pages/masters/productgroup/product_group_list');
	}
	
	
	//**  Product Group List **//
	
	public function productgroup($sort_order='products_group_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_pro_group($limit,$page,$sort_order,$sort_by);
		$this->data["pro_group"] = $Result['rows'];

		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='false';
		$config['last_link']='false';
		$config['base_url'] = site_url('masters/productgroup/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;

		$this->title = "Product Group";
		$this->keywords = "Product Group";
		$this->_render('pages/masters/productgroup/product_group_list');
	}
	
	//** Add Product Group **//
	
	public function addproductgroup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['add_pro_group']))
		{
			$products_group_name = $this->security->xss_clean($this->input->post('product_group_name'));
			$products_group_description = $this->security->xss_clean($this->input->post('description'));
			$material_type = $this->security->xss_clean($this->input->post('material_type'));
			$product_usageunit = $this->security->xss_clean($this->input->post('product_usageunit'));
			$status = $this->security->xss_clean($this->input->post('status'));

			$pro_gup_val = $this->mastersmodule->pro_gup_vaildation($products_group_name);//** Product Group Validation **//
			if($pro_gup_val==0)
			{
				$pro_group=array(
					'products_group_name'=>$products_group_name,
					'products_group_description'=>$products_group_description,
					'product_group_type_id'=>$material_type,
					'product_group_uom_id'=>$product_usageunit,
					'product_group_stat'=>$status,
					'products_group_created_by' =>$sess_user,
					'products_group_updated_by' =>$sess_user,
					'products_group_add_date' => date ('Y-m-d h:i:s'),
					);
					
				$this->mastersmodule->add_pro_group($pro_group);	
				$this->session->set_flashdata('message', 'Product Group Added Successfully');
				redirect('masters/productgroup');
			}
			else
			{
				$this->session->set_flashdata('message', 'Product Group Already Exist');
				redirect('masters/productgroup');
			}
		}
		else
		{
			$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//
			$this->data["product_uom"] = $this->mastersmodule->get_alluom(); //** Get All Unit of Measurememt Details **//
			$this->title = "Product Group";
			$this->keywords = "Product Group";
			$this->_render('pages/masters/productgroup/add_product_group');
		}
	}
	
	//** Edit Product Group **//
	
	public function editproductgroup($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['update_pro_group']))
		{	
			$products_group_name = $this->security->xss_clean($this->input->post('product_group_name'));
			$products_group_description = $this->security->xss_clean($this->input->post('description'));
			$material_type = $this->security->xss_clean($this->input->post('material_type'));
			$product_usageunit = $this->security->xss_clean($this->input->post('product_usageunit'));
			$status = $this->security->xss_clean($this->input->post('status'));

			$pro_gup_val = $this->mastersmodule->editpro_gup_vaildation($products_group_name, $id);//** Product Group Validation for Edit **//
			if($pro_gup_val==0)
			{
				$pro_groupdetails=array(
					'products_group_id'=>$id,
					'products_group_name'=>$products_group_name,
					'products_group_description'=>$products_group_description,
					'product_group_type_id'=>$material_type,
					'product_group_uom_id'=>$product_usageunit,
					'product_group_stat'=>$status,
					'products_group_updated_by' =>$sess_user,
					'products_group_update_date' => date ('Y-m-d h:i:s'),
					);
					//echo "<pre>"; print_r($pro_groupdetails); exit;
				$this->mastersmodule->update_pro_group($pro_groupdetails ,$id);	
				$this->session->set_flashdata('message', 'Product Group Updated Successfully');
				redirect('masters/productgroup');
			}
			else
			{
				$this->session->set_flashdata('message', 'Product Group Already Exist');
				redirect('masters/productgroup');	
			}
		}
		else
		{
			$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//
			$this->data["product_uom"] = $this->mastersmodule->get_alluom(); //** Get All Unit of Measurememt Details **//
			$this->data['progroupdata'] = $this->mastersmodule->getsingle_pro_group($id);//** Get Single Product Group **//
			$this->title = "Product Group";
			$this->keywords = "Product Group";
			$this->_render('pages/masters/productgroup/edit_product_group');
		}
	}

	//** View Product Group **//
	
	public function viewproductgroup($id)
	{
		$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//
		$this->data["product_uom"] = $this->mastersmodule->get_alluom(); //** Get All Unit of Measurememt Details **//
		$this->data['progroupdata'] = $this->mastersmodule->getsingle_pro_group($id);//** Get Single Product Group **//
		$this->title = "Product Group";
		$this->keywords = "Product Group";
		$this->_render('pages/masters/productgroup/view_product_group');
	}
	
	//** Search Store **//
	 
	public function search_store_list($sort_order='store_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			
			$search_store_code = $this->security->xss_clean($this->input->post('search_store_code'));
			$search_store_name = $this->security->xss_clean($this->input->post('search_store_name'));
			$search_pro_typ = $this->security->xss_clean($this->input->post('search_pro_typ'));
			
			$req_search_store= array(
					'search_store_code' => $search_store_code,
					'search_store_name' => $search_store_name,
					'search_pro_typ' => $search_pro_typ,
					
					);	
			$this->session->set_userdata('req_search_store',$req_search_store);
		}	
			
			$search_data = $this->session->userdata('req_search_store');			
			$search_store_code = $search_data['search_store_code'];
			$search_store_name = $search_data['search_store_name'];
			$search_pro_typ = $search_data['search_pro_typ'];
			
		  $start = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
				
		$Result = $this->mastersmodule->search_store_list($sess_group,$sess_company,$limit,$start,$sort_order,$sort_by,$search_store_code,$search_store_name,$search_pro_typ);
		$this->data["pro_type"] = $Result['rows'];
		$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//	
		 
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/store_list/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Store";
		$this->keywords = "Store";
		$this->_render('pages/masters/store/store_list');	
	}
	
	
	public function store_list($sort_order='store_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_store($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["pro_type"] = $Result['rows'];
		$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//	
       
	  // echo "<pre>"; print_r($Result); exit;
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/store_list/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Store";
		$this->keywords = "Store";
		$this->_render('pages/masters/store/store_list');	
	}

	///Add Store///	
   
   public function addstore()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];
		
		/* $code = $this->mastersmodule->getlastid_store();
		
		if(!empty($code))
		{
			$lastVendorCode = $code->store_store_id;
			
			
			$strSplit = str_split($lastVendorCode);
			$vendorLastdigit = $strSplit[0];
			
			$explode = explode($vendorLastdigit,$lastVendorCode);
			$vendorLastnumber = $explode[1];
			
			if($vendorLastdigit == $vendorLastdigit)
			{
				$vendorcode = $vendorLastnumber+1;
				
				$digits = sprintf ('%03d', $vendorcode);
				$vendorcodewithPrefix = $vendorLastdigit.$digits;
			}
			else
			{
				$vendorcodewithPrefix = $vendorPrefix.'1001';
			}
		}
		else
		{
			$vendorcodewithPrefix = $vendorPrefix.'1001';
		}
		
		$this->data['vendorCode'] = $vendorcodewithPrefix;
		
			
		$randomstring = $vendorcodewithPrefix; */
		//echo "<pre>"; print_r($randomstring); exit;
		

		if(isset($_POST['add_store']))
		{
			$store_id = $this->security->xss_clean($this->input->post('store_id'));
			$store_store_id = $this->security->xss_clean($this->input->post('store_store_id'));
			$store_code = $this->security->xss_clean($this->input->post('store_code'));
			$store_name = $this->security->xss_clean($this->input->post('store_name'));
			//$store_category = $this->security->xss_clean($this->input->post('store_category'));
			$store_division = $this->security->xss_clean($this->input->post('store_division'));
			$store_add_status = $this->security->xss_clean($this->input->post('store_add_status'));
			$store_description = $this->security->xss_clean($this->input->post('store_description'));
            $store_category = implode(",", $this->security->xss_clean($this->input->post('store_category')));
			$pro_typ_val = $this->mastersmodule->store_vaildation($sess_company_id, $store_name);//** Product Type Validation **//
			if($pro_typ_val==0)
			{

				$pro_type=array(
					'store_id' =>$store_id,
					'store_store_id' =>$store_store_id,
					'store_code'=>$store_code,
					'store_name'=>$store_name,
					'store_category'=>$store_category,
					'store_division' =>$store_division,
					'store_add_status' =>$store_add_status,
					'store_description' =>$store_description,
					'store_created_by' =>$sess_user,
					'store_modified_by' =>$sess_user,
					'store_add_dt' => date ('Y-m-d h:i:s'),
					'store_status' => 'enable',
					);
					
					//echo "<pre>"; print_r($pro_type); exit;
				$this->mastersmodule->add_store($pro_type);	
				$this->session->set_flashdata('message', 'Store Added Successfully');
				redirect('masters/store_list');
		    }
			else
			{
				$this->session->set_flashdata('message', 'Store Already Exist');
				redirect('masters/store_list');
			}
		}
		else
		{
			$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//
			$this->data['store'] = $this->mastersmodule->get_all_store_div();
			$this->data["company_srt_name"] = $this->mastersmodule->get_all_company(); //** Get All Company's **//
			$this->title = "Store";
			$this->keywords = "Store";
			$this->_render('pages/masters/store/add_store');
		}
	}
	
	
	
	public function editstore($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['edit_store']))
		{	
			$store_id = $this->security->xss_clean($this->input->post('store_id'));
			$store_store_id = $this->security->xss_clean($this->input->post('store_store_id'));
			$store_code = $this->security->xss_clean($this->input->post('store_code'));
			$store_name = $this->security->xss_clean($this->input->post('store_name'));
			 $store_category = implode(",", $this->security->xss_clean($this->input->post('store_category')));
			$store_division = $this->security->xss_clean($this->input->post('store_division'));
			$store_add_status = $this->security->xss_clean($this->input->post('store_add_status'));
			$store_description = $this->security->xss_clean($this->input->post('store_description'));

			

				$pro_type=array(
					'store_id' =>$id,
					'store_store_id' =>$store_store_id,
					'store_code'=>$store_code,
					'store_name'=>$store_name,
					'store_category'=>$store_category,
					'store_division' =>$store_division,
					'store_add_status' =>$store_add_status,
					'store_description' =>$store_description,
					'store_created_by' =>$sess_user,
					'store_modified_by' =>$sess_user,
					'store_update_dt' => date ('Y-m-d h:i:s'),
					'store_status' => 'enable',
					);
					
					//echo "<pre>"; print_r($pro_type); exit;
				$this->mastersmodule->update_store($pro_type,$id);	
				$this->session->set_flashdata('message', 'Store Updated Successfully');
				redirect('masters/store_list');
			
			
		}
		else
		{
		$this->data['store'] = $this->mastersmodule->get_all_store_div();
		$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//	
		$this->data["division"] = $this->mastersmodule->get_all_store(); //** Get All Company's **//
		$this->data['store'] = $this->mastersmodule->getsingle_store($id); //**Get Single Product Type **//
		$this->title = "Store";
		$this->keywords = "Store";
		$this->_render('pages/masters/store/edit_store');
		}
	}
	
	public function viewstore($id)
	{
		
		$this->data["product_type"] = $this->mastersmodule->get_allproducttypes(); //** Get All Product Types **//
		$this->data["division"] = $this->mastersmodule->get_all_store(); //** Get All Company's **//
		$this->data['store'] = $this->mastersmodule->getsingle_store($id); //**Get Single Product Type **//
		$this->title = "Store";
		$this->keywords = "Store";
		$this->_render('pages/masters/store/view_store');
	}
	
	public function storestatus($id,$status)
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
		
		$store_data = array(
				  'store_status' => $changeStatus,
				  'store_created_by' =>$sess_user,
				  'store_update_dt' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updatestorestatus($store_data, $id);
		$this->session->set_flashdata('message', 'Store Deleted Successfully');
		redirect('masters/store_list');
	}

	//** Product Group Status **//
	
	public function pro_group_status($id,$status)
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
		
		$pro_group_data = array(
				  'products_group_status' => $changeStatus,
				  'products_group_updated_by' =>$sess_user,
				  'products_group_update_date' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updateprogroupstatus($pro_group_data, $id);
		$this->session->set_flashdata('message', 'UOM Status Changed Successfully');
		redirect('masters/productgroup');
	}
	
	//** Search Country **//
	
	public function search_country($sort_order='country_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_cont_name = $this->security->xss_clean($this->input->post('search_cont_name'));
			$search_cont_code = $this->security->xss_clean($this->input->post('search_cont_code'));
			
			
		
			$req_search_cont= array(
					'search_cont_name' => $search_cont_name,
					'search_cont_code' => $search_cont_code,
					
					);	
			$this->session->set_userdata('req_search_cont',$req_search_cont);
		}	
			
			
			$search_data = $this->session->userdata('req_search_cont');			
			$search_cont_name = $search_data['search_cont_name'];
			$search_cont_code = $search_data['search_cont_code'];
				
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->search_country_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_cont_name,$search_cont_code);
		 
		  $this->data["con_list"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('masters/search_country/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "Country";
		  $this->keywords = "Country";
		  $this->_render('pages/masters/location/con_list');
	}
	//** Country List **//
	
	public function country($sort_order='country_id',$sort_by='desc')
	  {	
			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;	
			$Result=$this->mastersmodule->country_list($limit,$page,$sort_order,$sort_by);
			$this->data["con_list"] = $Result['rows'];	
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/country/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
			$this->title = "Country";
			$this->keywords = "Country";
			$this->_render('pages/masters/location/con_list');
	  }
	
	//** Add Country **//
	
	public function addcountry()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['contry_add']))
		{
				$con_name = $this->input->post('con_name');
				$c_code  =$this->input->post('con_code');
				
				$countryval = $this->mastersmodule->countryvaildation($con_name);//** Country Validation **//
				if($countryval==0)
				{
					$country_data = array(
						'country_name' => $con_name,
						'country_code' => $c_code,
						'country_created_by' =>$sess_user,
						'country_modified_by' =>$sess_user,
						'country_status' => 'enable',
						'country_add_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->add_country($country_data);
					$this->session->set_flashdata('message', 'Country Added Successfully');
				redirect('masters/country');
				}
				else
				{
					$this->session->set_flashdata('message', 'Country Name Already Exist');
					redirect('masters/country');
				}			 
		}
		else
		{
			  $this->title = "ERP - New Country";
			  $this->keywords = "ERP";
			  $this->_render('pages/masters/location/add_cont');
		}
	}
	
	//** Edit Country **//
	
	public function editcountry($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['contry_udate']))
		{
				$con_name = $this->input->post('con_name');
				$c_code  =$this->input->post('con_code');

				$countryval = $this->mastersmodule->editcountryvaildation($con_name, $id);//** Country Validation for edit **//
				if($countryval==0)
				{
					$country_data = array(
						'country_name' => $con_name,
						'country_code' => $c_code,
						'country_modified_by' =>$sess_user,
						'country_update_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->Updatecountry($id,$country_data);
					$this->session->set_flashdata('message', 'Country Update Successfully');
				redirect('masters/country');
				}
				else
				{
					$this->session->set_flashdata('message', 'Country Name Already Exist');
					redirect('masters/country');
				}			 
		}
		else
		{
			  $this->data['ctry'] = $this->mastersmodule->get_singlecountry($id);//** Get Single Country **//
			  $this->title = "ERP - New Country";
			  $this->keywords = "ERP";
			  $this->_render('pages/masters/location/edit_cont');
		}
	}
	
	//** View Country **//
	
	public function viewcountry($id)
	{
		  $this->data['ctry'] = $this->mastersmodule->get_singlecountry($id);//** Get Single Country **//
		  $this->title = "ERP - New Country";
		  $this->keywords = "ERP";
		  $this->_render('pages/masters/location/view_cont');		
	}
	
	//** Country Status **//
	
	public function country_status($id,$status)
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
		
		$data = array(
						'country_status' => $changeStatus,
						'country_modified_by' =>$sess_user,
						'country_update_date' => date('Y-m-d h:i:s'),
					);
					
		$this->mastersmodule->Updatecont_Status($id,$data);
		$this->session->set_flashdata('message', 'Country Status Changed Successfully');
		redirect('masters/country');
	}
	
	//** Search State **//
	 
	public function search_state($sort_order='state_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_country_name = $this->security->xss_clean($this->input->post('search_country_name'));
			$search_state_name = $this->security->xss_clean($this->input->post('search_state_name'));
			$search_state_code = $this->security->xss_clean($this->input->post('search_state_code'));
			
			
		
			$req_search_state= array(
					'search_country_name' => $search_country_name,
					'search_state_name' => $search_state_name,
					'search_state_code' => $search_state_code,
					
					);	
			$this->session->set_userdata('req_search_state',$req_search_state);
		}	
			
			
			$search_data = $this->session->userdata('req_search_state');			
			$search_country_name = $search_data['search_country_name'];
			$search_state_name = $search_data['search_state_name'];
			$search_state_code = $search_data['search_state_code'];
				
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->search_state_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_country_name,$search_state_name,$search_state_code);
		 
		  $this->data["state"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('masters/search_state/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "YAK ERP - STATE";
		  $this->keywords = "YAK ERP";
		  $this->_render('pages/masters/location/state_list');
	}
	
	//** State List **//
	
	public function state($sort_order='state_id',$sort_by='desc')
	{
		    $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result=$this->mastersmodule->state_list($limit,$page,$sort_order,$sort_by);
		    $this->data["state"] = $Result['rows'];	
		   
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='false';
			$config['last_link']='false';
			$config['base_url'] = site_url('masters/state/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by; 
	  		
		    $this->title = "YAK ERP - STATE";
		    $this->keywords = "YAK ERP";
		    $this->_render('pages/masters/location/state_list');
		 
	}
	
	//** Add State **//	
	
	public function addstate()
	{
	  $sessionData = $this->session->userdata('userlogin');
	  $sess_user=$sessionData['user_id'];
	  $Result_country=$this->mastersmodule->get_allcountry();  //** Get All Country **//
	  $this->data["country"] = $Result_country['rows'];
	  
    	if(isset($_POST['state_add_details']))
 			{
				 
				$con_name = $this->input->post('con_name');
				$state_name = $this->input->post('state_name');
				$state_code = $this->input->post('state_code');

				$stateval = $this->mastersmodule->statevaildation($state_name, $con_name); //** State Validation **//
				if($stateval==0)
				{

				$statedata = array(
						'st_country_id' => $con_name,
						'state_name' => $state_name,
						'state_code' => $state_code,
						'state_status' => 'enable',
						'state_created_by'=>$sess_user,
						'state_modified_by'=>$sess_user,
						'state_add_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->add_state($statedata);
					$this->session->set_flashdata('message', 'State Added Successfully');
					redirect('masters/state');
				}
				else
				{
					$this->session->set_flashdata('message', 'State Name Already Exist');
				    redirect('masters/state');
				}
			 }
			else
			{		
			  $this->title = "YAK ERP - STATE";
			  $this->keywords = "YAK ERP";
			  $this->_render('pages/masters/location/state_cont');
			}
	}
	
	//** Edit State **//
	
	public function editstate($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$Result_country=$this->mastersmodule->get_allcountry(); //** Get All Country **//
	    $this->data["country"] = $Result_country['rows'];
	  
    	if(isset($_POST['state_edit_details']))
 			{
				$con_name = $this->input->post('con_name');
				$state_name = $this->input->post('state_name');
				$state_code = $this->input->post('state_code');

				$stateval = $this->mastersmodule->editstatevaildation($state_name, $con_name, $id);//** Edit State Validation **//
				if($stateval==0)
				{
				$state_data = array(
						'st_country_id' => $con_name,
						'state_name' => $state_name,
						'state_code' => $state_code,
						'state_modified_by'=>$sess_user,
						'state_update_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->Updatestate($id,$state_data); //** Update State **//
					$this->session->set_flashdata('message', 'State Updated Successfully');
					redirect('masters/state');
				}
				else
				{
					$this->session->set_flashdata('message', 'State Name Already Exist');
				    redirect('masters/state');
				}
			}
			 else
			 {
			  $this->data['sta'] = $this->mastersmodule->get_singlestate($id);	 //** Get Single State **//
			  $this->title = "ERP - Edit State";
			  $this->keywords = "ERP";
			  $this->_render('pages/masters/location/edit_state');
			 }
	    }

	//** View State **//
		
	public function viewstate($id)
	{
		$Result_country=$this->mastersmodule->get_allcountry();//** Get All Country **//
		$this->data["country"] = $Result_country['rows'];
		
		$this->data['sta'] = $this->mastersmodule->get_singlestate($id);//** Get Single State **//	
		$this->title = "ERP - Edit State";
		$this->keywords = "ERP";
		$this->_render('pages/masters/location/view_state');	 
	}
	
	//** State Status **//
	
	public function state_status($id,$status)
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
		
		$data = array(
						'state_status' =>$changeStatus,
						'state_modified_by'=>$sess_user,
						'state_update_date' => date ('Y-m-d h:i:s'),
					);		
		$this->mastersmodule->Updatestate_Status($id,$data);
		$this->session->set_flashdata('message', 'State Status Changed Successfully');
		redirect('masters/state');
	}
	
	//** Search City **//
	
	/* public function search_city($srarch_key="",$sort_order='city_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
		    $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			$limit =10;
			$Result=$this->mastersmodule->search_city_list($srarch_key,$limit,$page,$sort_order,$sort_by);
			$this->data["City"] = $Result['rows'];	
			
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/search_city/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=6;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;  
		
			$this->title = "YAK ERP - City";
			$this->keywords = "YAK ERP";
			$this->_render('pages/masters/location/city_list');
	}
	 */
	public function search_city($sort_order='state_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_country_name = $this->security->xss_clean($this->input->post('search_country_name'));
			$search_state_name = $this->security->xss_clean($this->input->post('search_state_name'));
			$search_city_name = $this->security->xss_clean($this->input->post('search_city_name'));
			$search_city_code = $this->security->xss_clean($this->input->post('search_city_code'));
			
			
		
			$req_search_city= array(
					'search_country_name' => $search_country_name,
					'search_state_name' => $search_state_name,
					'search_city_name' => $search_city_name,
					'search_city_code' => $search_city_code,
					
					);	
			$this->session->set_userdata('req_search_city',$req_search_city);
		}	
			
			
			$search_data = $this->session->userdata('req_search_city');			
			$search_country_name = $search_data['search_country_name'];
			$search_state_name = $search_data['search_state_name'];
			$search_city_name = $search_data['search_city_name'];
			$search_city_code = $search_data['search_city_code'];
				
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->search_city_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_country_name,$search_state_name,$search_city_name,$search_city_code);
		 
		  $this->data["City"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('masters/search_city/').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "YAK ERP - City";
		  $this->keywords = "YAK ERP";
		  $this->_render('pages/masters/location/city_list');
	}
	
	//** City List **//
	
	public function city($sort_order='city_id',$sort_by='desc')
	{	
		  	$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result=$this->mastersmodule->city_list($limit,$page,$sort_order,$sort_by);
			$this->data["City"] = $Result['rows'];	
			
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='false';
			$config['last_link']='false';
			$config['base_url'] = site_url('masters/city/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;  
		
			$this->title = "YAK ERP - City";
			$this->keywords = "YAK ERP";
			$this->_render('pages/masters/location/city_list');
			
	}
	
	//** GetState For OnPage Load **//
	public function getstate()
	{
		$con_id = $this->input->post('country');
		$state = $this->locationmodel->getAllState($con_id);
		
		if(empty($state))
		{
			echo "<option value='0'>Select State Name</option>";
		}
		else
		{
			$Select = "<option value=''>Select State Name</option>";
			foreach($state as $STA)
			{
				$Select .= "<option value='{$STA["ST_ID"]}'>{$STA["ST_NME"]}</option>";
			}
			echo $Select;
		}
		exit;
	}
	
	//** GetState For OnPage Load **//
	public function get_state()
	{
		$con_id = $this->input->post('country');
		$sta_id = $this->input->post('state');
		
		$state = $this->locationmodel->getAllState($con_id);
		
		if(empty($state))
		{
			echo "<option value='0'>Select State Name</option>";
		}
		else
		{
			$Select = "<option value=''>Select State Name</option>";
			foreach($state as $STA)
			{
				if($STA["ST_ID"] == $sta_id)
				{
					$Select .= "<option value='{$STA["ST_ID"]}' selected='selected'>{$STA["ST_NME"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$STA["ST_ID"]}'>{$STA["ST_NME"]}</option>";
				}
			} 
			echo $Select;
		}
		exit;
	}
	
	//** Add City **//	
	
	public function addcity()
	
	{
			$sessionData = $this->session->userdata('userlogin');
			$sess_user=$sessionData['user_id'];
	  		$Result_state=$this->mastersmodule->get_allstate();//** Get All State **//
		 	$this->data["state"] = $Result_state['rows'];	
		 	$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country **//
		  	$this->data["ctry"] = $res_cont['rows'];

		 	if(isset($_POST['city_add_details']))
			{
				$con_name = $this->input->post('con_name');
				$s_name = $this->input->post('state_name');
				$city_name = $this->input->post('city_name');
				$city_code = $this->input->post('city_code');

				$cityval = $this->mastersmodule->cityvaildation($city_name, $s_name, $con_name);//** City Validation **//
				if($cityval==0)
				{
			 	
			 	$citydata = array(
						'cty_country_id' => $con_name,
						'cty_state_id' => $s_name,
						'city_name' => $city_name,
						'city_code' => $city_code,
						'city_status' => 'enable',
						'city_created_by'=>$sess_user,
						'city_modified_by'=>$sess_user,
						'city_add_date' =>date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->add_city($citydata);
					$this->session->set_flashdata('message', 'City Added Successfully');
					redirect('masters/city');
				}
				else
				{
					$this->session->set_flashdata('message', 'City Name Already Exist.');
					redirect('masters/city');
				}
			}
			else
			{
			$this->title = "ERP  - City";
			$this->keywords = "ERP";
			$this->_render('pages/masters/location/city_cont');
			}
	}
	
	//** Edit City **//
	
	public function editcity($id)
	{
			$sessionData = $this->session->userdata('userlogin');
			$sess_user=$sessionData['user_id'];
		    $Result_state=$this->mastersmodule->get_allstate();//** Get All State **//
		 	$this->data["state"] = $Result_state['rows'];	
		 	$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country **//
		  	$this->data["ctry"] = $res_cont['rows'];
		
		if(isset($_POST['city_update_details']))
			{ 
				$con_name = $this->input->post('con_name');
				$s_name = $this->input->post('state_name');
				$city_name = $this->input->post('city_name');
				$city_code = $this->input->post('city_code');

				$cityval = $this->mastersmodule->editcityvaildation($city_name, $s_name, $con_name, $id);//** Edit City Validation **//
				if($cityval==0)
				{
			 		$city_data = array(
						'cty_country_id' => $con_name,
						'cty_state_id' => $s_name,
						'city_name' => $city_name,
						'city_code' => $city_code,
						'city_modified_by'=>$sess_user,
						'city_update_date' =>date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->Updatecity($id, $city_data);
					$this->session->set_flashdata('message', 'City Updated Successfully');
					redirect('masters/city');
				}
				else
				{
					$this->session->set_flashdata('message', 'City Name Already Exist.');
					redirect('masters/city');
				}
			}
			else
			{
				$this->data['cty'] = $this->mastersmodule->get_singlecity($id);//** Get Single City **//
				$this->title = "ERP - City";
				$this->keywords = "ERP";
				$this->_render('pages/masters/location/edit_city');
			}
	}

	//** View City **//
	
	public function viewcity($id)
	{
		    $Result_state=$this->mastersmodule->get_allstate();//** Get All State **//
		 	$this->data["state"] = $Result_state['rows'];	
		 	$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country **//
		  	$this->data["ctry"] = $res_cont['rows'];
		
			$this->data['cty'] = $this->mastersmodule->get_singlecity($id);//** Get Single City **//
			$this->title = "ERP - City";
			$this->keywords = "ERP";
			$this->_render('pages/masters/location/view_city');
			
	}

	//** City Status **//
	
	public function city_status($id,$status)
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
		
		$data = array(
						'city_status' =>$changeStatus,
						'city_modified_by'=>$sess_user,
						'city_update_date' => date ('Y-m-d h:i:s'),
					);		
		$this->mastersmodule->Updatecity_Status($id,$data);
		$this->session->set_flashdata('message', 'City Status Changed Successfully');
		redirect('masters/city');
	}
	
	//** Search User's **//
	 
	/* public function search_users1($srarch_key="",$sort_order='user_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result=$this->mastersmodule->search_users_list($sess_company,$srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["users"] = $Result['rows'];	
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='false';
				$config['last_link']='false';
				$config['base_url'] = site_url('masters/search_users').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;  

				$this->title = "ERP USERS";
				$this->keywords = "USERS";
				$this->_render('pages/masters/users/users_list');

	}
	 */
	public function search_users($sort_order='user_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$res_grp_name=$this->mastersmodule->get_allusr_grp();
		$this->data["usr_gup"] = $res_grp_name['rows'];
		
		if(isset($_POST['search']))
		{
			$search_first_name = $this->security->xss_clean($this->input->post('search_first_name'));
			$search_last_name = $this->security->xss_clean($this->input->post('search_last_name'));
			$search_user_name = $this->security->xss_clean($this->input->post('search_user_name'));
			$search_group_name = $this->security->xss_clean($this->input->post('search_group_name'));
			$search_user_email = $this->security->xss_clean($this->input->post('search_user_email'));
			
			
		
			$req_search_user= array(
					'search_first_name' => $search_first_name,
					'search_last_name' => $search_last_name,
					'search_user_name' => $search_user_name,
					'search_group_name' => $search_group_name,
					'search_user_email' => $search_user_email,
					
					);	
			$this->session->set_userdata('req_search_user',$req_search_user);
		}	
			
			
			$search_data = $this->session->userdata('req_search_user');			
			$search_first_name = $search_data['search_first_name'];
			$search_last_name = $search_data['search_last_name'];
			$search_user_name = $search_data['search_user_name'];
			$search_group_name = $search_data['search_group_name'];
			$search_user_email = $search_data['search_user_email'];
				
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =10;
		  $Result = $this->mastersmodule->search_users_list($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_first_name,$search_last_name,$search_user_name,$search_group_name,$search_user_email);
		 
		  $this->data["users"] = $Result['rows'];
		
		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('masters/search_users').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "ERP USERS";
		  $this->keywords = "USERS";
	      $this->_render('pages/masters/users/users_list');
	}
	
	//** User's List **//
	
	public function users($sort_order='user_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$res_grp_name=$this->mastersmodule->get_allusr_grp();
		$this->data["usr_gup"] = $res_grp_name['rows'];
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result=$this->mastersmodule->users_list($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["users"] = $Result['rows'];	
		
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='false';
		$config['last_link']='false';
		$config['base_url'] = site_url('masters/users/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;  
		
		$this->title = "ERP USERS";
		$this->keywords = "USERS";
		$this->_render('pages/masters/users/users_list');
		
	}
	
	//** Add User's **//
	
	public function addusers()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$this->data["company_srt_name"] = $this->mastersmodule->get_all_company(); //** Get All Company **//
		$Result_state=$this->mastersmodule->get_allstate();//** Get All State **//
		$this->data["state"] = $Result_state['rows'];	
		$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country **//
		$this->data["ctry"] = $res_cont['rows'];
		$res_city=$this->mastersmodule->get_allcity();//** Get All City **//
		$this->data["city"] = $res_city['rows'];
		$res_grp_name=$this->mastersmodule->get_allusr_grp();//** Get All User Groups **//
		$this->data["usr_gup"] = $res_grp_name['rows'];

		  	if(isset($_POST['users_add_details']))
			{
				$first_name = $this->security->xss_clean($this->input->post('first_name'));
				$last_name = $this->security->xss_clean($this->input->post('last_name'));
				$mob = $this->security->xss_clean($this->input->post('mob'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$username = $this->security->xss_clean($this->input->post('username'));
				$password = $this->security->xss_clean(md5($this->input->post('password')));
				$user_gup_name = $this->security->xss_clean($this->input->post('user_gup_name'));
				$user_company = $this->security->xss_clean($this->input->post('company'));
				$street = $this->security->xss_clean($this->input->post('street'));
				$con_name = $this->security->xss_clean($this->input->post('con_name'));
				$state_name = $this->security->xss_clean($this->input->post('state_name'));
				$city_name = $this->security->xss_clean($this->input->post('city_name'));
				$zip_code = $this->security->xss_clean($this->input->post('zip_code'));

				$userval = $this->mastersmodule->user_vaildation($username);//** User Validation **//
				if($userval==0)
				{
					$userdata = array(
						'user_first_name' => $first_name,
						'user_last_name' => $last_name,
						'user_phone' => $mob,
						'user_email' => $email,
						'user_name' => $username,
						'user_pwd' => $password,
						'user_group_id' => $user_gup_name,
						'user_company_id' => $user_company,
						'user_address' => $street,
						'user_country' => $con_name,
						'user_state' => $state_name,
						'user_city' => $city_name,
						'user_zipcode' => $zip_code,
						'user_created_by' => $sess_user,
						'user_modified_by' => $sess_user,
						'user_status' => 'enable',
						'user_add_date' =>date ('Y-m-d h:i:s'),
						);
				    $this->mastersmodule->add_user($userdata);
					$this->session->set_flashdata('message', 'User Added Successfully');
					redirect('masters/users');
				}
				else
				{
					$this->session->set_flashdata('message', 'User Name Already Exist');
					redirect('masters/users');
				}
			}
			
		else
		{
			$this->title = "ERP NEWUSERS";
			$this->keywords = "USERS";
			$this->_render('pages/masters/users/new_users');
		}
	}
	
	//** Edit User's **//
	
	public function editusers($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$this->data["company_srt_name"] = $this->mastersmodule->get_all_company();//** Get All Company **//
		$Result_state=$this->mastersmodule->get_allstate();//** Get All State **//
		$this->data["state"] = $Result_state['rows'];	
		$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country **//
		$this->data["ctry"] = $res_cont['rows'];
		$res_city=$this->mastersmodule->get_allcity();//** Get All City **//
		$this->data["city"] = $res_city['rows'];
		$res_grp_name=$this->mastersmodule->get_allusr_grp();//** Get All User Groups **//
		$this->data["usr_gup"] = $res_grp_name['rows'];

		  	if(isset($_POST['users_add_details']))
			{
				$first_name = $this->security->xss_clean($this->input->post('first_name'));
				$last_name = $this->security->xss_clean($this->input->post('last_name'));
				$mob = $this->security->xss_clean($this->input->post('mob'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$username = $this->security->xss_clean($this->input->post('username'));
				$user_gup_name = $this->security->xss_clean($this->input->post('user_gup_name'));
				$user_company = $this->security->xss_clean($this->input->post('company'));
				$street = $this->security->xss_clean($this->input->post('street'));
				$con_name = $this->security->xss_clean($this->input->post('con_name'));
				$state_name = $this->security->xss_clean($this->input->post('state_name'));
				$city_name = $this->security->xss_clean($this->input->post('city_name'));
				$zip_code = $this->security->xss_clean($this->input->post('zip_code'));

				$userval = $this->mastersmodule->edituser_vaildation($username, $id);//** Edit User Validation **//
				if($userval==0)
				{
					$userdata = array(
						'user_first_name' => $first_name,
						'user_last_name' => $last_name,
						'user_phone' => $mob,
						'user_email' => $email,
						'user_name' => $username,
						'user_group_id' => $user_gup_name,
						'user_company_id' => $user_company,
						'user_address' => $street,
						'user_country' => $con_name,
						'user_state' => $state_name,
						'user_city' => $city_name,
						'user_zipcode' => $zip_code,
						'user_modified_by' => $sess_user,
						'user_status' => 'enable',
						'user_update_date' =>date ('Y-m-d h:i:s'),
						);
				    $this->mastersmodule->update_user($userdata, $id);
					$this->session->set_flashdata('message', 'User Updated Successfully');
					redirect('masters/users');
				}
				else
				{
					$this->session->set_flashdata('message', 'User Name Already Exist');
					redirect('masters/users');
				}
			}
			
		else
		{
			$this->data['usr'] = $this->mastersmodule->get_singleuser($id); //** Get Single User **//
			$this->title = "ERP NEWUSERS";
			$this->keywords = "USERS";
			$this->_render('pages/masters/users/edit_users');
		}
	}
	
	//** View User's **//
	
	public function viewusers($id)
	{
		$Result_state=$this->mastersmodule->get_allstate();//** Get All State **//
		$this->data["state"] = $Result_state['rows'];	
		$res_cont= $this->mastersmodule->get_allcountry();//** Get All Country **//
		$this->data["ctry"] = $res_cont['rows'];
		$res_city=$this->mastersmodule->get_allcity();//** Get All City **//
		$this->data["city"] = $res_city['rows'];
		$res_grp_name=$this->mastersmodule->get_allusr_grp();//** Get All User Groups **//
		$this->data["usr_gup"] = $res_grp_name['rows'];

		  	
		$this->data['usr'] = $this->mastersmodule->get_singleuser($id);//** Get Single User **//
		$this->title = "ERP NEWUSERS";
		$this->keywords = "USERS";
		$this->_render('pages/masters/users/view_users');
		}
	
	//** User Status **//
	
	public function update_users($id,$status)
	{
		
		if($status == 'enable')
		{
			$changeStatus = 'disable';
		}
		else
		{
			$changeStatus = 'enable';
		}
		
		$userdata = array(
				  'user_status' => $changeStatus,
				  'user_update_date' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updateuserstatus($userdata, $id);
		$this->session->set_flashdata('message', 'User Status Changed Successfully');
		redirect('masters/users');
	}
	
	//** Search User Group **//
	
	public function search_users_grp($srarch_key="",$sort_order='group_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result=$this->mastersmodule->search_users_grplist($srarch_key,$limit,$page,$sort_order,$sort_by);
				 $this->data["users_grp"] = $Result['rows'];	
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='false';
				$config['last_link']='false';
				$config['base_url'] = site_url('masters/search_users_grp/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;  
				
				$this->title = "ERP USERS GROUP";
				$this->keywords = "USERS GROUP";
				$this->_render('pages/masters/users_group/users_grplist');
	}
	
	//** User Group List **//
	
	public function users_grp($sort_order='group_id',$sort_by='desc')
	{
		    $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =10;
			$Result=$this->mastersmodule->users_grplist($limit,$page,$sort_order,$sort_by);
			$this->data["users_grp"] = $Result['rows'];	
			
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='false';
			$config['last_link']='false';
			$config['base_url'] = site_url('masters/users_grp/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;  

		$this->title = "ERP USERS GROUP";
		$this->keywords = "USERS GROUP";
		$this->_render('pages/masters/users_group/users_grplist');
	}
	
	//** Add User Group **//
	
	public function addusers_grp()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['add_users_grp']))
		{
		
			$usr_grp_name = $this->security->xss_clean($this->input->post('usr_grp_name'));
			$usr_grp_desc = $this->security->xss_clean($this->input->post('usr_grp_desc'));

			$user_grpval = $this->mastersmodule->user_grpvaildation($usr_grp_name);//** User Group Validation **//
			if($user_grpval==0)
			{
			$user_grpdetail=array(
				'group_name'=>$usr_grp_name,
				'group_description'=>$usr_grp_desc,
				'status'=>'enable',
				'group_created_by'=>$sess_user,
				'group_modified_by'=>$sess_user,
				'group_add_date'=> date ('Y-m-d h:i:s'),
				);
			
			$usr_grp_id=$this->mastersmodule->add_usergrp($user_grpdetail);//** Add User Group **//
			
			$get_module=$this->mastersmodule->get_module(); //** Get Module **//
			
			foreach($get_module as $GM)
			{
				$user_grp_module_detail=array(
				'user_group_id'=>$usr_grp_id,
				'module_id'=>$GM['module_id'],
				'add_option'=>'0',
				'edit_option'=>'0',
				'delete_option'=>'0',
				'view_option'=> '0',
				'import_option'=> '0',
				'status_change'=> '0',
				'update_date'=> date ('Y-m-d h:i:s')
				);
			$this->mastersmodule->add_user_grp_module_detail($user_grp_module_detail);	//** Add User Group Modules **//
		
			}
			
			$this->session->set_flashdata('message', 'User Group  Added Successfully');
			redirect('masters/users_grp');
		}
		else
		{
			$this->session->set_flashdata('message', 'Group Name Already Exist');
			redirect('masters/users_grp');
		}
		}
		else
		{
			$this->title = "ERP USERS GROUP";
			$this->keywords = "USERS GROUP";
			$this->_render('pages/masters/users_group/addusers_grp');
	}
		
	}
			// DO NOT DELETE          TO add User Roles if groups already Added//////
		/* public function add_exist_user_group()
	{
		$get_usr_grp=$this->mastersmodule->get_usergrp();
		$get_module=$this->mastersmodule->get_module();
			
		
			foreach($get_usr_grp as $USRG)
			{
				foreach($get_module as $GM)
				{
				$user_grp_module_detail=array(
				'user_group_id'=>$USRG['group_id'],
				'module_id'=>$GM['module_id'],
				'add_option'=>'0',
				'edit_option'=>'0',
				'delete_option'=>'0',
				'view_option'=> '0',
				'import_option'=> '0',
				'status_change'=> '0',
				'update_date'=> date ('Y-m-d h:i:s')
				);
			$this->mastersmodule->add_user_grp_module_detail($user_grp_module_detail);
			//echo"<PRE>";print_r($user_grp_module_detail);
				}
			
			}

			$this->session->set_flashdata('message', 'Group Details Updated  Successfully');
			redirect('masters/users_grp');
	
	} 
	 */
	
	//** Edit User Group **//
	
	public function editusers_grp($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['update_users_grp']))
		{
			$usr_grp_name = $this->security->xss_clean($this->input->post('usr_grp_name'));
			$usr_grp_desc = $this->security->xss_clean($this->input->post('usr_grp_desc'));

			$user_grpval = $this->mastersmodule->edituser_grpvaildation($usr_grp_name, $id);//** Edit User Group Validation **//
			if($user_grpval==0)
			{
				$user_grpdetail=array(
					'group_name'=>$usr_grp_name,
					'group_description'=>$usr_grp_desc,
					'group_modified_by'=>$sess_user,
					'group_update_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->update_usergrp($user_grpdetail, $id);
				$this->session->set_flashdata('message', 'User Group  Updated Successfully');
				redirect('masters/users_grp');
			}
			else
			{
				$this->session->set_flashdata('message', 'Group Name Already Exist');
				redirect('masters/users_grp');
			}
		}
		else
		{
			$this->data['usr_grp'] = $this->mastersmodule->get_singleusergrp($id);//** Get Single User Group **//
			$this->title = "ERP USERS GROUP";
			$this->keywords = "USERS GROUP";
			$this->_render('pages/masters/users_group/editusers_grp');
		}
		
	}
	
	//** View User Group **//
	
	public function viewusers_grp($id)
	{
		$this->data['usr_grp'] = $this->mastersmodule->get_singleusergrp($id);//** Get Single User Group **//
		$this->title = "ERP USERS GROUP";
		$this->keywords = "USERS GROUP";
		$this->_render('pages/masters/users_group/viewusers_grp');
	}
	
	//** Update User Group **//
	
	public function update_usersgrp($id,$status)
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
		
		$usergrpdata = array(
				  'status' => $changeStatus,
				  'group_modified_by'=>$sess_user,
				  'group_update_date' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updateuser_grpstatus($usergrpdata, $id);
		$this->session->set_flashdata('message', 'User Group Status Changed Successfully');
		redirect('masters/users_grp');
	}
	//////////////////////////USER ROLES/////////////////////////////////////
	
	public function users_roles($sort_order='group_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result=$this->mastersmodule->users_grplist($limit,$page,$sort_order,$sort_by);
		$this->data["users_roles"] = $Result['rows'];	
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='false';
		$config['last_link']='false';
		$config['base_url'] = site_url('masters/users_roles/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;  
		
		$this->title = "ERP USERS GROUP";
		$this->keywords = "USERS GROUP";
		$this->_render('pages/masters/users_roles/users_rolelist');
	}

	public function assign_roles($id)
	{
		$this->data['user_id'] = $id;
		
		if(isset($_POST['update_roles']))
		{
			$user_group_id=$this->security->xss_clean($this->input->post('user_group_id'));
			$date=date("Y-m-d");
			$module_id=$this->security->xss_clean($this->input->post('module_id'));
			$add=$this->security->xss_clean($this->input->post('add'));
			$edit=$this->security->xss_clean($this->input->post('edit'));
			$delete=$this->security->xss_clean($this->input->post('delete'));
			$view=$this->security->xss_clean($this->input->post('view'));
			$import=$this->security->xss_clean($this->input->post('import'));
			$export=$this->security->xss_clean($this->input->post('export'));
			$status=$this->security->xss_clean($this->input->post('status'));
				
			if(!empty($user_group_id))
		 	{
				$result=count($module_id);
				
				for($i=1; $i<=$result; $i++)
				{	
					if(isset($add[$i])) { $add_val = $add[$i];} else { $add_val = 0; }
					if(isset($edit[$i])) { $edit_val = $edit[$i];} else { $edit_val = 0; }
					if(isset($delete[$i])) { $delete_val = $delete[$i];} else { $delete_val = 0; }
					if(isset($view[$i])) { $view_val = $view[$i]; } else { $view_val = 0; }
					if(isset($import[$i])) { $import_val = $import[$i];} else { $import_val = 0; }
					if(isset($export[$i])) { $export_val = $export[$i];} else { $export_val = 0; }
					if(isset($status[$i])) { $status_val = $status[$i];} else { $status_val = 0; }
					
					
					$data=array(
						'user_group_id' => $user_group_id,
						'module_id'=>$module_id[$i],
						'add_option' => $add_val,
						'edit_option' => $edit_val,
						'delete_option' => $delete_val,
						'view_option' => $view_val,
						'import_option' => $import_val,
						'export_option' => $export_val,
						'status_change' => $status_val,
						'update_date' => $date,
					   );  
					$this->mastersmodule->add_roles($data, $user_group_id, $module_id[$i]);
				}
			}
			$this->session->set_flashdata('message', 'Roles Updated Successfully');
			redirect('masters/users_grp');
		}
		
	
		$this->data["module_roles"] = $this->mastersmodule->get_all_module_roles($id);
		
		$this->data['usr_grp'] = $this->mastersmodule->get_singleusergrp($id);
		$this->title = "ERP USERS GROUP";
		$this->keywords = "USERS GROUP";
		$this->_render('pages/masters/users_group/assign_users_role');
	
	}

	
	////////////////////////////USER ROLES END HERE/////////////////////////////////////////////////
	
	//** Search Carrier **//
	
	public function search_career($srarch_key="",$sort_order='shipping_carrier_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result=$this->mastersmodule->search_career_list($srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["career_val"] = $Result['rows'];	
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='false';
				$config['last_link']='false';
				$config['base_url'] = site_url('masters/search_career/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;  
				
				$this->title = "ERP Carrier";
				$this->keywords = "Carrier";
				$this->_render('pages/masters/career/career');
	}
	
	//** Carrier List **//
	
	public function career($sort_order='shipping_carrier_id',$sort_by='desc')
	{ 
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result=$this->mastersmodule->career_list($limit,$page,$sort_order,$sort_by);
		$this->data["career_val"] = $Result['rows'];	
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='false';
		$config['last_link']='false';
		$config['base_url'] = site_url('masters/career/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;  

		$this->title = "ERP Carrier";
		$this->keywords = "Carrier";
		$this->_render('pages/masters/career/career');
	}
	
	//** Add Carrier **//
	
	public function add_career()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['add_career']))
		{
			$career_name = $this->security->xss_clean($this->input->post('career_name'));
			$career_address = $this->security->xss_clean($this->input->post('career_address'));
			$description = $this->security->xss_clean($this->input->post('description'));

			$careerval = $this->mastersmodule->careervaildation($career_name); //**  Carrier Validation **//
			if($careerval==0)
			{
				$career_detail=array(
					'shipping_carrier_name'=>$career_name,
					'shipping_carrier_address'=>$career_address,
					'shipping_carrier_descrption'=>$description,
					'shipping_status'=>'active',
					'shipping_carrier_created_by'=>$sess_user,
					'shipping_carrier_updated_by'=>$sess_user,
					'shipping_add_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->add_career($career_detail);
				$this->session->set_flashdata('message', 'Shipping Career Name Added Successfully');
				redirect('masters/career');
			}
			else
			{
				$this->session->set_flashdata('message', 'Shipping Career Name Already Exist');
				redirect('masters/career');
			}
		}
		else
		{
		$this->title = "ERP Shipping Career";
		$this->keywords = "Shipping Career";
		$this->_render('pages/masters/career/add_career');
		}
		
	}
	
	//** Edit Carrier **//
		
	public function edit_career($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['edit_career']))
		{
			$career_name = $this->security->xss_clean($this->input->post('career_name'));
			$career_address = $this->security->xss_clean($this->input->post('career_address'));
			$description = $this->security->xss_clean($this->input->post('description'));

			$careerval = $this->mastersmodule->editcareervaildation($career_name, $id); //** Edit Carrier Validation **//
			if($careerval==0)
			{
				$career_detail=array(
					'shipping_carrier_name'=>$career_name,
					'shipping_carrier_address'=>$career_address,
					'shipping_carrier_descrption'=>$description,
					'shipping_status'=>'active',
					'shipping_carrier_updated_by'=>$sess_user,
					'shipping_update_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->edit_career($career_detail,$id);
				$this->session->set_flashdata('message', 'Shipping Career Updated Successfully');
				redirect('masters/career');
			}
			else
			{
				$this->session->set_flashdata('message', 'Shipping Career Name Already Exist');
				redirect('masters/career');
			}
		}
		else
		{
			$this->data['career_val'] = $this->mastersmodule->get_singlecareer($id); //** Get Single Carrier **//
			$this->title = "ERP Shipping Career";
			$this->keywords = "Shipping Career";
			$this->_render('pages/masters/career/edit_career');
		}
		
	}
	
	//** View Carrier **//
	
	public function view_career($id)
	{
		$this->data['career_val'] = $this->mastersmodule->get_singlecareer($id);//** Get Single Carrier **//
		$this->title = "ERP Shipping Career";
		$this->keywords = "Shipping Career";
		$this->_render('pages/masters/career/view_career');
	}
	
	//** Update Carrier **//
	
	public function update_carrier($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
			$carrierdata = array(
				  'shipping_status' => $changeStatus,
				  'shipping_update_date' => date('Y-m-d h:i:s'),
				  'shipping_carrier_updated_by'=>$sess_user,
			 		 );
		$this->mastersmodule->update_carrier($carrierdata, $id);
		$this->session->set_flashdata('message', 'Carrier Status Changed Successfully');
		redirect('masters/career');
	}

	/**** Prefix controller ****/
	//** Search Prefix **//
	
	public function search_prefix($srarch_key="",$sort_order='prefix_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result = $this->mastersmodule->search_get_prefix($srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["prefix"] = $Result['rows'];
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='First';
				$config['last_link']='Last';
				$config['base_url'] = site_url('masters/search_prefix/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;
				
				$this->title = "Prefix Details";
				$this->keywords = "Prefix Details";
				$this->_render('pages/masters/prefix/prefix_list');
	}
	
	//** Prefix List **//
	
	public function prefix($sort_order='prefix_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_prefix($limit,$page,$sort_order,$sort_by);
		$this->data["prefix"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/prefix/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Prefix Details";
		$this->keywords = "Prefix Details";
		$this->_render('pages/masters/prefix/prefix_list');
	}
	
	//** Add Prefix **//
	
	public function addprefix()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if(isset($_POST['prefix_add_details']))
		{
			$prefix_model = $this->security->xss_clean($this->input->post('prefix_model'));
			$prefix_name = $this->security->xss_clean($this->input->post('prefix_name'));
			$prefix_desc = $this->security->xss_clean($this->input->post('prefix_desc'));

			$preval = $this->mastersmodule->prefixvaildation($prefix_name);//**  Prefix Validation **//
			if($preval==0)
			{
				$prefixdetails=array(
					'prefix_module'=>$prefix_model,
					'prefix_name'=>strtoupper($prefix_name),
					'prefix_decsription'=>$prefix_desc,
					'prefix_statue'=>'active',
					'prefix_created_by'=>$sess_user,
					'prefix_updated_by'=>$sess_user,
					'prefix_add_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->add_prefix($prefixdetails);
				$this->session->set_flashdata('message', 'Prefix  Added Successfully');
				redirect('masters/prefix');
			}
			else
			{
				$this->session->set_flashdata('message', 'Prefix  Already Exist');
				redirect('masters/prefix');
			}
		}
		else
		{
		$this->data["prefixmodule"] = $this->mastersmodule->get_all_module_prefix(); //** Get All Module For Prefix **//
		$this->title = "Add Prefix";
		$this->keywords = "Add Prefix";
		$this->_render('pages/masters/prefix/add_prefix');
		}	
	}
	
	//** Edit Prefix **//
	
	public function editprefix($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['prefix_edit_details']))
		{
			$prefix_model = $this->security->xss_clean($this->input->post('prefix_model'));
			$prefix_model_id = $this->security->xss_clean($this->input->post('prefix_model_id'));
			$prefix_name = $this->security->xss_clean($this->input->post('prefix_name'));
			$prefix_desc = $this->security->xss_clean($this->input->post('prefix_desc'));

			$preval = $this->mastersmodule->editprefixvaildation($prefix_name, $id);//** Edit Prefix Validation **//
			if($preval==0)
			{
				$prefixdetails=array(
					'prefix_module'=>$prefix_model_id,
					'prefix_name'=>strtoupper($prefix_name),
					'prefix_decsription'=>$prefix_desc,
					'prefix_updated_by'=>$sess_user,
					'prefix_update_date'=> date ('Y-m-d h:i:s'),
					);
		
				$this->mastersmodule->update_prefix($prefixdetails, $id);
				$this->session->set_flashdata('message', 'Prefix  Updated Successfully');
				redirect('masters/prefix');
			}
			else
			{
				$this->session->set_flashdata('message', 'Prefix Name Already Exist');
				redirect('masters/prefix');
			}
		}
		else
		{
			$this->data['prefixdata'] = $this->mastersmodule->getsingle_prefix($id);//** Get Single Prefix **//
			$this->title = "Edit Prefix";
			$this->keywords = "Edit Prefix";
			$this->_render('pages/masters/prefix/edit_prefix');
		}
	}
	
	//** View Prifix **//
	
	public function viewprefix($id)
	{
		$this->data['prefixdata'] = $this->mastersmodule->getsingle_prefix($id);//** Get Single Prefix **//
		$this->title = "Edit Prefix";
		$this->keywords = "Edit Prefix";
		$this->_render('pages/masters/prefix/view_prefix');
	}
	
	//** Prifix Status **//
	
	public function deleteprefix($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$prefixData = array(
						'prefix_statue' => $changeStatus,
						'prefix_update_date' => date('Y-m-d'),
						'prefix_updated_by'=>$sess_user,
					);
					
		$this->mastersmodule->update_prefix_status($prefixData,$id);
		 
		$this->session->set_flashdata('message', 'Prefix Deleted Successfully');
		redirect('masters/prefix');
	}


	/****************  manufacturer  **************/
	//** Search Manufacturer **//
	
	public function search_manufacturer($srarch_key="",$sort_order='manufacturer_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result = $this->mastersmodule->search_get_manufacturer($srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["manufacturer"] = $Result['rows'];
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='First';
				$config['last_link']='Last';
				$config['base_url'] = site_url('masters/search_manufacturer').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;
				
				$this->title = "Manufacturer Details";
				$this->keywords = "Manufacturer Details";
				$this->_render('pages/masters/manufacturer/manufacturer_list');
	}
	
	//** Manufacturer List **//
	
	public function manufacturer($sort_order='manufacturer_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_manufacturer($limit,$page,$sort_order,$sort_by);
		$this->data["manufacturer"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/manufacturer').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Manufacturer Details";
		$this->keywords = "Manufacturer Details";
		$this->_render('pages/masters/manufacturer/manufacturer_list');
	}
	
	//** Add Manufacturer **//
	
	public function addmanufacturer()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['manufacturer_add_details']))
		{
			$manufacturer_name = $this->security->xss_clean($this->input->post('manu_name'));
			$manufacturer_desc = $this->security->xss_clean($this->input->post('manu_desc'));

			$manuval = $this->mastersmodule->manufacturervaildation($manufacturer_name);//** Manufacturer Validation **//
			if($manuval==0)
			{
				$manufacturerdetails=array(
					'manufacturer_name'=>$manufacturer_name,
					'manufacturer_description'=>$manufacturer_desc,
					'manufacturer_status'=>'active',
					'manufacturer_created_by'=>$sess_user,
					'manufacturer_updated_by'=>$sess_user,
					'manufacturer_add_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->add_manufacturer($manufacturerdetails);
				$this->session->set_flashdata('message', 'Manufacturer  Added Successfully');
				redirect('masters/manufacturer');
			}
			else
			{
				$this->session->set_flashdata('message', 'Manufacturer name  Already Exist');
				redirect('masters/manufacturer');
			}
		}
		else
		{
			$this->title = "Add Manufacturer";
			$this->keywords = "Add Manufacturer";
			$this->_render('pages/masters/manufacturer/add_manufacturer');
		}
		
	}
	
	//** Edit Manufacturer **//
	
	public function editmanufacturer($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['manufacturer_edit_details']))
		{
			$manufacturer_name = $this->security->xss_clean($this->input->post('manu_name'));
			$manufacturer_desc = $this->security->xss_clean($this->input->post('manu_desc'));

			$preval = $this->mastersmodule->editmanufacturervaildation($manufacturer_name, $id);//**Edit  Manufacturer Validation **//
			if($preval==0)
			{
				$manufacturerdetails=array(
					'manufacturer_name'=>$manufacturer_name,
					'manufacturer_description'=>$manufacturer_desc,
					'manufacturer_updated_by'=>$sess_user,
					'manufacturer_update_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->update_manufacturer($manufacturerdetails, $id);
				$this->session->set_flashdata('message', 'Manufacturer  Updated Successfully');
				redirect('masters/manufacturer');
			}
			else
			{
				$this->session->set_flashdata('message', 'Manufacturer Name Already Exist');
				redirect('masters/manufacturer');
			}
		}
		else
		{
			$this->data['manufacturerdata'] = $this->mastersmodule->getsingle_manufacturer($id);//** Get Single Manufacturer **//
			$this->title = "Edit Manufacturer";
			$this->keywords = "Edit Manufacturer";
			$this->_render('pages/masters/manufacturer/edit_manufacturer');
		}
	}
	
	//** View Manufacturer **//
	
	public function viewmanufacturer($id)
	{
		$this->data['manufacturerdata'] = $this->mastersmodule->getsingle_manufacturer($id);//** Get Single Manufacturer **//
		$this->title = "Edit Manufacturer";
		$this->keywords = "Edit Manufacturer";
		$this->_render('pages/masters/manufacturer/view_manufacturer');
	}
	
	//** Manufacturer Status **//
	
	public function deletemanufacturer($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$manufacturerData = array(
						'manufacturer_status' => $changeStatus,
						'manufacturer_update_date' => date('Y-m-d'),
						'manufacturer_updated_by'=>$sess_user,
					);
					
		$this->mastersmodule->update_manufacturer_status($manufacturerData,$id);
		 
		$this->session->set_flashdata('message', 'Manufacturer Deleted Successfully');
		redirect('masters/manufacturer');
	}


/**********************  Payment Mdoe  *************/
	//** Search Payment **//
	
	public function search_paymentmode($srarch_key="",$sort_order='payment_mode_id',$sort_by='desc')
	{
			if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result = $this->mastersmodule->search_get_paymentmode($srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["paymentmode"] = $Result['rows'];
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='First';
				$config['last_link']='Last';
				$config['base_url'] = site_url('masters/search_paymentmode').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;
				
				$this->title = "Payment Mode";
				$this->keywords = "Payment Mode";
				$this->_render('pages/masters/paymentmode/paymentmode_list');
	}
	
	//** Payment List **//
	
	public function paymentmode($sort_order='payment_mode_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_paymentmode($limit,$page,$sort_order,$sort_by);
		$this->data["paymentmode"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/paymentmode').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Payment Mode";
		$this->keywords = "Payment Mode";
		$this->_render('pages/masters/paymentmode/paymentmode_list');
	}
	
	//**Add Payment **//
	
	public function addpaymentmode()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['pay_mode_add_details']))
		{
			$pay_mode_name = $this->security->xss_clean($this->input->post('pay_mode_name'));
			$pay_mode_desc = $this->security->xss_clean($this->input->post('pay_mode_desc'));

			$paymodeval = $this->mastersmodule->paymentmodevaildation($pay_mode_name);//** Payment Validation **//
			if($paymodeval==0)
			{
				$paymentmodedetails=array(
					'payment_mode_name'=>$pay_mode_name,
					'payment_mode_description'=>$pay_mode_desc,
					'payment_mode_status'=>'active',
					'payment_mode_created_by'=>$sess_user,
					'payment_mode_updated_by'=>$sess_user,
					'payment_mode_add_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->add_paymentmode($paymentmodedetails);
				$this->session->set_flashdata('message', 'Payment Mode  Added Successfully');
				redirect('masters/paymentmode');
			}
			else
			{
				$this->session->set_flashdata('message', 'Payment Mode name  Already Exist');
				redirect('masters/paymentmode');
			}
		}
		else
		{
			$this->title = "Add Payment Mode";
			$this->keywords = "Add Payment Mode";
			$this->_render('pages/masters/paymentmode/add_paymentmode');
		}
		
	}
	
	//**Edit Payment **//
	
	public function editpaymentmode($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['pay_mode_edit_details']))
		{
			$pay_mode_name = $this->security->xss_clean($this->input->post('pay_mode_name'));
			$pay_mode_desc = $this->security->xss_clean($this->input->post('pay_mode_desc'));

			$paymodeval = $this->mastersmodule->editpaymentmodevaildation($pay_mode_name, $id);//**Edit Payment Validation **//
			if($paymodeval==0)
			{
			$paymentmodedetails=array(
				'payment_mode_name'=>$pay_mode_name,
				'payment_mode_description'=>$pay_mode_desc,
				'payment_mode_updated_by'=>$sess_user,
				'payment_mode_update_date'=> date ('Y-m-d h:i:s'),
				);
			$this->mastersmodule->update_paymentmode($paymentmodedetails, $id);
			$this->session->set_flashdata('message', 'Payment Mode  updated Successfully');
			redirect('masters/paymentmode');
		}
			{
			$this->session->set_flashdata('message', 'Payment Mode Name Already Exist');
			redirect('masters/paymentmode');
			}
		}
		else
		{
			$this->data['paymentmodedata'] = $this->mastersmodule->getsingle_paymentmode($id);//** Get Single  Payment Mode **//
			$this->title = "Edit paymentmode";
			$this->keywords = "Edit paymentmode";
			$this->_render('pages/masters/paymentmode/edit_paymentmode');
		}
	}
	
	//**View Payment **//
	
	public function viewpaymentmode($id)
	{
		$this->data['paymentmodedata'] = $this->mastersmodule->getsingle_paymentmode($id);//** Get Single  Payment Mode **//
		$this->title = "Edit paymentmode";
		$this->keywords = "Edit paymentmode";
		$this->_render('pages/masters/paymentmode/view_paymentmode');
	}
	
	//** Payment Status **//
	
	public function deletepaymentmode($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$paymentmodeData = array(
						'payment_mode_status' => $changeStatus,
						'payment_mode_update_date' => date('Y-m-d'),
						'payment_mode_updated_by'=>$sess_user,
					);
					
		$this->mastersmodule->update_paymentmode_status($paymentmodeData,$id);
		 
		$this->session->set_flashdata('message', 'Payment Mode Deleted Successfully');
		redirect('masters/paymentmode');
	}


	/********************** Contact Location **********************/
	//** Loaction Search **//
	
	public function search_con_location($srarch_key="",$sort_order='location_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result = $this->mastersmodule->search_get_location($srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["location"] = $Result['rows'];
				
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='First';
				$config['last_link']='Last';
				$config['base_url'] = site_url('masters/search_con_location').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;
				
				$this->title = "Location";
				$this->keywords = "Location";
				$this->_render('pages/masters/contact_location/contact_location_list');
	}
	
	//** Loaction List **//
	
	public function con_location($sort_order='location_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_location($limit,$page,$sort_order,$sort_by);
		$this->data["location"] = $Result['rows'];
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/con_location').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Location";
		$this->keywords = "Location";
		$this->_render('pages/masters/contact_location/contact_location_list');
	}
	
	//** Add Loaction **//
	
	public function addcon_location()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['con_loc_add_details']))
		{
			$con_location = $this->security->xss_clean($this->input->post('con_location'));
			$con_number = $this->security->xss_clean($this->input->post('con_number'));
			$con_address = $this->security->xss_clean($this->input->post('con_address'));

			$locationval = $this->mastersmodule->locationvaildation($con_location);//** Loaction Validation **//
			if($locationval==0)
			{
				$locationdetails=array(
					'location_name'=>$con_location,
					'location_phone'=>$con_number,
					'location_address'=>$con_address,
					'location_status'=>'active',
					'location_created_by'=>$sess_user,
					'location_updated_by'=>$sess_user,
					'location_add_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->add_location($locationdetails);
				$this->session->set_flashdata('message', 'Location Details Added Successfully');
				redirect('masters/con_location');
			}
			else
			{
				$this->session->set_flashdata('message', 'Location name  Already Exist');
				redirect('masters/con_location');
			}
		}
		else
		{
			$this->title = "Add Location";
			$this->keywords = "Add Location";
			$this->_render('pages/masters/contact_location/add_contact_location');
		}
		
	}
	
	//** Edit Loaction **//
	
	public function editcon_location($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['con_loc_edit_details']))
		{
		
			$con_location = $this->security->xss_clean($this->input->post('con_location'));
			$con_number = $this->security->xss_clean($this->input->post('con_number'));
			$con_address = $this->security->xss_clean($this->input->post('con_address'));

			$locationval = $this->mastersmodule->editlocationvaildation($con_location,$id);//** Edit Loaction Validation **//
			if($locationval==0)
			{
			$locationdetails=array(
				'location_name'=>$con_location,
				'location_phone'=>$con_number,
				'location_address'=>$con_address,
				'location_updated_by'=>$sess_user,
				'location_update_date'=> date ('Y-m-d h:i:s'),
				);
			$this->mastersmodule->update_location($locationdetails, $id);
			$this->session->set_flashdata('message', 'Location Details Updated Successfully');
			redirect('masters/con_location');
			}
		
			{
			$this->session->set_flashdata('message', 'Location name  Already Exist');
			redirect('masters/con_location');
			}
		}
		else
		{
		$this->data['locationdata'] = $this->mastersmodule->getsingle_location($id);//** Get Single Location **//
		$this->title = "Edit Location";
		$this->keywords = "Edit Location";
		$this->_render('pages/masters/contact_location/edit_contact_location');
		}
	}
	
	//** View Loaction **//
	
	public function viewcon_location($id)
	{
		$this->data['locationdata'] = $this->mastersmodule->getsingle_location($id);
		$this->title = "Edit Location";
		$this->keywords = "Edit Location";
		$this->_render('pages/masters/contact_location/view_contact_location');
	}
	
	//**  Loaction Status **//
	
	public function deletelocation($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$locationData = array(
						'location_status' => $changeStatus,
						'location_update_date' => date('Y-m-d'),
						'location_updated_by'=>$sess_user,
					);
					
		$this->mastersmodule->update_location_status($locationData,$id);
		 
		$this->session->set_flashdata('message', 'Location Deleted Successfully');
		redirect('masters/con_location');
	}

	/************************  Bank Details **************/
	//** Bank Search **//
	
	public function search_bank($srarch_key="",$sort_order='bank_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result = $this->mastersmodule->search_get_bankdetails($srarch_key,$limit,$page,$sort_order,$sort_by);//** Get Bank search Details **//
				$this->data["bank_data"] = $Result['rows'];
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='First';
				$config['last_link']='Last';
				$config['base_url'] = site_url('masters/search_bank/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;
				
				$this->title = "Bank Mode";
				$this->keywords = "Bank Mode";
				$this->_render('pages/masters/bankdetail/bankdetail_list');
	}
	
	//** Bank List **//
	
	public function bank($sort_order='bank_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_bankdetails($limit,$page,$sort_order,$sort_by);//** Get Bank Details **//
		$this->data["bank_data"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/bank/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
		
		$this->title = "Bank Mode";
		$this->keywords = "Bank Mode";
		$this->_render('pages/masters/bankdetail/bankdetail_list');
	}

	//** Add Bank **//

	public function add_bank()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['bank_add_details']))
		{
			$bank_name = $this->security->xss_clean($this->input->post('bank_name'));
			$bank_desc = $this->security->xss_clean($this->input->post('bank_desc'));

			$banknameval = $this->mastersmodule->banknamevaildation($bank_name);//** Bank Validation **//
			if($banknameval==0)
			{
				$bank_details=array(
					'bank_name'=>$bank_name,
					'bank_desc'=>$bank_desc,
					'bank_status'=>'active',
					'bank_added_by'=>$sess_user,
					'bank_updated_by'=>$sess_user,
					'bank_add_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->add_bankdetails($bank_details);
				$this->session->set_flashdata('message', 'Bank Name Added Successfully');
				redirect('masters/bank');
			}
			else
			{
				$this->session->set_flashdata('message', 'Bank name  Already Exist');
				redirect('masters/bank');
			}
		}
		else
		{
			$this->title = "Bank Mode";
			$this->keywords = "Bank Mode";
			$this->_render('pages/masters/bankdetail/add_bankdetail');
		}
		
	}

	//** Edit Bank **//
	
	public function edit_bank($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['bank_update_details']))
		{
			$bank_name = $this->security->xss_clean($this->input->post('bank_name'));
			$bank_desc = $this->security->xss_clean($this->input->post('bank_desc'));

			$banknameval = $this->mastersmodule->editbanknamevaildation($bank_name, $id);//**Edit Bank Validation **//
			if($banknameval==0)
			{
				$bank_details=array(
					'bank_name'=>$bank_name,
					'bank_desc'=>$bank_desc,
					'bank_updated_by'=>$sess_user,
					'bank_update_date'=> date ('Y-m-d h:i:s'),
					);
				$this->mastersmodule->update_bankdetail($bank_details, $id);
				$this->session->set_flashdata('message', 'Bank Details  updated Successfully');
				redirect('masters/bank');
			}
			{
				$this->session->set_flashdata('message', 'Bank Name Already Exist');
				redirect('masters/bank');
			}
		}
		else
		{
			$this->data['bankdata'] = $this->mastersmodule->getsingle_bankdetails($id);//**Get Single Bank Details **//
			$this->title = "Edit Bank";
			$this->keywords = "Edit Bank";
			$this->_render('pages/masters/bankdetail/edit_bankdetail');
		}
	}
	
	//** View Bank **//
	
	public function view_bank($id)
	{
		$this->data['bankdata'] = $this->mastersmodule->getsingle_bankdetails($id);
		$this->title = "Edit Bank";
		$this->keywords = "Edit Bank";
		$this->_render('pages/masters/bankdetail/view_bankdetail');
	}
	
	//** Bank Status **//
	
	public function deletebankdetails($id,$status)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if($status == 'active')
		{
			$changeStatus = 'inactive';
		}
		else
		{
			$changeStatus = 'active';
		}
		
		$bank_details = array(
						'bank_status' => $changeStatus,
						'bank_updated_by'=>$sess_user,
						'bank_update_date'=> date ('Y-m-d h:i:s'),
					);
					
		$this->mastersmodule->update_bank_status($bank_details,$id);
		 
		$this->session->set_flashdata('message', 'Bank Details Deleted Successfully');
		redirect('masters/bank');
	}

	
	/********************* Region management ********************/
	
	//** Region Search **//
	
	public function search_region($srarch_key="",$sort_order='region_id',$sort_by='desc')
	{
			if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
				$page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				$limit =10;
				$Result=$this->mastersmodule->search_region_list($srarch_key,$limit,$page,$sort_order,$sort_by);
				$this->data["Region"] = $Result['rows'];	
				$config['prev_link']='Prev';
				$config['next_link']='Next';
				$config['first_link']='false';
				$config['last_link']='false';
				$config['base_url'] = site_url('masters/search_region').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				$config['total_rows'] = $Result['num_rows'];
				$config['per_page']= $limit;
				$config['uri_segment']=6;
				$config['num_link']=5;
				$this->pagination->initialize($config);
				$this->data['page_links'] = $this->pagination->create_links(); 
				$this->data["sort_order"]=$sort_order;
				$this->data["sort_by"]=$sort_by;  
				
				$this->title = "YAK ERP - REGION";
				$this->keywords = "YAK ERP";
				$this->_render('pages/masters/region/region_list');
	}
	
	//** Region List **//
	
	public function region($sort_order='region_id',$sort_by='desc')
	{
	  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
	  $limit =10;
	  $Result=$this->mastersmodule->region_list($limit,$page,$sort_order,$sort_by);
	  $this->data["Region"] = $Result['rows'];	
	  $config['prev_link']='Prev';
	  $config['next_link']='Next';
	  $config['first_link']='false';
	  $config['last_link']='false';
	  $config['base_url'] = site_url('masters/region').'/'.$sort_order.'/'.$sort_by; 
	  $config['total_rows'] = $Result['num_rows'];
	  $config['per_page']= $limit;
	  $config['uri_segment']=5;
	  $config['num_link']=5;
	  $this->pagination->initialize($config);
	  $this->data['page_links'] = $this->pagination->create_links(); 
	  $this->data["sort_order"]=$sort_order;
	  $this->data["sort_by"]=$sort_by;  
	 
	  $this->title = "YAK ERP - REGION";
	  $this->keywords = "YAK ERP";
	  $this->_render('pages/masters/region/region_list');
	}
	
	//** Add Region **//
	
	public function addregion()
	{ 
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		 	if(isset($_POST['city_add_details']))
			{
				$region_name = $this->input->post('region_name');
				$region_code = $this->input->post('region_code');
				$valid = $this->mastersmodule->valid_region($region_name);//** Region Validation **//
				if($valid == 0)
				{
			 		$Region_Data = array(
						'region_name' => $region_name,
						'region_code' => $region_code,
						'region_status' => 'enable',
						'region_created_by'=>$sess_user,
						'region_modified_by'=>$sess_user,
						'region_add_date' =>date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->add_region($Region_Data);
					$this->session->set_flashdata('message', 'Region Added Successfully');
					redirect('masters/region');
				}
				else
				{
					$this->session->set_flashdata('message', 'Region Name Already Exist.');
					redirect('masters/region');
				}
			}
			else
			{
			$this->title = "ERP  - REGION";
			$this->keywords = "ERP";
			$this->_render('pages/masters/region/add_region');
			}
	}
	
	//** Edit Region **//
	
	public function editregion($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['city_update_details']))
			{
				$region_name = $this->input->post('region_name');
				$region_code = $this->input->post('region_code');
			 
			 		$Region_Data = array(
						'region_name' => $region_name,
						'region_code' => $region_code,
						'region_status' => 'enable',
						'region_modified_by'=>$sess_user,
						'region_update_date' =>date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->Update_region($id, $Region_Data);
					$this->session->set_flashdata('message', 'Region Updated Successfully');
					redirect('masters/region');
			 
			}
			else
			{
				$this->data['region'] = $this->mastersmodule->get_singleregion($id);//** Get Single Region **//
				$this->title = "ERP - Region";
				$this->keywords = "ERP";
				$this->_render('pages/masters/region/edit_region');
			}
	}
	
	//** View Region **//
	public function viewregion($id)
	{
		$this->data['region'] = $this->mastersmodule->get_singleregion($id);
		$this->title = "ERP - Region";
		$this->keywords = "ERP";
		$this->_render('pages/masters/region/view_region');
	}
	
	//** Region Status **//
	
	public function deleteregion($id,$status)
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
		
		$region_Data = array(
						'region_status' => $changeStatus,
						'region_update_date' => date('Y-m-d'),
						'region_modified_by'=>$sess_user,
					);
					
		$this->mastersmodule->update_region_status($region_Data,$id);
		 
		$this->session->set_flashdata('message', 'Region Deleted Successfully');
		redirect('masters/region');
	}
	
	/*************** Zone management *****************/
	//** Zone Search **//
	
	public function search_zone($srarch_key="",$sort_order='zone_id',$sort_by='desc')
	{
	  if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}
			  $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
			  $limit =10;
			  $Result=$this->mastersmodule->search_zone_list($srarch_key,$limit,$page,$sort_order,$sort_by);
			  $this->data["zone"] = $Result['rows'];	
			  $config['prev_link']='Prev';
			  $config['next_link']='Next';
			  $config['first_link']='false';
			  $config['last_link']='false';
			  $config['base_url'] = site_url('masters/search_zone').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
			  $config['total_rows'] = $Result['num_rows'];
			  $config['per_page']= $limit;
			  $config['uri_segment']=6;
			  $config['num_link']=5;
			  $this->pagination->initialize($config);
			  $this->data['page_links'] = $this->pagination->create_links(); 
			  $this->data["sort_order"]=$sort_order;
			  $this->data["sort_by"]=$sort_by;  
		 
			  $this->title = "YAK ERP - REGION";
			  $this->keywords = "YAK ERP";
			  $this->_render('pages/masters/zone/zone_list');
	}
	
	//** Zone List **//
	
	public function zone($sort_order='zone_id',$sort_by='desc')
	{
	  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
	  $limit =10;
	  $Result=$this->mastersmodule->zone_list($limit,$page,$sort_order,$sort_by);
	  $this->data["zone"] = $Result['rows'];	

	  $config['prev_link']='Prev';
	  $config['next_link']='Next';
	  $config['first_link']='false';
	  $config['last_link']='false';
	  $config['base_url'] = site_url('masters/zone').'/'.$sort_order.'/'.$sort_by; 
	  $config['total_rows'] = $Result['num_rows'];
	  $config['per_page']= $limit;
	  $config['uri_segment']=5;
	  $config['num_link']=5;
	  $this->pagination->initialize($config);
	  $this->data['page_links'] = $this->pagination->create_links(); 
	  $this->data["sort_order"]=$sort_order;
	  $this->data["sort_by"]=$sort_by;  
 
	  $this->title = "YAK ERP - REGION";
	  $this->keywords = "YAK ERP";
	  $this->_render('pages/masters/zone/zone_list');
	}
	
	//** Zone Add **//
	
	public function add_zone()
 	{
	  $sessionData = $this->session->userdata('userlogin');
	  $sess_user=$sessionData['user_id'];
	  $Result_region=$this->mastersmodule->get_allregion();//** Get All Region **//
	  $this->data["region"] = $Result_region['rows'];
	  
    	if(isset($_POST['state_add_details']))
 			{
				$region_name = $this->input->post('region_name');
				$zone_name = $this->input->post('zone_name');
				$zone_code = $this->input->post('zone_code');
				$stateval = $this->mastersmodule->valid_zone($region_name, $zone_name);//** Zone Validation **//
				if($stateval==0)
				{
					$zone_data = array(
						'zone_region_id' => $region_name,
						'zone_name' => $zone_name,
						'zone_code' => $zone_code,
						'zone_status' => 'enable',
						'zone_added_by' =>$sess_user,
						'zone_updated_by'=>$sess_user,
						'zone_add_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->add_zone($zone_data);
					$this->session->set_flashdata('message', 'Zone Added Successfully');
					redirect('masters/zone');
				}
				else
				{
					$this->session->set_flashdata('message', 'Zone Name Already Exist');
				    redirect('masters/zone');
				}
			 }
			else
			{		
			  $this->title = "YAK ERP - Zone";
			  $this->keywords = "YAK ERP";
			  $this->_render('pages/masters/zone/add_zone');
			}
	}
	
	//** Gone Edit **//
	
 	public function edit_zone($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
 		$Result_region=$this->mastersmodule->get_allregion();//** Get All Region **//
	  	$this->data["region"] = $Result_region['rows'];
     	if(isset($_POST['state_edit_details']))
 		{
				$region_name = $this->input->post('region_name');
				$zone_name = $this->input->post('zone_name');
				$zone_code = $this->input->post('zone_code');
				
 				$zone_Data = array(
						'zone_region_id' => $region_name,
						'zone_name' => $zone_name,
						'zone_code' => $zone_code,
						'zone_status' => 'enable',
						'zone_updated_by'=>$sess_user,
						'zone_updated_date' => date ('Y-m-d h:i:s'),
						);
				$this->mastersmodule->Update_zone($id, $zone_Data);
				$this->session->set_flashdata('message', 'Zone Updated Successfully');
				redirect('masters/zone');
		}
		else
		{
			  $this->data['Zone'] = $this->mastersmodule->get_singleZone($id);	 //** Get Single Zone **//
			  $this->title = "ERP - Edit Zone";
			  $this->keywords = "ERP";
			  $this->_render('pages/masters/zone/edit_zone');
		}
	  }
	  
	//** View Zone **//
	
	public function view_zone($id)
	{
		$Result_region=$this->mastersmodule->get_allregion();//** Get All Region **//
		$this->data["region"] = $Result_region['rows'];
		$this->data['Zone'] = $this->mastersmodule->get_singleZone($id);	//** Get Single Zone **//
		$this->title = "ERP - View Zone";
		$this->keywords = "ERP";
		$this->_render('pages/masters/zone/view_zone');
	}
	 
	 //** Zone Status **//
	 
	public function deletezone($id,$status)
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
		
		$zone_Data = array(
						'zone_status' => $changeStatus,
						'zone_updated_date' => date('Y-m-d'),
						'zone_updated_by'=>$sess_user,
					);
					
		$this->mastersmodule-> update_zone_status($zone_Data,$id);
		 
		$this->session->set_flashdata('message', 'Zone Deleted Successfully');
		redirect('masters/zone');
	} 
	
	
	/**************** Area management  *******************/
	//** Search Area **//

	public function search_area($srarch_key="",$sort_order='area_id',$sort_by='desc')
	{
		if($srarch_key == "")
			{
		  		$srarch_key = $this->security->xss_clean($this->input->post('search_name'));
			}

				  $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
				  $limit =10;
				  $Result=$this->mastersmodule->search_area_list($srarch_key,$limit,$page,$sort_order,$sort_by);
				  $this->data["area"] = $Result['rows'];	
				  $config['prev_link']='Prev';
				  $config['next_link']='Next';
				  $config['first_link']='false';
				  $config['last_link']='false';
				  $config['base_url'] = site_url('masters/search_area/').'/'.$srarch_key.'/'.$sort_order.'/'.$sort_by; 
				  $config['total_rows'] = $Result['num_rows'];
				  $config['per_page']= $limit;
				  $config['uri_segment']=6;
				  $config['num_link']=5;
				  $this->pagination->initialize($config);
				  $this->data['page_links'] = $this->pagination->create_links(); 
				  $this->data["sort_order"]=$sort_order;
				  $this->data["sort_by"]=$sort_by;  
			   
				  $this->title = "YAK ERP - AREA";
				  $this->keywords = "YAK ERP";
				  $this->_render('pages/masters/area/area_list');
	}
	
	//** Area List **//
	
	public function area($sort_order='area_id',$sort_by='desc')
	{
	  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
	  $limit =10;
	  $Result=$this->mastersmodule->area_list($limit,$page,$sort_order,$sort_by);
	  $this->data["area"] = $Result['rows'];	
	  $config['prev_link']='Prev';
	  $config['next_link']='Next';
	  $config['first_link']='false';
	  $config['last_link']='false';
	  $config['base_url'] = site_url('masters/area/').'/'.$sort_order.'/'.$sort_by; 
	  $config['total_rows'] = $Result['num_rows'];
	  $config['per_page']= $limit;
	  $config['uri_segment']=5;
	  $config['num_link']=5;
	  $this->pagination->initialize($config);
	  $this->data['page_links'] = $this->pagination->create_links(); 
	  $this->data["sort_order"]=$sort_order;
	  $this->data["sort_by"]=$sort_by;  
   
	  $this->title = "YAK ERP - AREA";
	  $this->keywords = "YAK ERP";
	  $this->_render('pages/masters/area/area_list');
	}
	
	//** Add Area **//
	
	public function add_area()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$Result_region=$this->mastersmodule->get_allregion();//** Get All Region **//
		$this->data["region"] = $Result_region['rows'];
		$Result_zone=$this->mastersmodule->get_allzone();//** Get All Zone **//
		$this->data["zone"] = $Result_zone['rows'];
	  
    	if(isset($_POST['state_add_details']))
 			{
				$area_region_id = $this->input->post('region_name');
				$area_zone_id = $this->input->post('zone_name');
				$area_name = $this->input->post('area_name');
				$area_code = $this->input->post('area_code');
				
				$stateval = $this->mastersmodule->valid_area($area_region_id, $area_zone_id, $area_name); //** Area Validation **//
				if($stateval==0)
				{
					$area_data = array(
						'area_region_id' => $area_region_id,
						'area_zone_id' => $area_zone_id,
						'area_name' => $area_name,
						'area_code' => $area_code,
						'area_status' => 'enable',
						'area_added_by'=>$sess_user,
						'area_updated_by'=>$sess_user,
						'area_add_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->add_area($area_data);
					$this->session->set_flashdata('message', 'Area Added Successfully');
					redirect('masters/area');
				}
				else
				{
					$this->session->set_flashdata('message', 'Area Name Already Exist');
				    redirect('masters/area');
				}
			 }
			else
			{		
			  $this->title = "YAK ERP - Zone";
			  $this->keywords = "YAK ERP";
			  $this->_render('pages/masters/area/add_area');
			}
	}
	
	//** Edit Area **//
	
	public function edit_area($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$Result_region=$this->mastersmodule->get_allregion();//** Get All Region **//
		$this->data["region"] = $Result_region['rows'];
		$Result_zone=$this->mastersmodule->get_allzone();//** Get All Zone **//
		$this->data["zone"] = $Result_zone['rows'];
	  
     	if(isset($_POST['state_edit_details']))
 		{
			$area_region_id = $this->input->post('region_name');
			$area_zone_id = $this->input->post('zone_name');
			$area_name = $this->input->post('area_name');
			$area_code = $this->input->post('area_code');
				
 			$area_data = array(
						'area_region_id' => $area_region_id,
						'area_zone_id' => $area_zone_id,
						'area_name' => $area_name,
						'area_code' => $area_code,
						'area_status' => 'enable',
						'area_updated_by'=>$sess_user,
						'area_update_date' => date ('Y-m-d h:i:s'),
						);
					$this->mastersmodule->Update_area($id, $area_data);
					$this->session->set_flashdata('message', 'Area Updated Successfully');
					redirect('masters/area');
		}	 
		else
		{
			  $this->data['Area'] = $this->mastersmodule->get_singlearea($id);	//** Get Single Area **//
			  $this->title = "ERP - Edit Area";
			  $this->keywords = "ERP";
			  $this->_render('pages/masters/area/edit_area');
		}
	 }
	
	//** View Area **//
		
	public function view_area($id)
	{
			$Result_region=$this->mastersmodule->get_allregion();//** Get All Region **//
			$this->data["region"] = $Result_region['rows'];
			$Result_zone=$this->mastersmodule->get_allzone();//** Get All Zone **//
			$this->data["zone"] = $Result_zone['rows'];
			$this->data['Area'] = $this->mastersmodule->get_singlearea($id);//** Get Single Area **//

			$this->title = "ERP - View Area";
			$this->keywords = "ERP";
			$this->_render('pages/masters/area/view_area');
	}
	
	//** Delete Area **//
		
	public function deletearea($id,$status)
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
		
		$area_Data = array(
						'area_status' => $changeStatus,
						'area_update_date' => date('Y-m-d'),
						'area_updated_by'=>$sess_user,
					);
					
		$this->mastersmodule-> update_area_status($area_Data,$id);
		 
		$this->session->set_flashdata('message', 'Area Deleted Successfully');
		redirect('masters/area');
	} 

	////////////////////////Add Module	/////////////////
	
	
	public function newmodule($sort_order='module_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_module_list($limit,$page,$sort_order,$sort_by);
		$this->data["module"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/newmodule').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by; 
		
		$this->title = "Add Module";
		$this->keywords = "Add Module";
		$this->_render('pages/masters/module/module_list');
	}
	
	public function addnewmodule()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if(isset($_POST['add_module']))
		{

			$module_name = $this->security->xss_clean($this->input->post('module_name'));
			$mod_desc = $this->security->xss_clean($this->input->post('mod_desc'));

			$mod_val = $this->mastersmodule->modulevaildation($module_name);
			
			if($mod_val==0)
			{
			$moduledetails=array(
				'module_name'=>$module_name,
				'module_decription'=>$mod_desc,
				'module_add_date'=> date ('Y-m-d h:i:s'),
				);
			$mod_id=$this->mastersmodule->add_module_data($moduledetails);
			
			
			$get_usr_grp=$this->mastersmodule->get_usergrp_module();
			$get_module=$this->mastersmodule->get_module();
			
		
			foreach($get_usr_grp as $USRG)
			{
				
				$user_grp_module_detail=array(
				'user_group_id'=>$USRG['group_id'],
				'module_id'=>$mod_id,
				'add_option'=>'0',
				'edit_option'=>'0',
				'delete_option'=>'0',
				'view_option'=> '0',
				'import_option'=> '0',
				'export_option'=> '0',
				'status_change'=> '0',
				'update_date'=> date ('Y-m-d h:i:s')
				);
			
				$this->mastersmodule->add_grp_module_detail($user_grp_module_detail,$USRG['group_id'],$mod_id);
			}
			
			$vernalsoft_groupe_id='1';
			
			$user_vernalsoft_module_detail=array(
				'user_group_id'=>$vernalsoft_groupe_id,
				'module_id'=>$mod_id,
				'add_option'=>'1',
				'edit_option'=>'1',
				'delete_option'=>'1',
				'view_option'=> '1',
				'import_option'=> '1',
				'export_option'=> '1',
				'status_change'=> '1',
				'update_date'=> date ('Y-m-d h:i:s')
				);
		
			$this->mastersmodule->add_vernalsoft_module_detail($user_vernalsoft_module_detail,$vernalsoft_groupe_id);
			
			$this->session->set_flashdata('message', 'Module  Added Successfully');
			redirect('masters/newmodule');
			}
		else
			{
			$this->session->set_flashdata('message', 'Module name  Already Exist');
			redirect('masters/addnewmodule');
			}
		}
		else
		{
		$this->title = "Add Module";
		$this->keywords = "Add Module";
		$this->_render('pages/masters/module/add_module');
		}
		
	}
	
	public function editmodule($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		if(isset($_POST['update_module']))
		{
			$module_name = $this->security->xss_clean($this->input->post('module_name'));
			$mod_desc = $this->security->xss_clean($this->input->post('mod_desc'));
		
			
			$module_val = $this->mastersmodule->editmodulevaildation($module_name, $id);
			//echo $module_val; exit;
			if($module_val==0)
			{
			$moduledetails=array(
				'module_name'=>$module_name,
				'module_decription'=>$mod_desc,
				'module_update_date'=> date ('Y-m-d h:i:s'),
				);
			
			$this->mastersmodule->update_module_details($moduledetails, $id);
			$this->session->set_flashdata('message', 'Module Details  updated Successfully');
			redirect('masters/newmodule');
			}
			else
			{
			$this->session->set_flashdata('message', 'Module Name Already Exist');
			redirect('masters/editmodule/'.'/'.$id);
			}
		}
		else
		{
		$this->data['moduledata'] = $this->mastersmodule->getsingle_module($id);
		$this->title = "Update Module";
		$this->keywords = "Update Module";
		$this->_render('pages/masters/module/edit_module');
	
		}
	}
	
	public function viewmodule($id)
	{
		$this->data['moduledata'] = $this->mastersmodule->getsingle_module($id);
		$this->title = "Update Module";
		$this->keywords = "Update Module";
		$this->_render('pages/masters/module/view_module');
	}
	////////////////////COMPANY DETAILS ////////////////////////////////
	
	public function newcompany($sort_order='company_id',$sort_by='desc')
	{
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_company_list($limit,$page,$sort_order,$sort_by);
		$this->data["company"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/newcompany').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;  
		
		$this->title = "Add Module";
		$this->keywords = "Add Module";
		$this->_render('pages/masters/company/company_list');
	}
	
	/* public function addcompany()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if(isset($_POST['add_module']))
		{

			$module_name = $this->security->xss_clean($this->input->post('module_name'));
			$mod_desc = $this->security->xss_clean($this->input->post('mod_desc'));

			$mod_val = $this->mastersmodule->modulevaildation($module_name);
			
			if($mod_val==0)
			{
			$moduledetails=array(
				'module_name'=>$module_name,
				'module_decription'=>$mod_desc,
				'module_add_date'=> date ('Y-m-d h:i:s'),
				);
			$mod_id=$this->mastersmodule->add_module_data($moduledetails);
			
			
			$get_usr_grp=$this->mastersmodule->get_usergrp_module();
			$get_module=$this->mastersmodule->get_module();
			
		
			foreach($get_usr_grp as $USRG)
			{
				
				$user_grp_module_detail=array(
				'user_group_id'=>$USRG['group_id'],
				'module_id'=>$mod_id,
				'add_option'=>'0',
				'edit_option'=>'0',
				'delete_option'=>'0',
				'view_option'=> '0',
				'import_option'=> '0',
				'export_option'=> '0',
				'status_change'=> '0',
				'update_date'=> date ('Y-m-d h:i:s')
				);
			
				$this->mastersmodule->add_grp_module_detail($user_grp_module_detail,$USRG['group_id'],$mod_id);
			}
			
			$vernalsoft_groupe_id='1';
			
			$user_vernalsoft_module_detail=array(
				'user_group_id'=>$vernalsoft_groupe_id,
				'module_id'=>$mod_id,
				'add_option'=>'1',
				'edit_option'=>'1',
				'delete_option'=>'1',
				'view_option'=> '1',
				'import_option'=> '1',
				'export_option'=> '1',
				'status_change'=> '1',
				'update_date'=> date ('Y-m-d h:i:s')
				);
		
			$this->mastersmodule->add_vernalsoft_module_detail($user_vernalsoft_module_detail,$vernalsoft_groupe_id);
			
			$this->session->set_flashdata('message', 'Module  Added Successfully');
			redirect('masters/newmodule');
			}
		else
			{
			$this->session->set_flashdata('message', 'Module name  Already Exist');
			redirect('masters/addnewmodule');
			}
		}
		else
		{
		$this->title = "Add Company";
		$this->keywords = "Add Company";
		$this->_render('pages/masters/company/addcompany');
		}
		
	} */
	
	
	
	
	/////////////////////////Edit User  Preferenceses ////////////////
	
	public function edit_profile($id)
	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		if ($id != $sess_user)
		{
			$this->session->set_flashdata('message', 'Access Denied');
			redirect('masters');
		
		}
		
		    $Result_state=$this->mastersmodule->get_allstate();
		 	$this->data["state"] = $Result_state['rows'];	
		 	$res_cont= $this->mastersmodule->get_allcountry();
		  	$this->data["ctry"] = $res_cont['rows'];
		  	$res_city=$this->mastersmodule->get_allcity();
		  	$this->data["city"] = $res_city['rows'];
		  	$res_grp_name=$this->mastersmodule->get_allusr_grp();
		  	$this->data["usr_gup"] = $res_grp_name['rows'];

		  	if(isset($_POST['updateprofile_details']))
			{
				$first_name = $this->security->xss_clean($this->input->post('first_name'));
				$last_name = $this->security->xss_clean($this->input->post('last_name'));
				$mob = $this->security->xss_clean($this->input->post('mob'));
				$email = $this->security->xss_clean($this->input->post('email'));
				
				$street = $this->security->xss_clean($this->input->post('street'));
				$con_name = $this->security->xss_clean($this->input->post('con_name'));
				$state_name = $this->security->xss_clean($this->input->post('state_name'));
				$city_name = $this->security->xss_clean($this->input->post('city_name'));
				$zip_code = $this->security->xss_clean($this->input->post('zip_code'));

				$userval = $this->mastersmodule->editprofile_vaildation($email, $id);
				if($userval==0)
				{
				$userdata = array(
						'user_first_name' => $first_name,
						'user_last_name' => $last_name,
						'user_phone' => $mob,
						'user_email' => $email,
						'user_address' => $street,
						'user_country' => $con_name,
						'user_state' => $state_name,
						'user_city' => $city_name,
						'user_zipcode' => $zip_code,
						'user_modified_by' => $sess_user,
						'user_status' => 'enable',
						'user_update_date' =>date ('Y-m-d h:i:s'),
						);
				    $this->mastersmodule->update_user($userdata, $id);
					$this->session->set_flashdata('message', 'Profile Updated Successfully');
					redirect('masters/edit_profile/'.'/'.$id);
				}
				else
				{
					$this->session->set_flashdata('message', 'User details or Email Already Exist');
					redirect('masters/edit_profile/'.'/'.$id);
				}
			}
			
		else
		{
		$this->data['editprofiledetails'] = $this->mastersmodule->get_singleuser($id);
		//
		$this->title = "Edit Profile";
		$this->keywords = "Edit Profile";
		$this->_render('pages/editprofile');
		}
	
	}
	
		
	//****BOM Group ****//
	
	public function bomgroup($sort_order='bomgroup_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_bomgroup($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["pro_type"] = $Result['rows'];
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/bomgroup/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "BOM Group";
		$this->keywords = "BOM Group";
		$this->_render('pages/masters/bomgroup/bomgroup_list');	
	}
	
	//** Add BOM Group **//
	
	public function addbomgroup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['add_bomgroup']))
		{
			$process = $this->security->xss_clean($this->input->post('process'));
			$group_name = $this->security->xss_clean($this->input->post('group_name'));
			//$bomcat = $this->security->xss_clean($this->input->post('bomcat'));
			
			$bomcat = implode(",", $this->security->xss_clean($this->input->post('bomcat')));
			$title = $this->security->xss_clean($this->input->post('title'));
			$status = $this->security->xss_clean($this->input->post('status'));
            
			$pro_typ_val = $this->mastersmodule->bomgroup_vaildation($sess_company_id, $group_name);//** BOM Group Validation **//
			if($pro_typ_val==0)
			{
				
			
				$pro_type=array(
					'processmaster_bomgroup_id' =>$process,
					'bomgroup_name'=>$group_name,
					'bomcat_bomgroup_id'=>$bomcat,
					'bomgroup_title'=>$title,
					'bomgroup_stat'=>$status,
					'bomgroup_created_by' =>$sess_user,
					'bomgroup_modified_by' =>$sess_user,
					'bomgroup_add_dt' => date ('Y-m-d h:i:s'),
					'bomgroup_status' => 'enable',
					);
              //   echo "<pre>"; print_r($pro_type); exit;
					
				$this->mastersmodule->add_bomgroup($pro_type);	
				$this->session->set_flashdata('message', 'BOM Group Added Successfully');
				redirect('masters/bomgroup');
		    }
			else
			{
				$this->session->set_flashdata('message', 'BOM Group Already Exist');
				redirect('masters/bomgroup');
			}
		}
		else
		{
			$this->data["process_group"] = $this->mastersmodule->get_all_processmaster(); //** Get All Company's **//
			$this->data["bom_category"] = $this->mastersmodule->get_all_bomcategory(); //** Get All Company's **//
			$this->title = "BOM Group";
			$this->keywords = "BOM Group";
			$this->_render('pages/masters/bomgroup/add_bomgroup');
		}
	}
	
	//** Edit BOM Group **//
	
	public function editbomgroup($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['edit_bom_group']))
		{	
			$process = $this->security->xss_clean($this->input->post('process'));
			$group_name = $this->security->xss_clean($this->input->post('group_name'));
			//$bomcat = $this->security->xss_clean($this->input->post('bomcat'));
			
			$bomcat = implode(",", $this->security->xss_clean($this->input->post('bomcat')));
			$title = $this->security->xss_clean($this->input->post('title'));
			$status = $this->security->xss_clean($this->input->post('status'));

			//$pro_typ_val = $this->mastersmodule->editbom_grp_validation($sess_company_id,$group_name);//** BOM Group Validation for Update **//
			if($pro_typ_val==0)
			{

				$pro_typedtails=array(
					'bomgroup_id' =>$id,
					'processmaster_bomgroup_id' =>$process,
					'bomgroup_name'=>$group_name,
					'bomcat_bomgroup_id'=>$bomcat,
					'bomgroup_title'=>$title,
					'bomgroup_stat'=>$status,
					'bomgroup_created_by' =>$sess_user,
					'bomgroup_modified_by' =>$sess_user,
					'bomgroup_update_dt' => date ('Y-m-d h:i:s'),
					'bomgroup_status' => 'enable',
					);
					
					//echo "<pre>"; print_r($pro_typedtails); exit;
				$this->mastersmodule->update_bomgroup($pro_typedtails ,$id);	
				$this->session->set_flashdata('message', 'BOM Group Updated Successfully');
				redirect('masters/bomgroup');
			}
			else
			{
				$this->session->set_flashdata('message', 'BOM Group Already Exist');
				redirect('masters/bomgroup');
			}
		}
		else
		{
		$this->data["process_group"] = $this->mastersmodule->get_all_processmaster(); //** Get All Company's **//
		$this->data['bomgroup'] = $this->mastersmodule->getsingle_bomgroup($id); //**Get Single BOM Group **//
		$this->data["bom_category"] = $this->mastersmodule->get_all_bomcategory(); //** Get All Company's **//
		//print_r($this->data['bomgroup']); exit;
		$this->title = "Update BOM Group";
		$this->keywords = "Update BOM Group";
		$this->_render('pages/masters/bomgroup/edit_bomgroup');
		}
	}
	
	//** View BOM Group **//

	public function viewbomgroup($id)
	{
		$this->data['bomgroup'] = $this->mastersmodule->getsingle_bomgroup($id);//**Get Single BOM Group **//
		//print_r($this->data['bomgroup']); exit;
		$this->title = "BOM Group";
		$this->keywords = "BOM Group";
		$this->_render('pages/masters/bomgroup/view_bomgroup');
	}
	public function search_bomgroup($sort_order='',$sort_by='desc')
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
		  	$Result = $this->mastersmodule->get_search_bom_group($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by);
			//echo"<pre>"; print_r($Result); exit;
			
		  	$this->data["pro_type"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/search_bomgroup/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "BOM Group";
			$this->keywords = "BOM Group";
			$this->_render('pages/masters/bomgroup/bomgroup_list');	
	}
	//** BOM Group status**//
	public function bomgroup_status($id,$status)
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
				  'bomgroup_status' => $changeStatus,
				  'bomgroup_modified_by' =>$sess_user,
				  'bomgroup_update_dt' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->update_bom_status($pro_type_data, $id);
		$this->session->set_flashdata('message', 'BOM Group Changed Successfully');
		redirect('masters/bomgroup');
	}

		//** BOM Category **//
	
		public function bom_category($sort_order='bom_category_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->mastersmodule->get_bom_cat($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["pro_type"] = $Result['rows'];

		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('masters/bom_category/').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "BOM Category";
		$this->keywords = "BOM Category";
		$this->_render('pages/masters/bomcategory/bom_category_list');	
	}
	
	//** Add BOM Category **//
	
	public function addbom_category()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['add_bom_cat_type']))
		{
			$bom_category_id = $this->security->xss_clean($this->input->post('bom_category_id'));
			$bom_category_name = $this->security->xss_clean($this->input->post('bom_category_name'));
			$prefix = $this->security->xss_clean($this->input->post('prefix'));
			$cat_type = $this->security->xss_clean($this->input->post('cat_type'));

			$pro_typ_val = $this->mastersmodule->bom_cat_vaildation($sess_company_id, $bom_category_name, $prefix);//** Product Type Validation **//
			if($pro_typ_val==0)
			{

				$pro_type=array(
					'bom_category_id' =>$bom_category_id,
					'bom_category_name'=>$bom_category_name,
					'bom_cat_stat'=>$prefix,
					'bom_category_type_id'=>$cat_type,
					'bom_category_created_by' =>$sess_user,
					'bom_category_modified_by' =>$sess_user,
					'bom_category_add_dt' => date ('Y-m-d h:i:s'),
					'bom_category_status' => 'enable',
					);
				$this->mastersmodule->add_bom_cat_type($pro_type);	
				$this->session->set_flashdata('message', 'BOM Category Added Successfully');
				redirect('masters/bom_category');
		    }
			else
			{
				$this->session->set_flashdata('message', 'BOM Category Already Exist');
				redirect('masters/bom_category');
			}
		}
		else
		{
			$this->data["category_type"] = $this->mastersmodule->get_all_bomcat_type(); 
			$this->title = "BOM Category";
			$this->keywords = "BOM Category";
			$this->_render('pages/masters/bomcategory/add_bom_category');
		}
	}
	
	//** Edit BOM Category **//
	
	public function editbom_category($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company_id=$sessionData['company_id'];

		if(isset($_POST['edit_bom_cat']))
		{	
			$bom_category_id = $this->security->xss_clean($this->input->post('bom_category_id'));
			$bom_category_name = $this->security->xss_clean($this->input->post('bom_category_name'));
			$prefix = $this->security->xss_clean($this->input->post('prefix'));
			$cat_type = $this->security->xss_clean($this->input->post('cat_type'));


			$pro_typ_val = $this->mastersmodule->editbom_cat_vaildation($sess_company_id,$construction_type_name, $prefix, $id);//** Product Type Validation for Update **//
			if($pro_typ_val==0)
			{

				$pro_typedtails=array(
					'bom_category_id' =>$id,
					'bom_category_name'=>$bom_category_name,
					'bom_cat_stat'=>$prefix,
					'bom_category_type_id'=>$cat_type,
					'bom_category_created_by' =>$sess_user,
					'bom_category_modified_by' =>$sess_user,
					'bom_category_update_dt' => date ('Y-m-d h:i:s'),
					'bom_category_status' => 'enable',
					);
				$this->mastersmodule->update_bom_cat($pro_typedtails ,$id);	
				$this->session->set_flashdata('message', 'BOM Category Updated Successfully');
				redirect('masters/bom_category');
			}
			else
			{
				$this->session->set_flashdata('message', 'BOM Category Already Exist');
				redirect('masters/bom_category');
			}
		}
		else
		{
		$this->data["category_type"] = $this->mastersmodule->get_all_bomcat_type(); 
		
		$this->data['bomtypedata'] = $this->mastersmodule->getsingle_bom_cat($id); //**Get Single Product Type **//
		//print_r($this->data['bomtypedata']); exit;
		$this->title = "Update BOM Category";
		$this->keywords = "Update BOM Category";
		$this->_render('pages/masters/bomcategory/edit_bom_category');
		}
	}
	
	//** View BOM Category **//

	public function viewbom_category($id)
	{
		$this->data["category_type"] = $this->mastersmodule->get_all_bomcat_type(); 
		$this->data['bomtypedata'] = $this->mastersmodule->getsingle_bom_cat($id);//**Get Single Product Type **//
		//print_r($this->data['bomtypedata']); exit;
		$this->title = "BOM Category";
		$this->keywords = "BOM Category";
		$this->_render('pages/masters/bomcategory/view_bom_category');
	}
	public function search_bomcategory($sort_order='bom_category_id',$sort_by='desc')
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
		  	$Result = $this->mastersmodule->get_search_bomcat_type($sess_group,$sess_company,$search_pro_typ,$search_pro_prefix,$limit,$page,$sort_order,$sort_by);
		  	$this->data["pro_type"] = $Result['rows'];

		    $config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('masters/search_constructiontype/').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			$this->title = "BOM Category";
			$this->keywords = "BOM Category";
			$this->_render('pages/masters/bomcategory/bom_category_list');	
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
				  'bom_category_status' => $changeStatus,
				  'bom_category_modified_by' =>$sess_user,
				  'bom_category_update_dt' => date('Y-m-d h:i:s'),
			  );
		$this->mastersmodule->updatebomcatstatus($pro_type_data, $id);
		$this->session->set_flashdata('message', 'BOM Category Changed Successfully');
		redirect('masters/bom_category');
	}
	
	
	public function changepassword($userId)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
	if($userId == $sess_user)
	{
	 
		if(isset($_POST['changepwd']))
		{
			$currentPassword =$this->security->xss_clean($this->input->post('currentPassword'));
			$newPassword =$this->security->xss_clean($this->input->post('newPassword'));
			$confirmPassword =$this->security->xss_clean($this->input->post('confirmPassword'));
			
			$data = array(
				'user_pwd' => md5($newPassword),
				'user_update_date' => date ('Y-m-d h:i:s'),
			);
				
			$this->mastersmodule->ChangePassword($userId, $data);
			$this->session->set_flashdata('message', 'Password Changed Successfully');
			redirect('masters/changepassword/'.'/'.$userId);
		} 
		else
		{
			$this->data['password'] = $this->mastersmodule->get_userpassword($userId);
			$this->title = "Change Password";
			$this->keywords = "Change Password";
			
			$this->_render('pages/changepassword');
		}
	
	}
	else
		{
		
		redirect('masters');
			
		}
	}
 
	public function changeuserpassword($userId)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
	if($userId == $sess_user)
	{
	 
		if(isset($_POST['changepwd']))
		{
			//echo "123"; exit;
			$Cus_UserId =$this->security->xss_clean($this->input->post('UserId'));
			$newPassword =$this->security->xss_clean($this->input->post('newPassword'));
			$confirmPassword =$this->security->xss_clean($this->input->post('confirmPassword'));
			
			$ret_userID = $this->mastersmodule->get_userDetails($Cus_UserId);
			//echo "<pre>"; print_r($ret_userID['num_rows']); exit;
			
			if($ret_userID['num_rows'] == 1)
			{
			$data = array(
				'user_pwd' => md5($newPassword),
				'user_update_date' => date ('Y-m-d h:i:s'),
			);
				
			$this->mastersmodule->ChangeUserPassword($Cus_UserId, $data);
			$this->session->set_flashdata('message', 'User Password Changed Successfully');
			redirect('masters/changeuserpassword/'.'/'.$userId);
			}
			else
			{
			$this->session->set_flashdata('message', 'Please Enter Correct User ID');
			redirect('masters/changeuserpassword/'.'/'.$userId);
			}
		} 
		else
		{
			$this->data['password'] = $this->mastersmodule->get_userpassword($userId);
			$this->title = "Change User Password";
			$this->keywords = "Change User Password";
			
			$this->_render('pages/changeuserpassword');
		}
	
	}
	else
		{
		
		redirect('masters');
			
		}
	}
 
	
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */