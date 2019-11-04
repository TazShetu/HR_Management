@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
            {{--        @elseif(session('kpiVotingOn'))--}}
            {{--            <div class="alert alert-success text-center">--}}
            {{--                {{session('kpiVotingOn')}}--}}
            {{--            </div>--}}
        @endif
            <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">KPI Vote</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('kpi.vote.store')}}" class="form-horizontal" method="post">
                            @csrf
                            <h5>Value Others</h5>
                            <hr>
                            @foreach($users as $u)
                                <div class="form-group row user-value">
                                    <label class="col-md-2 form-control-label">{{$u->name}}</label>
                                    <div class="col-md-9">
                                        <input type="range" class="custom-range" min="1" max="10"
                                               name="allu[{{$u->id}}]" required value="9">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control form-control-success" value="9" readonly>
                                    </div>
                                </div>
                            @endforeach
                            <br>
                            <h5>Junior's Performance</h5>
                            <hr>
                            @foreach($juniorUsers as $u)
                                <div class="form-group row user-value">
                                    <label class="col-md-2 form-control-label">{{$u->name}}</label>
                                    <div class="col-md-9">
                                        <input type="range" class="custom-range" min="1" max="10"
                                               name="jus[{{$u->id}}]" required value="9">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control form-control-success" value="9" readonly>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Vote</button>
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
<script>
    $(function () {
        $('.user-value').each((i, e) => {
            $(e).find("input[type='range']").change((f) => {
                $(f.target).closest('.user-value').find("input[type='text']").val($(f.target).closest('.user-value').find("input[type='range']").val());
            });
        });
    });
</script>
</body>
</html>