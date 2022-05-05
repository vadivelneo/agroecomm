<?php echo $this->load->view('pages/master_left_side'); 
?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('product/editproduct').'/'.$this->uri->segment('3');?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Product</h3>
					<div class="pull-right">
                        
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Product Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Product Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->product_name)){ echo $edit_product->product_name;}?>                                   
                                       </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Company</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->product_company_id)){ echo $edit_product->company_short_name;}?> 
                                        </select>
                                    </span>
                                </div>
                            </td>
                           
                        </tr>
                        
                        <tr>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Product Type</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                          <?php if(isset($edit_product->products_type_name)){ echo $edit_product->products_type_name;}?>   
                                    </span>
                                </div>

                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Item Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_item_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_product->product_code)){ echo $edit_product->product_code;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                
                        <tr>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Product Group</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_groupError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php echo $edit_product->products_group_name; ?>
                                            
                                     
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   <span class="redColor">*</span> Manufacturer
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_manufacturerError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                     
											 <?php if(isset($product_manufac) && !empty($product_manufac)) { foreach($product_manufac as $GROUP) { ?>
                                            <option <?php if($GROUP['manufacturer_id'] == $edit_product->product_manufacurer) { ?>  <?php } ?> value="<?php echo $GROUP['manufacturer_id']; ?>"><?php echo $GROUP['manufacturer_name']; ?></option>
                                           	<?php } } ?> 
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">SKU</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_mfr_part_number)){ echo $edit_product->product_mfr_part_number;}?>
                                    </span>
                                </div>
                            </td>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Product Active
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php echo ucfirst($edit_product->product_status);?>
                                    </span>
                                 </div>
                             </td>
                        <!--    <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Product Image
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="MultiFile-wrap" id="MultiFile1_wrap">
                                        	
                                        	<div class="MultiFile-list" id="MultiFile1_wrap_list"></div>
                                        </div>
                                    </span>
                                 </div>
                             </td>-->
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Barcode</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_barcode_number)){ echo $edit_product->product_barcode_number;}?>
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Model No
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_model_number)){ echo $edit_product->product_model_number;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        <tr>
                         <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Product Sequence</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                         <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_secqError" style="margin-top: -30px;">
                                            <div class="formErrorContent">Enter Sequence Numbers</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_product->product_sequence)){ echo $edit_product->product_sequence;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                     
                        
                    </tbody>
                </table>
						                                                
                <br />
                        
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Pricing Information</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>MRP
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_mrpError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_product->product_mrp)){ echo $edit_product->product_mrp;}?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Selling Price</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_spError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->product_selling)){ echo $edit_product->product_selling;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
							<!--<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Unit/Qty
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_utyqtyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>

                                        <input type="text" value="<?php if(isset($edit_product->product_uty_qty)){ echo $edit_product->product_uty_qty;}?>" name="product_utyqty" class="span6 unitPrice currencyField" id="product_utyqty">
                                    </span>
                                 </div>
                             </td>-->
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Cost Price
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_costpriceError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_product->product_cp)){ echo $edit_product->product_cp;}?>
                                    </span>
                                 </div>
                             </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                   Not For sale
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_selling_status)){ if($edit_product->product_selling_status == 'for_sale') {echo "For Sale";} else {echo "Not For Sale";}} ?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                
                        <tr>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="taxLabel alignBottom">VAT<span class="paddingLeft10px">(%)</span></span>
									
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_vat_tax)){ echo $edit_product->product_vat_tax; } ?>
                                    </span>
                                 </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">GST Tax<span class="paddingLeft10px">(%)</span></span> 
									
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_gst_tax)){ echo $edit_product->product_gst_tax;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">CST<span class="paddingLeft10px">(%)</span></span> 
									
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_cst_tax)){ echo $edit_product->product_cst_tax;}?>
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="taxLabel alignBottom">Service Tax<span class="paddingLeft10px">(%)</span></span> 
									
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_service_tax)){ echo $edit_product->product_service_tax;}?>
                                    </span>
                                 </div>
                             </td>
                            
                        </tr>
                        
                        <tr>
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="taxLabel alignBottom">Excise Duty<span class="paddingLeft10px">(%)</span></span> 
									
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_excise_duty_tax)){ echo $edit_product->product_excise_duty_tax;}?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">Discounts<span class="paddingLeft10px">(%)</span></span> 
									
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_discounts)){ echo $edit_product->product_discounts;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
						
                <br>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Stock Information</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Unit Of Measurement
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_usageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										
                                           <?php if(isset($product_uom) && !empty($product_uom)) { foreach($product_uom as $UOM) { ?>
                                            <option value="<?php echo $UOM['uom_id']; ?>" <?php if(isset($edit_product->product_stock_uom_id)) { if($UOM['uom_id'] == $edit_product->product_stock_uom_id) { ?> <?php } } ?> ><?php echo $UOM['uom_name']; ?></option>
                                           	<?php } } ?>
                                        
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Weight</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_stock_weight)){ echo $edit_product->product_stock_weight;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Reorder Level
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_stock_reorder_level)){ echo $edit_product->product_stock_reorder_level;}?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Reorder Qty
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_stock_reorder_qty)){ echo $edit_product->product_stock_reorder_qty;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    Minimum Stock
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_stock_minimum)){ echo $edit_product->product_stock_minimum;}?>
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	Maximum Stock
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_stock_maximum)){ echo $edit_product->product_stock_maximum;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                    
                </table>
                
                <br />
                
                <div class="row-fluid">
                    <div class="pull-right">
                       <!-- <a class="btn-success" id="itemincluded" href="javascript:void(0);"><strong>Items Included</strong></a>-->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
                <input type ="hidden" value="<?php echo count($edit_product_items); ?>" name="count_of_items " id="count_of_items">
                <br /> 
				 <br>
				<table id="tblList">
                    <thead>
                        <tr>	
                        <th>Item Code</th>
                        <th>Item Name</th>	
                        <th>UOM</th>	
                        <th>Quantity</th>
                        <th>Price/Unit</th>
                        <th>Rate</th>
                        <!--<th>Action</th>-->
                        </tr>
                    </thead>
				
                    <tbody id="disp_items">
                        <?php if(!empty($edit_product_items)) { $itemcount = 1; foreach($edit_product_items as $ITEMS) { ?>
                        <tr>
                        <td>
                        <?php if(isset($ITEMS['product_items_code'])) { echo $ITEMS['product_items_code']; } ?>
                        <input name="item_id[<?php echo $itemcount; ?>]" value="<?php echo $ITEMS['product_items_item_id']; ?>" type="hidden" />
                        <input id="item_code<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_items_code'])) { echo $ITEMS['product_items_code']; } ?>" type="hidden" />
                        </td>
                        <td>
                        <?php if(isset($ITEMS['product_items_name'])) { echo $ITEMS['product_items_name']; } ?>
                        <input name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_items_name'])) { echo $ITEMS['product_items_name']; } ?>" type="hidden" />
                        </td>
                        <td>
                       <?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name'];  } ?> 
                        <input name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_id'])) { echo $ITEMS['uom_id']; } ?>" />
                        <input name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($ITEMS['uom_name'])) { echo $ITEMS['uom_name']; } ?>" />
                        </td>
                        <td>
                        <a href="javascript:void(0);" id="quantity_value_<?php echo $itemcount; ?>" onclick="return openQuantityBox('<?php echo $itemcount; ?>');">
						<?php if(isset($ITEMS['product_items_qty'])) { echo $ITEMS['product_items_qty']; } ?>
                        </a>
                        <input id="quantity_<?php echo $itemcount; ?>" onblur="return closeQuantityBox('<?php echo $itemcount; ?>');" onkeyup="return edittotalrate(<?php echo $itemcount; ?>)" class="quantity" name="quantity[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_items_qty'])) { echo $ITEMS['product_items_qty']; } ?>"  type="hidden" />
                        </td>
						<td>
                        <a href="javascript:void(0);" id="item_priceperunit_value_<?php echo $itemcount; ?>" onclick="return openPriceperUnitBox('<?php echo $itemcount; ?>');">
						<?php if(isset($ITEMS['product_items_prcunit'])) { echo $ITEMS['product_items_prcunit']; } ?>
                        </a>
                        <input id="item_priceperunit_<?php echo $itemcount; ?>" onblur="return closePriceperUnitBox('<?php echo $itemcount; ?>');" onkeyup="return edittotalrate(<?php echo $itemcount; ?>)" class="quantity" name="item_priceperunit[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_items_prcunit'])) { echo $ITEMS['product_items_prcunit']; } ?>"  type="hidden" />
                        </td>
                        <td>
						 <span id="product_items_rate_value_<?php echo $itemcount; ?>"><?php if(isset($ITEMS['product_items_rate'])) { echo $ITEMS['product_items_rate']; } ?></span>
                        <input id="product_items_rate_<?php echo $itemcount; ?>" class="quantity" name="rate[<?php echo $itemcount; ?>]" value="<?php if(isset($ITEMS['product_items_rate'])) { echo $ITEMS['product_items_rate']; } ?>"  type="hidden" />
                        </td>
                        
                        </tr>
                    <?php $itemcount++; } } ?>
                    
                    </tbody>
				</table>
                <br />
				<br />
               
              
               <br />
               <br />
                <div class="row-fluid">
                    <div class="pull-right">
                        
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
               
                <br>
            
            
            </form>
				
          </div>

      </div>

</section>



  	<!--popup start -->
     <div id="item_to_pop_up" class="pop-up-display-content">
       <?php $this->load->view("pages/products/item_popup_chk");  ?>
	 </div>
     <!--popup end -->
     

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

	 // DOM Ready
	$(function() {

		// Binding a click event
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$('#itemincluded').bind('click', function(e) {

			 e.preventDefault();
			$('#item_to_pop_up').bPopup({
				position: [300, 50], //x, y
				closeClass:'close',
				follow: [true, true],
				modalClose: true
			});
		});
		
		
		
	});
})(jQuery);


		
</script>