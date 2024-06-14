<?php
session_start(); // To  Start the session such that the user-specific information across multiple pages is maintained.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/version1/main.css" />
    <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->

    <title>UniLogue</title> <!---Title of this page-->
</head>

<body>
    <div class="navbar"></div>
    <div class="header-container">
        <nav class="navigation-menu">
            <div class="navigation-menu">
                <div class="welcome-text">Welcome to UniLogue - Your Project Diary</div>
            </div>
            <li><a href="/version1/index.php" class="nav-item">Home</a></li>
            <!---The main home page with the navigation area-->
            <li><a href="/version1/dashboard.php" class="nav-item">Dashboard</a></li>
            <!---This page tells more about what exactly is Vizha and its details-->
            <li><a href="/version1/wireframe_unilogue.pdf" class="nav-item">Wireframe</a></li>
            <!---The PDF which will showcase the wireframe of the website-->
            <!---This page answers all the questions which a new customer might have upon seeing our website-->
            <?php
            // To Check if the customer is logged in
            if (isset($_SESSION['student_forename'])) {
                $studentName = $_SESSION['student_forename'];
                ?>
            <li><a href="/version1/img/dashboard.php" class="nav-item">Hello,
                    <?php echo $studentName; ?>
                </a></li>
            <!---If a customer is already logged in the nav bar will show the first name of the customer on top of the screen-->
            <li><a href="logout.php?redirectUrl=<?php echo urlencode('/version1/index.php'); ?>"
                    class="nav-item">Logout</a></li>
            <!--if a customer is logged in the nav bar will show the logout option--->
            <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
            <li><a href="/version1/login.php?redirectUrl=<?php echo urlencode('/version1/index.php'); ?>"
                    class="nav-item">Login</a></li>
            <!---A login page that will allow users to log onto and use the website-->
            <li><a href="/version1/signup.php" class="nav-item">Register</a></li>
            <!---The customer registration page which allows to insert a new customer’s details into the customers table in the database-->
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
        <ul><a href="/version1/index.php">HOME</a></ul> <!---The main home page with the navigation area-->
            <li><a href="/version1/dashboard.php" class="nav-item">Dashboard</a></li>
            <li><a href="/version1/wireframe_unilogue.pdf" class="nav-item">Wireframe</a></li>

        <?php
// To Check if the customer is logged in
if (isset($_SESSION['customer_forename'])) {
    $customerName = $_SESSION['customer_forename'];
    ?>
        <li><a href="/version1/hello.php" class="action_btn">Hello,
                <?php echo htmlspecialchars($customerName); ?>
            </a></li>
        <li><a href="/version1/logout.php?redirectUrl=<?php echo urlencode('index.php'); ?>"
                class="action_btn">Logout</a></li>
        <?php
} else {
    // To Display login and register buttons if the customer is not logged in
    ?>
        <li><a href="/version1/img/login.php?redirectUrl=<?php echo urlencode('index.php'); ?>"
                class="action_btn">LOGIN</a></li>
        <li><a href="/version1/signup.php" class="action_btn">REGISTER</a></li>
        <?php
}
?>
    </div>
    </header>
    <main>
        <section> <!---poster section-->
            <div class="poster-overlay"></div>
            <video id="backgroundVideo" autoplay loop muted>
                <source id="videoSource" src="/version1/img/white.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>


            <div class="poster-overlay">
                <a href="/version1/login.php" class="get-started-btn">Get Started</a>
            </div>
            </div>
        </section>
    </main>


    <section class="eventDesc" id="ourfeatures"> <!---Below poster section-->
        <h2 class="title1">Explore our Features</h2>

        <div class="feacontainer" id="eofs">

            <div class="flex-row" id="eofs1">
                <div class="title-icon">
                    <i class="fas fa-route"></i>
                    <span>Project Navigator</span>
                </div>
                <img src="/version1/img/ProjectNavigator.jpg" alt="Project Navigator" class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-project-diagram"></i>
                    <span>Student Project Hub</span>
                </div>
                <img src="/version1/img/StudentProjectHub.jpg" alt="Student Project Hub"
                    class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-heartbeat"></i>
                    <span>Project Pulse</span>
                </div>
                <img src="/version1/img/ProjectPulse.jpg" alt="Project pulse" class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-book-open"></i>
                    <span>Academic Diary</span>
                </div>
                <img src="/version1/img/AcademicDiary.jpg" alt="Academic Diary" class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Educational Planner</span>
                </div>
                <img src="/version1/img/EducationalPlanner.jpg" alt="Educational Planner"
                    class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-sync-alt"></i>
                    <span>Project Lifecycle Manager</span>
                </div>
                <img src="/version1/img/ProjectLifecycleManager.jpg" alt="Project Lifecycle Manager"
                    class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-book"></i>
                    <span>Study Logbook</span>
                </div>
                <img src="/version1/img/StudyLogbook.jpg" alt="Study Logbook" class="icon-image">
            </div>

            <div class="flex-row" id="DivPiDK">
                <div class="title-icon">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Academic Organizer</span>
                </div>
                <img src="/version1/img/AcademicOrganizer.jpg" alt="Academic Organizer" class="icon-image">
            </div>
        </div>

    </section>
    <!--List of few upcoming Events in Vizha-->
    <section class="empowering">

        <div class="insights-section">
            <div class="text-container">
                <h1>Empower Your Dissertation Journey</h1>
            </div>
            <div class="flex-row">
                <img src="/version1/img/etc.jpg" alt="Descriptive">
                <div class="card-content">
                    <h3>Enhance Team Collaboration</h3>
                    <p>Facilitate seamless communication and collaboration among your project team with our dedicated
                        features. Share updates, documents, and feedback in real-time, ensuring everyone stays on the
                        same page.</p>
                </div>
            </div>

            <div class="flex-row">
                <img src="/version1/img/tpm.jpg" alt="Descriptive">
                <div class="card-content">
                    <h3>Tracking Progress and Milestones</h3>
                    <p>Keep your dissertation on track with our intuitive milestone tracking tools. Set deadlines,
                        monitor progress, and receive alerts as you approach important milestones. Visualize your
                        progress with interactive charts and timelines to stay motivated and on schedule.</p>
                </div>
            </div>

            <div class="flex-row">
                <img src="/version1/img/rm.jpg" alt="Descriptive">
                <div class="card-content">
                    <h3>Resource Management</h3>
                    <p>Efficiently manage all your dissertation resources in one place. Organize research materials,
                        articles, and notes with our integrated resource management system. Access everything you need
                        quickly and securely to streamline your research process.</p>
                </div>
            </div>

            <div class="flex-row">
                <img src="/version1/img/tm.jpg" alt="Descriptive">
                <div class="card-content">
                    <h3>Time Management and Scheduling</h3>
                    <p>Plan your time effectively with our advanced scheduling features. Create personalized calendars,
                        schedule research sessions and meetings, and set reminders for your dissertation tasks. Maximize
                        your productivity by balancing your academic and personal life.</p>
                </div>
            </div>

            <div class="flex-row">
                <img src="/version1/img/fr.jpg" alt="Descriptive">
                <div class="card-content">
                    <h3>Feedback and Revision Tools</h3>
                    <p>Receive and manage feedback on your dissertation draft effortlessly. Use our tools to request
                        feedback, make revisions, and track changes over time. Simplify the revision process with
                        structured feedback integration, helping you refine your work with precision.</p>
                </div>
            </div>

            <div class="flex-row">
                <img src="/version1/img/gs.jpg" alt="Descriptive">
                <div class="card-content">
                    <h3>Support and Guidance</h3>
                    <p>Never feel stuck with access to expert advice and support when you need it. Utilize our built-in
                        support system for queries related to your dissertation, including tips from experienced
                        researchers and access to online webinars and tutorials.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="eventDesc">
        <!--Venue features of Vizha-->

        <h2 class="title1">ORGANIZE your dissertation</h2>
        <div id="Organize">
            <div id="Organize2">
                <img src="/version1/img/oyd.jpg" alt="Descriptive">
            </div>
            <div id="Organize3">
                <span id="Organize4">Organize Your Dissertation Projects Efficiently</span>
                <span id="Organize5">Simplify your dissertation journey with a comprehensive project diary app. Organize
                    tasks, schedules, and resources in one place, so you can focus on writing and research.</span>
                <button id="ButtonOrganize">Learn More</button>
            </div>
        </div>
        <!-- REVOLUTIONIZING SECTION  -->

        <div class="revolution-section">
            <div class="revolution-header">
                <h2>Revolutionizing Student Project Management</h2>
                <p>"UniLogue" is the ultimate project diary manager for university students, simplifying the process of
                    tracking dissertation progress...</p>
            </div>

            <div class="image-container full-screen" id="imgcont">
                <!-- Slides -->
                <div class="slide"><img src="/version1/img/1.png" alt="1 1" class="rounded-image" /></div>
                <div class="slide"><img src="/version1/img/2.png" alt="mamam 2" class="rounded-image" />
                </div>
                <div class="slide"><img src="/version1/img/3.png" alt="mamam 3" class="rounded-image" />
                </div>
                <div class="slide"><img src="/version1/img/4.png" alt="mamam 4" class="rounded-image" />
                </div>
                <div class="slide"><img src="/version1/img/5.png" alt="mamam 5" class="rounded-image" />
                </div>
                <div class="slide"><img src="/version1/img/6.png" alt="mamam 6" class="rounded-image" />
                </div>
                <button class="slide-btn prev">&#10094;</button>
                <button class="slide-btn next">&#10095;</button>
            </div>

            <div class="signup-content">
                <p>Empowering students to manage dissertation projects efficiently.</p>
                <p>UniLogue is dedicated to providing a platform that simplifies academic project management for
                    university students. Our mission is to empower students by offering a user-friendly app that makes
                    dissertation tracking straightforward and stress-free.</p>
                <div class="email-form">
                    <input type="email" id="inputrev" placeholder="Enter your email" required>
                    <button id="revbutton">Sign Up</button>
                </div>
            </div>
        </div>
        <!-- User evaluation section -->
        <div class="usereval-section">
            <div class="text-container">
                <h1>Hear From Our User Evaluations</h1>
            </div>
            <div class="usereval-clouds">
                <div class="usereval-cloud">
                    <div class="user-image-container">
                        <img src="/version1/img/dp.jpg"
                            alt="User 1" class="user-image">
                    </div>
                    <p>Transformed my dissertation planning experience completely. Highly recommend!</p>
                </div>

                <div class="usereval-cloud">
                    <div class="user-image-container">
                        <img src="/version1/img/ui.jpg"
                            alt="User 2" class="user-image">
                    </div>
                    <p>The interface is intuitive and user-friendly. It made organizing my research much simpler.</p>
                </div>

                <div class="usereval-cloud">
                    <div class="user-image-container">
                        <img src="/version1/img/co.jpg"
                            alt="User 3" class="user-image">
                    </div>
                    <p>I appreciated the real-time collaboration features which helped coordinate with my advisor
                        effectively.</p>
                </div>
            </div>
        </div>
        <!-- Insights section -->

        <div>
            <div class="insights-section">
                <div class="text-container">
                    <h1>Insights for Academic Success</h1>
                </div>
                <div class="insights-container">
                    <div class="insights-item">
                        <img src="/version1/img/prod.jpg"
                            alt="Productivity">
                        <h2>Maximize Your Dissertation Productivity</h2>
                        <p>Learn how to ensure your dissertation progress is on schedule with these top tips.</p>
                    </div>
                    <div class="insights-item">
                        <img src="/version1/img/mile.jpg"
                            alt="Milestones">
                        <h2>Tackling Dissertation Milestones Step by Step</h2>
                        <p>Break down your dissertation into manageable steps for a smoother journey.</p>
                    </div>
                    <div class="insights-item">
                        <img src="/version1/img/team.jpg"
                            alt="Team Collaboration">
                        <h2>Effective Team Collaboration Techniques</h2>
                        <p>Discover the best practices for functioning efficiently as a university project team.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>

        <!--Footer section-->


        <footer class="footersection">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>About UniLogue</h4>
                    <p>UniLogue is dedicated to revolutionizing student project management by providing a platform that
                        simplifies academic project management.</p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#support">Support</a></li>
                        <li><a href="#resources">Resources</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact Us</h4>
                    <p>Email: contact@unilogue.com</p>
                    <p>Phone: +123-456-7890</p>
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2024 UniLogue, we love our users!</p>
            </div>
        </footer>
        <script src="/version1/main.js"></script><!---Javascript for styling menu bar-->

</body>

</html>