@extends('admin.header')
@section('adminContent')
<center><h1><i>Ajouter un événement</i></h1></center>
<form action="{{ route('events.store') }}" method='POST'>
  @csrf
  <div class="mb-3">
    <label for="Title" class="form-label">Title </label>
    <input type="text" class="form-control" id="Title" name='Title'>
  </div>
  <div class="mb-3">
    <label for="Description" class="form-label">Description </label>
    <input type="text" class="form-control" id="Description" name='Description'>
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">date </label>
    <input type="date" class="form-control" id="date" name='Date'>
  </div>

  <button type='submit' class='btn btn-primary'>Ajouter</button>
</form>
</table>
  @endsection