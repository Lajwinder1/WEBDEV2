<?php
/****
    Name: Lajwinder Kaur
    Date: 2023-09-25
    Description: Admin Dashboard 
****/

require('connect.php');
require('authenticate.php');


$sort_option = isset($_GET['sort']) ? $_GET['sort'] : 'art_name';


$allowed_sort_options = ['art_name', 'artist_name', 'description'];
if (!in_array($sort_option, $allowed_sort_options)) {
    
    $sort_option = 'art_name';
}


$query = "SELECT * FROM arts ORDER BY $sort_option";
$statement = $db->prepare($query);

if (!$statement->execute()) {
   
    print_r($statement->errorInfo());
    exit; 
}

$arts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Admin Dashboard - View Arts</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Winnipeg Art Gallery</a></h1>
        </div> 
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="add.php">Add Art</a></li>
        </ul> 
        <div id="content">
            <h2>Admin Dashboard - View Arts</h2>
            <div id="sorting-options">
                <form method="get" action="admin.php">
                    <label for="sort">Sort by:</label>
                    <select id="sort" name="sort">
                        <option value="art_name" <?php echo ($sort_option === 'art_name') ? 'selected' : ''; ?>>art_name</option>
                        <option value="artist_name" <?php echo ($sort_option === 'artist_name') ? 'selected' : ''; ?>>artist_name</option>
                        <option value="description" <?php echo ($sort_option === 'description') ? 'selected' : ''; ?>>description</option>
                    </select>
                    <button type="submit">Sort</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>art_name</th>
                        <th>artist_name</th>
                        <th>Description</th> <!-- Add this line for the description column -->
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arts as $art): ?>
                        <tr>
                            <td><?= $art['art_name'] ?></td>
                            <td><?= $art['artist_name'] ?></td>
                            <td><?= $art['description'] ?></td> <!-- Add this line for the description column -->
                            <td>
                                <?php if (!empty($art['image'])): ?>
                                    <img src="<?= $art['image'] ?>" alt="<?= $art['art_name'] ?>" style="max-width: 50px; max-height: 50px;">
                                <?php endif; ?>
                            </td>
                            <td>
                            <a href="edit.php?art_id=<?= $art['art_id'] ?>">Edit</a>
                                <a href="delete.php?art_id=<?= $art['art_id'] ?>" onclick="return confirm('Are you sure you want to delete this art?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

