<?php
session_start(); // To  Start the session such that the user-specific information across multiple pages is maintained.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/KF7029-test/content/dashboard.css" />  <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->
  </head>
  <body>
    <div class="navbar"></div>
    <div class="header-container">
      <nav class="navigation-menu">
                </li>
      </nav>
    </div>

                    </nav>

        <div class="dropdown_menu"><!---Nav bar section for responsiveness on other devices/screens-->
                     <?php
// To Check if the customer is logged in
if (isset($_SESSION['student_forename'])) {
    $studentName = $_SESSION['student_forename'];
    ?>
    <li><a href="/KF7029-test/content/hello.php" class="action_btn">Hello, <?php echo htmlspecialchars($studentName); ?></a></li>
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
    <main>
    <div class="grid-container">

      <!-- Header -->
<header class="header">
  <button class="menu-icon" onclick="openSidebar()" aria-label="Open sidebar">
    <span class="material-icons-outlined" aria-hidden="true">menu</span>
</button>


    
    <div class="header-left">
      <span class="material-icons-outlined">search</span>
    </div>
    <!-- Consolidated header-right section to include theme-switcher and icons -->
    <div class="header-right">
        <!-- Timezone Selector -->
        <div class="timezone-selector">
          <label for="timezone-select">Timezone:</label>
          <select id="timezone-select" onchange="changeTimezone()">
            <!-- Timezone options will be added by JavaScript -->
          </select>
        </div>
      
        <!-- Time Display -->
        <div id="date"></div>
<div id="time"></div>

        <!-- Existing icons and Mode selector -->
        <div class="theme-switcher">
          <label for="theme-select">Mode:</label>
          <select id="theme-select" onchange="changeTheme()">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
            <option value="nature">Nature</option>
            <option value="neon">Neon</option>
            <option value="pastel">Pastel</option>
          </select>
        </div>
        <span class="material-icons-outlined">notifications</span>
        <span class="material-icons-outlined">email</span>
        <span class="material-icons-outlined">account_circle</span>
<?php
            // To Check if the customer is logged in
            if (isset($_SESSION['customer_forename'])) {
                $customerName = $_SESSION['customer_forename'];
                ?>
                <li><a href="/KF7013/content/hello.php" class="nav-item">Hello, <?php echo $customerName; ?></a></li> <!---If a customer is already logged in the nav bar will show the first name of the customer on top of the screen-->
                <li><a href="logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="nav-item">Logout</a></li><!--if a customer is logged in the nav bar will show the logout option--->
                <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
                <li><a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="nav-item">LOGIN</a></li><!---A login page that will allow users to log onto and use the website-->
                <li><a href="/KF7013/content/signup.php" class="nav-item">REGISTER</a></li><!---The customer registration page which allows to insert a new customer’s details into the customers table in the database-->
                <?php
            }
            ?>


      </div>
        </header>
  
      <!-- End Header -->

     <!-- Sidebar -->
     
     <aside id="sidebar">
        <div class="sidebar-title">
            <div class="sidebar-brand">
                <span class="material-icons-outlined">book</span> UniLogue
            </div>
        </div>
        <ul class="sidebar-list">
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('dashboard-panel')">
                  <span class="material-icons-outlined">list_alt</span> My Tasks
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('logbook-panel')">
                  <span class="material-icons-outlined">book</span> Logbook Entries
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('goals-panel')">
                  <span class="material-icons-outlined">flag_circle</span> Goals
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('meeting-panel')">
                  <span class="material-icons-outlined">event</span> Meeting Agendas
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('reflections-panel')">
                  <span class="material-icons-outlined">auto_stories</span> Reflections
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('export-panel')">
                  <span class="material-icons-outlined">download_for_offline</span> Export Data
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('resources-panel')">
                  <span class="material-icons-outlined">local_library</span> Resources
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('activity-log-panel')">
                  <span class="material-icons-outlined">timeline</span> Activity Log
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('access-control-panel')">
                  <span class="material-icons-outlined">admin_panel_settings</span> Access Control
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('collaborate-panel')">
                  <span class="material-icons-outlined">people_alt</span> Collaborate
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('integration-tools-panel')">
                  <span class="material-icons-outlined">integration_instructions</span> Integration Tools
              </button>
          </li>
          <li class="sidebar-list-item">
              <button class="sidebar-button" onclick="togglePanel('analytics-dashboard-panel')">
                  <span class="material-icons-outlined">insights</span> Analytics Dashboard
              </button>
          </li>
      </ul>
    </aside>

  
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <!-- Project Card -->
        <div class="project-card card">
            <!-- Project Information -->
            <h2>Project Name</h2>
            <p>Company Name</p>
            <!-- Icons and Status -->
            <div class="status-icons">
                <span class="material-icons-outlined status">more_horiz</span>
                <span class="material-icons-outlined status">flag</span>
                <span class="material-icons-outlined status">highlight_off</span>
            </div>
            <div class="status-labels">
                <span class="in-progress">In Progress</span>
                <span class="high-priority">High Priority</span>
            </div>
            <!-- Project Images -->
            <div class="project-images">
                <!-- Use the actual image paths for your project -->
                <img src="path/to/image1.jpg" alt="Project">
                <img src="path/to/image2.jpg" alt="Project ">
                <img src="path/to/image3.jpg" alt="Project ">
                <img src="path/to/image4.jpg" alt="Project">
                <img src="path/to/image5.jpg" alt="Project">
                <span>+3</span>
            </div>
            <!-- Task and Due Date -->
            <div class="task-info">
                <div>Task Done: 35 / 50</div>
                <div class="due-date">Due Date: 25 August</div>
            </div>
        </div>
         <!-- Task List -->
    <div class="card tasks-card">
        <div class="tasks-header">
            <span>My Tasks</span>
            <span class="material-icons-outlined">more_horiz</span>
        </div>
        <ul class="task-list">
            <li><span class="material-icons-outlined">check</span> My Task 1 <span class="material-icons-outlined">star</span></li>
            <li>My Task 2 <span class="material-icons-outlined">star</span></li>
            <li>My Task 3 <span class="material-icons-outlined">star</span></li>
            <li><span class="material-icons-outlined">check</span> My Task 4 <span class="material-icons-outlined">star</span></li>
            <li><span class="material-icons-outlined">check</span> My Task 5 <span class="material-icons-outlined">star</span></li>
            <li>My Task 6 <span class="material-icons-outlined">star</span></li>
            <li>My Task 7 <span class="material-icons-outlined">star</span></li>
        </ul>
    </div>
         <!-- Calendar -->
    <div class="card calendar-card">
        <!-- Calendar implementation goes here -->
    </div> <!-- Timeline -->
    <div class="card timeline-card">
        <div class="timeline-header">
            <span>Timeline</span>
            <span class="material-icons-outlined">more_horiz</span>
        </div>
        <div class="timeline-events">
            <div><span class="material-icons-outlined">slideshow</span> Create wireframe <span>32:54</span></div>
            <div><span class="material-icons-outlined">slideshow</span> Logo Design <span>30:00</span></div>
            <div><span class="material-icons-outlined">slideshow</span> Dashboard Design <span>30:00</span></div>
        </div>
    </div>
    <!-- Messages -->
    <div class="card messages-card">
        <div class="message">
            <img src="" alt="Marvin McKinney">
            <div>
                <span>Marvin McKinney</span>
                <span>Commodo volutpat nocl</span>
            </div>
        </div>
        <!-- Additional messages similar to the above -->
    </div>
        </div>
<!-- Dashboard Panel -->
<div id="dashboard-panel" class="side-panel">
    <div class="content-container">
        <!-- success notification -->
        <div id="notification" class="notification green-background">
          <iconify-icon
            icon="mdi:check-circle-outline"
            style="color: black"
            width="24"
            height="24"
          ></iconify-icon>
          <p>The task was deleted</p>
        </div>
        <!-- header -->
        <div class="max-width-container">
          <div class="header flex items-center justify-between">
            <h1 class="title">My tasks</h1>
            <div class="buttons-container">
              <button
                id="add-task-cta"
                class="button regular-button blue-background"
              >
                Add task
              </button>
              <button class="sign-out-cta">Sign out</button>
            </div>
          </div>
        </div>
        <!-- radio buttons -->
        <div class="radio-buttons-container">
          <div class="max-width-container flex">
            <div class="radio-container">
              <input
                type="radio"
                id="list"
                name="view-option"
                value="list"
                class="radio-input"
                checked
              />
              <label for="list" class="radio-label">
                <!-- list-bulleted -->
                <iconify-icon
                  icon="material-symbols:format-list-bulleted-rounded"
                  style="color: black"
                  width="24"
                  height="24"
                ></iconify-icon>
                <span>List</span>
              </label>
            </div>
            <div class="radio-container">
              <input
                type="radio"
                id="board"
                name="view-option"
                value="board"
                class="radio-input"
              />
              <label for="board" class="radio-label">
                <!-- grid -->
                <iconify-icon
                  icon="ic:round-grid-view"
                  style="color: black"
                  width="24"
                  height="24"
                ></iconify-icon>
                <span>Board</span>
              </label>
            </div>
          </div>
        </div>
        <!-- tasks -->
        <div class="max-width-container">
          <!-- list view -->
          <div id="list-view" class="list-view">
            <div class="list-container pink">
              <h2 class="list-header">
                <span class="circle pink-background"></span
                ><span class="text">To do</span>
              </h2>
              <ul class="tasks-list">
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
              </ul>
            </div>
            <div class="list-container blue">
              <h2 class="list-header">
                <span class="circle blue-background"></span
                ><span class="text">Doing</span>
              </h2>
              <ul class="tasks-list">
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
              </ul>
            </div>
            <div class="list-container green">
              <h2 class="list-header">
                <span class="circle green-background"></span
                ><span class="text">Done</span>
              </h2>
              <ul class="tasks-list">
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <p class="task-name">Design UI</p>
                    <p class="task-due-date">Due on January 7, 2020</p>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <!-- board view -->
          <div id="board-view" class="board-view hide">
            <!-- list -->
            <div>
              <h2 class="list-header">
                <span class="circle pink-background"></span
                ><span class="text">To do</span>
              </h2>
              <ul class="tasks-list pink">
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
              </ul>
            </div>
            <!-- list -->
            <div>
              <h2 class="list-header">
                <span class="circle blue-background"></span
                ><span class="text">Doing</span>
              </h2>
              <ul class="tasks-list blue">
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
              </ul>
            </div>
            <!-- list -->
            <div>
              <h2 class="list-header">
                <span class="circle green-background"></span
                ><span class="text">Done</span>
              </h2>
              <ul class="tasks-list green">
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
                <li class="task-item">
                  <button class="task-button">
                    <div>
                      <p class="task-name">Design UI</p>
                      <p class="task-due-date">Due on January 7, 2020</p>
                    </div>
                    <!-- arrow -->
                    <iconify-icon
                      icon="material-symbols:arrow-back-ios-rounded"
                      style="color: black"
                      width="18"
                      height="18"
                      class="arrow-icon"
                    ></iconify-icon>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- add + update task -->
      <div id="set-task-overlay" class="overlay set-task-overlay hide">
        <div class="overlay-content pink-background">
          <!-- close button -->
          <button
            class="button circle-button blue-background flex justify-center items-center close-button"
          >
            <iconify-icon
              icon="material-symbols:close-rounded"
              style="color: black"
              width="26"
              height="26"
            ></iconify-icon>
          </button>
          <h1 class="header">Add task</h1>
          <form class="form" autocomplete="off">
            <label for="name" class="label">Name</label>
            <input
              type="text"
              name="name"
              id="name"
              class="input white-background"
              required
            />
            <label for="description" class="label">Description</label>
            <textarea
              name="description"
              id="description"
              rows="8"
              class="textarea-input white-background"
              required
            ></textarea>
            <h2 class="label">Due date</h2>
            <div class="divided-inputs-container">
              <div>
                <label for="due-date-day" class="secondary-label">Day</label>
                <input
                  type="text"
                  name="due-date-day"
                  id="due-date-day"
                  class="input white-background"
                  required
                />
              </div>
              <div>
                <label for="due-date-month" class="secondary-label">Month</label>
                <input
                  type="text"
                  name="due-date-month"
                  id="due-date-month"
                  class="input white-background"
                  required
                />
              </div>
              <div>
                <label for="due-date-year" class="secondary-label">Year</label>
                <input
                  type="text"
                  name="due-date-year"
                  id="due-date-year"
                  class="input white-background"
                  required
                />
              </div>
            </div>
            <h2 class="label">Status</h2>
            <div
              id="status-select"
              class="status-select white-background flex items-center justify-between cursor-pointer"
            >
              <span>To do</span>
              <iconify-icon
                icon="material-symbols:arrow-back-ios-rounded"
                style="color: black"
                width="18"
                height="18"
                class="arrow-icon"
              ></iconify-icon>
            </div>
            <ul
              id="status-dropdown"
              class="status-dropdown white-background hide"
            >
              <li>
                <input
                  type="radio"
                  id="to-do-radio"
                  name="status-option"
                  value="To do"
                  class="radio-input"
                />
                <label for="to-do-radio" class="radio-label">
                  <span class="circle pink-background"></span><span>To do</span>
                </label>
              </li>
              <li>
                <input
                  type="radio"
                  id="doing-radio"
                  name="status-option"
                  value="Doing"
                  class="radio-input"
                />
                <label for="doing-radio" class="radio-label">
                  <span class="circle blue-background"></span><span>Doing</span>
                </label>
              </li>
              <li>
                <input
                  type="radio"
                  id="done-radio"
                  name="status-option"
                  value="Done"
                  class="radio-input"
                />
                <label for="done-radio" class="radio-label">
                  <span class="circle green-background"></span><span>Done</span>
                </label>
              </li>
            </ul>
            <div class="text-center">
              <button
                type="submit"
                class="button regular-button green-background cta-button"
              >
                Add task
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- view task -->
      <div id="view-task-overlay" class="overlay view-task-overlay hide">
        <div class="overlay-content green-background">
          <!-- close button -->
          <button
            class="button circle-button blue-background flex justify-center items-center close-button"
          >
            <iconify-icon
              icon="material-symbols:close-rounded"
              style="color: black"
              width="26"
              height="26"
            ></iconify-icon>
          </button>
          <h1 class="header no-margin">Name</h1>
          <p class="value">some long task name</p>
          <h1 class="header">Description</h1>
          <p class="value">
            some long task namesome long task namesome long task name
          </p>
          <div class="flex items-center">
            <h1 class="header min-width">Due date</h1>
            <p class="value">January 7, 2020</p>
          </div>
          <div class="flex items-center">
            <h1 class="header min-width">Status</h1>
            <p class="value status-value">
              <span class="circle blue-background"></span><span>Doing</span>
            </p>
          </div>
          <div class="control-buttons-container">
            <!-- edit button -->
            <button
              class="button circle-button pink-background flex justify-center items-center"
            >
              <iconify-icon
                icon="material-symbols:edit-rounded"
                style="color: black"
                width="24"
                height="24"
              ></iconify-icon>
            </button>
            <!-- delete button -->
            <button
              id="delete-task-cta"
              class="button circle-button pink-background flex justify-center items-center"
            >
              <iconify-icon
                icon="ic:round-delete"
                style="color: black"
                width="24"
                height="24"
              ></iconify-icon>
            </button>
          </div>
        </div>
      </div>
</div>
            
<div id="logbook-panel" class="side-panel">
    <div class="logcontainer">
		<div class="toolbar">
			<div class="head">
				<input type="text" placeholder="Filename" value="untitled" id="filename">
				<select onchange="fileHandle(this.value); this.selectedIndex=0">
					<option value="" selected="" hidden="" disabled="">File</option>
					<option value="new">New file</option>
					<option value="txt">Save as txt</option>
					<option value="pdf">Save as pdf</option>
				</select>
				<select onchange="formatDoc('formatBlock', this.value); this.selectedIndex=0;">
					<option value="" selected="" hidden="" disabled="">Format</option>
					<option value="h1">Heading 1</option>
					<option value="h2">Heading 2</option>
					<option value="h3">Heading 3</option>
					<option value="h4">Heading 4</option>
					<option value="h5">Heading 5</option>
					<option value="h6">Heading 6</option>
					<option value="p">Paragraph</option>
				</select>
				<select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
					<option value="" selected="" hidden="" disabled="">Font size</option>
					<option value="1">Extra small</option>
					<option value="2">Small</option>
					<option value="3">Regular</option>
					<option value="4">Medium</option>
					<option value="5">Large</option>
					<option value="6">Extra Large</option>
					<option value="7">Big</option>
				</select>
				<div class="color">
					<span>Color</span>
					<input type="color" oninput="formatDoc('foreColor', this.value); this.value='#000000';">
				</div>
				<div class="color">
					<span>Background</span>
					<input type="color" oninput="formatDoc('hiliteColor', this.value); this.value='#000000';">
				</div>
			</div>
			<div class="btn-toolbar">
				<button onclick="formatDoc('undo')"><i class='bx bx-undo' ></i></button>
				<button onclick="formatDoc('redo')"><i class='bx bx-redo' ></i></button>
				<button onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>
				<button onclick="formatDoc('underline')"><i class='bx bx-underline' ></i></button>
				<button onclick="formatDoc('italic')"><i class='bx bx-italic' ></i></button>
				<button onclick="formatDoc('strikeThrough')"><i class='bx bx-strikethrough' ></i></button>
				<button onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left' ></i></button>
				<button onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle' ></i></button>
				<button onclick="formatDoc('justifyRight')"><i class='bx bx-align-right' ></i></button>
				<button onclick="formatDoc('justifyFull')"><i class='bx bx-align-justify' ></i></button>
				<button onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol' ></i></button>
				<button onclick="formatDoc('insertUnorderedList')"><i class='bx bx-list-ul' ></i></button>
				<button onclick="addLink()"><i class='bx bx-link' ></i></button>
				<button onclick="formatDoc('unlink')"><i class='bx bx-unlink' ></i></button>
				<button id="show-code" data-active="false">&lt;/&gt;</button>
			</div>
		</div>
		<div id="content" contenteditable="true" spellcheck="false">
			Lorem, ipsum.
		</div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</div>
<div id="goals-panel" class="side-panel">
    <div class="timeline-container">

        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 1: Welcome and Orientation</h2>
            <p>Welcome to your MSc project. Begin by familiarizing yourself with the module, understanding the learning outcomes, and starting your initial research and planning.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 2: Identifying a Suitable Research Project</h2>
            <p>Explore potential research topics, consult with your supervisor, and decide on a suitable research question that aligns with your interests and academic goals.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 3: Research Proposal and Ethical Approval</h2>
            <p>Develop a detailed research proposal, outline your methodology, and obtain ethical approval to ensure your research adheres to the required standards.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 4: In-Depth Research and Development</h2>
            <p>Engage in thorough research, including a literature review and data gathering. Begin developing your research project, addressing technical challenges and innovations.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 5: Analysis and Findings</h2>
            <p>Analyze the data collected, review the results, and start drafting your findings. Discuss these findings in the context of existing literature and your research question.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 6: Writing and Reviewing</h2>
            <p>Compose your dissertation, consolidate your research findings, and critically evaluate your work. Share drafts with your supervisor for feedback and refinement.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 7: Revision and Submission Preparation</h2>
            <p>Finalize your dissertation, ensuring that all components meet the standards and guidelines provided. Prepare for submission by reviewing formatting and content completeness.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
          <div class="timeline-arrow"></div>
        </div>
      
        <div class="timeline-stage">
          <div class="timeline-content">
            <h2>Stage 8: Submission and Viva</h2>
            <p>Submit your dissertation and prepare for the viva voce. Review your project thoroughly to articulate and defend your research outcomes confidently.</p>
            <button class="mark-done-btn">Mark as Done</button>
          </div>
        </div>
      
      </div>
      </div>
      <script>
        document.querySelectorAll('.mark-done-btn').forEach(button => {
          button.addEventListener('click', function() {
            this.parentElement.classList.add('done');
            this.disabled = true;
          });
        });
      </script>
      
<div id="meeting-panel" class="side-panel">
    <div class="meeting-agendas-container">
        <h2>Meeting Agendas</h2>
      
        <!-- List of Scheduled Meetings -->
        <div class="scheduled-meetings">
          <h3>Scheduled Meetings</h3>
          <ul id="meeting-list">
            <!-- Example of a meeting entry -->
            <li class="meeting-entry">
              <span class="meeting-date">May 5, 2024</span>
              <span class="meeting-with">Dr. Smith (Supervisor)</span>
              <span class="meeting-topic">Research Methodology Discussion</span>
              <button class="edit-meeting-btn">Edit</button>
              <button class="delete-meeting-btn">Delete</button>
            </li>
            <!-- More meetings can be added dynamically -->
          </ul>
        </div>
      
        <!-- Add Meeting Form -->
        <div class="add-meeting-form">
          <h3>Schedule a New Meeting</h3>
          <form id="schedule-meeting-form">
            <label for="meeting-date">Date:</label>
            <input type="date" id="meeting-date" name="meeting-date" required>
      
            <label for="meeting-with">Meeting with:</label>
            <select id="meeting-with" name="meeting-with" required>
              <option value="supervisor">Supervisor</option>
              <option value="other">Other</option>
            </select>
      
            <!-- Additional input field for specifying a different person for the meeting -->
            <input type="text" id="meeting-with-other" name="meeting-with-other" placeholder="Enter name" style="display: none;">
      
            <label for="meeting-topic">Topic:</label>
            <input type="text" id="meeting-topic" name="meeting-topic" required>
      
            <button type="submit" class="schedule-meeting-btn">Schedule Meeting</button>
          </form>
        </div>
      </div>
      </div>
      <script>
      document.getElementById('meeting-with').addEventListener('change', function() {
  var otherInput = document.getElementById('meeting-with-other');
  if (this.value === 'other') {
    otherInput.style.display = 'block';
  } else {
    otherInput.style.display = 'none';
  }
});
</script>

<div id="reflections-panel" class="side-panel">        
        <div class="reflection-category">
            <h2>Research Process and Methodology</h2>
            <textarea id="research-process-reflection" placeholder="Reflect on your research methodology and process..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Literature Review and Critical Thinking</h2>
            <textarea id="literature-review-reflection" placeholder="Reflect on the literature review process and your critical thinking..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Time Management and Project Planning</h2>
            <textarea id="time-management-reflection" placeholder="Reflect on how you managed your time and planned the project..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Data Collection and Analysis</h2>
            <textarea id="data-collection-reflection" placeholder="Reflect on the data collection and analysis phases..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Writing and Communication Skills</h2>
            <textarea id="writing-skills-reflection" placeholder="Reflect on the development of your writing and communication skills..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Problem-Solving and Adaptability</h2>
            <textarea id="problem-solving-reflection" placeholder="Reflect on problem-solving and adaptability during your research..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Personal Growth and Development</h2>
            <textarea id="personal-growth-reflection" placeholder="Reflect on your personal growth and development..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Collaboration and Support</h2>
            <textarea id="collaboration-reflection" placeholder="Reflect on your experiences with collaboration and support..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Ethical and Social Implications</h2>
            <textarea id="ethical-implications-reflection" placeholder="Reflect on the ethical and social implications of your research..."></textarea>
        </div>

        <div class="reflection-category">
            <h2>Future Applications and Implications</h2>
            <textarea id="future-applications-reflection" placeholder="Reflect on future applications and implications of your research..."></textarea>
        </div>

    </div>

    <div class="reflection-actions">
        <button id="save-reflections" type="button">Save Reflections</button>
    </div>
</div>
<div id="export-panel" class="side-panel">
    <!-- Logbook entries content goes here -->
</div>

<div id="resources-panel" class="side-panel">
    <div class="rescards">

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>University Libraries</h2>
            <p>Access to digital libraries and databases like JSTOR or ScienceDirect.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Academic Databases</h2>
            <p>Google Scholar, PubMed, Scopus, and Web of Science for comprehensive literature reviews.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Writing and Grammar Tools</h2>
            <p>Tools like Grammarly and Hemingway Editor for improving readability and grammar.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Citation Management</h2>
            <p>Zotero, EndNote, and Mendeley to organize and cite research effortlessly.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Thesis Templates and Guides</h2>
            <p>LaTeX Templates and Purdue OWL for structure and style guides.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Educational Websites</h2>
            <p>Coursera, edX, and ResearchGate offer courses and a platform to connect with other researchers.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Blogs and Forums</h2>
            <p>Places like PhD Forum and specific academic blogs for community advice and discussions.</p>
        </button>

        <button class="rescard" onmouseover="animateCard(this)" onmouseout="resetCard(this)" onFocus="animateCard(this)" onBlur="resetCard(this)" onKeyDown="handleKeyDown(event)">
            <h2>Editing Services</h2>
            <p>Professional editing and proofreading services to polish your dissertation.</p>
        </button>

    
</div>
</div>
<div id="activity-log-panel" class="side-panel">
    <!-- Logbook entries content goes here -->
</div>
<div id="access-control-panel" class="side-panel">
    <!-- Logbook entries content goes here -->
</div>
<div id="collaborate-panel" class="side-panel">
    <!-- Logbook entries content goes here -->
</div>
<div id="integration-tools-panel" class="side-panel">
    <!-- Logbook entries content goes here -->
</div>
<div id="analytics-dashboard-panel" class="side-panel">
    <!-- Logbook entries content goes here -->
</div>

<!-- Add similar divs for Goals, Meeting Agendas, Reflections, and Export Data -->


      </main>
    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <script src="/KF7029-test/content/dashboard.js"></script>
  </body>
</html>