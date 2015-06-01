	<table>
		<?php foreach(getUserList(getConnect()) as $user) : ?>
			<form method='POST' action="/editUser.php">
			<tr>
				<td><?=$user['name']?> <a href="/editUser.php?email=<?php echo $user['email']?>">Edit</a></td>
			</tr>
			</form>
		<?php endforeach; ?>
	</table>