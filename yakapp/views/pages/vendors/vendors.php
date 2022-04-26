<?php                   
		$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

		$deliveryStatus = $this->uri->segment(3,"pending");

		if($sort_by == "asc") $order = "desc"; else $order = "asc";
		$uri2 = $this->uri->segment(2);
?> 

<script>

function deletesupplier(id,status)
{
	
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('vendor/vendorstatus/'); ?>/'+id+'/'+status;
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
	
	

  // smart search for multiple Supplier code in masters
  $("#search_ven_code").autocomplete({
      source: "<?php echo site_url('autocomplete/get_vendor_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_ven_code",
  });
  
 // smart search for vendor name
  $("#search_ven_name").autocomplete({
    source: "<?php echo site_url('autocomplete/get_vendor_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_ven_name",
  });
  
   // smart search for vendor maobile
   $("#search_ven_mob").autocomplete({
    source: "<?php echo site_url('autocomplete/get_vendor_mobile'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_ven_mob",
  });
  // smart search for vendor email
  $("#search_ven_email").autocomplete({
    source: "<?php echo site_url('autocomplete/get_vendor_email'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_ven_email",
  }); 
  
});


  


</script>
<?php echo $this->load->view('pages/master_left_side'); ?>

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
	  <?php if(isset($vendor->add_option)) { if($vendor->add_option != 0) { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('vendor/addvendor'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Supplier</strong></button>
      </span><?php } } ?>
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
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('vendor/search_vendor'); ?>" enctype="multipart/form-data"> 
  <!--  <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
            <input type="text"  value="" name="search_name" class="input-large" id="search_name" placeholder="Search">
      <button id="search11" name="search" type="submit" class="btn-success">Search</button>
     
      </div>-->
	   <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
            <input type="text" 	value="" name="search_ven_code" autocomplete="off" class="input-large search-l" id="search_ven_code" placeholder="Supplier Code">
			<span id="auto_complete_ven_code"></span>
            <input type="text" 	value="" name="search_ven_name" autocomplete="off" class="input-large search-l" id="search_ven_name" placeholder="Supplier Name">
			<span id="auto_complete_ven_mob"></span>
            <input type="text" 	value="" name="search_ven_mob" autocomplete="off" class="input-large search-l" id="search_ven_mob" placeholder="Mobile">
			<span id="auto_complete_ven_mob"></span>
            <input type="hidden" 	value="" name="search_ven_email" autocomplete="off" class="input-large search-l" id="search_ven_email" placeholder="Email">
			<span id="auto_complete_ven_email"></span>
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
               <!-- <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="<?php echo site_url('vendor/'.$uri2);?>/vendor_code/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Supplier Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('vendor/'.$uri2);?>/vendor_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Supplier Name&nbsp;&nbsp;</a></th>
				 <th nowrap><a href="<?php echo site_url('vendor/'.$uri2);?>/vendor_email/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Email &nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('vendor/'.$uri2);?>/vendor_email/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Gst No &nbsp;&nbsp;</a></th>
               
                <th>Actions</th>
              </tr>
              <?php
		if(!empty($vendor_list)) {
			$i = 1;
		 foreach($vendor_list as $Ven) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
               <!-- <td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td><a href="<?php echo site_url('vendor/viewvendor/'); ?>/<?php echo $Ven['vendor_id']; ?>"><?php echo ucfirst($Ven['vendor_code']);?></a></td>
                <td><a href="<?php echo site_url('vendor/viewvendor/'); ?>/<?php echo $Ven['vendor_id']; ?>"><?php echo ucfirst($Ven['vendor_name']);?></a></td>
                <td><?php echo $Ven['vendor_email'];?></td>
                <td><?php echo $Ven['vendor_gst_no'];?></td>
              
                 <?php /*?><td><?php echo $Ven['vendor_website'];?></td>
                <td><?php echo ucfirst($Ven['vendor_contact_person']);?></td><?php */?>
				<td>
					<?php if(isset($vendor->view_option)) { if($vendor->view_option != 0) { ?>
                    <a href="<?php echo site_url('vendor/viewvendor/'); ?>/<?php echo $Ven['vendor_id']; ?>"><span class="icon-edit"></span></a><?php } } ?>
					<?php if(isset($vendor->edit_option)) { if($vendor->edit_option != 0) { ?>
                    <a href="<?php echo site_url('vendor/editvendor/'); ?>/<?php echo $Ven['vendor_id']; ?>"><span class="icon-pencil"></span></a><?php } } ?>
					<?php if(isset($vendor->delete_option)) { if($vendor->delete_option != 0) { ?>
                     <a class="javascript:void(0);" onclick="return deletesupplier(<?php echo $Ven['vendor_id'] ;?>,'<?php echo $Ven['vendor_status']; ?>')"  title="Delete" >
                    <span class="icon-trash"></span>
                    </a><?php } } ?>
                    
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
