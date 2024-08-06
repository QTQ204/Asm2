
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
    <span>
        <?php 
        if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
        }
        ?>
        </span>
    @endif
    <form action="{{route('store')}}" method="post">
        <label for="">Name:</label><br>
        <input type="text" name="name" ><br>
        <label for="">year_of_birth:</label><br>
        <input type="text" name="year_of_birth" ><br>
        <label for="">phone_number:</label><br>
        <input type="text" name="phone_number" ><br>
        <button type="submit" name="btn-submit" value="Thêm">Thêm</button>
    </form>
    <button ><a href="{{route('index')}}">Quay lại</a></button>
@endsection
