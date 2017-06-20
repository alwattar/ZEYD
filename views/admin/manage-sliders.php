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
	<a href="<?php echo ADMIN_PATH ?>">Home</a>
	<br/>
	----------------
	<?php foreach($this->sliders as $slider){ ?>
	    <form name="edit-form" action="" method="post">
		<img height="50" src="<?php echo strip_tags(stripslashes($slider->sl_img)) ?>"/>
		<br/>
		Slider ID: #<?php echo strip_tags(stripslashes($slider->sl_id)) ?>
		<input name="slider-id" type="hidden" value="<?php echo strip_tags(stripslashes($slider->sl_id)) ?>"/>
		<br/>
		Slider User: <?php echo strip_tags(stripslashes($slider->u_name)) ?>
		<br/>
		Slider Date: <?php echo strip_tags(stripslashes($slider->sl_date)) ?>
		<br/>
		Slider Img: <input name="slider-img" id="slider-img-<?php echo strip_tags(stripslashes($slider->sl_id)) ?>" type="text" value="<?php echo strip_tags(stripslashes($slider->sl_img)) ?>"/> <span onclick="finderPopup('slider-img-<?php echo strip_tags(stripslashes($slider->sl_id)) ?>')">Browse</span>
		<br/>
		Slider content: <input name="slider-content" type="text" value="<?php echo strip_tags(stripslashes($slider->sl_content)) ?>"/>
		<br/>
		Slider Link: <input name="slider-url" type="text" value="<?php echo strip_tags(stripslashes($slider->sl_url)) ?>"/> <a target="_blank" href="<?php echo strip_tags(stripslashes($slider->sl_url)) ?>">Visit link</a>
		<br/>
		<button>Save</button> OR <a href="<?php echo ADMIN_PATH ?>/manage-sliders&del=<?php echo strip_tags(stripslashes($slider->sl_id)) ?>">Delete</a>
		<input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    </form>
	    ============
	<?php } ?>
    </body>
    <script src="<?php echo JS_PATH ?>/main.js"></script>
</html>
