@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">

    <section class="pt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Send Warning</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('warning.dh.store') }}" class="form-horizontal"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <select name="name" id="" class="form-control form-control-success {{$errors->has('name') ? 'has-error' : ''}}">
                                    <option value="">Choose...</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <textarea
                                        class="form-control form-control-success {{$errors->has('warningDescription') ? 'has-error' : ''}}"
                                        name="warningDescription" id="" cols="30" rows="4" required></textarea>
                                <script>
                                    CKEDITOR.replace('warningDescription');
                                </script>
                                @if($errors->has('warningDescription'))
                                    <span class="help-block text-danger">{{$errors->first('warningDescription')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Warnings</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($warnings as $warning)
                                    <tr>
                                        <td>{{ $warning->user->name }}</td>
                                        <td>{!! $warning->description !!}</td>
                                        <td>
                                            <a href="{{ route('warning.forward', $warning->id) }}" class="btn btn-info btn-sm pl-2 pr-2">
                                                Forward
                                            </a>
                                            <a href="{{ route('warning.delete', $warning->id) }}" class="btn btn-outline-danger btn-sm pl-1 pr-1"
                                               onclick="return confirm('Are you sure ?')">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
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