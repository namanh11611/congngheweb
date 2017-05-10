@extends('user.master')
@section('description', 'Register')
@section('author', 'Nam Anh')
@section('content')
<section id="product">
    <div class="container">
        <!--  breadcrumb -->
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
                <span class="divider">/</span>
            </li>
            <li class="active">Account Info</li>
        </ul>
        <div class="row">
            <!-- Register Account-->
            <div class="span9">
                <h1 class="heading1"><span class="maintext">Account Info</span>
                <br>
                <div id="info_detail">
                    <h1> Username<h2>{{$userInfo->username}} </h2> </h1>
                    <h1> Type Of Account<h2>
                        @if($userInfo->level==1)
                        Super Admin
                        @elseif($userInfo->level==2)
                        Admin
                        @else
                        Member
                        @endif
                    </h2> </h1>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection