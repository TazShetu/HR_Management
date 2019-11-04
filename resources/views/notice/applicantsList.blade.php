@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('EmployeeSelectSuccess'))
            <div class="alert alert-success text-center">
                {{session('EmployeeSelectSuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">{{$jobtitle}}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applicants as $i => $a)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->email}}</td>
                                    <td class="text-right">
                                        <a href="{{route('applicant.view', ['aid' => $a->id])}}" class="btn btn-sm btn-outline-info">View</a>
                                        @if(($a->is_shortlisted * 1) == 0)
                                            {{--Not Selected--}}
                                            <a href="{{route('select.applicant', ['aid' => $a->id])}}"
                                               class="btn btn-sm btn-success">Shortlisted</a>
                                            <a href="#" class="btn btn-sm btn-danger disabled">Unselect</a>
                                        @else
                                            {{--Selected--}}
                                            <a href="#" class="btn btn-sm btn-success disabled">Shortlisted</a>
                                            <a href="{{route('unselect.applicant', ['aid' => $a->id])}}"
                                               class="btn btn-sm btn-danger">Unselect</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">{{$jobtitle}}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applicants as $i => $a)
                                @if(($a->is_shortlisted * 1) == 1)
                                    <tr>
                                        <th scope="row">{{$i + 1}}</th>
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->email}}</td>
                                        <td class="text-right">
                                            <a href="{{route('applicant.employee', ['aid' => $a->id, 'nid' => $nid])}}" class="btn btn-sm btn-success"
                                               onclick="return confirm('Are you Sure ?')">Select</a>
                                            <a href="{{route('unselect.applicant', ['aid' => $a->id])}}"
                                               class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure ?')">Unselect</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>