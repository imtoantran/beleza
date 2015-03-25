var lang_vi = {
    "sZeroRecords" : "Không có dữ liệu nào cả.",
    "sSearch" : "Tìm kiếm: ",
    "sLengthMenu" : "Hiển thị &nbsp;&nbsp; _MENU_ &nbsp;&nbsp; dòng.",
    "sInfo" : "Hiển thị _START_ đến _END_ của _TOTAL_ dòng.",
    "sInfoEmpty" : "Hiển thị 0 đến 0 của 0 dòng."
};
current = new Date();
var saletable = null;
var servicetable = null;
var date = new Date();
now = date.getFullYear() + '-' + eval(date.getMonth() + 1) + '-' + date.getDate();







// Source: http://stackoverflow.com/questions/497790
var dates = {
    convert: function (d) {
        // Converts the date in d to a date-object. The input can be:
        //   a date object: returned without modification
        //  an array      : Interpreted as [year,month,day]. NOTE: month is 0-11.
        //   a number     : Interpreted as number of milliseconds
        //                  since 1 Jan 1970 (a timestamp) 
        //   a string     : Any format supported by the javascript engine, like
        //                  "YYYY/MM/DD", "MM/DD/YYYY", "Jan 31 2009" etc.
        //  an object     : Interpreted as an object with year, month and date
        //                  attributes.  **NOTE** month is 0-11.
        return (
            d.constructor === Date ? d :
                d.constructor === Array ? new Date(d[0], d[1], d[2]) :
                    d.constructor === Number ? new Date(d) :
                        d.constructor === String ? new Date(d) :
                            typeof d === "object" ? new Date(d.year, d.month, d.date) :
                                NaN
        );
    },
    compare: function (a, b) {
        // Compare two dates (could be of any type supported by the convert
        // function above) and returns:
        //  -1 : if a < b
        //   0 : if a = b
        //   1 : if a > b
        // NaN : if a or b is an illegal date
        // NOTE: The code inside isFinite does an assignment (=).
        return (
            isFinite(a = this.convert(a).valueOf()) &&
            isFinite(b = this.convert(b).valueOf()) ?
            (a > b) - (a < b) :
                NaN
        );
    },
    inRange: function (d, start, end) {
        // Checks if date in d is between dates in start and end.
        // Returns a boolean or NaN:
        //    true  : if d is between start and end (inclusive)
        //    false : if d is before start or after end
        //    NaN   : if one or more of the dates is illegal.
        // NOTE: The code inside isFinite does an assignment (=).
        return (
            isFinite(d = this.convert(d).valueOf()) &&
            isFinite(start = this.convert(start).valueOf()) &&
            isFinite(end = this.convert(end).valueOf()) ?
            start <= d && d <= end :
                NaN
        );
    }
}

var SaleReport = function () {
    var xhrGet_sales_report = function () {
        $('#dashboard-report-range').daterangepicker({
                //opens: (App.isRTL() ? 'right' : 'left'),
                startDate: moment().subtract('days', 7),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2099',
                dateLimit: {
                    days: 60
                },
                showDropdowns: false,
                showWeekNumbers: false,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    '7 Ngày trước': [moment().subtract('days', 6), moment()],
                    '30 Ngày trước': [moment().subtract('days', 29), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
                    '6 tháng trước': [moment().subtract('month', 7).startOf('month'), moment().subtract('month', 1).endOf('month')],
                },
                buttonClasses: ['btn'],
                applyClass: 'blue',
                cancelClass: 'default',
                format: 'DD/MM/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Chọn',
                    fromLabel: 'Từ',
                    toLabel: 'Đến',
                    customRangeLabel: 'Tùy chọn',
                    daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    firstDay: 1
                }
            },
            // Chuyển định dạng ngày trước khi gửi request
            function (start, end) {
                var printed_date = $(".printed-date").find('.date');
                printed_date.text(moment().format("DD/MM/YYYY HH:mm"));

                var sr_bsg = $("#sale_report_by_service_group").find('tbody');
                var sr_ts = $("#sale_report_top_service").find('tbody');

                // clear report
                sr_bsg.html('');
                sr_ts.html('');

                $('#dashboard-report-range span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
                $('.period').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));

                var html = '<tr>'
                    + '<td>:name</td>'
                    + '<td>:value đ</td>'
                    + '<td>:count</td>'
                    + '</tr>';

                var out = '';

                var from = start.format('YYYY-MM-DD');
                var to = end.format('YYYY-MM-DD');
                var url = URL + 'admincp_report/general';
                $.get(url, {'from': from, 'to': to}, function (data) {
                    $(".totalBooking_value").text(data['totalBooking']['value'] + ' đ');
                    $(".totalBooking_count").text(data['totalBooking']['count'] + ' lượt booking');
                    $(".totalEvoucher_value").text(data['totalEvoucher']['value'] + ' đ');
                    $(".totalEvoucher_count").text(data['totalEvoucher']['count'] + ' Evoucher');
                    $(".totalGiftvoucher_value").text(data['totalGiftvoucher']['value'] + ' đ');
                    $(".totalGiftvoucher_count").text(data['totalGiftvoucher']['count'] + ' Gift Voucher');
                    $(".totalSale_value").text(data['totalSale'] + ' đ');

                }, 'json');
            });

        $('#dashboard-report-range span').html(moment().subtract('days', 6).format('DD/MM/YYYY') + ' - ' + moment().format('DD/MM/YYYY'));
        $('#dashboard-report-range').show();
        $('.daterangepicker .ranges ul li:nth-child(3)').click();
    };
    return {
        //main function
        init: function () {
            xhrGet_sales_report();
        }
    }
}();

