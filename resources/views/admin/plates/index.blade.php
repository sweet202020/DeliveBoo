@extends('layouts.admin')
@section('content')
    <section class="plates">
        <div class="container">
            <a href="{{ route('admin.plates.create') }}"><button class="btn btn-primary my-3">+</button> </a>
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
                <table class="table table-primary align-middle">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">description</th>
                            <th scope="col">cover image</th>
                            <th scope="col">price</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($plates as $plate)
                            <tr class="">
                                <td scope="row">{{ $plate->id }}</td>
                                <td>{{ $plate->name }}</td>
                                <td>{{ $plate->description }}</td>
                                <td><img width="150" src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                                </td>
                                <td>{{ $plate->price }}</td>
                                <td><a href="{{ route('admin.plates.show', $plate->slug) }}" class="btn btn-primary">show</a>
                                    <a href="{{ route('admin.plates.edit', $plate->slug) }}"class="btn btn-secondary">edit</a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete_plate_{{ $plate->slug }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="delete_plate_{{ $plate->slug }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalnameId_{{ $plate->slug }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-name" id="modalnameId_{{ $plate->slug }}">Delete
                                                        {{ $plate->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.plates.destroy', $plate->slug) }}"
                                                        method="POST">
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
            </div>
        </div>
        <!-- /.container -->

    </section>
@endsection
