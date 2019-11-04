@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Religion Name Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('religion.update', ['rid' => $redit->id])}}" class="form-horizontal"
                              method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Name</label>
                                <div class="col-md-9">
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                    <input type="text" value="{{$redit->name}}" name="name"
                                           class="form-control form-control-success {{$errors->has('name') ? 'is-invalid' : ''}}"
                                           required>
                                    <small class="form-text text-muted ml-3">Duplicate entry is not allowed*.
                                    </small>
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
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">Religions</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rs as $i => $r)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$r->name}}</td>
                                    <td class="text-right">
                                        @if(($r->id * 1) != ($redit->id * 1))
                                            <a href="{{route('religion.edit', ['rid' => $r->id])}}"
                                               class="btn btn-sm btn-success">Edit</a>
                                        @else
                                            <a href="{{route('religion.edit', ['rid' => $r->id])}}"
                                               class="btn btn-sm btn-success disabled">Edit</a>
                                        @endif
                                        <a href="{{ route('religion.delete', ['rid' => $r->id]) }}"
                                           class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
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