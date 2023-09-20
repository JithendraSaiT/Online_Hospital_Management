<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div#headerspace {
            height: 130px;
        }

        .topic {
            font-family: "Timen News Roman";
            font-style: italic;
            text-align: center;
            color: whitesmoke;
            background-color: red;
            font-size: 22px;
        }

        h1 {
            font-family: "Timen News Roman";
        }

        strong {
            font-family: "Timen News Roman";
            background-color: #CCCCFF;
        }

        .content {
            font-size: 18px;
            font-family: "Timen News Roman";
            font-style: oblique;
            line-height: 1.6;
            width: 480px;
            padding: 20px;
            margin: 5%;
            text-align: justify;
        }

        .img_container {
            display: flex;
            max-width: 100%;
        }

        .row {
            border-radius: 25px;
            border: 2px solid #73AD21;
            padding: 45px;
            margin-left: 10%;
            margin-right: 10%;
            width: auto;
            height: auto;
            clear: both;
        }

        * {
            box-sizing: border-box;
        }

        .column {
            display: flex;
            width: 50%;
            padding: 5px;
            border-radius: 25px;
            align-items: center;
            justify-content: center;
        }

        .btn {
            text-align: center;
            font-size: 20px;
            font-family: "Timen News Roman";
            font-style: oblique;
            font-weight: 900;
            line-height: 1.6;
            width: 320px;
            padding: 10px;
            border: 3px solid gray;
            border-radius: 25px;
            background-color: #F09819;
            margin-left: 300px;
            cursor: pointer;
            clear: both;
        }
        table {
  border-collapse: collapse;
  width: 100%;
  font-family: Arial, sans-serif;
}

th {
  background-color: #4CAF50;
  color: white;
  font-weight: bold;
  text-align: left;
  padding: 8px;
}

td {
  border: 1px solid #ddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
    </style>
    <title>Common Medications</title>
</head>

<body>
    <div id="headerspace"><?php include 'header-footer/header.php'; ?></div>
    <div class="topic">
        <br>
        <h1>&lt;&lt;&lt;Common Medications&gt;&gt;&gt;</h1> <br>
    </div>

    <br>

    <!DOCTYPE html>
<html>
<head>
	<title>Common Diseases and Medications</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Disease</th>
			<th>Medication</th>
		</tr>
		<tr>
			<td>Common Cold</td>
			<td>Paracetamol, Ibuprofen, Aspirin</td>
		</tr>
		<tr>
			<td>Influenza (Flu)</td>
			<td>Tamiflu, Oseltamivir, Zanamivir</td>
		</tr>
		<tr>
			<td>Fever</td>
			<td>Paracetamol, Ibuprofen, Aspirin</td>
		</tr>
		<tr>
			<td>Bacterial Infection</td>
			<td>Amoxicillin, Azithromycin, Ciprofloxacin</td>
		</tr>
		<tr>
			<td>Stomach Infection</td>
			<td>Ciprofloxacin, Metronidazole, Tinidazole</td>
		</tr>
		<tr>
			<td>Urinary Tract Infection (UTI)</td>
			<td>Nitrofurantoin, Trimethoprim-sulfamethoxazole, Ciprofloxacin</td>
		</tr>
		<tr>
			<td>Malaria</td>
			<td>Chloroquine, Artemether-Lumefantrine, Quinine</td>
		</tr>
		<tr>
			<td>Tuberculosis (TB)</td>
			<td>Isoniazid, Rifampicin, Ethambutol</td>
		</tr>
		<tr>
			<td>Hypertension (High Blood Pressure)</td>
			<td>Lisinopril, Amlodipine, Losartan</td>
		</tr>
		<tr>
			<td>Diabetes</td>
			<td>Metformin, Insulin, Glipizide</td>
		</tr>
	</table>
</body>
</html>

    <br><br><br><br>

    <div class="row">
        <div class="column">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <img src="media/Stethoscope.jpg" alt="Stethoscope" style="width:100%; margin:auto; padding-left: 20%; ">
            <br>
        </div>
        <div>
            <br>
            <p style="text-align: center;" >Select a doctor to consult with your problem.</p>
        </div>

        <br>

        <a href="makeappointment.php"><div class="btn">
            Make Appointment
        </div></a>
    </div>

    <br><br><br><br>

    <?php include 'header-footer/footer.php'; ?>
</body>

</html>