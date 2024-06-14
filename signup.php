<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/version1/main.css" />  <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->


    <title>REGISTERATION PAGE</title>
  </head>

<body>
    <div class="navbar"></div>
    <div class="header-container">
      <nav class="navigation-menu">
        <div class="navigation-menu">
          <div class="welcome-text">Welcome to UniLogue - Your Project Diary</div>
        </div>
                <li><a href="/version1/index.php" class="nav-item">HOME</a></li>
                <li><a href="/version1/about.php"class="nav-item">Dashboard</a></li>  <!---This page tells more about what exactly is Vizha and its details-->
                <li><a href="/version1/wireframe_unilogue.pdf" class="nav-item">Wireframe</a></li><!---The PDF which will showcase the wireframe of the website-->
         
            <?php
            // Check if the customer is logged in
            if (isset($_SESSION['customer_forename'])) {
                $customerName = $_SESSION['customer_forename'];
                ?>
                <li><a href="dashboard.php" class="nav-item">Hello, <?php echo $customerName; ?></a></li>
                <li><a href="logout.php?redirectUrl=<?php echo urlencode('/version1/hello.php'); ?>" class="nav-item">Logout</a></li>
                <?php
            } else {
                // Display login and register buttons if the customer is not logged in
                ?>
                <li><a href="login.php?redirectUrl=<?php echo urlencode('/version1/index.php'); ?>" class="nav-item">LOGIN</a></li>
                <li><a href="signup.php" class="nav-item">REGISTER</a></li>
                <?php
            }
            ?>
</li>
<div class="theme-switch-wrapper">
          <label class="theme-switch" for="checkbox">
    <input type="checkbox" id="checkbox" />
    <div class="slider round"></div>
</label>        
</div>
      </nav>
    </div>

            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>

        <div class="dropdown_menu">
                 <li><a href="/version1/index.php">HOME</a></li>
                <li><a href="/version1/dashboard.php">BOOKINGS</a></li>
                <li><a href="/version1/wireframe_unilogue.pdf">WIREFRAMES</a></li>
          <?php
