
<?php

include 'connect.php';
header("Content-type:text/html; charset: iso-8859-1");
echo '<script type="text/javascript" src="business/js/jquery-1.12.3.min.js"></script>
<link href="business/css/accordion.css" rel="stylesheet">
<script type="text/javascript" src="business/js/accordion.js"></script>';


while($data=$result->fetch_assoc())
{
    $category=$data['categoria'];
}
$categoryU = explode(",", $category);
$categoryU=array_unique($categoryU);
for($i=0;$i<count($categoryU);$i++){
    echo '<div class="StatusDiv"><input type="checkbox" id="categoria" class="filtroC" name="category" value=' . $categoryU[$i] . '><label for=' . $categoryU[$i] . '>' . $categoryU[$i] . '</label></div>';
}
?>