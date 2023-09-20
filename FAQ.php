<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	
	<style>
	p{
		font-size: 40px;
		font-weight: bold;
		margin: 0 10px;
		text-align: center;
		padding-top: 100px;
		}

	section{
		width: 100%;
		height: 800px;
		padding-top: 50px;
		display: flex;
		justify-content: center;
	}
	
	.container{
		width: 70%;
	}
	
	.box{
		background-color: #000000;
		border-radius: 10px;
		margin: 20px 0;
		padding: 10px;
		width: 100%;
	}
	
	.link {
		text-decoration: none;
		padding: 10px 0;
		display: flex;
		justify-content: space-between;
        width: 100%;
        height: 20px;
        line-height: 5px;
		cursor: pointer;
		color: #FFF;
	}
	
	.link:visited{
		color: #C0C0C0;
	}
	
	#faq1, #faq2, #faq3, #faq4 {
			display: none;
		}
		
	.answer{
		background-color: #000000;
		color: #FFFFFF;
		font-size: 18px;
		padding: 20px;
		border-radius: 10px;
		background-color: #1ca9c9;
		overflow: hidden;
		display: none; 
	}
	
	headerspace {
		height: 130px;
	}
	</style>
	
	<script>
        function showHide(section_id) {
          var accordian = document.getElementById(section_id);
            if (accordian.style.display == "none") {
                accordian.style.display = "block";
          } else {
                accordian.style.display = "none";
          }
        }
    </script>
</head>

<body>
<div id="headerspace"><?php include_once("header-footer/header.php");?></div><br><br>
<p>FAQs</p>
	<section>
	
	<div class="container"> 
		<div class="box">
			<a class="link" onclick="showHide('faq1')">What should I do if someone is having a heart attack?</a>
			<div class="answer" id="faq1">
			Call 911 immediately and begin CPR if you are trained to do so. Try to keep the person calm and reassure them while waiting for emergency services to arrive.
			</div>
		</div>
			
		<div class="box">
			<a class="link" onclick="showHide('faq2')">How can I treat a burn at home?
			</a>
			<div class="answer" id="faq2">
			Run cool water over the burn for at least 10-15 minutes to help alleviate pain and prevent further damage. Cover the burn with a sterile, non-adhesive dressing and avoid using ice or butter, which can make the burn worse. If the burn is severe, seek medical attention.			</div>
		</div>
			
		<div class="box">
			<a class="link" onclick="showHide('faq3')">When should I go to the emergency room?	
			</a>
			<div class="answer" id="faq3">
			You should go to the emergency room if you are experiencing severe or life-threatening symptoms, such as chest pain, difficulty breathing, severe bleeding, or loss of consciousness. Additionally, if you have a chronic condition that is worsening, such as asthma or diabetes, and your regular doctor is not available, you may need to seek emergency medical care.</div>
		</div>

		<br><br>
		
	</div>
	</section>
	<div><?php include_once("header-footer/footer.php");?></div>
</body>
</html>