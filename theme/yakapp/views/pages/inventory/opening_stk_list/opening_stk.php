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
	
//Auto complete Serach options 
  $("#search_stock_code").autocomplete({
    source: "<?php echo site_url('inventory_autocomplete/search_stock_code'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_stock_code",
  });	
	

  });


</script>

<?php echo $this->load->view('pages/inventory_left_side'); 
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment('2');
 $search_opening_stock  = $this->session->userdata('opening_stock_data');
   //echo "<PRE>";print_r($search_opening_stock);
 $f_date=$search_opening_stock['from_date'];
 $t_date=$search_opening_stock['to_date'];
?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     
	  <?php if(isset($openingstock->add_option)) { if($openingstock->add_option != '0') { ?> 
      <span class="btn-group">
		<button class="addButton" onclick='window.location.href="<?php echo site_url('inventory/addopeningstock'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Opening Stock</strong></button>
      </span><?php } } ?>
      
	   <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('inventory/search_opening_stock'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search">
        
      	  	<input type="text" 	value="<?php if(isset($search_opening_stock['search_stock_code'])){ echo $search_opening_stock['search_stock_code']; }else{}?>" name="search_stock_code" class="input-large search-l" id="search_stock_code" placeholder="Stock Code">
             <span id="auto_complete_stock_code"></span>
         
            <input type="text" 	value="<?php if($f_date != "1970-01-01"){ echo $search_opening_stock['from_date']; }else{}?>" name="from_date" class="input-large search-l" id="from_date" placeholder="From Date">
            <input type="text" 	value="<?php if($t_date != "1970-01-01"){ echo $search_opening_stock['to_date']; }else{}?>" name="to_date" class="input-large search-l" id="to_date" placeholder="To Date">
            
            <select class="chzn-select"  name="search_loc" id="search_loc">
            <option value="">Select Locations</option>
             <?php foreach($loc_list as $LOC) {?> 
              <option value="<?php echo $LOC['location_id']; ?>"  <?php if($search_opening_stock['search_loc'] == $LOC['location_id']) { ?> selected="selected" <?php } ?> ><?php echo $LOC['location_name']; ?></option>
         	 <?php } ?>
            </select>
            
            <select class="chzn-select"  name="search_status" id="search_status">
                <option value="">Select Status</option>
                <option value="draft" <?php if($search_opening_stock['search_status'] =="draft") { ?> selected="selected" <?php } ?>>Draft</option>
                <option value="onprocess" <?php if($search_opening_stock['search_status'] =="onprocess") { ?> selected="selected" <?php } ?> >Onprocess</option>
                <option value="completed" <?php if($search_opening_stock['search_status'] =="completed") { ?> selected="selected" <?php } ?>>Completed</option>
                <option value="approved" <?php if($search_opening_stock['search_status'] =="approved") { ?> selected="selected" <?php } ?>>Approved</option>
                <option value="returned" <?php if($search_opening_stock['search_status'] =="returned") { ?> selected="selected" <?php } ?>>Returned</option>
              	</select>
                
           <!-- <input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />-->
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
           <!--     <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="<?php echo site_url('inventory/'.$uri2);?>/opening_stock_code/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Opening Stock code&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('inventory/'.$uri2);?>/opening_stock_added_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Added date&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('inventory/'.$uri2);?>/location_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Added Location&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('inventory/'.$uri2);?>/user_first_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Approved By&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('inventory/'.$uri2);?>/opening_stock_status/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Status&nbsp;&nbsp;</a></th>
                <th nowrap>Actions&nbsp;&nbsp;</th>
                
              </tr>
              <?php
		if(!empty($op_stk_list)) {
			$i = 1;
		 foreach($op_stk_list as $OSTK) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
               
                <td><a href="<?php echo site_url('inventory/view_opening_stk/'); ?>/<?php echo $OSTK['opening_stock_id']; ?>"><?php echo $OSTK['opening_stock_code'];?></a></td>
				<td><?php if($OSTK['opening_stock_added_date'] != '0000-00-00' && $OSTK['opening_stock_added_date'] != '' && $OSTK['opening_stock_added_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($OSTK['opening_stock_added_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
				<td><a href="<?php echo site_url('inventory/view_opening_stk/'); ?>/<?php echo $OSTK['opening_stock_id']; ?>"><?php echo ucfirst($OSTK['location_name']);?></a></td>
				<td><a href="<?php echo site_url('inventory/view_opening_stk/'); ?>/<?php echo $OSTK['opening_stock_id']; ?>"><?php echo $OSTK['user_first_name'];?></a></td>
                <td><?php echo ucfirst($OSTK['opening_stock_status']);?></td>
				<td><a href="<?php echo site_url('inventory/view_opening_stk/'); ?>/<?php echo $OSTK['opening_stock_id']; ?>"><span class="icon-edit" title="View"></span></a></td>
                               
                               
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
        <center> <?php echo $page_links; ?> </center>    
                
          </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
