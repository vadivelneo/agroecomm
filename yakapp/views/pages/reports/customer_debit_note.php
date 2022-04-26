<script language="javascript" type="text/javascript">
         
$(document).ready(function () {
	
	$("#report_customer_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_customer_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_customer_id').val(ui.item.customer_id);
					$('#report_customer_name').val(ui.item.customer_name);
				}
 	});
	
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
 


<?php echo $this->load->view('pages/accounts_report_left_side'); 
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
      <form  method="post" name="stockForm" class="form-horizontal " action="<?php echo site_url('reports/customer_debit_note_search'); ?>"  enctype="multipart/form-data">
        <div style="padding:1%;" id="report" class="report" tabindex="3">
         <?php /*?> <p class="report_p1">From Date</p>
          <span class="report" style="padding:1%;">
          <input type="text" style="width:100px;" name="report_from" class="input-large report_from" id="report_from"value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>" />
          </span>
          <p class="report_p1">To Date</p>
          <input type="text" class="input-large report_from" name="report_to" id="report_to" value="<?php if(isset($report_to)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('01-m-Y'); } ?>" style="width:100px;" kl_virtual_keyboard_secure_input="on"><?php */?>
          <p class="report_p1">Customer Name </p>
          <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
          <input type="text" name="report_customer_name" class="input-large report_text" id="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
                                		<input type="hidden" name="report_customer_id" id="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
		  <input type="hidden" name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
          <button style="margin-top:1%;" class="btn-success generate" type="submit" name="generate">Generate</button>
        </div>
      </form>
	  <?php
	 //echo "<pre>";
	 //print_r($sales_item_list); exit;
	 if(!empty($invoice_list) || (!empty($debit_note)))
			 { ?>
				<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/customer_debit_note_search'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<input type="hidden" name="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
					<input type="hidden" name="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                    <input type="hidden" name="report_region_name" value="<?php if(isset($region_name)){ echo $region_name; }?>">
					<input type="hidden" name="report_region_id" value="<?php if(isset($region_id)){ echo $region_id; }?>" />
                    <input type="hidden" name="report_zone_name" value="<?php if(isset($zone_name)){ echo $zone_name; }?>">
					<input type="hidden" name="report_zone_id" value="<?php if(isset($zone_id)){ echo $zone_id; }?>" />
                    <input type="hidden" name="report_area_name" value="<?php if(isset($area_name)){ echo $area_name; }?>">
					<input type="hidden" name="report_area_id" value="<?php if(isset($area_id)){ echo $area_id; }?>" />
                    <input type="hidden" name="report_salesman_id" value="<?php if(isset($salesman_id)){ echo $salesman_id; }?>" />
                    <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
				</form>
			<?php } ?>
    </div>
    <div class="table_head invent_table">
    <div class="col w10 last invent_col">
    	<h2 class="invent_title">Sales Collection</h2>
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
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Invoice no.&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Invoice Date&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Invoice Amount&nbsp;&nbsp;</a></th>
                <th class="amt_right" nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Collection Amount&nbsp;&nbsp;</a></th>
              </tr>
            </tbody>
			<tbody id="items_list">
                <?php if(!empty($invoice_list)) { $itemcount = 1; foreach($invoice_list as $SA_ITM) {  ?>
                <tr>
                  <td> <?php if(isset($SA_ITM['sale_invoice_no'])) { echo $SA_ITM['sale_invoice_no']; } ?> </td>
                   <td>
										<?php 
											if(($SA_ITM['sale_invoice_add_date']) != '0000-00-00' && $SA_ITM['sale_invoice_add_date'] != '' && $SA_ITM['sale_invoice_add_date'] != NULL)
											{ 
												echo date('d-m-Y', strtotime($SA_ITM['sale_invoice_add_date']));
											}
											else
											{
												echo "-";
											}
										?>
									</td>
                  <td> <?php if(isset($SA_ITM['customer_name'])) { echo $SA_ITM['customer_name']; } ?> </td>
                  <td class="amt_right">  <?php if(isset($SA_ITM['invoice_payment_invoice_amount'])) { echo $SA_ITM['invoice_payment_invoice_amount']; } ?> </td>
                  <td class="amt_right">  <?php if(isset($SA_ITM['invoice_payment_paid_amount'])) { echo $SA_ITM['invoice_payment_paid_amount']; } ?> </td>
                </tr>
                 <?php $itemcount++; }
				 ?>
                  <td>  </td>
                   <td>  </td>
                    <td>  </td>
                  <td class="amt_right"> <?php if(isset($total_values->INV_AMT)) { echo $total_values->INV_AMT; } ?> </td>
                   <td class="amt_right"> <?php if(isset($total_values->INV_PAID_AMT)) { echo $total_values->INV_PAID_AMT; } ?> </td>
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
    	<h2 class="invent_title">Customer Debit</h2>
        <div class="invent_qty">
		
      </div>
      <div class="col w10 last invent_tables" style="margin:6px;">
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Added By&nbsp;&nbsp;</a></th>
                 <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Account amount&nbsp;&nbsp;</a></th>
                <th nowrap=""><a class="listViewHeaderValues" href="javascript:void(0);">Account add date&nbsp;&nbsp;</a></th>
              </tr>
            </tbody>
			 <tbody id="items_list">
                <?php if(!empty($debit_note)) { $itemcount = 1; foreach($debit_note as $PI_ITM) {  ?>
                <tr>
                  <td> <?php if(isset($PI_ITM['user_name'])) { echo $PI_ITM['user_name']; } ?> </td>
                   <td> <?php if(isset($PI_ITM['customer_name'])) { echo $PI_ITM['customer_name']; } ?> </td>
                  <td class="amt_right"> <?php if(isset($PI_ITM['account_amount'])) { echo $PI_ITM['account_amount']; } ?> </td>
                  <td align="center">  <?php if(isset($PI_ITM['account_add_date'])) { echo date('d-m-Y', strtotime($PI_ITM['account_add_date'])); } ?> </td>
                  
                 </tr>
                 <?php $itemcount++;}
				 
				 ?>
                  <td>  </td>
                  <td>  </td>
                    <td class="amt_right"><?php if(isset($total_debit->debit_total)) { echo $total_debit->debit_total; } ?> </td>
                    <td>  </td>
                  
                 
                  <?php
				 
				  }else {?>
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
