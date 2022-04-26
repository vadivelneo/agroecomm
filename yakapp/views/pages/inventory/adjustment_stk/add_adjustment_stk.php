<script language="javascript" type="text/javascript">
         
$(document).ready(function () {
	
	$("#last_table_id").val('0');
	
	$(".itemcheckbox").prop("checked", false);
	
	//document.getElementById("stockadjustmentform").reset();
	
 	 $('.adj_stk_add').click(function()
     {
        
        var adj_stk_code = $("#adj_stk_code").val();
        var adj_stk_loc = $("#adj_stk_loc").val();
		 var last_table_id = $("#last_table_id").val();
       
     
	 if(adj_stk_code == "")
    {
      $('#adj_stk_code').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('adj_stk_codeError').style.display = 'block';
      $('#adj_stk_code').value="";
      $('#adj_stk_code').focus();
      return false;
    }
      else
    {
      document.getElementById('adj_stk_codeError').style.display = 'none';
      $('#adj_stk_code').css("border","1px solid #82B04F");
      document.getElementById("adj_stk_codeError").innerHTML="";
    }
	
	
	if(adj_stk_loc == "")
    {
      $('#adj_stk_loc').css("border","1px solid #FF0000");
      $('.error').html("");
      document.getElementById('adj_stk_locError').style.display = 'block';
      $('#adj_stk_loc').value="";
      $('#adj_stk_loc').focus();
      return false;
    }
      else
    {
      document.getElementById('adj_stk_locError').style.display = 'none';
      $('#adj_stk_loc').css("border","1px solid #82B04F");
      document.getElementById("adj_stk_locError").innerHTML="";
    }
	
	if(last_table_id == "0")
    {
		 
     $("#multiple_item_error").text('Please Check Some Items for Stock Adjustment');
      return false;
    }
     
	 
});

 
});
</script>
<?php // echo"<pre>";print_r($product_list);exit;?>
<?php echo $this->load->view('pages/inventory_left_side');?>

