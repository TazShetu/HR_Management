@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('OfficeUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('OfficeUpdateSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Office Setup</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('office.setup.update')}}" class="form-horizontal" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Footer Text</label>
                                <div class="col-md-10">
                                    <input type="text" name="footerText" value="{{ $office ? $office->footer : "" }}"
                                           class="form-control form-control-success {{$errors->has('footerText') ? 'is-invalid' : ''}}">
                                    {{--                                    @if($errors->has('footerText'))--}}
                                    {{--                                        <span class="help-block text-danger">{{$errors->first('footerText')}}</span>--}}
                                    {{--                                    @endif--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Logo</label>
                                <div class="col-md-10">
                                    @if($office && $office->logo)
                                        <img src="{{asset($office->logo)}}" alt="logo"
                                             style="max-width: 250px; max-height: 200px;">
                                    @endif
                                    <br>
                                    <input type="file" name="logo" class="{{$errors->has('logo') ? 'is-invalid' : ''}}"
                                           @if($office && $office->logo) style="margin-top: 20px;" @endif >
                                    {{--                                    @if($errors->has('logo'))--}}
                                    {{--                                        <span class="help-block text-danger">{{$errors->first('logo')}}</span>--}}
                                    {{--                                    @endif--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Logo Background</label>
                                <div class="col-md-10">
                                    <input type="color" name="logoBG"
                                           value="{{ ($office && $office->logo_bg) ? $office->logo_bg : '#1caf9a' }}"
                                           class="form-control form-control-success {{$errors->has('logoBG') ? 'is-invalid' : ''}}">
                                </div>
                            </div>
                            <hr>
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
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>