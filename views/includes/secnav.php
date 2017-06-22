<?php 
?>
<section class="secnav text-center">
    <nav>
	<ul>
	    <?php foreach($this->sections as $sec){ ?>
		<a data-value="section_<?php echo stripslashes(strip_tags($sec->sec_id)) ?>" href="#"><li><?php echo stripslashes(strip_tags($sec->sec_name)) ?></li></a>
	    <?php } ?>
	</ul>
    </nav>
</section>
s
