<?php 
$about = (array) $this->about;
$content = $about['ab_' . $_SESSION['dlang'] . '_content'];
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/mainnav.php'; ?>


<section class="aritcal-post">    
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
	    <?php echo html_entity_decode(stripslashes(nl2br($content))) ?>
        </div>
    </div>
    <hr>
</section>
<br>
<?php include 'includes/subscribe.php'; ?>
<?php include 'includes/footer.php'; ?>
