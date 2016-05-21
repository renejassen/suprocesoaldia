function fnFormatDetails ( oTable, nTr )
{
    var aData = oTable.fnGetData( nTr );
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
    sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
    sOut += '</table>';

    return sOut;
}

$(document).ready(function() {

    $('#dynamic-table').dataTable( {
        "iDisplayLength": '50'
        // "aaSorting": [[ 4, "desc" ]],
        /*"language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }*/
        /*"language": {
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primera",
                "last":       "Última",
                "next":       "Sig",
                "previous":   "Ant"
            },
            "zeroRecords":    "No se han encontrado registros"
        }*/
    } );

    /*
     * Insert a 'details' column to the table
     */
    // var nCloneTh = document.createElement( 'th' );
    // var nCloneTd = document.createElement( 'td' );
    // nCloneTd.innerHTML = '<img src="assets/advanced-datatable/examples/examples_support/details_open.png">';
    // nCloneTd.className = "center";

    /*$('#hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );*/

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    /*var oTable = $('#hidden-table-info').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[1, 'asc']]
    });*/

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    /*$(document).on('click','#hidden-table-info tbody td img',function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it 
            this.src = "assets/advanced-datatable/examples/examples_support/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row 
            this.src = "assets/advanced-datatable/examples/examples_support/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );*/
} );