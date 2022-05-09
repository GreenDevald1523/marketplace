<?php
    class User
    {
        public $email;
        public $fio;
        public $password;

        public function __construct($_email, $_password, $_fio)
        {
            $this->email = $_email;
            $this->fio = $_fio;
            $this->password = $_password;
        }
    }


    $fio = $_POST['exampleFormControlInputFIO'];
    $email = $_POST['exampleFormControlInputMail'];
    $password = $_POST['exampleFormControlPasswordF'];
    $passwordcheck = $_POST['exampleFormControlPasswordS'];
    
    
    //
    // mistery
    $fio = htmlspecialchars($fio);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $passwordcheck = htmlspecialchars($passwordcheck);

    $fio = urldecode($fio);
    $email = urldecode($email);
    $password = urldecode($password);
    $passwordcheck = urldecode($passwordcheck);

    $fio = trim($fio);
    $email = trim($email);
    $password = trim($password);
    $passwordcheck = trim($passwordcheck);
    // mistery
    //


    if ($passwordcheck == $password)
    {
        $get = file_get_contents('tUser.txt');
        $num = unserialize($get);    
    
        $newUser = new User($email, $password, $fio);
    
        $succes = true;
        foreach ($num as $user) {
            if ($newUser->email == $user->email)
                $succes = false;
                break;
        }
        if ($succes)
        {
            $num[] = $newUser;
            $adding = serialize($num);
            file_put_contents('tUser.txt', $adding);
        }
    }
?>