@extends('admin.header')
@section('adminContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Create Module</div>

                    <div class="card-body">
                        <form action="{{ route('CoursesAd.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" class="form-control" id="Nom" name="Nom">
                            </div>

                            <div class="form-group">
                                <label for="MasseHoraire">Masse Horaire</label>
                                <input type="text" class="form-control" id="MasseHoraire" name="MasseHoraire">
                            </div>

                            <div class="form-group">
                                <label for="Coefficient">Coefficient</label>
                                <input type="text" class="form-control" id="Coefficient" name="Coefficient">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
