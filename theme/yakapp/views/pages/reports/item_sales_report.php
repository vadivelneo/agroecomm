  <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
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
	
	$("#report_customer").autocomplete({
		source: "<?php echo site_url('reports/report_search_customer'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_cus_id').val(ui.item.customer_id);
					$('#report_customer').val(ui.item.customer_name);
				}
 	});
	$("#report_item_mfg,#report_item_name,#report_item_code,#report_customer").bind('cut copy paste', function (e) {
    e.preventDefault(); //disable cut,copy,paste
});
	
   
});
 
</script>
 


<?php echo $this->load->view('pages/sales_report_left_side'); 

 //echo "<pre>";print_r($sales_item_list);
 //echo "<pre>";print_r($total_values);exit;
?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     <!--   <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
         <li class="divider"> </li>
         <li><a href="#"><i class=""></i>Import</a></li>
          <li><a href="#"><i class=""></i>Export</a></li>
          <li><a href="#"><i class=""></i>Find Duplicates</a></li>
        </ul>
      </div>-->
      <span class="btn-group">
  <!--   <button class="addButton" onclick='window.location.href=""><i class="icon-plus" ></i>&nbsp;<strong>Add Stock</strong></button>
      </span>-->
     <!--    <div tabindex="3" class="wrapper-dropdown-5" id="allprod"> <span> <img class="filterImage" src="<?php echo base_url(); ?>resources/images/filter.png"> All  </span>
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Product1</a></li>
          <li><a href="#"><i class=""></i>Product2</a></li>
          <li><a href="#"><i class=""></i>Product3</a></li>
          <li><a href="#"><i class=""></i>Product4</a></li>
        </ul>
      </div> -->
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          <!--    <div class="pageNumbers alignTop ">
             	<span>
                	<span style="padding-right:5px" class="pageNumbersText">1 to 10 of 10</span>
            		<span class="icon-refresh pull-right totalNumberOfRecords cursorPointer hide"></span>
                </span>
             </div>
            <div class="btn-group alignTop margin0px">
            	<span class="pull-right">
                	<span class="btn-group">
              			<button type="button" disabled="disabled" id="listViewPreviousPageButton" class="btn"><span class="icon-chevron-left"></span></button>
              			<button data-toggle="dropdown" id="listViewPageJump" type="button" class="btn listview"><i title="Page Jump" class="vtGlyph vticon-pageJump"></i></button>
                          <ul id="listViewPageJumpDropDown" class="listViewBasicAction dropdown-menu">
                            <li>
                              <span>Page</span>
                              <input type="text" value="1" class="listViewPagingInput" id="pageToJump">
                              <span class="textAlignCenter">of&nbsp;</span>
                              <span id="totalPageCount" class="pushUpandDown2per">1</span>
                            </li>
                          </ul>
              			<button type="button" disabled="" id="listViewNextPageButton" class="btn"><span class="icon-chevron-right"></span></button>
              		</span>
                 </span>
            </div>
            <div class="settingsIcon">
                <span class="pull-right btn-group">
                    <button data-toggle="dropdown" href="#" class="btn dropdown-toggle settings" style="margin-top:0px;"><i title="Settings" alt="Settings" class="icon-wrench"></i>&nbsp;&nbsp;<i class="caret1"></i></button>
                  <ul class="listViewSetting dropdown-menu">
                    <li><a href="#">Edit Fields</a></li>
                    <li><a href="#">Edit Workflows</a></li>
                    <li><a href="#">Edit Picklist Values</a></li>
                    <li><a href="#">Module Sequence Numbering</a></li>
                  </ul>
                </span>
            </div>-->
          </div>
          <div class="clearfix">
		  </div>
          
      </span> 
   </div>
   <div class="p-popup">
   <div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>	
   		
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/item_sales_generate_report'); ?>" enctype="multipart/form-data"> 
        <div  class="report" id="report" > 
        
        <div class="search_field">
      	  <p >From Date</p>	
		
           <input type="text" style="width:100px;" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>"/>
           </div>
           <div class="search_field">
		   <p >To Date</p>	
		
           <input type="text" style="width:100px;" name="report_to" class="input-large report_from" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>"/>
           </div>
           <div class="search_field">
		   <p >Item Name </p>	
		   <input type="text" style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>">
		    <input type="hidden"  name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
            </div>
            <div class="search_field">
		   <p >Item Code</p>	
		   <input type="text" style="width:120px;"  name="report_item_code" class="input-large report_from" id="report_item_code" value="<?php if(isset($product_code)){ echo $product_code; }?>" />
           </div>
           <div class="search_field">
		   <p >SKU</p>	
		   <input type="text" style="width:120px;" name="report_item_mfg" class="input-large report_from" id="report_item_mfg" value="<?php if(isset($product_mfr_part_number)){ echo $product_mfr_part_number; }?>" />
           </div>
           <div class="search_field"> 
		   <p >Customer Name</p>	
		   <input type="text" style="width:120px;" name="report_customer" class="input-large report_from" id="report_customer" value="<?php if(isset($customer_name)){ echo $customer_name; }?>" >
		   <input type="hidden" name="report_cus_id" id="report_cus_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
           </div>
		  
          <button id="generate" name="generate" type="submit" class="btn-success generate" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> 
	 
	   <?php
		if(!empty($sales_item_list)) { 
		$itm_name = $sales_item_list['item_total']->sale_invoice_item_name;
		$itm_code = $sales_item_list['item_total']->sale_invoice_item_code;
		$itm_mfg = $sales_item_list['item_total']->sale_invoice_item_model;
		$tot_qty = $sales_item_list['item_total']->QTY;
		$tot_amt = $sales_item_list['item_total']->TOT;
		
		?>
       <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/item_sales_export_report'); ?>" enctype="multipart/form-data">
       <?php if(isset($itm_name))
	   {
		   ?>
        <div class="search_field1"> 
	   <p ><b>Item Name</b></p>	
	   <input type="hidden" name="itm_name" id="itm_name" value="<?php if(isset($itm_name)){ echo $itm_name; }?>"  />
       <span><?php  echo $itm_name;  ?></span>
            </div>
      <?php } ?>
       <?php if(isset($itm_mfg))
	   {
		   ?>
             <div class="search_field1"> 
			<p ><b>SKU</b></p>	
			<input type="hidden" name="itm_mfg" id="itm_mfg" value="<?php if(isset($itm_mfg)){ echo $itm_mfg; }?>"  />
            <span><?php echo $itm_mfg; ?></span>
			 
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
			<p><b>Total Amount</b></p>	
			<input type="hidden" name="tot_amt" id="tot_amt" value="<?php if(isset($tot_amt)){ echo $tot_amt; }?>"  />		
			<span><?php  echo $tot_amt;  ?></span>
            </div>
            <?php } ?>
			<input type="hidden" name="from_date" id="from_date" value="<?php echo $report_from;?>"  />
			<input type="hidden" name="to_date" id="to_date" value="<?php echo $report_to;?>"  />
			<input type="hidden"  name="itm_code" class="input-large report_from" id="itm_code" value="<?php if(isset($itm_code)){ echo $itm_code; } ?>" >
			<input type="hidden" name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>"  />
			<input type="hidden" name="report_cus_id" id="report_cus_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>"  />
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
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Code&nbsp;&nbsp;</a></th>
                <!--<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Name&nbsp;&nbsp;</a></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Invoice No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
				<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Quantity&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Quantity&nbsp;&nbsp;</a></th>
                <th class="report_right_aligned" ><a href="javascript:void(0);" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
         
              
              </tr>
              <?php
		if(!empty($sales_item_list)) {
			$i = 1;
		 foreach($sales_item_list['item_details'] as $ITM) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
              
                <td><?php echo $ITM['sale_invoice_item_code'];?></td>
                <!--<td><?php echo $ITM['sale_invoice_item_name'];?></td>-->
                 <td><?php echo $ITM['uom_name'];?></td>
                <td><?php echo  $ITM['sale_invoice_company_invoice_no'] ;?></td>
                <td><?php echo  $ITM['customer_name'] ;?></td>
                <td><?php echo  $ITM['sale_invoice_item_qty'] ;?></td>
                <td><?php if(($ITM['sale_invoice_Inven_so_id']) == 0) { echo "PI"; } else{ echo "DC";} ?></td>
                <td class="report_right_aligned"><?php echo  $ITM['sale_invoice_item_net_amount'] ;?></td>
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="11" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
              
              
                
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
