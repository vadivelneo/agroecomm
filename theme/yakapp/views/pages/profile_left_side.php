<?php
$sessionuserData = $this->session->userdata('userlogin');
if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	$prof_uri = array('edit_profile');
	$pwd_uri = array('changepassword');
	$usr_pwd_uri = array('changeuserpassword');
?>
<aside>
  <div class="leftPanel">
    <div class="row-fluid">
      <div class="quickLinksDiv">
		<p class="<?php if(in_array($uri_segment_two, $prof_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('masters/edit_profile').'/'.$sessionuserData['user_id'];  ?>" class="quickLinks"><strong>Edit Profile</strong></a></p>
		<p class="<?php if(in_array($uri_segment_two, $pwd_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('masters/changepassword').'/'.$sessionuserData['user_id'];  ?>" class="quickLinks"><strong>Change Password</strong></a></p>
		
		 <?php if($sessionuserData['user_id'] == 1)  {?>   
		<p class="<?php if(in_array($uri_segment_two, $usr_pwd_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('masters/changeuserpassword').'/'.$sessionuserData['user_id'];  ?>" class="quickLinks"><strong>Change User Password</strong></a></p>
		  <?php } ?>
      </div>
    </div>
  </div>
</aside>
<?php } ?>