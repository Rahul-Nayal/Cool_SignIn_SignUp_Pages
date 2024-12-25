<?php 
    session_start(); // Start the session to use it for storing cart data if needed

    // Retrieve book details from the URL
    if (isset($_GET['book_id']) && isset($_GET['title']) && isset($_GET['price'])) {
        $book_id = $_GET['book_id'];
        $title = $_GET['title'];
        $price = $_GET['price'];

        // Optionally, fetch more details about the book from the database using $book_id
        // Example: Fetch book description, author, etc.
        include "db.php";
        $book_query = mysqli_query($conn, "SELECT * FROM books WHERE book_id = '$book_id'");
        $book_details = mysqli_fetch_assoc($book_query);
    } else {
        // If no book data is found, redirect back to the home page or show an error
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Book Store</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background:black;
            color:white;
        }
        #checkout{
            margin:50px 0;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="container my-5">
        <!-- Order Summary Section -->
        <div class="row">
            <div class="col-md-12 text-center " id="checkout">
                <h2>Checkout</h2>
            </div>
            <div class="col-md-6">
                <h4>Order Summary</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $title; ?></td>
                            <td>Rs : <?php echo $price; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Shipping Form -->
            <div class="col-md-6">
                <h4>Shipping Information</h4>
                <form action="process_checkout.php" method="POST">
                    <!-- Shipping details form inputs -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0X9F+NQpGQBlQ8u4R8w7ajpP7r0m2tOq4pAJy7hJhtREmM4k" crossorigin="anonymous"></script>
</body>
</html>
