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
                                @foreach($es as $ee)
                                    <option value="{{$ee->id}}">{{$ee->name}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Edit Employee</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.update', ['eid' => $e->id])}}"
                              class="form-horizontal" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" value="{{$e->email}}" required
                                           class="form-control form-control-success {{$errors->has('email') ? 'is-invalid' : ''}}">
                                    <small class="form-text text-muted ml-3">Email has to be unique*
                                    </small>
                                    @if($errors->has('email'))
                                        <span class="help-block text-danger">Someone has already taken this email address !</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Role</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="role" required>
                                        @if($errors->has('role'))
                                            <span class="help-block text-danger">{{$errors->first('role')}}</span>
                                        @endif
                                        <option selected hidden value="{{$e->role->id}}">{{$e->role->display_name}}</option>
                                        @foreach($rs as $i => $r)
                                            @if($i > 3)
                                                <option value="{{$r->id}}">{{$r->display_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Employee Type</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="employeeType" required>
                                        @if($errors->has('employeeType'))
                                            <span class="help-block text-danger">{{$errors->first('employeeType')}}</span>
                                        @endif
                                        <option selected hidden value="{{$e->employeeType_id}}">{{$e->employeeType}}</option>
                                        @foreach($ets as $et)
                                            <option value="{{$et->id}}">{{$et->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{$e->name}}" required
                                           class="form-control form-control-success {{$errors->has('name') ? 'is-invalid' : ''}}">
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Father's Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="fathersName" value="{{$e->FathersName}}" required
                                           class="form-control form-control-success {{$errors->has('fathersName') ? 'is-invalid' : ''}}">
                                    @if($errors->has('fathersName'))
                                        <span class="help-block text-danger">{{$errors->first('fathersName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Mother's Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="mothersName" value="{{$e->MothersName}}" required
                                           class="form-control form-control-success {{$errors->has('mothersName') ? 'is-invalid' : ''}}">
                                    @if($errors->has('mothersName'))
                                        <span class="help-block text-danger">{{$errors->first('mothersName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Date Of Birth</label>
                                <div class="col-md-9">
                                    <input type="date" name="dateOfBirth" value="{{$e->dob}}" required
                                           class="form-control form-control-success {{$errors->has('dateOfBirth') ? 'is-invalid' : ''}}">
                                    @if($errors->has('dateOfBirth'))
                                        <span class="help-block text-danger">{{$errors->first('dateOfBirth')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Religion</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="religion" required>
                                        @if($errors->has('religion'))
                                            <span class="help-block text-danger">{{$errors->first('religion')}}</span>
                                        @endif
                                        <option selected hidden value="{{$e->religion_id}}">{{$e->religion}}</option>
                                        @foreach($rss as $r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Mobile</label>
                                <div class="col-md-9">
                                    <input type="text" name="mobile" value="{{$e->mobile}}" required
                                           class="form-control form-control-success {{$errors->has('mobile') ? 'is-invalid' : ''}}">
                                    @if($errors->has('mobile'))
                                        <span class="help-block text-danger">{{$errors->first('mobile')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nationality</label>
                                <div class="col-md-9">
                                    <input type="text" name="nationality" value="{{$e->nationality}}" required
                                           class="form-control form-control-success {{$errors->has('nationality') ? 'is-invalid' : ''}}">
                                    @if($errors->has('nationality'))
                                        <span class="help-block text-danger">{{$errors->first('nationality')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">About Me</label>
                                <div class="col-md-9">
                                            <textarea
                                                    class="form-control form-control-success {{$errors->has('aboutMe') ? 'is-invalid' : ''}}"
                                                    name="aboutMe" id="" cols="30" rows="4"
                                                    required>{{$e->about_me}}</textarea>
                                    <script>
                                        CKEDITOR.replace('aboutMe');
                                    </script>
                                    @if($errors->has('aboutMe'))
                                        <span class="help-block text-danger">{{$errors->first('aboutMe')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Address</label>
                                <div class="col-md-9">
                                            <textarea
                                                    class="form-control form-control-success {{$errors->has('address') ? 'is-invalid' : ''}}"
                                                    name="address" id="" cols="30" rows="4"
                                                    required>{{$e->address}}</textarea>
                                    <script>
                                        CKEDITOR.replace('address');
                                    </script>
                                    @if($errors->has('address'))
                                        <span class="help-block text-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Education</label>
                                <div class="col-md-9">
                                            <textarea
                                                    class="form-control form-control-success {{$errors->has('education') ? 'is-invalid' : ''}}"
                                                    name="education" id="" cols="30" rows="4"
                                                    required>{{$e->education}}</textarea>
                                    <script>
                                        CKEDITOR.replace('education');
                                    </script>
                                    @if($errors->has('education'))
                                        <span class="help-block text-danger">{{$errors->first('education')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Employment</label>
                                <div class="col-md-9">
                                            <textarea
                                                    class="form-control form-control-success {{$errors->has('employment') ? 'is-invalid' : ''}}"
                                                    name="employment" id="" cols="30" rows="4"
                                                    required>{{$e->employment}}</textarea>
                                    <script>
                                        CKEDITOR.replace('employment');
                                    </script>
                                    @if($errors->has('employment'))
                                        <span class="help-block text-danger">{{$errors->first('employment')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Skills</label>
                                <div class="col-md-9">
                                    <input type="text" name="skills" value="{{$e->skills}}" required
                                           class="form-control form-control-success {{$errors->has('skills') ? 'is-invalid' : ''}}">
                                    @if($errors->has('skills'))
                                        <span class="help-block text-danger">{{$errors->first('skills')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Languages</label>
                                <div class="col-md-9">
                                    <input type="text" name="languagess" value="{{$e->languages}}" required
                                           class="form-control form-control-success {{$errors->has('languagess') ? 'is-invalid' : ''}}">
                                    @if($errors->has('languagess'))
                                        <span class="help-block text-danger">{{$errors->first('languagess')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Reference</label>
                                <div class="col-md-9">
                                            <textarea
                                                    class="form-control form-control-success {{$errors->has('reference') ? 'is-invalid' : ''}}"
                                                    name="reference" id="" cols="30" rows="4"
                                                    required>{{$e->reference}}</textarea>
                                    <script>
                                        CKEDITOR.replace('reference');
                                    </script>
                                    @if($errors->has('reference'))
                                        <span class="help-block text-danger">{{$errors->first('reference')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label>Upload Photo</label>
                                <input type="file" class="form-control-file" name="image">
                                @if($errors->has('image'))
                                    <span class="help-block text-danger">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label>Upload Resume</label>
                                <input type="file" class="form-control-file" name="cv">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 ml-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
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
<script>
    $(document).ready(function () {
        $("#selectUser").change((e) => {
            $('#userSelected').submit();
        });
    });
</script>
</body>
</html>