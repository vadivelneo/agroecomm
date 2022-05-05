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
 


<?php echo $this->load->view('pages/purchase_report_left_side'); 

?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     
      <span class="btn-group">
 
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          
          </div>
          <div class="clearfix">
		  </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span> 
   </div>
   <div class="p-popup">
   		<div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/item_pricelist_generate_report'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
         
           
         <div class="search_field">
      	  <p >Item Name </p>	
		
           <input type="text"  style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>"/>
		   <input type="hidden" name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
           </div>
            
            
            <div class="search_field">
		   <p >Party Name</p>	
		   <input type="text"  style="width:120px;" name="report_vendor" class="input-large report_from" id="report_vendor" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>" >
           </div>
		   <input type="hidden" name="report_ven_id" id="report_ven_id" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
		   <input type="hidden" name="report_ven_name" id="report_ven_name" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>" />
		  
          <button id="generate" name="generate" type="submit" class="btn-success generate" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> 
	 
	   <?php
		if(!empty($purchase_item_list)) { 
		$itm_name = $purchase_item_list['item_puchase_total']->po_invoice_items_name;
		$itm_code = $purchase_item_list['item_puchase_total']->po_invoice_items_code;
		$itm_mfg = $purchase_item_list['item_puchase_total']->po_invoice_items_model;
		$tot_qty = $purchase_item_list['item_puchase_total']->QTY;
		$tot_amt = $purchase_item_list['item_puchase_total']->TOT;
		?>
       <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/item_purchase_export_report'); ?>" enctype="multipart/form-data">
       
        <?php if(isset($itm_name))
	   {
		   ?>
        <div class="search_field1"> 
	   <p ><b>Item Name</b></p>	
       <span><?php  echo $itm_name;  ?></span>
	      <input type="hidden" name="itm_name" id="itm_name" value="<?php if(isset($itm_name)){ echo $itm_name; }?>"  />
            </div>
      <?php } ?>
      
	   <?php if(isset($itm_mfg))
	   {
		   ?>
        <div class="search_field1"> 
	   <p ><b>Mfg Part No</b></p>	
       <span><?php  echo $itm_mfg;  ?></span>
	   <input type="hidden" name="itm_mfg" id="itm_mfg" value="<?php if(isset($itm_mfg)){ echo $itm_mfg; }?>"  />
            </div>
      <?php } ?>
       <?php if(isset($tot_qty))
	   {
		   ?>
        <div class="search_field1"> 
	   <p ><b>Total Quantity</b></p>	
	   <input type="hidden" name="tot_qty" id="tot_qty" value="<?php if(isset($tot_qty)){ echo $tot_qty; }?>"  />		
       <span><?php  echo $tot_qty;  ?></span>
            </div>
      <?php } ?>
       <?php if(isset($tot_amt))
	   {
		   ?>
        <div class="search_field1"> 
	   <p ><b>Total Amount</b></p>	
	      <input type="hidden" name="tot_amt" id="tot_amt" value="<?php if(isset($tot_amt)){ echo $tot_amt; }?>"  />	
       <span><?php  echo $tot_amt;  ?></span>
            </div>
      <?php } ?>
		   <input  type="hidden" name="itm_code" class="input-large report_from" id="itm_code" value="<?php if(isset($itm_code)){ echo $itm_code; } ?>"> 
		   <input type="hidden" name="report_from" id="report_from" value="<?php echo $report_from;?>"  />
			<input type="hidden" name="report_to" id="report_to" value="<?php echo $report_to;?>"  />
		    <input type="hidden" name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>"  />
			<input type="hidden" name="report_ven_id" id="report_ven_id" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>"  />
              <button style="float:right; margin-right:3%;" class="btn-success"><strong>Export PDF</strong></button>
        
                         
		</form>
		<?php }?>
      </div>
      
    <div class="table_head" id="table">
	
	
      <div class="col w10 last">
	  
	    
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
	  
        <div class="content">
		
		
          <table>
            <tbody>
              <tr>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Date&nbsp;&nbsp;</a></th>
                <!--<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Name&nbsp;&nbsp;</a></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Party Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Material&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">GR No&nbsp;&nbsp;</a></th>
				<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Control No.&nbsp;&nbsp;</a></th>
                <th class="amt_right" nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Batch&nbsp;&nbsp;</a></th>
                <th class="amt_right" nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Price&nbsp;&nbsp;</a></th>
         		
              
              </tr>
              
              
                
            </tbody>
          </table>
          
        </div>
        <div class="dataTables_paginate paging_bootstrap">
                
          </div>
           <?php
		if(!empty($stock_list)) {?>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
          <?php }?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
