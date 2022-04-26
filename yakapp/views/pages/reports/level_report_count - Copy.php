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
		function accordin_grid($id,$i)
		{
			
				$('#accordin_grid_'+$i).css('display','none');
				$('#accordin_close_grid_'+$i).css('display','block');
			
				var search_id = $id;
				var search_key = $i;
					   //alert($i);
				   $.ajax({
					type: 'POST',
					url: '<?php echo site_url('reports/view_enrollement_report'); ?>',
					data: {search_id: search_id, search_key:search_key },
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


<?php echo $this->load->view('pages/incentive_left_side'); ?>

<section>
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
				
 <?php
				$conn = $conn = new mysqli($this->db->hostname, $this->db->username, $this->db->password);  
				mysqli_select_db($conn, $this->db->database);
				
				//$conn = new mysqli('localhost', 'neoindzg_agro', 'agro*123$'); 
				//mysqli_select_db($conn, 'neoindzg_agro_ecomm');  
				
	  ?>
		<?php
$sessionuserData = $this->session->userdata('userlogin');
//echo/"<pre>"; print_r($sessionuserData); exit;
$sess_user=$sessionuserData['user_id'];
?>
 <?php		
				$sql = "SELECT OFCR.OFCR_ID,OFCR.OFCR_USR_VALUE FROM `vsoft_officer` as OFCR where OFCR.OFCR_ADD_USR_ID =".$sessionuserData['user_id']; 
				//echo $sql; exit;				
				$setRec = mysqli_query($conn, $sql);  
				
				$row = mysqli_fetch_array($setRec);
				//echo $row['user_photo'];
	  ?>			
             <div class="report_field_input">
          <input type="text" class="form-control" name="OFCR_TRE_UNDR_ID" placeholder="Officer ID" <?php if($sess_user != 1) { ?>  readonly <?php } else {  ?>  <?php } ?> value="<?php  echo $row['OFCR_USR_VALUE']; ?>" id="exampleInput">
		   </div>&nbsp;&nbsp;
		  <div class="report_field field_box">
                                    <div class="report_field_label">
                                    	<p>From date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="text" name="report_from" class="input-large report_text" id="report_from" value="<?php if(isset($_POST['report_from'])) { if(($_POST['report_from']) != '0000-00-00' && $_POST['report_from'] != '' && $_POST['report_from'] != NULL){ echo date('d-m-Y', strtotime($_POST['report_from'])); } } else { echo date('01-m-Y'); } ?>">
                                	</div>
                                </div>
                                <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> To date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="text" name="report_to" class="input-large report_text" id="report_to" value="<?php if(isset($_POST['report_to'])) { if(($_POST['report_to']) != '0000-00-00' && $_POST['report_to'] != '' && $_POST['report_to'] != NULL){ echo date('d-m-Y', strtotime($_POST['report_to'])); } } else { echo date('d-m-Y'); } ?>">
                                	</div>
                                </div>
								
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" id="view_report" name="view_report" class="btn-success btn_generate_new" value="Generate">                  
				</div> 
			</form> 
			
		</div>
		<br />
		
<style>

.table_1 {
    margin-left: 50px;
    width: 90% !important;
}

</style>
       <?php
	   
if(isset($_POST['view_report']))
{
  $OFCR_TRE_UNDR_ID=$_POST['OFCR_TRE_UNDR_ID'];  
  $report_from_date=$_POST['report_from'];
  $report_to_date=$_POST['report_to'];
  
  if($report_from_date != "")
		{
			$report_from = date("Y-m-d", strtotime($report_from_date));
		}
		else
		{
			$report_from = '';
		}
		if($report_to_date != "")
		{
			$report_to = date("Y-m-d", strtotime($report_to_date));
		}
		else
		{
			$report_to = '';
		}
  
  
?>    
<center><h3 style="margin-left: 50px;"><?php echo $OFCR_TRE_UNDR_ID;?> </h3></center>
<table border="1" id="table_1" class="table_1">
   
    <tr style="font-weight: bold;">
       <td >Level</td>
      
         <td>No. of Members</td>
        
          
    </tr>
    <?php $l1array=""; $l1_c="0";
	$items = array();
     $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE.OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
	//echo $sel; exit;
    $l1_c=mysqli_num_rows($sel);
    WHILE($rows=mysqli_fetch_array($sel)){
    $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
	
        $l1array[]=array(
        'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
        );
    }
        $l1_ca="0";

    if($l1array!="")
    {
     foreach ($l1array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l1_ca=$l1_ca+$temp_ca;
            }
      
        }
		 $items[] = $l1_c;
    }
    ?>
    <tr>
        <td>Level 1</td>
        
        <td><center><?php echo $l1_c;?></center></td>
      
        
     </tr>
    


<?php $l2_c="1";$l2array="";

        if($l1array!="")
    {
        foreach ($l1array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l2_c=$l2_c+$temp_c;
			
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l2array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
		 
    }
        
        $items[] = $l2_c;
        ?>
        
    <tr>
        <td>Level 2 </td>
       
        <td><center><?php echo $l2_c - 1;?></center></td>
      
         
     </tr>   
     
     <?php $l3_c="0";$l3array="";
     
     if($l2array!="")
    {
        foreach ($l2array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
           //  echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l3_c=$l3_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l3array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        
    }
        $l3_ca="0";
        if($l3array!="")
         {
          
        foreach ($l3array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l3_ca=$l3_ca+$temp_ca;
            }
      
        }
         }
		 $items[] = $l3_c;
        ?>
    <tr>
        <td>Level 3</td>
        <td><center><?php echo $l3_c;?></center></td>
       
     </tr> 
     
     <?php $l4_c="0";$l4array="";
     if($l3array!="")
    {
        foreach ($l3array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l4_c=$l4_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l4array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
        $l4_ca="0";
        if($l4array!="")
         {
          
        foreach ($l4array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l4_ca=$l4_ca+$temp_ca;
            }
      
        }
		$items[] = $l4_c;
         }
        ?>
        
         <tr>
        <td>Level 4</td>
        <td><center><?php echo $l4_c;?></center></td>
        
     </tr> 
     
     <?php $l5_c="0";$l5array="";
     if($l4array!="")
    {
        foreach ($l4array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l5_c=$l5_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l5array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
         $l5_ca="0";
         if($l5array!="")
         {
          
        foreach ($l5array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l5_ca=$l5_ca+$temp_ca;
            }
      
        }
		$items[] = $l5_c;
         }
        ?>
        
         <tr>
        <td>Level 5</td>
        <td><center><?php echo $l5_c;?></center></td>
       
     </tr> 
     
     <?php $l6_c="0";$l6array="";
     if($l5array!="")
    {
        foreach ($l5array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l6_c=$l6_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l6array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
         $l6_ca="0";
         if($l6array!="")
         {
          
        foreach ($l6array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l6_ca=$l6_ca+$temp_ca;
            }
      
        }
		$items[] = $l6_c;
         }
        ?>
        
         <tr>
        <td>Level 6</td>
        <td><center><?php echo $l6_c;?></center></td>
      
     </tr>
     
      <?php $l7_c="0";$l7array="";
      if($l6array!="")
    {
        foreach ($l6array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l7_c=$l7_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l7array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
         $l7_ca="0";
         if($l7array!="")
         {
          
        foreach ($l7array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l7_ca=$l7_ca+$temp_ca;
            }
      
        }
		$items[] = $l7_c;
         }
        ?>
        
         <tr>
        <td>Level 7</td>
        <td><center><?php echo $l7_c;?></center></td>
       
     </tr>
     
     <?php $l8_c="0";$l8array="";
     if($l7array!="")
    {
        foreach ($l7array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l8_c=$l8_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l8array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
         $l8_ca="0";
       if($l8array!="")
         {
          
        foreach ($l8array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l8_ca=$l8_ca+$temp_ca;
            }
      
        }
		$items[] = $l8_c;
         }
        ?>
        
         <tr>
        <td>Level 8</td>
        <td><center><?php echo $l8_c;?></center></td>
       
     </tr>
     
<?php $l9_c="0";$l9array="";
        if($l9array!="")
    {
        foreach ($l8array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l9_c=$l9_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l9array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
          $l9_ca="0";
      
      if($l9array!="")
         {
            foreach ($l9array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l9_ca=$l9_ca+$temp_ca;
            }
      
        }
		$items[] = $l9_c;
         }
        ?>
        
         <tr>
        <td>Level 9</td>
        <td><center><?php echo $l9_c;?></center></td>
       
     </tr>
     
<?php $l10_c="0";$l10array="";
    if($l9array!="")
    {
        foreach ($l9array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT OFCR_TRE.* from vsoft_officer_tree OFCR_TRE left join vsoft_officer as OFCR on(OFCR_TRE.OFCR_TRE_OFCR_ID = OFCR.OFCR_ID) where OFCR.OFCR_ADD_DT >='$report_from' and OFCR.OFCR_ADD_DT <= '$report_to' and OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l10_c=$l10_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l9array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
    }
        
          $l10_ca="0";
         if($l10array!="")
         {
            foreach ($l10array as $subAray)
            {
                 
                 $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
                 $temp_ca="0";
                 $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
                 WHILE($rows=mysqli_fetch_array($sel)){
                 $temp_ca=$rows['so_total'];
                $l10_ca=$l10_ca+$temp_ca;
                }
          
            }
			$items[] = $l10_c;
         }
        ?>
        
         <tr>
        <td>Level 10</td>
        <td><center><?php echo $l10_c;?></center></td>
       
     </tr>
 <tr>
        <td style="font-weight:bold;">Total Members</td>
        <td style="font-weight:bold;"><center><?php print_r(array_sum($items) - 1);  ?></center></td>
       
     </tr>

</table>
<?php } ?>
                        	
                        
               
</section>
