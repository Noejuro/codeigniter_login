<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body style="background-color: #F4F4F4">
    <div class="header">
        Register a new User
    </div>
    
    <div style="padding-top: 150px; max-width: 200px; margin: 0 auto; font-size: 22px">
        <?php
            echo form_open('Register/create', array('method' => 'POST'));
            echo form_label('Name');
            echo form_input('name');
            echo '<br>';
            echo form_label('Email');
            echo form_input(array('type' => 'email', 'name' => 'email'));
            echo '<br>';
            echo form_label('Password');
            echo form_input(array('type' => 'password', 'name' => 'password'));
            echo '<br>';
            echo form_label('Confirm password');
            echo form_input(array('type' => 'password', 'name' => 'password_confirm'));
            echo '<br>';
            echo form_submit('submit', 'Register');
            echo form_close();
        ?>
        
        <?= isset($msg) ? $msg : '' ?>
    </div>
    <div style="width: 100%; text-align: center; margin-top: 10px">
        <?php echo validation_errors(); ?>
    </div>
</body>
</html>

<style>
    .header {
        width: 99%; margin: 0 auto; background-color: #74b9ff; font-size: 40px; text-align: center; color: white; font-family: Impact, Charcoal, sans-serif; 
        padding-top: 20px; padding-bottom: 20px; margin-top: 20px
    }

</style>