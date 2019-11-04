@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">New Message</h3>
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{session('success')}}
                            </div>
                        @endif

                        <form action="{{ route('message.send') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Receiver</label>
                                <div class="col-md-9">
                                    <select name="receiver" class="form-control">
                                        <option value="">Choose</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('receiver'))
                                        <span class="help-block text-danger">{{$errors->first('receiver')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Message</label>
                                <div class="col-md-9">
                                    <textarea name="message"></textarea>
                                    @if($errors->has('message'))
                                        <span class="help-block text-danger">{{$errors->first('message')}}</span>
                                    @endif
                                </div>
                                <script>CKEDITOR.replace('message');</script>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Upload</label>
                                <div class="col-md-9">
                                    <input type="file" name="file">
                                    @if($errors->has('file'))
                                        <span class="help-block text-danger">{{$errors->first('file')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <input type="submit" value="Send" class="btn btn-primary">
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