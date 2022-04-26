<script>

function pro_group_status(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/pro_group_status/'); ?>/'+id+'/'+status;
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

 $("#search_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_product_group_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_group_name",
  });

  });


</script>


<?php echo $this->load->view('pages/master_left_side');
	$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

	$deliveryStatus = $this->uri->segment(3,"pending");

	if($sort_by == "asc") $order = "desc"; else $order = "asc";
 ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     <!-- <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
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
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/addproductgroup'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Product Group</strong></button>
      </span>
      
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('masters/search_productgroup'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
      	  	<input type="text" 	value="" name="search_name" class="input-large" id="search_name" placeholder="Product Group Name">
			<span id="auto_complete_group_name"></span>
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
                <!--<th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="<?php echo site_url('masters/productgroup/');?>/products_group_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Product Group Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Description&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/productgroup/');?>/products_group_add_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Created Date&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/productgroup/');?>/products_group_update_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Updated Date&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
    if(!empty($pro_group)) {
      $i = 1;
     foreach($pro_group as $PROGUP) { ?>
              <tr>
                <!--<td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/viewproductgroup/'); ?>/<?php echo $PROGUP['products_group_id']; ?>"><?php echo $PROGUP['products_group_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewproductgroup/'); ?>/<?php echo $PROGUP['products_group_id']; ?>"><?php echo $PROGUP['products_group_description'];?></a></td>
                <td><?php if($PROGUP['products_group_add_date'] != '0000-00-00' && $PROGUP['products_group_add_date'] != '' && $PROGUP['products_group_add_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PROGUP['products_group_add_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                <td><?php if($PROGUP['products_group_update_date'] != '0000-00-00' && $PROGUP['products_group_update_date'] != '' && $PROGUP['products_group_update_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PROGUP['products_group_update_date'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/viewproductgroup/'); ?>/<?php echo $PROGUP['products_group_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/editproductgroup/'); ?>/<?php echo $PROGUP['products_group_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li><a class="javascript:void(0);" onclick="return pro_group_status(<?php echo $PROGUP['products_group_id'] ;?>,'<?php echo $PROGUP['products_group_status']; ?>')"><span class="icon-trash"></span></a></li>
                  </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>
                 
                 </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
