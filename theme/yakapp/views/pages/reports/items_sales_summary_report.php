  <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {

  
    $( "#report_from" ).datepicker({
		 dateFormat:'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
   $( "#report_to" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
	   dateFormat:'dd-mm-yy',
    }); 
	

	$("#report_item_mfg,#report_item_name,#report_item_code,#report_customer").bind('cut copy paste', function (e) {
    e.preventDefault(); //disable cut,copy,paste
});
	
   
});
 
</script>
 


<?php echo $this->load->view('pages/sales_report_left_side'); 

 //echo "<pre>";print_r($sales_item_list);
 //echo "<pre>";print_r($total_values);exit;
?>

<section>
  <div class="rightPanel">
  	
    
   <div class="p-popup">
   <div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>	
   		
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/items_sales_summary_report'); ?>" enctype="multipart/form-data"> 
        <div  class="report" id="report" > 
        
        <div class="search_field">
      	  <p >From Date</p>	
		
           <input type="text" style="width:100px;" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>"/>
           </div>
           <div class="search_field">
		   <p >To Date</p>	
		
           <input type="text" style="width:100px;" name="report_to" class="input-large report_from" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>"/>
           </div>
           
		  
          <button id="generate" name="generate" value="generate" type="submit" class="btn-success generate" style="margin-top:1%;">Generate</button>
 		 </div> 
          <?php
		if(!empty($sales_item_list)) {?>
          <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/items_sales_summary_report'); ?>" enctype="multipart/form-data">
			<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
            <input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
            <input type="hidden" name="report_customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; }?>">
            <input type="hidden" name="report_customer_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
            <input type="hidden" name="report_region_name" value="<?php if(isset($region_name)){ echo $region_name; }?>">
            <input type="hidden" name="report_region_id" value="<?php if(isset($region_id)){ echo $region_id; }?>" />
           
            <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">               
		</form>
		<?php }?>
      </form> 
	 
<?php /*?>	   <?php
	   echo "<pre>";
	   print_r($sales_item_list);
		if(!empty($sales_item_list)) { 
		$sales_inv_date = $sales_item_list['item_details']->sales_inv_date;
		$itm_name = $sales_item_list['item_details']->sale_invoice_item_name;
		$itm_code = $sales_item_list['item_details']->sale_invoice_item_code;
		$itm_mfg = $sales_item_list['item_details']->sale_invoice_item_model;
		$tot_qty = $sales_item_list['item_details']->Qty_total;
		$tot_amt = $sales_item_list['item_details']->TOT;
		
		?>
       
		<?php }?><?php */?>
        
      </div>
      
    <div class="table_head" id="table">
	
	
      <div class="col w10 last">
	  
	    
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
	  
        <div class="content">
		
		
          <table>
            <tbody>
              <tr>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Code&nbsp;&nbsp;</a></th>
                <!--<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Name&nbsp;&nbsp;</a></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">SKU&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Item Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Price Per Unit&nbsp;&nbsp;</a></th>
				<th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Total Quantity&nbsp;&nbsp;</a></th>         
              
              </tr>
              <?php
		// echo "<pre>";
	   //print_r($sales_item_list);
		if(!empty($sales_item_list)) {
			$i = 1;
		 foreach($sales_item_list['item_details'] as $ITM) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
              
                <td><?php echo $ITM['sale_invoice_item_code'];?></td>
                 <td><?php echo $ITM['sale_invoice_item_model'];?></td>
                <td><?php echo  $ITM['sale_invoice_item_name'] ;?></td>
                <td><?php echo  $ITM['sale_invoice_item_priceperunit'] ;?></td>
                <td><?php echo  $ITM['Qty_total'] ;?></td>
               
                </td>
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
                
          </div>
           <?php
		if(!empty($stock_list)) {?>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
          <?php }?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
