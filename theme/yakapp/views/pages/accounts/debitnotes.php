

  <div class="bodyContents" style="min-height: 260px;">
    <div class="mainContainer row-fluid" style="min-height: 550px;">
      <!--<div style="min-height:550px;" id="leftPanel" class="span2 row-fluid ">
        <div class="row-fluid">
          <div class="sideBarContents">
            <div class="quickLinksDiv">
              <p class="selectedQuickLink " id="Accounts_sideBar_link_LBL_RECORDS_LIST" onClick="window.location.href='index.php?module=Accounts&amp;view=List'"><a href="index.php?module=Accounts&amp;view=List" class="quickLinks"><strong>Organization List</strong></a></p>
              <p class="unSelectedQuickLink" id="Accounts_sideBar_link_LBL_DASHBOARD" onClick="window.location.href='index.php?module=Accounts&amp;view=DashBoard'"><a href="index.php?module=Accounts&amp;view=DashBoard" class="quickLinks"><strong>Dashboard</strong></a></p>
            </div>
            <div class="clearfix"></div>
            <div class="quickWidgetContainer accordion">
              <div class="quickWidget">
                <div data-widget-url="module=Accounts&amp;view=IndexAjax&amp;mode=showActiveRecords" data-label="LBL_RECENTLY_MODIFIED" data-parent="#quickWidgets" data-toggle="collapse" data-target="#Accounts_sideBar_LBL_RECENTLY_MODIFIED" class="accordion-heading accordion-toggle quickWidgetHeader"><span class="pull-left"><img src="layouts/vlayout/skins/images/rightArrowWhite.png" data-downimage="layouts/vlayout/skins/images/downArrowWhite.png" data-rightimage="layouts/vlayout/skins/images/rightArrowWhite.png" class="imageElement"></span>
                  <h5 title="Recently Modified" class="title widgetTextOverflowEllipsis pull-right">Recently Modified</h5>
                  <div class="loadingImg hide pull-right">
                    <div class="loadingWidgetMsg"><strong>Loading Widget</strong></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div data-url="module=Accounts&amp;view=IndexAjax&amp;mode=showActiveRecords" id="Accounts_sideBar_LBL_RECENTLY_MODIFIED" class="widgetContainer accordion-body collapse"></div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <div style="min-height:550px;" id="rightPanel" class="contentsDiv  span12 marginLeftZero">
        <div title="LBL_LEFT_PANEL_SHOW_HIDE" class="toggleButton" id="toggleButton"><i class="icon-chevron-left" id="tButtonImage"></i></div>
        <div class="listViewPageDiv">
          <div class="listViewTopMenuDiv noprint">
            <div class="listViewActionsDiv row-fluid"><span class="btn-toolbar span4"><span class="btn-group listViewMassActions">
              <button data-toggle="dropdown" class="btn dropdown-toggle"><strong>Actions</strong>&nbsp;&nbsp;<i class="caret"></i></button>
              <ul class="dropdown-menu">
                <li id="Accounts_listView_massAction_LBL_EDIT"><a onClick="Vtiger_List_Js.triggerMassEdit(&quot;index.php?module=Accounts&amp;view=MassActionAjax&amp;mode=showMassEditForm&quot;);;" href="javascript:void(0);">Edit</a></li>
                <li id="Accounts_listView_massAction_LBL_DELETE"><a onClick="Vtiger_List_Js.massDeleteRecords(&quot;index.php?module=Accounts&amp;action=MassDelete&quot;);;" href="javascript:void(0);">Delete</a></li>
                <li id="Accounts_listView_massAction_LBL_ADD_COMMENT"><a onClick="Vtiger_List_Js.triggerMassAction('index.php?module=Accounts&amp;view=MassActionAjax&amp;mode=showAddCommentForm')" href="javascript:void(0);">Add Comment</a></li>
                <li id="Accounts_listView_massAction_LBL_SEND_EMAIL"><a onClick="Vtiger_List_Js.triggerSendEmail(&quot;index.php?module=Accounts&amp;view=MassActionAjax&amp;mode=showComposeEmailForm&amp;step=step1&quot;,&quot;Emails&quot;);;" href="javascript:void(0);">Send Email</a></li>
                <li id="Accounts_listView_massAction_LBL_SEND_SMS"><a onClick="Vtiger_List_Js.triggerSendSms(&quot;index.php?module=Accounts&amp;view=MassActionAjax&amp;mode=showSendSMSForm&quot;,&quot;SMSNotifier&quot;);;" href="javascript:void(0);">Send SMS</a></li>
                <li id="Accounts_listView_massAction_LBL_TRANSFER_OWNERSHIP"><a onClick="Vtiger_List_Js.triggerTransferOwnership(&quot;index.php?module=Accounts&amp;view=MassActionAjax&amp;mode=transferOwnership&quot;);" href="javascript:void(0);">Transfer Ownership</a></li>
                <li class="divider"></li>
                <li id="Accounts_listView_advancedAction_LBL_IMPORT"><a href="index.php?module=Accounts&amp;view=Import">Import</a></li>
                <li id="Accounts_listView_advancedAction_LBL_EXPORT"><a onClick="Vtiger_List_Js.triggerExportAction(&quot;index.php?module=Accounts&amp;view=Export&quot;);" href="javascript:void(0);">Export</a></li>
                <li id="Accounts_listView_advancedAction_LBL_FIND_DUPLICATES"><a onClick="Vtiger_List_Js.showDuplicateSearchForm(&quot;index.php?module=Accounts&amp;view=MassActionAjax&amp;mode=showDuplicatesSearchForm&quot;);" href="javascript:void(0);">Find Duplicates</a></li>
              </ul>
              </span><span class="btn-group">
              <a href="<?php echo site_url('accounts/new_debit_note'); ?>"><button class="btn addButton" id="Accounts_listView_basicAction_LBL_ADD_RECORD"><i class="icon-plus"></i>&nbsp;<strong>Add Debit Note</strong></button></a>
              </span></span><span class="btn-toolbar span4">&nbsp;</span><span class="hide filterActionImages pull-right"><i class="icon-ban-circle alignMiddle denyFilter filterActionImage pull-right" data-value="deny" title="Deny"></i><i class="icon-ok alignMiddle approveFilter filterActionImage pull-right" data-value="approve" title="LBL_APPROVE"></i><i class="icon-trash alignMiddle deleteFilter filterActionImage pull-right" data-value="delete" title="Delete"></i><i class="icon-pencil alignMiddle editFilter filterActionImage pull-right" data-value="edit" title="Edit"></i></span><span class="span4 btn-toolbar">
              <div class="listViewActions pull-right">
                <div class="pageNumbers alignTop "><span><span style="padding-right:5px" class="pageNumbersText">1 to 5</span><span class="icon-refresh pull-right totalNumberOfRecords cursorPointer"></span></span></div>
                <div class="btn-group alignTop margin0px"><span class="pull-right"><span class="btn-group">
                  <button type="button" disabled="disabled" id="listViewPreviousPageButton" class="btn"><span class="icon-chevron-left"></span></button>
                  <button data-toggle="dropdown" id="listViewPageJump" type="button" class="btn dropdown-toggle"><i title="Page Jump" class="vtGlyph vticon-pageJump"></i></button>
                  <ul id="listViewPageJumpDropDown" class="listViewBasicAction dropdown-menu">
                    <li><span class="row-fluid"><span class="span3 pushUpandDown2per"><span class="pull-right">Page</span></span><span class="span4">
                      <input type="text" value="1" class="listViewPagingInput" id="pageToJump">
                      </span><span class="span2 textAlignCenter pushUpandDown2per">of&nbsp;</span><span id="totalPageCount" class="span3 pushUpandDown2per"></span></span></li>
                  </ul>
                  <button type="button" disabled="" id="listViewNextPageButton" class="btn"><span class="icon-chevron-right"></span></button>
                  </span></span></div>
                <div class="settingsIcon"><span class="pull-right btn-group">
                  <button data-toggle="dropdown" href="#" class="btn dropdown-toggle"><i title="Settings" alt="Settings" class="icon-wrench"></i>&nbsp;&nbsp;<i class="caret"></i></button>
                  <ul class="listViewSetting dropdown-menu">
                    <li><a href="index.php?parent=Settings&amp;module=LayoutEditor&amp;sourceModule=Accounts">Edit Fields</a></li>
                    <li><a href="index.php?parent=Settings&amp;module=Workflows&amp;view=List&amp;sourceModule=Accounts">Edit Workflows</a></li>
                    <li><a href="index.php?parent=Settings&amp;module=Picklist&amp;view=Index&amp;source_module=Accounts">Edit Picklist Values</a></li>
                    <li><a href="index.php?parent=Settings&amp;module=Vtiger&amp;view=CustomRecordNumbering&amp;sourceModule=Accounts">Module Sequence Numbering</a></li>
                    <li><a href="index.php?module=Webforms&amp;parent=Settings&amp;view=Edit&amp;sourceModule=Accounts">Setup Webforms</a></li>
                  </ul>
                  </span></div>
              </div>
              <div class="clearfix"></div>
              <input type="hidden" value="" id="recordsCount">
              <input type="hidden" name="selectedIds" id="selectedIds">
              <input type="hidden" name="excludedIds" id="excludedIds">
              </span></div>
          </div>
          <div id="listViewContents" class="listViewContentDiv">
            <input type="hidden" value="List" id="view">
            <input type="hidden" value="" id="pageStartRange">
            <input type="hidden" value="" id="pageEndRange">
            <input type="hidden" value="1" id="previousPageExist">
            <input type="hidden" value="1" id="nextPageExist">
            <input type="hidden" value="accountname" id="alphabetSearchKey">
            <input type="hidden" value="" id="Operator">
            <input type="hidden" value="" id="alphabetValue">
            <input type="hidden" value="" id="totalCount">
            <input type="hidden" id="pageNumber" value="1">
            <input type="hidden" id="pageLimit" value="20">
            <input type="hidden" id="noOfEntries" value="5">
            <div class="alphabetSorting noprint">
              <table width="100%" style="border: 1px solid #ddd;table-layout: fixed" class="table-bordered">
                <tbody>
                  <tr>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="A">A</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="B">B</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="C">C</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="D">D</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="E">E</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="F">F</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="G">G</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="H">H</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="I">I</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="J">J</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="K">K</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="L">L</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="M">M</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="N">N</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="O">O</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="P">P</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="Q">Q</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="R">R</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="S">S</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="T">T</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="U">U</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="V">V</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="W">W</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="X">X</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="Y">Y</a></td>
                    <td style="padding : 0px !important" class="alphabetSearch textAlignCenter cursorPointer "><a href="#" id="Z">Z</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="alert-block msgDiv noprint" id="selectAllMsgDiv"><strong><a id="selectAllMsg">Select all&nbsp;Organizations&nbsp;(<span id="totalRecordsCount"></span>)</a></strong></div>
            <div class="alert-block msgDiv noprint" id="deSelectAllMsgDiv"><strong><a id="deSelectAllMsg">Deselect all</a></strong></div>
            <div class="contents-topscroll noprint">
              <div class="topscroll-div" style="width: 1078px;">&nbsp;</div>
            </div>
            <div class="listViewEntriesDiv contents-bottomscroll">
              <div class="bottomscroll-div" style="width: 1078px;">
                <input type="hidden" id="orderBy" value="">
                <input type="hidden" id="sortOrder" value="">
                <span id="loadingListViewModal" class="listViewLoadingImageBlock hide modal noprint"><img title="Loading" alt="no-image" src="layouts/vlayout/skins/softed/images/loading.gif" class="listViewLoadingImage">
                <p class="listViewLoadingMsg">Loading, Please wait.........</p>
                </span>
                <table class="table table-bordered listViewEntriesTable">
                  <thead>
                    <tr class="listViewHeaders">
                      <th width="5%"><input type="checkbox" id="listViewEntriesMainCheckBox"></th>
                      <th nowrap=""><a data-columnname="accountname" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Document No&nbsp;&nbsp;</a></th>
                      <th nowrap=""><a data-columnname="bill_city" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Ref.Doc.No&nbsp;&nbsp;</a></th>
                      <th nowrap=""><a data-columnname="website" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Date&nbsp;&nbsp;</a></th>
                      <th nowrap=""><a data-columnname="phone" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Account Name&nbsp;&nbsp;</a></th>
                      <th nowrap=""><a data-columnname="smownerid" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Ref.Doc.Type&nbsp;&nbsp;</a></th>
                      <th nowrap=""><a data-columnname="smownerid" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Amount&nbsp;&nbsp;</a></th>
                      <th nowrap=""><a data-columnname="smownerid" data-nextsortorderval="ASC" class="listViewHeaderValues" href="javascript:void(0);">Option&nbsp;&nbsp;</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td><div class="row-fluid">
                          <input type="text" data-fieldinfo="{&quot;mandatory&quot;:true,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;accountname&quot;,&quot;label&quot;:&quot;Organization Name&quot;}" value="" class="span9 listSearchContributor" name="accountname">
                        </div></td>
                      <td><div class="row-fluid">
                          <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;bill_city&quot;,&quot;label&quot;:&quot;Billing City&quot;}" value="" class="span9 listSearchContributor" name="bill_city">
                        </div></td>
                      <td><div class="row-fluid">
                          <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;url&quot;,&quot;name&quot;:&quot;website&quot;,&quot;label&quot;:&quot;Website&quot;}" value="" class="span9 listSearchContributor" name="website">
                        </div></td>
                      <td><div class="row-fluid">
                          <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;phone&quot;,&quot;name&quot;:&quot;phone&quot;,&quot;label&quot;:&quot;Primary Phone&quot;}" value="" class="span9 listSearchContributor" name="phone">
                        </div></td>
                      <td><div class="row-fluid">
                          <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;url&quot;,&quot;name&quot;:&quot;website&quot;,&quot;label&quot;:&quot;Website&quot;}" value="" class="span9 listSearchContributor" name="website">
                        </div></td>
                         <td><div class="row-fluid">
                          <input type="text" data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:true,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;phone&quot;,&quot;name&quot;:&quot;phone&quot;,&quot;label&quot;:&quot;Primary Phone&quot;}" value="" class="span9 listSearchContributor" name="phone">
                        </div></td>
                      <td><button data-trigger="listSearch" class="btn">Search</button></td>
                    </tr>
                    <tr id="Accounts_listView_row_1" data-recordurl="index.php?module=Accounts&amp;view=Detail&amp;record=8" data-id="8" class="listViewEntries">
                      <td colspan="8" style="text-align:center">No Records Found</td>
                    </tr>
                    
                  </tbody>
                </table>
                <!--added this div for Temporarily --></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

