@extends('layouts.template')

@section('contents')

<section id="home" name="home">
    <div id="headerwrap" class="bg">
        <div class="container">
            <div class="row centered">

                <div class="col-xs-6" id="homestay">
				</div>
                <div class="col-xs-6" id="hotel">
				</div>

            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->

	<script>
		$.ajax({
			method: "POST",
			url: "/data/recommend"
		}).done(function (data) {
			let obj = JSON.parse(data);
			console.log(obj);
			let hotelStr = '<div class="row">旅館</div>', homestayStr = '<div class="row">民宿</div>';

			obj['hotel'].forEach(el => {
				hotelStr += `<div class="row">
				<h2>名稱: ${el.name}</h2><br>
				<h2>地址: ${el.address}</h2><br>
				<h2>價格: ${el.min_price} - ${el.max_price}</h2>
				<div class="row centered" style="padding-top: 100px;">
					<h4>附近旅遊景點</h4></div>
				`;

				el.attraction.forEach(el => {
					hotelStr += `
					<div class="col-xs-4">
					<h4>標題: ${el.title}</h4>
					<h4>地址: ${el.address}</h4>
					</div>`;
				});

				hotelStr+=`
					<div class="row centered" style="padding-top: 100px;">
						<h4>周邊近期活動</h4>
					</div>`

				el.activity.forEach(el => {
					hotelStr += `
					<div class="col-xs-4">
					<h4>標題: ${el.title}</h4>
					<h4>地址: ${el.address}</h4>
					<h4>日期: ${el.from_date} - ${el.to_date}</h4>
					</div>`;
				});

				hotelStr += '</div>';
			});

			obj['homestay'].forEach(el => {
				homestayStr += `<div class="row">
				<h2>名稱: ${el.name}</h2><br>
				<h2>地址: ${el.address}</h2><br>
				<h2>價格: ${el.min_price} - ${el.max_price}</h2>
				<div class="row centered" style="padding-top: 100px;">
					<h4>附近旅遊景點</h4></div>
				`;

				el.attraction.forEach(el => {
					homestayStr += `
					<div class="col-xs-4">
					<h4>標題: ${el.title}</h4>
					<h4>地址: ${el.address}</h4>
					</div>`;
				});

				homestayStr+=`
					<div class="row centered" style="padding-top: 100px;">
						<h4>周邊近期活動</h4>
					</div>`

				el.activity.forEach(el => {
					homestayStr += `
					<div class="col-xs-4">
					<h4>標題: ${el.title}</h4>
					<h4>地址: ${el.address}</h4>
					<h4>日期: ${el.from_date} - ${el.to_date}</h4>
					</div>`;
				});

				homestayStr += '</div>';
			});

			$('#homestay').html(homestayStr);
			$('#hotel').html(hotelStr);

		});
		
	</script>
</section>

@endsection