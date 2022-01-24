<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F</b>AL</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Fal</b>Hesap</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Gezinmeyi Değiştir</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION["user"]->full_name ;?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $_SESSION["user"]->full_name ;?>
                                <small><?php echo $_SESSION["user"]->createdAt ;?>' den beri admin</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                                <div class="pull-left">
                                    <?if ($_SESSION["user"]->sbox=='Admin'){?>
                                <a href="user.php" class="btn btn-default btn-flat">Kullanıcılar</a>
                            </div>
                            <?}else{?>
                            <input type="hidden" name="user" value="0">
                            <?}?>
                            <div class="pull-right">
                                <a href="index.php?p=logout" class="btn btn-default btn-flat">Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>