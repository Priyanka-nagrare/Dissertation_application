const leaderboardTabs = document.querySelectorAll(".leaderboard-section ul li");
const today = document.querySelector(".today");
const month = document.querySelector(".month");
const year = document.querySelector(".year");
const items = document.querySelectorAll(".leaderboard-item");

leaderboardTabs.forEach(function(tab) {
    tab.addEventListener("click", function() {
        const currentTab = tab.getAttribute("data-li");
        
        leaderboardTabs.forEach(function(tab) {
            tab.classList.remove("active");
        });

        tab.classList.add("active");

        items.forEach(function(item) {
            item.style.display = "none";
        });

        if (currentTab === "today") {
            today.style.display = "block";
        } else if (currentTab === "month") {
            month.style.display = "block";
        } else {
            year.style.display = "block";
        }
    });
});
