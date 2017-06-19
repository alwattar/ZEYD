<?php
$ddlang = $this->dlang;
$sec = $this->sec;
$arts = $this->arts;
$max_pages = $this->max_pages;
$arts_count = $this->arts_count;
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Start</title>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/animate.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/iview.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/style.css">
    </head>

    <body>
	<div id="fb-root"></div>
        <script>(function(d, s, id) {
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) return;
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
	     fjs.parentNode.insertBefore(js, fjs);
	 }(document, 'script', 'facebook-jssdk'));</script>
	<section class="searchanddate">
            <div class="container">
		<div class="row">
                    <div class="col-lg-3">
			<span><i class="fa fa-phone"></i> +902125331960</span> | <a href="mailto:info@zaidorg.net?Subject=Hello">info@zaidorg.net</a>
                    </div>
                    <div class="col-lg-5">

                    </div>
                    <div class="col-lg-4">
			
			&nbsp;&nbsp;
			<a>
                            <?php echo $this->ArabicDay(); ?>
			</a>
			<span>
                            <?php echo $this->ArabicDate(); ?>
			</span>
			<input type="text" placeholder="بحث" />
                    </div>
		</div>
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
                    <li>الرئيسية</li>
                    <li>البحث</li>
                    <li>حول المؤسسة</li>
                    <li>تواصل معنا</li>
		</ul>
            </nav>
	</section>
	<section>
	    
	    <div id="iview" >
		<div class="slider-it" data-iview:image="<?php echo PUBLIC_PATH ?>/photos/photo1.JPG" data-iview:transition="slice-top-fade,slice-right-fade">
		    <div class="iview-caption caption1" data-x="70%" data-y="80%" data-transition="wipeLeft">
			بين
		    </div>
		    <div class="iview-caption caption1" data-x="66%" data-y="80%" data-transition="wipeLeft">
			دمار
		    </div>
		    <div class="iview-caption caption1" data-x="61%" data-y="80%" data-transition="wipeLeft">
			الحرب
		    </div>
		    <div class="iview-caption caption1" data-x="55%" data-y="80%" data-transition="wipeLeft">
			و تحدي
		    </div>
		    <div class="iview-caption caption1" data-x="50%" data-y="80%" data-transition="wipeLeft">
			الحياة
		    </div>
		    <div class="iview-caption caption1" data-x="40%" data-y="80%" data-transition="wipeRight">
			مستقبل
		    </div>
		    <div class="iview-caption caption1" data-x="35%" data-y="80%" data-transition="wipeRight">
			مشرق
		    </div>
		    <div class="iview-caption caption1" data-x="32%" data-y="80%" data-transition="wipeRight">
			بين
		    </div>
		    <div class="iview-caption caption1" data-x="27.5%" data-y="80%" data-transition="wipeRight">
			يديك
		    </div>
		    
		</div>
		<div class="slider-it" data-iview:image="<?php echo PUBLIC_PATH ?>/photos/photo2.JPG" data-iview:transition="slice-top-fade,slice-right-fade">
		    <div class="iview-caption caption1" data-x="45%" data-y="70%" data-transition="wipeDown">نص تجريبي </div>
		    <div class="iview-caption caption1" data-x="25%" data-y="80%" data-transition="wipeUp">نص تجريبي</div>
		</div>
		<div class="slider-it" data-iview:image="<?php echo PUBLIC_PATH ?>/photos/photo3.JPG" data-iview:transition="slice-top-fade,slice-right-fade">
		    <div class="iview-caption caption1" data-x="25%" data-y="80%" data-transition="wipeDown">نص تجريبي</div>
		</div>
	    </div>
	</section>
	<section class="secnav text-center">
            <nav>
		<ul>
                    <li>القسم التعليمي</li>
                    <li>القسم الخدمي</li>
                    <li>قسم الأسرة </li>
                    <li>القسم الدعوي</li>
                    <li>قسم المشاريع</li>
		</ul>
            </nav>
	</section>
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
				<?php
				$num_a_b = 4;
				if(isset($_GET['p']) && $_GET['p'] != '1'){
				    echo "<a href='?p=". 1 ."'> First Page </a>"; // first button , you can style it
				}
				if(isset($_GET['p'])){
				    echo "<a href='?p=". (intval($_GET['p']) - 1) ."'> Previus </a>"; // previuos button , you can style it
				}
				if(isset($_GET['p'])){
				    $_GET['p'] = intval($_GET['p']);
				    if($_GET['p'] >= $max_pages){
					for($p = $max_pages - $num_a_b ; $p <= $max_pages; $p++){
					    if($p < 1) continue;
					    if($_GET['p'] != $p){
						echo "<a href='?p={$p}'> {$p} </a>";
					    }else{
						echo $p; // this is current page
					    }
					    if($p > $max_pages) break;
					}
				    }elseif($_GET['p'] > 2){
					for($p = $_GET['p'] - 2 ; $p <= $_GET['p'] + $num_a_b - 2; $p++){
					    if($p < 1) continue;
					    if($_GET['p'] != $p){
						echo "<a href='?p={$p}'> {$p} </a>";
					    }else{
						echo $p; // this is current page also
					    }
					    if($p > $max_pages) break;
					}
				    }
				    else{
					for($p = $_GET['p'] ; $p <= $_GET['p'] + $num_a_b; $p++){
					    if($_GET['p'] != $p){
						echo "<a href='?p={$p}'> {$p} </a>";
					    }else{
						echo $p; // this is current page also
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
				    echo "<a href='?p=". (intval($_GET['p']) + 1) ."'> Next </a>";
				}elseif(isset($_GET['p']) && (intval($_GET['p']) + 1) < $max_pages){
				    echo "<a href='?p=" . (1 + 1) ."'> Next </a>"; // next button
				}
				if(isset($_GET['p']) && intval($_GET['p']) != $max_pages)
				    echo "<a href='?p=". $max_pages ."'> Last Page </a>"; // first button , you can style it
				?>
		<br/>
		<!-- <div class="row">
                    <ul>
			<li><i class="fa fa-angle-double-left" aria-hidden="true"></i></li>
			<li><i class="fa fa-angle-left" aria-hidden="true"></i></li>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
			<li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
			
                    </ul> -->
		</div>	        
	    </div>
	</section>

	<section class="subscribe text-center">
            <div class="container">
		<h1>للاشتراك في النشرة البريدية</h1>
		<input  type="text" placeholder="أدخل البريد الإلكتروني"><br>
		<button class="btn btn-lg btn-danger mt-md">اشتراك </button>
		
            </div>
	</section>
	<section class="hidden-xs">
	    <div class="container ftfooter text-center">
		<div class="fb-page" data-href="https://www.facebook.com/zaid.institution" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                    <blockquote cite="https://www.facebook.com/zaid.institution" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zaid.institution"><?php echo $ddlang->orga ?>‎</a></blockquote>
		</div>
		<div class="tw-page">
                    <a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/ZaidInstitution">Tweets by ZaidInstitution</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	    </div>
	</section>
	<footer class="hidden-xs">
            <div class="container ">
		<div class="row ">
		    <div class="col-md-4 pull-right col-xs-12">
			<div class="footer-social">
			    <h3>follow us </h3>
			    <ul class="list-inline">
				<li><i class="fa fa-facebook" aria-hidden="true"></i></li>
				<li><i class="fa fa-twitter" aria-hidden="true"></i></li>
				<li><i class="fa fa-instagram" aria-hidden="true"></i></li>
				<li><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
				<li><i class="fa fa-youtube" aria-hidden="true"></i></li>
			    </ul>
			</div>
			<div class="contact-us">
			    <h3>contact_us </h3>
			    <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>address </p>
			    <p><span><i class="fa fa-phone" aria-hidden="true"></i></span> phones </p>
			    <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span>our_email <span class="zaidemail">INFO@ZEYD.ORG</span></p>
			</div>
		    </div>
		    <div class="col-md-4 col-xs-12 text-center pull-right zlfooter">
			<img src="<?php echo PUBLIC_PATH ?>/img/logo/logozaid.png"/>
			<div>
			    <p>
				under_logo 
			    </p>
			</div>
		    </div>
		    <div class="col-md-4 col-xs-12 pull-right">
			<h3>to_donate </h3>
			<div class="donatebankdiv">
			    <h5>orga_bank_acc <span> Vakıf Katılım</span></h5>
			    <h5>acc_owner <span> ZEYD BİN SABİT YARDIMLAŞMA</span></h5>
			    <div class="donatebank">
				<img src="<?php echo PUBLIC_PATH ?>/img/logo/v.png" />
				<p>
				    TR83 0021 0000 0000 2797 7000 01 TL<br />
				    TR02 0021 0000 0000 2797 7001 01 $<br />
				    TR72 0021 0000 0000 2797 7001 02 EU
				</p>
			    </div>
			    <div class="clearfix"></div>
			    <h6>swift_code<span> VAKFRISXXX</span></h6>
			</div>
			<br />
			<div class="donatebankdiv">
			    <h5>orga_bank_acc <span> ALBARAKA</span></h5>
			    <h5>acc_owner<span> ZEYD BİN SABİT YARDIMLAŞMA DERNĞİ</span></h5>
			    <div class="donatebank">
				<img src="<?php echo PUBLIC_PATH ?>/img/logo/b.png" />
				<p>
				    TR67 0020 3000 0366 3064 0000 01 TL<br />
				    TR40 0020 3000 0366 3064 0000 02 $<br />
				    TR13 0020 3000 0366 3064 0000 03 EU
				</p>
			    </div>
			    <div class="clearfix"></div>
			    <h6>swift_code<span> BTFHTRISXXX</span></h6>
			</div>
		    </div>
		</div>
		<div class="text-center copyrightfooter">
		    ZEYD BİN SABİT DERNĞİ <span style="color:#828282;">© 2012 -  <?php echo date("Y"); ?></span>
		</div>
            </div>
            
            
	</footer>
	
	
	<script src="<?php echo JS_PATH ?>/jquery-1.12.4.min.js"></script>
	<script src="<?php echo JS_PATH ?>/bootstrap.min.js"></script>
	<script src="<?php echo JS_PATH ?>/npm.js"></script>
	<script src="<?php echo JS_PATH ?>/wow.min.js"></script>
	<script src="<?php echo JS_PATH ?>/main.js"></script>
	<script src="<?php echo JS_PATH ?>/raphael-min.js"></script>
	<script src="<?php echo JS_PATH ?>/jquery-1.7.1.min.js"></script>
	
        <script src="<?php echo JS_PATH ?>/jquery.easing.js"></script>
        <script src="<?php echo JS_PATH ?>/iview.js"></script>
        <script>
	 $(document).ready(function(){
	     $('#iview').iView({
		 pauseTime: 3500,
		 directionNav: false,
		 controlNav: false,
		 tooltipY: -15
	     });
	 });
         
        </script>
	
    </body>

</html>
