		<form action="/checkout/auth" method="post">
			<label for="title">Title</label>
			<select name="title" id="title">
				<option value="Mr">Mr</option>
				<option value="Miss">Miss</option>
				<option value="Ms">Ms</option>
				<option value="Mrs">Mrs</option>
				<option value="Sir">Sir</option>
				<option value="Dr">Dr</option>
			</select>
			
			<label for="first-name">First Name</label>
			<input type="text" name="first-name" id="first-name">
			
			<label for="surname">Surname</label>
			<input type="text" name="surname" id="surname">
			
			<label for="card-type">Card Type</label>
			<select name="card-type" id="card-type">
				<option value="visa">VISA</option>
				<option value="amex">American Express</option>
				<option value="solo">Solo</option>
				<option value="jcb">JCB</option>
				<option value="mastercard">Mastercard</option>
				<option value="maestro">Maestro</option>
				<option value="diners">Diners</option>
			</select>
			
			<label for="card-number">Card Number</label>
			<input type="text" name="card-number" id="cart-number">
			
			<label for="start-date">Start Date</label>
			<input type="text" name="start-date" id="start-date">
			
			<label for="end-date">End Date</label>
			<input type="text" name="end-date" id="end-date">
			
			<input type="submit" value="Go &rarr;" name="submit">
		</form>