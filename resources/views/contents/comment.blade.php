@extends('layouts.template') @section('contents')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
<script src="js/star-rating.js" type="text/javascript"></script>

<section id="home" name="home">
    <div id="headerwrap" class="bg">
        <div class="container">
            <div class="row centered">

                <div class="box-header with-border">
                    <h3 class="box-title">評價區</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <label style="font-size:18px;color:black;font-family:Microsoft JhengHei">鄉鎮市</label>
                            <select id="countySelect" style="width:31%;color:black;">
                                <option value=""></option>
                                <option value="花蓮市">花蓮市</option>
                                <option value="新城鄉">新城鄉</option>
                                <option value="秀林鄉">秀林鄉</option>
                                <option value="吉安鄉">吉安鄉</option>
                                <option value="壽豐鄉">壽豐鄉</option>
                                <option value="鳳林鎮">鳳林鎮</option>
                                <option value="萬榮鄉">萬榮鄉</option>
                                <option value="光復鄉">光復鄉</option>
                                <option value="豐濱鄉">豐濱鄉</option>
                                <option value="瑞穗鄉">瑞穗鄉</option>
                                <option value="玉里鎮">玉里鎮</option>
                                <option value="卓溪鄉">卓溪鄉</option>
                                <option value="富里鄉">富里鄉</option>
                            </select>
                        </div>

                        <div class="col-xs-6">
                            <label style="font-size:18px;color:black;font-family:Microsoft JhengHei">旅館名</label>
                            <select id="hotelSelect" style="width:31%;color:black;">
                                <option value=""></option>
                            </select>
                        </div>


                        <hr>

                        <div class="row">
                            <input id="input-id" type="number" class="rating rate-loading" min=0 max=5 step=1 data-size="xs" stars=4>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <label style="font-size:18px;color:black;font-family:Microsoft JhengHei"> 評價 </label>
                            </div>
                            <div class="col-xs-6">
                                <input id="evaluation" type="text" class="form-control"></input>
                            </div>
                            <div class="col-xs-3">
                                <button id="submit" type="button" class="btn btn-primary">提交</button>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.box-body -->
            </div>
            <hr>
            <div class="box box-success" style="height: 500px;padding-top: 20px;">

                <i class="fa fa-comments-o"></i>

                <h3 class="box-title">歷史評價</h3>
                <div style="overflow: hidden; width: auto; height: 1300px;" class="box-body chat" id="chat-box">
            </div>

        </div>
    </div>
    <!--/ .container -->
    </div>
    <!--/ #headerwrap -->
</section>

<script>
    $(document).ready(function () {
        $.get("data/getEvaluation", function (dataStr) {
            let dataArr = JSON.parse(dataStr);
            let str = '';
            
            for (var key in dataArr) {
                let user = (dataArr[key]['user_name'] === undefined)?'guest ' :dataArr[key]['user_name'] ;
                str = str + '<div class="item">\
                <p class="message">\
                <a href="#" class="name">\
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>' + dataArr[key]['created_at'] + '</small>' + user + '</a>[' + dataArr[key]['name'] + '] <input id=response_' + key + ' type="number" class="rating rate-loading" min=0 max=5 step=1  data-size="xs" readonly >' + '<b>評價: </b>' + dataArr[key]['text'] + '</p></div>';

            }
            $("#chat-box").html(str);
            for (var key in dataArr) {
                $('#response_' + key).rating('update', dataArr[key]['evaluation']);
            }
        });

        $.get("data/getHotels", function (dataStr) {
            var dataObj = JSON.parse(dataStr);
            for (var key in dataObj) {
                $("#hotelSelect").append($("<option></option>").attr("value", dataObj[key]['hotel_id']).text(dataObj[key]['name']));
            }

            $('#countySelect').change(function () {
                if ($('#countySelect').val() == "") {
                    $("#hotelSelect option").remove();
                    for (var key in dataObj) {
                        $("#hotelSelect").append($("<option></option>").attr("value", dataObj[key]['hotel_id']).text(dataObj[key]['name']));
                    }
                }
                else {
                    $("#hotelSelect option").remove();
                    for (var key in dataObj) {
                        if (dataObj[key]['address'].indexOf($('#countySelect').val()) > -1)
                            $("#hotelSelect").append($("<option></option>").attr("value", dataObj[key]['hotel_id']).text(dataObj[key]['name']));
                    }
                }
            });
        });

        var ratingValue = 0;
        $('#input-id').on('rating.change', function (event, value, caption) {
            if ($('#hotelSelect option:selected').val() == "")
                return;
            ratingValue = value;
        });

        $("#submit").click(function () {
            var text = $('#evaluation').val();
            console.log(text);
            $.post("data/postEvaluation", { hotel_id: $('#hotelSelect option:selected').val(), rating: ratingValue, evaluation: text }, function () {
                location.reload();
            });
        });
    });
</script> @endsection