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

@if(Session::has('done'))
    <div class="alert alert-success">
        {{Session::get('done')}}
    </div>
    @endif
    <div class="container col-6">
        <div class="card">
            <div class="card-body"> <h1>create file</h1>
                <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >File Title</label>
                        <input type="text" class="form-control" name="title" class="@error('title') is-invalid @enderror">

                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >File Description</label>
                        <input type="text" class="form-control" name="description" class="@error('description') is-invalid @enderror">

                        @error('description')
                            <div class="alert alert-danger">description is required</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >upload file</label>
                        <input type="file" class="form-control" name="file" class="@error('file') is-invalid @enderror">

                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button  class="btn btn-primary" >Send Data</button>
                </form>
            </div>
        </div>
    </div>
    {{-- @endsection --}}
