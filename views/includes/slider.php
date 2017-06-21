
<section>
    
    <div id="iview" >
	<?php if($sliders === null){ ?>
	    <div class="slider-it" data-iview:image="<?php echo PUBLIC_PATH ?>/photos/photo1.JPG" data-iview:transition="slice-top-fade,slice-right-fade"></div>
	<?php }else{ ?>
	    <div class="slider-it" data-iview:image="<?php echo PUBLIC_PATH ?>/photos/photo1.JPG" data-iview:transition="slice-top-fade,slice-right-fade"></div>
	    <?php foreach($sliders as $slider){ ?>
		<div class="slider-it" data-iview:image="<?php echo $slider->sl_img ?>" data-iview:transition="slice-top-fade,slice-right-fade"></div>
	    <?php }
	    } ?>
    </div>
</section>

