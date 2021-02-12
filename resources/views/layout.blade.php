<!DOCTYPE html>
<html>
<head>
	<title>@yield("title")</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
@include('partials.navigation')
@yield("content")
@include('partials.footer')
</body>
</html>
