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
	

	</head>


	<body>
		
		@include('partials.navbar')

		@yield("content")

        @include("partials.footer")


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

		<script src="{{ url('js/app.js') }}"></script>
		
		@stack("scripts")

	</body>


</html>