@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('ProvidentUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('ProvidentUpdateSuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Provident Fund Setup</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('provident.update')}}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">User's Share</label>
                                <div class="col-md-9">
                                    @if($errors->has('usersShare'))
                                        <span class="help-block text-danger">{{$errors->first('usersShare')}}</span>
                                    @endif
                                    <div class="input-group mb-3">
                                        <input type="number" name="usersShare" min="0" max="100"
                                               value="{{$p->from_user}}"
                                               class="form-control form-control-success {{$errors->has('usersShare') ? 'is-invalid' : ''}}"
                                               required step="0.01">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"> <b>%</b> </span>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted ml-3" style="margin-top: -10px;">max is 100%*
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Company's Share</label>
                                <div class="col-md-9">
                                    @if($errors->has('companysShare'))
                                        <span class="help-block text-danger">{{$errors->first('companysShare')}}</span>
                                    @endif
                                    <div class="input-group mb-3">
                                        <input type="number" name="companysShare" min="0" max="100"
                                               value="{{$p->from_employer}}"
                                               class="form-control form-control-success {{$errors->has('companysShare') ? 'is-invalid' : ''}}"
                                               required step="0.01">
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
                                    <input id="is_gross" type="checkbox" name="is_gross" style="transform: scale(2);margin-left: 15px;"
                                            {{ (($p->is_gross * 1) == 1 ) ? "checked" : "" }}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update Provident Fund</button>
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