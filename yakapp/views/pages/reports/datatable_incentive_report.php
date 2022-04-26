<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<script type="text/javascript">
function accordin_grid($id,$i)
{
    $('#accordin_grid_'+$i).css('display','none');
	$('#accordin_close_grid_'+$i).css('display','block');
	var search_id = $id; 
	var report_from = $("#report_from").val();
	var report_to = $("#report_to").val();
		   //alert(report_from);
		   //alert(report_to);
	 $.ajax({
	  type: 'POST',
	  url: '<?php echo site_url('reports/view_officer_salesincentive'); ?>',
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
                                    <h1 class="custom-font"><strong>Sales Incentive Report</strong></h1>                                    
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
			
			<form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/sales_incentive_details'); ?>" enctype="multipart/form-data"> 
				<div tabindex="3" class="report" id="report" style="padding:1%;">
	<?php
$sessionuserData = $this->session->userdata('userlogin');
//echo/"<pre>"; print_r($sessionuserData); exit;
$sess_user=$sessionuserData['user_id'];
?>			

			 <div class="col-xs-12">
                                    	
                                    <div class="col-xs-3">
                                    	<input type="date" class="form-control" name="report_from" required  id="report_from" value="<?php if(isset($_POST['report_from'])) { if(($_POST['report_from']) != '0000-00-00' && $_POST['report_from'] != '' && $_POST['report_from'] != NULL){ echo date('Y-m-d', strtotime($_POST['report_from'])); } } else { echo date('01-m-Y'); } ?>">
										 
                                	</div>
									 <div class="col-xs-3">
                                    	 <input type="date" class="form-control" name="report_to" required id="report_to" value="<?php if(isset($_POST['report_to'])) { if(($_POST['report_to']) != '0000-00-00' && $_POST['report_to'] != '' && $_POST['report_to'] != NULL){ echo date('Y-m-d', strtotime($_POST['report_to'])); } } else { echo date('01-m-Y'); } ?>">
                                </div>		
		
             
		 <div class="col-xs-3">
                            <input type="submit" id="generate" name="generate" class="btn btn-green" value="Generate">    
</div>			 </div>						
				</div> 
			</form> 
			
		</div>
		<br />
		


<table class="table table-custom" id="advanced-usage">
                                        <thead>
                                        <tr>
							<th class="sort-alpha"></th>			
                         <th class="sort-alpha">Sno</th>
                            <th class="sort-alpha">Customer Name</th>
							<th class="sort-alpha"></th>	
							 <th class="sort-alpha">Customer Code</th>
							<th class="sort-alpha">Incentive Amount</th>
							
						               </tr>
                                        </thead>
										<tbody>
	<?php
	
		if(!empty($invoice_list)) {
								$i = 1;
								foreach($invoice_list as $SI) {
				if($SI['incentive_amt'] !=0) {
									?>

<tr>
<td>
 <span id="accordin_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:block" onclick="accordin_grid('<?php echo $SI['OFCR_ID']; ?>','<?php echo $i; ?>')">
                    <img style="width:25px;height:25px;" src="<?php echo base_url();?>resources/images/add-icon.png" class="summary_child_img">
                    </span><span id="accordin_close_grid_<?php echo $i; ?>" class="summary_child_cont1" style="display:none" onclick="accordin_close_grid('<?php echo $SI['OFCR_ID']; ?>','<?php echo $i; ?>')">
                    <img style="width:25px;height:25px;" src="<?php echo base_url();?>resources/images/minus-icon.png" class="summary_child_img"></span>
</td>
<td><?php echo $i; ?></td>
<td><?php echo ucfirst($SI['OFCR_NAME']);?></td>
<td style="color: red;" class="summary_child1" id="summary_report_<?php echo $i; ?>"> </td>
<td><?php echo ucfirst($SI['OFCR_USR_VALUE']);?></td>
<td><?php echo $SI['incentive_amt'];?></td>

</tr>

<?php $i++; } } } ?>
	

		
		

                                        </tbody>
                                    </table>

		
<style>

.table_1 {
    margin-left: 50px;
    width: 90% !important;
}

</style>

                        	
                        
               
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

