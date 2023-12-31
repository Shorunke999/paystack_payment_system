<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="acctnumber">
            {{$wallet_info['accountnumber']}}--{{$wallet_info['accountnumber']}}
        </div>
        <div class="balancediv">
            <span class="balance">
                <i>Your balance is: {{$wallet_info['balance']}}</i>
            </span>
        </div>
        <div class="transactions">
            <div class="send">
                <button href='{{route('sendFunds',['id'=>$wallet_info['user_id']])}}'>
                    send money
                </button>
            </div>
            <div class="Deposit&withdraw">
                <button href='{{route()}}'>
                    Deposit money
                </button>
                <button href='{{route()}}'>
                    withdraw money
                </button>
            </div>
        </div>
    </div>
</body>
</html>