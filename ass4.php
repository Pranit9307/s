<!DOCTYPE html>
<html>
<head>
  <title>Employee Search</title>
</head>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
    flex-direction: column;
    font-family: Arial, sans-serif;
  }
  </style>
<body>

  <h2>Enter Employee Name to Search:</h2><br>

  <!-- Form to take name input -->
  <form method="post">
    <input type="text" name="search_name" placeholder="Enter name here" required><br><br>
    <input type="submit" value="Search">
  </form>

  <?php
  // Associative array of employee details
  $employees = array(
    "Amit" => ["ID" => "E001", "Department" => "IT", "Position" => "Developer"],
    "Priya" => ["ID" => "E002", "Department" => "HR", "Position" => "Manager"],
    "Suresh" => ["ID" => "E003", "Department" => "Finance", "Position" => "Analyst"],
    "Neha" => ["ID" => "E004", "Department" => "Marketing", "Position" => "Executive"],
    "Rahul" => ["ID" => "E005", "Department" => "IT", "Position" => "Tester"],
    "Kiran" => ["ID" => "E006", "Department" => "Support", "Position" => "Associate"],
    "Sneha" => ["ID" => "E007", "Department" => "Sales", "Position" => "Executive"],
    "Rohan" => ["ID" => "E008", "Department" => "Operations", "Position" => "Coordinator"],
    "Anjali" => ["ID" => "E009", "Department" => "Admin", "Position" => "Assistant"],
    "Vikas" => ["ID" => "E010", "Department" => "Legal", "Position" => "Advisor"],
    "Komal" => ["ID" => "E011", "Department" => "IT", "Position" => "Intern"],
    "Sanjay" => ["ID" => "E012", "Department" => "Security", "Position" => "Supervisor"],
    "Divya" => ["ID" => "E013", "Department" => "HR", "Position" => "Recruiter"],
    "Kunal" => ["ID" => "E014", "Department" => "IT", "Position" => "Project Manager"],
    "Preeti" => ["ID" => "E015", "Department" => "Finance", "Position" => "Clerk"],
    "Ravi" => ["ID" => "E016", "Department" => "IT", "Position" => "Network Engineer"],
    "Meena" => ["ID" => "E017", "Department" => "Support", "Position" => "Specialist"],
    "Jay" => ["ID" => "E018", "Department" => "Marketing", "Position" => "Designer"],
    "Nikita" => ["ID" => "E019", "Department" => "Admin", "Position" => "Coordinator"],
    "Deepak" => ["ID" => "E020", "Department" => "Legal", "Position" => "Officer"]
  );

  // When form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["search_name"]);

    // Check if employee exists (case-insensitive search)
    $found = false;
    foreach ($employees as $key => $details) 
    {
      if (strcasecmp($key, $name) == 0) 
      {
        echo "<p style='color: green;'><strong>$key</strong> is found in the employee list.</p>";
        echo "<ul>";
        echo "<li><strong>ID:</strong> " . $details["ID"] . "</li>";
        echo "<li><strong>Department:</strong> " . $details["Department"] . "</li>";
        echo "<li><strong>Position:</strong> " . $details["Position"] . "</li>";
        echo "</ul>";
        $found = true;
        break;
      }
    }

    if (!$found) {
      echo "<p style='color: red;'>$name is NOT found in the employee list.</p>";
    }
  }
  ?>

</body>
</html>