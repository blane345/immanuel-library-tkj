<?php
require_once __DIR__."/../config/database.php";

function getBooks()
{
  global $pdo;

  $query = "select * from books";
  $stmt = $pdo->prepare($query);
  $stmt ->execute();

  $books =$stmt->fetchAll();
  print_r($books);
  exit;

  return $books;
}

function getBook()
{

  $book = [
    "id" => 5,
    "title" => "Antologi Rasa Nusantara",
    "isbn" => "978-602-1234-56-7",
    "year" => 2021,
    "stock" => 4,
    "category_id" => 1,
    "category" => "Fiksi",
    "description" => "Kumpulan puisi dan cerita pendek dari berbagai penulis Nusantara.",
    "author_ids" => [4, 5],
    "authors" => ["Pramoedya Ananta Toer", "Sapardi Djoko Damono"],
  ];
  return $book;
}