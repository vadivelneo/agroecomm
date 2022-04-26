<!doctype html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>AGRO - Dashboard</title>
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>/assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- vendor css files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/vendor/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/vendor/summernote/summernote.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css">
       
        <script src="<?php echo base_url(); ?>/assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->


    </head>

    <body id="minovate" class="appWrapper">

        <div id="wrap" class="animsition">

            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="index.html">
                            <span><strong>AGRO</strong></span>
                        </a>
                        <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->



                    <!-- Left-side navigation -->
                    
                    <div class="search" id="main-search">
                        <input type="text" class="form-control underline-input" placeholder="Search...">
                    </div>
                   
                </header>

            </section>
           <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="index.html">
                            <span><strong>AGRO</strong></span>
                        </a>
                      
                    </div>
                    <!-- Branding end -->



                    <!-- Left-side navigation -->
                    
                    


                    <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">
                       
                        <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                               
                               <a href="<?php echo base_url(); ?>index.php/leads/logout">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                               
                                
                                <li class="divider"></li>
                               
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/leads/logout">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>
 <li class="dropdown nav-profile">

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                              <!--  <img src="assets/images/profile-photo.jpg" alt="" class="img-circle size-30x30"> -->
                                <span>John Douey </i></span>
                            </a>

                            

                        </li>
                            </ul>

                        </li>

                        <li class="toggle-right-sidebar">
                            <a href="#">
                              <!--  <i class="fa fa-comments"></i> -->
                            </a>
                        </li>
                    </ul>
                    <!-- Right-side navigation end -->



                </header>

            </section>
            <div id="controls">

                 <?php echo $this->load->view('pages/enrollement_left_side'); ?>
                <aside id="rightbar">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                            <li role="presentation"><a href="#history" aria-controls="history" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                            <li role="presentation"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-cog"></i></a></li>
                        </ul>

                        <!-- Tab panes -->
                        
                    </div>

                </aside>
                <!--/ RIGHTBAR Content -->




            </div>
            <!--/ CONTROLS Content -->

            <section id="content">

                <div class="page page-dashboard">

                    <div class="pageheader">

                        <h2>AGRO Dashboard <span></span></h2>

                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i> AGRO</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                            </ul>

                            <div class="page-toolbar">
                                <a role="button" tabindex="0" class="btn btn-lightred no-border">
                                   <span> <?php  echo date('d F Y'); ?></span>
                                </a>
                            </div>

                        </div>

                    </div>

                    <!-- cards row -->
                    <div class="row">

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-greensea">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                       
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <p class="text-elg text-strong mb-0"><?php echo $count_downline_user ; ?></p>
                                            <span>Direct Downline Count</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-greensea">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-12">
										
                                            <a href=#><i class="fa fa-users fa-4x"><?php echo $count_downline_user ; ?></i> Direct Downline Count</a>
                                        </div>
                                       
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-lightred">

                                    <!-- row -->
                                    <div class="row">
                                        <p class="text-elg text-strong mb-0"><?php foreach($self_purchase_amount_user as $SLs) {  echo $SLs['so_amount']; } ?></p>
                                            <span>Self Purchase Amount</span>
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-lightred">

                                    <!-- row -->
                                     <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-12">
										
                                            <a href=#><i class="fa fa-users fa-4x"><?php foreach($self_purchase_amount_user as $SLs) {  echo $SLs['so_amount']; } ?></i>Self Purchase Amount</a>
                                        </div>
                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-blue">

                                    <!-- row -->
                                    <div class="row">
                                       <p class="text-elg text-strong mb-0"><?php foreach($incentive_amount_user as $SLs) {  echo $SLs['TOTAL_INCENTIVE_AMT']; } ?></p>
                                            <span>Incentive Amount</span>
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-blue">

                                    <!-- row -->
                                     <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-12">
										
                                            <a href=#><i class="fa fa-users fa-4x"><?php foreach($incentive_amount_user as $SLs) {  echo $SLs['TOTAL_INCENTIVE_AMT']; } ?></i>Incentive Amount</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-slategray">

                                    <!-- row -->
                                    <div class="row">
                                        <p class="text-elg text-strong mb-0"><?php foreach($redeem_amount_user as $CLs) {  echo $CLs['USR_REDEEM_AMT']; } ?></p>
                                            <span>Redeem Amount</span>
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-slategray">

                                    <!-- row -->
                                     <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-12">
										
                                            <a href=#><i class="fa fa-users fa-4x"><?php foreach($redeem_amount_user as $CLs) {  echo $CLs['USR_REDEEM_AMT']; } ?></i> Redeem Amount</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                    </div>
					
					<div class="row">

                        <!-- col -->
                        <div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-blue">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                       
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                            <p class="text-elg text-strong mb-0"><?php foreach($wallet_amount_user as $CLs) {  echo $CLs['TOTAL_INCENTIVE_AMT'] - $CLs['USR_REDEEM_AMT']; } ?></p>
                                            <span>Available Amount</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-blue">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-12">
										
                                            <a href=#><i class="fa fa-users fa-4x"><?php foreach($wallet_amount_user as $CLs) {  echo $CLs['TOTAL_INCENTIVE_AMT'] - $CLs['USR_REDEEM_AMT']; } ?></i> Available Amount</a>
                                        </div>
                                       
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
						
						<div class="card-container col-lg-3 col-sm-6 col-sm-12">
                            <div class="card">
                                <div class="front bg-slategray">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                       
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-12">
                                           <img src="<?php echo base_url(); ?>/resources/images/shop-icon.png" alt="Whatsapp" width="30" height="30">
											<img src="<?php echo base_url(); ?>/resources/images/whatsapp.png" alt="Whatsapp" width="30" height="30">
											<button onclick="myFunction()"><img src="<?php echo base_url(); ?>/resources/images/copyshare.PNG" alt="Copy Link" title="Copy Link" width="30" height="30"></button>
                                            <span></span></br>
											 <span>Promotion Link</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-slategray">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div style="margin-top: 25px;margin-left: 25px;" class="col-xs-12">
										
                                           
						<?php 
						//echo "<pre>"; print_r($user_details);
						if(!empty($user_details)) { $itemcount = 1; foreach($user_details as $CRE) { 

						$qry_stng = $CRE['OFCR_USR_VALUE'].'@'.$CRE['OFCR_MOB'].'@'.$CRE['OFCR_NAME'];
						?>
						<button onclick="myFunshop()"><img src="<?php echo base_url(); ?>/resources/images/shop-icon.png" alt="Whatsapp" width="50" height="50"></button>
						<button onclick="myFunWhatsapp()"><img src="<?php echo base_url(); ?>/resources/images/whatsapp.png" alt="Whatsapp" width="50" height="50">
						</button>
						
						<button onclick="myFunction()"><img src="<?php echo base_url(); ?>/resources/images/copyshare.PNG" alt="Copy Link" title="Copy Link" width="50" height="50"></button>

						<input type="hidden" value="<?php echo $CRE['OFCR_MOB']; ?>" id="wapp_mobile">
						<input type="text" readonly style="width:25px;color:#3f4e62;border: 1px solid #3f4e62;background: #3f4e62;" value="<?php echo base_url();?>index.php/genelogy_guest/officerform?id=<?php echo $qry_stng; ?>" id="myInput">
						<input type="text" readonly style="width:25px;color:#3f4e62;border: 1px solid #3f4e62;background: #3f4e62;" value="<?php echo base_url();?>index.php/signin/login/order" id="myInput1">

						<?php $itemcount++; } } ?>
											</br>
											 <span>Promotion Link</span>
											
                                        </div>
                                       
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
						</div>
                    <!-- /row -->

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  //alert(copyText);
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Link Copied");
}

