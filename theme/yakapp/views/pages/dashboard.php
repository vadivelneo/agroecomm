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
                                    <a href="index.html"><i class="fa fa-home"></i> AGRO</a>
                                </li>
                                <li>
                                    <a href="index.html">Dashboard</a>
                                </li>
                            </ul>

                            <div class="page-toolbar">
                                <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
                                    <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
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
                                        <div class="col-xs-4">
                                            <i class="fa fa-users fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">3 659</p>
                                            <span>New Users</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-greensea">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                        <!-- /col -->
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
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-shopping-cart fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">19 364</p>
                                            <span>New Orders</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-lightred">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

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
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-usd fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">165 984</p>
                                            <span>Sales</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-blue">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

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
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <i class="fa fa-eye fa-4x"></i>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-8">
                                            <p class="text-elg text-strong mb-0">29 651</p>
                                            <span>Visits</span>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <div class="back bg-slategray">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-cog fa-2x"></i> Settings</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-chain-broken fa-2x"></i> Content</a>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-xs-4">
                                            <a href=#><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                            </div>
                        </div>
                        <!-- /col -->

                    </div>
                    <!-- /row -->




                    <!-- row -->
                    <div class="row">



                        <!-- col -->
                        <div class="col-md-8">

                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header bg-greensea dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Statistics </strong>Graph</h1>
                                    <ul class="controls">
                                        <li>
                                            <a role="button" tabindex="0" class="pickDate">
                                                <span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                                            </a>
                                        </li>
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

                                <!-- tile widget -->
                                <div class="tile-widget bg-greensea">
                                    <div id="statistics-chart" style="height: 250px;"></div>
                                </div>
                                <!-- /tile widget -->

                                <!-- tile body -->
                                <div class="tile-body">

                                    <!-- row -->
                                    <div class="row">


                                        <!-- col -->
                                        <div class="col-md-8 col-sm-12">

                                            <h4 class="underline custom-font mb-20"><strong>Actual</strong> Statistics</h4>

                                            <!-- row -->
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-lg-4 text-center">
                                                    <div class="easypiechart"
                                                         data-percent="100"
                                                         data-size="140"
                                                         data-bar-color="#418bca"
                                                         data-scale-color="false"
                                                         data-line-cap="round"
                                                         data-line-width="4"
                                                         style="width: 140px; height: 140px;">

                                                        <i class="fa fa-usd fa-4x text-blue" style="line-height: 140px;"></i>

                                                    </div>
                                                    <p class="text-uppercase text-elg mt-20 mb-0"><strong class="text-blue">6,175</strong> <small class="text-lg text-light text-default lt">Sales</small></p>
                                                    <p class="text-light"><i class="fa fa-caret-up text-success"></i> 18% this month</p>
                                                </div>
                                                <!-- /col
                                                <!-- col -->
                                                <div class="col-lg-4 text-center">
                                                    <div class="easypiechart"
                                                         data-percent="75"
                                                         data-size="140"
                                                         data-bar-color="#e05d6f"
                                                         data-scale-color="false"
                                                         data-line-cap="round"
                                                         data-line-width="4"
                                                         style="width: 140px; height: 140px;">

                                                        <i class="fa fa-eye fa-4x text-lightred" style="line-height: 140px;"></i>
                                                        <p class="text-uppercase text-elg mt-20 mb-0"><strong class="text-lightred">8,213</strong> <small class="text-lg text-light text-default lt">Visits</small></p>
                                                        <p class="text-light"><i class="fa fa-caret-down text-warning"></i> 25% this month</p>
                                                    </div>
                                                </div>
                                                <!-- /col -->
                                                <!-- col -->
                                                <div class="col-lg-4 text-center">
                                                    <div class="easypiechart"
                                                         data-percent="46"
                                                         data-size="140"
                                                         data-bar-color="#16a085"
                                                         data-scale-color="false"
                                                         data-line-cap="round"
                                                         data-line-width="4"
                                                         style="width: 140px; height: 140px;">

                                                        <i class="fa fa-user fa-4x text-greensea" style="line-height: 140px;"></i>
                                                        <p class="text-uppercase text-elg mt-20 mb-0"><strong class="text-greensea">632</strong> <small class="text-lg text-light text-default lt">Users</small></p>
                                                        <p class="text-light"><i class="fa fa-caret-down text-danger"></i> 61% this month</p>
                                                    </div>
                                                </div>
                                                <!-- /col -->
                                            </div>
                                            <!-- /row -->

                                        </div>
                                        <!-- /col -->



                                        <!-- col -->
                                        <div class="col-md-4 col-sm-12">

                                            <h4 class="underline custom-font"><strong>Visitors</strong> Statistics</h4>

                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title">America</div>
                                                    <div class="description">visitor from america</div>
                                                </div>
                                                <div class="status pull-right">
                                                    <span>40</span>%
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="progress-xs not-rounded progress">
                                                  <div class="progress-bar progress-bar-dutch" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40%</span>
                                                  </div>
                                                </div>
                                            </div>

                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title">Europe</div>
                                                    <div class="description">visitor from europe</div>
                                                </div>
                                                <div class="status pull-right">
                                                    <span>38</span>%
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="progress-xs not-rounded progress">
                                                  <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%">
                                                    <span class="sr-only">38%</span>
                                                  </div>
                                                </div>
                                            </div>

                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title">Asia</div>
                                                    <div class="description">visitor from asia</div>
                                                </div>
                                                <div class="status pull-right">
                                                    <span>12</span>%
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="progress-xs not-rounded progress">
                                                  <div class="progress-bar progress-bar-lightred" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%">
                                                    <span class="sr-only">12%</span>
                                                  </div>
                                                </div>
                                            </div>

                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title">Africa</div>
                                                    <div class="description">visitor from africa</div>
                                                </div>
                                                <div class="status pull-right">
                                                    <span>7</span>%
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="progress-xs not-rounded progress">
                                                  <div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
                                                    <span class="sr-only">7%</span>
                                                  </div>
                                                </div>
                                            </div>

                                            <div class="progress-list">
                                                <div class="details">
                                                    <div class="title">Other</div>
                                                    <div class="description">visitor from other</div>
                                                </div>
                                                <div class="status pull-right">
                                                    <span>6</span>%
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="progress-xs not-rounded progress">
                                                  <div class="progress-bar progress-bar-hotpink" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%">
                                                    <span class="sr-only">6%</span>
                                                  </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /col -->




                                    </div>
                                    <!-- /row -->

                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->



                        <!-- col -->
                        <div class="col-md-4">

                            <!-- tile -->
                            <section class="tile" fullscreen="isFullscreen02">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Browser </strong>Usage</h1>
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

                                <!-- tile widget -->
                                <div class="tile-widget">
                                    <div id="browser-usage" style="height: 250px"></div>
                                </div>
                                <!-- /tile widget -->

                                <!-- tile body -->
                                <div class="tile-body p-0">

                                    <div class="panel-group icon-plus" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default panel-transparent">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <span><i class="fa fa-minus text-sm mr-5"></i> This Month</span>
                                                        <span class="badge pull-right bg-lightred">3</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <table class="table table-no-border m-0">
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Chrome</td>
                                                            <td>6985</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Other</td>
                                                            <td>2697</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Safari</td>
                                                            <td>3597</td>
                                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Firefox</td>
                                                            <td>2145</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Internet Explorer</td>
                                                            <td>1854</td>
                                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Opera</td>
                                                            <td>654</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default panel-transparent">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <span><i class="fa fa-minus text-sm mr-5"></i> Last Month</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <table class="table table-no-border m-0">
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Chrome</td>
                                                            <td>6985</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Other</td>
                                                            <td>2697</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Safari</td>
                                                            <td>3597</td>
                                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Firefox</td>
                                                            <td>2145</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Internet Explorer</td>
                                                            <td>1854</td>
                                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Opera</td>
                                                            <td>654</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default panel-transparent">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <span><i class="fa fa-minus text-sm mr-5"></i> This Year</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <table class="table table-no-border m-0">
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Chrome</td>
                                                            <td>6985</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Other</td>
                                                            <td>2697</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Safari</td>
                                                            <td>3597</td>
                                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Firefox</td>
                                                            <td>2145</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Internet Explorer</td>
                                                            <td>1854</td>
                                                            <td><i class="fa fa-caret-down text-danger"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Opera</td>
                                                            <td>654</td>
                                                            <td><i class="fa fa-caret-up text-success"></i></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->


                    </div>
                    <!-- /row -->





                    <!-- row -->
                    
                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-8">
                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Project </strong>Progress</h1>
                                    <ul class="controls">
                                        <li>
                                            <a role="button" tabindex="0" class="pickDate">
                                                <span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                                            </a>
                                        </li>
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
                                <div class="tile-body table-custom">

                                    <div class="table-responsive">
                                        <table class="table table-custom" id="project-progress">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project</th>
                                                <th>Priority</th>
                                                <th style="width: 200px;">Status</th>
                                                <th style="width: 60px;" class="text-right no-sort">Chart</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Graphic layout for client</td>
                                                <td><small class="text-danger">High Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%;"></div>
                                                    </div>
                                                    <small>42%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="1,3,2,3,5,6,8,5,9,8"
                                                          sparkType="bar"
                                                          sparkBarColor="#cd97eb"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Make website responsive</td>
                                                <td><small class="text-success">Low Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                                    </div>
                                                    <small>89%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="2,5,3,4,6,5,1,8,9,10"
                                                          sparkType="bar"
                                                          sparkBarColor="#a2d200"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Clean html/css/js code</td>
                                                <td><small class="text-danger">High Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                                    </div>
                                                    <small>23%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="5,6,8,2,1,6,8,4,3,5"
                                                          sparkType="bar"
                                                          sparkBarColor="#ffc100"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Database optimization</td>
                                                <td><small class="text-warning">Normal Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
                                                    </div>
                                                    <small>56%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="2,9,8,7,5,9,2,3,4,2"
                                                          sparkType="bar"
                                                          sparkBarColor="#16a085"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Database migration</td>
                                                <td><small class="text-success">Low Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;"></div>
                                                    </div>
                                                    <small>48%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="3,5,6,2,8,9,5,4,3,2"
                                                          sparkType="bar"
                                                          sparkBarColor="#1693A5"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Email server backup</td>
                                                <td><small class="text-warning">Normal Priority</small></td>
                                                <td>
                                                    <div class="progress-xxs not-rounded mb-0 inline-block progress" style="width: 150px; margin-right: 5px">
                                                        <div class="progress-bar progress-bar-greensea" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                                    </div>
                                                    <small>10%</small>
                                                </td>
                                                <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="7,8,6,4,3,5,8,9,10,7"
                                                          sparkType="bar"
                                                          sparkBarColor="#3f4e62"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->
                        </div>
                        <!-- /col -->





                        <!-- col -->
                        <div class="col-md-4">
                            <!-- tile -->
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Users </strong>Feed</h1>
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

                                <!-- tile widget -->
                                <div class="tile-widget">

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-lg-6">
                                            <div class="media mb-20">
                                                <div class="pull-left thumb">
                                                    <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/ici-avatar.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading mb-0">Imrich <strong>Kamarel</strong></h4>
                                                    <small class="text-lightred">UI/UX Designer</small>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-xs-4 text-center b-r b-solid">
                                                    <small class="text-lightred"><i class="fa fa-heart-o"></i> 125</small>
                                                </div>
                                                <!-- /col -->
                                                <!-- col -->
                                                <div class="col-xs-4 text-center b-r b-solid">
                                                    <small class="text-greensea"><i class="fa fa-star-o"></i> 67</small>
                                                </div>
                                                <!-- /col -->
                                                <!-- col -->
                                                <div class="col-xs-4 text-center">
                                                    <small class="text-blue"><i class="fa fa-comment-o"></i> 26</small>
                                                </div>
                                                <!-- /col -->
                                            </div>
                                            <!-- /row -->
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-lg-6">
                                            <dl class="text-sm">
                                                <dt>About: </dt>
                                                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</dd>
                                                <dt>Hobbies: </dt>
                                                <dd>Sleep,  games,  animals, nature</dd>
                                                <dt>Skills: </dt>
                                                <dd>jquery, html, css, angularjs</dd>
                                                <dt>Rating: </dt>
                                                <dd class="text-lightred"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></dd>
                                            </dl>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <!-- /tile widget -->


                                <!-- tile body -->
                                <div class="tile-body p-0">



                                    <div role="tabpanel">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tabs-dark" role="tablist">
                                            <li role="presentation" class="active"><a href="#feed-all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
                                            <li role="presentation"><a href="#feed-superheroes" aria-controls="superheroes" role="tab" data-toggle="tab">Superheroes</a></li>
                                            <li role="presentation"><a href="#feed-friends" aria-controls="friends" role="tab" data-toggle="tab">Friends</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">

                                            <div role="tabpanel" class="tab-pane active" id="feed-all">
                                                <div class="wrap-reset" style="max-height: 216px;overflow:auto;">
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar6.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Nico <strong>Vulture</strong></p>
                                                            <small class="text-lightred">Referent</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="feed-superheroes">
                                                <div class="wrap-reset" style="max-height: 216px;overflow:auto;">
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar6.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Nico <strong>Vulture</strong></p>
                                                            <small class="text-lightred">Referent</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane" id="feed-friends">
                                                <div class="wrap-reset" style="max-height: 216px;overflow:auto;">
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar5.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Roger <strong>Flopple</strong></p>
                                                            <small class="text-lightred">Manager</small>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar4.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Deel <strong>McApple</strong></p>
                                                            <small class="text-lightred">Print master</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar8.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Anna <strong>Opichia</strong></p>
                                                            <small class="text-lightred">lead designer</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar7.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Bobby <strong>Socks</strong></p>
                                                            <small class="text-lightred">CEO</small>
                                                        </div>
                                                    </div>
                                                    <div class="media ">
                                                        <div class="pull-left thumb">
                                                            <img class="media-object img-circle" src="<?php echo base_url(); ?>/assets/images/random-avatar6.jpg" alt="">
                                                        </div>
                                                        <div class="pull-right mt-10">
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm mr-5" style="width:30px;"><i class="fa fa-pencil"></i></button>
                                                            <button type="button" class="btn btn-rounded-20 btn-default btn-sm" style="width:30px;"><i class="fa fa-eye" style="margin-left: -2px;"></i></button>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading mb-0 mt-10">Nico <strong>Vulture</strong></p>
                                                            <small class="text-lightred">Referent</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->
                        </div>
                        <!-- /col -->




                    </div>
                    <!-- /row -->





                    <!-- row -->
                    

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
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

    </body>
</html>
