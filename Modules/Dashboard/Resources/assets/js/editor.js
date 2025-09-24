import jQuery from 'jquery';

window.$ = window.jQuery = jQuery;
$(function () {
    const lang = document.documentElement.lang.substr(0, 2);
    $('.textarea-en').trumbowyg({
        lang: 'en',
        svgPath: route('home') + '/images/icons.svg',
        btnsDef: {
            image: {
                dropdown: ['upload'],
                ico: 'insertImage'
            }
        },
        btns: [
            ['fontsize'],
            ['fontfamily'],
            ['foreColor', 'backColor'],
            ['historyUndo', 'historyRedo'],
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['image'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ],
        plugins: {
            upload: {
                serverPath: route('dashboard.upload.image'),
                fileFieldName: 'image',
            },
            resizimg: {}
        }
    });
    $('.textarea-ar').trumbowyg({
        lang: 'ar',
        svgPath: route('home') + '/images/icons.svg',
        btnsDef: {
            image: {
                dropdown: ['upload'],
                ico: 'insertImage'
            }
        },
        btns: [
            ['fontsize'],
            ['fontfamily'],
            ['foreColor', 'backColor'],
            ['historyUndo', 'historyRedo'],
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['image'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ],
        plugins: {
            upload: {
                serverPath: route('dashboard.upload.image'),
                fileFieldName: 'image',
            },
            resizimg: {}
        }
    });
});
