<?php
require('model.php');

$pid = $_GET['pid'];

$projects = getAllProject();
$project = getProjectbyId($pid);
$features = getAllFeatureByPid($pid);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>
        <?= $project['name'] ?>
    </title>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }


    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #34495e;
        color: #ecf0f1;
    }

    td {
        background-color: #ecf0f1;
    }

    th,
    td,
    button {
        border: 1px solid #95a5a6;
        border-radius: 4px;
    }

    button {
        display: block;
        width: 100%;
        height: 45px;
        background-color: #3498db;
        border: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #2980b9;
    }

    .no-features {
        background-color: #e74c3c;
        text-align: center;
        font-weight: bold;
    }

    img {
        max-width: 100%;
        height: auto;
        border: 1px solid #95a5a6;
        border-radius: 4px;
    }

    #add-btn {
        width: 100%;
        height: 40px;
        display: block;
        background-color: #1A5D1A;
        font-weight: bold;

    }

    #add-btn:hover {
        width: 100%;
        height: 40px;
        display: block;
        background-color: #669366;
        font-weight: bold;

    }
    </style>



</head>

<body bgcolor="#F2F8F0">
    <h2 align="center">Projects</h2>
    <center>
        <table width="100%" style="height: 100%;">
            <tr>
                <td width="15%" style="vertical-align: top;">
                    <div style="overflow:hidden" id="project-list">
                        <table bgcolor="#6A839A" width="100%">
                            <tr align="center">
                                <td><i><b>
                                            <font color="#000000">Projects</font>
                                        </b></i></td>
                            </tr>

                            <tr>
                                <td>
                                    <b>
                                        <a href="add-project.php"><button id="add-btn"><img src="icons/add.png" alt=""
                                                    width="12"> <br> New</button></a>
                                    </b>
                                </td>
                            </tr>

                            <?php
                            foreach ($projects as $single_project) {
                                ?>
                            <tr>
                                <td>
                                    <form action="" method="get">
                                        <input type="hidden" value="<?= $single_project['id'] ?>" name="pid">
                                        <button type="submit"
                                            style="width:100% height:40px display:block background-color: #9FC5E8;"
                                            value="<?= $single_project['id'] ?>"
                                            onclick="showProject(this.value)"><?= $single_project['name'] ?></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </td>

                <!--           -->


                <td width="15%" style="vertical-align: top;">
                    <div style="overflow:hidden" id="project-list">
                        <table bgcolor="#6A839A" width="100%">
                            <tr align="center">
                                <td><i><b>
                                            <font color="#000000">Features</font>
                                        </b></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        <a href="add-feature.php"><button id="add-btn"><img src="icons/add.png" alt=""
                                                    width="12"> <br> New</button></a>
                                    </b>
                                </td>
                            </tr>
                            <?php
                            if(count($features) == 0){
                                ?>
                            <tr>
                                <td align="center"><b>No features yet</b></td>
                            </tr>
                            <?php
                            }

                            else{
                                foreach ($features as $feature) {
                                    ?>
                            <tr>
                                <td bgcolor="#C9DAF8" colspan="4">
                                    <form action="" method="get">
                                        <input type="hidden" value="<?= $feature['id'] ?>" name="fid">
                                        <input type="hidden" value="<?= $project['id'] ?>" name="pid">
                                        <b>
                                            <button type="submit"
                                                style="width:100% height:40px display:block color: #9FC5E8;"
                                                value="<?= $feature['name'] ?>"
                                                onclick="showProject(this.value)"><?= $feature['name'] ?></button>
                                        </b>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </td>



                <!--            -->

                <td style="vertical-align: top;">
                    <table align="left" border="1" cellspacing="0" width="100%">
                        <tr>
                            <td bgcolor="#9FC5E8" width="30%"><b>&nbsp;&nbsp;Project Name: </b></td>
                            <td bgcolor="#D9EAD3"> &nbsp;&nbsp;
                                <?= $project['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#9FC5E8"><b>&nbsp;&nbsp;Domain:</b> </td>
                            <td bgcolor="#D9EAD3">&nbsp;&nbsp;
                                <?= getDomain($project['did'])['name'] ?>
                            </td>
                        </tr>
                    </table>

                    <br>
                    <br>
                    <br>


                    <table align="left" align="left" border="1" cellspacing="0" cellpadding="5" width="100%">
                        <tr bgcolor="#1C4587">

                            <th>
                                <font color="#F4F4F4">Name</font>
                            </th>
                            <th>
                                <font color="#F4F4F4">User Story</font>
                            </th>
                            <th>
                                <font color="#F4F4F4">Acceptance Criteria</font>
                            </th>
                            <th>
                                <font color="#F4F4F4">Wireframe</font>
                            </th>
                        </tr>
                        <?php
                                if(!isset($_GET['fid'])) return;
                                $specs = getAllSpecByFid(($_GET['fid']));
                                foreach ($specs as $spec) {
                                    ?>

                        <tr>
                            <td>
                                <?= $spec['name'] ?>
                            </td>
                            <td>
                                <?= $spec['user_story'] ?>
                            </td>
                            <td>
                                <?= $spec['acceptance_criteria'] ?>
                            </td>
                            <td> <img src="wireframe/<?= $spec['wireframe'] ?>" alt="not found" width="200"> </td>
                        </tr>

                        <?php
                                }

                                ?>
                    </table>
                </td>
            </tr>
        </table>
    </center>

    <script>
    function toggle_expand(id) {
        let item = document.getElementById("div" + id);
        //item.innerHTML = "hi";
        alert("div" + id);
    }

    function showProject(projectId) {

    }
    </script>

</body>

</html>