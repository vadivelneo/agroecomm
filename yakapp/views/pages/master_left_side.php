<?php
$sessionuserData = $this->session->userdata('userlogin');

$user_group_id=$sessionuserData['group_id'];
 
if(!empty($sessionuserData))
{	
	$uri_segment_first = $this->uri->segment('1');
	$uri_segment_two = $this->uri->segment('2');
	

	
?>
<aside>
	<div class="leftPanel">
		<div class="row-fluid">
			<div class="quickLinksDiv">
				<?php if(isset($vendor->view_option)) { if($vendor->view_option != 0) { ?>
				 <p class="<?php if($uri_segment_first == 'vendor') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('vendor'); ?>" class="quickLinks"><strong>Suppliers</strong></a></p><?php } } ?>
				 
				   
                 
				<?php if(isset($products->view_option)) { if($products->view_option != 0) { ?>
				<p class="<?php if($uri_segment_first == 'product') { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="<?php echo site_url('product'); ?>" class="quickLinks"><strong>Item</strong></a></p><?php } } ?>
				
				<!-- <p class="<?php if(in_array($uri_segment_two, $product_type_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="#" class="quickLinks"><strong>Item Type</strong></a></p>
        		<p class="<?php if(in_array($uri_segment_two, $product_group_uri)) { echo 'selectedQuickLink'; } else { echo "unSelectedQuickLink"; } ?>"><a href="#" class="quickLinks"><strong>Item Group</strong></a></p> -->
               
				
				
               
                
			</div>
            
		</div>
	</div>
</aside>
<?php } ?>