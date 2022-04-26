<script language="javascript" type="text/javascript">
$(document).ready(function()
{
 $('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var prefix_model = $("#prefix_model").val();
    var prefix_name = $("#prefix_name").val();
     
    if(prefix_model == "" )
    {
      $('#prefix_modelError').css("display","block");
      $('#prefix_model').focus(); 
      return false;
    }
    else
    {
    $('#prefix_modelError').css("display","none");
    }

    if(prefix_name == "")
    {
      $('#pre_nameError').css("display","block");
      $('#prefix_name').focus();  
      return false;
    }
      else
    {
      $('#pre_nameError').css("display","none");
    }
     
  });
    
});
</script>
<?php //print_r($prefixdata);exit;?>
<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
  <div class="rightPanel" style="padding: 14px 20px; width:96%;">
    
    <div class='container-fluid editViewContainer'>
      <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="#" enctype="multipart/form-data">
        <div class="contentHeader row-fluid">
          <h3 class="span8 textOverflowEllipsis">Updateing New Prefix</h3>
          <span class="pull-right">
            <button class="btn-success save" value="Save"  type="submit" name="prefix_edit_details" id="prefix_edit_details"><strong>Update</strong></button>
             <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Prefix Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Prefix Model
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_modelError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                         <input id="prefix_model" name="prefix_model" type="text" value="<?php if(isset($prefixdata->prefix_module)){ echo $prefixdata->module_name;}?>" readonly="readonly" class="input-large" /> <input id="prefix_model_id" name="prefix_model_id" type="hidden" value="<?php if(isset($prefixdata->prefix_module)){ echo $prefixdata->module_id;}?>" readonly="readonly" class="input-large" />
                                      <!-- <select class="chzn-select " name="prefix_model" id="prefix_model">
                                        <option value="">Select an Option</option>
                                        <option value="Vendor" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Vendor') { ?>selected="selected" <?php } } ?> >Vendor</option>
                                        <option value="Products" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Products') { ?>selected="selected" <?php } } ?> >Products</option>
                                        <option value="MaterialRequest" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'MaterialRequest') { ?>selected="selected" <?php } } ?> >Material Request</option>
                                        <option value="VendorQuotation" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'VendorQuotation') { ?>selected="selected" <?php } } ?> >Vendor Quotation</option>
                                        <option value="salesQuotation" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Quotation') { ?>selected="selected" <?php } } ?> >Vendor Quotation</option>
                                         
                                        
                                        <option value="PurchaseOrder" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'PurchaseOrder') { ?>selected="selected" <?php } } ?> >Purchase Order</option>
                                        <option value="PurchaseIndent" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'PurchaseIndent') { ?>selected="selected" <?php } } ?> >Purchase Indent</option>
                                        <option value="PurchaseInvoice" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'PurchaseInvoice') { ?>selected="selected" <?php } } ?> >Purchase Invoice</option>
										<option value="Customer" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Customer') { ?>selected="selected" <?php } } ?> >Customer</option>
										<option value="Salesorder" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Salesorder') { ?>selected="selected" <?php } } ?> >Sales Order</option>
										<option value="Deliverychallan" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Deliverychallan') { ?>selected="selected" <?php } } ?> >Delivery Challan</option>
										<option value="Pricebook" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Pricebook') { ?>selected="selected" <?php } } ?> >Price Book</option>
										<option value="Salesinvoice" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Salesinvoice') { ?>selected="selected" <?php } } ?> >Sales Invoice</option>
										<option value="Openingstock" <?php if(isset($prefixdata->prefix_module)){if($prefixdata->prefix_module == 'Openingstock') { ?>selected="selected" <?php } } ?> >Opening Stock</option>
                                        </select>-->
                                    </span>
                                 </div>
                             </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Prefix Name</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pre_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <input id="prefix_name" name="prefix_name" type="text" value="<?php if(isset($prefixdata->prefix_name)){ echo $prefixdata->prefix_name;}?>" class="input-large uppercase" />
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">Prefix Description</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="uom_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <textarea id="prefix_desc" name="prefix_desc" type="text" class="input-large nameField" /><?php if(isset($prefixdata->prefix_decsription)){ echo $prefixdata->prefix_decsription;}?></textarea>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                
            
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <button class="btn-success save" value="save" type="submit" name="prefix_edit_details" id="prefix_edit_details"><strong>Update</strong></button>
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
        
          </div>

      </div>

</section>
