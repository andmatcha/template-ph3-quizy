<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSSE Webapp</title>
    <link rel="stylesheet" href="{{ asset('css/destyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="modal" id="modal">
        <form action="" class="modal__container">
            <div class="modal__container__close_btn" id="closeBtn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
            <div class="modal__container__contents">
                <div class="modal__container__contents__area">
                    <div class="modal__container__contents__area__box">
                        <p class="modal__container__contents__area__box__title">学習日</p>
                        <input type="date" class="modal__container__contents__area__box__space">
                    </div>
                    <div class="modal__container__contents__area__box">
                        <p class="modal__container__contents__area__box__title">学習コンテンツ(複数選択可)</p>
                        <div class="modal__container__contents__area__box__checkboxes">
                            @foreach ($contents as $content)
                                @include('components.checkbox', ['title' => $content->name])
                            @endforeach
                        </div>
                    </div>
                    <div class="modal__container__contents__area__box">
                        <p class="modal__container__contents__area__box__title">学習言語(複数選択可)</p>
                        <div class="modal__container__contents__area__box__checkboxes">
                            @foreach ($langs as $lang)
                                @include('components.checkbox', ['title' => $lang->name])
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal__container__contents__area">
                    <div class="modal__container__contents__area__box">
                        <p class="modal__container__contents__area__box__title">学習時間</p>
                        <input type="number" min="0" max="24"
                            class="modal__container__contents__area__box__space">
                    </div>
                    <div class="modal__container__contents__area__box modal__container__contents__area__box_t">
                        <p class="modal__container__contents__area__box__title">Twitter用コメント</p>
                        <textarea class="modal__container__contents__area__box__textarea"></textarea>
                        <div class="modal__container__contents__area__box__tw">
                            <div class="modal__container__contents__area__box__checkboxes__icon">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p>Twitterに自動投稿する</p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="modal__container__btn" value="記録・投稿">
        </form>
    </div>

    <header class="header">
        <div class="header__logo">
            <img src="images/posse_logo.jpeg">
        </div>
        <p class="header__week">
            4th week
            <a href="/logout">ログアウト</a>
        </p>
        <button class="header__btn" id="openBtn">
            記録・投稿
        </button>
    </header>

    <div class="main">
        <div class="main__container main__container_v">
            <div class="main__container__area_hours">
                @include('components.hour_tile', ['title' => 'Today', 'amount' => $daily_sum[date('j')]])
                @include('components.hour_tile', ['title' => 'Month', 'amount' => $monthly_sum[date('n')]])
                @include('components.hour_tile', ['title' => 'Month', 'amount' => $total])
            </div>
            <div class="main__container__area_bar_chart main__container__area_tile" id="barChart"></div>
        </div>
        <div class="main__container main__container_h">
            <div class="main__container__area_donut_chart main__container__area_tile">
                <h2>学習言語</h2>
                <div class="main__container__area_donut_chart__box">
                    <div id="langsChart"></div>
                </div>
                <ul>
                    @foreach ($langs as $lang)
                        @include('components.legend_item', ['title' => $lang->name])
                    @endforeach
                </ul>
            </div>
            <div class="main__container__area_donut_chart main__container__area_tile">
                <h2>学習コンテンツ</h2>
                <div class="main__container__area_donut_chart__box">
                    <div id="contentsChart"></div>
                </div>
                <ul>
                    @foreach ($contents as $content)
                        @include('components.legend_item', ['title' => $content->name])
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer__container">
            <button class="footer__container__btn">
                <img src="{{ asset('images/icons/prev_button.svg') }}" alt="">
            </button>
            <p class="footer__container__date">{{ date('Y年 n月') }}</p>
            <button class="footer__container__btn">
                <img src="{{ asset('images/icons/next_button.svg') }}" alt="">
            </button>
        </div>
    </footer>


    {{-- jsにグラフ用データを渡す --}}
    <script>
        //日毎の合計
        const dailySum = [
            ['date', 'hours']
        ];

        //言語ごとの合計
        const langHour = [
            ['lang', 'hours']
        ];

        //コンテンツごとの合計
        const contentHour = [
            ['content', 'hours']
        ];

        @foreach ($daily_sum as $day => $hour)
            dailySum.push([{{ $day }}, {{ $hour }}]);
        @endforeach

        @foreach ($lang_hour as $lang_id => $hour)
            langHour.push(['{{ $lang_id }}', {{ $hour }}]);
        @endforeach

        @foreach ($content_hour as $content_id => $hour)
            contentHour.push(['{{ $content_id }}', {{ $hour }}]);
        @endforeach
    </script>

    {{-- google charts読み込み --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- 自分のjs読み込み --}}
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
