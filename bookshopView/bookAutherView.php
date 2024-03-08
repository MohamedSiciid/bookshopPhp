<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-Author Relationship Table</title>
    <!-- Include Bootstrap JS (optional) -->
    <?php include '../allLinks/bostlink.php'; ?>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Book-Author Relationship Table</h2>
        <div class="d-flex justify-content-between mb-3">
            <!-- Button on the left -->
            <div>
                <a href="../pages/authorBook.php" class="btn btn-primary">Add New</a>
            </div>
            <!-- Search input on the right -->
            <div class="lg-4">
                <input type="text" class="form-control" id="Search" name="Search" placeholder="Search" style="width: 100%;">
            </div>
        </div>
        <table class="table table-bordered  styled-table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Book ID</th>
                    <th>Author ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP loop to fetch and display book-author records -->
                <?php
                //  database connection code
                include('../connection/conn.php');

                // Fetch book-author records
                $sql = "SELECT * FROM book_author";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["Book_ID"] . "</td>";
                        echo "<td>" . $row["Author_ID"] . "</td>";
                        echo "
                        <td>
                            <a 
                                href='../tblEdit/BookAutherEdit.php ?id=" . $row["Book_ID"] . "'      class='btn btn-primary '>
                                Edit <i class=' fas fa-pencil-alt ms-2'></i>
                            </a> 
                            | 
                            <a 
                                href='../tblEdit/BookAutherDelete.php ?id=" . $row["Book_ID"] . "' 
                                class='btn btn-danger '>
                                Delete <i class=' fas fa-trash ms-2'></i>
                            </a>
                        </td>
                        ";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found.</td></tr>";
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