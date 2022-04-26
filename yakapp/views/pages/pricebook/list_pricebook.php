<script>

function deletepricebook(id,status)
{
	
	sure = confirm('Are you sure?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('pricebook/pricebookstatus/'); ?>/'+id+'/'+status;
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


  $("#search_price_book_name").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_price_book_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_price_book_name",
  });
  
 $("#search_price_book_code").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_price_book_code'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_price_book_code",
  });
  });

  

</script>

<?php echo $this->load->view('pages/price_left_side'); 
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";

?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
	<?php if(isset($pricebook->add_option)) { if($pricebook->add_option != '0') { ?>
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('pricebook/addpricebook'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Price Book</strong></button>
      </span><?php } } ?>
      <span class="span4 btn-toolbar">
          <div class="clearfix">
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span> 
   </div>
   
    <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('pricebook/search_pricebook'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
       
            <input type="text" 	value="<?php if(isset($search_price_book['search_price_book_name'])){ echo $search_price_book['search_price_book_name']; }else{}?>" name="search_price_book_name" class="input-large search-l" id="search_price_book_name" autocomplete="off" placeholder="Price Book Name">
            <span id="auto_complete_price_book_name"></span>
            
			 <input type="text" 	value="<?php if(isset($search_price_book['search_price_book_code'])){ echo $search_price_book['search_price_book_code']; }else{}?>" name="search_price_book_code" class="input-large search-l" id="search_price_book_code" placeholder="Price Book Code">
            <span id="auto_complete_price_book_code"></span>
			
          
           <button id="search" name="search" type="submit" class="btn-success">Search</button>
 		 </div> 
      </form>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
	   <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                <!--<th class="checkbox"><input type="checkbox" id="multipleItemselecctall" name="checkbox"></th>-->
                <th nowrap><a href="<?php echo site_url('pricebook/list_pricebook/');?>/price_book_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Price book Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('pricebook/list_pricebook/');?>/price_book_code/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Price book Code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('pricebook/list_pricebook/');?>/price_book_description/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Description&nbsp;&nbsp;</a></th>
				<th nowrap><a href="<?php echo site_url('pricebook/list_pricebook/');?>/price_book_add_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Created Date&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
			   <?php
			  
				if(!empty($pricebooks))
				{
				$i = 1;
		 		foreach($pricebooks as $PRCBOOK) { ?>
        
                <tr class="listViewEntries" data-id='36' id="Leads_listView_row_1">
                <!--<td class="checkbox"><input type="checkbox" class="itemcheckbox"   name="checkbox"></td>-->
                <td ><a href="<?php echo site_url('pricebook/viewpricebook/'); ?>/<?php echo $PRCBOOK['price_book_id']; ?>"><?php echo $PRCBOOK['price_book_name'];?></a></td>
                <td ><a href="<?php echo site_url('pricebook/viewpricebook/'); ?>/<?php echo $PRCBOOK['price_book_id']; ?>"><?php echo $PRCBOOK['price_book_code'];?></a></td>
                <td ><?php echo $PRCBOOK['price_book_description'];?></td>
                <td><?php echo date('d-m-Y', strtotime($PRCBOOK['price_book_add_date']));?></td>
                <td colspan="3"> 
					<?php if(isset($pricebook->view_option)) { if($pricebook->view_option != '0') { ?>
              		<li> <a href="<?php echo site_url('pricebook/viewpricebook/'); ?>/<?php echo $PRCBOOK['price_book_id']; ?>">
			   		<span class="icon-edit" ></span></a></li><?php } } ?>
					<?php if(isset($pricebook->edit_option)) { if($pricebook->edit_option != '0') { ?>
                  	<li><a href="<?php echo site_url('pricebook/updatepricebook/'); ?>/<?php echo $PRCBOOK['price_book_id']; ?>">
					<span class="icon-pencil"></span></a></li><?php } } ?>
					<?php if(isset($pricebook->delete_option)) { if($pricebook->delete_option != '0') { ?>
					<li><a class="javascript:void(0);" onclick="return deletepricebook(<?php echo $PRCBOOK['price_book_id']; ?>,'<?php echo $PRCBOOK['price_book_status']; ?>')"><span class="icon-trash"></span></a></li><?php } } ?>
					                 
                  </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="7" style="text-align:center;">No Records Found </td>
              </tr>
			  <?php }?>
            </tbody>
          </table>
        </div>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php  echo $page_links; ?> </center>
                 
                 </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
