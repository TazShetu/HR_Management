@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        @if(session('EmployeeCreateSuccess'))
            <div class="alert alert-success text-center">
                {{session('EmployeeCreateSuccess')}}
            </div>
        @elseif(session('EmployeeUpdateSuccess'))
            <div class="alert alert-success text-center">
                {{session('EmployeeUpdateSuccess')}}
            </div>
        @elseif(session('unsuccess'))
            <div class="alert alert-danger text-center">
                {{session('unsuccess')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 offset-lg-3 pb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Create From Existing User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.create.fromUser')}}" method="post" id="userSelected">
                            @csrf
                            <select class="form-control" name="user_id" id="selectUser">
                                <option selected disabled hidden value="">Select User</option>
                                @foreach($users as $i => $u)
                                    @if($i > 1)
                                        <option value="{{$u->id}}">{{$u->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Create New Employee</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.store')}}"
                              class="form-horizontal" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="0" name="is_user">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" placeholder="Email Address"
                                           value="{{old('email')}}" required
                                           class="form-control form-control-success {{$errors->has('email') ? 'is-invalid' : ''}}">
                                    <small class="form-text text-muted ml-3">Email has to be unique*
                                    </small>
                                    @if($errors->has('email'))
                                        <span class="help-block text-danger">Someone has already taken this email address !</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" placeholder="Password" name="password"
                                           class="form-control form-control-success {{$errors->has('password') ? 'is-invalid' : ''}}"
                                           required>
                                    @if($errors->has('password'))
                                        <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Confirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                           class="form-control form-control-success {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Branch</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="branch" required>
                                        @if($errors->has('branch'))
                                            <span class="help-block text-danger">{{$errors->first('branch')}}</span>
                                        @endif
                                        <option selected disabled hidden value="">Choose...</option>
                                        @foreach($bs as $b)
                                            <option value="{{$b->id}}">{{$b->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Designation</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="designation" required>
                                        @if($errors->has('designation'))
                                            <span class="help-block text-danger">{{$errors->first('designation')}}</span>
                                        @endif
                                        <option selected disabled hidden value="">Choose...</option>
                                        @foreach($jobs as $j)
                                            <option value="{{$j->id}}">{{$j->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-md-3">Role</label>
                                <div class=" col-md-9">
                                    <select class="form-control" name="role" required>
                                        @if($errors->has('role'))
                                            <span class="help-block text-danger">{{$errors->first('role')}}</span>
                                        @endif
                                        <option selected disabled hidden value="">Choose...</option>
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
                                        <option selected disabled hidden value="">Choose...</option>
                                        @foreach($ets as $e)
                                            <option value="{{$e->id}}">{{$e->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" placeholder="Name" value="{{old('name')}}" required
                                           class="form-control form-control-success {{$errors->has('name') ? 'is-invalid' : ''}}">
                                    @if($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Father's Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="fathersName" value="{{old('fathersName')}}"
                                           placeholder="Father's Name" required
                                           class="form-control form-control-success {{$errors->has('fathersName') ? 'is-invalid' : ''}}">
                                    @if($errors->has('fathersName'))
                                        <span class="help-block text-danger">{{$errors->first('fathersName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Mother's Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="mothersName" value="{{old('mothersName')}}"
                                           placeholder="Mother's Name" required
                                           class="form-control form-control-success {{$errors->has('mothersName') ? 'is-invalid' : ''}}">
                                    @if($errors->has('mothersName'))
                                        <span class="help-block text-danger">{{$errors->first('mothersName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Date Of Birth</label>
                                <div class="col-md-9">
                                    <input type="date" name="dateOfBirth" value="{{old('dateOfBirth')}}" required
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
                                        <option selected disabled hidden value="">Choose...</option>
                                        @foreach($rss as $r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Mobile</label>
                                <div class="col-md-9">
                                    <input type="text" name="mobile" value="{{old('mobile')}}" required
                                           class="form-control form-control-success {{$errors->has('mobile') ? 'is-invalid' : ''}}">
                                    @if($errors->has('mobile'))
                                        <span class="help-block text-danger">{{$errors->first('mobile')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nationality</label>
                                <div class="col-md-9">
                                    <input type="text" name="nationality" value="{{old('nationality')}}" required
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
                                                    required>{{old('aboutMe')}}</textarea>
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
                                                    required>{{old('address')}}</textarea>
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
                                                    required>{{old('education')}}</textarea>
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
                                                    required>{{old('employment')}}</textarea>
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
                                    <input type="text" name="skills" value="{{old('skills')}}"
                                           placeholder="Skills" required
                                           class="form-control form-control-success {{$errors->has('skills') ? 'is-invalid' : ''}}">
                                    @if($errors->has('skills'))
                                        <span class="help-block text-danger">{{$errors->first('skills')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Languages</label>
                                <div class="col-md-9">
                                    <input type="text" name="languagess" value="{{old('languagess')}}" required
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
                                                    required>{{old('reference')}}</textarea>
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
                                <input type="file" class="form-control-file" name="image" required>
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
                                    <button type="submit" class="btn btn-primary btn-block">Create</button>
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