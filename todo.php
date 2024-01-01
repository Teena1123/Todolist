<?php 
$errors ="";
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"project");


if(isset($_POST['submit'])){
	$task = $_POST['task'];
	if(empty($task)){
		$errors ="You must fill in this task";
	}else{
	      mysqli_query($conn,"INSERT INTO tasks(task) VALUES ('$task')");
	      header('location: todo.php');
	}
}
// delete task
if (isset($_GET['del_task'])){
	$id = $_GET['del_task'];
	mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
	header('location: todo.php');
}
	
//edit task
//if (isset($_GET['edit_task']))
	//$str="update tasks set No.='$No.',Task='$Task' where id='$id'";
 	//	$res=mysqli_query($conn,$str);
 	//	if($res){
 		//	echo "inserted data";
         //header('location:todo.php');
		//}
	
$tasks = mysqli_query($conn, "SELECT * FROM tasks ");

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
<?php if(isset($errors)) { ?>
<p> <?php echo $errors;?></P>
<?php } ?>
<input type="text" name="task" class="task_input">
<button type="submit" class="add_btn" name="submit">Add Task</button>


<form>
<table>
<thread>
<tr>
<th>No.</th>
<th>Task</th>
<th>Action</th>
</tr>
</thread>
<tbody style="text-align:center">
<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
<tr>
<td><?php echo $i; ?></td>
<td class="task"> <?php echo $row['task']; ?></td>
<td class="delete">

<a href="todo.php?del_task=<?php echo $row['id'];?>">X</a>
<a href="edit.php?id=<?php echo $row['id'];?>">EDIT</a>

</td>
	
<?php $i++;} ?>

</tbody>
</table>
</body>
</html>
