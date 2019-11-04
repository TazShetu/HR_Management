@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col mb-5">
                <div class="card">
                    <div class="card-header">
                        {{--                            <div class="col">--}}
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
                        {{--                            </div>--}}
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" value="{{$a->name}}"
                                       class="form-control form-control-success {{$errors->has('name') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" value="{{$a->email}}"
                                       class="form-control form-control-success {{$errors->has('email') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Father's Name</label>
                            <div class="col-md-9">
                                <input type="text" name="fathersName" value="{{$a->FathersName}}"
                                       class="form-control form-control-success {{$errors->has('fathersName') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Mother's Name</label>
                            <div class="col-md-9">
                                <input type="text" name="mothersName" value="{{$a->MothersName}}"
                                       class="form-control form-control-success {{$errors->has('mothersName') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Date Of Birth</label>
                            <div class="col-md-9">
                                <input type="date" name="dob" value="{{$a->dob}}"
                                       class="form-control form-control-success {{$errors->has('dob') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Mobile</label>
                            <div class="col-md-9">
                                <input type="text" name="mobile" value="{{$a->mobile}}"
                                       class="form-control form-control-success {{$errors->has('mobile') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nationality</label>
                            <div class="col-md-9">
                                <input type="text" name="nationality" value="{{$a->nationality}}"
                                       class="form-control form-control-success {{$errors->has('nationality') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">About Me</label>
                            <div class="col-md-9">
                                <div class="form-control form-control-success" style="background-color: #e9ecef;">
                                    {!! $a->about_me !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Address</label>
                            <div class="col-md-9">
                                <div class="form-control form-control-success" style="background-color: #e9ecef;">
                                    {!! $a->address !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Education</label>
                            <div class="col-md-9">
                                <div class="form-control form-control-success" style="background-color: #e9ecef;">
                                    {!! $a->education !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Employment</label>
                            <div class="col-md-9">
                                <div class="form-control form-control-success" style="background-color: #e9ecef;">
                                    {!! $a->employment !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Skills</label>
                            <div class="col-md-9">
                                <input type="text" name="skills" value="{{$a->skills}}"
                                       class="form-control form-control-success {{$errors->has('skills') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Languages</label>
                            <div class="col-md-9">
                                <input type="text" name="languagess" value="{{$a->languages}}"
                                       class="form-control form-control-success {{$errors->has('languagess') ? 'has-error' : ''}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Reference</label>
                            <div class="col-md-9">
                                <div class="form-control form-control-success" style="background-color: #e9ecef;">
                                    {!! $a->reference !!}
                                </div>
                            </div>
                        </div>
                        @if($a->cv != null)
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Download CV</label>
                                <div class="col-md-9">
                                    <a href="{{route('downloadApplicantCV', ['aid' => $a->id])}}"
                                       title="Download" style="color: inherit;">
                                        <i class="far fa-file-alt mr-4" style="font-size: 50px;"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label">Image</label>
                            <div class="col-md-9">
                                <div>
                                    <img src="{{asset($a->image)}}" alt="image" style="max-height: 150px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>