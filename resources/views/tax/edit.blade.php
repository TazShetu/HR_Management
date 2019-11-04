@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css"
      rel="stylesheet">
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('TaxUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('TaxUpdateSuccess')}}
            </div>
        @elseif(session('TaxUpdateUnsuccess'))
            <div class="alert alert-danger text-center">
                {{session('TaxUpdateUnsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Tax Edit</h3>
                        <form action="{{route('tax.isGross')}}" class="form-horizontal" method="post"
                              style="float: right;" id="pension">
                            @csrf
                            <label class="form-control-label mr-2">Only Gross Salary</label>
                            <input id="is_pension" type="checkbox"
                                   {{ (($isGross * 1) == 1 ) ? "checked" : "" }}
                                   data-toggle="toggle" data-on="Yes" data-off="No" value="1"
                                   data-onstyle="success" data-offstyle="outline-secondary" name="tax_is_gross">
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="{{route('tax.update', ['tid' => $tedit->id])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <label class="form-control-label">Branch</label>
                                    <select class="form-control" name="branch" required>
                                        <option selected hidden value="{{$tedit->branch_id}}">{{$tedit->title}}</option>
                                        @foreach($branches as $b)
                                            <option value="{{$b->id}}">{{$b->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('branch'))
                                        <span class="help-block text-danger">{{$errors->first('branch')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-control-label">From</label>
                                    <input type="number" value="{{$tedit->from}}" name="from" min="1"
                                           class="form-control form-control-success {{$errors->has('from') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('from'))
                                        <span class="help-block text-danger">{{$errors->first('from')}}</span>
                                    @endif
                                    <small class="form-text text-muted ml-3">Salary Per Year.</small>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-control-label">To</label>
                                    <input type="number" value="{{$tedit->to}}" name="to" min="1"
                                           class="form-control form-control-success {{$errors->has('to') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('to'))
                                        <span class="help-block text-danger">The to must be greater than from.</span>
                                    @endif
                                    <small class="form-text text-muted ml-3">Salary Per Year.</small>
                                </div>
                                <div class="col-lg-2">
                                    <label class="form-control-label">Tax Percentage</label>
                                    <input type="number" value="{{$tedit->tax}}" name="tax" min="0.01" max="100"
                                           step="0.01"
                                           class="form-control form-control-success {{$errors->has('tax') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('tax'))
                                        <span class="help-block text-danger">{{$errors->first('tax')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 29px;">Update</button>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Taxes</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Branch</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taxes as $i => $b)
                                <tr>
                                    <th>{{$i + 1}}</th>
                                    <td>{{$b->title}}</td>
                                    <td>{{$b->from}} Tk.</td>
                                    <td>{{$b->to}} Tk.</td>
                                    <td>{{$b->tax}} %</td>
                                    <td>
                                        @if(($b->id * 1) != ($tedit->id * 1))
                                            <a href="{{route('tax.edit', ['tid' => $b->id])}}"
                                               class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{route('tax.delete', ['tid' => $b->id])}}"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are You Sure ?')">X</a>
                                        @else
                                            <a href="{{route('tax.edit', ['tid' => $b->id])}}"
                                               class="btn btn-sm btn-success disabled">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger disabled">X</a>
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
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
<script>
    $(document).ready(function () {
        $("#is_pension").next().on("click", (e) => {
            if(confirm('Are you sure ?')) {
                $('#pension').submit();
            } else {
                e.stopPropagation();
            }
        });
    });
</script>
</body>
</html>