 <?php
				if(!empty($vendors))
				{
					$i = 1;
		 			foreach($vendors as $Ven)
					{
						?>
              			<tr>
			               
			              <td>
                                <a href="javascript:void(0);" class="popup_selection_class vendor_popup<?php echo $i;?>" onClick="get_vendor_details(<?php echo $i;?>);">
                                    <?php echo $Ven['vendor_code'];?>
                                </a>
                                <input type="hidden" id="vendor_code_<?php echo $i;?>" value="<?php echo $Ven['vendor_code'];?>">
                                <input type="hidden" id="vendor_id_<?php echo $i;?>" value="<?php echo $Ven['vendor_id'];?>">
                            </td>
			                <td>
                                <a href="javascript:void(0);" class="popup_selection_class vendor_popup<?php echo $i;?>" onClick="get_vendor_details(<?php echo $i;?>);">
                                    <?php echo $Ven['vendor_name'];?>
                                    <input type="hidden" id="vendor_name_<?php echo $i;?>" value="<?php echo $Ven['vendor_name'];?>">
                                </a>
                            </td>
			                <td><?php echo $Ven['vendor_mobile'];?></td>
			                <td><?php echo $Ven['vendor_email'];?></td>
              			</tr>
		             <?php 
					 $i++;
					 }
				}
				else
				{
					?>
              	<tr>
                	<td colspan="6" style="text-align:center;"> No Records Found </td>
              	</tr>
              	<?php 
				} 
				?>