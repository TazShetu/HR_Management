@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('menuUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('menuUpdateSuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-uppercase mb-0">All Menu Names</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm card-text">
                            <thead>
                            <tr>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ms as $m)
                                <tr>
                                    <td>
                                        @if($m->level == 0)
                                            <span>{{$m->display_name}}</span>
                                        @elseif($m->level == 1)
                                            <span style="margin-left: 30px;">{{$m->display_name}}</span>
                                        @elseif($m->level == 2)
                                            <span style="margin-left: 60px;">{{$m->display_name}}</span>
                                        @elseif($m->level == 3)
                                            <span style="margin-left: 90px;">{{$m->display_name}}</span>
                                        @elseif($m->level == 4)
                                            <span style="margin-left: 120px;">{{$m->display_name}}</span>
                                        @endif
                                    </td>
                                    <td>{{$m->description }}</td>
                                    <td>
                                        <a href="{{route('menu.edit', ['mid' => $m->id])}}"
                                           class="btn btn-sm btn-success">Edit</a>
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