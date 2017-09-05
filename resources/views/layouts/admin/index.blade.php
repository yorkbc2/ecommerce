<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ-панель</title>

	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	
	<div class="container">
		@include("layouts.admin.components.nav")

		<div class="row">
			
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						@yield("content")
					</div>
				</div>
			</div>

		</div>

	</div>

	<script src="/js/app.js"></script>
</body>
</html>