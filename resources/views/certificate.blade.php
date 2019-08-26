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
                <img id="link_presidence" alt="" src="{{asset('images/nasc/logo.png')}}" style="width: 9%;padding-top:2%">
            </a>
            <h2 id="fed">FEDERAL REPUBLIC OF NIGERIA</h2>
            <h2 id="seed_pro">NATIONAL AGRICULTURAL SEEDS COUNCIL</h2>
            <h3 id="lin">LICENSED AS SEED PRODUCER AND SELLER</h3>
            <h4><strong>REGISTRATION NO.:  <span id="id-no">{{$registration->certificate_id}}</span></strong></h4>
            <p>
                It is hereby certify that subject to the provision of the National Agricultural Seeds Council Act No. 72 of 1992.
            </p>
            <h2 class="dotted-below" id="comp">{{$registration->business_name}}</h2>
            <p style="margin-top: 0.5%;">
                has this <strong class="">{{$registration->updated_at->format('jS')}}</strong> day of
                <strong class="">{{$registration->updated_at->format('F Y')}}</strong>
                been licensed as a
            </p>
            @if($registration->applicant->seedCompany())
                <h3 style="text-transform:capitalize">{{ucfirst($registration->applicant->type_category)}}</h3>
            @else
                <h3 style="text-transform:capitalize">{{ucfirst($registration->applicant->user_type)}}</h3>
            @endif
            <p style="margin-bottom: 0;">
                from
            <p>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="" id="from">{{$registration->certification_start_date->format('jS F, Y')}} &nbsp; to &nbsp; </h3>
                    <h3 class="" id="to">{{$registration->certification_end_date->format('jS F, Y')}}</h3>
                </div>
                <div class="col-md-12">
                    <h5><strong>Approved On: {{$registration->created_at->format('jS F, Y')}}</strong></h5>
                </div>
            </div>
            <div class="row" style="margin-top: 1%;">
                <div style="width: 50%;float: left">
                    <img width="105" src="{{asset($registration->qr)}}" alt="">
                    <p>
                        <small>System generated certificate from the NASC Seed Tracker</small>
                    </p>
                </div>
                <div style="width: 50%;float: left;padding-top: 72px">
                    <p style="margin-bottom:0;">
                        <strong class="s-management">Signed</strong>
                    </p>
                    <hr class="signed-ruler">
                    <p style="">
                        <strong> &nbsp;Director General&nbsp;</strong>
                    </p>
                </div>
            </div>
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
        div.container{
            border: 2px solid #2f6d10;
        }

        h1,h2,h3,h4,h5{
            margin-top: 10px;
        }

        #from,#to{
            font-weight: bold;
            display: inline;
        }

        table td{
            padding: 0;
        }

        body{
            padding: 0;
            margin-bottom: 0;
        }

        #comp{
            width: 60%;
            font-weight: bold;
            margin: auto;
            color: #0c0cb5;
        }

        #fed{
            color: #0f6d0f;
            margin-top: 10px;
            font-weight: bold;
        }

        #seed_pro{
            color: #961111;
            font-weight: bold;
            margin-top: 10px;
        }

        #lin{
            font-weight: bold;
            margin-top: 15px;
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
            bottom: 10px;
            font-style: oblique;
            font-family: cursive;
        }

        #id-no{
            color: #962218;
        }

        .signed-ruler{
            width: 25%;
            margin: auto;
            background-color: #000;
            height: 1px;
            border: 0;
        }
    </style>

    <style type="text/css" media="print">
        @page { size: landscape; }
        button{
            display: none;
        }
    </style>
@endsection