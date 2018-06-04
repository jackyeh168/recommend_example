@extends('layouts.template') @section('contents')
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<section id="home" name="home">
    <div id="headerwrap" class="bg">
        <div class="container">
            <div class="row centered">

                <div class="col-xs-4" style="height:400px ;border-style: dotted;">

                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-4">
                    <div class="row">
                        <h3>
                            <b id="name"></b>
                        </h3>
                    </div>
                    <div class="row">
                        <table style=" margin-top: 100px; margin-bottom: 100px;">

                            <tr>
                                <td>地區:</td>
                                <td id="town"></td>
                            </tr>
                            <tr>
                                <td>地址:</td>
                                <td id="address"></td>
                            </tr>
                            <tr>
                                <td>電話:</td>
                                <td id="phone"></td>
                            </tr>
                            <tr>
                                <td>房型:</td>
                                <td id="type"></td>
                            </tr>
                            <tr>
                                <td>定價:</td>
                                <td id="price"></td>
                            </tr>
                            <tr>
                                <td>人氣:</td>
                                <td id="star"></td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>

            <div class="row centered" style="padding-top: 100px;">
                <h4>附近旅遊景點</h4>
            </div>

            <div class="row centered" style="padding-top: 100px;padding-bottom: 100px;">
                <h4>周邊近期活動</h4>
            </div>
        </div>
        <!--/ .container -->
    </div>
    <!--/ #headerwrap -->
</section>

<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    $.ajax({
        url: "/data/hotel?hotel_id=" + getParameterByName('hotel_id'),
        context: document.body
    }).done(function (data) {
        let obj = JSON.parse(data);

        Object.keys(obj).map(function (k, i) {
            if (k == 'min_price' || k == 'max_price') {
                return;
            }
            $('#'+ k).html(obj[k]);
            console.log($('#'+ k).val());
            // console.log(obj[k]);
        });
        $('#price').html('NT $' + obj['min_price'] + " - " + obj['max_price']);
    });
</script> @endsection