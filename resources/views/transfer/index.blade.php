@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 offset-lg-3 pb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Select Employee</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('transfer.release.submit')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Select Employee</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="employee" required>
                                        @if($errors->has('employee'))
                                            <span class="help-block text-danger">{{$errors->first('employee')}}</span>
                                        @endif
                                        <option selected disabled hidden value="">Choose...</option>
                                        @foreach($es as $e)
                                            <option value="{{$e->id}}">{{$e->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Select Branch</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="branch" required>
                                        @if($errors->has('branch'))
                                            <span class="help-block text-danger">{{$errors->first('branch')}}</span>
                                        @endif
                                        <option selected disabled hidden value="">Choose...</option>
                                        @foreach($bs as $b)
                                            <option value="{{$b->id}}">{{$b->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
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