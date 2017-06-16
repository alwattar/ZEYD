<?php

$ddlang = $this->dlang;
$sections = $this->sections;
$aos = $this->a_o_s;
$articles_num = 8; // maximum articles on each section in main page
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
	<section class="counter text-center">
            <div class="container">
		<div class="row">
                    <h1>إنجازات عام 2016</h1>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2"><span class="count">500</span>
			<p>عدد المشاريع المنفذة</p></div>
                    <div class="col-lg-2"><span class="count">1000</span>
			<p>عدد المستفيدين</p></div>
                    <div class="col-lg-2"><span class="count">60</span>
			<p>عدد المناطق المستفيدة</p></div>
                    <div class="col-lg-2"><span class="count">400</span>
			<p>دولار قيمة المشاريع</p></div>
                    <div class="col-lg-2 ">
			<span class="count">244004</span>
			<p>قطاعات مختلفة مجال العمل</p></div>
                    <div class="col-lg-1"></div>
		</div>
            </div>
	</section>
	<?php foreach($sections as $key => $sec){ ?>
	    <section class="sectionrow">
		<div class="container text-center">
		    <div class="row">
			<img src="<?php echo $sec->sec_logo ?>">
			<h2><?php echo strip_tags(stripslashes($sec->sec_name)) ?></h2>
			<?php
			$acls = $aos($sec->sec_id);
			?>
			<?php for($ac = 0; $ac < count($acls); $ac ++){
			    $art = $acls[$ac];
			?>
			    <div class="col-lg-3">
				<img src="<?php echo $art->acl_img ?>">
				<h4><?php echo stripslashes($art->acl_title) ?></h4> <!-- It must be كامل LOL -->
				<?php
				$content = strip_tags(html_entity_decode(stripslashes($art->acl_content)));
				$content = substr($content, 0, 40);
				?>
                                <p><?php echo $content ?></p>
				<p><i class="fa fa-calendar"></i><?php echo $art->acl_date ?></p>
				<p><i class="fa fa-tag"></i><a href="#"><?php echo $sec->sec_name ?></a></p>
			    </div>
			    <?php if($ac == $articles_num - 1) break; ?>
			<?php } ?>
			<span>--- المزيد ---</span>
		    </div>
	    </section>
	<?php } ?>
	<section class="subscribe text-center">
            <div class="container">
		<h1>للاشتراك في النشرة البريدية</h1>
		<input  type="text" placeholder="أدخل البريد الإلكتروني"><br>
		<button class="btn btn-lg btn-danger mt-md">اشتراك </button>
		
            </div>
	</section>
	<section class="socialpost">
	    <div class="container text-center">
		<div class="fb-page" data-href="https://www.facebook.com/zaid.institution" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                    <blockquote cite="https://www.facebook.com/zaid.institution" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zaid.institution"><?php echo $ddlang->orga ?>‎</a></blockquote>
		</div>
		<div class="tw-page">
                    <a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/ZaidInstitution">Tweets by ZaidInstitution</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	    </div>
            
	</section>
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
