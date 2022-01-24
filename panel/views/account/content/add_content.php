<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Hesaplar
			<small>Hesaplarınızı Buradan Ekleyebilirsiniz..</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="#">
					<i class="fa fa-dashboard"></i> Anasayfa</a></li>
			<li class="active">Hesapları Ekle</li>
		</ol>
	</section>


	<!-- Main content -->
	<section class="content">
		<!-- Main row -->
		<div class="row">
			<section class="col-lg-12 ">

				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Kullanıcı Ekle</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form role="form" method="post" action="account.php?p=save">
							<!-- text input -->
							<div class="form-group">
								<label>Hesap ismi</label>
								<input type="text" class="form-control" name="name">
							</div>
							
							<div class="form-group">
								<label>Para Birimi</label>
								<select type="text" class="form-control" name="rate">
									<option value="Tl">TL</option>
									<option value="Dolar">Dolar</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>KUR</label>
								<input type="text" class="form-control" name="erate">
							</div>
							<div class="form-group">
								<label>Aktif / Pasif</label>
								<div class="radio">
									<label>
										<input type="radio" name="isActive" value="1" checked>
										Aktif Olsun
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="isActive" value="0">
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
