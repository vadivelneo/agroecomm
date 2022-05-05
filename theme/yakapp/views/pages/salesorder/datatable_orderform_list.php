<!doctype html>




    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>AGRO - OrderForm</title>
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>/resources/assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/vendor/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/main.css">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->




    </head>





    <body id="minovate" class="appWrapper">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->












        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">






            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            
           
				
				 <?php echo $this->load->view('pages/enrollement_left_side'); ?>
                
            <section id="content">

                <div class="page page-tables-datatables">

                    <div class="pageheader">

                        <h2>Order Form<span></span></h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i> AGRO</a>
                                </li>
                                <li>
                                    <a href="#">Order Form</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/salesorder_guest/order_form">ADD</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">

                          
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>List Order Form</strong></h1>
                                    
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body">
                                    <table class="table table-custom dt-responsive" id="responsive-usage" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Date</th>
                                            <th>Order No.</th>
											<th>Amount</th>
											<th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
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



        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
       

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        
        <!--/ custom javascripts -->






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){

                //initialize responsive datatable
                var table3 = $('#responsive-usage').DataTable({
					"ajax": '<?php echo site_url('salesorder_guest/order_form_datatable'); ?>',
                    
                    "columns": [
						{ "data": "0" },
                        { "data": "OFCR_ADD_DT" },
                        { "data": "sales_order_number" },
						{ "data": "so_grand_total" },
						{ "data": "sales_order_status" },
						{ "data": "sales_order_status" },
                       
                    ],
					aaSorting: [[2, 'desc']],
                    "aoColumnDefs": [
                      { 'bSortable': true, 'aTargets': [ "no-sort" ] }
                    ],
	
                });
               
            });
        </script>
        <!--/ Page Specific Scripts -->




    </body>
</html>
