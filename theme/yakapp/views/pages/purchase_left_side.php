<?php
$sessionuserData = $this->session->userdata('userlogin');


if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
?>
<aside>
  <div class="leftPanel">
    <div class="row-fluid">
      <div class="quickLinksDiv">
	
		
		<?php if(isset($purchaseorder->view_option)) { if($purchaseorder->view_option != '0') { ?>
		<p class="<?php if($uri_segment_first == 'purchaseorder') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('purchaseorder'); ?>" class="quickLinks"><strong>Purchaseorder</strong></a></p><?php } } ?>
		<?php if(isset($purchaseindent->view_option)) { if($purchaseindent->view_option != '0') { ?>
		<p class="<?php if($uri_segment_first == 'purchaseindent') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('purchaseindent'); ?>" class="quickLinks"><strong>Goods Received Note </strong></a></p><?php  } } ?>
		
		
      </div>
    </div>
  </div>
</aside>
<?php } ?>