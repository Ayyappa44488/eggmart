<html>
<head>
<style>
button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}
.dropdown-content a {
  display: block;
  padding: 12px 16px;
  text-decoration: none;
  color: black;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.show {
  display: block;
}
</style>
</head>
<body>
<div class="dropdown">
  <button id="dropdownButton">Click Me</button>
  <div class="dropdown-content" id="dropdownContent">
    <a href="#">Option 1</a>
    <a href="#">Option 2</a>
    <a href="#">Option 3</a>
  </div>
</div>
<script>
document.getElementById("dropdownButton").addEventListener("click", function() {
  var dropdownContent = document.getElementById("dropdownContent");
  dropdownContent.classList.toggle("show");
});
window.addEventListener("click", function(event) {
  if (!event.target.matches("#dropdownButton")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
});
</script>
</body>
</html>