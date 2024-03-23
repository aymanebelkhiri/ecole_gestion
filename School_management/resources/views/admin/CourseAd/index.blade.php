@extends('admin.header')
@section('adminContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Modules</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course )
                                    <tr>
                                        <td>{{ $course ->Nom }}</td>
                                        <td>{{ $course ->Domaine }}</td>
                                        <td>{{ $course ->description }}</td>
                                        <td>
                                            <a href="{{ route('coursesAd.show', $course ->id) }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('coursesAd.edit', $course ->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('coursesAd.destroy', $course ->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this module?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
