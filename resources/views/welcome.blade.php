@extends('layouts.template')

@section('contents')
    <section id="home" name="home">
        <div id="headerwrap" class="bg">
            <div class="container">
                <div class="row centered">
                    <!-- <div class="col-lg-12">
                        <h2>搜尋 <b>住宿地點</b></h2>
                    </div> --> 
					

					<div class="col-xs-6 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h2>查詢理想住宿</h2>
                            		<p>填寫下面的表格以獲得即時搜尋</p>
                        		</div>	
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                        		<div class="form-top-divider"></div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="registration-form">
			                    	<div class="form-group">
			                          	<select class="selectpicker" style="width:100%;height:50px;color:black;" name='type' id="type">
                                            <option value="">住宿類別</option>
                                            <option value="民宿">民宿</option>
                                            <option value="旅館">旅館</option>
                                        </select>
                                    </div>
			                        <div class="form-group">
										<select style="width:100%;height:50px;color:black;" name="county"  id="county">
                                            <option value="">鄉鎮市</option>
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
			                        <div class="form-group">
			                        	<input name="daterange" placeholder="住宿時間" class="form-daterange form-control" id="daterange" type="text" style="height:50px;">
			                        </div>
			                        <div class="form-group">
                                        <select  style="width:100%;height:50px;color:black;" name="price" id="price">
                                            <option value="">價格</option>
                                            <option value="0">0 ~ 2000</option>
                                            <option value="2001">2001 ~ 4000</option>
                                            <option value="4001">4001 ~ 6000</option>
                                            <option value="6001">6001 ~ </option>
                                        </select>
			                        </div>
									<div class="form-group">
			                        	<select  style="width:100%;height:50px;color:black;" name="room_type" id="room_type">
                                            <option value="">房型</option>
                                            <option value="單人房">單人房</option>
                                            <option value="雙人房">雙人房</option>
                                            <option value="套房">套房</option>
                                            <option value="其他">其他</option>
                                        </select>

			                        </div>
									
                                <button type="button" class="btn btn-primary btn-lg btn-block" onclick="query()">查詢</button>
			                    </form>
		                    </div>
                     </div>
                    <div class="col-xs-6" >
                        <div class="row centered" id="result"></div>

                    </div>
                    <div class="col-xs-12">
                        <img src="/img/skyline.png" alt="" srcset="">
                    </div>
                </div>
            </div> <!--/ .container -->
        </div><!--/ #headerwrap -->

        <script>
            function query() {
                let postData = {
                    type: $('#type').val(),
                    county: $('#county').val(),
                    daterange: $('#daterange').val(),
                    price: $('#price').val(),
                    room_type: $('#room_type').val()
                };

                $.ajax({
                    method: "POST",
                    url: "/data/search",
                    data: postData
                }).done(function (data) {
                    let arr = JSON.parse(data);

                    let htmlStr = '';
                    if (arr.length === 0) {
                        htmlStr = '<h1>無</h1>';    
                    }
                    else {
                        arr.forEach(el => {
                            htmlStr += `
                                <div class="row">
                                <h2>名稱: ${el.name}</h2><br>
                                <h2>地址: ${el.address}</h2><br>
                                <h2>價格: ${el.min_price} - ${el.max_price}</h2><br>
                                <div class="row centered" style="padding-top: 100px;">
                                    <h4>附近旅遊景點</h4></div>
                            `;

                            el.attraction.forEach(ele => {
                                htmlStr += `
                                <div class="col-xs-4">
                                <h4>標題: ${ele.title}</h4>
                                </div>`;
                            });

                            htmlStr+=`
                                <div class="row centered" style="padding-top: 100px;">
                                    <h4>周邊近期活動</h4>
                                </div>`

                            el.activity.forEach(ele => {
                                htmlStr += `
                                <div class="col-xs-4">
                                <h4>標題: ${ele.title}</h4>
                                </div>`;
                            });
                        });

                    }
                    $('#result').html(htmlStr);

                });
            }
        </script>
    </section>
@endsection
