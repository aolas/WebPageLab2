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
		password: $(".password", $form).val()
	};

	if(!ValidateEmail(dataObj.email)) {
		$error
			.text("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 8) {
		$error
			.text("Please enter a passphrase that is at least 8 characters long.")
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
		$error
			.html("Connection problems")
			.show();
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
		} else if (dataObj.password.length < 8) {
			$error
				.text("Please enter a passphrase that is at least 8 characters long.")
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
				$error
					.html("Connection problems")
					.show();
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
		var $message = $(".js-message", $form);

		const data = editor.getData();
		var dataObj = {
			title: $(".title", $form).val(),
			articleText: data
		};

		// Assuming the code gets this far, we can start the ajax process
		$error.hide();
		$message.hide();

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
				}else if(data.status !== undefined){
					$message
						.text(data.status)
						.show();
				} else if(data.error !== undefined) {
					$error
						.html(data.error)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				$error
					.html("Connection problems")
					.show();
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
		var $message = $(".js-message", $form);

		var dataObj = {
			email: $(".email", $form).val(),
			name: $(".name",$form).val()
		};


		// Assuming the code gets this far, we can start the ajax process
		$error.hide();
		$message.hide();

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
				}else if (data.status !== undefined){
					$message
						.text(data.status)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				$error
					.html("Connection problems")
					.show();
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})

		return false;
	})
	.on("submit", "form.js-change-password", function(event) {
		event.preventDefault();

		var $form = $(this);
		var $error = $(".js-error", $form);
		var $message = $(".js-message", $form);

		var dataObj = {
			currentPassword: $(".current-password", $form).val(),
			password: $(".password", $form).val()
		};

		if (dataObj.currentPassword.length < 8) {
			$error
				.text("Please enter a current passphrase that is at least 8 characters long.")
				.show();
			return false;
		} else if (dataObj.password.length < 8) {
			$error
				.text("Please enter a new passphrase that is at least 8 characters long.")
				.show();
			return false;
		}
		$error.hide();
		$message.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/changepassword.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if (data.redirect !== undefined) {
					window.location = data.redirect;
				} else if (data.error !== undefined) {
					$error
						.text(data.error)
						.show();
				} else if (data.status !== undefined){
					$message
						.text(data.status)
						.show();

				}
			})
			.fail(function ajaxFailed(e) {
				$error
					.html("Connection problems")
					.show();
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})
	})
	.on("click", "p button.delete", function(event) {
		event.preventDefault();

		var $button = $(this);
		var $error = $("p.js-error");


		var dataObj = {
			article_id: $button.attr('article')

		};

		$error.hide();


		$.ajax({
			type: 'POST',
			url: '/ajax/removearticle.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if (data.redirect !== undefined) {
					window.location = data.redirect;
				} else if (data.error !== undefined) {
					$error
						.text(data.error)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				$error
					.html("Connection problems")
					.show();
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})
	})
	.on("submit", "form.edit-article", function(event) {
		event.preventDefault();

		var $form = $(this);
		var $message = $(".js-message", $form);
		var $error = $("p.js-error");

		const data = editor.getData();
		var dataObj = {
			article_id: $form.attr("article_id"),
			title: $(".title", $form).val(),
			articleText: data
		};


		$error.hide();


		$.ajax({
			type: 'POST',
			url: '/ajax/changearticle.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if (data.redirect !== undefined) {
					//window.location = data.redirect;
				}
				else if (data.status !== undefined){
					$message
						.text(data.status)
						.show();
				}
				else if (data.error !== undefined) {
					$error
						.text(data.error)
						.show();
				}
			})
			.fail(function ajaxFailed(e) {
				$error
					.html("Connection problems")
					.show();
			})
			.always(function ajaxAlwaysDoThis(data) {
				// Always do
				//console.log('Always');
			})
	})