<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor Info</title>
	<style>

#main-content {
  display: flex;
  justify-content: center;
}

.cssstyle {
  border: 2px solid #ccc;
  padding: 20px;
  width: 50%;
}

.logo {
  display: block;
  margin: auto;
}

.flex-container {
  display: flex;
  flex-wrap: wrap;
}

.flex1 {
  flex: 1;
  margin-right: 20px;
}

select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

input[type=text], input[type=password], input[type=number], input[type=file] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

button[type=cancel] {
  background-color: gray;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 5px;
}

button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 5px;
}
    </style>
	
</head>

<body>
    <div id="main-content">
	<div class="cssstyle">
	<p style="text-align:center">Doctor details</p>
	<form action="register.php" method="post" ENCTYPE="multipart/form-data">
    <div class="flex-container">
        <div class="flex1">
            Name<br>
            <input type="text" name="name" placeholder="Enter Doctor Name" required><br><br>

            Username<br>
            <input type="text" name="username" placeholder="Enter the username" required><br><br>

            Password<br>
            <input type="password" name="password" placeholder="Enter your password" required><br><br>

            Confirm Password<br>
            <input type="password" name="cpassword" placeholder="Confirm your password" required><br><br>

            Specialist<br>
            <input type="text" name="specialist" placeholder="Enter Doctor Specialist" required><br><br>

            Education Level<br>
            <input type="text" name="education_level" placeholder="Enter Doctor Education level" required><br><br>

            Year of Experiences<br>
            <input type="number" name="year_of_experience" placeholder="Enter a number" required><br><br>

            Language<br>
            <select name="language[]" class="selectpicker" multiple required>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Telugu">Telugu</option>
                <option value="Tamil">Tamil</option>
                <option value="Others">Others</option>
            </select><br><br>
           
			<label for="total_qualification">Total Qualifications:</label>
  <input type="number" name="total_qualification" id="total_qualification" required>
  <br>
  <div id="qualifications">
  </div>
  <br>

			About Doctor<br>
				<textarea type="text" name="about_doctor" placeholder="Doctor Descriptions..." rows="6" cols="80" required></textarea><br><br>
			</div>

            <label for="picture">Choose Image</label><br> 
            <input type="file"  name="picture"><br><br>
            <br>
            <button class="button" name="register" type="submit">Register</button>
            <button class="button" type="cancel" name="cancel" onclick="location.href = 'doctor_list.php';" >Cancel</button><br><br>
        </div>
    </div>
</form>
<script>
	const qualificationsDiv = document.getElementById('qualifications');
const totalQualificationInput = document.getElementById('total_qualification');

totalQualificationInput.addEventListener('change', () => {
  const totalQualification = parseInt(totalQualificationInput.value, 10);
  qualificationsDiv.innerHTML = '';
  for (let i = 1; i <= totalQualification; i++) {
    const input = document.createElement('input');
    input.type = 'text';
    input.name = `qualification${i}`;
    input.placeholder = `Qualification ${i}`;
    input.required = true;
    qualificationsDiv.appendChild(input);
    qualificationsDiv.appendChild(document.createElement('br'));
  }
});
</script>
</body>
</html>
