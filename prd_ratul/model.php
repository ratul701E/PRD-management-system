<?php  
    function getCon(){
        return mysqli_connect('localhost', 'root', '', 'prd');
    }
    function getAllProject($like=''){

        $sql = "SELECT * FROM project WHERE name like '%{$like}%'";
        if($result = mysqli_query(getCon(), $sql)){
            $projects = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($projects, $row);
            }
            return $projects;
        }
    }

    function getProject($name, $domain){

        $sql = "SELECT * FROM project WHERE name='{$name}' and did='{$domain}'";
        if($result = mysqli_query(getCon(), $sql)){
            return mysqli_fetch_assoc($result);
        }
    }
    function getProjectbyId($id){

        $sql = "SELECT * FROM project WHERE  id='{$id}'";
        if($result = mysqli_query(getCon(), $sql)){
            return mysqli_fetch_assoc($result);
        }
    }
    function getFeature($name){

        $sql = "SELECT * FROM feature WHERE name='{$name}'";
        if($result = mysqli_query(getCon(), $sql)){
            return mysqli_fetch_assoc($result);
        }
    }

    function addProject($name, $domain){
        $sql = "INSERT into project values('','{$name}', '{$domain}');";
        mysqli_query(getCon(), $sql);
    }
    function addFeature($name){
        $sql = "INSERT into feature values('','{$name}');";
        mysqli_query(getCon(), $sql);
    }
    function addSpecification($name, $us, $ac, $wireframe){
        $sql = "INSERT into specification values('','{$name}','{$us}','{$ac}', '{$wireframe}');";
        mysqli_query(getCon(), $sql);
    }

    function getAllDomain(){
        $sql = "SELECT * FROM domain;";
        if($result = mysqli_query(getCon(), $sql)){
            $domains = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($domains, $row);
            }
            return $domains;
        }
    }

    function getDomain($id){

        $sql = "SELECT * FROM domain WHERE id='{$id}'";
        if($result = mysqli_query(getCon(), $sql)){
            return mysqli_fetch_assoc($result);
        }
    }

    function getAllSpecification($like=''){
        $sql = "SELECT * FROM specification WHERE name like '%{$like}%'";
        if($result = mysqli_query(getCon(), $sql)){
            $specification = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($specification, $row);
            }
            return $specification;
        }
    }
    function getAllFeature($like=''){
        $sql = "SELECT * FROM feature WHERE name like '%{$like}%'";
        if($result = mysqli_query(getCon(), $sql)){
            $features = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($features, $row);
            }
            return $features;
        }
    }

    function addPF($pid, $fid){
        $sql = "INSERT into pf values('{$pid}', '{$fid}');";
        mysqli_query(getCon(), $sql);
    }
    function addFS($fid, $sid){
        $sql = "INSERT into fs values('{$fid}', '{$sid}');";
        mysqli_query(getCon(), $sql);
    }

    function getCountAdmin(){
        $res = mysqli_query(getCon(), "SELECT count('username') as count from user where role='admin';");
        return mysqli_fetch_assoc($res)['count'];
    }

    function getCountAnalyst(){
        $res = mysqli_query(getCon(), "SELECT count('username') as count from user where role='analyst';");
        return mysqli_fetch_assoc($res)['count'];
    }

    function getCountProject(){
        $res = mysqli_query(getCon(), "SELECT count('name') as count from project");
        return mysqli_fetch_assoc($res)['count'];
    }

    function getCountFeature(){
        $res = mysqli_query(getCon(), "SELECT count('name') as count from feature");
        return mysqli_fetch_assoc($res)['count'];
    }

    function getCountSepc(){
        $res = mysqli_query(getCon(), "SELECT count('name') as count from specification");
        return mysqli_fetch_assoc($res)['count'];
    }

    function getCountFeatureByProject($pid){
        $res = mysqli_query(getCon(), "SELECT count('fid') as count from pf where pid='{$pid}'");
        return mysqli_fetch_assoc($res)['count'];
    }



    function getAllFeatureByPid($pid){

        $sql = "SELECT * from feature where id IN (SELECT fid from pf where pid='{$pid}');";
        if($result = mysqli_query(getCon(), $sql)){
            $features = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($features, $row);
            }
            return $features;
        }
    }
    function getAllSpecByFid($fid){

        $sql = "SELECT * from specification where id IN (SELECT sid from fs where fid='{$fid}')";
        if($result = mysqli_query(getCon(), $sql)){
            $features = [];
            while($row=mysqli_fetch_assoc($result)){
                array_push($features, $row);
            }
            return $features;
        }
    }

function updateSpecification($id, $name, $userStory, $acceptanceCriteria, $wireframe) {
    $connection = getCon();

    $name = mysqli_real_escape_string($connection, $name);
    $userStory = mysqli_real_escape_string($connection, $userStory);
    $acceptanceCriteria = mysqli_real_escape_string($connection, $acceptanceCriteria);
    $id = (int)$id; 

    if ($_FILES['wireframe']['size'] > 0) {
        $newWireframe = $_FILES['wireframe']['name'];
        $newWireframe_src = $_FILES['wireframe']['tmp_name'];
        $newWireframe_des = "wireframe/" . $_FILES['wireframe']['name'];
        
        if (move_uploaded_file($newWireframe_src, $newWireframe_des)) {
            $wireframe = mysqli_real_escape_string($connection, $newWireframe);
        } else {
            echo "Failed to upload the wireframe file.";
            exit;
        }
    }


    $sql = "UPDATE specification SET name='{$name}', user_story='{$userStory}', acceptance_criteria='{$acceptanceCriteria}', wireframe='{$wireframe}' WHERE id={$id}";

    mysqli_query($connection, $sql);

    mysqli_close($connection); 
}


function getSpecificationById($id){
    $connection = getCon();
    $id = (int)$id; 
    
    $sql = "SELECT * FROM specification WHERE id={$id}";
    
    $result = mysqli_query($connection, $sql);
    
    $specification = null;
    
    if ($result) {
        $specification = mysqli_fetch_assoc($result);
    }
    
    mysqli_close($connection);
    
    return $specification;
}

function deleteSpecification($id){
    $connection = getCon();
    $id = (int)$id;
    
    $sql = "DELETE FROM specification WHERE id={$id}";
    
    mysqli_query($connection, $sql);
    
    mysqli_close($connection);
}
function deleteProject($id){
    $connection = getCon();
    $id = (int)$id;
    
    $sql = "DELETE FROM project WHERE id={$id}";
    
    mysqli_query($connection, $sql);
    
    mysqli_close($connection);
}

function getFeaturesForProject($projectId){
    $connection = getCon();
    $projectId = (int)$projectId;
    
    $sql = "SELECT f.id, f.name FROM feature AS f INNER JOIN pf AS pf ON f.id = pf.fid WHERE pf.pid={$projectId}";
    
    $result = mysqli_query($connection, $sql);
    
    $features = [];
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $features[] = $row;
        }
    }
    
    mysqli_close($connection);
    
    return $features;
}

function removeAllProjectFeatures($projectId){
    $connection = getCon();
    $projectId = (int)$projectId;
    
    $sql = "DELETE FROM pf WHERE pid={$projectId}";
    
    mysqli_query($connection, $sql);
    
    mysqli_close($connection);
}

function updateProject($id, $name, $domain){
    $connection = getCon();
    $id = (int)$id;
    
    $name = mysqli_real_escape_string($connection, $name);
    $domain = (int)$domain;
    
    $sql = "UPDATE project SET name='{$name}', did='{$domain}' WHERE id={$id}";
    
    mysqli_query($connection, $sql);
    
    mysqli_close($connection);
}

?>