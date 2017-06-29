<?php
$ddlang = $this->dlang;
$arts = $this->arts;
$sec = $this->sec;
$max_pages = $this->max_pages;
$arts_count = $this->arts_count;
$pageTitle= $sec->sec_name;
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/mainnav.php'; ?>
<?php include 'includes/slider.php'; ?>
<?php include 'includes/secnav.php'; ?>
<section>
    <div class="sec-head">
	<div class="container text-center ">
            <img src="<?php echo strip_tags(stripslashes($sec->sec_logo)) ?>">
            <h1><?php echo strip_tags(stripslashes($sec->sec_name)) ?></h1>
	</div>
    </div>
    <div class="sec-header">
	<div class="container">
	    <div class="row">
		<?php foreach($arts as $art){ ?>
	            <div class="col-lg-3">
			<img src="<?php echo strip_tags(stripslashes($art->acl_img)) ?>">
			<h4><a href="<?php echo URL ?>/post&art=<?php echo $art->acl_id ?>"><?php echo strip_tags(stripslashes($art->acl_title)) ?></a></h4>
			<?php
			$content = strip_tags(html_entity_decode(stripslashes($art->acl_content)));
			$content = substr($content, 0, 40);
			?>
			<p><?php echo $content ?></p>
			<p><i class="fa fa-calendar"></i> <?php echo strip_tags(stripslashes($art->acl_date)) ?></p>
			<p><i class="fa fa-tag"></i><a href="<?php echo URL ?>/section&sec=<?php echo $sec->sec_id ?>"><?php echo strip_tags(stripslashes($sec->sec_name)) ?></a></p>
	            </div>
		<?php } ?>
	    </div>
	</div>
    </div>
    <div class="text-center pagenumber">
	<div class="row">
	        <?php
		$num_a_b = 4;
		if(isset($_GET['p']) && $_GET['p'] != '1'){
		    echo "<a href='?p=". 1 ."'> <i class='fa fa-angle-double-left' aria-hidden='true'></i> </a>"; // first button , you can style it
		}
		if(isset($_GET['p'])){
		    echo "<a href='?p=". (intval($_GET['p']) - 1) ."'> <i class='fa fa-angle-left' aria-hidden='true'></i> </a>"; // previuos button , you can style it
		}
		if(isset($_GET['p'])){
		    $_GET['p'] = intval($_GET['p']);
		    if($_GET['p'] >= $max_pages){
			for($p = $max_pages - $num_a_b ; $p <= $max_pages; $p++){
			    if($p < 1) continue;
			    if($_GET['p'] != $p){
				echo "<a href='?p={$p}'> {$p} </a>";
			    }else{
				echo "<a>".$p. "</a>"; // this is current page
			    }
			    if($p > $max_pages) break;
			}
		    }elseif($_GET['p'] > 2){
			for($p = $_GET['p'] - 2 ; $p <= $_GET['p'] + $num_a_b - 2; $p++){
			    if($p < 1) continue;
			    if($_GET['p'] != $p){
				echo "<a href='?p={$p}'> {$p} </a>";
			    }else{
				echo "<a>".$p. "</a>"; // this is current page also
			    }
			    if($p > $max_pages) break;
			}
		    }
		    else{
			for($p = $_GET['p'] ; $p <= $_GET['p'] + $num_a_b; $p++){
			    if($_GET['p'] != $p){
				echo "<a href='?p={$p}'> {$p} </a>";
			    }else{
				echo "<a>".$p. "</a>"; // this is current page also
			    }
			    if($p > $max_pages) break;
			}
		    }
		}else{
		    for($p = 1 ; $p <= $num_a_b; $p++){
			if($p > $max_pages) break;
			if($p != 1){
			    echo "<a href='?p={$p}'> {$p} </a>";
			}else{
			    echo $p; // this is current page also
			}
		    }
		}
		if(isset($_GET['p']) && $_GET['p'] == $max_pages){
		    echo '';
		}
		elseif(isset($_GET['p']) && (intval($_GET['p']) + 1) < $max_pages){
		    echo "<a href='?p=". (intval($_GET['p']) + 1) ."'> <a href='?p=" . (1 + 1) ."'> <i class='fa fa-angle-right' aria-hidden='true'></i> </a> </a>";
		}elseif(isset($_GET['p']) && (intval($_GET['p']) + 1) < $max_pages){
		    echo "<a href='?p=" . (1 + 1) ."'> <i class='fa fa-angle-right' aria-hidden='true'></i> </a>"; // next button
		}
		if(isset($_GET['p']) && intval($_GET['p']) != $max_pages)
		    echo "<a href='?p=". $max_pages ."'> <i class='fa fa-angle-double-right' aria-hidden='true'></i> </a>"; // first button , you can style it
		?>
	</div>
    </div>	        
</section>

<?php include 'includes/subscribe.php'; ?>		
<?php include 'includes/footer.php'; ?>	
