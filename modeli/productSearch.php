<?php
    require_once "base.php";
    function productSearch ($productSearch)
    {
        if (!isset ($_GET["productSearch"]) || empty($_GET["productSearch"])) {
            die ("Niste pretrazili");
        }
        global $base;
        $searchTerm = $base->real_escape_string($productSearch);


        $result = $base->query("SELECT * FROM proizvodi WHERE (ime  LIKE '%$searchTerm%' OR opis LIKE '%$searchTerm%') ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    $products = [];
    if (isset($_GET["productSearch"]) && !empty($_GET["productSearch"])) {
    $products = productSearch($_GET["productSearch"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #555;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 32px;
        }

        .search-bar {
            text-align: center;
            margin: 20px 0;
        }

        .search-bar input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .btn-details {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #007BFF; /* Plava boja dugmeta */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-details:hover {
            background-color: #0056b3; /* Tamnija nijansa pri prelasku miša */
        }


        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 proizvoda u redu */
            gap: 20px; /* Razmak između proizvoda */
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .product {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #6fcfef;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 16px;
        }


        /* Responsive dizajn */
        @media (min-width: 1024px) {
            .products-grid {
                grid-template-columns: repeat(4, 1fr); /* 4 proizvoda u jednom redu na velikim ekranima */
            }
        }

        @media (max-width: 1023px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 proizvoda u redu na tabletima */
            }
        }

        @media (max-width: 600px) {
            .products-grid {
                grid-template-columns: 1fr; /* 1 proizvod u redu na telefonima */
            }
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php if (!empty($products)) : ?>
    <section class="products">
        <div class="products-grid">
            <?php foreach ($products as $product) : ?>
                <div class="product">
                    <h1><?= $product['ime'] ?></h1>
                    <p>Cena proizvoda: <?= $product['cena'] ?></p>
                    <p>Količina na stanju: <?= $product['kolicina'] ?></p>
                    <?php if ($product['kolicina'] == 0): ?>
                        <p style="color: red;">Nema na stanju</p>
                    <?php else: ?>
                        <p style="color: green;">Ima na stanju</p>
                    <?php endif; ?>
                    <a class="btn-details" href="../productDetails.php?id=<?= $product['id'] ?>">Pogledaj detalje</a>

                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php else : ?>
    <?="Nema modela telefona "; ?>

<?php endif;?>
</body>
</html>

        <?php productSearch($_GET["productSearch"]); ?>