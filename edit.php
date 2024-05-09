<?php
if (isset($_GET['edit'])) {
    $user_id = $_GET['user_id'];

    $connection = mysqli_connect("localhost", "root", "", "data");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM dash WHERE user_id = '$user_id'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <h2>Edit Record</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Position: <input type="text" name="position" value="<?php echo $row['position']; ?>"><br>
        Office: <input type="text" name="office" value="<?php echo $row['office']; ?>"><br>
        Age: <input type="text" name="age" value="<?php echo $row['age']; ?>"><br>
        Start Date: <input type="text" name="startdate" value="<?php echo $row['startdate']; ?>"><br>
        Salary: <input type="text" name="salary" value="<?php echo $row['salary']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
    } else {
        echo "Record not found.";
    }
    mysqli_close($connection);
} else {
    echo "Edit ID not provided.";
}
?>
