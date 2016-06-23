<div class="row content">

    <div class="col-sm-2 sidenav">
        <?php require 'views/left.php'; ?>
    </div>

    <div class="col-sm-8 text-left">
        <div class="panel panel-info">
            <div class="panel-heading text-center"> <span class="glyphicon glyphicon-pencil"> </span> Notepad </div>
            <div class="panel-body">
                <div class="table-responsive" id="table">          
                    <table class="table table-hover">
                        <thead>
                            <tr><th class="col-sm-1"> # </th> <th id="changeDate" class="col-sm-4"> Date </th> 
                                <th class="col-sm-6"> Note </th> <th class="col-sm-1"> Delete </th></tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <form id="insert" class="form" method="post" action="<?php echo URL; ?>notepad/addnote">
                        <div class="form-group has-feedback">
                            <input class="form-control" type="text" name="note" placeholder="Add note" />
                            <span class="glyphicon glyphicon-pencil form-control-feedback"> </span>
                            <button id="1" class="btn btn-info btn-lg" type="submit"> Add note </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-2 sidenav">
        <?php require 'views/right.php'; ?>

    </div>

</div>
<script src="<?php echo URL ?>views/notepad/js/notepad.js"></script>