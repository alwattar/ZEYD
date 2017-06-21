<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
	<div class="mainbar">
   <div class="mainbarcontainer">
                   <div class="row">
                       <form name="new-slider-form" name="new-slider" method="post"> <br/>
	    Slider Image : <input name="slider-img" id="new-slider-img" size="48" type="text" /> <span onclick="finderPopup('new-slider-img')">browse</span><br/>
	    Slider URL : <input name="slider-url" type="text" />
	    <input name="_token_new_slider" type="hidden" value="<?php echo $this->_token ?>"/>
	    <button>Go</button>
	</form>
	
	
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
		<button>Save</button> OR <a href="<?php echo ADMIN_PATH ?>/manage-sliders&del=<?php echo strip_tags(stripslashes($slider->sl_id)) ?>">Delete</a>
		<input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    </form>
	<?php } ?>
                    
                   </div>
     </div>
</div>
	
    <?php include 'includes/footer.php'; ?>    