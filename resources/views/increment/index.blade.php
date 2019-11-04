@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @elseif(session('PromoteSuccess'))
            <div class="alert alert-success text-center">
                {{session('PromoteSuccess')}}
            </div>
        @elseif(session('CanNotPromote'))
            <div class="alert alert-success text-center">
                {{session('CanNotPromote')}}
            </div>
        @elseif(session('mess'))
            <div class="alert alert-danger text-center">
                {{session('mess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Employee Promotion</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('promote.employee')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <select class="form-control" name="employee">
                                        <option selected disabled hidden value="">Select Employee</option>
                                        @foreach($employees as $e)
                                            <option value="{{$e->id}}">{{$e->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <select class="form-control" name="designation">
                                        <option selected disabled hidden value="">Select Designation</option>
                                        @foreach($designations as $d)
                                            <option value="{{$d->id}}">{{$d->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-sm btn-primary">Promote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Employee Increment</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Increment(%)</th>
                                <th scope="col">Max</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($errors->has('increment'))
                                <span class="help-block text-danger">{{$errors->first('increment')}}</span>
                            @endif
                            @foreach($employees as $i => $e)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$e->name}}</td>
                                    <td>{{$e->pay->pay}}</td>
                                    <form action="{{route('increment.employee', ['eid' => $e->id])}}" method="post"
                                          class="increment-form">
                                        @csrf
                                        <td>
                                            <input type="number" min="0" max="{{$e->max}}" class="increament"
                                                   name="increment" step="0.1"
                                                   style="border-radius: 5px;" required>%
                                        </td>
                                        <td>{{$e->max}}%</td>
                                        <td>
                                            {{--<button type="submit" class="btn btn-sm btn-outline-info" disabled>--}}
                                            <button type="submit" class="btn btn-sm btn-outline-info">
                                                Increase
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


{{--                        @foreach($employees as $i => $e)--}}
{{--                            <form action="" class="increment-form">--}}
{{--                                <input type="text">--}}
{{--                                <button disabled>V</button>--}}
{{--                            </form>--}}
{{--                        @endforeach--}}


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
<script>
    $(function () {
        $('.increment-form').each((i, e) => {
            $(e).find('input:not(:hidden)').change((f) => {
                var incrementForm = $(f.target).closest('.increment-form');
                var validFields = [];
                var fields = incrementForm.find('input:not(:hidden)');
                fields.each((j, g) => {
                    validFields.push(g.value != "");
                });
                incrementForm.find('button').prop("disabled", validFields.includes(false));
            });
        });
    });
</script>
</body>
</html>