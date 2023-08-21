<?php
require('model.php');

if (isset($_GET['search'])) {
    $specifications = getAllSpecification($_GET['search-txt']);
} else
    $specifications = getAllSpecification();

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

    h2 {
        text-align: center;
        padding: 20px 0;
        background-color: #333;
        color: white;
    }

    center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    form {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="submit"] {
        padding: 8px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
    }

    input[type="submit"] {
        background-color: #333;
        color: white;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }


    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #333;
        color: white;
        border-radius: 5px;
    }

    a:hover {
        background-color: #555;
    }

    input[type="button"] {
        border-radius: 5px;
        background-color: #333;
        color: white;
        cursor: pointer;
        margin-top: 30px;
    }
    </style>
</head>

<body>

    <h2 align="center">All Specification</h2>

    <center>
        <form action="" method="get">
            <input type="text" name="search-txt" id="" placeholder="Type specification name..." value="<?php if (isset($_GET['search']))
                echo $_GET['search-txt'] ?>">
            <input type="submit" name="search" value="Search">
            <br><br>
        </form>

        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Specification Name</th>
                <th>User Story</th>
                <th>Acceptance Criteria</th>
                <th>Wireframe</th>
                <th colspan=2>Action</th>
            </tr>
            <?php
            if (count($specifications) > 0) {
                foreach ($specifications as $specification) {

                    ?>
            <tr align="center">
                <td><?= $specification['name'] ?></td>
                <td><?= $specification['user_story'] ?></td>
                <td><?= $specification['acceptance_criteria'] ?></td>
                <td> <img src="wireframe/<?= $specification['wireframe'] ?>" alt="X" width="200"> </td>
                <td><a
                        href="edit-specification.php?id=<?= $specification['id'] ?>">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="delete-specification.php?id=<?= $specification['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                ?>
            <tr>
                <td colspan="6" align="center">Empty</td>
            </tr>
            <?php
            }
            ?>
        </table>
        <input type="button" value="Back" onclick="history.back()"> <br><br>
    </center>

</body>

</html>