<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<div class="mainbar">
    <div class="mainbarcontainer">
        <div class="row">
            <form  method="post">
		<?php foreach($this->statics as $st){ ?>
		    <p>Static <?php echo $st->st_id ?></p>
		    AR : <input name="st_<?php echo $st->st_id ?>_ar" type="text" value="<?php echo $st->st_ar_text ?>"/>
		    <br/>
		    EN : <input name="st_<?php echo $st->st_id ?>_en" type="text" value="<?php echo $st->st_en_text ?>"/>
		    <br/>
		    TR : <input name="st_<?php echo $st->st_id ?>_tr" type="text" value="<?php echo $st->st_tr_text ?>"/>
		    <br/>
		    Number : <input name="num_<?php echo $st->st_id ?>" type="text" value="<?php echo $st->st_number ?>"/>
		    <br/>
		    ==========
		    <br/>
		<?php } ?>
		<input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
		<h4>Statics Title AR : <input name="stitle_ar" size="48" type="text" value="<?php echo stripslashes(strip_tags($this->stitle->stitle_ar)) ?>"/></h4>
		<h4>Statics Title EN : <input name="stitle_en" size="48" type="text" value="<?php echo stripslashes(strip_tags($this->stitle->stitle_en)) ?>"/></h4>
		<h4>Statics Title TR : <input name="stitle_tr" size="48" type="text" value="<?php echo stripslashes(strip_tags($this->stitle->stitle_tr)) ?>"/></h4>
		<button>Save</button>
	    </form>
            
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>   
