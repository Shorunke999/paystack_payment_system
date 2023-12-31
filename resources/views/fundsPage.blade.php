<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form id="search-form">
            @csrf

            <label for="search">search receiver account</label>
            <input type="text" id= 'search_input' placeholder="receiver_name" name = 'search'/>
            <input type="hidden" id= 'user_id' name = 'user_id' value = '{{$id}}'/>
            <button type = 'submit'>SEARCH</button>
        </form>
        @if($ $recipientWallet && $recipientName)
            <div class="recipient_info">
                username --{{$recipientName}}
            </div>
            <form action='{{route('sendmoney')}}' method="post">
                <label for="amount">Enter amount</label>
                <input type="text" name = 'amount' value = />
                <input type="hidden" name = 'data' value ={{['recipientWallet'=> $recipientWallet,'sender_id'=>$id]}} />
                <button type = 'submit'>SUBMIT</button>
            </form>
        @endif
    </div>
    
</body>
</html>