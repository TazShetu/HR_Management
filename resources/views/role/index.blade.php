@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @elseif(session('roleCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('roleCreateSuccess')}}
            </div>
        @elseif(session('canNoteDelete'))
            <div class="alert alert-danger text-center">
                {{session('canNoteDelete')}}
            </div>
        @elseif(session('DeleteSuccess'))
            <div class="alert alert-success text-center">
                {{session('DeleteSuccess')}}
            </div>
        @elseif(session('roleUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('roleUpdateSuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Role Create</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('role.store')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Name</label>
                                <div class="col-md-9">
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                    <input type="text" placeholder="Role Name" name="name"
                                           class="form-control form-control-success {{$errors->has('name') ? 'is-invalid' : ''}}"
                                           required>
                                    <small class="form-text text-muted ml-3">Duplicate entry is not allowed*
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Display Name</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Role Name" name="displayName"
                                           class="form-control form-control-success {{$errors->has('displayName') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('displayName'))
                                        <span class="help-block text-danger">{{$errors->first('displayName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <label class="col-md-3 form-control-label">Menu Permissions</label>
                            @if($errors->has('permission'))
                                <span class="help-block text-danger">Please Select at least one permission.</span>
                            @endif
                            <div class="col">
                                @foreach($menus as $m)
                                    @if($m->permission == 0)
                                        <div class="form-check form-check-inline"
                                             @if($m->level == 0)
                                             style="margin-left: 10px;"
                                             @elseif($m->level == 1)
                                             style="margin-left: 40px;"
                                             @elseif($m->level == 2)
                                             style="margin-left: 70px;"
                                             @elseif($m->level == 3)
                                             style="margin-left: 100px;"
                                             @elseif($m->level == 4)
                                             style="margin-left: 130px;"
                                                @endif
                                        >
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label text-secondary">{{$m->display_name}}</label>
                                        </div>
                                        <br>
                                    @elseif($m->permission == 1)
                                        <div class="form-check form-check-inline"
                                             @if($m->level == 0)
                                             style="margin-left: 10px;"
                                             @elseif($m->level == 1)
                                             style="margin-left: 40px;"
                                             @elseif($m->level == 2)
                                             style="margin-left: 70px;"
                                             @elseif($m->level == 3)
                                             style="margin-left: 100px;"
                                             @elseif($m->level == 4)
                                             style="margin-left: 130px;"
                                                @endif
                                        >
                                            <input class="form-check-input" type="checkbox" value="{{$m->id}}"
                                                   name="permission[]">
                                            <label class="form-check-label">{{$m->display_name}}</label>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">All Roles</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Title</th>
                                <th>Display Name</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $i => $r)
                                @if($i > 2)
                                    <tr>
                                        <th scope="row">{{$i - 2}}</th>
                                        <td>{{$r->name}}</td>
                                        <td>{{$r->display_name}}</td>
                                        <td class="text-right">
                                            <a href="{{route('role.edit', ['rid' => $r->id])}}"
                                               class="btn btn-sm btn-success m-1">Edit</a>
                                            <a href="{{route('role.delete', ['rid' => $r->id])}}"
                                               class="btn btn-sm btn-danger m-1"
                                               onclick="return confirm('Are you sure ?')">Delete</a>
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