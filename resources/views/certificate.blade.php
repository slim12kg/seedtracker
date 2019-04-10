@extends('layouts.app')

@section('nav')
    {{--//--}}
@endsection

@section('footer')
    {{--//--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="#">
                <img id="link_presidence" alt="" src="/images/seedtrackerlogo.png" style="width: 8%;padding-top:2%">
            </a>
            <h3>FEDERAL REPUBLIC OF NIGERIA</h3>
            <h5>LICENSED AS SEED PRODUCER AND SELLER</h5>
            <h6>REGISTRATION NO: 00001</h6>
            <p>
                It is hereby certify that subject to the provision of the National Agricultural Seeds Council Act No 72 of 1992
            </p>
            <h2 class="dotted-below">{{$registration->business_name}}</h2>
            <p>
                has this <span class="dotted-below">{{$registration->updated_at->format('jS')}}</span> day of
                <span class="dotted-below">{{$registration->updated_at->format('F Y')}}</span>
                been licensed as a
            </p>
            <h3>Seed producer and Seller</h3>
            <p>for the period of ONE YEAR</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            window.print();
        })
    </script>
@endsection

@section('styles')
    <style>
        body{
            padding: 0;
        }

        .dotted-below{
            border-bottom:  1px dotted #000;
        }
    </style>
@endsection