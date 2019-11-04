@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')
<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 mb-5">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Warnings</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->has('appeal'))
                            <div class="help-block text-danger mb-2">{{$errors->first('appeal')}}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>SL</th>
                                    <th>Warning</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($warnings as $key => $warning)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{!! $warning->description !!}</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#modal_{{ $warning->id }}" class="@if (!empty($warning->appeal)) disabled @endif btn btn-outline-success btn-sm">
                                                Appeal
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal_{{ $warning->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Appeal</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('appeal.store') }}" class="form-horizontal"
                                                                  method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="warning_id" value="{{ $warning->id }}">
                                                                <div class="form-group">
                                                                <textarea class="form-control form-control-success {{$errors->has('appeal') ? 'has-error' : ''}}"
                                                                          name="appeal" id="" cols="30" rows="20" required></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if (!empty($warning->appeal) && ($warning->hearing_type == '0'))
                                                <span class="text-success">Already appealed</span><br>
                                            @endif
                                            @if ($warning->hearing_type != '0')
                                                <button data-toggle="modal" data-target="#modal_{{ $warning->id.$warning->hearing_type }}" class="btn btn-warning btn-sm">{{ ucfirst($warning->hearing_type) }} Hearing</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal_{{ $warning->id.$warning->hearing_type }}" tabindex="-1"      role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ ucfirst($warning->hearing_type) }} Hearing</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! $warning->hearing_message !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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