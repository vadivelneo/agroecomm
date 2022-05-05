<script>

function update_users(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/update_users/'); ?>/'+id+'/'+status;
    window.location.href = url;
    }
  else 
  {
      return false;
    }
}

 $(document).ready(function () {

$('#multipleItemselecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });

$("#search_first_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_user_first_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_first_name",
  });
$("#search_last_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_user_last_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_last_name",
  });
$("#search_user_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_user_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_user_name",
  });
$("#search_group_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_user_group_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_group_name",
  });
$("#search_user_email").autocomplete({
      source: "<?php echo site_url('autocomplete/get_user_email'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_user_email",
  });

  });



</script>

<?php echo $this->load->view('pages/master_left_side');
	
	$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

	$deliveryStatus = $this->uri->segment(3,"pending");

	if($sort_by == "asc") $order = "desc"; else $order = "asc";
 ?>
<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
      <!--<div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
          <li class="divider"> </li>
          <li><a href="#"><i class=""></i>Import</a></li>
          <li><a href="#"><i class=""></i>Export</a></li>
          <li><a href="#"><i class=""></i>Find Duplicates</a></li>
        </ul>
      </div>-->
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/addusers'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Users</strong></button>
      </span>
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('masters/search_users'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
      	  	<input type="text" 	value="" name="search_first_name" class="input-large" id="search_first_name" placeholder="First Name">
			<span id="auto_complete_first_name"></span>
			<input type="text" 	value="" name="search_last_name" class="input-large" id="search_last_name" placeholder="Last Name">
			<span id="auto_complete_last_name"></span>
			<input type="text" 	value="" name="search_user_name" class="input-large" id="search_user_name" placeholder="User Name">
			<span id="auto_complete_user_name"></span>
			
			<select class="chzn-select assigned_user_id" id="search_group_name" name="search_group_name" >
                        <option value="">Select an Option</option>
						<?php foreach($usr_gup as $usr_gup) { ?>
						<option value="<?php echo $usr_gup['group_name']; ?>"  ><?php echo $usr_gup['group_name']; ?></option>
						<?php } ?>
                      </select>
			<input type="text" 	value="" name="search_user_email" class="input-large" id="search_user_email" placeholder="Email">
			<span id="auto_complete_user_email"></span>
			<button id="search" name="search" type="submit" class="btn-success">Search</button>
			
 		 
      </div> 
      </form>
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
        <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
               <!-- <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="<?php echo site_url('masters/users/');?>/user_first_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">First Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/users/');?>/user_last_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Last Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/users/');?>/user_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">User Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/users/');?>/group_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">User Group Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/users/');?>/user_phone/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Mobile&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/users/');?>/user_email/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">User Email&nbsp;&nbsp;</a></th>

                <th>Actions</th>
              </tr>
              <?php
    if(!empty($users)) {
      $i = 1;
     foreach($users as $USERS) { ?>
              <tr>
                <!--<td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><?php echo $USERS['user_first_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><?php echo $USERS['user_last_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><?php echo $USERS['user_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><?php echo $USERS['group_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><?php echo $USERS['user_phone'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><?php echo $USERS['user_email'];?></a></td>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/viewusers/'); ?>/<?php echo $USERS['user_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/editusers/'); ?>/<?php echo $USERS['user_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li> <a class="javascript:void(0);" onclick="return update_users(<?php echo $USERS['user_id'] ;?>,'<?php echo $USERS['user_status']; ?>')"><span class="icon-trash"></span></a></li>
                  </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>
                 
                 </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>