<?php
$sections = $this->sections;
$art = $this->art;
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
        <a href="./">Back</a>
	<form action="" method="post">
	    <?php if($art !== []){ ?>
		Article Section :
		<select name="acl-section">
		    <option value="<?php echo $art->sec_id ?>"><?php echo strip_tags(stripslashes($art->sec_name)) ?></option>
		    <?php foreach($sections as $sec){ ?>
			<?php if($sec->sec_id == $art->sec_id) continue; ?>
			<option value="<?php echo $sec->sec_id ?>"><?php echo strip_tags(stripslashes($sec->sec_name)) ?></option>
		    <?php } ?>
		</select>
		<a href="<?php echo ADMIN_PATH ?>/new-section">Create New Section</a><br/>
		Article Title : <input type="text" name="acl-title" value="<?php echo strip_tags(stripslashes($art->acl_title)) ?>"/><br/>
		Article Lang : <input maxlength="2" name="acl-lang" value="<?php echo strip_tags(stripslashes($art->acl_lang)) ?>"/><br/>
		Article Date : <input class="ui-datepicker" type="" name="acl-date" value="<?php echo strip_tags(stripslashes($art->acl_date)) ?>"/><br/>
		Article image :<input type="text" size="48" name="acl-image" id="acl-image" value="<?php echo strip_tags(stripslashes($art->acl_img)) ?>"/> <span onclick="finderPopup('acl-image')">Select file</span><br/>
		<textarea class="ckeditor" name="acl-content" id="ckeditor" rows="" cols="" tabindex=""><?php echo strip_tags(stripslashes($art->acl_content)) ?></textarea>
		<button>go</button>
		<input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	</form>
	    <?php }else{ ?>
		Article Not found.
	    <?php } ?>
    </body>
    <script src="<?php echo JS_PATH ?>/main.js"></script>
</html>
