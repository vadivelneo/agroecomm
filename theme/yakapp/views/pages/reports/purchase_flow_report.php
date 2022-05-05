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
  
});

</script>


<?php echo $this->load->view('pages/report_left_side'); ?>

<section>
	<div class="rightPanel">
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/purchase_generate_flow_report'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
					<p class="report_p"> From date : </p>	
					<input type="text" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>">
					<p class="report_p"> To date : </p>
					<input type="text" name="report_to" class="input-large report_to" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
					<p class="report_p">Vendor Name : </p>
					<input type="text" name="report_vendor" class="input-large report_to" id="report_vendor" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>">
          			<input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
                    <!--<select class="chzn-select"  name="search_status" id="search_status">
                        <option value="">Select Status</option>
                        <option value="draft">Draft</option>
                        <option value="onprocess">Onprocess</option>
                        <option value="closed">Closed</option>
                        <option value="approved">Approved</option>
                        <option value="delivered">Delivered</option>
                        <option value="canceled">Canceled</option>
                    </select>-->
					<button id="generate" name="generate" type="submit" class="btn-success" style="margin-top:1%;">Generate</button>
				</div> 
			</form> 
			<?php
            if(!empty($po_list)) {?>
            <form class="form-horizontal" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_purchase_order'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="from_date" id="from_date" value="<?php if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from));} ?>" />
            <input type="hidden" name="to_date" id="to_date" value="<?php if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to));} ?>"  />
            <input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
            <button style="float:right; margin-bottom:1%; margin-right:3%;" class="btn-success"><strong>Export</strong></button>
            </form>
            <?php }?>
		</div>
		<br />

        <div class="table_head" id="table">
            <div class="col w10 last">
                <div class="content">
                <table>
                    <tbody>
                        <tr>
                        <th width="100px"><a href="javascript:void(0);" class="listViewHeaderValues">PO Number&nbsp;&nbsp;</a></th>
                            <th width="100px"><a href="javascript:void(0);" class="listViewHeaderValues">PO Date&nbsp;&nbsp;</a></th>
                            <th width="150px"><a href="javascript:void(0);" class="listViewHeaderValues">MR Number&nbsp;&nbsp;</a></th>
                            <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">MR Date&nbsp;&nbsp;</a></th>
                            <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">PI Number&nbsp;&nbsp;</a></th>
                            <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">PI Date&nbsp;&nbsp;</a></th>
                           
                        </tr>
                        <?php
                        if(!empty($po_list)) {
                        	$i = 1;
							//echo "<pre>"; print_r($po_list); exit;
                        	foreach($po_list as $PO) { ?>
                            <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                           
                                <td>
                                	<a href="#">
										<?php echo $PO['po_po_no'];?>
                                    </a>
                                </td>
                                 <td>
									<?php 
                                        if(($PO['po_add_date']) != '0000-00-00' && $PO['po_add_date'] != '' && $PO['po_add_date'] != NULL)
                                        { 
                                            echo date('d-m-Y', strtotime($PO['po_add_date']));
                                        }
                                        else
                                        {
                                            echo "-";
                                        }
                                    ?>
                                </td>
                                <td>
                                	<a href="#">
										<?php echo ucfirst($PO['po_indent_number']);?>
                                    </a>
                                </td>
                                <td class="report_right_aligned">
                                	<a href="#>">
										<?php echo $PO['po_indent_add_date'];?>
                                    </a>
                                </td>
                                <td class="report_right_aligned">
                                	<a href="#">
										<?php echo $PO['po_invoice_number'];?>
                                    </a>
                                </td>
                                <td class="report_right_aligned">
                                	<a href="#">
										<?php echo $PO['po_invoice_add_date'];?>
                                    </a>
                                </td>

                            </tr>
                        	<?php
                            $i++;
							}
						}
						else
						{
						?>
                        <tr>
                            <td colspan="8" style="text-align:center;"> No Records Found </td>
                        </tr>
                        <?php 
						}
						?>
                    </tbody>
                </table>
                </div>
            </div>
        	<div class="clear"></div>
        </div>
    </div>
</section>
