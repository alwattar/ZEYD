<?php
$articles = $this->articles;
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
    <div class="mainbar">
   <div class="mainbarcontainer">
                   <div class="row">
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
                    
                   </div>
     </div>
</div>    
	
    
<?php include 'includes/footer.php'; ?>    
