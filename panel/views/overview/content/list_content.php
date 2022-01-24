<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            GENEL BAKIŞ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active"></li>
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
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
							 <div class="col-md-3 col-sm-6 col-xs-12">
						        <div class="info-box">
						            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU GÜNKÜ GELİR </span>
						              <span class="info-box-number"><?php echo $getday_income->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <div class="info-box">
										<span class="info-box-icon bg-green">
											<i class="fa fa-money"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU HAFTADAKİ GELİRLER</span>
						              <span class="info-box-number"><?php echo $getweek_income->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <div class="info-box">
										<span class="info-box-icon bg-green">
											<i class="fa fa-money"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU AYKİ GELİRLER</span>
						              <span class="info-box-number"><?php echo $getmoon_income->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <div class="info-box">
										<span class="info-box-icon bg-green">
											<i class="fa fa-money"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU YILKİ GELİRLER</span>
						              <span class="info-box-number"><?php echo $getyear_income->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>						          
						          <div class="info-box">
										<span class="info-box-icon bg-green">
											<i class="fa fa-money"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">TOPLAM GELİR</span>
						              <span class="info-box-number"><?php echo $gettotal_income->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>						          						          
						          <!-- /.info-box -->
						        </div>	
						        <div class="col-md-3 col-sm-6 col-xs-12">
						         <div class="info-box">
						            <span class="info-box-icon bg-red"><i class="fa fa-ticket"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU GÜN YAPILAN GİDERLER</span>
						              <span class="info-box-number">- <?php echo $getday_expense->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <div class="info-box">
						            <span class="info-box-icon bg-red"><i class="fa fa-ticket"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU HAFTA YAPILAN GİDER</span>
						              <span class="info-box-number">- <?php echo $getweek_expense->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <div class="info-box">
						            <span class="info-box-icon bg-red"><i class="fa fa-ticket"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU AY YAPILAN GİDER</span>
						              <span class="info-box-number">- <?php echo $getmoon_expense->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <div class="info-box">
										<span class="info-box-icon bg-red">
											<i class="fa fa-ticket"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">BU YIL YAPILAN GİDER</span>
						              <span class="info-box-number">- <?php echo $getyear_expense->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>						          
						          <div class="info-box">
										<span class="info-box-icon bg-red">
											<i class="fa fa-ticket"></i></span>

						            <div class="info-box-content">
						              <span class="info-box-text">TOPLAM GİDER</span>
						              <span class="info-box-number">- <?php echo $gettotal_expense->total_amount;?></span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>						          						          
						          <!-- /.info-box -->
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
