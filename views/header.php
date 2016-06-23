<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="
              https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL ?>public/css/custom.css" /> 

        <script src="
                https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
        </script>
        <script src="
                http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
        <!--<script src='public/js/form.js'></script> -->
        <!--<script src="views/main/js/main.js"></script>-->
    </head>

    <body>

        <nav class="navbar navbar-inverse ">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar "></span>
                    </button>
                    <a class="navbar-brand" href=<?php echo URL ?>>Logo</a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">  
                        <?php if (Session::get('loggedIn')): ?>
                            <li>
                                <a href="<?php echo URL ?>main/logout" class="btn btn-inverse btn-lg">
                                    <span class="glyphicon glyphicon-log-out"></span> Log out
                                </a>
                            </li>
                        <?php else: ?>
                            <li><a href="<?php echo URL ?>register">
                                    <span class="glyphicon glyphicon-user"></span> Sign Up
                                </a>
                            </li>
                            <li><a href="<?php echo URL ?>login"> 
                                    <span class="glyphicon glyphicon-log-in"></span> Login
                                </a>
                            </li>
                            <?php Session::destroy(); ?>
                        <?php endif; ?>

                    </ul>

                </div>

            </div>
        </nav>

        <div class="container-fluid text-center">  

