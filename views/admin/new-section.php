<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title></title>
	<script src="<?php echo CK_E_PATH ?>/ckeditor.js"></script>
	<script src="<?php echo CK_F_PATH ?>/ckfinder.js"></script>
    </head>
    <body>
	<form action="" method="post">
	    <a href="<?php echo URL ?>/admin">Main</a><br/>
	    Section logo : <input name="sec-logo" id="sec-logo" size="48" type="text" value=""/> <span onclick="finderPopup('sec-logo')">Browse</span><br/><br/>
	    Section Name : <input name="sec-name" type="text" size="40" placeholder="Title"/><br/><br/>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    <button>Go</button>
	</form>
    </body>

    <script src="<?php echo JS_PATH ?>/main.js"></script>
</html>
