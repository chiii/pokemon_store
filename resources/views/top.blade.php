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
        <a href="#me" class="icon fa-home active"><span>Home</span></a>
        <a href="#work" class="icon fa-folder"><span>Work</span></a>
        <a href="#contact" class="icon fa fa-shopping-cart"><span>Cart</span></a>
        @if (!Auth::check())
            <a href="{{ url('/login') }}" class="icon fa fa-user"><span>Log In</span></a>
        @else
            <a href="#user" class="icon fa fa-user"><span>User</span></a>
        @endif
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Me -->
        <article id="me" class="panel">
            <header>
                <h1>ポケモン販売</h1>
                <p>ポケモン売ります</p>
            </header>
            <a href="#work" class="jumplink pic">
                <span class="arrow icon fa-chevron-right"><span>See my work</span></span>
                <img src="images/me.jpg" alt="" />
            </a>
        </article>

        <!-- Work -->
        <article id="work" class="panel">
            <header>
                <h2>ポケモンたち</h2>
            </header>
            <p>
                元気なポケモンたちです.
            </p>
            <section>
                <div class="row">
                    @foreach($arys as $ary)
                        <div class="4u 12u$(mobile)">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-{{ $ary->pokemon_id }}"><img src="{{ asset($ary->pokemon_imgpath) }}"></button>
                        </div>

                        <div class="modal fade bs-example-modal-{{ $ary->pokemon_id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myLargeModalLabel">{{ $ary->pokemon_name }}</h4>
                                    </div>
                                    <div class="modal-content">
                                        <img src="{{ asset($ary->pokemon_imgpath) }}">
                                        <div class="modal-body">{{ $ary->pokemon_detail }}</div>

                                        <form action="/cart" method="post" class="center-block">
                                            {{ csrf_field() }}
                                            <p>カートに入れる</p>
                                            <div class="col-xs-2">
                                                <input type="number" name="number" value="1" class="form-control">
                                            </div>

                                            <input type="hidden" name="pokemon_id" value="{{ $ary->pokemon_id }}">

                                            <input class="btn" type="submit" value="Submit">

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </article>

        <!-- Contact -->
        <article id="contact" class="panel">
            <header>
                <h2>カート</h2>
            </header>
            @if(!is_null(session('cart')))
            <form action="/address" method="post">
                {{ csrf_field() }}
                <div>
                    <div class="row">
                        @foreach(session('cart') as $item)
                        <div class="6u 12u$(mobile)">
                            <h2>{{ $item->pokemon_name }}</h2>

                            <p>数量: {{ $item->pokemon_num }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="submit" value="購入">
            </form>
                <form action="/cart/delete" method="post">
                    {{ csrf_field() }}
                    <input type="submit" value="カートの中身を削除">
                </form>
            @else
            <div>
                <h2>カートには何も入っていません</h2>
            </div>
            @endif
        </article>

        @if(Auth::check())
        <article id="user" class="panel">
            <header>
                <h2></h2>
            </header>
            <form action="{{ url('/logout') }}" method="post">
                {{ csrf_field() }}
                <div>
                    <div class="row">
                        <div class="6u 12u$(mobile)">
                            <h2>名前: <p>{{ Auth::user()['attributes']['name'] }}</p></h2>
                        </div>
                        <div class="6u$ 12u$(mobile)">
                            <h2>email: <p>{{ Auth::user()['attributes']['email'] }}</p></h2>
                        </div>
                        <div class="6u$ 12u$(mobile)">
                            <input type="submit" value="Log Out">
                        </div>
                    </div>
                </div>
            </form>
        </article>
        @endif

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
</html>