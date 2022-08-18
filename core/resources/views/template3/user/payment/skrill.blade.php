<html>
<head>
    <title>Paypal</title>
</head>
<body>
<form action="https://www.moneybookers.com/app/payment.pl" method="POST" id="payment_form">
    {{csrf_field()}}
    <input name="pay_to_email" value="{{$gatewayData->val1}}" type="hidden">

    <input name="transaction_id" value="{{$data->trx}}" type="hidden">

    <input name="return_url" value="{{route('home')}}" type="hidden">

    <input name="return_url_text" value="Return {{$general->sitename}}" type="hidden">

    <input name="cancel_url" value="{{route('home')}}" type="hidden">

    <input name="status_url" value="{{route('ipn.skrill')}}" type="hidden">

    <input name="language" value="EN" type="hidden">

    <input name="amount" value="{{$data->usd_amo}}" type="hidden">

    <input name="currency" value="USD" type="hidden">

    <input name="detail1_description" value="{{$general->sitename}}" type="hidden">

    <input name="detail1_text" value="Deposit To {{$general->sitename}}" type="hidden">

    <input name="logo_url" value="{{asset('assets/images/logo/logo.png')}}" type="hidden">
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $("body").contextmenu(function () {
            alert("Right Click Not Allow!");
        });
        $("#payment_form").submit();
    });
</script>
</body>
</html>
