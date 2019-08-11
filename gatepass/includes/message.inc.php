<?php  
    if (!empty($_GET['msg'])) {
        $sg = $_GET['msg'];
        switch ($sg) {
            case 'rejected':
                $message = 'Leave rejected!';
                $type = 'danger';
                break;
            case 'approved':
                $message = 'Leave approved successfully.';
                $type = 'success';
                break;
            case 'requested-successfully':
                $message = 'Leave requested successfully.';
                $type = 'success';
                break;
            case 'changed':
                $message = 'Password changed successfully.';
                $type = 'success';
                break;
            case 'sucs':
                $message = 'Reset link sent, check your email.';
                $type = 'info';
                break;
            case 'mob':
                $message = 'Invalid mobile number, try again.';
                $type = 'warning';
                break;
            case 'empty':
                $message = 'Empty field(s), try again.';
                $type = 'warning';
                break;
            case 'invalid':
                $message = 'Invalid input, try again.';
                $type = 'warning';
                break;
            case 'email':
                $message = 'Invalid email, try again.';
                $type = 'warning';
                break;
            case 'error':
                $message = 'Invalid login credentials.';
                $type = 'danger';
                break; 
            case 'failed':
                $message = 'Some error occured. Try again.';
                $type = 'danger';
                break; 
            case 'uidtaken':
                $message = 'Username or email taken. Try another one.';
                $type = 'warning';
                break;
            case 'success':
                $message = 'Logged in successfully.';
                $type = 'success';
                break;
            case 's-success':
                $message = 'Signup succesful, try logging in.';
                $type = 'primary';
                break;
            case 'update':
                $message = 'Profile updated succesfully.';
                $type = 'success';
                break;
            case 'logout':
                $message = 'Logged out successfully.';
                $type = 'info';
                break;
        }
    }