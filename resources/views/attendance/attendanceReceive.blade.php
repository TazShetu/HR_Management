@include('includes.bubbly.header')
@include('includes.bubbly.sidebar')

<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-10 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Attendance</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{session('error')}}
                            </div>
                        @endif
                        @if (!$inExist)
                            <form action="{{ route('attendance.in.store') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-block my-2"> IN </button>
                            </form>
                        @else
                            <button class="disabled btn btn-outline-primary btn-block my-2"> IN </button>
                        @endif
                        @if (!$outExist)
                            <form action="{{ route('attendance.out.store') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-dark btn-block my-2"> OUT </button>
                            </form>
                        @else
                            <button class="disabled btn btn-outline-dark btn-block my-2"> OUT </button>
                        @endif

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

                        <div class="table-responsive">
                            <table class="table text-center">
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>IN <small>Time</small>
                                    </th>
                                    <th>OUT <small>Time</small>
                                    </th>
                                    <th>Total <small>Time</small></th>
                                </tr>

                                @foreach ($currentMonthAttendances as $key => $item)
                                    <tr>
                                        <td># {{ $key + 1 }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                        <td>{{ date('h : i : s A', strtotime($item->time_in)) }}</td>
                                        <td>
                                            @if (isset($item->time_out))
                                                {{ date('h : i : s A', strtotime($item->time_out)) }}
                                            @else --- @endif
                                        </td>
                                        <td>
                                            @php
                                                if (isset($item->time_out)) {
                                                    $time_in = new DateTime($item->time_in);
                                                    $time_out = new DateTime($item->time_out);
                                                    $diff = $time_in->diff($time_out);
                                                    echo $diff->format('%H : %I : %S');
                                                } else {
                                                    echo '---';
                                                }
                                            @endphp
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