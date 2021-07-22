@extends('site.app')
@section('title', 'profiles')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">My Account - Profile</h2>
        </div>
    </section>
    <section class="section-content bg padding-y bprofile-top">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <main class="col-md-10 offset-1">

                        @forelse ($profiles as $profile)
                        <div class="card">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="panel panel-success">
                                            <h2 class="card-title">Profile Details</h2>
                                            <div class="card-body">
                                                <label for="name"><b>First Name</b></label>
                                                <p>{{$profile->first_name}}</p>
                                                <label for="name"><b>Last Name</b></label>
                                                <p>{{$profile->last_name}}</p>
                                                <label for="name"><b>Email</b></label>
                                                <p>{{$profile->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="panel panel-success">
                                            <h2 class="card-title">Address Details</h2>
                                            <div class="card-body">
                                                <label for="name"><b>Address</b></label>
                                                <p>{{$profile->address}}</p>
                                                <label for="name"><b>City</b></label>
                                                <p>{{$profile->city}}</p>
                                                <label for="name"><b>Country</b></label>
                                                <p>{{$profile->country}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-sm-12">
                                <p class="alert alert-warning">No profiles to display.</p>
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </section>
@stop

