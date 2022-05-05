

    <head>

        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/vendor/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/rickshaw/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/assets/js/vendor/summernote/summernote.css">

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

        <div id="wrap" class="animsition">

            <!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
            
            <div id="controls">

                <aside id="sidebar">


                    <div id="sidebar-wrap">

                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navigation <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">


                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                            <li class="active"><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                                            
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/genelogy/officerform" role="button" tabindex="0"><i class="fa fa-list"></i> <span>Enrollment</span></a>
                                                <ul>
                                                    <li><a href="<?php echo base_url(); ?>index.php/genelogy/officerform"><i class="fa fa-caret-right"></i> New Enrollement</a></li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i>Direct Downline Report</a></li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i>Enrollement Report</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-pencil"></i> <span>Network</span></a>
                                                <ul>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Level Report</a></li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Purchase Report</a></li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Tree View</a></li>
													<li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Genelogy</a></li>
                                                   
                                                    
                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-shopping-cart"></i> <span>Self Purchase</span> </a>
                                                <ul>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Self Purchase</a></li>
													  <li><a href="<?php echo base_url(); ?>index.php/salesorder_guest/data_table"><i class="fa fa-caret-right"></i> Order Form</a></li>
                                                    
                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-table"></i> <span>Wallets</span></a>
                                                <ul>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Incentive Report</a></li>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Transaction Report</a></li>
                                                   
                                                </ul>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0"><i class="fa fa-desktop"></i> <span>Awards & Rewards</span></a>
                                                <ul>
                                                    <li><a href="<?php echo base_url(); ?>index.php/home/home_list"><i class="fa fa-caret-right"></i> Awards & Rewards</a></li>
                                                   
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/home/home_list" role="button" tabindex="0"><i class="fa fa-delicious"></i> <span>Ecommerce</span></a>
                                               
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/home/home_list" role="button" tabindex="0"><i class="fa fa-delicious"></i> <span>Plan</span></a>
                                              
                                            </li>

                                        </ul>
                                        <!--/ NAVIGATION Content -->


                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->

                <!-- =================================================
                ================= RIGHTBAR Content ===================
                ================================================== -->
                <aside id="rightbar">

                    

                </aside>
               
            </div>
            

        </div>
       
        <!--/ custom javascripts -->

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
        
    </body>
</html>
