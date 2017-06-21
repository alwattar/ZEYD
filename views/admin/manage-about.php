<?php 
$about = (array) $this->about;
?>
<?php include'includes/header.php'; ?>
<div class="adminpanel">
<?php include'includes/sidebar.php'; ?>
        <div class="mainbar">
               <div class="mainbarcontainer">
                   <div class="row">
                       <form method="GET">
			   <h2>
			       <?php echo strtoupper($this->ab_lang) ?> Content
			   </h2>
			   <select id="" name="ab_lang">
			       <option value="AR"> Arabic </option>
			       <option value="EN"> English </option>
			       <option value="TR"> Turkish </option>
			   </select>
			   <button>Change</button>
		       </form>
                       <form action="" method="post">
                           <div>
                               <span><i class="fa fa-newspaper-o" aria-hidden="true"></i></span><h2>About Cont</h2>
                           </div>
                            <textarea class="ckeditor" name="about-content" id="ckeditor"><?php echo $about['ab_' . $this->ab_lang . '_content'] ?></textarea>
                            <button>Save</button>
                            <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
                            <input name="the_lang" type="hidden" value="<?php echo $this->ab_lang ?>"/>
                            <br><br>
                        </form>
                                     </div> </div>
        </div>
</div>
    <?php include 'includes/footer.php'; ?>
