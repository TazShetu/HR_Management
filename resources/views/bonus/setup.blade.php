@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('BonusUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('BonusUpdateSuccess')}}
            </div>
        @elseif(session('BonusResetSuccess'))
            <div class="alert alert-info text-center">
                {{session('BonusResetSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Bonus Setup</h3>
                        <p class="text-secondary">Please Update Before Generating Salary !</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bonus.update')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Salary Percentage</label>
                                <div class="col-md-9">
                                    @if($errors->has('salaryPercentage'))
                                        <span class="help-block text-danger">{{$errors->first('salaryPercentage')}}</span>
                                    @endif
                                    <div class="input-group mb-3">
                                        <input type="number" value="{{$bonus->percentage}}" name="salaryPercentage"
                                               min="1" max="100" required
                                               class="form-control form-control-success {{$errors->has('salaryPercentage') ? 'is-invalid' : ''}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"> <b>%</b> </span>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted ml-3" style="margin-top: -10px;">max is 100%*
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Only Gross Salary</label>
                                <div class="col-md-9">
                                    <input type="checkbox" name="isGross" style="transform: scale(2);"
                                            {{ (($bonus->is_gross * 1) == 1 ) ? "checked" : "" }}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">User With Religion</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="religion" required>
                                        @if($errors->has('religion'))
                                            <span class="help-block text-danger">{{$errors->first('religion')}}</span>
                                        @endif
                                        <option selected disabled hidden value="">Choose...</option>
                                        <option value="all">All</option>
                                        @foreach($religions as $r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
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
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Employees selected to get bonus this month</h3>
                        @if(count($users) > 0)
                            <a href="{{route('bonus.reset')}}" class="btn btn-sm btn-danger float-right"
                               onclick="return confirm('Are you sure you want to reset all employees ?')"><i
                                        class="fas fa-undo"></i></a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if(count($users) > 0)
                            @foreach($users as $u)
                                <p>{{$u->name}}</p>
                            @endforeach
                        @else
                            No Employee will get bonus this month.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>