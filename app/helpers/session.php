
<?php 

function session($user_id,$user_name) {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_name'] = $user->userName;
}
?>