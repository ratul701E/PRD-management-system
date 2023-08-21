<?php
require('model.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $specification = getSpecificationById($id);

    if (!$specification) {
        echo "Specification not found.";
        exit;
    }

    deleteSpecification($id);    
    header('Location: show-specification.php');
} else {    
    echo "Invalid request.";
    exit;
}
?>