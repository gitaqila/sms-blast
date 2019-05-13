@extends('layouts.app')

@section('theme_js')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_layouts.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('content')

<!-- Basic datatable -->
<form method="POST" action="{{ route('sms.send') }}">
	@csrf
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Form Campaign SMS</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
				</ul>
			</div>
		</div>

		<div class="panel-body">
			
			@if (\Session::has('error'))
				<div class="alert alert-warning no-border">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
					<span class="text-semibold">Terjadi kesalahan!</span> {{ \Session::get('error') }}
				</div>
			@endif
			<div class="form-group">
				<label>Tujuan:</label>
				<select name="id_kelompok" id="" class="form-control">
					<option value="">-- Pilih --</option>
					@foreach($kelompok as $klp)
					<option value="{{ $klp->id }}"> {{ $klp->nama_kelompok }} </option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label>Isi SMS:</label>
				<textarea rows="5" cols="5" class="form-control" placeholder="Isi SMS" name="campaign_text">{{ old('campaign_text') }}</textarea>
			</div>
			
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Kirim <i class="icon-arrow-right14 position-right"></i></button>
			</div>
			
		</div>

	</div>
</form>

@endsection