<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" id="getbowtied-th-widget-styles-css" href="https://thehanger.wp-theme.design/wp-content/plugins/the-hanger-extender/includes/widgets/assets/css/widget-product-categories-with-icon.css?ver=5.6" type="text/css" media="all">
		<link rel="stylesheet" id="getbowtied_icons-css" href="https://thehanger.wp-theme.design/wp-content/themes/the-hanger/inc/fonts/thehanger-icons/style.css?ver=1.6.8" type="text/css" media="all">
		<link rel="stylesheet" href="{{ url('css/index.css') }}">
		<link rel="stylesheet" href="{{ url('fontawesome/css/all.css') }}">
	
				
		<title>The Hanger – Exlusively on the Envato Market</title>

		<style>

			.loader-cover-custom{
				position: fixed;
				left:0;
				right: 0;
				z-index: 99999999;
				background-color: rgba(0, 0, 0, 0.6);
				top: 0;
				bottom: 0;
			}

			.loader-custom {
				margin-top:45vh;
				margin-left: 45%;
				border: 16px solid #f3f3f3; /* Light grey */
				border-top: 16px solid #3498db; /* Blue */
				border-radius: 50%;
				width: 120px;
				height: 120px;
				animation: spin 2s linear infinite;
			}
			
			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}

		</style>
	

	</head>


	<body>
		
		@include('partials.navbar')

		@yield("content")

        @include("partials.footer")


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="{{ url('js/app.js') }}"></script>

		<script>

			$('.searchInput').keypress(function(e) {
				var keycode = (e.keyCode ? e.keyCode : e.which);
				if (keycode == '13') {
					
					window.location.href="{{ url('/search') }}"+"/"+$(".searchInput").val()

					e.preventDefault();
					return false;
				}
			});

			$(".searchInputFooter").keypress(function(e) {
				var keycode = (e.keyCode ? e.keyCode : e.which);
				if (keycode == '13') {
					
					window.location.href="{{ url('/search') }}"+"/"+$(".searchInputFooter").val()

					e.preventDefault();
					return false;
				}
			});
		
		</script>
		
		@stack("scripts")

	</body>


</html>