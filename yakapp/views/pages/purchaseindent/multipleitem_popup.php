
<script type="text/javascript"> 
$(document).ready(function () {
  
  $(".itemcheckbox").prop("checked", false);
  document.getElementById("multiple_item_form").reset();
  
  $('#btnmultipleSave').click(function ()
  {
    var checked_id = [];
        $("input[name='item_check[]']:checked").each(function ()
        {
      checked_id.push(parseInt($(this).val()));
      var check_box_val = this.value;
      if(this.checked == true)
      {
          var received_qty = $("#received_qty"+check_box_val).val();
          var ordered_qty = $("#ordered_qty"+check_box_val).val();
		  var pending_qty = $("#pending_qty"+check_box_val).val();
          var remarks = $("#remarks"+check_box_val).val();
          
          if(ordered_qty == "")
          {
            $("#ordered_qty"+check_box_val).focus();
            $("#multiple_item_error").css('display','block');
            return false;
          }
          else if(received_qty == "")
          {
            $("#received_qty"+check_box_val).focus();
            $("#multiple_item_error").css('display','block');
            return false;
          }
		  else if(pending_qty == "")
          {
            $("#pending_qty"+check_box_val).focus();
            $("#multiple_item_error").css('display','block');
            return false;
          }
          else if(remarks == "")
          {
            $("#remarks"+check_box_val).focus();
            $("#multiple_item_error").css('display','block');
            return false;
          }
          else
          {
            $("#multiple_item_error").css('display','none');
            
            var item_id = $("#item_id"+check_box_val).val();
            var item_code = $("#item_code"+check_box_val).val();
            var item_name = $("#item_name"+check_box_val).val();
            var pending_qty = $("#pending_qty"+check_box_val).val();
            var UOM_id = $("#UOM_id"+check_box_val).val();
            var UOM_name = $("#UOM_name"+check_box_val).val();
            
            
            
            var table_count = $("#last_table_id").val();
            var counter = parseInt(table_count)+ 1;
            
             var items = '<tr><td>'+item_code+'<input name="item_code['+counter+']" value="'+item_code+'" type="hidden" /><input name="item_id['+counter+']" value="'+item_id+'" type="hidden" /></td><td>'+item_name+'<input name="item_name['+counter+']" value="'+item_name+'" type="hidden" /></td><td>'+ordered_qty+'<input name="ordered_qty['+counter+']" value="'+ordered_qty+'" type="hidden" /></td><td>'+UOM_name+'<input name="UOM_id['+counter+']" type="hidden" value="'+UOM_id+'" /><input name="UOM_name['+counter+']" type="hidden" value="'+UOM_name+'" /></td><td>'+received_qty+'<input name="received_qty['+counter+']" value="'+received_qty+'" type="hidden" /></td><td>'+pending_qty+'<input name="pending_qty['+counter+']" value="'+pending_qty+'" type="hidden" /></td><td>'+remarks+'<input name="remarks['+counter+']" value="'+remarks+'"  type="hidden" /></td></tr>';
            
             $('#disp_items').append(items);
             $("#last_table_id").val(counter);
             $("#received_qty"+check_box_val).val("");
             $("#pending_qty"+check_box_val).val("");
               $("#ordered_qty"+check_box_val).val("");
             $("#remarks"+check_box_val).val("");
             $("#checkbox"+check_box_val).prop("checked", false);
          }
      }
      else
      {
        $("#received_qty"+check_box_val).val("");
        $("#ordered_qty"+check_box_val).val("");
        $("#remarks"+check_box_val).val("");
      }
      
      
        });
    
  });
  
  $(".quantity").keypress(function (e)
  {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
     {  
       return false;
     }
    });
  
  
  $('#close_popup').click(function ()
  {
    document.getElementById("multiple_item_form").reset();
    $(".itemcheckbox").prop("checked", false);
  });
  
});

function multiplepopuptotal(id)
{
  
  var received_qty = $("#received_qty"+id).val();
  var priceperunit = $("#ordered_qty"+id).val();
  if(received_qty != "" && priceperunit != "")
  {
    var totalRate = parseInt(received_qty) * parseInt(priceperunit);
    $("#remarks"+id).val(totalRate);
  }
     
}
  
</script>
<div class="p-popup">
  <a class="close"><img src="<?php echo base_url(); ?>/resources/images/close-button.png" width="25" /></a>
  <div class="title_head">
  <p>Multiple Items</p>
  <ul>
     <li><a class="insert" id="btnmultipleSave" href="#">Insert</a></li>
     <li><a class="btn-success close" href="#" id="close_popup">Close</a></li>
  </ul>
  </div>
    <div class="table_head1" id="table">
      <div class="popup_col w10 last">
      <div id="multiple_item_error" style="color: #FF0000; text-align:center; display: none;">This Field is Required</div>
      <form id="multiple_item_form">
        <div class="content">
          <table>
            <tbody>
              <tr>
                <th class="checkbox"></th>
        <th>Item Code</th>
                <th>Item Name</th>
                <th>Ordered Quantity</th> 
        <th>UOM</th>
                <th>Received Quantity</th> 
        <th>Pending Quantity</th>
        
        <th>Remarks</th>
        </tr>
              <?php $itemcount = 1; foreach($product_list as $PROLST) { //echo "<pre>"; print_r($PROLST); ?>
              <tr>
              <td class="checkbox"><input type="checkbox" class="itemcheckbox" id="checkbox<?php echo $itemcount; ?>" value="<?php echo $itemcount; ?>" name="item_check[]"></td>
              <td>
              <?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>
              <input id="item_id<?php echo $itemcount; ?>" name="item_id[<?php echo $itemcount; ?>]" value="<?php echo $PROLST['product_id']; ?>" type="hidden" />
              <input id="item_code<?php echo $itemcount; ?>" name="item_code[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_code'])) { echo $PROLST['product_code']; } ?>" type="hidden" />
              </td>
              <td>
              <?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>
              <input id="item_name<?php echo $itemcount; ?>" name="item_name[<?php echo $itemcount; ?>]" value="<?php if(isset($PROLST['product_name'])) { echo $PROLST['product_name']; } ?>" type="hidden" />
              </td>
              <td>
              <input id="ordered_qty<?php echo $itemcount; ?>"  class="quantity" name="ordered_qty[<?php echo $itemcount; ?>]" type="text" value="" />
              </td>
              <td>
             <?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name'];  } ?> 
              <input id="UOM_id<?php echo $itemcount; ?>" name="UOM_id[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_id'])) { echo $PROLST['uom_id']; } ?>" />
              <input id="UOM_name<?php echo $itemcount; ?>" name="UOM_name[<?php echo $itemcount; ?>]" type="hidden" value="<?php if(isset($PROLST['uom_name'])) { echo $PROLST['uom_name']; } ?>" />
              </td>
               
              <td>
              <input id="received_qty<?php echo $itemcount; ?>" class="quantity" name="received_qty[<?php echo $itemcount; ?>]" type="text" value="" />
              </td>
        <td>
              <input id="pending_qty<?php echo $itemcount; ?>"  class="quantity" name="pending_qty[<?php echo $itemcount; ?>]" type="text" value="" />
              </td>
              <td>
              <input id="remarks<?php echo $itemcount; ?>" class="" name="remarks[<?php echo $itemcount; ?>]" type="text" value="" />
              </td>
              </tr>
              <?php $itemcount++; } ?>
            </tbody>
          </table>
        </div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
</div>