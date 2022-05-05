<script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#report_from" ).datepicker({
		 dateFormat:'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
   
});
 
</script>

<?php echo $this->load->view('pages/report_left_side'); ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
      <span class="btn-group">
     <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/daily_reports_sales'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
      	  <p class="report_p">Date : </p>	
           <input type="text" value="<?php echo date('d-m-Y')?>" name="report_from" class="input-large report_from" id="report_from" required="required">
          <button id="generate" name="generate" type="submit" class="btn-success" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> 
      
   </div>
    <?php
		if(!empty($invoice_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_daily_reports_sales'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="from_date" id="from_date" value="<?php echo $report_from;?>"  />
              <button style="float:right; margin-right:3%;" class="btn-success"><strong>Export PDF</strong></button>
               
		</form>
		<?php }?>
    
    <div class="" id="table">
      <div class="col w10 last">
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Sales Invoice No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Sales Invoice Date&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Sales Order No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
             
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Status &nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
		if(!empty($invoice_list)) {
			$i = 1;
		 foreach($invoice_list as $INV) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><a href="<?php echo site_url('salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><?php echo $INV['sale_invoice_company_invoice_no'];?></a></td>
                <td><a href="<?php echo site_url('salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><?php echo date("d-m-Y", strtotime( $INV['sale_invoice_date']));?></a></td>
              <td><a href="<?php echo site_url('salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><?php echo $INV['sale_invoice_so_ref_no'];?></a></td>
                 <td><?php echo $INV['total_net_amount_items'];?></td>
                <td><?php echo $INV['sale_invoice_status'];?></td>
             
                 
				<td>
				<li><!--<a href="<?php echo site_url('salesinvoice/print_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><span class="icon-print"></span></a></li>-->
                <li><a href="<?php echo site_url('salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><span class="icon-edit"></span></a></li>
				 
                <!-- <li> <a href="<?php echo site_url('salesinvoice/edit_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li> <a class="javascript:void(0);" onclick="return deletelsaleinvioce(<?php echo $INV['sale_invoice_id'] ;?>,'<?php echo $INV['sale_invoice_active_status']; ?>')"> <span class="icon-trash"></span></a></li>-->
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
      </div>
       <?php
		if(!empty($invoice_list)) {?>
      <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
          <?php }?>
      <div class="clear"></div>
    </div>
  </div>
</section>
