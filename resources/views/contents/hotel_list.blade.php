@extends('layouts.template')

@section('contents')
<section id="home" name="home">
	<div id="headerwrap" class="bg">
		<div class="container">
			<div class="row centered">

				<div class="col-lg-12">
					<div class="box-solid content content-wrapper" style="padding-top:100px;text-align:center">
						<div class="box-body">
							<table id="allHotelTable" class="table-hover table table-bordered dataTable">
								<thead>
									<tr>
										<th style="width: 10% !important;">名稱</th>
										<th style="width: 30% !important;">類別</th>
										<th style="width: 30% !important;">地址</th>
										<th style="width: 30% !important;">電話</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>	
						</div>
					</div>
				</div>

			</div>
		</div> <!--/ .container -->
	</div><!--/ #headerwrap -->
</section>
<script src=""></script>
<script>

var table = $('#allHotelTable').DataTable({
	"ajax": '/data/allHotels',
	"columns": [
		{
			data:  function(content){
				return content;
			},
			"render": function(data, type, full, meta){
				var jObj = JSON.parse(JSON.stringify(data));
				var name = jObj['name'];
				var hotel_id = jObj['hotel_id'];
				return '<a href=/hotel?hotel_id=' + hotel_id + '>' + name + '</a>';
			}
		},
		{data: "type"},
		{data: "address"},
		{data: "phone"}
	]
});

</script>
@endsection