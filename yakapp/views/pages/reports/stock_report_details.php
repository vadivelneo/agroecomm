  <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    
	$("#report_products_group_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_product_group'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_products_group_id').val(ui.item.products_group_id);
					$('#report_products_group_name').val(ui.item.products_group_name);
				}
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
	
	
   
});
 
</script>
 


<?php echo $this->load->view('pages/inventory_report_left_side'); 

 //echo "<pre>"; print_r($stock_list);exit;
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
   		
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/stock_report_search'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
           <input type="text" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else {  } ?>" placeholder="From Date">
           <input type="text" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { } ?>" placeholder="To Date">
		   <input type="text" style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>" placeholder="Material Name">
		    <input type="hidden"  name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
             
           
          <input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
 		 </div> 
      </form> 
	 
	   <?php
		if(!empty($stock_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/stock_report_search'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>"> 
                    <input type="hidden" style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>">
					<input type="hidden" name="report_products_group_name" value="<?php if(isset($product_group_name)){ echo $product_group_name; }?>">
					<input type="hidden" name="report_products_group_id" value="<?php if(isset($product_group_id)){ echo $product_group_id; }?>" />
                    <input type="hidden" name="search_item_status" value="<?php if(isset($search_item_status)){ echo $search_item_status; }?>" />
              <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
               
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
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Material Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Division&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Received Qty&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Issued Qty&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Available Qty&nbsp;&nbsp;</a></th>
         
              
              </tr>
              <?php
		if(!empty($stock_list)) {
			$i = 1;
			/* echo "<pre>";
			print_r($stock_list); exit; */
		 foreach($stock_list as $INV) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
              
                <td><?php echo $INV['product_name'];?></td>
                <td><?php echo $INV['division_name'];?></td>
                <td><?php echo $INV['uom_name'];?></td>
                <td><?php echo $INV['inventory_received_qty'] ;?></td>
                <td><?php echo $INV['inventory_issued_qty'] ;?></td>
                <td><?php echo $INV['inventory_qty'] ;?></td>
				
                
               
                </td>
              </tr>
              <?php $i++;}} else { ?>
              <tr>
                <td colspan="11" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php } ?>
              
              
                
            </tbody>
          </table>
          
        </div>
        <div class="dataTables_paginate paging_bootstrap">
                
          </div>
           <?php
		if(!empty($stock_list)) { ?>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php //echo $page_links; ?> </center>  
          </div>
          <?php }?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
