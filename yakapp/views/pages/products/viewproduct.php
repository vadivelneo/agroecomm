<?php echo $this->load->view('pages/master_left_side'); 
?>

<section>
	<div class="rightPanel" style="padding: 14px 20px; width:96%;">
		
		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="<?php echo site_url('product/editproduct').'/'.$this->uri->segment('3');?>" enctype="multipart/form-data">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis">View Material</h3>
					<div class="pull-right">
                        
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                </div>
                
                 <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Material Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
						 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor"></span>Material ID
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->material_mat_id)){ echo $edit_product->material_mat_id;}?>
                                    </span>
                                 </div>
                             </td>
							  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Material Code
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_nameError" style="margin-top: -30px;">
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
                                <label class="muted pull-right marginRight10px">Material Name
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
                                <label class="muted pull-right marginRight10px">SKU</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_mfr_part_number)){ echo $edit_product->product_mfr_part_number;}?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Store Division
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_product->division_name)){ echo $edit_product->division_name;}?>
                                    </span>
                                 </div>
                             </td>
							 
							  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Store</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                     
										 <?php if(isset($edit_product->store_id)){ echo $edit_product->store_name;}?>
                                        </select>
                                    </span>
                                </div>
                            </td>
							 
                         
                            
                        </tr>
                        
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Material Category</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_typeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <?php if(isset($edit_product->products_type_id)){ echo $edit_product->products_type_name;}?>
                                        
                                        
                                    </span>
                                </div>

                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Material Group</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_groupError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										  <?php if(isset($edit_product->products_group_id)){ echo $edit_product->products_group_name;}?>
                                       
                                    </span>
                                </div>
                            </td>
                       

                        </tr>
                
                        <tr>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">UOM1
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_usageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <?php if(isset($edit_product->uom_id)){ echo $edit_product->uom_name;}?>
                                       
                                    </span>
                                 </div>
                             </td>
							  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">UOM2
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
										 <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_usageunitError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <?php if(isset($edit_product->uom_id)){ echo $edit_product->uom_name;}?>
                                        
                                    </span>
                                 </div>
                             </td>
                       
                            
                        </tr>
                        <tr>
						  <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"> Color
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_item_codeError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										  <?php if(isset($edit_product->material_color)){ echo $edit_product->material_color;}?>
                                         
                                    </span>
                                 </div>
                             </td>
							 
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Grade</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                       <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "product_manufacturerError1" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
										 <?php if(isset($edit_product->material_grade)){ echo $edit_product->material_grade;}?>
                                          
                                    </span>
                                </div>

                            </td>
                        </tr>
                        <tr>        
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Description
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typr_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->material_description)){ echo $edit_product->material_description;}?>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Material Ingredients
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typr_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->mi_name)){ echo $edit_product->mi_name;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        
                        <tr>        
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Qc Qty
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typr_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($edit_product->product_qc_qty)){ echo $edit_product->product_qc_qty;}?>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                
                            </td>
                            <td class="fieldValue medium">
                               
                             </td>
                        </tr>
                        
                    </tbody>
                </table>
				 <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Pricing Information</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">MRP
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
                                <label class="muted pull-right marginRight10px">Selling Price</label>
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
                                <label class="muted pull-right marginRight10px">Cost Price
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
                                	<span class="taxLabel alignBottom">CGST<span class="paddingLeft10px">(%)</span></span> 
									
                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_gst_tax)){ echo $edit_product->product_gst_tax;}?>
                                    </span>
                                </div>
                            </td>
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="taxLabel alignBottom">SGST<span class="paddingLeft10px">(%)</span></span>
									
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                       <?php if(isset($edit_product->product_sgst_tax)){ echo $edit_product->product_sgst_tax;}?>
                                    </span>
                                 </div>
                            </td>
							</tr>
							<tr>
							
							<td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                	<span class="taxLabel alignBottom">IGST<span class="paddingLeft10px">(%)</span></span> 

                                </label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <?php if(isset($edit_product->product_igst_tax)){ echo $edit_product->product_igst_tax;}?>
                                    </span>
                                </div>
                            </td>
                                                     
                       
							
                          
							 <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">HSN/SAC</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
									<div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="product_spError" style="margin-top: -30px;">
                                            <div class="formErrorContent">This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($edit_product->product_hsn_sac)){ 
										echo $edit_product->product_hsn_sac;}?>
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
						                                                
                <br />
                        
                						
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
                                <label class="muted pull-right marginRight10px">Weight</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                          <?php if(isset($edit_product->product_stock_weight)){ echo $edit_product->product_stock_weight;}?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kg/Gm
                                    </span>
                                    
									
                                   
                                </div>
                            </td>
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
                        </tr>
                        <tr id="squarefeet" class="txtMult" >
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
                        </tr>
                       
                        <tr>
                            
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
                            <td>
                            </td>
                            <td>
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
                <input type ="hidden" value="<?php //echo count($edit_product_items); ?>" name="count_of_items " id="count_of_items">
                <br /> 
				 <br>
				<table id="tblList">
                    <thead>
                         <tr>	
                            <th>Material ID</th>
							<th>Material Name</th>
                            <th>Store</th>
                            <th>Material Group</th>							
                            <th>Material Category</th>	
                            <th>UOM</th>
                            <th>Color</th>
                            
							  
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