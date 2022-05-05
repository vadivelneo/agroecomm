<script>

function update_usersgrp(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/update_usersgrp/'); ?>/'+id+'/'+status;
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

  });


</script>

<?php echo $this->load->view('pages/master_left_side'); 
$sessionuserData = $this->session->userdata('userlogin');

$user_group_id=$sessionuserData['group_id'];

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
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/addusers_grp'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add User Group</strong></button>
      </span> 
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('masters/search_users_grp'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
      	  	<input type="text" 	value="" name="search_name" class="input-large" id="search_name" placeholder="Search">
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
                <!--<th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="<?php echo site_url('masters/users_grp/');?>/group_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Group Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Group Description&nbsp;&nbsp;</a></th>
				<?php  if($user_group_id == '1') { ?>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Assign Roles&nbsp;&nbsp;</a></th>
				<?php } ?>
                <th>Actions</th>
              </tr>
              <?php
    if(!empty($users_grp)) {
      $i = 1;
     foreach($users_grp as $USERS_GRP) { ?>
              <tr>
                <!--<td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/viewusers_grp/'); ?>/<?php echo $USERS_GRP['group_id']; ?>"><?php echo $USERS_GRP['group_name'];?></a></td>
                <td ><?php echo $USERS_GRP['group_description'];?></td>
				<?php  if($user_group_id == '1') { ?>
				<td ><a href="<?php echo site_url('masters/assign_roles/'); ?>/<?php echo $USERS_GRP['group_id']; ?>">  <span class="icon-addgroup"></span></a></td>
				<?php }  ?>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/viewusers_grp/'); ?>/<?php echo $USERS_GRP['group_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/editusers_grp/'); ?>/<?php echo $USERS_GRP['group_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li><a class="javascript:void(0);" onclick="return update_usersgrp(<?php echo $USERS_GRP['group_id'] ;?>,'<?php echo $USERS_GRP['status']; ?>')"><span class="icon-trash"></span></a></li>
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