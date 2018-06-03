@extends('layouts.template')

@section('content')
    <section id="home" name="home">
        <div id="headerwrap" class="bg">
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-12">

                        <h1>搜尋 <b>住宿地點</b></h1>
                    </div>

                    <div class="col-lg-12">
                        <div class="box-solid content content-wrapper" style="padding-top:100px;text-align:center">
       
                            <form action="getPartHotel">
                                <div class="col-xs-12" >
                                    <div class="page-scroll btn btn-xl" >
                                        <label  style="font-size:24px;color:black;font-family:Microsoft JhengHei">住宿類別</label> 
                                        <select style="width:25%;color:black;" name='type'>
                                        <option value="">全部</option>
                                        <option value="民宿">民宿</option>
                                        <option value="旅館">旅館</option>

                                        </select> 
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label  style="font-size:24px;color:black;font-family:Microsoft JhengHei">鄉鎮市</label> 
                                        <select  style="width:31%;color:black;" name="county">
                                        <option value="">全部</option>
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
                                </div>

                                <br>
                                <label  style="font-size:24px;color:black;font-family:Microsoft JhengHei">住宿時間</label> 
                                <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" style="width:300px;"/>

                                <br>

                                <label  style="font-size:24px;color:black;font-family:Microsoft JhengHei">價格</label> 
                                <select  style="width:31%;color:black;" name="price">
                                <option value="">全部</option>
                                <option value="0">0 ~ 2000</option>
                                <option value="2001">2001 ~ 4000</option>
                                <option value="4001">4001 ~ 6000</option>
                                <option value="6001">6001 ~ </option>
                                </select>

                                <br>
                                
                                <label  style="font-size:24px;color:black;font-family:Microsoft JhengHei">房型</label> 
                                <select  style="width:31%;color:black;" name="room_type">
                                <option value="單人房">單人房</option>
                                <option value="雙人房">雙人房</option>
                                <option value="套房">套房</option>
                                <option value="其他">其他</option>
                                </select>


                                <br>

                                <div class="col-xs-12" style="padding-top:50px;padding-down:500px;">
                                    <button class="btn btn-success" type="submit">查詢</button>
                                </div>
                                <div class="col-xs-12" style="padding-top:100px;"></div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <img src="/img/skyline.png" alt="" srcset="">
                    </div>
                </div>
            </div> <!--/ .container -->
        </div><!--/ #headerwrap -->
    </section>
@show