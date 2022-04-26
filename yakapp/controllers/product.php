<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('productmodule');
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
		redirect('product/product_list');
	}
	
	//** Search Product  **//
	
	
	public function product_search($sort_order='product_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		if(isset($_POST['search']))
		{
			$search_feild_1 = $this->security->xss_clean($this->input->post('search_item_code'));
			$search_feild_2 = $this->security->xss_clean($this->input->post('search_item_name'));
			$search_feild_3 = $this->security->xss_clean($this->input->post('search_item_prtno'));
			$search_feild_4 = $this->security->xss_clean($this->input->post('search_item_type'));
			$search_feild_5 = $this->security->xss_clean($this->input->post('search_item_status'));
			$search_feild_6 = $this->security->xss_clean($this->input->post('search_item_division'));
			
			
		
			$req_search= array(
					'search_feild_1' => $search_feild_1,
					'search_feild_2' =>$search_feild_2,
					'search_feild_3' => $search_feild_3,
					'search_feild_4' => $search_feild_4,
					'search_feild_5' => $search_feild_5,
					'search_feild_6' => $search_feild_6,
					);	
			$this->session->set_userdata('req_search',$req_search);
		}	
			
			
			$search_data = $this->session->userdata('req_search');			
			$search_feild_1 = $search_data['search_feild_1'];
			$search_feild_2 = $search_data['search_feild_2'];
			$search_feild_3= $search_data['search_feild_3'];
			$search_feild_4 = $search_data['search_feild_4'];
			$search_feild_5 = $search_data['search_feild_5'];
			$search_feild_6 = $search_data['search_feild_6'];
			
			
		
		  $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		  $limit =20;
		  $Result = $this->productmodule->get_search_products($limit,$page,$sort_order,$sort_by,$sess_company,$sess_group,$search_feild_1,$search_feild_2,$search_feild_3,$search_feild_4,$search_feild_5,$search_feild_6);
		 
		  $this->data["products_data"] = $Result['rows'];

		  $config['prev_link']='Prev';
		  $config['next_link']='Next';
		  $config['first_link']='First';
		  $config['last_link']='Last';
		  $config['base_url'] = site_url('product/product_search').'/'.$sort_order.'/'.$sort_by; 
		  $config['total_rows'] = $Result['num_rows'];
		  $config['per_page']= $limit;
		  $config['uri_segment']=5;
		  $config['num_link']=5;
		  $this->pagination->initialize($config);
		  $this->data['page_links'] = $this->pagination->create_links(); 
		  $this->data["sort_order"]=$sort_order;
		  $this->data["sort_by"]=$sort_by;
		  
		  $this->title = "Item";
		  $this->keywords = "Item";
		 $this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); 
		 //$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		  $this->_render('pages/products/products');
	}
	
	
	//** Product List **//
	
	public function product_list($sort_order='product_id',$sort_by='desc')
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
			
		$page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$limit =100;
		$Result = $this->productmodule->get_productdetial($sess_group,$sess_company,$limit,$page,$sort_order,$sort_by);
		$this->data["products_data"] = $Result['rows'];
	//	echo "<pre>"; print_r($Result); exit;
		
		$config['prev_link']='Prev';
		$config['next_link']='Next';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['base_url'] = site_url('product/product_list').'/'.$sort_order.'/'.$sort_by; 
		$config['total_rows'] = $Result['num_rows'];
		$config['per_page']= $limit;
		$config['uri_segment']=5;
		$config['num_link']=5;
		$this->pagination->initialize($config);
		$this->data['page_links'] = $this->pagination->create_links(); 
		$this->data["sort_order"]=$sort_order;
		$this->data["sort_by"]=$sort_by;
		
		$this->title = "Item";
		$this->keywords = "Item";
		$this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); 
		$this->_render('pages/products/products');
	}
	
	public function import_product() //impoort CSV for product list
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$product_type_id = 3;
		$product_group = 25;
		$product_type = 3;
		$uom_id=1;
		
		
	 
        $data['error'] = '';    //initialize image upload error array to empty
	 	$config['upload_path'] = FCPATH.'resources/uploads/product/';
		$config['allowed_types'] = 'csv';  
		
		$this->load->library('upload', $config);
		
	    if (!$this->upload->do_upload('userfile'))
		{
		    $data['error'] = $this->upload->display_errors();
			$this->session->set_flashdata('message', $data['error']);
			redirect('product/product_list');
		}
		else 
		{
		    $file_data = $this->upload->data();
            $file_path =   FCPATH.'resources/uploads/product/'.$file_data['file_name'];
			
			$row =1;
            $db_row = array();
            if (($handle = fopen($file_path, "r")) !== FALSE) 
			 {
				while (($data  = fgetcsv($handle, 1000,",")) !== FALSE)
				 {
				    $num = count($data);
				 	$result[] = $data;
					unset($result[0]);
                 }
				foreach($result as $val)
				{
					if($sess_company != 3)
					{
						
						$prefix = $this->productmodule->getprefix($product_type,$sess_company);
						
						$product_typePrefix = $prefix->products_type_prefix;
						
						$code = $this->productmodule->getlastid($product_type,$sess_company);
						
						if(!empty($code))
						{
							$lastCode = $code->product_code;
							
							$lengthPrefix = strlen($product_typePrefix);
							$strSplit = str_split($lastCode, $lengthPrefix);
							$Lastdigit = $strSplit[0];
							
							$explode = explode($Lastdigit,$lastCode);
							$Lastnumber = $explode[1];
							
							if($Lastdigit == $product_typePrefix)
							{
								$productcode = $Lastnumber+1;
								
								$digits = sprintf ('%04d', $productcode);
								$productcodewithPrefix = $product_typePrefix.$digits;
							}
							else
							{
								$productcodewithPrefix = $product_typePrefix.'0001';
							}
							
						}
						else
						{
							$productcodewithPrefix = $product_typePrefix.'0001';
						}
					}
					else
					{ 
						
						$prefix = $this->productmodule->getprefix($product_type,$sess_company);
						
						if(isset($prefix->products_type_prefix))
						{
							$product_typePrefix = $prefix->products_type_prefix;
						}
						else
						{
							$product_typePrefix = "";
						}
						 
						$code = $this->productmodule->getlastid($product_type,$sess_company);
						
						if(!empty($code))
						{
							$lastCode = $code->product_code;
							
							$lengthPrefix = strlen($product_typePrefix);
							if($lengthPrefix > 0)
							{
								$strSplit = str_split($lastCode, $lengthPrefix);
							
								$Lastdigit = $strSplit[0];
							
								$explode = explode($Lastdigit,$lastCode);
								$Lastnumber = $explode[1];
								if($Lastdigit == $product_typePrefix)
								{ 
									$productcode = $Lastnumber+1;
									
									$digits = sprintf ('%04d', $productcode);
									$productcodewithPrefix = $product_typePrefix.$digits;
								}
								else
								{
									$productcodewithPrefix = $product_typePrefix.'0001';
								}
							}
							else
							{
									$Lastnumber = $lastCode;
									
									$productcode = $Lastnumber+1;
									
									$digits = sprintf ('%04d', $productcode);
									$productcodewithPrefix = $digits;
							}
						}
						else
						{
							$productcodewithPrefix = $product_typePrefix.'0001';
						}
					}
					 
					//echo $productcodewithPrefix; exit;
					
					$data['productCode'] = $productcodewithPrefix;
					$data['productPrefix'] = $product_typePrefix;
			
					
				 $productdetails = array(
					   'product_type_id' => $product_type_id,
					   'product_group_id' => $product_group,
					   'product_mfr_part_number' => $val[1],
					   'product_name' => $val[3],
					   'product_company_id'=>$sess_company,
					   'product_code' => $productcodewithPrefix ,
					   'product_status' => 'enable',
					   'product_manufacurer'=>'1',
					   'product_created_by'=>$sess_user,
					   'product_modified_by'=>$sess_user,
					   'product_add_date'=>date('Y-m-d h:i:s'),
                    );
				    // echo "<pre>"; print_r($productdetails); $productid= 1;
              $productid=$this->productmodule->add_product_details($productdetails);
			 
			  $productpricing= array(
										'product_prd_id'=>$productid,
										'product_mrp' => $val[4]+($val[4]*(25/100)),
										'product_selling' => $val[4],
										'product_cp' => $val[4],
										'product_vat_tax'=>'0.00',
										'product_gst_tax'=>'0.00',
										'product_cst_tax'=>'0.00',
										'product_service_tax'=>'0.00',
										'product_excise_duty_tax'=>'0.00',
										'product_discounts'=>'0.00',
										'product_selling_status'=>'for_sale',
										);
			// echo "<pre>"; print_r($productpricing);
			 $this->productmodule->add_pro_pricing_details($productpricing);	
		     		
			 if($product_group != '')
			 {
					$pricebook = $this->productmodule->get_pricebook();
					foreach($pricebook as $PB)
					{
						$pricebookid = $PB['price_book_id'];
						$priceitems=array(
								'price_book_price_pb_id'=>$pricebookid,
								'price_book_price_item_id'=>$productid,
								'price_book_price_item_code'=>$productcodewithPrefix,
								'price_book_price_uom_id'=>$uom_id,
								'price_book_price_selling_price'=>$val[4],
								'price_book_price_mrp'=>$val[4]+($val[4]*(25/100)),
								'price_book_price_vat'=>'0.00',
								'price_book_price_cst'=>'0.00',
								'price_book_price_gst'=>'0.00',
								'price_book_price_service'=>'0.00',
								'price_book_price_excise'=>'0.00',
								/*'price_book_price_tax_percentage'=>'0.00',
								'price_book_price_tax_amount'=>'0.00',*/
								'price_book_price_discount_percentage'=>'0.00',
								/*'price_book_price_discount_amount'=>'0.00',
								'price_book_price_net_amount'=>'0.00',*/
							); 
						//	echo "<pre>"; print_r($priceitems);
						$this->productmodule->update_pricebook_price_details($priceitems, $pricebookid, $productid);
					}
				 }
				
				$productstock=array( 
					'product_stock_prd_id'=>$productid,
					'product_stock_uom_id'=>$uom_id,
					'product_stock_weight'=>'0.00',
					'product_stock_reorder_qty'=>'0.00',
					'product_stock_reorder_level'=>'0.00',
					'product_stock_minimum'=>'0.00',
					'product_stock_maximum'=>'0.00',
					);
					//echo "<pre>"; print_r($productstock);
				 $this->productmodule->add_pro_stock_details($productstock);			
		   }
		    
				 //echo"<pre>"; print_r($val);exit;
		   $this->session->set_flashdata('message', 'Product Data Imported Succesfully');
           redirect('product/product_list');
                 
            } 
			else 
			{ 
                $data['error'] = "Error occured";
                redirect('product/product_list');
			}
           
		}
	}
	
	//** Get All Details for Add Product  **//
	
	public function addproduct()
	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		
		$prefix = $this->productmodule->get_prefix('3'); //** To Get Prefix Name for Vendor **//
		
		$vendorPrefix = $prefix->prefix_name;

		$code = $this->productmodule->getlast_id();//** To Get Last Id **//
		//echo "<pre>"; print_r($code); exit;
		
		if(!empty($code))
		{
			$lastmaterialCode = $code->product_code;
			
			$lengthPrefix = strlen($vendorPrefix);
			$strSplit = str_split($lastmaterialCode, $lengthPrefix);
			$vendorLastdigit = $strSplit[0];
			
			$explode = explode($vendorLastdigit,$lastmaterialCode);
			$vendorLastnumber = $explode[1];
			
			if($vendorLastdigit == $vendorPrefix)
			{
				$vendorcode = $vendorLastnumber+1;
				
				$digits = sprintf ('%04d', $vendorcode);
				$vendorcodewithPrefix = $vendorPrefix.$digits;
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
		
		$this->data['material_code'] = $vendorcodewithPrefix;
		$this->data['materialPrefix'] = $vendorPrefix;
			
		$randomstring = $vendorcodewithPrefix;
		
	
		//echo $sess_company; exit;
		$this->title = "Item";
		$this->keywords = "Item";
		
		$this->data['company_id']= $sess_company;
		$this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); //** Get All Product Types **//
		$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
		$this->data["product_manufac"] = $this->productmodule->get_allmanufacturer();//** Get All Manufacturer **//
		$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product DEtails **//
		$this->data["product_uom"] = $this->productmodule->get_alluom(); //** Get All Unit of Measurememt Details **//
		
		
		$this->_render('pages/products/addproduct');
	}
	
	
	public function getprostore_division()
	{
		$material_store_division_id =  $this->security->xss_clean($this->input->post('material_store_division_id'));
		
		$material_store_division = $this->productmodule->getproduct_store_division($material_store_division_id);
       
		if(empty($material_store_division))
		{
			echo "<option value='0'>Select Store</option>";
		}
		else
		{
			$Select = "<option value=''>Select Store</option>";
			
			 foreach($material_store_division as $DIVI)
			{
				if($DIVI["store_division"] != '')
				{
					$Select .= "<option value='{$DIVI["store_id"]}'>{$DIVI["store_name"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$DIVI["store_id"]}'>{$DIVI["store_name"]}</option>";
				}
			} 
			echo $Select;
			
		}
		exit;
	}
	
	public function getprosub_group()
	{
		$product_group =  $this->security->xss_clean($this->input->post('product_group'));
		
		$product_group = $this->productmodule->getproduct_sub_group($product_group);
       
		if(empty($product_group))
		{
			echo "<option value='0'>Select Sub-Group</option>";
		}
		else
		{
			$Select = "<option value=''>Select Sub-Group</option>";
			
			 foreach($product_group as $DIVI)
			{
				if($DIVI["product_sub_group_id"] != '')
				{
					$Select .= "<option value='{$DIVI["product_sub_group_id"]}'>{$DIVI["product_sub_group_name"]}</option>";
				}
				else
				{
					$Select .= "<option value='{$DIVI["product_sub_group_id"]}'>{$DIVI["product_sub_group_name"]}</option>";
				}
			} 
			echo $Select;
			
		}
		exit;
	}
	
	
	public function getprostore()
	{
		 //$material_store_id = implode(",",$this->input->post('material_store_id'));
		$material_store_id = $this->input->post('material_store_id');
		$product_type = $this->input->post('product_type');
		
		$product_type = $this->productmodule->getproduct_store($material_store_id);
       
		if(empty($product_type))
		{
			echo "<option value='0'>Select Material Category</option>";
		}
		else
		{
			$Select = "<option value=''>Select Item Category</option>";
			
			 foreach($product_type as $DIVI)
			{
				$names = explode (",", $DIVI["store_category"]);
				foreach ($names as $name)
				
				if($DIVI["store_id"]!='')
				{
					$com_name = $this->productmodule->get_all_material_name($name);
					$Select .= "<option value='{$com_name->products_type_id}' >{$com_name->products_type_name}</option>";
				}
				else
				{
					$Select .= "<option value='{$DIVI["product_type"]}'>{$DIVI["store_category"]}</option>";
				}
			} 
			echo $Select;
			
		}
		exit;
	}
	
	
	
	
	//** Get Product Type on based on company Onclick Function **//
	
	function getprotucttype()
	
	{
	
		$company_name = $this->input->post('company_name');
		
		$product_type = $this->productmodule->getproduct_type($company_name); //** Get Product type based on company name **//
		if(empty($product_type))
		{
			echo "<option value='0'>Select Product Type</option>";
		}
		else
		{
			$Select = "<option value=''>Select Product Type</option>";
			foreach($product_type as $PROTYP)
			{
				if($PROTYP["product_type_company_id"] == $company_name)
				{
					$Select .= "<option value='{$PROTYP["products_type_id"]}'>{$PROTYP["products_type_name"]}</option>";
				}
			} 
			echo $Select;
		}
		exit;

	}
	
	//** Get Item Code for the product **//
	
	public function getitemcode()
	{
		$product_type = $this->input->post('product_type');
		$sess_company = $this->input->post('company_name');
		if($sess_company != 3)
		{
			
			$prefix = $this->productmodule->getprefix($product_type,$sess_company); //** Get Prefix for Item **//
			
			$product_typePrefix = $prefix->products_type_prefix;
			
			$code = $this->productmodule->getlastid($product_type,$sess_company);//** Get Last Id of the Product **//
			
			if(!empty($code))
			{
				$lastCode = $code->product_code;
				
				$lengthPrefix = strlen($product_typePrefix);
				$strSplit = str_split($lastCode, $lengthPrefix);
				$Lastdigit = $strSplit[0];
				
				$explode = explode($Lastdigit,$lastCode);
				$Lastnumber = $explode[1];
				
				if($Lastdigit == $product_typePrefix)
				{
					$productcode = $Lastnumber+1;
					
					$digits = sprintf ('%04d', $productcode);
					$productcodewithPrefix = $product_typePrefix.$digits;
				}
				else
				{
					$productcodewithPrefix = $product_typePrefix.'0001';
				}
				
			}
			else
			{
				$productcodewithPrefix = $product_typePrefix.'0001';
			}
		}
		else
		{
			$product_type = $this->input->post('product_type');
			$prefix = $this->productmodule->getprefix($product_type,$sess_company);//** Get Prefix for Item **//
			
			$product_typePrefix = $prefix->products_type_prefix;
			
			$code = $this->productmodule->getlastid($product_type,$sess_company);//** Get Last Id of the Product **//
			
			if(!empty($code))
			{
				$lastCode = $code->product_code;
				
				$lengthPrefix = strlen($product_typePrefix);
				$strSplit = str_split($lastCode, $lengthPrefix);
				$Lastdigit = $strSplit[0];
				
				$explode = explode($Lastdigit,$lastCode);
				$Lastnumber = $explode[1];
				
				if($Lastdigit == $product_typePrefix)
				{
					$productcode = $Lastnumber+1;
					
					$digits = sprintf ('%04d', $productcode);
					$productcodewithPrefix = $product_typePrefix.$digits;
				}
				else
				{
					$productcodewithPrefix = $product_typePrefix.'0001';
				}
				
			}
			else
			{
				$productcodewithPrefix = $product_typePrefix.'0001';
			}
		}
		
		$data['productCode'] = $productcodewithPrefix;
		$data['productPrefix'] = $product_typePrefix;
			
		$result = json_encode($data);
		
		echo $result; exit;
		
	}
	 
	 //** Add Product **//
	 
	public function addproductdetails()
	{		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
	
	 		if(isset($_POST['product_add']))
			{
				$product_name = $this->security->xss_clean($this->input->post('product_name'));
				$product_company_id = $this->security->xss_clean($this->input->post('company'));
				$product_type = $this->security->xss_clean($this->input->post('product_type'));
				$product_code = $this->security->xss_clean($this->input->post('product_code'));
				$product_group = $this->security->xss_clean($this->input->post('product_group'));
				$product_stock_name = $this->security->xss_clean($this->input->post('product_stock_name'));
				$product_sku = $this->security->xss_clean($this->input->post('product_sku'));
				
				$product_group = $this->security->xss_clean($this->input->post('product_group'));
				$product_sub_group = $this->security->xss_clean($this->input->post('product_sub_group'));
				$product_produ_type = $this->security->xss_clean($this->input->post('product_produ_type'));
				$product_uom = $this->security->xss_clean($this->input->post('product_uom'));
				
					
				$product_sticer_id = $this->security->xss_clean($this->input->post('product_sticer_id'));
				$product_report = $this->security->xss_clean($this->input->post('product_report'));
				$product_stock_alert = $this->security->xss_clean($this->input->post('product_stock_alert'));
				$product_alert_qty = $this->security->xss_clean($this->input->post('product_alert_qty'));
				$product_pur_price = $this->security->xss_clean($this->input->post('product_pur_price'));
				$product_size = $this->security->xss_clean($this->input->post('product_size'));
				$product_hsn = $this->security->xss_clean($this->input->post('product_hsn'));
						
				$product_cgst_check = $this->security->xss_clean($this->input->post('product_gst_check'));
				if($product_cgst_check== "1")
				{
					$product_cgst = $this->security->xss_clean($this->input->post('product_gst'));
				}
				else
				{
					$product_cgst="0";
				}
				$product_sgst_check = $this->security->xss_clean($this->input->post('product_sgst_check'));
				if($product_sgst_check== "1")
				{
					$product_sgst = $this->security->xss_clean($this->input->post('product_sgst'));
				}
				else
				{
					$product_sgst="0";
				}
				$product_igst_check = $this->security->xss_clean($this->input->post('product_igst_check'));
				if($product_igst_check== "1")
				{
					$product_igst = $this->security->xss_clean($this->input->post('product_igst'));
				}
				else
				{
					$product_igst="0";
				}
				
				$imgpan = rand(). $_FILES['prod_img']['name'];
				move_uploaded_file($_FILES['prod_img']['tmp_name'], "resources/uploads/product/".$imgpan);				
				$validproduct = $this->productmodule->productvaildation($product_code);//** Product Validation based on product code **//
				if($validproduct== 0)
				{		
						
				$productdetails=array(
					'product_name'=>$product_name,
					'product_code'=>$product_code,
					'product_stock_name'=>$product_stock_name,
					'product_sku'=>$product_sku,
					'product_type_id'=>$product_type,
					'product_group_id' =>$product_group,
					'product_sub_group'=>$product_sub_group,
					'product_produ_type'=>$product_produ_type,
					'product_uom'=>$product_uom,
					'product_img'=>$imgpan,
					'product_sticer_id'=>$product_sticer_id,
					'product_report'=>$product_report,
					'product_stock_alert'=>$product_stock_alert,
					'product_alert_qty'=>$product_alert_qty,
					'product_size'=>$product_size,
					'product_created_by'=>$sess_user,
					'product_modified_by'=>$sess_user,
					'product_status'=>'enable',
					'product_add_date'=>date('Y-m-d h:i:s'),
					 );
					 
				//echo "<pre>"; print_r($productdetails); exit;					
				$productid=$this->productmodule->add_product_details($productdetails);//** Add Product details **//
				
	           $productpricing=array(
					'product_prd_id'=>$productid,
					'product_mrp'=>$product_pur_price,
					'product_hsn_sac'=>$product_hsn,
					'product_cgst_tax'=>$product_cgst,
					'product_sgst_tax'=>$product_sgst,
					'product_igst_tax'=>$product_igst,
					'product_selling_status'=>'for_sale',
					);	
					
			   $this->productmodule->add_pro_pricing_details($productpricing);		
				
					$this->session->set_flashdata('message', 'Item Added Successfully');
					redirect('product/product_list');				
				}
				else
				{
					$this->session->set_flashdata('message', 'Item Already Exist');
					redirect('product/product_list');
				}
			}
			else
			{
				$this->title = " Material";
				$this->keywords = " Material";
				redirect('product/addproduct'); 
			}
	} 
	
	//** Edit Product Details **//
	
	public function editproduct($id)
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
			if(isset($_POST['product_update']))
			{ 
				$product_name = $this->security->xss_clean($this->input->post('product_name'));
				$product_company_id = $this->security->xss_clean($this->input->post('company'));
				$product_type = $this->security->xss_clean($this->input->post('product_type'));
				$product_code = $this->security->xss_clean($this->input->post('product_code'));
				$product_group = $this->security->xss_clean($this->input->post('product_group'));
				$product_stock_name = $this->security->xss_clean($this->input->post('product_stock_name'));
				$product_sku = $this->security->xss_clean($this->input->post('product_sku'));
				
				$product_group = $this->security->xss_clean($this->input->post('product_group'));
				$product_sub_group = $this->security->xss_clean($this->input->post('material_sub_group'));
				$product_produ_type = $this->security->xss_clean($this->input->post('product_produ_type'));
				$product_uom = $this->security->xss_clean($this->input->post('product_uom'));
				
					
				$product_sticer_id = $this->security->xss_clean($this->input->post('product_sticer_id'));
				$product_report = $this->security->xss_clean($this->input->post('product_report'));
				$product_stock_alert = $this->security->xss_clean($this->input->post('product_stock_alert'));
				$product_alert_qty = $this->security->xss_clean($this->input->post('product_alert_qty'));
				$product_pur_price = $this->security->xss_clean($this->input->post('product_pur_price'));
				$product_size = $this->security->xss_clean($this->input->post('product_size'));
				$product_hsn = $this->security->xss_clean($this->input->post('product_hsn'));
						
				$product_gst_check = $this->security->xss_clean($this->input->post('product_gst_check'));
				if($product_gst_check== "1")
				{
					$product_gst = $this->security->xss_clean($this->input->post('product_gst_tax'));
				}
				else
				{
					$product_gst="0";
				}
				$product_sgst_check = $this->security->xss_clean($this->input->post('product_sgst_check'));
				if($product_sgst_check== "1")
				{
					$product_sgst = $this->security->xss_clean($this->input->post('product_sgst'));
				}
				else
				{
					$product_sgst="0";
				}
				$product_igst_check = $this->security->xss_clean($this->input->post('product_igst_check'));
				if($product_igst_check== "1")
				{
					$product_igst = $this->security->xss_clean($this->input->post('product_igst'));
				}
				else
				{
					$product_igst="0";
				}
				
								
				$validproduct= $this->productmodule->product_update_vaildation($product_item_code, $id); //** Update Product Validation based on product code and ID **//
				
				$doc_prodimg = $_FILES['prod_img']['name'];
				if($doc_prodimg != "")
				{
					$prodimg = rand(). $_FILES['prod_img']['name'];
					move_uploaded_file($_FILES['prod_img']['tmp_name'], "resources/uploads/product/".$prodimg);
				}
				else
				{
					$prodimg =	$this->input->post('hiddenproduct_img');
				}
				
				if($validproduct == 0)
				{		
						
				$productdetails=array(
					'product_name'=>$product_name,
					'product_code'=>$product_code,
					'product_stock_name'=>$product_stock_name,
					'product_sku'=>$product_sku,
					'product_type_id'=>$product_type,
					'product_group_id' =>$product_group,
					'product_sub_group'=>$product_sub_group,
					'product_produ_type'=>$product_produ_type,
					'product_uom'=>$product_uom,
					'product_img'=>$prodimg,
					'product_sticer_id'=>$product_sticer_id,
					'product_report'=>$product_report,
					'product_stock_alert'=>$product_stock_alert,
					'product_alert_qty'=>$product_alert_qty,
					'product_size'=>$product_size,
					'product_created_by'=>$sess_user,
					'product_modified_by'=>$sess_user,
					'product_status'=>'enable',
					'product_add_date'=>date('Y-m-d h:i:s'),
					 );
					 
				//echo "<pre>"; print_r($productdetails); exit;					
				$this->productmodule->update_product_details($productdetails, $id);//** Update Product details **//
				
	           $productpricing=array(
					'product_prd_id'=>$id,
					'product_mrp'=>$product_pur_price,
					'product_hsn_sac'=>$product_hsn,
					'product_cgst_tax'=>$product_gst,
					'product_sgst_tax'=>$product_sgst,
					'product_igst_tax'=>$product_igst,
					'product_selling_status'=>'for_sale',
					);	
					
			  $this->productmodule->update_pro_pricing_details($productpricing, $id);//** Update Pricebook Details **/
				
				$validproduct= $this->productmodule->product_update_vaildation($product_item_code, $id); //** Update Product Validation based on product code and ID **//
				
						

				
					$this->session->set_flashdata('message', 'Material Updated Successfully');
					redirect('product/product_list');				
				}
				else
				{
					$this->session->set_flashdata('message', 'Product Already Exist');
				}
			}
			else
			{
				$this->data["edit_product"] = $this->productmodule->getsingle_product($id);//** Get Single Product Details **//
				//echo "<pre>";
				//print_r($this->data["edit_product"]->product_group_id);
				$this->data["company_srt_name"] = $this->mastersmodule->get_all_company();//** Get All Company Details from Master's Module **//
				$this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); //** Get All Product Types **//
				$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
				$this->data["product_subgroup"] = $this->productmodule->get_allproductsubgroups($this->data["edit_product"]->product_group_id);//** Get All Product Group **//
				$this->data["product_manufac"] = $this->productmodule->get_allmanufacturer();//** Get All Manufacturer **//
				$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product DEtails **//
				$this->data["product_uom"] = $this->productmodule->get_alluom();//** Get All Unit of Measurememt Details **//
				$this->data["edit_product_items"] = $this->productmodule->get_product_list_items($id);//** Get Product Items **//
				
				$this->title = " Material";
				$this->keywords = " Material";
				$this->_render('pages/products/editproduct');
			}
	}
	
	public function productview($id)
	{
		
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		        
		        $this->data["store"] = $this->productmodule->get_all_store(); //** Get All Unit of Measurememt Details **//
				$this->data["edit_product"] = $this->productmodule->getsingle_product($id);//** Get Single Product Details **//

				$this->data["company_srt_name"] = $this->mastersmodule->get_all_company();//** Get All Company Details from Master's Module **//
				$this->data["product_type"] = $this->productmodule->get_allproducttypes($sess_company); //** Get All Product Types **//
				$this->data["product_group"] = $this->productmodule->get_allproductgroups();//** Get All Product Group **//
				$this->data["product_manufac"] = $this->productmodule->get_allmanufacturer();//** Get All Manufacturer **//
				$this->data["product_list"] = $this->productmodule->get_allproductsdetails();//** Get All Product DEtails **//
				$this->data["product_uom"] = $this->productmodule->get_alluom();//** Get All Unit of Measurememt Details **//
				$this->data["edit_product_items"] = $this->productmodule->get_product_list_items($id);//** Get Product Items **//
				$this->title = " Material";
				$this->keywords = " Material";
				$this->_render('pages/products/viewproduct');
	}
	
	//** Update Product Status **//
	
	public function productstatus($id,$status)
	{	
		$sessionData = $this->session->userdata('userlogin');
		$userid=$sessionData['user_id'];
		
		if($status == 'enable')
		{
			$changeStatus = 'disable';
		}
		else
		{
			$changeStatus = 'enable';
		}
		
		$productdata = array(
				  'product_status' => $changeStatus,
				  'product_modified_by' =>$userid ,
				  'product_update_date' => date('Y-m-d h:i:s'),
			  );	  
		$this->productmodule->updateproductstatus($productdata, $id);
		$this->session->set_flashdata('message', 'Product Deleted Successfully');
		redirect('product/product_list');
	}
	
	//** View Product **//
	
	public function viewproduct($id)
	{
		$this->title = " Material";
		$this->keywords = " Material";
		redirect('product/product_list');
	}
	
	//** Get Product Item Details **//
	
	public function getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		
		$produt_details = $this->productmodule->getitemdetails($product_item_id); //** Get Product Item Details **//
		
		$data['product_id'] = $produt_details->product_id;
		$data['product_type_id'] = $produt_details->product_type_id;
		$data['product_group_id'] = $produt_details->product_group_id;
		$data['product_name'] = $produt_details->product_name;
		$data['product_code'] = $produt_details->product_code;
		
		$data['product_mrp'] = $produt_details->product_mrp;
		$data['product_selling'] = $produt_details->product_selling;
		$data['product_cp'] = $produt_details->product_cp;
		//$data['product_uty_qty'] = $produt_details->product_uty_qty;
		$data['product_vat_tax'] = $produt_details->product_vat_tax;
		$data['product_gst_tax'] = $produt_details->product_gst_tax;
		$data['product_service_tax'] = $produt_details->product_service_tax;
		$data['product_cst_tax'] = $produt_details->product_cst_tax;
		$data['product_excise_duty_tax'] = $produt_details->product_excise_duty_tax;
		
		$data['uom_id'] = $produt_details->uom_id;
		$data['uom_name'] = $produt_details->uom_name;
		$result = json_encode($data);
		
		echo $result; exit;
	}
	
	//** Update Product Manuf. Part Number **//
	
	public function update_mfr()
	{
		$produt_details = $this->productmodule->get_products_mfr(); //** Get Manuf. Part Number **//
		foreach($produt_details as $PRD)
		{
			$product_id = $PRD['product_id'];
			$product_mfr_number = $PRD['product_mfr_part_number'];
			
			$prefix_mfr = array("CASI ", "CAS ");
			$replace_mfr   = array("", "");
			
			$removed_mfr = str_replace($prefix_mfr, $replace_mfr, $product_mfr_number);
			
			$update_mfr_details = array('product_id' => $product_id, 'product_mfr_part_number' => $removed_mfr);
			
			$this->productmodule->update_products_mfr($product_id, $update_mfr_details);//** Update Product Manuf. Part Number **//
			
			echo "<pre>"; print_r($product_mfr_number);
		}
		 exit;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */