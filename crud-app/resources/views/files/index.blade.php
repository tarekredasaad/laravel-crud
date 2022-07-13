@include('layouts.pagecss');
@extends('layouts.app');

@section('content')
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <h1>List of files</h1>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach($files as $item)
                    <tr>

                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <span><a href="{{route('file.show',$item->id)}}"><i class="fa-regular fa-eye"></i>show</a></span>
                            <span><a href="{{route('file.edit',$item->id)}}"><i class="fa-light fa-file-pen"></i>edit</a></span>
                            <span><a href="{{route('file.delete',$item->id)}}"><i class="fa-duotone fa-trash-can"></i>delete</a></span>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
