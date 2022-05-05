<?php
//include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agro_test1";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

// initilize all variable
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
//define index of column name
$columns = array(
    0 =>'id',
    1 =>'name',
    2 =>'Phone',
);

$where = $sqlTot = $sqlRec = "";

// check search value exist
if( !empty($params['search']['value']) ) {
    $where .=" WHERE ";
    $where .=" ( id LIKE '".$params['search']['value']."%' ";
    $where .=" OR name LIKE '".$params['search']['value']."%' ";
    $where .=" OR salery LIKE '".$params['search']['value']."%' )";
}

// getting total number records without any search
$sql = "SELECT `SO`.*, `TOT`.*, `OFFR`.* FROM (`vsoft_sales_order` as SO) JOIN `vsoft_sales_order_total` as TOT ON `TOT`.`so_total_sales_id` = `SO`.`sales_order_id` JOIN `vsoft_officer` as OFFR ON `OFFR`.`OFCR_ID` = `SO`.`sales_order_customer_id` WHERE `SO`.`sales_order_active_status` = 'active' AND `SO`.`sales_order_status` = 'processed' AND `OFFR`.`OFCR_USR_VALUE` = 'AGROPRO17071' GROUP BY `SO`.`sales_order_id`";
$sqlTot .= $sql;
$sqlRec .= $sql;

//concatenate search sql if value exist
if(isset($where) && $where != '') {
    $sqlTot .= $where;
    $sqlRec .= $where;
}

 //$sqlRec .=  " ORDER BY CUS_ID";

$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

while( $row = mysqli_fetch_array($queryTot) ) {
    $data[] = $row;
}

$json_data = array(
        //"draw"            => intval( $params['draw'] ),
        "recordsTotal"    => intval( $totalRecords ),
        "recordsFiltered" => intval($totalRecords),
        "data"            => $data   // total data array
        );
//echo "<pre>"; print_r($json_data); exit;
echo json_encode($json_data);  // send data as json format
?>