<script>

function deletelsaleinvioce(id,status)
{
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('salesinvoice/deleteinvoice/'); ?>/'+id+'/'+status;
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
     	var url = '<?php echo site_url('pdf_saleinvoice/sales_invoice/'); ?>/'+id;
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
	document.getElementById("ErrorMsg").innerHTML="Sorry!!! The Invoice is Delivered";
	
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
	
	$("#search_si_no").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_sale_SI_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_si_no",
  });
	
 $("#search_so_no").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_sale_order_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_sale_ord_no",
  });	
  
  
  $("#search_cus_name").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_cus_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_cus_name",
  });	
  
  
  $('#multiselect_invoice').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.multiselect_invoice').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.multiselect_invoice').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
	
	$('.multiselect_invoice').click(function(){	
            if($(".multiselect_invoice").length == $(".multiselect_invoice:checked").length) {
                $("#multiselect_invoice").prop("checked", true);
            }else {
                $("#multiselect_invoice").prop("checked", false);            
            }
    });
	
	$('#multiple_invoice_delivered').click(function ()
	{
		if ($(".multiselect_invoice:checked").length < 1)
		{
			var error_msg = "Please Select Atleast One Invoice"; 			
			$("#deliveredErrorMsg").hide().text(error_msg).fadeIn('slow').delay(5000).hide(1);
			return false;
		}
		else
		{
			$("#deliveredErrorMsg").html('&nbsp');
			
			var invoice_checked_id = [];
			$("input[name='multiselect_invoice[]']:checked").each(function ()
			{
				var check_box_val = this.value;
				
				var invoice = $("#multiselect_sales_invoice_id_"+check_box_val).val();
				var sales_order = $("#multiselect_sales_order_id_"+check_box_val).val();
				var customer_id = $("#multiselect_customer_id_"+check_box_val).val();
				var invoice_tds = $("#multiselect_sale_invoice_tds_id_"+check_box_val).val();
				var invoice_grand_total = $("#multiselect_sale_invoice_grand_total_id_"+check_box_val).val();
				
				invoice_checked_id.push(check_box_val);	
				
				$.ajax({
				  type: 'POST',
				  url: '<?php echo site_url('instant_salesinvoice/update_invoice_status'); ?>',
				  data: 'invoice_id='+invoice,
				  data: {invoice_id: invoice, sales_order_id: sales_order, customer_id: customer_id, tds: invoice_tds, grand_total: invoice_grand_total},
				  success: function(resp) {
					var error_msg = resp; 			
					$("#deliveredErrorMsg").hide().text(error_msg).fadeIn('slow').delay(5000).hide(1); 
				  }
			   });
			});
		}
			
	});

});


</script>

<?php echo $this->load->view('pages/sales_left_side'); 

$sessionuserData = $this->session->userdata('userlogin');

$company_id=$sessionuserData['company_id'];

$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment(2);
$search_SI  = $this->session->userdata('sales_invoice_data');
$f_date=$search_SI['from_date'];
$t_date=$search_SI['to_date'];
?>
	
<section>

<div class="rightPanel">
	<div class="row-fluid">
  		<?php if(isset($salesinvoice->add_option)) { if($salesinvoice->add_option != '0') { ?>
  		<span class="btn-group">
  			<button class="addButton" onclick='window.location.href="<?php echo site_url('instant_salesinvoice/add_instant_salesinvoice'); ?>"'>
    			<i class="icon-plus" ></i>&nbsp;<strong>Add Sales Invoice</strong>
            </button>
  		</span>
  		<?php } } ?>
  <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('instant_salesinvoice/search_salesinvoice'); ?>" enctype="multipart/form-data">
    <div tabindex="3" class="wrapper_search" id="wrapper_search">
      <input type="text" 	value="<?php if(isset($search_SI['search_si_no'])){ echo $search_SI['search_si_no']; }else{}?>" name="search_si_no" class="input-large search-l" id="search_si_no" placeholder="Sales Invoice No">
       <span id="auto_complete_si_no"></span>
	   
            <input type="text" 	value="<?php if(isset($search_SI['search_cus_name'])){ echo $search_SI['search_cus_name']; }else{}?>" name="search_cus_name" class="input-large search-l" id="search_cus_name" placeholder="Customer Name">
             <span id="auto_complete_cus_name"></span>
           
            <select class="status"  name="status" id="search_status">
                <option value="">Select Status</option>
                <option value="draft" <?php /*?><?php if($search_SI['status'] =="draft") { ?> selected="selected" <?php } ?><?php */?>>Draft</option>
                <option value="delivered" <?php /*?><?php if($search_SI['status'] =="delivered") { ?> selected="selected" <?php } ?><?php */?>>delivered</option>
                <option value="returned" <?php /*?><?php if($search_SI['status'] =="returned") { ?> selected="selected" <?php } ?><?php */?>>Returned</option>
            </select>
			<button id="search" name="search" type="submit" class="btn-success">Search</button>
    </div>
  </form>
