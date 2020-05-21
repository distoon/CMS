@extends('adminlte::page')
@section('content')
    <table class='table'>
        <thead>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Department</th>
            <th>Level</th>
            <th>GPA</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>  
                  
                    <td>{{ $student->user->unique_id}}</td>
                    <td>{{ $student->user->first_name }}</td>
                    <td>{{ $student->user->last_name  }}</td>
                    <td>{{ $student->user->user_name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->department_id }}</td>
                    <td>{{ $student->level }}</td>
                    <td>{{ $student->gpa }}</td>
                    <td>

                        <a href="#" class='btn btn-primary btn-sm'>View</a>
                        <a href="{{ route('update.student',['name'=>$student->user->user_name]) }}" class='btn btn-warning btn-sm fa'>Edit</a>
                        <a href="#" class='btn btn-danger btn-sm'>Delete</a>
                    </td>{{  }}
                </tr>
             @endforeach
        </tbody>
        
    </table>
@endsection