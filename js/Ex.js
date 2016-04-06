/**
 * Created by folle on 03.04.2016.
 * //Поиск экскурсий
 */

var Ex = [];

Ex.Search = function()
{
    /*Собираем данные с формы*/
    var s = $('#ExForm').serializeArray();
    $.ajax({
        type: 'GET',
        url: '/ajax/',
        dataType : "html",
        data: s,
        success: function(data) {
            $('.content').html(data);

        },
        error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}

$(function() {
    //ex_click
    $( ".ex_click" ).click(function() {
        Ex.Search();
    });
});
