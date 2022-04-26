 
 <?php echo $this->load->view('pages/report_left_side'); ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
   <!--     <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
          <li class="divider"> </li>
          <li><a href="#"><i class=""></i>Import</a></li>
          <li><a href="#"><i class=""></i>Export</a></li>
          <li><a href="#"><i class=""></i>Find Duplicates</a></li>
        </ul>
      </div>-->
      
      
      <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/monthly_reports_purchase'); ?>" enctype="multipart/form-data"> 
      
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
      <?php
		if(!empty($invoice_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_monthly_reports_purchase'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="month" id="month" value="<?php echo $month;?>" />
        <input type="hidden" name="year" id="year" value="<?php echo $year;?>"  />
        
              <button style="float:right; margin-right:3%;" class="btn-success"><strong>Export PDF</strong></button>
               
		</form>
		<?php }?>
     <!--    <div tabindex="3" class="wrapper-dropdown-5" id="allprod"> <span> <img class="filterImage" src="<?php echo base_url(); ?>resources/images/filter.png"> All  </span>
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Product1</a></li>
          <li><a href="#"><i class=""></i>Product2</a></li>
          <li><a href="#"><i class=""></i>Product3</a></li>
          <li><a href="#"><i class=""></i>Product4</a></li>
        </ul>
      </div>
   <span class="span4 btn-toolbar">
          <div class="listViewActions pull-right">
             <div class="pageNumbers alignTop ">
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
            </div>
          </div>
          <div class="clearfix">
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span> -->
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
		<div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Purchase Invoice No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Vendor Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Requested date&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Contact Name &nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Amount &nbsp;&nbsp;</a></th>
                 <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Status  &nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
           
	  <?php
		if(!empty($invoice_list)) {
			$i = 0;
		 foreach($invoice_list as $INVOICE) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><a href="<?php echo site_url('purchaseinvoice/views_purchaseinvoice'); ?>/<?php echo $INVOICE['po_invoice_id']; ?>"><?php echo $INVOICE['po_invoice_number'];?></a></td>
                <td><a href="<?php echo site_url('purchaseinvoice/views_purchaseinvoice'); ?>/<?php echo $INVOICE['po_invoice_id']; ?>"><?php echo $INVOICE['vendor_name'];?></a></td>
				<td><?php if(($INVOICE['po_invoice_date']) != '0000-00-00' && $INVOICE['po_invoice_date'] != '' && $INVOICE['po_invoice_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($INVOICE['po_invoice_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                <td><?php echo $INVOICE['po_invoice_contact_name'];?></td>
                <td><?php echo $INVOICE['po_invoice_grand_total'];?></td>
                <td><?php echo $INVOICE['po_invoice_status'];?></td>
               
				<td>
                <li><!--<a href="<?php echo site_url('purchaseinvoice/print_purchaseinvoice/'); ?>/<?php echo $INVOICE['po_invoice_id']; ?>" target="_blank"><span class="icon-print"></span></a></li>-->
                    <a href="<?php echo site_url('purchaseinvoice/views_purchaseinvoice'); ?>/<?php echo $INVOICE['po_invoice_id']; ?>"><span class="icon-edit"></span></a>
                   <!-- <a href="<?php echo site_url('purchaseinvoice/edit_purchaseinvoice'); ?>/<?php echo $INVOICE['po_invoice_id']; ?>"><span class="icon-pencil"></span></a>
                    <a class="javascript:void(0);" onclick="return delete_po_invoice(<?php echo $INVOICE['po_invoice_id'] ;?>,'<?php echo $INVOICE['po_invoice_active_status']; ?>')"> <span class="icon-trash"></span></a>-->
                    
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
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
