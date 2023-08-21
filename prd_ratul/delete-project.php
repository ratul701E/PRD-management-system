<?php
require('model.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $project = getProjectById($id);
        
    if (!$project) {
        echo "project not found.";
        exit;
    }

    deleteProject($id);    
    header('Location: view-project.php');
} else {    
    echo "Invalid request.";
    exit;
}
?>