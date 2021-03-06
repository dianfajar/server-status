<?php 
if (isset($_GET['new']))
{
	User::add();
}

render_header("New user", true); ?>
<div class="text-center">
    <h2>Add new user</h2>
</div>

<form action="/admin/?do=new-user&new=user" method="POST" class="form-horizontal">
	<?php if (isset($message))
    {?>
      <p class="alert alert-danger"><?php echo $message?></p>
    <?php
    } ?>
	<div class="form-group">
		<div class="col-sm-6"><label for="name">Name: </label><input type="text" maxlength="50" name="name" value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES);?>" id="name" placeholder="Name" class="form-control" required></div>
		<div class="col-sm-6"><label for="surname">Surname: </label><input type="text" maxlength="50" name="surname" value="<?php echo htmlspecialchars($_POST['surname'],ENT_QUOTES);?>" id="surname" placeholder="Surname" class="form-control" required></div>
	</div>
	<div class="form-group">
		<div class="col-sm-6"><label for="username">Username:</label><input type="text" maxlength="50" name="username" value="<?php echo htmlspecialchars($_POST['username'],ENT_QUOTES);?>" id="username" placeholder="Username" class="form-control" required></div>
		<div class="col-sm-6"><label for="email">Email:</label><input type="email" maxlength="60" name="email" value="<?php echo htmlspecialchars($_POST['email'],ENT_QUOTES);?>" id="email" placeholder="Email" class="form-control" required></div>
	</div>
	<div class="form-group">
		<div class="col-sm-6"><label for="password">Password:</label><input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES);?>" id="password" placeholder="Password" class="form-control" required></div>
		<div class="col-sm-6">
			<label for="permission">Permission: </label>
			<select name="permission" id="permission" class="form-control">
				<?php 
				if (!empty($_POST['permission']))
				{
					$permission = $_POST['permission'];
				}
				else
				{
					$permission = 2;
				}
				foreach ($permissions as $key => $value) {
					if ($permission == $key)
					{
						echo '<option value="'.$key.'" selected>'.$value.'</option>';
					}
					else{
						echo '<option value="'.$key.'">'.$value.'</option>';
					}	
				}
				?>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>