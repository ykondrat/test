<?php
    require_once (ROOT.'/views/viewHeader.php');
    $session = Session::getInstance();
?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">BeeJee Test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://ykondrat-001-site1.1tempurl.com/test/">Task List</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://ykondrat-001-site1.1tempurl.com/test/editor">Editor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="user-name-nav"><?php echo $session->logged_user ?></a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <?php if ($session->logged_user) {?>
                    <a href="http://ykondrat-001-site1.1tempurl.com/test/auth-logout" class="btn btn-outline-danger my-2 my-sm-0" id="logout">Logout</a>
                <?php } else {?>
                    <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#login-modal">Login</button>
                    <button type="button" class="btn btn-outline-primary my-2 my-sm-0" style="margin-left: 10px" data-toggle="modal" data-target="#reg-modal">Registration</button>
                <?php }?>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginmodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginmodallabel">Login form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="signin-err">

                    </div>
                    <div class="group-form">
                        <input type="text" name="name" id="signin-name" placeholder="User name">
                    </div>
                    <div class="group-form">
                        <input type="password" name="password" id="signin-password" placeholder="User password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-signin">Log In</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reg-modal" tabindex="-1" role="dialog" aria-labelledby="regmodallabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="regmodallabel">Registration form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="signup-err">

                    </div>
                    <div class="group-form">
                        <input type="text" name="name" id="signup-name" placeholder="User name">
                    </div>
                    <div class="group-form">
                        <input type="email" name="email" id="signup-email" placeholder="User email">
                    </div>
                    <div class="group-form">
                        <input type="password" name="password" id="signup-password" placeholder="User password">
                    </div>
                    <div class="group-form">
                        <input type="password" name="repeat-password" id="signup-rep-password" placeholder="Repeat password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-signup">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container" style="margin-top: 20px">
            <div class="sort-module text-center">
                <button class="btn btn-info btn-sort-name">sort by name</button>
                <button class="btn btn-info btn-sort-email">sort by email</button>
                <button class="btn btn-info btn-sort-done">sort by done</button>
            </div>
            <div class="task-list">

            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pag-btn">
                <button class="btn prev"><i class="fa fa-chevron-left" aria-hidden="true"></i> Prev</button>
                <button class="btn next">Next <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
<?php
    require_once (ROOT.'/views/viewFooter.php');
?>
