<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kategoriler
            <small>Kategorilerinizi Buradan Güncelleyebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Kategoriler</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="category.php?p=update&id=<?php echo $category->id; ?>">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kategori Adı</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $category->title; ?>">
                            </div>
							<div class="form-group">
								<label>Renk Kodu</label>
								<input type="text" class="form-control" name="color" value="<?php echo $category->color; ?>">
							</div>

                            <div class="form-group">
                                <label>Aktif / Pasif</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isActive" value="1" <?php echo ($category->isActive) ? "checked" : "" ; ?>>
										Aktif Olsun
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isActive" value="0" <?php echo (!$category->isActive) ? "checked" : "" ; ?>>
										Aktif Olmasın
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="category.php" class="btn btn-danger">İptal</a>

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
