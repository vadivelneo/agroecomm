<?php
$sessionuserData = $this->session->userdata('userlogin');
$sess_user=$sessionuserData['user_id'];
if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	
	
	$sales_incentive_uri = array('sales_incentive_report','sales_incentive_details');
	$awards_rewards_uri = array('awards_rewards_report');
	$level_report_uri = array('level_report_count','level_reportsearch');
	
?>
<aside>
  <div class="leftPanel">
    <div class="row-fluid">
      <div class="quickLinksDiv">
	  
	  	<h1 class="rep_new">Network</h1>		
		
			 
			  <p class="<?php if(in_array($uri_segment_two, $level_report_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('reports/level_report_count'); ?>" class="quickLinks"><strong>Level Report</strong></a>
             </p>
			 <p class="<?php if(in_array($uri_segment_two, $level_report_uri)) { echo ''; } else { echo "unSelectedQuickLink"; } ?>"><a href="#" class="quickLinks"><strong>Purchase Report</strong></a>
             </p>
			 <p class="<?php if(in_array($uri_segment_two, $level_report_uri)) { echo ''; } else { echo "unSelectedQuickLink"; } ?>"><a href="#" class="quickLinks"><strong>Tree View</strong></a>
             </p>
			 <p class="<?php if(in_array($uri_segment_two, $level_report_uri)) { echo ''; } else { echo "unSelectedQuickLink"; } ?>"><a href="#" class="quickLinks"><strong>Genelogy</strong></a>
             </p>
				
		
      </div>
    </div>
  </div>
</aside>
<?php } ?>