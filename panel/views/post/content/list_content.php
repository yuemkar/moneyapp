<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gelir / Gider 
            <small>Gelir / Gider Listeli Görebilirsiniz..</small>
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
                                <a href="post.php?p=add&c=2" class="btn btn-danger btn-sm pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>Gider Ekle</a>
                                <a href="post.php?p=add&c=1" class="btn btn-success btn-sm pull-right" style="margin-left: 10px;"><i class="fa fa-plus"></i>Gelir Ekle</a>
									<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
							          <ul class="nav navbar-nav">
							            <li class="dropdown">
							              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th"></span><?php echo $menuname;?></span><span class="caret"></span></a>
							              <ul class="dropdown-menu" role="menu">
							                <li><a href="?date=buay">Bu Ay</a></li>
							                <li><a href="?date=son7">Son 7 Gün</a></li>
							                <li><a href="?date=gecay">Geçen Ay</a></li>
							                <li><a href="?date=buyil">Bu Yıl</a></li>
							                <li><a href="?date=gecyil">Geçen Yıl</a></li>
							                <li class="divider"></li>
							                <li><a href="#myModaldate" data-toggle="modal">Tarih Aralığı</a></li>
							                <li class="divider"></li>
							              </ul>
							            </li>
							          </ul>
							        </div>                                
                            </div>
								<!-- Modal date -->
								<div class="modal fade" id="myModaldate" tabindex="-1" role="dialog" aria-labelledby="myModaldateLabel">
								  <div class="modal-dialog" role="document">
								  <form method="GET">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Tarih Aralığı</h4>
								      </div>
								      <div class="modal-body">
								        <div class="input-group input-daterange">
										    <input type="text" class="form-control datepickerv" name="btarih" value="<?php echo $btarih;?>" >
										    <div class="input-group-addon">arası</div>
										    <input type="text" class="form-control datepickerv" name="starih" value="<?php echo $starih;?>">
										</div>
								      </div>
								      <div class="modal-footer">
								        <input type="hidden" name="tarihara" value="1">
								      	<input class="btn btn-primary" type="submit" value="Uygula">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
								        
								      </div>
								    </div>
								    </form>
								  </div>
								</div>                            
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tür</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Hesap Türü</th>
                                    <th class="text-center">Tarih</th>
                                    <th class="text-center">Bakiye</th>
                                    <th class="text-center">isActive</th>
                                    <th class="text-center">İşlemler</th>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($posts as $post) { ?>

                                            <tr>
                                                <td class="text-center"><?php echo $post->id; ?></td>
                                                <td class="text-center"><?php 
                                                if ($post->statement=='1') echo 'Gelir';
                                                if ($post->statement=='2') echo 'Gider';
                                                ?></td>
                                                <td class="text-center"><?php $gc=get_category($post->cat_id); echo isset($gc->title)?$gc->title:'';?></td>
                                                <td class="text-center"><?php $ac=get_account($post->account_id); echo isset($ac->name)?$ac->name.' '.$ac->rate:'';?></td>
                                                <td class="text-center">
                                                <?php 
                                                $date = date_create($post->adate);
												echo date_format($date, 'd/m/Y');
                                                ?>
                                                </td>
                                                <td class="text-center"><?php if ($post->statement=='1'){ echo '+'; } else { echo '-';}?><?php echo $post->amount; ?></td>
                                                <td class="text-center">
                                                    <span class="label label-<?php echo ($post->isActive) ? "success" : "danger"; ?>">
                                                        <?php echo ($post->isActive) ? "Aktif" : "Pasif"; ?>
                                                    </span>
                                                </td>
                                                <td class="text-center" width="150">                                                                                         

												<a href="post.php?p=delete&id=<?php echo $post->id; ?>" onclick="return confirm('Seçtiğiniz Değer Silinecektir ?');"

                                                        class="btn btn-danger btn-sm">Sil</a>
                                                    <a href="post.php?p=updatePage&id=<?php echo $post->id;?>" class="btn btn-warning btn-sm">Düzenle</a>
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
