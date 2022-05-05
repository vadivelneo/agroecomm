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
$sessionuserData = $this->session->userdata('userlogin');
//echo/"<pre>"; print_r($sessionuserData); exit;
$sess_user=$sessionuserData['user_id'];
?>			
 <?php
				$con = new mysqli('localhost', 'root', '');  
				mysqli_select_db($con, 'agro_test1');
				//$con = new mysqli('localhost', 'neoindzg_agro', 'agro*123$'); 
				//mysqli_select_db($con, 'neoindzg_agro_ecomm');  
				$sql = "SELECT OFCR.OFCR_ID,OFCR.OFCR_USR_VALUE FROM `vsoft_officer` as OFCR where OFCR.OFCR_ADD_USR_ID =".$sessionuserData['user_id']; 
				//echo $sql; exit;				
				$setRec = mysqli_query($con, $sql);  
				
				$row = mysqli_fetch_array($setRec);
				
	  ?>
					
		
             
		  <div class="report_field field_box">
                                    <div class="report_field_label">
                                    	<p>From date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	  <input type="date" class="form-control" name="from_date" required  id="from_date" value="<?php if(isset($_POST['from_date'])) { if(($_POST['from_date']) != '0000-00-00' && $_POST['from_date'] != '' && $_POST['from_date'] != NULL){ echo date('d-m-Y', strtotime($_POST['from_date'])); } } else { echo date('01-m-Y'); } ?>">
                                	</div>
                                </div>
                                <div class="report_field field_box">
                                	<div class="report_field_label">
                                    	<p> To date : </p>
                                    </div>	
                                    <div class="report_field_input">
                                    	<input type="date" class="form-control" name="to_date" required id="to_date" value="<?php if(isset($_POST['to_date'])) { if(($_POST['to_date']) != '0000-00-00' && $_POST['to_date'] != '' && $_POST['to_date'] != NULL){ echo date('d-m-Y', strtotime($_POST['to_date'])); } } else { echo date('01-m-Y'); } ?>">
                                	</div>
                                </div>
								
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" required class="form-control" name="OFCR_TRE_UNDR_ID" required placeholder="Officer ID" id="OFCR_TRE_UNDR_ID" <?php if($sess_user != 1) { ?>  readonly <?php } else {  ?>  <?php } ?> value="<?php  echo $row['OFCR_USR_VALUE']; ?>">
                           
							<select required name="level" id="level">
							<option value="">Select Level</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							</select>
                              <button type="submit" name="view_report" class="btn btn-green">View</button>               
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
<table style="margin-left:140px;margin-bottom:50px;width:73%;" border="1">
 
       <?php

