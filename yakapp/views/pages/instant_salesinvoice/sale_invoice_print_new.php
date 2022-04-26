<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sales Invoice</title>
   <link href="<?php echo base_url();?>resources/css/stylenew.css" rel="stylesheet" type="text/css" />
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  </head>
  <body>
   <header class="clearfix">
      <div id="logo">
        <img src="<?php echo base_url();?>resources/images/print_logo1.png">
      </div>
	   <div class="company-details">
        <h2 class="name"> <?php if(isset($invoice_edit->manufacturer_name)){ echo $invoice_edit->manufacturer_name; }else{}?></h2>
		<h3 class="address">42, Kamaraj Street, Erode- 638001</h3>
		<h3 class="address">PH NO: 0424-4243188, 9364571875/01</h3>
		<h2 class="invoice">INVOICE</h2>
         </div>
       </div>
    </header>
	<!-- first row--->
	<div id="details" class="clearfix">
        <div id="project" class="padding-bottom-13">
         
          <div class="arrow"><div class="inner-arrow"><span>Invoice No</span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_no)){ echo $invoice_edit->sale_invoice_no; }else{}?></div></div>
		  <div class="arrow"><div class="inner-arrow"><span>Invoice Date</span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_date )){ echo date("d-m-Y", strtotime($invoice_edit->sale_invoice_date)); }else{}?></div></div>
		   <div class="arrow"><div class="inner-arrow"><span>Quantity</span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_qty)){ echo $invoice_edit->sale_invoice_qty; }else{}?></div></div>
          <div class="arrow"><div class="inner-arrow"><span>Weight</span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_weight)){ echo $invoice_edit->sale_invoice_weight; }else{}?></div></div>
        </div>
        <div id="detail-1">
           <div class="arrow"><div class="inner-arrow"><span>Value</span>:&nbsp; &nbsp<?php if(isset($invoice_edit->sale_invoice_value)){ echo $invoice_edit->sale_invoice_value; }else{}?></div></div>
          <div class="arrow"><div class="inner-arrow"><span>Service Tax </span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_tax)){ echo $invoice_edit->sale_invoice_tax; }else{}?></div></div>
          <div class="arrow"><div class="inner-arrow"><span>Freight Charges</span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_freight )){ echo $invoice_edit->sale_invoice_freight; }else{}?></div></div>
		 <div class="arrow"><div class="inner-arrow"><span>Total amount</span>:&nbsp; &nbsp;<?php if(isset($invoice_edit->sale_invoice_amount)){ echo $invoice_edit->sale_invoice_amount; }else{}?></div></div>
		  
        </div>
      </div>
	<!-- End first row -->
	<!-- Second row--->
	<div id="details" class="clearfix">
        <div id="project">
		<div class="heading-details" style="background: #538ed5;">Details of Shipper</div>
        <div class="arrow"><div class="inner-arrow"><span>Name</span>:&nbsp; <?php if(isset($invoice_edit->customer_name)){ echo $invoice_edit->customer_name; }else{}?>,</div></div>
        <div class="arrow"><div class="inner-arrow"><div class="address-1">Address </div><span class="poss" style="
    width: 225px;">:&nbsp; <?php if(isset($invoice_edit->sale_invoice_shipper)){ echo $invoice_edit->sale_invoice_shipper; }else{}?>&nbsp;</span>
        </div></div>
       
		
        </div>
        <div id="detail-1">
		<div class="heading-details" style="background: #538ed5;">Details of Receiver</div>
        
        <div class="arrow"><div class="inner-arrow"><div class="address-1">Address </div><span class="poss" style="
    width: 225px;">: &nbsp;<?php if(isset($invoice_edit->sale_invoice_receiver)){ echo $invoice_edit->sale_invoice_receiver; }else{}?></span>
         </div></div>
       
		
        </div>
      </div>
	<!-- End Second row -->
   
    </main>
  </body>
</html>