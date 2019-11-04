@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Menu Name Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('menu.update', ['mid' => $medit->id])}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Display Name</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$medit->display_name}}" name="displayName"
                                           class="form-control form-control-success {{$errors->has('displayName') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('displayName'))
                                        <span class="help-block text-danger">{{$errors->first('displayName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Description</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$medit->description}}" name="description"
                                           class="form-control form-control-success {{$errors->has('description') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('description'))
                                        <span class="help-block text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">All Menu Names</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ms as $m)
                                <tr>
                                    <td>
                                        @if($m->level == 0)
                                            <span>{{$m->display_name}}</span>
                                        @elseif($m->level == 1)
                                            <span style="margin-left: 30px;">{{$m->display_name}}</span>
                                        @elseif($m->level == 2)
                                            <span style="margin-left: 60px;">{{$m->display_name}}</span>
                                        @elseif($m->level == 3)
                                            <span style="margin-left: 90px;">{{$m->display_name}}</span>
                                        @elseif($m->level == 4)
                                            <span style="margin-left: 120px;">{{$m->display_name}}</span>
                                        @endif
                                    </td>
                                    <td>{{$m->description }}</td>
                                    <td>
                                        <a href="{{route('menu.edit', ['mid' => $m->id])}}"
                                           class="btn btn-sm btn-success">Edit</a>
                                    </td>
                                </tr>
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