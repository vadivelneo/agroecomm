<script language="javascript" type="text/javascript">
$(document).ready(function()
{ 
$('.formError').css("display","none");
  
  $('.save').click(function()
  { 
    //alert('hi');return false;
    var company = $("#company").val();
    var first_name = $("#first_name").val();
    var lastname = $("#lastname").val();
    var opr_name = $("#opr_name").val();
    var exep_close_date = $("#exep_close_date").val();
    var sales_stage = $("#sales_stage").val();
    var assign_to = $("#assign_to").val();
    
     
    if(company == "" )
    {
      $('#companyError').css("display","block");
      $('#company').focus(); 
      return false;
    }
    else
    {
    $('#companyError').css("display","none");
    }
    if(first_name == "" )
    {
      $('#first_nameError').css("display","block");
      $('#first_name').focus(); 
      return false;
    }
    else
    {
    $('#first_nameError').css("display","none");
    }
    if(lastname == "" )
    {
      $('#lastnameError').css("display","block");
      $('#lastname').focus(); 
      return false;
    }
    else
    {
    $('#lastnameError').css("display","none");
    }

    if(opr_name == "" )
    {
      $('#opr_nameError').css("display","block");
      $('#opr_name').focus(); 
      return false;
    }
    else
    {
    $('#opr_nameError').css("display","none");
    }

    if(exep_close_date == "" )
    {
      $('#exep_close_dateError').css("display","block");
      $('#exep_close_date').focus(); 
      return false;
    }
    else
    {
    $('#exep_close_dateError').css("display","none");
    }
    if(sales_stage == "" )
    {
      $('#sales_stageError').css("display","block");
      $('#sales_stage').focus(); 
      return false;
    }
    else
    {
    $('#sales_stageError').css("display","none");
    }

    if(assign_to == "" )
    {
      $('#assign_toError').css("display","block");
      $('#assign_to').focus(); 
      return false;
    }
    else
    {
    $('#assign_toError').css("display","none");
    }
     
  });
  $("#exep_close_date").datepicker({
		 
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }); 
    
});
</script>

 

