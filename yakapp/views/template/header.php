<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<?php
$sessionuserData = $this->session->userdata('userlogin');

?>
<section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="index.html">
                            <span><strong>AGRO</strong></span>
                        </a>
                      
                    </div>
                    <!-- Branding end -->



                    <!-- Left-side navigation -->
                    
                    


                    <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">
                       
                        <li class="dropdown nav-profile">
<div class="dropdown">
  <button class="dropbtn"><?php 
								$sessionuserData = $this->session->userdata('userlogin');
								echo $sessionuserData['user_first_name']; ?></button>
  <div class="dropdown-content">
			<a href="<?php echo base_url(); ?>/index.php/genelogy/editOfficerProfile/295">
			<i class="fa fa-user"></i>Profile
			</a>                               
			<a href="<?php echo base_url(); ?>index.php/leads/logout">
			<i class="fa fa-sign-out"></i>Logout
			</a>
                          
  </div>
</div>
                           


                        </li>
						

                  

                </header>

            </section>

