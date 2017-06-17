<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>New user</title>
    </head>
    <body>
	<form action="">
	    User Name : <input name="" type="text"/><br/><br/>
	    User Nick ( to login) : <input name="" type="text"/><br/><br/>
	    User email : <input name="" type="text"/><br/><br/>
	    User password : <input name="" type="text"/><br/><br/>
	    User Type :
	    <select id="" name="">
		<option value="2" selected>مراجع</option>
		<option value="1">مشرف</option>
		<option value="0">مدير</option>
	    </select>
	    <input name="" type="hidden" value="<?php echo $this->_token ?>"/>
	    <br/>
	    <button>Go</button>
	</form>
    </body>
</html>
