<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content-switch{
            width: 20px;
            height: 15px;
            background: #aaa;
            border-radius: 15px;
            display: flex;
            align-items: center;
        }
        .internal1{
            background: #444;
            width: 13px;
            height: 13px;
            border-radius: 50%;
           margin-left: auto;
        }

        .internal{
            background: #444;
            width: 13px;
            height: 13px;
            border-radius: 50%;
           margin-right: auto;
        }

    </style>
</head>
<body>
    <div class="content-switch" id="toogler">
        <div class="internal1" id="toogling"></div>
    </div>


    <script>

        let btn=document.getElementById('toogler');
        let toog=document.getElementById('toogling');
        btn.addEventListener('click',()=>{
            toog.classList.toggle('internal');
        });
    </script>
</body>
</html>