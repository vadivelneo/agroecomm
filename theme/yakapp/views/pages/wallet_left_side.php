<?php
$sessionuserData = $this->session->userdata('userlogin');
$sess_user=$sessionuserData['user_id'];
if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	
	$incentive_uri = array('sales_incentive_report','sales_incentive_details');
	$transaction_uri = array('sales_transaction_report','sales_transaction_details');
	//echo $uri_segment_two; exit;
	
?>
<aside>
  <div class="leftPanel">
    <div class="row-fluid">
      <div class="quickLinksDiv">
	  
	  	<h1 class="rep_new">Wallet</h1>		
		
				  <p class="<?php if(in_array($uri_segment_two, $incentive_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('reports/sales_incentive_report'); ?>" class="quickLinks"><strong>Incentive Report</strong></a>
				  </p>
				  
				  <p class="<?php if(in_array($uri_segment_two, $transaction_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('reports/sales_transaction_report'); ?>" class="quickLinks"><strong>Transaction Report</strong></a>
				  </p>
				
		
      </div>
    </div>
  </div>
</aside>
<?php } ?>