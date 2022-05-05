<?php echo $this->load->view('pages/enrollement_left_side'); ?>
<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
      <div class="form_bg">
                   
      <div style="margin-left:450px;margin-top:25px;">
          	
            	<h2 style="font-size:24px;margin-bottom: 25px;">Direct Downline Report</h2>
           
           
           
		  </div>
		  <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/search_direct_downline'); ?>" enctype="multipart/form-data"> 
		  
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
        <div class="current_main_inner1">
            	<ul style="font-size:14px;margin-bottom: 25px;align:centre;">
                	<li>Total Direct Count: <?php echo count($level_count); ?></li>
                </ul>
			</div>
            <input type="text" 	value="" name="search_cus_id" class="input-large search-l" id="search_cus_id" placeholder="Customer ID">
            <span id="auto_complete_sale_ord_no"></span>
                       
            <input type="text"  name="search_cus_name" class="input-large search-l" id="search_cus_name" placeholder="Customer Name">
            <span id="auto_complete_cus_name"></span>
            
           <input type="text" value="" name="search_cus_phone" class="input-large search-l" id="search_cus_phone" placeholder="Customer Phone">
            <span id="auto_complete_cus_code"></span>
       
			
			<button id="search" name="search" type="submit" class="btn-success">Search</button>
 		 </div> 
      </form>
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          
          </div>
          <div class="clearfix">
		  
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span>
      
                 
      
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
			<th>Customer Mobile</th>
			<th>Customer Rank</th>
		
		</tr>
              <?php
			  //echo "<pre>";
			  //print_r($subuser_data);
		if(!empty($subuser_data)) {
			$i = $this->uri->segment(5) ? $this->uri->segment(5)+1 : 1;
		 foreach($subuser_data as $pro) { ?>
              <tr>
		
			<td  class="show_table"><?php echo $i; ?></td>
			<td  class="show_table"><?php echo $pro['OFCR_USR_VALUE']; ?></td>
			<td><?php echo ucfirst($pro['OFCR_FST_NME']).' '.ucfirst($pro['OFCR_LST_NME']); ?></td>
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
