@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('SalaryUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('SalaryUpdateSuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">General Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('general.setup.update')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Per Day Working Hour</label>
                                <div class="col-md-10">
                                    <input type="number" step="0.01" min="1" max="16" name="hour" value="{{$p->pdwh}}"
                                           class="form-control form-control-success {{$errors->has('hour') ? 'has-error' : ''}}"
                                           required>
                                    @if($errors->has('hour'))
                                        <span class="help-block text-danger">{{$errors->first('hour')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Weekly Holiday</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="weeklyHoliday" required>
                                        @if($errors->has('weeklyHoliday'))
                                            <span class="help-block text-danger">{{$errors->first('weeklyHoliday')}}</span>
                                        @endif
                                            <option selected hidden value="{{$p->wh}}">{{$p->wh}}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Salary Calculation type</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="salaryType" required>
                                        @if($errors->has('salaryType'))
                                            <span class="help-block text-danger">{{$errors->first('salaryType')}}</span>
                                        @endif
                                            <option selected hidden value="{{$p->st_is_over}}">{{ (($p->st_is_over * 1) == 1) ? "With Overtime" : "Without Overtime" }}</option>
                                            <option value="1">With Overtime</option>
                                            <option value="0">Without Overtime</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>