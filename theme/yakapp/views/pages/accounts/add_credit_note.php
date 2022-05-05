<div class="bodyContents" style="min-height: 237px;">

    <div class="mainContainer row-fluid" style="min-height: 853px;">
    
      <!--<div style="min-height: 853px;" id="leftPanel" class="span2 row-fluid ">
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
      </div>-->
      
      <div style="min-height: 853px;" id="rightPanel" class="contentsDiv  span12 marginLeftZero">
        <div title="LBL_LEFT_PANEL_SHOW_HIDE" class="toggleButton" id="toggleButton"> <i class="icon-chevron-left" id="tButtonImage"></i> </div>
        <div class="container-fluid editViewContainer">
          <form enctype="multipart/form-data" action="<?php echo site_url(); ?>" method="post" name="EditView" id="EditView" class="form-horizontal recordEditView">
            <div class="contentHeader row-fluid">
              <h3 class="span8 textOverflowEllipsis">Creating Credit Note</h3>
              <span class="pull-right">
              <button type="submit" class="btn btn-success"><strong>Save</strong></button>
              <a onClick="javascript:window.history.back();" type="reset" class="cancelLink">Cancel</a></span></div>
            <table class="table table-bordered blockContainer showInlineTable equalSplit">
              <thead>
                <tr>
                  <th colspan="4" class="blockHeader">Credit Note</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Document No</label></td>
                  <td class="fieldValue medium">
                  	<div class="row-fluid">
                    	<span class="span10">
                      	<input type="text" class="input-large nameField" id="Leads_editView_fieldName_firstname" style="width:130px">
                      	</span>
                    </div>
                  </td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Account Name</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:true,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;accountname&quot;,&quot;label&quot;:&quot;Account Name&quot;}" value="" name="accountname" data-validation-engine="validate[required,funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large nameField" id="Leads_editView_fieldName_accountname">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Ref.Doc.Type</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;refdoctype&quot;,&quot;name&quot;:&quot;refdoctype&quot;,&quot;label&quot;:&quot;Ref Document Type&quot;}" value="" name="refdoctype" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_refdoctype">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Ref.Doc.No</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;refdocnumber&quot;,&quot;label&quot;:&quot;Ref Document Number&quot;}" value="" name="refdocnumber" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_refdocnumber">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Currency</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;currency&quot;,&quot;name&quot;:&quot;currency&quot;,&quot;label&quot;:&quot;Currency&quot;}" value="" name="currency" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large" id="Leads_editView_fieldName_currency">
                      </span></div></td>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Status</label></td>
                  <td class="fieldValue medium"><div class="row-fluid"><span class="span10">
                      <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;status&quot;,&quot;label&quot;:&quot;Status&quot;}" value="" name="status" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" class="input-large " id="Leads_editView_fieldName_status">
                      </span></div></td>
                </tr>
                <tr>
                  <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Date</label></td>
                  <td class="fieldValue medium">
                  <div class="row-fluid"><span class="span10"><div class="input-append row-fluid"><div class="span12 row-fluid date"><input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;date&quot;,&quot;name&quot;:&quot;start_date&quot;,&quot;label&quot;:&quot;Support Start Date&quot;,&quot;date-format&quot;:&quot;dd-mm-yyyy&quot;}" data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]" value="" data-date-format="dd-mm-yyyy" name="start_date" class="dateField" id="Products_editView_fieldName_start_date"><span class="add-on"><i class="icon-calendar"></i></span></div></div></span></div>
                  </td>
                  <td class="fieldLabel medium"></td>
                  <td class="fieldValue medium"></td>
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
  

