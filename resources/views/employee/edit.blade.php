@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 offset-lg-3 pb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Select Employee</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.edit.1')}}" method="post" id="userSelected">
                            @csrf
                            <select class="form-control" name="employee_id" id="selectUser">
                                <option selected disabled hidden value="">Choose...</option>
                                @foreach($es as $e)
                                        <option value="{{$e->id}}">{{$e->name}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
<script>
    $(document).ready(function () {
        $("#selectUser").change((e) => {
            $('#userSelected').submit();
        });
    });
</script>
</body>
</html>