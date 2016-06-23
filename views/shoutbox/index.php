<div class="row content">

    <div class="col-sm-2 sidenav">
        <?php require 'views/left.php'; ?>
    </div>

    <div id='frame' class="col-sm-8 text-left">
        <div class="panel panel-info">
            <div class="panel-heading text-center"> <span class="glyphicon glyphicon-user"> </span> Shoutbox </div>
            <div class="panel-body"> 
            </div>
        </div>
        
        <div class="table-responsive" id="table">    
            <table class="table table-hover" >
                <thead>
                    <tr> 
                        <th class="col-sm-3"> Friend </th>
                        <th class="col-sm-8"> Shout </th> <th class="col-sm-1"> Delete </th>
                    </tr>
                </thead>
                <tbody id="here">

                </tbody>
            </table>
       </div>   
        
        <form id="shoutForm" class="form" method="post" action="<?php echo URL; ?>shoutbox/addshout">
            <div class="form-group has-feedback">
                <input class="form-control" type="text" name="shout" placeholder="Say it" />
                <span class="glyphicon glyphicon-user form-control-feedback">  </span>
                <button class="btn btn-info btn-lg" type="submit"> Say it </button>
            </div>
        </form>

    </div>

    <div class="col-sm-2 sidenav">
        <?php require 'views/right.php'; ?>
    </div>
    <script src="<?php echo URL ?>views/shoutbox/js/shoutbox.js"></script>
</div>
