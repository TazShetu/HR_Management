@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @elseif(session('KpiSuccess'))
            <div class="alert alert-success text-center">
                {{session('KpiSuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">KPI Calculate</h3>
                        @if(($counter * 1) > 0)
                            <p class="text-warning"><b>{{$counter}}</b> Employee Exist Without Assessment.</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <a href="{{route('kpi.calculate')}}" class="btn btn-block btn-primary"
                           onclick="return confirm('Are You Sure ?')">Calculate KPI</a>
                    </div>
                </div>
            </div>

            @if(count($kpis) > 0)
                <div class="col-lg-8 offset-lg-2 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">KPI</h3>
                        </div>
                        <div class="card-body">
                            {{--         KPI Table                   --}}
                            <table class="table table-striped table-dark table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Attendance ({{$kS->attendance}})</th>
                                    <th scope="col">Attitude ({{$kS->attitude}})</th>
                                    <th scope="col">Performance ({{$kS->performance}})</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kpis as $k)
                                    <tr>
                                        <td>{{$k->name}}</td>
                                        <td>{{$k->attendance}}</td>
                                        <td>{{$k->attitude}}</td>
                                        <td>{{$k->performance}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>