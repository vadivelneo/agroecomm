<script>

function deletepo(id,status)
{
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('purchaseorder/deletepurchaseorder/'); ?>/'+id+'/'+status;
	 	window.location.href = url;
    }
	else 
	{
    	return false;
    }
}

function send_email(id)
{
	sure = confirm('Are you sure want to Send Email');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('purchaseorder/pdf/'); ?>/'+id;
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
	document.getElementById("ErrorMsg").innerHTML="Sorry!!! The Purchase Order can't be edited at this Stage";
	
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

	$( "#from_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		//maxDate: 0,
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});
	$( "#to_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		//maxDate : 0,
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});


//Auto complete Serach options 
  $("#search_po_order").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_pur_order'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_po_order",
  });
  
   $("#search_ven_name").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_vend_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_ven_name",
  });
  
  $("#search_div_name").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_div_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_div_name",
  });
  
  $("#search_str_name").autocomplete({
    source: "<?php echo site_url('purchase_autocomplete/search_str_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_str_name",
  });
  
 });


</script>

<?php echo $this->load->view('pages/purchase_left_side'); 
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment('2');
$search_po  = $this->session->userdata('purchase_order_data');
$f_date=$search_po['from_date'];
$t_date=$search_po['to_date'];
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
	  <?php if(isset($purchaseorder->add_option)) { if($purchaseorder->add_option != '0') { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('purchaseorder/addpurchaseorder'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Purchaseorder</strong></button>
      </span><?php } } ?>
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('purchaseorder/search_po'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
       
      	  	<input type="text" 	value="<?php if(isset($search_po['search_po_order'])){ echo $search_po['search_po_order']; }else{}?>" name="search_po_order" class="input-large search-l" id="search_po_order" placeholder="PO No">
             <span id="auto_complete_po_order"></span>
             
            <input type="text" 	value="<?php if(isset($search_po['search_ven_name'])){ echo $search_po['search_ven_name']; }else{}?>" name="search_ven_name" class="input-large search-l" id="search_ven_name" placeholder="Vendor Name">
             <span id="auto_complete_ven_name"></span>
             
           
           
           
             <select class="chzn-select"  name="search_status" id="search_status">
                <option value="">Select Status</option>
                <option value="draft" <?php if($search_po['search_status'] =="draft") { ?> selected="selected" <?php } ?> >Draft</option>
                <option value="approved" <?php if($search_po['search_status'] =="approved") { ?> selected="selected" <?php } ?> >Approved</option>
                <option value="canceled" <?php if($search_po['search_status'] =="canceled") { ?> selected="selected" <?php } ?> >Canceled</option>
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
                <th><a href="<?php echo site_url('purchaseorder/'.$uri2);?>/po_po_no/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">PO No&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('purchaseorder/'.$uri2);?>/vendor_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Vendor Name&nbsp;&nbsp;</a></th>
				<th class="report_right_aligned"><a href="<?php echo site_url('purchaseorder/'.$uri2);?>/po_grand_total/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('purchaseorder/'.$uri2);?>/po_req_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Created Date&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('purchaseorder/'.$uri2);?>/po_valid_til/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Deliverable Date &nbsp;&nbsp;</a></th>
				<th><a href="<?php echo site_url('purchaseorder/'.$uri2);?>/po_po_status/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Status  &nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
		if(!empty($po_list)) {
			$i = 1;
		 foreach($po_list as $PO) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <!--<td class="checkbox"><input type="checkbox" class="itemcheckbox" name="checkbox"></td>-->
                <td><a href="<?php echo site_url('purchaseorder/viewpurchaseorder'); ?>/<?php echo $PO['po_po_id']; ?>"><?php echo $PO['po_po_no'];?></a></td>
                <td><a href="<?php echo site_url('purchaseorder/viewpurchaseorder'); ?>/<?php echo $PO['po_po_id']; ?>"><?php echo ucfirst($PO['vendor_name']);?></a></td>
                <td class="report_right_aligned"><a href="<?php echo site_url('purchaseorder/viewpurchaseorder'); ?>/<?php echo $PO['po_po_id']; ?>"><?php echo $PO['po_grand_total'];?></a></td>
				<td><?php if(($PO['po_add_date']) != '0000-00-00' && $PO['po_add_date'] != '' && $PO['po_add_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PO['po_add_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
				<td><?php if(($PO['po_delivery_date']) != '0000-00-00' && $PO['po_delivery_date'] != '' && $PO['po_delivery_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PO['po_delivery_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
				
                <td><?php echo ucfirst($PO['po_po_status']);?></td>
				<td>
                	
                    	
                  <a href="<?php echo site_url('purchaseorder/print_purchaseorder/'); ?>/<?php echo $PO['po_po_id']; ?>"  title="Print" target="_blank"><span class="icon-print"></span></a>

					<?php if(isset($purchaseorder->view_option)) { if($purchaseorder->view_option != '0') { ?>
                    <a href="<?php echo site_url('purchaseorder/viewpurchaseorder'); ?>/<?php echo $PO['po_po_id']; ?>" title="View"><span class="icon-edit" ></span></a><?php } } ?>
					<?php if(isset($purchaseorder->edit_option)) { if($purchaseorder->edit_option != '0') { ?>
				    <?php if($PO['po_po_status'] != "delivered" && $PO['po_po_status'] != "closed" && $PO['po_po_status'] != "onprocess" && $PO['po_po_status'] != "awaiting approval" && $PO['po_po_status'] != "cancelled" && $PO['po_po_status'] != "approved"){?>
					
					<a href="<?php echo site_url('purchaseorder/editpurchaseorder_details'); ?>/<?php echo $PO['po_po_id'];?>" >  <span class="icon-pencil"></span></a>
                 <?php }else {?>
                 <a href="javascript:void(0)" onclick="edit_block();" title="Edit"><span class="icon-pencil"></span></a>
                 <?php } ?>
                   <?php } }?>
					
                <?php if(isset($purchaseorder->delete_option)) { if($purchaseorder->delete_option != '0') { ?>
				<a class="javascript:void(0);" onclick="return deletepo(<?php echo $PO['po_po_id'];?>,'<?php echo $PO['po_status']; ?>')" title="Delete"> <span class="icon-trash"></span></a><?php } } ?>
					
                   
                    
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="7" style="text-align:center;"> No Records Found </td>
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
