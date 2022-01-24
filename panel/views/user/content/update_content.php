<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kullanıcılar
            <small>Kullanıcılarınızı Buradan Güncelleyebilirsiniz..</small>
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

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kullanıcı Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="user.php?p=update&id=<?php echo $user->id; ?>">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kullanıcı Adı ve Soyadı</label>
                                <input type="text" class="form-control" name="full_name" value="<?php echo $user->full_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>E-posta</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $user->email; ?>">
                            </div>

                            <div class="form-group">
                                <label>Şifre</label>
                                <input type="password" class="form-control" name="password">
                            </div>
 							<div class="form-group">
	 							<label>Rolü Nedir</label>
								<select type="text" class="form-control" name="sbox">                          
								  <option value="Admin" <?php if ($user->sbox=='Admin') echo 'selected';?> >Admin</option>
								
								  <option value="User" <?php if ($user->sbox=='User') echo 'selected';?> >Üye</option>
								</select>
 							</div>
                            <div class="form-group">
                                <label>Aktif / Pasif</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isActive" value="1" <?php echo ($user->isActive) ? "checked" : "" ; ?>>
										Siteye Giriş Yapabilir
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isActive" value="0" <?php echo (!$user->isActive) ? "checked" : "" ; ?>>
										Siteye Giriş Yapamaz
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="user.php" class="btn btn-danger">İptal</a>

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