</div>
<div class="table_head" id="table">
  <div class="col w10 last">
    <div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
	<div style="padding: 10px;">
	<div class="sessionMsg" style="float: left;">
		&nbsp;<div id="deliveredErrorMsg" style="float: left;"> &nbsp;</div>
	</div>
	<div style="float: right;"><button id="multiple_invoice_delivered" name="delivered" type="submit" class="btn-success">Delivered</button></div>
	</div>
    <div class="content">
      <table>
        <tbody>
          <tr> 
			<!--<th width="20px"><input type="checkbox" class="multiselect_invoice" id="multiselect_invoice" value=""></th>-->
            <th width="120px"><a href="<?php echo site_url('instant_salesinvoice/'.$uri2);?>/sale_invoice_company_invoice_no/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Sales Invoice No&nbsp;&nbsp;</a></th>
            <th width="120px"><a href="<?php echo site_url('instant_salesinvoice/'.$uri2);?>/sale_invoice_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">SI Date&nbsp;&nbsp;</a></th>
             
            <th width="150px"><a href="<?php echo site_url('instant_salesinvoice/'.$uri2);?>/customer_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
          
           
            
            <th width="140px" class="report_right_aligned"><a href="<?php echo site_url('salesinvoice/'.$uri2);?>/sale_invoice_grand_total/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
            <th width="100px"><a href="<?php echo site_url('instant_salesinvoice/'.$uri2);?>/sale_invoice_status/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Status &nbsp;&nbsp;</a></th>
            <th width="120px">Actions</th>
          </tr>
           
        <?php
		
		if(!empty($invoice_list)) {
		$i = 1;
		 foreach($invoice_list as $INV) { ?>
          <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1"> 
        
            <td><a href="<?php echo site_url('instant_salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><?php echo $INV['sale_invoice_no'];?></a>
			
			
			
			
			</td>
            <td><a href="<?php echo site_url('instant_salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><?php echo date("d-m-Y", strtotime( $INV['sale_invoice_date']));?></a></td>
            <td><a href="<?php echo site_url('instant_salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>"><?php echo $INV['customer_name'];?></a></td>
            
            
            <td class="report_right_aligned"><?php echo $INV['sale_invoice_amount'];?></td>
            <td><?php echo ucfirst($INV['sale_invoice_status']);?></td>
            
            <td>
             <li><a target="_blank" href="<?php echo site_url('instant_salesinvoice/print_salesinvoices/'); ?>/<?php echo $INV['sale_invoice_id']; ?>" title="Dot Matrix Print"><span class="icon-print"></span></a></li>
            
              <?php if(isset($salesinvoice->view_option)) { if($salesinvoice->view_option != '0') { ?>
              <li><a href="<?php echo site_url('instant_salesinvoice/view_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>" title="View"><span class="icon-edit"></span></a></li>
              <?php } } ?>
              <?php if(isset($salesinvoice->edit_option)) { if($salesinvoice->edit_option != '0') { ?>
			  <?php if($INV['sale_invoice_status'] != "delivered"){ ?>
              <li> <a href="<?php echo site_url('instant_salesinvoice/edit_salesinvoice/'); ?>/<?php echo $INV['sale_invoice_id']; ?>" title="Edit"> <span class="icon-pencil"></span></a></li>
			  <?php } else { ?>
              <li><a href="javascript:void(0);" onclick="edit_block();" title="Edit">  <span class="icon-pencil"></span></a></li>
              <?php } } } ?>
              <?php if(isset($salesinvoice->delete_option)) { if($salesinvoice->delete_option != '0') { ?>
             
               <?php if($INV['sale_invoice_status'] != "delivered"){ ?>
              <li><a class="javascript:void(0);" onclick="return deletelsaleinvioce(<?php echo $INV['sale_invoice_id'] ;?>,'<?php echo $INV['sale_invoice_active_status']; ?>')" title="Delete"> <span class="icon-trash"></span></a></li>
			  <?php } else { ?>
              <li><a href="javascript:void(0);" onclick="edit_block();" title="Edit">  <span class="icon-trash"></span></a></li>
              <?php } } } ?></td>
          </tr>
          <?php $i++;} } else{?>
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
    <div class="clear"></div>
  </div>
</div>
</section>
