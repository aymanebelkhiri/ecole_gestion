@extends('admin.header')
@section('adminContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Module</div>

                    <div class="card-body">
                        <form action="{{ route('courses.update',$course ->id_module) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" class="form-control" id="Nom" name="Nom" value="{{ $course ->Nom }}">
                            </div>

                            <div class="form-group">
                                <label for="MasseHoraire">Masse Horaire</label>
                                <input type="text" class="form-control" id="MasseHoraire" name="MasseHoraire" value="{{ $course ->MasseHoraire }}">
                            </div>

                            <div class="form-group">
                                <label for="Coefficient">Coefficient</label>
                                <input type="text" class="form-control" id="Coefficient" name="Coefficient" value="{{ $course ->Coefficient }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $course ->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>

                            @if ($course ->image)
                                <div class="form-group">
                                    <img src="{{ asset('storage/images/' . $course ->image) }}" alt="{{ $course ->Nom }}" class="img-fluid">
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
