<div id="top">
    <!-- .navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">


            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.blade.php" class="navbar-brand"><img
                            src="img/logo.png"
                            alt=""></a>

            </header>


            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <!-- .nav -->
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('createTicket')  }}">Create ticket</a></li>


                </ul>
                <!-- /.nav -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- /.navbar -->
    <header class="head">
        <div class="search-bar">
            <form class="main-search" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Live Search ...">
                    <span class="input-group-btn">
                                                <button class="btn btn-primary btn-sm text-muted" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                </div>
            </form>
            <!-- /.main-search -->                                </div>
        <!-- /.search-bar -->
        <div class="main-bar">
            <h3>
                <i class="fa fa-dashboard"></i>&nbsp;
                Dashboard
            </h3>
        </div>
        <!-- /.main-bar -->
    </header>
    <!-- /.head -->
</div>
<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper bg-dark" style="    height: 100px;">
            <a class="user-link" href="">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="img/user.gif">

            </a>

            <div class="media-body">
                <h5 class="media-heading">Archie</h5>
                <ul class="list-unstyled user-info">
                    <li><a href="">{{ $user->name }}</a></li>
                </ul>
            </div>

        </div>
        <ul id="menu" class="bg-blue dker">
            <li class="nav-header">Menu</li>
            <li>
                <a href="{{ route('inbox') }}">
                    <i class="fa fa-font"></i>
                    <span class="link-title">inbox</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- #menu -->

    <!-- /#menu -->
</div>