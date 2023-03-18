@extends('layoutcos')
@section('content')
 @if (Auth::user()->name=='admin')
 @if ($message = Session::get('success') )
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 @endif
 <div class="panel panel-default">
  <p class="btn-holder"><a href="{{ url('/') }}"
class="btn btn-warning btn-block text-center" role="button">Magazin</a> </p>
 <div class="panel-heading" >
 Lista Produselor
 </div>
 <div class="panel-body">
 <div class="form-group">
 <div class="pull-right">
 <a href="/tasks/create" class="btn btn-info">Adaugare Produs</a>
 </div>
 </div>
 <table class="table table-bordered table-stripped">
 <tr>
 <th width="20">No</th>
 <th>Photo</th>
 <th>Denumire</th>
 <th>Descriere</th>
  <th>Pret</th>
 <th width="30">Stare</th>
 <th width="30">Categorie</th>
 </tr>
 @if (count($tasks) > 0)
 @foreach ($tasks as $key => $task)
<tr>
 <td>{{ ++$i }}</td>
 <td><img src="{{ $task->photo }}" width="150" height="150"></td>
 <td>{{ $task->name }}</td>
 <td>{{ $task->description }}</td>
 <td>{{ $task->price }}</td>
 <td>{{ $task->produs_stare }}</td>
 <td>{{ $task->produs_categ }}</td>

 <td>

 <a class="btn btn-success" href="{{
route('tasks.show',$task->id) }}">Vizualizare</a>
 <a class="btn btn-info" href="{{
route('tasks.edit',$task->id) }}">Modificare</a>
 {{ Form::open(['method' => 'DELETE','route' =>
['tasks.destroy', $task->id],'style'=>'display:inline']) }}
 {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
 {{ Form::close() }}
 </td>
 </tr>
 @endforeach
 @else
 <tr>
 <td colspan="4">Nu exista sarcini!</td>
 </tr>
 @endif
 </table>
<!-- Introduce nr pagina -->
{{$tasks->render()}}
 </div>
 </div>
 @endif
@endsection
