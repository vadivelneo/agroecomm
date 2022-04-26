<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     

      
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          
          </div>
          <div class="clearfix">
		  
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span>
      
            <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('salesorder/search_salesorder'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
       
            <input type="text" 	value="<?php if(isset($search_so['search_so_order'])){ echo $search_so['search_so_order']; }else{}?>" name="search_sale_ord_no" class="input-large search-l" id="search_sale_ord_no" placeholder="Sales Order No">
            <span id="auto_complete_sale_ord_no"></span>
          
              <?php 
					$sessionData = $this->session->userdata('userlogin');
					if($sessionData['user_id'] == 1)  {
					?>
            <input type="text" 	value="<?php //if(isset($search_so['search_cus_name'])){ echo $search_so['search_cus_name']; }else{}?>" name="search_cus_name" class="input-large search-l" id="search_cus_name" placeholder="Customer Name">
            <span id="auto_complete_cus_name"></span>
            
           <input type="text" 	value="" name="search_cus_code" class="input-large search-l" id="search_cus_code" placeholder="Customer Code">
            <span id="auto_complete_cus_code"></span>
            <?php }  ?>
          <input type="text" 	value="<?php if($f_date != "1970-01-01"){ echo $search_so['from_date']; }else{}?>" name="from_date" class="input-large search-l" id="from_date" placeholder="From Date">
             
            <input type="text" 	value="<?php if($t_date != "1970-01-01"){ echo $search_so['to_date']; }else{}?>" name="to_date" class="input-large search-l" id="to_date" placeholder="To Date">
             
          
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
			<th>S.No</th>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Customer Email</th>
			<th>Customer Mobile</th>
			<th>Customer Rank</th>
		
		</tr>
              <?php
			 // echo "<pre>";
			 // print_r($so_list);
		if(!empty($subuser_data)) {
			$i = 1;
		 foreach($subuser_data as $SO) { ?>
              <tr>
		
			<td  class="show_table"><?php echo $count; ?></td>
			<td  class="show_table"><?php echo $pro['OFCR_USR_ID']; ?></td>
			<td><?php echo ucfirst($pro['OFCR_FST_NME']).' '.ucfirst($pro['OFCR_LST_NME']); ?></td>
			<td><?php echo $pro['OFCR_USR_EMAIL']; ?></td>
			<td><?php echo $pro['OFCR_MOB']; ?></td>
			<td><?php echo ''; ?></td>
			
			
		  
		</tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
