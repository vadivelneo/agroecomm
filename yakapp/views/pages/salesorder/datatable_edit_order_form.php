 
<html><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<link rel="shortcut icon" href="<?php echo base_url(); ?>/resources/images/fav.png">

<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
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
<script src="<?php echo base_url(); ?>/resources/js/sales_popup_script.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/vsoft_item_calculation.js"></script>
<link href="<?php echo base_url(); ?>/resources/css/style_guest.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>/resources/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/jquery.bpopup.min.js"></script>



</html>

<!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
      

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/d3/d3.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/d3/d3.layout.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/rickshaw/rickshaw.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/daterangepicker/daterangepicker.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/morris/morris.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/summernote/summernote.min.js"></script>

        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/coolclock/coolclock.js"></script>
        <script src="<?php echo base_url(); ?>/resources/assets/js/vendor/coolclock/excanvas.js"></script>
        
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



<script type="text/javascript">
function onkeyupfortotal(id)
{
    var ordered_qty = $("#item_qty_"+id).val();
	var inventory_qty = $("#item_inv_qty_"+id).val();
	
	
	 if((!isNaN(ordered_qty)) || (ordered_qty < 0))
	 {
		 if(parseFloat(ordered_qty) > parseFloat(inventory_qty))
		 {
			//$("#dc_error").text("Ordered Qty Value is More than  Inventory Qty. Stock Available: "+inventory_qty+" Only");
			//$("#item_qty_"+id).val("");
			//return false;
		 }
		 
	 }
	 else
	 {
		$("#dc_error").text("Please Enter Numeric only");
		$("#received_qty_"+id).val("");
		$("#pending_qty_"+id).val("");
		return false;
	 }
	

}
</script>


<script type="text/javascript">
$(document).ready(function()
{
	
  document.getElementById("addSalesorder").reset();

  var cont_id = $('#billing_country').val();
    $.ajax({
      type: 'POST',
      url: '<?php echo site_url('salesorder/get_state'); ?>',
      data: 'country='+cont_id,
      success: function(resp) {
          $('select#billing_state').html(resp);
			var st = $('select#billing_state').val();
			$.ajax({
			type: 'POST',
			url: '<?php echo site_url('salesorder/get_city'); ?>',
			data: {country: cont_id, state: st},
			success: function(resp) { 
			  $('select#billing_city').html(resp);
			}
      	});
      }
   });

    var cont_ship_id = $('#shipping_country').val();
  $.ajax({
    type: 'POST',
    url: '<?php echo site_url('salesorder/get_state'); ?>',
    data: 'country='+cont_ship_id,
    success: function(resp) {
      $('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesorder/get_city'); ?>',
        data: {country: cont_ship_id, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
    }
  });

    $('.cus_add_details').click(function()
     {
        
        var so_no = $("#so_no").val();
        var so_customer_name = $("#so_customer_name").val();
        var so_customer_code = $("#so_customer_code").val();
       
		var last_table_id  = $("#last_table_id ").val();
		
		var total_gross_amount  = $("#total_gross_amount ").val();
		var grand_total  = $("#grand_total ").val();
		var item_qty = $("#item_qty_ ").val();
		
		 
     
   if(so_no == "")
    {
      $('#so_no').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('so_noError').style.display = 'block';
      $('#so_no').value="";
      $('#so_no').focus();
      return false;
    }
        else
    {
      document.getElementById('so_noError').style.display = 'none';
      $('#so_no').css("border","1px solid #82B04F");
      document.getElementById("so_noError").innerHTML="";
    }
	
	if(so_customer_name == "")
    {
      $('#so_customer_name').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('so_customer_nameError').style.display = 'block';
      $('#so_customer_name').value="";
      $('#so_customer_name').focus();
      return false;
    }
        else
    {
      document.getElementById('so_customer_nameError').style.display = 'none';
      $('#so_customer_name').css("border","1px solid #82B04F");
      document.getElementById("so_customer_nameError").innerHTML="";
    }
	
	if(so_customer_code == "")
    {
      $('#so_customer_code').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('so_customer_codeError').style.display = 'block';
      $('#so_customer_code').value="";
      $('#so_customer_code').focus();
      return false;
    }
        else
    {
      document.getElementById('so_customer_codeError').style.display = 'none';
      $('#so_customer_name').css("border","1px solid #82B04F");
      document.getElementById("so_customer_codeError").innerHTML="";
    }
	
	
	
	
	
     $( "#purchse_ord_transac_date" ).datepicker({
		 dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	 $( "#purchse_ord_req_date" ).datepicker({
		  dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	 $( "#purchse_ord_valid" ).datepicker({
		  dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	 $( "#purchase_invo_po_date" ).datepicker({
		  dateFormat: 'dd-mm-yy',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
	
	$('#bill_zip_code, #ship_zip_code').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			 val = val.replace(/[^0-9\.]/g,'');
			 if(val.split('.').length>2) 
			val =val.replace(/\.+$/,"");
			 $('.pin_error').css("display","block");
			 $(this).val("");
            return false;
		}
		else
		 {
			  $('.pin_error').css("display","none");
             $(this).val(val);
		 }
		 
	});
	
	
});
	
</script>

<script>
function copy_address()
{
 
  var tb1 = document.getElementById("cus_bill_address");
  var tb2 = document.getElementById("cus_ship_address");
  var tb3 = document.getElementById("bill_zip_code");
  var tb4 = document.getElementById("ship_zip_code");
    
    
    if (tb1.value != "") {
        tb2.value = tb1.value;
		  tb4.value = tb3.value;
		  
	var $options = $("#billing_country > option").clone();
    $('#shipping_country').empty();
    $('#shipping_country').append($options);
    $('#shipping_country').val($('#billing_country').val());
	
	var $options1 = $("#billing_state > option").clone();
    $('#shipping_state').empty();
    $('#shipping_state').append($options1);
    $('#shipping_state').val($('#billing_state').val());
	
	var $options2 = $("#billing_city > option").clone();
    $('#shipping_city').empty();
    $('#shipping_city').append($options2);
    $('#shipping_city').val($('#billing_city').val());
	
		  
			return false;
    }  
    
	 
	return false;
}

 
</script>
<script>

function codevalidation()
{
	var code = $("#customer_code").val();
	var prefix = $("#customer_code_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Customer Code Should be Prefix With '+prefix);
		}
	}
}


function getcountry()
 {
 	var cout = $('select#billing_country').val();
	 
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#billing_state').html(resp);
      var st = $('select#billing_state').val();
        $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesorder/get_city'); ?>',
        data: {country: cout, state: st},
        success: function(resp) { 
          $('select#billing_city').html(resp);
        }
      });
 		}
});
}
 function getstate()
{
	var cout = $('select#billing_country').val();
	 
 	var state = $('select#billing_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#billing_city').html(resp);
 		}
	 });
}


