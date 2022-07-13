@include('layouts.pagecss');
{{-- @extends('layouts.app'); --}}

{{-- @section('content') --}}
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


    <div class="container col-6">
        <div class="card">
            {{$files->title}}
            <div class="card-body"> <h1>create file</h1>
                File details :  {{$files->description}} file extend {{ $files->file}}
            </div>
            <a href="{{route('file.download',$files->id)}}" class="btn btn-success"><i class="fa fa-download"></i> Download</a>
        </div>
    </div>
    {{-- @endsection --}}
