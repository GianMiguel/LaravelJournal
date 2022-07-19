@extends('layout')
@section('content')




<div class="col-6 p-3">
    <div class="card border border-dark border-2 rounded shadow">
        <div class="card-header p-3">
              <h4> New Thoughts </h4>
          </div>

        <div class="card-body">
            <form action="{{ route('journal.store') }}" method="post">
                @csrf

                <div class="mb-1">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter New Thoughts" required>
                </div>

                <div class="mb-1">
                  <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter Thoughts Description" required> -->
                  <textarea cols="30" rows="5" class="form-control" name="description" id="description" placeholder="Enter Thoughts Description" required></textarea>
                </div>

                <div class="mb-3">
                  <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <input type="hidden" name="type" value="thought">
                <button type="submit" class="btn btn-dark px-4 form-control">Save New Thought</button>
            </form>
        </div>
    </div>
    
    <div class="mt-5 p-3 border border-dark border-2 rounded shadow">
        <table class="table table-hover table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($journal as $th)
                    @if($th->type === 'thought')
                    <tr>
                        <td scope="row">{{ $th->title}}</td>
                        <td>{{ $th->description }}</td>
                        <td>{{ $th->date }}</td>

                        <td class="d-flex">
                        <a href="{{ route('journal.edit', $th->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('journal.destroy', $th->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="type" value="thought">
                                <button type="submit" class="btn btn-danger btn-sm ms-3"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    
                </tbody>
        </table>
    </div>

   
</div>

<div class="col-6 p-3">

    <div class="card border border-dark border-2 rounded shadow">
        <div class="card-header p-3">
              <h4> New Task </h4>
          </div>

        <div class="card-body">
            <form action="{{ route('journal.store') }}" method="post">
                @csrf

                <div class="mb-1">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter New Tasks" required>
                </div>

                <div class="mb-1">
                  <textarea cols="30" rows="5" class="form-control" name="description" id="description" placeholder="Enter Tasks Description" required></textarea>
                </div>

                <div class="mb-3">
                  <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <input type="hidden" name="type" value="task">
                <button type="submit" class="btn btn-dark px-4 form-control">Save New Task</button>
            </form>
        </div>
    </div>


    <div class="mt-5 p-3 border border-dark border-2 rounded shadow">
        <table class="table table-hover table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($journal as $ta)
                    @if($ta->type === 'task')
                    <tr>
                        <td scope="row">{{ $ta->title}}</td>
                        <td>{{ $ta->description }}</td>
                        <td>{{ $ta->date }}</td>

                        <td class="d-flex">
                        <a href="{{ route('journal.edit', $ta->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('journal.destroy', $ta->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="type" value="task">
                                <button type="submit" class="btn btn-danger btn-sm ms-3"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
        </table>
    </div>

    
   
</div>







@endsection