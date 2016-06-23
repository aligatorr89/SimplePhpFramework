
<div class="row content">

    <div class="col-sm-2 sidenav">

    </div>

    <div class="col-sm-8 text-left"> 
        <h1>Welcome</h1>
        <h3>Fill out the form </h3>

        <form role="form" method="post" action="<?php echo URL ?>register/run">
            <?php if (isset($_COOKIE['reg_email_error'])): ?>
                <div class="form-group has-error has-feedback">
                    <label for="email"> Email </label>  
                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" />
                    <span class="glyphicon glyphicon-remove form-control-feedback"> </span>
                    <span class="help-block"> <?php echo $_COOKIE['reg_email_error']; ?> </span>
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label for="email"> Email </label>  
                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" />
                </div>
            <?php endif; ?>



            <?php if (isset($_COOKIE['reg_pwd_exception'])): ?>
                <div class="form-group has-error has-feedback"> 
                    <label for="password"> Password </label>  
                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" />
                    <span class="glyphicon glyphicon-remove form-control-feedback"> </span>
                    <span class="help-block"> <?php echo $_COOKIE['reg_pwd_exception']; ?> </span>
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label for="password"> Password </label>  
                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" />
                </div>
            <?php endif; ?>
            <button type="submit" id="submit" class="btn btn-default"> Register </button>
        </form>
    </div>

    <div class="col-sm-2 sidenav">

    </div>

</div>