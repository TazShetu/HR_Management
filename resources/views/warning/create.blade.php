@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Create Warning</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('warning.store') }}" class="form-horizontal"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Name</label>
                                <div class="col-md-9">
                                    <select name="name" id="" class="form-control form-control-success {{$errors->has('name') ? 'has-error' : ''}}">
                                        <option value="">Choose...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Description</label>
                                <div class="col-md-9">
                                    <textarea
                                            class="form-control form-control-success {{$errors->has('warningDescription') ? 'has-error' : ''}}"
                                            name="warningDescription" id="" cols="30" rows="4" required></textarea>
                                    <script>
                                        CKEDITOR.replace('warningDescription');
                                    </script>
                                    @if($errors->has('warningDescription'))
                                        <span class="help-block text-danger">{{$errors->first('warningDescription')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>