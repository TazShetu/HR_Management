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
                </div>
            </div>
        </div>

    </section>
</div>

@include('includes.bubbly.footer')