<?php 
$art = $this->art;

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
	
	
	<section class="aritcal-post">    
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo strip_tags(stripslashes($art->sec_name)) ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
           <div class="row">
               <h2><?php echo strip_tags(stripslashes($art->acl_title)) ?></h2>
               <p><i class="fa fa-calendar"></i> <?php echo strip_tags(stripslashes($art->acl_date)) ?></p>
               <p><i class="fa fa-tag"></i><a href="#"><?php echo strip_tags(stripslashes($art->sec_name)) ?></a></p>
           </div>
        </div>
        <div class="container">
            <div class="row">
		<?php echo html_entity_decode(stripslashes($art->acl_content)) ?>
           </div>
        </div>
        <hr>
        <div class="container">
           <div class="row">
               <div class="col-md-3">
		   المشاهدات : <?php echo $art->acl_views ?>
               </div>
               <div class="col-md-6"> </div>
               <div class="col-md-3">مشاركة تويتر</div>
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
