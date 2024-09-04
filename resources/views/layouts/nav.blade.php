<style type="text/css">

.social-part .fa{
	padding-right:20px;
}
ul li a{
	margin-right: 20px;
}

.navbar {
	padding-top: 0px;
	padding-bottom: 0px;
}

ul {
	width: 100% !important;
}

.ul-nav{
   position:relative;
}
.ul-nav > li:last-child
{
	right: 0;
	position: absolute;
}

</style>
<nav class="navbar navbar-expand-xl navbar-light" style="background-color: whitesmoke !important;">
	<a class="navbar-brand" href="#"><img src="{{ asset('img/refgenes-banner.png')}}" class="logo"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse " id="navbarTogglerDemo03">
	  <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ul-nav">
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/') }}">RGeasy Home</a>
		</li>
		<li class="nav-item">
		 	<a class="nav-link" href="{{ url('/species') }}">{{__('commons.Species') }}</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/genes/create') }}">{{__('home.Register New Species') }}</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/articles/create') }}">{{__('home.Register New Study') }}</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/about') }}">{{__('home.About Us') }}</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/contact') }}">{{__('commons.Contact') }}</a>
		</li>

		@auth
			
		@endauth
		<!-- Authentication Links -->
		@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">{{ __('commons.Login') }}</a>
			</li>
			<!--li class="nav-item">
				<a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
			</li-->
		@else
			<li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ __('commons.Hello') }}, {{ Auth::user()->name }}
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->email == 'lamsh@uft.edu.br' || Auth::user()->email == 'ivo.pontes@uft.edu.br' ||
						 Auth::user()->email == 'micaele.sp@uft.edu.br' || Auth::user()->email == 'rafael.tavares@uft.edu.br')
                        <a class="dropdown-item" href="{{ url('/admin') }}">
                            {{ __('commons.Admin') }}
                        </a>
                    @endif

					<a class="dropdown-item" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
						{{ __('commons.Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</li>
		@endguest

		@php $locale = session()->get('locale'); @endphp
		<li class="nav-item dropdown" style="float: right;">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
			   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				@switch($locale)
					@case('en')
					<img src="{{asset('img/us.png')}}"> {{__('commons.English') }}
					@break
					@case('pt')
					<img src="{{asset('img/pt.png')}}"> {{__('commons.Portuguese') }}
					@break
					@break
					@default
					<img src="{{asset('img/us.png')}}"> {{__('commons.English') }}
					@break
				@endswitch
				<span class="caret"></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ url('/') }}/lang/en"><img src="{{asset('img/us.png')}}"> {{__('commons.English') }}</a>
				<a class="dropdown-item" href="{{ url('/') }}/lang/pt"><img src="{{asset('img/pt.png')}}"> {{__('commons.Portuguese') }}</a></a>
			</div>
		</li>

	  </ul>
	  <div class="social-part">
		<a href="https://ww2.uft.edu.br/" target="_blank"><img src="{{ asset('img/brasaoUFT.png')}}" width="40px" class="logo"></a>
	  </div>
	</div>
</nav>

