<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> -->
    <style>
    /* Write your CSS code here */
    *,
    *::after,
    *::before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Roboto", sans-serif;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8efef;
        cursor: default;
    }

    .form-container {
        height: 500px;
        width: 600px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        background-color: white;
        overflow: hidden;
        position: relative;
    }

    .login-container {
        width: 50%;
        padding: 40px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 15px;
        transition: all 500ms ease;

    }

    .title {
        font-size: 20px;
        font-weight: 500;
    }

    .desc {
        font-size: 12px;
    }

    .input-container {
        margin-top: 10px;
        width: 100%;
        font-size: 14px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid #d6e0eb;
        display: flex;
        align-items: center;
    }

    input {
        /* height: 100%; */
        border: none;
        margin-left: 5px;
        outline: none;
        font-family: "Roboto", sans-serif;
    }

    .account-controls {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .account-controls>a {
        text-decoration: none;
        color: #5293aa;
        font-size: 12px;
    }

    .account-controls>button {
        width: 65px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        border: none;
        background: #046586;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 500ms ease;
        box-shadow: 0 3px 10px -5px #73aabb;

        &:hover {
            transform: scale(1.1);
        }
    }

    .line {
        width: 100%;
        height: 2px;
        background-color: #bfc0c9;
        border-radius: 10px;
    }

    .other-login-text {
        text-align: center;
        font-size: 12px;
        color: #64656a;
    }

    .placeholder-banner {
        width: 50%;
        height: 100%;
        position: absolute;
        right: 0;
        transition: all 500ms ease;
        z-index: 4;
    }

    .social-logins {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .social-login {

        height: 40px;
        aspect-ratio: 1/1;
        border: 2px solid #bfc0c9;
        background-color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
        transition: transform 500ms ease;

        &:hover {
            transform: scale(1.1);
        }
    }

    .signup-text {
        margin-top: 5px;
        font-size: 12px;
    }

    #signup-form-toggler,
    #login-form-toggler {
        cursor: pointer;
        text-decoration: none;
        color: #046586;

        &:hover {
            border-bottom: 1px solid;
        }
    }

    .banner {
        width: 100%;
        height: inherit;
        object-fit: cover;
        transition: transform 500ms ease;
    }
    </style>
</head>

<!-- Change code below this line -->

<body>
    <div class="form-container">
        <div class="login-container" id="login-container">
            <h1 class="title">Log In</h1>
            <p class="desc">Login to your account to upload or download pictures,videos or music</p>
            <form action="api/logic.php" method="post">
                <div class="input-container">
                    <input type="email" name="loginEmail" placeholder="Enter Your Email Address" autofocus="on">
                </div>
                <div class="input-container">
                    <input type="password" name="loginPassword" placeholder="Enter Your Password" autofocus="on">
                </div>
                <input type="submit" value="submit" name="LoginBtn" class="btn-primary btn-md btn mt-2">
            </form>


        </div>
        <div class="placeholder-banner" id="banner">
            <img src="dist/images/login.jpg" alt="" class="banner">
        </div>
    </div>

</body>

</html>