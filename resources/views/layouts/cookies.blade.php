@if (isset($_COOKIE['cookies']) === false):
<div class="cookie-container" id="cookie-container">
	<div class="cookie-wrapper">
		<div class="cookie-content">
			<div class="cookie-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#004593" width="24px" height="24px"><path d="M15.086 18.175H8.913v-1.508h1.508v-4.665H8.913v-1.507h4.665v6.172h1.576v1.508h-.068zM10.42 7c0-.617.548-1.166 1.165-1.166h.754c.617 0 1.165.549 1.165 1.166v.753c0 .617-.548 1.165-1.165 1.165h-.754c-.617 0-1.165-.548-1.165-1.165V7zM11.998.005A11.97 11.97 0 000 12.002 11.97 11.97 0 0011.998 24a11.97 11.97 0 0011.997-11.998c0-6.647-5.414-11.997-11.998-11.997z"></path></svg>
			</div>
			<div class="cookie-text">
				<b>{!! __('home.cookies_policy') !!}</b>: {!! __('home.cookies_bar_policy_text') !!}
				<a class="btn btn-primary" href="#" role="button" style="display: inline;" onclick="accept()">OK</a>
				<a class="btn btn-primary" href="{{URL::to('/cookies')}}" role="button" style="display: inline;">{{ __('home.cookies_policy') }}</a>
			</div>
		</div>
	</div>
</div>
<script>
	function accept()
	{
		$.ajax({
			url : "{{ URL::to('/cookies') }}",
			type : 'post',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		})
		.done(function(msg){
			var cookies = document.getElementById("cookie-container");
			cookies.style.display = "none";
		})
		.fail(function(jqXHR, textStatus, msg){
			alert(msg);
		});
	}
</script>
@endif