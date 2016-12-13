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
    <link href="https://fonts.googleapis.com/earlyaccess/mplus1p.css" rel="stylesheet" />

</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Nav -->
    <nav id="nav">
        <a href="#me" class="icon fa-home active"><span>とっぷ</span></a>
        <a href="#work" class="icon fa-folder"><span>ぽけもん</span></a>
        <a href="#contact" class="icon fa fa-shopping-cart"><span>かーと</span></a>
        @if (!Auth::check())
            <a href="#user" class="icon fa fa-user"><span>ろぐいん</span></a>
        @else
            <a href="#user" class="icon fa fa-user"><span>まいぺーじ</span></a>
        @endif
    </nav>

    <!-- Main -->
    <div id="main">

        <!-- Me -->
        <article id="me" class="panel">
            <header>
            <h1>ぽけもんすとあ</h1>
            </header>

            <a href="#work" class="jumplink pic">
                <span class="arrow icon fa-chevron-right"><span>See my work</span></span>
            </a>
        </article>

        <!-- Work -->
        <article id="work" class="panel">
            <header>
                <h2>ぽけもんりすと</h2>
            </header>
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
                                        <div class="price">¥{{$ary->pokemon_price}}</div>
                                        <form action="/cart" method="post" class="center-block">
                                            {{ csrf_field() }}
                                            <div class="form">
                                                <input type="number" class="kazu" name="number" value="1">

                                            <input type="hidden" name="pokemon_id" value="{{ $ary->pokemon_id }}">

                                            <input class="btn" type="submit" value="カートに入れる">
                                          </div>
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
                            <input type="submit" value="ろぐあうと">
                        </div>
                    </div>
                </div>
            </form>
        </article>
        @else
        <article id="user" class="panel">
        <div class="form-wrapper">
          <h1>ろぐいん</h1>
          <form role="form" action="/login" method="post">
            {{ csrf_field() }}
            <div class="form-item">
              <label for="email"></label>
              <input type="email" name="email" required="required" placeholder="Email Address"></input>
            </div>
            <div class="form-item">
              <label for="password"></label>
              <input type="password" name="password" required="required" placeholder="Password"></input>
            </div>
            <div class="button-panel">
              <input type="submit" class="button" title="Sign In" value="えんたー"></input>
            </div>
          </form>
          <div class="form-footer">
            <p><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-modal-new">しんきとうろく</button></p>
          </div>
        </div>
      </article>

      <div class="modal fade bs-example-modal-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"></span>
                      </button>
                      <h4 class="modal-title" id="myLargeModalLabel">しんきとうろく</h4>
                  </div>
                  <div class="modal-content">
                      <div class="modal-body"></div>
                      <form action="/register" method="post" class="center-block">
                          {{ csrf_field() }}
                          <div class="form">
                            <div class="form-item">
                              <label for="name"></label>
                              <input type="text" name="name" required="required" placeholder="Your Name"></input>
                            </div>
                            <div class="form-item">
                              <label for="email"></label>
                              <input type="email" name="email" required="required" placeholder="Email Address"></input>
                            </div>
                            <div class="form-item">
                              <label for="password"></label>
                              <input type="password" name="password" required="required" placeholder="Password"></input>
                            </div>
                            <div class="form-item">
                              <label for="password"></label>
                              <input type="password" name="password_confirmation" required="required" placeholder="Confirmation Password"></input>
                            </div>
                          <input class="btn" type="submit" value="えんたー">
                        </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>

        @endif

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
