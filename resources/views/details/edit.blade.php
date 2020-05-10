@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a user detail</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('details.update', $detail->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="user_id">User ID:</label>
                    <input type="text" class="form-control" name="user_id" value={{ $detail->user_id }} />
                </div>

                <div class="form-group">
                    <label for="nickname">Nickname:</label>
                    <input type="text" class="form-control" name="nickname" value={{ $detail->nickname }} />
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" value={{ $detail->description }} />
                </div>
                <div class="form-group">
                    <label for="uploaded_file">Uploaded file:</label>
                    <input type="file" class="form-control" name="uploaded_file"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="title">Gender:</label>
                    <select name="gender" id="gender" class="form-control" style="width:350px;margin-left:50px;">
                    @foreach ($detail->getGenderEnum() as $key => $value)
                         <option value="{{ $key }}" @if($key == $detail->gender) selected @endif >{{ $value }}</option>
                    @endforeach
                </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
