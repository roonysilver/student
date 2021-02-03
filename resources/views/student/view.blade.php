@extends('layouts\app')
@section('title', 'Student')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title">Student List</h1>   
            <div class="col-sm-12" class="successul">
              @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div>
              @endif
            </div>
            <a href="/student/create" class="btn btn-primary mb-2">Add New</a> 
          <table class="table table-striped" id="data">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>FullName</td>
                  <td>Address</td>
                  <td>Phone</td>
                  <td>Class</td>
                  <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>              
              <?php $num = 1 ?>
              @foreach($student as $item)

                <tr>
                    <td>{{ $num++ }}</td>
                    <td style="display: none">{{$item->id}}</td>
                    <td>{{$item->firstName}} {{$item->lastName}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->class_names->name}}</td>
                    <td style="display: flex">
                        <a href="{{ route('student.show',$item->id)}}" class="btn btn-success">Detail</a>
                        <a href="{{ route('student.edit',$item->id)}}" class="btn btn-primary ml-2">Edit</a>
                        <form action="{{ route('student.destroy', $item->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger ml-2" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                        </form>
                      </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          {{  $student->links() }}
        <div>
        </div>
    </div>
<script>
  $(function(){
    setTimeout(timer, 3000);
    function timer(){
      $('.alert').slideUp();
    };
  })


</script>

@stop