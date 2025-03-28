<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa bình luận</title>
    <!-- Include CSS files -->
    <?php require_once "views/layouts/libs_css.php"; ?>
</head>
<body>
<div class="container">
    <h2>Chỉnh sửa bình luận</h2>
    <form action="?act=update-comment&id=<?php echo $comment['id']; ?>" method="post">
        <div class="form-group">
            <label for="noi_dung">Nội dung</label>
            <textarea name="noi_dung" id="noi_dung" class="form-control" required><?php echo $comment['noi_dung']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="danh_gia">Đánh giá</label>
            <input type="number" name="danh_gia" id="danh_gia" class="form-control" value="<?php echo $comment['danh_gia']; ?>" required min="1" max="5">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
<!-- Include JS files -->
<?php require_once "views/layouts/libs_js.php"; ?>
</body>
</html>