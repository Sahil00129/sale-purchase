////////////////////////////////////////////////////Sale Data/////////////////////////////
$(document).ready(function (e) {
 //alert('hello');
    $('#salesData').DataTable({

        processing: true,
        serverSide: true,
        ajax: "/sales-data-request",
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "pageLength": 20,
            
        columns: [
            { "data": "item_name" },
            { "data": "bill_no" },
            { "data": "bill_date" },
            { "data": "sales_to_customer_name" },
            { "data": "quantity_in_kgltr" },
            { "data": "document_type" },
        ],

        initComplete: function () {
          this.api().columns().every(function () {
            var column = this;
            console.log(column);
            var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());
              column.search(val ? '^' + val + '$' : '', true, false).draw();
            });
            console.log(select);
            column.data().unique().sort().each(function (d, j) {
              $(select).append('<option value="' + d + '">' + d + '</option>')
            });
          });
        }
    }); 
 /////////////////////////////////////////Purchase Data//////////////////////////////////
 $('#purchaseData').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/purhase-data-request",
    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "pageLength": 50,
    columns: [
        { "data": "item_name" },
        { "data": "bill_date" },
        { "data": "vendor_name" },
        { "data": "batch_number" },
        { "data": "vendor_invoice_no" },
        { "data": "vendor_invoice_date" },
        { "data": "quantity_in_kgltr" },
        { "data": "document_type" },
    ],
    initComplete: function () {
      this.api().columns().every(function () {
        var column = this;
        var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
          var val = $.fn.dataTable.util.escapeRegex($(this).val());
          column.search(val ? '^' + val + '$' : '', true, false).draw();
        });
       // console.log(select);
        column.data().unique().sort().each(function (d, j) {
          $(select).append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
  });    
  /////////////////////////////////////////////////////////////////////
  $('#itemList').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn btn-sm' },
                { extend: 'csv', className: 'btn btn-sm' },
                { extend: 'excel', className: 'btn btn-sm' },
                { extend: 'print', className: 'btn btn-sm' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "pageLength": 30,
    ordering: false,
    initComplete: function () {
      this.api().columns().every(function () {
        var column = this;
        var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
          var val = $.fn.dataTable.util.escapeRegex($(this).val());
          column.search(val ? '^' + val + '$' : '', true, false).draw();
        });
       // console.log(select);
        column.data().unique().sort().each(function (d, j) {
          $(select).append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
  });
/////////////////////////////////////////
$('#opening').DataTable({
  processing: true,
  serverSide: true,
  ajax: "/opening-data-request",
  "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
  "<'table-responsive'tr>" +
  "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
          buttons: [
              { extend: 'copy', className: 'btn btn-sm' },
              { extend: 'csv', className: 'btn btn-sm' },
              { extend: 'excel', className: 'btn btn-sm' },
              { extend: 'print', className: 'btn btn-sm' }
          ]
      },
      "oLanguage": {
          "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
          "sInfo": "Showing page _PAGE_ of _PAGES_",
          "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
          "sSearchPlaceholder": "Search...",
         "sLengthMenu": "Results :  _MENU_",
      },
      "pageLength": 20,
      
  columns: [
      { "data": "item_name" },
      { "data": "site_id" },
      { "data": "opening_balance" },
      { "data": "fy" },
    
  ],
  "pageLength": 30,
    ordering: false,
    initComplete: function () {
      this.api().columns().every(function () {
        var column = this;
        var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
          var val = $.fn.dataTable.util.escapeRegex($(this).val());
          column.search(val ? '^' + val + '$' : '', true, false).draw();
        });
      //  console.log(select);
        column.data().unique().sort().each(function (d, j) {
          $(select).append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
});
////////////////////////
/////////////////////////////////////////
$('#stock_transfer').DataTable({
  processing: true,
  serverSide: true,
  ajax: "/stockTransfer-data-request",
  "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
  "<'table-responsive'tr>" +
  "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
          buttons: [
              { extend: 'copy', className: 'btn btn-sm' },
              { extend: 'csv', className: 'btn btn-sm' },
              { extend: 'excel', className: 'btn btn-sm' },
              { extend: 'print', className: 'btn btn-sm' }
          ]
      },
      "oLanguage": {
          "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
          "sInfo": "Showing page _PAGE_ of _PAGES_",
          "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
          "sSearchPlaceholder": "Search...",
         "sLengthMenu": "Results :  _MENU_",
      },
      "pageLength": 20,
      
  columns: [
      { "data": "item_name" },
      { "data": "bill_date" },
      { "data": "bill_no" },
      { "data": "quantity_in_kgltr" },
    
  ],
  "pageLength": 30,
    ordering: false,
    initComplete: function () {
      this.api().columns().every(function () {
        var column = this;
        var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
          var val = $.fn.dataTable.util.escapeRegex($(this).val());
          column.search(val ? '^' + val + '$' : '', true, false).draw();
        });
        //console.log(select);
        column.data().unique().sort().each(function (d, j) {
          $(select).append('<option value="' + d + '">' + d + '</option>')
        });
      });
    }
});
/*****************************************************************************************************/
/***************************************** Purchase process table*************************************/
/*****************************************************************************************************/
$('#monthly_purchase').DataTable({

  processing: true,
  serverSide: true,
  ajax: "/monthlyPurchase-data-request",
  "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
  "<'table-responsive'tr>" +
  "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
          buttons: [
              { extend: 'copy', className: 'btn btn-sm' },
              { extend: 'csv', className: 'btn btn-sm' },
              { extend: 'excel', className: 'btn btn-sm' },
              { extend: 'print', className: 'btn btn-sm' }
          ]
      },
      "oLanguage": {
          "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
          "sInfo": "Showing page _PAGE_ of _PAGES_",
          "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
          "sSearchPlaceholder": "Search...",
         "sLengthMenu": "Results :  _MENU_",
      },
      "pageLength": 20,
      
  columns: [
      { "data": "item_name" },
      { "data": "item_number" },
      { "data": "df" },
      { "data": "add_adf" },
  ],

  initComplete: function () {
    this.api().columns().every(function () {
      var column = this;
      console.log(column);
      var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        column.search(val ? '^' + val + '$' : '', true, false).draw();
      });
      console.log(select);
      column.data().unique().sort().each(function (d, j) {
        $(select).append('<option value="' + d + '">' + d + '</option>')
      });
    });
  }
}); 
////////////////////////////////////////////////////////////////////////////////////
$('#daily_purchase').DataTable({

  processing: true,
  serverSide: true,
  ajax: "/dailyPurchase-data-request",
  "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
  "<'table-responsive'tr>" +
  "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
          buttons: [
              { extend: 'copy', className: 'btn btn-sm' },
              { extend: 'csv', className: 'btn btn-sm' },
              { extend: 'excel', className: 'btn btn-sm' },
              { extend: 'print', className: 'btn btn-sm' }
          ]
      },
      "oLanguage": {
          "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
          "sInfo": "Showing page _PAGE_ of _PAGES_",
          "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
          "sSearchPlaceholder": "Search...",
         "sLengthMenu": "Results :  _MENU_",
      },
      "pageLength": 20,
      
  columns: [
      { "data": "item_name" },
      { "data": "item_number" },
      { "data": "stock_in_hand" },
      { "data": "stock_in_transit" },
      { "data": "mtd_sales" },
      { "data": "pending_customer_order" },
  ],

  initComplete: function () {
    this.api().columns().every(function () {
      var column = this;
      console.log(column);
      var select = $('<select class="cfilter"><option value="">--Select--</option></select>').appendTo($("#filters").find("th").eq(column.index())).on('change', function () {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        column.search(val ? '^' + val + '$' : '', true, false).draw();
      });
      console.log(select);
      column.data().unique().sort().each(function (d, j) {
        $(select).append('<option value="' + d + '">' + d + '</option>')
      });
    });
  }
}); 

