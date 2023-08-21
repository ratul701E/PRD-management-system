<?php 
    require('model.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <style>
    body,
    html {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    h1 {
        text-align: center;
        padding: 20px 0;
        background-color: #333;
        color: white;
    }

    hr {
        border: none;
        border-top: 1px solid #ccc;
    }

    table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    table td {
        padding: 10px;
        text-align: left;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    b {
        font-weight: bold;
    }

    input[type="button"] {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
        display: block;
        margin: 0 auto;
    }

    input[type="button"]:hover {
        background-color: #555;
    }

    a {
        text-decoration: none;
        color: #333;
    }
    </style>
</head>

<body>
    <center>
        <h1>Admin Dashboard</h1>
        <center>
            <b>Information</b> <br>
            <hr>
            <table cellpadding="5">
                <tr>
                    <td><b>Total Analyst:</b></td>
                    <td><?=getCountAnalyst()?></td>
                </tr>
                <tr>
                    <td><b>Total Project:</b></td>
                    <td><?=getCountProject()?></td>
                </tr>
                <tr>
                    <td><b>Total Feature:</b></td>
                    <td><?=getCountFeature()?></td>
                </tr>
                <tr>
                    <td><b>Total Specification:</b></td>
                    <td><?=getCountSepc()?></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><a href="view-project.php"><input type="button"
                                value="View Projects"></a></td>
                </tr>
            </table>
        </center>
        <br>
        <a href="login.php"><input type="button" value="Logout"></a>
    </center>
</body>

</html>