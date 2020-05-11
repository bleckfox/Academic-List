$(document).ready(function() {
    $("select").on('change', function() {
        $(this).find("option:selected").each(function() {
            var item = $(this).attr("value");
            if (item) {
                $(".empty").not("." + item).hide();
                $("." + item).show();
            } else {
                $(".empty").hide();
            }

        });
    }).change();


    $('.bookExample').magnificPopup({
        items: {
            src: '<div class="white-popup"><p>Логопедия: учебник для студ. дефектолог. фак. пед. вузов / ред. Л.С. Волкова, С.Н. Шаховская. – 3-е изд., перераб. и доп. – Москва: Гуманит. изд. центр. ВЛАДОС, 2002. – 680 с.</p></div> ',
            type: 'inline',
        },
        closeMarkup: '<button type="button" class="btn btn-info mfp-close">Понятно</button>',
    });
});

var vue = new Vue({
    el: '#vueHeadList',
    data: {
        docs: [
            'Официальные и директивные материалы (Федеральные законы, постановления   Правительства, приказы, положения, рекомендации Министерства и ведомств РФ)',
            'Нормативно-технические документы (ГОСТы, СНиПы, САНПины и т.д.)',
            'Книги',
            'Неопубликованные материалы (диссертации, авторефераты)',
            'Электронные ресурсы',
            'Составные части документа (статьи: из книги, из газеты, из журнала, из продолжающихся изданий, рецензия)'],
    }
});

var vue2 = new Vue({
    el: '#vueList',
    data: {
        literature: {
            official: 'Официальные материалы',
            gost: 'Нормативно-технические документы',
            patent: 'Авторские свидетельства, патенты',
            info_list: 'Информационные листки',
            book: 'Книги',
            mbook: 'Многотомные издания',
            disser: 'Диссертация',
            autodisser: 'Автореферат диссертации',
            electrolocal: 'Электронный ресурс локального доступа (CD)',
            electronet: 'Электронный ресурс удаленного доступа (Internet)',
            doc_part: 'Составные части документа',
            newspaper: 'Статья из журнала',
        },
    }
});


var official = new Vue({
    el: '#official',
    data: {
        official_title:         '',
        official_subtitle:      '',
        official_acceptdate:    '',
        official_pubname:       '',
        official_pubdate:       '',
        official_num:           '',
        official_pubpage:       '',
        official_info:          '',
    },
    methods: {
        officialConcat: function () {
            official_title      = this.official_title       ? this.official_title       + ': '      : '';
            official_subtitle   = this.official_subtitle    ? this.official_subtitle    + ' '       : '';
            official_acceptdate = this.official_acceptdate  ? this.official_acceptdate  + ' // '    : '';
            official_pubname    = this.official_pubname     ? this.official_pubname     + '. - '    : '';
            official_pubdate    = this.official_pubdate     ? this.official_pubdate     + '. - '    : '';
            official_num        = this.official_num         ? this.official_num         + '. - '    : '';
            official_pubpage    = this.official_pubpage     ? this.official_pubpage     + '.'       : '';

            return this.official_info = official_title +
                                        official_subtitle +
                                        official_acceptdate +
                                        official_pubname +
                                        official_pubdate +
                                        official_num +
                                        official_pubpage;
        }
    },
});

var gost = new Vue({
    el: '#gost',
    data: {
        gost_title:      '',
        gost_subtitle:   '',
        gost_instead:    '',
        gost_enterdate:  '',
        gost_city:       '',
        gost_public:     '',
        gost_pubdate:    '',
        gost_pubpage:    '',
        gost_info:       '',
    },
    methods: {
        gostConcat: function (){
            title       = this.gost_title       ? this.gost_title       + ': '      : '';
            subtitle    = this.gost_subtitle    ? this.gost_subtitle    + '. - '    : '';
            instead     = this.gost_instead     ? this.gost_instead     + '; '      : '';
            enterdate   = this.gost_enterdate   ? this.gost_enterdate   + '. - '    : '';
            city        = this.gost_city        ? this.gost_city        + ': '      : '';
            publig      = this.gost_public      ? this.gost_public      + ', '      : '';
            pubdate     = this.gost_pubdate     ? this.gost_pubdate     + '. - '    : '';
            pubpage     = this.gost_pubpage     ? this.gost_pubpage     + ' c.'     : '';

            return this.gost_info =  title +
                                     subtitle +
                                     instead +
                                     enterdate +
                                     city +
                                     publig +
                                     pubdate +
                                     pubpage;
        }
    },
});

