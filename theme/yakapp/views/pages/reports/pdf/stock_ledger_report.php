<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ledger_'.date('d-M-Y').'.xls"');
header("Pragma: no-cache");
header("Expires: 0");    
?>
<table cellspacing="1" cellpadding="1" border="1" width="100%">
    <tr>
    	<td colspan="17" bgcolor="#b1ad78" >
    		<div align="center"><strong>Ledger Report</strong></div>
        </td>
    </tr>
    <tr>
    	<td colspan="10" bgcolor="#c9ff93" >
    		<div align="left"><strong>From Date : <?php echo date('d-M-Y', strtotime($report_from));?> </strong></div>
        </td>
    	<td colspan="7" bgcolor="#c9ff93">
    		<div align="left"><strong>To Date :  <?php echo date('d-M-Y', strtotime($report_to));?></strong></div>
        </td>
    </tr>
   
    <tr>
   		<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Sno</b></div></td>
    	<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Date</b></div></td>
        <td width="10%"  bgcolor="#99FFFF"><div align="left"><b>Material Name</b></div></td>
    	<td width="25%"  bgcolor="#99FFFF"><div align="left"><b>HSN/SAC</b></div></td>
        <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>Store</b></div></td>
        <td width="30%"  bgcolor="#99FFFF"><div align="right"><b>Material Type</b></div></td>
        <td width="15%"  bgcolor="#99FFFF"><div align="right"><b>UOM</b></div></td>
    	<td width="30%"  bgcolor="#99FFFF"><div align="right"><b>Closing stock</b></div></td>
        <td colspan="9" width="30%"  bgcolor="#99FFFF"><div align="right"><b></b></div></td>
       
 
  
    </tr>
    
    <?php
		if(!empty($stock_list)) {
			$i = 1;
			/* echo "<pre>";
			print_r($stock_list); exit; */
			
		 foreach($stock_list as $INV) {
					// $con = mysqli_connect('localhost', 'root', 'admin', 'ceegonew');
				   // $con = mysqli_connect('localhost', 'annaizfa_ceego', 'sivam123', 'annaizfa_ceego');
					
					$report_to_date = date('Y-m-d', strtotime('-1 day', strtotime($report_to)));
					$report_from_date = date('Y-m-d', strtotime('-1 day', strtotime($report_from)));
					
					$this->db->select('SUM(INV.inventory_received_qty) AS received_qty');
					$this->db->from('inventory_new as INV');
					$this->db->join('products as P', 'P.product_id = INV.inventory_item_id');
					$this->db->group_by('INV.inventory_item_id');
					$this->db->where('P.product_id',$INV['product_id']);
					$this->db->where('INV.inventory_add_date >=', '2018-08-01');
					if($report_from_date != "")
					{
					$this->db->where('INV.inventory_add_date <=', $report_from_date);
					}
				 	$inv_qty = 	$this->db->get()->row();
					if($inv_qty)
				{
				$received_qty = $inv_qty->received_qty;
				}
				else
				{
					$received_qty  = 0;
				}
					
				$this->db->select('SUM(ITEMS.mis_item_required_qty) AS issue_qty');
				$this->db->from('materialissue as MIS');
				$this->db->join('materialissue_items as ITEMS', 'MIS.mis_id = ITEMS.mis_ref_id');
				$this->db->group_by('ITEMS.mis_item_material_id');
				$this->db->where('ITEMS.mis_item_material_id',$INV['product_id']);
				$this->db->where('MIS.mis_updated_date >=', '2018-09-01');
				if($report_to != "")
				{
				$this->db->where('MIS.mis_updated_date <=', $report_from_date);
				}
				$issue_qty = 	$this->db->get()->row();
				if($issue_qty)
				{
				$issued_qty = $issue_qty->issue_qty;
				}
				else
				{
					$issued_qty  = 0;
				}
				
				$closing_stock = $received_qty - $issued_qty;
			  ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1" style="font-weight:bold;font-size:14px;">
              
                <td ><?php echo $i;?></td>
                <td><?php //echo $INV['product_add_date'];
				echo date('d-m-Y', strtotime($report_from_date)); 
				?></td>
                <td><?php echo $INV['product_name'] ;?></td>
                <td><?php echo $INV['product_hsn_sac'];?></td>
                <td><?php echo $INV['store_name']; ;?></td>
                <td><?php echo $INV['products_type_name'];?></td>
                <td><?php echo $INV['uom_name']; ;?></td>
                <td><?php echo $closing_stock;?></td>
                </tr>
              <?php $i++;}} ?>
              <tr>
    	<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Sno.</b></div></td>
        <td width="10%"  bgcolor="#99FFFF"><div align="left"><b>Date</b></div></td>
    	<td width="25%"  bgcolor="#99FFFF"><div align="left"><b>Material Name</b></div></td>
        <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>GRN No.</b></div></td>
         <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>GRN Date.</b></div></td>
          <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>GDC/INV</b></div></td>
           <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>DC/INV Date</b></div></td>
            <td width="20%"  bgcolor="#99FFFF"><div align="left"><b>Party Name</b></div></td>
        <td width="30%"  bgcolor="#99FFFF"><div align="right"><b>MIS No.</b></div></td>
        <td width="15%"  bgcolor="#99FFFF"><div align="right"><b>MIS Date</b></div></td>
    	<td width="30%"  bgcolor="#99FFFF"><div align="right"><b>SO No.</b></div></td>
    	<td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Batch No.</b></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Batch Size</b></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Control</b></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Stock in Qty</b></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Stock out Qty</b></div></td>
        <td width="5%"  bgcolor="#99FFFF"><div align="left"><b>Remaining Balance</b></div></td>
        <td colspan="9" width="30%"  bgcolor="#99FFFF"><div align="right"><b></b></div></td>
  
    </tr>
     <?php
	 
	 $report_to_date = date('Y-m-d', strtotime('0 day', strtotime($report_to)));
	 $report_from_date = date('Y-m-d', strtotime('0 day', strtotime($report_from)));
		if(!empty($stock_list)) {
			$i = 1;
			/* echo "<pre>";
			print_r($stock_list); exit; */
			$_total_added_qty      = 0;
			$_tem_arr2            = array();
			$_tem_arr3            = array();
		 foreach($INV['invoice_summary'] as $INV) {
			
			  ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1" style="font-weight:bold;font-size:14px;">
              
                <td ><?php echo $i;?></td>
                <td><?php echo $INV['inventory_add_date'];?></td>
                <td><?php echo $INV['product_name'] ;?></td>
                <!--<td><?php echo $INV['uom_name'] ;?></td>-->
                <td><?php echo $INV['po_indent_number'];?></td>
                <td><?php echo $INV['po_indent_date'];?></td>
                <td><?php echo $INV['po_cus_dc_inv'];?></td>
                <td><?php echo $INV['po_cus_dc_inv_date'];?></td>
                <td><?php echo $INV['vendor_name'];?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                 
                <td><?php echo $INV['inventory_control_no'] ;?></td>
                <!--<td><?php echo $INV['inventory_qty'] ;?></td>-->
                <td><?php echo $INV['inventory_received_qty'] ;?></td>
                <td><?php echo '-' ;?></td>
                <td><?php echo $INV['inventory_received_qty']  +  end($_tem_arr3);?></td>
                </tr>
                    <?php
				//$con = mysqli_connect('localhost', 'root', 'admin', 'ceegonew');
				//$con = mysqli_connect('localhost', 'annaizfa_ceego', 'sivam123', 'annaizfa_ceego');
					
				$this->db->select('ITEMS.*,MIS.*,P.*,MRS.*');
				$this->db->from('materialissue as MIS');
				$this->db->join('materialissue_items as ITEMS', 'MIS.mis_id = ITEMS.mis_ref_id');
				$this->db->join('meterial_request_new as MRS', 'MRS.met_req_id = MIS.mrs_id');
				$this->db->join('products as P', 'P.product_id = ITEMS.mis_item_material_id');
				$this->db->where('find_in_set('.$INV['inventory_id'].',ITEMS.mis_item_inventory_id)>0');
				$this->db->where('MIS.mis_updated_date >=','2018-08-01');
				/*if($report_from != "")
				{
				$this->db->where('MIS.mis_updated_date >=', $report_from);
				}*/
				if($report_to != "")
				{
				$this->db->where('MIS.mis_updated_date <=', $report_to);
				}
				$ret = 	$this->db->get()->result_array();
				//echo $this->db->last_query();  exit;
					$remaining_qty = 0;
					$k= 1;	
				foreach($ret as $MISITM) 
				{ 
				$this->db->select('SUM(INV.inventory_received_qty) AS received_qty');
					$this->db->from('inventory_new as INV');
					$this->db->join('products as P', 'P.product_id = INV.inventory_item_id');
					$this->db->group_by('INV.inventory_item_id');
					$this->db->where('P.product_id',$MISITM['product_id']);
					$this->db->where('INV.inventory_add_date >=', '2018-08-01');
					if($report_to_date != "")
					{
					$this->db->where('INV.inventory_add_date <=', $report_to_date);
					}
				 	$inv_qty = 	$this->db->get()->row();
					
					
				$this->db->select('SUM(ITEMS.mis_item_required_qty) AS issue_qty');
				$this->db->from('materialissue as MIS');
				$this->db->join('materialissue_items as ITEMS', 'MIS.mis_id = ITEMS.mis_ref_id');
				$this->db->group_by('ITEMS.mis_item_material_id');
				$this->db->where('ITEMS.mis_item_material_id',$MISITM['product_id']);
				$this->db->where('MIS.mis_updated_date >=','2018-08-01');
				if($report_to != "")
				{
				$this->db->where('MIS.mis_updated_date <=', $report_to_date);
				}
				$issue_qty = 	$this->db->get()->row();
				
				$final_stock = $inv_qty->received_qty - $issue_qty->issue_qty;
				
				if($remaining_qty == 0)
				{
				$rec_qty = $INV['inventory_received_qty'] +  end($_tem_arr3);
				}
				else
				{
					$rec_qty =$remaining_qty;
				}
				$ctrl_no = $MISITM['mis_item_control_no'];
				$result = explode(",",$ctrl_no);
				$res_posi = array_search($INV['inventory_control_no'],$result);
				$control_no = $result[$res_posi];
				$issue = $MISITM['mis_item_issue_qty'] ;
				
				$iss_qty = explode(",",$issue);
				//echo $MISITM['mis_item_issue_qty']."<br>";
				
				
				
				$issed_qty = $iss_qty[$res_posi];
				$_tem_arr2[] = $iss_qty[$res_posi];
				$issue_qty_new =  array_sum($_tem_arr2);
				
				$final_stock =   $inv_qty->received_qty - $issue_qty_new;
				
				$remaining_qty = $rec_qty - $issed_qty;
				$_tem_arr3[] = $remaining_qty;
						?>
                <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td><?php echo $k;?></td>
                <td><?php echo  date('d-m-Y', strtotime($MISITM['mis_updated_date'])) ;?></td>
                <td><?php echo $MISITM['product_name'] ;?></td>
               <!-- <td><?php echo $MISITM['met_req_uom'] ;?></td>-->
                <td><?php echo '';?></td>
                 <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo '' ;?></td>
                <td><?php echo $MISITM['mis_no'] ;?></td>
                <td><?php echo  date('d-m-Y', strtotime($MISITM['mis_created_date'])) ;?></td>
                <td><?php echo $MISITM['met_req_so_no'] ;?></td>
                <td><?php echo $MISITM['met_req_batch_no'] ;?></td>
                <td><?php echo $MISITM['met_req_pack_size'] ;?></td>
                <td><?php //echo $MISITM['mis_item_control_no']."<br>";
						  echo $control_no."<br>";
				?></td>
                <!--<td><?php echo $MISITM['inventory_qty'] ;?></td>-->
                <td><?php echo '' ;?></td>
                <td><?php echo $issed_qty."<br>";
				?></td>
                <td><?php echo $remaining_qty;?></td>
                </tr>
                 <?php
				  $k++;} ?>
				
              <?php $i++;}} ?>
               <tr style="font-weight:bold;font-size:14px;" class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Current Stock:</td>
                <td><?php  if(isset($final_stock)) {echo $final_stock;} else {echo '';} ?></td>
                </tr>
</table>
