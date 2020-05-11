<?php
require_once "mobile-detect.php";
$detect = new Mobile_Detect();
$link = 'https://vk.com/maks.onegin';
$link2 = 'https://vk.com';
if ( $detect->isMobile() ) {
    $link = 'vk://vk.com/maks.onegin';
    $link2 = 'vk://vk.com';
}
$literature = [
    'official',
    'gost',
    'patent',
    'info_list',
    'book',
    'mbook',
    'disser',
    'autodisser',
    'electrolocal',
    'electronet',
    'doc_part',
    'newspaper',
];
$literature_title = [
    'Официальные материалы',
    'Нормативно-технические документы',
    'Авторские свидетельства, патенты',
    'Информационные листки',
    'Книги',
    'Многотомные издания',
    'Диссертация',
    'Автореферат диссертации',
    'Электронный ресурс локального доступа (CD)',
    'Электронный ресурс удаленного доступа (Internet)',
    'Составные части документа',
    'Статья из журнала',
];
$HeadList = ['Официальные и директивные материалы (Федеральные законы, постановления   Правительства, приказы, положения, рекомендации Министерства и ведомств РФ)',
            'Нормативно-технические документы (ГОСТы, СНиПы, САНПины и т.д.)',
            'Книги',
            'Неопубликованные материалы (диссертации, авторефераты)',
            'Электронные ресурсы',
            'Составные части документа (статьи: из книги, из газеты, из журнала, из продолжающихся изданий, рецензия)'];
