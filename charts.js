// Description: JavaScript file for rendering charts using Chart.js library
// Author: Priyanka Nagrare
// Date: 2021-08-30

// creating a new chart instance - progress chart
const ctx = document.getElementById('progressChart').getContext('2d');
const progressChart = new Chart(ctx, {
    // Setting the type of chart to doughnut chart
    type: 'doughnut',
    data: {
        labels: ['Completed', 'Pending'],
        datasets: [{
            data: [70, 30],
            backgroundColor: ['#FF6384', '#36A2EB'],
        }]
    },
    // Adding options to the chart
    options: {
        responsive: true,
        // Ensure the chart does not maintain aspect ratio
        maintainAspectRatio: false, 
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Overall Progress'
            }
        }
    }
});

// Set the size of the canvas dynamically
document.getElementById('progressChart').width = 400;
document.getElementById('progressChart').height = 300;

		// creating a new chart instance - milestone chart
		const milestoneCtx = document.getElementById('milestoneChart').getContext('2d');
    const milestoneChart = new Chart(milestoneCtx, {
        type: 'bar',
        data: {
            labels: ['Proposal Submitted', '1st Chapter', 'Data Collected', '1st Draft'],
            datasets: [{
                label: 'Milestones',
                data: [100, 100, 75, 50],
                backgroundColor: ['#FFDDC1', '#FDBB2F', '#23CBA7', '#F88E86'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { 
                    beginAtZero: true 
                }
            },
            plugins: {
                legend: { 
                    display: false 
                },
                title: { 
                    display: true, 
                    text: 'Milestone Completion' 
                }
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Creating a new chart instance - time spent chart
        const timeSpentCtx = document.getElementById('timeSpentChart').getContext('2d');
        const timeSpentChart = new Chart(timeSpentCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Hours Spent',
                    data: [5, 15, 10, 20],
                    borderColor: '#4285F4',
                    backgroundColor: 'rgba(66, 133, 244, 0.2)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Ensure the chart does not maintain aspect ratio
                scales: {
                    y: { 
                        beginAtZero: true 
                    }
                },
                plugins: {
                    legend: { 
                        display: false 
                    },
                    title: { 
                        display: true, 
                        text: 'Time Spent on Dissertation per Week' 
                    }
                }
            }
        });
    
        // Set the size of the canvas dynamically
        document.getElementById('timeSpentChart').width = 400;
        document.getElementById('timeSpentChart').height = 300;
    });


    document.addEventListener('DOMContentLoaded', function() {
        //  creating a new chart instance - time forecast chart
        const timeForecastCtx = document.getElementById('timeForecastChart').getContext('2d');
        const timeForecastChart = new Chart(timeForecastCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8'],
                datasets: [{
                    label: 'Projected Hours',
                    data: [10, 12, 15, 20, 18, 22, 25, 30],
                    borderColor: '#FFA500',
                    backgroundColor: 'rgba(255, 165, 0, 0.2)',
                }, {
                    label: 'Actual Hours',
                    data: [10, 14, 13, 18, 16, 20, 23, 27],
                    borderColor: '#32CD32',
                    backgroundColor: 'rgba(50, 205, 50, 0.2)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true 
                    }
                },
                plugins: {
                    legend: { 
                        display: true 
                    },
                    title: { 
                        display: true, 
                        text: 'Time Forecasting for Dissertation Work' 
                    }
                }
            }
        });
    
        // Set the size of the canvas dynamically
        document.getElementById('timeForecastChart').width = 400;
        document.getElementById('timeForecastChart').height = 300;
    });

    document.addEventListener('DOMContentLoaded', function() {
        // creating a new chart instance - activity log chart
        const activityLogCtx = document.getElementById('activityLogChart').getContext('2d');
        const activityLogChart = new Chart(activityLogCtx, {
            type: 'bar',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
                datasets: [{
                    label: 'Activity Count',
                    data: [5, 10, 8, 15, 7, 6, 12],
                    backgroundColor: '#36A2EB',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Daily Activity Logs'
                    }
                }
            }
        });
    
        // Set the size of the canvas dynamically
        document.getElementById('activityLogChart').width = 400;
        document.getElementById('activityLogChart').height = 300;
    });

   
    document.addEventListener('DOMContentLoaded', function() {
        // Library Resources Usage Chart
        const libraryResourcesCtx = document.getElementById('libraryResourcesChart').getContext('2d');
        const libraryResourcesChart = new Chart(libraryResourcesCtx, {
            type: 'bar',
            data: {
                labels: ['Books', 'E-books', 'Journals', 'Databases', 'Special Collections'],
                datasets: [{
                    label: 'Usage Count',
                    data: [120, 150, 80, 200, 50],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ],
                    borderColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Library Resources Usage'
                    }
                }
            }
        });
    
        // Set the size of the canvas dynamically
        document.getElementById('libraryResourcesChart').width = 400;
        document.getElementById('libraryResourcesChart').height = 300;
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Software and Tools Utilization Chart
        const toolsUtilizationCtx = document.getElementById('toolsUtilizationChart').getContext('2d');
        const toolsUtilizationChart = new Chart(toolsUtilizationCtx, {
            type: 'radar',
            data: {
                labels: ['Zotero', 'EndNote', 'Mendeley', 'SPSS', 'MATLAB', 'Python', 'R Studio'],
                datasets: [{
                    label: 'Usage Level',
                    data: [70, 60, 80, 90, 50, 85, 75],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Software and Tools Utilization'
                    }
                }
            }
        });
    
        // Set the size of the canvas dynamically
        document.getElementById('toolsUtilizationChart').width = 400;
        document.getElementById('toolsUtilizationChart').height = 300;
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Creating a new chart instance - feedback overview chart
        const feedbackOverviewCtx = document.getElementById('feedbackOverviewChart').getContext('2d');
        const feedbackOverviewChart = new Chart(feedbackOverviewCtx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
                datasets: [
                    {
                        label: 'Positive Feedback',
                        data: [5, 10, 15, 20, 25],
                        backgroundColor: '#4CAF50',
                    },
                    {
                        label: 'Constructive Feedback',
                        data: [8, 12, 10, 6, 9],
                        backgroundColor: '#FFC107',
                    },
                    {
                        label: 'Negative Feedback',
                        data: [2, 3, 1, 4, 2],
                        backgroundColor: '#F44336',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Feedbacks'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Weeks'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Feedback Overview'
                    }
                }
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Creating a new chart instance - revision history chart
        const revisionHistoryCtx = document.getElementById('revisionHistoryChart').getContext('2d');
        const revisionHistoryChart = new Chart(revisionHistoryCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
                datasets: [
                    {
                        label: 'Revisions',
                        data: [2, 5, 3, 6, 4],
                        borderColor: '#4285F4',
                        backgroundColor: 'rgba(66, 133, 244, 0.2)',
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Revisions'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Weeks'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Revision History'
                    }
                }
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Creating a new chart instance - data collection progress chart
        const dataCollectionProgressCtx = document.getElementById('dataCollectionProgressChart').getContext('2d');
        const dataCollectionProgressChart = new Chart(dataCollectionProgressCtx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
                datasets: [
                    {
                        label: 'Data Collected (Units)',
                        data: [20, 40, 60, 80, 100],
                        backgroundColor: '#36A2EB',
                        borderColor: '#36A2EB',
                        borderWidth: 1,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Units Collected'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Weeks'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Data Collection Progress'
                    }
                }
            }
        });
    });
            