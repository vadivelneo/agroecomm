<?php
$sessionuserData = $this->session->userdata('userlogin');
if(!empty($sessionuserData))
{	
	$uri_segment_two = $this->uri->segment('2');
	$inv_recp_uri = array('invoice_recp_list','add_inv_recp','edit_inv_recp','view_inv_recp','search_invoice_recp_list');
	$pay_recp_uri = array('payment_recp_list','add_payment_recp','edit_pay_recp','view_pay_recp','search_payment_recp_list');
	$payment_adj_uri = array('payment_adj_list','add_payment_adj');
	$credit_uri = array('creditnotes','add_credit_note');
	$debit_uri = array('debitnotes','add_debit_note');
	$uri_segment_three = $this->uri->segment('3');
	$customer_credit_note_uri1 = array('');
?>
<aside>
	<div class="leftPanel">
		<div class="row-fluid">
			<div class="quickLinksDiv">
            	<h1 class="rep_new"> Customer</h1>
                <?php if(isset($invoicereceipt->view_option)) { if($invoicereceipt->view_option != '0') { ?>
				<p class="<?php if(in_array($uri_segment_two, $inv_recp_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('accounts/invoice_recp_list'); ?>" class="quickLinks"><strong>Cash Receipt</strong></a></p> <?php } } ?>
                
				
			</div>
            
		</div>
	</div>
</aside>
<?php } ?>