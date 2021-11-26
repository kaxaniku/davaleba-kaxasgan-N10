<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<?php include 'components/design.php';
//C
$id = isset($_POST['id']) && $_POST['id']? $_POST['id'] : null;
$title = isset($_POST['title']) && $_POST['title']? $_POST['title'] : null;
$text = isset($_POST['text']) && $_POST['text']? $_POST['text'] : null;
$sql1 = 'SELECT * FROM `categories`';
$result = mysqli_query($connection, $sql1);
$Cid = mysqli_fetch_all($result, MYSQLI_ASSOC);
//Web
if (isset($_GET['Web']) && $_GET['Web'] == 1){ 
    if ($title && $text && $id) {
        $sql = "INSERT INTO news (title,text,category_id) VALUES ('$title','$text','$id')";
        mysqli_query($connection, $sql);
        header("location: News.php");
    }?>

<main>
        <div class="container-header">
            <h2>News</h2>
        </div>
        <div class="content">
            <form method="post" action="">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title">
                </div>
                    <div class="form-group">
                    <label for="">Text</label>
                    <Textarea name="text"></Textarea>
                </div>
                <select name="id">
                        <?php foreach ($Cid as $value): ?>
                            <option value="<?=$value['id']?>"><?=$value['first_title']?></option>
                        <?php endforeach; ?>
                    </select>
                <div class="form-group">
                    <button class="btn submit">Add</button>
                    <a href="News.php" class="btn">Back</a>
                </div>
            </form>
        </div>
</main>

<?php
}elseif (isset($_GET['Web']) && $_GET['Web'] == 0) {
    if ($title) {
        $sql = "INSERT INTO categories (title,first_title) VALUES ('$title','$title')";
        mysqli_query($connection, $sql);
        header("location: Categories.php");
    }?>

<main>
        <div class="container-header">
            <h2>Categories</h2>
        </div>
        <div class="content">
            <form method="post" action="">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title">
                </div>
                <div class="form-group">
                    <button class="btn submit">Add</button>
                    <a href="Categories.php" class="btn">Back</a>
                </div>
            </form>
        </div>
</main>
<?php
}else{
    die('error');
}
?>
</body>
</html>