@extends('layouts.joli')
@section('title', 'User Edit')
@section('breadcrumb')
    @php
        $menuU = Storage::disk('local')->get('menu');
        $menu = json_decode($menuU);
    @endphp
    <ul class="breadcrumb">
        <li>{{$menu[1]->display_name}}</li>
        <li><a href="{{route('users')}}">{{$menu[5]->display_name}}</a></li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'User Edit')
@section('content')
    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">EDIT USER</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('user.update', ['uid' => $uedit->id])}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$uedit->name}}" name="name" required
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email*</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                    <input type="email" value="{{$uedit->email}}" name="email" required
                                           class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('email'))
                                    <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    <input type="password" placeholder="Password" name="password"
                                           class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('password'))
                                    <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Confirm Password</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    <input type="password" placeholder="Password Confirmation"
                                           name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label padding-top-0">Role</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="{{$role->id}}"
                                               name="role" checked>
                                        <label>
                                            {{$role->display_name}}
                                        </label>
                                    </div>
                                </div>
                                @if($errors->has('role'))
                                    <span class="help-block text-danger">Please select a Role</span>
                                @endif
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
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ALL USERS</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $i => $u)
                            @if($i > 1)
                                <tr>
                                    <th scope="row">{{$i - 1}}</th>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>
                                        @if(($u->id * 1) != ($uedit->id * 1))
                                            <a href="{{route('user.edit', ['uid' => $u->id])}}"
                                               class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                                        @else
                                            <a href="{{route('user.edit', ['uid' => $u->id])}}"
                                               class="btn btn-sm btn-success disabled"><span
                                                        class="fa fa-pencil"></span></a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
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


{{--@include('includes.bubbly.header')--}}
{{--@include('includes.bubbly.sidebar')--}}
{{--<div class="container-fluid px-xl-5">--}}
{{--    <section class="py-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="h6 text-uppercase mb-0">Edit User</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{route('user.update', ['uid' => $uedit->id])}}" class="form-horizontal"--}}
{{--                              method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Name</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <input type="text" placeholder="User Name" name="name" value="{{$uedit->name}}"--}}
{{--                                           class="form-control form-control-success {{$errors->has('name') ? 'is-invalid' : ''}}"--}}
{{--                                           required>--}}
{{--                                    @if($errors->has('name'))--}}
{{--                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Email</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <input type="email" placeholder="Email address" name="email"--}}
{{--                                           value="{{$uedit->email}}"--}}
{{--                                           class="form-control form-control-success {{$errors->has('email') ? 'is-invalid' : ''}}"--}}
{{--                                           required>--}}
{{--                                    @if($errors->has('email'))--}}
{{--                                        <span class="help-block text-danger">{{$errors->first('email')}}</span>--}}
{{--                                    @endif--}}
{{--                                    <small class="form-text text-muted ml-3">Duplicate entry is not allowed*.--}}
{{--                                    </small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Password</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <input type="password" placeholder="Password" name="password"--}}
{{--                                           class="form-control form-control-success {{$errors->has('password') ? 'is-invalid' : ''}}"--}}
{{--                                    >--}}
{{--                                    @if($errors->has('password'))--}}
{{--                                        <span class="help-block text-danger">{{$errors->first('password')}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Confirm Password</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    <input type="password" placeholder="Confirm Password" name="password_confirmation"--}}
{{--                                           class="form-control form-control-success {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"--}}
{{--                                    >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-md-3 form-control-label">Role</label>--}}
{{--                                <div class="col-md-9">--}}
{{--                                    @if($errors->has('role'))--}}
{{--                                        <span class="help-block text-danger">Select at least one Role</span>--}}
{{--                                    @endif--}}
{{--                                    @foreach($roles as $r)--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" value="{{$r->id}}"--}}
{{--                                                   @foreach($rs as $rr)--}}
{{--                                                   @if(($rr->id * 1) == ($r->id * 1))--}}
{{--                                                   checked--}}
{{--                                                   @break--}}
{{--                                                   @endif--}}
{{--                                                   @endforeach--}}
{{--                                                   name="role[]">--}}
{{--                                            <label class="form-check-label">--}}
{{--                                                {{$r->display_name}}--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-9 ml-auto">--}}
{{--                                    <button type="submit" class="btn btn-primary">Update</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 mb-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h6 class="text-uppercase mb-0">All Users</h6>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table table-striped table-sm card-text">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Email</th>--}}
{{--                                <th class="text-right">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($users as $i => $u)--}}
{{--                                @if($i > 1)--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">{{$i - 1}}</th>--}}
{{--                                        <td>{{$u->name}}</td>--}}
{{--                                        <td>{{$u->email}}</td>--}}
{{--                                        <td class="text-right">--}}
{{--                                            @if(($u->id * 1) != ($uedit->id * 1))--}}
{{--                                                <a href="{{route('user.edit', ['uid' => $u->id])}}"--}}
{{--                                                   class="btn btn-sm btn-success">Edit</a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{route('user.edit', ['uid' => $u->id])}}"--}}
{{--                                                   class="btn btn-sm btn-success disabled">Edit</a>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}
{{--@include('includes.bubbly.footer')--}}
{{--</body>--}}
{{--</html>--}}