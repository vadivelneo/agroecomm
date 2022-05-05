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

				
				 <?php echo $this->load->view('pages/enrollement_left_side'); ?>
                
            
<section id="content">

                <div class="page page-forms-common">

                    <div class="pageheader">

                        <h2>New Enrollment <span></span></h2>
<div class="sessionMsg" style="font-size: 22px;color: red;text-align: center;margin-bottom: 7px;">
        	<?php echo $this->session->flashdata('message'); ?>
        </div>
                        <div class="page-bar">

                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="#"><i class="fa fa-home"></i> AGRO</a>
                                </li>
                                <li>
                                    <a href="#">ADD</a>
                                </li>
                                <li>
                                    <a href="#">Enrollment</a>
                                </li>
                            </ul>
                            
                        </div>

                    </div>

                    <!-- row -->
                    <div class="row">
                        <!-- col -->
                        <div class="col-md-12">
                            <section class="tile">
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong></strong>Placement Details</h1>
                                </div>
                                <div class="tile-body">

                                   <form id="validate-enhanced" class="form-horizontal" role="form" action="<?php echo site_url('genelogy/addnewofficer'); ?>" id="enrollment" class="form parsley-form" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="input01" class="col-sm-1 control-label">Referal Id *</label>
                                            <div class="col-sm-3">
                                               
												 <input type="text" id="Sponsor" name="Sponsor" onkeyup="ajax_sponsorid()" required class="form-control" data-required="true" >
                                            </div>
											<label for="input01" class="col-sm-1 control-label">Mobile</label>
                                            <div class="col-sm-3">
                                                <input type="text" id="enroll_mobile" name="enroll_mobile" onkeyup="ajax_mobile()" class="form-control" data-required="true" >
                                            </div>
											<label for="input01" class="col-sm-1 control-label">Name</label>
                                            <div class="col-sm-3">
                                               <input type="text" id="enroll_name" name="enroll_name" class="form-control" data-required="true" >
                                            </div>
                                        </div>
										
										 <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong></strong>Enrollment</h1>
									</div> </br>
									<div class="form-group">
                                            <label for="input01" required class="col-sm-2 control-label">First Name *</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="firstname" name="firstname" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-4">
                                               <input type="text"  id="lastname" name="lastname" class="form-control">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Middle Name*</label>
                                            <div class="col-sm-4">
                                                <input type="text" required id="middlename" name="middlename" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">PAN Card NO</label>
                                            <div class="col-sm-4">
                                               <input type="text" id="pancard" name="pancard" class="form-control">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Mobile No *</label>
                                            <div class="col-sm-4">
                                               <input type="text" required id="mobile" name="mobile" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Date Of Birth *</label>
                                            <div class="col-sm-4">
                                                <input type="date" required id="DOB" name="DOB" class="form-control parsley-validated">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Display Name</label>
                                            <div class="col-sm-4">
                                               <input type="text" id="displayname" name="displayname" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Aadhar No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="textbox" name="aadhar_no" id="aadhar_no">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Enrollment Type *</label>
                                            <div class="col-sm-4">
<input  type="radio" name="enrollementtype" value="business" />
                    <label>BUISNESS </label>
                    <input  type="radio" name="enrollementtype" value="individual" />
                    <label>INDIVIDUAL</label>
                                            </div>
											
											
                                        </div>
										
										 <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong></strong> Nominee Details
</h1>
									</div> </br>
                                    <div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">First Name </label>
                                            <div class="col-sm-4">
                                                <input type="text" id="spouse_firstname" name="spouse_firstname" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-4">
                                               <input type="text" id="spouse_lastname" name="spouse_lastname" class="form-control">
                                            </div>
											
                                        </div>
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Relationship</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="spouse_middlename" name="spouse_middlename" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">PAN Card NO</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="spouse_pancard" name="spouse_pancard" class="form-control">
                                            </div>
											
                                        </div>
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Mobile No</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="spouse_mobile" name="spouse_mobile" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Aadhar No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="textbox"  name="spouse_aadhar_no" id="spouse_aadhar_no">
                                            </div>
											
                                        </div>
										 <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong></strong> Address Details
</h1>
									</div> </br>
                                    <div class="form-group">
                                            <label for="input01" required class="col-sm-2 control-label">Address 1 *</label>
                                            <div class="col-sm-4">
                                                 <input type="text" id="addressone" name="addressone" class="form-control">
                                            </div>
											<label for="input01" required class="col-sm-2 control-label">Address 2* 
</label>
                                            <div class="col-sm-4">
                                               <input type="text" id="addresstwo" name="addresstwo" class="form-control">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Address 3</label>
                                            <div class="col-sm-4">
 <input type="text" id="addressthree" name="addressthree" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Country *</label>
                                            <div class="col-sm-4">
                                               <select required name="country" id="country" class="form-control" onchange="getcountry()">
                      <option value="">Please Select Country</option>
                     
                                <?php foreach($ctry as $Con) { 
                 
                ?>
                                    <option value="<?php echo $Con['CNTRY_ID']; ?>"> <?php echo $Con['CNTRY_NME']; ?></option>
                                <?php } ?>
                  </select>
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">State *</label>
                                            <div class="col-sm-4">
                                                 <select required name="state" id="state" class="form-control"  onchange="getstate()" data-required="true">
                    <option value="">Please Select State</option>
                    </select>
                                            </div>
											<label for="input01" class="col-sm-2 control-label">City *</label>
                                            <div class="col-sm-4">
                                              <select name="city" required id="city" class="form-control" >
                    <option value="">Please Select City</option>
                  </select>
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Postal Code *</label>
                                            <div class="col-sm-4">
                                                <input type="text" required id="pinCode" name="pinCode" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Email Id</label>
                                            <div class="col-sm-4">
                                               <input type="text" id="email" name="email" class="form-control">
                                            </div>
											
                                        </div>
										<div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong></strong>Bank Details
