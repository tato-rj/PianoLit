require('./bootstrap');
require('inputmask/dist/jquery.inputmask.bundle.js');
require('./helpers/cookie');
require('./helpers/time');
require('./helpers/string');
require('./helpers/display');
require('./helpers/extensions');
require('./helpers/charts');
require('./cropper/SimpleCropper');
require('./quickchart/ChartBootstrap');
require('./quickchart/ChartFactory');
require('./quickchart/QuickChart');
require('./datatable/DataTable');
require('./datatable/DataTableRaw');
require('./components/delete');
require('./components/toggle');
require('./components/forms');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': app.csrfToken
    }
});
