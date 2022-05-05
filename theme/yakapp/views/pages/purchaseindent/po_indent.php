<script>

function deletepurchaseindent(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('purchaseindent/deletepurchaseindent/'); ?>/'+id+'/'+status;
    window.location.href = url;
    }
  else 
  {
      return false;
    }
}


function edit_block()
{
	$('.flashmessage').html("");
	document.getElementById("ErrorMsg").innerHTML="Sorry!!! The Indent can't be edited at this Stage";
	
	return false ;
}

function delete_block()
{
	$('.flashmessage').html("");
	document.getElementById("ErrorMsg").innerHTML="Sorry!!! The Indent can't be deleted at this Stage";
	
	return false ;
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


//Auto complete Serach options 
  $("#search_ind_no").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_ind_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_ind_no",
  });
  
  $("#search_po_no").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_pur_order'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_po_no",
  });

  $("#search_store_name").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_store_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_po_no",
  });
  
  
  $( "#from_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});
	$( "#to_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});
 

});

  
</script>



<?php 
//echo "<PRE>";print_r($po_indent);exit;
 echo $this->load->view('pages/purchase_left_side'); 
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment('2');

$search_po_ind  = $this->session->userdata('po_indent_data');
//echo "<PRE>";print_r($search_po_ind);
 $f_date=$search_po_ind['from_date'];
 $t_date=$search_po_ind['to_date'];


?>
<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
    <!--  <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
          <li class="divider"> </li>
          <li><a href="#"><i class=""></i>Import</a></li>
          <li><a href="#"><i class=""></i>Export</a></li>
          <li><a href="#"><i class=""></i>Find Duplicates</a></li>
        </ul>
      </div>-->
	  <?php if(isset($purchaseindent->add_option)) { if($purchaseindent->add_option != '0') { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('purchaseindent/add_po_indent'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add GRN</strong></button>
      </span><?php } } ?>
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('purchaseindent/search_po_indent'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
       
      	  	<input type="text" 	value="<?php if(isset($search_po_ind['search_ind_no'])){ echo $search_po_ind['search_ind_no']; }else{}?>" name="search_ind_no" class="input-large search-l" id="search_ind_no" placeholder="GRN Number">
              <span id="auto_complete_ind_no"></span>
              
              <input type="text" 	value="<?php if(isset($search_po_ind['search_po_no'])){ echo $search_po_ind['search_po_no']; }else{}?>" name="search_po_no" class="input-large search-l" id="search_po_no" placeholder="PO number">
              <span id="auto_complete_po_no"></span>
              
			  
			 
        
         		<select class="chzn-select"  name="search_status" id="search_status" style="width:130px">
                <option value="">Select Status</option>
                <option value="created" <?php if($search_po_ind['search_status'] =="created") { ?> selected="selected" <?php } ?>>Created</option>
				<option value="approved" <?php if($search_po_ind['search_status'] =="approved") { ?> selected="selected" <?php } ?>>Approved</option>
				<option value="cancelled" <?php if($search_po_ind['search_status'] =="cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
              	</select>
                
            <!--  <input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />-->
			<button id="search" name="search" type="submit" class="btn-success">Search</button>
 		 
      </div> 
      </form>
    
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
		<div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                <!--<th class="checkbox"><input type="checkbox" id="multipleItemselecctall" name="checkbox"></th>-->
                <th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/po_indent_number/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues"> GRN Number&nbsp;&nbsp;</a></th>
                 <th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/po_indent_add_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">GRN Date  &nbsp;&nbsp;</a></th>
                   <th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/po_reference_number/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">PO No  &nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/vendor_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Vendor&nbsp;&nbsp;</a></th>
				<th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/po_indent_approved_by/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Approved By&nbsp;&nbsp;</a></th> 
				<th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/location_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Location&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('purchaseindent/'.$uri2);?>/po_indent_active_status/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Status&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php //echo "<PRE>";print_r($po_indent);
		     if(!empty($po_indent)) {
			   $i = 1;
		     foreach($po_indent as $PO_IND) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <!--<td class="checkbox"><input type="checkbox"  class="itemcheckbox" name="checkbox"></td>-->
                <td><a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><?php echo $PO_IND['po_indent_number'];?></a></td>
				<td><?php if(($PO_IND['po_indent_date']) != '0000-00-00' && $PO_IND['po_indent_date'] != '' && $PO_IND['po_indent_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PO_IND['po_indent_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
				
                <td><a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><?php echo ucfirst($PO_IND['po_reference_number']);?></a></td>
				<td><a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><?php echo ucfirst($PO_IND['vendor_name']);?></a></td>
				<td><a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><?php echo ucfirst($PO_IND['user_name']);?></a></td>
				<td><a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><?php echo ucfirst($PO_IND['location_name']);?></a></td>
				<td><a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><?php echo ucfirst($PO_IND['po_indent_active_status']);?></a></td>
				 
				<td>
				
				<li> 
				<?php if(isset($purchaseindent->view_option)) { if($purchaseindent->view_option != '0') { ?>
				<a href="<?php echo site_url('purchaseindent/print_po_indent');?>/<?php echo $PO_IND['po_indent_id'];  ?>" target="_blank"><span class="icon-print"></span></a><?php } } ?>
				</li>
                <?php if(isset($purchaseindent->view_option)) { if($purchaseindent->view_option != '0') { ?>
                   <a href="<?php echo site_url('purchaseindent/view_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><span class="icon-edit"></span></a>
					<?php }} ?>
					<?php if(isset($purchaseindent->edit_option)) { if($purchaseindent->edit_option != '0') { ?>
					 <?php if($PO_IND['po_indent_active_status'] != "closed" && $PO_IND['po_indent_active_status'] != "awaiting approval" && $PO_IND['po_indent_active_status'] != "approved"){?>
					  <a href="<?php echo site_url('purchaseindent/edit_po_indent/'); ?>/<?php echo $PO_IND['po_indent_id']; ?>"><span class="icon-pencil"></span></a>
					 <?php }else {?>
                 <a href="javascript:void(0)" onclick="edit_block();"><span class="icon-pencil"></span></a>
                 <?php } } } ?>
                 
				 <?php if(isset($purchaseindent->delete_option)) { if($purchaseindent->delete_option != '0') { ?>
                  <?php if($PO_IND['po_indent_active_status'] != "approved"){?>
					 <a class="javascript:void(0);" onclick="return deletepurchaseindent(<?php echo $PO_IND['po_indent_id'] ;?>,'<?php echo $PO_IND['po_indent_status']; ?>')"> <span class="icon-trash"></span></a>
					 <?php }else {?>
                 <a href="javascript:void(0)" onclick="delete_block();"><span class="icon-trash"></span></a>
                 <?php } } } ?>
                    </a>
                    
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="8" style="text-align:center;"> No Records Found </td>
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
