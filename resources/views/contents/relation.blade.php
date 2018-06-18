 @extends('layouts.template') @section('contents')

<section id="home" name="home">
    <div id="headerwrap" class="bg">
        <div class="container">
            <div class="row centered">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <br>
                        <h2 class="section-heading">
                            <b>相關連結</b>
                        </h2>
                    </div>
                </div>

				
				
				
				
				
                <div class="row" style="padding-top: 50px;">
                    <div class="col-xs-6">
                        <h2>
                            <b>觀光局</b>
                        </h2>
                    </div>
                    <div class="col-xs-6">
                        <h2>
                            <b>氣象局</b>
                        </h2>
                    </div>
                </div>

                <div class="row" style="padding-top: 50px;padding-bottom: 300px;">
                    <div class="col-xs-6" style="padding-left: 15%;">
                        <a href="http://taiwan.net.tw/w1.aspx">
                            <img alt="" class="img-responsive img-circle displayed" src="img/team/tour.jpg">
                        </a>
                    </div>

                    <div class="col-xs-6" style="padding-left: 15%;">
                        <a href="http://www.cwb.gov.tw/V7/index.htm">
                            <img alt="" class="img-responsive img-circle displayed" src="img/team/weather.jpg">
                        </a>
                    </div>

                </div>
            </div>
            <!--/ .container -->
        </div>
        <!--/ #headerwrap -->
</section>

@endsection