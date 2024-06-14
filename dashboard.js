// SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');
// JavaScript - scripts.js
document.addEventListener('DOMContentLoaded', function() {
  // Find the dashboard link by the correct method (e.g., by ID or querySelector)
  const dashboardLink = document.querySelector('.sidebar-list-item a[href="javascript:void(0);"]');
  dashboardLink.addEventListener('click', toggleDashboardPanel);
});

function toggleDashboardPanel() {
  const dashboardPanel = document.getElementById('tasks-panel');
  if (dashboardPanel.style.right === '0px' || dashboardPanel.style.right === '') {
    dashboardPanel.style.right = `-${dashboardPanel.offsetWidth}px`; // Hide the dashboard panel
  } else {
    dashboardPanel.style.right = '0'; // Show the dashboard panel
  }
}

let currentOpenPanel = '';

function togglePanel(panelId) {
    const panel = document.getElementById(panelId);
    
    // Close the current open panel if it's not the one being toggled
    if (currentOpenPanel && currentOpenPanel !== panelId) {
        const currentPanel = document.getElementById(currentOpenPanel);
        if (currentPanel) {
            currentPanel.style.right = `-${currentPanel.offsetWidth}px`;
        }
    }
    
    // Toggle the requested panel
    if (panel.style.right === '0px' || panel.style.right === '') {
        panel.style.right = `-${panel.offsetWidth}px`; // Hide the panel if it's open
        currentOpenPanel = ''; // No panel is currently open
    } else {
        panel.style.right = '0'; // Show the panel
        currentOpenPanel = panelId; // Update the current open panel
    }
}

// Initialize panels off-screen on load
document.addEventListener('DOMContentLoaded', function() {
    const panels = document.querySelectorAll('.side-panel');
    panels.forEach(panel => {
        if (!panel.style.right) {
            panel.style.right = `-${panel.offsetWidth}px`;
        }
    });
});


// You might want to initially set the dashboard panel to be hidden offscreen on page load
document.addEventListener('DOMContentLoaded', function() {
  // Set default theme
  changeTheme('default');
  
  // Initialize panels off-screen
  const panels = document.querySelectorAll('.side-panel');
  panels.forEach(panel => {
    panel.style.right = `-${panel.offsetWidth}px`;
  });
  
  // Event listeners for the sidebar toggle and theme selector
  document.querySelector('.menu-icon').addEventListener('click', toggleSidebar);
  document.getElementById('theme-select').addEventListener('change', function() {
    changeTheme(this.value);
  });

  // Function to open/close the sidebar
  function toggleSidebar() {
    sidebar.classList.toggle('sidebar-responsive');
    // ... handle other toggle functionality
  }

  // Function to change the theme
  function changeTheme(selectedTheme) {
    document.body.className = selectedTheme;
  }
});






// Update the time update function to avoid conflict
function updateTime() {
  const now = new Date();
  if (document.getElementById('date')) {
      document.getElementById('date').textContent = now.toLocaleDateString();
  }
  if (document.getElementById('time')) {
      document.getElementById('time').textContent = now.toLocaleTimeString();
  }
}

setInterval(updateTime, 1000);
// ---------- CHARTS ----------

// BAR CHART
const barChartOptions = {
  series: [{
    name: 'Failures',
    data: [45, 35, 25, 15, 10]  // Example data points for each reason
  }],
  chart: {
    type: 'bar',
    height: 350,
    toolbar: {
      show: false
    }
  },
  plotOptions: {
    bar: {
      borderRadius: 4,
      horizontal: false,
    }
  },
  dataLabels: {
    enabled: false
  },
  xaxis: {
    categories: ['Lack of Research Ideas', 'Failing Dissertation Defense', 'Non-Serious Attitude', 'Unbalanced Study and Work-Life', 'Unacademic Approach']
  }
};

const barChart = new ApexCharts(document.querySelector('#bar-chart'), barChartOptions);
barChart.render();

// AREA CHART
const areaChartOptions = {
  series: [{
    name: 'Usage Frequency',
    data: [120, 100, 85, 60, 55, 50, 45, 40, 30, 25, 20] // Hypothetical data representing usage
  }],
  chart: {
    type: 'area',
    height: 350,
    toolbar: {
      show: false
    },
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  fill: {
    type: 'gradient',
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100]
    }
  },
  xaxis: {
    categories: ['Asana', 'Trello', 'ClickUp', 'Microsoft Project', 'Monday.com', 'Basecamp', 'Kanban', 'Zoho Projects', 'Jira', 'Smartsheet', 'Wrike']
  }
};

