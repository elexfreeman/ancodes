/**
 * Created by folle on 11.01.2016.
 * Избранное
 */
var Favorites = [];

Favorites.Add = function(id)
{
    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "FavoritesAdd",
            f_id: id
        },
        function (data) {
            //window.location.href = "/thx.html"
            if(data.status=='add')
            {
                $(".f_"+id).addClass('chosen');
            }
            else
            {
                $(".f_"+id).removeClass('chosen');
            }
            Favorites.UpdateMenu();


        }, "json"
    ); //$.get  END

}

Favorites.Delete = function(id)
{
    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "FavoritesDelete",
            f_id: id
        },
        function (data) {


            //window.location.href = "/thx.html"
            $(".f_"+id).removeClass('chosen');
            Favorites.UpdateMenu();
        }, "html"
    ); //$.get  END
}

Favorites.UpdateMenu = function()
{
    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "FavoritesUpdateMenu"

        },
        function (data) {
            //window.location.href = "/thx.html"
            $('#f_link').html(data);

        }, "html"
    ); //$.get  END
}

Favorites.Clear = function()
{
    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "FavoritesClear"

        },
        function (data) {


        }, "html"
    ); //$.get  END
}