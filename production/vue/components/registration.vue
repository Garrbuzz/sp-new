<template>
	<section class="grid-12">
		<div class="register flex-hcenter-wrap">
			<div>
				<!-- {{loginV}} -->
				<fieldset>	
					<legend>Введите данные:</legend>
					<p class = "require" id = "p-login">Адрес электронной почты (он же логин):</p>
					
					<input id="login" type="email"  placeholder="example@example.com" v-on:input="validemail">
					<p id="loginBusy" class = "wrong-login"></p>
					<p class = "require">Пароль:</p>
					<input id = "pass1" type="password" placeholder="пароль"  v-on:input="validpass">
					<p id="vp"></p>
					<p  class = "require">Пароль повторно:</p>
					<input id = "pass2" type="password" placeholder="пароль" v-on:input="validpass">
					<p >Имя:</p>
					<input  id = "name" type="text">
					<p >Фамилия:</p>
					<input  id = "surname" type="text">
					<p class = "require">Дата рождения:</p>
					<input  id = "birthday" type="date" v-on:input="validbirthdey">
					<p class = "require">Профессия:</p>
					<input  id = "profession" type="text">
					<p>Компания:</p>
					<input  id = "company" type="text">
					<p>Телефон:</p>
					<input  id = "phone" type="tel">
					<p class = "require">Пол:</p>
					<div>
					<input id="sex-m" type="radio" name="sex" value="male" v-on:input="validsex">Мужской<br>
					<input  id="sex-f" type="radio" name="sex" value="famale" v-on:input="validsex">Женский</div>
					<p>Skype:</p>
					<input  id="skype" type="text">
					<p>Telegram:</p>
					<input  id="telegram" type="text">
				</fieldset>
				
			</div>
			<div class="buttons">
				<div><button type="button" class="btn btn-success btn-login" v-on:click="sendData">Зарегистрироваться</button></div>
			</div>
			
		</div>
	</section>
</template>
<script>
	export default{
		data(){
			return{
				vallogin:false,
				valpass: false,
				valbirth: false,
				valprof:false,
				valsex:false
			}
		},
		computed: {
			resValid: function(){
				return this.valpass&&this.vallogin&&this.valsex&&this.valbirth&&this.valprof;
			}
		},		
		methods:{
			validpass(){
				let p = document.querySelector('#vp');
				if(document.querySelector('#pass1').value!=document.querySelector('#pass2').value){
						p.innerHTML = 'Пароли не совпадают';
					this.valpass = false;
				} else {
					if(document.querySelector('#pass1').value===''){
					this.valpass = false;
					document.querySelector('#vp').innerHTML = 'Пароль должен содержать хотя бы один символ';
					document.location.href = '#login';
					} else{
						p.innerHTML = '';
					this.valpass = true;
					}
				}
 			},
			validbirthdey(){
				this.valbirth = true;
			},
			validemail(){
				let email = document.querySelector('#login');
				if (!email.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
					email.classList.add('wrong');
					this.vallogin = false;
				}else{
					email.classList.remove('wrong');
					this.vallogin = true;
				}
			},
			validsex(){
				this.valsex = true;
			},
			sendData(){
				let fields = '';
				if(document.querySelector('#profession').value === ''){
					this.valprof = false;
				}else{this.valprof = true};
				
				
				if (!this.resValid){
					if (!this.valpass){
						fields += 'Пароль, '; 
					}
					if (!this.valprof){
						fields += 'Профессия, '; 
					}
					if(!this.valbirth){
						fields += 'День рождения, ';
					} 
					if(!this.vallogin){
						fields += 'Email, ';
					}	
					if(!this.valsex){
						fields += 'Пол';
					}
					alert('Не правильно заполнены поля ' + fields);
				} else{
					let body = new FormData();
					let url = '../php/users_fields.php';
			        body.append("type","user_fields");
			        let xhr = new XMLHttpRequest();
					xhr.withCredentials = true;
			        xhr.open('post', url, true);
			        let male = document.querySelector('#sex-m').checked;
			        let famale = document.querySelector('#sex-f').checked;
			        console.log(male);
			        console.log(famale);
			        xhr.onreadystatechange =  () => {
			            if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			            	let userData = JSON.parse(xhr.responseText);
			                if (male) {
			                	userData.sex = 'male';
			                } else if (famale){
			                	userData.sex = 'famale';
			                }
			              	userData.login = document.querySelector('#login').value;
							userData.reg_date = new Date(); 
							userData.password = document.querySelector('#pass1').value;	
							userData.name = document.querySelector('#name').value;
							userData.surname = document.querySelector('#surname').value;
							userData.profession = document.querySelector('#profession').value;
							userData.company = document.querySelector('#company').value;
							userData.phone1 = document.querySelector('#phone').value;
							userData.date_of_birth = document.querySelector('#birthday').value;
							userData.skype = document.querySelector('#skype').value;
							userData.telegram = document.querySelector('#telegram').value;
							let body1 = new FormData();
							for (let key in userData) {
		  						body1.append(key, userData[key]);
		  					}
							url = '../php/registration.php';
							let xhr1 = new XMLHttpRequest();
							xhr1.withCredentials = true;
					        xhr1.open('post', url, true);
					        xhr1.onreadystatechange =  () => {
			            	if(xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200) {
			            		console.log(xhr1.responseText);
			            		document.location.href = '#p-login';
			            		if (JSON.parse(xhr1.responseText) === 'loginIsBusy'){
			            			document.querySelector('#loginBusy').innerHTML = 'Адрес уже используется  качестве логина. ';
			            		} else if ( (JSON.parse(xhr1.responseText) === true)){
			            			document.querySelector('#loginBusy').innerHTML = '';
			            			alert('Регистрация успешна.');
			            			this.$emit('onLogout');
			            		}
			            		
								

			            		}
			            	}

			            	xhr1.send(body1);

			            }
		            } 
			        
			        xhr.send(body);
				}

			}	
		}
	}
</script>
<style lang="scss" scoped>
	$font:verdana;
	$colBlue:#0095a6;
	$colBlueBtnHover:#22a7c8;
	$colP1:#444;
	.wrong{
		color:red;
	}
	.register{
		margin: 1em 0;
		grid-column: 4/10;
		font-family: $font;
		fieldset{
			padding: 1em 5em 3em;
			color:$colBlue;
			border: 1px solid $colBlue;
			text-align: center;

		}
		input{
			border: 1px solid #ddd;
			border-radius: 3px;
			padding:0.25em;
			width: 25em;
			
		}
		input[type="date"]{
				width:12em;
				text-align: center;
				color: #555;
		}
		input[type="radio"]{
				width:2em;
				margin-top: 0;
				padding-top: 0;

				
		}
		input[type="email"]:invalid{
			color: red;
		}
		p{
			margin:2em 0 0.5em 0;
		}
		#vp{
			color:red;
			font-size: 0.8em;
			padding:0;	
		}
	::-webkit-input-placeholder {color:#ddd;}
	::-moz-placeholder          {color:#ddd;}
	:-moz-placeholder           {color:#ddd;}
	:-ms-input-placeholder      {color:#ddd;}
		
	}
	p.require:before{
		content: "*";
	}

	
	.buttons{
		margin:1.5em 0;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.btn-login{
		margin:1em 0
	}

	.wrong-login{
		color:red;
	}
</style>