<?php
require_once __DIR__ .  "/../../config/database.php";
if (isset($_POST['store']) && $_SERVER['REQUEST_METHOD'] === "POST") {
   try {
    $pdo->begintransaction();

    $title=htmlspecialchars($_POST['title']);
    $isbn =htmlspecialchars($_POST['isbn']);
    $year =htmlspecialchars($_POST['year']);
    $stock =htmlspecialchars($_POST['stock']);
    $description =htmlspecialchars($_POST['description']);
    $categoryId =htmlspecialchars($_POST['category_id']);
    $authorIds = $_POST['author_ids'];



    $query = "insert into books (title,isbn,year,stock,description,category_id) 
             values(:title,:isbn,:year,:stock,:description,:category_id)
             ";
    $stmt =$pdo->prepare($query);
    $stmt-> execute([
        'title' => $title,
        'isbn' => $isbn,
        'year' => $year,
        'stock' => $stock,
        'description' => $description,
        'category_id' => $categoryId


    ]);

    $bookid = $pdo->lastinsertid();


    $query = "insert into book_author(book_id, author_id) values (:book_id, :author_id)";
    $stmt = $pdo->prepare($query);

    
    foreach ($authorIds as $authorId) { 
    $stmt->execute([
        'book_id' => $bookId,
        'author_id' => $authorId
    ]);
}
    


    $pdo->commit();

    header('location: ../../pages/books/index.php');
    exit;
    

   } catch (\Throwable $th) {
    $pdo->pullback();
    throw $e;
   }
}

?>