<!DOCTYPE html>
<html>
<head>
    <title>davaleba</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <?php include 'components/design.php';
    //ERASURE
    $id = isset($_POST['id']) && $_POST['id']? $_POST['id'] : null;
    if ($id) {
        $ERASURE = "DELETE FROM categories WHERE id = '$id'";
        mysqli_query($connection, $ERASURE);
    }
    //C
        $sql = 'SELECT * FROM `categories`';
        $result = mysqli_query($connection, $sql);
        $category = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
<main>
        <div class="container-header">
            <h2>Categories</h2>
            <a href="addnew.php?Web=0" class="btn">Add New</a>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($category as $value) :?>
                <tr>
                    <td><?= $value['title']?></td>
                    <td class="actions">
                        <a class="edit" href="CAedit.php?id=<?=$value['id']?>">Edit</a>
                        <form class="Tform" method='post'>
                        <input type="hidden" name='id' value=<?=$value['id']?>>
                        <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
              </table>
        </div>
    </main>
</body>
</html>