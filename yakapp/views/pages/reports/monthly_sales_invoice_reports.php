 

<?php echo $this->load->view('pages/report_left_side'); ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
      <span class="btn-group">
     <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/monthly_reports_sales'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="report" id="report" style="padding:1%;"> 
      	  <p class="report_p"> Month : </p>
          <select name="month" id="month" style="float: left; margin-right: 25px; margin-top: 13px; width: 70px;" >
         	<option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            </select>
            <p></p>
            <p class="report_p" style="float:float: left; margin-top: 18px; width: 35px;" > Year : </p>
          <select name="year" id="year" style="float:float: left; width: 75px; margin-left: -7px; margin-right: 10px;" >
         	<option value="2015">2015</option>
		  	<option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
		  	</select>	
          <button id="generate" name="generate" type="submit" class="btn-success" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> 
      
   </div>
    <?php
		if(!empty($invoice_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_monthly_reports_sales'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="month" id="month" value="<?php echo $month;?>"  />
        <input type="hidden" name="year" id="year" value="<?php echo $year;?>"  />
        
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