function myFunWhatsapp() 
	{
  var mobile = $('#wapp_mobile').val();
  window.open("https://web.whatsapp.com/send?phone=+91"+mobile, "_blank");
    }
function myFunshop() 
	{
  //window.open("http://agroreforming.com/ecomm3/index.php/signin/login/order", "_blank");
  
  var copyText = document.getElementById("myInput1");
  //alert(copyText);
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Link Copied");
  
    }
</script>

                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Recent Joinig Members </strong></h1>
                                    
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body table-custom">

                                    <div class="table-responsive">
                                        <table class="table table-custom" id="project-progress">
                                            <thead>
											
                                            <tr>
											<th>Sno</th>
                                                <th>User Name</th>
                                                <th>User Id</th>
                                                <th>City</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
											<?php if(!empty($downline_user_details)) { $itemcount = 1; foreach($downline_user_details as $CRE) {  ?>
                                            <tr>
											<td><?php echo $itemcount; ?></td>
                                                <td><?php if(isset($CRE['OFCR_FST_NME'])) { echo $CRE['OFCR_FST_NME']; } ?></td>
                                                <td><?php if(isset($CRE['OFCR_USR_VALUE'])) { echo $CRE['OFCR_USR_VALUE']; } ?></td>
                                                <td><small class="text-danger"><?php if(isset($CRE['CTY_NME'])) { echo $CRE['CTY_NME']; } ?></small></td>
                                                
                                            </tr>
                                             <?php $itemcount++; } } else {?>
                 	<tr>
                  <td colspan="3"> No Result Found </td>
                   </tr>
                  <?php  } ?>
                                            
                                            
                                            
                                            
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->
                        </div>
                       
                    </div>
                   
				   
                </div>

                
            </section>
            <!--/ CONTENT -->

        </div>
        <!--/ Application Content -->


        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>/assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/d3/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/d3/d3.layout.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/rickshaw/rickshaw.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/daterangepicker/daterangepicker.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/morris/morris.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/summernote/summernote.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/js/vendor/coolclock/coolclock.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/vendor/coolclock/excanvas.js"></script>
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
        <!--/ custom javascripts -->








        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                // Initialize Statistics chart
                var data = [{
                    data: [[1,15],[2,40],[3,35],[4,39],[5,42],[6,50],[7,46],[8,49],[9,59],[10,60],[11,58],[12,74]],
                    label: 'Unique Visits',
                    points: {
                        show: true,
                        radius: 4
                    },
                    splines: {
                        show: true,
                        tension: 0.45,
                        lineWidth: 4,
                        fill: 0
                    }
                }, {
                    data: [[1,50],[2,80],[3,90],[4,85],[5,99],[6,125],[7,114],[8,96],[9,130],[10,145],[11,139],[12,160]],
                    label: 'Page Views',
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        lineWidth: 0,
                        fillColor: { colors: [{ opacity: 0.3 }, { opacity: 0.8}] }
                    }
                }];

                var options = {
                    colors: ['#e05d6f','#61c8b8'],
                    series: {
                        shadowSize: 0
                    },
                    legend: {
                        backgroundOpacity: 0,
                        margin: -7,
                        position: 'ne',
                        noColumns: 2
                    },
                    xaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        },
                        position: 'bottom',
                        ticks: [
                            [ 1, 'JAN' ], [ 2, 'FEB' ], [ 3, 'MAR' ], [ 4, 'APR' ], [ 5, 'MAY' ], [ 6, 'JUN' ], [ 7, 'JUL' ], [ 8, 'AUG' ], [ 9, 'SEP' ], [ 10, 'OCT' ], [ 11, 'NOV' ], [ 12, 'DEC' ]
                        ]
                    },
                    yaxis: {
                        tickLength: 0,
                        font: {
                            color: '#fff'
                        }
                    },
                    grid: {
                        borderWidth: {
                            top: 0,
                            right: 0,
                            bottom: 1,
                            left: 1
                        },
                        borderColor: 'rgba(255,255,255,.3)',
                        margin:0,
                        minBorderMargin:0,
                        labelMargin:20,
                        hoverable: true,
                        clickable: true,
                        mouseActiveRadius:6
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: '%s: %y',
                        defaultTheme: false,
                        shifts: {
                            x: 0,
                            y: 20
                        }
                    }
                };

                var plot = $.plot($("#statistics-chart"), data, options);

                $(window).resize(function() {
                    // redraw the graph in the correctly sized div
                    plot.resize();
                    plot.setupGrid();
                    plot.draw();
                });
                // * Initialize Statistics chart

                //Initialize morris chart
                Morris.Donut({
                    element: 'browser-usage',
                    data: [
                        {label: 'Chrome', value: 25, color: '#00a3d8'},
                        {label: 'Safari', value: 20, color: '#2fbbe8'},
                        {label: 'Firefox', value: 15, color: '#72cae7'},
                        {label: 'Opera', value: 5, color: '#d9544f'},
                        {label: 'Internet Explorer', value: 10, color: '#ffc100'},
                        {label: 'Other', value: 25, color: '#1693A5'}
                    ],
                    resize: true
                });
                //*Initialize morris chart


                // Initialize owl carousels
                $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true,
                    responsive: true
                });

                $('#appointments-carousel').owlCarousel({
                    autoPlay: 5000,
                    stopOnHover: true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    navigation: true,
                    navigationText : ['<i class=\'fa fa-chevron-left\'></i>','<i class=\'fa fa-chevron-right\'></i>'],
                    singleItem : true
                });
                //* Initialize owl carousels


                // Initialize rickshaw chart
                var graph;

                var seriesData = [ [], []];
                var random = new Rickshaw.Fixtures.RandomData(50);

                for (var i = 0; i < 50; i++) {
                    random.addData(seriesData);
                }

                graph = new Rickshaw.Graph( {
                    element: document.querySelector("#realtime-rickshaw"),
                    renderer: 'area',
                    height: 133,
                    series: [{
                        name: 'Series 1',
                        color: 'steelblue',
                        data: seriesData[0]
                    }, {
                        name: 'Series 2',
                        color: 'lightblue',
                        data: seriesData[1]
                    }]
                });

                var hoverDetail = new Rickshaw.Graph.HoverDetail( {
                    graph: graph,
                });

                graph.render();

                setInterval( function() {
                    random.removeData(seriesData);
                    random.addData(seriesData);
                    graph.update();

                },1000);
                //* Initialize rickshaw chart

                //Initialize mini calendar datepicker
                $('#mini-calendar').datetimepicker({
                    inline: true
                });
                //*Initialize mini calendar datepicker


                //todo's
                $('.widget-todo .todo-list li .checkbox').on('change', function() {
                    var todo = $(this).parents('li');

                    if (todo.hasClass('completed')) {
                        todo.removeClass('completed');
                    } else {
                        todo.addClass('completed');
                    }
                });
                //* todo's


                //initialize datatable
                $('#project-progress').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ],
                });
                //*initialize datatable

                //load wysiwyg editor
                $('#summernote').summernote({
                    toolbar: [
                        //['style', ['style']], // no style button
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        //['insert', ['picture', 'link']], // no insert buttons
                        //['table', ['table']], // no table button
                        //['help', ['help']] //no help button
                    ],
                    height: 143   //set editable area's height
                });
                //*load wysiwyg editor
            });
        </script>
        <!--/ Page Specific Scripts -->






        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
		/*
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
			 */
        </script>

    </body>
</html>
