<?php
$sections = $this->sections;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Document</title>
	<script src="<?php echo CK_E_PATH ?>/ckeditor.js"></script>
	<script src="<?php echo CK_F_PATH ?>/ckfinder.js"></script>
	<script src="<?php echo JS_PATH ?>/jq.js"></script>
	<script src="<?php echo JS_PATH ?>/jq.ui.js"></script>
	<link href="<?php echo CSS_PATH ?>/ui-datepicker.css" rel="stylesheet"/>
    </head>
    <body>
        <a href="./">Main</a>
	<form action="" method="post">
	    Article Section :
	    <select name="acl-section">
		<?php foreach($sections as $sec){ ?>
		    <option value="<?php echo $sec->sec_id ?>"><?php echo $sec->sec_name ?></option>
		<?php } ?>
	    </select>
	    <a href="<?php echo URL ?>/admin/new-section">Create New Section</a><br/>
	    Article Title : <input type="text" name="acl-title" /><br/>
	    Article Lang : <input maxlength="2" name="acl-lang" /><br/>
	    Article Date : <input class="ui-datepicker" type="" name="acl-date" /><br/>
	    Article image :<input type="text" size="48" name="acl-image" id="acl-image" /> <span onclick="finderPopup('acl-image')">Select file</span><br/>
	    <textarea class="ckeditor" name="acl-content" id="ckeditor" rows="" cols="" tabindex=""></textarea>
	    <button>go</button>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	</form>
    </body>
    <script src="<?php echo JS_PATH ?>/main.js"></script>
</html>