$counterLi = count($literature);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reference list">
    <meta name="keywords" content="Reference list">
    <meta name="author" content="Joseph Parker">

    <title>Список литературы для курсовой, диплома, диссертации по ГОСТ.</title>

    <!--Styles-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body>
    <div class="container">
        <div class="row  m-b-20">
            <div class="m-t-50 main-block">
                <div class="m-b-15 feedback">
                    <p class="p-r-45"><a href="<?php echo $link2 ?>" class="color-blue">Вконтакте</a></p>
                    <p class="p-r-45"><a href="<?php echo $link ?>" class="color-blue">Отзывы и пожелания автору</a></p>
                </div>
                <p>Academic List поможет собрать список литературы для курсовой, диплома, диссертации по ГОСТ.</p>
                <p>Порядок нумерации в работе:</p>
                <ul>
                    <?php foreach ($HeadList as $item){
                        echo '<li class="wid-90">'.$item.'</li>';
                    }?>
                </ul>
                <p class="alert-text">Поля с заголовком оранжевого цвета обязательны для заполнения!</p>
                <noscript><div><p>Если вы видите все формы ввода сразу, значит у вас отключен JavaScript. Чтобы воспользоваться сервисом, нужно или использовать другой Браузер, или включить JavaScript.</p></div></noscript>
            </div>
        </div>

        <div class="row">
            <div class="form-block col-md-6 col-sm-12">
                <span>Тип источника</span><br>
                <select name="litType" id="litType" class="form-control">
                    <option>-</option>
                    <?php for ($key = 0; $key < $counterLi; $key++){
                        echo '<option value="'.$literature[$key].'">'.$literature_title[$key].'</option>';
                    }?>
                </select>
            </div>
        </div>
        
        <!--Oficial-->
        <div class="row p-l-0 official empty" id="official">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="officialConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="official_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span class="color-red">Cведения к названию</span><br>
                    <input type="text" class="form-input form-control" v-model="official_subtitle" placeholder="Закон, постановление, указ и др.">
                </div>
                <div class="form-block">
                    <span class="color-red">Дата принятия</span><br>
                    <input type="text" class="form-input form-control" v-model="official_acceptdate" placeholder="от 30 янв. 2002 г. № 1-ФКЗ">
                </div>
                <div class="form-block">
                    <span class="color-red">Название издания</span><br>
                    <input type="text" class="form-input form-control" v-model="official_pubname" placeholder="Собрание законодательства">
                </div>
                <div class="form-block">
                    <span class="color-red">Год  издания</span><br>
                    <input type="text" class="form-input form-control" v-model="official_pubdate" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <span>Номер (для журнала)</span><br>
                    <input type="text" class="form-input form-control" v-model="official_num" placeholder="5, (4 февр.) или 5">
                </div>
                <div class="form-block">
                    <span class="color-red">Страницы</span><br>
                    <input type="text" class="form-input form-control" v-model="official_pubpage" placeholder="С. 1485 – 1498 (ст. 375) или Ст. 375">
                </div>
                <div class="form-block">
                    <button @click="officialConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p><br>
                <p>{{ official_info }}</p>
            </div>
        </div>

        <!--Gost-->
        <div class="row p-l-0 gost empty" id="gost">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="gostConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_title" placeholder="Строительные нормы и правила, ГОСТ 7.9 – 77">
                </div>
                <div class="form-block">
                    <span class="color-red">Сведения к названию</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_subtitle" placeholder="Издания, гайки, нагрузки и т.д.">
                </div>
                <div class="form-block">
                    <span>Взамен</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_instead" placeholder="Взамен ГОСТ 7.53 – 86">
                </div>
                <div class="form-block">
                    <span class="color-red">Дата введения</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_enterdate" placeholder="28.04.2020 или период">
                </div>
                <div class="form-block">
                    <span class="color-red">Место издания</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_city" placeholder="Город">
                </div>
                <div class="form-block">
                    <span class="color-red">Издательство</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_public" placeholder="Без кавычек">
                </div>
                <div class="form-block">
                    <span class="color-red">Год издания</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_pubdate" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <span class="color-red">Количество страниц</span><br>
                    <input type="text" class="form-input form-control" v-model="gost_pubpage" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <button @click="gostConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p>
                <p>{{ gost_info }}</p>
            </div>
        </div>

        <!--Patent-->
        <div class="row p-l-0 patent empty" id="patent">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="patentConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Авторы</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_author" placeholder="Фамилия И. О. авторов через запятую">
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span>Правообладатель</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_holder" placeholder="Воронеж. науч.-исслед. ин-т связи">
                </div>
                <div class="form-block">
                    <span class="color-red">Номер</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_pubnum" placeholder="№ 2000131736/09">
                </div>
                <div class="form-block">
                    <span class="color-red">Заявлено</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_declared" placeholder="заявл. 28.04.20">
                </div>
                <div class="form-block">
                    <span class="color-red">Опубликовано</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_public" placeholder="опубл. 28.04.20">
                </div>
                <div class="form-block">
                    <span class="color-red">Бюллетень</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_publictext" placeholder="Бюл. № 12">
                </div>
                <div class="form-block">
                    <span class="color-red">Количество страниц</span><br>
                    <input type="text" class="form-input form-control" v-model="patent_pubpage" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <button @click="patentConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p>
                <p>{{ patent_info }}</p>
            </div>
        </div>

        <!--Info list-->
        <div class="row p-l-0 info_list empty" id="info_list">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="infoListConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Авторы</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_author" placeholder="И. О. Фамилия авторов через запятую">
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span class="color-red">Место издания</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_city" placeholder="Город">
                </div>
                <div class="form-block">
                    <span>Издательство</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_public" placeholder="Без кавычек">
                </div>
                <div class="form-block">
                    <span class="color-red">Год издания</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_pubdate" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <span class="color-red">Количество страниц</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_pubpage" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <span class="color-red">Дополнительно</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_other" placeholder="Информ. лист о чем?">
                </div>
                <div class="form-block">
                    <span>Номер</span><br>
                    <input type="text" class="form-input form-control" v-model="info_list_num" placeholder="N 71-62">
                </div>
                <div class="form-block">
                    <button @click="infoListConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p>
                <p>{{ info_itog }}</p>
            </div>
        </div>

         <!--Books-->
        <div class="row p-l-0 book empty" id="book">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="bookConcat" type="button" class="btn btn-success m-r-40">Готово</button>
                    <button class="btn btn-warning bookExample">Примеры</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Авторы</span><br>
                    <input type="text" class="form-input form-control" v-model="book_author" placeholder="И. О. Фамилия авторов через запятую">
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="book_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span>Учебное пособие</span><br>
                    <input type="text" class="form-input form-control" v-model="book_subtitle" placeholder="Пособие, методичка и т.д.">
                </div>
                <div class="form-block">
                    <span>Редакторы, переводчики, коллективы</span><br>
                    <input type="text" class="form-input form-control" v-model="book_subauthor" placeholder="ред. НЕ издательства, а книги">
                </div>
                <div class="form-block">
                    <span>Сведения об издании</span><br>
                    <input type="text" class="form-input form-control" v-model="book_publication" placeholder="Номер изд., переиздание, доп.">
                </div>
                <div class="form-block">
                    <span class="color-red">Место издания</span><br>
                    <input type="text" class="form-input form-control" v-model="book_city" placeholder="Город">
                </div>
                <div class="form-block">
                    <span class="color-red">Издательство</span><br>
                    <input type="text" class="form-input form-control" v-model="book_public" placeholder="Без кавычек">
                </div>
                <div class="form-block">
                    <span class="color-red">Год издания</span><br>
                    <input type="text" class="form-input form-control" v-model="book_pubdate" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <span class="color-red">Количество страниц</span><br>
                    <input type="text" class="form-input form-control" v-model="book_pubpage" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <button @click="bookConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p><br>
                <p>{{ book_info }}</p>
            </div>
        </div>

        <!--Many Books-->
        <div class="row p-l-0 mbook empty" id="mbook">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <p>Скоро</p>
                </div>
            </div>
        </div>

        <!--Disser-->
        <div class="row p-l-0 disser empty" id="disser">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <p>Скоро</p>
                </div>
            </div>
        </div>

        <!--Autodisser-->
        <div class="row p-l-0 autodisser empty" id="autodisser">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <p>Скоро</p>
                </div>
            </div>
        </div>

        <!--Electrolocal-->
        <div class="row p-l-0 electrolocal empty" id="electrolocal">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="electrolocalConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span>Авторы</span><br>
                    <input type="text" class="form-input form-control" v-model="electrolocal_author" placeholder="И. О. Фамилия авторов через запятую">
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="electrolocal_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span class="color-red">Информационный носитель</span><br>
                    <input type="text" class="form-input form-control" v-model="electrolocal_other" placeholder="CD-ROM и т.д.">
                </div>
                <div class="form-block">
                    <button @click="electrolocalConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p><br>
                <p>{{ info_electrolocal }}</p>
            </div>
        </div>

        <!--Electronet-->
        <div class="row p-l-0 electronet empty" id="electronet">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="electronetConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input  form-control" v-model="electronet_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span class="color-red">URL-адрес</span><br>
                    <input type="text" class="form-input  form-control" v-model="electronet_url" placeholder="Полная ссылка">
                </div>
                <div class="form-block">
                    <button @click="electronetConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p><br>
                <p>{{ info_electronet }}</p>
            </div>
        </div>

        <!--Doc part-->
        <div class="row p-l-0 doc_part empty" id="doc_part">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="docPartConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Сведения о статье</span><br>
                    <input type="text" class="form-input  form-control" v-model="doc_part_title" placeholder="Название">
                </div>
                <div class="form-block">
                    <span class="color-red">Сведения об источнике статьи</span><br>
                    <input type="text" class="form-input  form-control" v-model="doc_part_from" placeholder="Источник статьи">
                </div>
                <div class="form-block">
                    <span class="color-red">Сведения о местe статьи в документе</span><br>
                    <input type="text" class="form-input  form-control" v-model="doc_part_frompage" placeholder="Страницы. Только числа 5-12">
                </div>
                <div class="form-block">
                    <button @click="docPartConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p><br>
                <p>{{ info_doc_part }}</p>
            </div>
        </div>

        <!--Newspaper-->
        <div class="row p-l-0 newspaper empty" id="newspaper">
            <div class="col-md-6 m-b-35">
                <div class="form-block">
                    <button @click="newspaperConcat" type="button" class="btn btn-success">Готово</button>
                </div>
                <div class="form-block">
                    <span class="color-red">Авторы</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_author" placeholder="И. О. Фамилия авторов через запятую">
                </div>
                <div class="form-block">
                    <span class="color-red">Название</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_title" placeholder="Полное название">
                </div>
                <div class="form-block">
                    <span class="color-red">Название издания</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_pubname" placeholder="Газета/журнал">
                </div>
                <div class="form-block">
                    <span class="color-red">Год издания</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_pubdate" placeholder="2020">
                </div>
                <div class="form-block">
                    <span>День и месяц издания</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_pubday" placeholder="28 апреля">
                </div>
                <div class="form-block">
                    <span class="color-red">Номер издания</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_pubnum" placeholder="Только числа">
                </div>
                <div class="form-block">
                    <span class="color-red">Страницы в издании</span><br>
                    <input type="text" class="form-input form-control" v-model="newspaper_pubpage" placeholder="Только числа. 5 - 15">
                </div>
                <div class="form-block">
                    <button @click="newspaperConcat" type="button" class="btn btn-success">Готово</button>
                </div>
            </div>

            <div class="col-md-6 m-b-45">
                <p>Результат</p><br>
                <p>{{ info_newspaper }}</p>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>