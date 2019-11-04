@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 mb-3">
                <div class="card mb-2">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Message Body</h3>
                    </div>
                    <div class="card-body">
                        <div class="row border-bottom mt-3">
                            <div class="col">
                                <h3 class="h6 text-uppercase mb-0">{{ $sender }}</h3>
                                <p class="text-muted">
                                    <i class="fa fa-calendar"></i> {{ date('d M, Y h:i:s A', strtotime($created_at)) }}
                                </p>
                                {!! $msg !!}
                                {{-- file --}}
                                @if ($file)

                                    @php($ext = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'])

                                    @if (in_array(pathinfo($file, PATHINFO_EXTENSION), $ext))
                                        <a href="{{ route('message.file.download', $mid) }}">
                                            <img src="{{ asset($file) }}" alt="Image" style="max-height:200px">
                                        </a>
                                    @else
                                        <a href="{{ route('message.file.download', $mid) }}">
                                            <i class="fas fa-file-download" style="font-size: 50px; color: #2ecc71;"></i>
                                        </a>
                                    @endif

                                @endif
                            </div>
                            <div class="col">
                                <a href="{{ route('message.inbox.show.delete', $mid) }}" class="btn btn-danger btn-sm float-right" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Message To {{ $sender }}</h3>
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{session('success')}}
                            </div>
                        @endif

                        <form action="{{ route('message.reply') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="receiver" value="{{ $sender_id }}">

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