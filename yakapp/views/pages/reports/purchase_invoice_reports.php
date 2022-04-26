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
 <?php echo $this->load->view('pages/purchase_report_left_side'); ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
        
      
      <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/reportssearch'); ?>" enctype="multipart/form-data"> 
      
       <div tabindex="3" class="report" id="report" style="padding:1%;"> 
      	  <p class="report_p">From date : </p>	
          <input type="text" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>">
          <p class="report_p">To date : </p>
          <input type="text" name="report_to" class="input-large report_to" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
          <p class="report_p">Vendor Name : </p>
          <input type="text" name="report_vendor" class="input-large report_to" id="report_vendor" value="<?php if(isset($vendor_name)){ echo $vendor_name; }?>">
          <input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
		  <button id="generate" name="generate" type="submit" class="btn-success" style="margin-top:1%;">Generate</button>
      </div> 
      </form> 
      <?php
		if(!empty($invoice_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_purchase_invoice'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="from_date" id="from_date" value="<?php if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from));} ?>" />
            <input type="hidden" name="to_date" id="to_date" value="<?php if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to));} ?>"  />
            <input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
        <button style="float:right; margin-right:3%;" class="btn-success"><strong>Export</strong></button>
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
              <th width="100px"><a href="javascript:void(0);" class="listViewHeaderValues">Date&nbsp;&nbsp;</a></th>
                <th width="100px"><a href="javascript:void(0);" class="listViewHeaderValues">PI No.&nbsp;&nbsp;</a></th>
                <th width="150px"><a href="javascript:void(0);" class="listViewHeaderValues">Vendor Name&nbsp;&nbsp;</a></th>
                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Gross Amount&nbsp;&nbsp;</a></th>
                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Discount Amount&nbsp;&nbsp;</a></th>
                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">CGST Amount&nbsp;&nbsp;</a></th>
                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">SGST Amount&nbsp;&nbsp;</a></th>
                <th width="100px" class="report_right_aligned"><a href="javascript:void(0);" class="listViewHeaderValues">Net Amount&nbsp;&nbsp;</a></th>
                
                <th width="80px"><a href="javascript:void(0);" class="listViewHeaderValues">Status  &nbsp;&nbsp;</a></th>
              </tr>
           
	  <?php
		if(!empty($invoice_list)) {
			$i = 0;
		 foreach($invoice_list as $INVOICE) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
               <td>
                    <?php 
                        if(($INVOICE['po_invoice_add_date']) != '0000-00-00' && $INVOICE['po_invoice_add_date'] != '' && $INVOICE['po_invoice_add_date'] != NULL)
                        { 
                            echo date('d-m-Y', strtotime($INVOICE['po_invoice_add_date']));
                        }
                        else
                        {
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <a href="#">
                        <?php echo $INVOICE['po_invoice_number'];?>
                    </a>
                </td>
              
                <td>
                    <a href="">
                        <?php echo ucfirst($INVOICE['vendor_name']);?>
                    </a>
                </td>
                <td class="report_right_aligned">
                    <a href="#">
                        <?php echo $INVOICE['po_invoice_total_gross_amount'];?>
                    </a>
                </td>
                <td class="report_right_aligned">
                    <a href="#">
                        <?php echo $INVOICE['po_invoice_total_discount_amount'];?>
                    </a>
                </td>
                <td class="report_right_aligned">
                    <a href="#">
                        <?php echo $INVOICE['tax_group_tax_amount'];?>
                    </a>
                </td>
				
				 <td class="report_right_aligned">
                    <a href="#">
                        <?php echo $INVOICE['tax_group_excise_amount'];?>
                    </a>
                </td>
                <td class="report_right_aligned">
                    <a href="#">
                        <?php echo $INVOICE['po_invoice_grand_total'];?>
                    </a>
                </td>
               
                <td>
                    <?php echo $INVOICE['po_invoice_status'];?>
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="9" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
         <?php
        if(!empty($invoice_list)) {?>
        <!--<div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>-->
         <?php }?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
