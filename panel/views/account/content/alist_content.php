<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hesaplar  
			<small>Hesapları Buradan Görebilirsiniz..</small>
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
								<a href="#mtransfer" data-toggle="modal" class="btn btn-success btn-sm pull-right" style="margin-left:10px;">
									<i class="fa fa-plus"></i>Hesaplar Arası Tranfer
								</a>						
<!--								<a href="account.php?p=transfer" class="btn btn-success btn-sm pull-right" style="margin-left:10px;">
									<i class="fa fa-plus">Hesaba Nakit Ekle</i>
								</a>-->
                            </div>
                            <!-- Modal date -->
								<div class="modal fade" id="mtransfer" tabindex="-1" role="dialog" aria-labelledby="mytransferLabel">
								  <div class="modal-dialog" role="document">
								  <form method="POST">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Tarih Aralığı</h4>
								      </div>
								      <div class="modal-body">
								      <div class="row"> 
								      <div class="form-group col-md-6">
	                                    <label>Ana Hesap</label>
	                                    <select name="accfh" class="form-control">
	                                        <?php
	                                        foreach ($accounts as $account) { 
	                                       
											if ($ftotal[$account->id] < 0){
												$ftotalv ="<span class='text-danger'>{$ftotal[$account->id]}</span>";											
											}else{
												$ftotalv ="<span class='text-success'>{$ftotal[$account->id]}</span>";	
											}
	                                        ?>
	                                            <option value="<?php echo $account->id; ?>"><?php echo $account->name.' '.$ftotalv.' '.$account->rate;; ?></option>
	                                        <?php } ?>
	                                    </select>
                                		</div>
                                		</div>
                                	  <div class="row"> 
								      <div class="form-group col-md-6">
	                                    <label>Aktarılacak Hesap</label>
	                                    <select name="acch" class="form-control">
	                                        <?php
	                                        foreach ($accounts as $account) { 
											if ($ftotal[$account->id] < 0){
												$ftotalv ="<span class='text-danger'>{$ftotal[$account->id]}</span>";											
											}else{
												$ftotalv ="<span class='text-success'>{$ftotal[$account->id]}</span>";	
											}	                                        
	                                        ?>
	                                            <option value="<?php echo $account->id; ?>"><?php echo $account->name.' '.$ftotalv.' '.$account->rate; ?> </option>
	                                        <?php } ?>
	                                    </select>
                                		</div>
                                		</div>
                                	  <div class="row"> 								        
								      <div class="form-group col-md-8">
	                                    <label>Aktarılacak Miktar</label>
											 <input type="text"  class="form-control" name="amounth" placeholder="Aktaracağınız Tutarı giriniz.">
                                		</div>										    
									  </div>	    
                                	  <div class="row"> 								        
								      <div class="form-group col-md-8">
	                                    <label>Açıklama</label>
											 <input type="text"  class="form-control" name="title" placeholder="İsterseniz Açıklama Ekleyebilirsiniz">
                                		</div>										    
									  </div>										
								      </div>
								      <div class="modal-footer">
								        <input type="hidden" name="mtransfer" value="1">
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
                                    <th class="text-left">Hesap</th>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($accounts as $account) { ?>

                                            <tr>
											<?php
											$ftotalve='';
											if ($account->erate > 1.00){
												$ftotalve=$fetotal[$account->id];
												$ftotalve='.<br/>'.number_format($ftotalve, 2).' TL';
											}
											if ($ftotal[$account->id] < 0){
												$ftotalv ="<span class='text-danger'>".number_format($ftotal[$account->id],2)."</span>";
																					
											}else{
												$ftotalv ="<span class='text-success'>".number_format($ftotal[$account->id],2)."</span>";	
											}
											?>                                            
											<td class="text-left"><?php echo $account->name; ?> <?php echo $ftotalv.' '.$account->rate; ?> <?php echo $ftotalve; ?></td> 

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
