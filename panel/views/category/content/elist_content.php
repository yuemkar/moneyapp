<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gider Ekle  
			<small>Gider Ekleyebilirsiniz..</small>
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
                                <h3 class="box-title pull-left">GİDER</h3>
									<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							          <ul class="nav navbar-nav">
							            <li class="dropdown">
							              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th"></span><?php echo $menuname;?></span><span class="caret"></span></a>
							              <ul class="dropdown-menu" role="menu">
							                <li><a href="?p=elist&date=buay">Bu Ay</a></li>
							                <li><a href="?p=elist&date=son7">Son 7 Gün</a></li>
							                <li><a href="?p=elist&date=gecay">Geçen Ay</a></li>
							                <li><a href="?p=elist&date=buyil">Bu Yıl</a></li>
							                <li><a href="?p=elist&date=gecyil">Geçen Yıl</a></li>
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
								      	<input type="hidden" name="p" value="elist">
								        <input type="hidden" name="tarihara" value="1">
								      	<input class="btn btn-primary" type="submit" value="Uygula">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
								        
								      </div>
								    </div>
								    </form>
								  </div>
								</div>                            
                            <!-- /.box-header -->
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <div class="row">
    
                                        <?php foreach ($categories as $category) { ?>
                                        <div class="col-md-2 cblock">
										<div class="circle" style="background:<?php echo ($category->color == '') ? '#FF0000' :$category->color  ?>">
								             <p>
								                <a href="./post.php?p=add&c=2&cid=<?php echo $category->id; ?>" class="text-info"><?php echo $category->title; ?></a></br>
								                - <?php
								                $finance=get_all_posts($category->id,$date);
								                echo $finance->total_amount;
								                ?>
                                        	 </p>
								            </div>
								        </div>
                                        <?php } ?>
								</div>
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
