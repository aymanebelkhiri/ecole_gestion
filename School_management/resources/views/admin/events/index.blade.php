@extends('admin.header')
@section('adminContent')
    <div class="container">
        <center><h1><i>Les evenements</i></h1></center>
        <br><br>
        <a href="{{ route('events.create')}}" class="btn btn-primary">Ajouter un event</a>
        <br><br>
        <div class="row">
            @if(isset($Events))
                @foreach($Events as $Event)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-success text-center ">{{$Event->Title}}</h5>
                                <hr>
                                <p class="card-text text-center">{{$Event->Description}}</p>
                                <hr>
                                <h6 class="text-primary text-center">{{$Event->Date}}</h6>
                                <hr>
                                    <form id="delete-form-{{$Event->id_event}}" action="{{ route('events.destroy', $Event->id_event) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <center>
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </center>
                                    </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

