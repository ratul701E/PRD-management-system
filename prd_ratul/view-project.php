<?php 
    require('model.php');

    

    if(isset($_GET['search'])){
        $projects = getAllProject($_GET['search-txt']);
    }
    else $projects = getAllProject();
    

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

    h2 {
        text-align: center;
        padding: 20px 0;
        background-color: #333;
        color: white;
    }

    form {
        text-align: center;
        margin-bottom: 20px;
    }

    input[type="text"] {
        padding: 10px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #333;
        color: white;
        padding: 10px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type='submit']:hover {
        background-color: #555;

    }

    fieldset {
        width: 40%;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: #333;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    input[type="button"] {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        display: block;
        margin: auto;
        margin-bottom: 20px;
    }

    input[type="button"]:hover {
        background-color: #555;
    }

    a {
        text-decoration: none;
        color: #333;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>

</head>

<body>
    <center>
        <h2>All Project List</h2>
        <form action="" method="get">
            <input type="text" name="search-txt" id="" placeholder="Type name..."
                value="<?php if(isset($_GET['search'])) echo $_GET['search-txt'] ?>">
            <input type="submit" name="search" value="Search">
            <br><br>
        </form>

        <fieldset style="width: 40%">

            <table cellspacing="5" cellpadding="5">
                <tr>
                    <th>Project Name </th>
                    <th>Number of Feature(s)</th>
                    <th>View</th>
                    <th colspan="2">Action</th>
                </tr>

                <?php
                    foreach($projects as $project){
                        ?>
                <tr>
                    <form action="view-single-project.php" method="get">
                        <input type="hidden" name="pid" value="<?= $project['id'] ?>">
                        <td align="left"> <?= $project['name'] ?> </td>
                        <td align="center"> <?= getCountFeatureByProject($project['id']) ?> </td>
                        <td align="center"> <input type="submit" value="View"> </td>
                        <td align="center"><a href="edit-project.php?id=<?= $project['id'] ?>">Edit</a></td>
                        <td align="center"><a href="delete-project.php?id=<?= $project['id'] ?>">Delete</a></td>
                    </form>
                </tr>
                <?php
                    }   
                ?>

            </table>

        </fieldset>
        <br>
        <a href="admin-home.php"><input type="button" value="Back"></a>

    </center>
</body>

</html>