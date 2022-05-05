<style>
.ui-autocomplete.ui-front.ui-menu.ui-widget.ui-widget-content.ui-corner-all {
    height: 500px;
    overflow: scroll;
	width:500px;
}
</style>
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
	$( "#search_stk_add_date" ).datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true //this option for allowing user to select from year range
	});

//Auto complete Serach options 
  $("#search_item_code").autocomplete({
    source: "<?php echo site_url('inventory_autocomplete/search_item_code'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_item_code",
  });	
  
   $("#search_item_name").autocomplete({
    source: "<?php echo site_url('inventory_autocomplete/search_item_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_item_name",
  });	
  
   $("#search_mft_code").autocomplete({
    source: "<?php echo site_url('inventory_autocomplete/search_mft_code'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_mft_code",
  });	
	

  });
	
</script>
<script type="text/javascript">
		function accordin_grid($id,$i)
		{
			
				$('#accordin_grid_'+$i).css('display','none');
				$('#accordin_close_grid_'+$i).css('display','block');
			
				var search_id = $id;
					   
				   $.ajax({
					type: 'POST',
					url: '<?php echo site_url('inventory/view_inventory_stock_export'); ?>',
					data: {search_id: search_id},
					success: function(resp)
					{ 
						$('#summary_report_'+$i).html(resp);
					}
				 });
		}
		
		function accordin_close_grid($id,$i)
		{
			
			 $('#accordin_close_grid_'+$i).css('display','none');
			 $('#accordin_grid_'+$i).css('display','block');
			 $('#summary_report_'+$i).html('');
		}

</script>


<?php echo $this->load->view('pages/inventory_left_side'); 
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment('2');
 $search_stock_data  = $this->session->userdata('stock_data');
   //echo "<PRE>";print_r($search_opening_stock);
 

?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
    
      <span class="btn-group">
  
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          </div>
          <div class="clearfix">
		  
          </div>
      </span> 
   </div>
    <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('inventory/search_stock_list'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search">
        
        	<!--<input type="text" value="" name="search_item_code" class="input-large search-l" id="search_item_code" placeholder="Item Code">
             <span id="auto_complete_item_code"></span>-->
             
              <input type="text" value="" name="search_mft_code" class="input-large search-l" id="search_mft_code" placeholder="SKU">
             <span id="auto_complete_mft_code"></span>
             
             <input type="text"  value="" name="search_item_name" class="input-large search-l" id="search_item_name" placeholder="Item Name">
             <span id="auto_complete_item_name"></span>
            
             
            
            <select name="search_item_type_id" class="chzn-select" id="search_item_type_id"  style="width:160px" >
			<option value="">Material Category</option>
			<?php if(isset($product_type) && !empty($product_type)) { foreach($product_type as $TYPE) { ?>
			<option value="<?php echo $TYPE['products_type_id']; ?>"><?php echo $TYPE['products_type_name']; ?></option>
			<?php } } ?> </select>
             
           <!-- <select class="chzn-select"  name="search_range" id="search_range">
                <option value="">Select Quanty</option>
                <option value="50">Bellow 50</option>
                <option value="100">50-100</option>
                <option value="250">100-250</option>
                <option value="500">250-500</option>
                <option value="501">Above 500</option>
                </select>-->
                
<!--            <input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />
-->			<button id="search" name="search" type="submit" class="btn-success">Search</button>

 		 
      </div> 
      </form> 
 
	 <form  method="post" action="<?php echo site_url('inventory/stock_export'); ?>" > 
      <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">

     </form>
    <div class="table_head" id="table">
	<div class="col w10 last summary_child">
     
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
		
		<div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:3%;" >&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="summary_div_pu">SKU
                    </div>
					<div class="summary_div_pu">HSN/SAC
                    </div>
                    <div class="summary_div_pu">Material Name
                    </div>
                    
					 <div class="summary_div_pu">Store
                    </div>
                    <div class="summary_div_pu">Material Category
                    </div>
                   
                    <div class="summary_div_pu">UOM
                    </div> 
				<div class="summary_div_pu">Received Stock
                    </div>  					
					<div class="summary_div_pu">Current Stock
                    </div>                   
					<div class="summary_div_pu">Added Date
                    </div>
                    </div>
        
              <?php
			  //echo "<PRE>";print_r($indent_list);
			 
		      if(!empty($indent_list)) 
			  {
			  $i = 1;
		      foreach($indent_list as $INV) 
			  { 
			  ?>
		           <div class="summary_child_cont">
					<div >
                    <span id="accordin_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:block" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span><span id="accordin_close_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img">
                    </span>
                    </div>
                   
				   <div class="summary_div_pu" >
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php if($INV['product_sku']!=''){echo $INV['product_sku'];}else {echo '-';}?></a>
                    </div>
                   
				   <div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php if($INV['product_hsn_sac']!=''){echo $INV['product_hsn_sac'];}else {echo '-';}?></a>
                    </div>
                   
                    <div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo ucfirst($INV['product_name']);?></a>
                    </div>
					
					 
                    
                    <div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo $INV['store_name'];?></a>
                    </div>
					
                    <div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo $INV['products_type_name'];?></a>
                    </div>
					
                   
					
					<div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo $INV['uom_name'];?></a>
                    </div>
					
					<div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo $INV['received_qty'];?></a>
                    </div>
					
					<div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo $INV['amount'];?></a>
                    </div>
					
					<div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php if(($INV['inventory_add_date'])!= "0000-00-00") { echo date('d-m-Y', strtotime($INV['inventory_add_date'])); } ?></a>
                    </div>
					
					 <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    
                    </div>
		
          
      <?php $i++; } } ?>
        </div>
        </div>
		 <?php if(empty($indent_list)) { ?>
            <div class="col w10 last pur_item" style="text-align: center;">No Records Found</div>
            <?php } ?>
        
        </div>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>    
          </div>
      </div>
      <div class="clear"></div>
    </div>
</section>
