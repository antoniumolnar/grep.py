@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add details</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('details.store') }}">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="title">User:</label>
                        <select name="user_id" id="user_id" class="form-control" style="width:350px;margin-left:50px;">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->username }} </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nickname">Nickname:</label>
                        <input type="text" class="form-control" name="nickname"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>

                    <div class="form-group">
                        <label for="uploaded_file">Uploaded file:</label>
                        <input type="file" class="form-control" name="uploaded_file"/>
                    </div>



                    <div class="form-group col-md-6">
                        <label for="title">Gender:</label>
                        <select name="gender" id="gender" class="form-control" style="width:350px;margin-left:50px;">
                            @foreach (\App\UserDetails::getGenderEnum() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add details</button>
                </form>
            </div>
        </div>
    </div>
@endsection
