<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kullanıcı Logları
            <small>Kullanıcının Loglarını Buradan Girebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Loglar</li>
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
                                <h3 class="box-title">Kullanıcı Logları</h3>
                                <a href="user.php?p=add" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Ekle</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Kullanıcı Adı</th>
                                    <th class="text-center">Session ID</th>
                                    <th class="text-center">Giriş Tarihi</th>
                                    <th class="text-center">Çıkış Tarihi</th>
										<th class="text-center">İP Adresi</th>
                                    </thead>

                                    <tbody>
		
                                        <?php foreach ($logs as $log) {
                                        $login_date='';
                                        $logout_date='';
                                        if ($log->login_date<>''){
											$login_date=date_format(date_create($log->login_date),'d/m/Y  H:i:s');	
										}
										if($log->logout_date<>''){
											$logout_date=date_format(date_create($log->logout_date),'d/m/Y  H:i:s');	
										}
                                        
                                        
                                        ?>

                                            <tr>
                                                <td width="50" class="text-center"><?php echo $log->id; ?></td>
                                                <td class="text-center"><?php echo get_user($log->user_id)->full_name; ?></td>
                                                <td class="text-center"><?php echo $log->session_id; ?></td>
                                                <td class="text-center"><?php echo $login_date; ?></td>
                                                <td class="text-center"><?php echo $logout_date; ?></td>
											<td class="text-center"><?php echo $log->ip; ?></td>

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
