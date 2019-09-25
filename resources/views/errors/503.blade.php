<!doctype html>

	<head>

		<meta charset="UTF-8">

		<title>Site Maintenance</title>

		<link href="{{ asset('css/503.css') }}" rel="stylesheet">

	</head>

	<body>
		<article>

			<img class="center" src="{{ Voyager::image( setting('site.logo') ) }}" alt="{{ setting('site.title') }} Logo" style="width: 13%;">

		    <h1>We&rsquo;ll be back soon!</h1>

		    <div>
		        <p>Error 503 - Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:{{ setting('site.email') }}">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
		        <p>&mdash; The {{ setting('site.title') }} Team</p>
		    </div>

		</article>
	</body>

</html>
