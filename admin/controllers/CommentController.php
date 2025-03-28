<?php

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    // Hiển thị tất cả bình luận của sản phẩm
    public function index()
    {
        $comments = $this->commentModel->getAll(); // Lấy tất cả bình luận
        require_once './views/comments/index.php'; // Truyền dữ liệu vào view
    }

    // Hiển thị chi tiết bình luận của sản phẩm
    public function show($productId)
    {
        $comments = $this->commentModel->getByProductId($productId); // Lấy tất cả bình luận cho sản phẩm
        include 'views/comments/show.php'; // Truyền dữ liệu vào view
    }

    // Hiển thị form chỉnh sửa bình luận
    public function edit($id)
    {
        $comment = $this->commentModel->getById($id); // Lấy bình luận theo ID
        require_once './views/comments/edit.php'; // Truyền dữ liệu vào view
    }

    // Cập nhật bình luận
    public function update($id)
    {
        $noi_dung = $_POST['noi_dung'];
        $danh_gia = $_POST['danh_gia'];
        $this->commentModel->update($id, $noi_dung, $danh_gia); // Cập nhật bình luận
        header('Location: ?act=comment'); // Chuyển hướng về trang danh sách bình luận
    }

    // Xóa bình luận
    public function delete($id)
    {
        $this->commentModel->delete($id); // Xóa bình luận
        header('Location: ?act=comment'); // Chuyển hướng về trang danh sách bình luận
    }
}