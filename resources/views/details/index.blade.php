@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">User details</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('details.create')}}" class="btn btn-primary">New UserDetails</a>
                
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Nickname</td>
                    <td>Description</td>
                    <td>Uploaded file</td>
                    <td>Gender</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->nickname}}</td>
                        <td>{{$detail->description}}</td>
                        <td>{{$detail->uploaded_file}}</td>
                        <td>{{$detail->getGenderTextAttribute()}}</td>

                        <td>
                            <a href="{{ route('details.edit',$detail->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('details.destroy', $detail->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>

            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>








@endsection
