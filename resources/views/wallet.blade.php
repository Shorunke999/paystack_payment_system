<div>
        <div class="recipient_info">
            username --{{$recipientName}} with accountnumber--{{$recipientWallet}}
        </div>
        <form action='{{route('sendmoney')}}' method="post">
            <label for="amount">Enter amount</label>
            <input type="text" name = 'amount' value ='' />
            <input type="hidden" name = 'wallet' value ='{{$recipientWallet}}'/>
            <input type="hidden" name = 'recipientName' value ='{{$recipientName}}'/>
            <button type = 'submit'>SUBMIT</button>
        </form>
   

</div>
