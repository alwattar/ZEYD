<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<div class="mainbar">
   <div class="mainbarcontainer">
                   <div class="row">
                       <form action="" method="post">
	    
	    Section logo : <input name="sec-logo" id="sec-logo" size="48" type="text" value=""/> <span onclick="finderPopup('sec-logo')">Browse</span><br/><br/>
	    Section Name : <input name="sec-name" type="text" size="40" placeholder="Title"/><br/><br/>
	    <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	    <button>Go</button>
	</form>
                    
                   </div>
     </div>
</div>
	
   
<?php include 'includes/footer.php'; ?>    
