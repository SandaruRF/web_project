<?php
    require_once 'connection.php';

    if (isset($_POST["submit"])){
        $productname = $_POST["productname"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $color1 = $_POST["color1"];
        $color2 = $_POST["color2"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];

        $upload_dir = "uploads/";

        $imagePaths = array();

        for($i = 1; $i <= 4; $i++) {
            $upload_file = $upload_dir . basename($_FILES["imageUpload{$i}"]["name"]);
            $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
            $check = $_FILES["imageUpload{$i}"]["size"];
            $upload_ok = 0;

            if(file_exists($upload_file)){
                echo "<script>alert('The file already exists')</script>";
            } else {
                $upload_ok = 1;
                if($check !== false){
                    if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
                        $upload_ok = 1;
                    } else {
                        echo '<script>alert("Please change the image format")</script>';
                    }
                } else {
                    echo '<script>alert("The photo size is 0. Please change the photo")</script>';
                    $upload_ok = 0;
                }
            }

            if($upload_ok == 0){
                echo '<script>alert("Sorry, your file was not uploaded. Please try again")</script>';
            } else {
                $temp_name = $_FILES["imageUpload{$i}"]["tmp_name"];
                $target_file = $upload_dir . uniqid() . '_' . basename($_FILES["imageUpload{$i}"]["name"]);

                if(move_uploaded_file($temp_name, $target_file)) {
                    $imagePaths[] = $target_file;
                } else {
                    echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
                }
            }
        }

        if(!empty($imagePaths) && $productname != "" && $price != "" && $quantity != ""){
            $sql = "INSERT INTO product(product_name, price, quantity, color1, color2, brand, model, image1, image2, image3, image4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("ssdssssssss", $productname, $price, $quantity, $color1, $color2, $brand, $model, $imagePaths[0], $imagePaths[1], $imagePaths[2], $imagePaths[3]);

            if ($stmt->execute()) {
                echo "<script>alert('Your product uploaded successfully')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <link rel="stylesheet" href="upload.css">
    <link rel="icon" type="image/x-icon" href="assets2/icon.png">
</head>
<body>
    <?php
        include_once 'header.php';
    ?>
    <section id="upload_container">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="productname" id="productname" placeholder="Product Name" required>
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <input type="number" name="quantity" id="quantity" placeholder="Product Quantity" required>
            <input type="text" name="color1" id="color1" placeholder="Product Color 1" required>
            <input type="text" name="color2" id="color2" placeholder="Product Color 2" required>
            <input type="text" name="brand" id="brand" placeholder="Product Brand" required>
            <input type="text" name="model" id="model" placeholder="Product Model" required>
            <input type="file" name="imageUpload1" id="imageUpload1" required>
            <input type="file" name="imageUpload2" id="imageUpload2" required>
            <input type="file" name="imageUpload3" id="imageUpload3" required>
            <input type="file" name="imageUpload4" id="imageUpload4" required>
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var quantity = document.getElementById("quantity");
        var color1 = document.getElementById("color1");
        var color2 = document.getElementById("color2");
        var brand = document.getElementById("brand");
        var model = document.getElementById("model");

        document.getElementById("imageUpload1").addEventListener("change", handleFileSelect);
        document.getElementById("imageUpload2").addEventListener("change", handleFileSelect);
        document.getElementById("imageUpload3").addEventListener("change", handleFileSelect);
        document.getElementById("imageUpload4").addEventListener("change", handleFileSelect);

        function handleFileSelect(event) {
            var file = event.target.files[0];
            var fieldName = event.target.name;
            var choose = document.getElementById(fieldName + "_label");
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        }
    </script>
</body>
</html>
