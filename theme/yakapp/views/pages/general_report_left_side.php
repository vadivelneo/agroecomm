<?php
$sessionuserData = $this->session->userdata('userlogin');
if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	$purchase_order_uri = array('purchaseorder_list','purchase_ordersearch');
	$purchase_invoice_uri = array('reports_list','reportssearch');
	$material_received_uri = array('po_indent_list','po_indent_search');
	$sales_order_uri = array('salesorder_list','sales_ordersearch');
	$sales_invoice_uri = array('salesinvoice_report','sales_reportssearch');
	$sales_invoice_summary_uri = array('salesinvoice_summary_report','sales_summary_reportssearch');
	$purchase_invoice_summary_uri = array('purchaseinvoice_summary_report','purchase_summary_reportssearch');
	$purchase_invoice_collection_uri = array('purchaseinvoice_collection_report','purchase_collection_reportssearch');
	$sales_invoice_collection_uri = array('salesinvoice_collection_report','sales_collection_reportssearch');
	$sales_invoice_due_uri = array('salesinvoice_due_report','sales_due_reportssearch');
	
	$sales_flow_uri = array('sales_flow');
	$item_purchase_report = array('item_purchase_report','item_purchase_generate_report');
	$purchase_flow_report = array('purchase_flow_report','purchase_generate_flow_report');
	$item_sales_report = array('item_sales_report','item_sales_generate_report');
	$items_sales_summary_report = array('items_sales_summary_report','daily_items_sales_report');
	$dc_uri = array('dc_list','dc_search');
	$st_uri = array('stock_report_list','stock_search');
	$stock_uri = array('stock_list','stock_reprot_list','stock_search');
	$income_receipt_uri = array('invoice_recp_list','income_search');
	$payment_receipt_uri = array('payment_recp_list','payment_recp_search'); 
	$customer_debit_note_uri = array('customer_debit_note','customer_debit_note_search');
	$customer_credit_note_uri = array('customer_credit_note','customer_credit_note_search');
	$item_analysis_uri = array('itemwise_analysis','item_analysis_generate_report');
?>
<aside>
    <div class="leftPanel">
        <div class="row-fluid">
            <div class="quickLinksDiv">
            	        	
                <h1 class="rep_new"> General Reports</h1>
            	<p class="<?php if($uri_segment_two == 'cus_acc_list') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/cus_acc_list'); ?>" class="quickLinks"><strong>Customer Accounts Report</strong></a>
                </p>
            	<p class="<?php if($uri_segment_two == 'vendor_acc_list') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/vendor_acc_list'); ?>" class="quickLinks"><strong>Vendor Accounts Report</strong></a>
                </p>        
            
            </div>
        </div>
    </div>
</aside>
<?php } ?>