<?php

function OfficerRanking($rank) 
{
	
	switch ($rank) {
		case "1":
			return "1.png";
			break;
		case "2":
			return "4.png";
			break;
		case "3":
			return "3.png";
		case "4":
			return "2.png";
		case "5":
			return "5.png";
			break;
		default:
			return "1.png";
	}

    
}
?>


<div class="right_container_col1">
      
	    <div class="form_bg1" style="width: 800px;">
        
	   
          
	      <div class="genelogy_content_top">
          
	        <div class="genelogy_content_top_header">
            <?php if(isset($genealogy_user_data['user']->OFCR_FST_NME)) { echo $genealogy_user_data['user']->OFCR_FST_NME.' '.$genealogy_user_data['user']->OFCR_LST_NME; } ?>
            (<?php if(isset($genealogy_user_data['user']->OFCR_USR_ID)) { echo $genealogy_user_data['user']->OFCR_USR_ID; } ?>)
            </div>
            
	        <div class="genealogy_inner">
            
	          <div class="genealogy_content_left">
              
	            <div class="genealogy_content_left_col col1">
                	<span class="list">Name:</span>
                	<span class="list_val">
	              		<?php if(isset($genealogy_user_data['user']->OFCR_FST_NME)) { echo $genealogy_user_data['user']->OFCR_FST_NME.' '.$genealogy_user_data['user']->OFCR_LST_NME; } ?>
	                </span>
              	</div>
                
	            <div class="genealogy_content_left_col col1">
                    <span class="list">User Id:</span>
                    <span class="list_val">
                    <?php if(isset($genealogy_user_data['user']->OFCR_USR_ID)) { echo $genealogy_user_data['user']->OFCR_USR_ID; } ?>
                    </span>
                </div>
                                
            	<div class="genealogy_content_left_col col1">
                    <span class="list">Achieved Rank:</span>
                    <span class="list_val">
                        <?php if(isset($genealogy_user_data['user']->rank)) { echo $genealogy_user_data['user']->rank; } ?>
                    </span>
                </div>
                
             <!--   <div class="genealogy_content_left_col col1">
                <span class="list">Total Count:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['user']->COUNT_SPNCR)) { echo $genealogy_user_data['user']->COUNT_SPNCR; } ?>
                </span>
            </div>
            
            <div class="genealogy_content_left_col col1">
                <span class="list">Left Count:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['user']->LFT_COUNT)) { echo $genealogy_user_data['user']->LFT_COUNT; } ?>
                </span>
            </div>
            
            <div class="genealogy_content_left_col col1">
                <span class="list">Right Count:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['user']->RIGHT_COUNT)) { echo $genealogy_user_data['user']->RIGHT_COUNT; } ?>
                </span>
            </div>-->
            
          </div>
          
          <div class="genealogy_content_right">
          	
            <!-- <div class="genealogy_content_left_col col1">
                <span class="list"> Total Count:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['user']->PERSONALY_COUNT_SPNCR)) { echo $genealogy_user_data['user']->PERSONALY_COUNT_SPNCR; } ?>
                </span>
            </div>
            
            <div class="genealogy_content_left_col col1">
                <span class="list">Personally Left Count:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['user']->PERSONALY_LFT_COUNT)) { echo $genealogy_user_data['user']->PERSONALY_LFT_COUNT; } ?>
                </span>
            </div>
            
            <div class="genealogy_content_left_col col1">
                <span class="list">Personally Right Count:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['user']->PERSONALY_RIGHT_COUNT)) { echo $genealogy_user_data['user']->PERSONALY_RIGHT_COUNT; } ?>
                </span>
            </div>-->
            <div class="genealogy_content_left_col col1">
                <span class="list">Sponsor Name:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['sponser']->OFCR_FST_NME)) { echo $genealogy_user_data['sponser']->OFCR_FST_NME.' '.$genealogy_user_data['sponser']->OFCR_LST_NME; } ?>
                </span>
            </div>
            
            <div class="genealogy_content_left_col col1">
                <span class="list">Sponsor Id:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['sponser']->OFCR_USR_ID)) { echo $genealogy_user_data['sponser']->OFCR_USR_ID; } ?>
                </span>
            </div>
            
            <div class="genealogy_content_left_col col1">
                <span class="list">Sponsor Achieved Rank:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['sponser']->rank)) { echo $genealogy_user_data['sponser']->rank; } ?>
                </span>
                <span class="list">Sponsor Achieved Rank:</span>
                <span class="list_val">
                  <?php if(isset($genealogy_user_data['sponser']->rank)) { echo $genealogy_user_data['sponser']->rank; } ?>
                </span>
            </div>
            
            
            
          </div>
              
        </div>
        
      </div>
      
      <div style="float: left; text-align: center; width: 100%;" id="searchposition">
      
        <table>
        
          <tr>
          
            <td style="float: left;
    margin-left: 13px;"><img src="<?php echo base_url(); ?>resources/images/icon-up.png" onclick="getOfficerTree('<?php echo $genealogy_user_data['user']->OFCR_TRE_UNDR_ID; ?>')" /> <img src="<?php echo base_url(); ?>resources/images/icon-left-bottom.png" onclick="getExtremeLegOfficer('<?php echo $officerUserId; ?>','left')" /></td>
    
            <td></td>
            
            <td colspan="18" width="100%"></td>
            
            <td style="float: right;
    margin-right: 13px;"><img src="<?php echo base_url(); ?>resources/images/icon-top.png"  onclick="getOfficerTree('<?php echo $officerUserId; ?>')" /> <img src="<?php echo base_url(); ?>resources/images/icon-right-bottom.png" onclick="getExtremeLegOfficer('<?php echo $officerUserId; ?>','right')" /></td>
    
          </tr>
          
        </table>
        
      </div>
      
      <div id="genelogy">
        <?php 
			foreach($genelogy_data as $key=>$data) 
			{
			  	if($key == 0)
				{ 
					$Rankimage = OfficerRanking($data->OFCR_RNK);
				?>
        			<div class="genelogy_first_row">
                    	<img src="<?php echo base_url(); ?>resources/images/<?php echo $Rankimage; ?>" onclick="getOfficerTreePostions('<?php echo $data->OFCR_TRE_USR_ID; ?>')" /><br />
          				<input type="hidden" id="genelogyTopUser" value="<?php echo $data->OFCR_TRE_USR_ID; ?>" />
          				<input type="hidden" id="genelogyLoginUser" value="<?php echo $officerUserId; ?>" />
          				<span> 
							<?php echo $data->OFCR_FST_NME;?><br />(<?php echo $data->OFCR_TRE_USR_ID; ?>)
                            <br/>
          				</span>
                   </div>
        	<?php 
				} 
				else if($key == 1)
				{
					?>
        			<div style="" class="genelogy_second_row">
			          <?php 
					  foreach($data as $level2)
					  { 
					  ?>
          				<div class="genelogy_second_row_inner">
							<?php 
                            if($level2->STATUS)
                            {
								$Rankimage = OfficerRanking($level2->OFCR_RNK);
                                ?>
                                <div class="genelogy_details details">
                                    <img src="<?php echo base_url(); ?>resources/images/<?php echo $Rankimage; ?>" onclick="getOfficerTreePostions('<?php echo $level2->OFCR_TRE_USR_ID; ?>')" />
                                    <br />
                                    <span>
                                       <?php echo $level2->OFCR_FST_NME;?><br />(<?php echo $level2->OFCR_TRE_USR_ID;?>)
                                        <br/>
                                    </span>
                                </div>
                            <?php 
                            } 
                            else 
                            {
                                ?>
                                <div class="genelogy_details" <?php if(isset($level2->OFCR_TRE_UNDR_ID) && ($level2->OFCR_TRE_UNDR_ID != 'add')) { ?> onclick="addOfficerLeg('<?php echo $level2->OFCR_TRE_UNDR_ID; ?>','<?php echo $level2->OFCR_TRE_LEG; ?>');" <?php } ?> >
                                      <img src="<?php echo base_url(); ?>resources/images/blockAdd.png" /><br />
                                      <span><?php echo $level2->MESSAGE;?></span>
                                  </div>
                            <?php 
                            } 
                            ?>
          				</div>
          			<?php 
					} 
					?>
        		</div>
        		<?php 
				} 
				else if($key == 2) 
				{
					?>
        			<div class="genelogy_third_row">
			          <div class="genelogy_third_row_details">
			            <?php 
						foreach($data as $level2)
						{ 
						?>
            				<div class="genelogy_third_row_inner_details">
              					<?php 
								if($level2->STATUS)
								{
									$Rankimage = OfficerRanking($level2->OFCR_RNK);
									?>
              						<div class="genelogy_details">
                                    	<img src="<?php echo base_url(); ?>resources/images/<?php echo $Rankimage; ?>" onclick="getOfficerTreePostions('<?php echo $level2->OFCR_TRE_USR_ID; ?>')" /><br />
                						<span>
											<?php echo $level2->OFCR_FST_NME;?><br />(<?php echo $level2->OFCR_TRE_USR_ID;?>)
                						</span>
                                    </div>
              					<?php 
								} 
								else 
								{
									?>
              						<div class="genelogy_details" <?php if(isset($level2->OFCR_TRE_UNDR_ID) && ($level2->OFCR_TRE_UNDR_ID != 'add')) { ?> onclick="addOfficerLeg('<?php echo $level2->OFCR_TRE_UNDR_ID; ?>','<?php echo $level2->OFCR_TRE_LEG; ?>');" <?php } ?> >
                                      <img src="<?php echo base_url(); ?>resources/images/blockAdd.png" /><br />
                                      <span><?php echo $level2->MESSAGE;?></span>
                                  </div>
              					<?php 
								} 
								?>
				            </div>
            			<?php 
						} 
						?>
         			 </div>
          			<?php 
					} 
					else if($key == 3) 
					{
						?>
			          <div class="genelogy_third_row_details">
			            <?php 
						foreach($data as $level2)
						{ 
						?>
				            <div class="genelogy_third_row_inner_details">
				              <?php 
							  if($level2->STATUS)
							  {
								  $Rankimage = OfficerRanking($level2->OFCR_RNK);
								  ?>
              					<div class="genelogy_details"> 
                                	<img src="<?php echo base_url(); ?>resources/images/<?php echo $Rankimage; ?>" onclick="getOfficerTreePostions('<?php echo $level2->OFCR_TRE_USR_ID; ?>')" /><br />
                					<?php echo $level2->OFCR_FST_NME;?><br />(<?php echo $level2->OFCR_TRE_USR_ID;?>)</span>
                                </div>
							  <?php 
                              } 
                              else 
                              {
                                  ?>
                                  <div class="genelogy_details" <?php if(isset($level2->OFCR_TRE_UNDR_ID) && ($level2->OFCR_TRE_UNDR_ID != 'add')) { ?> onclick="addOfficerLeg('<?php echo $level2->OFCR_TRE_UNDR_ID; ?>','<?php echo $level2->OFCR_TRE_LEG; ?>');" <?php } ?> >
                                      <img src="<?php echo base_url(); ?>resources/images/blockAdd.png" /><br />
                                      <span><?php echo $level2->MESSAGE;?></span>
                                  </div>
                              <?php 
                              } 
                              ?>
            				</div>
            			<?php 
						} 
						?>
          			</div>
        		</div>
        		<?php 
				} 
			} 
		?>
        
      </div>
      
      
      <div class="geneology_hints">
      
        <div class="geneology_cols">
          <div class="geneology_cols_left"> <img src="<?php echo base_url(); ?>resources/images/1.png" /> </div>
          <div class="geneology_cols_right"> Officer </div>
        </div>
        
        <div class="geneology_cols">
          <div class="geneology_cols_left"> <img src="<?php echo base_url(); ?>resources/images/4.png" /> </div>
          <div class="geneology_cols_right"> Senior Officer </div>
        </div>
        
        <div class="geneology_cols">
          <div class="geneology_cols_left"> <img src="<?php echo base_url(); ?>resources/images/3.png" /> </div>
          <div class="geneology_cols_right"> Excecutive Officer </div>
        </div>
        
        <div class="geneology_cols">
          <div class="geneology_cols_left"> <img src="<?php echo base_url(); ?>resources/images/2.png" /> </div>
          <div class="geneology_cols_right"> Team Leader </div>
        </div>
        
        <div class="geneology_cols">
          <div class="geneology_cols_left"> <img src="<?php echo base_url(); ?>resources/images/5.png" /> </div>
          <div class="geneology_cols_right"> Platoon Leader </div>
        </div>
        
      </div>
      
      

    </div>
    
    <div class="right_container_col2">
  
    <div class="bonus_bg">
        <div class="bonus_bg_header">
            <h2>Distributor Search</h2>
        </div>
       
            <div class="bonus_time_bg progressContainer">
                <div class="search-bar-content">
                  <div class="search_left">
                    <input type="text" class="searchbox" placeholder="Type Officer ID/NAME" id="searchId" name="searchId">
                  </div>
                  <div class="search_right right_srch">
                    <input type="submit" class="submitButton search_btn" id="" value="Search" name="Search" onclick="getSearch()">
                  </div>
                </div>            
            </div>
       
    </div>
    
    <div class="activate_bg">
        <div class="activate_bg_header">
            <h2>Search Details</h2>
        </div>
        <div id="genealogy_search">
        	
        </div>
    </div>
    
</div>