


        // This example adds a marker to indicate the position
        // of Bondi Beach in Sydney, Australia


    function initialize() {

        var styles =
            [
                {
                    "stylers": [
                        { "hue": "#6eff00" },
                        { "saturation": -85 }
                    ]
                }
            ];
        // Create a new StyledMapType object, passing it the array of styles,
        // as well as the name to be displayed on the map type control.
        var styledMap = new google.maps.StyledMapType(styles,
            {name: "Styled Map"});
        var image = 'img/map-p.png';
        // Create a map object, and include the MapTypeId to add
        // to the map type control.
        var mapOptions = {
            zoom: 16,
            scrollwheel: false,
            disableDoubleClickZoom: true,
            center: new google.maps.LatLng(51.5282436,46.0197537),
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
            mapOptions);

        var myLatLng = new google.maps.LatLng(51.5275694,46.0206227);
        var beachMarker = new google.maps.Marker({
            position: myLatLng,
            map: map
            //,icon: image
        });
        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');
    }

google.maps.event.addDomListener(window, 'load', initialize);


function SendSpecEmail()
{
    var user_name = $("input[name='user_name']").val();
    var user_msg = $("textarea[name='user_msg']").val();
    var user_email = $("input[name='user_email']").val();
    var s_email = $("input[name='s_email']").val();
    var s_name = $("input[name='s_name']").val();

    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "SendSpecEmail",
            user_name: user_name,
            user_msg: user_msg,
            user_email: user_email,
            s_email: s_email,
            s_name: s_name,


        },
        function (data) {
            console.info(data);
            $(".interview").html('<div class="feedbacktitle msg1">Спасибо за обращение!</div>');




        }, "json"
    ); //$.get  END
}

function SendQuestion()
{
    var user_name = $("input[name='user_name']").val();
    var user_msg = $("textarea[name='user_msg']").val();
    var user_phone = $("input[name='user_phone']").val();
    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "SendQuestion",
            user_name: user_name,
            user_msg: user_msg,
            user_phone: user_phone
        },
        function (data) {
            console.info(data);
            $(".formcontainer").html('<div class="feedbacktitle msg1">Спасибо за обращение!</div>');
        }, "json"
    ); //$.get  END
}

function SendReview()
{
    var r_name = $("input[name='r_name']").val();
    var r_email = $("input[name='r_email']").val();
    var r_text = $("textarea[name='r_text']").val();
    $.get(
        "/ajax/",
        {
            //log1:1,
            action: "SendReview",
            r_name: r_name,
            r_email: r_email,
            r_text: r_text
        },
        function (data) {
            console.info(data);
            $(".formcontainer").html('<div class="feedbacktitle msg1">Спасибо за обращение!</div>');
        }, "json"
    ); //$.get  END
}





