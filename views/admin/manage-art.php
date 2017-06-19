<?php
$articles = $this->articles;
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
	<br/>
	---------
	<br/>
	<?php foreach($articles as $art){ ?>
	    <div id="<?php echo strip_tags(stripslashes($art->acl_id))?>">
		Article ID: #<?php echo strip_tags(stripslashes($art->acl_id))?>
		<br/>
		Author ID: #<?php echo strip_tags(stripslashes($art->u_id))?>
		<br/>
		Author Name: <?php echo strip_tags(stripslashes($art->u_name))?>
		<br/>
		Article Title: <?php echo strip_tags(stripslashes($art->acl_title))?>
		<br/>
		Article Lang: <?php echo strip_tags(stripslashes($art->acl_lang))?>
		<br/>
		Article Date (Manually): <?php echo strip_tags(stripslashes($art->acl_date))?>
		<br/>
		Article Date (RealDate): <?php echo strip_tags(stripslashes($art->acl_realdate))?>
		<br/>
		<a href="<?php echo ADMIN_PATH ?>/manage-art/edit&id=<?php echo $art->acl_id ?>">edit</a>
		<br/>
		<a href="<?php echo ADMIN_PATH ?>/manage-art&delete=<?php echo $art->acl_id ?>">Delete</a>
		<br/>
		---------
		<br/>
	    </div>
	<?php } ?>
    </body>
    <script src="<?php echo JS_PATH ?>/main.js"></script>
</html>
