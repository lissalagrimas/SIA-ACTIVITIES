<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Live Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .search-box { width: 300px; margin: 50px auto; }
        .result { position: absolute; z-index: 999; top: 100%; left: 0; background: #fff; }
        .result p { margin: 0; padding: 7px 10px; border: 1px solid #ccc; cursor: pointer; }
        .result p:hover { background: #f2f2f2; }
    </style>
</head>
<body>
<div class="search-box">
    <input type="text" class="form-control" placeholder="Search country..." />
    <div class="result"></div>
</div>

<script>
$(document).ready(function(){
    // When user types in the search box
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</body>
</html>