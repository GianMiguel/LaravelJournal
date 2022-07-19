@extends('layout')
@section('content')


<div class="col-6 p-3 offset-3">

    <div class="card border border-dark border-2 rounded shadow">
        <div class="card-header p-3 text-center">
              <h4> Update </h4>
          </div>
        <div class="card-body">
            <form action="{{ route('journal.update', $journal->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-1">
                  <input type="text" class="form-control" name="title" id="title" value="{{ $journal->title }}" required>
                </div>

                <div class="mb-1">
                  <!-- <input type="text" class="form-control" name="description" id="description" placeholder="Enter Thoughts Description" required> -->
                  <textarea cols="30" rows="5" class="form-control" name="description" id="description" required>{{ $journal->description }}</textarea>
                </div>

                <div class="mb-3">
                  <input type="date" class="form-control" name="date" id="date" value="{{ $journal->date }}" required>
                </div>

                <button type="submit" class="btn btn-dark px-4 form-control">Update</button>
            </form>
        </div>
        <div class="card-footer">
        <a href="{{ route('journal.index') }}"><button type="button" class="btn btn-outline-dark"><i class="bi bi-arrow-left-square-fill pe-2"></i> Go back</button></a>
        </div>
    </div>

</div>


@endsection