@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('NoticeUnpublishSuccess'))
            <div class="alert alert-success text-center">
                {{session('NoticeUnpublishSuccess')}}
            </div>
        @elseif(session('NoticePublishSuccess'))
            <div class="alert alert-success text-center">
                {{session('NoticePublishSuccess')}}
            </div>
        @elseif(session('NoApplicant'))
            <div class="alert alert-warning text-center">
                {{session('NoApplicant')}}
            </div>
        @endif
        <div class="row">


            <div class="col-lg-8 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">{{$t}}</h3>
                    </div>
                    <div class="card-body">
                        {!! $n->notice !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">Action</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{route('notice.applicant.view', ['nid' => $n->id])}}"
                                   class="btn btn-sm btn-outline-success">Applicant</a>
                                @if(($n->publish * 1) == 1)
                                    <a href="{{route('circular.unpublish', ['nid' => $n->id])}}"
                                       class="btn btn-sm btn-info">Unpublish</a>
                                @else
                                    <a href="{{route('circular.publish', ['nid' => $n->id])}}"
                                       class="btn btn-sm btn-info">Publish</a>
                                @endif
                                <a href="{{route('notice.edit', ['nid' => $n->id])}}"
                                   class="btn btn-sm btn-success">Edit</a>
                                <a href="javascript:void(0)" onclick="noticeDelete({{ $n->id }})"
                                   class="btn btn-sm btn-danger mb-1">X</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
<script>
    function noticeDelete(nid) {
        if (nid != '') {
            $.ajax({
                url: ("{{ route('total.applied.user', 'nid') }}").replace('nid', nid),
                method: "GET",
                success: function (res) {
                    if (res > 0) {
                        if (confirm("This notice has '" + res + "' applicants. Are you sure to force delete ?")) {
                            window.location.href = ("{{ route('notice.delete', 'nid') }}").replace('nid', nid);
                        }
                    } else {
                        if (confirm("Are you sure?")) {
                            window.location.href = ("{{ route('notice.delete', 'nid') }}").replace('nid', nid);
                        }
                    }
                }
            });
        }
    }
</script>
</body>
</html>