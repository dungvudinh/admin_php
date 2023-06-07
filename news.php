<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
    <div class="layout">
        <!-- <div class ="sidebar">
            <?php include("../../components/sidebar.php")?>
        </div> -->
        <div class="content">
            <form id="myForm" >
            <input type="text" name="name" placeholder="Enter your name" required />
            <input type="text" name="email" placeholder="Email ID" required />
            <input type="text" name="city" placeholder="City" required />
            <input type="button"  value="Submit" id="submit"/>
        </form>
        <div id="postData"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $('#submit').click(function()
    {
        $.ajax({
            type:"POST",
            url:"./components/get_data.php",
            data:$('#myForm').serialize(),
            success:function(response)
            {
                $('#postData').html(response)
            },
            error:function()
            {
                alert("Error");
            }
        })
    })
    </script>
</body>
</html>