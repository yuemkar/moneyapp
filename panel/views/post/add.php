<!doctype html>
<html lang="tr">
<head>
    <?php include "views/includes/head.php"; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- Header --->
    <?php require_once "views/includes/header.php"; ?>
    <!-- /Header --->

    <!-- Left side column. contains the logo and sidebar -->
    <?php require_once "views/includes/aside.php"; ?>

    <!--------------- Main content ------------->
    <?php require_once "views/post/content/add_content.php"; ?>
    <!--------------- /Main content ------------>

    <!-- Footer --->
    <?php require_once "views/includes/footer.php"; ?>
    <!-- /Footer --->

</div>


<?php include "views/includes/include_script.php"; ?>
<script src="assets/dist/js/post.js"></script>
<script>
$(document).ready(function () {
	$.fn.datepicker.dates['tr'] = {
	    days: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
	    daysShort: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt'],
	    daysMin: ['Pz', 'Pt', 'Sa', 'Ça', 'Pe', 'Cu', 'Ct'],
	    months: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran', 'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
	    monthsShort: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara'],
	    today: 'Bugün',
	    clear: 'Temizle',
	    dateFormat: 'dd/mm/yyyy',
	    timeFormat: 'hh:ii',
	    weekStart: 1,
	    firstDay: 1,
	}
	$('.datepickerv').datepicker({
		autoclose: true,
	    format: "dd/mm/yyyy",
	    todayBtn: true,
	    language: "tr",
	    todayHighlight: true
	});
})
</script>
</body>
</html>