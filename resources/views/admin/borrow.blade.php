<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .div_center {
            margin: auto;
            width: 75%;
            padding: 10px;
        }
        .alert {
            margin: auto;
            width: 75%;
            padding: 10px;
            text-align: center;
        }
        .center {
            margin: auto;
            width: 75%;
            padding: 10px;
            text-align: center;
            margin-top: 50px;
            border: 1px solid white;
        }
        th {
            background-color: skyblue;
            padding: 10px;
        }
        tr {
            border: 1px solid white;
            padding: 10px;
        }
        td {
            padding: 10px;
            border: 1px solid white;
        }
    </style>
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="alert">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                @endif
            </div>

            <div class="container-fluid">
                <div class="div_center">
                    <div class="d-flex justify-content-center">
                        <h5>Borrow Requests</h5>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <table class="center">
                <tr>
                    <th>Borrow Request ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Phone</th>
                    <th>Book Title</th>
                    <th>Book Quantity</th>

                    <th>Book Image</th>


                    <th>Status</th>

                    <th>Action</th>
                </tr>
                @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>

                        <td>
                                    {{ $borrow->user->name }}

                       </td>
                        <td>
                                {{ $borrow->user->email }}


                        </td>
                        <td>
                                    {{ $borrow->user->phone }}
                        </td>
                        <td>
                                    {{ $borrow->book->title }}
                        </td>
                        <td>
                            {{ $borrow->book->quantity }}
                </td>
                        <td>
                                    <img src="{{ asset('book/' . $borrow->book->book_img) }}" alt="Book Image"
                                         style="width: 100px; height: 100px;">
                        </td>
                        <td>
                            @if ($borrow->status == 'applied')
                                <span class="badge badge-warning">Applied</span>
                            @elseif ($borrow->status == 'approved')
                                <span class="badge badge-success">Approved</span>
                            @else
                                <span class="badge badge-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            @if ($borrow->status == 'applied')
                                <a href="{{route('book.approve',$borrow->id)}}" class="btn btn-success">Approve</a>
                                <a href="{{route('book.reject',$borrow->id)}}" class="btn btn-danger">Reject</a>
                            @else
                            <a href="{{route('book.return',$borrow->id)}}" class="btn btn-primary">Return</a>
                            @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('admin.footer')
</div>

@include('admin.js')
</body>
</html>