var patent = new Vue ({
    el: '#patent',
    data: {
        patent_author:      '',
        patent_title:       '',
        patent_holder:    '',
        patent_pubnum:      '',
        patent_declared:    '',
        patent_public:      '',
        patent_publictext:  '',
        patent_pubpage:     '',
        patent_info:        '',
    },
    methods: {
        patentConcat: function (){
            author      = this.patent_author        ? this.patent_author                    : '';
            title       = this.patent_title         ? this.patent_title         + ' / '     : '';
            holder      = this.patent_holder        ? this.patent_holder        + '. - '    : '';
            pubnum      = this.patent_pubnum        ? this.patent_pubnum        + '; '      : '';
            declared    = this.patent_declared      ? this.patent_declared      + '; '      : '';
            publip      = this.patent_public        ? this.patent_public        + ', '      : '';
            publictext  = this.patent_publictext    ? this.patent_publictext    + '. - '    : '';
            pubpage     = this.patent_pubpage       ? this.patent_pubpage       + ' c'      : '';

            isholder = this.patent_holder    ? '; ' :    '. - ';

            return this.patent_info = title +
                                      author + isholder +
                                      holder +
                                      pubnum +
                                      declared +
                                      publip +
                                      publictext +
                                      pubpage;
        }
    }
});

var info_list = new Vue ({
    el: '#info_list',
    data: {
        info_list_author    : '',
        info_list_title     : '',
        info_list_city      : '',
        info_list_public    : '',
        info_list_pubdate   : '',
        info_list_pubpage   : '',
        info_list_other     : '',
        info_list_num       : '',
        info_itog           : '',
    },
    methods: {
        infoListConcat: function () {
            isother = this.info_list_other ? ' - (': '';
            ispubnum = this.info_list_public || this.info_list_num ? ' / ': ').';

            author      = this.info_list_author     ? this.info_list_author     + '. '              : '';
            title       = this.info_list_title      ? this.info_list_title      + ' / '             : '';
            city        = this.info_list_city       ? this.info_list_city       + ', '              : '';
            publii      = this.info_list_public     ? this.info_list_public     + '; '              : '';
            pubdate     = this.info_list_pubdate    ? this.info_list_pubdate    + '. - '            : '';
            pubpage     = this.info_list_pubpage    ? this.info_list_pubpage    + ' c.'  + isother  : '';
            other       = this.info_list_other      ? this.info_list_other      + ispubnum          : '';
            num         = this.info_list_num        ? this.info_list_num        + ').'              : '';

            return this.info_itog = author +
                                    title +
                                    author + ' - ' +
                                    city +
                                    pubdate +
                                    pubpage +
                                    other +
                                    publii + num;
        }
    },
});

