<?php
session_start();


    include("classes/connect.php");
    include("classes/signin.php");
    include("classes/user.php");
   
 
   
   
    //check if signed in
    $signin = new Signin();
    $user_data = $signin->check_signin($_SESSION['doorban_userid']);

      //set question number
      $number = (int)$_GET['n'];
      
      //get question
      $query = "SELECT question FROM `locations` where location_id = $number";
  
  
      //get result
      $DB = new Database();
      $result = $DB->read($query) or die ($this->error .= "Wrong password <br> ");
  
      $question = $result;
  
       //get choice
       $query = "SELECT * FROM `choises` where location_id = $number";
  
  
       //get results
       $choises = $DB->read($query) or die ;
      
       // get total questions
      $query = "SELECT * FROM `questions`";
        
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">
        <title> </title>
        <link rel="stylesheet" href="css/qindex.css" type="text/css"/>
    </head>
    <body>
      
          <!--top bar-->
        <div>
            <?php include("header.php");?>

        </div>
 
        
        <main>
            <div class="container">
            <div class="current"> Question <?php// echo $question['question_number'];?> of <?php// echo $total;?></div>
            <p class="question">
                <?php echo $question['text'];?>
            </p>
            <form method="post" action="classes/process.php">
                <ul class="choises">
                <?php while($row = $choises->fetch_assoc()): ?>
                    <li><input name="choises" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li> 
                <?php endwhile;?>
              
                </ul>
                <input type="submit" value="Submit"/>
                <input type="hidden" name="number" value="<?php echo $location_id; ?>"/>
            </form>
            </div>
        </main>





<?php
include_once 'footer.php';

?>