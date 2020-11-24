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
	var $password = $(".password",$form);
	var $confirm_password = $(".comfirm-password",$form);

	var dataObj = {
		email: $("input[type='email']", $form).val(),
		password: $password.val()
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
	} else if ($password.val().localeCompare($confirm_password.val())!=0){
		$error
			.text("Password and comfirm password do not match")
			.show();
		return false
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
	.on("click", ".delete-article", function(event) {
		event.preventDefault();
		var $item = $(this);


		var dataObj = {
			article_id: $item.attr('article')
		};




		$.ajax({
			type: 'POST',
			url: '/ajax/removearticle.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
			.done(function ajaxDone(data) {
				// Whatever data is
				if (data.error !== undefined) {
					alert("Incorrect data provided");
				}
				//alert(data.status);
				$item.parent().remove();
			})
			.fail(function ajaxFailed(e) {
				alert("Connection problem");
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
	.on("submit", "form.add-comment", function(event) {
		event.preventDefault();

		var $form = $(this);
		var $data = $(".comment-text",$form)
		var $error = $(".js-error", $form);
		var $message = $(".js-message", $form);


		//const data = editor.getData();
		var dataObj = {
			article_id: $form.attr("article_id"),
			comment: $data.val()
		};
		// Assuming the code gets this far, we can start the ajax process
		$error.hide();
		$message.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/addcomment.php',
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
	.on("submit", "form.report", function(event) {
		event.preventDefault();

		var $form = $(this);

		var $error = $(".js-error", $form);
		$message = $(".js-message", $form)
		var $user = $(".user", $form);
		var category = $(".category",$form).val();
		//const data = editor.getData();
		var dataObj = {
			option: category,
			user_id: $user.val()
		};
		// Assuming the code gets this far, we can start the ajax process
		$error.hide();
		$message.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/generatereport.php',
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
				} else{
					var count = Object.keys(data).length;
					var $resultsTh = $("#results thead");
					var $resultsTb = $("#results tbody");
					var row = "";
					$resultsTb.empty();
					$resultsTh.empty();
					if (category == 1){
						$resultsTh.append("<tr>\n" +
							"                        <th>Article ID</th>\n" +
							"                        <th>Title</th>\n" +
							"                        <th>Word count</th>\n" +
							"                        <th>Publication time</th>\n" +
							"                    </tr>");
						Object.keys(data).forEach(function(index){
							console.log(data[index]);
							row += "<tr><td>" + data[index]['article_id'] +
								"</td><td>" + data[index]['title'] + "</td><td>"
								+ data[index]['wordcount'] + "</td><td>"
								+ data[index]['publication_time']
								+"</td></tr>"
						});
						$resultsTb.append(row);
					}
					else if (category == 2){
						$resultsTh.append("<tr>\n" +
						"                        <th>Comment ID</th>\n" +
						"                        <th>User ID</th>\n" +
						"                        <th>Article ID</th>\n" +
						"                        <th>Comment</th>\n" +
						"                        <th>Posting time</th>\n" +
						"                    </tr>");
						Object.keys(data).forEach(function(index,value){
						//console.log(value);
							console.log(data[index]);
							row += "<tr><td>" + data[index]['comment_id'] +
								"</td><td>" + data[index]['user_id'] + "</td><td>"
								+ data[index]['article_id'] + "</td><td>"
								+ data[index]['comment'] + "</td><td>"
								+ data[index]['publication_time']
								+"</td></tr>"
						});
						$resultsTb.append(row);
					}
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
	}).on("click", ".add-cookie", function(event) {
		var $error = $("#js-error");
		var $message = $("#js-message");
		document.cookie = 'My-personal-cookie = Cookie value';
		$error.hide();
		$message.hide();
		$message.html("Cookie is set").show();;

		//alert($message.val());


	})
	.on("click", ".add-message", function(event) {
		event.preventDefault();
		//
		var $cantainer = $(".containeractions");
		var $error = $("#js-error");
		var $message = $("#js-message");


		//const data = editor.getData();
		var dataObj = {
			data: ""
		};
		// Assuming the code gets this far, we can start the ajax process
		$error.hide();
		$message.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/adddatatofile.php',
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
	.on("click", ".read-data", function(event) {
		event.preventDefault();
		//
		var $cantainer = $(".containeractions");
		var $error = $("#js-error");
		var $message = $("#js-message");


		//const data = editor.getData();
		var dataObj = {
			data: ""
		};
		// Assuming the code gets this far, we can start the ajax process
		$error.hide();
		$message.hide();

		$.ajax({
			type: 'POST',
			url: '/ajax/readdata.php',
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
						.append(data.cookie + "<br> data in the file <br>" + data.file)
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
/*
$(".actions.add-cookie").click(function(){
	console.log("assas");
});
*/
