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


<?php echo $this->load->view('pages/awards_left_side'); ?>

<section>
		<div class="row-fluid">
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
					
					
 <?php
				$conn = new mysqli($this->db->hostname, $this->db->username, $this->db->password);  
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
           
          <input type="text" class="form-control" name="OFCR_TRE_UNDR_ID" placeholder="Officer ID" <?php if($sess_user != 1) { ?>  readonly <?php } else {  ?>  <?php } ?> value="<?php  echo $row['OFCR_USR_VALUE']; ?>" id="exampleInput">
            <input type="submit" id="view_report" name="view_report" class="btn-success btn_generate" value="Generate">                 
				</div> 
			</form> 
			
		</div>
		
		<br />
<style>
td:first-child { color:#2d3232;	 }
td:nth-child(2) { color:#0000FF;	 }
td:nth-child(3){ color:#008000;	 }
td:nth-child(4){ color:#FFA500;	 }
td:nth-child(5) { color:#0000FF;	 }
td:nth-child(6){ color:#008000;	 }
td:nth-child(7){ color:#FFA500;	 }
.table_1 {
    margin-left: 50px;
    width: 90% !important;
	font-weight: bold;
}

</style>
       <?php
	   
if(isset($_POST['view_report']))
{
  $OFCR_TRE_UNDR_ID=$_POST['OFCR_TRE_UNDR_ID'];  
  
  $l1_t="25"; $l2_t="50"; $l3_t="100"; $l4_t="200"; $l5_t="500"; $l6_t="1000"; $l7_t="2000"; $l8_t="4000"; $l9_t="7000"; $l10_t="10000";
  $l1_ta="100000"; $l2_ta="200000"; $l3_ta="500000"; $l4_ta="1000000"; $l5_ta="2500000"; $l6_ta="5000000"; $l7_ta="10000000"; $l8_ta="20000000"; $l9_ta="30000000"; $l10_ta="40000000";
?>    
<center><h3 style="margin-left: 50px;"><?php echo $OFCR_TRE_UNDR_ID;?> </h3></center>
<table style="margin-bottom: 50px;" border="1" class="table_1">
    <tr  style="font-weight: bold;">
         <td colspan="1" ></td>
        <td colspan="3" >No Of Members</td>
         <td colspan="3">Total Turn Over</td>
		 <td colspan="2" >Awards</td>
    </tr>
    <tr  style="font-weight: bold;">
       <td >Level</td>
        <td>Required</td>
         <td>Achieved</td>
         <td>Balance</td>
           <td>Required</td>
         <td>Achieved</td>
         <td>Balance</td>
		  <td colspan="1" >Awards</td>
		  <td colspan="1" >Status</td>
    </tr>
    <?php $l1array=""; $l1_c="0";
    $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
    }
    ?>
    <tr>
        <td>Level 1</td>
        <td><center><?php echo $l1_t;?></center></td>
        <td><center><?php echo $l1_c;?></center></td>
        <td><center><?php if($l1_c > $l1_t) {echo '0';} else { echo $l1_t-$l1_c; } ?></center></td>
         <td><center><?php echo $l1_ta;?></center></td>
         <td><center><?php echo $l1_ca;?></center></td>
         <td><center><?php if($l1_ca > $l1_ta) {echo '0';} else { echo $l1_ta-$l1_ca; } ?></center></td>
		  <td><img src="<?php echo base_url(); ?>/resources/awards/img1.jpg" alt="Power Bank" ></td>
 <td><center><?php if(($l1_t <= $l1_c) && ($l1_ta <= $l1_ca))  { echo "Achieved";  ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr>
    


<?php $l2_c="0";$l2array="";

        if($l1array!="")
    {
        foreach ($l1array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
        
        $l2_ca="0";
        if($l2array!="")
         {
          
        foreach ($l2array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $temp_ca="0";
             $sel=mysqli_query($conn,"SELECT SUM(so_grand_total) as so_total from vsoft_sales_order_total where sales_order_customer_code='$OFCR_TRE_UNDR_ID'");
             WHILE($rows=mysqli_fetch_array($sel)){
             $temp_ca=$rows['so_total'];
            $l2_ca=$l2_ca+$temp_ca;
            }
      
        }
         }
        ?>
        
    <tr>
        <td>Level 2</td>
        <td><center><?php echo $l2_t;?></center></td>
        <td><center><?php echo $l2_c;?></center></td>
        <td><center><?php if($l2_c > $l2_t) {echo '0';} else { echo $l2_t-$l2_c; } ?></center></td>
         <td><center><?php echo $l2_ta;?></center></td>
         <td><center><?php echo $l2_ca;?></center></td>
         <td><center><?php if($l2_ca > $l2_ta) {echo '0';} else { echo $l2_ta-$l2_ca; } ?></center></td>
		   <td><img src="<?php echo base_url(); ?>/resources/awards/img2.jpg" alt="Power Bank" ></td>
 <td><center><?php if(($l2_t <= $l2_c) && ($l2_ta <= $l2_ca))  { echo "Achieved"; ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr>   
     
     <?php $l3_c="0";$l3array="";
     
     if($l2array!="")
    {
        foreach ($l2array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
           //  echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
        ?>
    <tr>
        <td>Level 3</td>
        <td><center><?php echo $l3_t;?></center></td>
        <td><center><?php echo $l3_c;?></center></td>
        <td><center><?php if($l3_c > $l3_t) {echo '0';} else { echo $l3_t-$l3_c; } ?></center></td>
         <td><center><?php echo $l3_ta;?></center></td>
         <td><center><?php echo $l3_ca;?></center></td>
         <td><center><?php if($l3_ca > $l3_ta) {echo '0';} else { echo $l3_ta-$l3_ca; } ?></center></td>
		 <td><img src="<?php echo base_url(); ?>/resources/awards/img3.jpg" alt="Power Bank" ></td>
 <td><center><?php if(($l3_t <= $l3_c) && ($l3_ta <= $l3_ca))  { echo "Achieved"; ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr> 
     
     <?php $l4_c="0";$l4array="";
     if($l3array!="")
    {
        foreach ($l3array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 4</td>
        <td><center><?php echo $l4_t;?></center></td>
        <td><center><?php echo $l4_c;?></center></td>
        <td><center><?php if($l4_c > $l4_t) {echo '0';} else { echo $l4_t-$l4_c; } ?></center></td>
         <td><center><?php echo $l4_ta;?></center></td>
         <td><center><?php echo $l4_ca;?></center></td>
         <td><center><?php if($l4_ca > $l4_ta) {echo '0';} else { echo $l4_ta-$l4_ca; } ?></center></td>
		 <td><img src="<?php echo base_url(); ?>/resources/awards/img4.jpg" alt="Power Bank" ></td>
		 <td><center><?php if(($l4_t <= $l4_c) && ($l4_ta <= $l4_ca))  { echo "Achieved";?> <?php } else { echo "Not Achieved"; }?></center></td>
 
     </tr> 
     
     <?php $l5_c="0";$l5array="";
     if($l4array!="")
    {
        foreach ($l4array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 5</td>
        <td><center><?php echo $l5_t;?></center></td>
        <td><center><?php echo $l5_c;?></center></td>
        <td><center><?php if($l5_c > $l5_t) {echo '0';} else { echo $l5_t-$l5_c; } ?></center></td>
         <td><center><?php echo $l5_ta;?></center></td>
         <td><center><?php echo $l5_ca;?></center></td>
         <td><center><?php if($l5_ca > $l5_ta) {echo '0';} else { echo $l5_ta-$l5_ca; } ?></center></td>
		 <td><img src="<?php echo base_url(); ?>/resources/awards/img5.jpg" alt="Power Bank" ></td>
 <td><center><?php if(($l5_t <= $l5_c) && ($l5_ta <= $l5_ca))  { echo "Achieved"; ?>  <?php } else { echo "Not Achieved"; }?></center></td>
     </tr> 
     
     <?php $l6_c="0";$l6array="";
     if($l5array!="")
    {
        foreach ($l5array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 6</td>
        <td><center><?php echo $l6_t;?></center></td>
        <td><center><?php echo $l6_c;?></center></td>
        <td><center><?php if($l6_c > $l6_t) {echo '0';} else { echo $l6_t-$l6_c; } ?></center></td>
         <td><center><?php echo $l6_ta;?></center></td>
         <td><center><?php echo $l6_ca;?></center></td>
         <td><center><?php if($l6_ca > $l6_ta) {echo '0';} else { echo $l6_ta-$l6_ca; } ?></center></td>
		   <td><img src="<?php echo base_url(); ?>/resources/awards/img6.jpg" alt="Power Bank" ></td>
 <td><center><?php if(($l6_t <= $l6_c) && ($l6_ta <= $l6_ca))  { echo "Achieved"; ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr>
     
      <?php $l7_c="0";$l7array="";
      if($l6array!="")
    {
        foreach ($l6array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 7</td>
        <td><center><?php echo $l7_t;?></center></td>
        <td><center><?php echo $l7_c;?></center></td>
        <td><center><?php if($l7_c > $l7_t) {echo '0';} else { echo $l7_t-$l7_c; } ?></center></td>
         <td><center><?php echo $l7_ta;?></center></td>
         <td><center><?php echo $l7_ca;?></center></td>
         <td><center><?php if($l7_ca > $l7_ta) {echo '0';} else { echo $l7_ta-$l7_ca; } ?></center></td>
		 <td><img src="<?php echo base_url(); ?>/resources/awards/img7.jpg" alt="Power Bank" ></td>
	 <td><center><?php if(($l7_t <= $l7_c) && ($l7_ta <= $l7_ca))  { echo "Achieved"; ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr>
     
     <?php $l8_c="0";$l8array="";
     if($l7array!="")
    {
        foreach ($l7array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 8</td>
        <td><center><?php echo $l8_t;?></center></td>
        <td><center><?php echo $l8_c;?></center></td>
        <td><center><?php if($l8_c > $l8_t) {echo '0';} else { echo $l8_t-$l8_c; } ?></center></td>
         <td><center><?php echo $l8_ta;?></center></td>
         <td><center><?php echo $l8_ca;?></center></td>
         <td><center><?php if($l8_ca > $l8_ta) {echo '0';} else { echo $l8_ta-$l8_ca; } ?></center></td>
		 <td><img src="<?php echo base_url(); ?>/resources/awards/img8.jpg" alt="Power Bank" ></td>
		<td><center><?php if(($l8_t <= $l8_c) && ($l8_ta <= $l8_ca))  { echo "Achieved"; ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr>
     
<?php $l9_c="0";$l9array="";
        if($l9array!="")
    {
        foreach ($l8array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 9</td>
        <td><center><?php echo $l9_t;?></center></td>
        <td><center><?php echo $l9_c;?></center></td>
        <td><center><?php if($l9_c > $l9_t) {echo '0';} else { echo $l9_t-$l9_c; } ?></center></td>
         <td><center><?php echo $l9_ta;?></center></td>
         <td><center><?php echo $l9_ca;?></center></td>
         <td><center><?php if($l9_ca > $l9_ta) {echo '0';} else { echo $l9_ta-$l9_ca; } ?></center></td>
		  <td><img src="<?php echo base_url(); ?>/resources/awards/img9.jpg" alt="Power Bank" >
		</td>
		<td><center><?php if(($l9_t <= $l9_c) && ($l9_ta <= $l9_ca))  { echo "Achieved"; ?> <?php } else { echo "Not Achieved"; }?></center></td>
     </tr>
     
<?php $l10_c="0";$l10array="";
    if($l9array!="")
    {
        foreach ($l9array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             //echo $OFCR_TRE_UNDR_ID;echo "<br>";
             $temp_c="0";
             $sel=mysqli_query($conn,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
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
         }
        ?>
        
         <tr>
        <td>Level 10</td>
        <td><center><?php echo $l10_t;?></center></td>
        <td><center><?php echo $l10_c;?></center></td>
        <td><center><?php if($l10_c > $l10_t) {echo '0';} else { echo $l10_t-$l10_c; } ?></center></td>
         <td><center><?php echo $l10_ta;?></center></td>
         <td><center><?php echo $l10_ca;?></center></td>
         <td><center><?php if($l10_ca > $l10_ta) {echo '0';} else { echo $l10_ta-$l10_ca; } ?></center></td>
		 <td><?php  ?> <img src="<?php echo base_url(); ?>/resources/awards/img10.jpg" alt="Power Bank" >
		 <?php ?></td>
		 <td><center><?php if(($l10_t <= $l10_c) && ($l10_ta <= $l10_ca))  { echo "Achieved";?>  <?php } else { echo "Not Achieved"; }?></center></td>
		
     </tr>


</table>
<?php } ?>
</section>
