<script>
$(document).ready(function () {
	
	$("#report_vendor").autocomplete({
		source: "<?php echo site_url('reports/report_search_vendor_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#vendor').val(ui.item.vendor_id);
					$('#report_vendor').val(ui.item.vendor_name);
				}
 	});
	
	$("#report_store").autocomplete({
		source: "<?php echo site_url('reports/report_search_store_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#store').val(ui.item.vendor_id);
					$('#report_store').val(ui.item.vendor_name);
				}
 	});
  
});

</script>
<script type="text/javascript">
		function accordin_grid($id,$i,$level)
		{
			//alert('ddd');
				$('#accordin_grid_'+$i).css('display','none');
				$('#accordin_close_grid_'+$i).css('display','block');
			
				var search_id = $id;
				var search_key = $i;
				var level_id = $level;
				var level_count = parseInt($("#level_count").val()) + parseInt(1);
					   //alert(level_count);
				   $.ajax({
					type: 'POST',
					url: '<?php echo site_url('reports/view_enrollement_report'); ?>',
					data: {search_id: search_id, search_key:search_key, level_id:level_id },
					success: function(resp)
					{ 
						$('#summary_report_'+$i).html(resp);
						$('#level_value').html(level_id);
						$('#level_count').html(level_count);
					}
				 });
		}
		
		function accordin_close_grid($id,$i)
		{
			
			 $('#accordin_close_grid_'+$i).css('display','none');
			 $('#accordin_grid_'+$i).css('display','block');
			 $('#summary_report_'+$i).html('');
			 $('#summary_report1_'+$i).html('');
		}

</script>


<?php echo $this->load->view('pages/enrollement_left_side'); ?>

<section>
	<div class="rightPanel">
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/enrollement_reportsearch'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
					
					<?php
$sessionuserData = $this->session->userdata('userlogin');
//echo/"<pre>"; print_r($sessionuserData); exit;
$sess_user=$sessionuserData['user_id'];
?>
 <?php
	  
				$conn = new mysqli('localhost', 'root', '');  
				mysqli_select_db($conn, 'agro_test');
				//$conn = new mysqli('localhost', 'neoindzg_agro', 'agro*123$'); 
				//mysqli_select_db($conn, 'neoindzg_agro_ecomm');  
				$sql = "SELECT OFCR.OFCR_ID,OFCR.OFCR_USR_VALUE FROM `vsoft_officer` as OFCR where OFCR.OFCR_ADD_USR_ID =".$sessionuserData['user_id']; 
				//echo $sql; exit;				
				$setRec = mysqli_query($conn, $sql);  
				
				$row = mysqli_fetch_array($setRec);
				//echo $row['user_photo'];
	  ?>
					<input type="text" name="report_officer" <?php if($sess_user != 1) { ?>  readonly <?php } else {  ?>  <?php } ?> placeholder="Officer ID" class="input-large report_to" id="report_officer" value="<?php  echo $row['OFCR_USR_VALUE']; ?>">
										
         &nbsp;&nbsp;&nbsp;      
					
					
          			<input type="hidden" name="vendor" id="vendor"  value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
                   
					 <input type="submit" id="generate" name="generate" class="btn-success btn_generate" value="Generate">
				</div> 
			</form> 
			<?php
            if(!empty($po_list)) {?>
            <form class="form-horizontal" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/enrollement_reportsearch'); ?>" enctype="multipart/form-data">
           
            <input type="hidden" name="report_store" placeholder="Store Name" class="input-large report_to" id="report_store" value="<?php if(isset($store_name)){ echo $store_name; }?>">
            <input type="hidden" name="vendor" id="vendor" value="<?php if(isset($vendor_id)){ echo $vendor_id; }?>" />
             <input type="hidden" name="search_item_status" id="search_item_status" value="<?php if(isset($search_item_status)){ echo $search_item_status;}?>" />
          <!--  <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export"> -->
            </form>
            <?php }?>
		</div>
		<br />

        <div class="table_head" id="table">
			<div class="col w10 last summary_child">
				<div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
                <div class="content">
				
				
				<div style="width:100%;font-weight:bold;">
					<div class="summary_div_child" style="width:3%;" >&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
					<div style="width: 7%;float:left;" class="">S.No
                    </div>
                    <div class="summary_div">Customer ID.
                    </div>
                    <div class="summary_div">Customer Name
                    </div>
					<?php if($sess_user == 1) { ?>  
                  
                    <div class="summary_div">Mobile 
                    </div>
					 <?php } ?>  
                    <div class="summary_div">Rank
                    </div>
                    <div class="summary_div">Referal ID
                    </div> 
					<div class="summary_div">Date of Joining
                    </div>
					<div class="summary_div"><span style="font-size:20px;font-weight:bold;color:000;">Level 1 - <?php if(!empty($po_list)) { echo count($po_list); }  ?></span>
                    </div>
					
                                       </div>
				
				  <?php
						//echo "<pre>"; print_r($po_list);  exit;
						//echo count($po_list);  exit;
                        if(!empty($po_list)) {
                        	$i = 1;
                        	foreach($po_list as $PO) { ?>
							
							<div class="summary_child_cont">
					<div>
					
                    <span id="accordin_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:block" onclick="accordin_grid('<?php echo $PO['OFCR_USR_VALUE']; ?>','<?php echo $i; ?>','2')">
                    <img src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span>
                    <span id="accordin_close_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
                    <img src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img">
                    </span>
                    </div>
					 <div style="width: 7%;float:left;" >
					 <?php echo $i; ?>
                    </div>
					 <div class="summary_div" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $PO['OFCR_USR_VALUE'];?>
										</a>
                    </div>
					 <div class="summary_div" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $PO['OFCR_FST_NME'].' '.$PO['OFCR_LST_NME'];?>
										</a>
                    </div>
					<?php if($sess_user == 1) { ?> 
					 
					
					 <div class="summary_div" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $PO['OFCR_MOB'];?>
										</a>
                    </div>
					 <?php } ?>  
					 <div class="summary_div" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $PO['rank'];?>
										</a>
                    </div>
					
					 <div class="summary_div" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php echo $PO['OFCR_TRE_SPNCR_ID'];?>
										</a>
                    </div>
					
					
					
					 <div class="summary_div" ><a href="javascript:void(0)" onclick="accordin_grid('<?php echo $PO['OFCR_ID']; ?>','<?php echo $i; ?>')">
											<?php 
                                        if(($PO['OFCR_ADD_DT']) != '0000-00-00' && $PO['OFCR_ADD_DT'] != '' && $PO['OFCR_ADD_DT'] != NULL)
                                        { 
                                            echo date('d-m-Y', strtotime($PO['OFCR_ADD_DT']));
                                        }
                                        else
                                        {
                                            echo "-";
                                        }
                                    ?>
										</a>
                    </div>
					
					
					 <div class="summary_child1" id="summary_report1_<?php echo $i; ?>"> </div>
                    
					
					
                    
					  <div class="summary_child1" id="summary_report_<?php echo $i; ?>"> </div>
                    
					
					
                    
					</div>
                    <?php $i++; } } ?>
                    </div>
							
					 <?php if(empty($po_list)) { ?>
                     <div class="col w10 last pur_item" style="text-align: center;">No Records Found</div>
                     <?php } ?>		
						
                        	
                        
                </div>
            </div>
        	<div class="clear"></div>
        </div>
    </div>
</section>
