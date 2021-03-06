<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
 


    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $company_name;?></title>
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>/resources/assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        

    </head>





    <body id="minovate" class="appWrapper">

        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">






            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
          <?php echo $this->load->view('pages/enrollement_left_side'); ?>
		 <!--/ HEADER Content  -->





            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
           <?php //include('menu.php'); ?>
		   <!--/ CONTROLS Content -->




            <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
            <section id="content">

                <div class="page page-ui-modals">

                  

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
 <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Level Report</strong></h1>                                    
									&nbsp;&nbsp;&nbsp;&nbsp;
									 
                                    
                                    <ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-toggle">
                                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-refresh">
                                                        <i class="fa fa-refresh"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                                        <i class="fa fa-expand"></i> Fullscreen
                                                    </a>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
                                   
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
				$con = $conn = new mysqli($this->db->hostname, $this->db->username, $this->db->password);  
				mysqli_select_db($conn, $this->db->database);
				
				//$con = new mysqli('localhost', 'neoindzg_agro', 'agro*123$'); 
				//mysqli_select_db($con, 'neoindzg_agro_ecomm');  
				$sql = "SELECT OFCR.OFCR_ID,OFCR.OFCR_USR_VALUE FROM `vsoft_officer` as OFCR where OFCR.OFCR_ADD_USR_ID =".$sessionuserData['user_id']; 
				//echo $sql; exit;				
				$setRec = mysqli_query($con, $sql);  
				
				$row = mysqli_fetch_array($setRec);
				
	  ?>
					
		
             
									<div class="col-xs-12">
                                    	
                                    <div class="col-xs-3">
                                    	<input type="date" class="form-control" name="from_date" required  id="from_date" value="<?php if(isset($_POST['from_date'])) { if(($_POST['from_date']) != '0000-00-00' && $_POST['from_date'] != '' && $_POST['from_date'] != NULL){ echo date('Y-m-d', strtotime($_POST['from_date'])); } } else { echo date('01-m-Y'); } ?>">
										 
                                	</div>
									 <div class="col-xs-3">
                                    	 <input type="date" class="form-control" name="to_date" required id="to_date" value="<?php if(isset($_POST['to_date'])) { if(($_POST['to_date']) != '0000-00-00' && $_POST['to_date'] != '' && $_POST['to_date'] != NULL){ echo date('Y-m-d', strtotime($_POST['to_date'])); } } else { echo date('01-m-Y'); } ?>">
                                </div>
								<div class="col-xs-2">
								<input type="text" required class="form-control" name="OFCR_TRE_UNDR_ID" required placeholder="Officer ID" id="OFCR_TRE_UNDR_ID" <?php if($sess_user != 1) { ?>  readonly <?php } else {  ?>  <?php } ?> value="<?php  echo $row['OFCR_USR_VALUE']; ?>">
								</div>
                           <div class="col-xs-2">
							<select class="form-control" required name="level" id="level">
							<option value="">Select Level</option>
							<option value="1" <?php if($this->input->post('level')==1){ echo "selected";}?>>1</option>
							<option value="2" <?php if($this->input->post('level')==2){ echo "selected";}?> >2</option>
							<option value="3" <?php if($this->input->post('level')==3){ echo "selected";}?> >3</option>
							<option value="4" <?php if($this->input->post('level')==4){ echo "selected";}?> >4</option>
							<option value="5" <?php if($this->input->post('level')==5){ echo "selected";}?> >5</option>
							<option value="6" <?php if($this->input->post('level')==6){ echo "selected";}?> >6</option>
							<option value="7" <?php if($this->input->post('level')==7){ echo "selected";}?> >7</option>
							<option value="8" <?php if($this->input->post('level')==8){ echo "selected";}?> >8</option>
							<option value="9" <?php if($this->input->post('level')==9){ echo "selected";}?> >9</option>
							<option value="10" <?php if($this->input->post('level')==10){ echo "selected";}?>>10</option>
							</select>
							</div>
							<div class="col-xs-2">
                              <button type="submit" name="view_report" class="btn btn-green">View</button>
							</div>
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
<table class="table table-custom" id="advanced-usage" style="margin-left:10px;margin-bottom:50px;width:95%;" border="1">
 
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
  
  $l1array=[]; $l1_c="0";
    $sel=mysqli_query($con,"SELECT * from vsoft_officer_tree where OFCR_TRE_UNDR_ID='$OFCR_TRE_UNDR_ID'");
    $l1_c=mysqli_num_rows($sel);
    WHILE($rows=mysqli_fetch_array($sel)){
    $OFCR_TRE_USR_ID=$rows['OFCR_TRE_USR_ID'];
        $l1array[]=array(
        'OFCR_TRE_USR_ID'=>$OFCR_TRE_USR_ID
        );
    }
        

    
    
    $l2_c="0";$l2array=array();

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
         
    if(isset($level))
	 {
	    if($level==1) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 1- '.$l1_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
	 }  
		?>
		
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
        
     $l3_c="0";$l3array=array();
     
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
         if(isset($level))
	 {
	    if($level==2) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 2- '.$l2_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
         
         $l4_c="0";$l4array=array();
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
         if(isset($level))
	 {
	    if($level==3) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 3- '.$l3_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
         
         $l5_c="0";$l5array=array();
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
         
		 if(isset($level))
	 {
	    if($level==4) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 4- '.$l4_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
         
         $l6_c="0";$l6array=array();
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
         
         if(isset($level))
	 {
	    if($level==5) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 5- '.$l5_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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

         
         $l7_c="0";$l7array=array();
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
        if(isset($level))
	 {
	    if($level==6) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 6- '.$l6_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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

         
         $l8_c="0";$l8array=array();
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
        if(isset($level))
	 {
	    if($level==7) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 7- '.$l7_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
        

         
         $l9_c="0";$l9array=array();
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
            
			if(isset($level))
	 {
	    if($level==8) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 8- '.$l8_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
        
         
         $l10_c="0";$l10array=array();
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
         if(isset($level))
	 {
	    if($level==9) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 9- '.$l9_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
    $l11array=array();
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
         
         if(isset($level))
	 {
	    if($level==10) {  echo '<tr><td colspan="3"><button style="margin-bottom:15px;" type="submit" name="view_report" class="btn btn-green">Total Members Level 10- '.$l10_c.'</button></td></tr><tr>
		 <tr  style="font-weight: bold;">
        <td >Sno</td>
         <td >Customer Id</td>
		 <td >Name</td>
    </tr>
		'; } //Prints Table Data
 
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
	
	 ?>

</table>

                        	
                        
               
</section>
                                </div>
                                <!-- /tile body -->

                            </section>
                        
                            </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->


                </div>
                
            </section>
            <!--/ CONTENT -->

	



        </div>
        <!--/ Application Content -->



        <!-- Modal -->
        
        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="<?php echo base_url(); ?>/resources/assets/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>/resources/assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/screenfull/screenfull.min.js"></script>
        <!--/ vendor javascripts -->


        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>




<script>
            $(window).load(function(){

                    
                    
                    
                var table4 = $('#advanced-usage').DataTable({
                      
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ]
                });

                var colvis = new $.fn.dataTable.ColVis(table4);

                $(colvis.button()).insertAfter('#colVis');
                $(colvis.button()).find('button').addClass('btn btn-default').removeClass('ColVis_Button');

                var tt = new $.fn.dataTable.TableTools(table4, {
                    sRowSelect: 'single',
                    "aButtons": [
                        'copy',
                        'print', {
                            'sExtends': 'collection',
                            'sButtonText': 'Save',
                            'aButtons': ['csv', 'xls', 'pdf']
                        }
                    ],
                    "sSwfPath": "<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                });

                $(tt.fnContainer()).insertAfter('#tableTools');
                //*initialize responsive datatable

            });
        </script>


        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){

            });
        </script>
        <!--/ Page Specific Scripts -->

    </body>
</html>

