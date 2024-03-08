<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Table View</title>
    <!-- Include Bootstrap CSS -->
    <?php include '../allLinks/bostlink.php'; ?>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Author Table View</h2>
        <div class="d-flex justify-content-between mb-3">
            <!-- Button on the left -->
            <div>
                <a href="../pages/author.php" class="btn btn-primary">Add New</a>
            </div>
            <!-- Search input on the right -->
            <div class="lg-4">
                <input type="text" class="form-control" id="Search" name="Search" placeholder="Search"
                    style="width: 100%;">
            </div>
        </div>
        <table class="table table-bordered  styled-table">
            <thead class="table-dark">
                <tr>
                    <th>Author ID</th>
                    <th>Full Name</th>
                    <th>Birthdate</th>
                    <th>Nationality</th>
                    <th>Bibliography</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP loop to fetch and display author records -->
                <?php
                // Database connection code
                include('../connection/conn.php');

                // Fetch author records
                $sql = "SELECT * FROM author";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Author_ID"] . "</td>";
                        echo "<td>" . $row["FullName"] . "</td>";
                        echo "<td>" . $row["Birthdate"] . "</td>";
                        echo "<td>" . $row["Nationality"] . "</td>";
                        echo "<td>" . $row["Bibliography"] . "</td>";
                        echo "
                        <td>
                            <a 
                                href='../tblEdit/edit_author.php ?id=" . $row["Author_ID"] . "'      class='btn btn-primary '>
                                Edit <i class=' fas fa-pencil-alt ms-2'></i>
                            </a> 
                            | 
                            <a 
                                href='../tblEdit/delete_author.php?id=" . $row["Author_ID"] . "' 
                                class='btn btn-danger '>
                                Delete <i class=' fas fa-trash ms-2'></i>
                            </a>
                        </td>
                        ";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found.</td></tr>";
                }

                $conn->close();
                ?>
                <!-- End of PHP loop -->
            </tbody>

        </table>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <?php include '../allLinks/jslink.php'; ?>
</body>

</html>