
<div class="panel panel-info">
            <div class="panel-heading text-center"> <span class="glyphicon glyphicon-pencil"> </span> Notepad </div>
            <div class="panel-body">
                <div class="table-responsive">          
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Date </th>  
                                <th>Content</th>
                            </tr>
                        </thead>
                        <tbody id="tabledata">
                            

                        </tbody>
                    </table>

                    <form id="insert" class="form" method="post" action="<?php echo URL; ?>notepad/addnote">
                        <div class="form-group has-feedback">
                            <input class="form-control" type="text" name="note" placeholder="Add note" />
                            <span class="glyphicon glyphicon-pencil form-control-feedback"> </span>
                            <button class="btn btn-info btn-lg" type="submit"> Add note </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>