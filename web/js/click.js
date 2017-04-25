$(document).ready(function() {
    // Сортировка
    $('.radio-sort').on( 'click', function() {
        showFilterResult();
    });

    // Фильтрация по тегам
    $('.checkbox-tag').on( 'change', function () {
        showFilterResult();
    }) ;

    // Фильтрация по автору
    $('.checkbox-author').on( 'change', function () {
        showFilterResult();
    }) ;

    function deleteItem(id) {
        $('#author-value#'+id).remove();
        showFilterResult();
    }

    // Функция выбора значения фильтра
   function showFilterResult () {
       var authorsChecked = [];
       var tagsChecked = [];
       var sortItem = [];
       var authorValue = [];
       var tagValue = [];

       $('#result').empty();

       // Создаем массив из выбраных значений автора
       $('.checkbox-author').each(function () {
           if ($(this).is(':checked')) {
               authorsChecked.push($(this).val());
               authorValue.push('<div class="author-value-item" id="' + $(this).val() + '">' + $(this).attr('name') + '<label class="author-value-delete">X</label></div>');
           }
       });

       $('#author-value').html(authorValue);

       // Создаем массив из выбраных значений тегов
       $('.checkbox-tag').each(function () {
           if ($(this).is(':checked')) {
               tagsChecked.push($(this).val());
               tagValue.push('<div class="tag-value-item">' + $(this).attr('name') + '</div>');
           }
       });
       $('#tag-value').html(tagValue);

       // Выбранное значение кнопки сортировки в виде массива
       $('.radio-sort').each(function () {
           if ($(this).is(':checked')) {
               sortItem.push($(this).val());
           }
       });

       $.ajax({
           url: '/news/all',
           method: 'post',
           async: true,
           data: {author: authorsChecked, tag: tagsChecked, sort: sortItem},
           success: function (data) {
               $('#result').html(data);
               console.log(data);
           },
           error: function () {
               console.log('error');
           }
       });
   }

    function deleteFilterItem (id) {
        $("#author-" + id).remove();
    }
});