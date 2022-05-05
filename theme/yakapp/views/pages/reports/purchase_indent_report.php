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
	
	
	$("#store_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_store_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					//$('#vendor').val(ui.item.vendor_id);
					$('#store_name').val(ui.item.store_name);
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
					url: '<?php echo site_url('purchaseindent/view_po_indent_export'); ?>',
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
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/po_indent_search'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;"> 
					<input type="text" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else {  } ?>" placeholder="From Date">
					<input type="text" name="report_to" class="input-large report_to" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else {  } ?>" placeholder="To Date">
					
					<input type="text" placeholder="Vendor Name" name="report_vendor" class="input-large report_to" id="report_vendor" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>">
					<input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
					
					
				<?php /*?>	<input type="text" placeholder="Store Name" name="store_name" class="input-large report_to" id="store_name" value="<?php if(isset($store_name)){ echo $store_name; }?>">
					
					
					<select class="chzn-select" name="location" id="location" style="width:150px;" >
						<option value="">Select a Location</option>
						<?php foreach($loc_list as $LOC) {?>
                        <option value="<?php echo $LOC['location_id']; ?>" <?php if(isset($location)){ if($location == $LOC['location_id']) { ?> selected="selected" <?php } } ?> ><?php echo $LOC['location_name']; ?></option>
                        <?php } ?>
					</select><?php */?>
            <select name="search_item_status" class="chzn-select" id="search_item_status" style="width:115px" >
			<option value="">Select Status</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'created') { ?> selected="selected" <?php } } ?> value="created">created</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'approved') { ?> selected="selected" <?php } } ?> value="approved">Approved</option>
            <option  <?php if(isset($search_item_status)) { if($search_item_status == 'cancelled') { ?> selected="selected" <?php } } ?> value="cancelled">Cancelled</option>
            
			</select>      
					 <input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
				</div> 
			</form> 
			<?php
			if(!empty($po_ind_list)) {?>
            <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/po_indent_search'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="report_from" id="report_from" value="<?php if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from));} ?>"  />
                <input type="hidden" name="report_to" id="report_to" value="<?php if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to));} ?>"  />
                <input type="hidden" placeholder="Vendor Name" name="report_vendor" class="input-large report_to" id="report_vendor" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>">
					<input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
					
					<input type="hidden" placeholder="Store Name" name="store_name" class="input-large report_to" id="store_name" value="<?php if(isset($store_name)){ echo $store_name; }?>">
                <input type="hidden" name="location" id="location" value="<?php if(isset($location)){ echo $location;}?>" />
                 <input type="hidden" name="search_item_status" id="search_item_status" value="<?php if(isset($search_item_status)){ echo $search_item_status;}?>" />
               <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
            </form>
            <?php }?>
		</div>
		<div class="table_head" id="table">
			<div class="col w10 last summary_child">
				<div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
                <div class="content">
                <div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:3%;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="summary_div_pur">Goods Received No
                    </div>
                    <div class="summary_div_pur">Goods Received Date
                    </div>
                    <div class="summary_div_pur">Purchase Order No
                    </div>
                    <div class="summary_div_pur">Vendor Name
                    </div>
                    <div class="summary_div_pur">Location
                    </div>
                    <div class="summary_div_pur">Status
                    </div>
                                       </div>
                   
                             <?php
					
							if(!empty($po_ind_list)) {
								$i = 1;
								foreach($po_ind_list as $PO_IND) { ?>
                               
                    <div class="summary_child_cont">
					<div >
                    <span id="accordin_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:block" onclick="accordin_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span><span id="accordin_close_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img">
                    </span>
                    </div>
                     <div class="summary_div_pur" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
											<?php echo $PO_IND['po_indent_number'];?>
										</a>
                    </div>
                    <div class="summary_div_pur"><?php 
											if(($PO_IND['po_indent_date']) != '0000-00-00' && $PO_IND['po_indent_date'] != '' && $PO_IND['po_indent_date'] != NULL)
											{ 
												echo date('d-m-Y', strtotime($PO_IND['po_indent_date']));
											}
											else
											{
												echo "-";
											}
										?>
                    </div>
                   
                    <div class="summary_div_pur"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
											<?php echo ucfirst($PO_IND['po_reference_number']);?>
										</a>
                    </div>
                    
                    <div class="summary_div_pur"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
											<?php echo $PO_IND['vendor_name'];?>
										</a>
                    </div>
                    <div class="summary_div_pur" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
											<?php echo $PO_IND['location_name'];?>
										</a>
                    </div>
                    <div class="summary_div_pur"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO_IND['po_indent_id']; ?>','<?php echo $i; ?>')">
											<?php echo $PO_IND['po_indent_active_status'];?>
										</a>
                    </div>
                    </div>
                    <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    <?php $i++; } } ?>
                   
				</div>
                
			</div>
            <?php if(empty($po_ind_list)) { ?>
            <div class="col w10 last pur_item" style="text-align: center;">No Records Found</div>
            <?php } ?>
							
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</section>
