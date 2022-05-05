<?php
$sessionuserData = $this->session->userdata('userlogin');

if(!empty($sessionuserData))
{
	$uri_seegment_first = $this->uri->segment('1');
	$dash_uri = array('home','home_list');
	$master_uri = array('masters','vendor','customer','product');
        $emp_performance_uri = array('employee');
	$purchase_uri = array('materialrequest','vendorquote','purchaseorder','purchaseindent','purchaseinvoice','instant_purchaseinvoice','purchase_return');
	$sales_uri = array('salesquotation','salesorder','analysissales','deliverychallan','salesinvoice','instant_salesinvoice','sales_return');
	$crm_uri = array('leads','organizations','contacts','opportunities');
	$price_list = array('pricebook','instant_pricebook');
	$inventory_uri = array('inventory');
	$services_uri = array('services');
	$accounts_uri = array('accounts');
	$reports_uri = array('reports');
	$quality_uri = array('quality_checking');
	$genelogy = array('genelogy');
	$genelogy_list = array('genelogy');
	$incentive_uri = array('reports/sales_incentive_report');
?>
<header>
  <div class="header_bg">
    <nav>
      <div class="nav_inner">
        <ul class="largenav">
        
		 <?php 
		  if($sessionuserData['user_id'] == '1')
		  { ?>
          <li class="<?php if(in_array($uri_seegment_first, $dash_uri)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('home'); ?>"><img title="Home" alt="Home" src="<?php echo base_url(); ?>/resources/images/home.png">&nbsp;&nbsp;Dashboard</a>
          </li>
           <?php } ?>
		   
		    <?php 
		  if($sessionuserData['user_id'] != '1')
		  { ?>
          <li class="<?php if(in_array($uri_seegment_first, $dash_uri)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('home/user_dashboard'); ?>"><img title="Home" alt="Home" src="<?php echo base_url(); ?>/resources/images/home.png">&nbsp;&nbsp;Dashboard</a>
          </li>
           <?php } ?>
		   
        <?php if($sessionuserData['user_id'] == 1)  {?>
          <li class="<?php if(in_array($uri_seegment_first, $master_uri)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('masters'); ?>">Master</a>
          </li>
		<?php } ?>
          <li class="<?php if(in_array($uri_seegment_first, $genelogy)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('genelogy/officerform'); ?>">Enrollment</a>
          </li>
		 
		 
		  <?php if($sessionuserData['user_id'] == 1)  {?>   
		  <li class="<?php if(in_array($uri_seegment_first, $price_list)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('pricebook'); ?>">Price Book</a>
          </li>
		  
           <?php if($sessionuserData['user_id'] == 1)  {?>
		 
          <li class="<?php if(in_array($uri_seegment_first, $purchase_uri)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('purchaseorder'); ?>">Purchase</a>
          </li>
		<?php } ?>
		   <?php } ?>
		  <?php if($sessionuserData['user_id'] == 1)  {?>
		   <li class="<?php if(in_array($uri_seegment_first, $inventory_uri)) { echo 'active'; } ?>">
            <a href="<?php echo site_url('inventory'); ?>">Inventory</a>
           </li>
		   <?php } ?>
		   
		    <li class="<?php if(in_array($uri_seegment_first, $incentive_uri)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('reports/level_report_count'); ?>">Network</a>
          </li>
          
		  <li class="<?php if(in_array($uri_seegment_first, $sales_uri)) { echo 'active'; } ?>">
          <a href="<?php echo site_url('salesorder'); ?>">Self Purchase</a>
          </li>
		  
		  
		  
		   <?php if($sessionuserData['user_id'] == 1)  {?>
          <li class="<?php if(in_array($uri_seegment_first, $reports_uri)) {  } ?>">
          <a href="<?php echo site_url('reports/purchaseorder_list'); ?>">Purchase Reports</a>
          </li>
		  
          <?php } ?>
         
         <li class="<?php if(in_array($uri_seegment_first, $reports_uri)) { } ?>">
          <a href="<?php echo site_url('reports/sales_incentive_report'); ?>">Wallet</a>
          </li>
		  <?php if($sessionuserData['user_id'] == '1')
				{ 
				?>
		  <li class="<?php if(in_array($uri_seegment_first, $reports_uri)) { } ?>">
          <a href="<?php echo site_url('reports/awards_rewards_report'); ?>">Awards & Rewards</a>
          </li>
		  <?php }
				else{
				?>
				 <li class="<?php if(in_array($uri_seegment_first, $reports_uri)) { } ?>">
          <a href="<?php echo site_url('reports/awards_rewards_report_user'); ?>">Awards & Rewards</a>
          </li>
				<?php 
				}
				?>
		 
          <li class="<?php if(in_array($uri_seegment_first, $reports_uri)) { } ?>">
          <a href="#">Ecommerce</a>
          </li>
		  <li class="<?php if(in_array($uri_seegment_first, $reports_uri)) { } ?>">
          <a href="#">Plan</a>
          </li>
          
        </ul>
         <select onchange="location = this.options[this.selectedIndex].value;" ass="mobile_nav">
    		<option>Please select</option>
			 <?php if($sessionuserData['user_id'] == 1)  {?>   
			 <option value="<?php echo site_url('home'); ?>">Dashboard</option>
      		<option value="<?php echo site_url('salesorder'); ?>">Sales</option>
			<option value="<?php echo site_url('pricebook'); ?>">Price Book</option>
			 <option value="<?php echo site_url('reports/awards_rewards_report'); ?>">Awards & Rewards</option>
			<?php } else { ?>
			<option value="<?php echo site_url('home/user_dashboard'); ?>">Dashboard</option>
            <option value="<?php echo site_url('salesorder'); ?>">Sales</option>
            <option value="<?php echo site_url('reports/awards_rewards_report'); ?>">Awards & Rewards</option>
                <?php }  ?>
			</select>​
        
      </div>
	  <?php
	  
				$conn = new mysqli('localhost', 'root', '');  
				mysqli_select_db($conn, 'agro_test1');
				//$conn = new mysqli('localhost', 'neoindzg_agro', 'agro*123$'); 
				//mysqli_select_db($conn, 'neoindzg_agro_ecomm');  
				$sql = "SELECT OFCR.OFCR_ID,OFCR_DOC.user_photo FROM `vsoft_officer` as OFCR left join vsoft_officer_docu as OFCR_DOC on(OFCR.OFCR_ID = OFCR_DOC.officer_id) where OFCR.OFCR_ADD_USR_ID =".$sessionuserData['user_id']; 
				//echo $sql; exit;				
				$setRec = mysqli_query($conn, $sql);  
				
				$row = mysqli_fetch_array($setRec);
				//echo $row['user_photo'];
	  ?>
      <div class="header_links"> <img style="width:50px;height:50px;margin-right:15px;" src="<?php echo base_url(); ?>/resources/uploads/<?php if($row['user_photo'] != '') { echo $row['OFCR_ID'].'/'.$row['user_photo']; } else { echo "profile-pic.jpg"; } ?>" id="profilepic"><span class="dropdown dropdown1"><span data-toggle="dropdown" class="dropdown-toggle"><a title="admin" class="username"><?php echo $sessionuserData['user_first_name']; ?><i class="caret"></i></a></span>
        <ul class="dropdown-menu pull-right signout">
		
          <li><a href="<?php echo site_url('genelogy/enrollment');  ?>" target="">My Profile</a></li>
		  <li><a href="<?php echo site_url('masters/changepassword').'/'.$sessionuserData['user_id'];  ?>" target="">Change Password</a></li>
          <li class="divider">&nbsp;</li>
          <li><a href="<?php echo site_url('leads/logout'); ?>" target="">Sign Out</a></li>
        </ul>
        </span></div>
    </nav>
    <div class="navbar">
      <div class="actionsContainer">
        <div class="span2"><span class="companyLogo">
		
		<?php 
		$image='resources/images/'.$sessionuserData["logo"];
		if(file_exists($image) && $sessionuserData["logo"] !='') { ?>
		<img src="<?php echo base_url();?>resources/images/<?php echo $sessionuserData["logo"]; ?>" >
		<?php } else { ?>
		<img src="<?php echo base_url();?>resources/images/erp_logo.png">
		<?php }  ?>&nbsp;</span></div>
        <div class="span10">
          <div class="row-fluid">
            <div class="wrapper-demo">
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php } else { ?>

<header>
  <div class="row-fluid">
    <div class="span3">
      <div class="logo"><img src="<?php echo base_url(); ?>/resources/images/erp_logo.png"><br>
        <a href="#" target="_blank"></a> </div>
    </div>
  </div>
</header>




<?php } ?>