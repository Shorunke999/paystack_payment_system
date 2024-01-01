<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="search-form" method="post" action="{{route('search_form')}}">
        @csrf
    
        <label for="search">search receiver account</label>
        <input type="text" id= 'search_input' placeholder="receiver_name" name = 'accountnumber'/>
        <button type = 'submit'>SEARCH</button>
    </form>
</body>
</html>