<?php //echo "<pre>";print_r($invoice_notifi);exit?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/resources/js/bootstrap.min.js"></script>
<section style="width:100%;">
  <div class="rightPanel" style="width:100%;">
    <div class='container-fluid editViewContainer'>
     
        <div class="container" style="margin-right:600px">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo base_url(); ?>/resources/images/slider1.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="<?php echo base_url(); ?>/resources/images/slider2.jpg" alt="Chicago" style="width:100%;">
      </div>
	  
     <div class="item">
        <img src="<?php echo base_url(); ?>/resources/images/slider3.jpg" alt="Chicago" style="width:100%;">
      </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
		 <div class="dashboard_grid">
      <div  style="background:#3e70c9;" class="dash_head">
          <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Direct Downline Count<a href="#"></h2></br>
		   <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php echo $count_downline_user ; ?>   </h2>
        </div>
       
      </div>
	 
      
      <div  class="dashboard_grid">
        <div style="background:#f59345;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Self Purchase Amount </h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($self_purchase_amount_user as $SLs) {  echo $SLs['so_amount']; } ?>  </h2>
        </div>
        
      </div>
      
      <div class="dashboard_grid">
        <div style="background:#f44236;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Incentive Amount</h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($incentive_amount_user as $SLs) {  echo $SLs['TOTAL_INCENTIVE_AMT']; } ?>  </h2>
        </div>
        
      </div>
	  
	   <div class="dashboard_grid">
        <div style="background:#ff8080;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Redeem Amount</h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($redeem_amount_user as $CLs) {  echo $CLs['USR_REDEEM_AMT']; } ?>  </h2>
        </div>
        
      </div>
     
       <div class="dashboard_grid">
        <div style="background:#cf8080;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Available Amount</h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($wallet_amount_user as $CLs) {  echo $CLs['TOTAL_INCENTIVE_AMT'] - $CLs['USR_REDEEM_AMT']; } ?> </h2>
        </div>
        
      </div>
       <div class="dashboard_grid">
        <div style="background:#43b968;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Recent Joinig Members</h2></br>
		  <table>
              <tbody>
                <tr>
                  <th nowrap="">User Name &nbsp;&nbsp;</th>
                  <th nowrap="">User Id&nbsp;&nbsp;</th>
                  <th nowrap="">City&nbsp;&nbsp;</th>
                 </tr>
              </tbody>
              <tbody id="items_list">
              <?php if(!empty($downline_user_details)) { $itemcount = 1; foreach($downline_user_details as $CRE) {  ?>
                <tr>
                  <td> <?php if(isset($CRE['OFCR_FST_NME'])) { echo $CRE['OFCR_FST_NME']; } ?> </td>
                  <td> <?php if(isset($CRE['OFCR_USR_VALUE'])) { echo $CRE['OFCR_USR_VALUE']; } ?> </td>
                  <td>  <?php if(isset($CRE['CTY_NME'])) { echo $CRE['CTY_NME']; } ?> </td>
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
	  <div class="dashboard_grid">
        <div style="background:#cf8080;margin-bottom: 12px;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Promotion Link</h2></br>
		  <?php if(!empty($user_details)) { $itemcount = 1; foreach($user_details as $CRE) { 

			$qry_stng = $CRE['OFCR_USR_VALUE'].'@'.$CRE['OFCR_MOB'].'@'.$CRE['OFCR_NAME'];
		  ?>
		 <input type="text" readonly style="width:25px;color:#cf8080;border: 1px solid #cf8080;background: #cf8080;;" value="http://agroreforming.com/ecomm/index.php/genelogy_guest/officerform?id=<?php echo $qry_stng; ?>" id="myInput">
		  <a style="margin-left: 15px;" target="_blank" href="https://web.whatsapp.com/send?phone=+91<?php echo $CRE['OFCR_MOB']; ?>&text=http://agroreforming.com/ecomm/index.php/genelogy_guest/officerform?id=<?php echo $qry_stng; ?>"><img src="<?php echo base_url(); ?>/resources/images/whatsapp.png" alt="Whatsapp" width="50" height="50"></a> 
		 
<button onclick="myFunction()"><img src="<?php echo base_url(); ?>/resources/images/copyshare.PNG" alt="Copy Link" title="Copy Link" width="50" height="50"></button>
		   
  <?php $itemcount++; } } else {?>
                 	<tr>
                  <td colspan="3"> No Result Found </td>
                   </tr>
                  <?php  } ?>
        </div>
	  
    </div>
  </div>
</section>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  //alert(copyText);
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Link Copied");
}
</script>