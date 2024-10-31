<?php

$host = 'localhost';
$db = 'kinobaza';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}


$stmt = $pdo->query("SELECT * FROM films");
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <meta name="description" content="КиноБаза - это портал о кино">
    <meta name="keywords" content="фильмы, фильмы онлайн, hd">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        function changeLanguage(lang) {
            const translations = {
    'ru': {
        'Главная': 'Главная',
        'Кино - наша страсть!': 'Кино - наша страсть!',
        'Фильмы': 'Фильмы',
        'Сериалы': 'Сериалы',
        'Рейтинг фильмов': 'Рейтинг фильмов',
        'Контакты': 'Контакты',
        'Поиск': 'Поиск',
        'ваш запрос': 'ваш запрос',
        'найти': 'найти',
        'Вход': 'Вход',
        'логин': 'логин',
        'пароль': 'пароль',
        'вход': 'вход',
        'забыли пароль?': 'забыли пароль?',
        'регистрация': 'регистрация',
        'Новые фильмы': 'Новые фильмы',
        'Новые сериалы': 'Новые сериалы',
        'Как снимали Интерстеллар': 'Как снимали Интерстеллар',
        'читать': 'читать',
        'Акер Том Хэнкс поделился впечатлением о фестивале': 'Акер Том Хэнкс поделился впечатлением о фестивале',
        '16 февраля в Лондоне состоялась 67-я церемония...': '16 февраля в Лондоне состоялась 67-я церемония...',
        'Главная|Фильмы|Сериалы|Рейтинг фильмов|Контакты': 'Главная|Фильмы|Сериалы|Рейтинг фильмов|Контакты',
        'kinopoisk.ru': 'kinopoisk.ru',
        'Интерстеллар': 'Интерстеллар',
        'Матрица': 'Матрица',
        'Безумный макс': 'Безумный макс',
        'Облачный атлас': 'Облачный атлас',
        'Мы запустили расширенный поиск': 'Мы запустили расширенный поиск',
        '45 лет исполнилось Кристоферу Нолану - одному из самых успешных режиссеров нашего времени, чьи работы одинаково любимы как взыскательными критиками, так и простыми зрителями. Фильмом изначально занималась студия Paramount. Когда Кристофер Нолан занял место режиссера, студия Warner Bros., которая выпускала его последние фильмы, добилась участия в проекте.' : '45 лет исполнилось Кристоферу Нолану - одному из самых успешных режиссеров нашего времени, чьи работы одинаково любимы как взыскательными критиками, так и простыми зрителями. Фильмом изначально занималась студия Paramount. Когда Кристофер Нолан занял место режиссера, студия Warner Bros., которая выпускала его последние фильмы, добилась участия в проекте.',
        'Актер Том Хэнкс поделился впечатлением о фестивале': 'Актер Том Хэнкс поделился впечатлением о фестивале',
        '16 февраля в Лондоне состоялась 67-я церемония вручения наград Британской киноакадемии. Леонардо Ди Каприо, Брэд Питт, Анджелина Джоли, Кейт Бланшетт, Хелен Миррен, Эми Адамс, Кристиан Бэйл, Альфонсо Куарон и другие гости и победители премии - в нашем репортаже.' : '16 февраля в Лондоне состоялась 67-я церемония вручения наград Британской киноакадемии. Леонардо Ди Каприо, Брэд Питт, Анджелина Джоли, Кейт Бланшетт, Хелен Миррен, Эми Адамс, Кристиан Бэйл, Альфонсо Куарон и другие гости и победители премии - в нашем репортаже.',

    },
    'en': {
        'Главная': 'Home',
        'Кино - наша страсть!': 'Cinema - our passion!',
        'Фильмы': 'Movies',
        'Сериалы': 'TV Series',
        'Рейтинг фильмов': 'Movie Ratings',
        'Контакты': 'Contacts',
        'Поиск': 'Search',
        'ваш запрос': 'your query',
        'найти': 'find',
        'Вход': 'Login',
        'логин': 'login',
        'пароль': 'password',
        'вход': 'enter',
        'забыли пароль?': 'forgot password?',
        'регистрация': 'registration',
        'Новые фильмы': 'New movies',
        'Новые сериалы': 'New TV series',
        'Как снимали Интерстеллар': 'How Interstellar was filmed',
        'читать': 'read',
        'Акер Том Хэнкс поделился впечатлением о фестивале': 'Acer Tom Hanks shared his impression of the festival',
        '16 февраля в Лондоне состоялась 67-я церемония...': 'On February 16, the 67th ceremony took place in London...',
        'Главная|Фильмы|Сериалы|Рейтинг фильмов|Контакты': 'Home|Movies|TV Series|Movie Ratings|Contacts',
        'kinopoisk.ru': 'kinopoisk.ru',
        'Интерстеллар': 'Interstellar',
        'Матрица': 'The Matrix',
        'Безумный макс': 'Mad Max',
        'Облачный атлас': 'Cloud Atlas',
        'Мы запустили расширенный поиск': 'We launched an extended search',
        '45 лет исполнилось Кристоферу Нолану - одному из самых успешных режиссеров нашего времени, чьи работы одинаково любимы как взыскательными критиками, так и простыми зрителями. Фильмом изначально занималась студия Paramount. Когда Кристофер Нолан занял место режиссера, студия Warner Bros., которая выпускала его последние фильмы, добилась участия в проекте.': 'Christopher Nolan, one of the most successful directors of our time, whose works are equally loved by discerning critics and ordinary viewers alike, is 45 years old. The film was originally produced by Paramount. When Christopher Nolan took over as director, Warner Bros., the studio that produced his last films, secured a role in the project.',
        'Актер Том Хэнкс поделился впечатлением о фестивале': 'Actor Tom Hanks shared his impressions of the festival',
        '16 февраля в Лондоне состоялась 67-я церемония вручения наград Британской киноакадемии. Леонардо Ди Каприо, Брэд Питт, Анджелина Джоли, Кейт Бланшетт, Хелен Миррен, Эми Адамс, Кристиан Бэйл, Альфонсо Куарон и другие гости и победители премии - в нашем репортаже.' : 'On February 16, the 67th British Academy Film Awards took place in London. Leonardo DiCaprio, Brad Pitt, Angelina Jolie, Cate Blanchett, Helen Mirren, Amy Adams, Christian Bale, Alfonso Cuaron and other guests and award winners are in our report.',
    }
};
            const elements = document.querySelectorAll('[data-translate]');
            elements.forEach(element => {
                const key = element.dataset.translate;
                element.textContent = translations[lang][key];
            });
            const placeholders = document.querySelectorAll('[data-translate-placeholder]');
            placeholders.forEach(element => {
                const key = placeholder.dataset.translatePlaceholder;
                placeholder.placeholder = translations[lang][key];
            });
        }
    </script>
