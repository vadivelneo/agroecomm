<?php
$sessionuserData = $this->session->userdata('userlogin');
if(!empty($sessionuserData))
{	
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	$stock_uri = array('stock_list');
	$optstock_uri = array('openingstock','opening_stk','addopeningstock','view_opening_stk');
	$adjstock_uri = array('adjustment_stock','');
	$wststock_uri = array('wastages');
	//$quality_checking = array('quality_checking_list','addqualitychecking','editqualitychecking','view_qc','search_qc_list');
	//$quality_alert = array('quality_alert_list','view_qc_alert','search_po_indent');
	//$repstock_uri = array('reports');
	

	
?>
<aside>
	<div class="leftPanel">
		<div class="row-fluid">
			<div class="quickLinksDiv">
				
				<p class="<?php if(in_array($uri_segment_two, $stock_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('inventory/stock_list'); ?>" class="quickLinks"><strong>Stock</strong></a></p>
				
				
                    	
				
			</div>
            
		</div>
	</div>
</aside>
<?php } ?>