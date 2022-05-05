<?php //echo "<pre>";print_r($invoice_notifi);exit?>
<section style="width:100%;">
  <div class="rightPanel" style="width:100%;">
    <div class='container-fluid editViewContainer'>
     
         <div class="dashboard_grid">
      <div  style="background:#3e70c9;" class="dash_head">
          <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Total Vendors<a href="#"></h2></br>
		   <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php echo $vendor_count ; ?>  </h2>
        </div>
       
      </div>
	  <div class="dashboard_grid">
        <div style="background:#43b968;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Total Customers </h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php echo $officer_count ; ?> </h2>
        </div>
        
      </div>
      <div class="dashboard_grid">
        <div style="background:#895d5d;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Total Purchase Amount </h2></br>
		 <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($purchase_amount as $MET) {  echo $MET['po_amount']; } ?> </h2>
        </div>
        
      </div>
      
      <div  class="dashboard_grid">
        <div style="background:#f59345;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Total Sales Amount </h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($sales_amount as $SLs) {  echo $SLs['so_amount']; } ?>  </h2>
        </div>
        
      </div>
      
      <div class="dashboard_grid">
        <div style="background:#f44236;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Total Customers Incentive Amount</h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($cus_incentive as $SLs) {  echo $SLs['TOTAL_INCENTIVE_AMT']; } ?> </h2>
        </div>
        
      </div>
	  
	   <div class="dashboard_grid">
        <div style="background:#ff8080;" class="dash_head">
         <h2 style="color: #fff !important;font-size: 20px;text-align: center;">Total Company's Incentive Amount</h2></br>
		  <h2 style="color: #fff !important;font-size: 20px;text-align: center;"><?php foreach($comp_incentive as $CLs) {  echo $CLs['COMP_INCENTIVE_AMT']; } ?>  </h2>
        </div>
        
      </div>
      
      
      
    </div>
  </div>
</section>
