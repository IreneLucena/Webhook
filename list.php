<?php

include 'connect.php';
header ('Content-type: text/html; charset=utf-8');

$status=$_POST['status'];
$statusArr=explode(",", $status);

$json = [];

while($data=$result->fetch_assoc())
{
	for($i=0;$i<count($statusArr);$i++)
	{
		$id = $data['id'];
		$name = $data['nombre'];
		$body = $data['cuerpo'];
		$date = $data['fecha_alta'];
		$subject = $data['asunto'];
		$status = $data['estado'];
		$category = $data['categoria'];
		$dir = "uploads/" . $id;

		if ($status == $statusArr[$i]) {
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
		echo json_encode($json);
	}
	
}

?>