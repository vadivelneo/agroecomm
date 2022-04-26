<script>
function myprint() {
window.print();
return false();
}
</script>
<style>
.copy{
	float: left;
    width: 271px;
	margin-top: 30px;
}
#orignal{
	float: left;
    width: 34px;
    margin: 4px -3px 8px -10px;
    box-shadow: inherit;
}
.copy label{
    margin-right: 20px;
	float:left;
}
.detail_section_col1_div2 {
  float:right;
  width:145px;
}
.detail_section_col1_div2 h2{
	float:left;
	padding-bottom:0px;
}

.detail_section_col2_div2 {
    float: left;
    margin: 24px 0 !important;
    width: 428px;
}
</style>
<title>Sales Order Print</title>
<link href="<?php echo base_url();?>resources/css/stylesheet.css" rel="stylesheet" type="text/css" />
 

<body>
<div class="page_print" style="width: 950px !important;">
<div style="float:left;font-size:16px;font-weight:bold;margin-top: 10px;margin-bottom:0px;width:850px;margin-left:450px;"><strong>Tax Invoice</strong></div>
  <div class="header">
  <div class="detail_section_col1_div1">
        <h2><?php if(isset($compny_det->company_name)){ echo $compny_det->company_name; }else{}?></h2>
         <h2 style="font-size:12px;">Address:</h2><br />
        <p><?php if(isset($compny_det->company_address)){ echo $compny_det->company_address; }else{}?> <br />
          <?php /*?><?php if(isset($compny_det->city_name)){ echo $compny_det->city_name; }else{}?>-<?php if(isset($compny_det->company_zipcode)){ echo $compny_det->company_zipcode; }else{}?><?php */?></p>
        <p><?php if(isset($compny_det->company_street)){ echo $compny_det->company_street; }else{}?> </p><br />
		  <p class="label">GST: 33ABPFA0900M1ZK</p>
     
       </div>
       
      
       
  <?php if($compny_det->company_name != 'OGL') { ?> <img style="float:right;margin-top:-110px;width: 350px;margin-right: 106px;" src="<?php echo base_url();?>resources/images/<?php echo $compny_det->company_logo; ?>" alt="Estimation" /> <?php } else { ?> <h2 style="font-size:20px;">Estimation</h2> <?php } ?>
   <a href="javascript:void(0);" class="full_print" onClick="return myprint();" style="float:right; margin-top:-140px;margin-right:100px;" >
               <img src="<?php echo base_url();?>resources/images/print.png" height="25" /></a>
  </div>
    
	
  <div class="detail_section" style="margin-top:4px;">
    
   
	 <div class="detail_section_col2_div2">
        <h2>BUYER:</h2>
        <label class="label">Name</label>
        <h3><?php if(isset($so_data->sales_order_customer_name)){ echo $so_data->sales_order_customer_name.' ('.$so_data->OFCR_USR_VALUE.')'; }else{}?></h3>
        <label class="label">Address</label>
        <p><?php if(isset($so_data->OFCR_BILL_ADDRS1)){ echo $so_data->OFCR_BILL_ADDRS1; }else{}?><br />
		 <p><?php if(isset($so_data->OFCR_BILL_ADDRS2)){ echo $so_data->OFCR_BILL_ADDRS2; }else{}?><br />
         <?php if(isset($so_data->CTY_NME)){ echo $so_data->CTY_NME; }else{}?> - <?php if(isset($so_data->OFCR_BILL_ZIP)){ echo $so_data->OFCR_BILL_ZIP; }else{}?></p>
        
         <label class="label">Phone No.</label>
        <h3><?php if(isset($so_data->OFCR_MOB)){ echo $so_data->OFCR_MOB; }else{}?></h3>
       
       <?php /*?> <label class="label1">Status </label>
        <h2><?php if(isset($so_data->sales_order_status)){ echo $so_data->sales_order_status; }else{}?></h2><?php */?>
      </div>
    <div class="detail_section_col2_div2">
        <label class="label1">Sales Order No</label>
        <h2><?php if(isset($so_data->sales_order_number)){ echo $so_data->sales_order_number; }else{}?></h2>
        <label class="label1">Sales Order Date</label>
        <h2><?php if(isset($so_data->sales_order_transaction_date)){ echo date("d-m-Y", strtotime($so_data->sales_order_transaction_date));}else{}?></h2>
       
       <?php /*?> <label class="label1">Status </label>
        <h2><?php if(isset($so_data->sales_order_status)){ echo $so_data->sales_order_status; }else{}?></h2><?php */?>
      </div>
  </div>
  <div class="table_section">
    <table class="table">
      <thead>
       
          <tr style="width:150%">	
                <th width="5%">SN.</th>
                <th width="12%">SKU</th>
        		<th width="30%">Item</th>
                <th width="5%">HSN/SAC</th>
                <th width="10%">Qty</th>
			<!--	<th width="30%">Free Item</th>
                <th width="10%">Free Qty</th>-->
                <th width="10%">MRP</th>
                <th width="10%">Price</th>
				<!--<th width="15%">Discount (%)</th>-->
				<th width="15%">Disc. amt</th>
               <!-- <th width="10%">Damage Dis. (%)</th>
                <th width="10%">Damage Dis. amt</th>-->
                <th width="10%">Gross amt</th>
				<th width="10%">CGST %</th>
                <th width="10%">CGST amt</th>
                <th width="10%">SGST %</th>
                <th width="10%">SGST amt</th>
                
        </tr>
      </thead>
      <tbody>
      
          <?php
		//echo "<pre>"; print_r($so_item_total); 
		
		
		
		if(!empty($gross_amt_tax))
		{
		 $count_gross_amt_tax = count($gross_amt_tax); 
		 $gross_amt_tax_val = 0;
		 $items_discount_amount = 0;
		 $items_damage_discount_amount = 0;
		 $items_gst_amt = 0;
		 $items_sgst_amt = 0;
		if($count_gross_amt_tax > 1 )
		{
		
				foreach($gross_amt_tax as $gross_amt) 
				{
				$gross_amt_tax_val+= $gross_amt['so_items_gross_amount_with_discount'];
				$items_discount_amount+= $gross_amt['so_items_discounts_amount'];
				$items_damage_discount_amount+= $gross_amt['so_items_damage_discount_amount'];
				$items_gst_amt+= $gross_amt['so_items_gst_amt'];
				$items_sgst_amt+= $gross_amt['so_items_sgst_amt'];
				}
		}
		else
		{
				foreach($gross_amt_tax as $gross_amt)
				{
				
				$gross_amt_tax_val = $gross_amt['so_items_gross_amount_with_discount'];
				$items_discount_amount+= $gross_amt['so_items_discounts_amount'];
				$items_damage_discount_amount+= $gross_amt['so_items_damage_discount_amount'];
				$items_gst_amt+= $gross_amt['so_items_gst_amt'];
				$items_sgst_amt+= $gross_amt['so_items_sgst_amt'];
				
				}
		}
		}
		//echo $gross_amt_tax_val; 
		
		if(!empty($gross_amt_non_tax))
		{
		$count_gross_amt_non_tax = count($gross_amt_non_tax); 
		
		 $gross_amt_non_tax_val = 0;
		 $items_discount_non_tax_amount = 0;
		 $items_damage_discount_non_tax_amount = 0;
		 $items_gst_non_tax_amt = 0;
		 $items_sgst_non_tax_amt = 0;
		if($count_gross_amt_non_tax > 1 )
		{
		
				foreach($gross_amt_non_tax as $gross_amt) 
				{
				$gross_amt_non_tax_val+= $gross_amt['so_items_gross_amount_with_discount'];
				$items_discount_non_tax_amount+= $gross_amt['so_items_discounts_amount'];
				$items_damage_discount_non_tax_amount+= $gross_amt['so_items_damage_discount_amount'];
				$items_gst_non_tax_amt+= $gross_amt['so_items_gst_amt'];
				$items_sgst_non_tax_amt+= $gross_amt['so_items_sgst_amt'];
				}
		}
		else
		{
				foreach($gross_amt_non_tax as $gross_amt)
				{
				
				$gross_amt_non_tax_val+= $gross_amt['so_items_gross_amount_with_discount'];
				$items_discount_non_tax_amount+= $gross_amt['so_items_discounts_amount'];
				$items_damage_discount_non_tax_amount+= $gross_amt['so_items_damage_discount_amount'];
				$items_gst_non_tax_amt+= $gross_amt['so_items_gst_amt'];
				$items_sgst_non_tax_amt+= $gross_amt['so_items_sgst_amt'];
				
				}
		}
		}
		
		
		$row_count = 1;
		foreach($so_item_total_tax_group as $Tax_det) {
			
						
			$tax_group_total_disocunt_amount = $Tax_det['tax_group_total_disocunt_amount'];
			$tax_group_total_flat_amount = $Tax_det['tax_group_total_flat_amount'];
			$tax_group_cash_disocunt_amount = $Tax_det['tax_group_cash_disocunt_amount'];
			$tax_group_damage_discount_amt = $Tax_det['tax_group_damage_discount_amt'];
			$row = sizeof($so_item_total_tax_group);
			
			
		}
		//echo $tax_group_total_disocunt_amount.'</br>'; 
		//echo $tax_group_total_flat_amount.'</br>';
		//echo $tax_group_cash_disocunt_amount;
		$row_count+= $row;
		//echo $row_count; 
		 ?>
         <?php 
		 //echo "<pre>"; print_r($so_item_data);  
		 if(!empty($so_item_data)){  
            $itemcount = 1; foreach($so_item_data as $ITEMS){ ?>
      
          <tr class="item-row">
              <td><?php echo $itemcount; ?></td>
              <td  style="text-align:left"><?php echo $ITEMS['so_items_model'];?> </td>
              <td  style="text-align:left"><?php echo $ITEMS['so_items_name'];?> </td>
              <td  style="text-align:left"><?php echo $ITEMS['so_items_hsn_sac'];?> </td>
              <td style="text-align:center"><?php echo $ITEMS['so_items_ord_qty'];?></td>
            <!--  <td style="text-align:left"><?php //echo $ITEMS['so_items_free_item'];?></td>
              <td style="text-align:right"><?php //echo $ITEMS['so_items_free_qty'];?></td>-->
              <td style="text-align:right;"><?php echo $ITEMS['so_items_mrp'];?></td>
              <td  style="text-align:right"><?php echo $ITEMS['so_items_priceperunit']; ?></td>
             <?php /*?> <td  style="text-align:left"><?php echo $ITEMS['so_items_discounts_percentage'];?> </td><?php */?>
              <td style="text-align:right"><?php echo $ITEMS['so_items_discounts_amount'];?></td>
              <?php /*?><td style="text-align:left"><?php echo $ITEMS['so_items_damage_discount_perc'];?></td><?php */?>
            <!--  <td style="text-align:right"><?php //echo $ITEMS['so_items_damage_discount_amount'];?></td>-->
              <td style="text-align:right;"><?php echo $ITEMS['so_items_gross_amount_with_discount'];?></td>
              <td style="text-align:right;"><?php echo $ITEMS['so_items_gst'];?></td>
              <td  style="text-align:right"><?php echo $ITEMS['so_items_gst_amt']; ?></td>
              <td style="text-align:right;"><?php echo $ITEMS['so_items_sgst'];?></td>
              <td  style="text-align:right"><?php echo $ITEMS['so_items_sgst_amt']; ?></td>
          </tr>
          
      <?php $itemcount++; } } ?>
      <tr class="item-row">
              <td  colspan="5" style="text-align:left;font: 15px calibri;font-weight:bold;">TOTAL Taxable</td>
              
              <td  style="text-align:right"></td>
             
             <td  style="text-align:right"><?php if(isset($items_discount_amount)){ echo ($items_discount_amount); }else{}  ?></td>
             <td  style="text-align:right"><?php if(isset($items_damage_discount_amount)){ echo ($items_damage_discount_amount); }else{}  ?></td>
              <td  style="text-align:right"><?php if(isset($gross_amt_tax_val)){ echo ($gross_amt_tax_val); }else{}  ?></td>
              <td  style="text-align:right"></td>
              <td  style="text-align:right"><?php if(isset($items_gst_amt)){ echo ($items_gst_amt); }else{}  ?></td>
             <td  style="text-align:right"></td>
             <td  style="text-align:right"><?php if(isset($items_sgst_amt)){ echo ($items_sgst_amt); }else{}  ?></td>
          </tr>
          
           <tr class="item-row">
              <td  colspan="5" style="text-align:left;font: 15px calibri;font-weight:bold;">TOTAL Non Taxable</td>
              
              <td  style="text-align:right"></td>
             
             <td  style="text-align:right"><?php if(isset($items_discount_non_tax_amount)){ echo ($items_discount_non_tax_amount); }else{}  ?></td>
             <td  style="text-align:right"><?php if(isset($items_damage_discount_non_tax_amount)){ echo ($items_damage_discount_non_tax_amount); }else{}  ?></td>
              <td  style="text-align:right"><?php if(isset($gross_amt_non_tax_val)){ echo ($gross_amt_non_tax_val); }else{}  ?></td>
              <td  style="text-align:right"></td>
              <td  style="text-align:right"><?php if(isset($items_gst_non_tax_amt)){ echo ($items_gst_non_tax_amt); }else{}  ?></td>
             <td  style="text-align:right"></td>
             <td  style="text-align:right"><?php if(isset($items_sgst_non_tax_amt)){ echo ($items_sgst_non_tax_amt); }else{}  ?></td>
          </tr>
          
		  <?php  if($so_data->customer_discounts_tax == "gst") {  ?>
        
        <tr class="item-row">
              <td  colspan="<?php  if($so_data->customer_discounts_tax == "gst") { echo 14;  ?> <?php } else { echo 12;} ?>" style="text-align:left;font: 15px calibri;font-weight:bold;">Tax Details</td>
           </tr>
             <tr class="item-row">
            <td  colspan="1"></td>
             <td  style="text-align:right;font-weight:bold;">CGST %</td>
             <td  style="text-align:right;font-weight:bold;">SGST %</td>
              
              <td  style="text-align:right;font-weight:bold;">CGST amt</td>
               <td  style="text-align:right;font-weight:bold;">SGST amt</td>
               <td  style="text-align:right;font-weight:bold;">Gross amt</td>
              <td  colspan="<?php  if($so_data->customer_discounts_tax == "gst") { echo 14;  ?> <?php } else { echo 8;} ?>"></td>
         
        </tr>
            <?php if(!empty($so_data)){  
		//echo "<pre>";
		//print_r($si_item_total_tax_group);
            $itemcount = 1; foreach($so_item_total_tax_group as $tax_grp){ ?>
          
          
            <tr class="item-row">
            <td  colspan="1"></td>
             <td  style="text-align:right"><?php echo  $tax_grp['tax_group_tax_percentage']/2;?> %</td>
              <td  style="text-align:right"><?php echo  $tax_grp['tax_group_tax_percentage']/2;?> %</td>
            
              <td  style="text-align:right"><?php echo  $tax_grp['tax_group_tax_amount']/2;?> </td>
               <td  style="text-align:right"><?php echo  $tax_grp['tax_group_tax_amount']/2;?> </td>
                 <td  style="text-align:right"><?php echo  $tax_grp['tax_group_without_tax_gross_amount'];?> </td>
              <td  colspan="<?php  if($so_data->customer_discounts_tax == "gst") { echo 14;  ?> <?php } else { echo 8;} ?>"></td>
         
        </tr>
            <?php }} } ?>
			
        <tr>
          <td class="col_space" colspan="13"></td>
        </tr>
        <tr>
          <td colspan="5" rowspan="<?php echo $row_count; ?>" style="width: 500px;"> <span style="font-weight:bold;"></span><br />
           <td colspan="6">Total Gross Amount</td>
          <td class="right" colspan="2"> <?php if(isset($so_item_total->so_total_gross_amount)){ echo ($so_item_total->so_total_gross_amount - $so_item_total->so_total_discount_amount); }else{}?></td>
        </tr>
        
   
        
        <tr>
          <td colspan="6">Tax Amount </td>
          <td class="right" colspan="2"> <?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount; }else{}?></td>
        </tr>
         
        <tr>
          <td colspan="6" style="font-weight:bold;">Net Amount</td>
          <td class="right" colspan="2" style="font-weight:bold;"> <?php if(isset($so_item_total->so_grand_total)){ echo $so_item_total->so_grand_total; }else{}?></td>
        </tr>
		
        <tr>
          <td colspan="13" style="font-weight:bold;">Amount in Words:  &nbsp;  &nbsp;  &nbsp;  &nbsp; <?php echo ucwords($words_in_total); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="inquiry_section">
    <div class="inquiry_section_col1">
      <div class="inquiry_section_col1_div1">
	  <h3>MAKE ALL CHEQUE PAYABLE TO:</h3><br>
        <h3>Company's Bank Details</h3>
        <label class="label2">Bank Name: ICICI</label>
		 <label class="label2">Account No.: 002505014781</label>
		  <label class="label2">IFSC Code: ICIC0000025</label>
		   <label class="label2">Branch: Gobi</label>
        <h3></h3>
        
        <div class="copy">
        <label></label> 
        </div>
      </div>
      
    </div>
  
    <div class="inquiry_section_col3"> 
    	<h2>For <?php if(isset($compny_det->company_name)){ echo $compny_det->company_name; }else{}?></h2>
       <h3>Authorised Signatory</h3>
    </div>
  </div>
 
</div>
</body>
</html>
