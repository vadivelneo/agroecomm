<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Income Recepit</title>
<style>
* {
	margin: 0;
	padding: 0;
}
body {
	font: 14px/1.4 Georgia, serif;
}
#page-wrap {
	width: 800px;
	margin: 0 auto;
	font-family: "Times New Roman", Georgia, Serif;
}
textarea {
	border: 0;
	overflow: hidden;
	resize: none;
}
table {
	border-collapse: collapse;
}
table td, table th {
	border: 1px solid black;
	padding: 5px;
}
#customer {
	overflow: hidden;
}
#logo {
	text-align: right;
	float: left;
	position: relative;
	margin: 10px 0;
	border: 1px solid #fff;
	max-width: 540px;
	max-height: 100px;
	overflow: hidden;
}
#customer-title {
	font-size: 20px;
	font-weight: bold;
	float: left;
}
#meta {
	margin-top: 15px;
	width: 490px;
	float: right;
}
#meta td {
	text-align: left;
}
#meta td.meta-head {
	text-align: left;
	background: #eee;
	vertical-align:top;
	width:140px;
	font-size: 12px;
}
.blockHeader
{
	background: #eee;
}
#footer {
	width:560px;
	height: 145px;
	margin: 10px 0;
	float:left;
}
#sign {
	width:230px;
	margin-top:10px;
	float:right;
}
.last {
	height: 100px;
	vertical-align: bottom;
	text-align: center;
}
.print {
    float: left;
    margin-left: 21%;
    margin-top: 2%;
}
</style>
<script>
function myprint() {
window.print();
return false();
}
</script>
</head>

<body>
<div id="page-wrap"> 
  
  <!--<textarea id="header">INVOICE</textarea>--> 
  
  <!--  <div id="logo">
             
              <img id="image" src="logo.png" alt="logo" />
            </div>-->
 <?php //echo "<PRE>";print_r($bill);exit;?> 
  <div style="clear:both"></div>
  <div id="customer">
    <table width="532" id="meta" style="float:left;">
      <tr>
        <td width="150" class="meta-head">Customer Name</td>
        <td width="370"><?php echo $cus_det->customer_name;?></td>
      </tr>
      <tr>
        <td class="meta-head">Address</td>
        <td><address>
          <?php echo $bill->customer_billing_address	;?>,<br>
          <?php echo $bill->city_name;?>,<?php echo $bill->state_name;?>,<br>
          <?php echo $bill->country_name;?>-<?php echo $bill->customer_billing_zipcode;?>
          </address></td>
      </tr>
      <tr>
        <td class="meta-head">Email</td>
        <td><?php echo $cus_det->customer_email;?></td>
      </tr>
      <tr>
        <td class="meta-head">Mobile </td>
        <td><?php echo $cus_det->customer_mobile;?></td>
      </tr>
    </table>

   <div class="print">
        <a href="javascript:void(0);" class="full_print" onclick="return myprint();" >
            <img src="<?php echo base_url();?>resources/images/print.png" height="25" />
        </a> 
     </div>  </div>
  <p>&nbsp;</p>
  <table class="">
    <thead>
      <tr>
        <th colspan="4" class="blockHeader">Receipt Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width="133" class="blockHeader"><label class="muted pull-right marginRight10px">Invoice Receipt No </label></td>
        <td width="232" ><?php echo $editinv_recp->invoice_receipt_number;?></td>
        <td width="140" class="blockHeader"><label class="muted pull-right marginRight10px"> Receipt Date </label></td>
        <td width="275" ><?php echo $editinv_recp->invoice_receipt_date;?></td>
      </tr>
      <tr>
        <td class="blockHeader"><label class="muted pull-right marginRight10px">Customer Name </label></td>
        <td class=""><?php echo $editinv_recp->customer_name;?></td>
        <td class="blockHeader"><label class="muted pull-right marginRight10px">Customer Code</label></td>
        <td ><?php echo $editinv_recp->customer_code;?></td>
      </tr>
      <tr>
        <td class="blockHeader"><label class="muted pull-right marginRight10px">Amount</label></td>
        <td><?php echo $editinv_recp->invoice_receipt_amount;?></td>
        <td class="blockHeader"><label class="muted pull-right marginRight10px">Status</label></td>
        <td><?php echo $editinv_recp->invoice_receipt_status;?></td>
      </tr>
      <tr>
        <td class="blockHeader"><label class="muted pull-right marginRight10px"> Description </label></td>
        <td  colspan="3"><?php echo $editinv_recp->invoice_receipt_descrption;?></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <table class="table table-bordered blockContainer showInlineTable equalSplit">
    <thead>
      <tr>
        <th colspan="4" class="blockHeader">Payment Mode</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width="153" class="blockHeader"><label class="muted pull-right marginRight10px"> Payment Mode </label></td>
        <td width="194"><?php echo $editinv_recp->payment_mode_name;?></td>
        <td width="131" class="blockHeader"><label class="muted pull-right marginRight10px">Bank Name</label></td>
        <td width="302"><?php echo $editinv_recp->invoice_receipt_payment_bank;?></td>
      </tr>
      <tr>
        <td class="blockHeader"><label class="muted pull-right marginRight10px">Cheque No/DD Number</label></td>
        <td><?php echo $editinv_recp->invoice_receipt_payment_check_dd_number;?></td>
        <td class="blockHeader"><label class="muted pull-right marginRight10px">Cheque No/DD Date</label></td>
        <td><?php echo $editinv_recp->invoice_receipt_payment_check_dd_date;?></td>
      </tr>
    </tbody>
  </table>
  <table id="footer">
    <tr>
      <td>E.& O.E.<br>
      <?php echo $compny_det->company_name;?><br>
        TIN:<?php echo $compny_det->company_tin_number;?><br>
        CST:<?php echo $compny_det->company_cst_number;?><br>
        Area Code:<?php echo $compny_det->company_area_code;?><br></td>
    </tr>
  </table>
  <table id="sign" >
    <tr>
      <td style="text-align:center;font-weight:800;"> For </td>
    </tr>
    <tr>
      <td class="last">Authorised Signatory</td>
    </tr>
  </table>
  
  <!--<div id="terms">
		  <h5>Terms and Conditions</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>--> 
  
</div>
</body>
</html>