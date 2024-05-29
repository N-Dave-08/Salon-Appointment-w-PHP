<?php

class Home extends Controller
{
    protected $errors;

    public function index()
    {

        $this->view('home/index');
    }

    public function register()
    {
        $errors = [];
        $userModel = new User();

        if (isset($_POST['register'])) {
            $data = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'number' => $_POST['phone'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'conpass' => $_POST['conpass']
            ];

            if ($userModel->validate($data)) {
                if($userModel->validatePasswordStrength($_POST['password'])){
                unset($data['conpass']);

                $userModel->insert($data);
                $errors[] = 'Email registered';
                } else {
                    $errors[] = 'password must be at least 8 characters, one uppercase, one lowercase, one number';
                }
            } else {
                $errors = array_merge($errors, $userModel->getErrors());
            }
        }

        $this->view('home/register', ['errors' => $errors]);
    }

    public function login()
    {
        $errors = [];
        $userModel = new User();

        if (isset($_POST['login'])) {
            $data = [
                'fill-up' => htmlspecialchars(trim($_POST['fill-up'])),
                'password' => htmlspecialchars(trim($_POST['password']))
            ];

            if ($userModel->validateLogin($data)) {
                $fill = $data['fill-up'];
                $password = $data['password'];

                $row = $userModel->where(filter_var($fill, FILTER_VALIDATE_EMAIL) ? ['email' => $fill] : ['number' => $fill]);

                if (!empty($row)) {
                    $hashedPassword = $row[0]->password; 

                    // Verify password
                    if ($password === $hashedPassword) {
                        $_SESSION['firstname'] = $row[0]->firstname;
                        $_SESSION['user_id'] = $row[0]->id;
                        redirect('client');
                    } else {
                        $errors[] = 'Wrong password';
                    }
                } else {
                    $errors[] = 'You have not registered yet';
                }
            } else {
                $errors = array_merge($errors, $userModel->getErrors());
            }
        }

        $this->view('home/login', ['errors' => $errors]);
    }

    public function asAdmin()
    {
        $errors = [];
        $adminModel = new Admins;

        if (isset($_POST['login'])) {
            $data = [
                'fill-up' => htmlspecialchars(trim($_POST['fill-up'])),
                'password' => htmlspecialchars(trim($_POST['password']))
            ];

            if ($adminModel->validateLogin($data)) {
                $fill = $data['fill-up'];
                $password = $data['password'];

                $row = $adminModel->where(['admin_name' => $fill]);

                if (!empty($row)) {
                    $AdminPassword = $row[0]->admin_password;

                    if ($password === $AdminPassword) {
                        $_SESSION['admin'] = $row[0]->admin_name;
                        $_SESSION['admin_id'] = $row[0]->id;

                        redirect('admin/dashboard');
                    } else {
                        $errors[] = 'Wrong password';
                    }
                } else {
                    $errors[] = 'No existing admin in the database';
                }
            } else {
                $errors = array_merge($errors, $adminModel->getErrors());
            }
        }

        $this->view('home/asAdmin', ['errors' => $errors]);
    }


    public function about()
    {

        $this->view('home/about');
    }

    public function reviews()
    {
        $userModel = new User;
        $reviews = new Reviews;
        $clients = $userModel->findAll();
        $reviews = $reviews->findAll();

        foreach ($reviews as $review) {
            foreach ($clients as $client) {
                if ($client->id === $review->user_id) {
                    $review->email = $client->email;
                }
            }
        }

        $this->view('home/reviews', ['reviews' => $reviews, 'clients' => $clients]);
    }
}
