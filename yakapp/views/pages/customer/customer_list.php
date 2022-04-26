<script>

function deleteleads(id,status)
{
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('customer/deletecustomer/'); ?>/'+id+'/'+status;
	 	window.location.href = url;
    }
	else 
	{
    	return false;
    }
}

$(document).ready(function () {

$('#multipleItemselecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });

  $("#search_feild_1").autocomplete({
      source: "<?php echo site_url('autocomplete/get_customer_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_feild_1",
  });
  
 // smart search for vendor name
  $("#search_feild_2").autocomplete({
    source: "<?php echo site_url('autocomplete/get_customer_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_feild_2",
  });
  
   // smart search for vendor maobile
   $("#search_feild_3").autocomplete({
    source: "<?php echo site_url('autocomplete/get_customer_mobile'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_feild_3",
  });
  // smart search for vendor email
  $("#search_feild_4").autocomplete({
    source: "<?php echo site_url('autocomplete/get_customer_email'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_feild_4",
  }); 
  $("#search_feild_5").autocomplete({
    source: "<?php echo site_url('autocomplete/get_customer_category'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_feild_5",
  }); 
  
})

</script>


<?php echo $this->load->view('pages/master_left_side');
                  
		$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

		$deliveryStatus = $this->uri->segment(3,"pending");

		if($sort_by == "asc") $order = "desc"; else $order = "asc";


/* $search_session = $this->session->userdata('req_search');
echo"<PRE>";print_r($search_session);exit; */

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
	  <?php if(isset($customer->add_option)) { if($customer->add_option != '0') { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('customer/addcustomer'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Customer</strong></button>
      </span>
      <?php } }  ?>
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
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('customer/customer_search'); ?>" enctype="multipart/form-data"> 
     
	  <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
            
			<span id="auto_complete_feild_1"></span>
            <input type="text" 	value="" name="search_feild_2" autocomplete="off" class="input-large search-l" id="search_feild_2" placeholder="Customer Name">
			<span id="auto_complete_feild_2"></span>
            <input type="text" 	value="" name="search_feild_3" autocomplete="off" class="input-large search-l" id="search_feild_3" placeholder="Mobile">
			<span id="auto_complete_feild_3"></span>
           
			<span id="auto_complete_feild_4"></span>
			<input type="text" 	value="" name="search_feild_5" autocomplete="off" class="input-large search-l" id="search_feild_5" placeholder="Category">
			<span id="auto_complete_feild_5"></span>
			<button id="search" name="search" type="submit" class="btn-success">Search</button>
 		 
      </div> 
      </form>
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
<!--                 <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>
-->                <th nowrap><a href="<?php echo site_url('customer/customer_list/');?>/customer_code/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('customer/customer_list/');?>/customer_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('customer/customer_list/');?>/customer_category/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Category&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('customer/customer_list/');?>/customer_email/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Email &nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('customer/customer_list/');?>/customer_mobile/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Mobile  &nbsp;&nbsp;</a></th>
                
                <th>Actions</th>
              </tr>
              <?php
		if(!empty($customer_list)) {
			$i = 1;
		 foreach($customer_list as $Cus) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
<!--                <td class="checkbox"><input type="checkbox" class="itemcheckbox" name="checkbox"></td>
-->                <td><a href="<?php echo site_url('customer/viewcustomer/'); ?>/<?php echo $Cus['customer_id']; ?>"><?php echo $Cus['customer_code'];?></a></td>
                <td><a href="<?php echo site_url('customer/viewcustomer/'); ?>/<?php echo $Cus['customer_id']; ?>"><?php echo $Cus['customer_name'];?></a></td>
                <td><a href="<?php echo site_url('customer/viewcustomer/'); ?>/<?php echo $Cus['customer_id']; ?>"><?php echo $Cus['customer_category'];?></a></td>
                <td><?php echo $Cus['customer_email'];?></td>
                <td><?php echo $Cus['customer_mobile'];?></td>
                
				<td>
				<?php if(isset($customer->view_option)) { if($customer->view_option != '0') { ?>
               <a href="<?php echo site_url('customer/viewcustomer/'); ?>/<?php echo $Cus['customer_id']; ?>"><span class="icon-edit"></span></a><?php } } ?>
				 <?php if(isset($customer->edit_option)) { if($customer->edit_option != '0') { ?>
                 <li> <a href="<?php echo site_url('customer/editcustomer/'); ?>/<?php echo $Cus['customer_id']; ?>">  <span class="icon-pencil"></span></a></li> <?php } } ?>
				 <?php if(isset($customer->delete_option)) { if($customer->delete_option != '0') { ?>
                <li> <a class="javascript:void(0);" onclick="return deleteleads(<?php echo $Cus['customer_id'] ;?>,'<?php echo $Cus['customer_status']; ?>')"> <span class="icon-trash"></span></a></li> <?php } } ?>
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
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
