<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>newest laptop</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f0f0; /* Change the background color of the entire page */
        }

        .active {
            background-color: rgb(28, 114, 114);
            color: rgb(247, 217, 244); /* Ensure the active link has a contrasting color */
        }

        /* Adjustments for sidebar */
        #main {
            display: flex;
            flex-direction: row;
        }

        #sidebar {
            flex: 1;
            background-color: #f0f0f0;
            background-image: url('sidebar-bg.jpg'); /* Example background image */
            background-size: cover; /* Cover the entire sidebar */
            background-repeat: no-repeat;
            padding: 20px;
            height: 650px;
        }

        #content {
            flex: 3;
            padding: 20px;
            background-color: #ffffff; /* Background color for the content area */
            border-left: 1px solid #c55656; /* Add a border between the sidebar and content */
        }

        #main-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #main-nav a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        #main-nav a:hover {
            background-color: #ddd;
        }

        #title h1 {
            margin-top: 0;
        }
    </style>
</head>
<body>

    <div id="main">
        <div id="sidebar">
            <div id="title">
                <h1>Laptop for sale</h1>
            </div>
            <nav id="main-nav">
                <a href="{{ url('/') }}" class="{{ Request::is('home') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/laptop') }}" class="{{ Request::is('laptop') ? 'active' : '' }}">Laptop</a>
            </nav>
        </div>

        <div id="content">
            @yield('content')
        </div>
    </div>

</body>
</html>
