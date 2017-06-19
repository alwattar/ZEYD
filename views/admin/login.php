<!doctype html>
<html lang="en">
    <head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/animate.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/iview.css">
	<link rel="stylesheet" href="<?php echo CSS_PATH ?>/style.css">
    </head>
    <body>
	<section class="login-form">
	    <div class="container">
	        <form action="" method="post" autocomplete="off">
                <h2>تسجيل الدخول</h2>
	            <input name="username" type="text" placeholder="اسم المستخدم" autocomplete="off" /><br/>
	            <input name="password" type="password" placeholder="كلمة المرور"/><br/>
	            <input name="_token" type="hidden" value="<?php echo $this->_token ?>"/>
	            <button>تسجيل الدخول</button>
	        </form>
	    </div>
	</section>
    </body>
</html>
