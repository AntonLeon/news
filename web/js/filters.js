$(document).ready(function() {
    $('#select_authors').change(function () {
        $('#authors').text(select_authors.value + ' x');
    });

    $('#select_tags').change(function () {
        $('#tags').append(select_tags.value + ' x');
    });

    $('#select_sort').change(function () {
        $('#sort').text(select_sort.value);
        var ASC = "post ASC";
        $("option[name=ASC]").val(ASC);
    });

    //$('#author, #tags, #sort-items').change(function() {
    //    $('#result').empty();
    //    var id = $('#author option:selected').val();
    //    var tag =  $('#tags option:selected').val();
    //    var sort = $('#sort-items option:selected').val();//значение выбраного поля
    //    $.ajax({
    //        url: '/news/',
    //        type: 'post',
    //        async: true,
    //        data: {id: id, tag: tag, sort: sort},
    //        success: function(data) {
    //            $('div#result').html(data);
    //        }
    //    });
    //});

});