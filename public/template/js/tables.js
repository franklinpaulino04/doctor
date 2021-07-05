function filterGlobal () {
    $('#advanced_table').DataTable().search(
        $('#global_filter').val()
    ).draw();
}
function filterColumn ( i ) {
    $('#advanced_table').DataTable().column( i ).search(
        $('#col'+i+'_filter').val()
    ).draw();
}
$(document).ready(function() {
    var table = $('#data_table').DataTable({
        responsive: true,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });
    $('#data_table tbody').on( 'click', 'tr', function() {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $("#advanced_table").DataTable({
        responsive: true,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).attr('data-column') );
    });

    $(document).on('click', '.modal_trigger', function (){
        let selector     = $(this),
            optionData   = selector.data(),
            target       = optionData.target,
            url          = optionData.url;

         $('modal-dialog', target).html();

        fetch(url)
            .then(response => response.json())
            .then(( data ) => {

                let { result, view } = data;

                if(result == 1){
                    $(target + ' .modal-dialog').html(view);
                }
            });
    });

    $(document).on('click', '.trigger_delete', function (){
        let selector     = $(this),
            optionData   = selector.data(),
            url          = optionData.url;

        fetch(url)
            .then(response => response.json())
            .then(( data ) => {

                let { result } = data;

                if(result == 1) {

                   location.reload();

                }else{

                    alert('not delete user for is yours');
                }
            });
    });

});
