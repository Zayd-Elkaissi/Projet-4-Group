<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>paination</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    @csrf
    <div id="table_data">
         @include('pagination_child')
    </div>


    <script>
       $(document).ready(function(){
        $(document).on('click','.relative',function(event){
              event.preventDefault()
             var page $(this).att('href').split('page=')[1];
             fetch_data(page);
        });
        function fetch_data(page){
             var _token =$("input[name=_token").val();
             $.ajax({
                url:"{{route('pagination.fetch')}}",
                methode:"POST",
                data:{_token:_token,page:page},
                success:function(data){
                   $("#table_data").html(data);
                }
             })
        }
       }) 
    </script>
</body>
</html>