@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Create Verbal Warning</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verbalHearing.store') }}" class="form-horizontal" method="post">
                            @csrf
                            <input type="hidden" name="warning_id" value="{{ $wid }}">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Warning</label>
                                <div class="col-md-9">
                                    <textarea
                                            class="form-control form-control-success {{$errors->has('hearing_message') ? 'is-invalid' : ''}}"
                                            name="hearing_message" id="" cols="30" rows="4" required></textarea>
                                    <script>
                                        CKEDITOR.replace('hearing_message');
                                    </script>
                                    @if($errors->has('hearing_message'))
                                        <span class="help-block text-danger">{{$errors->first('hearing_message')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>