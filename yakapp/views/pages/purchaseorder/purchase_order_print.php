<html>
<head>
<title>Purchase Order Print</title>
<link href="<?php echo base_url();?>resources/css/stylesheet.css" rel="stylesheet" type="text/css" />
 <script>
function myprint() {
window.print();
return false();
}
</script>


</head>
<body>

<div class="page_print">
 
	  <!-- new-->
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
	   <h1 align="center" colspan="5" style="font-size:25px;font-weight: bold;">
     Siddha <br></h1> <h1 align="center" colspan="5" style="font-size:18px;font-weight: bold;">								
     62/802, 1st St, G Block, Ranganathan Garden, 
	<br>								
     Anna Nagar, Chennai, Tamil Nadu 600040						
     <br>	
     
      
	 </th>
	 </tr>
	
	 
	</div>
	 

	 <table class="table" width="100%" >
	  <thead>
	 
	  <th  colspan="13" style="font-weight:bold;font-size:18px; text-align:center;">
     
	 PURCHASE ORDER
      
      </th>
      
      </thead>
	 <body>
	  <tr>
	  <td width="50%">&nbsp;GST NO :<a> <?php if(isset($compny_det->company_cst_number)){ echo $compny_det->company_cst_number; }else{}?></a></td>
	  <td width="50%">&nbsp;PO.NO : <a><?php if(isset($editpurchaseorder->po_po_no)){ echo $editpurchaseorder->po_po_no; }else{}?></a>  </td>
	  </tr>
	  
	  <tr>
	  <td width="50%"> </td>
	  <td width="50%">&nbsp;PO DATE: <a><?php 
							 	if(isset($editpurchaseorder->po_trans_date)){ 
										$originalDate=$editpurchaseorder->po_trans_date;
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?></a></td>
	  </tr>
	  
	  <tr>
	  <td>&nbsp;Party Name : <a><?php if(isset($editpurchaseorder->vendor_name)){ echo $editpurchaseorder->vendor_name; }else{}?></a></td>
	  <td>&nbsp;Despatch Date : <a><?php 
							 	if(isset($editpurchaseorder->po_delivery_date)){ 
										$originalDate=$editpurchaseorder->po_delivery_date;
										if($originalDate == '0000-00-00'){ echo '-'; }
										else
										{
											$newDate=date("d-m-Y", strtotime($originalDate));
											echo $newDate;
										}
										} 
							 ?></a></td>
	  </tr>
	 
	  
	
     
	  <tr>
	  <td>&nbsp;Party Address : &nbsp;&nbsp;<a><?php if(isset($editpurchaseorder->vendor_address)){ echo $editpurchaseorder->vendor_address; }else{}?></a></td>
	  <td>&nbsp;Commodity: </td>
	  </tr>
	  <tr>
	  <td>&nbsp;Payment Terms : <a><?php if(isset($editpurchaseorder->po_payment_terms)){ echo $editpurchaseorder->po_payment_terms;}?></a> </td>
	 
	 <td>&nbsp;Range : <a>WALAJABAD</a> </td>
	  </tr>
	  <tr>
	  <td>&nbsp;GST NO : <a><?php if(isset($editpurchaseorder->vendor_cst_no)){ echo $editpurchaseorder->vendor_cst_no; }else{}?></a></td>
	  <td>&nbsp;Division :<a> MARAIMALAI NAGAR</a></td>
	  </tr>
	  
	  <tr>
	  <td>&nbsp;Transport Name:&nbsp; <a><?php if(isset($editpurchaseorder->shipping_carrier_name)){ echo $editpurchaseorder->shipping_carrier_name; }else{}?></a> </td>
	  <td>&nbsp;Commissionerate:<a> CHENNAI OUTER NEW </a></td>
	  </tr>
	  <tr>
          <td class="col_space" colspan="13" style="font-weight:bold; text-align:center;">
		  
		  Please supply the following  materials as per terms & conditions mentioned below.    
		  
		  </td>
        </tr>
	 
    </div>
   </body>
	   </table>    
	  
    
    
    <?php
	  $cgst_amt = 0;
	  $sgst_amt = 0;
	  $igst_amt = 0;
	  
	 // echo "<pre>";
	 // print_r($tax_group);
		
		if(!empty($tax_group))
		{
		
		
				foreach($tax_group as $tax) 
				{
				
				$cgst_amt+= $tax['tax_group_tax_amount'];
				$sgst_amt+= $tax['excise_group_excise_amount'];
				$igst_amt+= $tax['tax_group_igst_amount'];
				
				}
		}
	?>
 
  
    <table class="table">
      <thead>
        <tr>
          <th colspan='6' width="5%">S.No</th>
          <th width="8%">SKU</th>
          <th width="25%">Item</th>
          <th width="8%">HSN/SAC</th>
          <th width="6%">UOM</th>
          <th width="5%">Qty</th>
           <th width="8%">PRICE</th>
         <!-- <th width="6%">Total Amount</th>-->
         <?php /*?> <?php $po_igst = $editpurchaseorder->po_igst;
				
				if($po_igst == 0){?>
                  <th  width="8%">CGST %</th>
                  <th  width="8%">CGST amt</th>
                  <th  width="8%">SGST %</th>
                  <th  width="8%">SGST amt</th>
                <?php } 
				else if($po_igst == 1)
				{
				?>
                  <th  width="10%" >IGST %</th>
                  <th  colspan="4" width="10%">IGST amt</th>
				 
                 
                <?php 
				} ?><?php */?>
          
         
          <th width="10%">Value</th>
         
		  </tr>
          
      </thead>
      <tbody>
         <?php
		 	//echo "<pre>";print_r($editpurchaseorder_items);
		  if(!empty($editpurchaseorder_items)){  
            $itemcount = 1; foreach($editpurchaseorder_items as $ITEMS){ ?>
      
          <tr class="item-row">
              <td colspan='6' style="text-align:center"><?php echo $itemcount; ?></td>
              <td  style="text-align:center"><?php echo $ITEMS['product_sku'];?> </td>
              <td  style="text-align:center;font-weight: bold;"><?php echo $ITEMS['product_name'];?> <br> <span style="font-size: 90%;font-weight: normal;"><?php echo $ITEMS['po_items_name_desc'];?></span></td>
              <td  style="text-align:center"><?php echo $ITEMS['po_items_hsn_sac'];?> </td>
           
             
              <td style="text-align:center"><?php echo $ITEMS['uom_name'];?></td>
              <td style="text-align:center"><?php echo $ITEMS['po_items_ord_qty'];?></td>
               <td  style="text-align:center"><?php echo $ITEMS['po_items_priceperunit']; ?></td>
              <td style="text-align:center"><?php echo $ITEMS['po_items_gross_amount'];?></td>
             <?php /*?> <?php if($po_igst == 0){?>
              <td style="text-align:center"><?php if($ITEMS['po_items_tax_percent']!='') { echo $ITEMS['po_items_tax_percent'];} else { echo '0.00'; }?></td>
              <td style="text-align:center"><?php if($ITEMS['po_items_tax_amount']!='') { echo $ITEMS['po_items_tax_amount'];} else { echo '0.00'; }?></td>
              <td style="text-align:center"><?php if($ITEMS['po_items_excise_percent']!='') { echo $ITEMS['po_items_excise_percent'];} else { echo '0.00'; }?></td>
              <td style="text-align:center"><?php if($ITEMS['po_items_excise_amount']!='') { echo $ITEMS['po_items_excise_amount'];} else { echo '0.00'; }?></td>
              <?php } else if($po_igst == 1){ ?>
              <td style="text-align:center"><?php if($ITEMS['po_items_igst_percent']!='') { echo $ITEMS['po_items_igst_percent'];} else { echo '0.00'; }?></td>
              <td colspan="4" style="text-align:center"><?php if($ITEMS['po_items_igst_amount']!='') { echo $ITEMS['po_items_igst_amount'];} else { echo '0.00'; }?></td>
			 
              <?php } ?><?php */?>
              
              
              
          </tr>
      <?php $itemcount++; } } ?>
         
        <tr>
          <td class="col_space" colspan="14"></td>
        </tr>
        <tr>
        <?php //echo "<pre>";print_r($editpurchaseorder_total); ?>
          <td colspan="9" rowspan=" <?php $po_igst = $editpurchaseorder->po_igst; if($po_igst == 0){?> 5 <?php } else { ?> 4 <?php } ?>" align="left" ><p style="font-weight:bold;">NOTE : &nbsp;TAXES AS APPLICABLE <br /><!--LR DOCUMENTS TO </p><p style="font-weight:bold;">Correspondence / HO Address :</p><p align="left" style="font-weight:bold;">CEEGO LABS PVT LTD,<br />23/6 &nbsp; 
1st FLOOR,AMBEDKAR STREET, <br />KODAMBAKKAM , CHENNAI-600024<br/>PH NO: 044-42029636--></p></td>
           <td class="right" colspan="3">Gross Amount&nbsp;  &nbsp;</td>
          <td class="right" colspan="2"> <?php if(isset($editpurchaseorder_total->po_total_gross_amount)){ echo $editpurchaseorder_total->po_total_gross_amount; }else{}?></td>
        </tr>
         <?php $po_igst = $editpurchaseorder->po_igst;
				 if($po_igst == 0){?>
        <tr>
          <td class="right" colspan="3">CGST Amount &nbsp;  &nbsp;</td>
          <td class="right" colspan="2"> <?php if(isset($cgst_amt)){ echo $cgst_amt; }else{}?></td>
        </tr>
        <tr>
          <td class="right" colspan="3">SGST Amount&nbsp;  &nbsp;</td>
          <td class="right" colspan="2"> <?php if(isset($sgst_amt)){ echo $sgst_amt; }else{}?></td>
        </tr>
        <?php } ?>
       <?php $po_igst = $editpurchaseorder->po_igst;
				 if($po_igst == 1){?>
          <tr>
          <td class="right" colspan="3">IGST Amount&nbsp;  &nbsp;</td>
          <td class="right" colspan="2"> <?php if(isset($igst_amt)){ echo $igst_amt; }else{}?></td>
        </tr>
        <?php } ?>
        <tr>
          <td class="right" colspan="3">Tax Amount &nbsp;  &nbsp;</td>
          <td class="right" colspan="2"> <?php if(isset($editpurchaseorder_total->po_total_tax_amount)){ echo $editpurchaseorder_total->po_total_tax_amount; }else{}?></td>
        </tr>
        
		
		<tr>
          <td class="right" colspan="3">Shipping & Handling Charges &nbsp;  &nbsp;</td>
          <td class="right" colspan="2"> <?php if(isset($editpurchaseorder_total->po_total_shipping_charges)){ echo $editpurchaseorder_total->po_total_shipping_charges; }else{}?></td>
        </tr>
         
        <tr>
          <td style="font-weight:bold;" class="right" colspan="12">TOTAL&nbsp;  &nbsp;(IN INR)</td>
          <td class="right" colspan="2" style="font-weight:bold;"> <?php if(isset($editpurchaseorder_total->po_grand_total)){ echo $editpurchaseorder_total->po_grand_total; }else{}?></td>
        </tr>
        <tr>
          <td colspan="14"  style="font-weight:bold;text-transform: uppercase;">Amount in Words (IN INR) &nbsp;:  &nbsp;  &nbsp;  &nbsp;  &nbsp; <?php echo $words_in_total; ?></td>
        </tr>
      </tbody>
    </table>
	<br />

 
  
  <div class="inquiry_section" style="clear: both;position: relative;z-index: 10;eight: 3em;margin-top: 12em;">
   
    <div class="inquiry_section_col3"> 
    	<h2 align="left">For <?php if(isset($compny_det->company_name)){ echo $compny_det->company_name; }else{}?></h2>
       <h3>Authorised Signatory</h3>
    </div>
  </div>

  <div class="footer" style="margin-left:-10px;">
  <span style="font-weight:bold;text-align:left">Note: This is computer generated purchase order.</span>
  	<!--<p style="font-weight:bold;">Correspondence / HO Address &nbsp;: CEEGOLABS PVT LTD&nbsp;,&nbsp;23/6 &nbsp; 
1st floor , Kodambakkam , Chennai.600024<span style="color:red;">|</span> www.ceegolabs.com</p>-->

          
        
</div>
<div class="page-break">
<span  style="font-size:12px;font-weight:bold;">Terms & Conditions :</span>
<li>1. All despatches should be made to the concerned location specified in our purchase order.</li>


</div>




</body>
</html>
