@extends('adminlte::page')

@section('title','Register Courses')
    
@section('content_header')
    <h1 class="m-0 text-dark">Register Courses for this semester</h1>
@endsection
@section('content')
    <table class="table dataTable text-center">
        <thead>
            <th>#</th>
            <th>Course code</th>
            <th>Course Name</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($courses as $index=>$course)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->department->name }}</td>
                    <td>{{ ($course->semester == 1)? "First" : "Second" }}</td>
                    <td>
                        @if ($student_courses->contains('course_id',$course->id))
                            <button type="button" url={{ route('post.unregister.course',['course_id' => $course->id,'student_id' => Auth::user()->id]) }} user_id = "{{ Auth::user()->id }}" course_id = "{{ $course->id }}" class="unregister btn-danger btn-sm btn fa">Unregister</button>
                        @else
                            <button type="button" url={{ route('post.register.course',['course_id' => $course->id,'student_id' => Auth::user()->id]) }} user_id = "{{ Auth::user()->id }}" course_id = "{{ $course->id }}" class="register btn-primary btn-sm btn fa">Register</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $(".register").on('click',function(){
                var user_id = $(this).attr('user_id');
                var course_id = $(this).attr('course_id');
                var newUrl = "{{ url('unregister-course') }}/"+course_id+"/"+user_id;
                var url = $(this).attr("url");
                $.ajax({
                    data : {
                        "_token" : "{{ csrf_token() }}",
                    }, 
                    type : "POST",
                    url : url,
                    success: data =>{
                        if(data.state){
                            $(this).attr('class',"unregister btn-danger btn-sm btn fa");
                            $(this).html('Unregister');
                            $(this).attr('url',newUrl);
                        }       
                    }
                });
            });
            
            $(".unregister").on('click',function(){
                var user_id = $(this).attr('user_id');
                var course_id = $(this).attr('course_id');
                var newUrl = "{{ url('register-course') }}/"+course_id+"/"+user_id;
                var url = $(this).attr("url");
                $.ajax({
                    data : {
                        "_token" : "{{ csrf_token() }}",
                    }, 
                    type : "POST",
                    url : url,
                    success: data =>{
                        if(data.state){
                            $(this).attr('class',"register btn-primary btn-sm btn fa");
                            $(this).html('register');
                            $(this).attr('url',newUrl);
                        }
                    }
                });
            });
        });
    </script>
@endsection
