<?php

class Admin extends Controller
{
  protected $session;

  public function index()
  {
    $this->session();
    $this->view('admin/index', $this->session);
  }

  public function session()
  {
    if (!empty($_SESSION['admin'] && $_SESSION['admin_id'])) {
      $this->session['admin'] = $_SESSION['admin'];
    } else {
      redirect('home');
    }
  }

  // CUSTOMERS
  public function users()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;


    $x = new User();
    $rows = $x->findAll();

    $this->view('admin/users/index', ['users' => $rows, 'uname' => $uname, 'picture' => $picture], $this->session);
  }
  public function create()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $x = new User();

    if (isset($_POST['create'])) {

      $arr['firstname'] = $_POST['firstname'];
      $arr['lastname'] = $_POST['lastname'];
      $arr['number'] = $_POST['phone'];
      $arr['email'] = $_POST['email'];
      $arr['password'] = $_POST['password'];

      $x->insert($arr);

      redirect('admin/users');
    }

    $this->view('admin/users/create', ['uname' => $uname, 'picture' => $picture], $this->session);
  }
  public function edit()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $x = new User();

    if (isset($_POST['btnedit'])) {
      $id['id'] = $_POST['editid'];
      $rows = $x->where($id);

      $this->view('admin/users/edit', ['users' => $rows, 'uname' => $uname, 'picture' => $picture], $this->session);
    }

    if (isset($_POST['update'])) {
      $id = $_POST['id'];
      $arr['firstname'] = $_POST['firstname'];
      $arr['lastname'] = $_POST['lastname'];
      $arr['number'] = $_POST['phone'];
      $arr['email'] = $_POST['email'];
      $arr['password'] = $_POST['password'];

      $x->update($id, $arr);

      redirect('admin/users');
    }
  }

  public function remove()
  {
      $user = new User();
  
      if (isset($_POST['delete'])) {
          $id = $_POST['deleteid'];
          $user->remove($id);
      }
  
      $rows = $user->findAll();
  
      $this->view('admin/users/remove', ['users' => $rows]);
  
      redirect('admin/users');
  }

  // SERVICES
  public function services()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $x = new Service();
    $rows = $x->findAll();

    $this->view('admin/services/index', ['services' => $rows, 'uname' => $uname, 'picture' => $picture], $this->session);
  }
  public function add()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $image = new Image;
    $x = new Service();

    if (isset($_POST['add'])) {

      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $image->uploadImage('image', 'uploads/');
      } else {
        // die('failed to upload');
      }

      $arr['name'] = $_POST['name'];
      $arr['description'] = $_POST['desc'];
      $arr['price'] = $_POST['price'];
      $arr['image'] = $imagePath ?? '';

      $x->insert($arr);

      redirect('admin/services');
    }

    $this->view('admin/services/add', ['uname' => $uname, 'picture' => $picture], $this->session);
  }
  public function alter()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $image = new Image;
    $x = new Service();

    if (isset($_POST['btnalter'])) {
      $id['id'] = $_POST['editid'];
      $rows = $x->where($id);

      $this->view('admin/services/alter', ['services' => $rows, 'uname' => $uname, 'picture' => $picture], $this->session);
    }

    if (isset($_POST['alter'])) {

      if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $image->uploadImage('picture', 'new_uploads/');
      } elseif (isset($_POST['remove_picture'])) {
        $imagePath = '';
      } else {
        $rows = $x->where(['id' => $id]);
        $imagePath = $rows[0]->image;
      }

      $id = $_POST['id'];
      $arr['name'] = $_POST['name'];
      $arr['description'] = $_POST['desc'];
      $arr['price'] = $_POST['price'];
      $arr['image'] = $imagePath !== '' ? $imagePath : ($_POST['image'] ?? '');

      $x->update($id, $arr);

      redirect('admin/services');
    }
  }

  public function erase()
  {
    $x = new Service();

    if (isset($_POST['erase'])) {
      $id = $_POST['eraseid'];
      $service = $x->where(['id' => $id]);
      if (!empty($service)) {

        $x->delete($id);
      } else {
        die("Service not found.");
      }
    }

    redirect('admin/services');
  }


  public function bookings()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $bookings = new Bookings;
    $bookings = $bookings->findAll();

    $users = new User;
    $clients = $users->findAll();

    if (!empty($bookings)) {
      foreach ($bookings as &$booking) {
        foreach ($clients as $client) {
          if ($client->id == $booking->user_id) {
            $booking->firstname = $client->firstname;
            $booking->number = $client->number;
            break;
          }
        }
      }

      usort($bookings, function ($a, $b) {
        return strtotime($a->book_date) - strtotime($b->book_date);
      });
    }



    $this->view('admin/bookings/index', ['bookings' => $bookings, 'clients' => $clients, 'uname' => $uname, 'picture' => $picture], $this->session);
  }

  public function modify()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $bookings = new Bookings;
    $users = new User;

    if (isset($_POST['modify'])) {

      $id = $_POST['bookings_id'];
      $bookings = $bookings->where(['id' => $id]);

      $clients = $users->findAll();
      foreach ($bookings as &$booking) {
        foreach ($clients as $client) {
          if ($client->id == $booking->user_id) {
            $booking->firstname = $client->firstname;
            $booking->number = $client->number;
            break;
          }
        }
      }
      $this->view('admin/bookings/modify', ['bookings' => $bookings, 'clients' => $clients, 'uname' => $uname, 'picture' => $picture], $this->session);
    }

    if (isset($_POST['btnmodify'])) {
      $id = $_POST['bookings_id'];
      $arr['book_transaction'] = $_POST['transaction'];
      $arr['book_status'] = $_POST['status'];

      $bookings->update($id, $arr);

      redirect('admin/bookings');
    }
  }

  // DASHBOARD
  public function dashboard()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $bookingsModel = new Bookings;

    // CHART
    $q = "SELECT book_name, COUNT(*) AS booking_count FROM bookings GROUP BY book_name";
    $serviceBookings = $bookingsModel->query($q);
    // show($serviceBookings);

    $labels = [];
    $values = [];

    if (!empty($serviceBookings)) {
      foreach ($serviceBookings as $booking) {
        $labels[] = $booking->book_name;
        $values[] = $booking->booking_count;
      }
    }


    $chartData = [
      'labels' => $labels,
      'values' => $values
    ];

    // DIPLSAY TRANSACTION
    $allbookings = $bookingsModel->findAll();

    // NUMBER OF CLIENTS
    $user = new User;
    $users = $user->findAll();

    // REVIEW
    $reviews = new Reviews;
    $reviews = $reviews->findAll();

    foreach ($reviews as $review) {
      foreach ($users as $user) {
        if ($user->id === $review->user_id) {
          $review->email = $user->email;
        }
      }
    }

    $this->view('admin/dashboard/index', ['chartData' => $chartData, 'allbookings' => $allbookings, 'users' => $users, 'reviews' => $reviews, 'uname' => $uname, 'picture' => $picture], $this->session);
  }

  // SETTINGS
  public function settings()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;


    $admin = new Admins;

    $adminId = $_SESSION['admin_id'];
    $adminData = $admin->where(['id' => $adminId]);

    $username = $adminData[0]->admin_name;
    $password = $adminData[0]->admin_password;

    $this->view('admin/settings/index', ['admin_id' => $adminId, 'username' => $username, 'password' => $password, 'uname' => $uname, 'picture' => $picture], $this->session());
  }

  public function admin_edit()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $image = new Image;
    $admin = new Admins;

    $adminId = $_SESSION['admin_id'];
    $adminData = $admin->where(['id' => $adminId]);

    $username = $adminData[0]->admin_name;
    $password = $adminData[0]->admin_password;

    if (isset($_POST['update'])) {
      if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $imagePath = $image->uploadImage('picture', 'profiles/');
      } elseif (isset($_POST['remove_picture'])) {
        $imagePath = ''; // Remove picture
      } else {
        $imagePath = $adminData[0]->admin_picture;
      }

      $arr['admin_name'] = $_POST['username'];
      $arr['admin_password'] = $_POST['password'];
      $arr['admin_picture'] =  $imagePath !== '' ? $imagePath : ($_POST['picture'] ?? '');

      $admin->update($adminId, $arr);

      redirect('admin/settings');
    }

    $this->view('admin/settings/admin_edit', ['admin_id' => $adminId, 'username' => $username, 'password' => $password, 'uname' => $uname, 'picture' => $picture], $this->session);
  }

  public function admin_table()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $admin = new Admins;

    $admins = $admin->findAll();

    $this->view('admin/settings/admin_table', ['admins' => $admins, 'uname' => $uname, 'picture' => $picture], $this->session);
  }

  public function admin_add()
  {
    $this->session();

    $admin = new Admins;

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    if (isset($_POST['add_admin'])) {
      $arr['admin_name'] = $_POST['username'];
      $arr['admin_password'] = $_POST['password'];

      $admin->insert($arr);

      redirect('admin/admin_table');
    }

    $this->view('admin/settings/admin_add', ['uname' => $uname, 'picture' => $picture], $this->session);
  }

  public function admin_alter()
  {
    $this->session();

    $adminId = $_SESSION['admin_id'];
    $adminModel = new Admins;
    $adminData = $adminModel->where(['id' => $adminId]);
    $uname = $adminData[0]->admin_name;
    $picture = $adminData[0]->admin_picture;

    $admin = new Admins;

    if (isset($_POST['btnedit'])) {
      $adminId = $_POST['editid'];
      $adminData = $admin->where(['id' => $adminId]);
      $adminId = $adminData[0]->id;
      $username = $adminData[0]->admin_name;
      $password = $adminData[0]->admin_password;

      $this->view('admin/settings/admin_alter', ['admin_id' => $adminId, 'username' => $username, 'password' => $password, 'uname' => $uname, 'picture' => $picture], $this->session);
    }

    if (isset($_POST['updateadmin'])) {
      $adminId = $_POST['admin_id'];
      $arr['admin_name'] = $_POST['username'];
      $arr['admin_password'] = $_POST['password'];

      $admin->update($adminId, $arr);

      redirect('admin/admin_table');
    }
  }

  public function admin_remove()
  {
    $this->session();

    $admin = new Admins;
    if (isset($_POST['remove'])) {
      $adminId = $_POST['removeid'];
      $admin->delete($adminId);

      redirect('admin/admin_table');
    }
  }

  // IMAGE

}
