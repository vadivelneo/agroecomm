<script>
$(document).ready(function () {
	
	$("#report_vendor").autocomplete({
		source: "<?php echo site_url('reports/report_search_vendor_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#vendor').val(ui.item.vendor_id);
					$('#report_vendor').val(ui.item.vendor_name);
				}
 	});
	
	$("#report_store").autocomplete({
		source: "<?php echo site_url('reports/report_search_store_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#store').val(ui.item.vendor_id);
					$('#report_store').val(ui.item.vendor_name);
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
  
});

</script>
<script type="text/javascript">
		function accordin_grid($id,$i)
		{
			
				$('#accordin_grid_'+$i).css('display','none');
				$('#accordin_close_grid_'+$i).css('display','block');
			
				var search_id = $id;
					   
				   $.ajax({
					type: 'POST',
					url: '<?php echo site_url('purchaseorder/view_po_pending'); ?>',
					data: {search_id: search_id},
					success: function(resp)
					{ 
						$('#summary_report_'+$i).html(resp);
					}
				 });
		}
		
		function accordin_close_grid($id,$i)
		{
			
			 $('#accordin_close_grid_'+$i).css('display','none');
			 $('#accordin_grid_'+$i).css('display','block');
			 $('#summary_report_'+$i).html('');
		}

</script>


<?php echo $this->load->view('pages/purchase_report_left_side'); ?>

<section>
	<div class="rightPanel">
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/po_pendingsearch'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
					<input type="text" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else {  } ?>" placeholder="From Date">
					<input type="text" name="report_to" class="input-large report_to" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { } ?>" placeholder="To Date">
					
					<input type="text" name="report_vendor" placeholder="Vendor Name" class="input-large report_to" id="report_vendor" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>">
					
				<?php /*?>	<input type="text" name="report_store" placeholder="Store Name" class="input-large report_to" id="report_store" value="<?php if(isset($store_name)){ echo $store_name; }?>">
                    <input type="text" name="report_item_name" placeholder="Material Name" class="input-large report_to" id="report_item_name" value="<?php if(isset($report_item_name)){ echo $report_item_name; }?>">
                    <input type="hidden" name="report_item_id"  class="input-large report_to" id="report_item_id" value="<?php if(isset($report_item_id)){ echo $report_item_id; }?>">
                      <input type="text" placeholder="Material Type" name="material_type" class="input-large report_to" id="material_type" value="<?php if(isset($material_type)){ echo $material_type; }?>">
            <input type="hidden" name="material_type_id" class="input-large report_to" id="material_type_id" value="<?php if(isset($material_type_id)){ echo $material_type_id; }?>">
           <input type="text" placeholder="Division" name="division_name" class="input-large report_to" id="division_name" value="<?php if(isset($division_name)){ echo $division_name; }?>">
            <input type="hidden" name="division_id" class="input-large report_to" id="division_id" value="<?php if(isset($division_id)){ echo $division_id; }?>">
            <select name="search_item_status" class="chzn-select" id="search_item_status" style="width:115px"  >
			<option value="">Select Status</option>
             <option <?php if(isset($search_item_status)) { if($search_item_status == 'draft') { ?> selected="selected" <?php } } ?> value="draft">Draft</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'onprocess') { ?> selected="selected" <?php } } ?> value="onprocess">Onprocess</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'closed') { ?> selected="selected" <?php } } ?> value="closed">closed</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'approved') { ?> selected="selected" <?php } } ?> value="approved">Approved</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'delivered') { ?> selected="selected" <?php } } ?> value="delivered">Delivered</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'cancelled') { ?> selected="selected" <?php } } ?> value="cancelled">Cancelled</option>
            <option   <?php if(isset($search_item_status)) { if($search_item_status == 'awaiting approval') { ?> selected="selected" <?php } } ?> value="awaiting approval">Awaiting Confirmation</option>
			</select> <?php */?>     
					
					
          			<input type="hidden" name="vendor" id="vendor"  value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
					 <input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
				</div> 
			</form> 
			<?php
            if(!empty($po_list)) {?>
            <form class="form-horizontal" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/po_pendingsearch'); ?>" enctype="multipart/form-data">
           <input type="hidden" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>">
					<input type="hidden" name="report_to" class="input-large report_to" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
            <input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
                         	<input type="hidden" name="report_store" placeholder="Store Name" class="input-large report_to" id="report_store" value="<?php if(isset($store_name)){ echo $store_name; }?>">
                            <input type="hidden" name="report_item_name" placeholder="Material Name" class="input-large report_to" id="report_item_name" value="<?php if(isset($report_item_name)){ echo $report_item_name; }?>">
                             <input type="hidden" name="report_item_id"  class="input-large report_to" id="report_item_id" value="<?php if(isset($report_item_id)){ echo $report_item_id; }?>">
              <input type="hidden" name="search_item_status" id="search_item_status" value="<?php if(isset($search_item_status)){ echo $search_item_status;}?>" />
               <input type="hidden" placeholder="Division" name="division_name" class="input-large report_to" id="division_name" value="<?php if(isset($division_name)){ echo $division_name; }?>">
                         <input type="hidden" name="division_id" class="input-large report_to" id="division_id" value="<?php if(isset($division_id)){ echo $division_id; }?>">
                           <input type="hidden" placeholder="Material Type" name="material_type" class="input-large report_to" id="material_type" value="<?php if(isset($material_type)){ echo $material_type; }?>">
                           <input type="hidden" name="material_type_id" class="input-large report_to" id="material_type_id" value="<?php if(isset($material_type_id)){ echo $material_type_id; }?>">
            <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
               
            </form>
            <?php }?>
		</div>
		<br />

        <div class="table_head" id="table">
			<div class="col w10 last summary_child">
				<div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
                <div class="content">
				
				
				<div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:1%;" >&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="summary_div">PO No.
                    </div>
                    <div class="summary_div">PO Date.
                    </div>
                    <div class="summary_div">Party Name
                    </div>
                   
                     <div class="summary_div">Material Name 
                    </div>
                   
                    <div class="summary_div">HSN
                    </div> 
					<div class="summary_div">UOM
                    </div>
					<div class="summary_div">Ordered Qty
                    </div>
                    <div class="summary_div">Received Qty
                    </div>
                    <div class="summary_div">Pending Qty
                    </div>
                                       </div>
				
				  <?php
						//echo "<pre>"; print_r($po_list); 
                        if(!empty($po_list)) {
                        	$i = 1;
                        	foreach($po_list as $PO) {
								/*if(($PO['po_items_ord_qty'] - $PO['po_items_qty']) != 0)
								{*/
								 ?>
							
							<div class="summary_child_cont">
					
					
					 <div class="summary_div" ><a href="javascript:void(0)" >
											<?php if($PO['po_po_no']) { echo $PO['po_po_no']; } else {echo "-";}?>
										</a>
                    </div>
					
					
                                        
                                        <div class="summary_div" ><a href="javascript:void(0)" >
											<?php 
                                        if(($PO['po_trans_date']) != '0000-00-00' && $PO['po_trans_date'] != '' && $PO['po_add_date'] != NULL)
                                        { 
                                            echo date('d-m-Y', strtotime($PO['po_trans_date']));
                                        }
                                        else
                                        {
                                            echo "-";
                                        }
                                    ?>
										</a>
                    
                    </div>
					
					 <div class="summary_div" ><a href="javascript:void(0)" >
											<?php  if($PO['vendor_name']) { echo $PO['vendor_name']; } else {echo "-";}?>
										</a>
                    </div>
					
					 <div class="summary_div" ><a href="javascript:void(0)" >
											<?php  if($PO['po_items_name']) { echo $PO['po_items_name']; } else {echo "-";}?>
										</a>
                    </div>
					
					 <div class="summary_div" ><a href="javascript:void(0)" >
											<?php  if($PO['po_items_hsn_sac']) { echo $PO['po_items_hsn_sac']; } else {echo "-";}?>
										</a>
                    </div>
					
					 <div class="summary_div" ><a href="javascript:void(0)" >
											<?php  if($PO['uom_name']) { echo $PO['uom_name']; } else {echo "-";}?>
										</a>
                    </div>
				
					
					 <div class="summary_div" ><a href="javascript:void(0)" >
											<?php   if($PO['po_items_ord_qty']) {echo $PO['po_items_ord_qty']; } else {echo "-";}?>
										</a>
                    </div>
                     <div class="summary_div" ><a href="javascript:void(0)" >
											<?php  if($PO['po_items_ord_qty']) { echo $PO['po_items_ord_qty'] - $PO['po_items_qty']; } else {echo "-";}?>
										</a>
                    </div>
                     <div class="summary_div" ><a href="javascript:void(0)" >
											<?php  if($PO['po_items_qty']) { echo $PO['po_items_qty']; } else {echo "-";}?>
										</a>
                    </div>
                    
					
					  <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    
					
					
                    </div>
                    <?php $i++; } 
						}?>
                    </div>
							
					 <?php if(empty($po_list)) { ?>
                     <div class="col w10 last pur_item" style="text-align: center;">No Records Found</div>
                     <?php } ?>		
						
                        	
                        
                </div>
            </div>
        	<div class="clear"></div>
        </div>
    </div>
</section>
