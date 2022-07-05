<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Dashboard</title>
	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/images/favicon.png' ?>" />
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url(). 'assets/admin/vendor/fontawesome-free/css/all.min.css' ;?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url(). 'assets/admin/css/sb-admin-2.css'; ?> " rel="stylesheet">
	<link href="<?php echo base_url(). 'assets/admin/css/custom.css'; ?> " rel="stylesheet">
	<link href="<?php echo base_url(). 'assets/admin/jquery/jquery-ui.css'; ?> " rel="stylesheet">
	<!-- Jquery date picker styles for this template-->
	<link href="<?php echo base_url(). 'assets/admin/DataTables/datatables.css'; ?> " rel="stylesheet">
	<link href="<?php echo base_url(). 'assets/admin/DataTables/DataTables-1.10.23/css/dataTables.jqueryui.css'; ?>  " rel="stylesheet">
	<link href="<?php echo base_url(). 'assets/admin/vendor/datatables/dataTables.bootstrap4.css'; ?> " rel="stylesheet">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style>
		#oldSales {
			width: 100%;
			display: none;
		}
		#oldSales:active{

			display: block;
		}
		#oldSalesMidi {
			width: 100%;
			display: none;
		}

		#oldSalesMini {
			width: 100%;
			display: none;
		}
		#commission{
			width: 100%;
			display: none;
		}

		#comm{
			width: 100%;
			display: none;
		}

		#large{
			width: 100%;
			display: none;
		}

		#medium{
			width: 100%;
			display: none;
		}

		#small{
			width: 100%;
			display: none;
		}

		#maxi{
			width: 100%;
			display: none;
		}

		#standard{
			width: 100%;
			display: none;
		}

		#compact{
			width: 100%;
			display: none;
		}
		button.dt-button, div.dt-button, a.dt-button {
			position: relative;
			display: inline-block;
			box-sizing: border-box;
			margin-right: 0.333em;
			padding: 0.2em 1em;
			border: 1px solid #999;
			border-radius: 2px;
			cursor: pointer;
			font-size: 0.88em;
			color: black;
			white-space: nowrap;
			overflow: hidden;
			background-color: #e9e9e9;
			background-image: -webkit-linear-gradient(top, #fff 0%, #e9e9e9 100%);
			background-image: -moz-linear-gradient(top, #fff 0%, #e9e9e9 100%);
			background-image: -ms-linear-gradient(top, #fff 0%, #e9e9e9 100%);
			background-image: -o-linear-gradient(top, #fff 0%, #e9e9e9 100%);
			background-image: linear-gradient(to bottom, #fff 0%, #e9e9e9 100%);
		}

	</style>
	<script>
		function biggieFunction() {
			var x = document.getElementById("oldSales");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function midiFunction() {
			var x = document.getElementById("oldSalesMidi");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function miniFunction() {
			var x = document.getElementById("oldSalesMini");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function Commission() {
			var x = document.getElementById("commission");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function commFunction() {
			var x = document.getElementById("comm");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function largeFunction() {
			var x = document.getElementById("large");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function mediumFunction() {
			var x = document.getElementById("medium");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function smallFunction() {
			var x = document.getElementById("small");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function maxiFunction() {
			var x = document.getElementById("maxi");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>


	<script>
		function standardFunction() {
			var x = document.getElementById("standard");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		function compactFunction() {
			var x = document.getElementById("compact");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>


	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '760599934877529');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
				   src="https://www.facebook.com/tr?id=760599934877529&ev=PageView&noscript=1"
		/></noscript>
	<!-- End Facebook Pixel Code -->

	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window,document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '367833173841476');
		fbq('track', 'PageView');

		fbq('track', 'Contact');

	</script>
	<noscript>
		<img height="1" width="1"
			 src="https://www.facebook.com/tr?id=367833173841476&ev=PageView
&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->



	<style>
		.blink{
			width:200px;
			text-align: center;
			font-size: 15px;
			animation: blink 1s linear infinite;
		}
		span{

		}
		@keyframes blink{
			0%{opacity: 0;}
			50%{opacity: .5;}
			100%{opacity: 1;}
		}
	</style>


</head>

<body id="page-top">
<!-- Page Wrapper -->

</body>
</html>
