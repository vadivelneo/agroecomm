<script>

function deletepay_recep(id,status)
{
	sure = confirm('Are you sure?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('accounts/delete_pay_recp/'); ?>/'+id+'/'+status;
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
	document.getElementById("ErrorMsg").innerHTML="Sorry!!! The Receipt can't be edited after Approval";
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
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});
	$( "#to_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});
	
   $("#search_pay_rcpt_no").autocomplete({
    source: "<?php echo site_url('accounts_autocomplete/get_pay_rcpt_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_pay_rcpt_no",
  });
  
	$("#search_ven_name").autocomplete({
    source: "<?php echo site_url('accounts_autocomplete/get_ven_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_ven_name",
  });
	
 
  });


</script>
<?php echo $this->load->view('pages/accounts_left_side');
 $page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment(2);
$search_PAY  = $this->session->userdata('pay_rec_data');
  // echo "<PRE>";print_r($dc_data);
 $f_date=$search_PAY['from_date'];
 $t_date=$search_PAY['to_date'];
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
      <?php if(isset($paymentreceipt->add_option)) { if($paymentreceipt->add_option != '0') { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('accounts/add_payment_recp'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Payment Receipt</strong></button>
      </span>
      <?php } } ?>
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('accounts/search_payment_recp_list'); ?>" enctype="multipart/form-data">
        <div tabindex="3" class="wrapper_search" id="wrapper_search">
        
          <input type="text" value="<?php if(isset($search_PAY['search_pay_rcpt_no'])){ echo $search_PAY['search_pay_rcpt_no']; }else{}?>" name="search_pay_rcpt_no" class="input-large search-l" id="search_pay_rcpt_no" placeholder="Recipt No">
          <span id="auto_complete_pay_rcpt_no"></span>
          
          <input type="text" value="<?php if(isset($search_PAY['search_ven_name'])){ echo $search_PAY['search_ven_name']; }else{}?>" name="search_ven_name" class="input-large search-l" id="search_ven_name" placeholder="Vendor Name  ">
          <span id="auto_complete_ven_name"></span>
          
          <input type="text" value="<?php if($f_date != "1970-01-01"){ echo $search_PAY['from_date']; }else{}?>" name="from_date" class="input-large search-l" id="from_date" placeholder="From Date">
          
          <input type="text" value="<?php if($t_date != "1970-01-01"){ echo $search_PAY['to_date']; }else{}?>" name="to_date" class="input-large search-l" id="to_date" placeholder="To Date">
          
          <select class="chzn-select"  name="search_status" id="search_status">
            <option value="">Select Status</option>
            <option value="draft" <?php if($search_PAY['search_status'] =="draft") { ?> selected="selected" <?php } ?>>Draft</option>
            <option value="onprocess" <?php if($search_PAY['search_status'] =="onprocess") { ?> selected="selected" <?php } ?>>Onprocess</option>
            <option value="approved" <?php if($search_PAY['search_status'] =="approved") { ?> selected="selected" <?php } ?>>Approved</option>
            <option value="delivered" <?php if($search_PAY['search_status'] =="delivered") { ?> selected="selected" <?php } ?>>Delivered</option>
            <option value="canceled" <?php if($search_PAY['search_status'] =="canceled") { ?> selected="selected" <?php } ?>>Canceled</option>
          </select>
               <!--<input type="reset" name="Reset" id="rest" class="btn btn-primary" style="width:80px;" />-->

          <button id="search" name="search" type="submit" class="btn-success">Search</button>
        </div>
      </form>
      <span class="span4 btn-toolbar">
      <div class="listViewActions pull-right"> </div>
      <div class="clearfix"> </div>
      <input type="hidden" value="" id="recordsCount">
      <input type="hidden" name="selectedIds" id="selectedIds">
      <input type="hidden" name="excludedIds" id="excludedIds">
      </span> </div>
    <div class="table_head" id="table">
      <div class="col w10 last">
        <div class="sessionMsg" id ="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr> 
                <th><a href="<?php echo site_url('accounts/'.$uri2);?>/payment_receipt_number/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Recipt No.&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('accounts/'.$uri2);?>/vendor_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Vendor Name&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('accounts/'.$uri2);?>/vendor_code/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Vendor Code&nbsp;&nbsp;</a></th>
                <th class="report_right_aligned"><a href="<?php echo site_url('accounts/'.$uri2);?>/payment_receipt_amount/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('accounts/'.$uri2);?>/payment_receipt_amount/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Receipt Date &nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('accounts/'.$uri2);?>/payment_mode_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Payment Mode &nbsp;&nbsp;</a></th>
				<th><a href="<?php echo site_url('accounts/'.$uri2);?>/payment_receipt_status/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Status&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
		if(!empty($pay_recp_list)) {
			$i = 1;
		 foreach($pay_recp_list as $RECP) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1"> 
                <td><a href="<?php echo site_url('accounts/view_pay_recp/'); ?>/<?php echo $RECP['payment_receipt_id']; ?>"><?php echo ucfirst($RECP['payment_receipt_number']);?></a></td>
                <td><a href="<?php echo site_url('accounts/view_pay_recp/'); ?>/<?php echo $RECP['payment_receipt_id']; ?>"><?php echo ucfirst($RECP['vendor_name']);?></a></td>
                <td><a href="<?php echo site_url('accounts/view_pay_recp/'); ?>/<?php echo $RECP['payment_receipt_id']; ?>"><?php echo ucfirst($RECP['vendor_code']);?></a></td>
                <td class="report_right_aligned"><?php echo $RECP['payment_receipt_amount'];?></td>
                <td><?php echo date('d-m-Y', strtotime($RECP['payment_receipt_date'])); ?></td>
                <td><?php echo $RECP['payment_mode_name'];?></td>
				
                <td><?php echo ucfirst($RECP['payment_receipt_status']);?></td>
                <td colspan="4"><?php if(isset($invoicereceipt->view_option)) { if($invoicereceipt->view_option != '0') { ?>
                  <li><a href="<?php echo site_url('accounts/print_payment_recp/'); ?>/<?php echo $RECP['payment_receipt_id']; ?>"><span class="icon-print"></span></a></li>
                  <?php } } ?>
                  <?php if(isset($paymentreceipt->view_option)) { if($paymentreceipt->view_option != '0') { ?>
				  <a href="<?php echo site_url('accounts/view_pay_recp/'); ?>/<?php echo $RECP['payment_receipt_id']; ?>"><span class="icon-edit"></span></a>
                  <?php } } ?>
                  <?php if(isset($paymentreceipt->edit_option)) { if($paymentreceipt->edit_option != '0') { ?>
				  <?php if($RECP['payment_receipt_status'] != "approved"){?>
                  <a href="<?php echo site_url('accounts/edit_pay_recp/'); ?>/<?php echo $RECP['payment_receipt_id']; ?>"><span class="icon-pencil"></span></a>
				  <?php } else { ?>
                  <li> <a href="javascript:void(0);" onclick="edit_block();">  <span class="icon-pencil"></span></a></li>
                  <?php } } } ?>
                  <?php if(isset($paymentreceipt->delete_option)) { if($paymentreceipt->delete_option != '0') { ?>
                  <a class="javascript:void(0);" onclick="return deletepay_recep(<?php echo $RECP['payment_receipt_id'];?>,'<?php echo $RECP['payment_receipt_active_status']; ?>')"> <span class="icon-trash"></span> </a>
                  <?php } } ?></td>
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
          <center>
            <?php echo $page_links; ?>
          </center>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
