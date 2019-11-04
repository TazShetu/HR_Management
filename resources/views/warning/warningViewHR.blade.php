@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Warnings</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                @foreach ($warnings as $key => $warning)
                                    <tr>
                                        <td># {{  $key + 1 }}</td>
                                        <td>{{ $warning->user->name }}</td>
                                        <td>{!! $warning->description !!}</td>
                                        <td class="text-center">
                                            @if (!empty($warning->appeal))
                                                <a href="{{ route('warning.appeal.show', $warning->id) }}" class="btn btn-outline-info btn-sm">
                                                    View Appeal
                                                </a>
                                            @endif
                                            <a href="{{ route('warning.delete', $warning->id) }}" class="btn btn-outline-danger btn-sm"
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
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </section>
</div>
@include('includes.bubbly.footer')
</body>
</html>