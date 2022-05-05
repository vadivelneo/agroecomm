
<?php echo $this->load->view('pages/general_report_left_side'); 

 //echo "<pre>";print_r($so_list);exit;
?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     <!--   <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
         <li class="divider"> </li>
         <li><a href="#"><i class=""></i>Import</a></li>
          <li><a href="#"><i class=""></i>Export</a></li>
          <li><a href="#"><i class=""></i>Find Duplicates</a></li>
        </ul>
      </div>-->
       <!--<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/po_indent_search'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
      	  <p class="report_p"> Customer Name :  
           <select class="chzn-select"  name="sales_man" id="sales_man" required="required">
                                <option value="">Select an Option</option>
                                   <?php foreach($sales_man as $SALES_MAN) {?>
                            <option value="<?php echo $SALES_MAN['user_id']; ?>"  ><?php echo $SALES_MAN['user_first_name']; ?></option>
                            <?php } ?>
                                </select></p> 
          <button id="generate" name="generate" type="submit" class="btn-success" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> -->
      <br />
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_cus_account'); ?>" enctype="multipart/form-data">
        
              <button style="float:right; margin-right:3%;" class="btn-success"><strong>Export PDF</strong></button>
               
		</form>
		     <!--    <div tabindex="3" class="wrapper-dropdown-5" id="allprod"> <span> <img class="filterImage" src="<?php echo base_url(); ?>resources/images/filter.png"> All  </span>
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Product1</a></li>
          <li><a href="#"><i class=""></i>Product2</a></li>
          <li><a href="#"><i class=""></i>Product3</a></li>
          <li><a href="#"><i class=""></i>Product4</a></li>
        </ul>
      </div> -->
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          <!--    <div class="pageNumbers alignTop ">
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
            </div>-->
          </div>
          <div class="clearfix">
		  
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span> 
      
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Customer Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">E-Mail&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Mobile&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Credit Amount&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Debit Amount&nbsp;&nbsp;</a></th>
              </tr>
              <?php
		if(!empty($customer_list)) {
			$i = 1;
		 foreach($customer_list as $CUS) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><?php echo $CUS['customer_code'];?></td>
                <td><?php echo ucfirst($CUS['customer_name']);?></td>
                <td><?php echo ucfirst($CUS['customer_email']);?></td>
                <td><?php echo ucfirst($CUS['customer_mobile']);?></td>
                <td><?php echo ucfirst($CUS['customer_accounts_credit']);?></td>
                <td><?php echo ucfirst($CUS['customer_accounts_debit']);?></td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div> <?php
		if(!empty($customer_list)) {?>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
          <?php }?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
