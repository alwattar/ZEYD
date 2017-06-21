<?php include 'includes/header.php'; ?>
<?php include 'includes/mainnav.php'; ?>


<section class="aritcal-post">    
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>البحث</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" dir="rtl">
	    <form>
		<input name="q" type="text" placehodler="ابحث في الموقع"/>
		<button>بحث</button>
	    </form>
	    <?php if($this->results === null){ ?>
		No results
	    <?php }elseif($this->results === false){ ?>
		
	    <?php }else{ ?>
		<?php foreach($this->results as $res){ ?>
		    العنوان : <a href="<?php echo URL ?>/post&art=<?php echo strip_tags(stripslashes($res->acl_id)) ?>"><?php echo strip_tags(stripslashes($res->acl_title)) ?></a> نشر في <?php echo strip_tags(stripslashes($res->acl_date)) ?>
		    <br/>
		    --------------
		    <br/>
		<?php } ?>
	    <?php } ?>
        </div>
    </div>
    <hr>
</section>
<br>
<?php include 'includes/subscribe.php'; ?>
<?php include 'includes/footer.php'; ?>
