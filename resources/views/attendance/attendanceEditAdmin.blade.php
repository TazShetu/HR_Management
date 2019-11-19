@extends('layouts.joli')
@section('title', 'Attendance Edit')
@section('link')
{{--    <link rel="stylesheet" href="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.css') }}">--}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.css') }}">

    <style>
        .font-30px {
            font-size: 30px;
        }
    </style>@endsection
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[30]->display_name}}</li>
        <li><a href="{{route('attendance.show')}}">{{$menu[32]->display_name}}</a></li>
    </ul>
@endsection
@section('pageTitle', 'Attendance Edit')
@section('content')
    <div class="row mb-5">
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="col-lg-10 offset-lg-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">BRANCH EDIT</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{ route('attendance.update') }}" class="form-horizontal" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $attendance->id }}">
                    <div class="panel-body">
                        @if($errors->has('id'))
                            <span class="help-block text-danger">Please Do Not Mess With The Original Code !!!</span>
                        @endif
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name</label>
                            <div class="col-md-6 col-xs-12">
                                {{ $attendance->user->name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Date</label>
                            <div class="col-md-6 col-xs-12">
                                {{ $attendance->date }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Date</label>
                            <div class="col-md-6 col-xs-12">
                                {{ $attendance->date }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">IN
                                <small>Time</small>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <span class="mr-2">{{ date('m/d/Y h:i A', strtotime($attendance->time_in)) }}</span>
                                <input type="text" name="time_in" id="dt1" placeholder="EDIT" class="form-control-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">OUT
                                <small>Time</small>
                            </label>
                            <div class="col-md-6 col-xs-12">
                                <span class="mr-2">{{ date('m/d/Y h:i A', strtotime($attendance->time_out)) }}</span>
                                <input type="text" name="time_out" id="dt2" placeholder="EDIT" class="form-control-sm">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                    class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script src="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#dt1, #dt2').datetimepicker({
                icons: {
                    // time: 'far fa-clock font-30px',
                    time: 'glyphicon glyphicon-time font-30px',
                    // date: 'far fa-calendar font-30px'
                    date: 'fa fa-calendar font-30px'
                }
            });
        });
    </script>
@endsection

{{--@include('includes.bubbly.header')--}}
{{--@include('includes.bubbly.sidebar')--}}
{{--<link rel="stylesheet" href="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.css') }}">--}}

{{--<div class="container-fluid px-xl-5">--}}
{{--    <section class="py-5">--}}
{{--        <div class="row">--}}
{{--            --}}{{--        @if (session('error'))--}}
{{--            --}}{{--            <div class="alert alert-danger text-center">--}}
{{--            --}}{{--                {{session('error')}}--}}
{{--            --}}{{--            </div>--}}
{{--            --}}{{--        @endif--}}
{{--            --}}{{--        @if (session('success'))--}}
{{--            --}}{{--            <div class="alert alert-success text-center">--}}
{{--            --}}{{--                {{session('success')}}--}}
{{--            --}}{{--            </div>--}}
{{--            --}}{{--        @endif--}}
{{--            <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="h6 text-uppercase mb-0">Edit Attendance</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{ route('attendance.update') }}" method="post" class="form-horizonatal">--}}
{{--                            @csrf--}}
{{--                            --}}{{--                        <input type="hidden" name="id" value="{{ $attendance->id }}">--}}
{{--                            --}}{{--                        @if($errors->has('id'))--}}
{{--                            --}}{{--                            <span class="help-block text-danger">Please Do Not Mess With The Original Code !!!</span>--}}
{{--                            --}}{{--                        @endif--}}
{{--                            --}}{{--                        <div class="form-group row">--}}
{{--                            --}}{{--                            <label class="col-md-3 form-control-label">Name</label>--}}
{{--                            --}}{{--                            <div class="col-md-9">--}}
{{--                            --}}{{--                                {{ $attendance->user->name }}--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                        </div>--}}
{{--                            --}}{{--                        <div class="form-group row">--}}
{{--                            --}}{{--                            <label class="col-md-3 form-control-label">Date</label>--}}
{{--                            --}}{{--                            <div class="col-md-9">--}}
{{--                            --}}{{--                                {{ $attendance->date }}--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                        </div>--}}
{{--                            --}}{{--                        <div class="form-group row">--}}
{{--                            --}}{{--                            <label class="col-md-3 form-control-label">IN <small>Time</small></label>--}}
{{--                            --}}{{--                            <div class="col-md-9">--}}
{{--                            --}}{{--                                <span class="mr-2">{{ date('m/d/Y h:i A', strtotime($attendance->time_in)) }}</span>--}}
{{--                            --}}{{--                                <input type="text" name="time_in" id="dt1" placeholder="EDIT" class="form-control-sm">--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                        </div>--}}
{{--                            --}}{{--                        <div class="form-group row">--}}
{{--                            --}}{{--                            <label class="col-md-3 form-control-label">OUT <small>Time</small></label>--}}
{{--                            --}}{{--                            <div class="col-md-9">--}}
{{--                            --}}{{--                                <span class="mr-2">{{ date('m/d/Y h:i A', strtotime($attendance->time_out)) }}</span>--}}
{{--                            --}}{{--                                <input type="text" name="time_out" id="dt2" placeholder="EDIT" class="form-control-sm">--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                        </div>--}}
{{--                            --}}{{--                        <div class="form-group row">--}}
{{--                            --}}{{--                            <label class="col-md-3 form-control-label"></label>--}}
{{--                            --}}{{--                            <div class="col-md-9">--}}
{{--                            --}}{{--                                <input type="submit" value="Update" class="btn btn-primary">--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                        </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}
{{--@include('includes.bubbly.footer')--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>--}}
{{--<script src="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.min.js') }}"></script>--}}
{{--<style>--}}
{{--    .font-30px {--}}
{{--        font-size: 30px;--}}
{{--    }--}}
{{--</style>--}}

{{--<script>--}}
{{--    $(function () {--}}
{{--        $('#dt1, #dt2').datetimepicker({--}}
{{--            icons: {--}}
{{--                time: 'far fa-clock font-30px',--}}
{{--                date: 'far fa-calendar font-30px'--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

