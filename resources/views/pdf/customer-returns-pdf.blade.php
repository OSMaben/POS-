<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "//www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{ __('messages.pdf.customer_returns_pdf') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <!-- General CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css') }}">
    <style>
        * {
            font-family: "Arial-unicode-ms"
        }

        @if(getLoginUserLanguage() !='ar')
            .fw-bold {
            font-weight: 500;
            color: #333;
        }

        @else
        .fw-bold {
            /*font-weight: 500;*/
            color: #333;
        }

        @endif

        .fw-light {
            font-weight: 500;
            color: grey;
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td align="" style="vertical-align: bottom">
            <h2 style="color: dodgerblue;">{{ getLoginUserLanguage() == 'cn' ? __('messages.pdf.return_list') : __('messages.pdf.return_list') }}</h2>
        </td>
    </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="10" style="margin-top: 40px;">
    <thead>
    <tr style="background-color: dodgerblue;">
        <th style="color: #fff;">{{  getLoginUserLanguage() == 'cn' ? __('messages.pdf.date') : __('messages.pdf.date') }}</th>
        <th style="color: #fff;">{{  getLoginUserLanguage() == 'cn' ? __('messages.pdf.customer_name') : __('messages.pdf.customer_name') }}</th>
        <th style="color: #fff;">{{  getLoginUserLanguage() == 'cn' ? __('messages.pdf.reference') : __('messages.pdf.reference') }}</th>
        <th style="color: #fff;">{{  getLoginUserLanguage() == 'cn' ? __('messages.pdf.total_amount') : __('messages.pdf.total_amount') }}</th>
        <th style="color: #fff;">{{  getLoginUserLanguage() == 'cn' ? __('messages.pdf.status') : __('messages.pdf.status') }}</th>
    </tr>
    </thead>
    <tbody style="background-color: #f5f3f3;">
    @if(isset($customer->salesReturns))
        @foreach($customer->salesReturns  as $salesReturn)
            <tr align="center" style="border-bottom: 2px solid darkgrey;!important;">
                <td width="20%">{{$salesReturn->date->format('Y-m-d')}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$salesReturn->reference_code}}</td>
                <td align="right">{{currencyAlignment(number_format((float)$salesReturn->grand_total , 2))}}</td>
                <td>
                    @if($salesReturn->status == \App\Models\SaleReturn::RECEIVED)
                    {{ __('messages.pdf.received') }}
                    @elseif($salesReturn->status == \App\Models\SaleReturn::PENDING)
                        {{ __('messages.pdf.pending') }}
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

</body>
</html>
