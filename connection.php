<?php

    // Our Database credentials username and passwords
    $user = "a10009243_ian";
    $pw = "Toiohomai1234";
    $db = "a10009243_database";
    
    // Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    // variable that returns all records in the database
    $all_records = $connection->query("select * from scp");
    
    
    // code for insert data from our create form
    // check if submit value has been sent via POST
    if(isset($_POST['submit']))
    {
        // create variables from our form post data
        // using escape method (Object Oriented Style) to allow certain characters to be inserted into DB
        $item = $connection->real_escape_string($_POST['item']);
        $class = $connection->real_escape_string($_POST['class']);
        $containment = $connection->real_escape_string($_POST['containment']);
        $description = $connection->real_escape_string($_POST['description']);
        $image = $connection->real_escape_string($_POST['image']);
        
        // create sql command to insert above values into our DB
        $insert = "insert into scp(item, class, containment, description, image)
        values('$item', '$class','$containment', '$description', '$image')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
                <h1>Record added successfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error()}<p>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
    } // end isset POST (insert or create record)
    
    if(isset($_POST['update']))
    {
        // Create variables from our form post data
        $id = $_POST['id'];
        // using escape method (procedule Style) to allow certain characters to be inserted into DB
        $item = mysqli_real_escape_string($connection, $_POST['item']);
        $class = mysqli_real_escape_string($connection, $_POST['class']);
        $containment = mysqli_real_escape_string($connection, $_POST['containment']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $image = mysqli_real_escape_string($connection, $_POST['image']);
        
        // create a sql update command
        $update = "update scp set item='$item', class='$class', containment='$containment', description='$description', image='$image' where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "
                <h1>Record updated successfully</h1>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
        }
        else
        {
            echo "
                <h1>Record did not update</h1>
                <p>{$connection->error()}</p>
                <p><a href='index.php'>Return to index page.</a></p>
            ";
        }
        
    } // end isset POST (update record)
    
    // delete record function
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        // delete sql command
        $del = "delete from scp where id=$id";
        
        if($connection->query($del) === TRUE)
        {
            echo "
            <h1>Record Deleted</h1>
            <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
            <h1>Error deleting record</h1>
            <p>{$connection->error()}</p>
            <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        
    } // end of delete

    
?>