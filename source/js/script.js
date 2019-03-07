function logout(){
		alert('asdasdasd');
		var xhr = new XMLHttpRequest();
			body = "type=" + encodeURIComponent('logout');
	        xhr.open('post', 'http://sptraining/php/login.php', false);
	        xhr.send();
	        if (xhr.status != 200) {
	          // обработать ошибку
	          console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          
	          	console.log(xhr.responseText);	
	          	
			}
}
window.onload = function(){
	let xhr = new XMLHttpRequest();
	        xhr.open('post', 'http://sptraining/php/ses.php', false);
	        xhr.send();
	        if (xhr.status != 200) {
	          // обработать ошибку
	          console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          if (xhr.responseText=='true'){
	          	let butLogout = document.querySelector('.cabinet-logout');	
	          	console.log(butLogout);
	          	butLogout.innerHTML = '<button id="logout">выйти</button>';
	          	      	
	          } 
			}	
	let sendButton = document.querySelector('#login');
	sendButton.onclick = function(){
		var xhr = new XMLHttpRequest();
	        xhr.open('post', 'http://sptraining/php/ses.php', false);
	        xhr.send();
	        if (xhr.status != 200) {
	          // обработать ошибку
	          console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          if (xhr.responseText=='true'){
	          		
	          	document.location.href = 'cabinet.html';
	          	      	
	          } else {
	          	      	
	          	document.location.href = 'login.html';
	          	
	          }
			}
	}
	

	
}