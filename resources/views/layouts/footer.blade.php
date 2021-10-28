@if(isset($legacy))
  <link rel="stylesheet" href="{{ asset('/ref/jquery-ui.min.css') }}">
  <script type="text/javascript" src="{{ asset('/ref/external/jquery/jquery.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('/ref/jquery-ui.structure.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/ref/jquery-ui.theme.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/vendor/reffinder/css/cotton.css') }}">
  <script type="text/javascript" src="{{ asset('/ref/jquery-ui.min.js') }}"></script>
@else
	<script src="{{ asset('/js/jquery-3.4.1.slim.min.js') }}"></script>
	<script src="{{ asset('/js/popper.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap-tagsinput.min.js') }}"></script>
@endif
