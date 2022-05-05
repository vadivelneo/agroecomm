$(function(){
	var operation = "A"; //"A"=Adding; "E"=Editing

	var selected_index = -1; //Index of the selected list item

	var tbClients = localStorage.getItem("tbClients");//Retrieve the stored data

	tbClients = JSON.parse(tbClients); //Converts string to object

	if(tbClients == null) //If there is no data, initialize an empty array
		tbClients = [];

	function Add(){
		var client = JSON.stringify({
			Code    : $("#product_item").val(),
			UOM  : $("#product_itemusageunit").val(),
			Qty : $("#product_itemqty").val(),
			Rate : $("#product_itemrate").val()
		});
		tbClients.push(client);
		localStorage.setItem("tbClients", JSON.stringify(tbClients));
		alert("The data was saved.");
		return true;
	}

	function Edit(){
		tbClients[selected_index] = JSON.stringify({
				Code    : $("#product_item").val(),
				UOM  : $("#product_itemusageunit").val(),
				Qty : $("#product_itemqty").val(),
				Rate : $("#product_itemrate").val()
			});//Alter the selected item on the table
		localStorage.setItem("tbClients", JSON.stringify(tbClients));
		alert("The data was edited.")
		operation = "A"; //Return to default value
		return true;
	}

	function Delete(){
		tbClients.splice(selected_index, 1);
		localStorage.setItem("tbClients", JSON.stringify(tbClients));
		alert("Client deleted.");
	}

	function List(){		
		$("#tblList").html("");
		$("#tblList").html(
			"<thead>"+
			"	<tr>"+
			"	<th></th>"+
			"	<th>Item Code</th>"+
			"	<th>UOM</th>"+
			"	<th>Quantity</th>"+
			"	<th>Rate</th>"+
			"	</tr>"+
			"</thead>"+
			"<tbody>"+
			"</tbody>"
			);
		for(var i in tbClients){
			var cli = JSON.parse(tbClients[i]);
		  	$("#tblList tbody").append("<tr>"+
									 	 "	<td><img src='edit.png' alt='Edit"+i+"' class='btnEdit'/><img src='delete.png' alt='Delete"+i+"' class='btnDelete'/></td>" + 
										 "	<td>"+cli.Code+"</td>" + 
										 "	<td>"+cli.UOM+"</td>" + 
										 "	<td>"+cli.Qty+"</td>" + 
										 "	<td>"+cli.Rate+"</td>" + 
		  								 "</tr>");
		}
	}

	$("#btnSave").bind("click",function(){		
		if(operation == "A")
			return Add();
		else
			return Edit();
	});

	List();

	$(".btnEdit").bind("click", function(){
		
		operation = "E";
		selected_index = parseInt($(this).attr("alt").replace("Edit", ""));
		
		var cli = JSON.parse(tbClients[selected_index]);
		$("#product_item").val(cli.Code);
		$("#product_itemusageunit").val(cli.UOM);
		$("#product_itemqty").val(cli.Qty);
		$("#product_itemrate").val(cli.Rate);
		//$("#product_item").attr("readonly","readonly");
		$("#product_itemqty").focus();
	});

	$(".btnDelete").bind("click", function(){
		selected_index = parseInt($(this).attr("alt").replace("Delete", ""));
		Delete();
		List();
	});
});