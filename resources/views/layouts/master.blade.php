<!DOCTYPE html>
<html>
<head>
    <title>
        Developer's Best Friend
    </title>

    <meta charset='utf-8'>

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    @yield('head')
</head>

<body>

    <header>
        <a href="index.php">Developer's BFF</a>

    </header>

    <section>
        @yield('content')
    </section>

    @yield('body')

</body>

<footer>
    <p>A project submitted for the course "Dynamic Web Applications"</p>
</footer>
</html>
