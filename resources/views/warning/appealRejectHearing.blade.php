@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Appeal Reject Hearing</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <tr>
                                    <th>SL</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td># 1</td>
                                    <td>No Action</td>
                                    <td>
                                        <a href="{{ route('warning.appeal.accept', $wid) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td># 2</td>
                                    <td>Verbal Warning</td>
                                    <td>
                                        <a href="{{ route('verbalHearing.create', $wid) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td># 3</td>
                                    <td>Written Warning</td>
                                    <td>
                                        <a href="{{ route('writtenHearing.create', $wid) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                </tr>
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