<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj novi telefon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
        .container {
            background-color: #b7bcbc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #0bace1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #6fcfef;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Dodaj novi telefon</h2>
    <form action="modeli/productAdd.php" method="post" enctype="multipart/form-data">
        <label for="ime">Ime telefona:</label>
        <input type="text" id="ime" name="ime" required>

        <label for="opis">Opis:</label>
        <textarea id="opis" name="opis" rows="4" required></textarea>

        <label for="cena">Cena (RSD):</label>
        <input type="number" id="cena" name="cena" min="1" required>

        <label for="slika">Dodaj sliku:</label>
        <input type="file" id="slika" name="slika" accept="image/*">

        <label for="kolicina">Količina:</label>
        <input type="number" id="kolicina" name="kolicina" min="1" required>



        <button type="submit">Dodaj telefon</button>
    </form>
</div>
</body>
</html>