<section>
  <div class="rightPanel" style="padding: 14px 20px; width:96%;">
    <div class='container-fluid editViewContainer'>
      <form class="form-horizontal stockadjustmentform" id="stockadjustmentform" name="stockadjustmentform" method="post" action="<?php echo site_url('inventory/add_adjustment_stock')?>">
        <div class="contentHeader row-fluid">
          <h3 class="span8 textOverflowEllipsis">Add Adjustment Stock</h3>
          <div class="pull-right">
            <button class="btn-success adj_stk_add" type="submit" name="adj_stk_add" id="adj_stk_add"><strong>save</strong></button>
            <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
            <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a> </div>
        </div>
        <table class="table table-bordered blockContainer showInlineTable equalSplit">
          <thead>
            <tr>
              <th class="blockHeader" colspan="4">Stock Details</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> <span class="redColor">*</span>Adjustment Stock Code </label></td>
              <td class="fieldValue medium"><div class="row-fluid"> <span class="span10">
                  <div class="formError" id="adj_stk_codeError" style="margin-top: -30px;">
                    <div class="formErrorContent">This field is required</div>
                    <div class="formErrorArrow"></div>
                  </div>
                  <input id="adj_stk_code"  readonly="readonly" type="text" class="input-large uppercase" onkeyup="return codevalidation()" name="adj_stk_code" value="<?php if(isset($adj_stkcode)) { echo $adj_stkcode; } ?>"/>
                  <input id="adj_stk_code_prefix" type="hidden" name="adj_stk_code_prefix" value="<?php if(isset($adj_stkPrefix)) { echo $adj_stkPrefix; } ?>"/>
                  </span> </div></td>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px">Adjustment Date</label></td>
              <td class="fieldValue medium" ><div class="row-fluid">
                <div class="row-fluid"> <span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "adj_stk_dateError" style="margin-top: -30px;">
                    <div class="formErrorContent">This field is required</div>
                    <div class="formErrorArrow"></div>
                  </div>
                  <span class="span10">
                  <input type="text" value="<?php echo date('d-m-Y'); ?>" name="adj_stk_date" class="input-large nameField" id="adj_stk_date">
                  </span> </span> </div></td>
            </tr>
            <tr>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"><span class="redColor">*</span>Branch</label></td>
              <td class="fieldValue medium" ><div class="row-fluid"> <span class="span10">
                  <div class="Products_editView_fieldName_productnameformError parentFormEditView formError" id= "adj_stk_locError" style="margin-top: -30px;">
                    <div class="formErrorContent">Select Branch </div>
                    <div class="formErrorArrow"></div>
                  </div>
                  <select class="chzn-select"  name="adj_stk_loc" id="adj_stk_loc">
                    <option value="">Select an Option</option>
                    <?php foreach($locationdata as $LOC) {    ?>
                    <option value="<?php echo $LOC['location_id']; ?>"  ><?php echo $LOC['location_name']; ?></option>
                    <?php } ?>
                  </select>
                  </span> </div></td>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> Approved By </label></td>
              <td class="fieldValue medium"><div class="row-fluid"> <span class="span10">
                  <select data-selected-value="" name="adj_stk_appr_by" class="chzn-select" id="adj_stk_appr_by">
                   <?php foreach($users as $USR) { ?>
                    <option value="<?php echo $USR['user_id']; ?>" <?php if($userid == $USR['user_id']) { ?> selected="selected" <?php } ?>>
					<?php echo $USR['user_name']; ?>
                    </option>
				  <?php } ?>
                  </select>
                  </span> </div></td>
            </tr>
            <tr>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> Status </label></td>
              <td class="fieldValue medium">
				<div class="row-fluid">
					<span class="span10">
					   <input type="text" value="draft" name="adj_stk_status" class="input-large nameField" id="adj_stk_status" readonly="readonly">				  
					</span>
				</div>
			  </td>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> Cause </label></td>
              <td class="fieldValue medium">
				  <div class="row-fluid">
					  <span class="span10">
						  <input type="text" value="" name="adj_stk_cause" class="input-large nameField" id="adj_stk_cause">
					  </span>
				  </div>
			  </td>
            </tr>
			
			<tr>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> Sales Inovice Number </label></td>
              <td class="fieldValue medium">
				<div class="row-fluid">
					<span class="span10">
					   <input type="text" value="" name="adj_stk_reason" class="input-large nameField" id="adj_stk_reason">				  
					</span>
				</div>
			  </td>
              <td class="fieldLabel medium"><label class="muted pull-right marginRight10px"> &nbsp; </label></td>
              <td class="fieldValue medium">
				  <div class="row-fluid">
					  <span class="span10">
						  &nbsp;
					  </span>
				  </div>
			  </td>
            </tr>
            
          </tbody>
        </table>
        <div id="multiple_item_error" style="color: #FF0000; text-align:center;"></div>
        <span style="color:#FF0000; text-align:center; width:100%; height: 25px; float: left;" id="ind_error"></span>
        <div class="pull-right"> <!--<a class="btn btn-success" name="vendor_add_details" id="singleitem" href="javascript:void(0);"><strong>Add Single Item</strong></a>--> <a class="btn btn-success" name="vendor_add_details" id="multipleitems"><strong>Add Multiples Item</strong></a> </div>
        <div class="clearfix"></div>
        <input type ="hidden" value="0" name="last_table_id " id="last_table_id">
        <span class="grid_error" id="last_table_idError" > Please Add Some Items </span> <br />
        <br />
        <br />
        <table>
          <thead>
            <tr>
              <th>Item Code</th>
              <th>Product Code</th>
              <th>Item Name</th>
              <th>Control No</th>
			  <th>Batch No</th>
			  <th>Expiry Date</th>
              <th>ARN No</th>
              <th>UOM</th>
              <th>System Quantity </th>
              <th>Current Quantity </th>
              <th>Adjustment Quantity </th>
            </tr>
          </thead>
          <tbody id="disp_items">
          </tbody>
          
        </table>
        <br />
        <br />
        <br />
        <br />
        <div class="row-fluid">
          <div class="pull-right">
            <button class="btn-success adj_stk_add" type="submit" name="adj_stk_add" id="adj_stk_add"><strong>save</strong></button>
            <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
            <a class="cancelLink" type="reset" onClick="javascript:window.history.back();">Cancel</a> </div>
          <div class="clearfix"></div>
        </div>
        <br>
      </form>
    </div>
  </div>
  
  <!--popup start -->
  <div id="singleitem_to_pop_up" class="pop-up-display-content singleitemscontent"> </div>
  <!--popup end --> 
  
  <!--popup start -->
  <div id="multipleitems_to_pop_up" class="pop-up-display-content multipleitemscontent"> </div>
  <!--popup end --> 
</section>

