<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Course Details</title>
</head>
<body>
    <header>
        <h1>Course Details</h1>
    </header>
    <main>
        <section id="course-details">
            <h2>Course Information</h2>
            <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <select name="cour">
    <option value="sem1">Fall 21-22</option>
    <option value="sem2">Winter 21-22</option>
    <option value="sem3">Fall 22-23</option>
    <option value="sem4">Winter 22-23</option>
    <option value="sem5">Fall 23-24</option>
</select>
<input type="submit" name="sub" value="Submit">
</form>
<table>
                <tr>
                <th>Course Name</th>
                <th>Slot</th>
                <th>Code</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "course");
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT name, slot, code FROM course";
                $sql1 = "SELECT name, slot, code FROM course2";
                $result = $conn->query($sql);
                $result1 = $conn->query($sql1);
                if($_GET['cour']=='sem1'){
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["slot"] . "</td><td>"
                . $row["code"]. "</td></tr>";
                }
                echo "</table>";
                    } else { echo "0 results"; }}
                if($_GET['cour']=='sem2'){
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {
                    
                    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["slot"] . "</td><td>"
                    . $row["code"]. "</td></tr>";
                    }
                    echo "</table>";
                    } else { echo "0 results"; }}
                ?>
                </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Your School</p>
    </footer>
</body>
</html>