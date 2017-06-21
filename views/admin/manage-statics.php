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
	    <button>Save</button>
	</form>
                    
                   </div>
     </div>
</div>
	
    
<?php include 'includes/footer.php'; ?>   