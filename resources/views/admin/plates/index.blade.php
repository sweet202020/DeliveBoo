@extends('layouts.admin')
@section('content')
<div class="background"></div>
<section class="plates">
    <div class="container">

        <a class="position-relative" href="{{ route('admin.plates.create') }}"><button class="btn btn-outline-warning btn_add my-3">ADD PLATE</button>
        </a>
        <!-- /.btn -->
        @if (session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>{{ session('message') }}</strong>
        </div>
        @endif
        {{-- ./message success --}}
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>{{ session('error') }}</strong>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table_top">
                    <tr>
                        <!-- <th scope="col">id</th> -->
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">cover image</th>
                        <th scope="col">price</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody class="table_bottom">
                    @forelse ($plates as $plate)
                    <tr class="">
                        <!-- <td scope="row">{{ $plate->id }}</td> -->
                        <td>{{ $plate->name }}</td>
                        <td>{{ $plate->description }}</td>
                        <td>
                            @if ($plate->cover_image)
                            <img src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                            @else
                            <div class="placeholder-glow  text-center position-relative">
                                <div class="position-absolute">
                                    placeholder
                                </div>
                            </div>
                            @endif
                        </td>
                        <td>{{ $plate->price . '€' }}</td>
                        <td><a href="{{ route('admin.plates.show', $plate->slug) }}" class="btn btn-outline-warning btn_view me-2"><span class="me-3">VIEW</span><i class="fa-regular fa-eye"></i></a>
                            <a href="{{ route('admin.plates.edit', $plate->slug) }}" class="btn btn-outline-info btn_edit me-2"><span class="me-3">EDIT</span><i class="fa-solid fa-pen-to-square"></i></a>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-outline-danger btn_delete" data-bs-toggle="modal" data-bs-target="#delete_plate_{{ $plate->slug }}">
                                <span class="me-3">DELETE</span> <i class="fa-solid fa-trash-can"></i>
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="delete_plate_{{ $plate->slug }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalnameId_{{ $plate->slug }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-name" id="modalnameId_{{ $plate->slug }}">Delete
                                                {{ $plate->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.plates.destroy', $plate->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>

                        @empty
                        <td>no record to show</td>
                        @endforelse
                    </tr>
                </tbody>
            </table>
            {{ $plates->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
    <!-- /.container -->

</section>
<style scoped>
    .container {
        font-family: "Unbounded", cursive;
    }

    img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .placeholder-glow {
        background-color: #ff9e45;
        opacity: 60%;
        color: black;
        width: 150px;
        height: 150px;
        text-align: center;
    }

    .position-absolute {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-transform: uppercase;
    }

    /* .btn-outline-warning {
            background-color: green;
        } */

    /* .table-primary {
            --bs-table-bg: #f1f1f1;
            --bs-table-border-color: #0086A8;
        } */

    table {
        position: relative;
        margin-top: 2rem;
    }

    .table_top {
        background-color: #ff9e45;
    }

    .table_bottom {
        background-color: #f1f1f1;
        border-bottom: 1px solid #ff9e45;
    }

    /*** BTN SECTION ***/
    .btn_add {
        background-color: #f5612c;
        color: #f1f1f1;
        border: none;
        transition: 1s;
    }

    .btn_add:hover {
        background-color: #ff9e45;
        border: none;
    }

    .btn_view {
        background-color: #ff9e45;
        color: #f1f1f1;
        border: none;
        transition: 1s;
    }

    .btn_view:hover {
        background-color: #f5612c;
        color: #ff9e45;
        border: none;
    }

    .btn_edit {
        background-color: #0086A8;
        color: #f1f1f1;
        border: none;
        transition: 1s;
    }

    .btn_edit:hover {
        background-color: #2CCCF5;
        color: #0086A8;
    }

    .btn_delete{
        background-color: red;
        opacity: 60%;
        color: #f1f1f1;
        border: none;
        transition: 1s;
    }

    .btn_delete:hover{
        background-color: red;
        opacity: 80%;
        color: #a5a5a5;

    }
</style>
@endsection