<?php ob_start();
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchasepopup extends MY_Controller {

	public function __construct()
	{
		  
		  parent::__construct();
		  $this->load->helper('security');
		  $this->load->model('purchase_popup_model');
		  $this->load->model('productmodule');
		  
		  $sessionData = $this->session->userdata('userlogin');
		 
		 if(empty($sessionData))
		 {
			 redirect('signin');
		 }
	
	}
	
	public function index()
	{
		
	}
	
	//** Single Item Pop-up **//
	
	public function purchase_single_item()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		//** Get all Producttype **//
		$this->data["product_type"] = $this->purchase_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->purchase_popup_model->get_allproductgroups();//** Get all Productgroup **//
		if(!empty($this->data["product_type"]))
		{
			$producttype = $this->data["product_type"][0]['products_type_id'];
		}
		else
		{
			$producttype = "";
		}
		//** Get all Product Details **//
		$this->data["product_list"] = $this->purchase_popup_model->get_allproductsdetails($producttype);
		$result = $this->load->view("pages/popup/purchase_singleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	//** Multiple Item pop-up **//
	
	public function purchase_getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$division_id= $this->input->post('division_id');
		$store_id= $this->input->post('store_id');
		$purchse_ord_igst= $this->input->post('purchse_ord_igst');
		
		$pricebook_id = $this->input->post('pricebook_id');
	
		//** Get all Producttype **//
		$this->data["product_type"] = $this->purchase_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->purchase_popup_model->get_allproductgroups();//** Get all Productgroup **//
		//$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		$this->data['product_list'] = $this->purchase_popup_model->getmultipleproductsdetails($sess_group,$sess_company,$pricebook_id,$division_id,$store_id);
		//echo "<pre>"; print_r($this->data['product_list']); exit;
		$this->data["store_division_id"] = $division_id;
		$this->data["purchse_ord_igst"] = $purchse_ord_igst;
		 
		$result = $this->load->view("pages/popup/purchase_multipleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	public function gr_getmultipleitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$poindent_po_oder_id= $this->input->post('poindent_po_oder_id');
		$pricebook_id = $this->input->post('pricebook');
	
		//** Get all Producttype **//
		$this->data["product_type"] = $this->purchase_popup_model->get_allproducttypes($sess_group,$sess_company);
		$this->data["product_group"] = $this->purchase_popup_model->get_allproductgroups();//** Get all Productgroup **//
		//$this->data["store_division"] = $this->productmodule->get_all_store_division(); //** Get All store_division Details **//
		$this->data['product_list'] = $this->purchase_popup_model->getmultipleproducts_gr($sess_group,$sess_company,$pricebook_id,$poindent_po_oder_id);
		$this->data['poindent_po_oder_id'] = $poindent_po_oder_id;
		//echo "<pre>"; print_r($this->data['product_list']); exit;
				 
		$result = $this->load->view("pages/popup/gr_multipleitem_popup", $this->data, true);
		echo $result; exit;
	}
	
	
	//** Search In Multiple Item Details **//
	
	public function purchase_multiplesearchitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$division_id= $this->input->post('store_division_id');
		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook'));
		$product_type=$this->security->xss_clean($this->input->post('product_type'));
		$product_group=$this->security->xss_clean($this->input->post('product_group'));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		$item_igst_name=$this->security->xss_clean($this->input->post('item_igst_name'));
		$pricebook_id=$this->security->xss_clean($this->input->post('pricebook_id'));
		
		$this->data['product_list'] = $this->purchase_popup_model->getproductsdetailswithmultiplesearch($product_type,$product_group,$item_code,$item_name,$item_mfg_prtno,$division_id,$pricebook_id);//** Get All products based on Customer Details in Multiple Search **//
		$this->data['item_igst_name'] = $item_igst_name;
		$result = $this->load->view("pages/popup/purchase_search_multiple_items", $this->data, true);
		echo $result; exit;
	}
	
	
	//** Search In Multiple Item Details **//
	
	public function gr_multiplesearchitemdetails()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$poindent_po_oder_id=$this->security->xss_clean(trim($this->input->post('poindent_po_oder_id')));
		$item_code=$this->security->xss_clean(trim($this->input->post('item_code')));
		$item_name=$this->security->xss_clean($this->input->post('item_name'));
		$item_mfg_prtno=$this->security->xss_clean($this->input->post('item_mfg_prtno'));
		
		$this->data['product_list'] = $this->purchase_popup_model->get_grproductsdetailswithmultiplesearch($sess_group,$sess_company,$item_code,$item_name,$item_mfg_prtno,$poindent_po_oder_id);//** Get All products based on Customer Details in Multiple Search **//
		$this->data['poindent_po_oder_id'] = $poindent_po_oder_id;
		$result = $this->load->view("pages/popup/gr_search_multiple_items", $this->data, true);
		echo $result; exit;
	}
	
	//** Get Single Item Product Details **//
	 
 	public function purchase_getitemdetails()
	{
		$product_item_code = $this->input->post('product_item_cod');
		$product_item_id = $this->input->post('product_item_id');
		$pricebook_id = $this->input->post('pricebook');
		$produt_details = $this->purchase_popup_model->getitemdetails($product_item_id, $pricebook_id);
		
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
		$data['uom_id'] = $produt_details->uom_id;
		$data['uom_name'] = $produt_details->uom_name;
		$result = json_encode($data);
		echo $result; exit;
	}
	
	//** Get Vendor For Pop-up **//
	public function getvendorpopup()
	{
		$this->data["vendors"] = $this->purchase_popup_model->getvendors_for_popup_grid();
		
		$result = $this->load->view("pages/popup/vendor_popup", $this->data, true);
				
		echo $result; exit;
	}
	
	//** Search Vendor Details **//
	public function searchvendardetails()
	{
		 
		$vendor_code=$this->security->xss_clean($this->input->post('vendor_code'));
		$vendor_name=$this->security->xss_clean($this->input->post('vendor_name'));
		$ven_mobile=$this->security->xss_clean(trim($this->input->post('ven_mobile')));
		$ven_email=$this->security->xss_clean($this->input->post('ven_email'));
		
		$this->data['vendors'] = $this->purchase_popup_model->getvendordetailswithsearch($vendor_code,$vendor_name,$ven_mobile,$ven_email);//** Get All Vendor's search **//
		
		$result = $this->load->view("pages/popup/searchvendor_popup", $this->data, true);
				
		echo $result; exit;
	}
	
	//** Get Material Request For Pop-up **//
	public function getmaterialrequest()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["metrialRequest"] = $this->purchase_popup_model->getmetrialrequest_for_popup_grid();
		
		$result = $this->load->view("pages/popup/metrialrequest_popup", $this->data, true);
				
		echo $result; exit;
	}
	
	//** Material Request Search **//
	public function materialrequestsearch()
	{
		$mr_code=$this->security->xss_clean($this->input->post('mr_code'));
		$mr_type=$this->security->xss_clean($this->input->post('mr_type'));
		$this->data['metrialRequest'] = $this->purchase_popup_model->getmaterialrequestwithsearch($mr_code,$mr_type);//** Material Request Search **//
		
		$result = $this->load->view("pages/popup/searchmaterialrequest_popup", $this->data, true);		
		echo $result; exit;	
	}
	
	//** Get Material Request Details And Append Values **//
	
	public function getmetrialrequest()
	{
		$requset = $this->input->post('metrialRequestId');
		$this->data["metrialRequest"] = $this->purchase_popup_model->getmetrialrequestitems($requset);//** Get Material Request Items **//

		$data['view_order'] = $this->load->view('pages/popup/metrial_request_append_popup.php',$this->data,true);
		$metrialrequest = $this->data["metrialRequest"];
		
		$data['table_count'] = count($metrialrequest);
		$data['countofrows'] = count($metrialrequest);
		
		$result = json_encode($data);
		
		echo $result; exit;
	}
	
	//** Get Vendor Quatation Details For Pop-up **//
	
	public function getvendorqutationpopup()
	{
		$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		
		$this->data["vendor_quatations"] = $this->purchase_popup_model->get_vendor_quotation($sess_group,$sess_company);
		
		$result = $this->load->view("pages/popup/popup_vendor_qutations", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Search Vendor Quatation  **//
	
	public function searchvendorquatation()
	{
		$vq_code=$this->security->xss_clean($this->input->post('vq_code'));
		$vendor_name=$this->security->xss_clean($this->input->post('vendor_name'));
		
		$this->data['vendor_quatations'] = $this->purchase_popup_model->getvendorquatationsearch($vq_code,$vendor_name);
		
		$result = $this->load->view("pages/popup/searchvendorquatation_popup", $this->data, true);
				
		echo $result; exit;
		
	}
	
	//** Get Vendoe Qutation  Append Values **//
	
	public function getvendorqutationitems()
	{
		
		$request = $this->input->post('venqutid');
		$this->data["vendor_qoute_item"] = $this->purchase_popup_model->getsinglequotationitem($request);

		$data['view_order'] =$this->load->view('pages/popup/vendor_qutation_append_popup.php',$this->data,true);
		
		$vendor_qoute_item = $this->data["vendor_qoute_item"];
		
		$data['table_count'] = count($vendor_qoute_item);
		$data['countofrows'] = count($vendor_qoute_item);
		
		$total_gross_amount = 0;
		$total_tax_percentage = 0;
		$total_tax_amount = 0;
		$total_disocunts_percentage = 0;
		$total_disocunts_amount = 0;
		$total_net_amount = 0;
		
		if(!empty($vendor_qoute_item))
		{ 
			
			foreach($vendor_qoute_item as $ITEMS) 
			{
				$vq_items_priceperunit = $ITEMS['vquote_items_priceperunit'];
				$vq_items_qty = $ITEMS['vquote_items_qty'];
				$vq_items_gross_amount = $ITEMS['vquote_items_gross_amount'];
				$vq_items_tax_percent = $ITEMS['vquote_items_tax_percent'];
				
				$vq_items_tax_amount = $ITEMS['vquote_items_tax_amount'];
				$vq_items_discounts_percentage = $ITEMS['vquote_items_discounts_percentage'];
				$vq_items_discounts_amount = $ITEMS['vquote_items_discounts_amount'];
				$po_invoice_items_net_amount = $ITEMS['vquote_items_net_amount'];
				
				$total_gross_amount = $total_gross_amount + $vq_items_gross_amount;
				$total_tax_percentage = $total_tax_percentage + $vq_items_tax_percent;
				$total_tax_amount = $total_tax_amount + $vq_items_tax_amount;
				$total_disocunts_percentage = $total_disocunts_percentage + $vq_items_discounts_percentage;
				$total_disocunts_amount = $total_disocunts_amount + $vq_items_discounts_amount;
				$total_net_amount = $total_net_amount + $po_invoice_items_net_amount;
				
				//$total_grand_total = $total_grand_total + $total_net_amount;
								
			}
		}
		$data['po_total_gross_amount'] = $total_gross_amount;
		$data['po_total_tax_amount'] = $total_tax_amount;
		$data['po_total_tax_percentage'] = $total_tax_percentage;
		$data['po_total_discount_percentage'] = $total_disocunts_percentage;
		$data['po_total_discount_amount'] = $total_disocunts_amount;
		$data['po_grand_total'] = $total_net_amount;
		//$data['po_grand_total'] = $total_net_amount;
		$result = json_encode($data);
		
		echo $result; exit;
	}
	
	
	// smart search for multiple item code in purchase
	public function get_item_code()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_item_code($q);
		}
	 }
	 
	 // smart search for multiple item code in purchase
	public function get_po_item_code()
	{	
		//$term = $_GET['term'];
		$poindent_po_oder_id = $_GET['poindent_po_oder_id'];
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_po_item_code($q,$poindent_po_oder_id);
		}
	 }
	 
	 // smart search for multiple item partnumber in purchase
	 public function get_item_partnumber()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_item_partnumber($q);
		}
	 }
	 
	 public function get_po_item_partnumber()
	{
		$poindent_po_oder_id = $_GET['poindent_po_oder_id'];
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_po_item_partnumber($q,$poindent_po_oder_id);
		}
	 }
	 
	  // smart search for multiple item name in purchase
	 public function get_item_name()
	{
		$division_id = $_GET['division_id'];
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_item_name($q,$division_id);
		}
	 }
	 
	 public function get_po_item_name()
	{
		$poindent_po_oder_id = $_GET['poindent_po_oder_id'];
		
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_po_item_name($q,$poindent_po_oder_id);
		}
	 }
	 
	 public function get_item_type()
	{
		if (isset($_GET['term'])){
		  $q = strtolower($_GET['term']);
		  $this->purchase_popup_model->autosearch_item_name($q);
		}
	 }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */