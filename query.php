<?php
define('HOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','zippo');

function connection(){
    // Create connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//mysqli_set_charset($conn, "utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
	}
    return $conn;
    // echo "Connected successfully";
}

function execute($sql){
	//save data into table
	// open connection to database
	$conn = connection();
	//insert, update, delete
	$result=mysqli_query($conn, $sql);
	//close connection
	mysqli_close($conn);
	return $result;
} 
// laays 1 danh sach mang tu table
function executeResult($sql){
	//save data into table
	// open connection to database
	$conn = connection();
	//insert, update, delete
	$result = mysqli_query($conn, $sql);
	$data   = [];
    
	if ($result != null) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
	}
	//close connection
	mysqli_close($conn);
	return $data;
}
// lay 1 row tu table
function executeSingleResult($sql) {
	//save data into table
	// open connection to database
	$conn = connection();
	//insert, update, delete
	$result = mysqli_query($conn, $sql);
	$row    = null;
	if ($result != null) {
		$row = mysqli_fetch_array($result, 1);
	}
	//close connection
	mysqli_close($conn);
	return $row;
}

function countRow($sql){
    $conn=connection();
    $result=mysqli_query($conn, $sql);
    $numrow=0;
    if($result){
        $numrow=mysqli_num_rows($result);
    }else $numrow=0;
    mysqli_close($conn);
    return $numrow;
}
?>