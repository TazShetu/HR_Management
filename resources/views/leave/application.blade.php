@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('ApplySuccess'))
            <div class="alert alert-success text-center">
                {{session('ApplySuccess')}}
            </div>
        @elseif(session('ApplyUnsuccess'))
            <div class="alert alert-danger text-center">
                {{session('ApplyUnsuccess')}}
            </div>
        @elseif(session('LeaveDeleteSuccess'))
            <div class="alert alert-info text-center">
                {{session('LeaveDeleteSuccess')}}
            </div>
        @elseif(session('MESS'))
            <div class="alert alert-danger text-center">
                {{session('MESS')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">

            <!-- Basic Form-->
            <div class="col mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Leave Application Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('leave.application.submit', ['uid' => $user->id])}}"
                              class="form-horizontal" method="post">
                            @csrf
                            <div style="float: right;">Date: {{\Carbon\Carbon::now()->format('jS F Y')}}</div>
                            <br>
                            <div>To,</div>
                            <br>
                            <div class="ml-3">HR</div>
                            <br>
                            <div>Subject: Leave Application</div>
                            <br>
                            <div>Dear Sir/Madam ,</div>
                            <br>
                            <div>This letter is a formal request for a leave of absence. I would like to request a leave
                                of absence from
                                <input type="date" name="fromDate" id="fromDate" required></div>
                            @if($errors->has('fromDate'))
                                <span class="help-block text-danger">{{$errors->first('fromDate')}}</span>
                            @endif
                            <div>I will return to work on <input type="date" name="toDate" id="toDate" readonly></div>
                            <br>
                            {{--Type of Leave--}}
                            @if($errors->has('leaveType'))
                                <span class="help-block text-danger">Please select at least one leave type.</span>
                            @endif
                            @if($errors->has('days'))
                                <span class="help-block text-danger">Please write how many days.</span>
                            @endif
                            {{--                            <div class="container">--}}
                            <div class="row">
                                <div class="col">
                                    @foreach($lts as $lt)
                                        <div class="form-check">
                                            {{-- <input type="checkbox" name="leaveType[]" value="{{$lt->id}}">--}}
                                            <label class="form-check-label mb-2"
                                                   style="min-width: 70px;">{{$lt->type}}</label>
                                            @php $x = 0; @endphp
                                            @if ($lt->id != 1)
                                                @if(count($leaves) > 0)
                                                    @foreach($leaves as $leave)
                                                        @if(($leave->leavetype_id * 1) == ($lt->id * 1))
                                                            <span>
                                                                <input type="number" name="days[]" min="1"
                                                                       max="{{$maxLeavePerType - $leave->accepted_days}}">
                                                                Remaining {{$maxLeavePerType - $leave->accepted_days}} days
                                                            </span>
                                                            @php $x = 1; @endphp
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if(($x * 1) != 1)
                                                        <span>
                                                            <input type="number" name="days[]" min="1" max="{{$maxLeavePerType}}">
                                                            Remaining {{$maxLeavePerType}} days
                                                        </span>
                                                    @endif
                                                @else
                                                    <span>
                                                        <input type="number" name="days[]" min="1" max="{{$maxLeavePerType}}">
                                                        Remaining {{$maxLeavePerType}} days
                                                    </span>
                                                @endif
                                            @elseif ($lt->id == 1)
                                                <span>
                                                    <input type="number" name="days[]" min="1">
                                                </span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{--                            </div>--}}
                            <br>
                            <div>Please let me know if I can provide further information or if you have any questions.
                            </div>
                            <div>Thank you very much for your consideration in providing me with this opportunity of
                                total <strong id="totalLeave">0</strong> day/s of leave.
                            </div>
                            <br>
                            <div>Sincerely,</div>
                            <div>{{$user->name}}</div>
                            <div>{{ optional($job)->title}}</div>
                            <hr>
                            <input type="hidden" name="today" value="{{\Carbon\Carbon::today()->format('Y-m-d')}}">
                            <div class="form-group row">
                                <div class="col ml-auto">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Already Applied Dates</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>#SL</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($leaveOldDates as $i => $value)
                                    <tr>
                                        <td># {{ $i + 1 }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ date('jS F, Y', strtotime($value->date)) }}</td>
                                        <td>
                                            @if ((($value->rejectDH)*1) == 1)
                                                <span class="badge badge-danger"> Rejected By DH </span>
                                            @elseif ((($value->rejectHR)*1) == 1)
                                                <span class="badge badge-danger"> Rejected By HR </span>
                                            @elseif ((($value->approveHR)*1) == 0 && (($value->approveDH)*1) == 0)
                                                <span class="badge badge-info"> Pending </span>
                                            @elseif ((($value->approveHR)*1) == 1 && (($value->approveDH)*1) == 1)
                                                <span class="badge badge-success"> Approved </span>
                                            @elseif ((($value->approveHR)*1) == 1)
                                                <span class="badge badge-info"> HR Landing </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if((($value->approveHR)*1) == 0 && (($value->approveDH)*1) == 0)
                                                <a href="{{ route('applied.leave.delete', $value->id) }}"
                                                   class="btn btn-outline-danger btn-sm"
                                                   onclick="return confirm('Are you sure ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            @else
                                                <a href="#"
                                                   class="btn btn-outline-danger btn-sm disabled"
                                                   onclick="return confirm('Are you sure ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@include('includes.bubbly.footer')

<script>
    // Write JS Here
    $(function () {
        function totalDays() {
            // var s = $("#sickDays").val();
            // var c = $("#casualDays").val();
            // var e = $("#earnedDays").val();
            // var totalDays = (s * 1) + (c * 1) + (e * 1);
            // $("#totalLeave").html(totalDays);
            var date1 = new Date($("#fromDate").val());
            var date2 = new Date();
            // date2.setDate(date1.getDate() + totalDays);
            date2.setDate(date1.getDate());
            document.getElementById('toDate').value = date2.toISOString().slice(0, 10);
        }
        {{--function checkS() {--}}
        {{--    var maxS = [];--}}
        {{--    maxS.push({--}}
        {{--        maxLeave: '{{$maxLeavePerType}}',--}}
        {{--        sickLeave: '{{$leave->sick}}',--}}
        {{--    });--}}
        {{--    var s = $("#sickDays").val();--}}
        {{--    // console.log(maxS);--}}
        {{--    if ((s * 1) <= ((maxS[0].maxLeave * 1) - (maxS[0].sickLeave * 1))) {--}}
        {{--        totalDays();--}}
        {{--        document.getElementById("sick").checked = true;--}}
        {{--    } else {--}}
        {{--        $('input[name=sickDays]').val('0');--}}
        {{--        totalDays();--}}
        {{--    }--}}
        {{--}--}}
        {{--function checkC() {--}}
        {{--    var maxS = [];--}}
        {{--    maxS.push({--}}
        {{--        maxLeave: '{{$maxLeavePerType}}',--}}
        {{--        casualLeave: '{{$leave->casual}}'--}}
        {{--    });--}}
        {{--    var c = $("#casualDays").val();--}}
        {{--    if ((c * 1) <= ((maxS[0].maxLeave * 1) - (maxS[0].casualLeave * 1))) {--}}
        {{--        totalDays();--}}
        {{--        document.getElementById("casual").checked = true;--}}
        {{--    } else {--}}
        {{--        $('input[name=casualDays]').val('0');--}}
        {{--        totalDays();--}}
        {{--    }--}}
        {{--}--}}
        {{--function checkE() {--}}
        {{--    var maxS = [];--}}
        {{--    maxS.push({--}}
        {{--        maxLeave: '{{$maxLeavePerType}}',--}}
        {{--        earnedLeave: '{{$leave->earn}}'--}}
        {{--    });--}}
        {{--    var e = $("#earnedDays").val();--}}
        {{--    if ((e * 1) <= ((maxS[0].maxLeave * 1) - (maxS[0].earnedLeave * 1))) {--}}
        {{--        totalDays();--}}
        {{--        document.getElementById("earned").checked = true;--}}
        {{--    } else {--}}
        {{--        $('input[name=earnedDays]').val('0');--}}
        {{--        totalDays();--}}
        {{--    }--}}
        {{--}--}}
        $("#fromDate").change((e) => {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            if (today > ($("#fromDate").val())) {
                alert('Please Select an Appropriate Date !');
            } else {
                // document.getElementById('sickDays').disabled = false;
                // document.getElementById('casualDays').disabled = false;
                // document.getElementById('earnedDays').disabled = false;
                totalDays();
            }
        });
        // $("#sickDays").change((e) => {
        //     checkS();
        // });
        // $("#casualDays").change((e) => {
        //     checkC();
        // });
        // $("#earnedDays").change((e) => {
        //     checkE();
        // });
    });
</script>

</body>
</html>