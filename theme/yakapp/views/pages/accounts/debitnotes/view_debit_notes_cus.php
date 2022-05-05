
<?php echo $this->load->view('pages/accounts_left_side'); ?>

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
        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
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
      <h3 class="span8 textOverflowEllipsis">Invoice Details</h3>
      <table class="table table-bordered blockContainer showInlineTable equalSplit">
          <tbody>
            
              <tr>
    
                            <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">
                            Customer Code
                            </label></td>
                            <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                            
                                <?php echo $customer_code ?>
                                </span></div>
                                <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">
                            Customer Name
                            </label></td>
                            <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                                <?php echo $customer_name ?>
                                </span></div>
                                
            </tr>
            
            
            

          </tbody>
        </table>
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                 
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Invoice No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Invoive Amount&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Paid Amount &nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Due Amount  &nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Adjust Amount &nbsp;&nbsp;</a></th>
              </tr>
              <?php
		if(!empty($credit_details)) {
			$i = 1;
		 foreach($credit_details as $Cus) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><?php echo $Cus['sale_invoice_no'];?></a></td>
                <td><?php echo $Cus['invoice_payment_invoice_amount'];?></a></td>
                <td><?php echo $Cus['invoice_payment_paid_amount'];?></td>
                <td><?php echo $Cus['invoice_payment_due_amount'];?></td>
                <td><?php echo $Cus['invoice_payment_adjusted_amount'];?></td>
				
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="7" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div>
        
      </div>
      <div class="clear"></div>
    </div>

    <div class="table_head" id="table">
      <div class="col w10 last">
      <h3 class="span8 textOverflowEllipsis">Account Details</h3>
    <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                 
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Add Date &nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Description &nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Added By&nbsp;&nbsp;</a></th>
              </tr>
              <?php
    if(!empty($credit_account)) {
      $i = 1;
     foreach($credit_account as $Cus) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><?php echo $Cus['account_amount'];?></a></td>
                <td><?php if(($Cus['account_add_date']) != '0000-00-00' && $Cus['account_add_date'] != '' && $Cus['account_add_date'] != NULL) { ?>
                  <?php echo date('d-m-Y', strtotime($Cus['account_add_date'])); ?>
                <?php } else { ?>
                  -
         <?php } ?> </td>
         <td><?php echo $Cus['account_description'];?></a></td>
         <td><?php echo $Cus['user_name'];?></a></td>
        
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="4" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div>
        
      </div>
      <div class="clear"></div>
    </div>
  </div>


</section>