$('#final_view').DataTable( {
    "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
        buttons: [
            { extend: 'copy', className: 'btn btn-sm' },
            { extend: 'csv', className: 'btn btn-sm' },
            { extend: 'excel', className: 'btn btn-sm' },
            { extend: 'print', className: 'btn btn-sm' }
        ]
    },
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
       "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [7, 10, 20, 50],
    "pageLength": 7 
} );


/********************************************************************************************************/
/**********************************************final table************************************/
$('#').click(function(e){
  e.preventDefault();
  var fd = new FormData();
  var _token = $("input[name=_token]").val();
  var monthyear = $("#monthyear").val();
  fd.append('monthyear', monthyear); 
  //fd.append('year_range', year_range);
  //alert(month_range+ year_range); return false;
  $.ajax({
        url: "/getdata", 
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST', 
        data: fd,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend:                      //reinitialize Datatables
        function(){   
$('#').dataTable().fnClearTable();             
        $('#').dataTable().fnDestroy();                
  
     },
        success: function(response){
     console.log(response);		
  // alert(response.success.messages);
            // $.each(success,function(key, value){                     //jquery foreach
            $.each(response.response, function(key, value){                   //object break
            //alert(JSON.stringify(value) );
             var num2 = parseFloat(value.amt).toFixed(2)
 var numnpa = parseFloat(value.npa).toFixed(2)
 var numbal = parseFloat(value.bal).toFixed(2)
          
             $('#custom tbody').append("<tr><td>" + value.flat_no + "</td><td>" + value.pr_rd + "</td><td>" + value.pr_rd_dt +"</td><td>"+ value.cur_rd+"</td><td>"+ value.cur_rd_dt +"</td><td>"+ value.cons_unt +"</td><td>"+ value.conv_fac +"</td><td>"+ value.unt_cons +"</td><td>"+ value.gas_rt +"</td><td>"+ num2 +"</td><td>"+  value.main_char +"</td><td>" + value.lat_pay_char +"</td><td>" + value.amt_last_p +"</td><td>" + value.cred_bal +"</td><td>" + numbal +"</td><td>" + numnpa +"</td><td>" + value.inv_n +"</td><td>" + value.inv_d +"</td></tr>");
              });


$(function(){
$('#').DataTable({

 "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
  dom: 'Bfrtip',
  buttons: [
'copyHtml5',
'excelHtml5',
'csvHtml5',	
'print'
  ],    
 });
});
  //});             
      }                
      });
  });
/**********************************************************************************************/
  //alert('h'); die;
  $("#allinone").on("submit", function(){
   // alert('hello');
    $("#pageloader").fadeIn();
  });//submit
	
  //////
  $("#filterSale").on("submit", function(){
    // alert('hello');
     $("#singleloader").fadeIn();
   });//submit
});


        
		
	