</head>

<body>
    <div class="main">
        <button onclick="changeLanguage('ru')">RU</button>
        <button onclick="changeLanguage('en')">EN</button>

        <div class="header">
            <div class="logo">
                <div class="logo_text">
                    <h1><a href="index.html" data-translate="Главная">Главная</a></h1>
                    <h2 data-translate="Кино - наша страсть!">Кино - наша страсть!</h2>
                </div>
            </div>
            <div class="menubar">
                <ul class="menu">
                    <li class="selected"><a href="index.html" data-translate="Главная">Главная</a></li>
                    <li><a href="films.html" data-translate="Фильмы">Фильмы</a></li>
                    <li><a href="serials.html" data-translate="Сериалы">Сериалы</a></li>
                    <li><a href="rating.html" data-translate="Рейтинг фильмов">Рейтинг фильмов</a></li>
                    <li><a href="contact.html" data-translate="Контакты">Контакты</a></li>
                </ul>
            </div>
        </div>
        <div class="site_content">
            <div class="sidebar_container">
                <div class="sidebar">
                    <h2 data-translate="Поиск">Поиск</h2>
                    <form method="post" action="#" id="search_form">
                        <input type="search" name="search_field" placeholder="ваш запрос">
                        <input type="submit" class="btn" value="найти" />
                    </form>
                </div>
                <div class="sidebar">
                    <h2 data-translate="Вход">Вход</h2>
                    <form method="post" action="#" id="login">
                        <input type="text" name="login_field" placeholder="логин" />
                        <input type="password" name="password_field" placeholder="пароль" />
                        <input type="submit" class="btn" value="вход" />
                        <div class="labels_password_text"></div>
                        <span><a data-translate="забыли пароль?" href="#">забыли пароль?</a></span> | <span><a data-translate="регистрация" href="#">регистрация</a></span>
                    </form>
                </div>
                <div class="sidebar">
                    <h2 data-translate="Новости" >Новости</h2>
                    <span>31.02.2018</span>
                    <p data-translate="Мы запустили расширенный поиск"> Мы запустили расширенный поиск</p>
                    <a data-translate="читать" href="#">читать</a>
                </div>
                <div class="sidebar">
                    <h2 data-translate="Новые фильмы">Рейтинг фильмов</h2>
                    <ul>
                        <li><a data-translate="Интерстеллар" href="show.html">Интерстеллар</a><span class="rating_sidebar">8.1</span></li>
                        <li><a data-translate="Матрица" href="#">Матрица</a><span class="rating_sidebar">8.0</span></li>
                        <li><a data-translate="Безумный макс" href="#">Безумный макс</a><span class="rating_sidebar">7.5</span></li>
                        <li><a data-translate="Облачный атлас" href="#">Облачный атлас</a><span class="rating_sidebar">7.4</span></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <h1 data-translate="Новые фильмы">Новые фильмы</h1>
                <div class="films_block">
                <?php foreach ($films as $film): ?>
                    <div class="film">
                        <a href="<?php echo $film['ssilka']; ?>">
                            <img src="<?php echo $film['image_path']; ?>" alt="<?php echo $film['title']; ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
                <h1 data-translate="Новые сериалы">Новые сериалы</h1>
                <div class="films_block">
                    <a href="walking.html"><img src="assets/img/dead.png"></a>
                    <a href="silic.html"><img src="assets/img/silicon.png"></a>
                    <a href="breaking.html"><img src="assets/img/breakingbad.png"></a>
                    <a href="x.html"><img src="assets/img/xfiles.png"></a>
                </div>
                <div class="posts">
                    <hr>
                    <h2><a data-translate="Как снимали Интерстеллар" href="show.html">Как снимали Интерстеллар</a></h2>
                    <div class="posts_content">
                        <p data-translate="45 лет исполнилось Кристоферу Нолану - одному из самых успешных режиссеров нашего времени, чьи работы одинаково любимы как взыскательными критиками, так и простыми зрителями. Фильмом изначально занималась студия Paramount. Когда Кристофер Нолан занял место режиссера, студия Warner Bros., которая выпускала его последние фильмы, добилась участия в проекте.">
                            45 лет исполнилось Кристоферу Нолану - одному из самых успешных
                            режиссеров нашего времени, чьи работы одинаково любимы как
                            взыскательными критиками, так и простыми зрителями. Фильмом
                            изначально занималась студия Paramount. Когда Кристофер Нолан занял
                            место режиссера, студия Warner Bros., которая выпускала его последние
                            фильмы, добилась участия в проекте.</p>
                        </div>
                        <p><a data-translate="читать" href="show.html">читать</a></p>
                        <hr>
                    </div>
                    <h2><a data-translate="Актер Том Хэнкс поделился впечатлением о фестивале" href="#">Актер Том Хэнкс поделился впечатлением о фестивале</a></h2>
                    <div class="posts_content">
                        <p data-translate="16 февраля в Лондоне состоялась 67-я церемония вручения наград Британской киноакадемии. Леонардо Ди Каприо, Брэд Питт, Анджелина Джоли, Кейт Бланшетт, Хелен Миррен, Эми Адамс, Кристиан Бэйл, Альфонсо Куарон и другие гости и победители премии - в нашем репортаже.">
                            16 февраля в Лондоне состоялась 67-я церемония вручения наград
                            Британской киноакадемии. Леонардо Ди Каприо, Брэд Питт, Анджелина Джоли,
                            Кейт Бланшетт, Хелен Миррен, Эми Адамс, Кристиан Бэйл, Альфонсо Куарон и
                            другие гости и победители премии - в нашем репортаже.</p>
                        </div>
                        <p><a data-translate="читать" href="#">читать</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>
                <a data-translate="Главная" href="index.html">Главная</a>|
                <a data-translate="Фильмы" href="films.html">Фильмы</a>|
                <a data-translate="Сериалы" href="serials.html">Сериалы</a>|
                <a data-translate="Рейтинг фильмов" href="rating.html">Рейтинг фильмов</a>
                <a data-translate="Контакты" href="contact.html">Контакты</a>
            </p>
            <p>kinopoisk.ru</p>
        </div>
    </div>
</body>
</html>
