<?php
$users = $this->users;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title></title>
    </head>
    <body>
	<a href=".">Back</a>
	<br/>
	==============
	<br/>
	<?php foreach($users as $user){ ?>
	    User ID : #<?php echo $user->u_id ?> <br/>
	    User Name : <?php echo strip_tags(stripslashes($user->u_name)) ?> <br/>
	    User login nick : <?php echo strip_tags(stripslashes($user->u_nick)) ?> <br/>
	    User email : <?php echo strip_tags(stripslashes($user->u_email)) ?> <br/>
	    User type: <?php echo $this->userTypeAsText($user->u_type) ?> <br/>
	    User Last login: <?php echo $user->u_lastlogin ?> <br/>
	    <a href="<?php echo ADMIN_PATH ?>/manage-users/edit&id=<?php echo $user->u_id ?>">edit</a> <br/>
	    <a href="<?php echo ADMIN_PATH ?>/manage-users&delete=<?php echo $user->u_id ?>">delete</a> <br/>
	    <br/>
	    -----
	    <br/>
	<?php } ?>
    </body>
</html>
