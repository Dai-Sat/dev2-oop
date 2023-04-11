<?php

class Book
{
  // Access modifiers
  // 1.public = can be accessed inside and outside of the class
  // 2.private = can be accessed ONLY within the class
  // 3.protected = can be accessed within the class and inside of the sub_class(child_class)→inheritance

  // $this-> use this to access properties and methods if currently inside of the class

  // properties
  public $title;
  public $author;
  public $price;
  public $published_date;
  private $summary;

  // constructor
  public function __construct($title, $author, $price)
  {
    $this->title = $title;
    $this->author = $author;
    $this->price = $price;
  }

  // methods
  public function displaySummary()
  {
    echo $this->summary . "<br>";
  }

  private function displayAuthor()
  {
    echo $this->author . "<br>";
  }

  // setters
  public function setDetails($title, $author, $price)
  {
    $this->title = $title;
    $this->author = $author;
    $this->price = $price;
  }

  // public function setTitle($title)
  // {
  //   $this->title = $title;
  // }

  // public function setAuthor($author)
  // {
  //   $this->author = $author;
  // }

  // public function setPrice($price)
  // {
  //   $this->price = $price;
  // }


  // getters
  public function getTitle()
  {
    echo $this->msg() . "<br>";
    return $this->title;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function getPrice()
  {
    return $this->price;
  }

  // function inside the other function
  public function msg()
  {
    return "Welcome to School!";
  }
}

// Instantiating a class
// $prog_lang is now an object/Instance of the class Book
// $prog-lang can now access properties and methods of the class
// $prog_lang = new Book;

// access public properties outside is OK
// echo "Title: " . $prog_lang->title . "<br>";
// echo "Author: " . $prog_lang->author . "<br>";
// echo "Price: " . $prog_lang->price . "<br>";
// echo "Published_date: " . $prog_lang->published_date . "<br>";

// access private properties outside is NOT OK
// echo "Summary: " . $prog_lang->summary . "<br>";

// access public methods outside is OK
// echo "Summary: ", $prog_lang->displaySummary() . "<br>";

// access private methods outside is NOT OK
// echo "Author: " . $prog_lang->displayAuthor() . "<br>";

// echo "<br><br>";
// Instantiating a class
// $math is now an object
// $math = new Book;
// $math->title = "Analisis II";
// $math->author = "Someone";
// $math->price = "6220 Yen";

// echo "Title: " . $math->title . "<br>";
// echo "Author: " . $math->author . "<br>";
// echo "Price: " . $math->price . "<br>";


// echo "<br><br>";
// Instantiating a class
// $book = new Book;
// $book->setTitle("English");
// $book->setAuthor("Teacher");
// $book->setPrice("1000 Yen");

// getter
// echo "Title: " . $book->getTitle() . "<br>";
// echo "Author: " . $book->getAuthor() . "<br>";
// echo "Price: " . $book->getPrice() . "<br>";
