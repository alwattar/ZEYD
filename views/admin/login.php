<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Document</title>
    </head>
    <body>
	<form action="" method="post">
	    <input name="username" type="text" placeholder="username"/><br/>
	    <input name="password" type="password" placeholder="password"/><br/>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    <button>Login</button>
	</form>
    </body>
</html>
