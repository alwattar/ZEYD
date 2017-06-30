<?php $ddlang = $this->dlang; ?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title><?php echo $pageTitle ; ?> - <?php echo $this->dlang->siteName ; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php echo PUBLIC_PATH ?>/img/logo/logo_thumb.png" >
	<link rel="shortcut icon" href="<?php echo PUBLIC_PATH ?>/img/logo/logo_thumb.png" type="image/png">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/animate.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/iview.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/style.css">
	<meta property="og:title" content="<?php echo $pageTitle ; ?> - <?php echo $this->dlang->siteName ; ?>"/>
	<meta property="og:url" content="<?php echo URL_HTTP ?><?php echo  $_SERVER['REQUEST_URI'] ?>" />
	<meta property="og:description" content=""/>
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
