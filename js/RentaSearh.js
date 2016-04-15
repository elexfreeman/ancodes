/**
 * Created by folle on 30.01.2016.
 */

$(function() {
    console.log( "RentaSearch ready!" );
    $( ".SearchFormButton" ).click(function() {
        RentaSearch.Search();
    });


});

var RentaSearch = [];
/*Поиска по аренде*/
RentaSearch.Search = function()
{
    /*Собираем данные с формы*/

    var s = $('#SearchForm').serializeArray();
    $('input').prop('disabled',true);
    $.ajax({
        type: 'GET',
        url: '/ajax/',
        data: s,
        success: function(data) {
            $('.content').html(data);
            /*Теперь кол-во*/
            var RentaCount = parseInt($("#count").html());
            if(RentaCount==0) $('.results-number').html('Ничего не найдено!');
            if(RentaCount==1) $('.results-number').html('Найден 1 результат');
            if(RentaCount==2) $('.results-number').html('Найдено 2 результата');
            if(RentaCount==3) $('.results-number').html('Найдено 3 результата');
            if(RentaCount==4) $('.results-number').html('Найдено 4 результата');
            if(RentaCount>4) $('.results-number').html('Найдено '+String(RentaCount)+' результатов');

            /*Делаем опять кликабельными*/
            $('a.apartments-popup-link').css('pointer-events','auto');
            $('input').prop('disabled',false);
        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
            $('input').prop('disabled',false);
        }
    });



}