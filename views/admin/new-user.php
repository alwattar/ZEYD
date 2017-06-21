<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
 <div class="mainbar">
   <div class="mainbarcontainer">
                   <div class="row">
                       <form action="" method="post">
	    User Name : <input name="u-name" type="text"/><br/><br/>
	    User Nick ( to login) : <input name="u-nick" type="text"/><br/><br/>
	    User email : <input name="u-email" type="text"/><br/><br/>
	    User password : <input name="u-password" type="text"/><br/><br/>
	    User Type :
	    <select id="" name="u-type">
		<option value="2" selected>مراجع</option>
		<option value="1">مشرف</option>
		<option value="0">مدير</option>
	    </select>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    <br/>
	    <button>Go</button>
	</form>
                    
                   </div>
     </div>
</div>
	
    <?php include 'includes/footer.php'; ?> 
