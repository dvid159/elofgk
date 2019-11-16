'use strict'

  $(document).ready(function() {

        $('.sidenav').sidenav();
        $('.collapsible').collapsible();
        $('.modal').modal();
        $('.datepicker').datepicker({
            container: 'body',
            format: 'yyyy-mm-dd',
            i18n: {
                cancel: 'Cancelar',
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                    'Nov', 'Dic'
                ],
                weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],

            }
        });
        $('select').formSelect();
        $('.dropdown-trigger').dropdown();
        $('.modal').modal();
        $('.tabs').tabs();
    });
