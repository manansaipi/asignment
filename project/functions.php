<?php 
$conn = mysqli_connect("localhost","root","","asignment");
function register($data){
    global $conn;
    $name = $data["name"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('Username already taken!') </script>";
        return false;
    } 

    if ($password !== $password2){
            echo "<script>alert('Password not match');</script>";
        return false;
    } else if (strlen(trim($password)) < 5 && !preg_match("/[A-Z]/", $password)){
        echo"<script>alert('Password minimum 5 characters and minimum 1 uppercase')</script>";
        return false;  
    } else if (!preg_match("/[A-Z]/", $password)){
        echo"<script>alert('Password minimum 1 uppercase')</script>";
        return false;
    } else if (strlen(trim($password)) < 5){
        echo"<script>alert('Password minimum 5 characters</script>";
        return false;
    } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users VALUES('','$name', '$username', '$password')");
    return mysqli_affected_rows($conn);}    
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;   
}
function insert($data){
        global $conn;
        $title = htmlspecialchars($data["title"]);
        $content = htmlspecialchars($data["content"]);
        $name = htmlspecialchars($data["name"]);

        $query = "INSERT INTO articel 
                    VALUES 
                    ('', '$title', '$content','$name')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
}
function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM articel WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);
    $name = htmlspecialchars($data["name"]);

    $query = "UPDATE articel SET 
                title = '$title', 
                content = '$content',
                name = '$name' WHERE id = $id";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}