@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('EmployeeTypeCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('EmployeeTypeCreateSuccess')}}
            </div>
        @elseif(session('EmployeeTypeUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('EmployeeTypeUpdateSuccess')}}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Employee Type Create</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employeeType.store')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Type</label>
                                <div class="col-md-9">
                                    @if($errors->has('type'))
                                        <span class="help-block text-danger">{{$errors->first('type')}}</span>
                                    @endif
                                    <input type="text" placeholder="Employee Type" name="type"
                                           class="form-control form-control-success {{$errors->has('type') ? 'is-invalid' : ''}}"
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
                        <h6 class="text-uppercase mb-0">All Employee Types</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Type</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($etypes as $i => $e)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$e->type}}</td>
                                    <td class="text-right">
                                        <a href="{{route('employee.type.edit', ['etid' => $e->id])}}"
                                           class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('employeeType.delete', ['etid' => $e->id]) }}"
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