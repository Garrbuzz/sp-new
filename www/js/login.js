


window.onload = function(){
	// перевірка наявності сесії php
	fetch('./php/ses.php', {method:"POST", headers: { "Content-type": "application/x-www-form-urlencoded; charset=UTF-8" }})  
		  .then(  
		    function(response) {  
		      if (response.status !== 200) {  
		        console.log('Looks like there was a problem. Status Code: ' +  
		          response.status);  
		        return;  
		      }

		      // Examine the text in the response  
		      response.json().then(function(data) {  
		       	if(data){
		        	console.log(data);
		        	document.location.href = 'cabinet.html'; 
		        } else {
		        	let hide = document.querySelector('.login');
					hide.classList.remove('hide');
		        }
		        
		      });  
		    }  
		  )  
		  .catch(function(err) {  
		    console.log('Fetch Error :-S', err);  
		  });
	// перевірка наявності сесії php - end

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
		
	 		fetch('./php/login.php', {method:"POST", headers: { "Content-type": "application/x-www-form-urlencoded; charset=UTF-8" }, body: "type=" + encodeURIComponent('login') + "&name=" + encodeURIComponent(name.value) + "&pass=" + encodeURIComponent(pass.value)})  
		  .then(  
		    function(response) {  
		      if (response.status !== 200) {  
		        console.log('Looks like there was a problem. Status Code: ' +  
		          response.status);  
		        return;  
		      }

		      // Examine the text in the response  
		      response.json().then(function(data) {  
		        if(data){
		        	console.log(data);
		        	document.location.href = 'cabinet.html'; 

		        } else {
		        	name.classList.add('wrong-login');
		        	pass.classList.add('wrong-login');
		        	document.querySelector('#wrong-login').innerHTML = 'Не верное имя пользователя или пароль';
		        }
		      });  
		    }  
		  )  
		  .catch(function(err) {  
		    console.log('Fetch Error :-S', err);  
		  });
		
	};

}