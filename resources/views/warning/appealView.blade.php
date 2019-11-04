@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Appeal From {{ $appeal->user->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-justify">
                            {{ $appeal->appeal }}
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('warning.appeal.accept', $appeal->id) }}" class="btn btn-success btn-sm">Accept</a>
                            <span class="float-right">
                                <a href="{{ route('warning.appeal.reject.hearing', $appeal->id) }}" class="btn btn-danger btn-sm">Reject</a>
                            </span>
                        </div>
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