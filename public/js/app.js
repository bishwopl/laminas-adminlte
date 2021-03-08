(function ($) {
    'use strict';


    var storedClasses = {
        0: {
            selector: '.main-header',
            classesToAdd: new Array(),
            classesToRemove: new Array()
        },
        1: {
            selector: 'body',
            classesToAdd: new Array(),
            classesToRemove: new Array()
        },
        2: {
            selector: '.main-footer',
            classesToAdd: new Array(),
            classesToRemove: new Array()
        },
        3: {
            selector: '.main-sidebar',
            classesToAdd: new Array(),
            classesToRemove: new Array()
        },
        4: {
            selector: '.nav-sidebar',
            classesToAdd: new Array(),
            classesToRemove: new Array()
        },
        5: {
            selector: '.brand-link',
            classesToAdd: new Array(),
            classesToRemove: new Array()
        }
    };

    loadSettingFromStore(storedClasses);

    function clearClasses(selectorArray, classesArray) {
        $.each(selectorArray, function (indexS, selector) {
            $.each(classesArray, function (indexC, className) {
                if ($(selector).hasClass(className)) {
                    $(selector).removeClass(className);
                }
            });
        });
        return;
    }

    function storeSettingChange(args, emptyStoredClasses) {
        var storedClasses = new Array();
        storedClasses = JSON.parse(localStorage["storedClasses"] || null);
        if (storedClasses === null) {
            storedClasses = emptyStoredClasses;
        }
        $.each(storedClasses, function (indexS, a) {
            if (a.selector === args.selector) {

                if (args.classToRemove !== '') {
                    if (storedClasses[indexS].classesToAdd.indexOf(args.classToRemove) !== -1) {
                        storedClasses[indexS].classesToAdd.splice(storedClasses[indexS].classesToAdd.indexOf(args.classToRemove), 1);
                    }
                    if (storedClasses[indexS].classesToRemove.indexOf(args.classToRemove) === -1) {
                        storedClasses[indexS].classesToRemove.push(args.classToRemove);
                    }

                }

                if (args.classToAdd !== '') {
                    if (storedClasses[indexS].classesToRemove.indexOf(args.classToAdd) !== -1) {
                        storedClasses[indexS].classesToRemove.splice(storedClasses[indexS].classesToRemove.indexOf(args.classToAdd), 1);
                    }

                    if (storedClasses[indexS].classesToAdd.indexOf(args.classToAdd) === -1) {
                        storedClasses[indexS].classesToAdd.push(args.classToAdd);
                    }

                }

                localStorage.setItem("storedClasses", JSON.stringify(storedClasses));
                return false;
            }
        });
    }

    function loadSettingFromStore(emptyStoredClasses) {

        var storedClasses = new Array();
        storedClasses = JSON.parse(localStorage["storedClasses"] || null);
        if (storedClasses === null) {
            storedClasses = emptyStoredClasses;
        } else {
            $.each(storedClasses, function (index, a) {
                var add = a.classesToAdd;
                var remove = a.classesToRemove;
                var selector = a.selector;

                $.each(add, function (index, className) {
                    $(selector).addClass(className);
                });

                $.each(remove, function (index, className) {
                    $(selector).removeClass(className);
                });
            });
        }
    }

    function removeCustomization(emptyStoredClasses) {
        localStorage.setItem("storedClasses", JSON.stringify(emptyStoredClasses));
        window.location.reload();
    }

    var $sidebar = $('.control-sidebar');
    var $container = $('<div />', {
        class: 'p-3 control-sidebar-content'
    });

    $sidebar.append($container);

    var navbar_dark_skins = [
        'navbar-primary',
        'navbar-secondary',
        'navbar-info',
        'navbar-success',
        'navbar-danger',
        'navbar-indigo',
        'navbar-purple',
        'navbar-pink',
        'navbar-navy',
        'navbar-lightblue',
        'navbar-teal',
        'navbar-cyan',
        'navbar-dark',
        'navbar-gray-dark',
        'navbar-gray'
    ];

    var navbar_light_skins = [
        'navbar-light',
        'navbar-warning',
        'navbar-white',
        'navbar-orange'
    ];

    $container.append(
            '<h5>Customize</h5><hr class="mb-2"/>'
            );

    var $no_border_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('border-bottom-0'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-header').addClass('border-bottom-0');
            storeSettingChange({
                selector: '.main-header',
                classToAdd: 'border-bottom-0',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.main-header').removeClass('border-bottom-0');
            storeSettingChange({
                selector: '.main-header',
                classToAdd: '',
                classToRemove: 'border-bottom-0'
            }, storedClasses);
        }
    });
    var $no_border_container = $('<div />', {'class': 'mb-1'}).append($no_border_checkbox).append('<span>No Navbar border</span>');
    $container.append($no_border_container);

    var $text_sm_body_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('text-sm'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('text-sm');
            storeSettingChange({
                selector: 'body',
                classToAdd: 'text-sm',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('body').removeClass('text-sm');
            storeSettingChange({
                selector: 'body',
                classToAdd: '',
                classToRemove: 'text-sm'
            }, storedClasses);
        }
    });
    var $text_sm_body_container = $('<div />', {'class': 'mb-1'}).append($text_sm_body_checkbox).append('<span>Body small text</span>');
    $container.append($text_sm_body_container);

    var $text_sm_header_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('text-sm'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-header').addClass('text-sm');
            storeSettingChange({
                selector: '.main-header',
                classToAdd: 'text-sm',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.main-header').removeClass('text-sm');
            storeSettingChange({
                selector: '.main-header',
                classToAdd: '',
                classToRemove: 'text-sm'
            }, storedClasses);
        }
    });
    var $text_sm_header_container = $('<div />', {'class': 'mb-1'}).append($text_sm_header_checkbox).append('<span>Navbar small text</span>');
    $container.append($text_sm_header_container);

    var $text_sm_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('text-sm'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('text-sm');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: 'text-sm',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.nav-sidebar').removeClass('text-sm');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: '',
                classToRemove: 'text-sm'
            }, storedClasses);
        }
    });
    var $text_sm_sidebar_container = $('<div />', {'class': 'mb-1'}).append($text_sm_sidebar_checkbox).append('<span>Sidebar nav small text</span>');
    $container.append($text_sm_sidebar_container);

    var $text_sm_footer_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-footer').hasClass('text-sm'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-footer').addClass('text-sm');
            storeSettingChange({
                selector: '.main-footer',
                classToAdd: 'text-sm',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.main-footer').removeClass('text-sm');
            storeSettingChange({
                selector: '.main-footer',
                classToAdd: '',
                classToRemove: 'text-sm'
            }, storedClasses);
        }
    });
    var $text_sm_footer_container = $('<div />', {'class': 'mb-1'}).append($text_sm_footer_checkbox).append('<span>Footer small text</span>');
    $container.append($text_sm_footer_container);

    var $flat_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-flat'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-flat');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: 'nav-flat',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.nav-sidebar').removeClass('nav-flat');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: '',
                classToRemove: 'nav-flat'
            }, storedClasses);
        }
    });
    var $flat_sidebar_container = $('<div />', {'class': 'mb-1'}).append($flat_sidebar_checkbox).append('<span>Sidebar nav flat style</span>');
    $container.append($flat_sidebar_container);

    var $legacy_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-legacy'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-legacy');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: 'nav-legacy',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.nav-sidebar').removeClass('nav-legacy');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: '',
                classToRemove: 'nav-legacy'
            }, storedClasses);
        }
    });
    var $legacy_sidebar_container = $('<div />', {'class': 'mb-1'}).append($legacy_sidebar_checkbox).append('<span>Sidebar nav legacy style</span>');
    $container.append($legacy_sidebar_container);

    var $compact_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-compact'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-compact');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: 'nav-compact',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.nav-sidebar').removeClass('nav-compact');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: '',
                classToRemove: 'nav-compact'
            }, storedClasses);
        }
    });
    var $compact_sidebar_container = $('<div />', {'class': 'mb-1'}).append($compact_sidebar_checkbox).append('<span>Sidebar nav compact</span>');
    $container.append($compact_sidebar_container);

    var $child_indent_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-child-indent'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-child-indent');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: 'nav-child-indent',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.nav-sidebar').removeClass('nav-child-indent');
            storeSettingChange({
                selector: '.nav-sidebar',
                classToAdd: '',
                classToRemove: 'nav-child-indent'
            }, storedClasses);
        }
    });
    var $child_indent_sidebar_container = $('<div />', {'class': 'mb-1'}).append($child_indent_sidebar_checkbox).append('<span>Sidebar nav child indent</span>');
    $container.append($child_indent_sidebar_container);

    var $no_expand_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-sidebar').hasClass('sidebar-no-expand'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-sidebar').addClass('sidebar-no-expand');
            storeSettingChange({
                selector: '.main-sidebar',
                classToAdd: 'sidebar-no-expand',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.main-sidebar').removeClass('sidebar-no-expand');
            storeSettingChange({
                selector: '.main-sidebar',
                classToAdd: '',
                classToRemove: 'sidebar-no-expand'
            }, storedClasses);
        }
    });
    var $no_expand_sidebar_container = $('<div />', {'class': 'mb-1'}).append($no_expand_sidebar_checkbox).append('<span>Main Sidebar disable hover/focus auto expand</span>');
    $container.append($no_expand_sidebar_container);

    var $text_sm_brand_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.brand-link').hasClass('text-sm'),
        'class': 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.brand-link').addClass('text-sm');
            storeSettingChange({
                selector: '.brand-link',
                classToAdd: 'text-sm',
                classToRemove: ''
            }, storedClasses);
        } else {
            $('.brand-link').removeClass('text-sm');
            storeSettingChange({
                selector: '.brand-link',
                classToAdd: '',
                classToRemove: 'text-sm'
            }, storedClasses);
        }
    });
    var $text_sm_brand_container = $('<div />', {'class': 'mb-4'}).append($text_sm_brand_checkbox).append('<span>Brand small text</span>');
    $container.append($text_sm_brand_container);

    $container.append('<h6>Navbar Variants</h6>');

    var $navbar_variants = $('<div />', {
        'class': 'd-flex'
    });
    var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins);
    var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function (e) {
        var color = $(this).data('color');
        var $main_header = $('.main-header');
        $main_header.removeClass('navbar-dark').removeClass('navbar-light');

        storeSettingChange({
            selector: '.main-header',
            classToAdd: '',
            classToRemove: 'navbar-dark'
        }, storedClasses);

        storeSettingChange({
            selector: '.main-header',
            classToAdd: '',
            classToRemove: 'navbar-light'
        }, storedClasses);

        navbar_all_colors.map(function (color) {
            $main_header.removeClass(color);

            storeSettingChange({
                selector: '.main-header',
                classToAdd: '',
                classToRemove: color
            }, storedClasses);

        });

        if (navbar_dark_skins.indexOf(color) > -1) {
            $main_header.addClass('navbar-dark');

            storeSettingChange({
                selector: '.main-header',
                classToAdd: 'navbar-dark',
                classToRemove: ''
            }, storedClasses);

        } else {
            $main_header.addClass('navbar-light');
            storeSettingChange({
                selector: '.main-header',
                classToAdd: 'navbar-light',
                classToRemove: ''
            }, storedClasses);

        }

        $main_header.addClass(color);
        storeSettingChange({
            selector: '.main-header',
            classToAdd: color,
            classToRemove: ''
        }, storedClasses);

    });

    $navbar_variants.append($navbar_variants_colors);

    $container.append($navbar_variants);

    var sidebar_colors = [
        'bg-primary',
        'bg-warning',
        'bg-info',
        'bg-danger',
        'bg-success',
        'bg-indigo',
        'bg-lightblue',
        'bg-navy',
        'bg-purple',
        'bg-fuchsia',
        'bg-pink',
        'bg-maroon',
        'bg-orange',
        'bg-lime',
        'bg-teal',
        'bg-olive'
    ];

    var accent_colors = [
        'accent-primary',
        'accent-warning',
        'accent-info',
        'accent-danger',
        'accent-success',
        'accent-indigo',
        'accent-lightblue',
        'accent-navy',
        'accent-purple',
        'accent-fuchsia',
        'accent-pink',
        'accent-maroon',
        'accent-orange',
        'accent-lime',
        'accent-teal',
        'accent-olive'
    ];

    var sidebar_skins = [
        'sidebar-dark-primary',
        'sidebar-dark-warning',
        'sidebar-dark-info',
        'sidebar-dark-danger',
        'sidebar-dark-success',
        'sidebar-dark-indigo',
        'sidebar-dark-lightblue',
        'sidebar-dark-navy',
        'sidebar-dark-purple',
        'sidebar-dark-fuchsia',
        'sidebar-dark-pink',
        'sidebar-dark-maroon',
        'sidebar-dark-orange',
        'sidebar-dark-lime',
        'sidebar-dark-teal',
        'sidebar-dark-olive',
        'sidebar-light-primary',
        'sidebar-light-warning',
        'sidebar-light-info',
        'sidebar-light-danger',
        'sidebar-light-success',
        'sidebar-light-indigo',
        'sidebar-light-lightblue',
        'sidebar-light-navy',
        'sidebar-light-purple',
        'sidebar-light-fuchsia',
        'sidebar-light-pink',
        'sidebar-light-maroon',
        'sidebar-light-orange',
        'sidebar-light-lime',
        'sidebar-light-teal',
        'sidebar-light-olive'
    ];

    $container.append('<h6>Accent Color Variants</h6>');
    var $accent_variants = $('<div />', {
        'class': 'd-flex'
    });
    $container.append($accent_variants);
    $container.append(createSkinBlock(accent_colors, function () {
        var color = $(this).data('color');
        var accent_class = color;
        var $body = $('body');
        accent_colors.map(function (skin) {
            $body.removeClass(skin);
            storeSettingChange({
                selector: 'body',
                classToAdd: '',
                classToRemove: skin
            }, storedClasses);
        });

        $body.addClass(accent_class);
        storeSettingChange({
            selector: 'body',
            classToAdd: accent_class,
            classToRemove: ''
        }, storedClasses);
    }));

    $container.append('<h6>Dark Sidebar Variants</h6>');
    var $sidebar_variants_dark = $('<div />', {
        'class': 'd-flex'
    });
    $container.append($sidebar_variants_dark);
    $container.append(createSkinBlock(sidebar_colors, function () {
        var color = $(this).data('color');
        var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '');
        var $sidebar = $('.main-sidebar');
        sidebar_skins.map(function (skin) {
            $sidebar.removeClass(skin);
            storeSettingChange({
                selector: '.main-sidebar',
                classToAdd: '',
                classToRemove: skin
            }, storedClasses);
        });

        $sidebar.addClass(sidebar_class);
        storeSettingChange({
            selector: '.main-sidebar',
            classToAdd: sidebar_class,
            classToRemove: ''
        }, storedClasses);
    }));

    $container.append('<h6>Light Sidebar Variants</h6>');
    var $sidebar_variants_light = $('<div />', {
        'class': 'd-flex'
    });
    $container.append($sidebar_variants_light);
    $container.append(createSkinBlock(sidebar_colors, function () {
        var color = $(this).data('color');
        var sidebar_class = 'sidebar-light-' + color.replace('bg-', '');
        var $sidebar = $('.main-sidebar');
        sidebar_skins.map(function (skin) {
            $sidebar.removeClass(skin);
            storeSettingChange({
                selector: '.main-sidebar',
                classToAdd: '',
                classToRemove: skin
            }, storedClasses);
        });

        $sidebar.addClass(sidebar_class);
        storeSettingChange({
            selector: '.main-sidebar',
            classToAdd: sidebar_class,
            classToRemove: ''
        }, storedClasses);
    }));

    var logo_skins = navbar_all_colors;
    $container.append('<h6>Brand Logo Variants</h6>');
    var $logo_variants = $('<div />', {
        'class': 'd-flex'
    });
    $container.append($logo_variants);
    var $clear_btn = $('<a />', {
        href: 'javascript:void(0)'
    }).text('clear').on('click', function () {
        var $logo = $('.brand-link');
        logo_skins.map(function (skin) {
            $logo.removeClass(skin);
        });
        removeCustomization(storedClasses);
    });
    $container.append(createSkinBlock(logo_skins, function () {
        var color = $(this).data('color');
        var $logo = $('.brand-link');
        logo_skins.map(function (skin) {
            $logo.removeClass(skin);
            storeSettingChange({
                selector: '.brand-link',
                classToAdd: '',
                classToRemove: skin
            }, storedClasses);
        });
        $logo.addClass(color);
        storeSettingChange({
            selector: '.brand-link',
            classToAdd: color,
            classToRemove: ''
        }, storedClasses);
    }).append($clear_btn));

    function createSkinBlock(colors, callback) {
        var $block = $('<div />', {
            'class': 'd-flex flex-wrap mb-3'
        });

        colors.map(function (color) {
            var $color = $('<div />', {
                'class': (typeof color === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-') + ' elevation-2'
            });

            $block.append($color);

            $color.data('color', color);

            $color.css({
                width: '40px',
                height: '20px',
                borderRadius: '25px',
                marginRight: 10,
                marginBottom: 10,
                opacity: 0.8,
                cursor: 'pointer'
            });

            $color.hover(function () {
                $(this).css({opacity: 1}).removeClass('elevation-2').addClass('elevation-4');
            }, function () {
                $(this).css({opacity: 0.8}).removeClass('elevation-4').addClass('elevation-2');
            });

            if (callback) {
                $color.on('click', callback);
            }
        });

        return $block;
    }

    $('.product-image-thumb').on('click', function () {
        const image_element = $(this).find('img');
        $('.product-image').prop('src', $(image_element).attr('src'));
        $('.product-image-thumb.active').removeClass('active');
        $(this).addClass('active');
    });

    if (Boolean(localStorage.getItem("sidebar-toggle-collapsed"))) {
        $("body").removeClass('sidebar-collapse');
    } else {
        $("body").addClass('sidebar-collapse');
    }

    $('.sidebar-toggle').click(function () {

        if (Boolean(localStorage.getItem("sidebar-toggle-collapsed"))) {
            localStorage.setItem("sidebar-toggle-collapsed", "");
        } else {
            localStorage.setItem("sidebar-toggle-collapsed", "1");
        }
    });

})(jQuery);
