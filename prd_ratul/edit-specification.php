<?php
require('model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $userStory = $_POST['user-story'];
    $ac = $_POST['acceptance-criteria'];
    
    updateSpecification($id, $name, $userStory, $ac, $_FILES['wireframe']);

    header('Location: show-specification.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $specification = getSpecificationById($id);

    if (!$specification) {
        echo "Specification not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Specification</title>
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

    fieldset {
        width: 70%;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
        margin: 0 auto;
        margin-top: 20px;
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
        <h1>Edit Specification</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $specification['id'] ?>">
            <table>
                <tr>
                    <td><b>Specification Name</b></td>
                    <td><input type="text" name="name" value="<?= $specification['name'] ?>" required></td>
                </tr>
                <tr>
                    <td><b>User story</b></td>
                    <td><textarea name="user-story" cols="30" rows="5"><?= $specification['user_story'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><b>Acceptance Criteria</b></td>
                    <td><textarea name="acceptance-criteria" cols="30"
                            rows="5"><?= $specification['acceptance_criteria'] ?></textarea></td>
                </tr>
                <tr>
                    <td><b>Current Wireframe</b></td>
                    <td>
                        <img src="wireframe/<?= $specification['wireframe'] ?>" alt="Current Wireframe" width="200">
                    </td>
                </tr>
                <tr>
                    <td><b>Upload New Wireframe</b></td>
                    <td><input type="file" name="wireframe" accept=".jpg, .jpeg, .png, .gif"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a href="show-specification.php"><input type="button" value="Cancel"></a>
                        <input type="submit" name="update" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>