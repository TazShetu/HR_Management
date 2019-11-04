@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('SalaryCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('SalaryCreateSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        @if(count($salaries) > 0)
            <script>
                function printT(el) {
                    var rp = document.body.innerHTML;
                    var pc = document.getElementById(el).innerHTML;
                    document.body.innerHTML = pc;
                    window.print();
                    document.body.innerHTML = rp;
                }
            </script>
            <div class="row float-right">
                <div class="col">
                    <button onclick="printT('PC')" class="btn btn-sm btn-outline-info"><i class="fas fa-print"></i>
                    </button>
                    <a href="{{route('salary.csv.download')}}" class="btn btn-sm btn-outline-info"><i
                                class="far fa-file-excel"></i></a>
                </div>
            </div>
            <hr style="margin-top: 40px;">
            <div class="row" id="PC">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Employee</th>
                                <th scope="col">Branch</th>
                                {{--Mentin With or without overtime--}}
                                <th scope="col">Basic Salary</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Compensation</th>
                                <th scope="col">Benefit</th>
                                <th scope="col">Family Support</th>
                                <th scope="col">Bonus</th>
                                <th scope="col">Loan Paid</th>
                                <th scope="col">Provident Fund</th>
                                @if (($pension->is_active * 1) == 1)
                                    <th scope="col">Pension</th>
                                @endif
                                <th scope="col">Total Salary</th>
                                <th scope="col">Overtime (hours)</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salaries as $s)
                                <tr>
                                    <td>{{$s->user_name}}</td>
                                    <td>{{$s->branch}}</td>
                                    <td>{{$s->pay}}</td>
                                    <td>{{$s->tax}}</td>
                                    <td>{{$s->compensation}}</td>
                                    <td>{{$s->benefit}}</td>
                                    <td>{{$s->family_support}}</td>
                                    <td>{{$s->bonus}}</td>
                                    <td>{{$s->loan}}</td>
                                    <td>{{$s->total_provident_fund}}</td>
                                    @if (($pension->is_active * 1) == 1)
                                        <td>{{$s->total_pension}}</td>
                                    @endif
                                    <th>{{$s->salary}}</th>
                                    <td>
                                        <span {{ (($s->over_time_hour * 1) < 0) ? "style=\"color:#e74c3c;" : "" }}>{{$s->over_time_hour}}</span>
                                    </td>
                                    <td>
                                        <a href="{{route('salary.edit', ['sid' => $s->id])}}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            @if(($pension->st_is_over * 1) == 1)
                <div class="row pt-5">
                    <div class="col-lg-10 offset-lg-1">
                        <a href="{{route('salary.generate', ['is_over' => 1, 'is_pay_over' => 1])}}"
                           class="btn btn-block btn-outline-primary"
                           onclick="return confirm('Are You Sure You Want To Generate Salary For {{$lastMonth}}')">
                            Generate Salary For {{$lastMonth}} With Overtime
                        </a>
                    </div>
                </div>
            @elseif(($pension->st_is_over * 1) == 0)
                <div class="row pt-5">
                    <div class="col-lg-10 offset-lg-1">
                        <a href="{{route('salary.generate', ['is_over' => 1, 'is_pay_over' => 0])}}"
                           class="btn btn-block btn-outline-success"
                           onclick="return confirm('Are You Sure You Want To Generate Salary For {{$lastMonth}}')">
                            {{--                            Generate Salary For {{$lastMonth}} With Overtime But Do Not Pay Extra--}}
                            Generate Salary For {{$lastMonth}} Without Overtime
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </section>
</div>
@include('includes.bubbly.footer')

</body>
</html>