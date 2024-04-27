@extends('layout.master')
@section('title', 'OneLearn | Landing Page')

@section('content')
<style>
    .section-container-items{
    padding:100px 0px 0px 0px;
    }


    span, i, button, a{
        text-decoration: none;
        outline: none;
    }

    .section a{
        display: inline-block;
    }

    .section h1{
        font-size: 68px;
        font-weight: 600;
        text-transform: capitalize;
        color: #323949;
        letter-spacing: -0.21px;
        line-height: 90px;
        margin: 0; padding: 0;
    }

    .section h3{
        font-size: 20px;
        font-weight: 400;
        text-transform: capitalize;
        letter-spacing: 0.30px;
        padding: 0;
        margin-top: 8px;
        margin-left: 2px;
        color: #3d3e51;
        opacity: 0.7;
    }

    .section button{
        margin-top: 30px;
        display: block;
        padding: 15px 24px;
        font-size: 17px;
        font-weight: 500;
        letter-spacing: 0.18px;
        line-height: 17px;
        border-radius: 50px;
        background: #3d3e51;
        border: none;
        cursor: pointer;
        color: #f4f4f4;
        transition: all 250ms ease-in-out;
    }


    .section button i{
        font-size: 14px;
        margin-right: 8px;
    }

    .section button span{
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.20px;
        margin-left: 3px;
    }

    .look {
        color: #05cc47;
        font-size: 3.7em;
        transform: rotate(90deg);
    }


    .alta-title{
        font-size: 22px;
        font-weight: 600;
        letter-spacing: 5px;
        text-transform: uppercase;
        color: #3d3e51;
        opacity: 0.7;
        z-index: 1;
        position: absolute;
        right: 0;
        transform: rotate(90deg) translateY(-60px);
    }

    .alta img {
        width:100%;
        height: auto;
    }
</style>
<div class="section-container-items">
    <div class="container">
     <div class="row align-items-center h-100" >
       <div class="section col-md-6">
           <h1>Tingkatkan Potensimu dengan OneLearn!</h1>
           <h3>Temukan Materi Pendidikan Berkualitas dan Beragam di Platform Kami! <br>
            Dengan OneLearn, Belajar Menjadi Lebih Mudah dan Menyenangkan! <br>
            Gabung Sekarang dan Mulailah Perjalanan Pendidikanmu dengan OneLearn!</h3>
           <a href="{{ route('register') }}"><button><i class="fas fa-shopping-cart"></i>Daftar Sekarang</button></a>
       </div>

       <div class="alta col-md-6 d-flex justify-content-lg-end align-items-center h-100">
           <span class="alta-title">Find Yours</span>
               <img src="{{ asset('img/logo1.png') }}">
           </div>
       </div>
     </div>
</div>
@endsection
