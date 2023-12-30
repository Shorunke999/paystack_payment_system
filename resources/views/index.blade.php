<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class = 'antialised'>
    <h1>welcome to the payment page</h1>
    <form action="{{route('payment-form')}}" method="POST">
        @csrf
        <div>
            payment for the shoe is N 200,000
        </div>
        <input type="hidden" name = 'email' value = 'shorunke99@gmail.com'>
        <input type="hidden" name = 'amount' value = '200000'>
        <input type="hidden" name = 'orderid' value = '1'>
        <input type="hidden" name = 'currency' value = 'NGN'>
        <input type="hidden" name = 'quantity' value = '1'>
        <input type="hidden" name = 'metadata' value = '{{json_encode($array = ['key_name'=>'value', 'item_name'=> 'maggi' ])}}'>
        <div>
            <button type ='submit'>
                make payment.
            </button>
        </div>
    </form>
</body>
</html>