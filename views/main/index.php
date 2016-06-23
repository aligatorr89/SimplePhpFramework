<div class="row content">

    <div class="col-sm-2 sidenav">
        <?php require 'views/left.php'; ?>
    </div>

    <div class="col-sm-8 text-center"> 

        <h3 > Your apps </h3> 
        <div class="well well-lg">
            <a href="<?php echo URL ?>main/notepad" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-pencil"> Notepad</span> 
            </a>
        </div>
        <div class="well well-lg">
            <a href="<?php echo URL ?>notepad" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-pencil"> Notepad</span> 
            </a>
        </div>
    </div>

    <div class="col-sm-2 sidenav">
        <?php require 'views/right.php'; ?>

    </div>

</div>