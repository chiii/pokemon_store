<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
<head>
    <title>ポケモン</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="{{ asset('assets/js/ie/html5shiv.js') }}"></script><![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" /></noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('assets/css/ie8.css') }}" /><![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-theme.css') }}">
</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Nav -->
    <nav id="nav">
        <a href="#contact" class="icon fa fa-shopping-cart"><span>Cart</span></a>
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Contact -->
        <article id="contact" class="panel">
            <header>
                <h2>購入</h2>
            </header>
                <form action="/done" method="post">
                    {{ csrf_field() }}
                    <div>
                        <div class="row">
                            <div class="6u 12u$(mobile)">
                                郵便番号:<input type="text" name="code" placeholder="0000000" required>
                            </div>
                            <div class="6u 12u$(mobile)">
                                都道府県:<input type="text" name="ken" required>
                            </div>
                            <div class="6u 12u$(mobile)">
                                住所:<input type="text" name="address" required>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="購入">
                    <input type="reset" value="もう一度入力">
                </form>
        </article>


    </div>

    <!-- Footer -->
    <div id="footer">
        <ul class="copyright">
            <li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/skel.min.js') }}"></script>
<script src="{{ asset('assets/js/skel-viewport.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<!--[if lte IE 8]><script src="{{ asset('assets/js/ie/respond.min.js') }}"></script><![endif]-->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
