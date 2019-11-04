@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('ApproveSuccess'))
            <div class="alert alert-success text-center">
                {{session('ApproveSuccess')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="mb-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('leave.entry.dh') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">User :</label>
                                    <select name="name" id="" class="form-control">
                                        <option value="">Choose...</option>
                                        @foreach ($_users as $_user)
                                            <option value="{{ $_user->id }}">{{ $_user->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    From Date : <input type="date" name="fromDate" id="fromDate" class="form-control">
                                    @if($errors->has('fromDate'))
                                        <span class="help-block text-danger">{{$errors->first('fromDate')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                            <div class="col">
                                <fieldset>
                                    <legend>Leave type</legend>
                                    <table>
                                        @foreach ($leaveTypes as $LT)
                                            <tr>
                                                <td width="33%">{{ $LT->type }}</td>
                                                <td width="10%">:</td>
                                                <td width="57%"><input type="number" name="days[{{ $LT->id }}]" id=""></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Applied Users</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($users as $u)
                                <li class="list-group-item">
                                    <a href="{{route('leave.application.view.DH', ['uid' => $u[0]->id])}}">{{$u[0]->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(count($userLeavedays) > 0)
        <section class="py-5">
            <div class="row">
                <!-- Basic Form-->
                <div class="col mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">{{$user->name}}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('leave.application.approve')}}" method="post">
                                @csrf
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">
                                            <input type="checkbox" name="" id="selectAll"> Approve
                                        </th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userLeavedays as $ul)
                                        <tr>
                                            <td>{{ optional($ul->leavetype)->type}}</td>
                                            <td>{{date('jS F, Y', strtotime($ul->date))}}</td>
                                            <td><input type="checkbox" name="leaveDates[]" value="{{ $ul->id }}"></td>
                                            <td>
                                                <a href="{{ route('leave.application.reject.dh', $ul->id) }}" class="btn btn-outline-danger btn-sm"
                                                   onclick="return confirm('Are you sure ?')">
                                                    Reject
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($errors->has('leaveDates'))
                                    <span class="help-block text-danger">Please approve at least one date.</span>
                                    <br>
                                @endif
                                <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Are you sure ?')">Approve
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
@include('includes.bubbly.footer')

<script>
    $("#selectAll").click(function(){
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    });
</script>

</body>
</html>