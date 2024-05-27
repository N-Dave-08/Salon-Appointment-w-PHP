<?php
class Client extends Controller
{
    public function __construct()
    {
        if (empty($_SESSION['user_id'])) {
            redirect('home');
        }
    }

    protected function getUserData()
    {
        $userId = $_SESSION['user_id'];
        $userModel = new User;
        return $userModel->where(['id' => $userId])[0];
    }

    protected function infoView($view, $data = [])
    {
        $userData = $this->getUserData();
        $data['userId'] = $userData->id;
        $data['picture'] = $userData->picture;
        $data['firstname'] = $userData->firstname;
        $data['lastname'] = $userData->lastname;
        $data['email'] = $userData->email;
        $this->view($view, $data);
    }

    public function index()
    {
        $this->infoView('client/index');
    }

    public function book()
    {
        $serviceModel = new Service;
        $services = $serviceModel->findAll();
        $this->infoView('client/book/index', ['services' => $services]);
    }

    public function schedule()
    {
        $serviceModel = new Service;
        $selected_service = null;

        if (isset($_POST['selected_service_id'])) {
            $selected_service_id = $_POST['selected_service_id'];
            $selected_service = $serviceModel->where(['id' => $selected_service_id])[0];
        }

        $this->infoView('client/book/schedule', [
            'selected_service' => $selected_service,
        ]);
    }

