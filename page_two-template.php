<?php

/* 
 Template Name: page_two
 * 
 *  */

?>
<html>
    <head>
        
        
        <style>
.error {color: #FF0000;}
</style>
    </head>
    
    <body>


<?php

$name = $email = $website = $comment = '';
    $nameerr = $emailerr = $websiteerr = $commenterr = '';

if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    
    
    
    if(empty($_POST['name'])){
        
         $nameerr = 'the name is required';
    }
    else{
        
        
      $name =  test_input($_POST['name']);
    }
    
    if(empty($_POST['email'])){
        
         $emailerr = 'the email is required';
    }
    else{
        
        
        $email = test_input($_POST['email']);
    }
    if(empty($_POST['website'])){
        
         $websiteerr = 'the website name is required';
    }
    else{
        
        $website = test_input($_POST['website']);
    }
   
    if(empty($_POST['comment'])){
        
         $commenterr = 'the comment is required';
    }
    else{
        
        $comment = test_input($_POST['comment']);
    }
    
    function test_input($data){
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        
    }
    
    
}
?>



<h2>New form</h2>
<form method="post" action="">
      
      Name:<input type="text" name="name"><span class="error">* <?php echo $nameerr;?></span><br><br>
    Email : <input type="email" name="email"><span class="error">* <?php echo $emailerr;?></span><br><br>
    Phone: <input type="text" name="website"><span class="error">* <?php echo $websiteerr;?></span><br><br>
    Message: <textarea name="comment" rows="5" cols="40"></textarea><span class="error">* <?php echo $commenterr;?></span><br><br>
    
    
    <input type="submit" name="submit" value="submit">
    
         
</form>
<h2> your values</h2>
<?php

echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";


?>



    </body>
