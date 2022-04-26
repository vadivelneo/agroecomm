<?php $this->load->view('pages/crm_left_side'); ?>

<section>
  <div class="rightPanel" style="padding: 14px 20px; width:96%;">
    <div class='container-fluid editViewContainer'>
      
        <div class="contentHeader row-fluid">
          <h3 class="span3 textOverflowEllipsis"> view Lead</h3>
          <div class="span7">
		  
            <div class="pull-right detailViewButtoncontainer">
              <div class="btn-toolbar">
			  <span class="btn-group">
                <span class="btn"><strong>Edit</strong></span>
                </span>
				<span class="btn-group">
                <span class="btn" id="assign_next_meeting"><strong>Assign Meeting</strong></span>
                </span>
				<span class="btn-group">
                <span class="btn" id="convert_lead"><strong>Convert Lead</strong></span>
                </span>
				
			<!--	<span class="btn-group">
                <span id="morejump" class="btn dropdown-toggle"><strong>More</strong>&nbsp;&nbsp;<i class="caret1"></i></span>
                <ul class="dropdown-menu more pull-right">
                  <li><a href="#">Delete Lead</a></li>
                  <li><a href="#">Duplicate</a></li>
                  <li><a href="#">Add Document</a></li>
                  <li><a href="#">Send SMS</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Add Event</a></li>
                  <li><a href="#">Add To Do</a></li>
                </ul>
                </span>
                <span class="btn-group">
                <span class="btn dropdown-toggle settings"><i title="Settings" alt="Settings" class="icon-wrench"></i>&nbsp;&nbsp;<i class="caret1"></i></span>
                <ul class="listViewSetting dropdown-menu">
                  <li><a href="#">Edit Fields</a></li>
                  <li><a href="#">Edit Workflows</a></li>
                  <li><a href="#">Edit Picklist Values</a></li>
                  <li><a href="#">Module Sequence Numbering</a></li>
                  <li><a href="#">Setup Webforms</a></li>
                  <li><a href="#">Edit Field Mapping</a></li>
                </ul>
                </span>-->
                </div>
            </div>
          </div>
		  <div class="sessionMsg" id="ErrorMsg"><?php echo $this->session->flashdata('message'); ?></div>
          <span class="pull-right">
<!--              <button class="btn-success save" type="submit" name="save" id="save"><strong>Update</strong></button>
-->             <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a></span>
        </div>
        <br />
        <br />
        <table class="table table-bordered blockContainer showInlineTable equalSplit">
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Lead Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> First Name</label>
         
          </td>
          
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                  
              	<?php if(isset($Editleads->lead_salutation)){ echo $Editleads->lead_salutation; } ?>
              
              &nbsp;
              
             <?php if(isset($Editleads->lead_first_name)){ echo $Editleads->lead_first_name;}?>
              
              </span></div>
              </td>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Last Name</label></td>
          <td class="fieldValue medium" >
          	 <div class="row-fluid"><span class="span10">
                  
            
            <?php if(isset($Editleads->lead_last_name)){ echo $Editleads->lead_last_name;}?>
            </span>
        </div>
        </td>
      
        </tr>
      
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span> Mobile Phone</label>
        </td>
      
        <td class="fieldValue medium" >
        <div class="row-fluid"><span class="span10">
                  
        <?php if(isset($Editleads->lead_mobile)){ echo $Editleads->lead_mobile;}?>
          
          </span>
          </div>
        
        </td>
      
      
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Company</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_company)){ echo $Editleads->lead_company;}?>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Primary Email</label></td>
       
        <td class="fieldValue medium" > <div class="row-fluid"><span class="span10">
           <?php if(isset($Editleads->lead_primary_email)){ echo $Editleads->lead_primary_email;}?>
            </span></div>
            </td>
            
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Designation</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_designation)){ echo $Editleads->lead_designation;}?>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">  Assigned To</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
        <?php if(isset($Editleads->lead_assigned_to)){ echo $Editleads->lead_assigned_to; } ?>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Primary Phone</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_phone)){ echo $Editleads->lead_phone;}?>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Fax</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_fax_number)){ echo $Editleads->lead_fax_number;}?>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Lead Source</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
         	<?php if(isset($Editleads->lead_source)){ echo $Editleads->lead_source; } ?>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Website</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_website)){ echo $Editleads->lead_website;}?>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Industry</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_industry)){ echo $Editleads->lead_industry; } ?>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Lead Status</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_status)){ echo $Editleads->lead_status; } ?>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Annual Revenue</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            
              <?php if(isset($Editleads->lead_annual_revenue)){ echo $Editleads->lead_annual_revenue;}?>
            
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Rating</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_rating)); { echo $Editleads->lead_rating; } ?>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Number of Employees</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_annual_revenue)){ echo $Editleads->lead_no_of_employees;}?>
            </span></div></td>
      </tr>
      <tr>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Secondary Email</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if(isset($Editleads->lead_secondary_email)){ echo $Editleads->lead_secondary_email;}?>
            </span></div></td>
        <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Email Opt Out</label></td>
        <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
            <?php if($Editleads->lead_email_optout=="yes"){echo 'yes';}else{echo "NO";}?>
            </span></div></td>
      </tr>
        </tbody>
      
    </table>
    <br>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Address Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Street</label></td>
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
              <?php if(isset($Editleads_addr->lead_street)){ echo $Editleads_addr->lead_street;}?>
              </span></div></td>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">City</label></td>
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
              Chennai
              </span></div></td>
        </tr>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">State</label></td>
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
                India
              </span></div></td>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Country</label></td>
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
               Tamil Nadu 
              </span></div></td>
        </tr>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Zip Code</label></td>
          <td class="fieldValue medium" ><div class="row-fluid"><span class="span10">
              <?php if(isset($Editleads_addr->lead_zipcode)){ echo $Editleads_addr->lead_zipcode;}?>
              </span></div></td>
          
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table table-bordered blockContainer showInlineTable equalSplit">
      <thead>
        <tr>
          <th class="blockHeader" colspan="4">Description Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Description</label></td>
          <td class="fieldValue medium"  colspan="3"  ><div class="row-fluid"><span class="span10">
           <?php if(isset($Editleads_addr->lead_description)){ echo $Editleads_addr->lead_description;}?>
              </span></div></td>
        </tr>
      </tbody>
    </table>
        <br>
      
    </div>
  </div>
  
  <!--popup start -->
   <div id="convert_lead_to_pop_up" class="pop-up-display-content singleitemscontent">
      <?php $this->load->view("pages/leads/lead_convert");  ?>
	</div>
  <!--popup end -->  
  <!--popup start -->
   <div id="assign_meeting_popup" class="pop-up-display-content singleitemscontent">
      <?php $this->load->view("pages/leads/lead_next_meeting");  ?>
	</div>
  <!--popup end -->
  
</section>
<script>
$(document).ready(function(){
    $("#morejump").click(function(){
        $(".more").toggle();
    });
});

</script>

<script>
// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {
	 // DOM Ready
	$(function() {
		// From jQuery v.1.7.0 use .on() instead of .bind()
		$('#convert_lead').bind('click', function(e) {

			 e.preventDefault();
			$('#convert_lead_to_pop_up').bPopup({
				position: [400, 50], //x, y
				closeClass:'close',
				follow: [true, true],
				modalClose: true
			});

		});
		
		$('#assign_next_meeting').bind('click', function(e) {

			 e.preventDefault();
			$('#assign_meeting_popup').bPopup({
				position: [100, 120], //x, y
				closeClass:'close',
				follow: [true, true],
				modalClose: true
			});

		});

	});
})(jQuery);
</script>