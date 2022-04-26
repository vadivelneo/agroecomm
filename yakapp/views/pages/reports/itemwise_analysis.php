<script language="javascript" type="text/javascript">
         
$(document).ready(function () {

	 $('.generate').click(function()
     {
        
        var report_item_name = $("#report_item_name").val();
        var report_item_code = $("#report_item_code").val();
        var report_item_mfg = $("#report_item_mfg").val();
       
	 if(report_item_name == "" && report_item_code == "" && report_item_mfg == "")
    { 
		$('.flashmessage').html("");
		document.getElementById("ErrorMsg").innerHTML="Any One Feild IS Required among Item Name, Item Code, Item Mfg";
	 	 $('#report_item_name').css("border","1px solid #FF0000");
	 	 $('#report_item_code').css("border","1px solid #FF0000");
	 	 $('#report_item_mfg').css("border","1px solid #FF0000");
		 return false;
    }
		   
});

 $( "#report_from" ).datepicker({
		 dateFormat:'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
   $( "#report_to" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
	   dateFormat:'dd-mm-yy',
    }); 
	
	$("#report_item_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_name').val(ui.item.product_name);
				}
 	});
	
	$("#report_item_code").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_code'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_code').val(ui.item.product_code);
				}
 	});
	$("#report_item_mfg").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_mfgpartno'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_mfg').val(ui.item.product_mfr_part_number);
				}
 	});
	
	$("#report_vendor").autocomplete({
		source: "<?php echo site_url('reports/report_search_vendor'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_ven_id').val(ui.item.vendor_id);
					$('#report_vendor').val(ui.item.vendor_name);
				}
 	});
	$("#report_item_mfg,#report_item_name,#report_item_code,#report_vendor").bind('cut copy paste', function (e) {
    e.preventDefault(); //disable cut,copy,paste
});
});
  </script>
  
  <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
   
	
   
});
 
</script>
 


