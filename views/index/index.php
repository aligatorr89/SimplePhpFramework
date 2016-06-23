
<div class="row content">
    <div class="col-sm-2 sidenav">

        <?php if (isset($_SESSION['login'])): ?>
            <?php require 'left.php'; ?>
        <?php endif; ?>

    </div>

    <div class="col-sm-8 text-left"> 
        <h1>Very simple PHP framework</h1>
        <p> This is my own PHP framework. It has the url parser so it automatically calls the right controllers.
            It also has a signup and login and some validation. It also has two simple apps: notepad and shoutbox. Just to try.</p>
        <hr>
        <h3>Test</h3>
        <p>Lorem ipsum...</p>
    </div>

    <div class="col-sm-2 sidenav">
        
        <?php if (isset($_SESSION['login'])): ?>
            <?php require 'right.php'; ?>
        <?php endif; ?>
    
    </div>

</div>
