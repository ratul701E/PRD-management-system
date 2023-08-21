<?php
require_once('model.php');

$allFeature = getAllFeature();

if (isset($_POST['add'])) {
    $name = $_POST['project-name'];
    $domain = $_POST['domain'];
    addProject($name, $domain);



    foreach ($allFeature as $feature) {
        if (array_key_exists($feature['id'], $_POST)) {
            addPF(getProject($name, $domain)['id'], $feature['id']);
        }
    }

}

$domains = getAllDomain();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <style>
    /* Reset some default styles */
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

    input[type="text"],
    select {
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

    <title>Document</title>
</head>

<body>
    <center>
        <h1>Add New Project</h1>
        <center>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                            <b>Project Name</b>
                            <input type="text" name="project-name" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Domain</b><br>
                            <select name="domain" id="">
                                <?php
                                    foreach ($domains as $domain) {
                                        ?>
                                <option value="<?= $domain['id'] ?>"><?= $domain['name'] ?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                            <br><br>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <h4 align="center">Add Feature into project</h4>
                            <?php

                                if (count($allFeature) > 0) {
                                    foreach ($allFeature as $feature) {

                                        ?>
                            <input type="checkbox" name="<?= $feature['id'] ?>" value="<?= $feature['name'] ?>">
                            <?= $feature['name'] ?> <br>
                            <?php
                                    }
                                } else {
                                    ?>
                            No Feature Available
                            <?php
                                }
                                ?>
                        </td>

                    </tr>


                    <tr>
                        <td align="right">
                            <br>
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