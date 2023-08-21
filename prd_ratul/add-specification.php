<?php
require_once('model.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $userStory = $_POST['user-story'];
    $ac = $_POST['acceptance-criteria'];

    if ($_FILES['wireframe']['size'] > 0) {
        $wireframe = $_FILES['wireframe']['name'];
        $wireframe_src = $_FILES['wireframe']['tmp_name'];
        $wireframe_des = "wireframe/" . $_FILES['wireframe']['name'];
        if (move_uploaded_file($wireframe_src, $wireframe_des)) {
        } else
            header('location: add-specification.php');
    }

    addSpecification($name, $userStory, $ac, $wireframe);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <style>
    body {
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

    fieldset {
        width: 70%;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
    }


    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }


    input[type="submit"] {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }


    input[type="button"] {
        background-color: #ccc;
        color: #333;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-right: 10px;
    }

    input[type="button"]:hover {
        background-color: #999;
    }


    td.align-right {
        text-align: right;
    }

    footer {
        text-align: center;
        margin-top: 20px;
        color: #888;
    }
    </style>
</head>

<body>
    <center>
        <h1>Add New Specification</h1>
        <center id="center-m">
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <b>Specification Name</b> <br>
                            <input type="text" name="name" id="" required>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>User story</b> <br>
                            <textarea name="user-story" id="" cols="30" rows="5"></textarea>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Acceptance Criteria</b> <br>
                            <textarea name="acceptance-criteria" id="" cols="30" rows="5"></textarea>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Wireframe</b>
                            <input type="file" name="wireframe" id="">

                        </td>
                    </tr>


                    <tr>
                        <td align="right">
                            <a href="analyst-home.html"><input type="button" value="Back"></a>
                            <input type="submit" name="add" value="Add">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </center>
</body>

</html>