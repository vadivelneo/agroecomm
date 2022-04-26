<script>

function deleteso(id,status)
{
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('salesorder/deletesalesorder/'); ?>/'+id+'/'+status;
	 	window.location.href = url;
    }
	else 
	{
    	return false;
    }
}
function edit_block()
{
	alert("The Sales Orders is Delivered!!");
	return false;
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

  });


</script>


<?php echo $this->load->view('pages/inventory_left_side'); 
/*$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";*/
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
		<button class="addButton" onclick='window.location.href="<?php echo site_url('inventory/add_wastages'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Wastages</strong></button>
      </span>
	  
     <!--    <div tabindex="3" class="wrapper-dropdown-5" id="allprod"> <span> <img class="filterImage" src="<?php echo base_url(); ?>resources/images/filter.png"> All  </span>
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Product1</a></li>
          <li><a href="#"><i class=""></i>Product2</a></li>
          <li><a href="#"><i class=""></i>Product3</a></li>
          <li><a href="#"><i class=""></i>Product4</a></li>
        </ul>
      </div> 
      <span class="span4 btn-toolbar">-->
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
           <!--     <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Wastages code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Location&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Wastages Date&nbsp;&nbsp;</a></th>
				<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Status&nbsp;&nbsp;</a></th>
                
              </tr>
              <?php
		if(!empty($so_list)) {
			$i = 1;
		 foreach($so_list as $SO) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td class="checkbox"><input type="checkbox" class="itemcheckbox" name="checkbox"></td>
                <td><a href="#"><?php echo $SO['sales_order_number'];?></a></td>
                <td><a href="#"><?php echo  $SO['sales_order_customer_name'] ;?></a></td>
                <td><a href="#"><?php echo date("d-m-Y", strtotime($SO['sales_order_requested_date']));?></a></td>
				<td><a href="#"><?php echo $SO['so_grand_total'];?></a></td>
                <td><a href="#"><?php echo $SO['sales_order_status'];?></a></td>
                
               <!-- <td><?php echo $SO['region_name'];?></td>
                <td><?php echo $SO['zone_name'];?></td>
                <td><?php echo $SO['area_name'];?></td>-->
                
				<td>
				 <?php if($SO['sales_order_status'] != "delivered" && $SO['sales_order_status'] != "closed" ){?>
                 <li> <a href="<?php echo site_url('salesorder/edit_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>">  <span class="icon-pencil"></span></a></li>
                 <?php }else {?>
                 <a href="javascript:void(0)" onclick="edit_block();"><span class="icon-pencil"></span></a></li>
                 <?php }?>
                 
                  <li> <a class="javascript:void(0);" onclick="return deleteso(<?php echo $SO['sales_order_id'] ;?>,'<?php echo $SO['sales_order_active_status']; ?>')"> <span class="icon-trash"></span></a></li> 
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
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
