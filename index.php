<?php 
    include "db.php";
    $result = mysqli_query($conn, "SELECT title, book_image, price, description, book_id FROM books");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* CSS for uniform image size */
        .card-img-top {
            height: 300px;  /* Adjust this value as needed */
            width: 100%;
        }
        h3 {
            color: white;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center my-5">
                <h3>FAMOUS BOOKS</h3>
            </div>
            <?php 
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="' . $row['book_image'] . '" class="card-img-top" alt="Book Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                    echo '<p class="card-text">' . substr($row['description'], 0, 100) . '...</p>';
                    echo '<p class="card-text"><strong>Price: ' . $row['price'] . '</strong></p>';
                    echo '<a href="checkout.php?book_id=' . $row['book_id'] . '&title=' . urlencode($row['title']) . '&price=' . $row['price'] . '" class="btn btn-primary">Buy Now</a>';
                    echo '<a href="cart.php" class="btn btn-secondary" style="margin-left:70px">Add Cart</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybFyVcJXPmfT6VZb1EjAX6iZJfm8tQkcEKRikpblMhBASsJHj" crossorigin="anonymous"></script>
</body>
</html>
