<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hesaplar Listesi  
			<small>Hesaplar Listelerini Buradan Görebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
			<li class="active">Liste</li>
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
								<h3 class="box-title">Liste</h3>
								<a href="account.php?p=add" class="btn btn-success btn-sm pull-right" style="margin-left:10px;">
									<i class="fa fa-plus"></i>Ekle</a>						
								
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Hesap</th>
                     
										<th class="text-center">Para Birimi</th>
										<th class="text-center">Tarih</th>
										<th class="text-center">Aktif/Pasif</th>
                                    <th class="text-center">İşlemler</th>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($accounts as $account) { ?>

                                            <tr>
                                                <td width="50" class="text-center"><?php echo $account->id; ?></td>
											<td class="text-center"><?php echo $account->name; ?></td> 
				  
											<td class="text-center"><?php echo $account->rate; ?></td>   
	
											<td class="text-center"><?php echo $account->adate; ?></td>  
											<td width="100" class="text-center">
												<span class="label label-<?php echo ($account->isActive) ? "success" : "danger"; ?>">
													<?php echo ($account->isActive) ? "Aktif" : "Pasif"; ?>
												</span>
											</td>                                                                                                                                                                                 
                                               
                                                <td class="text-center" width="150">
												<a href="account.php?p=delete&id=<?php echo $account->id; ?>" onclick="return confirm('Seçtiğiniz Hesap Tüm Hesap Hareketleriyle Birlikte Silinecektir ?');" class="btn btn-danger btn-sm">Sil</a>
												<a href="account.php?p=updatePage&id=<?php echo $account->id; ?>" class="btn btn-warning btn-sm">Düzenle</a>
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