// Check if the customer is logged in
if (isset($_SESSION['customer_forename'])) {
    $customerName = $_SESSION['customer_forename'];
    ?>
    <li><a href="/version1/hello.php" class="action_btn">Hello, <?php echo htmlspecialchars($customerName); ?></a></li>
    <li><a href="/version1/logout.php?redirectUrl=<?php echo urlencode('/version1/index.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/version1/login.php?redirectUrl=<?php echo urlencode('/version1/signup.php'); ?>" class="action_btn">LOGIN</a></li>
    <li><a href="/version1/signup.php" class="action_btn">REGISTER</a></li>
    <?php
}
?>
        </div>
    </header>
    

    <div class="signup">
        <h2 class="sign2">REGISTRATION FOR UNILOGUE</h2>
        <?php
        require_once("dbconn.php");
        use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';

        session_start();
        $errorMessage = "";
        $otpSent = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
            $studentForename = $_POST["student_forename"] ?? '';
            $studentSurname = $_POST["student_surname"] ?? '';
            $studentEmail = $_POST["student_email"] ?? '';
            $dateOfBirth = $_POST["date_of_birth"] ?? '';
            $password = $_POST["password"] ?? '';


            // Perform basic validation
            if (empty($studentForename) || empty($studentSurname) || empty($studentEmail) || empty($dateOfBirth) || empty($password)) {
                $errorMessage = "All fields are required.";
            } elseif (!filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
                $errorMessage = "Invalid email format.";
            } elseif (strtotime($dateOfBirth) > strtotime('-18 years')) {
                $errorMessage = "You must be 18 years or older to register.";
            } elseif (strlen($password) < 12 || !preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) || !preg_match('@[0-9]@', $password) || !preg_match('@[^\w]@', $password)) {
                $errorMessage = "Password requirements not met.";
            } else {

                // Check if the email already exists in the database
                 $checkEmailQuery = "SELECT student_email FROM students WHERE student_email = ?";
                $stmt = $conn->prepare($checkEmailQuery);
                $stmt->bind_param("s", $studentEmail);
                $stmt->execute();
                $result = $stmt->get_result();


                if ($result->num_rows > 0) {
                    $errorMessage = "This email is already registered.";
                } else {
                    $otp = rand(100000, 999999);
                    $mail = new PHPMailer(true);
                    try {

//Server settings
$mail->SMTPDebug = 0;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'vizhaevents.LTD@gmail.com';                     //SMTP username
$mail->Password   = 'gkxriypnijhdywat';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        // Recipients
                        $mail->setFrom('noreply@Unilogue.com', 'UniLogue');
                        $mail->addAddress($studentEmail, $studentForename);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Your One-Time Password (OTP) for Accessing "UniLogue"';
                        $mail->Body = "<h1>Your OTP</h1><p>Your One-Time Password (OTP) for accessing UniLogue is: <strong>$otp</strong></p>";
                        $mail->AltBody = "Your OTP for accessing UniLogue is: $otp";

                         $mail->send();
                        echo 'OTP has been sent to your email.';
                        $otpSent = true;
                        $_SESSION['otp'] = $otp;
                        $_SESSION['user_info'] = array(
                            'forename' => $studentForename,
                            'surname' => $studentSurname,
                            'email' => $studentEmail,
                            'dob' => $dateOfBirth,
                            'password' => $password // Store encrypted/hashed password instead
                        );

                    } catch (Exception $e) {
                        $errorMessage = "Mail error: {$mail->ErrorInfo}";
                    }
                }
                $stmt->close();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['entered_otp'] ?? '';

    if ($entered_otp == $_SESSION['otp']) {
        // Retrieve user data from session
        $userInfo = $_SESSION['user_info'];
        $hashedPassword = password_hash($userInfo['password'], PASSWORD_DEFAULT);

        // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO students (password_hash, student_forename, student_surname, student_email, date_of_birth) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $hashedPassword, $userInfo['forename'], $userInfo['surname'], $userInfo['email'], $userInfo['dob']);

        // Execute the query
if ($stmt->execute()) {
    echo 'OTP verified. Registration successful.';
    // Clear the session data
    unset($_SESSION['otp'], $_SESSION['user_info']);
    
    // Set the user's forename in the session
    $_SESSION['student_forename'] = $userInfo['forename'];
    
    // Redirect to the home page
    header('Location: index.php');
    exit; // It's important to call exit after a redirection header
} else {
    $errorMessage = "Error: " . $stmt->error;
}        $stmt->close();
    } else {
        $errorMessage = 'Incorrect OTP.';
    }
}
        ?>

        <!-- Display error message if any -->
        <?php if (!empty($errorMessage)) : ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <?php if (!$otpSent) : ?>
            <form class="signupForm" action="signup.php" method="post">
                <label for="student_forename">Forename:</label>
                <input type="text" name="student_forename" required>
                <br>
                <label for="student_surname">Surname:</label>
                <input type="text" name="student_surname" required>
                <br>
                <label for="student_email">Email:</label>
                <input type="email" name="student_email" required>
                <br>
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" required>
                <br>
                <label for="password">Password:</label>
<input type="password" name="password" required id="password">
<div class="password-guidelines" id="passwordGuidelines">
    Password must be at least 12 characters[ 0long and include at least one uppercase letter, one lowercase letter, one number, and one special character.
</div>
                <input type="submit" name="signup" value="Signup">
            </form>
        <?php endif; ?>

        <?php if ($otpSent) : ?>
            <form action="signup.php" method="post">
                <label for="entered_otp">Enter OTP:</label>
                <input type="text" name="entered_otp" required>
                <input type="submit" name="verify_otp" value="Verify OTP">
            </form>
        <?php endif; ?>
    </div>
<script src="/version1/main.js"></script><!---Javascript for styling menu bar-->

</body>
</html>