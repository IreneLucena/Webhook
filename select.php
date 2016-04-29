<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

function fetch_select(val)
{
   $.ajax({
     type: 'post',
     url: 'selectform.php',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("new_select").innerHTML=response; 
     }
   });
}

</script>

</head>

<body>
	<p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
		<div id="select_box">
		<select onchange="fetch_select(this.value);">
				<option>Select state</option>
           <?php
           $conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");
           $categoria = $_POST['categoria'];
           $query=("select categoria from candidatos where categoria='$categoria'");
           $result=mysqli_query($conn, $query);
           
           while($row=$result->fetch_assoc($query))
           {
           	//while($row=mysql_fetch_array($find))
           	echo "<option>".$row['categoria']."</option>";
           }
           ?>

         </select>
         <select id="new_select">
		</select>

		</div>

</body>
</html>