  <script>
    /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
   $('.generate').click(function()
     {
        
       /* var report_item_name = $("#report_item_name").val();
        var report_item_code = $("#report_item_code").val();
        var report_item_mfg = $("#report_item_mfg").val();
       
	 if(report_item_name == "" && report_item_code == "" && report_item_mfg == "")
    { 
		$('.flashmessage').html("");
		document.getElementById("ErrorMsg").innerHTML="Any One Feild IS Required among Item Name, Item Code, Item Mfg";
	 	 $('#report_item_name').css("border","1px solid #FF0000");
	 	 $('#report_item_code').css("border","1px solid #FF0000");
	 	 $('#report_item_mfg').css("border","1px solid #FF0000");
		 return false;
    }*/
		   
});
  
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
	
	$("#report_item_name").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_name'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_name').val(ui.item.product_name);
				}
 	});
	
	$("#report_item_code").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_code'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_code').val(ui.item.product_code);
				}
 	});
	$("#report_item_mfg").autocomplete({
		source: "<?php echo site_url('reports/report_search_item_mfgpartno'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_item_id').val(ui.item.product_id);
					$('#report_item_mfg').val(ui.item.product_mfr_part_number);
				}
 	});
	
	$("#report_customer").autocomplete({
		source: "<?php echo site_url('reports/report_search_customer'); ?>", 
		minLength: 1,
		select: function(event, ui)
				{
					$('#report_cus_id').val(ui.item.customer_id);
					$('#report_customer').val(ui.item.customer_name);
				}
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
  	
    <div class="row-fluid">

      <span class="btn-group">

      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
         
          </div>
          <div class="clearfix">
		  </div>
          
      </span> 
   </div>
   <div class="p-popup">
   <div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>	
   		
        <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/itemwise_general_salereturn_report'); ?>" enctype="multipart/form-data"> 
        <div  class="report" id="report" > 
        
        <div class="search_field">
      	  <p >From Date</p>	
		
           <input type="text" style="width:100px;" name="report_from" class="input-large report_from" id="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } else { echo date('01-m-Y'); } ?>"/>
           </div>
           <div class="search_field">
		   <p >To Date</p>	
		
           <input type="text" style="width:100px;" name="report_to" class="input-large report_from" id="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>"/>
           </div>
           
           <div class="search_field"> 
		   <p >Customer Name</p>	
		   <input type="text" style="width:120px;" name="report_customer" class="input-large report_from" id="report_customer" value="<?php if(isset($customer_name)){ echo $customer_name; }?>" >
		   <input type="hidden" name="report_cus_id" id="report_cus_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
           </div>
		  
          <button id="generate" name="generate" type="submit" class="btn-success generate" style="margin-top:1%;">Generate</button>
 		 </div> 
      </form> 
      </div>
     <?php
			if(!empty($sales_item_list)) { ?>
				<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/itemwise_general_salereturn_report'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="report_from" value="<?php if(isset($report_from)) { if(($report_from) != '0000-00-00' && $report_from != '' && $report_from != NULL){ echo date('d-m-Y', strtotime($report_from)); } } ?>">
					<input type="hidden" name="report_to" value="<?php if(isset($report_from)) { if(($report_to) != '0000-00-00' && $report_to != '' && $report_to != NULL){ echo date('d-m-Y', strtotime($report_to)); } } else { echo date('d-m-Y'); } ?>">
                     <input type="hidden" name="report_cus_id" value="<?php if(isset($customer_id)){ echo $customer_id; }?>" />
                    <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
				</form>
			<?php } ?>
      
    <div class="table_head" id="table">
	
	
      <div class="col w10 last">
	  
	    
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
	  
        <div class="content1" style="overflow:scroll">
		
          <table >
         
            <tbody>
              <?php
			  //echo "<pre>";print_r($sales_item_list);
			  error_reporting(0);
		if(!empty($sales_item_list)) {
			$i = 1;
			
					$plotArr=array(); 
					$plotTotArr=array(); 
					$plotColArr=array();

		 foreach($sales_item_list['item_details'] as $ITM) { 
		 
					$product_name=$ITM["sale_invoice_item_model"];
					$emp_name=$ITM["customer_name"];
					$sum_qty=$ITM["sum_qty"];
					
					$plotColArr[$product_name]=$product_name;
					$plotArr[$emp_name][$product_name]=$sum_qty;
					$plotTotArr[$product_name]+=$sum_qty;
		  //var_dump($plotTotArr[$product_name]);
		 ?>
               <?php $i++;}} else{?>
              
             
              <?php }?>
              
               <table width="100%" border="1" cellspacing="0" cellpadding="">
  <tr>
    <td style="font-weight:bold">Sno</td>
	<td style="font-weight:bold">Customer Name</td> 
	<?php foreach($plotColArr as $plotColKey=>$plotColVal){ ?>
    <td style="font-weight:bold"><?php echo $plotColVal;?></td>
	<?php } // Column loop end ?> 
  </tr> <!-- Header row end -->
  
  <?php 
  //echo "<PRE>";print_r($plotArr);
  $sno=0;
  foreach($plotArr as $plotKey=>$plotVal)
  {
  	$sno++;
   ?>
  <tr>
    <td><?php echo $sno;?></td>
	<td><?php echo $plotKey;?></td> 
	<?php foreach($plotColArr as $plotColKey=>$plotColVal){ ?>
    <td><?php if($plotVal[$plotColKey]) { echo $plotVal[$plotColKey]; } else { echo 0; }?></td>
	<?php } // Column loop end  ?> 
  </tr>
  <?php } // Row loop end ?> 
  
  
  <!-- TOTAL --> 
  <tr>
    <td>&nbsp;</td>
	<td style="font-weight:bold">TOTAL</td> 
	<?php foreach($plotColArr as $plotColKey=>$plotColVal){ ?>
    <td style="font-weight:bold"><?php echo $plotTotArr[$plotColKey]; ?></td>
	<?php } // Column loop end  ?> 
  </tr> 
</table>
               
             
              
               </tr>

              
               
                
                 
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
