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

                            <a href class="dropdown-toggle" data-toggle="dropdown">
                               
                               <a href="<?php echo base_url(); ?>index.php/leads/logout">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                               
                                
                                <li class="divider"></li>
                               
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/leads/logout">
                                        <i class="fa fa-sign-out"></i>Logout
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="toggle-right-sidebar">
                            <a href="#">
                              <!--  <i class="fa fa-comments"></i> -->
                            </a>
                        </li>
                    </ul>
                    <!-- Right-side navigation end -->



                </header>

            </section>

