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
	$stock_detail_uri = array('stock_report_detailed_list','stock_detailed_search');
	$income_receipt_uri = array('invoice_recp_list','income_search');
	$payment_receipt_uri = array('payment_recp_list','payment_recp_search'); 
	$customer_debit_note_uri = array('customer_debit_note','customer_debit_note_search');
	$customer_credit_note_uri = array('customer_credit_note','customer_credit_note_search');
	$item_analysis_uri = array('itemwise_analysis','item_analysis_generate_report');
	$stock_details = array('stock_report_details','stock_report_search');
	
	$QM_Intimation = array('qm_intimation_report','qm_intimation_report','qm_intimation_report_search');
	$GRN_Sampling = array('grn_sampling_report','grn_sampling_report','grn_report_report_search');
	$GRN_Test = array('grn_test_report','grn_test_report','qm_grn_test_report_search');
	$stock_ledger = array('stock_ledger_report','stock_ledger_report_search');
	$stock_ledger_new = array('stock_ledger_report_new','stock_ledger_report_search_new');
?>
<aside>
    <div class="leftPanel">
        <div class="row-fluid">
            <div class="quickLinksDiv">
            
            	

            	<h1 class="rep_new"> Inventory Reports</h1>
            	<!-- <p class="<?php if(in_array($uri_segment_two, $st_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/stock_report_list'); ?>" class="quickLinks"><strong>Stock Report</strong></a>
                </p> -->
				<p class="<?php if(in_array($uri_segment_two, $item_analysis_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/itemwise_analysis'); ?>" class="quickLinks"><strong>Itemwise Analysis Report</strong></a>
                </p> 
				<p class="<?php if(in_array($uri_segment_two, $stock_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/stock_reprot_list'); ?>" class="quickLinks"><strong>Stock Report</strong></a>
                    
                    <p class="<?php if(in_array($uri_segment_two, $stock_detail_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/stock_report_detailed_list'); ?>" class="quickLinks"><strong>Detailed Stock Report</strong></a>
                    
                    	<p class="<?php if(in_array($uri_segment_two, $stock_details)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/stock_report_details'); ?>" class="quickLinks"><strong>Closing Stock Report</strong></a>
                </p>
				<h1 class="rep_new"> Quality Reports</h1>
            	<p class="<?php if(in_array($uri_segment_two, $QM_Intimation)) {  echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/qm_intimation_report'); ?>" class="quickLinks"><strong>QM Intimation Report</strong></a>
                </p>
                <p class="<?php if(in_array($uri_segment_two, $GRN_Sampling)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/grn_sampling_report'); ?>" class="quickLinks"><strong>GRN Sampling Report</strong></a>
                </p>
                <p class="<?php if(in_array($uri_segment_two, $GRN_Test)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/grn_test_report'); ?>" class="quickLinks"><strong>GRN Test Report</strong></a>
                </p>
                <h1 class="rep_new">Stock Reports</h1>
                <p class="<?php if(in_array($uri_segment_two, $stock_ledger)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/stock_ledger_report'); ?>" class="quickLinks"><strong>Stock Ledger Report</strong></a>
                </p>
            
			   <?php /*?> <p class="<?php if(in_array($uri_segment_two, $stock_ledger_new)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>">
                	<a href="<?php echo site_url('reports/stock_ledger_report_new'); ?>" class="quickLinks"><strong>Stock Ledger Report_new</strong></a>
                </p><?php */?>
			
			
			
            </div>
        </div>
    </div>
</aside>
<?php } ?>