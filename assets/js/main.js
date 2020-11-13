function ValidateEmail(inputText)
{
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(inputText.match(mailformat))
	{
		return true;
	}
	else
	{
		return false;
	}
}

$(document)
.on("submit", "form.js-register", function(event) {
	event.preventDefault();

	var $form = $(this);
	var $error = $(".js-error", $form);

	var dataObj = {
		email: $("input[type='email']", $form).val(),
		password: $("input[type='password']", $form).val()
	};

	if(!ValidateEmail(dataObj.email)) {
		$error
			.text("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 11) {
		$error
			.text("Please enter a passphrase that is at least 11 characters long.")
			.show();
		return false;
	}
	$error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			$error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed 
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		//console.log('Always');
	})

	return false;
})
// 
	.on("submit", "form.js-login", function(event) {
		event.preventDefault();

		var $form = $(this);
		var $error = $(".js-error", $form);

		var dataObj = {
			email: $("input[type='email']", $form).val(),
			password: $("input[type='password']", $form).val()
		};

		if(dataObj.email.length < 6) {
			$error
				.text("Please enter a valid email address")
				.show();
			return false;
		} else if (dataObj.password.length < 11) {
			$error
				.text("Please enter a passphrase that is at least 11 characters long.")
				.show();
			return false;
		}

		// Assuming the code gets this far, we can start the ajax process
		$error.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/login.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if(data.redirect !== undefined) {
					window.location = data.redirect;
				} else if(data.error !== undefined) {
					$error
						.html(data.error)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				// This failed
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})

		return false;
	})
	.on("submit", "form.article", function(event) {
		event.preventDefault();

		var $form = $(this);
		var $error = $(".js-error", $form);

		var dataObj = {
			title: $(".title", $form).val(),
			articleText: $(".article-text", $form).val()
		};


		// Assuming the code gets this far, we can start the ajax process
		$error.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/addnewarticle.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if(data.redirect !== undefined) {
					window.location = data.redirect;
				} else if(data.error !== undefined) {
					$error
						.html(data.error)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				// This failed
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})

		return false;
	})
	.on("submit", "form.js-user-update", function(event) {
		event.preventDefault();

		var $form = $(this);
		var $error = $(".js-error", $form);

		var dataObj = {
			email: $(".email", $form).val()
		};


		// Assuming the code gets this far, we can start the ajax process
		$error.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/changemail.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if(data.redirect !== undefined) {
					window.location = data.redirect;
				} else if(data.error !== undefined) {
					$error
						.html(data.error)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				// This failed
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})

		return false;
	})