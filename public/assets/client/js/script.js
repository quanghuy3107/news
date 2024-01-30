function toggleSearchBox() {
    const searchBox = document.getElementById("searchBox");
    const searchIcon = document.getElementById("searchIcon");

    if (searchBox.style.display === "none" || searchBox.style.display === "") {
        searchBox.style.display = "block";
        searchIcon.style.display = "none";
    } else {
        searchBox.style.display = "none";
        searchIcon.style.display = "block";
    }
}

function offForm() {
    const searchBox = document.getElementById("searchBox");
    const searchIcon = document.getElementById("searchIcon");

    if (searchBox.style.display === "none" || searchBox.style.display === "") {
        searchBox.style.display = "block";
        searchIcon.style.display = "none";
    } else {
        searchBox.style.display = "none";
        searchIcon.style.display = "block";
    }

}
