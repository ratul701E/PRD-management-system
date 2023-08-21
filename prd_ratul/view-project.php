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
    <link rel="stylesheet" href="viewProject.css">

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