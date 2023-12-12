<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .product-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .product-details {
            background-color: #ed563b;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .product-details h2,
        .product-details p,
        .product-details h4,
        .product-details li {
            color: white;
        }

        .product-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-add-to-cart {
            background-color: #ed563b;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .btn-add-to-cart:hover {
            background-color: #d44730;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #ed563b;
        }

        .discount {
            font-size: 16px;
            color: #999;
            text-decoration: line-through;
        }
    </style>
</head>

<body>

    <div class="container mt-5 product-container">
        <div class="row">
            <div class="col-lg-6 product-image">
                <!-- Car Image -->
                <img src="car-image.jpg" alt="Car Image" class="img-fluid">
            </div>
            <div class="col-lg-6 product-details">
                <!-- Car Details -->
                <h2>Toyota Camry</h2>
                <p class="text-muted">Category: Sedan</p>
                <div class="price">$49.99 per day</div>
                <div class="discount">$69.99 per day</div>
                <hr>

                <!-- Car Description -->
                <h4>Description:</h4>
                <p>Experience luxury and comfort with the Toyota Camry. Perfect for your road trips and daily commutes.
                    Equipped with advanced features for a smooth and enjoyable drive.</p>
                <hr>

                <!-- Car Features -->
                <h4>Features:</h4>
                <ul>
                    <li>Spacious Interior</li>
                    <li>Advanced Safety Systems</li>
                    <li>Fuel Efficiency</li>
                    <li>Entertainment System</li>
                </ul>

                <!-- Rent Now Button -->
                <button class="btn btn-add-to-cart">Rent Now</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>
