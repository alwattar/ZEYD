
<section class="searchanddate">
    <div class="container">
	<form action="<?php echo URL ?>/search" method="get">
        <div class="row">
            <div class="col-lg-3">
		<span><i class="fa fa-phone"></i> +902125331960</span> | <a href="mailto:info@zaidorg.net?Subject=Hello">info@zaidorg.net</a>
            </div>
            <div class="col-lg-5">

            </div>
            <div class="col-lg-4">
		
		
		<a>
                    <?php
		    if($_SESSION['dlang'] == 'ar'){
			echo $this->ArabicDay();
			echo $this->ArabicDate();
		    }else{
			echo date('D\ d, M m\, Y');
		    }
		    ?>
		</a>
		    <input type="text" placeholder="<?php echo $ddlang->gn_search; ?> " name="q"/>
		</form>
            </div>
	</div>
	<?php
	$langs = explode(',', ALL_LANG);
	foreach($langs as $lang){ ?>
	    <a href="<?php $this->langToGet($lang) ?>"><?php echo $lang ?></a>
	<?php } ?>
    </div>
</section>
<section class="logo">
    <div class="container text-center">
	<img src="<?php echo PUBLIC_PATH ?>/img/270x132-logo.png">    
    </div>
</section>
<section class="mainnav text-center">
    <nav>
	<ul>
            <a href="index"><li><?php echo $ddlang->mnHome; ?></li></a>
            <a href="search"><li><?php echo $ddlang->mnSearch; ?></li></a>
            <a href="about"><li><?php echo $ddlang->mnAbout; ?></li></a>
            <a href="contactus"><li><?php echo $ddlang->mnContact; ?></li></a>
	</ul>
    </nav>
</section>