<form action="<?php echo site_url('leads/leadconvertion').'/'.$this->uri->segment('3'); ?>" method="post" id="convertLeadForm" class="form-horizontal">
<div class="p-popup"> <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div class="title_head">
    <p>Convert Lead</p>
        <ul>
        	<li><button class="btn btn-success save" name="save" id="save" type="submit"><strong>Save</strong></button></li>
            <!--<li><a class="cancelLink" type="reset" onClick="">Cancel</a></span></li>-->
        </ul>
        </div>
  </div>
  
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 450px;">
      <div id="leadAccordion" class="modal-body accordion" style="overflow-y: scroll; width: auto; height: 450px;">
        <div class="accordion-group convertLeadModules">
          <div class="header accordion-heading">
            <div href="#Accounts_FieldInfo" class="accordion-toggle table-bordered moduleSelection" data-toggle="collapse" data-parent="#leadAccordion">
              <input type="checkbox" checked="" value="organization" name="organization" class="convertLeadModuleSelection alignBottom" id="organization">
              <span style="position:relative;top:2px;">&nbsp;&nbsp;&nbsp;Create&nbsp;Organization</span><span class="pull-right"><i class="iconArrow icon-inverted icon-chevron-up alignBottom"></i></span></div>
          </div>
          <div class="Accounts_FieldInfo accordion-body collapse fieldInfo  in">
            <table class="table table-bordered moduleBlock">
              <tbody>
                <tr>
                  <td class="fieldLabel">
                  <label class="muted pull-right marginRight10px"><span class="redColor">*</span> Organization Name</label>
                  </td>
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="companyError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                  <td class="fieldValue"><input id="company" name="company" type="text" class="input-large" value="<?php if(isset($Editleads->lead_company)){ echo $Editleads->lead_company;}?>"/></td>
                </tr>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px">Industry</label></td>
                  <td class="fieldValue">
                  	<select class="chzn-select " name="industry" id="industry">
               <option value="">Select an Option</option>
                  <option value="Apparel" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Apparel') { ?>selected="selected" <?php } } ?> >Apparel</option>
                  <option value="Banking" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Banking') { ?>selected="selected" <?php } } ?>>Banking</option>
                  <option value="Biotechnology" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Biotechnology') { ?>selected="selected" <?php } } ?>>Biotechnology</option>
                  <option value="Chemicals" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Chemicals') { ?>selected="selected" <?php } } ?>>Chemicals</option>
                  <option value="Communications" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Communications') { ?>selected="selected" <?php } } ?> >Communications</option>
                  <option value="Construction" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Apparel') { ?>selected="selected" <?php } } ?>>Construction</option>
                  <option value="Consulting" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Consulting') { ?>selected="selected" <?php } } ?>>Consulting</option>
                  <option value="Education" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Education') { ?>selected="selected" <?php } } ?>>Education</option>
                  <option value="Electronics" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Electronics') { ?>selected="selected" <?php } } ?>>Electronics</option>
                  <option value="Energy" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Energy') { ?>selected="selected" <?php } } ?>>Energy</option>
                  <option value="Engineering" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Engineering') { ?>selected="selected" <?php } } ?>>Engineering</option>
                  <option value="Entertainment" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Entertainment') { ?>selected="selected" <?php } } ?>>Entertainment</option>
                  <option value="Environmental" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Environmental') { ?>selected="selected" <?php } } ?>>Environmental</option>
                  <option value="Finance" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Finance') { ?>selected="selected" <?php } } ?>>Finance</option>
                  <option value="Food & Beverage" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Food & Beverage') { ?>selected="selected" <?php } } ?>>Food & Beverage</option>
                  <option value="Government" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Government') { ?>selected="selected" <?php } } ?>>Government</option>
                  <option value="Healthcare" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Healthcare') { ?>selected="selected" <?php } } ?>>Healthcare</option>
                  <option value="Hospitality" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Hospitality') { ?>selected="selected" <?php } } ?>>Hospitality</option>
                  <option value="Insurance" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Insurance') { ?>selected="selected" <?php } } ?>>Insurance</option>
                  <option value="Machinery" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Machinery') { ?>selected="selected" <?php } } ?>>Machinery</option>
                  <option value="Manufacturing" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Manufacturing') { ?>selected="selected" <?php } } ?>>Manufacturing</option>
                  <option value="Media" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Media') { ?>selected="selected" <?php } } ?>>Media</option>
                  <option value="Not For Profit" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Not For Profit') { ?>selected="selected" <?php } } ?>>Not For Profit</option>
                  <option value="Recreation" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Recreation') { ?>selected="selected" <?php } } ?>>Recreation</option>
                  <option value="Retail" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Retail') { ?>selected="selected" <?php } } ?>>Retail</option>
                  <option value="Shipping" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Shipping') { ?>selected="selected" <?php } } ?>>Shipping</option>
                  <option value="Technology" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Technology') { ?>selected="selected" <?php } } ?>>Technology</option>
                  <option value="Telecommunications" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Telecommunications') { ?>selected="selected" <?php } } ?>>Telecommunications</option>
                  <option value="Transportation" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Transportation') { ?>selected="selected" <?php } } ?>>Transportation</option>
                  <option value="Utilities" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Utilities') { ?>selected="selected" <?php } } ?>>Utilities</option>
                  <option value="Other" <?php if(isset($Editleads->lead_industry)){if($Editleads->lead_industry == 'Other') { ?>selected="selected" <?php } } ?>>Other</option>
                  </select>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion-group convertLeadModules">
          <div class="header accordion-heading">
            <div href="#Contacts_FieldInfo" class="accordion-toggle table-bordered moduleSelection" data-toggle="collapse" data-parent="#leadAccordion">
              <input type="checkbox" checked="" value="contact" name="contact" class="convertLeadModuleSelection alignBottom" id="contact">
              <span style="position:relative;top:2px;">&nbsp;&nbsp;&nbsp;Create&nbsp;Contact</span><span class="pull-right"><i class="iconArrow icon-inverted icon-chevron-down alignBottom"></i></span></div>
          </div>
          <div class="Contacts_FieldInfo accordion-body collapse fieldInfo " id="Contacts_FieldInfo">
            <table class="table table-bordered moduleBlock">
              <tbody>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span>First Name</label></td>
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="first_nameError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                  <td class="fieldValue"><input type="text" id="first_name"  name="first_name" class="input-large nameField" value="<?php if(isset($Editleads->lead_first_name)){ echo $Editleads->lead_first_name;}?>"/></td>
                </tr>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Last Name</label></td>
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="lastnameError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                  <td class="fieldValue"><input id="lastname" type="text" name="lastname" class="input-large nameField" value="<?php if(isset($Editleads->lead_last_name)){ echo $Editleads->lead_last_name;}?>" /></td>
                </tr>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px">Primary Email</label></td>
                  <td class="fieldValue"><input id="primary_email" name="primary_email" class="input-large" value="<?php if(isset($Editleads->lead_primary_email)){ echo $Editleads->lead_primary_email;}?>" /></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion-group convertLeadModules">
          <div class="header accordion-heading">
            <div href="#Potentials_FieldInfo" class="accordion-toggle table-bordered moduleSelection" data-toggle="collapse" data-parent="#leadAccordion">
              <input type="checkbox" checked="" value="opportunity" name="opportunity" class="convertLeadModuleSelection alignBottom" id="opportunity">
              <span style="position:relative;top:2px;">&nbsp;&nbsp;&nbsp;Create&nbsp;Opportunity</span><span class="pull-right"><i class="iconArrow icon-inverted icon-chevron-down alignBottom"></i></span></div>
          </div>
          <div class="Potentials_FieldInfo accordion-body collapse fieldInfo " id="Potentials_FieldInfo">
            <table class="table table-bordered moduleBlock">
              <tbody>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Opportunity Name</label></td>
                
                  <td class="fieldValue">  
				  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="opr_nameError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div><input type="text" class="input-large nameField" name="opr_name" id="opr_name"></td>
                </tr>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Expected Close Date</label></td>
                  
                  <td class="fieldValue">
				  <div class="input-append row-fluid">
                      <div class="span12 row-fluid date">
					  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="exep_close_dateError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                       <input class="input-large nameField" name="exep_close_date" id="exep_close_date">
                        <span class="add-on"><i class="icon-calendar"></i></span></div>
                    </div></td>
                </tr>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Sales Stage</label></td>
                  
                  <td class="fieldValue">
				  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="sales_stageError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                  <select id="sales_stage" name="sales_stage" class="chzn-select ">
                    <option value="">Select an Option</option>
                    <option value="Prospecting">Prospecting</option>
                    <option value="Qualification">Qualification</option>
                    <option value="NeedsAnalysis">Needs Analysis</option>
                    <option value="ValueProposition">Value Proposition</option>
                    <option value="IdentifyDecisionMakers">Identify Decision Makers</option>
                    <option value="PublicRelations">Perception Analysis</option>
                    <option value="ProposalorPriceQuote">Proposal or Price Quote</option>
                    <option value="NegotiationorReview">Negotiation or Review</option>
                    <option value="ClosedWon">Closed Won</option>
                    <option value="ClosedLost">Closed Lost</option>
                  </select>
                    </td>
                </tr>
                <tr>
                  <td class="fieldLabel"><label class="muted pull-right marginRight10px">Amount</label></td>
                  <td class="fieldValue"><div class="input-prepend"><span class="add-on">$</span>
                      <input type="text" style="width: 185px;" id="opp_amount" name="opp_amount" class="input-medium currencyField">
                    </div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="overflowVisible">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="fieldLabel"><label class="muted pull-right"><span class="redColor">*</span> Assigned To </label></td>
                <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id="assign_toError" style="margin-top: -18px;padding-left:100px;">
                                            <div class="formErrorContent">*This field is required</div>
                                            <div class="formErrorArrow"></div>
                                         </div>
                <td class="fieldValue">
                	<select  name="assign_to" class="chzn-select assigned_user_id" id="assign_to">
            		<optgroup label="Users">
                	<option value="Administrator"
                    <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'Administrator') { ?>selected="selected" <?php } } ?>>Administrator</option>
                    </optgroup>
                    <optgroup label="Groups">
                    <option value="marketinggroup" <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'marketinggroup') { ?>selected="selected" <?php } } ?>>Marketing Group</option>
                    <option value="supportgroup" <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'supportgroup') { ?>selected="selected" <?php } } ?>>Support Group</option>
                    <option value="teamselling" <?php if(isset($Editleads->lead_assigned_to)){if($Editleads->lead_assigned_to == 'teamselling') { ?>selected="selected" <?php } } ?>>Team Selling</option>
                    </optgroup>
                  </select>
                  </td>
              </tr>
              <tr>
                <td class="fieldLabel"><label class="muted pull-right">Transfer related record to</label></td>
                <td class="fieldValue"><input type="radio" value="Organization" name="transferModule" class="transferModule alignBottom" id="transferOrganization">
                  &nbsp; Organization &nbsp;&nbsp;
                  <input type="radio" checked="" value="Contacts" name="transferModule" class="transferModule alignBottom" id="transferContacts">
                  &nbsp; Contact &nbsp;&nbsp;</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      
    </div>
  
</div>
</form>