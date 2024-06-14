<?php
session_start();
require_once("dbconn.php");

// Redirect if already logged in
if (isset($_SESSION['student_forename'])) {
    header('Location: dashboard.php');
    exit();
}

$defaultRedirectUrl = 'dashboard.php'; // Default redirect if none specified or if there's an error
$redirectUrl = $defaultRedirectUrl;

if (isset($_GET['redirectUrl'])) {
    $redirectUrl = filter_var($_GET['redirectUrl'], FILTER_SANITIZE_URL);
    if (filter_var($redirectUrl, FILTER_VALIDATE_URL) === false || !str_contains($redirectUrl, 'KF7029-test/content/')) {
        $redirectUrl = $defaultRedirectUrl; // Fallback to default if URL is not valid or not part of the site
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute SQL query
    $sql = "SELECT studentID, password_hash, student_forename FROM students WHERE student_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password_hash"])) {
            $_SESSION["studentID"] = $user["studentID"];
            $_SESSION['student_forename'] = $user["student_forename"];

            header("Location: " . $redirectUrl); // Use the sanitized/validated URL
            exit();
        } else {
            $errorMessage = "Incorrect password. Please try again.";
        }
    } else {
        $errorMessage = "Username not found. Please check your credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/version1/main.css" />  <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->

    <title>UniLogue</title>  <!---Title of this page-->
  </head>
  <body>
    <div class="navbar"></div>
    <div class="header-container">
      <nav class="navigation-menu">
        <div class="navigation-menu">
          <div class="welcome-text">Welcome to UniLogue - Your Project Diary</div>
        </div>
                <li><a href="/version1/index.php" class="nav-item">Home</a></li>  <!---The main home page with the navigation area-->
                <li><a href="/version1/dashboard.php"class="nav-item">Dashboard</a></li>  <!---This page tells more about what exactly is Vizha and its details-->
                <li><a href="/version1/wireframe_unilogue.pdf" class="nav-item">Wireframe</a></li><!---The PDF which will showcase the wireframe of the website-->
                <li><a href="/version1/credits.php"class="nav-item">Credits</a></li><!---This page showcases the credits for this website-->
                <!---This page answers all the questions which a new customer might have upon seeing our website-->
                    <?php
            // To Check if the customer is logged in
            if (isset($_SESSION['student_forename'])) {
                $studentName = $_SESSION['student_forename'];
                ?>
                <li><a href="/version1/hello.php" class="nav-item">Hello, <?php echo $customerName; ?></a></li> <!---If a customer is already logged in the nav bar will show the first name of the customer on top of the screen-->
                <li><a href="logout.php?redirectUrl=<?php echo urlencode('/KF7029-test/content/index.php'); ?>" class="nav-item">Logout</a></li><!--if a customer is logged in the nav bar will show the logout option--->
                <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
                <li><a href="/version1/login.php?redirectUrl=<?php echo urlencode('/KF7029-test/content/index.php'); ?>" class="nav-item">Login</a></li><!---A login page that will allow users to log onto and use the website-->
                <li><a href="/version1/signup.php" class="nav-item">Register</a></li><!---The customer registration page which allows to insert a new customer’s details into the customers table in the database-->
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
                <i class="fa-solid fa-bars"></i> <!---Styling of menu button for mobile view-->
            </div>
</div>
        </nav>

        <div class="dropdown_menu"><!---Nav bar section for responsiveness on other devices/screens-->
            <<li><a href="/KF7029-test/content/index.php">HOME</a></li>  <!---The main home page with the navigation area-->
                <li><a href="/KF7029-test/content/about.php">ABOUT</a></li>  <!---This page tells more about what exactly is Vizha and its details-->
                <li><a href="/KF7029-test/content/events.php">EVENTS</a></li>  <!---The event listing page which links to the events table in the database and displays the contents of the events table in a suitable usable format, Further it has buttons which will redirect the customer to the events details page where the booking form is integrated-->
                <li><a href="/KF7029-test/content/dashboard.php">BOOKINGS</a></li><!---The dashboard for the user to  check their bookings-->
                <li><a href="/KF7029-test/content/contactus.php">CONTACT US</a></li><!---A registered customer or a non-registered customer could use this link to contact us, this data is again stored in the contactus table in PHP-->
                <li><a href="/KF7029-test/content/wireframe.pdf">WIREFRAMES</a></li><!---The PDF which will showcase the wireframe of the website-->
                <li><a href="/KF7029-test/content/credits.php">CREDITS</a></li><!---This page showcases the credits for this website-->
                <li><a href="/KF7029-test/content/faq.php">FAQ</a></li><!---This page answers all the questions which a new customer might have upon seeing our website-->
        
          <?php
// To Check if the customer is logged in
if (isset($_SESSION['customer_forename'])) {
    $customerName = $_SESSION['customer_forename'];
    ?>
    <li><a href="/KF7029-test/content/hello.php" class="action_btn">Hello, <?php echo htmlspecialchars($customerName); ?></a></li>
    <li><a href="/KF7029-test/content/logout.php?redirectUrl=<?php echo urlencode('index.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // To Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/KF7029-test/content/login.php?redirectUrl=<?php echo urlencode('index.php'); ?>" class="action_btn">LOGIN</a></li>
    <li><a href="/KF7029-test/content/signup.php" class="action_btn">REGISTER</a></li>
    <?php
}
?>
        </div>
    </header>
        <div class="signup">
        <h2 class="sign2">Login</h2>

        <?php if (!empty($errorMessage)) : ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

<form class="signupForm" action="login.php?redirectUrl=<?= urlencode($redirectUrl) ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Login">

<input type="hidden" name="redirectUrl" value="<?= htmlspecialchars($redirectUrl) ?>">
</form>

    </div>
<script src="/KF7029-test/content/main.js"></script>

</body>
</html>