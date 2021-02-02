@extends('layouts\app')
@section('title', 'Student')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <div>
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="get" action="{{ route('student.show', $student->id) }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">    
              <h1 for="firstName">{{ $student->firstName }} {{ $student->lastName }}</h1>
          </div>
          <div class="form-group"> 
          <img style="width: 200px;" src="{{ $student->image }}" alt="Image" >
          </div>
          <div class="form-group">
            <label for="address">{{ $student->address }}</label>
        </div>

        <div class="form-group">
            <label for="phone">{{ $student->phone }}</label>
        </div>

          <div class="form-group">
              <label for="dob">"{{ $student->dob }}</label>
          </div>
          
          <div class="form-group">
            <label for="color">{{ $student->class_names->name }}</label>
        </div>
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