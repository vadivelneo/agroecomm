<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricebook extends MY_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('pricebookmodule');
		 $this->load->model('mastersmodule');
		  
		 $this->load->library('pagination');
		  
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
		redirect('pricebook/list_pricebook');
	}
	
public function search_pricebook($sort_order='price_book_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$price_book_name = $this->security->xss_clean($this->input->post('search_price_book_name'));
			$price_book_code = $this->security->xss_clean($this->input->post('search_price_book_code'));
			
			$pricebook_search= array(
					'search_price_book_name' => $price_book_name,
					'search_price_book_code' => $price_book_code,
					
					);	
			$this->session->set_userdata('price_book_data',$pricebook_search);
		}
			$search_data = $this->session->userdata('price_book_data');
						
			$search_price_book_name = $search_data['search_price_book_name'];
			$search_price_book_code = $search_data['search_price_book_code'];
			
			$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
			$limit =20;
			$Result = $this->pricebookmodule->search_get_all_pricebook($sess_group,$sess_company,$search_price_book_name,$search_price_book_code,$limit,$page,$sort_order,$sort_by);
			
			$this->data["pricebooks"] = $Result['rows'];
			
			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('pricebook/list_pricebook/').'/'.$sort_order.'/'.$sort_by;
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;	
			$this->title = "Price Book";
			$this->keywords = "Price Book";
			$this->_render('pages/pricebook/list_pricebook');
	}
	
	public function list_pricebook($sort_order='price_book_id',$sort_by='desc')
	{
		
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =10;
		$Result = $this->pricebookmodule->get_pricebook($limit,$page,$sort_order,$sort_by);
		$this->data["pricebooks"] = $Result['rows'];

			$config['prev_link']='Prev';
			$config['next_link']='Next';
			$config['first_link']='First';
			$config['last_link']='Last';
			$config['base_url'] = site_url('pricebook/list_pricebook').'/'.$sort_order.'/'.$sort_by; 
			$config['total_rows'] = $Result['num_rows'];
			$config['per_page']= $limit;
			$config['uri_segment']=5;
			$config['num_link']=5;
			$this->pagination->initialize($config);
			$this->data['page_links'] = $this->pagination->create_links(); 
			$this->data["sort_order"]=$sort_order;
			$this->data["sort_by"]=$sort_by;
			
		$this->title = "Price Book";
		$this->keywords = "Price Book";

		$this->_render('pages/pricebook/list_pricebook');
		
	}
			
	public function addpricebook()
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$prefix = $this->pricebookmodule->getprefix('11');
		$pricebookPrefix = $prefix->prefix_name;
		
		$code = $this->pricebookmodule->getlastid();
		$this->data["scheme_code"] = $this->pricebookmodule->getscheme_name();
		
		if(!empty($code))
		{
			
			$lastpricebookCode = $code->price_book_code;
			
			$lengthPrefix = strlen($pricebookPrefix);
			$strSplit = str_split($lastpricebookCode, $lengthPrefix);
			$pricebookLastdigit = $strSplit[0];
			
			$explode = explode($pricebookLastdigit,$lastpricebookCode);
			$pricebookLastnumber = $explode[1];
			
			if($pricebookLastdigit == $pricebookPrefix)
			{
				$pricebookcode = $pricebookLastnumber+1;
				
				$digits = sprintf ('%04d', $pricebookcode);
				$pricebookcodewithPrefix = $pricebookPrefix.$digits;
			}
			else
			{
				$pricebookcodewithPrefix = $pricebookPrefix.'0001';
			}
		}
		else
		{
			
			$pricebookcodewithPrefix = $pricebookPrefix.'0001';
		}
		
		$randomstring = $pricebookcodewithPrefix;
		
		if(isset($_POST['priceBookAdd']))
		{
			$pricebookname = $this->security->xss_clean($this->input->post('pricebookname'));
			$pricebookcode = $this->security->xss_clean($this->input->post('pricebookcode'));
			$pricebookcode_prefix = $this->security->xss_clean($this->input->post('pricebookcode_prefix'));
			$pricebookdecription = $this->security->xss_clean($this->input->post('pricebookdecription'));
			
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$product_selling = $this->security->xss_clean($this->input->post('item_selling_price'));
			$item_incentive_rate = $this->security->xss_clean($this->input->post('item_incentive_rate'));
			$item_handling_charge = $this->security->xss_clean($this->input->post('item_handling_charge'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));

			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_ser_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			$item_gst = $this->security->xss_clean($this->input->post('item_gst'));
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percentage'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_damage_discount_percent = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst')); 
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_hsn_sac = $this->security->xss_clean($this->input->post('item_hsn_sac'));
			
			$scheme_id_code = $this->security->xss_clean($this->input->post('scheme_code'));
			$scheme_code = explode('|', $scheme_id_code);
	
			$validpricebook= $this->pricebookmodule->pricebookvaildation($pricebookname, $pricebookcode);

			if($validpricebook== 0)
			{
				$pricebookdetails=array(
					'price_book_name'=>$pricebookname,
					'price_book_code'=>$pricebookcode,
					'price_book_description'=>$pricebookdecription,
					'scheme_id'=>$scheme_code[0],
					'scheme_code'=>$scheme_code[1],
					'price_book_status' => 'active',
					'price_book_created_by' =>$userid,
					'price_book_updated_by' =>$userid,
					'price_book_add_date' => date('Y-m-d h:i:s'),
					'price_book_update_date' => date('Y-m-d h:i:s'),
				);
			//	echo "<PRE>";print_r($pricebookdetails);
				
				$pricebookid= $this->pricebookmodule->add_pricebook($pricebookdetails);
				
				if(!empty($item_id))
				{
					$result=count($item_id);
					for($i=1; $i<=$result; $i++)
					{
						if(!empty($item_id[$i]) || !empty($item_uom_id[$i]) || !empty($product_selling[$i]))
						{
							$priceitems=array(
								'price_book_price_pb_id'=>$pricebookid,
								'price_book_price_item_id'=>$item_id[$i],
								'price_book_price_item_code'=>$item_code[$i],
								'price_book_price_uom_id'=>$item_uom_id[$i],
								'price_book_price_incentive_rate'=>$item_incentive_rate[$i],
								'price_book_price_handling_charge'=>$item_handling_charge[$i],
								'price_book_price_selling_price'=>$product_selling[$i],
								'price_book_price_mrp'=>$item_mrp[$i],
								'price_book_price_vat'=>$item_vat[$i],
								'price_book_price_cst'=>$item_cst[$i],
								'price_book_price_gst'=>$item_cgst[$i],
								'price_book_price_sgst'=>$item_sgst[$i],
								'price_book_price_igst'=>$item_igst[$i],
								'price_book_price_hsn'=>$item_hsn_sac[$i],
								'price_book_price_service'=>$item_serv_tax[$i],
								'price_book_price_excise'=>$item_exc[$i],
								'price_book_price_discount_percentage'=>$item_discount_percent[$i],
								'price_book_price_discount_amount'=>$item_discount_amount[$i],
								'price_book_damage_discount_percentage'=>$item_damage_discount_percent[$i],
							); 
							//echo "<PRE>";print_r($priceitems);
							$this->pricebookmodule->add_pricebook_price_details($priceitems);
						}
					}
						
				}
			
				$this->session->set_flashdata('message', 'Price Book Added Successfully');
				redirect('pricebook/list_pricebook');
			
			}
			else 
			{					
				$this->session->set_flashdata('message', 'Price Book Already Exist');
				redirect('pricebook/list_pricebook');
			}
		}
		else
		{	
			$this->data['pricebookCode'] = $pricebookcodewithPrefix;
			$this->data['pricePrefix'] = $pricebookPrefix;
			
			$this->data["product_list"] = $this->pricebookmodule->get_allproductsdetails($sess_group,$sess_company);
		
			$this->title = "Price Book";
			$this->keywords = "Price Book";		
			$this->_render('pages/pricebook/add_pricebook');
		}
		
	}
	
	
	public function updatepricebook($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		 $sess_group=$sessionData['group_id'];
		
		$prefix = $this->pricebookmodule->getprefix('11');
		$pricebookPrefix = $prefix->prefix_name;
		$this->data["scheme_code"] = $this->pricebookmodule->getscheme_name();
		
		if(!empty($code))
		{
			
			$lastpricebookCode = $code->price_book_code;
			
			$lengthPrefix = strlen($pricebookPrefix);
			$strSplit = str_split($lastpricebookCode, $lengthPrefix);
			$pricebookLastdigit = $strSplit[0];
			
			$explode = explode($pricebookLastdigit,$lastpricebookCode);
			$pricebookLastnumber = $explode[1];
			
			if($pricebookLastdigit == $pricebookPrefix)
			{
				$pricebookcode = $pricebookLastnumber+1;
				
				$digits = sprintf ('%04d', $pricebookcode);
				$pricebookcodewithPrefix = $pricebookPrefix.$digits;
			}
			else
			{
				$pricebookcodewithPrefix = $pricebookPrefix.'0001';
			}
		}
		else
		{
			
			$pricebookcodewithPrefix = $pricebookPrefix.'0001';
		}
		
		$randomstring = $pricebookcodewithPrefix; 
		
		if(isset($_POST['priceBookupdate']))
		{
			$pricebookname = $this->security->xss_clean($this->input->post('pricebookname'));
			$pricebookcode = $this->security->xss_clean($this->input->post('pricebookcode'));
			$pricebookcode_prefix = $this->security->xss_clean($this->input->post('pricebookcode_prefix'));
			$pricebookdecription = $this->security->xss_clean($this->input->post('pricebookdecription'));
			
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$item_incentive_rate = $this->security->xss_clean($this->input->post('item_incentive_rate'));
			$item_handling_charge = $this->security->xss_clean($this->input->post('item_handling_charge'));
			$product_selling = $this->security->xss_clean($this->input->post('item_selling_price'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));

			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_ser_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst')); 
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_hsn_sac = $this->security->xss_clean($this->input->post('item_hsn_sac'));
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percentage'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_damage_discount_percent = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			
			$scheme_id_code = $this->security->xss_clean($this->input->post('scheme_code'));
			$scheme_code = explode('|', $scheme_id_code);
						
			$validpricebook= $this->pricebookmodule->updatepricebookvaildation($pricebookname, $pricebookcode, $id);

			if($validpricebook== 0)
			{
				$pricebookdetails=array(
					'price_book_name'=>$pricebookname,
					'price_book_code'=>$pricebookcode,
					'price_book_description'=>$pricebookdecription,
					'scheme_id'=>$scheme_code[0],
					'scheme_code'=>$scheme_code[1],
					'price_book_status' => 'active',
					'price_book_created_by' =>$userid,
					'price_book_updated_by' =>$userid,
					'price_book_add_date' => date('Y-m-d h:i:s'),
					'price_book_update_date' => date('Y-m-d h:i:s'),
				);
			
				$pricebookid=$this->pricebookmodule->update_pricebook($pricebookdetails,$id);
				
				if(!empty($item_id))
				{
					$result=count($item_id);
					for($i=1; $i<=$result; $i++)
					{
						if(!empty($item_id[$i]) || !empty($item_uom_id[$i]))
						{
							$priceitems=array(
								'price_book_price_pb_id'=>$id,
								'price_book_price_item_id'=>$item_id[$i],
								'price_book_price_item_code'=>$item_code[$i],
								'price_book_price_uom_id'=>$item_uom_id[$i],
								'price_book_price_incentive_rate'=>$item_incentive_rate[$i],
								'price_book_price_handling_charge'=>$item_handling_charge[$i],
								'price_book_price_selling_price'=>$product_selling[$i],
								'price_book_price_mrp'=>$item_mrp[$i],
								'price_book_price_vat'=>$item_vat[$i],
								'price_book_price_cst'=>$item_cst[$i],
								'price_book_price_gst'=>$item_cgst[$i],
								'price_book_price_sgst'=>$item_sgst[$i],
								'price_book_price_igst'=>$item_igst[$i],
								'price_book_price_hsn'=>$item_hsn_sac[$i],
								'price_book_price_service'=>$item_serv_tax[$i],
								'price_book_price_discount_percentage'=>$item_discount_percent[$i],
								'price_book_price_excise'=>$item_exc[$i],
								'price_book_price_discount_amount'=>$item_discount_amount[$i],
								'price_book_damage_discount_percentage'=>$item_damage_discount_percent[$i],

							); 
						
							$this->pricebookmodule->update_pricebook_price_details($priceitems,$id,$item_id[$i]);
						}
					}
						
				}
			
				$this->session->set_flashdata('message', 'Price Book Updated Successfully');
				redirect('pricebook/list_pricebook');
			
			}
			else 
			{					
				$this->session->set_flashdata('message', 'Price Book Already Exist');
				redirect('pricebook/list_pricebook');
			}
		}
		else
		{	
			$this->data['pricePrefix'] = $pricebookPrefix;
			
			//$this->data["product_list"] = $this->pricebookmodule->get_allproductsdetails($sess_group,$sess_company);
			$pricebook = $this->pricebookmodule->singlepricebookdetails($sess_group,$sess_company,$id);
			
			$this->data["pricebookvalue"] = $pricebook['pricebook'];
			//$this->data["pricelist"] = $pricebook['pricelist'];
			//echo"<pre>"; print_r($this->data["pricebookvalue"]); exit;
			
			$this->title = "Price Book";
			$this->keywords = "Price Book";		
			$this->_render('pages/pricebook/edit_pricebook');
		}
		
	}
	
	public function pricebook_update()
	{
		// echo "<pre>";  exit;
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		 $sess_group=$sessionData['group_id'];
		 
		$product_list = $this->pricebookmodule->get_allproductsdetails($sess_group,$sess_company);
		
					foreach($product_list as $ITEM)
					{
						if(!empty($ITEM['product_id']) || !empty($ITEM['product_selling']))
						{
							$priceitems=array(
								'price_book_price_pb_id'=>'1',
								'price_book_price_item_id'=>$ITEM['product_id'],
								'price_book_price_item_code'=>$ITEM['product_code'],
								'price_book_price_uom_id'=>'1',
								'price_book_price_selling_price'=>$ITEM['product_selling'],
								'price_book_price_mrp'=>$ITEM['product_mrp'],
								'price_book_price_vat'=>$ITEM['product_vat_tax'],
								'price_book_price_cst'=>$ITEM['product_cst_tax'],
								'price_book_price_gst'=>$ITEM['product_gst_tax'],
								'price_book_price_service'=>$ITEM['product_service_tax'],
								'price_book_price_excise'=>$ITEM['product_excise_duty_tax'],
								'price_book_price_discount_percentage'=>$ITEM['product_discounts'],
								'price_book_price_discount_amount'=>$ITEM['product_discounts'],
							); 
						
							$this->pricebookmodule->update_pricebook_price_details($priceitems,'1',$ITEM['product_id']);
						}
					}
						
		 exit;
	}
	
	public function pricebookstatus($id,$status)
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
		
		$pbdata = array(
				  'price_book_status' => $changeStatus,
				  'price_book_updated_by'=>$sess_user,
				  'price_book_update_date' => date('Y-m-d h:i:s'),
			  );
			  
		$this->pricebookmodule->updatepbstatus($pbdata, $id);
		$this->session->set_flashdata('message', 'Price book Status Changed Successfully');
		redirect('pricebook/list_pricebook');
	
	
	}

	public function viewpricebook($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		 $sess_group=$sessionData['group_id'];

		$prefix = $this->pricebookmodule->getprefix('11');
		$pricebookPrefix = $prefix->prefix_name;
		$this->data['pricePrefix'] = $pricebookPrefix;
			
			$this->data["product_list"] = $this->pricebookmodule->get_allproductsdetails($sess_group,$sess_company);
			
			$pricebook = $this->pricebookmodule->singlepricebookdetails($sess_group,$sess_company,$id);
			
			$this->data["pricebookvalue"] = $pricebook['pricebook'];
			
			$this->data["pricelist"] = $pricebook['pricelist'];
			
			$this->title = "Price Book";
			$this->keywords = "Price Book";		
			$this->_render('pages/pricebook/view_pricebook');
	}
	
	public function instant_addpricebook()
	{
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		 $sess_group=$sessionData['group_id'];
		
		$prefix = $this->pricebookmodule->getprefix('11');
		$pricebookPrefix = $prefix->prefix_name;
		
		$code = $this->pricebookmodule->getlastid();
		
		
		if(!empty($code))
		{
			
			$lastpricebookCode = $code->price_book_code;
			
			$lengthPrefix = strlen($pricebookPrefix);
			$strSplit = str_split($lastpricebookCode, $lengthPrefix);
			$pricebookLastdigit = $strSplit[0];
			
			$explode = explode($pricebookLastdigit,$lastpricebookCode);
			$pricebookLastnumber = $explode[1];
			
			if($pricebookLastdigit == $pricebookPrefix)
			{
				$pricebookcode = $pricebookLastnumber+1;
				
				$digits = sprintf ('%04d', $pricebookcode);
				$pricebookcodewithPrefix = $pricebookPrefix.$digits;
			}
			else
			{
				$pricebookcodewithPrefix = $pricebookPrefix.'0001';
			}
		}
		else
		{
			$pricebookcodewithPrefix = $pricebookPrefix.'0001';
		}
		
		$randomstring = $pricebookcodewithPrefix;
		
		if(isset($_POST['priceBookAdd']))
		{
			$pricebookname = $this->security->xss_clean($this->input->post('pricebookname'));
			$pricebookcode = $this->security->xss_clean($this->input->post('pricebookcode'));
			$pricebookcode_prefix = $this->security->xss_clean($this->input->post('pricebookcode_prefix'));
			$pricebookdecription = $this->security->xss_clean($this->input->post('pricebookdecription'));
			
			$item_id = $this->security->xss_clean($this->input->post('item_id'));
			$item_code = $this->security->xss_clean($this->input->post('item_code'));
			$item_name = $this->security->xss_clean($this->input->post('item_name'));
			$item_uom_id = $this->security->xss_clean($this->input->post('item_uom_id'));
			$product_selling = $this->security->xss_clean($this->input->post('item_selling_price'));
			$item_mrp = $this->security->xss_clean($this->input->post('item_mrp'));

			$item_vat = $this->security->xss_clean($this->input->post('item_vat'));
			$item_serv_tax = $this->security->xss_clean($this->input->post('item_ser_tax'));
			$item_cst = $this->security->xss_clean($this->input->post('item_cst'));
			$item_sgst = $this->security->xss_clean($this->input->post('item_sgst')); 
			$item_cgst = $this->security->xss_clean($this->input->post('item_cgst'));
			$item_igst = $this->security->xss_clean($this->input->post('item_igst'));
			$item_hsn_sac = $this->security->xss_clean($this->input->post('item_hsn_sac'));
			$item_exc = $this->security->xss_clean($this->input->post('item_exc'));
			$item_discount_percent = $this->security->xss_clean($this->input->post('item_discount_percentage'));
			$item_discount_amount = $this->security->xss_clean($this->input->post('item_discount_amount'));
			$item_damage_discount_percent = $this->security->xss_clean($this->input->post('item_damage_discount_percentage'));
			
			$validpricebook= $this->pricebookmodule->pricebookvaildation($pricebookname, $pricebookcode);
		
			
			if($validpricebook== 0)
			{
				$pricebookdetails=array(
					'price_book_name'=>$pricebookname,
					'price_book_code'=>$pricebookcode,
					'price_book_description'=>$pricebookdecription,
					'price_book_status' => 'active',
					'price_book_created_by' =>$userid,
					'price_book_updated_by' =>$userid,
					'price_book_add_date' => date('Y-m-d h:i:s'),
					'price_book_update_date' => date('Y-m-d h:i:s'),
				);
								
				$pricebookid= $this->pricebookmodule->add_pricebook($pricebookdetails);
				
				if(!empty($item_id))
				{
					$result=count($item_id);
					for($i=1; $i<=$result; $i++)
					{
						if(!empty($item_id[$i]) || !empty($item_uom_id[$i]) || !empty($product_selling[$i]))
						{
							$priceitems=array(
								'price_book_price_pb_id'=>$pricebookid,
								'price_book_price_item_id'=>$item_id[$i],
								'price_book_price_item_code'=>$item_code[$i],
								'price_book_price_uom_id'=>$item_uom_id[$i],
								'price_book_price_selling_price'=>$product_selling[$i],
								'price_book_price_mrp'=>$item_mrp[$i],
								'price_book_price_vat'=>$item_vat[$i],
								'price_book_price_cst'=>$item_cst[$i],
								'price_book_price_gst'=>$item_cgst[$i],
								'price_book_price_sgst'=>$item_sgst[$i],
								'price_book_price_igst'=>$item_igst[$i],
								'price_book_price_hsn'=>$item_hsn_sac[$i],
								'price_book_price_service'=>$item_serv_tax[$i],
								'price_book_price_excise'=>$item_exc[$i],
								'price_book_price_discount_percentage'=>$item_discount_percent[$i],
								'price_book_price_discount_amount'=>$item_discount_amount[$i],
								'price_book_damage_discount_percentage'=>$item_damage_discount_percent[$i],

							); 
							$this->pricebookmodule->add_pricebook_price_details($priceitems);
						}
					}
						
				}
			
				$this->session->set_flashdata('message', 'Price Book Added Successfully');
				redirect('pricebook/list_pricebook');
			
			}
			else 
			{					
				$this->session->set_flashdata('message', 'Price Book Already Exist');
				redirect('pricebook/list_pricebook');
			}
		}
		else
		{
			$this->data['pricebookCode'] = $pricebookcodewithPrefix;
			$this->data['pricePrefix'] = $pricebookPrefix;
			
			$this->data["product_list"] = $this->pricebookmodule->get_allproductsdetails($sess_group,$sess_company);
			
			$this->title = "Price Book";
			$this->keywords = "Price Book";		
			$this->_render('pages/pricebook/add_instant_pricebook');
		}
	}
	
	public function getsingleitem()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$this->data["product_type"] = $this->pricebookmodule->get_allproducttypes($sess_group);//** Get All Product Type **//
		$this->data["product_group"] = $this->pricebookmodule->get_allproductgroups();//** Get All Product Group **//
		
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
				
		//** Get all Products for single item **//
		$this->data["product_list"] = $this->pricebookmodule->get_allproductsdetailsforsingleitem($sess_group,$producttype);
		
		$result = $this->load->view("pages/pricebook/singleitem_popup", $this->data, true);
				
		echo $result; exit;
	}
	
	//** Onchange Item Pop-up item details **//
	
	public function onchangegetitemspopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$product_type = $this->input->post('product_type');
		$product_group = $this->input->post('product_group');
		
		$product_list = $this->pricebookmodule->onchangeitemstype($sess_group,$product_type,$product_group);
		
		if(empty($product_list))
		{
			echo "<option value=''>Select Item</option>";
		}
		else
		{
			$Select = "<option value=''>Select Item</option>";
			foreach($product_list as $PROLST)
			{
					$Select .= "<option value='{$PROLST["product_id"]}'>{$PROLST["product_code"]}</option>";
			} 
			echo $Select;
		}
		exit;

	}
	
	//** Get Item Details **//
	
	public function getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		
		$produt_details = $this->pricebookmodule->getitemdetails($product_item_id); //** Get Item Details based on product Id **//
		$data['product_id'] = $produt_details->product_id;
		$data['product_type_id'] = $produt_details->product_type_id;
		$data['product_group_id'] = $produt_details->product_group_id;
		$data['product_name'] = $produt_details->product_name;
		$data['product_code'] = $produt_details->product_code;
		$data['product_model_number'] = $produt_details->product_model_number;
		$data['product_mfr_part_number'] = $produt_details->product_mfr_part_number;
		
		$data['product_mrp'] = $produt_details->product_mrp;
		$data['product_selling'] = $produt_details->product_selling;
		$data['product_cp'] = $produt_details->product_cp;
		$data['product_uty_qty'] = $produt_details->product_uty_qty;
		$data['product_vat_tax'] = $produt_details->product_vat_tax;
		$data['product_gst_tax'] = $produt_details->product_gst_tax;
		$data['product_service_tax'] = $produt_details->product_service_tax;
		$data['product_cst_tax'] = $produt_details->product_cst_tax;
		$data['product_excise_duty_tax'] = $produt_details->product_excise_duty_tax;
		$data['product_discounts'] = $produt_details->product_discounts;
		
		$data['uom_id'] = $produt_details->uom_id;
		$data['uom_name'] = $produt_details->uom_name;
		$result = json_encode($data);
		
		echo $result; exit;
		
	}
	
	//** Multiple Item Pop-up **//
	
	public function getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		
		$this->data["product_type"] = $this->pricebookmodule->get_allproducttypes($sess_group);//** Get All Product Type **//
		$this->data["product_group"] = $this->pricebookmodule->get_allproductgroups();//** Get All Product Group **//
		$this->data['product_list'] = $this->pricebookmodule->getmultipleproductsdetails($sess_group);//** Get Multiple Product Details **//
		//echo "<pre>"; print_r($this->data["product_type"]); exit;
		$result = $this->load->view("pages/pricebook/multipleitem_popup", $this->data, true);		
		echo $result; exit;
	}	
	
	//** Multiple Item Pop-up Search  **//
	
	public function multiplesearchitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook'));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		
		$this->data['product_list'] = $this->pricebookmodule->getproductsdetailswithmultiplesearch($item_code,$item_name,$item_mfg_prtno);
		
		
		$result = $this->load->view("pages/pricebook/search_multiple_items", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Multiple Item Pop-up **//
	
	public function getmultiple_pricebook_itemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		
		//$this->data["product_type"] = $this->pricebookmodule->get_allproducttypes($sess_group);//** Get All Product Type **//
		//$this->data["product_group"] = $this->pricebookmodule->get_allproductgroups();//** Get All Product Group **//
		$this->data['product_list'] = $this->pricebookmodule->getmultiple_pricebook_products_details($pricebook_id);//** Get Multiple Product Details **//
		
		$result = $this->load->view("pages/pricebook/pricebook_items_popup", $this->data, true);		
		echo $result; exit;
	}	
	
	//** Multiple Item Pop-up Search  **//
	
	public function search_multiple_pricebook_itemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id=$this->security->xss_clean(trim($this->input->post('pricebook')));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean(trim($this->input->post('item_name')));
		$item_mfg_prtno=$this->security->xss_clean(trim($this->input->post('item_mfg_prtno')));
		
		
		$this->data['product_list'] = $this->pricebookmodule->search_multiple_pricebook_itemdetails($pricebook_id,$item_code,$item_mfg_prtno,$item_name);
		
		$result = $this->load->view("pages/pricebook/search_pricebook_items_popup", $this->data, true);
				
		echo $result; exit;
	}
	
	// smart search for multiple item code in sales
	public function get_item_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->pricebookmodule->autosearch_item_code($q);
		}
	 }
	 
	 // smart search for multiple item partnumber in sales
	 public function get_item_partnumber()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->pricebookmodule->autosearch_item_partnumber($q);
		}
	 }
	 
	  // smart search for multiple item name in sales
	 public function get_item_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->pricebookmodule->autosearch_item_name($q);
		}
	 }
	
	// smart search for multiple item code in sales
	public function get_pricbook_item_code()
	{
		if (isset($_GET['term'])){
		  $pricebook  = strtolower($_GET['pricebook']);
		  $q = strtolower($_GET['term']);
		  $this->pricebookmodule->autosearch_pricbook_item_code($pricebook,$q);
		}
	 }
	 
	 // smart search for multiple item partnumber in sales
	 public function get_pricbook_item_partnumber()
	{
		if (isset($_GET['term'])){
		  $pricebook  = strtolower($_GET['pricebook']);
		  $q = strtolower($_GET['term']);
		  $this->pricebookmodule->autosearch_pricbook_item_partnumber($pricebook,$q);
		}
	 }
	 
	  // smart search for multiple item name in sales
	 public function get_pricbook_item_name()
	{
		if (isset($_GET['term'])){
		  $pricebook  = strtolower($_GET['pricebook']);
		  $q = strtolower($_GET['term']);
		  $this->pricebookmodule->autosearch_pricbook_item_name($pricebook,$q);
		}
	 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */