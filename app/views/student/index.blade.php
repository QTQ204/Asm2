@extends('layout.main')
@section('content')
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Year of Birth</th>
        <th>Phone Number</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($students as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->year_of_birth }}</td>
                <td>{{ $st->phone_number }}</td>
                <th>
                    <a href="{{route('edit/'.$st->id)}}">Sửa</a>
                    <a href="{{route('destroy/'.$st->id)}}" onclick="return confirm(`Có chắc xóa <?=$st->name?> không ? `)">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
<button ><a href="{{route('create')}}">Thêm</a></button>
@endsection
