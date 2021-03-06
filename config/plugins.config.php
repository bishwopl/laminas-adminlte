<?php

use LaminasAdminLTE\ThemeOptions\PluginOption;

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */
return [
    PluginOption::$bootstrapColorpicker => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
            ],
        ],
    ],
    PluginOption::$bootstrapSlider => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/bootstrap-slider/bootstrap-slider.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/bootstrap-slider/css/bootstrap-slider.min.css',
            ],
        ],
    ],
    PluginOption::$bootstrapSwitch => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/bootstrap-switch/js/bootstrap-switch.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css',
            ],
        ],
    ],
    PluginOption::$bootstrap4Duallistbox => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
            ],
        ],
        
    ],
    PluginOption::$bsCustomFileInput => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/bs-custom-file-input/bs-custom-file-input.min.js',
            ],
        ],
    ],
    PluginOption::$chartJs => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/chart.js/Chart.bundle.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/chart.js/Chart.min.css',
            ],
        ],
    ],
    PluginOption::$datatables => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => true,
                'isInlineScript' => true,
                'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => true,
                'isInlineScript' => true,
                'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => true,
                'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesAutofill => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-autofill/js/dataTables.autoFill.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-autofill/css/autoFill.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesBs4 => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesButtons => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-buttons/js/buttons.colVis.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-buttons/js/buttons.html5.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-buttons/js/buttons.print.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-buttons/js/dataTables.buttons.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesColreorder => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-colreorder/js/colReorder.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-colreorder/js/dataTables.colReorder.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesFixedcolumns => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesFixedheader => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesKeytable => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-keytable/js/keyTable.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-keytable/js/dataTables.keyTable.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-keytable/css/keyTable.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesResponsive => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-responsive/js/dataTables.responsive.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesRowgroup => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-rowgroup/js/rowGroup.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-rowgroup/js/dataTables.rowGroup.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-rowgroup/css/rowGroup.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesRowreorder => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-rowreorder/js/rowReorder.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-rowreorder/js/dataTables.rowReorder.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-rowreorder/css/rowReorder.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesScroller => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-scroller/js/scroller.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-scroller/js/dataTables.scroller.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-scroller/css/scroller.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$datatablesSelect => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-select/js/select.bootstrap4.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/datatables-select/js/dataTables.select.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/datatables-select/css/select.bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$daterangepicker => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/daterangepicker/daterangepicker.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/daterangepicker/daterangepicker.css',
            ],
        ],
    ],
    PluginOption::$ekkoLightbox => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/ekko-lightbox/ekko-lightbox.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/ekko-lightbox/ekko-lightbox.css',
            ],
        ],
    ],
    PluginOption::$fastclick => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/fastclick/fastclick.js',
            ],
        ],
    ],
    PluginOption::$filterizr => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/filterizr/vanilla.filterizr.min.js',
            ],
        ],
    ],
    PluginOption::$flagIconCss => [
        'active' => false,
        'files' => [
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/flag-icon-css/css/flag-icon.min.css',
            ],
        ],
    ],
    PluginOption::$flot => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/flot/jquery.flot.js',
            ],
        ],
    ],
    PluginOption::$flotOld => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/flot-old/jquery.flot.min.js',
            ],
        ],
    ],
    PluginOption::$fontawesomeFree => [
        'active' => false,
        'files' => [
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/fontawesome-free/css/all.min.css',
            ],
        ],
    ],
    PluginOption::$fullcalendar => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/fullcalendar/main.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/fullcalendar/main.min.css',
            ],
        ],
    ],
    PluginOption::$fullcalendarBootstrap => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/fullcalendar-bootstrap/main.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/fullcalendar-bootstrap/main.min.css',
            ],
        ],
    ],
    PluginOption::$fullcalendarDaygrid => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/fullcalendar-daygrid/main.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/fullcalendar-daygrid/main.min.css',
            ],
        ],
    ],
    PluginOption::$fullcalendarInteraction => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/fullcalendar-interaction/main.min.js',
            ],
        ],
    ],
    PluginOption::$fullcalendarTimegrid => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/fullcalendar-timegrid/main.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/fullcalendar-timegrid/main.min.css',
            ],
        ],
    ],
    PluginOption::$icheckBootstrap => [
        'active' => false,
        'files' => [
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
            ],
        ],
    ],
    PluginOption::$inputmask => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/inputmask/jquery.inputmask.bundle.js',
            ],
        ],
    ],
    PluginOption::$ionRangeslider => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/ion-rangeslider/js/ion.rangeSlider.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/ion-rangeslider/css/ion.rangeSlider.min.css',
            ],
        ],
    ],
    PluginOption::$jquery => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => false,
                'location' => 'plugins/jquery/jquery.min.js',
            ],
        ],
    ],
    PluginOption::$jquerySlim => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jquery/jquery.slim.min.js',
            ],
        ],
    ],
    PluginOption::$jqueryKnob => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jquery-knob/jquery.knob.min.js',
            ],
        ],
    ],
    PluginOption::$jqueryMapael => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jquery-mapael/jquery.mapael.min.js',
            ],
        ],
    ],
    PluginOption::$jqueryMousewheel => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jquery-mousewheel/jquery.mousewheel.js',
            ],
        ],
    ],
    PluginOption::$jqueryUi => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => false,
                'location' => 'plugins/jquery-ui/jquery-ui.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/jquery-ui/jquery-ui.structure.min.css',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/jquery-ui/jquery-ui.theme.min.css',
            ],
        ],
    ],
    PluginOption::$jqueryValidation => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jquery-validation/jquery.validate.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jquery-validation/additional-methods.min.js',
            ],
        ],
    ],
    PluginOption::$jqvmap => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jqvmap/jquery.vmap.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/jqvmap/jqvmap.min.css',
            ],
        ],
    ],
    PluginOption::$jsgrid => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jsgrid/jsgrid.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/jsgrid/jsgrid.min.css',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/jsgrid/jsgrid-theme.min.css',
            ],
        ],
    ],
    PluginOption::$jszip => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/jszip/jszip.min.js',
            ],
        ],
    ],
    PluginOption::$moment => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/moment/moment.min.js',
            ],
        ],
    ],
    PluginOption::$overlayScrollbars => [
        'active' => true,
        'files' => [
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
            ],
        ],
    ],
    PluginOption::$paceProgress => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/pace-progress/pace.min.js',
            ],
        ],
    ],
    PluginOption::$pdfmake => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/pdfmake/pdfmake.min.js',
            ],
        ],
    ],
    PluginOption::$popper => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/popper/popper.min.js',
            ],
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/popper/popper-utils.min.js',
            ],
        ],
    ],
    PluginOption::$raphael => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/raphael/raphael.min.js',
            ],
        ],
    ],
    PluginOption::$select2 => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/select2/js/select2.full.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/select2/css/select2.min.css',
            ],
        ],
    ],
    PluginOption::$select2Bootstrap4Theme => [
        'active' => false,
        'files' => [
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
            ],
        ],
    ],
    PluginOption::$sparklines => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/sparklines/sparkline.js',
            ],
        ],
    ],
    PluginOption::$summernote => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/summernote/summernote-bs4.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/summernote/summernote.min.css',
            ],
        ],
    ],
    PluginOption::$sweetalert2 => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/sweetalert2/sweetalert2.all.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/sweetalert2/sweetalert2.min.css',
            ],
        ],
    ],
    PluginOption::$sweetalert2ThemeBootstrap4 => [
        'active' => false,
        'files' => [
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
            ],
        ],
    ],
    PluginOption::$tempusdominusBootstrap4 => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
            ],
        ],
    ],
    PluginOption::$toastr => [
        'active' => false,
        'files' => [
            [
                'type' => 'js',
                'isFromCDN' => false,
                'isInlineScript' => true,
                'location' => 'plugins/toastr/toastr.min.js',
            ],
            [
                'type' => 'css',
                'isFromCDN' => false,
                'location' => 'plugins/toastr/toastr.min.css',
            ],
        ],
    ],
];
