@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('PayScaleCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('PayScaleCreateSuccess')}}
            </div>
        @elseif(session('PayScaleUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('PayScaleUpdateSuccess')}}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">
                {{session('error')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-info text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col mb-5">
                <a href="{{route('payScale.create')}}" class="btn btn-block btn-primary mb-5">Create New Pay Scale</a>
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">All Pay Scales</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Wage</th>
                                <th>Compensation</th>
                                <th>Benefit</th>
                                <th>Benefit Details</th>
                                <th>Support</th>
                                <th>Support Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ps as $i => $p)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$p->title}}</td>
                                    <td>{{$p->pay}}</td>
                                    <td>{{$p->compensation}}</td>
                                    <td>{{$p->benefit}}</td>
                                    <td>{{$p->benefit_detail }}</td>
                                    <td>{{$p->family_support}}</td>
                                    <td>{{$p->family_support_detail}}</td>
                                    <td>
                                        <a href="{{route('payScale.edit', ['pid' => $p->id])}}"
                                           class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <a href="{{route('payScale.delete', ['pid' => $p->id])}}"
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirm('Are you sure ?')">X</a>
                                    </td>
                                </tr>
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