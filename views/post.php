<?php 
$art = $this->art;
$pageTitle= $art->acl_title;
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/mainnav.php'; ?>
<section class="aritcal-post">    
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php
			$art = (array) $art;
			echo strip_tags(stripslashes($art['sec_name_' . $_SESSION['dlang']]));
			?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h2><?php echo strip_tags(stripslashes($art['acl_title'])) ?></h2>
            <p><i class="fa fa-calendar"></i> <?php echo strip_tags(stripslashes($art['acl_date'])) ?></p>
            <p><i class="fa fa-tag"></i><a href="<?php echo URL ?>/section&sec=<?php echo $art['acl_section'] ?>"> <?php echo strip_tags(stripslashes($art['sec_name_'. $_SESSION['dlang']])) ?></a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
	    <?php echo html_entity_decode(stripslashes(nl2br($art['acl_content']))) ?>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-3"> <i class="fa fa-eye" aria-hidden="true"></i>
		المشاهدات : 
		<span style="font-weight:bold"><?php echo $art['acl_views'] ?></span>
            </div>
            <div class="col-md-6"> </div>
            <div class="col-md-3">مشاركة</div>
	    <a target="_blank" href="https://twitter.com/home?status=<?php echo strip_tags(stripslashes($art['acl_title'])) ?> %0A%0A <?php echo URL_HTTP ?>/post%26art=<?php echo strip_tags(stripslashes($art['acl_id'])) ?>">Twitter</a>
	    <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo URL_HTTP ?>/post&art=<?php echo strip_tags(stripslashes($art['acl_id'])) ?>">Facebook</a>
	    <a target="_blank" href="http://plus.google.com/share?url=<?php echo URL_HTTP ?>/post&art=<?php echo strip_tags(stripslashes($art['acl_id'])) ?>">Google+</a>
	    <a target="_blank" href="http://linkedin.com/share?url=<?php echo URL_HTTP ?>/post&art=<?php echo strip_tags(stripslashes($art['acl_id'])) ?>">LinkedIn</a>
        </div>
        
    </div>
    
</section>
<br>
<?php include 'includes/subscribe.php'; ?>
<?php include 'includes/footer.php'; ?>
