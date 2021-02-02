@extends('layouts\app')
@section('title', 'Student')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Edit a Student</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" name="firstName" value="{{ $student->firstName }}" />
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" value="{{ $student->lastName }}" />
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" value="{{ $student->address }}" />
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" class="form-control" name="phone" value="{{ $student->phone }}" />
                    </div>

                    <div class="form-group">
                        <label for="dob">Dob:</label>
                        <input id="date" type="date" class="form-control date" name="dob" value="{{ $student->dob }}" />
                    </div>
                    <div class="form-group">
                        <label for="color">Class:</label>
                        <select id="className" type="text" class="form-control color" name="class_names_id">
                            @foreach ($className as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <br>
                        @if ("{{ $student->image }}")
                            <img width="100px" src="{{ $student->image }}">
                        @else
                            <p>No image found</p>
                        @endif
                    </div>
                    <div class="form-group">
                      <input type="file" class="form-control" name="image" />
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/student" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        $(function() {
            $('.date').datepicker({
                dateFormat: 'yy-mm-dd'
            });

        });

    </script> --}}
@endsection