</h1>
									</div> </br>
                                    <div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Account Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="accountHolderName" name="accountHolderName" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Account Number</label>
                                            <div class="col-sm-4">
                                              <input type="text" id="accountno" name="accountno" class="form-control">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Bank Name</label>
                                            <div class="col-sm-4">
                                                 <input type="text" id="bankName" name="bankName" class="form-control">
                                            </div>
											<label for="input01" class="col-sm-2 control-label">IFSC Code</label>
                                            <div class="col-sm-4">
                                              <input type="text" id="IFSCNo" name="IFSCNo" class="form-control">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Account Type</label>
                                            <div class="col-sm-4">
                                                 <input  type="radio" name="AcType" value="saving"  />
                    <label>SAVINGS </label>
                    <input  type="radio" name="AcType" value="current" />
                    <label>CURRENT</label>
                                            </div>
											<label for="input01" class="col-sm-2 control-label">Branch Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="BranchName" name="BranchName" class="form-control">
                                            </div>
											
                                        </div>
										
										<div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">Branch Address 
</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="BranchAddress" name="BranchAddress" class="form-control" data-required="true">
                                            </div>
											
                                        </div>
										<div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong></strong>Attachments
</h1>
									</div> </br>
                                    <div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">PAN CARD</label>
                                            <div class="col-sm-4">
                                              <input type="file" name="pan_card" class="textbox" size="40" accept=".pdf" >
                                            </div>
											<label for="input01" class="col-sm-2 control-label">AADHAR</label>
                                            <div class="col-sm-4">
                                             <input type="file" class="textbox" name="aadhar_xerox" size="40" accept=".pdf" >
                                            </div>
											
                                        </div>
										
										 <div class="form-group">
                                            <label for="input01" class="col-sm-2 control-label">PASSBOOK</label>
                                            <div class="col-sm-4">
                                               <input type="file"  class="textbox" name="passbook_xerox" size="40" accept=".pdf" >
                                            </div>
											<label for="input01" class="col-sm-2 control-label">PHOTO</label>
                                            <div class="col-sm-4">
                                              <input type="file" class="textbox" name="user_photo" size="40"  accept=".pdf" >
          										
                                        </div>
										
                                </div>
								<div class="form-group col-sm-12">
     <input required type="checkbox" name="agree" value="1">
   <label class="formlabel">I have read and agree to the <a target="_blank" href="<?php echo base_url(); ?>/resources/images/terms_conditions_enrollment.pdf" class="agree"><b>Terms &amp; Conditions</b></a></label>
      
 
                  <button type="submit" class="btn btn-primary" name="newOfficer" id="newOfficer">Submit</button>
                </div>
				</br>
  </form>

                                </div>
                               
                            </section>
                           
                        </div>
                    </div>
                 </div>
                
            </section>

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


    </body>
</html>
<script>

function ajax_sponsorid()
 {
	$('#enroll_mobile').val('')
	$('#enroll_name').val('')
    var Sponsorid = $('#Sponsor').val();
    //alert(Sponsorid);
    $.ajax({
    type: 'POST',
    url: '<?php echo site_url('genelogy/getEnrollmentDetails'); ?>',
    data: {Sponsorid: Sponsorid},
    success: function(resp) {
		//alert(resp);
		//var result=$(resp).split('|');
		var res = resp.split("$/#");
		//alert(res[1]);
	 $('#enroll_name').val(res[0]);
    $('#enroll_mobile').val(res[1]);
    }
    });
 }
 
 function ajax_mobile()
 {
	//alert('df');
	$('#Sponsor').val('')
	$('#enroll_name').val('')
    var enroll_mobile = $('#enroll_mobile').val();
    //alert(enroll_mobile);
    $.ajax({
    type: 'POST',
    url: '<?php echo site_url('genelogy/getEnrollmobileDetails'); ?>',
    data: {enroll_mobile: enroll_mobile},
    success: function(resp) {
		//alert(resp);
		//var result=$(resp).split('|');
		var res = resp.split("$/#");
		//alert(res[1]);
	 $('#Sponsor').val(res[1]);
    $('#enroll_name').val(res[0]);
    }
    });
 }
 
function getcountry()
 {
    var cout = $('select#country').val();

    $.ajax({
    type: 'POST',
    url: '<?php echo site_url('genelogy/getstate'); ?>',
    data: 'country='+cout,
    success: function(resp) {
    $('select#state').html(resp);
    }
    });
 }
 function getstate()
{
    var cout = $('select#country').val();

    var state = $('select#state').val();
    $.ajax({
    type: 'POST',
    url: '<?php echo site_url('genelogy/getcityList'); ?>',
    data: {country: cout, state: state},
    success: function(resp) { 
      $('select#city').html(resp);
    }
    });
}

 


</script>