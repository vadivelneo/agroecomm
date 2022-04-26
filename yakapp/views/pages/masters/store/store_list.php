<script>

function pro_type_status(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/storestatus/'); ?>/'+id+'/'+status;
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
	
   $("#search_store_code").autocomplete({
      source: "<?php echo site_url('purchase_autocomplete/search_str_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_store_code",
  });
  
   $("#search_store_name").autocomplete({
      source: "<?php echo site_url('purchase_autocomplete/search_str_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_store_name",
  });
  
   $("#search_pro_typ").autocomplete({
      source: "<?php echo site_url('autocomplete/get_product_type'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_pro_typ",
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
   
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/addstore'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Store</strong></button>
      </span>
      <form class="form-horizontal recordEditView" id="stockForm1" name="stockForm1" method="post" action="<?php echo site_url('masters/search_store_list'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
            <input type="text" 	value="" name="search_store_code" class="input-large search-l" id="search_store_code" placeholder="Store Code">
			<span id="auto_complete_store_code"></span>

			<input type="text" 	value="" name="search_store_name" class="input-large search-l" id="search_store_name" placeholder="Store Name">
			<span id="auto_complete_store_name"></span>
            
            <input type="text" 	value="" name="search_pro_typ" class="input-large search-l" id="search_pro_typ" placeholder="Store Category">
			<span id="auto_complete_pro_typ"></span>
            
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
                <th>Store ID</th>
                <th>Store Code</th>
                <th>Store Name</th>
                <th>Store Category</th>
                <th>Store Division</th>
                <th>Status</th>
                <th>Store Description</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
                <th></th>
              </tr>
              <?php //echo "<PRE>"; print_r($pro_type); exit;
    if(!empty($pro_type)) {
      $i = 1;
     foreach($pro_type as $PROTYP) { ?>
              <tr>
               <!-- <td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['store_store_id'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['store_code'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['store_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['products_type_name'];?></a></td>
                
                 <?php 
				 			/*$store_category = explode(',',$pro_type->store_category);
							foreach($store_category as $sc)
							{
								foreach($product_type as $COM) 
								{
									if($sc == $COM['products_type_id']){ echo $COM['products_type_name'].',';}
								}
							}*/
				?>
                
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['division_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['store_add_status'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><?php echo $PROTYP['store_description'];?></a></td>
                <td><?php if($PROTYP['store_add_dt'] != '0000-00-00' && $PROTYP['store_add_dt'] != '' && $PROTYP['store_add_dt'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PROTYP['store_add_dt'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                  <td><?php if($PROTYP['store_update_dt'] != '0000-00-00' && $PROTYP['store_update_dt'] != '' && $PROTYP['store_update_dt'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($PROTYP['store_update_dt'])); ?>
                <?php } else { ?>
                	-
				 <?php } ?> </td>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/viewstore/'); ?>/<?php echo $PROTYP['store_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/editstore/'); ?>/<?php echo $PROTYP['store_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li><a class="javascript:void(0);" onclick="return pro_type_status(<?php echo $PROTYP['store_id'] ;?>,'<?php echo $PROTYP['store_status']; ?>')"><span class="icon-trash"></span></a></li>
                  </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="11" style="text-align:center;"> No Records Found </td>
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