function getship_country()
 {
 	var cout = $('select#shipping_country').val();
	
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_state'); ?>',
 		data: 'country='+cout,
 		success: function(resp) {
 			$('select#shipping_state').html(resp);
      var st_ship_id = $('select#shipping_state').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('salesorder/get_city'); ?>',
        data: {country: cout, state: st_ship_id},
        success: function(resp) {
          $('select#shipping_city').html(resp);
        }
      });
 		}
	 });
 }
 function getship_state()
{
	var cout = $('select#shipping_country').val();
	 
 	var state = $('select#shipping_state').val();
 	$.ajax({
 		type: 'POST',
 		url: '<?php echo site_url('salesorder/get_city'); ?>',
 		data: {country: cout, state: state},
 		success: function(resp) { 
			$('select#shipping_city').html(resp);
 		}
	 });
}

function codevalidation()
{
	var code = $("#so_no").val();
	var prefix = $("#so_prefix").val();
	var codelength = code.length;
	var prefixlength = prefix.length;
	var res = code.substr(0,prefixlength); 
	if(codelength >= prefixlength)
	{
		if(res != prefix)
		{
			alert('Customer Code Should be Prefix With '+prefix);
		}
	}
}

function getstore_division()
 {
 	var material_store_division_id = $('select#material_store_division_id').val();
	
 	$.ajax({
		
 		type: 'POST', 
 		url: '<?php echo site_url('product/getprostore_division'); ?>',
 		data: {material_store_division_id: material_store_division_id},
		
 		success: function(resp) {
			$('select#material_store_id').html(resp);
		}
 		
		
	 });
 	
}

</script>


		<?php
		$sessionData = $this->session->userdata('userlogin');
		//echo "<pre>"; print_r($sessionData); 
		?>
		 <?php echo $this->load->view('template/header'); ?>
		 
