@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Loan Type Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('loan.type.update', ['ltid' => $ltedit->id])}}" class="form-horizontal"
                              method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Type</label>
                                <div class="col-md-9">
                                    @if($errors->has('type'))
                                        <span class="help-block text-danger">{{$errors->first('type')}}</span>
                                    @endif
                                    <input type="text" placeholder="Loan Type" name="type" value="{{$ltedit->type}}"
                                           class="form-control form-control-success {{$errors->has('type') ? 'is-invalid' : ''}}"
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
                        <h6 class="text-uppercase mb-0">All Loan Types</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Loan Type</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loantypes as $i => $lt)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$lt->type}}</td>
                                    <td class="text-right">
                                        @if ($lt->id != 1)
                                            @if(($lt->id * 1) != ($ltedit->id * 1))
                                                <a href="{{route('loan.type.edit', ['ltid' => $lt->id])}}"
                                                   class="btn btn-sm btn-success">Edit</a>
                                            @else
                                                <a href="{{route('loan.type.edit', ['ltid' => $lt->id])}}"
                                                   class="btn btn-sm btn-success disabled">Edit</a>
                                            @endif
                                            <a href="{{ route('loanType.delete', ['ltid' => $lt->id]) }}"
                                               class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
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