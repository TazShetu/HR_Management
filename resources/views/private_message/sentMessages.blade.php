@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Sent Messages</h3>
                    </div>
                    <div class="card-body">

                        @foreach ($sentMessages as $item)
                            <div class="row border-bottom mt-3">
                                <div class="col">
                                    <h3 class="h6 text-uppercase mb-0">{{ $item['receiver'] }}</h3>
                                    <p class="text-muted">
                                        <i class="fa fa-calendar"></i> {{ date('d M, Y h:i:s A', strtotime($item['date'])) }}
                                    </p>
                                    <div>
                                        <a href="{{ route('message.sent.show', $item['id']) }}" style="text-decoration:none">
                                            {!! Str::limit($item['msg'], 40) !!}
                                        </a>
                                    </div>
                                    @if ($item['status'] == 'seen')
                                        <span class="text-muted">
                                        {{ ucfirst($item['status']) }} at {{ date('d M, Y h:i:s A', strtotime($item['seenTime'])) }}
                                    </span>
                                    @endif
                                </div>
                                <div class="col">
                                    <a href="{{ route('message.sent.delete', $item['id']) }}" class="btn btn-danger btn-sm float-right" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

@include('includes.bubbly.footer')