if(isset($_POST['view_report']))
{
    $from_date=$_POST['from_date'];  
    $to_date=$_POST['to_date'];  
  $OFCR_TRE_UNDR_ID=$_POST['OFCR_TRE_UNDR_ID'];  
  $OFCR_TRE_UNDR_ID_1=$_POST['OFCR_TRE_UNDR_ID'];  
  $level=$_POST['level'];
  
  $l1_t="10"; $l2_t="20"; $l3_t="30"; $l4_t="40"; $l5_t="50"; $l6_t="60"; $l7_t="70"; $l8_t="80"; $l9_t="90"; $l10_t="100";
  $l1_ta="10000"; $l2_ta="20000"; $l3_ta="30000"; $l4_ta="40000"; $l5_ta="50000"; $l6_ta="60000"; $l7_ta="70000"; $l8_ta="80000"; $l9_ta="90000"; $l10_ta="100000";
  
  $l1array=""; $l1_c="0";
    $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
    $l1_c=mysqli_num_rows($sel);
    WHILE($rows=mysqli_fetch_array($sel)){
    $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
        $l1array[]=array(
        'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
        );
    }
        

    
    
    $l2_c="0";$l2array="";

        if($l1array!="")
    {
        
        $l1_c="0";        
         foreach ($l1array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==1)
                     {
                       $l1_c=$l1_c+1;
                     }
                }   
         } 
         
     
		?>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		 <?php
		 $i = 1;
        foreach ($l1array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             
             //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==1)
                     {
                         //echo $OFCR_TRE_UNDR_ID;echo "-";echo $OFCR_FST_NME;echo "<br>"; //Prints Table Data
						 ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
			  }
					 $i++;
                }
             //// Prints Data End 
             
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l2_c=$l2_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l2array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        
        if($level==1) {  echo "</td></tr>"; } //Prints Table Data
    }
        
     $l3_c="0";$l3array="";
     
     if($l2array!="")
    {
        
        $l2_c="0";   
		$i = 1;		
         foreach ($l2array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==2)
                     {
                       $l2_c=$l2_c+1;
                     }
                }   
         } 
         
         
         $i = 1;
        foreach ($l2array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             
          //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==2)
                     {
 ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php                     }
		 $i++;
                } 
             //// Prints Data End 
             
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l3_c=$l3_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l3array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==2) {  echo "</td></tr>"; } //Prints Table Data
        
    }
         
         $l4_c="0";$l4array="";
     if($l3array!="")
    {
        
        
        $l3_c="0";     
   
         foreach ($l3array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==3)
                     {
                       $l3_c=$l3_c+1;
                     }
                }   
         } 
         
         
         $i=1;
        foreach ($l3array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             
             //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==3)
                     {
                         ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
                      $i++;
                }
             //// Prints Data End 
             
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l4_c=$l4_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l4array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==3) {  echo "</td></tr>"; } //Prints Table Data
    }
         
         $l5_c="0";$l5array="";
     if($l4array!="")
    {
        
        $l4_c="0";        
         foreach ($l4array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==4)
                     {
                       $l4_c=$l4_c+1;
                     }
                }   
         } 
         
        $i=1;
        foreach ($l4array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             
             //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==4)
                     {
                         ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
                      $i++;
                }
             //// Prints Data End 
             
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l5_c=$l5_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l5array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==4) {  echo "</td></tr>"; } //Prints Table Data
    }
         
         $l6_c="0";$l6array="";
     if($l5array!="")
    {
        
        $l5_c="0";        
         foreach ($l5array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==5)
                     {
                       $l5_c=$l5_c+1;
                     }
                }   
         } 
         
         
          $i=1;
        foreach ($l5array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
            
            //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==5)
                     {
                         ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
                      $i++;
                }
             //// Prints Data End 
            
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l6_c=$l6_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l6array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==5) {  echo "</td></tr>"; } //Prints Table Data
    }

         
         $l7_c="0";$l7array="";
      if($l6array!="")
    {
        
        
        $l6_c="0";        
         foreach ($l6array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==6)
                     {
                       $l6_c=$l6_c+1;
                     }
                }   
         } 
        
         $i=1;
        foreach ($l6array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
            
            //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==6)
                     {
                          ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
                      $i++;
                }
             //// Prints Data End 
            
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l7_c=$l7_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l7array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==6) {  echo "</td></tr>"; } //Prints Table Data
    }

         
         $l8_c="0";$l8array="";
     if($l7array!="")
    {
        
        $l7_c="0";        
         foreach ($l7array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==7)
                     {
                       $l7_c=$l7_c+1;
                     }
                }   
         } 
        
         $i=1;
        foreach ($l7array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             
             //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==7)
                     {
                         ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
                      $i++;
                }
             //// Prints Data End 
             
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l8_c=$l8_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l8array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==7) {  echo "</td></tr>"; } //Prints Table Data
    }
        

         
         $l9_c="0";$l9array="";
        if($l8array!="")
    {
         $l8_c="0";        
         foreach ($l8array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==8)
                     {
                       $l8_c=$l8_c+1;
                     }
                }   
         }      
            
          $i=1;
        foreach ($l8array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             
             //// Prints Data Start
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
           //  echo $der;
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==8)
                     {
                          ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
					  $i++;
                }
             //// Prints Data End 
             
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l9_c=$l9_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l9array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==8) {  echo "</td></tr>"; } //Prints Table Data
    }
        
         
         $l10_c="0";$l10array="";
    if($l9array!="")
    {
        
        
        $l9_c="0";        
         foreach ($l9array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==9)
                     {
                       $l9_c=$l9_c+1;
                     }
                }   
         } 
         
         
        $i=1;
        foreach ($l9array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
            
                //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==9)
                     {
                         ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
                   $i++;   
                }
             //// Prints Data End 
            
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l10_c=$l10_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l10array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==9) {  echo "</td></tr>"; } //Prints Table Data
    }
    
      if($l10array!="")
    {
        
        $l10_c="0";        
         foreach ($l10array as $subAray)
         { 
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
             $der="SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'";
                $sel=mysqli_query($con,$der);
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME'];
                     if($level==10)
                     {
                       $l10_c=$l10_c+1;
                     }
                }   
         } 
         
         
        $i=1;
        foreach ($l10array as $subAray)
        {
             
             $OFCR_TRE_UNDR_ID=$subAray['OFCR_TRE_USR_ID']; 
            
                //// Prints Data Start
                $sel=mysqli_query($con,"SELECT * from vsoft_officer where OFCR_USR_VALUE='$OFCR_TRE_UNDR_ID' AND OFCR_ADD_DT BETWEEN '$from_date' AND '$to_date'");
                WHILE($rows=mysqli_fetch_array($sel)){  $OFCR_FST_NME=$rows['OFCR_FST_NME']; 
                     if($level==10)
                     {
                         ?>
					<tr>
					<td><?php echo $i;?></td>
					<td><center><?php echo $OFCR_TRE_UNDR_ID;?></center></td>
					<td><center><?php echo $OFCR_FST_NME;?></center></td>
					</tr>
		<?php
                     }
					  $i++;
                }
             //// Prints Data End 
            
             $temp_c="0";
             $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
             $temp_c=mysqli_num_rows($sel);
             $l11_c=$l11_c+$temp_c;
             WHILE($rows=mysqli_fetch_array($sel)){
             $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
                $l11array[]=array(
                'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
                );
            }
      
        }
        if($level==10) {  echo "</td></tr>"; } //Prints Table Data
    }
        
    
     } 
	 if(isset($level))
	 {
	    if($level==1) {  echo '<tr><td colspan="3"><h1>Total Members Level 1 - '.$l1_c.' </h1></td></tr><tr>'; } //Prints Table Data
 if($level==2) {  echo '<tr><td colspan="3"><h1>Total Members Level 2 - '.$l2_c.' </h1></td></tr><tr>'; } //Prints Table Data
 if($level==3) {  echo '<tr><td colspan="3"><h1>Total Members Level 3 - '.$l3_c.' </h1></td></tr><tr>'; } //Prints Table Data
  if($level==4) {  echo '<tr><td colspan="3"><h1>Total Members Level 4 - '.$l4_c.' </h1></td></tr><tr>'; } //Prints Table Data
if($level==5) {  echo '<tr><td colspan="3"><h1>Total Members Level 5 - '.$l5_c.' </h1></td></tr><tr>'; } //Prints Table Data
 if($level==6) {  echo '<tr><td colspan="3"><h1>Total Members Level 6 - '.$l6_c.' </h1></td></tr><tr>'; } //Prints Table Data
if($level==7) {  echo '<tr><td colspan="3"><h1>Total Members Level 7 - '.$l7_c.' </h1></td></tr><tr>'; } //Prints Table Data
if($level==8) {  echo '<tr><td colspan="3"><h1>Total Members Level 8 - '.$l8_c.' </h1></td></tr><tr>'; } //Prints Table Data
  if($level==9) {  echo '<tr><td colspan="3"><h1>Total Members Level 9 - '.$l9_c.' </h1></td></tr><tr>'; } //Prints Table Data
  if($level==10) {  echo '<tr><td colspan="3"><h1>Total Members Level 10 - '.$l10_c.' </h1></td></tr><tr>'; } 
//Prints Table Data
	 }
	 ?>

</table>

                        	
                        
               
</section>
