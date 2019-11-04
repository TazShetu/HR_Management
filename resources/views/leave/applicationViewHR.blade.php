@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('ForwardSuccess'))
            <div class="alert alert-success text-center">
                {{session('ForwardSuccess')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            {{--@elseif(session('NoticeUnpublishSuccess'))--}}
            {{--<div class="alert alert-success text-center">--}}
            {{--{{session('NoticeUnpublishSuccess')}}--}}
            {{--</div>--}}
        @endif
        <div class="row">

            <!-- Basic Form-->
            <div class="col mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Applied Users</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($users as $u)
                                <li class="list-group-item">
                                    <a href="{{route('leave.application.view', ['uid' => $u[0]->id])}}">{{$u[0]->name}}</a>
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
                            <form action="{{route('leave.application.forward')}}" method="post">
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
                                                <a href="{{ route('leave.application.reject.hr', $ul->id) }}"
                                                   class="btn btn-outline-danger btn-sm"
                                                   onclick="return confirm('Are you sure ?')"> Reject </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($errors->has('leaveDates'))
                                    <span class="help-block text-danger">Please approve at least one date before forwarding it to department-head.</span>
                                    <br>
                                @endif
                                <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Are you sure ?')">Forward
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
    $("#selectAll").click(function () {
        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    });
</script>

</body>
</html>