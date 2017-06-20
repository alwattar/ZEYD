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
    <div>
        <div class="sidebar">
            <div></div>
            <div></div>
            <div id="side-div">
               <h2>ZEYD.ORG</h2>
               <img src="<?php echo PUBLIC_PATH ?>/img/logo/logozaid.png">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/new-article">New Article</a>
                    </li>

                    <li><i class="fa fa-sitemap" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/new-section">New Section</a>
                    </li>

                    <li><i class="fa fa-pencil-square" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/manage-art">Manage Articles</a>
                    </li>

		    <li><i class="fa fa-pencil-square" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/manage-statics">Manage ZEYD Statics</a>
                    </li>

                    <li><i class="fa fa-user-plus" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/new-user">Create New User</a>
                    </li>

                    <li><i class="fa fa-users" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/manage-users">Manage Users</a>
                    </li>

                    <li><i class="fa fa-power-off" aria-hidden="true"></i>
                        <a href="<?php echo ADMIN_PATH ?>/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
