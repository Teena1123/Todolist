<?php 
$errors ="";
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"project");
$id=$_GET['id'];
$res=mysqli_query($conn,"SELECT * FROM tasks where id='$id'");


?>
<DOCTYPE html>
<html>
<head>
<title> TODO LIST </title>
<link rel="stylesheet" type="text/css"href="style.css"
</head>
<body>
<div class="heading">
<h2> TODO LIST APPLICATION </h2>
</div>
<FORM method="post">
<?php while($rs=mysqli_fetch_array($res)){ ?>
<input type="text" name="task" class="task_input" value="<?php echo $rs['task'];?>">
<button type="submit" class="add_btn" name="UPDATE">UPDATE TASK</button>
<?php }?>
</form>


<?php
	if(isset($_POST['UPDATE'])){
		$task=$_POST['task'];
		$res1=mysqli_query($conn,"update tasks set task='$task' where id='$id'");
		if($res1){
			echo "<script>alert('Update successfully');
						window.location.href='todo.php';
			</script>";
			
		}
	}
?>
</body>
</html>
