<script>

function pro_type_status(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/pro_type_status/'); ?>/'+id+'/'+status;
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
	
 $("#search_pro_typ").autocomplete({
      source: "<?php echo site_url('autocomplete/get_product_type'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_pro_typ",
  });
  
   $("#search_pro_prefix").autocomplete({
      source: "<?php echo site_url('autocomplete/get_product_prefix'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_pro_prefix",
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
      <!--<div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
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
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/addproducttype'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Product Type</strong></button>
      </span>
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('masters/search_producttype'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
      	  	<input type="text" 	value="" name="search_pro_typ" class="input-large search-l" id="search_pro_typ" placeholder="Product Type">
			<span id="auto_complete_pro_typ"></span>
            <input type="text" 	value="" name="search_pro_prefix" class="input-large search-l" id="search_pro_prefix" placeholder="Prefix">
			<span id="auto_complete_pro_prefix"></span>
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
                <th nowrap><a href="<?php echo site_url('masters/producttype/');?>/products_type_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Product Type Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/producttype/');?>/products_type_prefix/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Prefix&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/producttype/');?>/products_type_add_dt/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Created Date&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/producttype/');?>/products_type_update_dt/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Updated Date&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
    if(!empty($pro_type)) {
      $i = 1;
     foreach($pro_type as $PROTYP) { ?>
              <tr>
               <!-- <td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/viewproducttype/'); ?>/<?php echo $PROTYP['products_type_id']; ?>"><?php echo $PROTYP['products_type_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewproducttype/'); ?>/<?php echo $PROTYP['products_type_id']; ?>"><?php echo $PROTYP['products_type_prefix'];?></a></td>
                <td><?php if($PROTYP['products_type_add_dt'] != '0000-00-00' && $PROTYP['products_type_add_dt'] != '' && $PROTYP['products_type_add_dt'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PROTYP['products_type_add_dt'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                  <td><?php if($PROTYP['products_type_update_dt'] != '0000-00-00' && $PROTYP['products_type_update_dt'] != '' && $PROTYP['products_type_update_dt'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PROTYP['products_type_update_dt'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/viewproducttype/'); ?>/<?php echo $PROTYP['products_type_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/editproducttype/'); ?>/<?php echo $PROTYP['products_type_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li> <a class="javascript:void(0);" onclick="return pro_type_status(<?php echo $PROTYP['products_type_id'] ;?>,'<?php echo $PROTYP['products_type_status']; ?>')"> <span class="icon-trash"></span></a></li>
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
