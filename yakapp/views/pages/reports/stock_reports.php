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
	
   $( "#report_to" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
	   dateFormat:'dd-mm-yy',
    }); 
   
});
 
</script>
 


<?php echo $this->load->view('pages/report_left_side'); 

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
      <span class="btn-group">
  <!--   <button class="addButton" onclick='window.location.href="<?php echo site_url('salesorder/addsalesorder'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Stock</strong></button>
      </span>-->
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
   <div class="p-popup">
   		
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/stock_search'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
      	  <p class="report_p"> From date : </p>	
           <input type="text" value="" name="report_from" class="input-large report_from" id="report_from" required="required">
          <p class="report_p"> To date : </p>
           <input type="text" 	value="" name="report_to" class="input-large report_to" id="report_to" required="required" >
          <button id="generate" name="generate" type="submit" class="btn-success" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> 
	 
	   <?php
		if(!empty($stock_list)) {?>
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/export_stock_report'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="from_date" id="from_date" value="<?php echo $report_from;?>"  />
        <input type="hidden" name="to_date" id="to_date" value="<?php echo $report_to;?>"  />
              <button style="float:right; margin-right:3%;" class="btn-success"><strong>Export PDF</strong></button>
               
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
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Mfg Part No&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Group&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Type&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">UOM&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Quantity of stock&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Opening stock&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Added Date&nbsp;&nbsp;</a></th>
         
              
              </tr>
              <?php
		if(!empty($stock_list)) {
			$i = 1;
		 foreach($stock_list as $INV) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
              
                <td><?php echo $INV['product_code'];?></td>
                <td><?php echo $INV['product_name'];?></td>
                <td><?php echo $INV['product_mfr_part_number'];?></td>
                <td><?php echo $INV['products_group_name'];?></td>
                <td><?php echo $INV['products_type_name'];?></td>
                 <td><?php echo $INV['uom_name'];?></td>
                <td><?php echo  $INV['inventory_qty'] ;?></td>
                <td><?php echo  $INV['opt_stk_items_qty'] ;?></td>
                <td><?php echo date("d-m-Y", strtotime($INV['inventory_add_date']));?></td>
				
                
               
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="11" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
              
              
                
            </tbody>
          </table>
          
        </div>
        <div class="dataTables_paginate paging_bootstrap">
                
          </div>
           <?php
		if(!empty($stock_list)) {?>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
          <?php }?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
