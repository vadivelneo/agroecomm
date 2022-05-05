<?php //echo "<PRE>"; print_r($so_data);
	$file=$so_data->sales_order_doc_name;
	?>
 <style>
 .formError{ display:none; }
 </style>
 
 
  
<link rel="stylesheet" href="http://localhost/neo/agro/agro_ecomm1/agro_ecomm1//resources/css/jquery-ui.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		<?php echo $this->session->flashdata('message'); ?>
          <div class="col-sm-6">
            <h1>View Self Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Self Purchase     </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
		 
	
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View  Self Purchase </h3>
			</div>
              <!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<table class="table table-bordered blockContainer showInlineTable equalSplit">
						<thead>
							<tr>
								<th class="blockHeader" colspan="4">Self Purchase Details</th>
							</tr>
						</thead>
						
						<tbody>
							<tr>
								<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px">
										<span class="redColor">*</span>Self Purchase no
									</label>
								</td>
								<td class="fieldValue medium">
									<div class="row-fluid">
										<span class="span10">
											 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_noError">
											  <div class="formErrorContent">This field is required</div>
											  <div class="formErrorArrow"></div>
										   </div>
											<?php if(isset($so_data->sales_order_number)){ echo $so_data->sales_order_number;}?>
											
											
										</span>
									 </div>
								 </td>
								 <td class="fieldLabel medium">
									
								</td>
								<td class="fieldValue medium">
								  
								 </td>
								 
							</tr>
							<tr>
							<td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px">
										<span class="redColor">*</span>Customer Name
									</label>
								</td>
								<td class="fieldValue medium">
									<div class="row-fluid">
										<span class="span10">
											 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_nameError">
											  <div class="formErrorContent">This field is required</div>
											  <div class="formErrorArrow"></div>
										   </div>
										   <div class="row-fluid input-prepend input-append">
										   <?php if(isset($so_data->sales_order_customer_name)){ echo $so_data->sales_order_customer_name;}?>
									   
											  <input id="so_customer_id" name="so_customer_id" value="<?php if(isset($so_data->sales_order_customer_id)){ echo $so_data->sales_order_customer_id;}?>" type="hidden" />
											  <input id="pricebook_id" name="pricebook_id" value="<?php if(isset($so_data->customer_price_list)){ echo $so_data->customer_price_list;}?>" type="hidden" />
											  </div>
										</span>
									 </div>
								 </td>
								
							  <td class="fieldLabel medium">
									<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Customer Code</label>
								</td>
								<td class="fieldValue medium" >
									<div class="row-fluid">
										<span class="span10">
										<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" style="margin-top: -30px;" id="so_customer_codeError">
											  <div class="formErrorContent">This field is required</div>
											  <div class="formErrorArrow"></div>
										 </div>
										   <?php if(isset($so_data->sales_order_customer_code)){ echo $so_data->sales_order_customer_code;}?>
										   
										</span>
									</div>
								</td>
								
							</tr>
							
						   
							
						</tbody>
						
					</table>
				</div>
				<br/>
				<div class="card-body table-responsive p-0">
					  <span class="nums_error" id="add_itemError">
						<div class="card-header">
							<h3 class="card-title"> Please Enter Number Only </h3>
						</div>
                   </span>
                      
                
              <br>
			 <table class="table table-hover text-nowrap table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Terms & Conditions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Payment Mode
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <?php if(isset($so_data->payment_mode_name)){ echo $so_data->payment_mode_name; } ?>
                                    </span>
                                 </div>
                             </td>
                           
                        
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Transaction Date
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                     <?php if(isset($so_data->sales_order_transaction_date)){ echo date('d-m-y', strtotime($so_data->sales_order_transaction_date));}?>    
                                    </span>
                                 </div>
                             </td>
                           
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                Terms and Conditions
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                      <?php if(isset($so_data->sales_order_termsandconditions)){ echo $so_data->sales_order_termsandconditions;}?>
                                    </span>
                                 </div>
                             </td>
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                               Comments
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($so_data->sales_order_payment_terms)){ echo $so_data->sales_order_payment_terms;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
						

                    </tbody>
                    
                </table>
			
				</div>
				<br/>
				<div class="card-body table-responsive p-0">
					<span class="grid_error" id="add_itemError">
					<div class="card-header">
							<h3 class="card-title"> Please Add Some Items  </h3>
						</div>
                   </span>
                    <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
				  <input type ="hidden" value="<?php echo count($so_item_data); ?>" name="count_of_items " id="count_of_items">
               
				<table id="tblList" class='table table-hover text-nowrap'>
				<thead>
				<tr>	
				<th>SKU</th>
        		<th>Item</th>	
                <th>HSN/SAC</th>
					
				<th>Qty</th>
				<!--<th>Free Item Des.</th>
                <th>Free Quantity</th>-->
				<th>Incentive Rate</th>
				<th>Incentive total</th>
                <th>MRP</th>
                <th>Price</th>
                <th>Gross Amount</th>
				<th>Discount (%)</th>
				<th>Discount Amount</th>
              <!--  <th>Damage Discount (%)</th>
				<th>Damage Discount Amount</th>-->
                <th>Gross Amount</th>
                <th>CGST (%)</th>
				<th>CGST Amount</th>
                <th>SGST (%)</th>
				<th>SGST Amount</th>
				
			<!--	<th>Actions</th>
				-->
				
				
				
				</tr>
				</thead>
				<tbody id="disp_items">

        <?php //echo "<PRE>";print_r($so_item_data);
				if(!empty($so_item_data)) { $itemcount = 1; foreach($so_item_data as $ITEMS) { ?>
                       <tr>
                       <td><a href="javascript:void(0);" id="item_mfg_prtno_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?></a>
                        <input id="item_mfg_prtno_<?php echo $itemcount; ?>" name="item_mfg_prtno[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_mfr_part_number'])) { echo $ITEMS['product_mfr_part_number']; } ?>" type="hidden" />
                        <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_code'])) { echo $ITEMS['product_code']; } ?>" type="hidden" />
                        <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_item_id'])) { echo $ITEMS['so_items_item_id']; } ?>" type="hidden" /></td>
                        
                      <td><a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?></a>
                        <input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_name'])) { echo $ITEMS['product_name']; } ?>" type="hidden" />
                        <input id="item_uom_id_<?php echo $itemcount; ?>" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input id="item_uom_name_<?php echo $itemcount; ?>" name="item_uom_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> " /></td>
                        <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_hsn_sac'])) { echo $ITEMS['so_items_hsn_sac']; } ?></a>
                        <input id="item_hsn_value_<?php echo $itemcount; ?>" name="item_hsn_value[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_hsn_sac'])) { echo $ITEMS['so_items_hsn_sac']; } ?>" type="hidden" /></td>
                      
                      <td><a href="javascript:void(0);" id="item_qty_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['so_items_ord_qty'])) { echo $ITEMS['so_items_ord_qty']; } ?></a>
                        <input id="item_qty_<?php echo $itemcount; ?>" class="quantity" name="item_qty[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_ord_qty'])) { echo $ITEMS['so_items_ord_qty']; } ?>" type="hidden" /></td>
                         
						<td>
						<a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['so_items_incentive_rate'])) { echo $ITEMS['so_items_incentive_rate']; } ?></a>
                        
						</td>
						
                      <td>
					  <a href="javascript:void(0);" id="item_name_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['so_items_incentive_total'])) { echo $ITEMS['so_items_incentive_total']; } ?></a>
                       
						</td>
						 
						  
						  
                          <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_mrp'])) { echo $ITEMS['so_items_mrp']; } ?></a></td>
                        <td><a href="javascript:void(0);" id="item_priceperunit_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['so_items_priceperunit'])) { echo $ITEMS['so_items_priceperunit']; } ?></a>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['so_items_priceperunit'])) { echo $ITEMS['so_items_priceperunit']; } ?>" type="hidden" /></td>
                        <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_gross_amount'])) { echo $ITEMS['so_items_gross_amount']; } ?></a></td>
                      
                      
					  <td><p align="center"><a href="javascript:void(0);" id="item_discount_percent_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['so_items_discounts_percentage'])) { echo $ITEMS['so_items_discounts_percentage']; } ?></a>
                        </p></td>
                      <td><p align="center"><a href="javascript:void(0);" id="item_discount_amount_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['so_items_discounts_amount'])) { echo $ITEMS['so_items_discounts_amount']; } ?></a>
                       </p></td>
                        
                        </p></td>
                        <td><p align="center"><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_gross_amount_with_discount'])) { echo $ITEMS['so_items_gross_amount_with_discount']; } ?></a>
                       </p>
                        </td>
                        
                      <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_gst'])) { echo $ITEMS['so_items_gst']; } ?></a></td>
                      <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_gst_amt'])) { echo $ITEMS['so_items_gst_amt']; } ?></a></td>
                      <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_sgst'])) { echo $ITEMS['so_items_sgst']; } ?></a></td>
                      <td><a href="javascript:void(0);" ><?php if(isset($ITEMS['so_items_sgst_amt'])) { echo $ITEMS['so_items_sgst_amt']; } ?></a></td>
                      
                      
						
                    </tr>
                    <?php $itemcount++; } } ?>
					 <?php if(!empty($tax_group)) { $taxcount = 0; foreach($tax_group as $TG) {  ?>
					 <tr>
                                <td class="tax_group_lable" colspan='15' style='text-align:right;'>
                                    <label>Total Gross Amount</label>
                                </td>
                                <td>
                                    <p class="amount_calc"><?php echo $TG['tax_group_total_gross_amount']; ?></p>
                                </td>
                            </tr>
                    		<tr>
                            	<td class="tax_group_lable" colspan='15' style='text-align:right;'>
                                	<label>Total Discount</label>
                                </td>
                                <td>
                                	<p class="amount_calc"><?php echo $TG['tax_group_total_disocunt_amount']; ?></p>
                                </td>
                             </tr>
                             
                             
                             <tr>
                            	<td class="tax_group_lable" colspan='15' style='text-align:right;'>
                                	<label>Damage Discount Amount</label>
                                </td>
                                <td>
                                	<p class="amount_calc"><?php echo $TG['tax_group_damage_discount_amt']; ?></p>
                                </td>
                             </tr>
                             <tr>
                             	<td class="tax_group_lable" colspan='15' style='text-align:right;'>
                                	<label>Total Gross Amount Without Tax</label>
                                </td>
                                <td>
                                	<p class="amount_calc"><?php echo $TG['tax_group_without_tax_gross_amount']; ?></p>
                                </td>
                             </tr>
                             <tr>
                             	<td class="tax_group_lable" colspan='15' style='text-align:right;'>
                                	<label>Tax Amount</label>
                                </td>
                                <td>
                                	<p class="amount_calc"><?php echo $TG['tax_group_tax_amount']; ?></p>
                                </td>
                             </tr>
                             <tr>
                                 <td class="tax_group_lable" colspan='15' style='text-align:right;'>
                                 <label>Total Gross Amount With Tax</label>
                                 </td>
                                 <td>
                                 <p class="amount_calc"><?php echo $TG['tax_group_with_tax_gross_amount']; ?></p>
                                 </td>
                             </tr>
				 <?php } } ?>
				</tbody>
				</table>
                
				</div>
				
				<div class="card-body table-responsive p-0">
					<table class="table table-bordered blockContainer showInlineTable equalSplit">
				
				
				<tbody>
				<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Gross Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_total_gross_amount)){ echo $so_item_total->so_total_gross_amount;}?></p>
				</td>
				
			</tr>
            <?php  ?>
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Tax Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_total_tax_amount)){ echo $so_item_total->so_total_tax_amount;}?></p>
				</td>
			</tr>
             
            <tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Discount Amount
					</label>
				</td>
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_total_discount_amount)){ echo $so_item_total->so_total_discount_amount;}?> </p>
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping & Handling Charges
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_total_shipping_charges)){ echo $so_item_total->so_total_shipping_charges;}?></p>
				</td>
				
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Shipping Tax
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_total_shipping_tax)){ echo $so_item_total->so_total_shipping_tax;}?></p>
				</td>
			</tr>
			<!--<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Adjustment
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_adjustment)){ echo $so_item_total->so_adjustment;}?></p>
				</td>
			</tr>-->
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Grand Total
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->so_grand_total)){ echo $so_item_total->so_grand_total;}?></p>
				</td>
			</tr>
			<tr>
				<td class="fieldLabel medium">
					<label class="muted pull-right marginRight10px">
						Total Incentive Amount
					</label>
				</td>
				
				<td class="fieldLabel medium" style="width:20%;">
                <span class="totalvalidationmsg"></span>
					<p class="amount_calc"><?php if(isset($so_item_total->total_incentive_amount)){ echo $so_item_total->total_incentive_amount;}?></p>
				</td>
			</tr>
			</tbody>
				</table>
                <br />				
                <div class="row-fluid">
                    <div class="pull-right">
                        
                        <a class="cancelLink btn btn-warning" type="reset" onClick="javascript:window.history.back();">Back</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
				</div>
				
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
  