var book = new Vue({
    el: '#book',
    data: {
        book_author         : '',
        book_title          : '',
        book_subtitle       : '',
        book_subauthor      : '',
        book_publication    : '',
        book_city           : '',
        book_public         : '',
        book_pubdate        : '',
        book_pubpage        : '',
        book_other          : '',
        book_info           : '',
    },
    methods: {
        bookConcat: function () {
            author      = this.book_author      ? this.book_author               :  '';
            title       = this.book_title       ? this.book_title                :  '';
            subtitle    = this.book_subtitle    ? this.book_subtitle    + ' / '  :  '';
            subauthor   = this.book_subauthor   ? this.book_subauthor   + '. -  ':  '';
            publication = this.book_publication ? this.book_publication + '. -  ':  '';
            city        = this.book_city        ? this.book_city        + ': '   :  '';
            publi       = this.book_public      ? this.book_public      + ', '   :  '';
            pubdate     = this.book_pubdate     ? this.book_pubdate     + '. - ' :  '';
            pubpage     = this.book_pubpage     ? this.book_pubpage     + ' c.'  :  '';

            issubtitle = this.book_subtitle    ? ': ' :    ' / ';

            return this.book_info = author + '. ' +
                                    title + issubtitle +
                                    subtitle +
                                    author + '; ' +
                                    subauthor +
                                    publication +
                                    city + publi +
                                    pubdate + pubpage;
        }
    },
});

// Place for m_books, disser, autodisser

var electrolocal = new Vue ({
    el: '#electrolocal',
    data: {
        electrolocal_author     : '',
        electrolocal_title      : '',
        electrolocal_other      : '',
        info_electrolocal       : '',
    },
    methods: {
        electrolocalConcat: function () {
            author       = this.electrolocal_author     ? this.electrolocal_author      : '';
            title        = this.electrolocal_title      ? this.electrolocal_title       : '';
            other        = this.electrolocal_other      ? this.electrolocal_other + '.' : '';

            isauthor = this.electrolocal_author ? this.electrolocal_author + '. ' + title + ' / ' + this.electrolocal_author + '. - ': title;

            return this.info_electrolocal = isauthor + ' [Электронный ресурс]: ' + other;
        }
    }
});

var electronet = new Vue ({
    el: '#electronet',
    data: {
        electronet_title: '',
        electronet_url: '',
        info_electronet: '',
    },
    methods: {
        electronetConcat: function () {
            title        = this.electronet_title        ? this.electronet_title + ' [Электронный ресурс]: ': '';
            url          = this.electronet_url          ? this.electronet_url: '';

            return this.info_electronet = title + url;
        }
    }
});

var doc_part = new Vue ({
    el: '#doc_part',
    data: {
        doc_part_title      : '',
        doc_part_from       : '',
        doc_part_frompage   : '',
        info_doc_part       : '',
    },
    methods: {
        docPartConcat: function () {
            title      = this.doc_part_title       ? this.doc_part_title + ' // ': '';
            from       = this.doc_part_from        ? this.doc_part_from + '. - ': '';
            frompage   = this.doc_part_frompage    ? this.doc_part_frompage + ' c.': '';

            return this.info_doc_part = title + from + frompage;
        }
    }
});

var newspaper = new Vue ({
    el: '#newspaper',
    data: {
        newspaper_author    : '',
        newspaper_title     : '',
        newspaper_pubname   : '',
        newspaper_pubdate   : '',
        newspaper_pubday    : '',
        newspaper_pubnum    : '',
        newspaper_pubpage   : '',
        info_newspaper      : '',
    },
    methods: {
        newspaperConcat: function () {
            author    = this.newspaper_author     ? this.newspaper_author           : '';
            title     = this.newspaper_title      ? this.newspaper_title + ' / '    : '';
            pubname   = this.newspaper_pubname    ? this.newspaper_pubname + '. - ' : '';
            pubdate   = this.newspaper_pubdate    ? this.newspaper_pubdate + '. - ' : '';
            pubday    = this.newspaper_pubday     ? this.newspaper_pubday           : '';
            pubnum    = this.newspaper_pubnum     ? '№ ' + this.newspaper_pubnum   : '';
            pubpage   = this.newspaper_pubpage    ? 'C. ' + this.newspaper_pubpage  : '';

            ispubday = this.newspaper_pubday ? pubnum + ', ' + this.newspaper_pubday + '. - ': pubnum + '. - ';

            return this.info_newspaper = author + '. ' +
                                         title +
                                         author + ' // ' +
                                         pubname +
                                         pubdate +
                                         ispubday +
                                         pubpage;
        }
    }
});
