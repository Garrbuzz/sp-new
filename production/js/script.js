
window.onload = function(){
	let xhr = new XMLHttpRequest();
		xhr.withCredentials = true;
	        xhr.open('post', 'http://sptraining/php/ses.php', false);
	        
	        let data = new FormData();
	        data.append("type","isSession");
	        xhr.send(data);
	        if (xhr.status != 200) {
	            console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          if (xhr.responseText=='true'){
	          	let butLogout = document.querySelector('.cabinet-logout');	
	          	console.log('butLogout :');
	          	console.log(butLogout);
	          	butLogout.innerHTML = '<button id="logout" onclick="logout()">выйти</button>';
	          	      	
	          } 
	          console.log('aaaa  '+ xhr.responseText);
			}	
	let sendButton = document.querySelector('#login');
	sendButton.onclick = function(){
		var xhr = new XMLHttpRequest();
		xhr.withCredentials = true;
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
function logout(){
		alert('asdasdasd');
		// xhr.withCredentials = true;
		var xhr = new XMLHttpRequest();
			body = "type=" + encodeURIComponent('logout');
	        xhr.open('post', 'http://sptraining/php/login.php', false);
	        xhr.send();
	        if (xhr.status != 200) {
	          // обработать ошибку
	          console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
	        } else {
	          	let butLogout = document.querySelector('.cabinet-logout');
	          	butLogout.innerHTML = '';
	          	document.location.href = '../login.html';
	          	console.log(xhr.responseText);	
	          	
			}
}