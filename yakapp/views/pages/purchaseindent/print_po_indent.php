<?php //echo"<pre>";print_r($edit_indent);exit;?>
<?php $this->load->view('pages/number_to_words.php', true); ?>
<script>
function myprint() {
window.print();
return false();
}
</script>
<title>Goods Received</title>
<link href="<?php echo base_url();?>resources/css/stylesheet.css" rel="stylesheet" type="text/css" />

<body>
<div class="page_print">

    <div class="table_section">
     <table class="table"  >
	  
	 <tr>
	 <th>
	 <h2> 
     <img style="margin-left:10px;margin-top:15px;width: 140px;float:left" src="<?php echo base_url();?>resources/images/print_logo1.png" />
	 </h2>
	 <a href="javascript:void(0);" class="full_print" onClick="return myprint();" style="float:right; margin-right:20px; margin-top:8%;" >
     <img src="<?php echo base_url();?>resources/images/print.png" height="25" /></a>
	  
	  <br>
 	  <br>
	   <h2 align="center" colspan="5" style="font-size:25px;font-weight: bold;">
     CEEGO LABS PRIVATE LIMITED	<br></h2> <h2 align="center" colspan="5" style="font-size:18px;font-weight: bold;">								
     S No.84/1A1, 86/3A1, 86/3A2, 86/3B1 MANJAMEDU VILLAGE	<br>								
     THENNERI POST, KANCHEEPURAM 631 604 
     PH NO: 044-27259100/01<br>							
     Website:www.ceegolabs.com, E mail:info@ceegolabs.com	<br>							
     </h2>
	 </th>
	 </tr>
	
	 
	</div>
	
	
	 <table class="table" width="100%" >
	  <thead>
	 
	  <th  colspan="13" style="font-weight:bold; text-align:center;">
     
	 Goods Received Note
      
      </th>
      
      </thead>
	 <body>
	  <tr>
	  <td width="50%">&nbsp;Company GST NO :<a> <?php if(isset($compny_det->company_cst_number)){ echo $compny_det->company_cst_number; }else{}?></a> </td>
	  <td width="50%">&nbsp;GRN No :&nbsp; <a>
          <?php if(isset($edit_indent->po_indent_number)){ echo $edit_indent->po_indent_number; }else{}?>
        </a>  </td>
	  </tr>
	  
	  <tr>
	  <td width="50%"> </td>
	  <td width="50%">&nbsp;GRN Date:&nbsp;<a><?php if(isset($edit_indent->po_indent_date)){ echo date("d-m-Y", strtotime($edit_indent->po_indent_date)); }else{}?></a></td>
	  </tr>
	  
	  <tr>
	  <td>&nbsp;<a><?php if(isset($edit_indent->vendor_name)){ echo $edit_indent->vendor_name; }else{}?></a></td>
	 
	  <td>&nbsp;PO No: &nbsp;<a><?php if(isset($edit_indent->po_reference_number)){ echo $edit_indent->po_reference_number; }else{}?></a></td>
	  </tr>
	 
	  
     
	  <tr>
	  <td>&nbsp;<a> <?php if(isset($edit_indent->vendor_address)){ echo $edit_indent->vendor_address; }else{}?>
          
         <?php /*?> <?php if(isset($edit_indent->city_name)){ echo $edit_indent->city_name; }else{}?>
          -
          <?php if(isset($edit_indent->venor_zipcode)){ echo $edit_indent->venor_zipcode; }else{}?><?php */?></a> </td>
	  <td>&nbsp;Location:&nbsp;<a><?php if(isset($edit_indent->location_name)){ echo $edit_indent->location_name; }else{}?></a> </td>
	  </tr> 
	  
	  <tr>
	  <td></td>
	  <td>&nbsp;DC/INV:&nbsp;<a><?php if(isset($edit_indent->po_cus_dc_inv)){ echo $edit_indent->po_cus_dc_inv; }else{}?></a> </td>
	  </tr>

	  <tr>
	   <td>&nbsp;GST NO :&nbsp;<a><?php if(isset($edit_indent->vendor_cst_no)){ echo $edit_indent->vendor_cst_no; }else{}?></a></td>
	  
	  <td>&nbsp;DC/INV Date:&nbsp;<a><?php 
							 	if(isset($edit_indent->po_cus_dc_inv_date)){ 
										$originalDate=$edit_indent->po_cus_dc_inv_date;
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?></a> </td>
	  </tr>
	  <tr>
	 <td> </td>
	  <td>&nbsp;Transport Name: <a><?php if(isset($edit_indent->shipping_carrier_name)){ echo $edit_indent->shipping_carrier_name; }else{}?></a></td>
	  </tr>
	  
	   </body>
	  
	
	  
	  
  
  
    <table class="table">
      <thead>
        <tr>
          <th width="5%">S.No</th>
          <th width="7%">SKU</th>
          <th width="28%">Item</th>
          <th width="8%">HSN/SAC</th>
          <th width="7%">Control No</th>
          <th width="7%">Batch No</th>
          <th width="10%">Expiry Date</th>
          <th width="6%">Packing Size</th>
		   <th width="6%">UOM</th>
          <th width="6%">Ordered Qty </th>
          <th width="6%">Billed Qty </th>
          <th width="6%">Received Qty </th>
         <!-- <th width="6%">Pending Qty</th>-->
          <th width="6%">Extra Qty</th>
           
        </tr>
      </thead>
      <tbody>
        <?php 
		//echo "<pre>";print_r($edit_indent_items);
		if(!empty($edit_indent_items)){  
            $itemcount = 1; foreach($edit_indent_items as $ITEMS){ ?>
        <tr class="item-row">
          <td style="text-align:center"><?php echo $itemcount; ?></td>
          <td  style="text-align:center"><?php echo $ITEMS['po_indent_item_sku'];?></td>
          <td  style="text-align:center"><?php echo $ITEMS['product_name']; ?></td>
          <td  style="text-align:center"><?php echo $ITEMS['po_indent_item_hsn_san']; ?></td>
          <td  style="text-align:center"><?php echo $ITEMS['po_indent_item_control_no']; ?></td>
          <td  style="text-align:center"><?php echo $ITEMS['po_indent_item_batch_no']; ?></td>
          <td  style="text-align:center"><?php 
							 	if(isset($ITEMS['po_indent_item_expiry_date'])){ 
										$originalDate=$ITEMS['po_indent_item_expiry_date'];
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?>
          </td>
          <td  style="text-align:center"><?php echo $ITEMS['po_indent_item_pack_size']; ?></td>
		   <td style="text-align:center"><?php echo $ITEMS['uom_name'];?></td>
          <td style="text-align:center"><?php echo $ITEMS['po_indent_order_qty'];?></td>
          <td style="text-align:center"><?php echo $ITEMS['po_indent_build_qty'];?></td>
         
          <td style="text-align:center;"><?php echo $ITEMS['po_indent_received_qty'];?></td>
          <?php /*?><td style="text-align:center"><?php echo $ITEMS['po_indent_pending_qty'];?></td><?php */?>
          <td style="text-align:center"><?php echo $ITEMS['po_indent_extra_qty'];?></td>
        </tr>
        <?php $itemcount++; } } ?>
        <tr>
          <td class="col_space" colspan="14"></td>
        </tr>
        <?php /*?><tr>
          <td colspan="11" rowspan="5" style="width: 500px;"><span style="font-weight:bold;">Terms & Conditions:</span><br />
            <?php if(isset($edit_indent->po_invoice_terms_and_conditions)){ echo $edit_indent->po_invoice_terms_and_conditions; }else{}?></td>
        </tr><?php */?>
        <tr>
        <tr> </tr>
        <tr></tr>
        <tr> </tr>
      </tbody>
    </table>
  </div>
  <div class="inquiry_section">
    <div class="inquiry_section_col1">
      <div class="inquiry_section_col1_div1">
        <?php /*?><label class="label2">Area Code</label>
        <h3>
          <?php if(isset($compny_det->company_area_code)){ echo $compny_det->company_area_code; }else{}?>
        </h3><?php */?>
      <!--  <label class="label2">Company TIN No</label>
        <h3>
          <?php //if(isset($compny_det->company_tin_number)){ echo $compny_det->company_tin_number; }else{}?>
        </h3>-->
      
      </div>
      <!--<div class="inquiry_section_col1_div2">
        <h3>DIRECT ALL INQUIRIES TO:</h3>
        <p>V. Vijesh <br />
          +91 97909 05933 <br />
          email: vijesh@caveoinfosystems.com</p>
      </div>--> 
    </div>
    <!--<div class="inquiry_section_col2">
      
      <h4>THANK YOU FOR YOUR BUSINESS!</h4>
    </div>-->
    
  </div>
  <div class="inquiry_section_col3" style="margin-top:520px">
     <?php /*?> <h2>For
        <?php if(isset($compny_det->company_name)){ echo $compny_det->company_name; }else{}?>
      </h2><?php */?>
      <table style="width:900px;margin-left:-600px;margin-top:120px;" border="0" cellpadding="0" cellspacing="0">
      
      <tr>
      <td style="border:none;border-collapse:collapse;outline:none;" >Store Incharge</td>
      <td style="border:none;border-collapse:collapse;outline:none;">QC Incharge</td>
      <td style="border:none;border-collapse:collapse;outline:none;">Production Incharge</td>
      <td style="border:none;border-collapse:collapse;outline:none;">Purchase Incharge</td>
       </tr>
      
       </table>
      
    </div>
  <div class="footer" style="margin-left:1px;margin-top:30px;">
    <p>Correspondence / HO Address &nbsp;: CEEGOLABS PVT LTD&nbsp;,&nbsp;23/6 &nbsp; 
1st floor , Kodambakkam , Chennai.600024<span style="color:red;">|</span> www.ceegolabs.com</p>
  </div>
</div>
</body>
</html>