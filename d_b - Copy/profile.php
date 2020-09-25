    <?php 
            session_start();

            //conect  2 DB (members & posts) with classes
            include("classes/connect.php");
            include("classes/signin.php");
            include("classes/user.php");
           // include("classes/post.php");

            // check if user signin 
            $signin = new Signin();
            $user_data = $signin->check_signin($_SESSION['doorban_userid']);
           
 
                //collect posts  

            //  $post = new Post();
            // $id = $_SESSION['doorban_userid'];
            // $posts = $post->get_posts($id);

    ?>

    <html>
            <head>
                <title>Profile | Doorban</title>
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" type="text/css "href="./css/profile.css">
                
            </head>
         <body>
    

            <!--top bar-->
            <div>
            <?php include("header.php");?>

            </div>
                 
                 <div style="padding: 3px;">
            <div style="display:flex;">

                <!-- profile pic-->
                <div style="flex: 1;" >
                <span style="font-size: 12px;">

                    <?php 
                    //set variable & value for image
                    $image = "";
                    //check if user file found in db 
                    if(file_exists($user_data['profile_image']))
                    {
                        $image = $user_data['profile_image'];
                    }
                    else{         
                        $image = "./image/boy.png";
                        if($user_data['gender'] == "Female")
                        {
                            $image = "./image/girl.png";
                        }
                    }

                    
                    ?>
                    <!--show image-->
                    <img id="profile_pic" src="<?php echo $image ?> ">
                    <br>
                    <!--change profile image redirect to page - link encryption : c = change | pi1 = profile-->
                    <a href="change_profile_image.php?c=pi1" style="text-decoration: none;">Change Profile Image</a> 
                   
                    
                </span>
                
                <br>
                <!--user name from db-->
                <div style="font-size: 30px;"><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?></div>
                <br>
                </div>


                    <!-- points earned -->
                <div id="points_badges" style="flex: 5;background-color:#1111;text-align:center;font-size:25px;background-size:100%;margin-left:10px;padding-top:20px;" >
               
               
                    <!--show points_earned-->
                    <span id="points_earned" ><?php echo $_SESSION['score']; ?>  Points  </span> 
                    <br>
                    <br>
                    <!--show badges_earned-->
                    <span id="badges_earned" src="<?php echo $badges_earned ?> "> 3 Badges </span>
                    <br>
              

                <br>
                <br>                
                </div>
                    <br>
                
                </div>

         
          
                
          
    
    
            <!--below cover posts -->




           
            <div id="post_bar">
                    <!--posts are posted here-->

                <?php
            
                // use class User with get _user function  & Post to post from db
               // if($posts)
                //{
                 //   foreach($posts as $ROW)
                 //   {
                        //conect between members and posts db 
                 //       $user = new User();
                  //      $ROW_USER = $user->get_user($ROW['userid']);
                  //      include("post.php");
                 //   }
            //    }
                

                ?>

            </div>


            </div>
        
        
            <br>
<br>
<?php
include_once 'footer.php';

?>