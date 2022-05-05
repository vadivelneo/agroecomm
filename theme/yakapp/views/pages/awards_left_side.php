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
	  
	  	<h1 class="rep_new">Awards & Rewards</h1>		
		
			 
				<?php if($sessionuserData['user_id'] == '1')
				{ 
				?>
			  <p class="<?php if(in_array($uri_segment_two, $awards_rewards_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('reports/awards_rewards_report'); ?>" class="quickLinks"><strong>Awards & Rewards Report</strong></a>
             </p>
				<?php }
				else{
				?>
				
				<p class="<?php if(in_array($uri_segment_two, $awards_rewards_uri)) { echo ''; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('reports/awards_rewards_report_user'); ?>" class="quickLinks"><strong>Awards & Rewards Report</strong></a>
             </p>
			 <?php 
				}
				?>
		
      </div>
    </div>
  </div>
</aside>
<?php } ?>