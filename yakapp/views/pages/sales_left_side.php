<?php
$sessionuserData = $this->session->userdata('userlogin');
$sess_user=$sessionuserData['user_id'];
if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	
	$sales_order_uri = array('salesorder_list','sales_ordersearch');
	$sales_invoice_summary_uri = array('sales_invoice_incentive_report','sales_invoice_incentive_details');
	$sales_incentive_uri = array('sales_incentive_report','sales_incentive_details');
	$customer_incentive_uri = array('customer_incentive_report','customer_incentive_details');
	$cash_receipt_uri = array('add_inv_recp','edit_inv_recp','invoice_recp_list');
	$get_enrollement_report = array('item_pricelist_report','item_pricelist_generate_report');
?>
<aside>
  <div class="leftPanel">
    <div class="row-fluid">
      <div class="quickLinksDiv">
	  
	  	<h1 class="rep_new"> Self Purchase Reports</h1>
		<?php if(isset($salesinvoice->view_option)) { if($salesinvoice->view_option != '0') { ?>
		<p class="<?php if($uri_segment_first == 'instant_salesinvoice') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('salesorder'); ?>" class="quickLinks"><strong>Self Purchase</strong></a></p><?php }} ?>
		
		<?php if(isset($salesinvoice->view_option)) { if($salesinvoice->view_option != '0') { ?>
		<p class="<?php if($uri_segment_first == 'instant_salesinvoice') { echo ''; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('salesorder/sample_form'); ?>" class="quickLinks"><strong>Add Self Purchase</strong></a></p><?php }} ?>
           
				
				<?php if($sess_user == 1 || $sess_user == 2)
		{ ?>				
				 <p class="<?php if(in_array($uri_segment_two, $customer_incentive_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
               
                	<a href="<?php echo site_url('reports/customer_incentive_report'); ?>" class="quickLinks"><strong>SMS Self Incentive</strong></a>
                </p>
				
				
				<?php } ?>
				
				<?php if($sess_user == 1 || $sess_user == 2)
		{ ?>				
				
				
				<p class="<?php if(in_array($uri_segment_two, $cash_receipt_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
               
                	<a href="<?php echo site_url('accounts/invoice_recp_list'); ?>" class="quickLinks"><strong>Cash Receipt</strong></a>
                </p>
				<?php } ?>
		
      </div>
    </div>
  </div>
</aside>
<?php } ?>