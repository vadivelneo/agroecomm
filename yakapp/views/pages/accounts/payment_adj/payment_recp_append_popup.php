<?php //print_r($purchase_invoice);exit;
if(!empty($purchase_invoice))
{
	$itemcount = 1;
	$receipt_amount = $purchase_invoice['receipt']->payment_receipt_balance_amount;
	
	foreach($purchase_invoice['invoice'] as $ITEMS)
	{
		$invoice_amount = $ITEMS['po_invoice_grand_total'];
		$due_amount =  $ITEMS['payment_payment_due_amount'];
		$tds_amount = $ITEMS['po_invoice_total_tds'];
		$paid_amount =$ITEMS['payment_payment_paid_amount'];
		
		if ($paid_amount == 0.00 && $tds_amount!= "")
		{	
			$due_amount= number_format(($invoice_amount - $tds_amount), 2, '.', '');
			
		}
		
		if($receipt_amount > 0.00)
		{
			if($due_amount > $receipt_amount)
			{
				
				$remaining_due_amount = number_format(($due_amount - $receipt_amount), 2, '.', '');
				
				
				
				$calculated_paid_amount = number_format(($paid_amount), 2, '.', '');
				
				$calculated_adjusted_amount = number_format(($receipt_amount), 2, '.', '');
				
				$calculated_payable_amount = number_format(($due_amount), 2, '.', '');
				
				
				
				$receipt_amount = 0.00;
			}
			else
			{
				//$remaining_due_amount = number_format(($invoice_amount - $due_amount), 2, '.', '');
				$remaining_due_amount = 0.00;
				
				$calculated_paid_amount = number_format(($paid_amount), 2, '.', '');
	
				$calculated_adjusted_amount = $due_amount;
				
				$calculated_payable_amount = number_format(($due_amount), 2, '.', '');
				
				$receipt_amount = number_format(($receipt_amount - $due_amount), 2, '.', '');
			}
		}
		else
		{
			$remaining_due_amount = $due_amount;
			$calculated_paid_amount = $paid_amount;
			$calculated_payable_amount = $due_amount;
			$calculated_adjusted_amount = 0.00;
			
			$receipt_amount = $receipt_amount;
		}
		
		if($remaining_due_amount == 0.00 && $tds_amount == 0.00)
		{
			$inv_status = 'Cleared';
		}
		else
		{
			$inv_status = 'Pending';
		}
		

		
	?>
	<tr>
        <td>
             <?php  echo $itemcount; ?>
        </td>
        
        <td>
        <?php if(isset($ITEMS['po_invoice_id'])) { echo $ITEMS['po_invoice_number']; } ?>
        <input name="inv_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_invoice_id'])) { echo $ITEMS['po_invoice_id']; } ?>" type="hidden" />
        <input name="inv_no[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_invoice_number'])) { echo $ITEMS['po_invoice_number']; } ?>" type="hidden" />
        </td>
        
        <td>
        <?php if(isset($purchase_invoice['receipt']->vendor_name)) { echo $purchase_invoice['receipt']->vendor_name; } ?>
        <input name="party_name[<?php echo $itemcount; ?>]" value="<?php echo $purchase_invoice['receipt']->vendor_name; ?>" type="hidden" />
         <input name="party_id[<?php echo $itemcount; ?>]" value="<?php if(isset($purchase_invoice['receipt']->payment_receipt_vendor_id)) { echo $purchase_invoice['receipt']->payment_receipt_vendor_id; } ?>" type="hidden" />
        </td>
        
        <td>
        <?php if(isset($ITEMS['po_invoice_grand_total'])) { echo $ITEMS['po_invoice_grand_total']; } ?>
        <input id="recp_amt_<?php echo $itemcount; ?>" name="recp_amt[<?php echo $itemcount; ?>]" onkeyup="return onkeyupfortotal(<?php echo $itemcount; ?>)" value="<?php if(isset($ITEMS['po_invoice_grand_total'])) { echo $ITEMS['po_invoice_grand_total']; } ?>" type="hidden"  />
        </td>
		
		<td>
        <?php if(isset($ITEMS['po_invoice_total_tds'])) { echo $ITEMS['po_invoice_total_tds']; } ?>
        <input id="inv_tds_amt_<?php echo $itemcount; ?>" name="inv_tds_amt[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['po_invoice_total_tds'])) { echo $ITEMS['po_invoice_total_tds']; } ?>" type="hidden"  />
        </td>
        
        <td>
        <input id="paid_amt_<?php echo $itemcount; ?>" name="paid_amt[<?php echo $itemcount; ?>]" value="<?php echo $calculated_paid_amount; ?>" type="text" class="quantity price" readonly="readonly" />
        </td>
        
         <td>
        <input id="payable_amt_<?php echo $itemcount; ?>" name="payable_amt[<?php echo $itemcount; ?>]" value="<?php echo $calculated_payable_amount; ?>" type="text" class="quantity price" readonly="readonly" />
        </td>
        
        <td>
        <input id="due_amt_<?php echo $itemcount; ?>" name="due_amt[<?php echo $itemcount; ?>]" value="<?php echo $remaining_due_amount; ?>" class="quantity price"  type="text" readonly="readonly" />
        </td>
        
        <td>
        <input id="adj_amt_<?php echo $itemcount; ?>" name="adj_amt[<?php echo $itemcount; ?>]" value="<?php echo $calculated_adjusted_amount; ?>" class="quantity price"  type="text" onkeyup="invoice_payment_adjustment(event,<?php echo $itemcount; ?>)" />
        <span id="numeric_error_<?php echo $itemcount; ?>" class="numeric_error"></span>
        </td>
		
		<td>
		<?php if($inv_status == "Cleared") { ?> 
		<select name="invoice_status[<?php echo $itemcount; ?>]" class="chzn-select" id="invoice_status_<?php echo $itemcount; ?>"  style="width: 90px">
		<option value="Cleared"  <?php if($inv_status == "Cleared") { ?> selected="selected"  <?php } ?>>Cleared</option>
		</select> <?php }  else	{ ?> 
		<select name="invoice_status[<?php echo $itemcount; ?>]" class="chzn-select" id="invoice_status_<?php echo $itemcount; ?>" onchange="getstatus(<?php echo $itemcount; ?>)" style="width: 90px">
		<option value="Pending"  <?php if($inv_status == "Pending") { ?> selected="selected"  <?php } ?>>Pending</option>
		<option value="Cleared"  <?php if($inv_status == "Cleared") { ?> selected="selected"  <?php } ?>>Cleared</option>
		<?php } ?>
		
		
        </td>
	</tr>
<?php 
	$itemcount++; 
	} 
} 
?>