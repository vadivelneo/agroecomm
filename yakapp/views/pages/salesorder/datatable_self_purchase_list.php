<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
$company_name="AGRO";
$con=mysqli_connect($this->db->hostname, $this->db->username, $this->db->password, $this->db->database) or die('could not connect'.mysql_error());
//$con=mysqli_connect("localhost","neoindzg_agro","agro*123$","neoindzg_agro_ecomm") or die('could not connect'.mysql_error());
date_default_timezone_set("Asia/Kolkata"); 
?>

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
                                    <h1 class="custom-font"><strong>Self Purchase </strong></h1>                                    
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
                                    <div class="row">
                                        <div class="col-md-6"><div id="tableTools"></div></div>
                                        <div class="col-md-6"><div id="colVis"></div></div>
                                    </div>
                                    <table class="table table-custom" id="advanced-usage">
                                        <thead>
                                        <tr>
                         <th class="sort-alpha">Sno</th>
                            <th class="sort-alpha">Date</th>
							 <th class="sort-alpha">Order No.</th>
							<th class="sort-alpha">Amount</th>
							<th class="sort-alpha">Status</th>
							<th class="sort-amount">Options</th>
						               </tr>
                                        </thead>
										<tbody>
<?php  $vc="1";

$sessionData = $this->session->userdata('userlogin');
		$sess_user=$sessionData['user_id'];
		$sess_company=$sessionData['company_id'];
		$sess_group=$sessionData['group_id'];
		$sess_user_code=$sessionData['user_code'];
if($sess_user == 1)
		{
// getting total number records without any search
$sql = "SELECT `SO`.*, `TOT`.*, `OFFR`.* FROM (`vsoft_sales_order` as SO) JOIN `vsoft_sales_order_total` as TOT ON `TOT`.`so_total_sales_id` = `SO`.`sales_order_id` JOIN `vsoft_officer` as OFFR ON `OFFR`.`OFCR_ID` = `SO`.`sales_order_customer_id` WHERE `SO`.`sales_order_active_status` = 'active' AND `sales_order_status` != 'processed' GROUP BY `SO`.`sales_order_id` ORDER BY `sales_order_id` desc";
		}
		else
		{
$sql = "SELECT `SO`.*, `TOT`.*, `OFFR`.* FROM (`vsoft_sales_order` as SO) JOIN `vsoft_sales_order_total` as TOT ON `TOT`.`so_total_sales_id` = `SO`.`sales_order_id` JOIN `vsoft_officer` as OFFR ON `OFFR`.`OFCR_ID` = `SO`.`sales_order_customer_id` WHERE `SO`.`sales_order_active_status` = 'active' AND `sales_order_status` != 'processed' AND `OFFR`.`OFCR_USR_VALUE` = '$sess_user_code' GROUP BY `SO`.`sales_order_id` ORDER BY `sales_order_id` desc";
		}
//echo $sql;		
$querys=mysqli_query($con, $sql);		
//$querys=mysqli_query($con,$sql);
WHILE($rows=mysqli_fetch_array($querys)){
	
$id=$rows['sales_order_id'];
$order_number=$rows['sales_order_number'];
$grand_total=$rows['so_grand_total'];
$order_status=$rows['sales_order_status'];
$add_date=$rows['sales_order_add_date'];
$emp_email=$rows['sales_order_status'];

?>				
<tr>
<td><?php echo $vc;$vc=$vc+1;?></td>
<td><?php echo $add_date;?></td>
<td><?php echo $order_number;?></td>
<td><?php echo $grand_total;?></td>
<td><?php  if($order_status == 'ofcancelled') { echo 'Cancelled'; } else if($order_status == 'ofapproved') { echo 'Approved';} else if($order_status == 'confirmorder') { echo 'Confirm Order';} else {echo ucfirst($order_status);}?></td>
<td> <a class="btn btn-danger btn-xs" target="_blank" href="<?php echo site_url('salesorder/print_sales_order_a4/'); ?>/<?php echo $id; ?>"><img src="<?php echo base_url(); ?>/resources/images/print.png" height="25"></a></td>
</tr>

	
<?php  } ?>
		
		

                                        </tbody>
                                    </table>
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
        </script>        <!--/ Page Specific Scripts -->

    </body>
</html>

