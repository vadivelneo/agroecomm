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
.label2
{
	font-size:17px !important;
	width: 170px !important;
}
</style>
<title>Sales Order Print</title>
<link href="<?php echo base_url();?>resources/css/stylesheet.css" rel="stylesheet" type="text/css" />
 

<body>
<div class="page_print">

    <a href="javascript:void(0);" class="full_print" onClick="return myprint();"  >
               <img src="<?php echo base_url();?>resources/images/print.png" height="25" /></a>
	<div style="float:left;font-size:25px;font-weight:bold;margin-bottom:0px;width:300px;margin-left:140px;"><strong>AGRO</strong></div>
  <div class="detail_section">
    <?php /*?><div class="detail_section_col1">
      
      <div class="detail_section_col1_div2">
        <!--<h2>SALES Order</h2>--><span id ="print_status"><input type="text" name="print_change" id="print_change" readonly style="border: none;box-shadow: none; margin-left: 240px;" /></span>
      </div>
    </div><?php */?>
    <div class="detail_section_col2">
      
      <div class="detail_section_col2_div2">
	  <label class="label2">GST: </label>
	  <h2>33ABPFA0900M1ZK</h2>
        <label class="label2">Sales Order No</label>
        <h2><?php if(isset($so_data->sales_order_number)){ echo $so_data->sales_order_number; }else{}?></h2>
        <label class="label2">Date</label>
        <h2><?php if(isset($so_data->sales_order_transaction_date)){ echo date("d-m-Y", strtotime($so_data->sales_order_transaction_date));}else{}?></h2>
       
      </div>
    </div>
 
  </div>
  <div class="table_section">
    <table class="table">
      <thead>
       
          <tr style="width:150%">	
                <th width="5%">SN0.</th>
        		<th width="30%">Item</th>
                <th width="10%">Units</th>
                <th width="10%">Amount[Rs]</th>
			
                
        </tr>
      </thead>
      <tbody>
      
          <?php
		//echo "<pre>"; print_r($so_item_total); 
	
		
		
		$row_count = 1;
		foreach($so_item_total_tax_group as $Tax_det) {
			
						
			$tax_group_total_disocunt_amount = $Tax_det['tax_group_total_disocunt_amount'];
			$tax_group_total_flat_amount = $Tax_det['tax_group_total_flat_amount'];
			$tax_group_cash_disocunt_amount = $Tax_det['tax_group_cash_disocunt_amount'];
			$tax_group_damage_discount_amt = $Tax_det['tax_group_damage_discount_amt'];
			$row = sizeof($so_item_total_tax_group);
			
			
		}
		
		$row_count+= $row;
		//echo $row_count; 
		 ?>
         <?php 
		 //echo "<pre>"; print_r($so_item_data);  
		 if(!empty($so_item_data)){  
            $itemcount = 1; foreach($so_item_data as $ITEMS){ ?>
      
          <tr class="item-row">
              <td><?php echo $itemcount; ?></td>
              <td  style="text-align:left"><?php echo $ITEMS['so_items_name'];?> </td>
              <td style="text-align:center"><?php echo $ITEMS['so_items_ord_qty'];?></td>
              <td  style="text-align:right"><?php echo $ITEMS['so_items_gross_amount_with_discount']; ?></td>
             
          </tr>
          
      <?php $itemcount++; } } ?>
      
        <tr>
          <td class="col_space" colspan="4"></td>
        </tr>
        <tr>
           <td colspan="2">Total Gross Amount</td>
          <td class="right" colspan="2"> <?php if(isset($so_item_total->so_total_gross_amount)){ echo ($so_item_total->so_total_gross_amount - $so_item_total->so_total_discount_amount); }else{}?></td>
        </tr>
        
  
        
        <tr>
          <td colspan="2">Tax Amount </td>
          <td class="right" colspan="2"> <?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount; }else{}?></td>
        </tr>
         
        <tr>
          <td colspan="2" style="font-weight:bold;">Net Amount</td>
          <td class="right" colspan="2" style="font-weight:bold;"> <?php if(isset($so_item_total->so_grand_total)){ echo round($so_item_total->so_total_gross_amount + $so_item_total->so_total_tax_amount); }else{}?></td>
        </tr>
		
      
      </tbody>
    </table>
  </div>
 <div class="inquiry_section">
    <div class="inquiry_section_col1">
      <div class="inquiry_section_col1_div1">
       
        <label class="label2">INCENTIVE REDEEMED :</label>
        <h3><?php if(isset($so_item_total->total_redeem_amount)){ echo $so_item_total->total_redeem_amount; }else{}?></h3>
		<label class="label2">TOTAL BILL PAYABLE :</label>
        <h3><?php if(isset($so_item_total->so_grand_total)){ echo $so_item_total->so_grand_total; }else{}?></h3>
		<label class="label2">BILL PAYABLE :</label>
		 <h3><?php echo ucwords($words_in_total); ?></h3>
		<h3><?php echo " கழனி செழிக்க கரம் கோர்ப்பொம்...."; ?></h3>
		
       
      </div>
     
    </div>
   
  
  </div>
  
</div>
</body>
</html>
