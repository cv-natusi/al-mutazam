@extends('layout.master.main')

@push('style')
    <style>
        .card-contenttitle {
            margin-top: 30px;
            text-align: left;
            color: white;
            font-size: 30px;
        }

        .h6-titlecard {
            margin-bottom: 15px;
            margin-top: 20px;
        }

        .h6-contentcard {
            color: white;
            text-align: left;
        }

        .btn-card {
            text-align: left;
            padding-left: 20px;
            border: none;
            width: 100%;
            color: white;
            margin-top: 30px;
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
        });
    </script>
@endpush
