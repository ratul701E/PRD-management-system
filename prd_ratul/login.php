<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    h3 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    td {
        padding: 10px;
        text-align: right;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        width: 106%;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }
    </style>

</head>

<body>
    <h3>Login</h3>
    <form action="login-process.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="username" id="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" id="password" placeholder="Password"></td>
            </tr>
            <td colspan="2" align="right"><input type="submit" name="login" value="Login" class="loginButton"></td>
        </table>
    </form>
</body>

</html>