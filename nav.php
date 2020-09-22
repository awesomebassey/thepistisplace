<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/icofont/icofont.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/css/bootstrap.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/css/main.css">
    <title>Messages | The Pistis Place</title>
</head>

<body>
    <div class="container-fluid">
        <header>
            <div class="float-left px-3 py-3">
                <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/images/Logo+Typo_Plum.png " alt="" width="250px">
            </div>
            <div class="menu float-right px-3 py-4">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/">Faith Talks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/">Contact</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="http://<?php echo $_SERVER['HTTP_HOST'] ?>/search">
                        <input name="q"  class="form-control mr-sm-2 search-box" type="search" placeholder="Search..."
                            aria-label="Search" value="<?php if(isset($_GET['q'])){echo $_GET['q'];} ?>">
                        <i class="icofont-search-2"></i>
                    </form>
                </ul>
            </div>
        </header>
        <div class="clearfix"></div>
        