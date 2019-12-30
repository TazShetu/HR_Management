@extends('layouts.joli')
@section('title', 'Loan Type')
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[33]->display_name}}</li>
        <li class="active">{{$menu[38]->display_name}}</li>
    </ul>
@endsection
@section('pageTitle', 'Loan Type')
@section('content')
    <div class="row mb-5">
        {{--        @if(session('LoanTypeCreateSuccess'))--}}
        {{--            <div class="alert alert-success text-center">--}}
        {{--                {{session('LoanTypeCreateSuccess')}}--}}
        {{--            </div>--}}
        {{--        @elseif(session('LoanTypeUpdateSuccess'))--}}
        {{--            <div class="alert alert-success text-center">--}}
        {{--                {{session('LoanTypeUpdateSuccess')}}--}}
        {{--            </div>--}}
        {{--        @endif--}}
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Task Detail</h3>
                </div>
                {{--     Form Start              --}}
                <form action="" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$task->title}}" name="title" required
                                           class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('title'))
                                    <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Deadline</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="date" value="{{$task->deadline}}" name="deadline" required
                                           class="form-control {{$errors->has('deadline') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('deadline'))
                                    <span class="help-block text-danger">{{$errors->first('deadline')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Remark</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <textarea class="form-control {{$errors->has('deadline') ? 'is-invalid' : ''}}"
                                              rows="5" name="remark" required>{{$task->remark}}</textarea>
                                </div>
                                @if($errors->has('remark'))
                                    <span class="help-block text-danger">{{$errors->first('remark')}}</span>
                                @endif
                            </div>
                        </div>

                        {{--      Assigned User  --}}


                        {{--      Task Priority          --}}


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
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Task detail</h3>
                </div>
                <div class="panel-body">
                    {{--       If Submitted then show submit report                 --}}

                    {{--        Accept / Reopen option            --}}


                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection