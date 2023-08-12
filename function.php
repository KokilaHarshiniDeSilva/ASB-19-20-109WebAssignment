<?php

//in this PHP folder i have include database connection and project functions 

//function for connecting to database
function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


//function for inserting data
function insertProject($Project_ID, $Title, $Descript, $Img) {
    $conn = connectDatabase();

    $stmt = $conn->prepare("INSERT INTO projects (Project_ID, Title, Descript, Img) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iss", $Project_ID, $Title, $Descript, $Img);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
   
}


//function for getting data
function getProjects() {
    $conn = connectDatabase();

    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);

    $projects = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

  

    return $projects;
}


//function for updating data
function updateProject($Target, $newProject_ID) {
    $conn = connectDatabase();

    $stmt = $conn->prepare("UPDATE projects SET Project_ID = ? WHERE Project_ID = ?");
    $stmt->bind_param("ii", $newProject_ID, $Target);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
   
}


//function for deleting data
function deleteProject($Target2) {
    $conn = connectDatabase();

    $stmt = $conn->prepare("DELETE FROM projects WHERE Project_ID = ?");
    $stmt->bind_param("i", $Target2);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

    $stmt->close();
    
}

?>