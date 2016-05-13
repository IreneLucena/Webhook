
<?php
include 'connect.php';
header ('Content-type: text/html; charset=utf-8');
$query="SELECT DISTINCT categoria FROM candidatos";
$result=mysqli_query($conn, $query);

$json = [];

while ($data = $result->fetch_assoc()) {
    for ($i = 0; $i < count($data) ; $i++) {
        //$category = $data['categoria'];
            array_push($json, [
                $data['categoria']
            ]);
    }
}
echo json_encode($json);
?>