$(document).ready(function () {
    var servicetable = $(".service-sale-details").DataTable({
        "processing": true,
        ajax: URL + 'admincp_report/service_sale_report?from=0000-00-00&to='+now,
        "order": [4, 'desc']
    });
    var saletable = $(".user-sale-details").DataTable({
        "processing": true,
        ajax: URL + 'admincp_report/sale_report?from=0000-00-00&to='+now,
        "order": [4, 'desc']
    });
    /* load service sale report */
    var service_sale_report = function (from, to) {
        if (from * to == 'undefined') {
            return;
        }
        servicetable.ajax.url( URL + 'admincp_report/service_sale_report?from='+from+'&to='+to).load();
    };
    /* load service sale report */

    /* load sale report */
    sale_report = function (from, to) {
        if (from * to == 'undefined') {
            return;
        }
        saletable.ajax.url( URL + 'admincp_report/sale_report?from='+from+'&to='+to).load();
    };

    /* load sale report */

    SaleReport.init();    
    $(".from").datepicker({
        //defaultDate: "+1w",
        //changeMonth: true,
        //numberOfMonths: 1,        
        onClose: function (selectedDate, inst) {
            $(".to").datepicker("option", "minDate", selectedDate);
            $(".to").datepicker("option", "maxDate", current);
            // from = inst.selecteYear+'-'+inst.selectedMonth+'-'+ inst.selectedDay;
            t = $(".to").datepicker("getDate");
            if(t == null)
                return;
            to = t.getFullYear() + '-' + eval(t.getMonth() + 1) + '-' + t.getDate();
            sale_report(selectedDate, to);
        },
        maxDate: current,
        dateFormat: 'yy-mm-dd',
    });

    $(".to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        onClose: function (selectedDate, inst) {
            $(".from").datepicker("option", "maxDate", (current > selectedDate) ? current : selectedDate);
            f = $(".from").datepicker("getDate");
            from = f.getFullYear() + '-' + eval(f.getMonth() + 1) + '-' + f.getDate();
            sale_report(from, selectedDate);
        }
    });

    $("#service_sale_from").datepicker({
        //defaultDate: "+1w",
        //changeMonth: true,
        //numberOfMonths: 1,        
        onClose: function (selectedDate, inst) {
            $("#service_sale_to").datepicker("option", "minDate", selectedDate);
            $("#service_sale_to").datepicker("option", "maxDate", current);
            // from = inst.selecteYear+'-'+inst.selectedMonth+'-'+ inst.selectedDay;
            t = $("#service_sale_to").datepicker("getDate");
            to = t.getFullYear() + '-' + eval(t.getMonth() + 1) + '-' + t.getDate();
            service_sale_report(selectedDate, to);
        },
        maxDate: current,
        dateFormat: 'yy-mm-dd'
    });

    $("#service_sale_to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function (selectedDate, inst) {
            $("#service_sale_from").datepicker("option", "maxDate", (current > selectedDate) ? current : selectedDate);
            t = $("#service_sale_from").datepicker("getDate");
            to = t.getFullYear() + '-' + eval(t.getMonth() + 1) + '-' + t.getDate();
            service_sale_report(to, selectedDate);
        },
        maxDate: current,
        dateFormat: 'yy-mm-dd',
    });
});


