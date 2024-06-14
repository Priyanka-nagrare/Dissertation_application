// Description: JavaScript file for the Experience page.
// Author: Priyanka Nagrare
// Date: 2021-08-30


// Wait for the DOM to be fully loaded before executing any of the script
document.addEventListener('DOMContentLoaded', function() {
    const allSideMenuItems = document.querySelectorAll('#sidebar .side-menu.top li a');
    const allContentSections = document.querySelectorAll('.content-section');
    const closeButtons = document.querySelectorAll('.close-section-cta');
    const sidebar = document.getElementById('sidebar');
    const menuBar = document.querySelector('#content nav .fas.fa-bars');
    const searchButton = document.querySelector('#content nav form .form-input button');
    const searchButtonIcon = document.querySelector('#content nav form .form-input button i');
    const searchForm = document.querySelector('#content nav form');
    const switchMode = document.getElementById('switch-mode');
    // Variable to keep track of the current open section
    let currentOpenSection = null;

    // Add event listeners to all side menu items
    allSideMenuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = item.getAttribute('data-target');
            const targetSection = document.getElementById(targetId);
            // Manage active states and section visibility
            manageActiveState(item, targetSection);
        });
    });

    // function to manage active states and section visibility
    function manageActiveState(selectedItem, targetSection) {
        // Remove active class from all items and hide all sections
        allSideMenuItems.forEach(i => i.parentElement.classList.remove('active'));
        allContentSections.forEach(section => {
            section.style.transform = 'translateX(100%)';
            section.classList.remove('active');
        });

        // Set active class on selected item and section
        selectedItem.parentElement.classList.add('active');
        if (targetSection) {
            // Make section visible and slide it in
            targetSection.style.display = 'block'; 
            slideInSection(targetSection);
        }
    }

    // function to slide in the selected section from the right
    function slideInSection(section) {
        if (currentOpenSection) {
            currentOpenSection.classList.remove('active');
            currentOpenSection.style.transform = 'translateX(100%)';
        }
        
        section.classList.add('active');
        section.style.transform = 'translateX(0)';
        currentOpenSection = section;
    }

    // Hide all sections initially by sliding them to the right
    allContentSections.forEach(section => {
        section.style.transform = 'translateX(100%)';
        section.style.transition = 'transform 0.3s ease';
    });

    // Responsive sidebar behavior for smaller screens
    menuBar.addEventListener('click', function() {
        sidebar.classList.toggle('hide');
        adjustContentWidth();
    });

    // Adjust content width when sidebar visibility changes
    function adjustContentWidth() {
        const content = document.getElementById('content');
        content.style.width = sidebar.classList.contains('hide') ? 'calc(100% - 60px)' : 'calc(100% - 280px)';
        content.style.left = sidebar.classList.contains('hide') ? '60px' : '280px';
    }

    // Toggle search form visibility on smaller screens when search button is clicked
    searchButton.addEventListener('click', function(e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle('show');
            searchButtonIcon.classList.toggle('fa-search', !searchForm.classList.contains('show'));
            searchButtonIcon.classList.toggle('fa-times', searchForm.classList.contains('show'));
        }
    });

    // Add event listeners to all close buttons
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const section = button.closest('.content-section');
            // Hide the section and remove active class
            section.classList.remove('active');
            section.style.transform = 'translateX(100%)';
            allSideMenuItems.forEach(i => i.parentElement.classList.remove('active'));
        });
    });

    // Adjustments for window resize and initial loading
    window.addEventListener('resize', adjustResponsiveElements);

    function adjustResponsiveElements() {
        if (window.innerWidth < 768) {
            sidebar.classList.add('hide');
        } else {
            sidebar.classList.remove('hide');
        }
        adjustContentWidth();
    }

    // Switch between dark and light mode
    switchMode.addEventListener('change', function() {
        document.body.classList.toggle('dark', this.checked);
    });
});

// Initialize and create the charts using ApexCharts library
const barChartOptions = {
    series: [{ name: 'Failures', data: [45, 35, 25, 15, 10] }],
    chart: { type: 'bar', height: 350, toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 4, horizontal: false } },
    dataLabels: { enabled: false },
    xaxis: { categories: ['Lack of Research Ideas', 'Failing Dissertation Defense', 'Non-Serious Attitude', 'Unbalanced Study and Work-Life', 'Unacademic Approach'] }
};

// Create the bar chart
const barChart = new ApexCharts(document.querySelector('#bar-chart'), barChartOptions);
barChart.render();

// Initialize and create the area chart using ApexCharts library
const areaChartOptions = {
    series: [{ name: 'Usage Frequency', data: [120, 100, 85, 60, 55, 50, 45, 40, 30, 25, 20] }],
    chart: { type: 'area', height: 350, toolbar: { show: false }, zoom: { enabled: false } },
    dataLabels: { enabled: false },
    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.9, stops: [0, 90, 100] } },
    xaxis: { categories: ['Asana', 'Trello', 'ClickUp', 'Microsoft Project', 'Monday.com', 'Basecamp', 'Kanban', 'Zoho Projects', 'Jira', 'Smartsheet', 'Wrike'] }
};

// Create the area chart
const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
areaChart.render();
