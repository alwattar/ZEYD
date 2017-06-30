<?php 
?>
<section class="secnav text-center">
    <nav>
	<ul>
	    <?php foreach($this->sections as $sect){
if($sect->sec_id == 1) continue;
?>
		<a data-value="section_<?php echo stripslashes(strip_tags($sect->sec_id)) ?>" href="#"><li><?php
													   $sect = (array) $sect;
													   echo strip_tags(stripslashes($sect['sec_name_' . $_SESSION['dlang']]));
													   $sect = (object) $sect;
													   ?></li></a>
	    <?php } ?>
	</ul>
    </nav>
</section>
s
