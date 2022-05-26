<?php
require_once('../config/user.php');

$user = new User;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h2>Hello World</h2>
    <div >
        <p id="success">
            
        </p>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="text" name="name" id="name" placeholder="Name">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="password">
        <button type="submit" name="send" id="butsave" >Add</button>
    </form>
</body>

<script>
    $(document).ready(function() {
    $('#butsave').on('click', function() {
    $("#butsave").attr("disabled", "disabled");
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    if(name!="" && email!="" && phone!="" && password!=""){
        $.ajax({
            url: "<?php echo $user->InsertUser() ?>",
            type: "POST",
            data: {
                name: name,
                email: email,
                password: password				
            },
            cache: false,
            success: function(response){
                if(dataResult.statusCode==200){
                    $("#butsave").removeAttr("disabled");
                    $('#fupForm').find('input:text').val('');
                    $("#success").show();
                    $('#success').html('Data added successfully !'); 	
                }
                else if(dataResult.statusCode==201){
                    alert("Error occured !");
                }
                
            }
        });
        }
        else{
            alert('Please fill all the field !');
        }
    });
    });
</script>

</html>