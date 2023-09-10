@extends('layout.master.main')

@push('style')
    <style>
        .card-title {
            margin-top: 40px;
        }

		.btn-card {
			text-align: left;
			width: 100%;
			color: white;
		}
    </style>
@endpush

@section('content')
    <div class="page-content">
        @include('include.master.breadcrumb')
    </div>
@endsection

@push('script')
    <script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".knob").knob()
        })
    </script>
@endpush