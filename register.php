
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-container {
            background-color: #b7bcbc;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            text-align: left;
            color: #555;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 10px;
            background-color: #0bace1;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #6fcfef;
        }
    </style>
    <title>Registraciona Stranica</title>

</head>
<body>
    <div class="register-container">
        <h2>Registracija</h2>
        <form action="modeli/registerUser.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Unesite vaš e-mail" required>
            
            <label for="password">Šifra:</label>
            <input type="password" id="password" name="passwordUser" placeholder="Unesite vašu šifru" required>
            
            <button type="submit">Registruj se</button>



        </form>
    </div>
</body>
</html>
