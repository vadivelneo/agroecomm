<script>

function deletePAYep(id,status)
{
	
	sure = confirm('Are you sure?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('accounts/delete_inv_recp/'); ?>/'+id+'/'+status;
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

  });


</script>

<?php //echo "<pre>";print_r($inv_recp_list);exit;?>
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
	  <?php if(isset($invoicereceipt->add_option)) { if($invoicereceipt->add_option != '0') { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('accounts/add_Payment_adjustment'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Payment Adjustment</strong></button>
      </span><?php } } ?>
     <!--    <div tabindex="3" class="wrapper-dropdown-5" id="allprod"> <span> <img class="filterImage" src="<?php echo base_url(); ?>resources/images/filter.png"> All  </span>
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Product1</a></li>
          <li><a href="#"><i class=""></i>Product2</a></li>
          <li><a href="#"><i class=""></i>Product3</a></li>
          <li><a href="#"><i class=""></i>Product4</a></li>
        </ul>
      </div> -->
   <!--   <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('accounts/serach_Payment_adjustment'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
            <input type="text"  value="" name="search_name" class="input-large" id="search_name" placeholder="Search">
      <button id="search" name="search" type="submit" class="btn-success">Search</button>
     
      </div> 
      </form>-->
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">  
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
               <!-- <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Recipt No.&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Vendor/Customer Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Vendor/Customer Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Status &nbsp;&nbsp;</a></th>
              
                <th>Actions</th>
              </tr>
              <?php
		if(!empty($paymentmode)) {
			$i = 1;
		 foreach($paymentmode as $PAY) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <!--<td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td><a href="<?php echo site_url('accounts/view_pay_adj/'); ?>/<?php echo $PAY['payment_pay_adj_id']; ?>"><?php echo ucfirst($PAY['payment_pay_adj_receipt_id']);?></a></td>
                <td><a href="<?php echo site_url('accounts/view_pay_adj/'); ?>/<?php echo $PAY['payment_pay_adj_id']; ?>"><?php echo ucfirst($PAY['vendor_name']);?></a></td>
                <td><a href="<?php echo site_url('accounts/view_pay_adj/'); ?>/<?php echo $PAY['payment_pay_adj_id']; ?>"><?php echo $PAY['vendor_code'];?></a></td>
                <td><?php echo $PAY['invoice_receipt_amount'];?></td>
                <td><?php echo $PAY['payment_pay_adj_amount'];?></td>
                <td><?php echo $PAY['payment_pay_adj_status'];?></td>
				<td colspan="4">
                       
				<li> 
                <a href="<?php echo site_url('accounts/view_inv_recp/'); ?>/<?php echo $PAY['payment_pay_adj_id']; ?>"><span class="icon-edit"></span></a> 
				 </li> 
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
       <!-- <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>-->
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
