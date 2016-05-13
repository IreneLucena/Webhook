<?php
include 'connect.php';
header ('Content-type: text/html; charset=utf-8');

$status=$_POST['status'];
$category=$_POST['category'];

$statusArr=explode(",", $status);
$categoryArr=explode(",", $category);

$query="SELECT * FROM candidatos";

if($status || $category){
	$query .= " WHERE ";
}

if($status){
	$query .= "estado IN (";
	for($i = 0; $i < count($statusArr); $i++){
		$query .= "'" . $statusArr[$i] . "',";
	}
	$query = rtrim($query, ",");
	$query .= ")";
}

if($category){
	if($status) {
		$query .= " AND ";
	};
	$query .= "categoria IN(";
	for($i = 0; $i < count($categoryArr); $i++){
		$query .= "'" . $categoryArr[$i] . "',";
	}
	$query = rtrim($query, ",");
	$query .= ")";
}
$result=mysqli_query($conn, $query);

$json = [];
while ($data = $result->fetch_assoc()) {
	for ($i = 0; $i < count($statusArr) ; $i++) {
		$id = $data['id'];
		$name = $data['nombre'];
		$body = $data['cuerpo'];
		$date = $data['fecha_alta'];
		$subject = $data['asunto'];
		$status = $data['estado'];
		$category = $data['categoria'];
		$dir = "uploads/" . $id;
		if ($status == $statusArr[$i]){
			array_push($json, [
				"id" => $id,
				"name" => $name,
				"body" => $body,
				"dateC" => $date,
				"subject" => $subject,
				"status" => $statusArr[$i],
				"category" => $category,
				"dir" => $dir
			]);
		}
	}
}
echo json_encode($json);
//echo $query;
?>