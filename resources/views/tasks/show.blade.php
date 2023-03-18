@extends('layouts.master')
@section('content')
 <div class="panel panel-default">
 <div class="panel-heading">
 Detalii Produs
 </div>
 <div class="panel-body">
 <div class="pull-right">
 <a class="btn btn-danger" href="{{ route('tasks.index')
}}">Inapoi</a>
 </div>
 <div class="form-group">
 <strong>Denumire: </strong> {{ $task->name }}
 </div>
 <div class="form-group">
 <strong>Descriere: </strong> {{ $task->description }}
 </div>
  <div class="form-group">
 <strong>Pret: </strong> {{ $task->price }}
 </div>
 <div class="form-group">
    <strong>Categorie: </strong> {{ $task->produs_categ }}
    </div>
    <div class="form-group">
        <strong>Stare: </strong> {{ $task->produs_stare }}
        </div>
        <img src="{{ $task->photo }}" width="150" height="150">
 </div>
 </div>
@endsection
