<html>
	<head>
		<title>Laravel</title>

		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				/*color: #B0BEC5;*/
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}
			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}
			.content {
				text-align: center;
				display: inline-block;
			}
			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}
			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<br />
				<div class="action">
					<a class="btn btn-primary" href="{{ url('user/login') }}">User Login</a>
					<a class="btn btn-warning" href="{{ url('admin/login') }}">Admin Login</a>
				</div>
			</div>
		</div>
	</body>
</html>
