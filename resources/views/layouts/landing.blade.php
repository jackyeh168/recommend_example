<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<style>
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f6e6b4+0,ed9017+100;Yellow+3D+%231 */
.bg{
    background: '#f6e6b4'; /* Old browsers */
    background: -moz-linear-gradient(top, #f6e6b4 0%, #ed9017 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, #f6e6b4 0%,#ed9017 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, #f6e6b4 0%,#ed9017 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6e6b4', endColorstr='#ed9017',GradientType=0 ); /* IE6-9 */
}
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>{{ trans('adminlte_lang::message.landingdescriptionpratt') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>adminlte-laravel</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                    <li><a href="#showcase" class="smoothScroll">{{ trans('adminlte_lang::message.showcase') }}</a></li>
                    <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <section id="home" name="home">
        <div id="headerwrap" class="bg">
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-12">
                        <h1>搜尋 <b>住宿地點</b></h1>
                    </div>

                    <div class="col-lg-12">
                        <div class="box-solid content content-wrapper" style="padding-top:100px;text-align:center">
       
                            <form action="getPartHotal">
                                <div class="col-xs-12" >
                                    <div class="page-scroll btn btn-xl" >
                                        <label  style="font-size:24px;color:black;font-family:Microsoft JhengHei">住宿類別</label> 
                                        <select style="width:25%;color:black;" name='type'>
                                        <option value="">全部</option>
                                        <option value="旅館">旅館</option>
                                        <option value="民宿">民宿</option>
                                        <option value="飯店">飯店</option>
                                        <option value="酒店">酒店</option>
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

    <footer>
        <div id="c">
            <div class="container">
                <p>
                    <a href="https://github.com/acacha/adminlte-laravel"></a><b>admin-lte-laravel</b></a>. {{ trans('adminlte_lang::message.descriptionpackage') }}.<br/>
                    <strong>Copyright &copy; 2015 <a href="http://acacha.org">Acacha.org</a>.</strong> {{ trans('adminlte_lang::message.createdby') }} <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a>. {{ trans('adminlte_lang::message.seecode') }} <a href="https://github.com/acacha/adminlte-laravel">Github</a>
                    <br/>
                    AdminLTE {{ trans('adminlte_lang::message.createdby') }} Abdullah Almsaeed <a href="https://almsaeedstudio.com/">almsaeedstudio.com</a>
                    <br/>
                    Pratt Landing Page PROVA {{ trans('adminlte_lang::message.createdby') }} <a href="http://www.blacktie.co">BLACKTIE.CO</a>
                </p>

            </div>
        </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
/*
    $('.carousel').carousel({
        interval: 3500
    })
    */
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
</body>
</html>
