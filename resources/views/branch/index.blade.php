@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('BStoreSuccess'))
            <div class="alert alert-success text-center">
                {{session('BStoreSuccess')}}
            </div>
        @elseif(session('Cannotdelete'))
            <div class="alert alert-warning text-center">
                {{session('Cannotdelete')}}
            </div>
        @elseif(session('DeleteSuccess'))
            <div class="alert alert-success text-center">
                {{session('DeleteSuccess')}}
            </div>
        @elseif(session('BUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('BUpdateSuccess')}}
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
                        <h3 class="h6 text-uppercase mb-0">Branch Create</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('branch.store')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Title</label>
                                <div class="col-md-9">
                                    @if($errors->has('title'))
                                        <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                    <input type="text" placeholder="Branch Title" name="title"
                                           class="form-control form-control-success {{$errors->has('title') ? 'is-invalid' : ''}}"
                                           required>
                                    <small class="form-text text-muted ml-3">Duplicate entry is not allowed*.
                                    </small>
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
                        <h6 class="text-uppercase mb-0">Branches</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bs as $i => $b)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$b->title}}</td>
                                    <td class="text-right">
                                        @if (($b->id * 1) != 1)
                                            <a href="{{route('branch.edit', ['bid' => $b->id])}}"
                                               class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{route('branch.delete', ['bid' => $b->id])}}"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure ?')">Delete</a>
                                        @endif
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