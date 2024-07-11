@extends('layouts.app')
<title>Meeting App</title>
@section('content')
<div class="container">


    <!-- Video Meeting Interface -->
    <div class="container">
        <input type="text" id="linkUrl" value="" placeholder="Enter Link" class="form-control" style="margin: 20px 0;">

        <button id="join-btn1" class="btn btn-primary" onclick="joinUserMeeting()">Join Meeting</button>

        @if(Auth::check())
            <a href="{{ url('createMeeting') }}">
                <button id="join-btn2" class="btn btn-success">Create Meeting</button>
            </a>
        @endif

        <div id="video-streams">
            <!-- Placeholder for video streams -->
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background: #0F2027;
        background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
        background: linear-gradient(to right, #2C5364, #203A43, #0F2027);
        overflow: scroll;
        margin: 10px;
        max-height: fit-content;
        overflow-x: scroll;
    }

    #join-btn1, #join-btn2 {
        font-size: 18px;
        padding: 20px 40px;
    }

    #linkUrl {
        background-color: #9bcbcd;
        font-size: 18px;
        padding: 20px 40px;
        margin-top: 20px;
    }

    #video-streams {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        height: 90vh;
        width: 1400px;
        margin: 20px auto;
    }

    .video-container {
        max-height: 100%;
        border: 2px solid black;
        background-color: #203A49;
    }

    .video-player {
        height: 100%;
        width: 100%;
    }

    button {
        border: none;
        background-color: cadetblue;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        margin: 2px;
        cursor: pointer;
    }

    #stream-controls {
        display: none;
        justify-content: center;
        margin-top: 0.5em;
    }

    @media screen and (max-width: 1400px) {
        #video-streams {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            width: 95%;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function joinUserMeeting() {
        var link = $('#linkUrl').val();
        if (link.trim() === '' || link.length < 1) {
            alert('Please enter the link');
            return;
        } else {
            window.location.href = link;
        }
    }
</script>
@endsection
