<?php include('library/db.php'); ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<center style='margin-top:100px'>
	<h2>User list</h2><br>
	<table>
		<?php foreach(getUserList(getConnect()) as $user) : ?>
			<form method='POST' action="/editUser.php">
			<tr>
				<td><?=$user['email']?> <a href="/editUser.php?email=<?php echo $user['email']?>">Edit</a></td>
			</tr>
			</form>
		<?php endforeach; ?>
	</table>
	</center>