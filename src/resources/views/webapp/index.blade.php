<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSSE Webapp</title>
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
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
                            <?php foreach ($contents as $content) : ?>
                            <label>
                                <div class="modal__container__contents__area__box__checkboxes__icon">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <input type="checkbox"><?= $content['name'] ?>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal__container__contents__area__box">
                        <p class="modal__container__contents__area__box__title">学習言語(複数選択可)</p>
                        <div class="modal__container__contents__area__box__checkboxes">
                            <?php foreach ($langs as $lang) : ?>
                            <label>
                                <div class="modal__container__contents__area__box__checkboxes__icon">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <input type="checkbox"><?= $lang['name'] ?>
                            </label>
                            <?php endforeach; ?>
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
            <input type="submit" class="modal__container__btn" value="記録・投稿"></input>
        </form>
    </div>

    <header class="header">
        <div class="header__logo">
            <img src="./img/posse_logo.jpeg">
        </div>
        <p class="header__week">
            4th week
        </p>
        <button class="header__btn" id="openBtn">
            記録・投稿
        </button>
    </header>

    <div class="main">
        <div class="main__container main__container_v">
            <div class="main__container__area_hours">
                <div class="main__container__area_hours__box main__container__area_tile">
                    <p class="main__container__area_hours__box__title">Today</p>
                    <p class="main__container__area_hours__box__num"><?= $today_sum ?></p>
                    <p class="main__container__area_hours__box__unit">hours</p>
                </div>
                <div class="main__container__area_hours__box main__container__area_tile">
                    <p class="main__container__area_hours__box__title">Month</p>
                    <p class="main__container__area_hours__box__num"><?= $this_month_sum ?></p>
                    <p class="main__container__area_hours__box__unit">hours</p>
                </div>
                <div class="main__container__area_hours__box main__container__area_tile">
                    <p class="main__container__area_hours__box__title">Total</p>
                    <p class="main__container__area_hours__box__num"><?= $total ?></p>
                    <p class="main__container__area_hours__box__unit">hours</p>
                </div>
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
                    <?php foreach ($langs as $lang) : ?>
                    <li>
                        <div class="main__container__area_donut_chart__list_circle"></div>
                        <?= $lang['name'] ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="main__container__area_donut_chart main__container__area_tile">
                <h2>学習コンテンツ</h2>
                <div class="main__container__area_donut_chart__box">
                    <div id="contentsChart"></div>
                </div>
                <ul>
                    <?php foreach ($contents as $content) : ?>
                    <li>
                        <div class="main__container__area_donut_chart__list_circle"></div>
                        <?= $content['name'] ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer__container">
            <button class="footer__container__btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>
            <p class="footer__container__date">2022年 1月</p>
            <button class="footer__container__btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </footer>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>
