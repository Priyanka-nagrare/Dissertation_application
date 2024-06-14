<!-- Description: This is the main page of the dashboard where the student can view all the tasks, goals, meetings, reflections, and other activities.
	The student can also view the resources, access control, collaborate with other students, and view the analytics dashboard.
	The student can also export the data and view the settings of the dashboard. 
	Author: Priyanka Nagrare
	Date: 2021-08-30   -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="referrer" content="strict-origin-when-cross-origin">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- icons for the site -->
	<link rel="stylesheet" href="fin.css">

	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/hna7yj0zzaocv6g1w9y7rs18ztte3euem7q5s9al71xmp67q/tinymce/6/tinymce.min.js"
		referrerpolicy="origin"></script>
	<title>UniLogue</title>
</head>

<!--Body section of the dashboard-->

<body>
	<!-- Sidebar of the Dashboard consisting a list of all the menus available-->
	<section id="sidebar">
		<a href="#" class="side1">
			<i class='fas fa-book'></i>
			<span class="text">UniLogue</span>
		</a>
		<!-- Menu list-->
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='fas fa-home'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="tasks-section">
					<i class='fas fa-tasks'></i>
					<span class="text">My Tasks</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="logbook-section">
					<i class='fas fa-book-open'></i>
					<span class="text">Logbook Entries</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="goals-section">
					<i class='fas fa-flag'></i>
					<span class="text">Goals</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="meetings-section">
					<i class='fas fa-calendar-alt'></i>
					<span class="text">Meeting Agendas</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="reflections-section">
					<i class='fas fa-book-reader'></i>
					<span class="text">Reflections</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="export-section">
					<i class='fas fa-download'></i>
					<span class="text">Export Data</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="resources-section">
					<i class='fas fa-bookmark'></i>
					<span class="text">Resources</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="activity-section">
					<i class='fas fa-history'></i>
					<span class="text">Activity Log</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="access-section">
					<i class='fas fa-user-shield'></i>
					<span class="text">Access Control</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="collaborate-section">
					<i class='fas fa-users'></i>
					<span class="text">Collaborate</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="tools-section">
					<i class='fas fa-tools'></i>
					<span class="text">Integration Tools</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="analytics-section">
					<i class='fas fa-chart-line'></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="leaderboard-section">
					<i class='fas fa-trophy'></i>
					<span class="text">Leaderboard</span>
				</a>
			</li>
			<li>
				<a href="#" data-target="settings-section">
					<i class='fas fa-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
		</ul>

		<!-- Logout Menu-->
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='fas fa-sign-out-alt'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- End of side bar -->



	<!-- Main content of the Dashboard -->
	<section id="content">
		<!-- Navigation bar-->
		<nav>
			<i class='fas fa-bars'></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='fas fa-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="reminder"  id="reminderIcon">
				<i class='fas fa-bell'></i>
				<span class="num">8</span>
				<span class="reminders-text">Reminders</span> <!-- Added Reminders text -->
			</a>
			<div class="reminder-popup" id="reminderPopup">
				<div class="popup-header">
					<h3>Reminders</h3>
					<span class="close-popup" id="closePopup">&times;</span>
				</div>
				<div class="popup-content">
					<ul>
						<li>Dissertation due date approaching: 15-08-2024</li>
						<li>Meeting with supervisor: 05-07-2024</li>
						<li>Maintain your streak on the leaderboard!</li>
						<!-- Add more reminders as needed -->
					</ul>
				</div>
			</div>

			<!--PHP script to check if the student is logged in-->
			<?php
			// To Check if the student is logged in
			if (isset($_SESSION['student_forename'])) {
				$customerName = $_SESSION['student_forename'];
				?>
			<a href="/KF7029-test/content/hello.php" class="nav-link">Hello,
				<?php echo $customerName; ?>
			</a>
			<?php
			} else {
				?>
			<a href="/KF7029-test/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>"
				class="nav-link">LOGIN</a>
			<a href="/KF7029-test/content/signup.php" class="nav-link">REGISTER</a>
			<?php
			}
			?>
		</nav>

		<!-- Main content of the Dashboard -->
		<main>
			<!-- Header section - Dashboard -->
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='fas fa-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>

				</div>
			</div>

			<!-- Welcome Section -->
			<div class="welcome-container">
				<p>Welcome to your "MSc Computer Science and Digital Technologies Project"</p>
			</div>


			<section class="first-steps-container"> <!--(Westminster.ac.uk, 2023)-->
				<h3>First Steps</h3>
				<p>Ready to get started but uncertain how to begin? These are normally the first steps of dissertation
					writing:</p>
				<div class="steps">
					<div class="step">
						<div class="circlefirst"><img
								src="https://t4.ftcdn.net/jpg/04/76/45/53/240_F_476455312_0IbI2iAY2j4ER494SbvFUgYRICFTQwg9.jpg"
								alt="Choose a topic"></div>
						<p>Choose a topic</p>
					</div>
					<div class="step">
						<div class="circlefirst"><img
								src="https://t4.ftcdn.net/jpg/05/50/70/53/240_F_550705354_g3ZRQl5wRxvy806HGtKSeLJyfhR53uVh.jpg"
								alt="Literature search"></div>
						<p>Conduct a literature search</p>
					</div>
					<div class="step">
						<div class="circlefirst"><img
								src="https://t3.ftcdn.net/jpg/06/73/26/22/240_F_673262278_DiFFSEelcPzhZoQhDLiBsmAmmvdh13TT.jpg"
								alt="Research questions"></div>
						<p>Devise research questions / hypotheses</p>
					</div>
					<div class="step">
						<div class="circlefirst"><img
								src="https://t4.ftcdn.net/jpg/02/83/95/09/240_F_283950983_gbMYMATowDxjUMd8GlkWgM5MR1tgVDy2.jpg"
								alt="Devise approach"></div>
						<p>Devise your approach</p>
					</div>
					<div class="step">
						<div class="circlefirst"><img
								src="https://t4.ftcdn.net/jpg/00/35/32/41/240_F_35324194_Lkzr1RZ2CitlII5achnOjXxcH4tcZbjk.jpg"
								alt="Think of a title"></div>
						<p>Think of a title</p>
					</div>
					<div class="step">
						<div class="circlefirst"><img
								src="https://t3.ftcdn.net/jpg/05/00/58/76/240_F_500587658_d3Gngnte70wfsWOQdbNC0P6F4kqZAjoy.jpg"
								alt="Plan your time"></div>
						<p>Plan your time</p>
					</div>
					<div class="step">
						<div class="circlefirst"><img
								src="https://t3.ftcdn.net/jpg/04/98/24/34/240_F_498243481_fNXHsXqMsrtdqBDmSsAtEyAPRfvkD2Px.jpg"
								alt="Write a proposal"></div>
						<p>Write a proposal (if requested)</p>
					</div>
				</div>
			</section>

			<!-- Features Container -->
			<ul class="box-info">
				<li>
					<i class='fas fa-calendar-check'></i>
					<span class="padText text">

						<img src="https://t3.ftcdn.net/jpg/01/25/68/32/240_F_125683201_LR66VnLgNEfimePjX9BppeTvuHLLbiFn.jpg"
							alt="Write a proposal">
						<p>RESEARCH PAPERS</p>
					</span>
				</li>
				<li>
					<i class='fas fa-calendar-alt'></i>
					<span class="padText text">
						<img src="https://t4.ftcdn.net/jpg/06/86/76/79/240_F_686767952_WLcu3bfwPkAGUvfsh3NJOmJzVFC23UXG.jpg"
							alt="Write a proposal">
						<p>MEETINGS SCHEDULED</p>
					</span>
				</li>
				<li>
					<i class='fas fa-file-alt'></i>
					<span class="padText text">
						<img src="https://t4.ftcdn.net/jpg/07/81/89/51/240_F_781895183_XJCokUp4qftTN6fk6FV1pU396iP0vS3Z.jpg"
							alt="Write a proposal">
						<p>CHAPTER DRAFTS</p>
					</span>
				</li>
				<li>
					<i class='fas fa-comments'></i>
					<span class="padText text">
						<img src="https://t4.ftcdn.net/jpg/01/41/29/79/240_F_141297942_Qx5HpPokhyrBjE6IR2QoMozWUefwMoUc.jpg"
							alt="Write a proposal">
						<p>FEEDBACK RECEIVED</p>
					</span>
				</li>
			</ul>

			<!-- Dissertation Tasks Table -->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Dissertation Tasks</h3>
						<i class='bx bx-search'></i>
						<i class='bx bx-filter'></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Task</th>
								<th>Deadline</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="https://t3.ftcdn.net/jpg/04/33/86/98/240_F_433869855_N5yjdR25KfxaLsFYIVfWDqPMEkvcT7jg.jpg"
										alt="literature review">
									<p>Literature Review</p>
								</td>
								<td>15-06-2024</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="https://t3.ftcdn.net/jpg/04/87/61/14/240_F_487611452_C1813pk3iaZKcFV5PJZTveKIekvAD2cG.jpg"
										alt="data collection">
									<p>Data Collection</p>
								</td>
								<td>01-07-2024</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="https://t3.ftcdn.net/jpg/07/19/73/40/240_F_719734085_wkmcs3U4eSCTKKsnON7yZv6oUavdPmy5.jpg"
										alt="data analysis">
									<p>Data Analysis</p>
								</td>
								<td>15-07-2024</td>
								<td><span class="status process">In Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="https://t3.ftcdn.net/jpg/01/79/23/16/240_F_179231675_WQ2gwnnzBLrfvtMzLRHbVARHLSwvv2oH.jpg"
										alt="writing draft">
									<p>Writing Draft</p>
								</td>
								<td>01-08-2024</td>
								<td><span class="status pending">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="https://t4.ftcdn.net/jpg/06/84/30/61/240_F_684306196_3i5VoyEIzKSqpzag670qwuquBoe7kUic.jpg"
										alt="thesis submission">
									<p>Final Submission</p>
								</td>
								<td>15-08-2024</td>
								<td><span class="status completed">Pending</span></td>
							</tr>
						</tbody>
					</table>

					</tbody>
					</table>
				</div>

				<!-- To do List -->
				<div class="todo">
					<div class="head">
						<h3>To do List</h3>
						<i class='bx bx-plus'></i>
						<i class='bx bx-filter'></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Finalize Topic</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="completed">
							<p>Submit Proposal</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="not-completed">
							<p>Conduct Literature Review</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="completed">
							<p>Collect Data</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="not-completed">
							<p>Analyze Data</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="not-completed">
							<p>Write Draft</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="not-completed">
							<p>Revise Draft</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
						<li class="not-completed">
							<p>Submit Final Version</p>
							<i class='bx bx-dots-vertical-rounded'></i>
						</li>
					</ul>
				</div>

			</div>

			<!-- Charts Container -->
			<div class="charts-container">
				<div class="chart">
					<h3>Top Reasons for Dissertation Failures</h3>
					<canvas id="dissertationFailuresChart"></canvas>
				</div>
				<div class="chart">
					<h3>Popular Project Management Tools for Researchers</h3>
					<canvas id="projectManagementToolsChart"></canvas>
				</div>
			</div>


			<!-- Logbook Section -->
			<div class="main-container">
				<div class="deliverables-container">
					<h3>Project Deliverables Indicative Timescales</h3>
					<table>
						<thead>
							<tr>
								<th>Step</th>
								<th>Description</th>
								<th>Timescale</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Request of Research Project: Access the online list of available projects and
									identify your top three choices. Then submit a project request.</td>
								<td>Week 1</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Prepare research proposal: You should discuss the project with your Supervisor and
									prepare a proposal (using our template on BB) for the specific project you will work
									on.</td>
								<td>Week 1</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Ethical Approval: Submitted by Week 2 of your KF7029 semester.</td>
								<td>Week 2</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Project Log & Research Materials: Started in week 1 and updated weekly throughout
									your KF7029 semester. You should create a OneDrive folder (shared with your
									supervisor) and maintain copies of all research materials and draft documents.</td>
								<td>Ongoing</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Submission of Dissertation: End of your KF7029 semester</td>
								<td>End of Semester</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Research Viva: You will prepare a research poster to present and demonstrate your
									research to the supervisory team at our viva/ research poster session. Confirmation
									of final marks and feedback at the Award Board July 2024.</td>
								<td>July 2024</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div class="content-container">
				<h3>Identifying a Suitable Research Project</h3>
				<p>Our Blackboard module site provides a directory of research projects proposed by supervisory teams,
					which are already assessed as appropriate for your module and assessment. It is your responsibility
					to refine these projects and prepare a specific research proposal.</p>
				<p>Key learning outcomes include:</p>

				<ul>
					<li><span class="keyword">Understanding:</span> Demonstrate a critical awareness of current problems
						and new
						insights in your field.</li>
					<li><span class="keyword">Techniques:</span> Apply relevant research techniques.</li>
					<li><span class="keyword">Originality:</span> Show practical understanding of creating and
						interpreting
						knowledge through research.</li>
					<li><span class="keyword">Evaluation:</span> Critically evaluate current research and methodologies,
						proposing
						new hypotheses when appropriate.</li>
				</ul>
			</div>

			<!--Proposal Guide Section-->
			<div class="proposal-container">
				<h3>Starting Out: Research Proposal</h3>
				<table>
					<thead>
						<tr>
							<th>Element</th>
							<th>Word Count</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Research Question(s)</td>
							<td>-</td>
						</tr>
						<tr>
							<td>Related Literature</td>
							<td>-</td>
						</tr>
						<tr>
							<td>Research Aim, Scope and Impact</td>
							<td>Max 300 words</td>
						</tr>
						<tr>
							<td>Research Approach</td>
							<td>Max 300 words</td>
						</tr>
						<tr>
							<td>Ethics, Risk and Related Issues</td>
							<td>600-750 words</td>
						</tr>
					</tbody>
				</table>
			</div>

			</div>


			<!-- My Tasks content area-->
			<div id="tasks-section" class="content-section">


				<div class="content-container1">

					<!-- success notification -->
					<div id="notification" class="notification green-background">
						<i class="fas fa-check-circle" style="color: black" aria-hidden="true"></i>
						<p>The task was deleted</p>
					</div>

					<!-- add task form -->
					<div class="max-width-container">
						<div class="header flex items-center justify-between">
							<h1 class="titletask">My tasks</h1>
							<div class="buttons-container">
								<button id="add-task-cta" class="button regular-button blue-background">
									<i class="fas fa-plus-circle"></i> Add task
								</button>
								<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
							</div>
						</div>
					</div>
				</div>

				<!-- view options by selecting the radio button-->
				<div class="radio-buttons-container">
					<div class="max-width-container flex">
						<div class="radio-container">
							<input type="radio" id="list" name="view-option" value="list" class="radio-input" checked />
							<label for="list" class="radio-label">
								<i class="fas fa-list" width="24" height="24"></i>
								<span>List</span>
							</label>
						</div>
						<div class="radio-container">
							<input type="radio" id="board" name="view-option" value="board" class="radio-input" />
							<label for="board" class="radio-label">
								<i class="fas fa-th" width="24" height="24"></i>
								<span>Board</span>
							</label>
						</div>
					</div>
				</div>

				<!-- tasks container - To do -->
				<div class="max-width-container">
					<!-- list view -->
					<div id="list-view" class="list-view">
						<div class="list-container pink">
							<h2 class="list-header">
								<span class="circle pink-background"></span><span class="text">To do</span>
							</h2>
							<ul class="tasks-list">
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>
							</ul>
						</div>

						<!--list container - Doing -->
						<div class="list-container blue">
							<h2 class="list-header">
								<span class="circle blue-background"></span><span class="text">Doing</span>
							</h2>
							<ul class="tasks-list">
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>

								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>
							</ul>
						</div>

						<!-- list container - Done -->
						<div class="list-container green">
							<h2 class="list-header">
								<span class="circle green-background"></span><span class="text">Done</span>
							</h2>
							<ul class="tasks-list">
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>
									</button>
								</li>


								<li class="task-item">
									<button class="task-button">
										<p class="task-name">Design UI</p>
										<p class="task-due-date">Due on January 7, 2020</p>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
							</ul>
						</div>
					</div>


					<!-- board view - to do -->
					<div id="board-view" class="board-view hide">
						<!-- list -->
						<div>
							<h2 class="list-header">
								<span class="circle pink-background"></span><span class="text">To do</span>
							</h2>
							<ul class="tasks-list pink">
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
							</ul>
						</div>

						<!-- board view - doing -->
						<div>
							<h2 class="list-header">
								<span class="circle blue-background"></span><span class="text">Doing</span>
							</h2>
							<ul class="tasks-list blue">
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
							</ul>
						</div>

						<!-- board view - done -->
						<div>
							<h2 class="list-header">
								<span class="circle green-background"></span><span class="text">Done</span>
							</h2>
							<ul class="tasks-list green">
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

									</button>
								</li>
								<li class="task-item">
									<button class="task-button">
										<div>
											<p class="task-name">Design UI</p>
											<p class="task-due-date">Due on January 7, 2020</p>
										</div>
										<!-- arrow -->
										<i class="fas fa-arrow-left" width="18" height="18" class="arrow-icon"></i>

								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- set task including add task, dates, status-->
			<div id="set-task-overlay" class="overlay set-task-overlay hide">
				<div class="overlay-content pink-background">
					<!-- close button -->
					<button class="button circle-button blue-background flex justify-center items-center close-button">
						<i class="fas fa-times" style=" width: 26px; height: 26px;"></i>

					</button>
					<h1 class="header">Add task</h1>
					<form class="form" autocomplete="off">
						<label for="name" class="label">Name</label>
						<input type="text" name="name" id="name" class="input white-background" required />
						<label for="description" class="label">Description</label>
						<textarea name="description" id="description" rows="8" class="textarea-input white-background"
							required></textarea>
						<h2 class="label">Due date</h2>
						<div class="divided-inputs-container">
							<div>
								<label for="due-date-day" class="secondary-label">Day</label>
								<input type="text" name="due-date-day" id="due-date-day" class="input white-background"
									required />
							</div>
							<div>
								<label for="due-date-month" class="secondary-label">Month</label>
								<input type="text" name="due-date-month" id="due-date-month"
									class="input white-background" required />
							</div>
							<div>
								<label for="due-date-year" class="secondary-label">Year</label>
								<input type="text" name="due-date-year" id="due-date-year"
									class="input white-background" required />
							</div>
						</div>
						<h2 class="label">Status</h2>
						<div id="status-select"
							class="status-select white-background flex items-center justify-between cursor-pointer">
							<span>To do</span>
							<i class="fas fa-arrow-left" style=" width: 18px; height: 18px;" class="arrow-icon"></i>

						</div>
						<ul id="status-dropdown" class="status-dropdown white-background hide">
							<li>
								<input type="radio" id="to-do-radio" name="status-option" value="To do"
									class="radio-input" />
								<label for="to-do-radio" class="radio-label">
									<span class="circle pink-background"></span><span>To do</span>
								</label>
							</li>
							<li>
								<input type="radio" id="doing-radio" name="status-option" value="Doing"
									class="radio-input" />
								<label for="doing-radio" class="radio-label">
									<span class="circle blue-background"></span><span>Doing</span>
								</label>
							</li>
							<li>
								<input type="radio" id="done-radio" name="status-option" value="Done"
									class="radio-input" />
								<label for="done-radio" class="radio-label">
									<span class="circle green-background"></span><span>Done</span>
								</label>
							</li>
						</ul>
						<div class="text-center">
							<button type="submit" class="button subBut regular-button green-background cta-button">
								Add task
							</button>
						</div>
					</form>
				</div>
			</div>

			<!-- view task including name, description, due date, status-->
			<div id="view-task-overlay" class="overlay view-task-overlay hide">
				<div class="overlay-content green-background">
					<!-- close button -->
					<button class="button circle-button blue-background flex justify-center items-center close-button">
						<i class="fas fa-times-circle" style="font-size: 26px;"></i>

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
						<button class="button circle-button pink-background flex justify-center items-center">
							<i class="fas fa-edit" style=" font-size: 24px;"></i>

						</button>
						<!-- delete button -->
						<button id="delete-task-cta"
							class="button circle-button pink-background flex justify-center items-center">
							<i class="fas fa-trash-alt" style="font-size: 24px;"></i>

						</button>
					</div>
				</div>
			</div>


			</div>

			<!-- Logbook Section -->
			<div id="logbook-section" class="content-section">
				<!-- This section will contain the logbook entries and history -->
				<h2>Logbook Entries</h2>
				<div class="buttons-container">
					<button id="start-record-btn" class="button regular-button blue-background">Start Recording</button>
					<button id="pause-record-btn" class="button regular-button blue-background">Pause Recording</button>
					<button id="stop-record-btn" class="button regular-button blue-background">Stop Recording</button>
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<div id="editor-container">
					<textarea id="editor"></textarea>
					<button id="save-log-btn">Save Entry</button>
				</div>
				<h3 class="logHisDarkBg">Log History</h3>
				<div id="log-history"></div>
			</div>


			<!-- This section contains the goals -->
			<div id="goals-section" class="content-section" style="text-align: center;">
				<!-- Goals content here -->
				<h2>Goals</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<div class="goals-cards-container">
					<div class="goal-card">
						<img src="https://as2.ftcdn.net/jpg/06/77/42/75/480_F_677427525_ZVz95kjc7ZyZ9GMyl1JMZ9JYbSsJSAQB.jpg?token=1718161172_Sdg0fPhSbj7o6Ex7-NrVT2heXjV0-eQLKDIoubduzzA"
							alt="Welcome and Orientation" class="goal-card-image">
						<h3>Stage 1: Welcome and Orientation</h3>
						<p>Welcome to your MSc project. Begin by familiarizing yourself with the module, understanding
							the learning outcomes, and starting your initial research and planning.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as1.ftcdn.net/jpg/04/17/61/90/480_F_417619090_iVZEF560PanNYbGrgzcb0P9gYhyXFX2o.jpg?token=1718161254_8JvItNeDZXQu1web0jSRYBWr7hHb5Nf_MnaQXMkhJpo"
							alt="Identifying a Suitable Research Project" class="goal-card-image">
						<h3>Stage 2: Identifying a Suitable Research Project</h3>
						<p>Explore potential research topics, consult with your supervisor, and decide on a suitable
							research question that aligns with your interests and academic goals.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as2.ftcdn.net/jpg/06/28/39/83/480_F_628398396_s5Z0q4TW7YUMD8YWPfzs17SR0bMNnWVK.jpg?token=1718161341_Yk3tiuf8WzeDCQTPZyFYgXfmupwyywnkIyZ89qitupU"
							alt="Research Proposal and Ethical Approval" class="goal-card-image">
						<h3>Stage 3: Research Proposal and Ethical Approval</h3>
						<p>Develop a detailed research proposal, outline your methodology, and obtain ethical approval
							to ensure your research adheres to the required standards.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as1.ftcdn.net/jpg/05/09/05/82/480_F_509058256_nphBp09kkNAGytfPgMYmQRwmKuRcxwbV.jpg?token=1718161370_o51Nw-gIfBpj8h2xuznvPX0kaiHox9_XvEyVXhcgxeU"
							alt="In-Depth Research and Development" class="goal-card-image">
						<h3>Stage 4: In-Depth Research and Development</h3>
						<p>Engage in thorough research, including a literature review and data gathering. Begin
							developing your research project, addressing technical challenges and innovations.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as2.ftcdn.net/jpg/03/10/44/47/480_F_310444774_I5ZIBss4A9JYrdtSN9awcOp80YTw7f2F.jpg?token=1718161398_NfASUXUt5FyLUJMDtyHXGnplkx0ps6LzJ2E4rCHtZBI"
							alt="Analysis and Findings" class="goal-card-image">
						<h3>Stage 5: Analysis and Findings</h3>
						<p>Analyze the data collected, review the results, and start drafting your findings. Discuss
							these findings in the context of existing literature and your research question.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as2.ftcdn.net/jpg/03/85/54/25/480_F_385542563_td2gWMFkpPbs86udFmklM9D1OWHIRVgB.jpg?token=1718161423_f_WzMU93nFk8-dDh7fNIBPIvxeCWK17Gw3KrErMmraU"
							alt="Writing and Reviewing" class="goal-card-image">
						<h3>Stage 6: Writing and Reviewing</h3>
						<p>Compose your dissertation, consolidate your research findings, and critically evaluate your
							work. Share drafts with your supervisor for feedback and refinement.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as1.ftcdn.net/jpg/02/99/42/00/480_F_299420062_L6HJYIW6tFW3Vw84oIe9bLf2pZxJeZSp.jpg?token=1718161456_vRJUFz52OWcwf6_uKc1M3yKATyjBFphekonujBJ-hS4"
							alt="Revision and Submission Preparation" class="goal-card-image">
						<h3>Stage 7: Revision and Submission Preparation</h3>
						<p>Finalize your dissertation, ensuring that all components meet the standards and guidelines
							provided. Prepare for submission by reviewing formatting and content completeness.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>
					<div class="goal-card">
						<img src="https://as2.ftcdn.net/jpg/06/87/46/91/480_F_687469114_r16mDxEkiXADPhtiQlifrNUoYSD4EqNA.jpg?token=1718161504_ZrvD_E7t3irB2KKkF2fbYesFEthLq11Dfy3HkWRr91M"
							alt="Submission and Viva" class="goal-card-image">
						<h3>Stage 8: Submission and Viva</h3>
						<p>Submit your dissertation and prepare for the viva voce. Review your project thoroughly to
							articulate and defend your research outcomes confidently.</p>
						<button class="mark-done-btn">Mark as Done</button>
					</div>

				</div>
			</div>

			<div id="meetings-section" class="content-section">
				<!-- Meeting Agendas content here -->
				<h2>Meeting Agendas</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<div class="meeting-scheduler">
					<h3>Scheduled Meetings</h3>

					<ul class="scheduled-meetings-list">
						<li>
							<span class="meeting-date">May 5, 2024</span>
							<span class="meeting-with">Dr. Smith (Supervisor)</span>
							<span class="meeting-topic">Research Methodology Discussion</span>
							<button class="edit-btn">Edit</button>
							<button class="delete-btn">Delete</button>
						</li>
						<!-- Add more scheduled meetings here -->
					</ul>
					<h3>Schedule a New Meeting</h3>
					<form class="schedule-meeting-form">
						<label for="meeting-date">Date:</label>
						<input type="date" id="meeting-date" name="meeting-date">
						<label for="meeting-with">Meeting with:</label>
						<input type="text" id="meeting-with" name="meeting-with" value="Supervisor">
						<label for="meeting-topic">Topic:</label>
						<input type="text" id="meeting-topic" name="meeting-topic">
						<button type="submit">Schedule Meeting</button>
					</form>
				</div>

				<!-- This section will contain the list of meeting history -->
				<div class="meeting-history">
					<h3>Meeting History</h3>
					<ul class="meeting-history-list">
						<li>April 20, 2024: Discussion on initial research findings with Dr. Smith</li>
						<li>April 10, 2024: Planning the project timeline with Dr. Smith</li>
						<li>March 30, 2024: Review of literature search progress with Dr. Smith</li>
						<li>March 20, 2024: Initial project meeting and goal setting with Dr. Smith</li>
						<li>March 10, 2024: Discussion on research proposal with Dr. Smith</li>
						<li>March 1, 2024: Review of research methodology with Dr. Smith</li>
						<li>February 20, 2024: Discussion on project scope with Dr. Smith</li>
						<li>February 10, 2024: Review of project objectives with Dr. Smith</li>
						<li>February 1, 2024: Initial meeting to discuss project ideas with Dr. Smith</li>
						<li>January 20, 2024: Preliminary discussion on potential research topics with Dr. Smith
						</li>
					</ul>
				</div>
			</div>

			<div id="reflections-section" class="content-section">
				<!-- Reflections content here -->
				<h2>Reflections</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<div class="reflection-container">
					<!-- Row 1 -->
					<div class="reflection-row">
						<div class="reflection-card">
							<h3>Research Process and Methodology</h3>
							<textarea placeholder="Reflect on your research methodology and process..."></textarea>
						</div>
						<div class="reflection-card">
							<h3>Literature Review and Critical Thinking</h3>
							<textarea
								placeholder="Reflect on the literature review process and your critical thinking..."></textarea>
						</div>
						<div class="reflection-card">
							<h3>Time Management and Project Planning</h3>
							<textarea
								placeholder="Reflect on how you managed your time and planned the project..."></textarea>
						</div>
					</div>

					<!-- Row 2 -->
					<div class="reflection-row">
						<div class="reflection-card">
							<h3>Data Collection and Analysis</h3>
							<textarea placeholder="Reflect on the data collection and analysis phases..."></textarea>
						</div>
						<div class="reflection-card">
							<h3>Writing and Communication Skills</h3>
							<textarea
								placeholder="Reflect on the development of your writing and communication skills..."></textarea>
						</div>
						<div class="reflection-card">
							<h3>Problem-Solving and Adaptability</h3>
							<textarea
								placeholder="Reflect on problem-solving and adaptability during your research..."></textarea>
						</div>
					</div>

					<!-- Row 3 -->
					<div class="reflection-row">
						<div class="reflection-card">
							<h3>Personal Growth and Development</h3>
							<textarea placeholder="Reflect on your personal growth and development..."></textarea>
						</div>
						<div class="reflection-card">
							<h3>Collaboration and Support</h3>
							<textarea
								placeholder="Reflect on your experiences with collaboration and support..."></textarea>
						</div>
						<div class="reflection-card">
							<h3>Ethical and Social Implications</h3>
							<textarea
								placeholder="Reflect on the ethical and social implications of your research..."></textarea>
						</div>
					</div>

					<!-- Row 4 -->
					<div class="reflection-row">
						<div class="reflection-card">
							<h3>Future Applications and Implications</h3>
							<textarea
								placeholder="Reflect on future applications and implications of your research..."></textarea>
						</div>
					</div>
				</div>

				<!-- History of Reflections -->
				<div class="reflection-history">
					<h2>History of Reflections</h2>
					<ul>
						<li><strong>Date:</strong> [Date] - <strong>Reflection:</strong> [Reflection text here...]</li>
						<!-- More entries -->
					</ul>
				</div>
			</div>

			<div id="export-section" class="content-section">
				<!-- Export Data content here -->
				<h2>Export Data</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<p class="tbody">Content for Export Data section.</p>
				<a href="#" class="btn-download">
					<i class='fas fa-cloud-download'></i>
					<span class="text">Download PDF</span>
				</a>
				<div class="export-container">
					<h2>Export Your Data</h2>
					<form id="export-form">
						<div class="form-group">
							<label for="data-type">Select Data to Export:</label>
							<select id="data-type" name="data_type">
								<option value="logbook">Logbook Entries</option>
								<option value="meetings">Meeting Agendas</option>
								<option value="tasks">Tasks</option>
								<option value="reflections">Reflections</option>
								<option value="all">All Data</option>
							</select>
						</div>
						<div class="form-group">
							<label for="export-format">Select Export Format:</label>
							<select id="export-format" name="export_format">
								<option value="pdf">PDF</option>
								<option value="csv">CSV</option>
								<option value="txt">Text File</option>
							</select>
						</div>
						<button type="button" onclick="exportData()">Export</button>
					</form>
				</div>
				<!-- Download link -->
				<div id="download-link" class="download-link" style="display:none;">
					<p>Click <a href="#" download>here</a> to download your file.</p>
				</div>

			</div>

			<!-- Resources Section -->
			<div id="resources-section" class="content-section">
				<!-- Resources content here -->
				<h2>Dissertation Resources and Tools</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<div class="resource-cards">
					<!-- Each card includes an image and a link -->
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/03/26/34/13/480_F_326341304_AUUCRH4Sh0prCFx2DIQI1GLFKLH6d4Ge.jpg?token=1718162898_aVrIA4A9qfe48xeeTkKTUKlupx0nylEoRCoH6pjxRvI"
							alt="Library Resources">
						<h3>Library Resources</h3>
						<p>Access a vast collection of books, eBooks, databases, special collections, and research
							guides. <a href="https://www.northumbria.ac.uk/research/university-library/">Northumbria
								Library</a></p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/01/58/96/34/480_F_158963468_k7oMT3Mg4SC3afrD0MnQsYx7zFNVFfiq.jpg?token=1718163171_xh9Q5_ceQx85itcLixEN4YsgtK4BbqH9uUDCMFX0zmk"
							alt="Online Databases">
						<h3>Online Databases and Journals</h3>
						<p>Comprehensive access to databases like JSTOR, PubMed, and Google Scholar for scholarly
							articles across various fields.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/06/08/09/74/480_F_608097466_hRVYVJTWOv6vTtp2Gw2XOe63li7NebZ9.jpg?token=1718163201_xKEHKQVUVuxSuLJx9odVwOVuHgYvY6JJqvRrUlfD0KM"
							alt="Writing Centers">
						<h3>Writing Centers and Support Services</h3>
						<p>University writing centers offer assistance, workshops, and seminars on academic writing and
							proper citation.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/05/90/97/01/480_F_590970194_AH2NZoyh0xVZ9iqFUlTjjoVuxnRpxlVF.jpg?token=1718163388_4JvU6pMfNy0suoYuw6GM23IcVUv0TOt0xtf1_kUj3no"
							alt="Software Tools">
						<h3>Software Tools</h3>
						<p>Use tools like Zotero, EndNote, and Mendeley for reference management, and SPSS, Stata, and R
							for data analysis.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/07/65/90/78/480_F_765907885_60Fvv8ghg8nEY5jyBxXbJvfjH7Q5RuRg.jpg?token=1718163412_14KNedyD0gUuT8hntDAFQ5VKlfE_7w2ibmKqt_8WxnQ"
							alt="Academic Advisors">
						<h3>Academic Advisors and Mentors</h3>
						<p>Guidance from dissertation supervisors and committee members on research direction, feedback,
							and support.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/07/77/10/85/480_F_777108575_3RRypaCyuLeD1YQ5oehVNgHtS0v1KIqm.jpg?token=1718163471_SSNh1InfH58EcrD9tiIG3Ilo0ZOuosSNLqOFz7AzXIM"
							alt="Workshops">
						<h3>Workshops and Seminars</h3>
						<p>Attend research methodology and academic writing workshops to enhance your research and
							writing skills.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/00/80/59/00/480_F_80590055_aGAeQaiEjGyWURlY8QbNGN62ASeYpVRF.jpg?token=1718163550_Cjsa0jMyus8Hx3DOMHdv9Z3t-GYxa4xlA34V9Vj5Xyo"
							alt="Online Forums">
						<h3>Online Forums and Academic Networks</h3>
						<p>Engage with platforms like ResearchGate and Academia.edu to interact with other researchers
							and share your work.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/00/78/42/54/480_F_78425453_R9b8w6DFLcOatZKyhUoOxUWY02EhQXMh.jpg?token=1718163571_SmHe9SMhHZGjXcfd29rBHocefZCGGxr2sevhS0JpA2o"
							alt="Literature Review">
						<h3>Literature Review Resources</h3>
						<p>Access systematic review tools and historical archives crucial for conducting thorough
							literature reviews.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/06/97/70/92/480_F_697709267_vkGjCw8SZhNh042WXaY4FBfFLxDSGWfO.jpg?token=1718163596_Goq0YuwKz1i0FEGK4DbMfeLBNNzUASbNb727LuesiQw"
							alt="Editing Services">
						<h3>Professional Editing Services</h3>
						<p>Utilize copy editing and formatting services to refine the dissertation's clarity, tone, and
							consistency.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/02/85/02/85/480_F_285028532_S5oZyQ6bgRmbaOeUFd8y7Y1HdG2wVbJo.jpg?token=1718163625_IAeli2dUqiPupNOYVYIGJA9Nb5Y5Wx_299VBdqm_tBo"
							alt="Peer Support">
						<h3>Peer Support</h3>
						<p>Join study groups and online peer review platforms to receive feedback and support from
							fellow researchers.</p>
					</div>
					<!-- Technical resources cards with placeholders -->
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/06/25/35/94/480_F_625359466_gHSlILsfDZaGRBvtGvXjauoactk4SNmu.jpg?token=1718163651_mggvAK9pPbxUbdiUaGaSoeznYpl0LDSoSI8PMWAB3B4"
							alt="Development Environments">
						<h3>Programming and Development Environments</h3>
						<p>Use IDEs like Visual Studio, Eclipse, and Jupyter Notebooks for software development and data
							science projects.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/07/96/18/90/480_F_796189060_K1V0avT4KK6wQDqxLj8v8SYgy0gTNYNQ.jpg?token=1718163681_YNAiUmE2YQmQNDHjxBEc4qWYMp5QM5-vvpp1vCgH7tc"
							alt="Data Analysis Software">
						<h3>Data Analysis and Statistical Software</h3>
						<p>Software like MATLAB, R, Python, SPSS, and Stata for detailed data analysis and
							visualization.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/08/00/02/59/480_F_800025905_QrlzQ1aRHCYUTlIVsorpzgbdFN0aiFuz.jpg?token=1718163701_MOAEANKIjiysmNT5NeOhAbD2OXYG2g0AbE-9zVssTb8"
							alt="Simulation Software">
						<h3>Simulation and Modeling Software</h3>
						<p>Use ANSYS, Abaqus, AutoCAD, and SolidWorks for advanced simulation and modeling in various
							engineering fields.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/07/53/64/37/480_F_753643731_Go9ITgIjbKt6XltssMu9M2HaTUWNEC0j.jpg?token=1718163651_gK7ys0L1O6Sr9eDLBdQWKNe_2iNKLDvF33UOltLlyec"
							alt="Version Control">
						<h3>Version Control Systems</h3>
						<p>Manage your project documents and code with version control systems like Git, GitHub, GitLab,
							and Bitbucket.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/08/29/93/84/480_F_829938447_Ztz2m17Mat4NMrsToHzzt1ToPeXHTzRn.jpg?token=1718163681_CVGibcP-1NttUDTKAZi7_OtvIxnBnjXAZQjzmhqPAOk"
							alt="Database Management">
						<h3>Database Management Systems</h3>
						<p>Organize and manage data with MySQL, PostgreSQL, MongoDB, and Firebase.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/07/90/97/39/480_F_790973915_5eriVECM3zqFyp3pC4yACphN7iiby5SB.jpg?token=1718163701_k6UXYNPp5e0bzXdIHun8pOtsjh-2JDZimp3DmYBvQpk"
							alt="Cloud Computing">
						<h3>Cloud Computing Platforms</h3>
						<p>Deploy applications on AWS, Google Cloud Platform, and Microsoft Azure.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/01/70/13/54/480_F_170135489_r9P0Mol8WWCrW3R5qmFUMsDLxajWGKax.jpg?token=1718163829_TSs4UkN1bW0uxOE41pt1fIvRwVceg71wUUfEAG9b4d0"
							alt="AI and Machine Learning">
						<h3>Machine Learning and Artificial Intelligence</h3>
						<p>Build AI models with TensorFlow, PyTorch, Keras, and integrate with OpenAI APIs.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/06/02/45/61/480_F_602456111_f5Wy6biNG5Db6ZqIB1WnVmB15eJOlLZg.jpg?token=1718163859_ElrH4TDezJ0H5B1fdKKWMlHC-g-Tfd94Db6pCzTdjBY"
							alt="SDKs and APIs">
						<h3>Software Development Kits (SDKs) and APIs</h3>
						<p>Develop applications with SDKs for Android and iOS, and use APIs for service integration like
							Google Maps.</p>
					</div>
					<div class="card">
						<img src="https://as1.ftcdn.net/jpg/01/61/72/32/480_F_161723287_B4pvGKwAKte5TZovqf2ThRg30ifhgRdi.jpg?token=1718163884_2lOICmLHi2AfHGgiwkSCOktTKpZzA9ABs3FQhcPOUzs"
							alt="Data Visualization">
						<h3>Data Visualization Tools</h3>
						<p>Create complex data visualizations with tools like Tableau and Microsoft Power BI.</p>
					</div>
					<div class="card">
						<img src="https://as2.ftcdn.net/jpg/07/02/59/39/480_F_702593991_Vd9gdpkx24QCQBGpsl4jhSX73oOj5rgB.jpg?token=1718163907_xHZxBI6iv4bVNThwL0J8w0lzIAOBpOIGQmEAwRpYIB4"
							alt="Networking Tools">
						<h3>Networking and Cybersecurity Tools</h3>
						<p>Tools like Wireshark and Nmap for network protocol analysis and network troubleshooting.</p>
					</div>
				</div>


				<!-- Utilization Tips container-->
				<div class="utilization-tips">
					<h3>Utilization Tips</h3>
					<p>Start early, stay organized, seek feedback, and ensure effective tool integration.</p>
				</div>
			</div>

			<div id="activity-section" class="content-section">
				<!-- This area contains Activity Log content -->
				<h2>Activity Log</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<table id="activity-log-table" class="activity-log-table">
					<thead>
						<tr>
							<th>Date & Time</th>
							<th>User</th>
							<th>Action</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody class="tbody">
						<!-- Log entries will be dynamically inserted here -->
					</tbody>
				</table>
			</div>

			<div id="access-section" class="content-section">
				<!-- Access Control content here -->
				<h2>Access Control</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<p class="tbody">Manage who can see and interact with your dissertation content.</p>
				<div class="access-control-container">
					<table class="access-table">
						<thead>
							<tr>
								<th>Role</th>
								<th>Permissions</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody class="tbody">
							<tr>
								<td>Student</td>
								<td>View, Edit, Delete</td>
								<td><button>Edit</button></td>
							</tr>
							<tr>
								<td>Supervisor</td>
								<td>View, Comment</td>
								<td><button>Edit</button></td>
							</tr>
							<tr>
								<td>External Examiner</td>
								<td>View Only</td>
								<td><button>Edit</button></td>
							</tr>
							<tr>
								<td>Peers</td>
								<td>View, Comment</td>
								<td><button>Edit</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- This section will contain collaboration tools and features -->
			<div id="collaborate-section" class="content-section">
				<!-- Collaborate content here -->
				<h2>Collaborate</h2>

				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<p class="tbody">Coordinate and communicate with your team for effective collaboration on your
					dissertation project.
				</p>
				<div class="meeting-tools">
					<button onclick="window.open('https://meet.google.com', '_blank')">Google Meet</button>
					<button onclick="window.open('https://teams.microsoft.com', '_blank')">Microsoft Teams</button>
					<button onclick="window.open('https://zoom.us', '_blank')">Zoom</button>
				</div>
				<div class="meeting-scheduler">
					<h3>Schedule a Meeting</h3>
					<form>
						<input type="text" id="meeting-topic" placeholder="Meeting Topic" required>
						<input type="datetime-local" id="meeting-time" required>
						<input type="text" id="invite-participants" placeholder="Invite Participants (emails)" required>
						<button type="submit" onclick="scheduleMeeting()">Schedule</button>
					</form>
				</div>

				<!-- Screen Share feature -->
				<div class="screen-share">
					<h3>Share Your Screen</h3>
					<button onclick="startScreenShare()">Start Screen Sharing</button>
				</div>
			</div>

			<!-- This section will contain integration tools and resources -->
			<div id="tools-section" class="content-section">
				<!-- Integration Tools content here -->
				<h2>Integration Tools</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<div class="tools-container">


					<div class="tool-category">
						<h3>Reference Management Software</h3>
						<ul>
							<li>Zotero</li>
							<li>EndNote</li>
							<li>Mendeley</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Collaboration Platforms</h3>
						<ul>
							<li>Microsoft Teams</li>
							<li>Slack</li>
							<li>Google Workspace</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Document and File Sharing</h3>
						<ul>
							<li>Dropbox</li>
							<li>Google Drive</li>
							<li>OneDrive</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Project Management Tools</h3>
						<ul>
							<li>Trello</li>
							<li>Asana</li>
							<li>Monday.com</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Data Analysis Software</h3>
						<ul>
							<li>SPSS</li>
							<li>Stata</li>
							<li>R Studio</li>
							<li>MATLAB</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Version Control Systems</h3>
						<ul>
							<li>Git</li>
							<li>GitHub</li>
							<li>GitLab</li>
							<li>Bitbucket</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Writing and Editing Tools</h3>
						<ul>
							<li>Overleaf (for LaTeX)</li>
							<li>Grammarly</li>
							<li>Turnitin (plagiarism checker)</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Database Management Tools</h3>
						<ul>
							<li>MySQL</li>
							<li>PostgreSQL</li>
							<li>MongoDB</li>
							<li>Firebase</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Statistical and Computational Tools</h3>
						<ul>
							<li>Python (with libraries like NumPy, SciPy, Pandas)</li>
							<li>Jupyter Notebooks</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>APIs for Integration</h3>
						<ul>
							<li>OpenAI API (for AI and machine learning applications)</li>
							<li>Google Maps API (for geographic data integration)</li>
							<li>Twitter API (for social media data analysis)</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Data Visualization Tools</h3>
						<ul>
							<li>Tableau</li>
							<li>Power BI</li>
							<li>D3.js</li>
						</ul>
					</div>


					<div class="tool-category">
						<h3>Cloud Computing Services</h3>
						<ul>
							<li>Amazon Web Services (AWS)</li>
							<li>Google Cloud Platform</li>
							<li>Microsoft Azure</li>
						</ul>
					</div>

				</div>
			</div>

			<!-- This section will contain feedback and revision tools -->
			<div id="analytics-section" class="content-section">

				<!-- Analytics Dashboard content here -->
				<h2>Analytics Dashboard</h2>
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				<!-- Progress Tracking Charts -->
				<div class="chart-row">

					<div class="chart1-container">
						<h2>Overall Progress</h2>
						<canvas id="progressChart" class="small-chart"></canvas>
					</div>
					<div class="chart1-container">
						<h2>Milestone Completion</h2>
						<canvas id="milestoneChart" class="small-chart"></canvas>
					</div>
				</div>
				<!-- Time Management Charts -->
				<div class="chart-row">

					<div class="chart1-container">
						<h2>Time Spent</h2>
						<canvas id="timeSpentChart" class="small-chart"></canvas>
					</div>

					<div class="chart1-container">
						<h2>Time Forecasting</h2>
						<canvas id="timeForecastChart" class="small-chart"></canvas>
					</div>
				</div>
				<!-- Activity Metrics Charts -->
				<div class="chart-row">

					<div class="chart1-container">
						<h2>Daily/Weekly Activity Logs</h2>
						<canvas id="activityLogChart" class="small-chart"></canvas>
					</div>


					<!-- Resource Usage Charts -->
					<div class="chart1-container">
						<h2>Library Resources Usage</h2>
						<canvas id="libraryResourcesChart" class="small-chart"></canvas>
					</div>

				</div>
				<div class="chart-row">

					<div class="chart1-container">
						<h2>Software and Tools Utilization</h2>
						<canvas id="toolsUtilizationChart" class="small-chart"></canvas>
					</div>

					<!-- Feedback and Revisions Charts -->
					<div class="chart1-container">
						<h2>Feedback Overview</h2>
						<canvas id="feedbackOverviewChart" class="small-chart"></canvas>
					</div>
				</div>
				<div class="chart-row">

					<div class="chart1-container">
						<h2>Revision History</h2>
						<canvas id="revisionHistoryChart" class="small-chart"></canvas>
					</div>

					<div class="chart1-container">
						<h2>Data Collection Progress</h2>
						<canvas id="dataCollectionProgressChart" class="small-chart"></canvas>
					</div>
				</div>
			</div>


			<div id="leaderboard-section" class="content-section">
				<div class="buttons-container">
					<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
				</div>
				
				<h2>UniLogue Leaderboard</h2>
				<div class="user-info-container">
					<div class="achievements-badges">
						<h3>Your Achievements and Badges</h3>
						<i class="fas fa-medal"></i>
					</div>
					<div class="user-ranking">
						<h3>Your Ranking: <span>3</span> for this week</h3>
					</div>
					<div class="streak-message">
						<h3>Maintain your <span>#Uniloguestreak</span> by adding today's entry</h3>
						<p>If you don't add a journal entry every week, your streak will reset. Compete with others to keep your streak going strong and stay on top!</p>
						<button class="streak-button">
							<i class="fas fa-clock"></i> Streak: <span>4</span>
						</button>
					</div>
				</div>
				<div class="leaderboard-wrapper">
					<div class="leaderboard-section">
						<div class="leaderboard-tabs">
							<div class="leaderboard-tabs-inner">
								<ul>
									<li data-li="today">Today</li>
									<li class="active" data-li="month">Month</li>
									<li data-li="year">Year</li>
								</ul>
							</div>
						</div>
				
						<div class="leaderboard-wrap">
							
							<div class="leaderboard-item today" style="display: none;">
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as2.ftcdn.net/jpg/04/93/99/55/480_F_493995598_rfQeU8BFv2v5iEKV0WVZgSifPLCpnzBk.png?token=1718588363_-I1JSyR1-teLz25nfsrarQOk0cFOBzbqqIGuKqfzZ8I" alt="a woman design">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>1.</span> preeti</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 95%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										185 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as2.ftcdn.net/jpg/03/00/06/69/480_F_300066978_QnLmL5HK9qd8dec9BDzmGZK8IucDYGqp.png?token=1718588495_AIAEZ1uCQUc787Hiqen4aHIcIoSnu07KlaE624dbs1I" alt="A man">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>2.</span>Mistus</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 80%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										175 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/05/37/39/42/480_F_537394264_NJU3yc6oPXzE2j2ikmOtAjr1UWcy5fOA.png?token=1718588495_ZKiOm16Htn_chLiv0z6iAhnJ1MhFwd7gJoSoWUlN_nc" alt="man thinking">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>3.</span>clarison</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 60%;"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										150 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/04/81/40/06/480_F_481400604_hYVE6zrE9Qt6Qi7kO6eYu8m4bTeijKf4.png?token=1718588363_yOXgRsjVb1J7ij8M9jB9YHVU0xZUf7hZaCeWOk4wZmY" alt="woman showing her phone">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>4.</span>sunny michelle</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 30%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										120 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/05/54/24/06/480_F_554240627_lAp89pxjKl4GMqTYNrmtuxPp0HotQTpA.png?token=1718588363_JIGpfP2YIHiAf6AydIyoUuZ2AUT1711xVAEt5iaLXZM" alt="a woman dressed and posing">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>5.</span>Sonya gandhi</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 10%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										100 points
									</div>
								</div>
							</div>
							<div class="leaderboard-item month" style="display: block;">
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/04/95/05/96/480_F_495059651_oKLGPTKrhSDQeAeLqZ2utJhUoZUXTIQy.png?token=1718588495_ZgbR8V8MaPaIcMKPUaebgyTCKVJ8HqZK8msmEH9gnvo" alt="man in cap">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>1.</span> Vamshi kumar</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 95%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										1095 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/05/29/09/80/480_F_529098086_ZvpM0eRydt2xZ0uzWjgw1L1DSJiu0491.png?token=1718588363_N5sdD64MuDx8R849c_a-bE6sV_iVZedqOEpL6z5V-EQ" alt="woman trying to write">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>2.</span>hyndavi</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 80%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										1195 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as2.ftcdn.net/jpg/05/27/82/37/480_F_527823705_hmQfGH366omutvSC7FgH3NNevqv4bbeh.png?token=1718588495_E-lSa12jo_2Qe2kFLztszhpUGsgSxx5xMf1MptEWse0" alt="a man">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>3.</span>rahul mahapatra</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 70%;"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										1150 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as2.ftcdn.net/jpg/05/54/24/07/480_F_554240739_Hd8kbeMpAWYaOtbNCsHogqsnkabEsErG.png?token=1718588363_aRov7vZ6EiH0xS1GVmuQXxhoVEcODKGcBlqhAq1Vr4c" alt="a woman greeting">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>4.</span>janet sinsiya</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 50%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										1120 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/06/03/73/06/480_F_603730693_vSjj2neXkV3vW4uRlC34YKZE0nqNMIOJ.png?token=1718588363_wDet9yuxY7HDQPfPj2fixBd-YbaDfHmRR5_MJHQptSU" alt="a faceless woman">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>5.</span>haleza amir</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 30%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										1100 points
									</div>
								</div>
							</div>
							<div class="leaderboard-item year" style="display: none;">
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/04/38/47/18/480_F_438471854_37BfQnmQ8tAYPIAlC7zGVmvibgmrnVBh.png?token=1718588495_CnnOQcHk74RLBO9Ii7nL9NSYOQ_JudbUwVG5P5bhd0Y" alt="man in glasses">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>1.</span>swastik</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 90%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										2185 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as2.ftcdn.net/jpg/06/38/32/09/480_F_638320901_UMwVf06bpJZH3raVzPIik85VjoIlkHW1.png?token=1718588495_wk88jnFWw0nOevw5zMuw4eutCM8HW0r9twZyiILq7vQ" alt="grumpy man">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>2.</span>jahns</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 85%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										2175 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/06/30/13/32/480_F_630133286_jMRZJfGfYpA4LeK8fO6enf9HEbw7JtaP.png?token=1718588495_L_BMZqU9JCs3QJ7VM5VJp4KIn6rLDf4UczJwXzq21lc" alt="smiling man">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>3.</span>kundra mishra</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 65%;"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										2140 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as1.ftcdn.net/jpg/04/95/05/96/480_F_495059626_lESSwo4LOe2Xa8GfvdMDZWye2eIbfaDC.png?token=1718588363_QL7ZkcG9--lsPP-LU7CjNuspJ5kF-N2LhJdZ-tDCCtA" alt="a girl">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>4.</span>deepthi sun</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 30%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										2330 points
									</div>
								</div>
								<div class="leaderboard-mem">
									<div class="leaderboard-img">
										<img src="https://as2.ftcdn.net/jpg/04/95/05/95/480_F_495059591_Df6oXDxHPxQ6A2B8tYaSs6zY380jJZBD.png?token=1718588991_nhjCQ-thdPeuICsG8li43WB7wFn7nvnEmhjc5cOhlKw" alt="red hair woman">
									</div>
									<div class="leaderboard-name-bar">
										<p><span>5.</span>alexa siri</p>
										<div class="leaderboard-bar-wrap">
											<div class="leaderboard-inner-bar" style="width: 10%"></div>
										</div>
									</div>
									<div class="leaderboard-points">
										2510 points
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<!-- This section will contain settings and customization options -->
			<div id="settings-section" class="content-section">
				<!-- Settings content here -->
				<div class="settings-page">
					<h1>Settings</h1>
					<div class="buttons-container">
						<button class="close-section-cta"><i class="fas fa-times-circle"></i></button>
					</div>

					<!-- Profile Settings -->
					<div class="settings-section">
						<h2>Profile Settings</h2>
						<div class="settings-content">
							<label for="profile-pic">Profile Picture</label>
							<input type="file" id="profile-pic" class="settings-input">

							<label for="name">Name</label>
							<input type="text" id="name" class="settings-input" placeholder="Enter your name">

							<label for="email">Email</label>
							<input type="email" id="email" class="settings-input" placeholder="Enter your email">

							<label for="password">Password</label>
							<input type="password" id="password" class="settings-input"
								placeholder="Enter new password">
						</div>
					</div>

					<div class="settings-section">
						<h2>Notification Settings</h2>
						<div class="settings-content">
							<label for="email-notifications">Email Notifications</label>
							<input type="checkbox" id="email-notifications" class="settings-checkbox">

							<label for="push-notifications">Push Notifications</label>
							<input type="checkbox" id="push-notifications" class="settings-checkbox">

							<label for="reminder-notifications">Reminder Notifications</label>
							<input type="checkbox" id="reminder-notifications" class="settings-checkbox">
						</div>
					</div>

					<div class="settings-section">
						<h2>Diary and Logbook Settings</h2>
						<div class="settings-content">
							<label for="default-view">Default View</label>
							<select id="default-view" class="settings-select">
								<option value="calendar">Calendar View</option>
								<option value="list">List View</option>
							</select>

							<label for="entry-templates">Entry Templates</label>
							<textarea id="entry-templates" class="settings-textarea"
								placeholder="Define your entry templates here"></textarea>

							<label for="privacy-settings">Privacy Settings</label>
							<select id="privacy-settings" class="settings-select">
								<option value="public">Public</option>
								<option value="private">Private</option>
								<option value="custom">Custom</option>
							</select>
						</div>
					</div>

					<div class="settings-section">
						<h2>Goal and Task Management</h2>
						<div class="settings-content">
							<label for="default-goal-priority">Default Goal Priority</label>
							<select id="default-goal-priority" class="settings-select">
								<option value="high">High</option>
								<option value="medium">Medium</option>
								<option value="low">Low</option>
							</select>

							<label for="task-categories">Task Categories</label>
							<textarea id="task-categories" class="settings-textarea"
								placeholder="Enter task categories here"></textarea>

							<label for="recurring-tasks">Recurring Tasks</label>
							<textarea id="recurring-tasks" class="settings-textarea"
								placeholder="Define recurring tasks here"></textarea>
						</div>
					</div>

					<div class="settings-section">
						<h2>Meeting Agenda Settings</h2>
						<div class="settings-content">
							<label for="default-meeting-template">Default Meeting Template</label>
							<textarea id="default-meeting-template" class="settings-textarea"
								placeholder="Define your meeting template here"></textarea>

							<label for="agenda-sharing">Agenda Sharing</label>
							<select id="agenda-sharing" class="settings-select">
								<option value="team">Team Members</option>
								<option value="supervisor">Supervisor</option>
								<option value="public">Public</option>
							</select>

							<label for="meeting-reminders">Meeting Reminders</label>
							<input type="checkbox" id="meeting-reminders" class="settings-checkbox">
						</div>
					</div>

					<div class="settings-section">
						<h2>Reflection Settings</h2>
						<div class="settings-content">
							<label for="reflection-prompts">Reflection Prompts</label>
							<textarea id="reflection-prompts" class="settings-textarea"
								placeholder="Define reflection prompts here"></textarea>

							<label for="reflection-templates">Reflection Templates</label>
							<textarea id="reflection-templates" class="settings-textarea"
								placeholder="Define reflection templates here"></textarea>
						</div>
					</div>

					<div class="settings-section">
						<h2>Data Export Settings</h2>
						<div class="settings-content">
							<label for="export-format">Export Format</label>
							<select id="export-format" class="settings-select">
								<option value="pdf">PDF</option>
								<option value="csv">CSV</option>
								<option value="txt">Text File</option>
							</select>

							<label for="export-frequency">Export Frequency</label>
							<select id="export-frequency" class="settings-select">
								<option value="weekly">Weekly</option>
								<option value="monthly">Monthly</option>
								<option value="manual">Manual</option>
							</select>

							<label for="include-sections">Include Sections</label>
							<textarea id="include-sections" class="settings-textarea"
								placeholder="Define sections to include in exports"></textarea>
						</div>
					</div>

					<div class="settings-section">
						<h2>Integration Settings</h2>
						<div class="settings-content">
							<label for="calendar-sync">Calendar Sync</label>
							<input type="checkbox" id="calendar-sync" class="settings-checkbox">

							<label for="cloud-storage">Cloud Storage</label>
							<input type="checkbox" id="cloud-storage" class="settings-checkbox">

							<label for="third-party-tools">Third-Party Tools</label>
							<textarea id="third-party-tools" class="settings-textarea"
								placeholder="Define third-party tools integration"></textarea>
						</div>
					</div>

					<!-- Custom Settings Section -->

					<div class="settings-section">
						<h2>Appearance and Theme</h2>
						<div class="settings-content">
							<label for="theme">Theme</label>
							<select id="theme" class="settings-select">
								<option value="light">Light</option>
								<option value="dark">Dark</option>
								<option value="custom">Custom</option>
							</select>

							<label for="font-size">Font Size</label>
							<select id="font-size" class="settings-select">
								<option value="small">Small</option>
								<option value="medium">Medium</option>
								<option value="large">Large</option>
							</select>

							<label for="layout">Layout</label>
							<select id="layout" class="settings-select">
								<option value="default">Default</option>
								<option value="compact">Compact</option>
								<option value="spacious">Spacious</option>
							</select>
						</div>
					</div>

					<div class="settings-section">
						<h2>Accessibility Settings</h2>
						<div class="settings-content">
							<label for="text-to-speech">Text-to-Speech</label>
							<input type="checkbox" id="text-to-speech" class="settings-checkbox">

							<label for="high-contrast">High Contrast Mode</label>
							<input type="checkbox" id="high-contrast" class="settings-checkbox">

							<label for="keyboard-shortcuts">Keyboard Shortcuts</label>
							<input type="checkbox" id="keyboard-shortcuts" class="settings-checkbox">
						</div>
					</div>

					<div class="settings-section">
						<h2>Security Settings</h2>
						<div class="settings-content">
							<label for="two-factor-auth">Two-Factor Authentication</label>
							<input type="checkbox" id="two-factor-auth" class="settings-checkbox">

							<label for="session-timeout">Session Timeout</label>
							<select id="session-timeout" class="settings-select">
								<option value="5">5 Minutes</option>
								<option value="10">10 Minutes</option>
								<option value="30">30 Minutes</option>
								<option value="60">1 Hour</option>
							</select>

							<label for="access-logs">Access Logs</label>
							<textarea id="access-logs" class="settings-textarea"
								placeholder="View and manage access logs"></textarea>
						</div>
					</div>

					<div class="settings-section">
						<h2>Help and Support</h2>
						<div class="settings-content">
							<label for="user-guide">User Guide</label>
							<button id="user-guide" class="settings-button">View User Guide</button>

							<label for="contact-support">Contact Support</label>
							<button id="contact-support" class="settings-button">Contact Support</button>

							<label for="feedback">Feedback</label>
							<textarea id="feedback" class="settings-textarea"
								placeholder="Provide your feedback or suggestions"></textarea>
						</div>
					</div>


				</div>
			</div>
		</main>
		<!-- End of MAIN -->
	</section>
	<!--End of CONTENT -->


	<!-- FOOTER -->

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="exp.js"></script>
	<script src="task.js"></script>
	<script src="logbook.js"></script>
	<script src="charts.js"></script>
	<script src="leader.js"></script>



	<script>
		// Data for "Top Reasons for Dissertation Failures" chart
		const dissertationFailuresData = {
			labels: ['Lack of Planning', 'Procrastination', 'Poor Time Management', 'Insufficient Research', 'Inadequate Writing Skills', 'Lack of Support'],
			// Data values can be dynamically updated based on user input or database queries
			datasets: [{
				label: 'Failures',
				data: [25, 20, 15, 10, 20, 10],
				backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
			}]
		};

		// Data for "Popular Project Management Tools for Researchers" chart
		const projectManagementToolsData = {
			labels: ['Trello', 'Asana', 'Jira', 'Monday.com', 'Microsoft Project', 'Basecamp'],
			datasets: [{
				label: 'Popularity',
				data: [30, 25, 20, 15, 5, 5],
				backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
			}]
		};

		// Create "Top Reasons for Dissertation Failures" chart
		const ctx1 = document.getElementById('dissertationFailuresChart').getContext('2d');
		const dissertationFailuresChart = new Chart(ctx1, {
			// The type of chart we want to create
			type: 'doughnut',
			data: dissertationFailuresData,
			options: {
				responsive: true,
				plugins: {
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Top Reasons for Dissertation Failures'
					}
				}
			},
		});

		// Create "Popular Project Management Tools for Researchers" chart
		const ctx2 = document.getElementById('projectManagementToolsChart').getContext('2d');
		const projectManagementToolsChart = new Chart(ctx2, {
			type: 'bar',
			data: projectManagementToolsData,
			options: {
				responsive: true,
				plugins: {
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Popular Project Management Tools for Researchers'
					}
				},
				scales: {
					y: {
						beginAtZero: true
					}
				}
			},
		});
	</script>

	<!-- JavaScript for dynamic log entries -->
	<script>
		const logEntries = [
			{ date: "2024-04-25 10:00", user: "Alice Smith", action: "Login", description: "Logged into the dissertation portal." },
			{ date: "2024-04-25 10:15", user: "Alice Smith", action: "Upload", description: "Uploaded the proposal draft." },
			{ date: "2024-04-25 10:30", user: "Alice Smith", action: "Edit", description: "Edited the literature review section." },
			{ date: "2024-04-25 11:00", user: "Alice Smith", action: "Save", description: "Saved changes to the methodology chapter." },
			{ date: "2024-04-25 11:30", user: "Alice Smith", action: "Comment", description: "Added comments to supervisor's feedback." },
			{ date: "2024-04-25 12:00", user: "Alice Smith", action: "Logout", description: "Logged out of the dissertation portal." },
			{ date: "2024-04-26 09:00", user: "Alice Smith", action: "Login", description: "Logged into the dissertation portal." },
			{ date: "2024-04-26 09:20", user: "Alice Smith", action: "View", description: "Viewed feedback on chapter 3." },
			{ date: "2024-04-26 09:45", user: "Alice Smith", action: "Edit", description: "Revised the conclusions chapter." },
			{ date: "2024-04-26 10:00", user: "Alice Smith", action: "Discussion", description: "Discussed revisions with peer group." },
			{ date: "2024-04-26 10:30", user: "Alice Smith", action: "Print", description: "Printed a draft of the dissertation." },
			{ date: "2024-04-26 11:00", user: "Alice Smith", action: "Email", description: "Emailed the updated draft to the supervisor." },
			{ date: "2024-04-26 11:15", user: "Alice Smith", action: "Logout", description: "Logged out of the dissertation portal." }
		];
		// Insert log entries into the table
		const tbody = document.querySelector("#activity-log-table tbody");
		logEntries.forEach(entry => {
			const row = tbody.insertRow();
			row.innerHTML = `
				<td>${entry.date}</td>
				<td>${entry.user}</td>
				<td>${entry.action}</td>
				<td>${entry.description}</td>
			`;
		});
	</script>
	<script>
		function scheduleMeeting() {
			// Example function for scheduling meetings
			alert("Meeting scheduled!");
		}

		function startScreenShare() {
			// Example function to initiate screen sharing
			alert("Screen sharing started!");
		}
	</script>

	<script>
		// JavaScript for status dropdown
		document.querySelector('.status-select').addEventListener('click', function () {
			document.querySelector('.status-dropdown').classList.toggle('show');
		});

	</script>
<script>
    document.getElementById('reminderIcon').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('reminderPopup').style.display = 'block';
    });

    document.getElementById('closePopup').addEventListener('click', function() {
        document.getElementById('reminderPopup').style.display = 'none';
    });

    // Close the popup if the user clicks outside of it
    window.addEventListener('click', function(event) {
        if (event.target !== document.getElementById('reminderIcon') && !document.getElementById('reminderPopup').contains(event.target)) {
            document.getElementById('reminderPopup').style.display = 'none';
        }
    });
</script>

	

</body>
<!-- End of BODY -->

</html>