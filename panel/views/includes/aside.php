<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION["user"]->full_name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
        </div>
        <!-- search form -->
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        	
			<li>
				<a href="overview.php">
					<i class="fa fa-users"></i>
					<span>Genel Bakış</span>
				</a>
			</li>
			<li class="treeview active">
			          <a href="#">
			            <i class="fa fa-th"></i>
			            <span>Kategori</span>
			            <span class="pull-right-container">
			              <i class="fa fa-angle-left pull-right"></i>
			            </span>
			          </a>
			          <ul class="treeview-menu">
			            <li><a href="category.php?p=ilist"><i class="fa fa-circle-o"></i> Gelir Ekle</a></li>
			            <li><a href="category.php?p=elist"><i class="fa fa-circle-o"></i> Gider Ekle</a></li>
						<li><a href="category.php"><i class="fa fa-circle-o"></i> Kategori Listesi</a></li>
			          </ul>
			</li>           
			<li class="treeview active">
			          <a href="#">
			            <i class="fa fa-th"></i>
			            <span>Hesap</span>
			            <span class="pull-right-container">
			              <i class="fa fa-angle-left pull-right"></i>
			            </span>
			          </a>
			          <ul class="treeview-menu">
			            <li><a href="account.php?p=alist"><i class="fa fa-circle-o"></i> Hesapları Görüntüle</a></li>
			            <li><a href="account.php"><i class="fa fa-circle-o"></i> Hesap Listesi</a></li>
			          </ul>
			</li>
            <li>
                <a href="post.php">
                    <i class="fa fa-pencil-square-o"></i> <span>Hareketler</span>
                </a>
            </li>			             
            <?if ($_SESSION["user"]->sbox=='Admin'){?>
 			
            <li>
                <a href="user.php">
                    <i class="fa fa-users"></i> <span>Kullanıcılar</span>
                </a>
            </li>
		
			
		
			
			
		  <?}?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>