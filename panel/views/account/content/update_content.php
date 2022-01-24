<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
			Hesaplar
			<small>Hesaplarınızı Buradan Güncelleyebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
			<li class="active">Hesaplar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="box box-warning">
                    <div class="box-header with-border">
						<h3 class="box-title">Hesapları Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="account.php?p=update&id=<?php echo $account->id; ?>">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Hesap İsmi</label>
								<input type="text" class="form-control" name="name" value="<?php echo $account->name; ?>">
                            </div>

							<div class="form-group">
								<label>Para Birimi</label>
								<select type="text" class="form-control" name="rate">
									<option value="Tl" <?php	if ($account->rate=='Tl')echo 'selected'; ?> >Tl</option>
									<option value="Dolar" <?php	if ($account->rate=='Dolar')echo 'selected'; ?> >Dolar</option>
									<option value="Euro" <?php	if ($account->rate=='Euro')	echo 'selected'; ?> >Euro</option>
								</select>
							</div>
							<div class="form-group">
								<label>KUR</label>
								<input type="text" class="form-control" name="erate" value="<?php echo $account->erate; ?>">							
							</div>

							<div class="form-group">
								<label>Aktif / Pasif</label>
								<div class="radio">
									<label>
										<input type="radio" name="isActive" value="1" <?php echo ($account->isActive) ? "checked" : "" ; ?>>
										Aktif Olsun
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="isActive" value="0" <?php echo (!$account->isActive) ? "checked" : "" ; ?>>
										Aktif Olmasın
									</label>
								</div>
							</div>

                          

                            <button type="submit" class="btn btn-success">Kaydet</button>
							<a href="account.php" class="btn btn-danger">İptal</a>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
