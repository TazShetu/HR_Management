@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<link rel="stylesheet" href="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.css') }}">

<div class="container-fluid px-xl-5">
<section class="py-5">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Edit Attendance</h3>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            {{session('error')}}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="{{ route('attendance.update') }}" method="post" class="form-horizonatal">
                        @csrf
                        <input type="hidden" name="id" value="{{ $attendance->id }}">
                        @if($errors->has('id'))
                            <span class="help-block text-danger">Please Do Not Mess With The Original Code !!!</span>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Name</label>
                            <div class="col-md-9">
                                {{ $attendance->user->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Date</label>
                            <div class="col-md-9">
                                {{ $attendance->date }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">IN <small>Time</small></label>
                            <div class="col-md-9">
                                <span class="mr-2">{{ date('m/d/Y h:i A', strtotime($attendance->time_in)) }}</span>
                                <input type="text" name="time_in" id="dt1" placeholder="EDIT" class="form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">OUT <small>Time</small></label>
                            <div class="col-md-9">
                                <span class="mr-2">{{ date('m/d/Y h:i A', strtotime($attendance->time_out)) }}</span>
                                <input type="text" name="time_out" id="dt2" placeholder="EDIT" class="form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label"></label>
                            <div class="col-md-9">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@include('includes.bubbly.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
<script src="{{ asset('bubbly/vendor/dt-picker/bootstrap-datetimepicker.min.js') }}"></script>
<style>
    .font-30px {
        font-size: 30px;
    }
</style>

<script>
    $(function () {
        $('#dt1, #dt2').datetimepicker({
            icons: {
                time: 'far fa-clock font-30px',
                date: 'far fa-calendar font-30px'
            }
        });
    });
</script>

