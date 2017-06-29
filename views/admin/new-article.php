<?php
$sections = $this->sections;
?>
<?php include'includes/header.php'; ?>
<div class="adminpanel">
<?php include'includes/sidebar.php'; ?>
        <div class="mainbar">
               <div class="mainbarcontainer">
                   <div class="row">
                       
                        <form action="" method="post">
                            <div>
                                <span><i class="fa fa-newspaper-o" aria-hidden="true"></i></span><h2>New Artical</h2>
                            </div>
                            
                             
                            <select name="acl-section">
				<option value="">Article Section</option>
				<?php foreach($sections as $sec){ ?>
                                <option value="<?php echo $sec->sec_id ?>"><?php echo strip_tags(stripslashes($sec->sec_name_ar)) ?> - <?php echo strip_tags(stripslashes($sec->sec_name_en)) ?> - <?php echo strip_tags(stripslashes($sec->sec_name_tr)) ?></option>
                            <?php } ?>
                            </select>
                            <a href="<?php echo ADMIN_PATH ?>/new-section">Create New Section</a><br/>
                             <input type="text" name="acl-title" placeholder="Title" /><br/>
                            <input maxlength="2" name="acl-lang" placeholder="Language ar, tr, en" /><br/>
                            <input class="ui-datepicker" type="" name="acl-date" placeholder="Date" /><br/>
                             <input type="text" size="48" name="acl-image" id="acl-image" placeholder="Article image" /> <span onclick="finderPopup('acl-image')">Select Image</span><br/><br/>
                            <textarea class="ckeditor" name="acl-content" id="ckeditor" rows="" cols="" tabindex=""></textarea>
                            <button>Save</button>
                            <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
                            <br><br>
                        </form>
                                     </div> </div>
        </div>
</div>
    <?php include 'includes/footer.php'; ?>
