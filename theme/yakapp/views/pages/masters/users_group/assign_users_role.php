<script type="text/javascript"> 
$(document).ready(function () {

$('.roles_class').click(function(event) {  //on click
        if(this.checked) {
	
		// check select status
			$(this).prop('checked', true);
			$(this).attr('checked', 'checked');
			$(this).val('1');				
           
        }else{
            $(this).prop('checked', false);
			$(this).removeAttr('checked');              
			$(this).val('0');	        
        }
    });
});
</script> 
<?php echo $this->load->view('pages/master_left_side'); ?>
<section>
  
    <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
               Assign Role
              </h3>
            
            </div> 
            <!-- /.portlet-header -->

            <div class="portlet-content">
               
               <form name="role" id="role" action="<?php echo site_url('masters/assign_roles');?>/<?php echo $user_id; ?>" method="post">
               <input type="hidden" name="user_group_id" value="<?php echo $user_id; ?>" id="user_group_id">
               <div class="role role_assign" >
               	<div>
                   <div class="head">
                   <span> Modules</span>
                   </div>
                   <div class="head1">
                   <span> Add</span>
                   </div>
                   <div class="head1">
                   <span> Edit</span>
                   </div>
                   <div class="head1">
                   <span> Delete</span>
                   </div>
                   <div class="head1">
                   <span> View</span>
                   </div>
                   <div class="head1">
                   <span> Import</span>
                   </div>
                   <div class="head1">
                   <span> Export</span>
                   </div>
                   <div class="head1">
                   <span> Status change</span>
                   </div>
               </div>
             <?php
			if(!empty($module_roles)) {
				  $i = 1;
			
				foreach($module_roles as $ROLES) { ?>
                <div>
                   <div class="head">
                        <span><?php echo $ROLES['module_name'];?></span>
						<input type="hidden" name="module_id[<?php echo $i; ?>]" value="<?php echo $ROLES['module_id']; ?>">
                   </div>
                   <div class="head1">
                        <span>
                            <input type="checkbox" name="add[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['add_option'])){ if($ROLES['add_option'] == '1'){ ?> checked="checked" <?php } } ?>>		
                        </span>
                   </div>
                   <div class="head1">
                        <span>
                            <input type="checkbox" name="edit[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['edit_option'])){ if($ROLES['edit_option'] == '1'){ ?> checked="checked" <?php } } ?> >
                        </span>
                   </div>
                   <div class="head1">
                        <span>
                            <input type="checkbox" name="delete[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['delete_option'])){ if($ROLES['delete_option'] == '1'){ ?> checked="checked" <?php } } ?>>
                        </span>
                   </div>
                   <div class="head1">
                        <span>
                            <input type="checkbox" name="view[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['view_option'])){ if($ROLES['view_option'] == '1'){ ?> checked="checked" <?php } } ?>>
                        </span>
                   </div>
                   <div class="head1">
                        <span>
                            <input type="checkbox" name="import[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['import_option'])){ if($ROLES['import_option'] == '1'){ ?> checked="checked" <?php } } ?>>
                        </span>
                   </div>
                   <div class="head1">
                        <span>
                            <input type="checkbox" name="export[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['export_option'])){ if($ROLES['export_option'] == '1'){ ?> checked="checked" <?php } } ?>>
                        </span>
                   </div>
                   <div class="head1">
                    <span>
                        <input type="checkbox" name="status[<?php echo $i; ?>]" class="roles_class" value="1" <?php if(isset($ROLES['status_change'])){ if($ROLES['status_change'] == '1'){ ?> checked="checked" <?php } } ?>>
                    </span>
                   </div>
                </div>
                <?php $i++; } } ?>
               
             
               <div class="submit">
               <input type="submit" value="Update" name="update_roles" class="btn btn-primary" id="update_roles" style="float: left; margin-left: 450px; margin-top: 30px;">
               </div>
               
               
               </div>
               
               </form>
          
            </div> 
            <!-- /.portlet-content -->

          </div>

        
</section>

