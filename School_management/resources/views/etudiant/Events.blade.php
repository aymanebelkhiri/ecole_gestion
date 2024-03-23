@extends('etudiant.header')
@section('contentStudent')
    <div class="container">

        <div class="row text-center">
            @if(isset($events))
                @foreach($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title text-success">{{$event->Title}}</h5><hr>
                                <p class="card-text">{{$event->Description}}</p><hr>
                                <a  class="btn btn-primary">{{$event->Date}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

