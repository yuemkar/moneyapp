<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Yazılar
            <small>Blog Yazılarınızı Buradan Düzenleyebilirsiniz</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Yazılar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Yazısını Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<form role="form" method="post" action="overview.php?p=update&id=<?php echo $post->id; ?>" enctype="multipart/form-data">


                            <div class="row">
                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Tür</label></br><?php
                                                if ($post->statement=='1') echo 'Gelir';
                                                if ($post->statement=='2') echo 'Gider';                                    
								?>                                                
                                </div>
                            </div>
							<div class="row">                                                              
                                <div class="form-group col-md-6">
                                    <label>Bakiye</label>
                                    <input type="text" class="form-control" name="amount" value="<?php echo $post->amount; ?>">
                                </div>
                            </div>
							<div class="row">
                                <div class="form-group col-md-6">
                                    <label>Kategori Adı</label>
                                    <select name="cat_id" class="form-control">
                                        <?php foreach ($categories as $category) { ?>
                                            <option <?php echo ($category->id == $post->cat_id) ? "selected" : "" ; ?> value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							<div class="row">                                                              
                                <div class="form-group col-md-6">
                                    <label>Açıklama</label>
                                    <input type="text" class="form-control" name="title" placeholder="İsterseniz açıklama girebilirsiniz." value="<?php echo $post->title; ?>">
                                </div>
                            </div>                            
                            <div class="row"> 
							<!-- text input -->
							<div class="form-group col-md-6">
								<label>Tarih</label>
								<?php 
								 $adate = date_create($post->adate);
								 $adate= date_format($adate, 'd/m/Y');
								?>
								<div class="input-group" data-provide="">
								    <input type="text" name="adate" class="form-control datepickerv" value="<?php echo $adate;?>">
								</div>
							</div>
							</div>
                            <div class="row">
								                            
                                <div class="form-group col-md-12">
                                    <label>Hesap</label>
                                	<?php foreach ($accounts as $account) { ?>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="account_id" value="<?php echo $account->id;?>" <?php if ($post->account_id==$account->id) echo "checked"; ?> value="<?php echo $account->id; ?>">
											<?php echo $account->name.' '.$account->rate; ?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

							
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Aktif / Pasif</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isActive" value="1" <?php echo ($post->isActive) ? "checked" : ""; ?>>
											Aktif Olsun
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isActive" value="0" <?php echo (!$post->isActive) ? "checked" : ""; ?>>
										 	Aktif Olmasın
                                        </label>
                                    </div>
                                </div>
                            </div>
							
                            <button type="submit" class="btn btn-success">Kaydet</button>
							<a href="overview.php" class="btn btn-danger">İptal</a>

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
