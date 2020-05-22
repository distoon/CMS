@extends('adminlte::page')
@section('content')
    <form action="{{ route('list.student') }}" id="form">
        <div class="col-md-3 form-group">
            <label>Show Students Of Level</label>
            <select name="level" class="form-control" id="level" name="level">
                <option disabled selected>Choose Level</option>
                <option {{ ($level==1)? "selected" : " " }} value="1">First Level</option>
                <option {{ ($level==2)? "selected" : " " }} value="2">Second Level</option>
                <option {{ ($level==3)? "selected" : " " }} value="3">Third Level</option>
                <option {{ ($level==4)? "selected" : " " }} value="4">Fourth Level</option>
            </select>
        </div>  
    </form>
    <table class='table'>
        <thead class="text-center">
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th >Actions</th>
        </thead>
        <tbody class="text-center">
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->user->unique_id}}</td>
                    <td>{{ $student->user->first_name }}</td>
                    <td>{{ $student->user->last_name  }}</td>
                    <td>{{ $student->user->user_name }}</td>
                    <td>
                        <a href="{{ route('view.student', ['name'=>$student->user->user_name]) }}" class='btn btn-primary btn-sm'><i class="fas fa-eye"></i><span> View</span></a>
                        <a href="{{ route('edit.student',['name'=>$student->user->user_name]) }}" class='btn btn-warning btn-sm fa'><i class="fas fa-pen"></i> Edit</a>
                        <a href="#" class='btn btn-danger btn-sm'><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
             @endforeach
        </tbody>
        
    </table>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#level").on('change',function(){
                $("#form").submit();
            });
        });
    </script>
@endsection