<?php

       function productDetails($idProduct)
       {
           if (!isset ($_GET['id']) || empty ($_GET['id']))
           {
               die ("Fali ID proizvoda");
           }
           require_once "modeli/base.php";
           $result = $base -> query ("SELECT * FROM proizvodi WHERE id = $idProduct");
           if ($result-> num_rows == 0)
           {
               die ("Ovaj proizvod ne postoji");
           }

           return $result -> fetch_assoc();
       }

        $product = productDetails($_GET['id']);





        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobi Net</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 32px;
            color: #222;
        }


        .table-container {
            background-color: #6fcfef;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        strong {
            font-size: 24px;
            color: #222;
        }

        p {
            font-size: 18px;
            margin: 5px 0;
        }

        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .in-stock {
            color: #fff;
            background-color: #0bace1;
        }

        .out-of-stock {
            color: #fff;
            background-color: red;
        }
        form {
            margin-top: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 50px;
            padding: 5px;
            margin-left: 5px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #5d6161;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #615d5d;
        }


    </style>

</head>
<body>
<h1>Mobi Net</h1>

<div class="table-container">

    <strong><?= $product['ime']; ?></strong>
    <p>Cena: <?= $product['cena']; ?> RSD</p>
    <p>Opis: <?= $product['opis']; ?></p>

    <?php if ($product['kolicina'] == 0): ?>
        <p class="status out-of-stock">Nema na stanju</p>
    <?php else: ?>
        <p class="status in-stock">Ima na stanju: <?= $product['kolicina']; ?></p>


        <form action="cart.php" method="post">
            <input type="hidden" name="id" value="<?= $product['id']; ?>">

            <label for="kolicina">Količina:</label>
            <input type="number" name="kolicina" id="kolicina" min="1" max="<?= $product['kolicina']; ?>" value="1" required>

            <button type="submit">Dodaj u korpu</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>