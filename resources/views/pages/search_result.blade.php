@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('landing_page')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Search Results</a></li>
    </ol>
</nav>

<section class="container">
    <div class="text-center my-4">
        <h3 class="display-7">
            Search Results For "Fight Club"
        </h3>
    </div>
</section>

<container class="row justify-content-center container-fluid">
    <aside id="user_info" class="bg-light border col-xl-2 col-lg-2 col-8 mx-lg-3 mx-auto d-flex flex-column">
        <h5 class="mx-auto mt-3 display-6">Filter By Type</h5>
        <div class="btn-group-vertical">
            <button type="button" class="btn btn-primary rounded-1 my-3 d-flex align-items-center justify-content-between">
                <span class="fs-5 ">All</span>
                <div ><span class="fs-6 badge badge-secondary badge-pill">8</span></div>
            </button>
            <button type="button" class="btn btn-primary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                <span class=" fs-5 ">User</span>
                <div ><span class="fs-6 badge badge-secondary badge-pill">3</span></div>
            </button>
            <button type="button" class="btn btn-primary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                <span class="fs-5 ">Movie</span>
                <div ><span class="fs-6 badge badge-secondary badge-pill">1</span></div>
            </button>
            <button type="button" class="btn btn-primary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                <span class=" fs-5 ">Group</span>
                <div ><span class="fs-6 badge badge-secondary badge-pill">1</span></div>
            </button>
            <button type="button" class="btn btn-primary rounded-1 mb-3 d-flex align-items-center justify-content-between">
                <span class="fs-5 ">Review</span>
                <div ><span class="fs-6 badge badge-secondary badge-pill">3</span></div>
            </button>
        </div>
    </aside>

    <table class="table table-hover col-8 mx-5 search-table">
        <thead>
            <tr>
            <th scope="col">Type</th>
            <th scope="col">Username/Title</th>
            <th scope="col">Author/Owner</th>
            <th scope="col">Other</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">User</th>
                <td>@fight_club_fan</td>
                <td>-</td>
                <td>Name: Rui Serafim</td>
            </tr>
            <tr>
                <th scope="row">User</th>
                <td>@fightmeIRL</td>
                <td>-</td>
                <td>Name: Chad</td>
            </tr>
            <tr>
                <th scope="row">Review</th>
                <td>Movie Sucked Bad</td>
                <td>@fightmeIRL</td>
                <td>Movie: Fight Club</td>
            </tr>

            <tr>
                <th scope="row">User</th>
                <td>@club_maniac</td>
                <td>-</td>
                <td>Name: Rodrigo Cheira Mal</td>
            </tr>
            <tr>
                <th scope="row">Movie</th>
                <td>Fight Club</td>
                <td>-</td>
                <td>Year: 1999</td>
            </tr>
            <tr>
                <th scope="row">Group</th>
                <td>FightClubies</td>
                <td>@fight_club_fan</td>
                <td>59 members</td>
            </tr>
            
            <tr>
                <th scope="row">Review</th>
                <td>Loved Fight Club</td>
                <td>@fight_club_fan</td>
                <td>Movie: Fight Club</td>
            </tr>
            <tr>
                <th scope="row">Review</th>
                <td>This made me wanna fight</td>
                <td>@psycopath</td>
                <td>Movie: Fight Club</td>
            </tr>
        </tbody>
        </table>

</container>

@endsection