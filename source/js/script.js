window.onload = function(){
	let sendButton = document.querySelector('#login');
	sendButton.onclick = function(){
		var xhr = new XMLHttpRequest();
	        xhr.open('post', 'http://sptraining/php/ses.php', true);
	        xhr.send();
	        if (xhr.status != 200) {
	          // обработать ошибку
	          alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          if (xhr.responseText=='true'){
	          	console(xhr.responseText);	
	          	document.location.href = 'cabinet.html';
	          	      	
	          } else {
	          	
	          	alert(xhr.responseText);	
	          	document.location.href = 'login.html';
	          	
	          }
			}
	}
	let logoutButton = document.querySelector('#logout');
	logoutButton.onclick = function(){
		var xhr = new XMLHttpRequest();
			body = "type=" + encodeURIComponent('logout');
	        xhr.open('post', 'http://sptraining/php/login.php', true);
	        xhr.send();
	        if (xhr.status != 200) {
	          // обработать ошибку
	          console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          
	          	console.log(xhr.responseText);	
	          	
			}
	}
	
}