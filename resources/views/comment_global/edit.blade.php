@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Edit Comment</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('commentg.update', ['cid' => $c->id])}}" class="form-horizontal"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Comment</label>
                                <div class="col-md-10">
                                                <textarea
                                                        class="form-control {{$errors->has('comment') ? 'has-error' : ''}}"
                                                        name="comment" cols="30" rows="2"
                                                        required>{{$c->commentg}}</textarea>
                                    @if($errors->has('comment'))
                                        <span class="help-block text-danger">{{$errors->first('comment')}}</span>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                            {{--<label class="col-md-2 form-control-label">Tag User</label>--}}
                            {{--<div class="col-md-10">--}}
                            {{--@foreach($users as $u)--}}
                            {{--@if((($u->id)*1) != Auth::id())--}}
                            {{--<label class="checkbox-inline">--}}
                            {{--<input type="checkbox" name="tags[]"--}}
                            {{--@if(count($tags) > 0)--}}
                            {{--@foreach($tags as $t)--}}
                            {{--@if((($t->user_id)*1) == (($u->id)*1))--}}
                            {{--checked--}}
                            {{--@endif--}}
                            {{--@endforeach--}}
                            {{--@endif--}}
                            {{--value="{{$u->id}}"> {{$u->name}}--}}
                            {{--</label>--}}
                            {{--@endif--}}
                            {{--@endforeach--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label">Upload</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Update Comment</button>
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