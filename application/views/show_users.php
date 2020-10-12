<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col mt-0 pt-0" style="height: 90vh;">
        <div class="header">
            Users
        </div>
        <div class="justify-content-end">
            <a href="<?=base_url('login/logout') ?>">Log out</a>
        </div>
        <div class="row align-items-center" style="height: 50%">
            <div class="container">
                <div class="row py-3" style="background-color: #ba68c8; color: white; font-size: 18px">
                    <div class="col">ID</div>
                    <div class="col">NAME</div>
                    <div class="col">EMAIL</div>
                    <div class="col">PASSWORD</div>
                </div>
                    <?php 
                        foreach ( $registers as $new_arr ) {
                            echo '<div class="row py-1">';
                                foreach ( $new_arr as $key => $val ) {
                                    if($val){
                                        echo'<div class="col">';
                                            echo $val; 
                                        echo '</div>';
                                    }
                                } 
                            echo '</div>';
                        }
                    ?>
            </div>
        </div>
        
    </div>
</body>
</html>

<script>
    function goToRegister() {
        console.log("Hi");
    }
</script>

<style>
    .header {
        width: 99%; margin: 0 auto; background-color: #66bb6a; font-size: 40px; text-align: center; color: white; font-family: Impact, Charcoal, sans-serif; 
        padding-top: 20px; padding-bottom: 20px; margin-top: 20px
    }

</style>