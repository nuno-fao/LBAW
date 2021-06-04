@extends('layouts.app',['title'=>'Add Group'])

@section('content')

    <nav aria-label="breadcrumb" id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('landing_page') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('groups_list') }}">Groups</a></li>
            <li class="breadcrumb-item"><a href="#">Add</a></li>
        </ol>
    </nav>

    <section class="container">
        <div class="text-center my-4">
            <h3 class="display-7">
                Create a Group
            </h3>

        </div>
    </section>

    <section class="container">
        <div class="d-flex justify-content-center ">

            <form class="col-10 col-lg-3 border border-10  bg-white rounded-2 pl-3 action" enctype="multipart/form-data"
                action="{{ route('add_group') }}" method="POST">
                @csrf
                <label for="title" class="form-label mt-3 ">Group Name *</label>
                <input type="text"
                    class="col-7 form-control border border-1rounded-1 @error('title') border-danger @enderror" name="title"
                    id="title" aria-describedby="title" value="{{old('title')}}" required>
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label for="description" class="form-label mt-3 ">Group Description </label>
                <textarea type="text" rows="3"
                    class="row-4 form-control border border-1rounded-1 @error('description') border-danger @enderror"
                    name="description" id="description" aria-describedby="description" ></textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <label class="form-label mt-3" for="groupPhoto">Upload Photo</label>
                <input type="file" class="form-control @error('groupPhoto') border border-danger @enderror" id="groupPhoto"
                    name="groupPhoto" value="{{old('groupPhoto')}}"/>
                @error('groupPhoto')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="d-flex justify-content-center ">
                    <input class="btn btn-outline-secondary mt-3 mb-3 " type="submit" value="Submit">
                </div>


            </form>



        </div>
    </section>

@endsection
