<script type="text/javascript">
function accordin_grid($id,$i)
{
    $('#accordin_grid_'+$i).css('display','none');
	$('#accordin_close_grid_'+$i).css('display','block');
	
	var search_id = $id;
		   
	   $.ajax({
		type: 'POST',
		url: '<?php echo site_url('reports/view_income_receipt_items'); ?>',
		data: {search_id: search_id},
		success: function(resp)
		{ 
			$('#summary_report_'+$i).html(resp);
		}
	 });
}

function accordin_close_grid($id,$i)
{
	//alert($i);
	
     $('#accordin_close_grid_'+$i).css('display','none');
	 $('#accordin_grid_'+$i).css('display','block');
	$('#summary_report_'+$i).html('');
}
</script>
<script>
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
});
</script>
<?php echo $this->load->view('pages/accounts_report_left_side'); ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
      <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/income_search'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
                	<div class="report_search_main">
                        <div class="report_search_left report_list_left"> 
                            <div class="report_search_left_inner">
                            	<div class="report_field field_box">
                                    <div class="report_field_label">
                                    	<p> From date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="text" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>">
                                	</div>
                                </div>
                                <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> To date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="text" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
                                	</div>
                                </div>
                                <div class="report_field field_box">                                
                                	<div class="report_field_label">
                                    	<p> Customer Name : </p>
                                    </div>
                                    <div class="report_field_input">
                                    	<input type="text" name="report_customer_name" class="input-large report_text" id="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
                                		<input type="hidden" name="report_customer_id" id="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                                	</div>
                                </div>
                               <div class="report_field field_box">
                                	
                                </div>
                            </div>
                        </div>
                        <div class="report_search_right"> 
                         <input id="tax_value" name="tax_value" type="hidden" value="<?php echo $tax_value; ?>" />
                        	<input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
                        </div>
                    </div>
				</div> 
			</form>  
      <?php
			if(!empty($income_list)) { ?>
				<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/income_search'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<input type="hidden" name="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
                    <input type="hidden" name="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                    <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
		</form>
			<?php } ?>
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last summary_child">
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
        <div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="summary_div_child" style="width:12%;">Receipt No.
                    </div>
                    <div class="summary_div_child" style="width:15%;">Customer Name
                    </div>
                    <div class="summary_div_child" style="width:15%;">Customer Code
                    </div>
                    <div class="summary_div_child amt_right" style="width:5%;">Amount
                    </div>
                    <div  class="summary_div1 amt_right" style="width:15%;">Balance Amount
                    </div>
                    <div  class="summary_div1 amt_right" style="width:15%;">Payment Mode
                    </div>
                    </div>
					<?php
                	if(!empty($income_list)) {
                    $i = 1;
                 	foreach($income_list as $INVR) { ?>
                    <div class="summary_child_cont">
					<div >
                    <span id="accordin_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:block" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span><span id="accordin_close_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img"></span>
                    </div>
                     <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
											<?php echo $INVR['invoice_receipt_number'];?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
											<?php echo $INVR['customer_name'];?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
											<?php echo $INVR['customer_code'];?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
											<?php echo $INVR['invoice_receipt_amount'];?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
											<?php echo $INVR['invoice_receipt_balance_amount'];?>
										</a>
                    </div>
                    <div class="summary_div_child" style="width:15%;"><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INVR['invoice_receipt_id']; ?>','<?php echo $i; ?>')">
											<?php echo $INVR['payment_mode_name'];?>
										</a>
                    </div>
                    </div>
                    <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    <?php $i++; } } ?>
                    </div>
                    </div> 
        <?php 
            if(empty($income_list)) { ?>
            <div class="col w10 last" style="text-align: center;">No Records Found</div>
			<?php } ?>
      <div class="clear"></div>
    </div>
  </div>
</section>
