@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
{{--<link rel="stylesheet" href="{{ asset('bubbly/vendor/date-time-picker/bootstrap-datetimepicker.css') }}">--}}

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0"></h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{session('error')}}
                            </div>
                        @endif
                        <div class="row">
                            <label class="col-md-3 form-control-label">Name</label>
                            <div class="col-md-9">
                                <select name="" id="userName" class="form-control">
                                    <option value="">Choose</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Current Month Attendances</h3>
                    </div>
                    <div class="card-body">
                        <div id="showCurrentDateAttendances"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@include('includes.bubbly.footer')
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>--}}
{{--<script src="{{ asset('bubbly/vendor/date-time-picker/bootstrap-datetimepicker.min.js') }}"></script>--}}
<script type="text/javascript">
    $(function () {
        $("#userName").change(function() {
            var user_id = $("#userName").val();
            if (user_id != '') {
                $.ajax({
                    url: '/attendance/ajax/'+ user_id+'/current',
                    method: "GET",
                    success: function(response) {
                        if (response != '') {
                            $("#showCurrentDateAttendances").html(response);
                        }
                    }
                });
            } else {
                $("#showCurrentDateAttendances").html('');
            }
        });
    });
</script>