<script type="text/javascript">
function onkeyupfortotal(id)
{
	//alert (id);return false;
    var curr_qty = $("#cur_qty_"+id).val();
    var inv_qty = $("#quantity_"+id).val();
	
	if(!isNaN(curr_qty))
	{
			
			if(curr_qty != "" && inv_qty != "")
			{
				var totalQuan = parseFloat(inv_qty) - parseFloat(curr_qty);
				$("#adj_qty_"+id).val(totalQuan);
				
			
		}
	}
	else
	{
		$("#ind_error").text("Enter Numeric Value");
		$("#cur_qty_"+id).val("");
		$("#inv_qty_"+id).val("");
		return false;
	}
	
}
</script> 
<script>
 (function($) {
	$(function() {

		$('#singleitem').bind('click', function(e) {
			
			$.ajax({
					type: 'POST',
					url: '<?php echo site_url('inventory/adj_getsingleitem'); ?>',
					data: {},
					success: function(resp) 
					{
						$("#singleitem_to_pop_up").html(resp);
						
						e.preventDefault();
						$('#singleitem_to_pop_up').bPopup({
							position: [300, 50], //x, y
							closeClass:'close',
							follow: [true, true],
							modalClose: true
						});			 
					}
				});
			 
		});

		$('#multipleitems').bind('click', function(e) {
			
			$.ajax({
					type: 'POST',
					url: '<?php echo site_url('inventory/adj_getmultipleitemdetails'); ?>',
					data: {},
					success: function(resp) 
					{
						$("#multipleitems_to_pop_up").html(resp);
						
						e.preventDefault();
						$('#multipleitems_to_pop_up').bPopup({
							position: [100, 50], //x, y
							closeClass:'close',
							follow: [true, true],
							modalClose: true
						});			 
					}
				});
			 
		});

		 

	});
})(jQuery);

function itemsgridrowdelete(id)
{
	sure = confirm('Are you sure to Delete?');
	
  	if(sure == true) 
  	{
		
		var deleteid = $("#itemsgrid_delete_"+id).attr('data-delete');
		var itemid = $("#itemsgrid_delete_"+id).attr('data-item');
		
		var myarray = new Array();
		
		$('input[name^="grid_item_id"]').each(function() {
   			myarray.push($(this).val());			
		});
		
		length = $("#last_table_id").val();
		
		var newarray = "";
		
		var i = 0;
		for(var counter=1; counter<=length; counter++)
		{
			var	item_id = $("#grid_item_id_"+counter).val();
			var	item_code = $("#item_code_"+counter).val();
			var	item_name = $("#item_name_"+counter).val();
			var	UOM_name  = $("#UOM_name_"+counter).val();
			var	UOM_id  = $("#UOM_id_"+counter).val();
			var	Qty =$("#quantity_"+counter).val();
			var	item_mfg_prtno =$("#item_mfg_prtno_"+counter).val();
			//alert(item_mfg_prtno); return false;
			if(item_id != itemid)	
			{	
				 i++;
				 
				 var mritms='<tr><td>'+item_code+'<input name="item_code['+i+']" id="item_code_'+i+'" value="'+item_code+'" type="hidden" /><input name="grid_item_id['+i+']" value="'+item_id+'" id="grid_item_id_'+i+'" type="hidden" /></td><td>'+item_mfg_prtno+'<input id="item_mfg_prtno_'+i+'" name="item_mfg_prtno['+i+']" value="'+item_mfg_prtno+'" type="hidden" /></td><td>'+item_name+'<input id="item_name_'+i+'" name="item_name['+i+']" value="'+item_name+'" type="hidden" /></td><td>'+UOM_name+'<input name="UOM_id['+i+']" id="UOM_id_'+i+'" type="hidden" value="'+UOM_id+'" /><input name="UOM_name['+i+']" type="hidden" id="UOM_name_'+i+'" value="'+UOM_name+'" /></td><td><a href="javascript:void(0);" id="quantity_value_'+i+'">'+Qty+'</a><input name="quantity['+i+']" value="'+Qty+'" id="quantity_'+i+'" type="hidden" /></td><td colspan="2"><div class="itemsgrid_action itemsgrid_delete" id="itemsgrid_delete_'+i+'" onclick="return itemsgridrowdelete('+i+');" data-item="'+item_id+'" data-delete="'+i+'" title="Delete"><span class="icon-trash"></span></div></td></tr>';
				  
				  newarray = newarray.concat(mritms);
				  
				 
			}
			else
			{
				
			}
		}
		$("#last_table_id").val(i);
		$('#disp_items').html(newarray);

		return false;
    }
  	else 
  	{
      return false;
    }
	
}

 
 </script> 
