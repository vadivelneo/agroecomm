<div class="bodyContents" style="min-height: 237px;">
    <div class="mainContainer row-fluid" style="min-height: 853px;">
      <div style="min-height: 853px;" id="leftPanel" class="span2 row-fluid ">
        <div class="row-fluid">
          <div class="sideBarContents">
            <div class="quickLinksDiv">
              <p class="unSelectedQuickLink" id="Leads_sideBar_link_LBL_RECORDS_LIST" onClick="window.location.href='index.php?module=Leads&amp;view=List'"><a href="<?php echo base_url(); ?>/index.php?module=Leads&amp;view=List" class="quickLinks"><strong>Leads List</strong></a></p>
              <p class="unSelectedQuickLink" id="Leads_sideBar_link_LBL_DASHBOARD" onClick="window.location.href='index.php?module=Leads&amp;view=DashBoard'"><a href="<?php echo base_url(); ?>/index.php?module=Leads&amp;view=DashBoard" class="quickLinks"><strong>Dashboard</strong></a></p>
            </div>
            <div class="clearfix"></div>
            <div class="quickWidgetContainer accordion">
              <div class="quickWidget">
                <div data-widget-url="module=Leads&amp;view=IndexAjax&amp;mode=showActiveRecords" data-label="LBL_RECENTLY_MODIFIED" data-parent="#quickWidgets" data-toggle="collapse" data-target="#Leads_sideBar_LBL_RECENTLY_MODIFIED" class="accordion-heading accordion-toggle quickWidgetHeader"><span class="pull-left"><img src="<?php echo base_url(); ?>/layouts/vlayout/skins/images/rightArrowWhite.png" data-downimage="layouts/vlayout/skins/images/downArrowWhite.png" data-rightimage="layouts/vlayout/skins/images/rightArrowWhite.png" class="imageElement"></span>
                  <h5 title="Recently Modified" class="title widgetTextOverflowEllipsis pull-right">Recently Modified</h5>
                  <div class="loadingImg hide pull-right">
                    <div class="loadingWidgetMsg"><strong>Loading Widget</strong></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div data-url="module=Leads&amp;view=IndexAjax&amp;mode=showActiveRecords" id="Leads_sideBar_LBL_RECENTLY_MODIFIED" class="widgetContainer accordion-body collapse"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="min-height: 853px;" id="rightPanel" class="contentsDiv  span10 marginLeftZero">
        <div title="LBL_LEFT_PANEL_SHOW_HIDE" class="toggleButton" id="toggleButton"> <i class="icon-chevron-left" id="tButtonImage"></i> </div>
        <div class="container-fluid editViewContainer">
          <form enctype="multipart/form-data" action="index.php" method="post" name="EditView" id="EditView" class="form-horizontal recordEditView">
            <input type="hidden" value="sid:838dfc9dd620c8d2798af633e9c83d4926ecdfcb,1427273881" name="__vtrftk">
            <input type="hidden" value="[]" name="picklistDependency">
            <input type="hidden" value="Leads" name="module">
            <input type="hidden" value="Save" name="action">
            <input type="hidden" value="" name="record">
            <input type="hidden" value="5" name="defaultCallDuration">
            <input type="hidden" value="5" name="defaultOtherEventDuration">
            <div class="contentHeader row-fluid">
              <h3 class="span8 textOverflowEllipsis">Creating New Lead</h3>
              <span class="pull-right">
              <button type="submit" class="btn btn-success"><strong>Save</strong></button>
              <a onClick="javascript:window.history.back();" type="reset" class="cancelLink">Cancel</a></span></div>
            <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                <tr>
                  <th colspan="4" class="blockHeader">Lead Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">First Name</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <select data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="salutationtype" style="width: 70px; display: none;" class="chzn-select chzn-done" id="selPGH">
                        <option value="">None</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                      </select>
                      <div id="selPGH_chzn" class="chzn-container chzn-container-single" style="width: 70px;"><a class="chzn-single" href="<?php echo base_url(); ?>/javascript:void(0)"><span>None</span>
                        <div><b></b></div>
                        </a>
                        <div style="left: -9000px; width: 68px; top: 28px;" class="chzn-drop">
                          <div class="chzn-search">
                            <input type="text" autocomplete="off" style="width: 33px;">
                          </div>
                          <ul class="chzn-results">
                            <li style="" class="active-result result-selected" id="selPGH_chzn_o_0">None</li>
                            <li style="" class="active-result" id="selPGH_chzn_o_1">Mr.</li>
                            <li style="" class="active-result" id="selPGH_chzn_o_2">Ms.</li>
                            <li style="" class="active-result" id="selPGH_chzn_o_3">Mrs.</li>
                            <li style="" class="active-result" id="selPGH_chzn_o_4">Dr.</li>
                            <li style="" class="active-result" id="selPGH_chzn_o_5">Prof.</li>
                          </ul>
                        </div>
                      </div>
                      &nbsp;
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;salutation&quot;,&quot;name&quot;:&quot;firstname&quot;,&quot;label&quot;:&quot;First Name&quot;}" value="" name="firstname" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large nameField" id="Leads_editView_fieldName_firstname" style="width:130px">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Last Name</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:true,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;lastname&quot;,&quot;label&quot;:&quot;Last Name&quot;}" value="" name="lastname" data-validation-engine="validate[required,funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large nameField" id="Leads_editView_fieldName_lastname">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Primary Phone</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;phone&quot;,&quot;name&quot;:&quot;phone&quot;,&quot;label&quot;:&quot;Primary Phone&quot;}" value="" name="phone" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_phone">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Company</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;company&quot;,&quot;label&quot;:&quot;Company&quot;}" value="" name="company" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_company">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Mobile Phone</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;phone&quot;,&quot;name&quot;:&quot;mobile&quot;,&quot;label&quot;:&quot;Mobile Phone&quot;}" value="" name="mobile" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_mobile">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Designation</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;designation&quot;,&quot;label&quot;:&quot;Designation&quot;}" value="" name="designation" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_designation">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Fax</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;phone&quot;,&quot;name&quot;:&quot;fax&quot;,&quot;label&quot;:&quot;Fax&quot;}" value="" name="fax" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_fax">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Lead Source</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <select data-selected-value="" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;picklist&quot;,&quot;name&quot;:&quot;leadsource&quot;,&quot;label&quot;:&quot;Lead Source&quot;,&quot;picklistvalues&quot;:{&quot;Cold Call&quot;:&quot;Cold Call&quot;,&quot;Existing Customer&quot;:&quot;Existing Customer&quot;,&quot;Self Generated&quot;:&quot;Self Generated&quot;,&quot;Employee&quot;:&quot;Employee&quot;,&quot;Partner&quot;:&quot;Partner&quot;,&quot;Public Relations&quot;:&quot;Public Relations&quot;,&quot;Direct Mail&quot;:&quot;Direct Mail&quot;,&quot;Conference&quot;:&quot;Conference&quot;,&quot;Trade Show&quot;:&quot;Trade Show&quot;,&quot;Web Site&quot;:&quot;Web Site&quot;,&quot;Word of mouth&quot;:&quot;Word of mouth&quot;,&quot;Other&quot;:&quot;Other&quot;}}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="leadsource" class="chzn-select  chzn-done" id="selE8D" style="display: none;">
                        <option value="">Select an Option</option>
                        <option value="Cold Call">Cold Call</option>
                        <option value="Existing Customer">Existing Customer</option>
                        <option value="Self Generated">Self Generated</option>
                        <option value="Employee">Employee</option>
                        <option value="Partner">Partner</option>
                        <option value="Public Relations">Public Relations</option>
                        <option value="Direct Mail">Direct Mail</option>
                        <option value="Conference">Conference</option>
                        <option value="Trade Show">Trade Show</option>
                        <option value="Web Site">Web Site</option>
                        <option value="Word of mouth">Word of mouth</option>
                        <option value="Other">Other</option>
                      </select>
                      <div id="selE8D_chzn" class="chzn-container chzn-container-single" style="width: 220px;"><a class="chzn-single" href="<?php echo base_url(); ?>/javascript:void(0)"><span>Select an Option</span>
                        <div><b></b></div>
                        </a>
                        <div style="left: -9000px; width: 218px; top: 28px;" class="chzn-drop">
                          <div class="chzn-search">
                            <input type="text" autocomplete="off" style="width: 183px;">
                          </div>
                          <ul class="chzn-results">
                            <li style="" class="active-result result-selected" id="selE8D_chzn_o_0">Select an Option</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_1">Cold Call</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_2">Existing Customer</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_3">Self Generated</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_4">Employee</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_5">Partner</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_6">Public Relations</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_7">Direct Mail</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_8">Conference</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_9">Trade Show</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_10">Web Site</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_11">Word of mouth</li>
                            <li style="" class="active-result" id="selE8D_chzn_o_12">Other</li>
                          </ul>
                        </div>
                      </div>
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Primary Email</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;email&quot;,&quot;name&quot;:&quot;email&quot;,&quot;label&quot;:&quot;Primary Email&quot;}" value="" name="email" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_email">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Industry</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <select data-selected-value="" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;picklist&quot;,&quot;name&quot;:&quot;industry&quot;,&quot;label&quot;:&quot;Industry&quot;,&quot;picklistvalues&quot;:{&quot;Apparel&quot;:&quot;Apparel&quot;,&quot;Banking&quot;:&quot;Banking&quot;,&quot;Biotechnology&quot;:&quot;Biotechnology&quot;,&quot;Chemicals&quot;:&quot;Chemicals&quot;,&quot;Communications&quot;:&quot;Communications&quot;,&quot;Construction&quot;:&quot;Construction&quot;,&quot;Consulting&quot;:&quot;Consulting&quot;,&quot;Education&quot;:&quot;Education&quot;,&quot;Electronics&quot;:&quot;Electronics&quot;,&quot;Energy&quot;:&quot;Energy&quot;,&quot;Engineering&quot;:&quot;Engineering&quot;,&quot;Entertainment&quot;:&quot;Entertainment&quot;,&quot;Environmental&quot;:&quot;Environmental&quot;,&quot;Finance&quot;:&quot;Finance&quot;,&quot;Food &amp; Beverage&quot;:&quot;Food &amp; Beverage&quot;,&quot;Government&quot;:&quot;Government&quot;,&quot;Healthcare&quot;:&quot;Healthcare&quot;,&quot;Hospitality&quot;:&quot;Hospitality&quot;,&quot;Insurance&quot;:&quot;Insurance&quot;,&quot;Machinery&quot;:&quot;Machinery&quot;,&quot;Manufacturing&quot;:&quot;Manufacturing&quot;,&quot;Media&quot;:&quot;Media&quot;,&quot;Not For Profit&quot;:&quot;Not For Profit&quot;,&quot;Recreation&quot;:&quot;Recreation&quot;,&quot;Retail&quot;:&quot;Retail&quot;,&quot;Shipping&quot;:&quot;Shipping&quot;,&quot;Technology&quot;:&quot;Technology&quot;,&quot;Telecommunications&quot;:&quot;Telecommunications&quot;,&quot;Transportation&quot;:&quot;Transportation&quot;,&quot;Utilities&quot;:&quot;Utilities&quot;,&quot;Other&quot;:&quot;Other&quot;}}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="industry" class="chzn-select  chzn-done" id="sel1D7" style="display: none;">
                        <option value="">Select an Option</option>
                        <option value="Apparel">Apparel</option>
                        <option value="Banking">Banking</option>
                        <option value="Biotechnology">Biotechnology</option>
                        <option value="Chemicals">Chemicals</option>
                        <option value="Communications">Communications</option>
                        <option value="Construction">Construction</option>
                        <option value="Consulting">Consulting</option>
                        <option value="Education">Education</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Energy">Energy</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Environmental">Environmental</option>
                        <option value="Finance">Finance</option>
                        <option value="Food &amp; Beverage">Food &amp; Beverage</option>
                        <option value="Government">Government</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Insurance">Insurance</option>
                        <option value="Machinery">Machinery</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Media">Media</option>
                        <option value="Not For Profit">Not For Profit</option>
                        <option value="Recreation">Recreation</option>
                        <option value="Retail">Retail</option>
                        <option value="Shipping">Shipping</option>
                        <option value="Technology">Technology</option>
                        <option value="Telecommunications">Telecommunications</option>
                        <option value="Transportation">Transportation</option>
                        <option value="Utilities">Utilities</option>
                        <option value="Other">Other</option>
                      </select>
                      <div id="sel1D7_chzn" class="chzn-container chzn-container-single" style="width: 220px;"><a class="chzn-single" href="<?php echo base_url(); ?>/javascript:void(0)"><span>Select an Option</span>
                        <div><b></b></div>
                        </a>
                        <div style="left: -9000px; width: 218px; top: 28px;" class="chzn-drop">
                          <div class="chzn-search">
                            <input type="text" autocomplete="off" style="width: 183px;">
                          </div>
                          <ul class="chzn-results">
                            <li style="" class="active-result result-selected" id="sel1D7_chzn_o_0">Select an Option</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_1">Apparel</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_2">Banking</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_3">Biotechnology</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_4">Chemicals</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_5">Communications</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_6">Construction</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_7">Consulting</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_8">Education</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_9">Electronics</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_10">Energy</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_11">Engineering</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_12">Entertainment</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_13">Environmental</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_14">Finance</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_15">Food &amp; Beverage</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_16">Government</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_17">Healthcare</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_18">Hospitality</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_19">Insurance</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_20">Machinery</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_21">Manufacturing</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_22">Media</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_23">Not For Profit</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_24">Recreation</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_25">Retail</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_26">Shipping</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_27">Technology</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_28">Telecommunications</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_29">Transportation</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_30">Utilities</li>
                            <li style="" class="active-result" id="sel1D7_chzn_o_31">Other</li>
                          </ul>
                        </div>
                      </div>
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Website</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;url&quot;,&quot;name&quot;:&quot;website&quot;,&quot;label&quot;:&quot;Website&quot;}" value="" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="website" class="input-large validate[custom[url]]" id="Leads_editView_fieldName_website">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Annual Revenue</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <div class="input-prepend"><span class="add-on">?</span>
                        <input type="text" data-number-of-decimal-places="2" data-group-seperator="," data-decimal-seperator="." value="" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;currency&quot;,&quot;name&quot;:&quot;annualrevenue&quot;,&quot;label&quot;:&quot;Annual Revenue&quot;,&quot;currency_symbol&quot;:&quot;?&quot;,&quot;decimal_seperator&quot;:&quot;.&quot;,&quot;group_seperator&quot;:&quot;,&quot;}" name="annualrevenue" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-medium currencyField" id="Leads_editView_fieldName_annualrevenue">
                      </div>
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Lead Status</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <select data-selected-value="" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;picklist&quot;,&quot;name&quot;:&quot;leadstatus&quot;,&quot;label&quot;:&quot;Lead Status&quot;,&quot;picklistvalues&quot;:{&quot;Attempted to Contact&quot;:&quot;Attempted to Contact&quot;,&quot;Cold&quot;:&quot;Cold&quot;,&quot;Contact in Future&quot;:&quot;Contact in Future&quot;,&quot;Contacted&quot;:&quot;Contacted&quot;,&quot;Hot&quot;:&quot;Hot&quot;,&quot;Junk Lead&quot;:&quot;Junk Lead&quot;,&quot;Lost Lead&quot;:&quot;Lost Lead&quot;,&quot;Not Contacted&quot;:&quot;Not Contacted&quot;,&quot;Pre Qualified&quot;:&quot;Pre Qualified&quot;,&quot;Qualified&quot;:&quot;Qualified&quot;,&quot;Warm&quot;:&quot;Warm&quot;}}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="leadstatus" class="chzn-select  chzn-done" id="sel2GI" style="display: none;">
                        <option value="">Select an Option</option>
                        <option value="Attempted to Contact">Attempted to Contact</option>
                        <option value="Cold">Cold</option>
                        <option value="Contact in Future">Contact in Future</option>
                        <option value="Contacted">Contacted</option>
                        <option value="Hot">Hot</option>
                        <option value="Junk Lead">Junk Lead</option>
                        <option value="Lost Lead">Lost Lead</option>
                        <option value="Not Contacted">Not Contacted</option>
                        <option value="Pre Qualified">Pre Qualified</option>
                        <option value="Qualified">Qualified</option>
                        <option value="Warm">Warm</option>
                      </select>
                      <div id="sel2GI_chzn" class="chzn-container chzn-container-single" style="width: 220px;"><a class="chzn-single" href="<?php echo base_url(); ?>/javascript:void(0)"><span>Select an Option</span>
                        <div><b></b></div>
                        </a>
                        <div style="left: -9000px; width: 218px; top: 28px;" class="chzn-drop">
                          <div class="chzn-search">
                            <input type="text" autocomplete="off" style="width: 183px;">
                          </div>
                          <ul class="chzn-results">
                            <li style="" class="active-result result-selected" id="sel2GI_chzn_o_0">Select an Option</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_1">Attempted to Contact</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_2">Cold</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_3">Contact in Future</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_4">Contacted</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_5">Hot</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_6">Junk Lead</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_7">Lost Lead</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_8">Not Contacted</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_9">Pre Qualified</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_10">Qualified</li>
                            <li style="" class="active-result" id="sel2GI_chzn_o_11">Warm</li>
                          </ul>
                        </div>
                      </div>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Number of Employees</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;integer&quot;,&quot;name&quot;:&quot;noofemployees&quot;,&quot;label&quot;:&quot;Number of Employees&quot;}" value="" name="noofemployees" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_noofemployees">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Rating</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <select data-selected-value="" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;picklist&quot;,&quot;name&quot;:&quot;rating&quot;,&quot;label&quot;:&quot;Rating&quot;,&quot;picklistvalues&quot;:{&quot;Acquired&quot;:&quot;Acquired&quot;,&quot;Active&quot;:&quot;Active&quot;,&quot;Market Failed&quot;:&quot;Market Failed&quot;,&quot;Project Cancelled&quot;:&quot;Project Cancelled&quot;,&quot;Shutdown&quot;:&quot;Shutdown&quot;}}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="rating" class="chzn-select  chzn-done" id="selGL4" style="display: none;">
                        <option value="">Select an Option</option>
                        <option value="Acquired">Acquired</option>
                        <option value="Active">Active</option>
                        <option value="Market Failed">Market Failed</option>
                        <option value="Project Cancelled">Project Cancelled</option>
                        <option value="Shutdown">Shutdown</option>
                      </select>
                      <div id="selGL4_chzn" class="chzn-container chzn-container-single" style="width: 220px;"><a class="chzn-single" href="<?php echo base_url(); ?>/javascript:void(0)"><span>Select an Option</span>
                        <div><b></b></div>
                        </a>
                        <div style="left: -9000px; width: 218px; top: 28px;" class="chzn-drop">
                          <div class="chzn-search">
                            <input type="text" autocomplete="off" style="width: 183px;">
                          </div>
                          <ul class="chzn-results">
                            <li style="" class="active-result result-selected" id="selGL4_chzn_o_0">Select an Option</li>
                            <li style="" class="active-result" id="selGL4_chzn_o_1">Acquired</li>
                            <li style="" class="active-result" id="selGL4_chzn_o_2">Active</li>
                            <li style="" class="active-result" id="selGL4_chzn_o_3">Market Failed</li>
                            <li style="" class="active-result" id="selGL4_chzn_o_4">Project Cancelled</li>
                            <li style="" class="active-result" id="selGL4_chzn_o_5">Shutdown</li>
                          </ul>
                        </div>
                      </div>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Secondary Email</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;email&quot;,&quot;name&quot;:&quot;secondaryemail&quot;,&quot;label&quot;:&quot;Secondary Email&quot;}" value="" name="secondaryemail" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_secondaryemail">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Assigned To</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <select data-fieldinfo="{&quot;mandatory&quot;:true,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;owner&quot;,&quot;name&quot;:&quot;assigned_user_id&quot;,&quot;label&quot;:&quot;Assigned To&quot;,&quot;picklistvalues&quot;:{&quot;Users&quot;:{&quot;1&quot;:&quot;admin Administrator&quot;},&quot;Groups&quot;:{&quot;3&quot;:&quot;Marketing Group&quot;,&quot;4&quot;:&quot;Support Group&quot;,&quot;2&quot;:&quot;Team Selling&quot;}}}" name="assigned_user_id" data-name="assigned_user_id" data-validation-engine="validate[ required,funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="chzn-select assigned_user_id chzn-done" id="selMRT" style="display: none;">
                        <optgroup label="Users">
                        <option data-userid="1" data-recordaccess="true" selected="" data-picklistvalue="admin Administrator" value="1">admin Administrator</option>
                        </optgroup>
                        <optgroup label="Groups">
                        <option data-recordaccess="true" data-picklistvalue="Marketing Group" value="3">Marketing Group</option>
                        <option data-recordaccess="true" data-picklistvalue="Support Group" value="4">Support Group</option>
                        <option data-recordaccess="true" data-picklistvalue="Team Selling" value="2">Team Selling</option>
                        </optgroup>
                      </select>
                      <div id="selMRT_chzn" class="chzn-container chzn-container-single" style="width: 220px;"><a class="chzn-single" href="<?php echo base_url(); ?>/javascript:void(0)"><span>admin Administrator</span>
                        <div><b></b></div>
                        </a>
                        <div style="left: -9000px; width: 218px; top: 28px;" class="chzn-drop">
                          <div class="chzn-search">
                            <input type="text" autocomplete="off" style="width: 183px;">
                          </div>
                          <ul class="chzn-results">
                            <li class="group-result" id="selMRT_chzn_g_0">Users</li>
                            <li style="" class="active-result result-selected group-option" id="selMRT_chzn_o_1">admin Administrator</li>
                            <li class="group-result" id="selMRT_chzn_g_2">Groups</li>
                            <li style="" class="active-result group-option" id="selMRT_chzn_o_3">Marketing Group</li>
                            <li style="" class="active-result group-option" id="selMRT_chzn_o_4">Support Group</li>
                            <li style="" class="active-result group-option" id="selMRT_chzn_o_5">Team Selling</li>
                          </ul>
                        </div>
                      </div>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Email Opt Out</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="hidden" value="0" name="emailoptout">
                      <input type="checkbox" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;boolean&quot;,&quot;name&quot;:&quot;emailoptout&quot;,&quot;label&quot;:&quot;Email Opt Out&quot;}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="emailoptout" id="Leads_editView_fieldName_emailoptout">
                      </span></div></td>
                </tr>
              </tbody>
            </table>
            <br>
            <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                <tr>
                  <th colspan="4" class="blockHeader">Address Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Street</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <textarea data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;text&quot;,&quot;name&quot;:&quot;lane&quot;,&quot;label&quot;:&quot;Street&quot;}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="lane" class="row-fluid " id="Leads_editView_fieldName_lane"></textarea>
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">PO Box</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;pobox&quot;,&quot;label&quot;:&quot;PO Box&quot;}" value="" name="pobox" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_pobox">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Postal Code</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;code&quot;,&quot;label&quot;:&quot;Postal Code&quot;}" value="" name="code" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_code">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">City</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;city&quot;,&quot;label&quot;:&quot;City&quot;}" value="" name="city" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_city">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Country</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;country&quot;,&quot;label&quot;:&quot;Country&quot;}" value="" name="country" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_country">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">State</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;state&quot;,&quot;label&quot;:&quot;State&quot;}" value="" name="state" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_state">
                      </span></div></td>
                </tr>
              </tbody>
            </table>
            <br>
            <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                <tr>
                  <th colspan="4" class="blockHeader">Description Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Description</label></td>
                  <td colspan="3" class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <textarea data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;text&quot;,&quot;name&quot;:&quot;description&quot;,&quot;label&quot;:&quot;Description&quot;}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" name="description" class="span11 " id="Leads_editView_fieldName_description"></textarea>
                      </span></div></td>
                </tr>
              </tbody>
            </table>
            <br>
            <div class="row-fluid">
              <div class="pull-right">
                <button type="submit" class="btn btn-success"><strong>Save</strong></button>
                <a onClick="javascript:window.history.back();" type="reset" class="cancelLink">Cancel</a></div>
              <div class="clearfix"></div>
            </div>
            <br>
          </form>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" value="60" class="hide noprint" id="activityReminder">
  

