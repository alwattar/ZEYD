<?php
$pageTitle = $this->dlang->HomePage;
$statics = $this->statics;
$sections = (array) $this->sections;
$aos = $this->a_o_s;
$articles_num = 8; // maximum articles on each section in main page
$stitle = (array) $this->stitle;
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/mainnav.php'; ?>
<?php include 'includes/slider.php'; ?>
<?php include 'includes/secnav.php'; ?>	
<?php include 'includes/statics.php'; ?>	

<?php foreach($sections as $key => $sec){
    if($key == 0) continue; // remove this line if you want show home section
?>
    
    <section class="sectionrow">
	<div class="container text-center">
	    <div class="row">
		<img src="<?php echo $sec->sec_logo ?>">
		<h2 id="section_<?php echo strip_tags(stripslashes($sec->sec_id)) ?>"><?php
										      $sec = (array) $sec;
										      echo strip_tags(stripslashes($sec['sec_name_' . $_SESSION['dlang']]));
										      $sec = (object) $sec;
										      ?></h2>
		<?php
		$acls = $aos($sec->sec_id);
		?>
		<?php for($ac = 0; $ac < count($acls); $ac ++){
			$art = $acls[$ac];
		?>
		    <div class="col-lg-3">
			<img src="<?php echo $art->acl_img ?>">
			<h4><a href="<?php echo URL ?>/post&art=<?php echo $art->acl_id ?>"><?php echo stripslashes($art->acl_title) ?></a></h4> <!-- It must be كامل LOL -->
			<?php
			$content = strip_tags(html_entity_decode(stripslashes($art->acl_content)));
			$content = mb_substr($content, 0, 40, "utf-8");
			?>
                        <p><?php echo $content ?></p>
			<p><i class="fa fa-calendar"></i><?php echo $art->acl_date ?></p>
			<p><i class="fa fa-tag"></i><a href="<?php echo URL ?>/section&sec=<?php echo $sec->sec_id ?>"><?php
														       $sec = (array) $sec;
														       echo strip_tags(stripslashes($sec['sec_name_' . $_SESSION['dlang']]));
														       $sec = (object) $sec;
														       ?></a></p>
		    </div>
		    <?php if($ac == $articles_num - 1) break; ?>
		<?php } ?>
		
	    </div>
	    <span><a href="<?php echo URL ?>/section&sec=<?php echo $sec->sec_id ?>">--- <?php echo $ddlang->gn_more ; ?> ---</a></span>
	</div>
    </section>
<?php } ?>
<?php include 'includes/subscribe.php'; ?>		
<?php include 'includes/footer.php'; ?>	
