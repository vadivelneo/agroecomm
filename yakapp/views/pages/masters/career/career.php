<script>

function update_carrier(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/update_carrier/'); ?>/'+id+'/'+status;
    window.location.href = url;
    }
  else 
  {
      return false;
    }
}

 $(document).ready(function () {

$('#multipleItemselecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });

  });


</script>

<?php echo $this->load->view('pages/master_left_side'); ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
      <!--<div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
        <ul class="dropdown dropdown-search">
          <li><a href="#"><i class=""></i>Edit</a></li>
          <li><a href="#"><i class=""></i>Delete</a></li>
          <li class="divider"> </li>
          <li><a href="#"><i class=""></i>Import</a></li>
          <li><a href="#"><i class=""></i>Export</a></li>
          <li><a href="#"><i class=""></i>Find Duplicates</a></li>
        </ul>
      </div>-->
      <span class="btn-group">
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/add_career'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Shipping Carrier</strong></button>
      </span>
      <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('masters/search_career'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
      	  	<input type="text" 	value="" name="search_name" class="input-large" id="search_name" placeholder="Search">
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
                <!--<th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Carrier Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Address&nbsp;&nbsp;</a></th>
                <th nowrap><a href="javascript:void(0);" class="listViewHeaderValues">Description&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
    if(!empty($career_val)) {
      $i = 1;
     foreach($career_val as $CAREER) { ?>
              <tr>
                <!--<td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/view_career/'); ?>/<?php echo $CAREER['shipping_carrier_id']; ?>"><?php echo $CAREER['shipping_carrier_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/view_career/'); ?>/<?php echo $CAREER['shipping_carrier_id']; ?>"><?php echo $CAREER['shipping_carrier_address'];?></a></td>
                <td ><?php echo $CAREER['shipping_carrier_descrption'];?></td>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/view_career/'); ?>/<?php echo $CAREER['shipping_carrier_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/edit_career/'); ?>/<?php echo $CAREER['shipping_carrier_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li> <a class="javascript:void(0);" onclick="return update_carrier(<?php echo $CAREER['shipping_carrier_id'] ;?>,'<?php echo $CAREER['shipping_status']; ?>')"> 
                <span class="icon-trash"></span></a></li>
                  </td>
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
