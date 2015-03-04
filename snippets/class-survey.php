<div class="survey-results">
	<strong>Should you drop?</strong>
	<div class="survey-message">
	</div>
</div>

<style>
	.survey-item {
	  padding: 15px;
	  background: rgb(238, 238, 238);
	  margin: 5px 0;
	}
	.survey-item:hover {
	  background: #068ec4;
	  color: white;
	  cursor: pointer;
	}

	.survey-item.selected {
	  background: #194d6a;
	  color: white;
	}

	.survey-message {
	  margin: 10px 0;
	  padding: 20px 15px;
	  border: 1px solid rgb(131, 131, 131);
	}
</style>

<script src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script>
	var count = 0;
	checkCount();
	$('.survey-item').click(function(){
		var checked = $(this).data('checked');
		if(checked){
			$(this).data('checked', 0);
			$(this).removeClass('selected');
			count = count - 1;
		} else {
			$(this).data('checked', 1);
			$(this).addClass('selected');
			count = count + 1;
		}
		checkCount();
	});

	function checkCount(){
		if(count == 0){
			updateMessage('You have no reason to be complaining. Stay in the class! ');
		} else if (count >= 12) {
			updateMessage("Why did you not drop this class two minutes into the first lecture?");
		} else if (count >= 6) {
			updateMessage("Drop the class. It would be more trouble than it's worth to try to make it through the semester (or, Gupta forbid, the year if it's a two-term class). ");
		} else if (count >= 3) {
			updateMessage("You have enough reason to drop the class, but if you have a great prof or friends in the class, go for it.");
		} else if (count >= 1) {
			updateMessage("If you have other, unlisted reasons you could drop the class, but it's probably worth trying to tough it out.");
		}
	}

	function updateMessage(message){
		$('.survey-message').html(message);
	}

</script>