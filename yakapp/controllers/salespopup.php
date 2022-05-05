<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salespopup extends MY_Controller {

	public function __construct()
	{
		  
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('sales_popup_model');
		  
		  $sessionData = $this->session->userdata('userlogin');
		 
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
		 else
		{	
			$this->data['login_user_id'] = $sessionData['user_id'];
			$this->data['login_company_id'] = $sessionData['company_id'];
			$this->data['login_group_id'] = $sessionData['group_id'];
			$this->data['tax_value'] = $sessionData['company_tax'];
		}
	
	}
	
	public function index()
	{
		$this->title = "Dashboard";
		$this->keywords = "Dashboard";
		$this->_render('pages/dashboard');
	}
	
	//** Single Item Pop-up **//
	
	public function sales_single_item()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$customer_id = $this->input->post('customer_id');
		
		$pricebook_id = $this->input->post('pricebook');
		
		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
		//** Get all Product Details **//
		$this->data["product_list"] = $this->sales_popup_model->get_allproductsdetails($producttype,$pricebook_id);
		$result = $this->load->view("pages/popup/sales_singleitem_popup", $this->data, true);
		echo $result; exit;
	}
		public function salesreturn_getmultipleitemdetails_region()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		$customer_id = $this->input->post('customer_id');
		$customer_discount = $this->input->post('customer_discount');
	
		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetails($pricebook_id);//** Get All Product Based on customers **//
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		$this->data['customer_discount'] = $customer_discount;
		$result = $this->load->view("pages/popup/salesreturn_popup_region", $this->data, true);
		
		echo $result; exit;
	}
	public function instantsales_single_item()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$customer_id = $this->input->post('customer_id');
		//echo $customer_id;
		$pricebook_id = $this->input->post('pricebook');
		
		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
		//** Get all Product Details **//
		$this->data["product_list"] = $this->sales_popup_model->get_allproductsdetails($producttype,$pricebook_id);
		$result = $this->load->view("pages/popup/instantsales_singleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	
		public function sales_return_single_item()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$customer_id = $this->input->post('customer_id');
		//echo $customer_id;
		$pricebook_id = $this->input->post('pricebook');
		
		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["lot_id"] = $this->sales_popup_model->get_all_lot_id();
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
		//** Get all Product Details **//
		$this->data["product_list"] = $this->sales_popup_model->get_allproductsdetails($producttype,$pricebook_id);
		$result = $this->load->view("pages/popup/sales_return_singleitem_popup", $this->data, true);
		echo $result; exit;
	}
	//** Multiple Item pop-up **//
	
	public function sales_getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		$customer_id = $this->input->post('customer_id');
		$customer_discount = $this->input->post('customer_discount');
		$customer_tax_type = $this->input->post('customer_tax_type');
		$division_id = $this->input->post('division_id');
		$store_id = $this->input->post('store_id');

		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetails($pricebook_id,$division_id,$store_id);//** Get All Product Based on customers **//
		//echo "<pre>"; print_r($this->data['product_list']); exit;
		//echo $pricebook_id; exit;
		
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		$this->data['customer_discount'] = $customer_discount;
		$result = $this->load->view("pages/popup/sales_multipleitem_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	public function instantsales_getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		$customer_id = $this->input->post('customer_id');
		$customer_discount = $this->input->post('customer_discount');
		$division_id = $this->input->post('division_id');
		$store_id = $this->input->post('store_id');
	
		//** Get all Producttype **//
		
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetails($pricebook_id,$division_id,$store_id);//** Get All Product Based on customers **//
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		$this->data['customer_discount'] = $customer_discount;
		$result = $this->load->view("pages/popup/instantsales_multipleitem_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	public function salesreturn_getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		$customer_id = $this->input->post('customer_id');
		$customer_discount = $this->input->post('customer_discount');
	
		//** Get all Producttype **//
		$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetails($pricebook_id);//** Get All Product Based on customers **//
		$this->data["customer_tax_type"] = $this->sales_popup_model->get_product_tax_type($customer_id);
		$this->data['customer_discount'] = $customer_discount;
		$result = $this->load->view("pages/popup/salesreturn_multipleitem_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	//** Services pop-up **//
	
	public function sales_getservices()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id = $this->input->post('pricebook');
		$customer_id = $this->input->post('customer_id');
		$customer_discount = $this->input->post('customer_discount');
	
		//** Get all Producttype **//
		//$this->data["product_type"] = $this->sales_popup_model->get_allproducttypes($sess_group,$sess_company);
		//$this->data["product_group"] = $this->sales_popup_model->get_allproductgroups();//** Get all Productgroup **//
		//$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetails($pricebook_id);//** Get All Product Based on customers **//
		$this->data['services_list'] = $this->sales_popup_model->get_services();//** Get All Services **//
		$this->data['customer_discount'] = $customer_discount;
		$result = $this->load->view("pages/popup/sales_services_popup", $this->data, true);
		
		echo $result; exit;
	}
	
	
	//** Search In Multiple Item Details **//
	
	public function sales_multiplesearchitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook'));
		$product_type=$this->security->xss_clean($this->input->post('product_type'));
		$product_group=$this->security->xss_clean($this->input->post('product_group'));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		$customer_discount = $this->input->post('customer_discount');
		$this->data['customer_discount'] = $customer_discount;
		$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetailswithmultiplesearch($pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno);//** Get All products based on Customer Details in Multiple Search **//
		$result = $this->load->view("pages/popup/sales_search_multiple_items", $this->data, true);
		echo $result; exit;
	}
	public function instantsales_multiplesearchitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook'));
		$product_type=$this->security->xss_clean($this->input->post('product_type'));
		$product_group=$this->security->xss_clean($this->input->post('product_group'));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		$customer_discount = $this->input->post('customer_discount');
		$this->data['customer_discount'] = $customer_discount;
		$this->data['product_list'] = $this->sales_popup_model->getcustomerbasedproductsdetailswithmultiplesearch($pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno);//** Get All products based on Customer Details in Multiple Search **//
		$result = $this->load->view("pages/popup/instantsales_search_multiple_items", $this->data, true);
		echo $result; exit;
	}
	
	//** Get Single Item Product Details **//
	 
 	public function sales_getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		$pricebook_id = $this->input->post('pricebook');
		
		$produt_details = $this->sales_popup_model->getitemdetails($product_item_id, $pricebook_id);
		//echo "<pre>";print_r($produt_details); exit;
		$data['product_id'] = $produt_details->product_id;
		$data['product_type_id'] = $produt_details->product_type_id;
		$data['product_group_id'] = $produt_details->product_group_id;
		$data['product_name'] = $produt_details->product_name;
		$data['product_code'] = $produt_details->product_code;
		$data['product_model_number'] = $produt_details->product_model_number;
		$data['product_mfr_part_number'] = $produt_details->product_mfr_part_number;
		$data['product_mrp'] = $produt_details->price_book_price_mrp;
		$data['product_discount_percentage'] = $produt_details->price_book_price_discount_percentage;
		$data['product_discount_amount'] = $produt_details->price_book_price_discount_amount;
		$data['product_selling'] = $produt_details->price_book_price_selling_price;
		$data['product_vat_tax'] = $produt_details->price_book_price_vat;
		$data['product_gst_tax'] = $produt_details->price_book_price_gst;
		$data['product_service_tax'] = $produt_details->price_book_price_service;
		$data['product_cst_tax'] = $produt_details->price_book_price_cst;
		$data['product_excise_duty_tax'] = $produt_details->price_book_price_excise;
		$data['uom_id'] = $produt_details->uom_id;
		$data['uom_name'] = $produt_details->uom_name;
		$data['inventory_item_id'] = $produt_details->inventory_item_id;
		$data['inventory_qty'] = $produt_details->inventory_qty;
		$result = json_encode($data);
		echo $result; exit;
	}
	
	public function sales_return_new_get_lot_value()
	{
		$search_lot = $this->input->post('search_lot');
		//echo $search_lot; exit;
		$lot_details = $this->sales_popup_model->get_lot_value($search_lot);
		//echo "<pre>";print_r($lot_details); exit;
		
		$data['lot_no'] = $lot_details->lot_no;
		$data['product_id'] = $lot_details->product_id;
		$data['product_code'] = $lot_details->product_code;
		$data['scheme_id'] = $lot_details->scheme_id;
		$data['scheme_code'] = $lot_details->scheme_code;
		$data['sku_name'] = $lot_details->sku_name;
		$data['product_name'] = $lot_details->product_name;
		$data['product_price'] = $lot_details->product_price;
		$data['product_mrp'] = $lot_details->product_mrp;
		$data['tax'] = $lot_details->tax;
		$data['tax_amount'] = $lot_details->tax_amount;
		$data['lot_created_by'] = $lot_details->lot_created_by;
		$data['lot_updated_by'] = $lot_details->lot_updated_by;
		$data['lot_created_date'] = $lot_details->lot_created_date;
		$data['lot_updated_date'] = $lot_details->lot_updated_date;
		
		$result = json_encode($data);
		echo $result; exit;
	}
	
	//** Onchange Product Type in Single Item Pop-up **//
	
	public function onchangegetitemspopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$product_type = $this->input->post('product_type');
		$product_group = $this->input->post('product_group');
		$pricebook_id = $this->input->post('pricebook');
		
		$product_list = $this->sales_popup_model->onchangeitemstype($product_type,$product_group,$pricebook_id);
		
		if(empty($product_list))
		{
			$result['itmes'] = "<option value=''>Select Item</option>";
		}
		else
		{
			$itmes = "<option value=''>Select Item</option>";
			foreach($product_list as $PROLST)
			{
					$itmes .= "<option value='{$PROLST["product_id"]}'>{$PROLST["product_code"]}</option>";
			}
			
			$result['itmes'] = $itmes; 
			
		}
		
		if(empty($product_list))
		{
			$result['partnumber'] = "<option value=''>Select Manfr.Part.No</option>";
		}
		else
		{
			$partnumber = "<option value=''>Select Manfr.Part.No</option>";
			foreach($product_list as $PROLST)
			{
					$partnumber .= "<option value='{$PROLST["product_mfr_part_number"]}' data-partid='{$PROLST["product_id"]}'>{$PROLST["product_mfr_part_number"]}</option>";
			} 
			$result['partnumber'] = $partnumber; 
			
		}
		echo json_encode($result);
		
		exit;
	}
	
	//** Customer Pop-up Details **//
	
	public function customerpopup()
	{
		$this->data["customer_data"] = $this->sales_popup_model->getcustomerdetail_for_popup_grid();//** Customer Pop-up details **//
		$result = $this->load->view("pages/popup/customer_popup", $this->data, true);
		echo $result; exit;
	}
	
	//** Search Customer Details in Customer Pop-up **//
	
	public function searchcustomerdetails()
	{
		$cus_code=$this->security->xss_clean($this->input->post('cus_code'));
		$cus_name=$this->security->xss_clean($this->input->post('cus_name'));
		$cus_mobile=$this->security->xss_clean(trim($this->input->post('cus_mobile')));
		$cus_email=$this->security->xss_clean($this->input->post('cus_email'));
		
		$this->data['customer_data'] = $this->sales_popup_model->getcustomerdetailswithsearch($cus_code,$cus_name,$cus_mobile,$cus_email);
		
		$result = $this->load->view("pages/popup/searchcustomer_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	// smart search for multiple item code in sales
	public function get_item_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->sales_popup_model->autosearch_item_code($q);
		}
	 }
	 
	 // smart search for multiple item partnumber in sales
	 public function get_item_partnumber()
	{
		
		if (isset($_POST['item_mfg_prtno'])){
		$q = strtolower($_POST['item_mfg_prtno']);
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];

		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook'));
		$product_type=$this->security->xss_clean($this->input->post('product_type'));
		$product_group=$this->security->xss_clean($this->input->post('product_group'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_code=$this->security->xss_clean($this->input->post('item_code'));
		$selected_itmes = $this->security->xss_clean($this->input->post('items'));
		$store_id = $this->security->xss_clean($this->input->post('store_id'));
		$customer_discount = $this->input->post('customer_discount');
		$this->data['customer_discount'] = $customer_discount;
		
		
		$this->sales_popup_model->autosearch_item_partnumber($q,$pricebook_id,$product_type,$product_group,$item_code,$item_name,$item_mfg_prtno,$store_id);
		}
	 }
	 
	 // smart search for multiple item name in sales
	 public function autosearch_item_selected()
	{
		$this->sales_popup_model->autosearch_item_selected($q);
		exit;
	}
	 
	  // smart search for multiple item name in sales
	 public function get_item_name()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->sales_popup_model->autosearch_item_name($q);
		}
	 }
	
	
	
	
	 	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */