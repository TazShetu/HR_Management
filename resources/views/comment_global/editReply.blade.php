@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Edit Reply</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('replyg.update', ['rid' => $reply->id])}}" class="form-horizontal"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Reply</label>
                                <div class="col-md-10">
                                                <textarea
                                                        class="form-control {{$errors->has('reply') ? 'has-error' : ''}}"
                                                        name="reply" cols="30" rows="2"
                                                        required>{{$reply->replyg}}</textarea>
                                    @if($errors->has('reply'))
                                        <span class="help-block text-danger">{{$errors->first('reply')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Upload</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update Reply</button>
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