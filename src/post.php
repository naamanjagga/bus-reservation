<?php
  
 
   class myclass {
       public $start,$reach,$date,$type;
       function __construct($a,$b,$c,$d)
       {
           $this->start = $a;
           $this->reach = $b;
           $this->date = $c;
           $this->type = $d;
       }
       function book(){
             $book_array = array($this->start ,$this->reach ,$this->date ,$this->type);
             echo json_encode($book_array);
       }
   }
   class myclass1 {
    public $fname ,$lname ,$age ,$gender,$number,$email;
    function __construct($a,$b,$c,$d,$e,$f,$g)
    {
        $this->fname = $a;
        $this->lname = $b;
        $this->age = $c;
        $this->gender = $d;
        $this->city = $e;
        $this->number = $f;
        $this->email = $g;
    }
    function details(){
          $detail_array = array($this->fname ,$this->lname ,$this->age ,$this->gender ,$this->city ,$this->number ,$this->email);
         echo json_encode($detail_array);
        }
    }
   if(isset($_POST['action']) && $_POST['action'] == 'book'){
       $obj = new myclass($_POST['start'] ,$_POST['reach'], $_POST['date'], $_POST['type']);
       $obj->book();
   }
   if(isset($_POST['action']) && $_POST['action'] == 'details'){
    $obj = new myclass1($_POST['fname'] ,$_POST['lname'], $_POST['age'], $_POST['gender'],$_POST['city'], $_POST['number'], $_POST['email']);
    $obj->details();
   }
?>