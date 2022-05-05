<script>

function deleteproduct(id,status)
{
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('product/productstatus/'); ?>/'+id+'/'+status;
	 	window.location.href = url;
    }
	else 
	{
    	return false;
    }
}
</script>
<?php echo $this->load->view('pages/master_left_side');
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

		$deliveryStatus = $this->uri->segment(3,"pending");

		if($sort_by == "asc") $order = "desc"; else $order = "asc";
		?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid" style="padding-top:1%;">
    <!--  <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
        </ul>
      </div>-->
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('product/addproduct'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Item</strong></button>
      </span>
      <span class="span4 btn-toolbar">
          <div class="clearfix">
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span> 
            
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('product/product_search'); ?>" enctype="multipart/form-data"> 
      
		   <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
            <input type="text" 	value="" name="search_item_code" autocomplete="off" class="input-large search-l" id="search_item_code" placeholder="Item Code">
            
          
                               
        
			<span id="auto_complete_item_code"></span>
            <input type="text" 	value="" name="search_item_name" autocomplete="off" class="input-large search-l" id="search_item_name" placeholder="Item Name">
			<span id="auto_complete_item_name"></span>
        
                                       
			<select name="search_item_type" class="chzn-select" id="search_item_type"  style="width:160px" >
			<option value="">Item Category</option>
			<?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
			<option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
			<?php } } ?> </select>
                    	
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
	             <th>Item Code</th>
                 <th>Item Name</th>
                 
                <th>Item Category</th>
                
                <th>Actions</th>
				<th></th>
              </tr>
			   <?php
			  // echo "<pre>"; print_r($products_data['rows']); exit;
				if(!empty($products_data))
				{
				$i = 1;
		 		foreach($products_data as $PRO) { ?>
        
                <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
<!--                <td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>
-->           
                <td ><a href="<?php echo site_url('product/productview/'); ?>/<?php echo $PRO['product_id']; ?>"><?php echo ucfirst($PRO['product_code']);?></a></td>
                <td ><a href="<?php echo site_url('product/productview/'); ?>/<?php echo $PRO['product_id']; ?>"><?php echo ucfirst($PRO['product_name']);?></a></td>
                <td ><a href="<?php echo site_url('product/productview/'); ?>/<?php echo $PRO['product_id']; ?>"><?php echo ucfirst($PRO['products_type_name']);?></a></td>
               
              
			
                
                <td colspan="2"> 
             
              <li><a href="<?php echo site_url('product/editproduct/'); ?>/<?php echo $PRO['product_id']; ?>"><span class="icon-pencil"></span></a></li>
			  <li><a class="javascript:void(0);" onclick="return deleteproduct(<?php echo $PRO['product_id']; ?>,'<?php echo $PRO['product_status']; ?>')"><span class="icon-trash"></span></a></li>
					                 
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
              <center> <?php echo $page_links; ?> </center>
                 
                 </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
