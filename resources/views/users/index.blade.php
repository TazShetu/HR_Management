@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('UserCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('UserCreateSuccess')}}
            </div>
        @elseif(session('UserUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('UserUpdateSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Create User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.store')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="User Name" name="name"
                                           class="form-control form-control-success {{$errors->has('name') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" placeholder="Email address" name="email"
                                           class="form-control form-control-success {{$errors->has('email') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('email'))
                                        <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                    <small class="form-text text-muted ml-3">Duplicate entry is not allowed*.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" placeholder="Password" name="password"
                                           class="form-control form-control-success {{$errors->has('password') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('password'))
                                        <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Confirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                           class="form-control form-control-success {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Role</label>
                                <div class="col-md-9">
                                    @if($errors->has('role'))
                                        <span class="help-block text-danger">Please select a Role</span>
                                    @endif
                                    @foreach($roles as $r)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$r->id}}"
                                                   name="role[]">
                                            <label class="form-check-label">
                                                {{$r->display_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">All Users</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $i => $u)
                                @if($i > 1)
                                    <tr>
                                        <th scope="row">{{$i - 1}}</th>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td class="text-right">
                                            <a href="{{route('user.edit', ['uid' => $u->id])}}"
                                               class="btn btn-sm btn-success">Edit</a>
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
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>