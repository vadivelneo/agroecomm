<script>

$(document).ready(function () {
 	
   $("#search_ven_no").autocomplete({
    source: "<?php echo site_url('accounts_autocomplete/get_ven_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_ven_no",
  });
  
	$("#search_ven_name").autocomplete({
    source: "<?php echo site_url('accounts_autocomplete/get_ven_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_ven_name",
  });
	
	
	$("#search_cus_name").autocomplete({
    source: "<?php echo site_url('accounts_autocomplete/get_cus_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_cus_name",
  });
  
	$("#search_cus_no").autocomplete({
    source: "<?php echo site_url('accounts_autocomplete/get_cus_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_cus_no",
  });
	
 
  });


</script>


<?php echo $this->load->view('pages/accounts_left_side'); ?>
<?php $uri = $this->uri->segment('3');
$uri2 = $this->uri->segment('2');
 $page_num = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
 if($sort_by == "desc") $order = "asc"; else $order = "desc";
 
  $search_ven  = $this->session->userdata('debit_ven_search');
  $search_cus  = $this->session->userdata('debit_cus_search');
  
?>
<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">

    <?php /*?><span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('accounts/add_debit_note'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Debit</strong></button>
      </span><?php */?>

      <?php if($uri2=='search_ven_debit_node_list' || $uri == 'Vendor'  )
    	{ ?>
        <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('accounts/search_ven_debit_node_list'); ?>" enctype="multipart/form-data">
        <div tabindex="3" class="wrapper_search" id="wrapper_search">
        
          <input type="text" value="<?php if(isset($search_ven['search_ven_no'])){ echo $search_ven['search_ven_no']; }else{}?>" name="search_ven_no" class="input-large search-l" id="search_ven_no" placeholder="Vendor No">
          <span id="auto_complete_ven_no"></span>
          
          <input type="text" value="<?php if(isset($search_ven['search_ven_name'])){ echo $search_ven['search_ven_name']; }else{}?>" name="search_ven_name" class="input-large search-l" id="search_ven_name" placeholder="Vendor Name  ">
          <span id="auto_complete_ven_name"></span>
          
           <select class="chzn-select"  name="search_status" id="search_status">
          <option value="">Select Amount</option>
          <option value="10000" <?php if($search_ven['search_status'] =="10000") { ?> selected="selected" <?php } ?>>Below 10000</option>
          <option value="25000" <?php if($search_ven['search_status'] =="25000") { ?> selected="selected" <?php } ?>>10000 - 25000</option>
          <option value="50000" <?php if($search_ven['search_status'] =="50000") { ?> selected="selected" <?php } ?>>25000 - 50000</option>
          <option value="50001" <?php if($search_ven['search_status'] =="50001") { ?> selected="selected" <?php } ?>>Above 50000</option>
          </select> 
                    <!--<input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />-->
          <button id="search" name="search" type="submit" class="btn-success">Search</button>
      </form>
             
        
      <?php } else {?>
 <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('accounts/search_cus_debit_node_list'); ?>" enctype="multipart/form-data">
        <div tabindex="3" class="wrapper_search" id="wrapper_search">
        
          <input type="text" value="<?php if(isset($search_cus['search_cus_no'])){ echo $search_cus['search_cus_no']; }else{}?>" name="search_cus_no" class="input-large search-l" id="search_cus_no" placeholder="Customer No">
          <span id="auto_complete_cus_no"></span>
          
          <input type="text" value="<?php if(isset($search_cus['search_cus_name'])){ echo $search_cus['search_cus_name']; }else{}?>" name="search_cus_name" class="input-large search-l" id="search_cus_name" placeholder="Customer Name  ">
          <span id="auto_complete_cus_name"></span>
           
           <select class="chzn-select"  name="search_status" id="search_status">
          <option value="">Select Amount</option>
         <option value="10000" <?php if($search_cus['search_status'] =="10000") { ?> selected="selected" <?php } ?>>Below 10000</option>
          <option value="25000" <?php if($search_cus['search_status'] =="25000") { ?> selected="selected" <?php } ?>>10000 - 25000</option>
          <option value="50000" <?php if($search_cus['search_status'] =="50000") { ?> selected="selected" <?php } ?>>25000 - 50000</option>
          <option value="50001" <?php if($search_cus['search_status'] =="50001") { ?> selected="selected" <?php } ?>>Above 50000</option>
          </select>
<!--    	  <input type="reset" name="reset" id="rest" class="btn btn-primary" style="width:80px;" />-->
          <button id="search" name="search" type="submit" class="btn-success">Search</button>
      </form>
	  <?php } ?>
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          
            
          </div>
      </span> 
   </div>
    <form class="form-horizontal " id="stockForm" name="stockForm" method="post" action="<?php echo site_url('accounts/customer_debit_notes'); ?>" enctype="multipart/form-data">
					                    <input type="submit" id="export" name="export" class="btn-success btn_export" value="Export">
				</form>
    <div class="table_head" id="table">
      <div class="col w10 last">
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
		 <div style="float:right">
          <!-- <label class="muted">Type</label>
           <select class="chzn-select"  name="cre_type" id="cre_type" onchange="getdata()">
			<option value="Customer" <?php if($uri=='Customer'){ ?> selected="selected" <?php } ?> >Customer</option>	
			<option value="Vendor"  <?php if($uri=='Vendor'){ ?> selected="selected" <?php } ?> >Vendor</option>
            </select>-->
			 </div> 
		</div>		 
          <table>
		  <tr>
                <th><a href="<?php echo site_url('accounts/'.$uri2.'/'.$uri);?>/PARTYID/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer Code .&nbsp;&nbsp;</a></th>
                <th><a href="<?php echo site_url('accounts/'.$uri2.'/'.$uri);?>/PARTYNAME/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>
                <th class="report_right_aligned"><a href="<?php echo site_url('accounts/'.$uri2.'/'.$uri);?>/DEBIT/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Amount&nbsp;&nbsp;</a></th>
                <th> View&nbsp;&nbsp; </th>
              </tr>
            <tbody id ="items_list">
				


<?php if(!empty($credit_details)) { $itemcount = 1; foreach($credit_details as $CRE) {  ?>
<tr>
    <td>
    <?php if(isset($CRE['PARTYCODE'])) { echo $CRE['PARTYCODE']; } ?>
    </td>
	<td>
    <?php if(isset($CRE['PARTYNAME'])) { echo $CRE['PARTYNAME']; } ?>
    </td>
	<td class="report_right_aligned">
    <?php if(isset($CRE['DEBIT'])) { echo $CRE['DEBIT']; } ?>
    </td>
    <td>
    <?php if($uri=='Vendor')
    { ?>
    <a href="<?php echo site_url('accounts/viewdebit_ven/'); ?>/<?php echo $CRE['PARTYID']; ?>">  <span class="icon-edit"></span></span></a>
    <?php }
    else 
      {?>
        <a href="<?php echo site_url('accounts/viewdebit_cus/'); ?>/<?php echo $CRE['PARTYID']; ?>">  <span class="icon-edit"></span></span></a>
    <?php } ?></td>
	
    
   
	
</tr>
<?php $itemcount++; } } else{?>
              <tr>
                <td colspan="4" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>

            </tbody>
          </table>
          
        </div>
        
      </div>
      <div class="clear"></div>
      <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
    </div>
  </div>
</section>


<script>
function getdata()
{
	var cout = $('select#cre_type').val();
	var url='<?php echo site_url('accounts/debitnotes'); ?>'+'/'+cout;
 	
	window.location.href = url; //Will take you to xyz.
 	
   
}
</script>

