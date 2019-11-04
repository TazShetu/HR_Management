@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Pay Scale Create</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('payScale.store')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title"
                                           class="form-control form-control-success {{$errors->has('title') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('title'))
                                        <span class="help-block text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Wage</label>
                                <div class="col-md-9">
                                    <input type="number" step="0.01" min="0" name="pay"
                                           class="form-control form-control-success {{$errors->has('pay') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('pay'))
                                        <span class="help-block text-danger">{{$errors->first('pay')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Compensation</label>
                                <div class="col-md-9">
                                    <input type="number" step="0.01" min="0" name="compensation"
                                           class="form-control form-control-success {{$errors->has('compensation') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('compensation'))
                                        <span class="help-block text-danger">{{$errors->first('compensation')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Benefit</label>
                                <div class="col-md-9">
                                    <input type="number" step="0.01" min="0" name="benefit" required
                                           class="form-control form-control-success {{$errors->has('benefit') ? 'is-invalid' : ''}}">
                                    @if($errors->has('benefit'))
                                        <span class="help-block text-danger">{{$errors->first('benefit')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Benefit Details</label>
                                <div class="col-md-9">
                                    <textarea
                                            class="form-control form-control-success {{$errors->has('BenefitDetails') ? 'is-invalid' : ''}}"
                                            name="BenefitDetails" id="" cols="30" rows="3" required></textarea>
                                    @if($errors->has('BenefitDetails'))
                                        <span class="help-block text-danger">{{$errors->first('BenefitDetails')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Family Support</label>
                                <div class="col-md-9">
                                    <input type="number" step="0.01" min="0" name="familySupport" required
                                           class="form-control form-control-success {{$errors->has('familySupport') ? 'is-invalid' : ''}}">
                                    @if($errors->has('familySupport'))
                                        <span class="help-block text-danger">{{$errors->first('familySupport')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Family Support Details</label>
                                <div class="col-md-9">
                                    <textarea
                                            class="form-control form-control-success {{$errors->has('familySupportDetails') ? 'is-invalid' : ''}}"
                                            name="familySupportDetails" id="" cols="30" rows="3" required></textarea>
                                    @if($errors->has('familySupportDetails'))
                                        <span class="help-block text-danger">{{$errors->first('familySupportDetails')}}</span>
                                    @endif
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
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>