<?php echo $this->load->view('pages/inventory_report_left_side'); 
//echo"<PRE>";print_r($sales_item_list);;
//echo"<PRE>";print_r($purchase_item_list);exit;
?>
<section>
  <div class="rightPanel">
    <div class="row-fluid"> <span class="btn-group"> <span class="span4 btn-toolbar">
      <div class="listViewActions pull-right"> </div>
      <div class="clearfix"> </div>
      </span> </span></div>
    <div class="p-popup">
       <div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
      <form  method="post" name="stockForm" class="form-horizontal " action="<?php echo site_url('reports/item_analysis_generate_report'); ?>"  enctype="multipart/form-data">
        <div style="padding:1%;" id="report" class="report" tabindex="3">
          <p class="report_p1">From Date</p>
          <input type="text" style="width:100px;" name="report_from" class="input-large report_from" id="report_from" >
          <p class="report_p1">To Date</p>
          <input type="text" class="input-large report_from" name="report_to" id="report_to" style="width:100px;" kl_virtual_keyboard_secure_input="on">
          <p class="report_p1">Item Name </p>
          <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
          <input type="text" value="" class="input-large report_from ui-autocomplete-input" name="report_item_name" id="report_item_name" style="width:100px;" autocomplete="off" kl_virtual_keyboard_secure_input="on">
		  <input type="hidden" name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
          <p class="report_p1">Item Code </p>
          <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
          <input type="text" value="" class="input-large report_from ui-autocomplete-input" name="report_item_code" id="report_item_code" style="width:100px;" autocomplete="off" kl_virtual_keyboard_secure_input="on">
          <p class="report_p1">SKU</p>
          <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
          <input type="text" value="" class="input-large report_from ui-autocomplete-input" name="report_item_mfg" id="report_item_mfg" style="width:100px;" autocomplete="off" kl_virtual_keyboard_secure_input="on">
          <button style="margin-top:1%;" class="btn-success generate" type="submit" name="generate">Generate</button>
        </div>
      </form>
	  <?php
		if(!empty($sales_item_list)) {  
		$product_name = $sales_item_list['item_total']->sale_invoice_item_name;
		$product_prtno = $sales_item_list['item_total']->sale_invoice_item_model;
		$product_qty = $sales_item_list['item_total']->QTY;
		$product_tot = $sales_item_list['item_total']->TOT; ?>
      <form enctype="multipart/form-data" action="#" method="post" name="stockForm" class="form-horizontal ">
        <div class="report" tabindex="3" style="padding:1%;">
        
         <?php if(isset($product_name))
	   {
		   $sales_qty = $sales_item_list['item_total']->QTY;
		$purchase_qty = $purchase_item_list['item_puchase_total']->QTY;
		   ?>
        <div class="search_field_sale"> 
	   <p ><b>Item Name</b></p>	
       <span><?php  echo $product_name;  ?></span>
            </div>
      <?php } ?>
      
         <?php if(isset($product_prtno))
	   {
		   ?>
        <div class="search_field_sale"> 
	   <p ><b>SKU</b></p>	
       <span><?php  echo $product_prtno;  ?></span>
            </div>
      <?php } ?>
          <?php if(isset($sales_qty))
	   {
		   ?>
             <div class="search_field1" style="width:115px"> 
	   <p ><b>Opening Stock</b></p>	
       <span><?php  echo ($sales_qty - $purchase_qty);  ?></span>
            </div>
              <?php } ?>
        <!--  <p class="report_p1">UOM</p>
          <input type="text" value="<?php if(isset($product_name)){ echo $product_name; } ?>" class="input-large report_from" name="itm_mfg" kl_virtual_keyboard_secure_input="on" readonly="readonly">-->
        <!--  <button class="btn-success" style=" float: left; margin-top: 10px;"><strong>Export PDF</strong></button>-->
        </div>
      </form>
	  <?php }?>
    </div>
    <div class="table_head invent_table">
    <div class="col w10 last invent_col">
    	<h2 class="invent_title">Sales List</h2>
        <div class="invent_qty">
		<?php
		if(!empty($sales_item_list)) {  
		
		//echo "<pre>";
		//print_r($sales_item_list); exit;
		
		$sales_qty = $sales_item_list['item_total']->QTY;
		$purchase_qty = $purchase_item_list['item_puchase_total']->QTY;
		$product_tot = $sales_item_list['item_total']->TOT; ?>
        <form enctype="multipart/form-data" action="" method="post" name="stockForm" class="form-horizontal ">
        <div class="report" tabindex="3" style="padding:1%;">
         
            <?php if(isset($sales_qty))
	   {
		   ?>
          <div class="search_field_pur" > 
	   <p ><b>Sales Qty</b></p>	
       <span><?php  echo $sales_qty;  ?></span>
            </div>
              <?php } ?>
              <?php if(isset($product_tot))
	   {
		   ?>
             <div class="search_field_pur" > 
	   <p ><b>Sales Amount</b></p>	
       <span><?php  echo $product_tot;  ?></span>
            </div>
              <?php } ?>
             
        </div>
      </form>
	    <?php }?>
      </div>
      <div class="col w10 last invent_tables" style="margin:6px;">
     
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Invoice No.&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">QTY&nbsp;&nbsp;</a></th>
                <th class="amt_right" nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Amount&nbsp;&nbsp;</a></th>
              </tr>
            </tbody>
			<tbody id="items_list">
                <?php if(!empty($sales_item_list)) { $itemcount = 1; foreach($sales_item_list['item_details'] as $SA_ITM) {  ?>
                <tr>
                  <td> <?php if(isset($SA_ITM['sale_invoice_company_invoice_no'])) { echo $SA_ITM['sale_invoice_company_invoice_no']; } ?> </td>
                  <td> <?php if(isset($SA_ITM['uom_name'])) { echo $SA_ITM['uom_name']; } ?> </td>
                  <td> <?php if(isset($SA_ITM['customer_name'])) { echo $SA_ITM['customer_name']; } ?> </td>
                  <td>  <?php if(isset($SA_ITM['sale_invoice_item_qty'])) { echo $SA_ITM['sale_invoice_item_qty']; } ?> </td>
                  <td class="amt_right">  <?php if(isset($SA_ITM['sale_invoice_item_net_amount'])) { echo $SA_ITM['sale_invoice_item_net_amount']; } ?> </td>
                </tr>
                 <?php $itemcount++; }
				 ?>
                 
                  <?php
				 
				  } else {?>
                 	
                 	<tr>
                 	  <td colspan="5">No Result Found </td>
               	  </tr>
                  <?php  } ?>
               
              </tbody>
          </table>
        </div>
        <div class="dataTables_paginate paging_bootstrap"> </div>
      </div>
    </div>
    <div class="col w10 last invent_col">
    	<h2 class="invent_title">Purchase List</h2>
        <div class="invent_qty">
		 <?php
		if(!empty($purchase_item_list)) { 
		$product_qty = $purchase_item_list['item_puchase_total']->QTY;
		$product_tot = $purchase_item_list['item_puchase_total']->TOT; ?>
        <form enctype="multipart/form-data" action="" method="post" name="stockForm" class="form-horizontal ">
        <div class="report" tabindex="3" style="padding:1%;">
        
         <?php if(isset($product_qty))
	   {
		   ?>
          <div class="search_field_pur" > 
	   <p ><b>Purchase Qty</b></p>	
       <span><?php  echo $product_qty;  ?></span>
            </div>
              <?php } ?>
              
               <?php if(isset($product_qty))
	   {
		   ?>
          <div class="search_field_pur" > 
	   <p ><b>Purchase Amount</b></p>	
       <span><?php  echo $product_tot;  ?></span>
            </div>
              <?php } ?>
        
        
        </div>
      </form>
	  <?php }?>
      </div>
      <div class="col w10 last invent_tables" style="margin:6px;">
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Invoice No.&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">QTY&nbsp;&nbsp;</a></th>
                <th class="amt_right" nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Amount&nbsp;&nbsp;</a></th>
              </tr>
            </tbody>
			 <tbody id="items_list">
                <?php if(!empty($purchase_item_list)) { $itemcount = 1; foreach($purchase_item_list['item_puchase_details'] as $PI_ITM) {  ?>
                <tr>
                  <td> <?php if(isset($PI_ITM['po_invoice_number'])) { echo $PI_ITM['po_invoice_number']; } ?> </td>
                  <td> <?php if(isset($PI_ITM['uom_name'])) { echo $PI_ITM['uom_name']; } ?> </td>
                  <td> <?php if(isset($PI_ITM['vendor_name'])) { echo $PI_ITM['vendor_name']; } ?> </td>
                  <td>  <?php if(isset($PI_ITM['po_invoice_items_qty'])) { echo $PI_ITM['po_invoice_items_qty']; } ?> </td>
                  <td class="amt_right">  <?php if(isset($PI_ITM['po_invoice_items_net_amount'])) { echo $PI_ITM['po_invoice_items_net_amount']; } ?> </td>
                 </tr>
                 <?php $itemcount++; } } else {?>
                 	<tr>
                  <td colspan="5"> No Result Found </td>
                   </tr>
                  <?php  } ?>
               
              </tbody>
			
          </table>
        </div>
        <div class="dataTables_paginate paging_bootstrap"> </div>
      </div>
    </div>
      
      <div class="clear"></div>
    </div>
  </div>
</section>
