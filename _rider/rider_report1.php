<?php include('partials/top.php'); ?>

<div class="main">
            <div class="info">
			<H2>Commision</H2><br>
				<div>
				<select class="commision" name="list" id="list">
					<option class="commision" value="weekly">Weekly</option>
					<option class="commision" value="monthly">Monthly</option>
					<option class="commision" value="overall">Overall</option>
					<option class="commision" value="other">Specific Date</option>
				</select><br>
				</div>
				<h2>For Specific Date:<h2><br>
				<div>
					<label for="start">From:</label>
					<input class="date" type="date" id="start" name="start" value="" min="2022-01-01" max="2022-12-31">
					<label for="end">Until:</label>
					<input class="date" type='date' id="end" name="end" min='2022-01-01' max='2022-12-31'></input>
				</div>
				<button class="check_report" onclick="window.location.href = 'rider_report2.html';">Generate Report</button>
			</div>
        </div>
    </div>

<?php include('partials/footer.php'); ?>