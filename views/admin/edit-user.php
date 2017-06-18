<?php
$usr = $this->usr;
$manager_types = [
    "مدير",
    "مشرف",
    "مراجع"
]
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>New user</title>
    </head>
    <body>
	<a href=".">Back</a>
	<form action="" method="post">
	    User Name : <input name="u-name" type="text" value="<?php echo strip_tags(stripslashes($usr->u_name)) ?>"/><br/><br/>
	    User Nick ( to login) : <input name="u-nick" type="text" value="<?php echo strip_tags(stripslashes($usr->u_nick)) ?>"/><br/><br/>
	    User email : <input name="u-email" type="text" value="<?php echo strip_tags(stripslashes($usr->u_email)) ?>"/><br/><br/>
	    User password : <input name="u-password" type="text"/><br/><br/>
	    User Type :
	    <select id="" name="u-type">
		<option value="<?php echo $usr->u_type ?>"><?php echo $manager_types[$usr->u_type] ?></option>
		<?php foreach($manager_types as $k => $m){ ?>
		    <?php if($k == $usr->u_type) continue ?>
		    
		    <option value="<?php echo $k ?>"><?php echo $m ?></option>
		<?php } ?>
	    </select>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    <br/>
	    <button>Go</button>
	</form>
    </body>
</html>
