$.extend( true, $.fn.dataTable.defaults, {
    // "searching": false,
    // "ordering": false,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
	"columnDefs": [
	    { "width": "5%", "targets": 0 }
	  ],
	"scrollX": false,
	"deferRender": true
});