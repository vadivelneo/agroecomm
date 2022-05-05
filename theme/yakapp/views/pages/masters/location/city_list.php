<script>

function city_status(id,status)
{
  sure = confirm('Are you sure to Delete?');
  if (sure==true) 
  {
      var url = '<?php echo site_url('masters/city_status/'); ?>/'+id+'/'+status;
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
$("#search_country_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_country_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_cont_name",
  });
  
$("#search_state_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_state_name'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_state_name",
  });

$("#search_city_name").autocomplete({
      source: "<?php echo site_url('autocomplete/get_city_name'); ?>", // name of controller followed by functio
	autoFocus:true,
	appendTo: "#auto_complete_city_name",
  });
$("#search_city_code").autocomplete({
      source: "<?php echo site_url('autocomplete/get_city_code'); ?>", // name of controller followed by function
	autoFocus:true,
	appendTo: "#auto_complete_city_code",
  });



  });


</script>
<?php echo $this->load->view('pages/master_left_side');

	$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;

	$deliveryStatus = $this->uri->segment(3,"pending");

	if($sort_by == "asc") $order = "desc"; else $order = "asc";
	?>

<section>
  <div class="rightPanel">
    
    <div class="row-fluid">
     <!-- <div tabindex="2" class="wrapper-dropdown-5" id="actions">Actions
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
      <button class="addButton" onclick='window.location.href="<?php echo site_url('masters/addcity'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add City</strong></button>
      </span>
       <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('masters/search_city'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
      	  	<input type="text" 	value="" name="search_country_name" class="input-large" id="search_country_name" placeholder="Country Name">
			<span id="auto_complete_cont_name"></span>
			<input type="text" 	value="" name="search_state_name" class="input-large" id="search_state_name" placeholder="State Name">
			<span id="auto_complete_state_name"></span>
			<input type="text" 	value="" name="search_city_name" class="input-large" id="search_city_name" placeholder="City Name">
			<span id="auto_complete_city_name"></span>
			<input type="text" 	value="" name="search_city_code" class="input-large" id="search_city_code" placeholder="City Code">
			<span id="auto_complete_city_code"></span>
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
                <th nowrap><a href="<?php echo site_url('masters/city/');?>/country_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Country Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/city/');?>/state_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">State Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/city/');?>/city_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">City Name&nbsp;&nbsp;</a></th>
                <th nowrap><a href="<?php echo site_url('masters/city/');?>/city_code/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">City Code&nbsp;&nbsp;</a></th>
                <th>Actions</th>
              </tr>
              <?php
    if(!empty($City)) {
      $i = 1;
     foreach($City as $CTY) { ?>
              <tr>
               <!-- <td class="checkbox"><input type="checkbox" name="checkbox" class="itemcheckbox"></td>-->
                <td ><a href="<?php echo site_url('masters/viewcity/'); ?>/<?php echo $CTY['city_id']; ?>"><?php echo $CTY['country_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewcity/'); ?>/<?php echo $CTY['city_id']; ?>"><?php echo $CTY['state_name'];?></a></td>
                <td ><a href="<?php echo site_url('masters/viewcity/'); ?>/<?php echo $CTY['city_id']; ?>"><?php echo $CTY['city_name'];?></a></td>
                <td ><?php echo $CTY['city_code'];?></td>
                <td colspan="3"> 
                <li><a href="<?php echo site_url('masters/viewcity/'); ?>/<?php echo $CTY['city_id']; ?>"><span class="icon-edit"></span></a></li>
                <li> <a href="<?php echo site_url('masters/editcity/'); ?>/<?php echo $CTY['city_id']; ?>">  <span class="icon-pencil"></span></a></li>
                <li> <a class="javascript:void(0);" onclick="return city_status(<?php echo $CTY['city_id'] ;?>,'<?php echo $CTY['city_status']; ?>')"> <span class="icon-trash"></span></a></li>
                  </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>
                 
                 </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
