<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['term'])) {
        $term = $_GET['term'];
        
        // Prepare and execute a SQL query (assuming 'airports' table has 'name' column)
        $stmt = $conn->prepare("SELECT name FROM airports WHERE name LIKE ? LIMIT 5");
        $searchTerm = "%" . $term . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $airports = [];
        while ($row = $result->fetch_assoc()) {
            $airports[] = $row['name'];
        }
        
        echo json_encode($airports);
    }
