<?php echo $this->load->view('pages/price_left_side'); ?>

<section>

	<div class="rightPanel" style="padding: 14px 20px; width:96%;">

		<div class='container-fluid editViewContainer'>
			<form class="form-horizontal proicelistForm" id="proicelistForm" name="proicelistForm" method="post" action="<?php echo site_url('pricebook/viewpricebook').'/'.$this->uri->segment('3'); ?>">
				<div class="contentHeader row-fluid">
					<h3 class="span8 textOverflowEllipsis"><?php if(isset($pricebookvalue->price_book_name)) { echo $pricebookvalue->price_book_name; } ?></h3>
					<div class="pull-right">
						<!--<button class="btn-success priceBookupdate" type="submit" name="priceBookupdate" id="priceBookupdate"><strong>Update</strong></button>-->
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
				</div>

				<table class="table table-bordered blockContainer showInlineTable equalSplit">
					<thead>
						<tr>
							<th class="blockHeader" colspan="4">Price Book Details</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									<span class="redColor">*</span>Price Book Name
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										<div class="formError" id="pricebooknameError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<?php if(isset($pricebookvalue->price_book_name)) { echo $pricebookvalue->price_book_name; } ?></span>
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Price Book Code</label>
							</td>
							<td class="fieldValue medium" >
								<div class="row-fluid">
									<span class="span10">
										<div class="parentFormEditView formError" id="pricebookcodeError" style="margin-top: -30px;">
											<div class="formErrorContent">This field is required</div>
											<div class="formErrorArrow"></div>
										</div>
										<?php if(isset($pricebookvalue->price_book_code)) { echo $pricebookvalue->price_book_code; } ?>
										<input id="pricebookcode_prefix" type="hidden" name="pricebookcode_prefix" value="<?php echo $pricePrefix; ?>"/>
									</span>
								</div>
	
							</td>
						</tr>
						<tr>
							<td class="fieldLabel medium">
								<label class="muted pull-right marginRight10px">
									Description
								</label>
							</td>
							<td class="fieldValue medium">
								<div class="row-fluid">
									<span class="span10">
										
                                        	<?php if(isset($pricebookvalue->price_book_description)) { echo $pricebookvalue->price_book_description; } ?>
                                        
									</span>
								</div>
							</td>
							<td class="fieldLabel medium">	<label class="muted pull-right marginRight10px"><span class="redColor">*</span>Scheme Code&nbsp;</label>
	
							</td>
							<td class="fieldValue medium" >
                            <?php if(isset($pricebookvalue->scheme_code)) { echo $pricebookvalue->scheme_code; } ?>
                            &nbsp;
			
							</td>
						</tr> 

					</tbody>
				</table>

				<br />
				<br />

				<table>
					<thead>
						<tr>
                       		<th>Sno</th>
							<th>Item Code</th>
							<th>SKU</th>
                            <th>Division</th>
							<th>Item</th>
							<th>Incentive Rate</th>
							<th>Handling Charges</th>
							<th>Selling Price</th>
                           
							<th>CGST</th>	
							<th>SGST</th>
							<th>IGST</th>
							<th>Selling Price with tax</th>
                         </tr>
                    </thead>
                    <tbody>
							<?php
			  
							if(!empty($product_list))
							{
                            $itemcount = 1; 
							foreach($pricelist as $PROLST) 
							{ 
							?>
							<tr>
                          
                            <td>
                              <?php  echo  $itemcount;  ?>
                            </td>
								<td>
									<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
                                    <input id="item_id_<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_id'])) { echo $PROLST['product_id']; } ?>" type="hidden" />
                                    <input id="item_code_<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
								</td>
                                <td>
									<?php if(isset($PROLST['product_mfr_part_number'])) { echo $PROLST['product_mfr_part_number']; } ?>
								</td>
                                 <td>
									<?php if(isset($PROLST['division_name'])) { echo $PROLST['division_name']; } ?>
								</td>
								<td>
									<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
									<input id="item_name_<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
                                    <input id="item_uom_id_<?php echo $itemcount; ?>" class="quantity" name="item_uom_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['product_stock_uom_id'])) { echo $PROLST['product_stock_uom_id']; } ?>" />
								</td>
								<td>
									<?php if(isset($PROLST['price_book_price_incentive_rate'])) { echo $PROLST['price_book_price_incentive_rate']; } ?>
								</td>
								<td>
									<?php if(isset($PROLST['price_book_price_handling_charge'])) { echo $PROLST['price_book_price_handling_charge']; } ?>
								</td>
								<td>
									<?php if(isset($PROLST['price_book_price_selling_price'])) { echo $PROLST['price_book_price_selling_price']; } ?>
								</td>
                                
                                
								<td>
									<?php if(isset($PROLST['price_book_price_gst'])) { echo $PROLST['price_book_price_gst']; } ?>
								</td>
								<td>
									<?php if(isset($PROLST['price_book_price_sgst'])) { echo $PROLST['price_book_price_sgst']; } ?>
								</td>
								<td>
									<?php if(isset($PROLST['price_book_price_igst'])) { echo $PROLST['price_book_price_igst']; } ?>
								</td>
								<td>
									<?php
									$item_selling_total = (($PROLST['price_book_price_incentive_rate'] * 30) / 100) + $PROLST['price_book_price_handling_charge']  + $PROLST['price_book_price_incentive_rate'];
									$gst_tax = $PROLST['price_book_price_gst'] + $PROLST['price_book_price_sgst'];
									$selling_price_tax = ($item_selling_total * $gst_tax) / 100 ;
									if(isset($PROLST['price_book_price_selling_price'])) { echo $item_selling_total + $selling_price_tax; } ?>
								</td>
								
							</tr>
						<?php 
						$itemcount++; 
						} 
							}
						?>
					</tbody>
				</table>
				<br />
				<br />
				<br />
				<br />
				<div class="row-fluid">
					<div class="pull-right">
						<!--<button class="btn-success priceBookupdate" type="submit" name="priceBookupdate" id="priceBookupdate"><strong>Update</strong></button>-->
						<a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<br>
			</form>
        </div>

	</div>

</section>
