<?php
include('config.php');

if (!empty($_POST['search'])) {
    $query = "%" . $_POST['search'] . "%";

    // Prepare and execute the SQL statement
    $stmt = $config->prepare("SELECT * FROM category WHERE category LIKE ? OR item LIKE ? OR category_type LIKE ?");
    $stmt->bind_param("sss", $query, $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['category']) . "</td>
                    <td>" . htmlspecialchars($row['item']) . "</td>
                    <td>" . htmlspecialchars($row['category_type']) . "</td>
                    <td><a href='update.php?id=" . urlencode($row['id']) . "'><button class='btn btn-primary'>Update</button></a></td>
                    <td><a href='insert_category.php?id=" . urlencode($row['id']) . "'><button class='btn btn-danger'>Delete</button></a></td>
                </tr>";
        }
    } else {
        echo "<h3>No results found</h3>";
    }

    $stmt->close();
} else {
    echo "<h3>No search term provided</h3>";
}

$config->close();
?>
