<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

    body {
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        overflow: hidden;
        background: #f0f0f0;
    }

    center {
        color: white;
        font-size: 30px;
        font-weight: 400;
    }

    img {

        height: auto;
        width: 100%;
        object-fit: cover;
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
    }

    .container {
        display: flex;
        flex-direction: row;
    }

    .text {

        background: #1264E3;
    }

    .text center {
        padding-top: 30%;
    }

    @media (max-width: 820px) {
        body {
            overflow: visible;
        }

        .container {
            flex-wrap: wrap;
        }

        .text center {
            text-align: center;
            padding-top: 20%;
            padding-bottom: 60px;
        }

        .text {
            width: 100%;
            height: auto;
        }
    }
</style>

<body>
    <div class="container">
        <div class="text">
            <center>Thank you!<br> An email with a verfication link<br> has been sent to you.<br>Kindly activate your account to continue. </center>
        </div>
        <div class="image">
            <img src="../images/thank you page.png" alt="Thank You Image">
        </div>

    </div>
</body>

</html>