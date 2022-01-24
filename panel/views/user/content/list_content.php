<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kullanıcılar
            <small>Kullanıcılarınızı Buradan Girebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Kullanıcılar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Kullanıcı Bilgileriniz</h3>
                                <a href="user.php?p=add" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Ekle</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Kullanıcı Adı</th>
                                    <th class="text-center">E-posta</th>
                                    <th class="text-center">Rolü</th>
                                    <th class="text-center">isActive</th>
                                    <th class="text-center">İşlemler</th>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($users as $user) { ?>

                                            <tr>
                                                <td width="50" class="text-center"><?php echo $user->id; ?></td>
                                                <td class="text-center"><?php echo $user->full_name; ?></td>
                                                <td class="text-center"><?php echo $user->email; ?></td>
                                                <td class="text-center"><?php echo $user->sbox; ?></td>
                                                
                                                <td width="100" class="text-center">
                                                    <span class="label label-<?php echo ($user->isActive) ? "success" : "danger"; ?>">
                                                        <?php echo ($user->isActive) ? "Aktif" : "Pasif"; ?>
                                                    </span>
                                                </td>
                                                <td class="text-center" width="200">
                                                	<a href="user.php?p=log&id=<?php echo $user->id;?>" class="btn btn-success btn-sm">Log</a>
												<a href="user.php?p=delete&id=<?php echo $user->id; ?>" onclick="return confirm('Seçtiğiniz Kullanıcı Silinecektir ?');" class="btn btn-danger btn-sm">Sil</a>
                                                    <a href="user.php?p=updatePage&id=<?php echo $user->id;?>" class="btn btn-warning btn-sm">Düzenle</a>
                                                </td>
                                            </tr>


                                        <?php } ?>


                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
