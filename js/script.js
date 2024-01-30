function updateLabel() {
  var nameLabel = document.getElementById("nameLabel");
  var nameInput = document.getElementById("nameInput");

  if (nameInput.value.trim() !== "") {
      nameLabel.style.display = "none";
  } else {
      nameLabel.style.display = "block";
  }
}


function deleteLabel() {
  var emailLabel = document.getElementById("emailLabel");
  var emailInput = document.getElementById("emailInput");

  if (emailInput.value.trim() !== "") {
      emailLabel.style.display = "none";
  } else {
      emailLabel.style.display = "block";
  }
}

// JavaScript
function handleReportInput() {
  var writeReport = document.getElementById('writeReport');
  var reportInput = document.getElementById('reportInput');

  if (reportInput.value.trim() !== "") {
      writeReport.style.display = "none";
  } else {
      writeReport.style.display = "flex";
  }
}