const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
areaChart.render();

// Select all sections
const sections = document.querySelectorAll('.section');

// Intersection Observer callback
const observerCallback = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show-me');
        } else {
            entry.target.classList.remove('show-me');
        }
    });
};

// Intersection Observer options
const observerOptions = {
    rootMargin: '0px',
    threshold: 0.5  // Adjust this value based on when you want the section to animate
};

// Create the observer
const sectionObserver = new IntersectionObserver(observerCallback, observerOptions);

// Attach the observer to each section
sections.forEach(section => {
    sectionObserver.observe(section);
});


// elements
const radioViewOptions = document.querySelectorAll("input[name='view-option']");
const listView = document.getElementById("list-view");
const boardView = document.getElementById("board-view");
const addTaskCTA = document.getElementById("add-task-cta");
const setTaskOverlay = document.getElementById("set-task-overlay");
const closeButtons = document.querySelectorAll(".close-button");
const statusSelect = document.getElementById("status-select");
const statusDropdown = document.getElementById("status-dropdown");
const taskItems = document.querySelectorAll(".task-item");
const viewTaskOverlay = document.getElementById("view-task-overlay");
const deleteTaskCTA = document.getElementById("delete-task-cta");
const notification = document.getElementById("notification");
// the current active overlay
let activeOverlay = null;

//** event listeners **//

// radio buttons for view option
radioViewOptions.forEach((radioButton) => {
  radioButton.addEventListener("change", (event) => {
    const eventTarget = event.target;
    const viewOption = eventTarget.value;

    switch (viewOption) {
      case "list":
        boardView.classList.add("hide");
        listView.classList.remove("hide");
        break;
      case "board":
        listView.classList.add("hide");
        boardView.classList.remove("hide");
        break;
    }
  });
});

// add task
addTaskCTA.addEventListener("click", () => {
  setTaskOverlay.classList.remove("hide");
  activeOverlay = setTaskOverlay;
  // disable scrolling for content behind the overlay
  document.body.classList.add("overflow-hidden");
});

// close buttons inside overlays
closeButtons.forEach((button) => {
  button.addEventListener("click", () => {
    activeOverlay.classList.add("hide");
    activeOverlay = null;
    // reenable scrolling
    document.body.classList.remove("overflow-hidden");
  });
});

// open status dropdown
statusSelect.addEventListener("click", () => {
  statusDropdown.classList.toggle("hide");
});

// click a task
taskItems.forEach((task) => {
  task.addEventListener("click", () => {
    viewTaskOverlay.classList.remove("hide");
    activeOverlay = viewTaskOverlay;
    // disable scrolling for content behind the overlay
    document.body.classList.add("overflow-hidden");
  });
});

// delete a task
deleteTaskCTA.addEventListener("click", () => {
  activeOverlay.classList.add("hide");
  activeOverlay = null;
  // reenable scrolling
  document.body.classList.remove("overflow-hidden");
  // show notification & hide it after a while
  notification.classList.add("show");
  setTimeout(() => {
    notification.classList.remove("show");
  }, 3000);
});



function formatDoc(cmd, value=null) {
	if(value) {
		document.execCommand(cmd, false, value);
	} else {
		document.execCommand(cmd);
	}
}

function addLink() {
	const url = prompt('Insert url');
	formatDoc('createLink', url);
}

function handleKeyDown(event) {
  if (event.key === "Enter" || event.key === " ") {
      event.preventDefault(); // Prevent the default action to avoid any unwanted behavior
      animateCard(event.target); // Assuming animateCard handles the activation logic
  }
}
function animateCard(rescard) {
  card.style.transform = 'scale(1.1)';
  card.style.boxShadow = '0 8px 16px rgba(0,0,0,0.2)';
}

function resetCard(rescard) {
  card.style.transform = 'scale(1)';
  card.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
}
function changeTimezone() {
    const timezoneSelect = document.getElementById('timezone-select');
    const selectedTimezone = timezoneSelect.value;
    console.log("Timezone changed to:", selectedTimezone);
    // Here you would typically make an AJAX call or update the page accordingly
}

