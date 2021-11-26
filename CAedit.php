<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<?php include 'components/design.php';
$id = isset($_GET['id']) && $_GET['id']? $_GET['id'] : null;
$title = isset($_POST['title']) && $_POST['title']? $_POST['title'] : null;
//C
if ($id) {
    $sql = 'SELECT * FROM `categories`';
    $result = mysqli_query($connection, $sql);
    $category = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die('invalid id');
}
//UPDATE-change
if ($title) {
    $sql2 = "UPDATE categories SET title = '$title' WHERE id = " . $id;
    mysqli_query($connection, $sql2);
    header("location: Categories.php");
}
?>
<main>
        <div class="container-header">
            <h2>Categories</h2>
        </div>
        <div class="content">
            
            <form method="post" action="">
                <div class="form-group">
                    <label for="">Change</label>
                    <select name="title">
                        <?php foreach ($category as $value): ?>
                            <option value="<?=$value['first_title']?>"><?=$value['first_title']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn submit">Update</button>
                    <a href="Categories.php" class="btn">Back</a>
                </div>
            </form>

        </div>
</main>
</body>
</html>