<section>
 <?php echo $this->load->view('pages/orderform_left_side'); ?>
	<div class="rightPanel" >
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="addSalesorder" name="addSalesorder" autocomplete="off" method="post" action="<?php echo site_url();?>/salesorder_guest/edit_orderform/<?php  echo $so_data->sales_order_id;?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">Order Form</h3>
					
					<span class="pull-right">
					
				<?php  /*	<a class="btn-primary_order" href="http://agroreforming.com/ecomm2/index.php/leads/logout" type="reset" >logout</a>
						<button class="btn-primary_order" value="Save" type="submit" name="save" id="cus_add_details"><strong>Save</strong></button>
						 <button type="reset" value="Reset" class="btn-primary_order">Reset</button>
						<a class="btn-primary_order" type="reset" onClick="javascript:window.history.back();">Cancel</a>
						*/ ?>
                    </span>
                </div>
                
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Order Form Details</th>
							<?php
							//echo "<pre>"; print_r($sessionData);
							?>
							
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        <tr>
						<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Customer Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_nameError">
                                          <div class="formErrorContent"></div>
                                          <div class="formErrorArrow"></div>
                                       </div>
                                       <div class="row-fluid input-prepend input-append">
                                        <input id="so_customer_name" name="so_customer_name" readonly type="text" value="<?php if($sessionData['user_id'] != 1)  { echo $sessionData['user_first_name']; } ?>" class="input-large" />
										<?php if($sessionData['user_id'] == 1) { ?>
                                        <span id="plus_customer_details" class="add-on cursorPointer createReferenceRecord plus">
                                              <a href="javascript:void(0);"><i class="icon-plus" title="Create"></i></a>
                                          </span>
										<?php } ?>
                                          <input type="hidden" id="so_customer_id" name="so_customer_id" value="<?php if($sessionData['user_id'] != 1)  { echo $sessionData['OFCR_ID']; } ?>">
                                          <input id="pricebook_id" name="pricebook_id" type="hidden" value="1" />
										   <input id="so_status" name="so_status" type="hidden" value="created" />
										  <input type="hidden" name="customer_discount"  id="customer_discount" value=""  />
                                          <input type="hidden" name="customer_cash_discount"  id="customer_cash_discount" value=""  />
                                          <input type="hidden" name="customer_tax_type"  id="customer_tax_type" value="gst"  />
										    <input id="so_no" type="hidden" class="input-large uppercase" name="so_no" readonly value="<?php if(isset($so_data->sales_order_number)){ echo $so_data->sales_order_number;}?>" />
										 <input id="so_no_id" type="hidden" class="input-large uppercase" name="so_no_id" readonly value="<?php if(isset($so_data->sales_order_id)){ echo $so_data->sales_order_id;}?>" />
                                    </div>
                                    </span>
                                 </div>
                             </td>
							  </tr>
							   <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Customer Code</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent"></div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       <input id="so_customer_code" readonly name="so_customer_code" type="text" value="<?php if($sessionData['user_id'] != 1)  { echo $sessionData['user_code']; }?>" class="input-large uppercase"/>
									    <input id="material_store_division_id" readonly name="material_store_division_id" type="hidden" value="1" class="input-large uppercase"/>
										  <input id="material_store_id" readonly name="material_store_id" type="hidden" value="1" class="input-large uppercase"/>
                                       
                                    </span>
                                </div>
                            </td>
						  
						</tr>
						 <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Mobile No.</label>
                            </td>
                            <td class="fieldValue medium" >
					   
						   <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent"></div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       
									    <input id="cus_mobile" readonly name="cus_mobile" type="text" value="<?php if($sessionData['user_id'] != 1)  { echo $sessionData['OFCR_MOB']; }?>" class="input-large uppercase"/>
										 
                                       
                                    </span>
                                </div>
								</td>
						</tr>
						
						<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Address</label>
                            </td>
                            <td class="fieldValue medium" >
					   
						   <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent"></div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       
									    <input style="width=250px;" id="cus_mobile" readonly name="cus_mobile" type="text" value="<?php if($sessionData['user_id'] != 1)  { echo $sessionData['OFCR_ADDRESS1'].', '.$sessionData['OFCR_ADDRESS2'].', '.$sessionData['OFCR_ADDRESS3'].', '.$sessionData['city_name'].'-'.$sessionData['OFCR_BILL_ZIP']; }?>" class="input-large uppercase"/>
										 
                                       
                                    </span>
                                </div>
								</td>
						</tr>
						<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
					   
						   <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent"></div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       
									 <select name="so_status" class="chzn-select" id="so_status">

								
								<?php
								$sessionData = $this->session->userdata('userlogin');
								if($sessionData['user_id'] == 1)  { ?>
								<option value="confirmorder"  <?php if($so_data->sales_order_status == "confirmorder") { ?> selected="selected" <?php } ?>>Confirm Order</option>
								<option value="approved" <?php if($so_data->sales_order_status == "approved") { ?> selected="selected" <?php } ?>>Approved</option>
								
								<option value="cancelled" <?php if($so_data->sales_order_status == "cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
								<?php }
								else {
								?>
								<option value="processed" <?php if($so_data->sales_order_status == "processed") { ?> selected="selected" <?php } ?>>Processed</option>
								<option value="confirmorder"  <?php if($so_data->sales_order_status == "confirmorder") { ?> selected="selected" <?php } ?>>Confirm Order</option>
								<option value="cancelled" <?php if($so_data->sales_order_status == "cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
								
								<?php } ?>

								</select>
										 
                                       
                                    </span>
                                </div>
								</td>
						</tr>
						<tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Payment Method</label>
                            </td>
                            <td class="fieldValue medium" >
							 <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
                                          <div class="formErrorContent"></div>
                                          <div class="formErrorArrow"></div>
                                     </div>
                                       
									<select onchange="upi_block()" required name="payment_status" class="chzn-select" id="payment_status">
									<option value="">Select Payment Method</option>
									<option value="COD" <?php if($so_data->sales_order_payment_mode == "COD") { ?> selected="selected" <?php } ?>>Cash On Delivery</option>
									<option value="UPI" <?php if($so_data->sales_order_payment_mode == "UPI") { ?> selected="selected" <?php } ?>>UPI Payment</option>
									</select>
									 <label class="formlabel">UPI Payment: <a target="_blank" href="<?php echo base_url(); ?>/resources/images/AGRO-GREEN-REFORMING-ORGANISATION.pdf" class="agree"><b><span style="color: #512c2c; font-weight: bold;">agro111119@icici</span>(Or)<img src="<?php echo base_url(); ?>/resources/images/upi-agro.png" alt="UPI" width="73" height="73"> </b></a></label>	 
                                       
                                    </span>
									</tr>
									<tr class="upi_block" <?php if($so_data->upi_ref_no == '') { ?> style="display:none;" <?php } else { ?> style="" <?php } ?>>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>UPI Reference No.</label>
                            </td>
                            <td class="fieldValue medium" >
							 <input id="upi_ref_no"  name="upi_ref_no" type="text" value="<?php echo $so_data->upi_ref_no; ?>" class="input-large uppercase"/>
                                    
									</tr>
                    </tbody>
                    
                </table>
						
                <br>
                
              
                 
                 <div class="row-fluid">
                 
                <span style="color:#FF0000; text-align:center; width:100%; height: 25px; float: left;" id="dc_error"></span>
                    <div class="pull-left">
                      
                          <a class="btn-primary_order" id="sales_multipleitems"><strong>Add Item</strong></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
				<input type ="hidden" value="<?php echo count($so_item_data); ?>" name="last_table_id " id="last_table_id">
				  <input type ="hidden" value="<?php echo count($so_item_data); ?>" name="count_of_items " id="count_of_items">
                <br /> 
				 <br>
                 
                   
                   
				<table id="tblList">
				<thead>
				<tr>	
                <th>SNo.</th>
                <th>SKU</th>
        		<th>Qty</th>
                <th>Price</th>
				 <th>Actions</th>
				</tr>
				</thead>
				<tbody id="disp_items">
				
				<?php //echo "<pre>";print_r($so_item_data);
				if(!empty($so_item_data)) { $itemcount = 1; foreach($so_item_data as $ITEMS) { ?>
				<tr>
				<td><a href="javascript:void(0);" ><?php  echo $itemcount;  ?></a>
				</td>
				<td>	
				<a href="javascript:void(0);" ><?php if(isset($ITEMS['product_sku'])) { echo $ITEMS['product_sku']; } ?></a>				
				<input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" type="hidden" />
				<input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_code'])) { echo $ITEMS['so_items_code']; } ?>" type="hidden" />
				<input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" />
				<input id="so_items_id_<?php echo $itemcount; ?>" name="so_items_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_id'])) { echo $ITEMS['so_items_id']; } ?>" type="hidden" />
				<input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
				</td>

				<td>
				<input id="item_qty_<?php echo $itemcount; ?>" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_ord_qty'])) { echo $ITEMS['so_items_ord_qty']; } ?>" type="text" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
				<input  name="item_mrp[<?php echo $itemcount; ?>]" id="item_mrp_<?php echo $itemcount;  ?>" class="quantity" readonly="readonly" type="hidden" value="<?php if(isset($ITEMS['so_items_mrp'])) { echo $ITEMS['so_items_mrp'];  } ?>"> </input>
				</td>

				<td>
				<input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_priceperunit'])) { echo $ITEMS['so_items_priceperunit']; } ?>" type="text" class="quantity" readonly="readonly" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
				
				<input id="item_gross_amount_with_disc_<?php echo $itemcount; ?>" name="item_gross_amount_with_disc[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gross_amount_with_discount'])) { echo $ITEMS['so_items_gross_amount_with_discount']; } ?>" type="hidden" class="quantity" readonly="readonly" /> 
			</td>
			 <td>
                            <div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_<?php echo $itemcount; ?>" onclick="return orderformrowdelete('<?php echo $itemcount; ?>');" data-item="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" data-delete="<?php echo $itemcount; ?>" title="Delete"><span class="icon-trash"></span></div>
                        </td>
			<a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_hsn_sac'])) { echo $ITEMS['so_items_hsn_sac']; } ?></a>
			<input id="item_hsn_value_<?php echo $itemcount; ?>" name="item_hsn_value[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_hsn_sac'])) { echo $ITEMS['so_items_hsn_sac']; } ?>" type="hidden" class="quantity" readonly="readonly"  />
			<input id="multiple_item_division_id_<?php echo $itemcount; ?>" name="multiple_item_division_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_division_id'])) { echo $ITEMS['so_items_division_id']; } ?>" type="hidden" />
			<input id="multiple_item_division_name_<?php echo $itemcount; ?>" name="multiple_item_division_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['division_name'])) { echo $ITEMS['division_name']; } ?>" type="hidden" />
			<input id="multiple_item_store_id_<?php echo $itemcount; ?>" name="multiple_item_store_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_store_id'])) { echo $ITEMS['so_items_store_id']; } ?>" type="hidden" />
			<input id="multiple_item_store_name_<?php echo $itemcount; ?>" name="multiple_item_store_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['store_name'])) { echo $ITEMS['store_name']; } ?>" type="hidden" />

			<input id="item_incentive_rate_<?php echo $itemcount; ?>" name="item_incentive_rate[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_incentive_rate'])) { echo $ITEMS['so_items_incentive_rate']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_incentive_total_<?php echo $itemcount; ?>" name="item_incentive_total[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_incentive_total'])) { echo $ITEMS['so_items_incentive_total']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
			<input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /> <input id="free_qty_name<?php echo $itemcount; ?>" name="free_qty_name[<?php echo $itemcount; ?>]" readonly="readonly"  value="<?php if(isset($ITEMS['so_items_free_item'])) { echo $ITEMS['so_items_free_item']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" /><input type="hidden" id="scheme_id" name="scheme_id" class="scheme_id" value="" readonly="readonly" />
			<input id="item_qty_free_<?php echo $itemcount; ?>" name="item_qty_free[<?php echo $itemcount; ?>]" readonly="readonly" value="<?php if(isset($ITEMS['so_items_free_qty'])) { echo $ITEMS['so_items_free_qty']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />

			<input id="item_batch_no_<?php echo $itemcount; ?>" readonly name="item_batch_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_batch_no'])) { echo $ITEMS['so_items_batch_no']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_inv_qty_<?php echo $itemcount; ?>" readonly name="item_inv_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_inv_qty'])) { echo $ITEMS['so_items_inv_qty']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			<input id="item_inv_id_<?php echo $itemcount; ?>" readonly name="item_inv_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_inv_id'])) { echo $ITEMS['so_inv_id']; } ?>" type="hidden" class="quantity stock_text" onkeyup="return sales_items_grid_total(event, '<?php echo $itemcount; ?>')" />
			
			<input id="item_gross_amount_<?php echo $itemcount; ?>" name="item_gross_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gross_amount'])) { echo $ITEMS['so_items_gross_amount']; } ?>" type="hidden" class="quantity" readonly="readonly" />
			<input id="item_discount_percent_<?php echo $itemcount; ?>" name="item_discount_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_discounts_percentage'])) { echo $ITEMS['so_items_discounts_percentage']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />
			<input id="item_discount_amount_<?php echo $itemcount; ?>" name="item_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_discounts_amount'])) { echo $ITEMS['so_items_discounts_amount']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />
			<input id="item_tax_amount_<?php echo $itemcount; ?>" name="item_tax_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_tax_amount'])) { echo $ITEMS['so_items_tax_amount']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />
			<input id="item_cgst_<?php echo $itemcount; ?>" name="item_cgst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gst'])) { echo $ITEMS['so_items_gst']; } ?>" type="hidden" class="quantity stock_text" />

			<input id="item_cgst_amount_<?php echo $itemcount; ?>" name="item_cgst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_gst_amt'])) { echo $ITEMS['so_items_gst_amt']; } ?>" type="hidden" class="quantity stock_text" />

			
			<input id="item_igst_<?php echo $itemcount; ?>" name="item_igst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_igst'])) { echo $ITEMS['so_items_igst']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly"/>

			<input id="item_igst_amount_<?php echo $itemcount; ?>" name="item_igst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_igst_amt'])) { echo $ITEMS['so_items_igst_amt']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />

			<input id="item_sgst_<?php echo $itemcount; ?>" name="item_sgst[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_sgst'])) { echo $ITEMS['so_items_sgst']; } ?>" type="hidden" class="quantity stock_text"/>

			<input id="item_sgst_amount_<?php echo $itemcount; ?>" name="item_sgst_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_sgst_amt'])) { echo $ITEMS['so_items_sgst_amt']; } ?>" type="hidden" class="quantity stock_text" />
			
			<input id="item_tax_percent_<?php echo $itemcount; ?>" name="item_tax_percent[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_tax_percent'])) { echo $ITEMS['so_items_tax_percent']; } ?>" type="hidden" class="quantity stock_text" readonly="readonly" />


			<input id="item_damage_discount_percentage_<?php echo $itemcount; ?>" name="item_damage_discount_percentage[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_damage_discount_perc'])) { echo $ITEMS['so_items_damage_discount_perc']; } else { echo '0';} ?>" type="hidden" class="quantity stock_text"  />
			<input id="item_damage_discount_amount_<?php echo $itemcount; ?>" name="item_damage_discount_amount[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_damage_discount_amount'])) { echo $ITEMS['so_items_damage_discount_amount']; } else { echo '0';} ?>" type="hidden" class="quantity stock_text" />
				
                        
                </tr>
					
                    <?php $itemcount++; } } ?>
                       
				</tbody>
				
				
</table>
              
                 
                
               <br/>
                 <input type="hidden" value="" name="tax_group_length" id="tax_group_length"  />
                 <div id="tax_group_calculation">

                 </div>
                <br/>
				 
			<table class="table table-bordered blockContainer showInlineTable equalSplit">
				
				
				<tbody>
				
           
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Net Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
				<input class="amount_calc" name="grand_total" id="grand_total" value="<?php if(isset($so_item_total->so_grand_total)){ echo $so_item_total->so_grand_total;}?>" type="text" readonly="readonly">
				<input class="amount_calc" name="total_tax_percentage" id="total_tax_percentage" value="<?php if(isset($so_item_total->so_total_tax_percentage)){ echo $so_item_total->so_total_tax_percentage;}?>" type="hidden" readonly="readonly">
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="hidden" value="<?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount;}?>" readonly="readonly">
					<input class="amount_calc" name="total_disocunts_amount" value="<?php if(isset($so_item_total->so_total_discount_amount)){ echo $so_item_total->so_total_discount_amount;}?>" id="total_disocunts_amount" type="hidden" readonly="readonly">
                    <input class="amount_calc" name="total_disocunts_percentage" value="<?php if(isset($so_item_total->so_total_discount_percentage)){ echo $so_item_total->so_total_discount_percentage;}?>"  id="total_disocunts_percentage" type="hidden" readonly="readonly">
                    <?php if($tax_value == 'nontaxable') { ?>
                    <input class="amount_calc" name="total_tax_percentage" id="total_tax_percentage" value="<?php if(isset($so_item_total->so_total_tax_percentage)){ echo $so_item_total->so_total_tax_percentage;}?>" type="hidden" readonly="readonly">
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="hidden" value="<?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount;}?>" readonly="readonly">
                    <?php } ?>
					<input class="amount_calc" name="total_gross_amount" id="total_gross_amount"  type="hidden" value="<?php if(isset($so_item_total->so_total_gross_amount)){ echo $so_item_total->so_total_gross_amount;}?>" readonly="readonly">
					<input class="amount_calc" name="total_tax_percentage" id="total_tax_percentage" value="<?php if(isset($so_item_total->so_total_tax_percentage)){ echo $so_item_total->so_total_tax_percentage;}?>" type="hidden" readonly="readonly">
					<input class="amount_calc" name="total_tax_amount"  id="total_tax_amount" type="hidden" value="<?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount;}?>" readonly="readonly">
					<input class="amount_calc" name="total_shipping_charges" id="total_shipping_charges"  value="<?php if(isset($so_item_total->so_total_shipping_charges)){ echo $so_item_total->so_total_shipping_charges;}?>" type="hidden" onkeyup="calculateGrandTotal(event);">
					<input class="amount_calc" name="total_shipping_tax" id="total_shipping_tax"  value="<?php if(isset($so_item_total->so_total_shipping_tax)){ echo $so_item_total->so_total_shipping_tax;}?>" type="hidden" onkeyup="calculateGrandTotal(event);">
                    <input class="amount_calc" name="total_adjustments" id="total_adjustments" type="hidden" value="<?php if(isset($so_item_total->so_adjustment)){ echo $so_item_total->so_adjustment;}?>" onkeyup="calculateGrandTotal(event);">
					<input class="amount_calc" name="cus_wallet_debit_amt" id="cus_wallet_debit_amt" type="hidden" onkeyup="calculateGrandTotal(event);" value="<?php if(isset($so_item_total->total_redeem_amount)){ echo $so_item_total->total_redeem_amount;}?>">
					<input class="amount_calc" name="total_incentive_amount" id="total_incentive_amount" value="<?php if(isset($so_item_total->total_incentive_amount)){ echo $so_item_total->total_incentive_amount;}?>" type="hidden" readonly="readonly">
				</td>
				
			</tr>
			
			
			</tbody>
				</table>
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-primary_order" type="submit" name="save" id="cus_add_details" onclick="return add_details()"><strong>Save</strong></button>
                        <button type="reset" value="Reset" class="btn-primary_order">Reset</button>
						<a class="btn-primary_order" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
         <script>
  function add_details() {
		var payment_status = $("#payment_status").val();
		var upi_ref_no = $("#upi_ref_no").val();
             
	 if(payment_status == "UPI")
    {
		if (upi_ref_no=='')
		{
      alert('Please pay online payment and enter your refernce no. otherwise choose payment method as Cash on Delivery');
	  return false;
		}
		else
		{
      return true;
		}
    }
      else
    {
      sure = confirm('Are you sure confirm your order?');
	 if (sure==true) 
	{
		
     	return true;
    }
	else 
	{
		var url = '<?php echo site_url('salesorder_guest/data_table'); ?>/';
    	window.location.href = url;
		return false;
    }
    }
  }
</script>  
<script>
function upi_block()
{
	//alert('mj jj');
	var payment_status = $("#payment_status").val();
	if(payment_status == 'UPI')
	{
		$('.upi_block').css('display','contents');
alert('Please enter your UPI Transaction No.');
	}
	else
	{
		$('.upi_block').css('display','none');
	}
}
</script>     
                <br>
            
            </form>
          </div>

      </div>
	
     <!--popup start -->
      <div id="singleitem_to_pop_up" class="pop-up-display-content singleitemscontent">
       
	 </div>
     <!--popup end -->
     
     <!--popup start -->
      <div id="multipleitems_to_pop_up" class="pop-up-display-content multipleitemscontent">
       
	 </div>
     <!--popup end -->

     <!--popup start -->
      <div id="customerdetail_to_popup" class="pop-up-display-content multipleitemscontent">

   	  </div>
     <!--popup end -->   
	 
	 <!--popup start -->
      <div id="sale_quote_to_popup" class="pop-up-display-content multipleitemscontent">

   	  </div>
     <!--popup end -->
     
	 
     
</section>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {
		
		$('#sales_singleitem').bind('click', function(e) {

			var pricebook_id = $("#pricebook_id").val();
			var so_customer_id = $("#so_customer_id").val();
			if(pricebook_id != "")
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/sales_single_item'); ?>",
					data: {pricebook:pricebook_id, customer_id: so_customer_id},
					success: function(resp) 
					{
						$("#singleitem_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#singleitem_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
			}
			else
			{
				var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				   $('#so_customer_nameError').css("display", "block");
				});
				return false;
			}
			 

		});
		
		$('#sales_multipleitems').bind('click', function(e) {

			var pricebook_id = $("#pricebook_id").val();
			var so_customer_id = $("#so_customer_id").val();
			var customer_discount = $("#customer_discount").val();
			var division_id = $("#material_store_division_id").val();
			var store_id = $("#material_store_id").val();
			
 			if(pricebook_id != "" && division_id != "" && store_id != "" && so_customer_id !='')
			{
				$.ajax({
					type: 'POST',
					url: "<?php echo site_url('salespopup/orderform_itemdetails'); ?>",
					data: {pricebook:pricebook_id, customer_id: so_customer_id, customer_discount: customer_discount,division_id: division_id,store_id:store_id},
					success: function(resp) 
					{
						$("#multipleitems_to_pop_up").html(resp);
					
								e.preventDefault();
							$('#multipleitems_to_pop_up').bPopup({
								position: [10, 10], //x, y
								closeClass:'close',
								follow: [true, true],
								modalClose: true
							});				 
					}
				});
			}
			else
			{
				if(so_customer_id == "")
				{
					var body = $("html, body");
					body.animate({scrollTop:0}, '500', 'swing', function() { 
					   $('#so_customer_nameError').css("display", "block");
					});
					return false;
				}
               else
			   {
					  document.getElementById('so_customer_nameError').style.display = 'none';
					  $('#so_customer_id').css("border","1px solid #82B04F");
					  document.getElementById("so_customer_nameError").innerHTML="";
			   }
				if(division_id == "")
				{
					var body = $("html, body");
					body.animate({scrollTop:0}, '500', 'swing', function() { 
					   $('#division_nameError').css("display", "block");
					});
					return false;
				}
				else
			   {
					  document.getElementById('division_nameError').style.display = 'none';
					  $('#material_store_division_id').css("border","1px solid #82B04F");
					  document.getElementById("division_nameError").innerHTML="";
			   }
				if(store_id == "")
				{
					var body = $("html, body");
					body.animate({scrollTop:0}, '500', 'swing', function() { 
					   $('#store_nameError').css("display", "block");
					});
					return false;
				}
				else
			   {
					  document.getElementById('store_nameError').style.display = 'none';
					  $('#material_store_id').css("border","1px solid #82B04F");
					  document.getElementById("store_nameError").innerHTML="";
			   }
			}
			 

		});
		
		
		$('#plus_customer_details').bind('click', function(e) {
			
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('salespopup/customerpopup'); ?>',
				data: {customer:""},
				success: function(resp) 
				{
					$("#customerdetail_to_popup").html(resp);
						e.preventDefault();
						$('#customerdetail_to_popup').bPopup({
						position: [10, 10], //x, y
						closeClass:'close',
						follow: [true, true],
						modalClose: true
					});			 
				}
		});
		
		return false;
		
		
		
		
		});
		
		$('#plus_so_quote_details').bind('click', function(e) {
			
			$.ajax({
				type: 'POST',
				url: '<?php echo site_url('salesorder/salesquotepopup'); ?>',
				data: {customer:""},
				success: function(resp) 
				{
					$("#sale_quote_to_popup").html(resp);
						//	alert(resp);return false;
						e.preventDefault();
						$('#sale_quote_to_popup').bPopup({
						position: [350, 50], //x, y
						closeClass:'close',
						follow: [true, true],
						modalClose: true
					});			 
				}
		});
		return false;
		
		
		
		
		});

	});
})(jQuery);
</script>
