@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('templates.create') }}"> Create New Template</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Название</th>  
        </tr>
        @foreach ($templates as $template)
        <tr>
            <td>{{ $template->name }}</td>
          
            <td>
                 <a class="btn btn-info" href="{{ route('templates.show',$template->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('templates.edit',$template->id) }}">Edit</a>
                <form action="{{ route('templates.destroy',$template->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection