window.onload = function(){
	let login = document.querySelector('.btn-login');
	login.onclick = function(){
		let name = document.querySelector('#login');
		let pass = document.querySelector('#pass');
		name.onfocus = function(){
			name.classList.remove('wrong-login');
			name.value='';
			document.querySelector('#wrong-login').innerHTML='';
		}
		pass.onfocus = function(){
			pass.classList.remove('wrong-login');
			pass.value='';
			document.querySelector('#wrong-login').innerHTML='';
		}
		let xhr = new XMLHttpRequest();
		xhr.withCredentials = true;
	        xhr.open('post', 'http://sptraining/php/login.php', false);
	        var body = new FormData();
	        body.append("type","login");
	        body.append("name", encodeURIComponent(name.value));
	        body.append("pass", encodeURIComponent(pass.value));
	
	        console.log(body);
	        xhr.send(body);
	  	        if (xhr.status != 200) {
			          // обработать ошибку
			          console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
			        } else 
			        	if (xhr.responseText == 'true'){
			            	document.location.href = 'cabinet.html';    	
			          } else{
			          console.log('response: ' + xhr.responseText);
			          name.classList.add('wrong-login');
			          pass.classList.add('wrong-login');
			          document.querySelector('#wrong-login').innerHTML = 'Не верное имя пользователя или пароль';
				}
				
		
	 		// fetch('./php/login.php', {method:"POST", headers: { "Content-type": "application/x-www-form-urlencoded; charset=UTF-8" }, body: "type=" + encodeURIComponent('login') + "&name=" + encodeURIComponent(name.value) + "&pass=" + encodeURIComponent(pass.value)})  
		  // .then(  
		  //   function(response) {  
		  //     if (response.status !== 200) {  
		  //       console.log('Looks like there was a problem. Status Code: ' +  
		  //         response.status);  
		  //       return;  
		  //     }

		  //     // Examine the text in the response  
		  //     response.json().then(function(data) {  
		  //       if(data){
		  //       	console.log(data);
		  //       	document.location.href = 'cabinet.html'; 

		  //       } else {
		  //       	name.classList.add('wrong-login');
		  //       	pass.classList.add('wrong-login');
		  //       	document.querySelector('#wrong-login').innerHTML = 'Не верное имя пользователя или пароль';
		  //       }
		  //     });  
		  //   }  
		  // )  
		  // .catch(function(err) {  
		  //   console.log('Fetch Error :-S', err);  
		  // });
		
	};

}