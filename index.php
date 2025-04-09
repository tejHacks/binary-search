<?php
function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;
    
    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);
        
        if ($arr[$mid] == $target) {
            return $mid; // Target found, return index
        }
        
        if ($arr[$mid] < $target) {
            $left = $mid + 1; // Search right half
        } else {
            $right = $mid - 1; // Search left half
        }
    }
    return -1; // Target not found
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = explode(",", str_replace(" ", "", $_POST['array']));
    $target = (int)$_POST['target'];
    sort($numbers); // Ensure the array is sorted
    
    $index = binarySearch($numbers, $target);
    $result = ($index != -1) ? "Number found at index " . $index : "Number not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Search</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4 text-center" style="max-width: 400px;">
        <h1 class="mb-3">Binary Search</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Enter Sorted Numbers (comma-separated):</label>
                <input type="text" name="array" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Enter Number to Search:</label>
                <input type="number" name="target" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>
        <p class="fw-bold text-success mt-3"> <?php echo $result; ?> </p>
    </div>
    <script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
