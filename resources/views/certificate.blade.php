@extends('layouts.app')

@section('nav')
    {{--//--}}
@endsection

@section('footer')
    {{--//--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 text-center cert-bg">
            <a href="#">
                <img id="link_presidence" alt="" src="/images/nasc/logo.png" style="width: 9%;padding-top:2%">
            </a>
            <h2>FEDERAL REPUBLIC OF NIGERIA</h2>
            <h3>LICENSED AS SEED PRODUCER AND SELLER</h3>
            <h5><strong>REGISTRATION NO:  {{$registration->certificate_id}}</strong></h5>
            <p>
                It is hereby certify that subject to the provision of the National Agricultural Seeds Council Act No 72 of 1992
            </p>
            <h2 class="dotted-below" style="width: 60%; margin:auto">{{$registration->business_name}}</h2>
            <p style="margin-top: 1%;">
                has this <strong class="dotted-below">{{$registration->updated_at->format('jS')}}</strong> day of
                <strong class="dotted-below">{{$registration->updated_at->format('F Y')}}</strong>
                been licensed as a
            </p>
            <h3>Seed producer and Seller</h3>
            <p>for the period of ONE YEAR</p>
            <p>
                from
                <strong class="dotted-below">{{$registration->certification_start_date->format('jS F, Y')}}</strong>
                to
                <strong class="dotted-below">{{$registration->certification_end_date->format('jS F, Y')}}</strong>
            </p>

            <table class="table">
                <tr style="height: 150px">
                    <td>
                        <img width="150" src="{{asset($registration->qr)}}" alt="">
                        <p>
                            <small>System generated certificate from the NASC Seed Tracker</small>
{{--                            <img src="{{asset('images/seedtrackerlogo.png')}}" alt="seedtrackerlogo" style="width: 2%">--}}
                        </p>
                    </td>
                    <td style="vertical-align: bottom">
                        <strong class="s-management">Signed Management</strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            //window.print();
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

        td{
            border:none !important;
        }

        p{
            font-size: 16px;
        }

        .cert-bg{
            background: url("{{asset('images/nasc/water.png')}}") no-repeat center;
        }

        .s-management{
            position: relative;
            bottom: 10px;
            border-bottom: 1px solid #000;
        }
    </style>

    <style type="text/css" media="print">
        @page { size: landscape; }
        button{
            display: none;
        }
    </style>
@endsection