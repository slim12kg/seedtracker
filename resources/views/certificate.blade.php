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
                <img id="link_presidence" alt="" src="/images/nstlogo.jpg" style="width: 28%;padding-top:2%">
            </a>
            <h3>FEDERAL REPUBLIC OF NIGERIA</h3>
            <h5>LICENSED AS SEED PRODUCER AND SELLER</h5>
            <h6>REGISTRATION NO: <strong>00001</strong></h6>
            <p>
                It is hereby certify that subject to the provision of the National Agricultural Seeds Council Act No 72 of 1992
            </p>
            <h2 class="dotted-below" style="width: 60%; margin:auto">{{$registration->business_name}}</h2>
            <p style="margin-top: 1%;">
                has this <span class="dotted-below">{{$registration->updated_at->format('jS')}}</span> day of
                <span class="dotted-below">{{$registration->updated_at->format('F Y')}}</span>
                been licensed as a
            </p>
            <h3>Seed producer and Seller</h3>
            <p>for the period of ONE YEAR</p>
            <p>
                from
                <span class="dotted-below">{{$registration->updated_at->format('jS F, Y')}}</span>
                to
                <span class="dotted-below">{{$registration->updated_at->format('jS F, Y')}}</span>
            </p>

            <table class="table">
                <tr>
                    <td>
                        <img width="200" src="{{asset($registration->qr)}}" alt="">
                    </td>
                    <td style="padding-top: 85px">
                        <p>
                            <img width="200" src="{{asset('images/signature.jpeg')}}" alt="">
                        </p>
                        <p style="position: relative;bottom: 37px;">
                            <span class="dotted-below">Director General</span>
                        </p>
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
    </style>

    <style type="text/css" media="print">
        @page { size: landscape; }
    </style>
@endsection