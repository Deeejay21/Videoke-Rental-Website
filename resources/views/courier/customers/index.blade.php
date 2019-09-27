<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>@yield('title')</title>
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {{-- Date Picker --}}
        
    
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
<body>
    <div id="app">
        @include('layouts.users.courier.navbar')

        <div class="row">
            <div class="col-2 pt-4">
                @include('layouts.users.courier.sidebar')

            </div>
            <div class="col-10 pt-4">
                    <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <h1>Customer Reservation List</h1>
                                </div>
                                <div class="col-4 d-flex justify-content-end align-items-baseline">
                                    {{-- <a href="/admin/customers/access" class="btn btn-outline-primary">Customer Access</a> --}}
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    @if (session()->has('success'))
                                    <a class="nav-link" href="">
                                        <div class="alert alert-success text-center" role="alert">
                                            <strong>Success!</strong> {{ session()->get('success') }}
                                        </div>
                                    </a>
                                    @elseif (session()->has('update'))
                                    <a class="nav-link" href="">
                                        <div class="alert alert-primary text-center" role="alert">
                                            <strong>Updated!</strong> {{ session()->get('update') }}
                                        </div>
                                    </a>
                                    @elseif (session()->has('delete'))
                                    <strong class="nav-link" href="">
                                        <div class="alert alert-danger text-center" role="alert">
                                            <strong>Deleted!</strong> {{ session()->get('delete') }}
                                        </div>
                                    </a>
                                    @endif
                                </div>
                                <div class="col-2"></div>
                            </div>
                    
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Videoke Order</th>
                                            <th>Customer Delivery Date</th>
                                            <th>Customer Videoke Return Date</th>
                                            <th>Videoke Status</th>
                                            <th>Payment Status</th>
                                            <th>Customer Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id - 2}}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td>{{ $user->age }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->videoke->name }}</td>
                                                <td>{{ $user->check_format() }}</td>
                                                <td>{{ $user->videoke_return->return_at }}</td>
                                                {{-- @if ($user->date_return() == $currentTime)
                                                    
                                                @else
                                                    
                                                @endif
                                                <td>{{ dd($user->notification_return()) }}</td> --}}

                                                @if ( $user->is_return == 'Return')
                                                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_return }}</span></h5></td>
                                                @else
                                                    <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_return }}</span></h5></td>
                                                @endif
                                                @if ($user->is_paid == 'Paid')
                                                    <td><h5><span class="badge badge-pill badge-success">{{ $user->is_paid }}</span></h5></td>
                                                @else
                                                    <td><h5><span class="badge badge-pill badge-warning">{{ $user->is_paid }}</span></h5></td>
                                                @endif
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                            <a href="/courier/customers/{{ $user->id }}/access" class="btn btn-outline-success" style="margin: 4px;">Status</a>
                                                    {{-- <a href="/admin/customers/{{ $user->id }}/edit" class="btn btn-outline-primary" style="margin: 4px;">Edit</a> --}}
                                                    {{-- <form action="/admin/customers/{{ $user->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                    
                                                        <button type="submit" class="btn btn-outline-danger" style="margin: 4px;">Delete</button>
                                                    </form> --}}
                    
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
            </div>
        </div>

        <div class="pt-5">
            @include('layouts.users.courier.footer')
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table2').DataTable( {
                "scrollX": true
            } );
        } );
    </script>
</body>

</html>








