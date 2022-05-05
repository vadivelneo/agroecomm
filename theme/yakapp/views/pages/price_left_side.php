<?php
$sessionuserData = $this->session->userdata('userlogin');
if(!empty($sessionuserData))
{
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
?>
<aside>
  <div class="leftPanel">
    <div class="row-fluid">
      <div class="quickLinksDiv">
		<?php if(isset($pricebook->view_option)) { if($pricebook->view_option != '0') { ?>
		<p class="<?php if(($uri_segment_first == 'pricebook') && ($uri_segment_two == 'list_pricebook' || $uri_segment_two == 'addpricebook' || $uri_segment_two == 'viewpricebook' || $uri_segment_two == 'updatepricebook')) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('pricebook'); ?>" class="quickLinks"><strong>Price Book</strong></a></p><?php } } ?>
        <?php if(isset($pricebook->view_option)) { if($pricebook->view_option != '0') { ?>
		<?php } } ?>
      </div>
    </div>
  </div>
</aside>
<?php } ?>