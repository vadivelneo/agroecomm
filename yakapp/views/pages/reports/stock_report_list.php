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
	
	$("#division_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_division_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					//$('#vendor').val(ui.item.vendor_id);
					$('#division_name').val(ui.item.division_name);
					$('#division_id').val(ui.item.division_id);
				}
 	});
	
	$("#material_type").autocomplete({
		source: "<?php echo site_url('reports/report_search_material_type'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					//$('#vendor').val(ui.item.vendor_id);
					$('#material_type').val(ui.item.products_type_name);
					$('#material_type_id').val(ui.item.products_type_id);
				}
 	});
	
	$("#report_item_name").bind('cut copy paste', function (e) {
    e.preventDefault(); //disable cut,copy,paste
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
   		
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/stock_search'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
      	 <?php /*?> <p class="report_p"> From date : </p>	
           <input type="text" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>">
          <p class="report_p"> To date : </p>
           <input type="text" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>"><?php */?>
		
           <input type="text"  style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>" placeholder="Material Name"/>
		   <input type="hidden" name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
             <input type="text" placeholder="Material Type" name="material_type" class="input-large report_to" id="material_type" value="<?php if(isset($material_type)){ echo $material_type; }?>">
            <input type="hidden" name="material_type_id" class="input-large report_to" id="material_type_id" value="<?php if(isset($material_type_id)){ echo $material_type_id; }?>">
           <input type="text" placeholder="Division" name="division_name" class="input-large report_to" id="division_name" value="<?php if(isset($division_name)){ echo $division_name; }?>">
            <input type="hidden" name="division_id" class="input-large report_to" id="division_id" value="<?php if(isset($division_id)){ echo $division_id; }?>">
		   
           
            <select name="search_item_status" class="chzn-select" id="search_item_status" style="width:115px" required >
			<option value="">Select Status</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == '1') { ?> selected="selected" <?php } } ?> value="1">Approved</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == '0') { ?> selected="selected" <?php } } ?> value="0">Unapproved</option>
			</select>    
           
              
          <input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
 		 </div> 
      </form> 
	 
	   <?php
		if(!empty($stock_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/stock_search'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<input type="hidden" name="report_products_group_name" value="<?php if(isset($product_group_name)){ echo $product_group_name; }?>">
					<input type="hidden" name="report_products_group_id" value="<?php if(isset($product_group_id)){ echo $product_group_id; }?>" />
                    <input type="hidden" name="search_item_status" value="<?php if(isset($search_item_status)){ echo $search_item_status; }?>" />
                     <input type="hidden"  style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>"/>
                      <input type="hidden" placeholder="Division" name="division_name" class="input-large report_to" id="division_name" value="<?php if(isset($division_name)){ echo $division_name; }?>">
                         <input type="hidden" name="division_id" class="input-large report_to" id="division_id" value="<?php if(isset($division_id)){ echo $division_id; }?>">
                           <input type="hidden" placeholder="Material Type" name="material_type" class="input-large report_to" id="material_type" value="<?php if(isset($material_type)){ echo $material_type; }?>">
                           <input type="hidden" name="material_type_id" class="input-large report_to" id="material_type_id" value="<?php if(isset($material_type_id)){ echo $material_type_id; }?>">
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
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Material Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Material Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">SKU&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Division&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Store&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Type&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Current Stock&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Status&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Added Date&nbsp;&nbsp;</a></th>
         
              
              </tr>
              <?php
		if(!empty($stock_list)) {
			$i = 1;
			/* echo "<pre>";
			print_r($stock_list); exit; */
		 foreach($stock_list as $INV) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
              
                <td><?php echo $INV['product_code'];?></td>
                <td><?php echo $INV['product_name'];?></td>
                <td><?php echo $INV['product_mfr_part_number'];?></td>
                <td><?php echo $INV['division_name'];?></td>
                <td><?php echo $INV['store_name'];?></td>
                <td><?php echo $INV['products_type_name'];?></td>
                <td><?php echo $INV['uom_name'];?></td>
                <td><?php echo $INV['inventory_qty'] ;?></td>
                <td><?php if(($INV['inventory_qc_status']) == 1){ echo 'Approved';} else { echo 'Unapproved';} ;?></td>
                <td><?php echo date("d-m-Y", strtotime($INV['inventory_add_date']));?></td>
				
                
               
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
