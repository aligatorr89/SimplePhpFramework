

</tbody>
</table>

<form class="form" role="form" action="<?php echo URL ?>main/notepad/add" method="post">
    <div class="form-group has-feedback">
        <input class="form-control" type="text" name="note"/>
        <span class="glyphicon glyphicon-pencil form-control-feedback"> </span>
        <button type="submit" id="submit" class="btn btn-info btn-lg"> Add note </button>
        <button id='but' type="button" class="btn btn-info btn-lg" > Change date </button>
       

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
