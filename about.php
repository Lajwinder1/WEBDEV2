<?php require('connect.php');
require('authenticate.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Winnipeg Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset some default styles */
        body, h1, h2, h3, p, ul, ol, li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        nav {
            background-color: #555;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        main {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        .feedback-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <header>
        <h1>About Winnipeg Art Gallery</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        
        <a href="about.php" class="active">About</a>
    </nav>

    <main>
        <section>
            <h2>Our Mission</h2>
            <p>At Winnipeg Art Gallery, our mission is to celebrate the rich cultural heritage of Canada and Indigenous communities through the promotion of art and creativity. We strive to connect people, inspire creativity, and foster a deeper appreciation for the diverse expressions of artistic talent.</p>
        </section>

        <section>
            <h2>Our History</h2>
            <p>Founded in 2020, Winnipeg Art Gallery has been a cornerstone in the art community, curating exhibitions that showcase the evolution of Canadian and Indigenous art. Over the years, we have become a hub for artists, enthusiasts, and learners alike, contributing to the vibrant cultural landscape of Winnipeg.</p>
        </section>

        <section>
            <h2>Feedback</h2>
            <div class="feedback-form">
                <form action="submit_feedback.php" method="post">
                    <label for="art_id">Art ID:</label>
                    <input type="text" name="art_id" id="art_id" required>
                    <br>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <label for="message">Your Feedback:</label>
                    <textarea name="message" id="message" required></textarea>
                    <br>
                    <input type="submit" value="Submit Feedback">
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Winnipeg Art Gallery. All rights reserved.</p>
    </footer>

</body>

</html>
