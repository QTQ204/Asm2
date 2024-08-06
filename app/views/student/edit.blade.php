
@extends('layout.main')
@section('content')
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['errors'] as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    @endif
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <span>{{$_SESSION['success']}}</span>
    @endif
    <form action="{{route('update/'.$listStu->id)}}" method="post">
        <label for="">Name:</label><br>
        <input type="text" name="name" value="{{$listStu->name}}"><br>
        <label for="">year_of_birth:</label><br>
        <input type="text" name="year_of_birth" value="{{$listStu->year_of_birth}}" ><br>
        <label for="">phone_number:</label><br>
        <input type="text" name="phone_number" value="{{$listStu->phone_number}}"><br>
        <button type="submit" name="sua" value="Thêm">Sửa</button>
    </form>
    <button ><a href="{{route('index')}}">Quay lại</a></button>
@endsection
