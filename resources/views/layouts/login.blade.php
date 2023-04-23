<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- Javascript・jQueryのファイルリンク -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>
    <header class="top">
        <div id = "head">
        <a href="/top"><img src="images/main_logo.png" alt="トップ画像"></a>
        </div>
        <div class="nav-area">
        <p class="nav-open">{{ $auth->username }}さん<img src="{{ asset('/storage/images/' . $auth->images) }}"></p>
        <nav>
        <ul class="accordion-area">
        <li class="modal-menu"><a href="/top">ホーム</a></li>
        <li class="modal-menu"><a href="/profile">プロフィール</a></li>
        <li class="modal-menu"><a href="/logout">ログアウト</a></li>
        </ul>
        </nav>
        </div>
    </header>
    <div id="row">
        <div id="container">
        @yield('content')
        </div >
            <div id="side-bar">
                <div id="confirm">
                    <div class="side-list">
                        <div class="user-count-list">
                        <p class="side-menu">{{ $auth->username }}さんの</p>
                        <div class="follow-count">
                        <p class="side-menu">フォロー数</p>
                        <p class="count">{{ $follow_count }}名</p>
                        </div>
                        <div class="list-btn">
                        <p class="list-btn-p"><a href="/followList">フォローリスト</a></p>
                        </div>
                        <div class="follower-count">
                        <p class="side-menu">フォロワー数</p>
                        <p class="count">{{ $follower_count }}名</p>
                        </div>
                        <div class="list-btn">
                        <p class="list-btn-p"><a href="/followerList">フォロワーリスト</a></p>
                        </div>
                        </div>
                        <div class="user-search">
                        <p class="user-search-btn"><a href="/search">ユーザー検索</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
