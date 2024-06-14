// Description: This file contains the JavaScript code for the Logbook page.
// Author: Priyanka Nagrare
// Date: 2021-08-30

// Wait for the DOM to be fully loaded before executing any of the script
document.addEventListener('DOMContentLoaded', function () {
    initializeTinyMCE();
    setupLogSystem();
    setupCloseSectionButtons();
    setupVoiceRecognition();
    setupSectionSwitching();
});

// Function to initialize the TinyMCE editor for the log entry input
function initializeTinyMCE() {
    tinymce.init({
        // Selector for the textarea element to convert into TinyMCE editor
        selector: '#editor',
        height: 300,
        plugins: 'print preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | insertfile image media link anchor codesample | ltr rtl',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
        importcss_append: true,
        automatic_uploads: true,
        file_picker_types: 'file image media',
        // File picker callback function to handle file uploads
        file_picker_callback: function (callback, value, meta) {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = meta.filetype === 'image' ? 'image/*' : '*/*';
            input.onchange = function () {
                const file = this.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    callback(reader.result, { alt: file.name });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        }
    });
}

// Function to setup the log system for saving and rendering log entries in the log history and saving them to local storage
function setupLogSystem() {
    const logHistory = document.getElementById('log-history');
    const saveLogBtn = document.getElementById('save-log-btn');
    let logs = JSON.parse(localStorage.getItem('logs')) || [];

    // Add event listener to the save log button to save the log entry to local storage using stack data structure
    saveLogBtn.addEventListener('click', function () {
        const logContent = tinymce.get('editor').getContent();
        if (logContent.trim()) {
            const logEntry = {
                content: logContent,
                timestamp: new Date().toLocaleString()
            };
            logs.push(logEntry);
            localStorage.setItem('logs', JSON.stringify(logs));
            renderLogs(logs, logHistory);
            tinymce.get('editor').setContent('');
        }
    });

    renderLogs(logs, logHistory);
}

// Function to render the log entries in the log history section
function renderLogs(logs, logHistory) {
    logHistory.innerHTML = '';
    // Loop through each log entry and create a div element to display the log content and timestamp
    logs.forEach((log, index) => {
        const logDiv = document.createElement('div');
        logDiv.className = 'log-entry';
        logDiv.innerHTML = `
            <div class="log-content">${log.content}</div>
            <div class="log-footer">
                <span class="log-timestamp">${log.timestamp}</span>
                <button class="edit-log-btn" data-index="${index}">Edit</button>
            </div>
        `;
        logHistory.appendChild(logDiv);
    });
    // Add event listeners to the edit log buttons to populate the editor with the log content and remove the log entry from the log history
    document.querySelectorAll('.edit-log-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const index = parseInt(this.getAttribute('data-index'));
            tinymce.get('editor').setContent(logs[index].content);
            logs.splice(index, 1);
            localStorage.setItem('logs', JSON.stringify(logs));
            renderLogs(logs, logHistory);
        });
    });
}


// Function to setup the close section buttons to hide the active content section
function setupCloseSectionButtons() {
    document.querySelectorAll('.close-section-cta').forEach(button => {
        button.addEventListener('click', function () {
            const section = this.closest('.content-section');
            if (section) {
                section.classList.remove('active');
            }
        });
    });
}

// Function to setup voice recognition for the log entry input using the Web Speech API and the SpeechRecognition interface in the browser
function setupVoiceRecognition() {
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.continuous = true;
    recognition.interimResults = false;
    recognition.lang = 'en-US';

    document.getElementById('start-record-btn').addEventListener('click', () => recognition.start());
    document.getElementById('pause-record-btn').addEventListener('click', () => recognition.stop());
    document.getElementById('stop-record-btn').addEventListener('click', () => recognition.stop());

    // Event listeners for the voice recognition events
    recognition.onresult = function (event) {
        const transcript = event.results[event.resultIndex][0].transcript;
        tinymce.get('editor').setContent(tinymce.get('editor').getContent() + ' ' + transcript);
    };

    recognition.onerror = function (event) {
        console.error('Error occurred in recognition:', event.error);
    };

    recognition.onend = function () {
        console.log('Voice recognition ended');
    };
}

// Function to setup the section switching functionality for the logbook page
function setupSectionSwitching() {
    document.querySelectorAll('a[data-target]').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetId = this.getAttribute('data-target');
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.remove('active');
                });
                targetSection.classList.add('active');
            }
        });
    });
}

