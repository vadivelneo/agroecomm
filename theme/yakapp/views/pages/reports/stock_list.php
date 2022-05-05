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
	$("#report_item_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_name').val(ui.item.product_name);
				}
 	});

  });
	
</script>
<script type="text/javascript">
		function accordin_grid($id,$i)
		{
			
				$('#accordin_grid_'+$i).css('display','none');
				$('#accordin_close_grid_'+$i).css('display','block');
			
				var search_id = $id;
				var report_from =$("#report_from").val();
				var report_to = $("#report_to").val();
				
					   
				   $.ajax({
					type: 'POST',
					<?php /*?>url: '<?php echo site_url('inventory/view_inventory_stock_export'); ?>',<?php */?>
					url: '<?php echo site_url('reports/view_stock_report_search'); ?>',
					data: {search_id: search_id,report_from: report_from,report_to: report_to},
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

<?php echo $this->load->view('pages/inventory_report_left_side'); 

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
    <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/stock_ledger_report_search'); ?>" enctype="multipart/form-data"> 
        <div tabindex="3" class="report" id="report" style="padding:1%;"> 
           <input type="text" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else {  } ?>" placeholder="From Date">
           <input type="text" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { } ?>" placeholder="To Date">
		   <input type="text" style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>" placeholder="Material Name">
		    <input type="hidden"  name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
             
           
          <input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
 		 </div> 
      </form> 
 
	 <form  method="post" action="<?php echo site_url('reports/stock_ledger_report_search'); ?>" > 
      <input type="hidden" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else {  } ?>" placeholder="From Date">
           <input type="hidden" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { } ?>" placeholder="To Date">
		   <input type="hidden" style="width:120px;" name="report_item_name" class="input-large report_from" id="report_item_name" value="<?php if(isset($product_name)){ echo $product_name; }?>" placeholder="Material Name">
		    <input type="hidden"  name="report_item_id" id="report_item_id" value="<?php if(isset($product_id)){ echo $product_id; }?>" />
      <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
<div class="table_head" id="table">
	<div class="col w10 last summary_child">
     
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
		
		<div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:3%;" >&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="summary_div_pu">Date
                    </div>
                    <div class="summary_div_pu" style="width:20%;">Material Name
                    </div>
                    <div class="summary_div_pu">HSN/SAC
                    </div>
					 <div class="summary_div_pu">Store
                    </div>
                    <div class="summary_div_pu">Material Type
                    </div>
                    
                    <div class="summary_div_pu">UOM
                    </div>                   
					<div class="summary_div_pu">Closing stock
                    </div>                   
					
                    </div>
        
              <?php
			//  echo "<PRE>";print_r($stock_list); exit;
			 
		      if(!empty($stock_list)) 
			  {
			  $i = 1;
		      foreach($stock_list as $INV) 
			  { 
			  
			 // $con = mysqli_connect('localhost', 'root', 'admin', 'ceegonew');
			  // $con = mysqli_connect('localhost', 'annaizfa_ceego', 'sivam123', 'annaizfa_ceego');
					
					$report_to_date = date('Y-m-d', strtotime('-1 day', strtotime($report_to)));
					$report_from_date = date('Y-m-d', strtotime('-1 day', strtotime($report_from)));
					
					$this->db->select('SUM(INV.inventory_received_qty) AS received_qty');
					$this->db->from('inventory_new as INV');
					$this->db->join('products as P', 'P.product_id = INV.inventory_item_id');
					$this->db->group_by('INV.inventory_item_id');
					$this->db->where('P.product_id',$INV['product_id']);
					$this->db->where('INV.inventory_add_date >=', '2018-08-01');
					if($report_from_date != "")
					{
					$this->db->where('INV.inventory_add_date <=', $report_from_date);
					}
				 	$inv_qty = 	$this->db->get()->row();
					if($inv_qty)
				{
				$received_qty = $inv_qty->received_qty;
				}
				else
				{
					$received_qty  = 0;
				}
					
				$this->db->select('SUM(ITEMS.mis_item_required_qty) AS issue_qty');
				$this->db->from('materialissue as MIS');
				$this->db->join('materialissue_items as ITEMS', 'MIS.mis_id = ITEMS.mis_ref_id');
				$this->db->group_by('ITEMS.mis_item_material_id');
				$this->db->where('ITEMS.mis_item_material_id',$INV['product_id']);
				$this->db->where('MIS.mis_updated_date >=', '2018-09-01');
				if($report_to != "")
				{
				$this->db->where('MIS.mis_updated_date <=', $report_from_date);
				}
				$issue_qty = 	$this->db->get()->row();
				if($issue_qty)
				{
				$issued_qty = $issue_qty->issue_qty;
				}
				else
				{
					$issued_qty  = 0;
				}
				
				$closing_stock = $received_qty - $issued_qty;
				
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
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php 
					//$product_date = date('d-m-Y', strtotime($INV['product_add_date'])); if($product_date!=''){echo $product_date;}else {echo '-';}
					echo date('d-m-Y', strtotime($report_from_date)); 
					?></a>
                    </div>
                   
                   
                    <div class="summary_div_pu" style="width:20%;">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php echo ucfirst($INV['product_name']);?></a>
                    </div>
					
					 <div class="summary_div_pu">
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')"><?php if($INV['product_hsn_sac']!=''){echo $INV['product_hsn_sac'];}else {echo '-';}?></a>
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
					<a href="javascript:void(0)" onclick="accordin_grid('<?php echo $INV['product_id']; ?>','<?php echo $i; ?>')">
					
					
					<?php
					//echo $this->db->last_query();  exit;
					echo $closing_stock;
					//echo $report_to_date;
					?></a>
                    
                    
                    
                    
                    </div>
					
					
					
					 <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    
                    </div>
		
          
      <?php $i++; } } ?>
        </div>
        </div>
		 <?php if(empty($stock_list)) { ?>
            <div class="col w10 last pur_item" style="text-align: center;">No Records Found</div>
            <?php } ?>
        
        </div>
     </form>
    
       <!-- <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>    
          </div>-->
      </div>
      <div class="clear"></div>
    </div>
</section>
