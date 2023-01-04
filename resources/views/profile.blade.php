@extends('format.layout')
@section('title', 'Barbatos Shop')
@section('content')
    <div class="centerdiv">
        <h1 class="text-center mb-5">Profile</h1>
        <div class="widthboxprofile">
            <div class="mb-4">
                <p>Name:</p>
                <p class="border border-info p-1 bg-info">{{Auth::user()->name}}</p>
            </div>
            <div class="mb-4">
                <p>Email:</p>
                <p class="border border-info p-1 bg-info">{{Auth::user()->email}}</p>
            </div>
            <div class="mb-4">
                <p>Gender:</p>
                <p class="border border-info p-1 bg-info">{{Auth::user()->gender}}</p>
            </div>
            <div class="mb-4">
                <p>Date of Birth:</p>
                <p class="border border-info p-1 bg-info">{{Auth::user()->dateOfBirth}}</p>
            </div>
            <div class="mb-4">
                <p>Country:</p>
                <p class="border border-info p-1 bg-info">{{Auth::user()->country}}</p>
            </div>
        </div>
    </div>
@endsection

<style>
    .centerdiv{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .widthboxprofile{
        width: 50%;
    }
</style>
