<div>
        <div class="recipient_info">
            username --{{$recipientName}} with accountnumber--{{$accountnumber}} is valid
        </div>
        <form action='{{route('sendmoney')}}' method="post">
            @csrf
            <label for="amount">Enter amount</label>
            <input type="text" name = 'amount' value ='' />
            <input type="hidden" name = 'accountnumber' value ='{{$accountnumber}}'/>
            <input type="hidden" name = 'recipientName' value ='{{$recipientName}}'/>
            <button type = 'submit'>SUBMIT</button>
        </form>

</div>
