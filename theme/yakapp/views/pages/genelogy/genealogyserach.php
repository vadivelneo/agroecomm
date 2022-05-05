<div class="activate_time_bg progressContainer">
	<?php if(!empty($genealogy_search_data)) { ?>
        <div class="search_id">
            <h2>ID</h2>
        </div>
        <div class="search_name">
            <h2>Officer Name </h2>
        </div>
        <?php foreach($genealogy_search_data as $Officers) { ?>
         <div class="id_detail">
            <ul>
                <li><a href="javascript:void(0);" onclick="getOfficerTreePostions('<?php echo $Officers['OFCR_USR_ID']; ?>')"><?php if($Officers['OFCR_USR_ID'] != "") { echo $Officers['OFCR_USR_ID']; } else { echo "&nbsp"; } ?></a></li>
            </ul>
        </div>
        <div class="search_detail">
            <ul>
            	<li><?php if($Officers['OFCR_FST_NME'] != "") { echo $Officers['OFCR_FST_NME']; } else { echo "&nbsp"; } ?></li>
            </ul>
        </div>
    <?php } } else { ?>
    	<div>
        	No Results Found
        </div>
    <?php } ?>
</div>