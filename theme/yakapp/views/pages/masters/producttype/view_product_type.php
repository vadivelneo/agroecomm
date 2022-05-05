<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
    <div class="rightPanel" style="padding: 14px 20px; width:96%;">
        
        <div class='container-fluid editViewContainer'>
            <form class="form-horizontal recordEditView" id="EditView" name="EditView" method="post" action="" enctype="multipart/form-data">
                <div class="contentHeader row-fluid">
                    <h3 class="span8 textOverflowEllipsis">View Courier Type</h3>
                    <span class="pull-right">
                       <!-- <button class="btn-success save" value="Save"  type="submit" name="edit_pro_type" id="edit_pro_type"><strong>Save</strong></button>-->
                         <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </span>
                </div>
                
                <table class="table table-bordered blockContainer showInlineTable equalSplit">
                    <thead>
                        <tr>
                            <th class="blockHeader" colspan="4">Courier Type Details</th>
                        </tr>
                    </thead>
                    
                    <tbody>
					
					 <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Courier Type ID
                                </label>
                            </td>
                             <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($protypedata->producttype_id)){ echo $protypedata->producttype_id;}?>
                                    </span>
                                 </div>
                             </td>
                             <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                <span class="redColor">*</span>Courier Type Code</label>
                            </td>
                             <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($protypedata->product_type_code)){ echo $protypedata->product_type_code;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Courier Type Name
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typ_nameError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($protypedata->products_type_name)){ echo $protypedata->products_type_name;}?>
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
                                       <?php if(isset($protypedata->product_type_company_id)){ echo $protypedata->company_short_name;}?> 
                                        
                                    </span>
                                </div>
                            </td>
                        </tr>
                        
                         <tr>
                          <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Prefix</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($protypedata->products_type_prefix)){ echo $protypedata->products_type_prefix;}?>
                                    </span>
                                </div>
                            </td>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px">
                                    <span class="redColor">*</span>Description
                                </label>
                            </td>
                            <td class="fieldValue medium">
                                <div class="row-fluid">
                                    <span class="span10">
                                    <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="pro_typr_descError" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                        <?php if(isset($protypedata->products_type_description)){ echo $protypedata->products_type_description;}?>
                                    </span>
                                 </div>
                             </td>
                        </tr>
						 <tr>
                            <td class="fieldLabel medium">
                                <label class="muted pull-right marginRight10px"><span class="redColor">*</span>Status</label>
                            </td>
                            <td class="fieldValue medium" >
                                <div class="row-fluid">
                                    <span class="span10">
                                        <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="prefix_Error" style="margin-top: -30px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                                       <?php if(isset($protypedata->product_type_stus)){ echo $protypedata->product_type_stus;}?>
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
                
                        
                <br>
                
                <div class="row-fluid">
                    <div class="pull-right">
                        <!--<button class="btn-success save" value="save" type="submit" name="edit_pro_type" id="edit_pro_type"><strong>Save</strong></button>-->
                        <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <br>
            
            </form>
                
          </div>

      </div>

</section>
