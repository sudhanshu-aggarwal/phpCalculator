<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
    .num, .op{
        width: 60px;
    }
    #clear{
        width: 255px;
    }
    #data{
        width: 240px;
    }
    </style>
</head>
<body>
    <form id="calcForm">
    <input type="text" name="data" id="data"><br>
    <input type="button" onclick="num(7)" value="7" class="num">
    <input type="button" onclick="num(8)" value="8" class="num">
    <input type="button" onclick="num(9)" value="9" class="num">
    <input type="submit" name="submit" value="+" class="op" onclick="num('+')"><br>
    <input type="button" onclick="num(4)" value="4" class="num">
    <input type="button" onclick="num(5)" value="5" class="num">
    <input type="button" onclick="num(6)" value="6" class="num">
    <input type="submit" name="submit" value="-" class="op" onclick="num('-')"><br>
    <input type="button" onclick="num(1)" value="1" class="num">
    <input type="button" onclick="num(2)" value="2" class="num">
    <input type="button" onclick="num(3)" value="3" class="num">
    <input type="submit" name="submit" value="*" class="op" onclick="num('*')"><br>
    <input type="button" onclick="num(0)" value="0" class="num">
    <input type="button" onclick="num('.')" value="." class="num">
    <input type="submit" name="submit" value="/" class="op" onclick="num('/')">
    <input type="submit" name="submit" value="=" class="op" onclick="num('=')"><br>
    <input type="reset" value="Clear" id="clear" onclick="ax()">
    </form>
    <script>
    let clicked = false;
    let eq = true;
    let ope = false;
    function num(e){

        if(!eq)
        {
            ope = !ope;
            eq = !eq;
        }
        
        if(e=='.' && !clicked)
        {
            let inp = document.getElementById('data');
        inp.value += e;
        clicked = !clicked;
        }
        else if(e!='.')
        {
            let inp = document.getElementById('data');
        inp.value += e;
        }
        if(e=='+' || e=='-' || e=='*' || e=='/' || e=='=' )
        {
            clicked = false;
            if(e == '=')
            {
                eq = !eq;
            }
        }
        
    }

    function ax(){
        clicked = false;
        ope = false;
        eq = true;
    }
    $("#calcForm").submit(function(e){
        e.preventDefault();
        // console.log(e);
        if(ope){
            $.ajax({
            type: 'POST',
            url: 'calculate.php',
            data: $(this).serialize(),
            success: (data) =>{
                
                $('#data').val(data);
            }
            
        })
        
        }
        else{
            ope = !ope;
        }
    });
    </script>
</body>
</html>