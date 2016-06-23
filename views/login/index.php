<div class="row content">

    <div class="col-sm-2 sidenav">

    </div>

    <div class="col-sm-8 text-left"> 
        <h1>Welcome</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <hr>
        <h3>Test</h3>
        <p>Lorem ipsum...</p>
    </div>

    <div class="col-sm-2 sidenav">

        <form role="form" method="post" action="<?php echo URL ?>login/run">
            <?php if (isset($_COOKIE['error'])): ?>
                <div class="form-group has-error has-feedback">
                    <label for="email"> Email </label>  
                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" />
                    <span class="glyphicon glyphicon-remove form-control-feedback"> </span>
                    <span class="help-block"> <?php echo $_COOKIE['error']; ?> </span>
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label for="email"> Email </label>  
                    <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" />
                </div>
            <?php endif; ?>

            <?php if (isset($_COOKIE['exception'])): ?>
                <div class="form-group has-error has-feedback"> 
                    <label for="password"> Password </label>  
                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" />
                    <span class="glyphicon glyphicon-remove form-control-feedback"> </span>
                    <span class="help-block"> <?php echo $_COOKIE['exception']; ?> </span>
                </div>
            <?php else: ?>
                <div class="form-group">
                    <label for="password"> Password </label>  
                    <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" />
                </div>
            <?php endif; ?>
            <button type="submit" id="submit" class="btn btn-default"> Login </button>
        </form>
        <a href="<?php echo URL ?>register"> Dont have an account? Register! </a> 
    </div>

</div>