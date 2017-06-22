<section class="counter text-center">
    <div class="container">
	<div class="row">
            <h1><?php echo $stitle['stitle_' . $_SESSION['dlang']] ?></h1>
            <div class="col-lg-1"></div>
	    <?php foreach($statics as $st){  $st = (array) $st?>
		<div class="col-lg-2">
		    <span class="count"><?php echo $st['st_number'] ?></span>
		    <p><?php echo $st['st_' . $_SESSION['dlang'] . '_text'] ?></p>
		</div>
	    <?php } ?>
            <div class="col-lg-1"></div>
	</div>
    </div>
</section>