    public function confirm()
    {
        $errors = [];
        $success = [];

        $booking_data = [
            'image' => $_POST['image'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'date' => $_POST['date'],
            'time' => $_POST['time'],
            'payment' => $_POST['payment']
        ];

        list($start_time, $end_time) = explode('-', $_POST['time']);
        $start_time = date("h:i A", strtotime($start_time));
        $end_time = date("h:i A", strtotime($end_time));

        if (isset($_POST['confirm'])) {
            $bookingModel = new Bookings;
            $existingBooking = $bookingModel->where([
                'book_date' => $_POST['date'],
                'book_s_time' => $start_time,
                'book_e_time' => $end_time,
                'user_id' => $_SESSION['user_id']
            ]);

            if (!empty($existingBooking)) {
                $errors = 'You already have an appointment at this date and time. Please book another.';
            } else {
                $arr = [
                    'user_id' => $_SESSION['user_id'],
                    'book_name' => $_POST['name'],
                    'book_price' => $_POST['price'],
                    'book_image' => $_POST['image'],
                    'book_date' => $_POST['date'],
                    'book_s_time' => $start_time,
                    'book_e_time' => $end_time,
                    'book_payment' => $_POST['payment'],
                    'book_transaction' => ($_POST['payment'] === 'Cash') ? 'Not Paid' : '',
                    'book_status' => 'Pending'
                ];

                $bookingModel->insert($arr);
                $success = 'Booking Successful!';
            }
        }
        $this->infoView('client/book/confirm', [
            'booking_data' => $booking_data,
            'start' => $start_time,
            'end' => $end_time,
            'errors' => $errors,
            'success' => $success
        ]);
    }

    public function success()
    {
        $this->infoView('client/book/success');
    }

    public function details()
    {
        $bookingsModel = new Bookings;
        $userModel = new User;

        $id = $_POST['bookings_id'];
        $booking = $bookingsModel->where(['id' => $id])[0];
        $client = $userModel->where(['id' => $booking->user_id])[0];

        $booking->firstname = $client->firstname;
        $booking->lastname = $client->lastname;
        $booking->number = $client->number;

        $this->infoView('client/book/details', [
            'bookings' => [$booking]
        ]);
    }

    public function mybookings()
    {
        $bookingsModel = new Bookings;
        $userBookings = $bookingsModel->where(['user_id' => $_SESSION['user_id']]);

        $this->infoView('client/mybookings/index', ['userBookings' => $userBookings]);
    }

    public function cancel()
    {
        if (isset($_POST['cancel'])) {
            $bookingsModel = new Bookings;
            $id = $_POST['cancelid'];
            $bookings = $bookingsModel->where(['id' => $id, 'user_id' => $_SESSION['user_id']]);

            if (!empty($bookings)) {
                $booking = reset($bookings);
                if ($booking) {
                    $bookingsModel->delete($booking->id);
                }
            }
            redirect('client/mybookings');
        }
    }

    public function profile()
    {
        $userData = $this->getUserData();
        $this->infoView('client/profile/index', [
            'lastname' => $userData->lastname,
            'number' => $userData->number,
            'email' => $userData->email,
            'password' => $userData->password
        ]);
    }

    public function edit_profile()
    {
        $userModel = new User;
        $image = new Image;

        if (isset($_POST['edit_profile'])) {
            $userData = $this->getUserData();
            $this->infoView('client/profile/edit_profile', [
                'lastname' => $userData->lastname,
                'number' => $userData->number,
                'email' => $userData->email,
                'userId' => $userData->id
            ]);
        }

        if (isset($_POST['update_profile'])) {

            if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                $imagePath = $image->uploadImage('picture', 'profiles/');
            } elseif (isset($_POST['remove_picture'])) {
                $imagePath = ''; // Remove picture
            } else {
                $userData = $this->getUserData();
                $imagePath = $userData->picture;
            }


            $arr = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'number' => $_POST['number'],
                'email' => $_POST['email'],
                'picture' => $imagePath !== '' ? $imagePath : ($_POST['image'] ?? '')
            ];

            $userModel->update($_POST['user_id'], $arr);
            redirect('client/profile');
        }
    }

    public function password()
    {
        $userModel = new User;
        $userData = $this->getUserData();
        $errors = [];
        $success = [];

        if (isset($_POST['update_pass'])) {
            $currentPass = htmlspecialchars(trim($_POST['current_pass']));
            $newPass = htmlspecialchars(trim($_POST['new_pass']));
            $retryPass = htmlspecialchars(trim($_POST['retry_pass']));

            // empty fields
            if (empty($currentPass)) {
                $errors[] = 'Current password is required';
            }

            if (empty($newPass)) {
                $errors[] = 'New password is required';
            }

            if (empty($retryPass)) {
                $errors[] = 'Re-try password is required';
            }

            if (empty($errors)) {
                if ($currentPass !== $userData->password) {
                    $errors[] = 'Current password do not match';
                } else {
                    if ($newPass === $retryPass) {
                        if ($userModel->validatePasswordStrength($newPass)) {
                            $userModel->update($_SESSION['user_id'], ['password' => $newPass]);
                            $success[] = 'Password has been changed';
                        } else {
                            $errors[] = 'New password must be at least 8 characters, one uppercase, one lowercase, one number';
                        }
                    } else {
                        $errors[] = 'Re-try password do not match';
                    }
                }
            }
        }

        $this->infoView('client/profile/password', [
            'errors' => $errors,
            'success' => $success
        ]);
    }

    public function reviews()
    {
        $reviewsModel = new Reviews;
        $userModel = new User;

        $rowRating = $reviewsModel->where(['user_id' => $_SESSION['user_id']]);

        if (isset($_POST['rating'])) {
            if (!empty($rowRating)) {
                header('Content-Type: application/json');
                echo json_encode(['alreadySubmitted' => true]);
                exit();
            } else {
                $arr = [
                    'review' => $_POST['review'],
                    'rating' => $_POST['rating'],
                    'user_id' => $_SESSION['user_id']
                ];
                $reviewsModel->insert($arr);
                header('Content-Type: application/json');
                echo json_encode(['success' => true]);
                exit();
            }
        }

        $reviews = $reviewsModel->findAll();
        $clients = $userModel->findAll();

        foreach ($reviews as $review) {
            foreach ($clients as $client) {
                if ($client->id === $review->user_id) {
                    $review->email = $client->email;
                }
            }
        }

        $this->infoView('client/reviews/index', [
            'reviews' => $reviews,
            'clients' => $clients
        ]);
    }

    public function calendar()
    {
        $bookingsModel = new Bookings;
        $events = [];

        $bookings = $bookingsModel->where(['user_id' => $_SESSION['user_id']]);
        if (!empty($bookings)) {
            foreach ($bookings as $booking) {
                $events[] = [
                    'title' => $booking->book_name . "<br>" . date("h:i A", strtotime($booking->book_s_time)) . '-' . date("h:i A", strtotime($booking->book_e_time)),
                    'start' => $booking->book_date
                ];
            }
        }


        $this->infoView('client/calendar/index', ['events' => $events]);
    }
}
