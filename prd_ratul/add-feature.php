<?php  
    require_once('model.php');

    $specifications = getAllSpecification();

    if(isset($_POST['add'])){
        $name = $_POST['feature-name'];
        addFeature($name);

        foreach($specifications as $specification){
            if(array_key_exists($specification['id'], $_POST)){
                addFS(getFeature($name)['id'], $specification['id']);
            }
        }
        
    }
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

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h4 {
        text-align: center;
    }

    input[type="checkbox"] {
        margin-bottom: 5px;
    }

    input[type="submit"] {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
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
        margin-top: 10px;
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
        <h1>Add New Feature</h1>
        <center>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Feature Name</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="feature-name" id="" required>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <h4 align="center">Add Specification into Feature</h4>
                            <?php

                                        if(count($specifications) > 0){
                                            foreach($specifications as $specifications){
                                                
                                                ?>
                            <input type="checkbox" name="<?= $specifications['id'] ?>"
                                value="<?= $specifications['name'] ?>"> <?= $specifications['name'] ?> <br>
                            <?php
                                            }
                                        }
                                        else{
                                            ?>
                            No Feature Available
                            <?php
                                        }
                                    ?>
                        </td>

                    </tr>


                    <tr>
                        <td align="center">
                            <br><br>
                            <input type="button" value="Back" onclick="history.back()">
                            <input type="submit" name="add" value="Add">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </center>
</body>

</html>